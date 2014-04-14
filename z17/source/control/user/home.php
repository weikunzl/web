<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control extends userbase {
private $uid = NULL;
private function _getItems() {
$service = parent::service('home','us');
$this->uid = $service->validUid();
unset($service);
}
public function control_run(){}
public function control_contact() {
$this->_getItems();
$model = parent::model('home','um');
$can_view = $model->checkPayContact($this->uid);
if (true === $can_view) {
XHandle::redirect($this->ucfile.'?c=home&a=viewcontact&uid='.$this->uid.'&halttype='.$this->halttype);
}
else {
$home_data = $model->getHomeInfo($this->uid);
if (empty($home_data)) {
XHandle::artTips('','对不起，会员资料不存在或已删除！');
}
else {
if (intval($home_data['privacy']) == 4) {
XHandle::artTips('','对不起，会员设置了联系方式保密！');
}
$var_array = array(
'home'=>$home_data,
'uid'=>$this->uid,
);
TPL::assign($var_array);
TPL::display($this->uctpl.'home.tpl');
}
}
unset($model);
}
public function control_paycontact() {
$this->_getItems();
$fee = floatval($this->g['fee']['contactfee']);
if ($fee <= 0) {
XHandle::artTips('','支付金币错误');
}
else {
if ($this->u['money'] <$fee) {
XHandle::artTips("","对不起，您的金币不足支付本次费用，<a href='".$this->ucfile."?c=payment' target='_top'>请先充值</a>！");
}
$model = parent::model('home','um');
$result = $model->doPayContact($this->uid,$fee);
unset($model);
if (true === $result) {
XHandle::redirect($this->ucfile.'?c=home&a=viewcontact&uid='.$this->uid.'&halttype='.$this->halttype.'');
}
else {
XHandle::artTips('','操作失败');
}
}
}
public function control_viewcontact() {
$this->_getItems();
$result = false;
$model = parent::model('home','um');
if (intval($this->g['view']['viewcontact'] == 1)) {
$result = true;
}
if (false === $result) {
$can_view = $model->checkPayContact($this->uid);
if (false === $can_view) {
XHandle::redirect($this->ucfile.'?c=home&a=contact&uid='.$this->uid.'&halttype='.$this->halttype);
}
unset($can_view);
}
$home_data = $model->getHomeInfo($this->uid);
if (empty($home_data)) {
XHandle::artTips('','对不起，会员资料不存在或已删除！');
}
else {
if (intval($home_data['privacy']) == 4) {
XHandle::artTips('','对不起，会员设置了联系方式保密！');
}
$var_array = array(
'home'=>$home_data,
'uid'=>$this->uid,
);
TPL::assign($var_array);
TPL::display($this->uctpl.'home.tpl');
}
unset($model);
}
}
?>