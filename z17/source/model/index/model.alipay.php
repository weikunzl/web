<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class alipayIModel extends X {
private $title= '在线充值';
private $payment =null;
private $back = null;
private $back_url = null;
private $debug = 0;
private $currency = 'CNY';
private $sign_type = 'MD5';
public function _get($paymentdata,$backdata = null) {
$this->payment = $paymentdata;
$this->back = $backdata;
$this->back_url = parent::$cfg['siteurl'].'index.php';
}
private function _initSDK() {
require_once BASE_ROOT.'./source/block/netpay/alipay/alipay_core.function.php';
require_once BASE_ROOT.'./source/block/netpay/alipay/alipay_notify.class.php';
}
public function doSubmit() {
$this->_initSDK();
$model_payment = parent::model('payment','im');
$log_array = array(
'paymentid'=>intval($this->payment['payment_id']),
'amount'=>floatval($this->payment['amount']),
'currency'=>$this->currency,
'userid'=>intval($this->payment['userid']),
);
$paynum = $model_payment->createPaymentLog($log_array);
unset($model_payment);
unset($log_array);
$parameter = array(
'service'=>'create_direct_pay_by_user',
'return_url'=>$this->back_url,
'payment_type'=>'1',
'partner'=>$this->payment['appid'],
'subject'=>$this->title,
'body'=>$this->title,
'out_trade_no'=>$paynum,
'total_fee'=>$this->payment['amount'],
'seller_id'=>$this->payment['appid'],
'_input_charset'=>'utf-8',
);
$para_filter = paraFilter($parameter);
$para_sort = argSort($para_filter);
$mysign = buildMysign($para_sort,$this->payment['appkey'],strtoupper($this->sign_type));
$url = 'https://mapi.alipay.com/gateway.do?_input_charset=utf-8'.
'&body='.urlencode($parameter['body']).
'&out_trade_no='.$parameter['out_trade_no'].
'&partner='.$parameter['partner'].
'&payment_type='.$parameter['payment_type'].
'&return_url='.urlencode($parameter['return_url']).
'&seller_id='.$parameter['seller_id'].
'&service='.$parameter['service'].
'&subject='.urlencode($parameter['subject']).
'&total_fee='.$parameter['total_fee'].
'&sign='.$mysign.
'&sign_type='.$this->sign_type;
header("Location:{$url}");
}
public function doCallBack() {
$this->_initSDK();
$aliapy_config = array(
'partner'=>$this->payment['appid'],
'key'=>$this->payment['appkey'],
'return_url'=>$this->back_url,
'sign_type'=>$this->sign_type,
'input_charset'=>'utf-8',
'transport'=>'http'
);
$alipayNotify = new AlipayNotify($aliapy_config);
$verify_result = $alipayNotify->verifyReturn();
unset($alipayNotify);
if (true === $verify_result) {
$trade_no = XRequest::getArgs('trade_no');
$trade_status = XRequest::getArgs('trade_status');
if ($trade_status == 'TRADE_FINISHED'||$trade_status == 'TRADE_SUCCESS') {
$model_payment = parent::model('payment','im');
$notic_array = array(
'realamount'=>$this->back['amount'],
'dealnum'=>$trade_no,
'merchantfee'=>0,
'errorcode'=>'',
);
$notic_result = $model_payment->noticPayment($this->back['paynum'],$this->back['userid'],$notic_array);
unset($model_payment);
if ($notic_result == 11) {
TPL::display(parent::$tplpath.OESOFT_TPLPRE.'payment_fail.tpl');
}
else {
if ($notic_result == 10) {
$color = 'green';
}
else {
$color = 'blue';
}
$var_array = array(
'title'=>$this->title,
'userid'=>$this->back['userid'],
'paynum'=>$this->back['paynum'],
'amount'=>$this->back['amount'],
'currency'=>$this->currency,
'tradeno'=>$trade_no,
'color'=>$color,
);
TPL::assign($var_array);
TPL::display(parent::$tplpath.OESOFT_TPLPRE.'payment_success.tpl');
}
}
else {
TPL::display(parent::$tplpath.OESOFT_TPLPRE.'payment_fail.tpl');
}
}
else {
XHandle::halt('对不起，支付宝密钥验证失败！','',1);
}
}
}
?>