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

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    public function control_run( )
    {
        $this->checkAuth( "oauth_volist" );
        $searchsql = "";
        $model = parent::model( "oauth", "am" );
        list( $total, $data ) = $model->getList( );
        unset( $model );
        $var_array = array(
            "total" => $total,
            "oauth" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."oauth.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "oauth_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "oauth", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "oauth" => $data,
                "id" => $id
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."oauth.tpl" );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "oauth_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "oauth", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "oauth_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=oauth", 0 );
        }
        else
        {
            $this->log( "oauth_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "authname", "appid", "appkey", "secret", "flag", "orders", "intro" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['authname'] ) )
        {
            XHandle::halt( "登录名称不能为空", "", 1 );
        }
        $args['flag'] = intval( $args['flag'] );
        $args['orders'] = intval( $args['orders'] );
        return array( $id, $args );
    }

    private function _validID( $id )
    {
        if ( empty( $id ) )
        {
            XHandle::halt( "ID丢失，请选择要操作的ID", "", 1 );
        }
    }

}

?>
