<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends wapbase {
private $service = null;
private $_tplfile = null;
private function _new() {
$this->service = parent::service('cp','ws');
}
private function _unset() {
unset($this->service);
}
public function control_run() {}
public function control_hi() {
$this->checkLogin();
if (parent::$wrap_user['userid'] == 0) {
XHandle::redirect($this->wapfile);
}
$this->_new();
$touid = $this->service->validToUid();
$this->_unset();
$model_userauth = parent::model('userauth','um');
if (true === $model_userauth->checkLimitAvatarRized($this->login_infowrap['avatar'],$this->login_infowrap['avatarflag'])) {
XHandle::wapHalt('对不起，您还没上传头像或者未通过审核，无法执行此操作！','',1);
}
if (true === $model_userauth->checkLimitEmailRized($this->login_infowrap['emailrz'])) {
XHandle::wapHalt('对不起，您的邮箱还没通过验证，无法执行此操作！','',1);
}
unset($model_userauth);
$model_user = parent::model('user','um');
$touser = $model_user->getUserSimpleInfo($touid);
unset($model_user);
if (empty($touser)) {
XHandle::wapHalt('对不起，对方信息不存在或已删除！','',1);
}
else {
$model_hi = parent::model('hi','um');
$greet_id = $model_hi->getRndGreetID($touser['gender']);
$result = $model_hi->doSaveHi($touid,$greet_id);
unset($model_hi);
if (true == $result) {
$forward = $_SERVER['HTTP_REFERER'];
if (empty($forward)) {
$forward = $this->wapfile;
}
XHandle::wapHalt('打招呼成功',$forward,0);
}
else {
XHandle::wapHalt('打招呼失败','',1);
}
}
}
public function control_writemsg() {
$this->checkLogin();
$this->_new();
$touid = $this->service->validToUid();
$this->_unset();
$model_userauth = parent::model('userauth','um');
if (true === $model_userauth->checkLimitAvatarRized($this->login_infowrap['avatar'],$this->login_infowrap['avatarflag'])) {
XHandle::wapHalt('对不起，您还没上传头像或者未通过审核，无法执行此操作！','',1);
}
if (true === $model_userauth->checkLimitEmailRized($this->login_infowrap['emailrz'])) {
XHandle::wapHalt('对不起，您的邮箱还没通过验证，无法执行此操作！','',1);
}
unset($model_userauth);
$model_user = parent::model('user','um');
$touser = $model_user->getUserSimpleInfo($touid);
unset($model_user);
if (empty($touser)) {
XHandle::wapHalt('对不起，对方信息不存在或已删除！','',1);
}
else {
$model = parent::model('message','um');
$paystatus = $model->checkWriteNeedPay($touser['gender'],$this->login_groupwrap['msg']);
unset($model);
$var_array = array(
'page_title'=>'写信件-会员中心',
'touser'=>$touser,
'touid'=>$touid,
'paystatus'=>$paystatus,
'fee'=>$this->login_groupwrap['fee']['sendmsgfee'],
);
}
$this->_tplfile = $this->getTPLFile('cp_writemsg');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
public function control_savewrite() {
$paymoney = 0;
$this->checkLogin();
if (parent::$wrap_user['userid'] == 0) {
XHandle::redirect($this->wapfile);
die();
}
$this->_new();
$touid = $this->service->validToUid();
$message = $this->service->validContent();
$this->_unset();
$model_user = parent::model('user','um');
$touser = $model_user->getUserSimpleInfo($touid);
unset($model_user);
if (empty($touser)) {
XHandle::wapHalt('对不起，收件人信息不存在或已删除！','',1);
}
$model = parent::model('message','um');
$needpay = $model->checkWriteNeedPay($touser['gender'],$this->login_groupwrap['msg']);
if (true === $needpay) {
$paymoney = floatval($this->login_groupwrap['fee']['sendmsgfee']);
if ($paymoney <= 0) {
$paymoney = 1;
}
if (parent::$wrap_user['money'] <$paymoney) {
XHandle::wapHalt('金币不足，无法写信件。','',1);
}
}
$result = $model->doWriteMsg($message,$touid,$touser['gender'],$touser['username'],$paymoney,array('g'=>$this->login_groupwrap));
unset($model);
if (true === $result) {
$forward = $_SERVER['HTTP_REFERER'];
if (empty($forward)) {
$forward = $this->wapfile;
}
XHandle::wapHalt('信件发送成功',$forward,0);
}
else {
XHandle::wapHalt('信件发送失败','',1);
}
}
public function control_listen() {
$this->checkLogin();
$this->_new();
$touid = $this->service->validToUid();
$this->_unset();
$m_listen = parent::model('listen','um');
$result = $m_listen->doAjListen($touid,$this->login_groupwrap);
unset($m_listen);
if ($result == 1) {
$error = '对不起，对方ID不能为自己';
}
elseif ($result == 2) {
$error = '对不起，所在会员组关注好友数已满';
}
elseif ($result == 3) {
$error = '对不起，该会员已关注，请不要重复操作';
}
elseif ($result == 5) {
$error = '关注失败';
}
if (!empty($error)) {
XHandle::wapHalt($error,'',1);
}
else {
$forward = $_SERVER['HTTP_REFERER'];
if (empty($forward)) {
$forward = $this->wapfile;
}
XHandle::wapHalt('关注成功',$forward,0);
}
}
}
?>