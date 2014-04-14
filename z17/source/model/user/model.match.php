<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
class matchUModel extends X
{

    private function _buildSql( )
    {
        $sql = "SELECT v.*, s.*, vip.vipenddate, p.* FROM ".DB_PREFIX."user AS v LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid";
        return $sql;
    }

    public function getList( $items )
    {
        $users = $this->_getUsers( );
        if ( !empty( $users ) )
        {
            $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY v.userid DESC" : $items['orderby'];
            $pagesize = intval( $items['pagesize'] );
            $where = " WHERE s.flag='1' AND s.lovestatus='1' AND v.userid IN (".$users.") ".$items['searchsql'];
            $start = ( $items['page'] - 1 ) * $pagesize;
            $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."user AS v LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".$where;
            $total = parent::$obj->fetch_count( $countsql );
            $sql = $this->_buildSql( ).$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
            $data = parent::$obj->getall( $sql );
            $i = 1;
            parent::loadlib( array( "mod", "user" ) );
            $data = $this->_handleList( $data, "userid" );
        }
        else
        {
            $total = 0;
            $data = NULL;
        }
        return array( $total, $data );
    }

    public function volistAll( $userid, $num = 0 )
    {
        $users = $this->_getUsers( $userid );
        $num = intval( $num ) < 1 ? 20 : intval( $num );
        if ( !empty( $users ) )
        {
            $sql = $this->_buildSql( )." WHERE s.flag='1' AND s.lovestatus='1' AND v.userid IN (".$users.")";
            $sql .= " ORDER BY v.userid DESC LIMIT ".$num;
            $data = parent::$obj->getall( $sql );
            $data = $this->_handleList( $data, "userid" );
        }
        return $data;
    }

    private function _getUsers( $uid = 0 )
    {
        $users = "";
        $sql = "SELECT `users` FROM ".DB_PREFIX."user_match";
        $sql .= 0 < $uid ? " WHERE `userid`='".$uid."'" : " WHERE `userid`='".parent::$wrap_user['userid']."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $users = $rows['users'];
        }
        unset( $rows );
        return $users;
    }

    public function createMatch( $userid )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "user_match WHERE userid='".$userid."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( empty( $rows ) )
        {
            $array = array(
                "userid" => $userid,
                "users" => "",
                "sqltemp" => ""
            );
            parent::$obj->insert( DB_PREFIX."user_match", $array );
        }
        unset( $rows );
    }

    public function updateMatch( $id )
    {
        $result = FALSE;
        $m_cond = parent::model( "cond", "um" );
        $cond_data = $m_cond->getData( $id );
        unset( $m_cond );
        if ( !empty( $cond_data ) )
        {
            $params_sql = "SELECT v.userid FROM ".DB_PREFIX."user_params AS v";
            $where = " WHERE v.flag='1' AND v.lovestatus='1'";
            if ( 0 < $cond_data['gender'] )
            {
                $where .= " AND v.gender='".$cond_data['gender']."'";
            }
            $year = date( "Y", time( ) );
            if ( 0 < $cond_data['endage'] )
            {
                $where .= " AND v.ageyear>=".intval( $year - $cond_data['endage'] )."";
            }
            if ( 0 < $cond_data['startage'] )
            {
                $where .= " AND v.ageyear<=".intval( $year - $cond_data['startage'] )."";
            }
            if ( 0 < $cond_data['startheight'] )
            {
                $where .= " AND v.height>=".intval( $cond_data['startheight'] )."";
            }
            if ( 0 < $cond_data['endheight'] )
            {
                $where .= " AND v.height<=".intval( $cond_data['endheight'] )."";
            }
            if ( !empty( $cond_data['marry'] ) )
            {
                $where .= " AND v.marry IN (".$cond_data['marry'].")";
            }
            if ( !empty( $cond_data['lovesort'] ) )
            {
                $where .= " AND v.lovesort IN (".$cond_data['lovesort'].")";
            }
            if ( 0 < $cond_data['startedu'] )
            {
                $where .= " AND v.education>=".$cond_data['startedu']."";
            }
            if ( 0 < $cond_data['endedu'] )
            {
                $where .= " AND v.education<=".$cond_data['endedu']."";
            }
            if ( !empty( $cond_data['areas'] ) )
            {
                $where .= " AND v.cityid IN (".$cond_data['areas'].")";
            }
            if ( 0 < $cond_data['avatar'] )
            {
                $where .= " AND v.avatar='1'";
            }
            if ( 0 < $cond_data['star'] )
            {
                if ( $cond_data['starup'] == 1 )
                {
                    $where .= " AND v.star>=".$cond_data['star']."";
                }
                else
                {
                    $where .= " AND v.star<=".$cond_data['star']."";
                }
            }
            $matchnum = intval( parent::$cfg['matchnum'] );
            if ( $matchnum == 0 )
            {
                $matchnum = 60;
            }
            $users = "";
            $params_count = "SELECT COUNT(*) FROM ".DB_PREFIX."user_params AS v".$where;
            $params_total = parent::$obj->fetch_count( $params_count );
            if ( 0 < $params_total )
            {
                if ( 500 < $params_total )
                {
                    $totalpage = intval( $params_total / $matchnum );
                    $totalpage = 100 < $totalpage ? 100 : $totalpage;
                    if ( 1 < $totalpage )
                    {
                        $page = rand( 1, $totalpage );
                    }
                    else
                    {
                        $page = 1;
                    }
                    $start = ( $page - 1 ) * $matchnum;
                    $user_sql = $params_sql.$where.( " ORDER BY v.userid DESC LIMIT ".$start.", {$matchnum}" );
                    $user_data = parent::$obj->getall( $user_sql );
                }
                else
                {
                    $user_sql = $params_sql.$where.( " ORDER BY RAND() LIMIT ".$matchnum );
                    $user_data = parent::$obj->getall( $user_sql );
                }
            }
            else
            {
                $user_data = NULL;
            }
            if ( !empty( $user_data ) )
            {
                foreach ( $user_data as $key => $value )
                {
                    $users .= $value['userid'].",";
                }
                unset( $user_data );
                if ( !empty( $users ) )
                {
                    $users = substr( $users, 0, strlen( $users ) - 1 );
                }
            }
            $update_array = array( "users" => $users, "dateline" => strtotime( date( "Y-m-d", time( ) ) ) );
            $match_sql = "SELECT userid FROM ".DB_PREFIX.( "user_match WHERE userid='".$id."'" );
            $match_rows = parent::$obj->fetch_first( $match_sql );
            if ( empty( $match_rows ) )
            {
                $update_array['userid'] = $id;
                $result = parent::$obj->insert( DB_PREFIX."user_match", $update_array );
            }
            else
            {
                $result = parent::$obj->update( DB_PREFIX."user_match", $update_array, "userid='".$id."'" );
            }
            unset( $match_rows );
        }
        unset( $cond_data );
        return $result;
    }

    private function _handleList( $data, $uidname = "userid" )
    {
        if ( !empty( $data ) )
        {
            parent::loadlib( array( "url", "mod", "user" ) );
            $i = 1;
            foreach ( $data as $key => $value )
            {
                $data[$key]['age'] = XMod::getage( $value['ageyear'] );
                $data[$key]['homeurl'] = XUrl::gethomeurl( $value[$uidname] );
                $data[$key]['useravatar'] = XUser::getavatar( $value['gender'], $value['avatar'], $value['avatarflag'] );
                $data[$key]['avatarurl'] = XUser::getavatarurl( $value['gender'], $value['avatar'], $value['avatarflag'] );
                $data[$key]['levelimg'] = XUser::getidentify( $value['gender'], $value['groupid'], $value['vipenddate'] );
                $data[$key]['i'] = $i;
                $i += 1;
            }
        }
        return $data;
    }

    public function getMatchUserIDs( $uid )
    {
        $mids = "";
        $match_sql = "SELECT `users` FROM ".DB_PREFIX."user_match".( " WHERE `userid`='".$uid."'" );
        $match_rows = parent::$obj->fetch_first( $match_sql );
        if ( !empty( $match_rows ) )
        {
            $mids = trim( $match_rows['users'] );
        }
        unset( $match_rows );
        unset( $match_sql );
        return $mids;
    }

}

?>
