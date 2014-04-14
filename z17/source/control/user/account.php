<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends userbase {
public function control_run() {
$var_array = array(
'page_title'=>$this->getTitle('account_run'),
);
TPL::assign($var_array);
TPL::display($this->uctpl.'account.tpl');
}
public function control_editpassword() {
$var_array = array(
'page_title'=>$this->getTitle('account_editpassword'),
);
TPL::assign($var_array);
TPL::display($this->uctpl.'account.tpl');
}
public function control_recall() {
$var_array = array(
'page_title'=>$this->getTitle('account_recall'),
);
TPL::assign($var_array);
TPL::display($this->uctpl.'account.tpl');
}
public function control_setstatus() {
$var_array = array(
'page_title'=>$this->getTitle('account_lovestatus'),
);
TPL::assign($var_array);
if ($this->halttype == 'jdbox') {
TPL::display($this->uctpl.'account_jdbox.tpl');
}
else {
TPL::display($this->uctpl.'account.tpl');
}
}
public function control_savepassword() {
$service = parent::service('account','us');
$args = $service->validPassword();
unset($service);
$model = parent::model('account','um');
if (false === $model->doMatchOldPassword($args['oldpassword'])) {
XHandle::halt('对不起，旧密码不正确。','',1);
}
else {
$result = $model->doEditPassword($args['newpassword']);
unset($model);
if (true === $result) {
$uc_model = parent::model('uc','im');
$uc_model->inteEditPassword(parent::$wrap_user['username'],$args['newpassword']);
unset($uc_model);
XHandle::halt('密码修改成功，请记住新密码',$this->ucfile.'?c=account&a=editpassword',0);
}
else {
XHandle::halt('密码修改失败','',1);
}
}
}
public function control_saverecall() {
$service = parent::service('account','us');
$recall = $service->validRecall();
unset($service);
$model = parent::model('account','um');
$result = $model->doEditRecall($recall);
unset($model);
if (true === $result) {
XHandle::halt('设置成功',$this->ucfile.'?c=account&a=recall',0);
}
else {
XHandle::halt('设置失败','',1);
}
}
public function control_savestatus() {
$service = parent::service('account','us');
$lovestatus = $service->validLoveStatus();
unset($service);
$model = parent::model('account','um');
$result = $model->doEditLoveStatus($lovestatus);
unset($model);
if (true === $result) {
if ($this->halttype == 'jdbox') {
XHandle::jqDialog('设置成功',1);
}
else {
XHandle::halt('设置成功',$this->ucfile.'?c=account&a=setstatus',0);
}
}
else {
XHandle::halt('设置失败','',1);
}
}
}
?>