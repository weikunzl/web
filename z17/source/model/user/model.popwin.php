<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class popwinUModel extends X {
public function getListRegUser($num) {
$sex = parent::$wrap_user['gender']==1 ?2 : 1;
$lasttime = intval(parent::$cfg['imbox_reglasttime']);
$time = time()-($lasttime*60);
$sql = "SELECT v.*, u.username,".
" p.ageyear, p.provinceid, p.cityid, p.distid,".
" p.marrystatus, p.education, p.salary, p.height".
" FROM ".DB_PREFIX."user_params AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".
" WHERE v.flag='1' AND v.lovestatus='1' AND v.gender='{$sex}' AND v.addtime>'{$time}'".
" ORDER BY v.userid DESC LIMIT 0, {$num}";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$data = $this->_handleList($data,'userid');
}
unset($sql);
return $data;
}
public function getListNewVisit($num) {
$sex = parent::$wrap_user['gender']==1 ?2 : 1;
$lasttime = intval(parent::$cfg['imbox_visitlasttime']);
$time = time()-($lasttime*60);
$sql = "SELECT v.*, u.gender".
" FROM ".DB_PREFIX."home_viewer AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.viewuserid=u.userid".
" WHERE v.homeuserid='".parent::$wrap_user['userid']."'".
" AND v.viewtime>'{$time}' AND v.pwstatus='0'".
" AND u.gender='{$sex}'".
" ORDER BY v.viewid DESC LIMIT 1";
$data = parent::$obj->getall($sql);
$i = 1;
foreach ($data as $key=>$value) {
$data[$key]['userinfo'] = $this->_getUserInfo($value['viewuserid']);
$data[$key]['i'] = $i;
$this->_updatePwstatus($value['viewid']);
$i = $i+1;
}
return $data;
}
private function _updatePwstatus($id) {
parent::$obj->update(DB_PREFIX.'home_viewer',array('pwstatus'=>1),"viewid='{$id}'");
}
public function getListMatch($num) {
$data = null;
$users = '';
$sql = "SELECT * FROM ".DB_PREFIX."user_match".
" WHERE userid='".parent::$wrap_user['userid']."'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$users = trim($rows['users']);
}
unset($sql,$rows);
if (!empty($users)) {
$user_array = explode(',',$users);
$id_data = array_rand($user_array,$num);
$i = 1;
if (is_array($id_data)) {
foreach ($id_data as $key=>$value) {
$data[] = array(
'i'=>$i,
'userinfo'=>$this->_getUserInfo($user_array[$value]),
);
$i = $i+1;
}
}
elseif (true == XValid::isNumber($id_data)) {
$data[] = array(
'i'=>$i,
'userinfo'=>$this->_getUserInfo($user_array[$id_data]),
);
$i = $i+1;
}
}
return $data;
}
public function getListMsg($num) {
$sql  = "SELECT v.*, u.username, u.gender, u.avatar, u.avatarflag, u.groupid,".
" p.ageyear, p.provinceid, p.cityid, p.distid,".
" p.marrystatus, p.education, p.salary, p.height".
" FROM ".DB_PREFIX."message AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.fromuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fromuserid=p.userid".
" WHERE v.touserid='".parent::$wrap_user['userid']."' AND v.todeleted='0' AND v.readflag='0'".
" ORDER BY v.msgid DESC LIMIT 0, {$num}";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$data = $this->_handleList($data,'fromuserid');
}
unset($sql);
return $data;
}
public function getListHi($num) {
$sql = "SELECT v.*, g.greeting AS message,".
" u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."hibox AS v".
" LEFT JOIN ".DB_PREFIX."greet AS g ON v.greetid = g.greetid".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.fromuserid = u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.fromuserid = s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.fromuserid = vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fromuserid = p.userid".
" WHERE v.touserid='".parent::$wrap_user['userid']."' AND v.todeleted='0'".
" AND v.status='0' ORDER BY v.hiid DESC LIMIT 0, {$num}";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$data = $this->_handleList($data,'fromuserid');
}
unset($sql);
return $data;
}
public function getListGift($num) {
$sql        = "SELECT v.*, u.*, s.*, vip.vipenddate, p.*, g.giftname, g.imgurl".
" FROM ".DB_PREFIX."gift_record AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.fromuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.fromuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.fromuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fromuserid=p.userid".
" LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid".
" WHERE v.touserid='".parent::$wrap_user['userid']."' AND v.viewstatus='0'".
" ORDER BY v.recordid DESC LIMIT 0, {$num}";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$data = $this->_handleList($data);
}
unset($sql);
return $data;
}
public function getListSysmsg($num) {
$sql        = "SELECT v.*, m.subject, m.content".
" FROM ".DB_PREFIX."system_msg AS v".
" LEFT JOIN ".DB_PREFIX."system_content AS m ON v.contentid=m.contentid".
" WHERE v.userid='".parent::$wrap_user['userid']."' AND v.readflag='0'".
" ORDER BY v.msgid DESC LIMIT 0, {$num}";
$data = parent::$obj->getall($sql);
$i = 1;
foreach ($data as $key=>$value) {
$data[$key]['i'] = $i;
$i = ($i+1);
}
unset($sql);
return $data;
}
private function _getUserInfo($uid) {
$sql    = "SELECT v.*, vip.vipenddate, p.*".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".
" WHERE v.userid='{$uid}'";
$rows = parent::$obj->fetch_first($sql);
return $this->_handleOne($rows,'userid');
}
private function _handleList($data,$uidname='fromuserid') {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
$i = 1;
foreach($data as $key=>$value) {
$data[$key]['age'] = XMod::getAge($value['ageyear']);
$data[$key]['homeurl'] = XUrl::getHomeUrl($value[$uidname]);
$data[$key]['useravatar'] = XUser::getAvatar($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['avatarurl'] = XUser::getAvatarUrl($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['levelimg'] = XUser::getIdentify($value['gender'],$value['groupid'],$value['vipenddate']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
}
return $data;
}
private function _handleOne($data,$uidname='userid') {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
$data['age'] = XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data[$uidname]);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
}
return $data;
}
}
?>