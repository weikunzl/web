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
class userUModel extends X
{

    public function getUserSimpleInfo( $uid )
    {
        $sql = "SELECT v.userid, v.username, v.gender, v.groupid, v.avatar, v.avatarflag, s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star, vip.viplevel, vip.vipenddate, p.provinceid, p.cityid, p.distid, p.ageyear, p.marrystatus, p.education, p.height, p.salary FROM ".DB_PREFIX."user AS v LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".( " WHERE v.userid='".$uid."'" );
        $data = parent::$obj->fetch_first( $sql );
        parent::loadlib( array( "mod", "user" ) );
        if ( !empty( $data ) )
        {
            $data['age'] = XMod::getage( $data['ageyear'] );
            $data['homeurl'] = XUrl::gethomeurl( $data['userid'] );
            $data['useravatar'] = XUser::getavatar( $data['gender'], $data['avatar'], $data['avatarflag'] );
            $data['avatarurl'] = XUser::getavatarurl( $data['gender'], $data['avatar'], $data['avatarflag'] );
            $data['levelimg'] = XUser::getidentify( $data['gender'], $data['groupid'], $data['vipenddate'] );
        }
        return $data;
    }

}

?>
