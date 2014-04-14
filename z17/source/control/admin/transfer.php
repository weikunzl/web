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
        $this->checkAuth( "transfer" );
        $searchsql = "";
        $model = parent::model( "transfer", "am" );
        $data = $model->getConfig( );
        unset( $model );
        $var_array = array(
            "transfer" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."transfer.tpl" );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "transfer" );
        $args = $this->_validEdit( );
        $model = parent::model( "transfer", "am" );
        $result = $model->doSaveConfig( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "transfer", "", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=transfer", 0 );
        }
        else
        {
            $this->log( "transfer", "", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    private function _validEdit( )
    {
        $args = XRequest::getgpc( array( "trade_money", "trade_money_ratio", "trade_points", "trade_points_ratio" ) );
        $args['trade_money'] = intval( $args['trade_money'] );
        $args['trade_money_ratio'] = floatval( $args['trade_money_ratio'] );
        $args['trade_points'] = intval( $args['trade_points'] );
        $args['trade_points_ratio'] = floatval( $args['trade_points_ratio'] );
        return $args;
    }

}

?>
