<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class diaryUModel extends X {
public function getValidDiaryCount($userid) {
$sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."diary WHERE userid='{$userid}' AND flag='1'";
return intval(parent::$obj->fetch_count($sql));
}
private function _getDiaryComments($id) {
$sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."diary_comment WHERE diaryid='{$id}'";
return intval(parent::$obj->fetch_count($sql));
}
public function getList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.diaryid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.userid='".parent::$wrap_user['userid']."' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.diaryid) FROM ".DB_PREFIX."diary AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, c.catname FROM ".DB_PREFIX."diary AS v".
" LEFT JOIN ".DB_PREFIX."diary_category AS c ON v.catid=c.catid".
$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
$i = 1;
foreach ($data as $key=>$value) {
if (!empty($value['uploadfiles'])) {
$data[$key]['uploadfiles'] = PATH_URL.$value['uploadfiles'];
}
if (!empty($value['thumbfiles'])) {
$data[$key]['thumbfiles'] = PATH_URL.$value['thumbfiles'];
}
$data[$key]['commentcount'] = $this->_getDiaryComments($value['diaryid']);
$data[$key]['url'] = XUrl::getContentUrl('diary',$value['diaryid']);
$data[$key]['caturl'] = XUrl::getCategoryUrl('diary',$value['catid']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
return array($total,$data);
}
public function getData($id) {
$sql = "SELECT * FROM ".DB_PREFIX."diary WHERE diaryid='{$id}' AND userid='".parent::$wrap_user['userid']."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
if (!empty($data['uploadfiles'])) {
$data['uploadfiles'] = PATH_URL.$data['uploadfiles'];
}
if (!empty($data['thumbfiles'])) {
$data['thumbfiles'] = PATH_URL.$data['thumbfiles'];
}
$data['commentcount'] = $this->_getDiaryComments($id);
}
return $data;
}
public function doAdd($args,$g) {
$args['userid'] = parent::$wrap_user['userid'];
$flag = intval(parent::$cfg['auditdiary']) == 1 ?0 : 1;
$points = floatval($g['publish']['diarypoints']);
$diaryid = parent::$obj->fetch_newid("SELECT MAX(diaryid) FROM ".DB_PREFIX."diary",1);
$args = array_merge(array(
'diaryid'=>$diaryid,
'timeline'=>time(),
'updatetime'=>time(),
'flag'=>$flag,
'points'=>$points,
'isover'=>0,
),$args);
$result = parent::$obj->insert(DB_PREFIX.'diary',$args);
if (true === $result &&$points >0) {
if ($flag == 1) {
$logcontent = XLang::get('points_pubdiary');
$logcontent = str_ireplace(
array('{lang.points}','{points}'),
array(XLang::get('points'),$points),
$logcontent
);
$points_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>1,
'points'=>$points,
'logcontent'=>$logcontent,
'opuser'=>parent::$wrap_user['userid'],
);
$m_points = parent::model('points','am');
$m_points->doAdd($points_array);
unset($m_points,$points_array);
parent::$obj->update(DB_PREFIX.'diary',array('isover'=>1),"diaryid='{$diaryid}'");
}
}
unset($args,$g);
return $result;
}
public function doEdit($id,$args) {
$args['flag'] = intval(parent::$cfg['auditdiary']) == 1 ?0 : 1;
return parent::$obj->update(DB_PREFIX.'diary',$args,"diaryid='{$id}' AND userid='".parent::$wrap_user['userid']."'");
}
public function doDel($id) {
$result = false;
$sql = "SELECT uploadfiles, thumbfiles FROM ".DB_PREFIX."diary WHERE diaryid='{$id}' AND userid='".parent::$wrap_user['userid']."'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadUtil('file');
if (substr($rows['uploadfiles'],0,15) == 'data/attachment'){
XFile::delFile($rows['uploadfiles']);
}
if (substr($rows['thumbfiles'],0,15) == 'data/attachment'){
XFile::delFile($rows['thumbfiles']);
}
$result = parent::$obj->query("DELETE FROM ".DB_PREFIX."diary WHERE diaryid='{$id}' AND userid='".parent::$wrap_user['userid']."'");
if (true === $result) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."diary_comment WHERE diaryid='{$id}'");
}
}
unset($rows);
return $result;
}
public function checkPublishStatus($g) {
if (intval($g['publish']['pubdiary']) == 1) {
return true;
}
else {
return false;
}
}
}
?>