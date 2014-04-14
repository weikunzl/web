<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class renrenIModel extends X {
private $oauth = array();
private $back_url = null;
private $state = null;
private $debug = 0;
private $openid = null;
public function _get($data) {
$this->oauth = $data;
$this->back_url = parent::$cfg['siteurl'].'index.php?c=connect&a=callback&id='.$data['id'];
}
private function _initSDK() {
}
public function doSubmit() {
echo '对不起，系统不支持人人网登录！';
die();
}
public function doCallBack() {
echo '对不起，系统不支持人人网登录！';
die();
}
}
?>