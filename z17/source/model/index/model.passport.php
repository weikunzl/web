<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class passportIModel extends X {
public function doReg($main_args,$profile_args,$contact_args,$params_args,$status=0) {
$start_uid = intval(parent::$cfg['regstartid']);
if ($start_uid<1) {
$start_uid = 1;
}
$userid = parent::$obj->fetch_newid('SELECT MAX(userid) FROM '.DB_PREFIX.'user',$start_uid);
$time = time();
$origin_password = $main_args['password'];
$main_args['password'] = md5($main_args['password']);
$main_args = array_merge(array(
'userid'=>$userid,
'salt'=>XHandle::getRndChar(8),
'groupid'=>intval(parent::$cfg['usergrid']),
'integrity'=>$status,
),$main_args);
$result = parent::$obj->insert(DB_PREFIX.'user',$main_args);
$flag = intval(parent::$cfg['useraudit']) == 1 ?0 : 1;
$status_args = array(
'userid'=>$userid,
'regtime'=>$time,
'regip'=>XRequest::getip(),
'logintime'=>$time,
'logintimes'=>1,
'loginip'=>XRequest::getip(),
'lovestatus'=>1,
'flag'=>$flag,
);
if (isset($params_args['rzmobile'])) {
if ($params_args['rzmobile'] == 1) {
$status_args['mobilerz'] = 1;
}
}
parent::$obj->insert(DB_PREFIX.'user_status',$status_args);
$vip_args = array(
'userid'=>$userid,
'viplevel'=>intval(parent::$cfg['usergrid']),
'vipforever'=>0,
);
parent::$obj->insert(DB_PREFIX.'user_validate',$vip_args);
if (empty($contact_args)) {
$contact_args = array(
'userid'=>$userid,
'privacy'=>1,
);
}
else {
$contact_args = array_merge(array('userid'=>$userid,'privacy'=>1),$contact_args);
}
parent::$obj->insert(DB_PREFIX.'user_attr',$contact_args);
$profile_args = array_merge(array(
'userid'=>$userid,
),$profile_args);
parent::$obj->insert(DB_PREFIX.'user_profile',$profile_args);
$params_args = array_merge(array(
'userid'=>$userid,
'lovestatus'=>$status,
'groupid'=>intval(parent::$cfg['usergrid']),
'flag'=>$flag,
'addtime'=>$time,
'ontime'=>$time,
),$params_args);
parent::$obj->insert(DB_PREFIX.'user_params',$params_args);
if (true === $result &&intval(parent::$cfg['useraudit']) == 0) {
$cookies_array = array(
'userid'=>$userid,
'username'=>$main_args['username'],
'password'=>$main_args['password'],
'lasttime'=>$time,
);
$this->_setCookies($cookies_array);
if (true === XValid::isEmail($main_args['email'])) {
$em = parent::model('mail','am');
$em_result = $em->sendReg(array(
'userid'=>$userid,
'username'=>$main_args['username'],
'password'=>$origin_password,
'email'=>$main_args['email']
));
$em->sendValid($userid);
unset($em);
}
}
$this->_regPoints($userid);
$this->_regMoney($userid);
$cond_array = array(
'gender'=>$main_args['gender'],
'ageyear'=>$profile_args['ageyear'],
'height'=>$profile_args['height'],
'province'=>$profile_args['provinceid'],
'city'=>$profile_args['cityid'],
);
$this->saveCond($userid,$cond_array);
$this->saveListen($userid);
$model_cpa = parent::model('cpa','im');
$model_cpa->addToCpa($userid);
unset($model_cpa);
$model_count = parent::model('count','im');
$model_count->updateStatistics(array('user'=>1,'onlineuser'=>1));
unset($model_count);
return array($result,$userid);
}
public function doPerfect($main_args,$profile_args,$params_args) {
$main_args['integrity'] = 1;
$result = parent::$obj->update(DB_PREFIX.'user',$main_args,"userid='".parent::$wrap_user['userid']."'");
if (true === $result) {
parent::$obj->update(DB_PREFIX.'user_profile',$profile_args,"userid='".parent::$wrap_user['userid']."'");
$time = time();
$params_args = array_merge(array(
'lovestatus'=>1,
'groupid'=>1,
'flag'=>1,
'addtime'=>$time,
'ontime'=>$time,
),$params_args);
$ps_sql = "SELECT `userid` FROM ".DB_PREFIX."user_params WHERE `userid`='".parent::$wrap_user['userid']."'";
$ps_rows = parent::$obj->fetch_first($ps_sql);
if (empty($ps_rows)) {
$params_args['userid'] = parent::$wrap_user['userid'];
parent::$obj->insert(DB_PREFIX.'user_params',$params_args);
}
else {
parent::$obj->update(DB_PREFIX.'user_params',$params_args,"userid='".parent::$wrap_user['userid']."'");
}
unset($ps_rows);
unset($ps_sql);
$cond_array = array(
'gender'=>$main_args['gender'],
'ageyear'=>$profile_args['ageyear'],
'height'=>$profile_args['height'],
'province'=>$profile_args['provinceid'],
'city'=>$profile_args['cityid'],
);
$this->saveCond(parent::$wrap_user['userid'],$cond_array);
}
return $result;
}
public function doLogin($loginname,$password){
$status = 0;
if (strlen($password) == 32) {
$md5password = $password;
}
else {
$md5password = md5($password);
}
$sql = "SELECT v.userid, v.username, v.password, s.flag".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON s.userid=v.userid";
if (true === XValid::isEmail($loginname)) {
$sql .= " WHERE v.email = '{$loginname}'";
}
else {
$sql .= " WHERE v.username = '{$loginname}'";
}
$sql .= " AND v.password = '".$md5password."'";
$data	= parent::$obj->fetch_first($sql);
if (!empty($data)) {
if (intval($data['flag']) == 0){
$status = 1;
}
else {
$last_time = time();
$array  = array(
'logintime'=>$last_time,
'logintimes'=>'[[logintimes+1]]',
'loginip'=>XRequest::getip(),
);
parent::$obj->update(DB_PREFIX.'user_status',$array,"userid='".intval($data['userid'])."'");
parent::$obj->update(DB_PREFIX.'user',array('salt'=>XHandle::getRndChar(8)),"userid='".intval($data['userid'])."'");
$status = 3;
$cookies_array = array(
'userid'=>$data['userid'],
'username'=>$data['username'],
'password'=>$data['password'],
'lasttime'=>$last_time,
);
$this->_setCookies($cookies_array);
$this->saveListen($data['userid']);
parent::$obj->update(DB_PREFIX.'user_params',array('ontime'=>$last_time),"userid='".intval($data['userid'])."'");
$model_count = parent::model('count','im');
$model_count->updateStatistics(array('onlineuser'=>1));
unset($model_count);
$this->_updateGroupLogins($data['userid']);
$this->_match($data['userid']);
}
}
else {
$status = 2;
}
unset($data);
return $status;
}
private function _match($uid) {
$now = strtotime(date('Y-m-d',time()));
$lastdate = 0;
$sql = "SELECT `dateline` FROM ".DB_PREFIX."user_match".
" WHERE `userid`='{$uid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
$lastdate = intval($rows['dateline']);
}
unset($rows);
if ($lastdate != $now) {
$m_match = parent::model('match','um');
$m_match->updateMatch(intval($uid));
unset($m_match);
}
}
public function doValid($userid,$key) {
$status = 0;
$sql = "SELECT v.userid, v.salt, s.emailrz".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" WHERE v.userid='{$userid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if ($rows['emailrz'] == 1) {
$status = 1;
}
else {
if ($key != md5($rows['userid'].$rows['salt'])) {
$status = 2;
}
else {
parent::$obj->update(DB_PREFIX.'user',array('salt'=>XHandle::getRndChar(8)),"userid='{$userid}'");
parent::$obj->update(DB_PREFIX.'user_status',array('emailrz'=>1),"userid='{$userid}'");
parent::loadLib('user');
$start = XUser::updateStar($userid);
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($userid,array('rzemail'=>1,'star'=>$star));
unset($m_indexs);
$status = 3;
}
}
}
unset($rows);
return $status;
}
public function checkGetPassKey($userid,$key) {
$status = false;
$sql = "SELECT userid,salt FROM ".DB_PREFIX."user WHERE userid='{$userid}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if ($key == md5($rows['userid'].$rows['salt'])) {
$status = true;
}
}
unset($rows);
return $status;
}
public function doSetNewPass($userid,$key,$password) {
if (true === $this->checkGetPassKey($userid,$key)) {
$array = array(
'password'=>md5($password),
'salt'=>XHandle::getRndChar(8),
);
parent::$obj->update(DB_PREFIX.'user',$array,"userid='{$userid}'");
return true;
}
else {
return false;
}
}
public function doForGet($username,$email) {
$status = 0;
$sql = "SELECT `userid`, `email` FROM ".DB_PREFIX."user WHERE `username`='{$username}'";
$rows = parent::$obj->fetch_first($sql);
if (empty($rows)) {
$status = 1;
}
else {
if (false === XValid::isEmail($rows['email'])) {
$status = 2;
}
else {
if ($email != $rows['email']) {
$status = 3;
}
else {
$em = parent::model('mail','am');
if (false === $em->sendForget($rows['userid'])) {
$status = 4;
}
else{
$status = 5;
}
unset($em);
}
}
}
return $status;
}
public function checkLogin(){
$status = false;
parent::loadUtil('cookie');
$sid = XCookie::get('app_userinfo');
$code = parent::import('code','util');
$sid = $code->authCode($sid,'DECODE',OESOFT_RANDKEY);
unset($code);
if (empty($sid)) {
$status = false;
}
else {
$userinfo = explode('\u',$sid);
$data = $this->_getUser(intval($userinfo[0]));
if (empty($data)) {
$status = false;
}
else {
if ($data['username'] != $userinfo[1] ||$data['password'] != $userinfo[2]){
$status = false;
}
else {
parent::$wrap_user = array(
'userid'=>intval($data['userid']),
'username'=>$data['username'],
'gender'=>$data['gender'],
'groupid'=>$data['groupid'],
'groupname'=>$data['groupname'],
'money'=>$data['money'],
'points'=>$data['points'],
'mbsms'=>$data['mbsms'],
);
$status = true;
}
}
unset($data);
}
return $status;
}
public function logout(){
if (parent::$wrap_user['userid']>0) {
parent::$obj->update(DB_PREFIX.'user_params',array('ontime'=>0),"userid='".parent::$wrap_user['userid']."'");
}
$model_count = parent::model('count','im');
$model_count->updateStatistics(array('onlineuser'=>1));
unset($model_count);
parent::loadUtil('cookie');
XCookie::del('app_userinfo');
parent::$wrap_user['userid'] = NULL;
parent::$wrap_user['username'] = NULL;
parent::$wrap_user['gender'] = NULL;
parent::$wrap_user['groupid'] = NULL;
parent::$wrap_user['groupname'] = NULL;
parent::$wrap_user['money'] = NULL;
parent::$wrap_user['points'] = NULL;
}
public function doExistsUserName($username) {
$sql = "SELECT `userid` FROM ".DB_PREFIX."user WHERE `username` = '{$username}'";
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
public function isForbidUser($username) {
$flag = false;
if (!empty(parent::$cfg['lockusers'])) {
$users = explode(',',parent::$cfg['lockusers']);
for($i=0;$i<sizeof($users);$i++){
if (trim(strtolower($users[$i])) == trim(strtolower($username))){
$flag = true;
break;
}
}
}
return $flag;
}
private function _getUser($uid) {
$sql = "SELECT v.*, g.groupname".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_group AS g ON v.groupid=g.groupid".
" WHERE v.userid='".intval($uid)."'";
return parent::$obj->fetch_first($sql);
}
public function _setCookies($args) {
if (is_array($args)) {
$sid = '';
$sid .= $args['userid'].'\u';
$sid .= $args['username'].'\u';
$sid .= $args['password'].'\u';
$sid .= $args['lasttime'];
$code = parent::import('code','util');
$sid = $code->authCode($sid,'ENCODE',OESOFT_RANDKEY);
unset($code);
parent::loadUtil('cookie');
XCookie::set('app_userinfo',$sid);
}
}
private function _regPoints($userid) {
$regpoints = floatval(parent::$cfg['regpoints']);
if ($regpoints>0) {
$array = array(
'userid'=>$userid,
'actiontype'=>1,
'points'=>$regpoints,
'logcontent'=>XLang::get('points_reglog'),
'opuser'=>'',
'ordernum'=>'',
);
$model_am = parent::model('points','am');
$result = $model_am->doAdd($array);
unset($model_am);
return $result;
}
else {
return false;
}
}
private function _regMoney($userid) {
$regmoney = floatval(parent::$cfg['regmoney']);
if ($regmoney>0) {
$array = array(
'userid'=>$userid,
'actiontype'=>1,
'amount'=>$regmoney,
'logcontent'=>XLang::get('money_reglog'),
'opuser'=>'',
'ordernum'=>'',
);
$model_am = parent::model('money','am');
$result = $model_am->doAdd($array);
unset($model_am);
return $result;
}
else {
return false;
}
}
private function _updateGroupLogins($uid) {
$gid = 1;
$dateline = strtotime(date('Y-m-d',time()));
$vip_sql = "SELECT `viplevel`, `vipenddate`".
" FROM ".DB_PREFIX."user_validate".
" WHERE `userid`='{$uid}'";
$vip_rows = parent::$obj->fetch_first($vip_sql);
if (empty($vip_rows)) {
$vip_array = array(
'userid'=>$uid,
'viplevel'=>$gid,
'vipforever'=>0,
'vipstartdate'=>0,
'vipenddate'=>0
);
parent::$obj->insert(DB_PREFIX.'user_validate',$vip_array);
}
else {
if ($vip_rows['viplevel'] >1) {
if (intval($vip_rows['vipenddate']) <$dateline) {
$gid = 1;
$vip_array = array(
'viplevel'=>$gid,
'vipforever'=>0,
'vipstartdate'=>0,
'vipenddate'=>0
);
parent::$obj->update(DB_PREFIX.'user_validate',$vip_array,"userid='{$uid}'");
}
else {
$gid = intval($vip_rows['viplevel']);
}
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($uid,array('groupid'=>$gid));
unset($m_indexs);
}
}
unset($vip_rows);
unset($vip_sql);
$can = false;
$login_sql = "SELECT `userid`, `logindate` FROM ".DB_PREFIX."user_logins".
" WHERE `userid`='{$uid}'";
$login_rows = parent::$obj->fetch_first($login_sql);
if (empty($login_rows)) {
$login_array = array(
'userid'=>$uid,
'logindate'=>$dateline
);
parent::$obj->insert(DB_PREFIX.'user_logins',$login_array);
$can = true;
}
else {
if (intval($login_rows['logindate']) == $dateline) {
}
else {
$login_array = array(
'logindate'=>$dateline
);
parent::$obj->update(DB_PREFIX.'user_logins',$login_array,"userid='{$uid}'");
$can = true;
}
}
unset($login_rows);
unset($login_sql);
if (true === $can) {
$points = 0;
$g_sql = "SELECT `loginpoints` FROM ".DB_PREFIX."user_group WHERE `groupid`='{$gid}'";
$g_rows = parent::$obj->fetch_first($g_sql);
if (!empty($g_rows)) {
$points = floatval($g_rows['loginpoints']);
}
unset($g_rows);
unset($g_sql);
if ($points >0) {
$log_content = XLang::get('points_loginlog');
$log_array = array(
'userid'=>$uid,
'actiontype'=>1,
'points'=>$points,
'logcontent'=>$log_content,
'opuser'=>parent::$wrap_user['username'],
);
$m_points = parent::model('points','am');
$m_points->doAdd($log_array);
unset($m_points);
unset($log_content);
unset($log_array);
}
}
}
public function saveCond($userid,$args) {
$cond_args = array();
$cond_setarea[] = array(
'orders'=>1,
'province'=>$args['province'],
'city'=>$args['city']
);
$cond_args['setarea'] = serialize($cond_setarea);
$cond_args['areas'] = $args['city'];
if ($args['gender'] == 1) {
$cond_args['gender'] = 2;
}
else {
$cond_args['gender'] = 1;
}
$age = intval(date('Y',time()) -$args['ageyear']);
$startage = ($age-10);
$endage = ($age+10);
if ($startage<intval(parent::$cfg['startage'])) {
$startage = intval(parent::$cfg['startage']);
}
if ($endage>intval(parent::$cfg['endage'])) {
$endage = intval(parent::$cfg['endage']);
}
$cond_args['startage'] = $startage;
$cond_args['endage'] = $endage;
$sheight = 0;
$eheight = 0;
if (isset($args['height']) &&$args['height'] >0) {
$sheight = ($args['height']-10);
$eheight = ($args['height']+10);
}
$cond_args['startheight'] = $sheight;
$cond_args['endheight'] = $eheight;
$cond_args['marry'] = '';
$cond_args['lovesort'] = '';
$cond_args['musttype'] = 0;
$cond_args['mustcond'] = '';
$um = parent::model('cond','um');
$um->createCondition(intval($userid),$cond_args);
unset($um);
unset($cond_args);
}
public function saveListen($uid) {
$listen_sql = "SELECT `friendid` FROM ".DB_PREFIX."friend WHERE `userid`='{$uid}' AND `fuserid`='{$uid}'";
$listen_rows = parent::$obj->fetch_first($listen_sql);
if (empty($listen_rows)) {
$friendid = parent::$obj->fetch_newid("SELECT MAX(friendid) FROM ".DB_PREFIX."friend",1);
$listen_array = array(
'friendid'=>$friendid,
'userid'=>$uid,
'fuserid'=>$uid,
'timeline'=>time(),
'flag'=>1,
'black'=>0,
'ftype'=>1,
);
parent::$obj->insert(DB_PREFIX.'friend',$listen_array);
unset($listen_array);
}
unset($listen_rows);
}
public function doSaveMonolog($id,$content) {
if (parent::$cfg['auditmonolog'] == 1) {
$flag = -2;
}
else {
$flag = 1;
}
$array = array(
'monolog'=>$content,
'moluptime'=>time(),
'molstatus'=>$flag,
);
$result = parent::$obj->update(DB_PREFIX.'user_profile',$array,"userid='{$id}'");
if (true === $result) {
if ($flag == 1) {
parent::$obj->update(DB_PREFIX.'user_params',array('monolog'=>1),"userid='{$id}'");
}
else {
parent::$obj->update(DB_PREFIX.'user_params',array('monolog'=>-2),"userid='{$id}'");
}
}
return $result;
}
public function doSaveContact($id,$args=array()) {
return parent::$obj->update(DB_PREFIX.'user_attr',$args,"userid='{$id}'");
}
public function doSaveAvatar($id,$avatar) {
if (intval(parent::$cfg['auditavatar']) == 1) {
$avatarflag = 0;
}
else {
$avatarflag = 1;
}
$array = array(
'avatar'=>$avatar,
'avatarflag'=>$avatarflag,
);
$result = parent::$obj->update(DB_PREFIX.'user',$array,"userid='{$id}'");
if (true === $result) {
if ($avatarflag == 1) {
parent::$obj->update(DB_PREFIX.'user_params',array('avatar'=>1),"userid='{$id}'");
}
else {
parent::$obj->update(DB_PREFIX.'user_params',array('avatar'=>2),"userid='{$id}'");
}
}
return $result;
}
public function doSaveCond($id,$args) {
$um = parent::model('cond','um');
return $um->doEdit($id,$args);
unset($um);
}
public function getLoginUserInfo($id) {
$sql = "SELECT v.*, s.*, vip.*, e.*, p.*, l.sortname".
" FROM ".DB_PREFIX."user AS v".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON s.userid=v.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON vip.userid=v.userid".
" LEFT JOIN ".DB_PREFIX."user_attr AS e ON e.userid=v.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON p.userid=v.userid".
" LEFT JOIN ".DB_PREFIX."love_sort AS l ON l.sortid=p.lovesort".
" WHERE v.userid = '{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
parent::loadLib(array('mod','user'));
$data['age'] = XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data['userid']);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
if ($data['groupid']>1) {
if ($data['vipenddate'] <strtotime(date('Y-m-d'),time())) {
$data['vipenddate_t']	= "<font color='red'>".date('Y/m/d',$data['vipenddate'])."</font>";
$gid = 1;
$data['vip'] = 2;
}
else {
$data['vipenddate_t']	= "<font color='green'>".date('Y/m/d',$data['vipenddate'])."</font>";
$gid = $data['groupid'];
$data['vip'] = 1;
}
}
else {
$data['vipenddate_t'] = '';
$gid = $data['groupid'];
$data['vip'] = 0;
}
$model_group = parent::model('usergroup','am');
$gdata = $model_group->getData(intval($gid));
unset($model_group);
if (!empty($gdata)) {
$data['groupname'] = $gdata['groupname'];
if ($data['gender'] == 1) {
$data['levelimg'] = XUser::getIdentify2($gdata['maleimg']);
}
else {
$data['levelimg'] = XUser::getIdentify2($gdata['femaleimg']);
}
}
else {
$data['groupname'] = '';
$data['levelimg'] = '';
}
}
return array($data,$gdata);
}
public function checkMobileCode($mobile,$key) {
$result = false;
$sql = "SELECT `id`, `checkcode` FROM ".DB_PREFIX."mobile_checkcode".
" WHERE `mobile`='{$mobile}'";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
if ($key == $rows['checkcode']) {
$result = true;
}
}
unset($sql);
unset($rows);
return $result;
}
public function updateMobileCode($mobile) {
$array = array(
'checkcode'=>XHandle::getRndChar(6,1),
'updatetime'=>time(),
);
return parent::$obj->update(DB_PREFIX.'mobile_checkcode',$array,"`mobile`='{$mobile}'");
}
}
?>