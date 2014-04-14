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
class complaintUService extends X
{

    public function validUid( )
    {
        $uid = XRequest::getint( "uid" );
        if ( $uid < 1 )
        {
            XHandle::halt( "对不起，举报对象ID丢失", "", 1 );
        }
        return $uid;
    }

    public function validSave( )
    {
        $args = XRequest::getgpc( array( "uid", "cptype", "content", "telephone", "email" ) );
        $args['uid'] = intval( $args['uid'] );
        $args['cptype'] = intval( $args['cptype'] );
        if ( $args['uid'] < 1 )
        {
            XHandle::halt( "对不起，举报对象ID丢失", "", 1 );
        }
        if ( $args['cptype'] < 1 )
        {
            XHandle::halt( "请选择举报类型", "", 1 );
        }
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "情况说明不能为空", "", 1 );
        }
        if ( empty( $args['telephone'] ) )
        {
            XHandle::halt( "联系电话不能为空", "", 1 );
        }
        if ( FALSE === XValid::isemail( $args['email'] ) )
        {
            XHandle::halt( "请填写正确的邮箱地址", "", 1 );
        }
        $args['cpuid'] = $args['uid'];
        unset( $args['uid'] );
        return $args;
    }

}

?>
