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
class certifyUService extends X
{

    public function validMobile( )
    {
        $mobile = XRequest::getargs( "mobile" );
        if ( FALSE === XValid::ismobile( $mobile ) )
        {
            XHandle::halt( "对不起，手机号码格式不正确", "", 1 );
        }
        return $mobile;
    }

    public function validRzMobile( )
    {
        $mobile = XRequest::getargs( "mobile" );
        $checkcode = XRequest::getargs( "checkcode" );
        if ( FALSE === XValid::ismobile( $mobile ) )
        {
            XHandle::halt( "手机号码格式不正确", "", 1 );
        }
        if ( FALSE === XValid::isnumber( $checkcode ) )
        {
            XHandle::halt( "手机验证码格式不正确", "", 1 );
        }
        return array(
            $mobile,
            $checkcode
        );
    }

    public function validUpload( )
    {
        $certifytype = XRequest::getint( "certifytype" );
        $uploadpart = XRequest::getargs( "uploadpart", "", FALSE );
        if ( $certifytype == 0 )
        {
            XHandle::halt( "请选择证件类别", "", 1 );
        }
        if ( empty( $uploadpart ) )
        {
            XHandle::halt( "请上传证件图片", "", 1 );
        }
        return array(
            $certifytype,
            $uploadpart
        );
    }

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "ID错误", "", 1 );
        }
        return $id;
    }

}

?>
