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
class homeUService extends X
{

    public function validUid( )
    {
        $uid = XRequest::getint( "uid" );
        if ( $uid < 1 )
        {
            XHandle::halt( "对不起，会员ID丢失。", "", 1 );
        }
        return $uid;
    }

    public function validMsg( )
    {
        $touid = XRequest::getint( "touid" );
        $content = XRequest::getargs( "message" );
        if ( $touid < 1 )
        {
            XHandle::halt( "信件接收人不能为空！", "", 1 );
        }
        else if ( $touid == parent::$wrap_user['userid'] )
        {
            XHandle::halt( "不能自己给自己写信", "", 1 );
        }
        return array(
            $touid,
            $content
        );
    }

    public function validWrite( )
    {
        $touid = XRequest::getint( "touid" );
        $content = XRequest::getargs( "message" );
        if ( $touid < 1 )
        {
            XHandle::halt( "信件接收人不能为空！", "", 1 );
        }
        else if ( $touid == parent::$wrap_user['userid'] )
        {
            XHandle::halt( "不能自己给自己写信", "", 1 );
        }
        if ( empty( $content ) )
        {
            XHandle::halt( "信件内容不能为空", "", 1 );
        }
        else if ( TRUE === XFilter::checkexistsforbidchar( $content ) )
        {
            XHandle::halt( "对不起，内容含有系统禁止的字符。", "", 1 );
        }
        return array(
            $touid,
            $content
        );
    }

}

?>
