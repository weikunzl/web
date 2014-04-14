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
class homeWService extends X
{

    public function validUid( )
    {
        $uid = XRequest::getint( "uid" );
        if ( $uid < 1 )
        {
            XHandle::waphalt( "对不起，会员ID错误！", "", 1 );
            exit( );
        }
        return $uid;
    }

}

?>
