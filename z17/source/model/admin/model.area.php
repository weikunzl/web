<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class areaAModel extends X {
public function getList() {
$cache = parent::import('cache','lib');
$data = $cache->readCache('area');
unset($cache);
if (!empty($data)) {
$total = count($data);
}
else {
$total = 0;
}
return array($total,$data);
}
public function getData($id) {
$sql = "SELECT * FROM ".DB_PREFIX."area WHERE areaid='{$id}'";
return parent::$obj->fetch_first($sql);
}
public function getOrders($rootid) {
$sql = "SELECT MAX(orders) FROM ".DB_PREFIX."area WHERE `rootid`='{$rootid}'";
$orders = parent::$obj->fetch_newid($sql,1);
unset($sql);
return $orders;
}
public function doAdd($array) {
$areaid = parent::$obj->fetch_newid('SELECT MAX(areaid) FROM '.DB_PREFIX.'area',1);
$array = array_merge(array(
'areaid'=>$areaid,
'flag'=>1,
),$array);
if ($array['rootid'] == 0) {
$array = array_merge($array,array('depth'=>0));
}
else {
$parent_depth = $this->_getDepth($array['rootid']);
$depth = intval($parent_depth)+1;
$array = array_merge($array,array('depth'=>$depth));
}
$result = parent::$obj->insert(DB_PREFIX.'area',$array);
if (true === $result) {
$cache = parent::import('cache','lib');
$cache->updateCache('area');
unset($cache);
}
return $result;
}
public function doEdit($id,$array) {
$self_depth = $this->_getDepth($id);
$parent_depth = $this->_getDepth($array['rootid']);
if ($array['rootid']>0 &&$self_depth<$parent_depth) {
$childs = $this->_getChildIDs($id);
if (true === XHandle::foundInChar($childs,$array['rootid'])) {
return 1;
}
}
if ($array['rootid'] == 0) {
$depth = 0;
}
else {
$depth = ($parent_depth+1);
}
$array = array_merge($array,array('depth'=>$depth));
$result = parent::$obj->update(DB_PREFIX.'area',$array,"areaid='{$id}'");
if (true === $result) {
$this->_updateChildDepth($id,$depth);
$cache = parent::import('cache','lib');
$cache->updateCache('area');
unset($cache);
return 2;
}
else {
return 3;
}
}
public function doDel($id) {
$childs = $this->_getChildIDs($id);
if (!empty($childs)) {
$childs_array = explode(',',$childs);
for($ii=0;$ii<count($childs_array);$ii++){
$chilid = intval($childs_array[$ii]);
if ($chilid>0) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."area WHERE `areaid`='{$chilid}'");
}
}
}
$sql = "DELETE FROM ".DB_PREFIX."area WHERE areaid='{$id}'";
if (true === parent::$obj->query($sql)){
$cache = parent::import('cache','lib');
$cache->updateCache('area');
unset($cache);
return true;
}
else {
return false;
}
}
public function doUpdate($id,$type) {
$cache = parent::import('cache','lib');
if ($type == 'flagopen') {
parent::$obj->query("UPDATE ".DB_PREFIX."area SET `flag`='1' WHERE `areaid`='{$id}'");
}
elseif ($type == 'flagclose') {
parent::$obj->query("UPDATE ".DB_PREFIX."area SET `flag`='0' WHERE `areaid`='{$id}'");
}
elseif ($type == 'tabstatusopen') {
parent::$obj->query("UPDATE ".DB_PREFIX."area SET `tabstatus`='1' WHERE `areaid`='{$id}'");
}
elseif ($type == 'tabstatusclose') {
parent::$obj->query("UPDATE ".DB_PREFIX."area SET `tabstatus`='0' WHERE `areaid`='{$id}'");
}
$cache->updateCache('area');
unset($cache);
}
public function checkExistsChild($id) {
$sql = "SELECT COUNT(areaid) FROM ".DB_PREFIX."area WHERE rootid='".intval($id)."'";
$count = parent::$obj->fetch_count($sql);
if ($count>0) {
return true;
}
else {
return false;
}
}
private function _getDepth($id) {
$sql = "SELECT depth FROM ".DB_PREFIX."area WHERE areaid='".intval($id)."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
return intval($data['depth']);
}
else {
return 0;
}
}
private function _getChildIDs($id,$args='') {
$args = $args;
$query = "SELECT areaid,areaname FROM ".DB_PREFIX."area WHERE rootid='{$id}'";
$data = parent::$obj->getall($query);
foreach($data as $key=>$value) {
$args = $args.$value['areaid'].',';
$args = $this->_getChildIDs($value['areaid'],$args);
}
return $args;
}
private function _updateChildDepth($id,$depth) {
$query = "SELECT areaid FROM ".DB_PREFIX."area WHERE rootid='".intval($id)."'";
$data = parent::$obj->getall($query);
foreach($data as $key=>$value) {
$child_depth = $depth+1;
parent::$obj->update(DB_PREFIX.'area',array('depth'=>$child_depth),"areaid='".$value['areaid']."'");
$this->_updateChildDepth($value['areaid'],$child_depth);
}
}
public function getAllNode() {
$notes = array();
$i = 0;
$sql = "SELECT * FROM ".DB_PREFIX."area WHERE rootid='0' ORDER BY orders ASC";
$parent_data = parent::$obj->getall($sql);
foreach ($parent_data as $key=>$value) {
$notes = array_merge($notes ,array(
$i=>array(
'areaid'=>$value['areaid'],
'areaname'=>$value['areaname'],
'spreadname'=>$value['spreadname'],
'rootid'=>$value['rootid'],
'depth'=>$value['depth'],
'orders'=>$value['orders'],
'tabstatus'=>$value['tabstatus'],
)
));
$i  = $i+1;
$notes = array_merge($notes,$this->_getChildNode($value['areaid'],$i));
}
return $notes;
}
private function _getChildNode($rootid,$i,$data=array()) {
$nodes = array();
$nodes = $data;
$child_sql = "SELECT * FROM ".DB_PREFIX."area".
" WHERE rootid='$rootid' ORDER BY orders ASC";
$child_data = parent::$obj->getall($child_sql);
foreach ($child_data as $key=>$value) {
$nodes = array_merge($nodes ,array(
$i=>array(
'areaid'=>$value['areaid'],
'areaname'=>$value['areaname'],
'spreadname'=>$value['spreadname'],
'rootid'=>$value['rootid'],
'depth'=>$value['depth'],
'orders'=>$value['orders'],
'tabstatus'=>$value['tabstatus'],
),
));
$i  = $i+1;
$nodes = $this->_getChildNode($value['areaid'],$i,$nodes);
}
return $nodes;
}
public function getCacheOptions($inputvalue = '') {
$args = '';
$cache = parent::import('cache','lib');
$data = $cache->readCache('area');
unset($cache);
foreach ($data as $key=>$value) {
$args .= "<option value='".$value['areaid']."'";
if (intval($value['areaid']) == intval($inputvalue)) {
$args .= " selected";
}
$depth_mark ='';
if ($value['depth'] == 0) {
}
elseif ($value['depth']==1){
$depth_mark = "&nbsp;&nbsp;├ ";
}else{
for($i=2;$i<=$value['depth'];$i++){
$depth_mark .= "&nbsp;&nbsp;│";
}
$depth_mark .= "&nbsp;&nbsp;├ ";
}
$args .= ">".$depth_mark.$value['areaname']."</option>";
}
return $args;
}
public function dataOptionTree($inputvalue='') {
$notes = '';
$parent_sql = "SELECT areaid,areaname FROM ".DB_PREFIX."area".
" WHERE rootid='0' ORDER BY orders ASC";
$parent_data = parent::$obj->getall($parent_sql);
foreach($parent_data as $key=>$value){
$notes .= "<option value='".$value['areaid']."'";
if (intval($value['areaid']) == intval($inputvalue)) {
$notes .= " selected";
}
$notes .= ">".$value['areaname']."</option>";
$notes = $notes.$this->_dataOptionChild($value['areaid'],$inputvalue);
}
return $notes;
}
private function _dataOptionChild($rootid,$inputvalue,$args='') {
$args = $args;
$child_sql = "SELECT areaid,areaname,depth FROM ".DB_PREFIX."area".
" WHERE rootid='$rootid' ORDER BY orders ASC";
$child_data = parent::$obj->getall($child_sql);
foreach ($child_data as $key=>$value) {
$args .= "<option value='".$value['areaid']."'";
if (intval($value['areaid']) == intval($inputvalue)) {
$args .= " selected";
}
$depth_mark ='';
if($value['depth']==1){
$depth_mark = "&nbsp;&nbsp;├ ";
}else{
for($i=2;$i<=$value['depth'];$i++){
$depth_mark .= "&nbsp;&nbsp;│";
}
$depth_mark .= "&nbsp;&nbsp;├ ";
}
$args .= ">".$depth_mark.$value['areaname']."</option>";
$args = $this->_dataOptionChild($value['areaid'],$inputvalue,$args);
}
return $args;
}
public function getRootOptions($inval) {
$temps = '';
$sql = "SELECT areaid,areaname FROM ".DB_PREFIX."area WHERE rootid='0' AND flag='1' ORDER BY orders ASC";
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$temps .= "<option value='".$value['areaid']."'";
if (intval($inval) == $value['areaid']) {
$temps .= " selected";
}
$temps .= ">".$value['areaname']."</option>";
}
unset($data);
return $temps;
}
public function getChildOptions($rootid,$inval) {
$temps = '';
$sql = "SELECT areaid,areaname FROM ".DB_PREFIX."area WHERE rootid='{$rootid}' AND flag='1' ORDER BY orders ASC";
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$temps .= "<option value='".$value['areaid']."'";
if (intval($inval) == $value['areaid']) {
$temps .= " selected";
}
$temps .= ">".$value['areaname']."</option>";
}
unset($data);
return $temps;
}
public function getJsonChilds($rootid) {
$array = array();
$sql = "SELECT areaid,areaname FROM ".DB_PREFIX."area WHERE rootid='{$rootid}' AND flag='1' ORDER BY orders ASC";
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$array[] = array(
'areaid'=>$value['areaid'],
'areaname'=>$value['areaname']
);
}
unset($data);
return json_encode($array);
}
public function getCacheArea($id) {
$cache = parent::import('cache','lib');
$data = $cache->readCache('area');
unset($cache);
$areaname = '';
foreach ($data as $key=>$value) {
if ($value['areaid'] == $id) {
$areaname = $value['areaname'];
break;
}
}
return $areaname;
}
public function getCacheAreaID($name) {
$cache = parent::import('cache','lib');
$data = $cache->readCache('area');
unset($cache);
$id = 0;
foreach ($data as $key=>$value) {
if ($value['areaname'] == $name) {
$id = intval($value['areaid']);
break;
}
}
return $id;
}
}
?>