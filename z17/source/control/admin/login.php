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
class control extends adminbase
{

    public $comeurl = NULL;

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
		parent::__construct();
        //$FN_-2147483647( );
    }

    public function control_run( )
    {
        TPL::display( $this->cptpl."login.tpl" );
    }

    public function control_login( )
    {
        $info = $this->_validAdminInfo( );
        $model = parent::model( "login", "am" );
        $flag = $model->doLogin( $info['username'], $info['password'] );
        $model->loginLog( );
        unset( $model );
        if ( $flag == 0 )
        {
            XHandle::halt( "未知错误！", "", 1 );
        }
        else if ( $flag == 1 )
        {
            XHandle::halt( "帐号被锁定!", "", 1 );
        }
        else if ( $flag == 2 )
        {
            XHandle::halt( "登录失败!", "", 1 );
        }
        else if ( $flag == 3 )
        {
            XHandle::halt( "登录成功!", $this->cpfile."?c=frame", 0 );
        }
    }

    public function control_logout( )
    {
        $model = parent::model( "login", "am" );
        $model->logout( );
        unset( $model );
        XHandle::halt( "退出成功", $this->cpfile."?c=login", 0 );
    }

    private function _validAdminInfo( )
    {
        $args = XRequest::getgpc( array( "username", "password", "checkcode" ) );
        if ( FALSE === XValid::isuserargs( $args['username'] ) )
        {
            XHandle::halt( "管理员帐号格式不正确", "", 1 );
        }
        if ( FALSE === XValid::islength( $args['username'], 4, 16 ) )
        {
            XHandle::halt( "管理员帐号不正确", "", 1 );
        }
        if ( FALSE === XValid::islength( $args['password'], 4, 16 ) )
        {
            XHandle::halt( "管理员密码格式不正确", "", 1 );
        }
        if ( parent::$cfg['admincode'] == 1 )
        {
            parent::loadutil( "session" );
            if ( $args['checkcode'] != XSession::get( "verifycode" ) )
            {
                XHandle::halt( "验证码不正确", "", 1 );
            }
        }
        unset( $array['checkcode'] );
        return $args;
    }

}

?>
