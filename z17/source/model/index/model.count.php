<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class countIModel extends X {
public function createCacheData($data) {
$cache = parent::import('cache','lib');
$cache->writeDcache($data,'count');
unset($cache);
}
public function readCacheData() {
$cache = parent::import('cache','lib');
$data = $cache->readDcache('count');
unset($cache);
return $data;
}
public function updateStatistics($type) {
$array = $this->readCacheData();
if (empty($array)) {
$array = array();
}
if (isset($type['user'])) {
$array['countusers'] = $this->countUsers();
}
if (isset($type['maleuser'])) {
$array['countmaleusers'] = $this->countMaleUsers();
}
if (isset($type['femaleuser'])) {
$array['countfemaleusers'] = $this->countFeMaleUsers();
}
if (isset($type['onlineuser'])) {
$array['countonlineusers'] = $this->countOnlines();
}
if (isset($type['diary'])) {
$array['countdiarys'] = $this->countDiarys();
}
if (isset($type['ask'])) {
if (true === parent::$obj->table_exist('ask')) {
$array['countasks'] = $this->countAsks();
}
}
if (isset($type['dating'])) {
if (true === parent::$obj->table_exist('dating')) {
$array['countdatings'] = $this->countDatings();
}
}
if (isset($type['party'])) {
if (true === parent::$obj->table_exist('party')) {
$array['countpartys'] = $this->countPartys();
}
}
if (isset($type['weibo'])) {
if (true === parent::$obj->table_exist('weibo')) {
$array['countweibos'] = $this->countWeibos();
}
}
if (isset($type['ceshi'])) {
if (true === parent::$obj->table_exist('ceshi')) {
$array['countceshis'] = $this->countCeshis();
}
}
if (isset($type['story'])) {
if (true === parent::$obj->table_exist('story')) {
$array['countstorys'] = $this->countStorys();
}
}
if (isset($type['message'])) {
$array['countmessages'] = $this->countMessages();
}
if (!empty($array)) {
$data = serialize($array);
$this->createCacheData($data);
}
unset($array);
}
public function countUsers() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_params";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countMaleUsers() {
$count_sql = "SELECT COUNT(*) AS my_count".
" FROM ".DB_PREFIX."user_params".
" WHERE `gender`='1'";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countFeMaleUsers() {
$count_sql = "SELECT COUNT(*) AS my_count".
" FROM ".DB_PREFIX."user_params".
" WHERE `gender`='2'";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countOnlines() {
if (parent::$cfg['onlinehold'] >0) {
$holdtime = intval(time()-intval(parent::$cfg['onlinehold'])*60);
}
else {
$holdtime = intval(time()-1440*60);
}
$count_sql = "SELECT COUNT(*) AS my_count".
" FROM ".DB_PREFIX."user_params AS ps".
" WHERE ps.flag='1' AND ps.lovestatus='1'".
" AND ps.ontime>".$holdtime."";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($holdtime);
unset($count);
}
public function countDiarys() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."diary";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countAsks() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."ask";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countDatings() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."dating";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countPartys() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."party";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countWeibos() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."weibo";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countCeshis() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."ceshi_content";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countStorys() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."story";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
public function countMessages() {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."message";
$count = parent::$obj->fetch_count($count_sql);
return $count;
unset($count_sql);
unset($count);
}
}
?>