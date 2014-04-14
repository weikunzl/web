<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control {
private $action = null;
private function _new() {
$this->action = X::action('passport','ia');
}
private function _unset() {
unset($this->action);
}
public function control_run() {}
public function control_reg() {
$this->_new();
$this->action->action_reg();
$this->_unset();
}
public function control_perfect() {
$this->_new();
$this->action->action_perfect();
$this->_unset();
}
public function control_saveperfect() {
$this->_new();
$this->action->action_saveperfect();
$this->_unset();
}
public function control_login() {
$this->_new();
$this->action->action_login();
$this->_unset();
}
public function control_jdlogin() {
$this->_new();
$this->action->action_jdlogin();
$this->_unset();
}
public function control_valid() {
$this->_new();
$this->action->action_valid();
$this->_unset();
}
public function control_forget() {
$this->_new();
$this->action->action_forget();
$this->_unset();
}
public function control_getpass() {
$this->_new();
$this->action->action_getpass();
$this->_unset();
}
public function control_logout() {
$this->_new();
$this->action->action_logout();
$this->_unset();
}
public function control_regpost() {
$this->_new();
$this->action->action_regpost();
$this->_unset();
}
public function control_loginpost() {
$this->_new();
$this->action->action_loginpost();
$this->_unset();
}
public function control_forgetpost() {
$this->_new();
$this->action->action_forgetpost();
$this->_unset();
}
public function control_changepost() {
$this->_new();
$this->action->action_changepost();
$this->_unset();
}
public function control_setmonolog() {
$this->_new();
$this->action->action_setmonolog();
$this->_unset();
}
public function control_savemonolog() {
$this->_new();
$this->action->action_savemonolog();
$this->_unset();
}
public function control_setcontact() {
$this->_new();
$this->action->action_setcontact();
$this->_unset();
}
public function control_savecontact() {
$this->_new();
$this->action->action_savecontact();
$this->_unset();
}
public function control_uploadavatar() {
$this->_new();
$this->action->action_uploadavatar();
$this->_unset();
}
public function control_saveupload() {
$this->_new();
$this->action->action_saveupload();
$this->_unset();
}
public function control_setavatar() {
$this->_new();
$this->action->action_setavatar();
$this->_unset();
}
public function control_saveavatar() {
$this->_new();
$this->action->action_saveavatar();
$this->_unset();
}
public function control_setcond() {
$this->_new();
$this->action->action_setcond();
$this->_unset();
}
public function control_savecond() {
$this->_new();
$this->action->action_savecond();
$this->_unset();
}
}
?>