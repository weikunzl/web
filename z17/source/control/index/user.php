<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control {
private $action = null;
private function _new() {
$this->action = X::action('user','ia');
}
private function _unset() {
unset($this->action);
}
public function control_run() {
$this->_new();
$this->action->action_run();
$this->_unset();
}
public function control_list() {
$this->_new();
$this->action->action_list();
$this->_unset();
}
public function control_advsearch () {
$this->_new();
$this->action->action_advsearch();
$this->_unset();
}
}
?>