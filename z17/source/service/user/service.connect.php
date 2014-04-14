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
class connectUService extends X
{

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "请选择要删除的信息", "", 1 );
        }
        return $id;
    }

}

?>
