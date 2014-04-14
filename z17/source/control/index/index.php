<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control {
private $action = null;
private function _new() {
$this->action = X::action('index','ia');
}
private function _unset() {
unset($this->action);
}
public function control_run() {
$this->_new();
$this->action->action_run();
$this->_unset();
}
public function control_cpa() {
$this->_new();
$this->action->action_cpa();
$this->_unset();
}
}
?>