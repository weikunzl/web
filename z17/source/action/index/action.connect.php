<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class connectIAction extends indexbase {
private $service = null;
private $mod = null;
private $oauth = array();
private function _new() {
$this->service = parent::service('connect','is');
}
private function _unset() {
unset($this->service);
}
private function _getDetailItems() {
$this->_new();
$this->mod = $this->service->validMod();
$this->_unset();
$connect_model = parent::model('connect','im');
$this->oauth = $connect_model->getOneMod($this->mod);
unset($connect_model);
if (empty($this->oauth)) {
XHandle::halt('载入Oauth配置信息失败！','',1);
}
else {
if (!in_array($this->oauth['sdkname'],array('qq','sina'))) {
XHandle::halt('载入不允许的登录Module '.$this->oauth['sdkname'].'','',1);
}
}
}
public function action_submit() {
$this->_getDetailItems();
$model_sdk = parent::model($this->oauth['sdkname'],'im');
$model_sdk->doSubmit($this->oauth);
unset($model_sdk);
}
public function action_callback() {
$this->_getDetailItems();
$model_sdk = parent::model($this->oauth['sdkname'],'im');
$model_sdk->doCallBack($this->oauth);
unset($model_sdk);
}
}
?>