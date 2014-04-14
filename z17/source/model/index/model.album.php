<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class albumIModel extends X {
private function _buildSql() {
$sql = "SELECT v.*, u.username".
" FROM ".DB_PREFIX."user_photo AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid";
return $sql;
}
public function getList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.photoid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['uphotopagesize']) : intval($items['pagesize']);
$where      = " WHERE v.flag='1'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_photo AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".
$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildSql().$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data));
}
public function volistAll($where='',$orderby='',$num=0) {
$sql = $this->_buildSql()." WHERE v.flag='1'";
if (!empty($where)) {
$sql .= " AND ".$where;
}
if (!empty($orderby)) {
$sql .= " ".$orderby;
}
else {
$sql .= " ORDER BY v.photoid DESC";
}
$num = intval($num)<1 ?intval(parent::$cfg['albumnum']) : intval($num);
$sql .= " LIMIT ".$num."";
$data = parent::$obj->getall($sql);
return $this->_handleList($data);
}
public function getOneData($id) {
$sql = $this->_buildSql()." WHERE v.photoid='{$id}' AND v.flag='1'";
$data = parent::$obj->fetch_first($sql);
return $this->_handleData($data);
}
private function _handleList($data) {
if (!empty($data)) {
$i = 1;
foreach ($data as $key=>$value) {
if (empty($value['thumbfiles'])) {
$data[$key]['thumbfiles'] = parent::$urlpath.'tpl/static/images/nopic_s.jpg';
}
else {
if (substr($value['thumbfiles'],0,15) == 'data/attachment') {
$data[$key]['thumbfiles'] = parent::$urlpath.$value['thumbfiles'];
}
}
if (empty($value['uploadfiles'])) {
$data[$key]['uploadfiles'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($value['uploadfiles'],0,15) == 'data/attachment') {
$data[$key]['uploadfiles'] = parent::$urlpath.$value['uploadfiles'];
}
}
parent::loadLib(array('url'));
$data[$key]['homeurl'] = XUrl::getHomeUrl($value['userid']);
$data[$key]['i'] = $i;
$i++;
}
}
return $data;
}
private function _handleData($data) {
if (!empty($data)) {
if (empty($data['thumbfiles'])) {
$data['thumbfiles'] = parent::$urlpath.'tpl/static/images/nopic_s.jpg';
}
else {
if (substr($data['thumbfiles'],0,15) == 'data/attachment') {
$data['thumbfiles'] = parent::$urlpath.$data['thumbfiles'];
}
}
if (empty($data['uploadfiles'])) {
$data['uploadfiles'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($data['uploadfiles'],0,15) == 'data/attachment') {
$data['uploadfiles'] = parent::$urlpath.$data['uploadfiles'];
}
}
parent::loadLib(array('url'));
$data['homeurl'] = XUrl::getHomeUrl($data['userid']);
}
return $data;
}
public function getNextID($id,$uid=0) {
$next_id = 0;
$id = intval($id);
$sql = "SELECT `photoid` FROM ".DB_PREFIX."user_photo".
" WHERE `flag`='1' AND `photoid`>{$id}";
if ($uid>0) {
$sql .= " AND `userid`='{$uid}'";
}
$sql .= " ORDER BY `photoid` ASC";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$next_id = $rows['photoid'];
}
unset($sql);
unset($rows);
return $next_id;
}
public function getPreviousID($id,$uid=0) {
$previous_id = 0;
$id = intval($id);
$sql = "SELECT `photoid` FROM ".DB_PREFIX."user_photo".
" WHERE `flag`='1' AND `photoid`<{$id}";
if ($uid>0) {
$sql .= " AND `userid`='{$uid}'";
}
$sql .= " ORDER BY `photoid` DESC";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$previous_id = $rows['photoid'];
}
unset($sql);
unset($rows);
return $previous_id;
}
}
?>