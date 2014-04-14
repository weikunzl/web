<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class readmsgUModel extends X {
public function getFromUserInfo($uid) {
$m = parent::model('user','um');
$data = $m->getUserSimpleInfo($uid);
unset($m);
return $data;
}
private function _getFromUserName($uid) {
$uname = '';
$sql = "SELECT `username` FROM ".DB_PREFIX."user".
" WHERE `userid`='".intval($uid)."'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$uname = trim($rows['username']);
}
unset($sql,$rows);
return $uname;
}
public function getFromUid($msgid) {
$uid = 0;
$sql = "SELECT `fromuserid` FROM ".DB_PREFIX."message".
" WHERE `msgid`='{$msgid}' AND `touserid`='".parent::$wrap_user['userid']."'".
" AND `todeleted`='0'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$uid = intval($rows['fromuserid']);
}
unset($sql,$rows);
return $uid;
}
public function doReadMsg($id,$fromuid,$fromsex,$grp=NULL) {
$result = false;
$limit = 0;
if (parent::$wrap_user['gender'] == $fromsex) {
$limit = intval($grp['msg']['txviewlimit']);
}
else {
$limit = intval($grp['msg']['yxviewlimit']);
}
if ($limit == 1) {
if ($id>0 &&$fromuid>0) {
$time = time();
$viewid = parent::$obj->fetch_newid("SELECT MAX(viewid) FROM ".DB_PREFIX."message_dayviews",1);
$view_array = array(
'viewid'=>$viewid,
'readuserid'=>parent::$wrap_user['userid'],
'fromuserid'=>$fromuid,
'msgid'=>$id,
'tyear'=>date('Y',$time),
'tmonth'=>date('m',$time),
'tday'=>date('d',$time),
'dateline'=>strtotime(date('Y-m-d',$time)),
'fromsex'=>$fromsex,
);
parent::$obj->insert(DB_PREFIX.'message_dayviews',$view_array);
unset($view_array);
}
}
if ($id >0) {
parent::$obj->update(DB_PREFIX.'message',array('readflag'=>1,'readtime'=>time()),"msgid='{$id}'");
$result = true;
}
return $result;
}
public function getOneMsg($id) {
$sql = "SELECT * FROM ".DB_PREFIX."message".
" WHERE `msgid`='{$id}' AND `touserid`='".parent::$wrap_user['userid']."'".
" AND `todeleted`='0'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$rows['frominfo'] = $this->getFromUserInfo(intval($rows['fromuserid']));
}
unset($sql);
return $rows;
}
public function getPreviousID($id) {
$previous_id = 0;
$query = "SELECT `msgid` FROM ".DB_PREFIX."message".
" WHERE `touserid`='".parent::$wrap_user['userid']."'".
" AND `todeleted`='0' AND `msgid`<{$id}".
" ORDER BY `msgid` DESC LIMIT 1";
$rows = parent::$obj->fetch_first($query);
if (!empty($rows)) {
$previous_id = $rows['msgid'];
}
unset($query,$rows);
return $previous_id;
}
public function getNextID($id) {
$next_id = 0;
$query = "SELECT `msgid` FROM ".DB_PREFIX."message".
" WHERE `touserid`='".parent::$wrap_user['userid']."'".
" AND `todeleted`='0' AND `msgid`>{$id}".
" ORDER BY `msgid` ASC LIMIT 1";
$rows = parent::$obj->fetch_first($query);
if (!empty($rows)) {
$next_id = $rows['msgid'];
}
unset($query,$rows);
return $next_id;
}
public function doPayReadMsg($msgid,$fee,$fromuid=0,$fromsex=0) {
$res = false;
if ($msgid>0 &&$fee>0) {
$fromusername = $this->_getFromUserName($fromuid);
$log_content = XLang::get('money_viewmsglog');
$log_content = str_ireplace(
array('{userid}','username','{fee}'),
array($fromuid,$fromusername,$fee),
$log_content
);
$log_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>2,
'amount'=>$fee,
'logcontent'=>$log_content,
'opuser'=>parent::$wrap_user['username'],
'ordernum'=>'',
);
$m_money = parent::model('money','am');
$m_money->doAdd($log_array);
unset($m_money);
unset($log_array);
parent::$obj->update(DB_PREFIX.'message',array('readflag'=>1,'readtime'=>time()),"msgid='{$msgid}'");
$res = true;
}
return $res;
}
}
?>