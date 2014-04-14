<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends indexbase {
private $action = null;
private function _new() {
$this->action = parent::action('diary','ia');
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
public function control_detail() {
$this->_new();
$this->action->action_detail();
$this->_unset();
}
}
?>