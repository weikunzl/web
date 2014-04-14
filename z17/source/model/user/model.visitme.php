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
class visitmeUModel extends X
{

    private function _buildSql( )
    {
        $sql = "SELECT v.viewid, v.viewuserid, v.viewtime, u.*, s.*, vip.vipenddate, p.* FROM ".DB_PREFIX."home_viewer AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.viewuserid=u.userid LEFT JOIN ".DB_PREFIX."user_status AS s ON v.viewuserid=s.userid LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.viewuserid=vip.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.viewuserid=p.userid";
        return $sql;
    }

    public function getList( $items )
    {
        $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY v.viewid DESC" : $items['orderby'];
        $pagesize = intval( $items['pagesize'] );
        $where = " WHERE v.homeuserid='".parent::$wrap_user['userid']."' AND v.homedeleted='0' ".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $pagesize;
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."home_viewer AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = $this->_buildSql( ).$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
        $data = parent::$obj->getall( $sql );
        return array( $total, $this->_handleList( $data, "viewuserid" ) );
    }

    public function volistAll( $userid, $num = 0 )
    {
        $num = intval( $num ) < 1 ? 20 : intval( $num );
        $sql = $this->_buildSql( ).( " WHERE v.homeuserid='".$userid."' AND v.homedeleted='0'" );
        $sql .= " ORDER BY v.viewid DESC LIMIT ".$num;
        $data = parent::$obj->getall( $sql );
        $data = $this->_handleList( $data, "viewuserid" );
        return $data;
    }

    public function doDel( $id )
    {
        return parent::$obj->update( DB_PREFIX."home_viewer", array( "homedeleted" => 1 ), "viewid='".$id."' AND homeuserid='".parent::$wrap_user['userid']."'" );
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

}

?>
