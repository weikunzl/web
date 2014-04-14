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
        $this->checkAuth( "netpay_volist" );
        $searchsql = "";
        $model = parent::model( "netpay", "am" );
        list( $total, $data ) = $model->getList( );
        unset( $model );
        $var_array = array(
            "total" => $total,
            "netpay" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."netpay.tpl" );
    }

    public function control_allpayment( )
    {
        $this->checkAuth( "netpay_volist" );
        $searchsql = "";
        $model = parent::model( "netpay", "am" );
        list( $total, $data ) = $model->getPluginList( );
        unset( $model );
        $var_array = array(
            "total" => $total,
            "netpay" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."netpay.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "netpay_add" );
        $pluginid = XRequest::getint( "pluginid" );
        if ( $pluginid < 1 )
        {
            XHandle::halt( "载入添加页面错误！", "", 1 );
        }
        $model = parent::model( "netpay", "am" );
        $payment = $model->getPluginData( $pluginid );
        unset( $model );
        if ( empty( $payment ) )
        {
            XHandle::halt( "载入添加页面错误！", "", 1 );
        }
        else
        {
            $var_array = array(
                "pluginid" => $pluginid,
                "payment" => $payment
            );
        }
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."netpay.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "netpay_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "netpay", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "netpay" => $data,
                "id" => $id
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."netpay.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "netpay_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "netpay", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "netpay_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=netpay", 0 );
        }
        else
        {
            $this->log( "netpay_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "netpay_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "netpay", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "netpay_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=netpay", 0 );
        }
        else
        {
            $this->log( "netpay_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "netpay_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "netpay", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "netpay_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=netpay", 0 );
        }
        else
        {
            $this->log( "netpay_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "pluginid", "mentname", "authid", "privatekey", "intro", "authaccount", "poundagetype", "poundage", "flag", "orders" ) );
        if ( empty( $args['mentname'] ) )
        {
            XHandle::halt( "支付名称不能为空", "", 1 );
        }
        $args['pluginid'] = intval( $args['pluginid'] );
        $args['poundagetype'] = intval( $args['poundagetype'] );
        $args['poundage'] = floatval( $args['poundage'] );
        $args['flag'] = intval( $args['flag'] );
        $args['orders'] = intval( $args['orders'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "mentname", "authid", "privatekey", "authaccount", "intro", "poundagetype", "poundage", "flag", "orders" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['mentname'] ) )
        {
            XHandle::halt( "支付名称不能为空", "", 1 );
        }
        $args['poundagetype'] = intval( $args['poundagetype'] );
        $args['poundage'] = floatval( $args['poundage'] );
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
