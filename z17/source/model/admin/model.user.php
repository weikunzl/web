<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class userAModel extends X {
private function _buildParamsSql() {
$sql = "SELECT ps.userid FROM ".DB_PREFIX."user_params AS ps";
return $sql;
}
private function _getUserIds($data) {
$strusers = '';
if (!empty($data)) {
$i = 0;
foreach ($data as $key=>$value) {
if ($i == 0) {
$fuhao = '';
}
else {
$fuhao = ',';
}
$strusers .= $fuhao.$value['userid'];
$i++;
}
}
unset($data);
return $strusers;
}
private function _buildLikeSql() {
$sql = "SELECT v.userid FROM ".DB_PREFIX."user AS v";
return $sql;
}
private function _buildSql() {
$sql = "SELECT v.*,".
" s.*,".
' e.*,'.
" vip.*,".
" p.*,".
" ps.elite, ps.liehun,".
" g.groupname".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_attr AS e ON v.userid=e.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".
" LEFT JOIN ".DB_PREFIX."user_params AS ps ON v.userid=ps.userid".
" LEFT JOIN ".DB_PREFIX."user_group AS g ON v.groupid=g.groupid";
return $sql;
}
private function _buildSearchSql() {
$sql = "SELECT v.gender, v.userid, v.username, v.email".
" FROM ".DB_PREFIX."user AS v";
return $sql;
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
public function getParamsList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY ps.userid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?30 : intval($items['pagesize']);
$start      = ($items['page']-1)*$pagesize;
$where      = empty($items['searchsql']) ?'': ' '.$items['searchsql'];
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_params as ps".
" WHERE 1=1".$where;
$total = parent::$obj->fetch_count($countsql);
if ($total == 0) {
$data = null;
}
else {
$params_sql =  $this->_buildParamsSql()." WHERE 1=1"
.$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$users = parent::$obj->getall($params_sql);
$ids = $this->_getUserIds($users);
$sql = $this->_buildSql()." WHERE v.userid IN (".$ids.") ORDER BY v.userid DESC";
$data = parent::$obj->getall($sql);
}
return array($total,$this->_handleList($data,'userid'));
}
public function getLikeList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.userid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?30 : intval($items['pagesize']);
$start      = ($items['page']-1)*$pagesize;
$where      = empty($items['searchsql']) ?'': ' '.$items['searchsql'];
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user as v".
" WHERE 1=1".$where;
$total = parent::$obj->fetch_count($countsql);
if ($total == 0) {
$data = null;
}
else {
$like_sql =  $this->_buildLikeSql()." WHERE 1=1"
.$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$users = parent::$obj->getall($like_sql);
$ids = $this->_getUserIds($users);
$sql = $this->_buildSql()." WHERE v.userid IN (".$ids.") ORDER BY v.userid DESC";
$data = parent::$obj->getall($sql);
}
return array($total,$this->_handleList($data,'userid'));
}
public function getPenyMonologList($items) {
$where      = " WHERE 1=1 ".$items['searchsql'];
$start      = ($items['page']-1)*$items['pagesize'];
$countsql   = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."user_profile AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.userid, v.monolog, v.molstatus, v.moluptime, u.username".
" FROM ".DB_PREFIX."user_profile AS v".
" INNER JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".
$where." ORDER BY v.moluptime DESC LIMIT {$start}, ".$items['pagesize']."";
$array = parent::$obj->getall($sql);
return array($total,$array);
}
public function getPenyAvatarList($items) {
$where      = " WHERE 1=1".$items['searchsql'];
$start      = ($items['page']-1)*$items['pagesize'];
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql = "SELECT v.* FROM ".DB_PREFIX."user AS v";
$sql .= $where." ORDER BY v.avatartime DESC LIMIT {$start}, ".$items['pagesize']."";
$array = parent::$obj->getall($sql);
return array($total,$array);
}
public function getSearchList($items) {
$where      = " WHERE 1=1".$items['searchsql'];
$start      = ($items['page']-1)*$items['pagesize'];
$countsql   = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."user AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildSearchSql().$where." ORDER BY v.userid DESC LIMIT ".$start.", ".$items['pagesize']."";
$array = parent::$obj->getall($sql);
return array($total,$array);
}
public function getUserByName($uid) {
$sql = "SELECT `username` FROM ".DB_PREFIX."user".
" WHERE `userid`='{$uid}'";
$udata = parent::$obj->fetch_first($sql);
if (!empty($udata)) {
return trim($udata['username']);
}
else {
return '';
}
unset($udata);
unset($sql);
}
private function _handleData($data) {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
$data['homeurl'] = XUrl::getHomeUrl($data['userid']);
$data['age'] = XMod::getAge($data['ageyear']);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
}
return $data;
}
public function handleVipValid($groupid,$vipenddate) {
$result = array();
if ($groupid>1) {
if ($vipenddate <strtotime(date('Y-m-d'),time())) {
$result['vipenddate_t']	= "<font color='red'>".date('Y/m/d',$vipenddate)."</font>";
$result['vip'] = 2;
}
else {
$result['vipenddate_t']	= "<font color='green'>".date('Y/m/d',$vipenddate)."</font>";
$result['vip'] = 1;
}
}
else {
$result['vipenddate_t'] = '';
$result['vip'] = 0;
}
return $result;
}
public function getData($id) {
$sql = $this->_buildSql()." WHERE v.userid='{$id}'";
$data = parent::$obj->fetch_first($sql);
return $this->_handleData($data);
}
public function getUid($username) {
$sql = "SELECT `userid` FROM ".DB_PREFIX."user WHERE `username`='{$username}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
return $rows['userid'];
}
else {
return 0;
}
}
public function getUserMoney($id) {
$sql = "SELECT `money`, `points`, `mbsms` FROM ".DB_PREFIX."user WHERE `userid`='".intval($id)."'";
return parent::$obj->fetch_first($sql);
}
public function doAdd($main_args,$profile_args,$contact_args,$params_args=null) {
$regstartid = empty(parent::$cfg['regstartid']) ?1 : intval(parent::$cfg['regstartid']);
$groupid = empty(parent::$cfg['usergrid']) ?1 : intval(parent::$cfg['usergrid']);
$userid = parent::$obj->fetch_newid('SELECT MAX(userid) FROM '.DB_PREFIX.'user',$regstartid);
$regtime = time();
$flag = 1;
$lovestatus = 1;
$main_args['password'] = md5($main_args['password']);
$main_args = array_merge(array(
'userid'=>$userid,
'groupid'=>$groupid,
'salt'=>XHandle::getRndChar(8),
),$main_args);
$result = parent::$obj->insert(DB_PREFIX.'user',$main_args);
$status_args = array(
'userid'=>$userid,
'regtime'=>$regtime,
'regip'=>XRequest::getip(),
'flag'=>$flag,
'lovestatus'=>$lovestatus,
);
parent::$obj->insert(DB_PREFIX.'user_status',$status_args);
$vip_args = array(
'userid'=>$userid,
'viplevel'=>0,
);
parent::$obj->insert(DB_PREFIX.'user_validate',$vip_args);
$contact_args = array_merge(
array(
'userid'=>$userid,
),
$contact_args
);
parent::$obj->insert(DB_PREFIX.'user_attr',$contact_args);
$profile_args['userid'] = $userid;
parent::$obj->insert(DB_PREFIX.'user_profile',$profile_args);
$params_args = array_merge(
array(
'userid'=>$userid,
'flag'=>$flag,
'lovestatus'=>$lovestatus,
'groupid'=>$groupid,
'addtime'=>$regtime,
),
$params_args
);
parent::$obj->insert(DB_PREFIX.'user_params',$params_args);
$cond_array = array(
'gender'=>$main_args['gender'],
'ageyear'=>$profile_args['ageyear'],
'height'=>$profile_args['height'],
'province'=>$profile_args['provinceid'],
'city'=>$profile_args['cityid'],
);
$m_passport = parent::model('passport','im');
$m_passport->saveCond($userid,$cond_array);
$m_passport->saveListen($userid);
return $result;
}
public function doEdit($id,$main_args,$profile_args,$contact_args,$params_args) {
$result = parent::$obj->update(DB_PREFIX.'user',$main_args,"userid='{$id}'");
parent::$obj->update(DB_PREFIX.'user_attr',$contact_args,"userid='{$id}'");
parent::$obj->update(DB_PREFIX.'user_profile',$profile_args,"userid='{$id}'");
parent::$obj->update(DB_PREFIX.'user_params',$params_args,"userid='{$id}'");
return $result;
}
public function doEditPassword($userid,$password) {
$md5password = md5($password);
$result = parent::$obj->update(DB_PREFIX.'user',array('password'=>$md5password),"userid='{$userid}'");
return $result;
}
public function doEditMonolog($userid,$args) {
$args = array_merge($args,array('moluptime'=>time(),));
$result = parent::$obj->update(DB_PREFIX.'user_profile',$args,"userid='{$userid}'");
if (true === $result &&!empty($args['monolog'])) {
if ($args['molstatus'] == 1) {
$molstatus = 1;
}
else {
$molstatus = 2;
}
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($userid,array('monolog'=>$molstatus));
unset($m_indexs);
}
return $result;
}
public function doEditRz($userid,$args) {
$result = parent::$obj->update(DB_PREFIX.'user_status',$args,"userid='{$userid}'");
$indexs_array = array(
'star'=>intval($args['star']),
'rzemail'=>intval($args['emailrz']),
'rzmobile'=>intval($args['mobilerz']),
'rzidnumber'=>intval($args['idnumberrz']),
);
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($userid,$indexs_array);
unset($m_indexs);
return $result;
}
public function doDel($id) {
$result = true;
$user_ids = array(
'user','user_attr','user_profile','user_status','user_validate','user_params',
'user_certify','user_cond','user_logins','user_match','user_mbsms','user_money',
'user_online','user_photo','user_points','user_videorz','user_viprecord',
'system_msg','sms_log','payment_log','oauth_user','mail_log','friend',
);
foreach ($user_ids as $ukey=>$uval) {
parent::$obj->query("DELETE FROM ".DB_PREFIX.$uval." WHERE `userid`='{$id}'");
}
if (true === parent::$obj->table_exist('ask')) {
$ask_sql = "SELECT `askid` FROM ".DB_PREFIX."ask WHERE `userid`='{$id}'";
$ask_row = parent::$obj->getall($ask_sql);
foreach ($ask_row as $akey=>$aval) {
$askid = intval($aval['askid']);
parent::$obj->query("DELETE FROM ".DB_PREFIX."ask_answer WHERE `askid`='{$askid}'");
}
unset($ask_sql);
unset($ask_row);
parent::$obj->query("DELETE FROM ".DB_PREFIX."ask WHERE `userid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."ask_answer WHERE `anuserid`='{$id}'");
}
parent::$obj->query("DELETE FROM ".DB_PREFIX."complaints WHERE `cpuid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."complaints WHERE `fromuid`='{$id}'");
if (true === parent::$obj->table_exist('ceshi_comment')) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."ceshi_comment WHERE `cmuserid`='{$id}'");
}
if (true === parent::$obj->table_exist('ceshi_record')) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."ceshi_record WHERE `userid`='{$id}'");
}
if (true === parent::$obj->table_exist('ceshi_truerate')) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."ceshi_truerate WHERE `userid`='{$id}'");
}
if (true === parent::$obj->table_exist('dating')) {
$dating_sql = "SELECT `datingid` FROM ".DB_PREFIX."dating WHERE `userid`='{$id}'";
$dating_row = parent::$obj->getall($dating_sql);
foreach ($dating_row as $dkey=>$dval) {
$datingid = intval($dval['datingid']);
parent::$obj->query("DELETE FROM ".DB_PREFIX."dating_cond WHERE `datingid`='{$datingid}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."dating_user WHERE `datingid`='{$datingid}'");
}
unset($dating_sql);
unset($dating_row);
parent::$obj->query("DELETE FROM ".DB_PREFIX."dating WHERE `userid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."dating_user WHERE `userid`='{$id}'");
}
if (true === parent::$obj->table_exist('diary')) {
$diary_sql = "SELECT `diaryid` FROM ".DB_PREFIX."diary WHERE `userid`='{$id}'";
$diary_row = parent::$obj->getall($diary_sql);
foreach ($diary_row as $dykey=>$dyval) {
$diaryid = intval($dyval['diaryid']);
parent::$obj->query("DELETE FROM ".DB_PREFIX."diary_comment WHERE `diaryid`='{$diaryid}'");
}
unset($diary_sql);
unset($diary_row);
parent::$obj->query("DELETE FROM ".DB_PREFIX."diary WHERE `userid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."diary_comment WHERE `cmuserid`='{$id}'");
}
parent::$obj->query("DELETE FROM ".DB_PREFIX."friend WHERE `fuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."gift_record WHERE `fromuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."gift_record WHERE `touserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."hibox WHERE `fromuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."hibox WHERE `touserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."home_payalbum WHERE `userid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."home_payalbum WHERE `homeuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."home_paycontact WHERE `userid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."home_paycontact WHERE `homeuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."home_viewer WHERE `homeuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."home_viewer WHERE `viewuserid`='{$id}'");
$msg_sql = "SELECT `hashid` FROM ".DB_PREFIX."message".
" WHERE (`fromuserid`='{$id}' OR `touserid`='{$id}')";
$msg_rows = parent::$obj->getall($msg_sql);
foreach ($msg_rows as $mkey=>$mval) {
$hashid = $mval['hashid'];
parent::$obj->query("DELETE FROM ".DB_PREFIX."message_hash WHERE `hashid`='{$hashid}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."message_allow WHERE `hashid`='{$hashid}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."message WHERE `hashid`='{$hashid}'");
}
unset($msg_sql);
unset($msg_rows);
parent::$obj->query("DELETE FROM ".DB_PREFIX."message_daysends WHERE `senduserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."message_daysends WHERE `touserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."message_dayviews WHERE `readuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."message_dayviews WHERE `fromuserid`='{$id}'");
if (true === parent::$obj->table_exist('party_signup')) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."party_signup WHERE `userid`='{$id}'");
}
if (true === parent::$obj->table_exist('party_comment')) {
parent::$obj->query("DELETE FROM ".DB_PREFIX."party_comment WHERE `cmuserid`='{$id}'");
}
parent::$obj->query("DELETE FROM ".DB_PREFIX."promotion WHERE `tuserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."promotion WHERE `ruserid`='{$id}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."promotion_settle WHERE `tuserid`='{$id}'");
if (true === parent::$obj->table_exist('story')) {
$story_sql = "SELECT `storyid` FROM ".DB_PREFIX."story".
" WHERE (`maleuserid`='{$id}' OR `femaleuserid`='{$id}')";
$story_rows = parent::$obj->getall($story_sql);
foreach ($story_rows as $skey=>$sval) {
$storyid = intval($sval['storyid']);
parent::$obj->query("DELETE FROM ".DB_PREFIX."story WHERE `storyid`='{$storyid}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."story_comment WHERE `storyid`='{$storyid}'");
}
unset($story_sql);
unset($story_rows);
parent::$obj->query("DELETE FROM ".DB_PREFIX."story_comment WHERE `cmuserid`='{$id}'");
}
if (true === parent::$obj->table_exist('weibo')) {
$weibo_sql = "SELECT `wbid` FROM ".DB_PREFIX."weibo WHERE `userid`='{$id}'";
$weibo_rows = parent::$obj->getall($weibo_sql);
foreach ($weibo_rows as $wkey=>$wval) {
$wbid = $weibo_rows['wbid'];
parent::$obj->query("DELETE FROM ".DB_PREFIX."weibo_comment WHERE `wbid`='{$wbid}'");
parent::$obj->query("DELETE FROM ".DB_PREFIX."weibo WHERE `wbid`='{$wbid}'");
}
unset($weibo_sql);
unset($weibo_rows);
parent::$obj->query("DELETE FROM ".DB_PREFIX."weibo_comment WHERE `cmuserid`='{$id}'");
}
return $result;
}
public function doExistsUserName($username) {
$sql = "SELECT `userid` FROM ".DB_PREFIX."user WHERE `username`='{$username}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
return true;
}
else {
return false;
}
unset($rows);
}
public function doExistsEmail($email) {
$sql = "SELECT `userid` FROM ".DB_PREFIX."user WHERE `email`='{$email}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
return true;
}
else {
return false;
}
unset($rows);
}
public function doCheckForbidUser($username) {
}
public function doOpenVip($userid,$args) {
$user_array = array(
'groupid'=>$args['groupid'],
);
$startline = date('Y-m-d',time());
$endline = XHandle::diffDate(time(),$args['days']);
$enddate = date('Y-m-d',$endline);
$args['content'] = str_replace(
array('{groupname}','{enddate}'),
array($args['groupname'],$enddate),
$args['content']
);
$vip_array = array(
'viplevel'=>$args['groupid'],
'vipforever'=>0,
'vipstartdate'=>$startline,
'vipenddate'=>$endline,
);
$result = parent::$obj->update(DB_PREFIX.'user',$user_array,"userid='".intval($userid)."'");
if (true === $result) {
parent::$obj->update(DB_PREFIX.'user_validate',$vip_array,"userid='".intval($userid)."'");
if ($args['money']>0) {
$money_array = array(
'userid'=>$userid,
'actiontype'=>2,
'amount'=>$args['money'],
'logcontent'=>$args['content'],
'opuser'=>parent::$wrap_admin['adminname'],
'ordernum'=>'',
);
$m = parent::model('money','am');
$m->doAdd($money_array);
unset($m);
}
if ($args['points']>0) {
$points_array = array(
'userid'=>$userid,
'actiontype'=>1,
'points'=>$args['points'],
'logcontent'=>$args['content'],
'opuser'=>parent::$wrap_admin['adminname'],
'ordernum'=>'',
);
$m = parent::model('points','am');
$m->doAdd($points_array);
unset($m);
}
parent::$obj->update(DB_PREFIX.'user_params',array('groupid'=>$args['groupid']),"userid='{$userid}'");
}
return $result;
}
public function doHandleVip($userid,$args) {
$user_array = array(
'groupid'=>$args['groupid'],
);
$statline = strtotime(date('Y-m-d',time()));
$endline = strtotime($args['vipenddate']);
$vip_array = array(
'viplevel'=>$args['groupid'],
'vipforever'=>0,
'vipstartdate'=>$statline,
'vipenddate'=>$endline,
);
$result = parent::$obj->update(DB_PREFIX.'user',$user_array,"userid='".intval($userid)."'");
if (true === $result) {
parent::$obj->update(DB_PREFIX.'user_validate',$vip_array,"userid='".intval($userid)."'");
if ($args['deductmoney']>0) {
$money_array = array(
'userid'=>$userid,
'actiontype'=>2,
'amount'=>$args['deductmoney'],
'logcontent'=>$args['rencontent'],
'opuser'=>parent::$wrap_admin['adminname'],
'ordernum'=>'',
);
$m = parent::model('money','am');
$m->doAdd($money_array);
unset($m);
}
parent::$obj->update(DB_PREFIX.'user_params',array('groupid'=>$args['groupid']),"userid='{$userid}'");
}
return $result;
}
public function doCancelVip($userid,$returnmoney,$content) {
$user_array = array(
'groupid'=>1,
);
$vip_array = array(
'viplevel'=>0,
'vipforever'=>0,
'vipstartdate'=>0,
'vipenddate'=>0,
);
$result = parent::$obj->update(DB_PREFIX.'user',$user_array,"userid='".intval($userid)."'");
if (true === $result) {
parent::$obj->update(DB_PREFIX.'user_validate',$vip_array,"userid='".intval($userid)."'");
if ($returnmoney>0) {
$money_array = array(
'userid'=>$userid,
'actiontype'=>1,
'amount'=>$returnmoney,
'logcontent'=>$content,
'opuser'=>parent::$wrap_admin['adminname'],
'ordernum'=>'',
);
$m = parent::model('money','am');
$m->doAdd($money_array);
unset($m);
}
parent::$obj->update(DB_PREFIX.'user_params',array('groupid'=>$args['groupid']),"userid='{$userid}'");
}
return $result;
}
public function doUnPassAvatar($id) {
$result = parent::$obj->update(DB_PREFIX.'user',array('avatarflag'=>-1),"userid='{$id}'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($id,array('avatar'=>-1));
unset($m_indexs);
}
return $result;
}
public function doPassAvatar($id) {
$result = parent::$obj->update(DB_PREFIX.'user',array('avatarflag'=>1),"userid='{$id}'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($id,array('avatar'=>1));
unset($m_indexs);
}
return $result;
}
public function doDelAvatar($id) {
$result = false;
$sql = "SELECT `avatar` FROM ".DB_PREFIX."user".
" WHERE userid='{$id}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if (!empty($rows['avatar'])) {
$thumb_avatar = $rows['avatar'];
$big_avatar = str_replace('.thumb.jpg','',$thumb_avatar);
$small_avatar = str_replace('avatar_big.jpg','avatar_small.jpg',$big_avatar);
if (substr($thumb_avatar,0,15) == 'data/attachment'){
parent::loadUtil('file');
XFile::delFile($thumb_avatar);
if (file_exists(BASE_ROOT.$big_avatar)) {
XFile::delFile($big_avatar);
}
if (file_exists(BASE_ROOT.$small_avatar)) {
XFile::delFile($small_avatar);
}
}
}
$result = parent::$obj->update(DB_PREFIX.'user',array('avatarflag'=>0,'avatar'=>''),"userid='{$id}'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($id,array('avatar'=>0));
unset($m_indexs);
}
}
return $result;
}
public function doUnPassMonolog($id) {
$result = parent::$obj->update(DB_PREFIX.'user_profile',array('molstatus'=>-1),"userid='{$id}'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($id,array('monolog'=>-1));
unset($m_indexs);
}
return $result;
}
public function doPassMonolog($id) {
$result = parent::$obj->update(DB_PREFIX.'user_profile',array('molstatus'=>1),"userid='{$id}'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($id,array('monolog'=>1));
unset($m_indexs);
}
return $result;
}
public function doDelMonolog($id) {
$result = parent::$obj->update(DB_PREFIX.'user_profile',array('molstatus'=>0,'monolog'=>''),"userid='{$id}'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($id,array('monolog'=>0));
unset($m_indexs);
}
return $result;
}
public function doUpdate($id,$type) {
if ($type == 'flagopen') {
parent::$obj->query("UPDATE ".DB_PREFIX."user_status SET `flag`='1' WHERE `userid`='{$id}'");
return parent::$obj->query("UPDATE ".DB_PREFIX."user_params SET `flag`='1' WHERE `userid`='{$id}'");
}
elseif ($type == 'flagclose') {
parent::$obj->query("UPDATE ".DB_PREFIX."user_status SET `flag`='0' WHERE `userid`='{$id}'");
return parent::$obj->query("UPDATE ".DB_PREFIX."user_params SET `flag`='0' WHERE `userid`='{$id}'");
}
elseif ($type == 'eliteopen') {
return parent::$obj->query("UPDATE ".DB_PREFIX."user_params SET `elite`='1' WHERE `userid`='{$id}'");
}
elseif ($type == 'eliteclose') {
return parent::$obj->query("UPDATE ".DB_PREFIX."user_params SET `elite`='0' WHERE `userid`='{$id}'");
}
elseif ($type == 'liehunopen') {
return parent::$obj->query("UPDATE ".DB_PREFIX."user_params SET `liehun`='1' WHERE `userid`='{$id}'");
}
elseif ($type == 'liehunclose') {
return parent::$obj->query("UPDATE ".DB_PREFIX."user_params SET `liehun`='0' WHERE `userid`='{$id}'");
}
}
public function doLogin($id) {
$sql = "SELECT `userid`, `username`, `password`".
" FROM ".DB_PREFIX."user".
" WHERE `userid`='{$id}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadUtil('cookie');
XCookie::del('app_userinfo');
$sid = '';
$sid .= $rows['userid'].'\u';
$sid .= $rows['username'].'\u';
$sid .= $rows['password'].'\u';
$sid .= time();
$code = parent::import('code','util');
$sid = $code->authCode($sid,'ENCODE',OESOFT_RANDKEY);
unset($code);
XCookie::set('app_userinfo',$sid);
return true;
}
else {
return false;
}
unset($rows);
}
}
?>