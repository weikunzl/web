<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class paypalIModel extends X {
private $title= '在线充值';
private $payment =null;
private $back = null;
private $back_url = null;
private $debug = 0;
private $currency = 'USD';
private $cmd = '_xclick';
private $post_url = "https://www.paypal.com/cgi-bin/webscr";
public function _get($paymentdata,$backdata = null) {
$this->payment = $paymentdata;
$this->back = $backdata;
$this->back_url = parent::$cfg['siteurl'].'index.php?c=payment&a=callback';
}
private function _initSDK() {
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
$time = time();
$text = $this->payment['amount'].$this->currency.
$paynum.$this->payment['appid'].$this->back_url.$this->payment['appkey'];
$v_md5info = strtoupper(md5($text));
$url = $this->post_url.
"?charset=utf-8&cmd=".$this->cmd.
"&business=".$this->payment['appaccount'].
"&item_name=".urlencode($this->title).
"&amount=".$this->payment['amount'].
"&currency_code".$this->currency.
"&item_number=".$paynum;
header("Location:{$url}");
}
public function doCallBack() {
$this->_initSDK();
$res = $this->_getIPN($this->post_url,$this->back['tx'],$this->payment);
if (false === $res) {
XHandle::halt('对不起，支付失败，请联系网站管理员处理！','',1);
}
else {
$token_paynum = trim($res['item_number']);
if ($token_paynum != $this->back['paynum']) {
TPL::display(parent::$tplpath.OESOFT_TPLPRE.'payment_fail.tpl');
}
else {
$amount = floatval($res['mc_gross']);
$model_payment = parent::model('payment','im');
$notic_array = array(
'realamount'=>$amount,
'dealnum'=>$this->back['tx'],
'merchantfee'=>floatval($res['mc_fee']),
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
'amount'=>$amount,
'currency'=>$this->currency,
'tradeno'=>$this->back['tx'],
'color'=>$color,
);
TPL::assign($var_array);
TPL::display(parent::$tplpath.OESOFT_TPLPRE.'payment_success.tpl');
}
}
}
}
private function _getIPN($url,$tx,$payment) {
$result = false;
$url .=	"?charset=utf-8&cmd=".urlencode('_notify-synch').
"&tx=".urlencode($tx).
"&at=".urlencode($payment['appkey']);
$curl = parent::import('curl','util');
if (OESOFT_STYPE == 1) {
$httpResponse = $curl->fileGet($url);
}
else {
$httpResponse = $curl->get($url);
}
unset($curl);
if (empty($httpResponse) ||$httpResponse == 'fail') {
XHandle::halt('对不起，HTTP获取交易结果失败！','',1);
}
else {
$httpResponseAr = explode("\n",$httpResponse);
$httpParsedResponseAr = array();
if (strcmp ($httpResponseAr[0],'SUCCESS') == 0) {
foreach ($httpResponseAr as $i =>$value) {
$tmpAr = explode("=",$value);
if(sizeof($tmpAr) >1) {
$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
}
}
$result = $httpParsedResponseAr;
}
else {
$result = false;
}
}
return $result;
}
}
?>