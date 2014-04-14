<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class hiUModel extends X {
private function _buildReceiveSql() {
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
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fromuserid = p.userid";
return $sql;
}
private function _buildToSql() {
$sql = "SELECT v.*, g.greeting AS message,".
" u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."hibox AS v".
" LEFT JOIN ".DB_PREFIX."greet AS g ON v.greetid = g.greetid".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.touserid = u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.touserid = s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.touserid = vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.touserid = p.userid";
return $sql;
}
public function getReceiveList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.hiid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.touserid='".parent::$wrap_user['userid']."' ".$items['searchsql'].
" AND v.todeleted='0'";
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) FROM ".DB_PREFIX."hibox AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildReceiveSql().$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data,'fromuserid'));
}
public function getToList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.hiid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.fromuserid='".parent::$wrap_user['userid']."' ".$items['searchsql'].
" AND v.todeleted='0'";
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) FROM ".DB_PREFIX."hibox AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildToSql().$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data,'touserid'));
}
public function _handleList($data,$uidname='fromuserid') {
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
public function getOneReceive($id) {
$sql = $this->_buildReceiveSql().
" WHERE v.hiid='{$id}' AND v.touserid='".parent::$wrap_user['userid']."'".
" AND v.todeleted='0'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
if ($data['status'] == 0) {
parent::$obj->update(DB_PREFIX.'hibox',array('status'=>1),"`hiid`='{$id}'");
}
}
return $this->_handleData($data,'fromuserid');
}
public function getOneTo($id) {
$sql = $this->_buildToSql().
" WHERE v.hiid='{$id}' AND v.fromuserid='".parent::$wrap_user['userid']."'".
" AND v.fromdeleted='0'";
$data = parent::$obj->fetch_first($sql);
return $this->_handleData($data,'touserid');
}
public function _handleData($data,$uidname='fromuserid') {
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
public function getGreetList($tasex,$num = 5) {
$sql = "SELECT `greetid`, `greeting` FROM ".DB_PREFIX."greet WHERE `flag`='1'";
if ($tasex == 1) {
$sql .= " AND `male`='1'";
}
else {
$sql .= " AND `female`='1'";
}
$sql .= " ORDER BY RAND() LIMIT {$num}";
$data = parent::$obj->getall($sql);
$i = 1;
foreach ($data as $key=>$value) {
$data[$key]['i'] = $i;
$i = ($i+1);
}
return $data;
}
public function getRndGreetID($tasex) {
$id = 0;
$sql = "SELECT `greetid` FROM ".DB_PREFIX."greet WHERE `flag`='1'";
if ($tasex == 1) {
$sql .= " AND `male`='1'";
}
else {
$sql .= " AND `female`='1'";
}
$sql .= " ORDER BY RAND() LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$id = intval($rows['greetid']);
}
unset($rows);
unset($sql);
return $id;
}
public function countNotRead($userid) {
$sql = "SELECT COUNT(*) FROM ".DB_PREFIX."hibox WHERE `touserid`='{$userid}' AND `status`='0' AND `todeleted`='0'";
return parent::$obj->fetch_count($sql);
}
public function doDelReceive($id) {
$array = array(
'todeleted'=>1,
);
return parent::$obj->update(DB_PREFIX.'hibox',$array,"`touserid`='".parent::$wrap_user['userid']."' AND `hiid`='{$id}'");
}
public function doDelTo($id) {
$array = array(
'fromdeleted'=>1,
);
return parent::$obj->update(DB_PREFIX.'hibox',$array,"`fromuserid`='".parent::$wrap_user['userid']."' AND `hiid`='{$id}'");
}
public function doSaveHi($touid,$greetid) {
if (parent::$wrap_user['userid'] >0) {
$hiid = parent::$obj->fetch_newid("SELECT MAX(hiid) FROM ".DB_PREFIX."hibox",1);
$array = array(
'hiid'=>$hiid,
'fromuserid'=>parent::$wrap_user['userid'],
'touserid'=>$touid,
'status'=>0,
'fromdeleted'=>0,
'todeleted'=>0,
'sendtime'=>time(),
'greetid'=>$greetid,
);
$result = parent::$obj->insert(DB_PREFIX.'hibox',$array);
parent::$obj->update(DB_PREFIX.'greet',array('usecount'=>'[[usecount+1]]'),"greetid='{$greetid}'");
}
else {
$result = true;
}
return $result;
}
public function countReceiveHi($uid,$type='receive') {
$sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."hibox".
" WHERE `todeleted`='0' AND `touserid`='{$uid}'";
if ($type == 'new') {
$sql .= " AND `status`='0'";
}
$count = 0;
$count = parent::$obj->fetch_count($sql);
unset($sql);
return $count;
}
}
?>