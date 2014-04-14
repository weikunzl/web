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
class seoAService extends X
{

    public function validAdd( )
    {
        $args = XRequest::getgpc( array( "idmark", "chname", "title", "description", "keyword", "url", "intro" ) );
        if ( FALSE === XValid::isspchar( $args['idmark'] ) )
        {
            XHandle::halt( "标识格式不正确", "", 1 );
        }
        return $args;
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $args = XRequest::getgpc( array( "chname", "title", "description", "keyword" ) );
        return array(
            $id,
            $args
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

    public function validArrayID( )
    {
        $ids = XRequest::getarray( "id" );
        if ( empty( $ids ) )
        {
            XHandle::halt( "对不起，ID错误！", "", 1 );
        }
        return $ids;
    }

    public function validUpdate( $id )
    {
        $chname = XRequest::getargs( "chname_".$id );
        $title = XRequest::getargs( "title_".$id );
        $description = XRequest::getargs( "description_".$id );
        $keyword = XRequest::getargs( "keyword_".$id );
        $args = array(
            "chname" => $chname,
            "title" => $title,
            "description" => $description,
            "keyword" => $keyword
        );
        return $args;
    }

}

?>
