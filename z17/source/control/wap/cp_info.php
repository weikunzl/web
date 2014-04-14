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
class control extends wapbase
{

    private $service = NULL;
    private $_tplfile = NULL;

    private function _new( )
    {
        $this->service = parent::service( "cp", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    public function control_run( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "用户资料-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_editpassword( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改密码-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_password" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_savepassword( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validPassword( );
        $this->_unset( );
        $model = parent::model( "account", "um" );
        if ( FALSE === $model->doMatchOldPassword( $args['oldpassword'] ) )
        {
            XHandle::wapHalt( "对不起，旧密码不正确。", "", 1 );
        }
        else
        {
            $result = $model->doEditPassword( $args['newpassword'] );
            unset( $model );
            if ( TRUE === $result )
            {
                $uc_model = parent::model( "uc", "im" );
                $uc_model->inteEditPassword( parent::$wrap_user['username'], $args['newpassword'] );
                unset( $uc_model );
                XHandle::wapHalt( "密码修改成功，请记住新密码", $this->wapfile."?c=cp_info&a=editpassword", 0 );
            }
            else
            {
                XHandle::wapHalt( "密码修改失败", "", 1 );
            }
        }
    }

    public function control_monolog( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改内心独白-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_monolog" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_savemonolog( )
    {
        $this->checkLogin( );
        $this->_new( );
        $content = $this->service->validMonolog( );
        $this->_unset( );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditMonolog( $content );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=monolog", 0 );
        }
        else
        {
            XHandle::wapHalt( "修改失败", "", 1 );
        }
    }

    public function control_contact( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改联系方式-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_contact" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_savecontact( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validContact( );
        $this->_unset( );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditContact( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=contact", 0 );
        }
        else
        {
            XHandle::wapHalt( "修改失败", "", 1 );
        }
    }

    public function control_base( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改基本资料-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_base" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_savebase( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validBase( );
        $this->_unset( );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditBaseProfile( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=base", 0 );
        }
        else
        {
            XHandle::wapHalt( "修改失败", "", 1 );
        }
    }

    public function control_profile( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改详细资料-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_profile" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_saveprofile( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validProfile( );
        $this->_unset( );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditMoreProfile( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=profile", 0 );
        }
        else
        {
            XHandle::wapHalt( "修改失败", "", 1 );
        }
    }

    public function control_area( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改地区-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_area" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_dist1( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改所在地区-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_area" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_dist2( )
    {
        $this->checkLogin( );
        $this->_new( );
        $dist1 = $this->service->validDist1( );
        $this->_unset( );
        $var_array = array(
            "page_title" => "修改所在地区-会员中心",
            "dist1" => $dist1
        );
        $this->_tplfile = $this->getTPLFile( "cp_info_area" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_dist3( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validDist2( );
        $this->_unset( );
        $model_area = parent::model( "area", "am" );
        if ( TRUE === $model_area->checkExistsChild( $args['cityid'] ) )
        {
            $var_array = array(
                "page_title" => "修改所在地区-会员中心",
                "args" => $args
            );
            $this->_tplfile = $this->getTPLFile( "cp_info_area" );
            TPL::assign( $var_array );
            TPL::display( $this->_tplfile );
        }
        else
        {
            $args['distid'] = 0;
            $model = parent::model( "profile", "um" );
            $result = $model->doEditArea( $args );
            unset( $model );
            if ( TRUE === $result )
            {
                XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=area", 0 );
            }
            else
            {
                XHandle::wapHalt( "修改失败", "", 1 );
            }
        }
        unset( $model_area );
    }

    public function control_savedist( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validArea( );
        $this->_unset( );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditArea( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=area", 0 );
        }
        else
        {
            XHandle::wapHalt( "修改失败", "", 1 );
        }
    }

    public function control_hometown1( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "修改户籍地区-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_area" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_hometown2( )
    {
        $this->checkLogin( );
        $this->_new( );
        $nationprovinceid = $this->service->validHomeTownProvinceID( );
        $this->_unset( );
        $var_array = array(
            "page_title" => "修改户籍地区-会员中心",
            "nationprovinceid" => $nationprovinceid
        );
        $this->_tplfile = $this->getTPLFile( "cp_info_area" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_savehometown( )
    {
        $this->checkLogin( );
        $this->_new( );
        $args = $this->service->validHomeTownArea( );
        $this->_unset( );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditHomeTown( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "修改成功", $this->wapfile."?c=cp_info&a=area", 0 );
        }
        else
        {
            XHandle::wapHalt( "修改失败", "", 1 );
        }
    }

    public function control_avatar( )
    {
        $this->checkLogin( );
        $var_array = array( "page_title" => "设置形象照-会员中心" );
        $this->_tplfile = $this->getTPLFile( "cp_info_avatar" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_saveavatar( )
    {
        $this->checkLogin( );
        $this->_new( );
        $uploadpart = $this->service->validAvatar( );
        $this->_unset( );
        $model_upload = parent::model( "upload", "am" );
        $data = $model_upload->doSaveUpload( $uploadpart, "avatar", "avatar", parent::$wrap_user['userid'] );
        unset( $model_upload );
        if ( is_array( $data ) )
        {
            $model = parent::model( "passport", "wm" );
            $model->doSaveAvatar( $data['thumbfiles'] );
            unset( $model );
            XHandle::wapHalt( "形象照上传成功", $this->wapfile."?c=cp_info&a=avatar", 0 );
        }
        else
        {
            XHandle::wapHalt( "对不起，形象照上传失败", "", 1 );
        }
    }

}

?>
