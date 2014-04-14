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
class aboutIService extends X
{

    public function validCid( )
    {
        $cid = XRequest::getint( "cid" );
        return $cid;
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
