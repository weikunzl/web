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
class fansUModel extends X
{

    public function getList( $items )
    {
        $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY v.friendid DESC" : $items['orderby'];
        $pagesize = intval( $items['pagesize'] );
        $where = " WHERE v.fuserid='".parent::$wrap_user['userid']."' AND v.black='0' AND v.ftype='0' ".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $pagesize;
        $countsql = "SELECT COUNT(v.friendid) FROM ".DB_PREFIX."friend AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.friendid, v.userid, u.*, s.*, vip.vipenddate, p.* FROM ".DB_PREFIX."friend AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        parent::loadlib( array( "mod", "user" ) );
        foreach ( $data as $key => $value )
        {
            $data[$key]['age'] = XMod::getage( $value['ageyear'] );
            $data[$key]['homeurl'] = XUrl::gethomeurl( $value['userid'] );
            $data[$key]['useravatar'] = XUser::getavatar( $value['gender'], $value['avatar'], $value['avatarflag'] );
            $data[$key]['avatarurl'] = XUser::getavatarurl( $value['gender'], $value['avatar'], $value['avatarflag'] );
            $data[$key]['levelimg'] = XUser::getidentify( $value['gender'], $value['groupid'], $value['vipenddate'] );
            $data[$key]['i'] = $i;
            $i += 1;
        }
        return array( $total, $data );
    }

    public function getFansCount( $userid )
    {
        $sql = "SELECT COUNT(*) FROM ".DB_PREFIX.( "friend WHERE `fuserid`='".$userid."' AND `black`='0' AND `ftype`='0'" );
        return parent::$obj->fetch_count( $sql );
    }

}

?>
