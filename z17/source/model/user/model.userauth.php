<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class userauthUModel extends X {
private $error = array(
'send_noauth'=>'对不起，您所在会员组没有权限发送信件！请升级。',
'send_reach_male'=>'对不起，您今天给男会员发信件的数量已满[{cannums}]，<br />请改天再发，或者升级会员组！',
'send_reach_female'=>'对不起，您今天给女会员发信件的数量已满[{cannums}]，<br />请改天再发，或者升级会员组！',
'read_noauth'=>'对不起，您所在会员组没有权限查看新信件！请升级。',
'read_reach_male'=>'对不起，您今天查看男会员的来信数量已满[{cannums}]，<br />请改天再查看，或者升级会员组！',
'read_reach_female'=>'对不起，您今天查看女会员的来信数量已满[{cannums}]，<br />请改天再查看，或者升级会员组！',
);
public function getMsgDaySendNums($tosex) {
$count = 0;
$dateline = strtotime(date('Y-m-d',time()));
$count_sql = "SELECT COUNT(msgid) AS my_count".
" FROM ".DB_PREFIX."message_daysends".
" WHERE `senduserid`='".parent::$wrap_user['userid']."'".
" AND `dateline`='{$dateline}'";
if ($tosex == 1) {
$count_sql .= " AND `tosex`='1'";
}
elseif ($tosex == 2) {
$count_sql .= " AND `tosex`='2'";
}
else {
}
$count = parent::$obj->fetch_count($count_sql);
unset($count_sql);
return $count;
}
public function getMsgDayReadNums($fromsex) {
$count = 0;
$dateline = strtotime(date('Y-m-d',time()));
$count_sql = "SELECT COUNT(msgid) AS my_count".
" FROM ".DB_PREFIX."message_dayviews".
" WHERE `readuserid`='".parent::$wrap_user['userid']."'".
" AND `dateline`='{$dateline}'";
if ($fromsex == 1) {
$count_sql .= " AND `fromsex`='1'";
}
elseif ($tosex == 2) {
$count_sql .= " AND `fromsex`='2'";
}
else {
}
$count = parent::$obj->fetch_count($count_sql);
unset($count_sql);
return $count;
}
public function checkMsgLimit($mygender,$msgconfig,$sex,$type='send') {
$is_limit = 0;
$can_nums = 0;
$result = 0;
if ($sex == 1) {
if ($type == 'send'){
$is_limit = $mygender==1 ?intval($msgconfig['txsendlimit']) : intval($msgconfig['yxsendlimit']);
if ($is_limit == 1) {
$can_nums = $mygender==1 ?intval($msgconfig['txsendnum']) : intval($msgconfig['yxsendnum']);
$result = $can_nums;
}
else {
$result = false;
}
}
else {
$is_limit = $mygender==1 ?intval($msgconfig['txviewlimit']) : intval($msgconfig['yxviewlimit']);
if ($is_limit == 1) {
$can_nums = $mygender==1 ?intval($msgconfig['txviewnum']) : intval($msgconfig['yxviewnum']);
$result = $can_nums;
}
else {
$result = false;
}
}
}
else {
if ($type == 'send'){
$is_limit = $mygender==1 ?intval($msgconfig['yxsendlimit']) : intval($msgconfig['txsendlimit']);
if ($is_limit == 1) {
$can_nums = $mygender==1 ?intval($msgconfig['yxsendnum']) : intval($msgconfig['txsendnum']);
$result = $can_nums;
}
else {
$result = false;
}
}
else {
$is_limit = $mygender==1 ?intval($msgconfig['yxviewlimit']) : intval($msgconfig['txviewlimit']);
if ($is_limit == 1) {
$can_nums = $mygender==1 ?intval($msgconfig['yxviewnum']) : intval($msgconfig['txviewnum']);
$result = $can_nums;
}
else {
$result = false;
}
}
}
return $result;
}
public function checkSendAuth($mysex,$msgconfig,$tosex) {
$adddaylog = false;
$error = '';
$limit_nums = $this->checkMsgLimit($mysex,$msgconfig,$tosex,'send');
if (false === $limit_nums) {
}
else {
if ($limit_nums == 0) {
$error = $this->error['send_noauth'];
}
else {
$hashid = (intval(parent::$wrap_user['userid'])+intval($touid));
$has_daysend_nums = $this->getMsgDaySendNums($tosex);
$has_hash = $this->getHashAllow($hashid);
if (intval(parent::$cfg['messageruntype']) == 1) {
if (false === $has_hash) {
if ($has_daysend_nums >= $limit_nums) {
if ($tosex == 1) {
$halt_content = $this->error['send_reach_male'];
}
else {
$halt_content = $this->error['send_reach_female'];
}
$halt_content = str_replace('{cannums}',$limit_nums,$halt_content);
$error = $halt_content;
}
else {
$adddaylog = true;
}
}
}
else {
if ($has_daysend_nums >= $limit_nums) {
if ($tosex == 1) {
$halt_content = $this->error['send_reach_male'];
}
else {
$halt_content = $this->error['send_reach_female'];
}
$halt_content = str_replace('{cannums}',$limit_nums,$halt_content);
$error = $halt_content;
}
else {
$adddaylog = true;
}
}
}
}
return array($adddaylog,$error);
}
public function checkReadAuth($mysex,$msgconfig,$fromsex) {
$adddaylog = false;
$error = '';
$limit_nums = $this->checkMsgLimit($mysex,$msgconfig,$fromsex,'read');
if (false === $limit_nums) {
}
else {
if ($limit_nums == 0) {
$error = $this->error['read_noauth'];
}
else {
$hashid = (intval(parent::$wrap_user['userid'])+intval($fromsex));
$has_dayview_nums = $this->getMsgDayReadNums($fromsex);
$has_hash = $this->getHashAllow($hashid);
if (intval(parent::$cfg['messageruntype']) == 1) {
if (false === $has_hash) {
if ($has_dayview_nums >= $limit_nums) {
if ($fromsex == 1) {
$halt_content = $this->error['read_reach_male'];
}
else {
$halt_content = $this->error['read_reach_female'];
}
$halt_content = str_replace('{cannums}',$limit_nums,$halt_content);
$error = $halt_content;
}
else {
$adddaylog = true;
}
}
}
else {
if ($has_dayview_nums >= $limit_nums) {
if ($fromsex == 1) {
$halt_content = $this->error['read_reach_male'];
}
else {
$halt_content = $this->error['read_reach_female'];
}
$halt_content = str_replace('{cannums}',$limit_nums,$halt_content);
$error = $halt_content;
}
else {
$adddaylog = true;
}
}
}
}
return array($adddaylog,$error);
}
public function checkLimitAvatarRized($avatar,$flag) {
$status = false;
$avatarpermflag = intval(parent::$cfg['avatarpermflag']);
if ($avatarpermflag == 1) {
if (!empty($avatar) &&$flag == 1) {
$status = false;
}
else {
$status = true;
}
}
return $status;
}
public function checkLimitEmailRized($emailrz) {
$status = false;
$rzpermflag = intval(parent::$cfg['rzpermflag']);
if ($rzpermflag == 1) {
$status = $emailrz == 0 ?true : false;
}
return $status;
}
public function getHashAllow($hid) {
$status = false;
$sql = "SELECT COUNT(allowid) FROM ".DB_PREFIX."message_allow WHERE `hashid`='{$hid}'";
$nums = parent::$obj->fetch_count($sql);
unset($sql);
if ($nums == 2) {
$status = true;
}
return $status;
}
}
?>