<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class paymentIAction extends indexbase {
private $service = null;
private $id = 0;
private $amount = 0;
private $payment = null;
private $backdata = null;
private function _new() {
$this->service = parent::service('payment','is');
}
private function _unset() {
unset($this->service);
}
private function _getSubmitItems() {
$this->_new();
list($this->id,$this->amount,$uid) = $this->service->validSubmit();
$this->_unset();
$payment_model = parent::model('payment','im');
$this->payment = $payment_model->getOneData($this->id);
unset($payment_model);
if (empty($this->payment)) {
XHandle::halt('载入Payment配置信息失败！','',1);
}
else {
if (!in_array($this->payment['sdkname'],array('alipay','alipaydual','wangyin','tenpay','paypal'))) {
XHandle::halt('载入不允许的支付Module '.$this->payment['sdkname'].'');
}
$this->payment['userid'] = $uid;
$this->payment['amount'] = $this->amount;
}
}
private function _getCallBackItems() {
$this->_new();
$this->backdata = $this->service->validCallBack();
$this->_unset();
$payment_model = parent::model('payment','im');
$this->payment = $payment_model->getOneData(intval($this->backdata['payment_id']));
unset($payment_model);
if (empty($this->payment)) {
XHandle::halt('载入Payment配置信息失败！','',1);
}
else {
if (!in_array($this->payment['sdkname'],array('alipay','alipaydual','wangyin','tenpay','paypal'))) {
XHandle::halt('载入不允许的支付Module '.$this->payment['sdkname'].'');
}
}
}
public function action_submit() {
$this->_getSubmitItems();
$model_sdk = parent::model($this->payment['sdkname'],'im');
$model_sdk->_get($this->payment);
$model_sdk->doSubmit();
unset($model_sdk);
}
public function action_callback() {
$this->_getCallBackItems();
$model_sdk = parent::model($this->payment['sdkname'],'im');
$model_sdk->_get($this->payment,$this->backdata);
$model_sdk->doCallBack();
unset($model_sdk);
}
}
?>