<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class userIModel extends X {
private function _buildParamsSql() {
$sql = "SELECT ps.userid FROM ".DB_PREFIX."user_params AS ps";
return $sql;
}
private function _buildVolistParamsSql() {
$sql = "SELECT v.userid FROM ".DB_PREFIX."user_params AS v";
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
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.*".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid";
return $sql;
}
public function getList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.userid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['userpagesize']) : intval($items['pagesize']);
$where      = " WHERE s.flag='1' AND s.lovestatus='1'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countwhere = empty($items['countwhere']) ?'': ' '.$items['countwhere'];
$countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_params as ps".
" WHERE ps.flag='1' AND ps.lovestatus='1'".$countwhere;
$total = parent::$obj->fetch_count($countsql);
if ($total == 0) {
$data = null;
}
else {
$params_sql =  $this->_buildParamsSql()." WHERE ps.flag='1' AND ps.lovestatus='1'"
.$countwhere." ORDER BY ps.userid DESC LIMIT ".$start.", ".$pagesize."";
$users = parent::$obj->getall($params_sql);
$ids = $this->_getUserIds($users);
if (!empty($ids)) {
$sql = $this->_buildSql()." WHERE v.userid IN (".$ids.") ORDER BY v.userid DESC";
$data = parent::$obj->getall($sql);
}
}
return array($total,$this->_handleList($data,'userid'));
}
public function volistAll($where='',$orderby='',$num=0) {
$params_sql = $this->_buildVolistParamsSql()." WHERE v.flag='1' AND v.lovestatus='1'";
$params_sql .= !empty($where) ?' AND '.$where : '';
$params_sql .= !empty($orderby) ?' ORDER BY '.$orderby : ' ORDER BY v.userid DESC';
$num = intval($num)<1 ?intval(parent::$cfg['usernum']) : intval($num);
$params_sql .= " LIMIT {$num}";
$params_data = parent::$obj->getall($params_sql);
if (!empty($params_data)) {
$ids = $this->_getUserIds($params_data);
$sql = $this->_buildSql()." WHERE v.userid IN (".$ids.") ORDER BY v.userid DESC";
$data = parent::$obj->getall($sql);
}
else {
$data = null;
}
return $this->_handleList($data,'userid');
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
public function getUserCount() {
$sql = "SELECT COUNT(*) FROM ".DB_PREFIX."user_params WHERE `flag`='1'";
return parent::$obj->fetch_count($sql);
}
}
?>