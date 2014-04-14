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
class sysmsgUService extends X
{

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "对不起，ID丢失。", "", 1 );
        }
        return $id;
    }

    public function validArrayID( )
    {
        $ids = XRequest::getarray( "id" );
        if ( empty( $ids ) )
        {
            XHandle::halt( "对不起，ID错误！", "", 1 );
        }
        return $ids;
    }

}

?>
