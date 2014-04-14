<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class areaIModel extends X {
public function getTreeArea($where='',$orderby='',$num='') {
$sql = "SELECT v.* FROM ".DB_PREFIX."area AS v".
" WHERE v.rootid='0'";
$sql .= !empty($where) ?' AND '.$where : '';
$sql .= !empty($orderby) ?' ORDER BY '.$orderby : ' ORDER BY v.orders ASC';
if ($num >0) {
$sql .= " LIMIT {$num}";
}
$data = parent::$obj->getall($sql);
$ii = 1;
foreach ($data as $key=>$value) {
$data[$key]['i'] = $ii;
$ii++;
}
return $data;
unset($sql);
}
public function getChildArea($catid=0,$where='',$orderby='',$num='') {
$sql = "SELECT v.* FROM ".DB_PREFIX."area AS v";
if ($catid >0) {
$sql .= " WHERE v.rootid='{$catid}'";
}
else {
$sql .= " WHERE 1=1";
}
$sql .= !empty($where) ?' AND '.$where : '';
$sql .= !empty($orderby) ?' ORDER BY '.$orderby : ' ORDER BY v.orders ASC';
if ($num >0) {
$sql .= " LIMIT {$num}";
}
$data = parent::$obj->getall($sql);
$ii = 1;
foreach ($data as $key=>$value) {
$data[$key]['i'] = $ii;
$ii++;
}
return $data;
unset($sql);
}
public function getParentID($id) {
$parentid = 0;
$sql = "SELECT `rootid` FROM ".DB_PREFIX."area".
" WHERE `areaid`='{$id}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$parentid = $rows['rootid'];
}
unset($sql,$rows);
return $parentid;
}
public function getTreeOptions($inid) {
$temps = '';
$sql = "SELECT `areaid`, `areaname` FROM ".DB_PREFIX."area WHERE `rootid`='0' ORDER BY `orders` ASC";
$data = parent::$obj->getall($sql);
foreach($data as $key=>$value) {
$temps .= "<option value='".$value['areaid']."'";
if (intval($inid) == $value['areaid']) {
$temps .= " selected";
}
$temps .= ">".$value['areaname']."</option>";
}
return $temps;
}
}
?>