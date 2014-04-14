<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class ajaxIModel extends X {
private $msg = null;
public function sendMailKey() {
$result = 0;
$message = null;
$sql = "SELECT v.email, s.emailrz".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" WHERE v.userid='".parent::$wrap_user['userid']."'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if (intval($rows['emailrz']) == 1) {
$result = 1;
}
else {
$mail_result = false;
$model_mail = parent::model('mail','am');
$mail_result = $model_mail->sendValid(parent::$wrap_user['userid']);
unset($model_mail);
if (true === $mail_result) {
$result = 2;
}
else {
$result = 3;
}
}
}
return array($result,$message);
}
public function notify() {
$m_roll = parent::model('roll','am');
$this->msg = $m_roll->readCache('notify');
unset($m_roll);
}
public function getSerial() {
$this->notify();
$serial = null;
$model_roll = parent::model('roll','am');
if (false === $model_roll->checkCorn()) {
$data = $model_roll->getCert();
if (!empty($data)) {
$dataarr = explode('|',$data);
$flag = intval(@$dataarr[0]);
$domain = @$dataarr[1];
$version = @$dataarr[2];
$authdate = @$dataarr[3];
if ($flag == 1) {
$serial = $this->msg['serial_success'];
$serial = str_ireplace(
array('{domain}','{version}','{authdate}'),
array($domain,$version,$authdate),
$serial
);
}
else {
$serial = $this->msg['serial_fail'];
$serial = str_ireplace(
array('{domain}','{version}','{authdate}'),
array($domain,$version,$authdate),
$serial
);
}
}
else {
$serial = $this->msg['serial_fail'];
}
}
else {
$serial = $this->msg['rabbit_b'];
}
unset($model_roll);
return $serial;
}
public function getRabbit($type) {
$this->notify();
$json = null;
$libdm = parent::import('domain','util');
$domain = $libdm->getDomain();
unset($libdm);
if ($domain == 'localhost'||$domain == '127.0.0.1') {
$json = array(
'result'=>0,
'error'=>$this->msg['rabbit_a'],
);
}
else {
$model_roll = parent::model('roll','am');
$validTime = $model_roll->superRabbit($type);
if (true === $validTime) {
if (true === $model_roll->checkGrant($type)) {
$json = array(
'result'=>1,
'error'=>$this->msg['rabbit_b'],
);
}
else {
$json = array(
'result'=>3,
'error'=>$this->msg['rabbit_d'],
);
}
}
else {
$data = $this->httpSerial($type);
if (is_array($data)) {
$response = $model_roll->createRabbit($data);
if ($response == 2 ||$response == 1) {
$json = array(
'result'=>2,
'error'=>$this->msg['rabbit_c'],
);
}
else {
$json = array(
'result'=>3,
'error'=>$this->msg['rabbit_d'],
);
}
}
else {
$json = array(
'result'=>-1,
'error'=>'',
);
}
}
unset($model_roll);
}
return $json;
}
public function httpSerial($type='a') {
$url = $this->buildHttpUrl($type);
$curl = parent::import('curl','util');
if (OESOFT_STYPE == 1) {
$data = $curl->fileGet($url);
}
else {
$data = $curl->get($url);
}
unset($curl);
if ($data != 'fail') {
$data = json_decode($data,true);
}
return $data;
}
public function buildHttpUrl($type='a') {
$libdm = parent::import('domain','util');
$domain = $libdm->getDomain();
unset($libdm);
$sid = @require_once BASE_ROOT.'./source/conf/cert.inc.php';
$url = parent::$rabbit['url'].
'?sid='.urlencode(OESERIAL_KEY).
'&domain='.urlencode($domain).
'&t='.urlencode($type).
'&session='.md5(time());
return $url;
}
public function ajaxSendHomeSms($uid,$content,$type,$smsfee) {
$result = 0;
$message = '';
$sql = "SELECT v.mobile, s.mobilerz, u.username".
" FROM ".DB_PREFIX."user_attr AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".
" WHERE v.userid='{$uid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if (false === XValid::isMobile($rows['mobile'])) {
$result = 1;
}
else {
if ($rows['mobilerz'] == 0) {
$result = 2;
}
else {
$m_sms = parent::model('sms','am');
list($sms_result,$sms_message) = $m_sms->sendSms($rows['mobile'],$content);
unset($m_sms);
if (true === $sms_result) {
$result = 3;
$logid = parent::$obj->fetch_newid("SELECT MAX(logid) FROM ".DB_PREFIX."sms_log",1);
$sms_log_array = array(
'logid'=>$logid,
'content'=>$content,
'userid'=>$uid,
'mobile'=>$rows['mobile'],
'sendtime'=>time(),
'senduid'=>parent::$wrap_user['userid'],
'flag'=>1,
'response'=>$sms_message,
);
parent::$obj->insert(DB_PREFIX.'sms_log',$sms_log_array);
if ($type == 0) {
$log_content = XLang::get('mbsms_sendlog');
$log_content = str_ireplace(
array('{username}'),
array($rows['username']),
$log_content
);
$log_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>2,
'quantity'=>1,
'logcontent'=>$log_content,
'opuser'=>parent::$wrap_user['username'],
);
$model_mbsms = parent::model('mbsms','am');
$model_mbsms->doAdd($log_array);
unset($model_mbsms);
unset($log_array);
}
else {
if ($smsfee >0) {
$log_content = XLang::get('money_sendsmslog');
$log_content = str_ireplace(
array('{username}','{money}'),
array($rows['username'],$smsfee),
$log_content
);
$log_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>2,
'amount'=>$smsfee,
'logcontent'=>$log_content,
'opuser'=>parent::$wrap_user['username'],
);
$model_money = parent::model('money','am');
$model_money->doAdd($log_array);
unset($model_money);
unset($log_array);
}
}
}
else {
$result = 4;
$message = $sms_message;
}
}
}
}
unset($rows);
unset($sql);
return array($result,$message);
}
public function ajaxGetMobileKey($mobile) {
$result = 0;
$message = null;
$me_sql = "SELECT v.mobile, s.mobilerz".
" FROM ".DB_PREFIX."user_attr AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" WHERE v.userid='".parent::$wrap_user['userid']."'";
$me_rows = parent::$obj->fetch_first($me_sql);
if (!empty($me_rows)) {
if ($mobile == $me_rows['mobile']) {
if ($me_rows['mobilerz'] == 1) {
$result = 1;
}
}
if ($result != 1) {
$checkcode = XHandle::getRndChar(6,1);
parent::$obj->update(DB_PREFIX.'user_status',array('mobilesalt'=>$checkcode),"userid='".parent::$wrap_user['userid']."'");
$m_sms = parent::model('sms','am');
list($sms_result,$sms_message) = $m_sms->sendCheckCode($mobile,$checkcode,array('userid'=>parent::$wrap_user['userid']));
unset($m_sms);
if (true === $sms_result) {
$result = 2;
}
else {
$result = 3;
$message = $sms_message;
}
}
}
unset($me_rows);
unset($me_sql);
return array($result,$message);
}
public function ajaxGetMobileCode($mobile) {
$result = 0;
$message = null;
$checkcode = XHandle::getRndChar(6,1);
$m_sms = parent::model('sms','am');
list($sms_result,$sms_message) = $m_sms->sendCheckCode($mobile,$checkcode,array('userid'=>0));
unset($m_sms);
if (true === $sms_result) {
$result = 1;
$sql = "SELECT * FROM ".DB_PREFIX."mobile_checkcode".
" WHERE `mobile`='{$mobile}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$array = array(
'checkcode'=>$checkcode,
'updatetime'=>time(),
);
parent::$obj->update(DB_PREFIX.'mobile_checkcode',$array,"`id`='".$rows['id']."'");
}
else {
$id = parent::$obj->fetch_newid("SELECT MAX(id) FROM ".DB_PREFIX."mobile_checkcode",1);
$array = array(
'id'=>$id,
'mobile'=>$mobile,
'checkcode'=>$checkcode,
'createtime'=>time(),
);
parent::$obj->insert(DB_PREFIX.'mobile_checkcode',$array);
}
unset($sql);
unset($rows);
}
else {
$result = 2;
$message = $sms_message;
}
return array($result,$message);
}
public function doUpdateSerial($args) {
$m_roll = parent::model('roll','am');
$m_roll->createRabbit($args);
unset($m_roll);
return true;
}
}
?>