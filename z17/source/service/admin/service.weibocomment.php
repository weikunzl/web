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
class weibocommentAService extends X
{

    public function validSearch( )
    {
        $args = XRequest::getgpc( array( "susername", "scontent", "sflag" ) );
        $args['sflag'] = intval( $args['sflag'] );
        return $args;
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $args = XRequest::getgpc( array( "content", "flag" ) );
        $args['flag'] = intval( $args['flag'] );
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "评论内容不能为空", "", 1 );
        }
        $args['cmcontent'] = $args['content'];
        $args['cmflag'] = $args['flag'];
        unset( $args['content'] );
        unset( $args['flag'] );
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
