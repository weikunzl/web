<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class aboutIModel extends X {
private function _buildSql() {
$sql = "SELECT v.*,".
" c.catname, c.target".
" FROM ".DB_PREFIX."single AS v".
" LEFT JOIN ".DB_PREFIX."single_category AS c ON v.catid=c.catid";
return $sql;
}
private function _buildCategorySql() {
$sql = "SELECT v.* FROM ".DB_PREFIX."single_category AS v";
return $sql;
}
public function getList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.abid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['aboutpage']) : intval($items['pagesize']);
$where      = " WHERE 1=1".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.abid) FROM ".DB_PREFIX."single AS v".
" LEFT JOIN ".DB_PREFIX."single_category AS c ON v.catid=c.catid".
$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildSql().$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data));
}
public function volistAll($where='',$orderby='',$num=0) {
$sql = $this->_buildSql()." WHERE 1=1";
$sql .= !empty($where) ?' AND '.$where : '';
$sql .= !empty($orderby) ?' ORDER BY '.$orderby : ' ORDER BY v.orders ASC';
$sql .= $num >0 ?' LIMIT '.$num.'': '';
$data = parent::$obj->getall($sql);
return $this->_handleList($data);
}
public function volistCategory($where='',$orderby='',$num=0) {
$sql = $this->_buildCategorySql()." WHERE 1=1";
$sql .= !empty($where) ?' AND '.$where : '';
$sql .= !empty($orderby) ?' ORDER BY '.$orderby : ' ORDER BY v.orders ASC';
$sql .= $num >0 ?' LIMIT '.$num.'': '';
$data = parent::$obj->getall($sql);
return $this->_handleCategory($data);
}
public function getOneData($id) {
$data = array();
$sql = $this->_buildSql().
" WHERE v.abid='{$id}'";
$data = parent::$obj->fetch_first($sql);
return $this->_handleData($data);
}
public function getOneCat($id) {
$sql = "SELECT *".
" FROM ".DB_PREFIX."single_category WHERE `catid`='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
parent::loadLib('url');
$data['url'] = XUrl::getListUrl('about','cid='.$data['catid']);
}
return $data;
}
public function getPrevious($id) {
$sql = "SELECT `abid`, `title`".
" FROM ".DB_PREFIX."single".
" WHERE `abid`<{$id}".
" ORDER BY `abid` DESC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadLib('url');
$rows['url'] = XUrl::getContentUrl('about',$rows['abid']);
return $rows;
}
else {
return NULL;
}
unset($rows);
}
public function getNext($id) {
$sql = "SELECT `abid`, `title`".
" FROM ".DB_PREFIX."single".
" WHERE `abid`>{$id}".
" ORDER BY `abid` ASC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadLib('url');
$rows['url'] = XUrl::getContentUrl('about',$rows['abid']);
return $rows;
}
else {
return NULL;
}
unset($rows);
}
private function _handleList($data) {
if (!empty($data)) {
parent::loadLib(array('url','mod'));
$i = 1;
foreach($data as $key=>$value) {
if (!empty($value['caturl'])) {
$data[$key]['caturl'] = XUrl::getCategoryUrl('about',$value['catid']);
}
$data[$key]['url'] = XUrl::getContentUrl('about',$value['abid']);
if (isset($value['thumbfiles'])) {
if (empty($value['thumbfiles'])) {
$data[$key]['thumbfiles'] = parent::$urlpath.'tpl/static/images/nopic_s.jpg';
}
else {
if (substr($value['thumbfiles'],0,15) == 'data/attachment') {
$data[$key]['thumbfiles'] = parent::$urlpath.$value['thumbfiles'];
}
}
}
if (isset($value['uploadfiles'])) {
if (empty($value['uploadfiles'])) {
$data[$key]['uploadfiles'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($value['uploadfiles'],0,15) == 'data/attachment') {
$data[$key]['uploadfiles'] = parent::$urlpath.$value['uploadfiles'];
}
}
}
$data[$key]['sort_title'] = XHandle::cutStrLen($value['title'],parent::$cfg['aboutlen']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
}
return $data;
}
private function _handleData($data) {
if (!empty($data)) {
parent::loadLib(array('url','mod'));
if (!empty($data['caturl'])) {
$data['caturl'] = XUrl::getCategoryUrl('about',$data['catid']);
}
$data['url'] = XUrl::getContentUrl('about',$data['abid']);
if (isset($data['thumbfiles'])) {
if (empty($data['thumbfiles'])) {
$data['thumbfiles'] = parent::$urlpath.'tpl/static/images/nopic_s.jpg';
}
else {
if (substr($data['thumbfiles'],0,15) == 'data/attachment') {
$data['thumbfiles'] = parent::$urlpath.$data['thumbfiles'];
}
}
}
if (isset($data['uploadfiles'])) {
if (empty($data['uploadfiles'])) {
$data['uploadfiles'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($data['uploadfiles'],0,15) == 'data/attachment') {
$data['uploadfiles'] = parent::$urlpath.$data['uploadfiles'];
}
}
}
$data['sort_title'] = XHandle::cutStrLen($data['title'],parent::$cfg['aboutlen']);
}
return $data;
}
private function _handleCategory($data) {
$i = 1;
parent::loadLib('url');
if (!empty($data)) {
foreach ($data as $key=>$value) {
if (empty($value['img'])) {
$data[$key]['img'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($value['img'],0,15) == 'data/attachment') {
$data[$key]['img'] = parent::$urlpath.$value['img'];
}
}
$data[$key]['url'] = XUrl::getCategoryUrl('about',$value['catid']);
$data[$key]['i'] = $i;
$i++;
}
}
return $data;
}
}
?>