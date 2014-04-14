<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends userbase {
private function _getItems() {}
public function control_run() {
$var_array = array(
'page_title'=>$this->getTitle('index'),
);
TPL::assign($var_array);
$file = $this->uctpl.'index.tpl';
TPL::display($this->uctpl.'index.tpl');
}
}
?>