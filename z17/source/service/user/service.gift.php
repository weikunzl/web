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
class giftUService extends X
{

    public function validSend( )
    {
        $args = XRequest::getgpc( array( "touid", "giftid" ) );
        $args['touid'] = intval( $args['touid'] );
        $args['giftid'] = intval( $args['giftid'] );
        if ( $args['touid'] < 1 )
        {
            XHandle::halt( "对不起，接收人ID错误！", "", 1 );
        }
        if ( $args['giftid'] < 1 )
        {
            XHandle::halt( "对不起，礼物ID错误！", "", 1 );
        }
        return array(
            $args['touid'],
            $args['giftid']
        );
    }

    public function validToUid( )
    {
        $touid = XRequest::getint( "touid" );
        if ( $touid < 1 )
        {
            XHandle::halt( "对不起，接收人ID错误！", "", 1 );
        }
        return $touid;
    }

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "对不起，ID丢失。", "", 1 );
        }
        return $id;
    }

}

?>
