<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control {
private $action = null;
private function _new() {
$this->action = X::action('connect','ia');
}
private function _unset() {
unset($this->action);
}
public function control_run() {
$this->_new();
$this->action->action_submit();
$this->_unset();
}
public function control_callback() {
$this->_new();
$this->action->action_callback();
$this->_unset();
}
}
?>