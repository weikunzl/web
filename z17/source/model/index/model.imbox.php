<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class imboxIModel extends X {
private $box = array();
private function _init() {
$ids = array(
'guesttips','regtips','logintips','matchtips',
'viewtips','msgtips','hitips','gifttips'
);
foreach ($ids as $key=>$value) {
$this->box[$value] = parent::$cfg['imbox_'.$value];
}
}
private function _getUserInfo($id) {
$sql = "SELECT u.userid, u.username".
" FROM ".DB_PREFIX."user AS u".
" WHERE u.userid='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$data['homeurl'] = XUrl::getHomeUrl($data['userid']);
}
return $data;
}
public function imTips() {
$this->_init();
$content = null;
if (empty($content)) {
$content = $this->box['guesttips'];
$content = str_ireplace(
array('{urlpath}'),
array(PATH_URL),
$content
);
}
return $content;
}
public function imNewReg() {
$this->_init();
$content = null;
if (empty($content)) {
$sql = "SELECT userid FROM ".DB_PREFIX."user_params WHERE `flag`='1' AND `lovestatus`='1'";
if (parent::$wrap_user['gender'] == 1) {
$sql .= " AND `gender`='2'";
}
elseif (parent::$wrap_user['gender'] == 2) {
$sql .= " AND `gender`='1'";
}
$sql .= " ORDER BY `userid` DESC LIMIT 100";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$rand = array_rand($data,1);
$uid = intval($data[$rand]['userid']);
$user = $this->_getUserInfo($uid);
$content = $this->box['regtips'];
$content = str_ireplace(
array('{userid}','{username}','{homeurl}'),
array($user['userid'],$user['username'],$user['homeurl']),
$content
);
unset($user);
}
}
return $content;
}
public function imNewLogin() {
$this->_init();
$content = null;
if (empty($content)) {
$sql = "SELECT userid FROM ".DB_PREFIX."user_params WHERE `flag`='1' AND `lovestatus`='1'";
if (parent::$wrap_user['gender'] == 1) {
$sql .= " AND `gender`='2'";
}
elseif (parent::$wrap_user['gender'] == 2) {
$sql .= " AND `gender`='1'";
}
$sql .= " ORDER BY `ontime` DESC LIMIT 100";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$rand = array_rand($data,1);
$uid = intval($data[$rand]['userid']);
$user = $this->_getUserInfo($uid);
$content = $this->box['logintips'];
$content = str_ireplace(
array('{userid}','{username}','{homeurl}'),
array($user['userid'],$user['username'],$user['homeurl']),
$content
);
unset($user);
}
}
return $content;
}
public function imMatch() {
$this->_init();
$content = null;
if (empty($content)) {
$sql = "SELECT `users` FROM ".DB_PREFIX."user_match".
" WHERE `userid`='".parent::$wrap_user['userid']."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$users = $data['users'];
if (!empty($users)) {
$array = explode(',',$users);
$rand = array_rand($array,1);
$uid = intval($array[$rand]);
$user = $this->_getUserInfo($uid);
$content = $this->box['matchtips'];
$content = str_ireplace(
array('{userid}','{username}','{homeurl}','{urlpath}'),
array($user['userid'],$user['username'],$user['homeurl'],PATH_URL),
$content
);
unset($user);
}
}
unset($data);
}
return $content;
}
public function imView() {
$this->_init();
$content = null;
if (empty($content)) {
$sql = "SELECT v.viewuserid, ps.gender FROM ".DB_PREFIX."home_viewer AS v".
" LEFT JOIN ".DB_PREFIX."user_params AS ps ON v.viewuserid=ps.userid";
if (parent::$wrap_user['gender'] == 1) {
$sql .= " AND ps.gender = '2'";
}
elseif (parent::$wrap_user['gender'] == 2) {
$sql .= " AND ps.gender = '1'";
}
$sql .= " ORDER BY v.viewtime DESC LIMIT 100";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$rand = array_rand($data,1);
$uid = intval($data[$rand]['viewuserid']);
$user = $this->_getUserInfo($uid);
$content = $this->box['viewtips'];
$content = str_ireplace(
array('{userid}','{username}','{homeurl}','{urlpath}'),
array($user['userid'],$user['username'],$user['homeurl'],PATH_URL),
$content
);
unset($user);
}
}
return $content;
}
public function imMessage() {
$this->_init();
$num = 0;
$content = null;
if (empty($content)) {
$m = parent::model('message','um');
$num = $m->countNotRead(parent::$wrap_user['userid']);
unset($m);
if ($num >0) {
$content = $this->box['msgtips'];
$content = str_ireplace(
array('{num}','{urlpath}'),
array($num,PATH_URL),
$content
);
}
}
return $content;
}
public function imHi() {
$this->_init();
$num = 0;
$content = null;
if (empty($content)) {
$m = parent::model('hi','um');
$num = $m->countNotRead(parent::$wrap_user['userid']);
unset($m);
if ($num >0) {
$content = $this->box['hitips'];
$content = str_ireplace(
array('{num}','{urlpath}'),
array($num,PATH_URL),
$content
);
}
}
return $content;
}
public function imGift() {
$this->_init();
$num = 0;
$content = null;
if (empty($content)) {
$m = parent::model('gift','um');
$num = $m->getNotViewCount(parent::$wrap_user['userid']);
unset($m);
if ($num >0) {
$content = $this->box['gifttips'];
$content = str_ireplace(
array('{num}','{urlpath}'),
array($num,PATH_URL),
$content
);
}
}
return $content;
}
}
?>