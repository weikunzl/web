<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class sinaIModel extends X {
private $back_url = null;
private $state = null;
public function __construct() {
$this->back_url = parent::$cfg['siteurl'].'index.php?c=connect&a=callback&mod=sina';
require_once(BASE_ROOT.'./source/block/oauth/sinaweibo.class.php');
}
public function doSubmit($connect) {
$weibo = new SaeTOAuthV2($connect['appkey'],$connect['secret']);
$url = $weibo->getAuthorizeURL($this->back_url);
unset($weibo);
header("Location:{$url}");
}
public function doCallBack($connect) {
$accessToken = $this->_getAccessToken($connect);
list($openid,$sinainfo) = $this->_getOpenId($connect,$accessToken);
$userinfo = $this->_getUserInfo($sinainfo);
$m_connect = parent::model('connect','im');
$result = $m_connect->doBindConnect('sina',$openid,$userinfo);
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
$weibo = new SaeTOAuthV2($connect['appkey'],$connect['secret']);
if (isset($_GET['code']) ||isset($_POST['code'])) {
$keys = array();
$keys['code'] = XRequest::getArgs('code');
$keys['redirect_uri'] = $this->back_url;
try {
$token_content = $weibo->getAccessToken('code',$keys);
}
catch (OAuthException $e) {
}
if (!empty($token_content)) {
$token = $token_content['access_token'];
setcookie('weibojs_'.$connect['appkey'],http_build_query($token_content));
}
}
if (empty($token)) {
$this->_echoTokenError();
}
return $token;
}
private function _getOpenId($connect,$token) {
$openid = '';
$weibo = new SaeTClientV2($connect['appkey'],$connect['secret'],$token);
$uid_get = $weibo->get_uid();
if (empty($uid_get)) {
$this->_echoTokenError();
}
else {
$openid = trim($uid_get['uid']);
}
if (false === XValid::isSpChar($openid)) {
$this->_echoTokenError();
}
else {
$sina_userinfo = $weibo->show_user_by_id($openid);
}
unset($weibo);
return array($openid,$sina_userinfo);
}
private function _getUserInfo($sina_info) {
$user = NULL;
if (!empty($sina_info)) {
if ($sina_info['gender'] == 'm') {
$gender = 1;
}
elseif ($sina_info['gender'] == 'f') {
$gender = 2;
}
else {
$gender = 0;
}
$user = array(
'username'=>$sina_info['screen_name'],
'gender'=>$gender,
);
}
return $user;
}
private function _echoTokenError() {
echo '获取Token失败，请检查新sina配置参数或是新浪服务器出错。';
die();
}
private function _echoOpenidError() {
echo '获取Openid失败，请检查sina配置参数或是新浪服务器出错。';
die();
}
}
?>