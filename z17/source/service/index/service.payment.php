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
class paymentIService extends X
{

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "对不起，ID错误！", "", 1 );
        }
        return $id;
    }

    public function validSubmit( )
    {
        $id = $this->validID( );
        $amount = XRequest::getargs( "quantity" );
        if ( FALSE === XValid::isnumber( $amount ) )
        {
            XHandle::halt( "充值金额格式不正确！", "", 1 );
        }
        else
        {
            $amount = number_format( $amount, 2, ".", "" );
            if ( $amount <= 0 )
            {
                XHandle::halt( "对不起，充值金额必须大于0，且最多只能2位小数", "", 1 );
            }
        }
        $userid = XRequest::getint( "userid" );
        if ( $userid < 1 )
        {
            XHandle::halt( "对不起，充值会员ID丢失！", "", 1 );
        }
        return array(
            $id,
            $amount,
            $userid
        );
    }

    public function validCallBack( )
    {
        $back_args = array( );
        if ( isset( $_GET['v_oid'] ) || isset( $_POST['v_oid'] ) )
        {
            $back_args = $this->_validWangyin( );
        }
        if ( isset( $_GET['out_trade_no'] ) || isset( $_POST['out_trade_no'] ) )
        {
            $back_args = $this->_validAliay( );
        }
        if ( isset( $_GET['sp_billno'] ) || isset( $_POST['sp_billno'] ) )
        {
            $back_args = $this->_validTenpay( );
        }
        if ( isset( $_GET['tx'] ) || isset( $_POST['tx'] ) )
        {
            $back_args = $this->_validPaypal( );
        }
        return $back_args;
    }

    private function _validWangyin( )
    {
        $args = XRequest::getgpc( array( "v_oid", "v_pmode", "v_pstatus", "v_pstring", "v_amount", "v_moneytype", "remark1", "remark2", "v_md5str" ) );
        $args['remark1'] = intval( $args['remark1'] );
        $args['remark2'] = intval( $args['remark2'] );
        if ( FALSE === XValid::isnumber( $args['v_oid'] ) )
        {
            XHandle::halt( "对不起，充值单号错误，无法完成在线充值！", "", 1 );
        }
        if ( FALSE === XValid::isnumber( $args['v_amount'] ) )
        {
            XHandle::halt( "对不起，充值金额有错，无法完成在线充值！", "", 1 );
        }
        else if ( $args['v_amount'] <= 0 )
        {
            XHandle::halt( "对不起，充值金额有错，无法完成在线充值！", "", 1 );
        }
        if ( $args['remark1'] < 1 )
        {
            XHandle::halt( "对不起，充值会员ID有错，无法完成在线充值！", "", 1 );
        }
        if ( $args['remark2'] < 1 )
        {
            XHandle::halt( "对不起，充值方式ID有错，无法完成在线充值！", "", 1 );
        }
        $args['payment_id'] = $args['remark2'];
        $args['userid'] = $args['remark1'];
        $args['amount'] = $args['v_amount'];
        $args['paynum'] = $args['v_oid'];
        unset( $args['remark2'] );
        unset( $args['remark1'] );
        unset( $args['v_amount'] );
        unset( $args['v_oid'] );
        $args['v_pmode'] = XHandle::gbktoutf( $args['v_pmode'] );
        $args['v_pstring'] = XHandle::gbktoutf( $args['v_pstring'] );
        return $args;
    }

    public function _validAliay( )
    {
        $paynum = XRequest::getargs( "out_trade_no" );
        $realamount = XRequest::getargs( "total_fee" );
        if ( FALSE === XValid::isnumber( $paynum ) )
        {
            XHandle::halt( "对不起，支付单号有错，无法完成在线充值！" );
        }
        if ( FALSE === XValid::isnumber( $realamount ) )
        {
            XHandle::halt( "对不起，充值金额有错，无法完成在线充值！", "", 1 );
        }
        else if ( $realamount <= 0 )
        {
            XHandle::halt( "对不起，充值金额有错，无法完成在线充值！", "", 1 );
        }
        $model_payment = parent::model( "payment", "im" );
        $args = $model_payment->getOnePaymentLog( $paynum );
        unset( $model_payment );
        if ( !empty( $args ) )
        {
            $args['amount'] = $realamount;
            return $args;
        }
        XHandle::halt( "对不起，支付单号不存在！无法完成在线充值！", "", 1 );
        return $args;
    }

    public function _validTenpay( )
    {
        $paynum = XRequest::getargs( "sp_billno" );
        $realamount = XRequest::getargs( "total_fee" );
        if ( FALSE === XValid::isnumber( $paynum ) )
        {
            XHandle::halt( "对不起，支付单号有错，无法完成在线充值！" );
        }
        if ( !XValid::isnumber( $realamount ) )
        {
            XHandle::halt( "对不起，充值金额有错，无法完成在线充值！", "", 1 );
        }
        else if ( $realamount <= 0 )
        {
            XHandle::halt( "对不起，充值金额有错，无法完成在线充值！", "", 1 );
        }
        $model_payment = parent::model( "payment", "im" );
        $args = $model_payment->getOnePaymentLog( $paynum );
        unset( $model_payment );
        if ( !empty( $args ) )
        {
            $args['amount'] = $realamount;
            return $args;
        }
        XHandle::halt( "对不起，支付单号不存在！无法完成在线充值！", "", 1 );
        return $args;
    }

    private function _validPaypal( )
    {
        $args = array( );
        $request_array = XRequest::getgpc( array( "tx", "st", "amt", "cc", "item_number" ) );
        if ( empty( $request_array['tx'] ) )
        {
            XHandle::halt( "对不起，Paypal交易单号错误！", "", 1 );
        }
        if ( FALSE === XValid::isnumber( $request_array['item_number'] ) )
        {
            XHandle::halt( "对不起，支付单号有误！无法完成在线充值。", "", 1 );
        }
        $request_array['amt'] = floatval( $request_array['amt'] );
        $model_payment = parent::model( "payment", "im" );
        $args = $model_payment->getOnePaymentLog( $request_array['item_number'] );
        unset( $model_payment );
        if ( !empty( $args ) )
        {
            $args['amount'] = $request_array['amt'];
            $args['paynum'] = $request_array['item_number'];
            $args = array_merge( $args, $request_array );
            return $args;
        }
        XHandle::halt( "对不起，支付单号不存在！无法完成在线充值！", "", 1 );
        return $args;
    }

}

?>
