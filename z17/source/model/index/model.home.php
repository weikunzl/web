<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class homeIModel extends X {
private function _buildSql() {
$sql = "SELECT v.*,".
" s.*,".
" vip.vipenddate,".
" e.*, p.*, ".
" c.sortname".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_attr AS e ON v.userid=e.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".
" LEFT JOIN ".DB_PREFIX."love_sort AS c ON p.lovesort=c.sortid";
return $sql;
}
public function getOneData($id) {
$data = array();
$sql = $this->_buildSql().
" WHERE v.userid='{$id}' AND s.flag='1' AND s.lovestatus='1'";
$data = parent::$obj->fetch_first($sql);
return $this->_handleData($data);
}
public function getCondData($id) {
$sql = "SELECT * FROM ".DB_PREFIX."user_cond".
" WHERE `userid`='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$data['bulidarea'] = XHandle::dounSerialize($data['setarea']);
unset($data['setarea']);
}
return $data;
}
private function _handleData($data) {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
$data['homeurl'] = XUrl::getHomeUrl($data['userid']);
$data['age'] = XMod::getAge($data['ageyear']);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
$code = parent::import('code','util');
if (!empty($data['email'])) {
$data['email_data'] = array(
'data'=>urlencode($code->authCode($data['email'],'ENCODE',OESOFT_RANDKEY)),
'width'=>(XHandle::getLength($data['email'])*10)
);
}
if (!empty($data['mobile'])) {
$data['mobile_data'] = array(
'data'=>urlencode($code->authCode($data['mobile'],'ENCODE',OESOFT_RANDKEY)),
'width'=>(XHandle::getLength($data['mobile'])*10)
);
}
if (!empty($data['qq'])) {
$data['qq_data'] = array(
'data'=>urlencode($code->authCode($data['qq'],'ENCODE',OESOFT_RANDKEY)),
'width'=>(XHandle::getLength($data['qq'])*10)
);
}
if (!empty($data['msn'])) {
$data['msn_data'] = array(
'data'=>urlencode($code->authCode($data['msn'],'ENCODE',OESOFT_RANDKEY)),
'width'=>(XHandle::getLength($data['msn'])*10)
);
}
if (!empty($data['homepage'])) {
$data['homepage_data'] = array(
'data'=>urlencode($code->authCode($data['homepage'],'ENCODE',OESOFT_RANDKEY)),
'width'=>(XHandle::getLength($data['homepage'])*10)
);
}
unset($code);
if ($data['vipenddate']>0) {
$dateline = strtotime(date("Y-m-d",time()));
if ($data['vipenddate'] <$dateline) {
$gid = 1;
parent::$obj->update(DB_PREFIX.'user_validate',array('viplevel'=>$gid,'vipenddate'=>0),"userid='".$data['userid']."'");
parent::$obj->update(DB_PREFIX.'user_params',array('groupid'=>$gid),"userid='".$data['userid']."'");
}
else {
$gid = $data['groupid'];
}
}
else {
$gid = 1;
}
$data['groupname'] = $this->_getGroupName($gid);
}
return $data;
}
public function updateHits($id) {
$hits = 0;
$sql = "SELECT `hits` FROM ".DB_PREFIX."user_status WHERE `userid`='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$hits = (intval($data['hits'])+1);
parent::$obj->update(DB_PREFIX.'user_status',array('hits'=>$hits),"`userid`='{$id}'");
}
unset($data);
return $hits;
}
public function getNextID($uid) {
$uid = intval($uid);
$nextid = 0;
$sql = "SELECT `userid` FROM ".DB_PREFIX."user_params".
" WHERE `flag`='1' AND `lovestatus`='1' AND `userid`>".$uid."";
if (parent::$wrap_user['userid']>0) {
if (parent::$wrap_user['gender'] == 1) {
$sql .= " AND `gender`='2'";
}
else {
$sql .= " AND `gender`='1'";
}
}
$sql .= " ORDER BY `userid` ASC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$nextid = intval($rows['userid']);
}
unset($sql);
unset($rows);
unset($uid);
return $nextid;
}
public function getPreviousID($uid) {
$uid = intval($uid);
$nextid = 0;
$sql = "SELECT `userid` FROM ".DB_PREFIX."user_params".
" WHERE `flag`='1' AND `lovestatus`='1' AND `userid`<".$uid."";
if (parent::$wrap_user['userid']>0) {
if (parent::$wrap_user['gender'] == 1) {
$sql .= " AND `gender`='2'";
}
else {
$sql .= " AND `gender`='1'";
}
}
$sql .= " ORDER BY `userid` DESC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$nextid = intval($rows['userid']);
}
unset($sql);
unset($rows);
unset($uid);
return $nextid;
}
private function _getGroupName($gid) {
$sql = "SELECT `groupname` FROM ".DB_PREFIX."user_group".
" WHERE `groupid`='{$gid}'";
$rows = parent::$obj->fetch_first($sql);
return $rows['groupname'];
unset($sql,$rows);
}
}
?>