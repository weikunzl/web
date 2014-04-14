<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class sysmsgUModel extends X {
public function getList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.msgid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.userid='".parent::$wrap_user['userid']."' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.msgid) FROM ".DB_PREFIX."system_msg AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, m.subject, m.content".
" FROM ".DB_PREFIX."system_msg AS v".
" LEFT JOIN ".DB_PREFIX."system_content AS m ON v.contentid=m.contentid".
$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
$i = 1;
foreach ($data as $key=>$value) {
$data[$key]['i'] = $i;
$i = ($i+1);
}
return array($total,$data);
}
public function getOneData($id) {
$sql = "SELECT v.*, m.subject, m.content".
" FROM ".DB_PREFIX."system_msg AS v".
" LEFT JOIN ".DB_PREFIX."system_content AS m ON v.contentid=m.contentid".
" WHERE v.msgid='{$id}' AND v.userid='".parent::$wrap_user['userid']."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
if ($data['readflag'] == 0) {
$this->updateReadStatus($id);
}
}
return $data;
}
private function updateReadStatus($id) {
$array = array(
'readflag'=>1,
);
return parent::$obj->update(DB_PREFIX.'system_msg',$array,"msgid='{$id}'");
}
public function doDel($id) {
$sql = "DELETE FROM ".DB_PREFIX."system_msg WHERE msgid='{$id}' AND userid='".parent::$wrap_user['userid']."'";
return parent::$obj->query($sql);
}
public function getNoreadCount($uid) {
$count = 0;
$sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."system_msg".
" WHERE `userid`='".parent::$wrap_user['userid']."' AND `readflag`='0'";
$count = parent::$obj->fetch_count($sql);
return $count;
unset($sql);
}
}
?>