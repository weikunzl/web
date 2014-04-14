<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class connectIModel extends X {
public function getOneData($id) {
$info = null;
$sql = "SELECT * FROM ".DB_PREFIX."oauth".
" WHERE `authid`='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$info = array(
'id'=>$data['authid'],
'name'=>$data['authname'],
'appid'=>$data['appid'],
'appkey'=>$data['appkey'],
'secret'=>$data['secret'],
'sdkname'=>$data['filepath'],
);
}
unset($data);
return $info;
}
public function getOneMod($mod) {
$info = null;
$sql = "SELECT * FROM ".DB_PREFIX."oauth".
" WHERE `filepath`='{$mod}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$info = array(
'id'=>$data['authid'],
'name'=>$data['authname'],
'appid'=>$data['appid'],
'appkey'=>$data['appkey'],
'secret'=>$data['secret'],
'sdkname'=>$data['filepath'],
);
}
unset($data);
return $info;
}
public function doBindConnect($type,$openid,$args) {
$res = 0;
$sql = "SELECT * FROM ".DB_PREFIX."oauth_user".
" WHERE `oauthuid`='{$openid}'";
$rows = parent::$obj->fetch_first($sql);
if (empty($rows)) {
$id = parent::$obj->fetch_newid("SELECT MAX(id) FROM ".DB_PREFIX."oauth_user",1);
$addon_array = array(
'id'=>$id,
'authmod'=>$type,
'oauthuid'=>$openid,
'addtime'=>time(),
);
parent::$obj->insert(DB_PREFIX.'oauth_user',$addon_array);
$uid = $this->_doUserReg($type,$args);
if ($uid >0) {
$update_array = array(
'userid'=>$uid,
'lasttime'=>time(),
);
parent::$obj->update(DB_PREFIX.'oauth_user',$update_array,"`id`='".$id."'");
$res = 3;
}
}
else {
if (parent::$wrap_user['userid'] >0) {
if ($rows['userid'] >0) {
$res = 4;
}
else {
$update_array = array(
'authmod'=>$type,
'userid'=>parent::$wrap_user['userid'],
);
parent::$obj->update(DB_PREFIX.'oauth_user',$update_array,"`id`='".$rows['id']."'");
$res = 1;
}
}
else {
if ($rows['userid'] >0) {
$userinfo = $this->_getUserName($rows['userid']);
$rs = $this->_doUserLogin($userinfo['username'],$userinfo['password']);
if ($rs == 3) {
$res = 2;
}
}
}
}
unset($sql,$rows);
return $res;
}
private function _getUserName($id) {
$sql = "SELECT `username`, `password` FROM ".DB_PREFIX."user".
" WHERE `userid`='{$id}'";
$rows = parent::$obj->fetch_first($sql);
return $rows;
unset($sql);
}
private function _doUserLogin($usname,$pwd) {
$m_passport = parent::model('passport','im');
$rs = $m_passport->doLogin($usname,$pwd,1);
unset($m_passport);
return $rs;
}
private function _doUserReg($type,$args) {
$rndnum     = XHandle::getRndChar(4,1);
$password   = XHandle::getRndChar(6,1);
$username   = $this->_validUserName($args['username']);
$gender     = intval($args['gender']);
if (empty($username)) {
if ($type == 'qq') {
$username = "qq用户".$rndnum;
}
elseif ($type == 'sina') {
$username = "新浪用户".$rndnum;
}
}
if (XHandle::getLength($username) <3) {
$username = $username.$rndnum;
}
$m_passport = parent::model('passport','im');
if (true === $m_passport->doExistsUserName($username)) {
$rndnum = XHandle::getRndChar(4,1);
$username .= $username.$rndnum;
}
$main_args = array(
'username'=>$username,
'password'=>$password,
'gender'=>$gender,
);
$profile_args = array(
'provinceid'=>0,
'cityid'=>0,
'distid'=>0,
);
$index_args = array(
'gender'=>$gender,
);
list($result,$userid) = $m_passport->doReg($main_args,$profile_args,'',$index_args);
unset($m_passport);
return $userid;
}
private function _validUserName($str) {
if (!empty($str)) {
$str = XFilter::filterBadChar($str);
$str = str_replace('.','',$str);
}
return $str;
}
}
?>