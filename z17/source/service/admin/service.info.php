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
class infoAService extends X
{

    public function validAdd( )
    {
        $args = XRequest::getgpc( array( "catid", "title", "thumbfiles", "uploadfiles", "summary", "addtime", "elite", "flag", "hits", "orders", "metakeyword", "metadescription", "tplname" ) );
        $args['content'] = XRequest::getargs( "content", "", FALSE );
        $args['catid'] = intval( $args['catid'] );
        $args['elite'] = intval( $args['elite'] );
        $args['flag'] = intval( $args['flag'] );
        $args['hits'] = intval( $args['hits'] );
        $args['orders'] = intval( $args['orders'] );
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择所属分类", "", 1 );
        }
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "标题不能为空", "", 1 );
        }
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "内容不能为空", "", 1 );
        }
        if ( !empty( $args['tplname'] ) && FALSE === XValid::isspchar( $args['tplname'] ) )
        {
            XHandle::halt( "模板文件格式不正确", "", 1 );
        }
        $args['addtime'] = strtotime( trim( str_replace( "&nbsp;", " ", $args['addtime'] ) ) );
        return $args;
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $args = XRequest::getgpc( array( "catid", "title", "thumbfiles", "uploadfiles", "summary", "addtime", "elite", "flag", "hits", "orders", "metakeyword", "metadescription", "tplname" ) );
        $args['content'] = XRequest::getargs( "content", "", FALSE );
        $args['catid'] = intval( $args['catid'] );
        $args['elite'] = intval( $args['elite'] );
        $args['flag'] = intval( $args['flag'] );
        $args['hits'] = intval( $args['hits'] );
        $args['orders'] = intval( $args['orders'] );
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择所属分类", "", 1 );
        }
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "标题不能为空", "", 1 );
        }
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "内容不能为空", "", 1 );
        }
        if ( !empty( $args['tplname'] ) && FALSE === XValid::isspchar( $args['tplname'] ) )
        {
            XHandle::halt( "模板文件格式不正确", "", 1 );
        }
        $args['addtime'] = strtotime( trim( str_replace( "&nbsp;", " ", $args['addtime'] ) ) );
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
