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
class aboutAService extends X
{

    public function validAdd( )
    {
        $args = XRequest::getgpc( array( "catid", "title", "intro", "thumbfiles", "uploadfiles", "metakeyword", "metadescription", "linktype", "linkurl", "target", "tplname", "orders", "navshow" ) );
        $content = XRequest::getargs( "content", "", FALSE );
        $args['catid'] = intval( $args['catid'] );
        $args['linktype'] = intval( $args['linktype'] );
        $args['target'] = intval( $args['target'] );
        $args['orders'] = intval( $args['orders'] );
        $args['navshow'] = intval( $args['navshow'] );
        $args['content'] = $content;
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择所属分类", "", 1 );
        }
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "标题不能为空", "", 1 );
        }
        if ( !empty( $args['tplname'] ) && FALSE === XValid::isspchar( $args['tplname'] ) )
        {
            XHandle::halt( "模板文件格式不正确", "", 1 );
        }
        if ( !empty( $args['uploadfiles'] ) && ( empty( $args['thumbfiles'] ) || !file_exists( BASE_ROOT."./".$args['thumbfiles'] ) ) )
        {
            $args['thumbfiles'] = $args['uploadfiles'];
        }
        return $args;
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $args = XRequest::getgpc( array( "catid", "title", "intro", "thumbfiles", "uploadfiles", "metakeyword", "metadescription", "linktype", "linkurl", "target", "tplname", "orders", "navshow" ) );
        $content = XRequest::getargs( "content", "", FALSE );
        $args['catid'] = intval( $args['catid'] );
        $args['linktype'] = intval( $args['linktype'] );
        $args['target'] = intval( $args['target'] );
        $args['orders'] = intval( $args['orders'] );
        $args['navshow'] = intval( $args['navshow'] );
        $args['content'] = $content;
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择所属分类", "", 1 );
        }
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "标题不能为空", "", 1 );
        }
        if ( !empty( $args['tplname'] ) && FALSE === XValid::isspchar( $args['tplname'] ) )
        {
            XHandle::halt( "模板文件格式不正确", "", 1 );
        }
        if ( !empty( $args['uploadfiles'] ) && ( empty( $args['thumbfiles'] ) || !file_exists( BASE_ROOT."./".$args['thumbfiles'] ) ) )
        {
            $args['thumbfiles'] = $args['uploadfiles'];
        }
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

}

?>
