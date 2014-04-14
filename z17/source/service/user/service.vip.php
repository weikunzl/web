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
class vipUService extends X
{

    public function validVip( )
    {
        $viptype = XRequest::getargs( "viptype" );
        if ( !preg_match( "/^[0-9]_[0-9]+$/", $viptype ) )
        {
            XHandle::halt( "请选择要升级的VIP会员组", "", 1 );
        }
        $split = explode( "_", $viptype );
        $gid = intval( $split[0] );
        $orders = intval( $split[1] );
        if ( $gid < 2 )
        {
            XHandle::halt( "请选择要升级的VIP会员组", "", 1 );
        }
        return array(
            $gid,
            $orders
        );
    }

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "ID错误.", "", 1 );
        }
        return $id;
    }

}

?>
