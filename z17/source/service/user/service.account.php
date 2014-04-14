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
class accountUService extends X
{

    public function validPassword( )
    {
        $args = XRequest::getgpc( array( "oldpassword", "newpassword", "confirmpassword" ) );
        if ( empty( $args['oldpassword'] ) )
        {
            XHandle::halt( "旧密码不能为空", "", 1 );
        }
        if ( empty( $args['newpassword'] ) )
        {
            XHandle::halt( "新密码不能为空", "", 1 );
        }
        else if ( FALSE === XValid::islength( $args['newpassword'], 4, 16 ) )
        {
            XHandle::halt( "新密码长度必须6-16个字符", "", 1 );
        }
        if ( $args['confirmpassword'] != $args['newpassword'] )
        {
            XHandle::halt( "确认新密码不正确", "", 1 );
        }
        unset( $args['confirmpassword'] );
        return $args;
    }

    public function validRecall( )
    {
        return XRequest::getint( "recall" );
    }

    public function validLoveStatus( )
    {
        return XRequest::getint( "lovestatus" );
    }

}

?>
