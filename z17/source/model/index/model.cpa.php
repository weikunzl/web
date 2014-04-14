<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class cpaIModel extends X {
public $promo_config = null;
private function _getConfig() {
$file = BASE_ROOT.'./source/conf/promotion.inc.php';
if (file_exists($file)) {
if (empty($this->promo_config)) {
$this->promo_config = require_once $file;
}
}
}
public function getCapInfo() {
$this->_getConfig();
return $this->promo_config;
}
public function doCpa($tuid=0) {
$url = parent::$urlpath.'index.php';
$tuid = intval($tuid);
$this->_getConfig();
if ($tuid>0) {
if (!empty($this->promo_config)) {
if (true === $this->promo_config['promotion']) {
if (intval($this->promo_config['jumptype']) == 1) {
$url .= "?c=passport&a=reg";
}
$code = parent::import('code','util');
$tuid_s = $code->authCode($tuid,'ENCODE',OESOFT_RANDKEY);
parent::loadUtil('cookie');
XCookie::del('promoTuid');
XCookie::set('promoTuid',$tuid_s);
}
}
}
return $url;
}
public function addToCpa($ruid) {
$res = true;
$this->_getConfig();
$ruid = intval($ruid);
if (true === $this->promo_config['promotion']) {
parent::loadUtil('cookie');
$tuid_s = XCookie::get('promoTuid');
if (!empty($tuid_s)) {
$code = parent::import('code','util');
$tuid = intval($code->authcode($tuid_s,'DECODE',OESOFT_RANDKEY));
unset($code);
if ($tuid>0 &&$ruid>0) {
$id = parent::$obj->fetch_newid("SELECT MAX(id) FROM ".DB_PREFIX."promotion",1);
$array = array(
'id'=>$id,
'tuserid'=>$tuid,
'ruserid'=>$ruid,
'timeline'=>time(),
'flag'=>1,
'validmoney'=>floatval($this->promo_config['onemoney']),
'validpoints'=>floatval($this->promo_config['onepoints']),
'settleflag'=>0,
);
$res = parent::$obj->insert(DB_PREFIX.'promotion',$array);
XCookie::del('promoTuid');
}
}
}
return $res;
}
public function getList($items) {
$where      = " WHERE v.tuserid='".parent::$wrap_user['userid']."'".$items['searchsql'];
$start      = ($items['page']-1)*$items['pagesize'];
$countsql   = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."promotion AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.*, ps.rzemail, ps.avatar".
" FROM ".DB_PREFIX."promotion AS v".
" LEFT JOIN ".DB_PREFIX."user_params AS ps ON v.ruserid=ps.userid".
$where." ORDER BY v.id DESC LIMIT ".$start.", ".$items['pagesize']."";
$array = parent::$obj->getall($sql);
return array($total,$array);
}
public function doSettle() {
$this->_getConfig();
$result = false;
$count = 0;
$id = 0;
$money = 0;
$points = 0;
if (true === $this->promo_config['promotion']) {
$sql = "SELECT v.*, r.rzemail, r.avatar".
" FROM ".DB_PREFIX."promotion AS v".
" LEFT JOIN ".DB_PREFIX."user_params AS r ON v.ruserid=r.userid".
" WHERE v.tuserid='".parent::$wrap_user['userid']."' AND v.settleflag='0'";
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$id = 0;
if ($this->promo_config['avatarvalid'] == 1) {
if ($value['rzemail'] == 1 &&$value['avatar'] == 1) {
$id = $value['id'];
}
}
else {
if ($value['rzemail'] == 1) {
$id = $value['id'];
}
}
if ($id>0) {
$money = ($money+(floatval($value['validmoney'])));
$points = ($points+(floatval($value['validpoints'])));
parent::$obj->update(DB_PREFIX.'promotion',array('settleflag'=>1,'settleline'=>time()),"`id`='{$id}'");
$count = ($count+1);
$result = true;
}
}
unset($sql);
unset($data);
if ($money>0) {
$this->_settleMoney($money);
}
if ($points>0) {
$this->_settlePoints($points);
}
}
return array($result,$count);
}
private function _settleMoney($money) {
if ($money>0) {
$money_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>1,
'amount'=>$money,
'logcontent'=>'推广会员注册',
'opuser'=>'',
'ordernum'=>'',
);
$am_money = parent::model('money','am');
$result = $am_money->doAdd($money_array);
unset($am_money);
$id = parent::$obj->fetch_newid("SELECT MAX(id) FROM ".DB_PREFIX."promotion_settle",1);
$array = array(
'id'=>$id,
'tuserid'=>parent::$wrap_user['userid'],
'totalmoney'=>$money,
'totalpoints'=>0,
'timeline'=>time(),
);
$result = parent::$obj->insert(DB_PREFIX.'promotion_settle',$array);
return $result;
}
else {
return false;
}
}
public function _settlePoints($points) {
if ($points>0) {
$points_array = array(
'userid'=>parent::$wrap_user['userid'],
'actiontype'=>1,
'points'=>$points,
'logcontent'=>'推广会员注册',
'opuser'=>'',
'ordernum'=>'',
);
$am_points = parent::model('points','am');
$result = $am_points->doAdd($points_array);
unset($am_points);
$id = parent::$obj->fetch_newid("SELECT MAX(id) FROM ".DB_PREFIX."promotion_settle",1);
$array = array(
'id'=>$id,
'tuserid'=>parent::$wrap_user['userid'],
'totalmoney'=>0,
'totalpoints'=>$points,
'timeline'=>time(),
);
$result = parent::$obj->insert(DB_PREFIX.'promotion_settle',$array);
return $result;
}
else {
return false;
}
}
public function staticUser($settleflag=0) {
$counts = 0;
$sql = "SELECT COUNT(id) FROM ".DB_PREFIX."promotion WHERE tuserid='".intval(parent::$wrap_user['userid'])."'";
if ($settleflag == 1) {
$sql .= " AND settleflag='1'";
}
elseif ($settleflag == 2) {
$sql .= " AND settleflag='0'";
}
$counts = parent::$obj->fetch_count($sql);
return intval($counts);
}
public function settleCounts($type = 1) {
if ($type == 1) {
$sql = "SELECT SUM(totalmoney) AS my_sum";
}
else {
$sql = "SELECT SUM(totalpoints) AS my_sum";
}
$sql .= " FROM ".DB_PREFIX."promotion_settle WHERE tuserid='".intval(parent::$wrap_user['userid'])."'";
$sums = 0;
$sums = parent::$obj->fetch_count($sql);
if (false === XValid::isNumber($sums)) {
$sums = 0;
}
return $sums;
}
}
?>