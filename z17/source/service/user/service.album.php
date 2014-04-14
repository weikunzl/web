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
class albumUService extends X
{

    public function validUpload( )
    {
        $title = XRequest::getargs( "title" );
        $uploadpart = XRequest::getargs( "uploadpart", "", FALSE );
        if ( empty( $uploadpart ) )
        {
            XHandle::halt( "请选择要上传照片", "", 1 );
        }
        return array(
            $title,
            $uploadpart
        );
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $title = XRequest::getargs( "title" );
        return array(
            $id,
            $title
        );
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
