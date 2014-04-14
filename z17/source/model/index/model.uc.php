<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class ucIModel extends X {
private $uc_inc_file = './source/conf/ucenter.inc.php';
public $uc_Integration = false;
public $ucinfo = array();
private function _initUC() {
if (file_exists(BASE_ROOT.$this->uc_inc_file)) {
require_once BASE_ROOT.$this->uc_inc_file;
if (true === OE_UC_FLAG) {
$this->uc_Integration = true;
require_once BASE_ROOT.'./uc_client/client.php';
}
}
}
public function inteLogin($loginname,$password) {
$this->_initUC();
if (true === $this->uc_Integration) {
if (true === XValid::isEmail($loginname)) {
$logintype = 2;
}
else {
$logintype = 0;
}
if (UC_CHARSET != OESOFT_CHARSET) {
$uc_loginname = XHandle::utfToGbk($loginname);
}
else {
$uc_loginname = $loginname;
}
$this->ucinfo = uc_user_login($uc_loginname,$password,$logintype,0);
if ($this->ucinfo[0] >0) {
$this->_loginUcToLove($password);
}
}
}
private function _loginUcToLove($password) {
if ($this->ucinfo[0] >0) {
if (UC_CHARSET != OESOFT_CHARSET) {
$uc_name = XHandle::gbkToUtf($this->ucinfo[1]);
}
else {
$uc_name = $this->ucinfo[1];
}
$uc_name = XFilter::filterBadChar($uc_name);
$love_sql = "SELECT `userid`, `password` FROM ".DB_PREFIX."user WHERE `username`='{$uc_name}'";
$love_data = parent::$obj->fetch_first($love_sql);
if (!empty($love_data)) {
if ($love_data['password'] != md5($password)) {
parent::$obj->update(DB_PREFIX.'user',array('password'=>md5($password)),"`userid`='".$love_data['userid']."'");
}
}
else {
$main_args = array(
'username'=>$uc_name,
'password'=>$password,
'integrity'=>0,
);
$profile_args = array();
$params_args = array();
$m_passport = parent::model('passport','im');
$m_passport->doReg($main_args,$profile_args,null,$params_args);
unset($m_passport);
}
unset($love_data);
}
}
public function inteLoginReg($loginname,$password) {
$this->_initUC();
if (true === $this->uc_Integration) {
$result = 0;
$love_sql = "SELECT `username`, `email` FROM ".DB_PREFIX."user";
if (true === XValid::isEmail($loginname)) {
$love_sql .= " WHERE `email`='{$loginname}'";
}
else {
$love_sql .= " WHERE `username`='{$loginname}'";
}
$love_data = parent::$obj->fetch_first($love_sql);
if (!empty($love_data)) {
if (UC_CHARSET != OESOFT_CHARSET) {
$uc_name = XHandle::utfToGbk($love_data['username']);
}
else {
$uc_name = $love_data['username'];
}
$result = uc_user_register($uc_name,$password,$love_data['email']);
}
unset($love_data);
return $result;
}
}
public function inteEditPassword($name,$password) {
$this->_initUC();
if (true === $this->uc_Integration) {
$result = 0;
$username = '';
if (true === XValid::isEmail($name)) {
$love_sql = "SELECT `username` FROM ".DB_PREFIX."user".
" WHERE `email`='{$name}'";
$love_data = parent::$obj->fetch_first($love_sql);
if (!empty($love_data)) {
$username = trim($love_data['username']);
}
unset($love_data);
}
else {
$username = $name;
}
if (!empty($username)) {
if (UC_CHARSET != OESOFT_CHARSET) {
$uc_name = XHandle::utfToGbk($username);
}
else {
$uc_name = $username;
}
$result = uc_user_edit($uc_name,'',$password,'',1);
}
unset($love_data);
return $result;
}
}
public function inteLogout() {
$this->_initUC();
if (true === $this->uc_Integration) {
uc_user_synlogout();
}
}
public function inteReg($username,$password,$email) {
$this->_initUC();
$result = 0;
if (true === $this->uc_Integration) {
if (UC_CHARSET != OESOFT_CHARSET) {
$uc_name = XHandle::utfToGbk($username);
}
else {
$uc_name = $username;
}
$result = uc_user_register($uc_name,$password,$email);
}
return $result;
}
public function checkUserName($username) {
$this->_initUC();
$result = 0;
if (true === $this->uc_Integration) {
if (UC_CHARSET != OESOFT_CHARSET) {
$uc_name = XHandle::utfToGbk($username);
}
else {
$uc_name = $username;
}
$result = uc_user_checkname($uc_name);
}
return $result;
}
public function checkEmail($email) {
$this->_initUC();
$result = 0;
if (true === $this->uc_Integration) {
$result = uc_user_checkemail($email);
}
return $result;
}
}
?>