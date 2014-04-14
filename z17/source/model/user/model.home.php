<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class homeUModel extends X {
public function getHomeSimpleInfo($uid) {
$sql = "SELECT `userid`, `username`, `gender` FROM ".DB_PREFIX."user".
" WHERE `userid`='{$uid}'";
$data = parent::$obj->fetch_first($sql);
return $data;
unset($sql);
}
public function checkEnoughMoney($fee) {
$fee = floatval($fee);
$m_user = parent::model('user','am');
$user_info = $m_user->getUserMoney(parent::$wrap_user['userid']);
unset($m_user);
if (floatval($user_info['money']) <$fee) {
return false;
}
else {
return true;
}
}
public function doPayContact($homeuid,$fee) {
$result = false;
$sql = "SELECT `fid` FROM ".DB_PREFIX."home_paycontact".
" WHERE `userid`='".parent::$wrap_user['userid']."' AND homeuserid='{$homeuid}'";
$rows = parent::$obj->fetch_first($sql);
if (empty($rows)) {
$fid = parent::$obj->fetch_newid("SELECT MAX(fid) FROM ".DB_PREFIX."home_paycontact",1);
$array = array(
'fid'=>$fid,
'userid'=>parent::$wrap_user['userid'],
'homeuserid'=>$homeuid,
'fee'=>$fee,
'timeline'=>time(),
);
$result = parent::$obj->insert(DB_PREFIX.'home_paycontact',$array);
if (true === $result) {
if ($fee >0) {
$log_content = XLang::get('money_viewcontactlog');
$m_user = parent::model('user','am');
$home_username = $m_user->getUserByName($homeuid);
unset($m_user);
$log_content = str_ireplace(
array('{userid}','username','{fee}'),
array($homeuid,$home_username,$fee),
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
}
}
}
unset($rows,$sql);
return $result;
}
public function checkPayContact($homeuid) {
$result = false;
$sql = "SELECT `fid` FROM ".DB_PREFIX."home_paycontact".
" WHERE `userid`='".parent::$wrap_user['userid']."' AND homeuserid='{$homeuid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$result = true;
}
unset($rows,$sql);
return $result;
}
public function getHomeInfo($uid) {
$data = null;
$m_index_home = parent::model('home','im');
$data = $m_index_home->getOneData($uid);
unset($m_index_home);
return $data;
}
public function doPayAlbum($homeuid,$fee) {
$result = false;
$sql = "SELECT `fid` FROM ".DB_PREFIX."home_payalbum".
" WHERE `userid`='".parent::$wrap_user['userid']."' AND homeuserid='{$homeuid}'";
$rows = parent::$obj->fetch_first($sql);
if (empty($rows)) {
$fid = parent::$obj->fetch_newid("SELECT MAX(fid) FROM ".DB_PREFIX."home_payalbum",1);
$array = array(
'fid'=>$fid,
'userid'=>parent::$wrap_user['userid'],
'homeuserid'=>$homeuid,
'fee'=>$fee,
'timeline'=>time(),
);
$result = parent::$obj->insert(DB_PREFIX.'home_payalbum',$array);
if (true === $result) {
if ($fee >0) {
$log_content = XLang::get('money_viewalbumlog');
$m_user = parent::model('user','am');
$home_username = $m_user->getUserByName($homeuid);
unset($m_user);
$log_content = str_ireplace(
array('{userid}','username','{fee}'),
array($homeuid,$home_username,$fee),
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
}
}
}
unset($rows);
unset($sql);
return $result;
}
public function checkPayAlbum($homeuid) {
$result = false;
$sql = "SELECT `fid` FROM ".DB_PREFIX."home_payalbum".
" WHERE `userid`='".parent::$wrap_user['userid']."' AND homeuserid='{$homeuid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$result = true;
}
unset($rows);
unset($sql);
return $result;
}
public function getHomeAlbum($uid) {
$data = null;
$m_index_album = parent::model('album','im');
$data = $m_index_album->volistAll("v.userid='{$uid}'",'',1000);
unset($m_index_album);
return $data;
}
public function checkValidMobile($uid) {
$result = false;
$sql = "SELECT v.mobile FROM ".DB_PREFIX."user_attr AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" WHERE v.userid='{$uid}' AND v.mobilerz='1'";
$rows = parent::$obj->fetch_first($sql);
if (!emtpy($rows)) {
if (true == XValid::isMobile($rows['mobile'])) {
$result = $rows['mobile'];
}
}
unset($rows);
unset($sql);
return $result;
}
public function doSendSms() {
}
public function doWriteMsg($tuid,$content,$fee,$msgid=0) {
$result = false;
$tuser_info = $this->getHomeSimpleInfo($tuid);
if (!empty($tuser_info) &&$fee>0) {
$log_content = XLang::get('money_sendmsglog');
$log_content = str_ireplace(
array('{userid}','username','{fee}'),
array($tuid,$tuser_info['username'],$fee),
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
$model_m = parent::model('message','um');
$result = $model_m->doSaveSendMsg($content,$tuid,$tuser_info['gender'],array('id'=>$msgid,'adddaylog'=>false));
unset($model_m);
}
unset($tuser_info);
return $result;
}
}
?>