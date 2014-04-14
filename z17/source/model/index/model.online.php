<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class onlineIModel extends X {
private $holdtime = 0;
private function _buildParamsSql() {
$sql = "SELECT ps.userid FROM ".DB_PREFIX."user_params AS ps";
return $sql;
}
private function _getUserIds($data) {
$strusers = '';
if (!empty($data)) {
$i = 0;
foreach ($data as $key=>$value) {
if ($i == 0) {
$fuhao = '';
}
else {
$fuhao = ',';
}
$strusers .= $fuhao.$value['userid'];
$i++;
}
}
unset($data);
return $strusers;
}
private function _buildSql() {
$sql = "SELECT v.*,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.star,".
" vip.vipenddate,".
" p.*".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid";
return $sql;
}
public function getList($items) {
if (parent::$cfg['onlinehold'] >0) {
$this->holdtime = intval(time()-intval(parent::$cfg['onlinehold'])*60);
}
else {
$this->holdtime = intval(time()-1440*60);
}
$orderby    = empty($items['orderby']) ?' ORDER BY v.userid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['userpagesize']) : intval($items['pagesize']);
$where      = " WHERE s.flag='1' AND s.lovestatus='1'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countwhere = empty($items['countwhere']) ?'': ' '.$items['countwhere'];
$countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_params as ps".
" WHERE ps.ontime>={$this->holdtime} AND ps.flag='1' AND ps.lovestatus='1'".$countwhere;
$total = parent::$obj->fetch_count($countsql);
if ($total == 0) {
$data = null;
}
else {
$params_sql =  $this->_buildParamsSql()." WHERE ps.flag='1' AND ps.lovestatus='1' AND ps.ontime>={$this->holdtime}"
.$countwhere." ORDER BY ps.userid DESC LIMIT ".$start.", ".$pagesize."";
$users = parent::$obj->getall($params_sql);
$ids = $this->_getUserIds($users);
if (!empty($ids)) {
$sql = $this->_buildSql()." WHERE v.userid IN (".$ids.") ORDER BY v.userid DESC";
$data = parent::$obj->getall($sql);
}
else {
$data = null;
}
}
return array($total,$this->_handleList($data,'userid'));
}
private function _handleList($data,$uidname='userid') {
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
public function getUserOnlineStatus($uid) {
$uid = intval($uid);
$onstatus = 0;
if (parent::$cfg['onlinehold'] >0) {
$holdtime = intval(time()-intval(parent::$cfg['onlinehold'])*60);
}
else {
$holdtime = intval(time()-1440*60);
}
$sql = "SELECT `ontime` FROM ".DB_PREFIX."user_params".
" WHERE `userid`='{$uid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$ontime = intval($rows['ontime']);
if ($ontime >= $holdtime) {
$onstatus = 1;
}
}
unset($rows);
unset($sql);
return $onstatus;
}
}
?>