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
class weiboIService extends X
{

    public function validType( )
    {
        $type = XRequest::getargs( "type" );
        return $type;
    }

    public function validUid( )
    {
        $uid = XRequest::getint( "uid" );
        if ( FALSE === XValid::isnumber( $uid ) )
        {
            XHandle::halt( "对不起，会员ID错误！", "", 1 );
        }
        return $uid;
    }

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "对不起，ID错误！", "", 1 );
        }
        return $id;
    }

}

?>
