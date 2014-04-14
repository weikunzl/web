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
class control extends userbase
{

    public function control_run( )
    {
        $model = parent::model( "certify", "um" );
        $data = $model->getWaitList( );
        unset( $model );
        $var_array = array(
            "page_title" => $this->getTitle( "certify_run" ),
            "certify" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."certify.tpl" );
    }

    public function control_email( )
    {
        $var_array = array(
            "page_title" => $this->getTitle( "certify_email" )
        );
        TPL::assign( $var_array );
        if ( $this->halttype == "jdbox" )
        {
            TPL::display( $this->uctpl."certify_jdbox.tpl" );
        }
        else
        {
            TPL::display( $this->uctpl."certify.tpl" );
        }
    }

    public function control_mobile( )
    {
        if ( XValid::ismobile( $this->u['mobile'] ) && $this->u['mobilerz'] == 1 )
        {
            XHandle::halt( "对不起，您的手机号码已经通过验证，请不要重复操作。", "", 1 );
        }
        $model = parent::model( "sms", "am" );
        $var_array = array(
            "page_title" => $this->getTitle( "certify_mobile" ),
            "smsstatus" => $model->sms_config['flag']
        );
        unset( $model );
        TPL::assign( $var_array );
        if ( $this->halttype == "jdbox" )
        {
            TPL::display( $this->uctpl."certify_jdbox.tpl" );
        }
        else
        {
            TPL::display( $this->uctpl."certify.tpl" );
        }
    }

    public function control_video( )
    {
        if ( $this->u['videorz'] == 1 )
        {
            XHandle::halt( "对不起，您已通过视频认证，请不要重复操作。", "", 1 );
        }
        $var_array = array(
            "page_title" => $this->getTitle( "certify_video" )
        );
        TPL::assign( $var_array );
        if ( $this->halttype == "jdbox" )
        {
            TPL::display( $this->uctpl."certify_jdbox.tpl" );
        }
        else
        {
            TPL::display( $this->uctpl."certify.tpl" );
        }
    }

    public function control_editmobile( )
    {
        $var_array = array(
            "page_title" => $this->getTitle( "certify_mobile" )
        );
        TPL::assign( $var_array );
        if ( $this->halttype == "jdbox" )
        {
            TPL::display( $this->uctpl."certify_jdbox.tpl" );
        }
        else
        {
            TPL::display( $this->uctpl."certify.tpl" );
        }
    }

    public function control_sendvalidemail( )
    {
        if ( $this->u['emailrz'] == 1 )
        {
            XHandle::halt( "对不起，您的邮箱已经通过验证，请不要重复操作！", "", 1 );
        }
        $model = parent::model( "mail", "am" );
        $result = $model->sendValid( parent::$wrap_user['userid'] );
        unset( $model );
        if ( TRUE === $result )
        {
            if ( $this->halttype == "jdbox" )
            {
                XHandle::jqdialog( "验证邮件已发送到您的邮箱，请在24小时内查收。", 1 );
            }
            else
            {
                XHandle::halt( "验证邮件已发送到您的邮箱，请在24小时内查收", $this->ucfile."?c=certify", 0 );
            }
        }
        else
        {
            XHandle::halt( "对不起，邮件发送失败，请检查您的邮箱地址是否正确。", "", 1 );
        }
    }

    public function control_sendcheckcode( )
    {
        $service = parent::service( "certify", "us" );
        $mobile = $service->validMobile( );
        unset( $service );
        if ( $mobile == $this->u['mobile'] && $this->u['mobilerz'] == 1 )
        {
            XHandle::halt( "对不起，该手机号码已经通过验证，请不要重复操作。", "", 1 );
        }
        $model = parent::model( "certify", "um" );
        list( $result, $message ) = $mobile->doSendMobile( $mobile );
        unset( $model );
    }

    public function control_rzmobile( )
    {
        $service = parent::service( "certify", "us" );
        list( $mobile, $salt ) = $service->validRzMobile( );
        unset( $service );
        $model = parent::model( "certify", "um" );
        $result = $model->doValidMobile( $mobile, $salt );
        unset( $model );
        if ( TRUE === $result )
        {
            if ( $this->halttype == "jdbox" )
            {
                XHandle::jqdialog( "手机号码验证成功", 1 );
            }
            else
            {
                XHandle::halt( "手机号码验证成功", $this->ucfile."?c=certify", 0 );
            }
        }
        else
        {
            XHandle::halt( "手机号码验证失败", "", 1 );
        }
    }

    public function control_saveupload( )
    {
        $service = parent::service( "certify", "us" );
        list( $type, $uploadpart ) = $service->validUpload( );
        unset( $service );
        $model_upload = parent::model( "upload", "am" );
        $data = $model_upload->doSaveUpload( $uploadpart, "certify", "thumbfiles", "" );
        if ( is_array( $data ) )
        {
            $args = array(
                "certifytype" => $type,
                "thumbfiles" => $data['thumbfiles'],
                "uploadfiles" => $data['source']
            );
            $model = parent::model( "certify", "um" );
            $result = $model->doAdd( $args );
            unset( $model );
            if ( TRUE === $result )
            {
                if ( $this->halttype == "jdbox" )
                {
                    XHandle::jqdialog( "上传成功", 1 );
                }
                else
                {
                    XHandle::halt( "上传成功", $this->ucfile."?c=certify", 0 );
                }
            }
            unset( $result );
            unset( $args );
        }
        else
        {
            $model_upload->noteError( $data );
        }
        unset( $model_upload );
        unset( $data );
    }

    public function control_del( )
    {
        $service = parent::service( "certify", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "certify", "um" );
        $result = $model->doDel( $id );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=certify", 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
