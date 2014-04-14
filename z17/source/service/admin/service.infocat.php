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
class infocatAService extends X
{

    public function validAdd( )
    {
        $args = XRequest::getgpc( array( "catname", "orders", "target", "cssname", "img", "intro", "metakeyword", "metadescription", "linktype", "linkurl", "tplname" ) );
        if ( empty( $args['catname'] ) )
        {
            XHandle::halt( "分类名称不能为空", "", 1 );
        }
        if ( !empty( $args['tplname'] ) && FALSE === XValid::isspchar( $args['tplname'] ) )
        {
            XHandle::halt( "模板文件格式不正确", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        $args['target'] = intval( $args['target'] );
        $args['linktype'] = intval( $args['linktype'] );
        return $args;
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $args = XRequest::getgpc( array( "catname", "orders", "target", "cssname", "img", "intro", "metakeyword", "metadescription", "linktype", "linkurl", "tplname" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['catname'] ) )
        {
            XHandle::halt( "分类名称不能为空", "", 1 );
        }
        if ( !empty( $args['tplname'] )  && FALSE === XValid::isspchar( $args['tplname'] ) )
        {
            XHandle::halt( "模板文件格式不正确", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        $args['target'] = intval( $args['target'] );
        $args['linktype'] = intval( $args['linktype'] );
        return array( $id, $args );
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

}

?>
