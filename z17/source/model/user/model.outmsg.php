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
class outmsgUModel extends X
{

    public function getOutList( $items )
    {
        $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY v.msgid DESC" : $items['orderby'];
        $pagesize = intval( $items['pagesize'] );
        $where = " WHERE v.fromuserid='".parent::$wrap_user['userid']."' AND v.fromdeleted='0' ".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $pagesize;
        $countsql = "SELECT COUNT(v.msgid) FROM ".DB_PREFIX."message AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username, u.gender, u.avatar, u.avatarflag, u.groupid, p.ageyear, p.provinceid, p.cityid, p.distid, p.marrystatus, p.education, p.salary, p.height, vip.vipenddate FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.touserid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.touserid=p.userid LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.touserid=vip.userid".$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        parent::loadlib( array( "mod", "user" ) );
        foreach ( $data as $key => $value )
        {
            $data[$key]['age'] = XMod::getage( $value['ageyear'] );
            $data[$key]['homeurl'] = XUrl::gethomeurl( $value['touserid'] );
            $data[$key]['useravatar'] = XUser::getavatar( $value['gender'], $value['avatar'], $value['avatarflag'] );
            $data[$key]['avatarurl'] = XUser::getavatarurl( $value['gender'], $value['avatar'], $value['avatarflag'] );
            $data[$key]['levelimg'] = XUser::getidentify( $value['gender'], $value['groupid'], $value['vipenddate'] );
            $data[$key]['i'] = $i;
            $i += 1;
        }
        return array( $total, $data );
    }

    public function getOneData( $id )
    {
        $sql = "SELECT v.*, u.username, u.gender, u.groupid, u.avatar, u.avatarflag, vip.vipenddate, p.ageyear, p.provinceid, p.cityid, p.distid, p.marrystatus, p.education, p.salary FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.touserid=u.userid LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.touserid=vip.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.touserid=p.userid".( " WHERE v.msgid='".$id."' AND v.fromuserid='" ).parent::$wrap_user['userid']."' AND v.fromdeleted='0'";
        $data = parent::$obj->fetch_first( $sql );
        if ( !empty( $data ) )
        {
            parent::loadlib( array( "mod", "user" ) );
            $data['age'] = XMod::getage( $data['ageyear'] );
            $data['homeurl'] = XUrl::gethomeurl( $data['touserid'] );
            $data['useravatar'] = XUser::getavatar( $data['gender'], $data['avatar'], $data['avatarflag'] );
            $data['avatarurl'] = XUser::getavatarurl( $data['gender'], $data['avatar'], $data['avatarflag'] );
            $data['levelimg'] = XUser::getidentify( $data['gender'], $data['groupid'], $data['vipenddate'] );
        }
        return $data;
    }

    public function doDel( $id )
    {
        $result = FALSE;
        $sql = "SELECT v.msgid, hash.firstuid FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."message_hash AS hash ON v.hashid=hash.hashid".( " WHERE v.msgid='".$id."' AND v.fromuserid='" ).parent::$wrap_user['userid']."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( $rows['firstuid'] == parent::$wrap_user['userid'] )
            {
                $array = array( "fromdeleted" => 1, "first_fdeleted" => 1 );
            }
            else
            {
                $array = array( "fromdeleted" => 1, "sec_fdeleted" => 1 );
            }
            $result = parent::$obj->update( DB_PREFIX."message", $array, "msgid='".$id."'" );
        }
        unset( $rows );
        return $result;
    }

}

?>
