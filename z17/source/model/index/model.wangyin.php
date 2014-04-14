<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class wangyinIModel extends X {
private $title= '在线充值';
private $payment =null;
private $back = null;
private $back_url = null;
private $debug = 0;
private $currency = 'CNY';
public function _get($paymentdata,$backdata = null) {
$this->payment = $paymentdata;
$this->back = $backdata;
$this->back_url = parent::$cfg['siteurl'].'index.php';
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
$url = 'https://pay3.chinabank.com.cn/PayGate?encoding=UTF-8'.
'&v_mid='.$this->payment['appid'].
'&v_oid='.$paynum.
'&v_amount='.$this->payment['amount'].
'&v_moneytype='.$this->currency.
'&v_url='.urlencode($this->back_url).
'&v_md5info='.$v_md5info.
'&remark1='.$this->payment['userid'].
'&remark2='.$this->payment['payment_id'].
'&v_rcvnam='.urlencode($this->title);
header("Location:{$url}");
}
public function doCallBack() {
$this->_initSDK();
$md5string = strtoupper(md5($this->back['paynum'].$this->back['v_pstatus'].$this->back['amount'].$this->back['v_moneytype'].$this->payment['appkey']));
if ($md5string != $this->back['v_md5str']) {
XHandle::halt('对不起，网银密钥验证失败！！','',1);
}
if ($this->back['v_pstatus'] == '20') {
$model_payment = parent::model('payment','im');
$notic_array = array(
'realamount'=>$this->back['amount'],
'dealnum'=>$this->back['paynum'],
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
'tradeno'=>'',
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
}
?>