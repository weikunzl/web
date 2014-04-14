<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class giftUModel extends X {
public function getReceiveList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.recordid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.touserid='".parent::$wrap_user['userid']."' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.recordid) FROM ".DB_PREFIX."gift_record AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, u.*, s.*, vip.vipenddate, p.*, g.giftname, g.imgurl".
" FROM ".DB_PREFIX."gift_record AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.fromuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.fromuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.fromuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fromuserid=p.userid".
" LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid".
$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
$i = 1;
parent::loadLib(array('mod','user'));
foreach ($data as $key=>$value) {
$data[$key]['age'] = XMod::getAge($value['ageyear']);
$data[$key]['homeurl'] = XUrl::getHomeUrl($value['fromuserid']);
$data[$key]['useravatar'] = XUser::getAvatar($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['levelimg'] = XUser::getIdentify($value['gender'],$value['groupid'],$value['vipenddate']);
$data[$key]['imgurl'] = PATH_URL.$value['imgurl'];
$data[$key]['i'] = $i;
$i = ($i+1);
}
return array($total,$data);
}
public function getOneReceive($id) {
$sql = "SELECT v.*, g.giftname, g.imgurl, u.username, u.gender, u.groupid, u.avatar,".
" u.avatarflag, vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.marrystatus, p.salary, p.education".
" FROM ".DB_PREFIX."gift_record AS v".
" LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.fromuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.fromuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fromuserid=p.userid".
" WHERE v.recordid='{$id}' AND v.touserid='".parent::$wrap_user['userid']."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
parent::loadLib(array('mod','user'));
$data['age'] =  XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data['fromuserid']);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
$data['imgurl'] = PATH_URL.$data['imgurl'];
if ($data['viewstatus'] == 0) {
$this->updateReadStatus($id);
}
}
return $data;
}
private function updateReadStatus($id) {
$update_array = array(
'viewstatus'=>1,
'viewtimeline'=>time(),
);
return parent::$obj->update(DB_PREFIX.'gift_record',$update_array,"recordid='{$id}' AND touserid='".parent::$wrap_user['userid']."'");
}
public function getSendList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.recordid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.fromuserid='".parent::$wrap_user['userid']."' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.recordid) FROM ".DB_PREFIX."gift_record AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, u.*, s.*, vip.vipenddate, p.*, g.giftname, g.imgurl".
" FROM ".DB_PREFIX."gift_record AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.touserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.touserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.touserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.touserid=p.userid".
" LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid".
$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
$i = 1;
parent::loadLib(array('mod','user'));
foreach ($data as $key=>$value) {
$data[$key]['age'] = XMod::getAge($value['ageyear']);
$data[$key]['homeurl'] = XUrl::getHomeUrl($value['touserid']);
$data[$key]['useravatar'] = XUser::getAvatar($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['imgurl'] = PATH_URL.$value['imgurl'];
$data[$key]['levelimg'] = XUser::getIdentify($value['gender'],$value['groupid'],$value['vipenddate']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
return array($total,$data);
}
public function getOneSend($id) {
$sql = "SELECT v.*, g.giftname, g.imgurl, u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" vip.vipenddate, p.provinceid, p.cityid, p.distid,".
" p.ageyear, p.marrystatus, p.salary, p.education".
" FROM ".DB_PREFIX."gift_record AS v".
" LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.touserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.touserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.touserid=p.userid".
" WHERE v.recordid='{$id}' AND v.fromuserid='".parent::$wrap_user['userid']."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
parent::loadLib('mod','user');
$data['age'] =  XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data['fromuserid']);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
$data['imgurl'] = PATH_URL.$data['imgurl'];
}
return $data;
}
public function doSend($touid,$giftid) {
$result = false;
$giftinfo = $this->getGiftInfo($giftid);
if (!empty($giftinfo)) {
$recordid = parent::$obj->fetch_newid("SELECT MAX(recordid) FROM ".DB_PREFIX."gift_record",1);
$record_array = array(
'recordid'=>$recordid,
'giftid'=>$giftid,
'fromuserid'=>parent::$wrap_user['userid'],
'touserid'=>$touid,
'points'=>$giftinfo['points'],
'message'=>$giftinfo['intro'],
'sendtimeline'=>time(),
'flag'=>1,
'viewstatus'=>0,
);
$result = parent::$obj->insert(DB_PREFIX.'gift_record',$record_array);
if (true === $result) {
if ($giftinfo['points']>0) {
$logcontent = XLang::get('points_sendgift');
$logcontent = str_ireplace(
array('{giftname}','{lang.points}','{points}'),
array($giftinfo['giftname'],XLang::get('points'),$giftinfo['points']),
$logcontent
);
$points_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>2,
'points'=>$giftinfo['points'],
'logcontent'=>$logcontent,
'opuser'=>parent::$wrap_user['userid'],
);
$model_points = parent::model('points','am');
$model_points->doAdd($points_array);
unset($model_points);
unset($points_array);
}
}
}
unset($giftinfo);
return $result;
}
public function getGiftList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.giftid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.flag='1' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.giftid) FROM ".DB_PREFIX."gift AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, c.catname".
" FROM ".DB_PREFIX."gift AS v".
" LEFT JOIN ".DB_PREFIX."gift_category AS c ON v.catid=c.catid".
$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
$i = 1;
foreach ($data as $key=>$value) {
$data[$key]['imgurl'] = PATH_URL.$value['imgurl'];
$data[$key]['i'] = $i;
$i = ($i+1);
}
return array($total,$data);
}
public function getGiftInfo($id) {
$sql = "SELECT * FROM ".DB_PREFIX."gift WHERE giftid='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$data['imgurl'] = PATH_URL.$data['imgurl'];
}
return $data;
}
public function checkExistsToUser($uid) {
$flag = false;
$sql = "SELECT userid FROM ".DB_PREFIX."user WHERE userid='{$uid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$flag = true;
}
unset($rows);
return $flag;
}
public function checkExistsGitf($giftid) {
$data = $this->getGiftInfo($giftid);
if (empty($data)) {
return false;
}
else {
return $data;
}
}
public function getGiftCount($userid) {
$sql = "SELECT COUNT(*) FROM ".DB_PREFIX."gift_record WHERE `touserid`='{$userid}'";
return parent::$obj->fetch_count($sql);
}
public function getNotViewCount($userid) {
$sql = "SELECT COUNT(*) FROM ".DB_PREFIX."gift_record WHERE `touserid`='{$userid}' AND `viewstatus`='0'";
return parent::$obj->fetch_count($sql);
}
public function volistAll($where='',$orderby='',$num=0) {
$sql = "SELECT v.recordid, g.giftname, g.imgurl".
" FROM ".DB_PREFIX."gift_record AS v".
" LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid";
$sql .= " WHERE v.flag='1'";
if (!empty($where)) {
$sql .= " AND ".$where;
}
if (!empty($orderby)) {
$sql .= " ".$orderby;
}
else {
$sql .= " ORDER BY v.recordid DESC";
}
$num = intval($num)<1 ?10 : intval($num);
$sql .= " LIMIT {$num}";
$data = parent::$obj->getall($sql);
$ii = 1;
foreach ($data as $key=>$value) {
$data[$key]['i'] = $ii;
$data[$key]['imgurl'] = PATH_URL.$value['imgurl'];
$ii = $ii+1;
}
unset($sql,$where,$orderby,$num);
return $data;
}
}
?>