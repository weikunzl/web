<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class diaryAModel extends X {
public function getList($items) {
$countwhere = " WHERE 1=1".$items['searchsql'];
$listwhere  = " WHERE v.userid=u.userid".$items['searchsql'];
$start      = ($items['page']-1)*$items['pagesize'];
$countsql   = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."diary AS v".$countwhere;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, u.username".
" FROM ".DB_PREFIX."diary AS v,".
" ".DB_PREFIX."user AS u".$listwhere.
" ORDER BY v.diaryid DESC LIMIT ".$start.", ".$items['pagesize']."";
$array = parent::$obj->getall($sql);
foreach ($array as $key=>$value) {
$array[$key]['cmcount'] = $this->_getComments($value['diaryid']);
$array[$key]['catname'] = $this->_getCatName($value['catid']);
}
return array($total,$array);
}
public function getData($id) {
$sql = "SELECT v.*, u.username".
" FROM ".DB_PREFIX."diary AS v".
" INNER JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".
" WHERE v.diaryid='{$id}'";
return parent::$obj->fetch_first($sql);
}
public function doAdd($array) {
$diaryid = parent::$obj->fetch_newid('SELECT MAX(diaryid) FROM '.DB_PREFIX.'diary',1);
$array = array_merge(array(
'diaryid'=>$diaryid,
'timeline'=>time(),
'updatetime'=>time(),
),$array);
return parent::$obj->insert(DB_PREFIX.'diary',$array);
}
public function doEdit($id,$array) {
$flag = intval($array['flag']);
if ($flag == 1) {
$query = "SELECT * FROM ".DB_PREFIX."diary WHERE diaryid='{$id}'";
$data = parent::$obj->fetch_first($query);
if (!empty($data)) {
if ($data['points']>0 &&$data['isover'] == 0) {
$points = $data['points'];
$logcontent = XLang::get('points_pubdiary');
$logcontent = str_ireplace(
array('{lang.points}','{points}'),
array(XLang::get('points'),$points),
$logcontent
);
$points_array = array(
'userid'=>$data['userid'],
'actiontype'=>1,
'points'=>$points,
'logcontent'=>$logcontent,
);
$m_points = parent::model('points','am');
$m_points->doAdd($points_array);
unset($points_array);
}
parent::$obj->update(DB_PREFIX.'diary',array('isover'=>1),"diaryid='{$id}'");
}
unset($query,$data);
}
$array = array_merge(array(
'updatetime'=>time(),
),$array);
return parent::$obj->update(DB_PREFIX.'diary',$array,"diaryid='{$id}'");
}
public function doDel($id) {
$sql = "SELECT thumbfiles,uploadfiles FROM ".DB_PREFIX."diary WHERE diaryid='{$id}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if (!empty($rows['thumbfiles'])) {
if (substr($rows['thumbfiles'],0,15) == 'data/attachment'){
parent::loadUtil('file');
XFile::delFile($rows['thumbfiles']);
}
}
if (!empty($rows['uploadfiles'])) {
if (substr($rows['uploadfiles'],0,15) == 'data/attachment'){
parent::loadUtil('file');
XFile::delFile($rows['uploadfiles']);
}
}
}
unset($rows);
parent::$obj->query("DELETE FROM ".DB_PREFIX."diary_comment WHERE diaryid='{$id}'");
return parent::$obj->query("DELETE FROM ".DB_PREFIX."diary WHERE diaryid='{$id}'");
}
public function doUpdate($id,$type) {
if ($type == 'flagopen') {
$res = parent::$obj->query("UPDATE ".DB_PREFIX."diary SET flag='1' WHERE diaryid='{$id}'");
if (true === $res)  {
$query = "SELECT * FROM ".DB_PREFIX."diary WHERE diaryid='{$id}'";
$data = parent::$obj->fetch_first($query);
if (!empty($data)) {
if ($data['points']>0 &&$data['isover'] == 0) {
$points = $data['points'];
$logcontent = XLang::get('points_pubdiary');
$logcontent = str_ireplace(
array('{lang.points}','{points}'),
array(XLang::get('points'),$points),
$logcontent
);
$points_array = array(
'userid'=>$data['userid'],
'actiontype'=>1,
'points'=>$points,
'logcontent'=>$logcontent,
);
$m_points = parent::model('points','am');
$m_points->doAdd($points_array);
unset($points_array);
}
parent::$obj->update(DB_PREFIX.'diary',array('isover'=>1),"diaryid='{$id}'");
}
unset($query,$data);
}
return $res;
}
elseif ($type == 'flagclose') {
return parent::$obj->query("UPDATE ".DB_PREFIX."diary SET flag='0' WHERE diaryid='{$id}'");
}
elseif ($type == 'eliteopen') {
return parent::$obj->query("UPDATE ".DB_PREFIX."diary SET elite='1' WHERE diaryid='{$id}'");
}
elseif ($type == 'eliteclose') {
return parent::$obj->query("UPDATE ".DB_PREFIX."diary SET elite='0' WHERE diaryid='{$id}'");
}
}
private function _getComments($id) {
$sql = "SELECT COUNT(*) AS mycount".
" FROM ".DB_PREFIX."diary_comment".
" WHERE diaryid='{$id}'";
return parent::$obj->fetch_count($sql);
unset($sql);
}
private function _getCatName($id) {
$sql = "SELECT catname FROM ".DB_PREFIX."diary_category".
" WHERE catid='{$id}' LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
return $rows['catname'];
unset($sql);
}
}
?>