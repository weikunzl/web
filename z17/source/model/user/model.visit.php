<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class visitUModel extends X {
private function _buildSql() {
$sql = "SELECT v.viewid, v.homeuserid, v.viewtime, u.*, s.*, vip.vipenddate, p.*".
" FROM ".DB_PREFIX."home_viewer AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.homeuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.homeuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.homeuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.homeuserid=p.userid";
return $sql;
}
public function getList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.viewid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.viewuserid='".parent::$wrap_user['userid']."' AND v.viewdeleted='0' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) FROM ".DB_PREFIX."home_viewer AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildSql().$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data,'homeuserid'));
}
public function volistAll($userid,$num=0) {
$num = intval($num)<1 ?20 : intval($num);
$sql = $this->_buildSql()." WHERE v.viewuserid='{$userid}' AND v.viewdeleted='0'";
$sql .= " ORDER BY v.viewid DESC LIMIT {$num}";
$data = parent::$obj->getall($sql);
$data = $this->_handleList($data,'homeuserid');
return $data;
}
public function doDel($id) {
return parent::$obj->update(DB_PREFIX.'home_viewer',array('viewdeleted'=>1),"viewid='{$id}' AND viewuserid='".parent::$wrap_user['userid']."'");
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
public function recordVisitHome($homeuid) {
$result = false;
$sql = "SELECT `viewid` FROM ".DB_PREFIX."home_viewer".
" WHERE `homeuserid`='{$homeuid}' AND `viewuserid`='".parent::$wrap_user['userid']."'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$array = array(
'viewtime'=>time(),
'homedeleted'=>0,
'viewdeleted'=>0,
'pwstatus'=>0,
);
$result = parent::$obj->update(DB_PREFIX.'home_viewer',$array,"`viewid`='".$rows['viewid']."'");
}
else {
$viewid = parent::$obj->fetch_newid("SELECT MAX(viewid) FROM ".DB_PREFIX."home_viewer",1);
$array = array(
'viewid'=>$viewid,
'homeuserid'=>$homeuid,
'viewuserid'=>parent::$wrap_user['userid'],
'viewtime'=>time(),
'homedeleted'=>0,
'viewdeleted'=>0,
'pwstatus'=>0,
);
$result = parent::$obj->insert(DB_PREFIX.'home_viewer',$array);
}
unset($sql,$rows);
return $result;
}
}
?>