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
        $var_array = array(
            "page_title" => $this->getTitle( "profile_edit" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."profile.tpl" );
    }

    public function control_more( )
    {
        $var_array = array(
            "page_title" => $this->getTitle( "profile_edit" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."profile.tpl" );
    }

    public function control_monolog( )
    {
        $var_array = array(
            "page_title" => $this->getTitle( "profile_edit" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."profile.tpl" );
    }

    public function control_contact( )
    {
        $var_array = array(
            "page_title" => $this->getTitle( "profile_edit" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."profile.tpl" );
    }

    public function control_savebase( )
    {
        $service = parent::service( "profile", "us" );
        $args = $service->validBaseProfile( );
        unset( $service );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditBaseProfile( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "修改成功", $this->ucfile."?c=profile", 0 );
        }
        else
        {
            XHandle::halt( "修改失败", "", 1 );
        }
    }

    public function control_savemore( )
    {
        $service = parent::service( "profile", "us" );
        $args = $service->validMoreProfile( );
        unset( $service );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditMoreProfile( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "修改成功", $this->ucfile."?c=profile&a=more", 0 );
        }
        else
        {
            XHandle::halt( "修改失败", "", 1 );
        }
    }

    public function control_savemonolog( )
    {
        $service = parent::service( "profile", "us" );
        $content = $service->validMonolog( );
        unset( $service );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditMonolog( $content );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "修改成功", $this->ucfile."?c=profile&a=monolog", 0 );
        }
        else
        {
            XHandle::halt( "修改失败", "", 1 );
        }
    }

    public function control_savecontact( )
    {
        $service = parent::service( "profile", "us" );
        $args = $service->validContact( );
        unset( $service );
        $model = parent::model( "profile", "um" );
        $result = $model->doEditContact( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "修改成功", $this->ucfile."?c=profile&a=contact", 0 );
        }
        else
        {
            XHandle::halt( "修改失败", "", 1 );
        }
    }

}

?>
