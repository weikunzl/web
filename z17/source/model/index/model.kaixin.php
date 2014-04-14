<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class kaixinIModel extends X {
private $oauth = array();
private $back_url = null;
private $state = null;
private $debug = 0;
private $openid = null;
private $kaixin_config = null;
public function _get($data) {
$this->oauth = $data;
$this->back_url = parent::$cfg['siteurl'].'index.php?c=connect&a=callback&id='.$data['id'];
}
private function _initSDK() {
require_once(BASE_ROOT.'./source/block/oauth/kaixin_HttpClient.php');
require_once(BASE_ROOT.'./source/block/oauth/kaixin_Client.php');
$this->kaixin_config = array(
'appid'=>$this->oauth['appid'],
'appkey'=>$this->oauth['appkey'],
'appsecret'=>$this->oauth['secret'],
'callbackurl'=>$this->back_url
);
}
public function doSubmit() {
$this->_initSDK();
$kaixin = new KXClient($this->kaixin_config);
$url = $kaixin->getAuthorizeURL('code','user_records');
header("Location:{$url}");
}
public function doCallBack() {
$this->_initSDK();
if (array_key_exists('code',$_GET)) {
$kaixin = new KXClient($this->kaixin_config);
$response = $kaixin->getAccessTokenFromCode($_GET['code']);
unset($kaixin);
if (isset($response->access_token)) {
$access_token =	$response->access_token;
$refresh_token = $response->refresh_token;
$this->_getKaixinUserInfo($access_token);
}
else {
echo '获取开心网登录失败，请检查参数或者确实是开心网服务器出错！';
die();
}
}
else {
echo '获取开心网登录失败，请检查参数或者确实是开心网服务器出错！';
die();
}
}
private function _getKaixinUserInfo($access_token) {
$this->_initSDK();
$connection = new KXClient($this->kaixin_config,$access_token);
$userinfo = $connection->users_me();
$params = $userinfo['response'];
$this->openid = $params->uid;
unset($connection);
if (false === XValid::isNumber($this->openid)) {
echo '获取 kaixin uid 失败，请检查参数或者确实是开心网服务器出错！';
die();
}
$model_connect = parent::model('connect','im');
$result = $model_connect->doBindConnect($this->oauth['id'],$this->openid);
unset($model_connect);
if ($result == 1) {
XHandle::halt('对不起，该登录已重复绑定！',parent::$urlpath.'usercp.php?c=extend&a=connect',4);
}
else if ($result == 2) {
XHandle::halt('登录成功',parent::$urlpath.'usercp.php',0);
}
else if ($result == 3) {
XHandle::halt('绑定成功',parent::$urlpath.'usercp.php?c=extend&a=connect',0);
}
else {
XHandle::halt('登录成功，请先完善交友资料',parent::$urlpath.'index.php?c=passport&a=reg',0);
}
}
}
?>