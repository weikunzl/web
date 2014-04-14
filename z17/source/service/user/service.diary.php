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
class diaryUService extends X
{

    public function validAdd( )
    {
        $args = XRequest::getgpc( array( "title", "catid", "content", "weather", "feel", "diaryopen" ) );
        $args['catid'] = intval( $args['catid'] );
        $args['weather'] = intval( $args['weather'] );
        $args['feel'] = intval( $args['feel'] );
        $args['diaryopen'] = intval( $args['diaryopen'] );
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "日记标题不能为空", "", 1 );
        }
        else
        {
            if ( TRUE === XFilter::checkexistsforbidchar( $args['title'] ) )
            {
                XHandle::halt( "对不起，标题含有系统禁止的字符。", "", 1 );
            }
            $args['title'] = XFilter::filterforbidchar( $args['title'] );
        }
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择日记分类", "", 1 );
        }
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "日记内容不能为空", "", 1 );
            return $args;
        }
        if ( TRUE === XFilter::checkexistsforbidchar( $args['content'] ) )
        {
            XHandle::halt( "对不起，内容含有系统禁止的字符。", "", 1 );
        }
        $args['content'] = XFilter::filterforbidchar( $args['content'] );
        return $args;
    }

    public function validEdit( )
    {
        $id = $this->validID( );
        $args = $this->validAdd( );
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

}

?>
