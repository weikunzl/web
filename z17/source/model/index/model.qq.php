<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class qqIModel extends X {
private $back_url = null;
private $state = null;
public function __construct() {
$this->back_url = parent::$cfg['siteurl'].'index.php?c=connect&a=callback&mod=qq';
require_once(BASE_ROOT.'./source/block/oauth/qq.common.php');
}
public function doSubmit($connect) {
parent::loadUtil('cookie');
$state = md5(uniqid(rand(),TRUE));
$this->state = $state;
XCookie::set('state',$state);
$url ='https://graph.qq.com/oauth2.0/authorize?response_type=code'.
'&client_id='.$connect['appid'].
'&redirect_uri='.urlencode($this->back_url).
'&scope=get_user_info'.
'&state='.$this->state;
header("Location:{$url}");
}
public function doCallBack($connect) {
$accessToken = $this->_getAccessToken($connect);
$openid = $this->_getOpenId($accessToken);
$userinfo = $this->_getUserInfo($connect['appid'],$accessToken,$openid);
$m_connect = parent::model('connect','im');
$result = $m_connect->doBindConnect('qq',$openid,$userinfo);
unset($m_connect);
if ($result == 1) {
XHandle::halt('绑定成功',parent::$urlpath.'usercp.php?c=extend&a=connect',0);
}
elseif ($result == 2) {
XHandle::halt('登录成功',parent::$cfg['siteurl'],0);
}
elseif ($result == 3) {
XHandle::halt('登录成功',parent::$cfg['siteurl'],0);
}
elseif ($result == 4) {
XHandle::halt('绑定失败，帐号已被绑定或重复绑定',parent::$cfg['siteurl'],4);
}
else {
XHandle::halt('登录失败，帐号不存在或被锁定',parent::$cfg['siteurl'],4);
}
}
private function _getAccessToken($connect) {
$token = '';
$sUrl = 'https://graph.qq.com/oauth2.0/token';
$aGetParam = array(
'grant_type'=>'authorization_code',
'client_id'=>$connect['appid'],
'client_secret'=>$connect['appkey'],
'code'=>XRequest::getArgs('code'),
'state'=>XRequest::getArgs('state'),
'redirect_uri'=>$this->back_url,
);
parent::loadUtil('cookie');
XCookie::del('state');
$token_content = connect_qq_get($sUrl,$aGetParam,$this->debug);
if ($token_content !== FALSE) {
$aTemp = explode("&",$token_content);
$aParam = array();
foreach($aTemp as $val){
$aTemp2 = explode("=",$val);
$aParam[$aTemp2[0]] = $aTemp2[1];
}
$token = $aParam['access_token'];
if (empty($token)) {
$this->_echoTokenError();
}
}
else {
$this->_echoTokenError();
}
return $token;
}
private function _getOpenId($token) {
$openid = "";
$sUrl = 'https://graph.qq.com/oauth2.0/me';
$aGetParam = array(
'access_token'=>$token
);
$openid_content = connect_qq_get($sUrl,$aGetParam,$this->debug);
if ($openid_content !== FALSE) {
$aTemp = array();
preg_match('/callback\(\s+(.*?)\s+\)/i',$openid_content,$aTemp);
$aResult = json_decode($aTemp[1],true);
if (isset($aResult['error'])){
echo "<h3>error:</h3>".$aResult['error'];
echo "<h3>msg  :</h3>".$aResult['error_description'];
die();
}
if (!empty($aResult['openid']) &&true === XValid::isSpChar($aResult['openid'])) {
$openid = trim($aResult['openid']);
}
else {
$this->_echoOpenidError();
}
}
else {
$this->_echoOpenidError();
}
return $openid;
}
private function _getUserInfo($client_id,$access_token,$openid) {
$user = NULL;
$url = 'https://graph.qq.com/user/get_user_info';
$sendParams = array(
'oauth_consumer_key'=>$client_id,
'access_token'=>$access_token,
'openid'=>$openid,
'format'=>'json'
);
$qq_info = connect_qq_get($url,$sendParams,$this->debug);
if (!empty($qq_info)) {
$qq_info = json_decode($qq_info,true);
if ($qq_info['gender'] == '男') {
$gender = 1;
}
elseif ($qq_info['gender'] == '女') {
$gender = 2;
}
else {
$gender = 0;
}
$user = array(
'username'=>$qq_info['nickname'],
'gender'=>$gender,
);
}
unset($url,$sendParams);
return $user;
}
private function _echoTokenError() {
echo "获取Token失败，请检查QQ配置参数或是腾讯服务器出错。";
die();
}
private function _echoOpenidError() {
echo '获取Openid失败，请检查QQ配置参数或是腾讯服务器出错。';
die();
}
}
?>