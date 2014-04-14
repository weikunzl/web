<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class userAService extends X {
public function validSimpleItems() {
$args = XRequest::getGpc(array('stype','skeyword','sflag'));
$args['sflag'] = intval($args['sflag']);
return $args;
}
public function validSearch() {
$args = array();
$stype = XRequest::getArgs('stype');
$skeyword = XRequest::getArgs('skeyword');
$sgender = XRequest::getInt('sgender');
$sdist1 = XRequest::getInt('sdist1');
$sdist2 = XRequest::getInt('sdist2');
$sdist3 = XRequest::getInt('sdist3');
$sgroupid = XRequest::getInt('sgroupid');
$savatar = XRequest::getInt('savatar');
$slovesort = XRequest::getInt('slovesort');
$smarry = XRequest::getInt('smarry');
$sage = XRequest::getInt('sage');
$eage = XRequest::getInt('eage');
$sheight = XRequest::getInt('sheight');
$eheight = XRequest::getInt('eheight');
$ssalary = XRequest::getInt('ssalary');
$esalary = XRequest::getInt('esalary');
$sedu = XRequest::getInt('sedu');
$eedu = XRequest::getInt('eedu');
$showavatar = XRequest::getInt('showavatar');
$sdate = XRequest::getArgs('sdate');
$edate = XRequest::getArgs('edate');
$sorderby = XRequest::getArgs('sorderby');
$sorders = XRequest::getArgs('sorders');
$sflag = XRequest::getInt('sflag');
$selite = XRequest::getInt('selite');
$sliehun = XRequest::getInt('sliehun');
$args = array(
'stype'=>$stype,
'skeyword'=>$skeyword,
'sgender'=>$sgender,
'sdist1'=>$sdist1,
'sdist2'=>$sdist2,
'sdist3'=>$sdist3,
'sgroupid'=>$sgroupid,
'savatar'=>$savatar,
'sflag'=>$sflag,
'slovesort'=>$slovesort,
'smarry'=>$smarry,
'sflag'=>$sflag,
'selite'=>$selite,
'sliehun'=>$sliehun,
'sage'=>$sage,
'eage'=>$eage,
'sheight'=>$sheight,
'eheight'=>$eheight,
'ssalary'=>$ssalary,
'esalary'=>$esalary,
'sedu'=>$sedu,
'eedu'=>$eedu,
'showavatar'=>$showavatar,
'sdate'=>$sdate,
'edate'=>$edate,
'sorderby'=>$sorderby,
'sorders'=>$sorders,
);
$likesql = '';
$paramsql = '';
if (!empty($stype) &&!empty($skeyword)) {
if ($stype == 'userid') {
if (true === XValid::isNumber($skeyword)) {
$likesql = " AND v.userid = '{$skeyword}'";
}
}
elseif ($stype === 'username') {
$likesql = " AND v.username LIKE '".$skeyword."%'";
}
else {
$likesql  = " AND v.email LIKE '".$skeyword."%'";
}
}
if ($sgender >0 ) {
$paramsql .= " AND ps.gender='{$sgender}'";
}
if ($sdist1 >0) {
$paramsql .= " AND ps.provinceid='{$sdist1}'";
}
if ($sdist2 >0) {
$paramsql .= " AND ps.cityid='{$sdist2}'";
}
if ($sdist3 >0) {
$paramsql .= " AND ps.distid='{$sdist3}'";
}
if ($sgroupid >0) {
$paramsql .= " AND ps.groupid='{$sgroupid}'";
}
if ($savatar >0) {
$paramsql .= " AND ps.avatar='1'";
}
if ($sflag == 1) {
$paramsql .= " AND ps.flag='1'";
}
elseif ($sflag == 2) {
$paramsql .= " AND ps.flag='0'";
}
if ($selite == 1) {
$paramsql .= " AND ps.elite='1'";
}
elseif ($selite == 2) {
$paramsql .= " AND ps.elite='0'";
}
if ($sliehun == 1) {
$paramsql .= " AND ps.liehun='1'";
}
elseif ($sliehun == 2) {
$paramsql .= " AND ps.liehun='0'";
}
if ($slovesort >0) {
$paramsql .= " AND ps.lovesort='{$slovesort}'";
}
if ($smarry >0) {
$paramsql .= " AND ps.marry='{$smarry}'";
}
if ($sage>0 &&$eage>0) {
$year = date('Y',time());
$sageline = ($year-$eage);
$eageline = ($year-$sage);
$paramsql .= " AND ps.ageyear >= {$sageline} AND ps.ageyear <= {$eageline}";
}
if ($sheight >0 &&$eheight  >0) {
$paramsql .= " AND ps.height >= {$sheight} AND ps.height <= {$eheight}";
}
if ($ssalary >0 &&$esalary >0) {
$paramsql .= " AND ps.salary >= {$ssalary} AND ps.salary <= {$esalary}";
}
if ($sedu >0 &&$eedu>0) {
$paramsql .= " AND ps.education >= {$sedu} AND ps.education <= {$eedu}";
}
if (true === XValid::isDate($sdate) &&true === XValid::isDate($edate)) {
$sdateline = strtotime($sdate);
$edateline = strtotime($edate);
$paramsql .= " AND ps.addtime>={$sdateline} AND ps.addtime<={$edateline}";
}
return array($likesql,$paramsql,$args);
}
public function validUid() {
$uid = XRequest::getInt('userid');
if (false === XValid::isNumber($uid) ||$uid <0) {
$uid = 0;
}
return $uid;
}
public function validID() {
$id = XRequest::getInt('id');
if (false === XValid::isNumber($id) ||$id <0) {
$id = 0;
}
return $id;
}
public function validArrayID() {
$ids = XRequest::getArray('id');
if (empty($ids)) {
XHandle::halt("对不起，ID错误！",'',1);
}
return $ids;
}
public function validEditPassword() {
$userid = XRequest::getInt('userid');
$args = XRequest::getGpc(array('password','confirmpassword'));
if ($userid<1) {
XHandle::halt('会员ID丢失','',1);
}
if (false === XValid::isLength($args['password'],6,16)) {
XHandle::halt('密码长度不正确','',1);
}
else {
if ($args['confirmpassword'] != $args['password']) {
XHandle::halt('确认密码不正确','',1);
}
}
return array($userid,$args['password']);
}
public function validEditMonolog() {
$userid = XRequest::getInt('userid');
$args = XRequest::getGpc(array('monolog','molstatus'));
if ($userid<1) {
XHandle::halt('会员ID丢失','',1);
}
if (empty($args['monolog'])) {
XHandle::halt('内心独白不能为空','',1);
}
$args['molstatus'] = intval($args['molstatus']);
return array($userid,$args);
}
public function validEditrz() {
$userid = XRequest::getInt('userid');
if ($userid<1) {
XHandle::halt('会员ID丢失','',1);
}
$args = XRequest::getGpc(array(
'emailrz','mobilerz','idnumberrz','videorz','heightrz',
'marryrz','incomerz','educationrz','houserz','carrz'
));
$args['emailrz'] = intval($args['emailrz']);
$args['mobilerz'] = intval($args['mobilerz']);
$args['idnumberrz'] = intval($args['idnumberrz']);
$args['videorz'] = intval($args['videorz']);
$args['heightrz'] = intval($args['heightrz']);
$args['marryrz'] = intval($args['marryrz']);
$args['incomerz'] = intval($args['incomerz']);
$args['educationrz'] = intval($args['educationrz']);
$args['houserz'] = intval($args['houserz']);
$args['carrz'] = intval($args['carrz']);
$star = 0;
if ($args['emailrz'] == 1) {
$star = ($star+1);
}
if ($args['mobilerz'] == 1) {
$star = ($star+1);
}
if ($args['idnumberrz'] == 1) {
$star = ($star+1);
}
if ($args['videorz'] == 1) {
$star = ($star+1);
}
if ($args['heightrz'] == 1) {
$star = ($star+1);
}
if ($args['marryrz'] == 1) {
$star = ($star+1);
}
if ($args['incomerz'] == 1) {
$star = ($star+1);
}
if ($args['educationrz'] == 1) {
$star = ($star+1);
}
if ($args['houserz'] == 1) {
$star = ($star+1);
}
if ($args['carrz'] == 1) {
$star = ($star+1);
}
$args['star'] = $star;
return array($userid,$args);
}
public function validOpen() {
$userid = XRequest::getInt('userid');
$viptype = XRequest::getArgs('viptype');
$opencontent = XRequest::getArgs('opencontent');
if ($userid<1) {
XHandle::halt('会员ID丢失','',1);
}
if (empty($viptype)) {
XHandle::halt('请选择要开通的会员组','',1);
}
if (empty($opencontent)) {
XHandle::halt('请填写开通原因','',1);
}
if (false === strpos($viptype,'_')) {
XHandle::halt('会员组有错！','',1);
}
else {
$gps = explode('_',$viptype);
$groupid = intval($gps[0]);
$viporders = intval($gps[1]);
$m = parent::model('usergroup','am');
$group = $m->getData($groupid);
unset($m);
if (empty($group)) {
XHandle::halt('对不起，会员组信息有误，无法执行操作！','',1);
}
else {
$groupname = $group['groupname'];
$commer = $group['commer'];
$days = 0;
$money = 0;
$points = 0;
if (empty($commer)) {
XHandle::halt('对不起，会员组收费项设置不全，无法执行操作！','',1);
}
else {
foreach ($commer as $key=>$value) {
if ($viporders == intval($value['orders'])) {
$days = intval($value['days']);
$money = floatval($value['money']);
$points = floatval($value['points']);
break;
}
}
}
if ($days == 0) {
XHandle::halt('对不起，会员组有效天数错误，无法执行操作。','',1);
}
}
}
if ($money>0) {
$u = parent::model('user','am');
$user = $u->getUserMoney($userid);
unset($u);
if (empty($user)) {
XHandle::halt('会员信息不存在','',1);
}
else {
if ($user['money']<$money) {
XHandle::halt('对不起，会员剩余现金(金币)不足，无法执行升级操作！','',1);
}
}
}
$args = array(
'groupid'=>$groupid,
'groupname'=>$groupname,
'days'=>$days,
'money'=>$money,
'points'=>$points,
'content'=>$opencontent,
);
return array($userid,$args);
}
public function validHandle() {
$userid = XRequest::getInt('userid');
$groupid = XRequest::getInt('groupid');
$vipenddate = XRequest::getArgs('vipenddate');
$deductmoney = XRequest::getArgs('deductmoney');
$rencontent = XRequest::getArgs('rencontent');
if ($userid<1) {
XHandle::halt('会员ID丢失','',1);
}
if ($groupid<1) {
XHandle::halt('请选择会员组','',1);
}
if (false === XValid::isDate($vipenddate)) {
XHandle::halt('请设置到期日期','',1);
}
if (empty($rencontent)) {
XHandle::halt('请填写操作原因','',1);
}
$deductmoney = floatval($deductmoney);
if ($deductmoney>0) {
$u = parent::model('user','am');
$user = $u->getUserMoney($userid);
unset($u);
if (empty($user)) {
XHandle::halt('会员信息不存在','',1);
}
else {
if ($user['money']<$deductmoney) {
XHandle::halt('对不起，会员剩余现金(金币)不足，无法执行操作！','',1);
}
}
}
$args = array(
'groupid'=>$groupid,
'vipenddate'=>$vipenddate,
'deductmoney'=>$deductmoney,
'rencontent'=>$rencontent,
);
return array($userid,$args);
}
public function validCancel() {
$userid = XRequest::getInt('userid');
$returnmoney = XRequest::getArgs('returnmoney');
$cancelcontent = XRequest::getArgs('cancelcontent');
if ($userid<1) {
XHandle::halt('会员ID丢失','',1);
}
if (empty($cancelcontent)) {
XHandle::halt('取消原因不能为空','',1);
}
$returnmoney = floatval($returnmoney);
return array($userid,$returnmoney,$cancelcontent);
}
public function validAdd() {
$main_args = XRequest::getGpc(array(
'email','username','password','confirmpassword','gender',
));
if (false === XValid::isEmail($main_args['email'])) {
XHandle::halt('邮箱格式不能为空','',1);
}
if (false === XValid::isUserArgs($main_args['username'])) {
XHandle::halt('用户名格式不正确','',1);
}
else {
if (XHandle::getLength($main_args['username'])<3 ||XHandle::getLength($main_args['username'])>16) {
XHandle::halt('用户名长度不正确，必须为3-16个字符，1个汉字=2个字符','',1);
}
}
if (false === XValid::isLength($main_args['password'],6,16)) {
XHandle::halt('密码长度不正确','',1);
}
else {
if ($main_args['confirmpassword'] != $main_args['password']) {
XHandle::halt('确认密码不正确','',1);
}
}
if ($main_args['gender']<1) {
XHandle::halt('请选择性别','',1);
}
unset($main_args['confirmpassword']);
$profile_args = XRequest::getGpc(array(
'ageyear','agemonth','ageday','blood','marrystatus','childrenstatus','height',
'nationality','nationprovinceid','nationcityid','provinceid','cityid','distid',
'lovesort','personality','national','jobs','salary','housing','caring','beforeregion',
'monolog','weight','profile','charmparts','hairstyle','haircolor','facestyle','bodystyle',
'companytype','income','workstatus','companyname','education','specialty','school',
'schoolyear','tophome','consume','smoking','drinking','faith','workout','rest',
'havechildren','talive','romantic',
));
$profile_args['ageyear'] = intval($profile_args['ageyear']);
$profile_args['agemonth'] = intval($profile_args['agemonth']);
$profile_args['ageday'] = intval($profile_args['ageday']);
$profile_args['blood'] = intval($profile_args['blood']);
$profile_args['marrystatus'] = intval($profile_args['marrystatus']);
$profile_args['childrenstatus'] = intval($profile_args['childrenstatus']);
$profile_args['height'] = intval($profile_args['height']);
$profile_args['nationality'] = intval($profile_args['nationality']);
$profile_args['nationprovinceid'] = intval($profile_args['nationprovinceid']);
$profile_args['nationcityid'] = intval($profile_args['nationcityid']);
$profile_args['provinceid'] = intval($profile_args['provinceid']);
$profile_args['cityid'] = intval($profile_args['cityid']);
$profile_args['distid'] = intval($profile_args['distid']);
$profile_args['lovesort'] = intval($profile_args['lovesort']);
$profile_args['personality'] = intval($profile_args['personality']);
$profile_args['national'] = intval($profile_args['national']);
$profile_args['jobs'] = intval($profile_args['jobs']);
$profile_args['salary'] = intval($profile_args['salary']);
$profile_args['housing'] = intval($profile_args['housing']);
$profile_args['caring'] = intval($profile_args['caring']);
$profile_args['beforeregion'] = intval($profile_args['beforeregion']);
$profile_args['weight'] = intval($profile_args['weight']);
$profile_args['profile'] = intval($profile_args['profile']);
$profile_args['charmparts'] = intval($profile_args['charmparts']);
$profile_args['hairstyle'] = intval($profile_args['hairstyle']);
$profile_args['haircolor'] = intval($profile_args['haircolor']);
$profile_args['facestyle'] = intval($profile_args['facestyle']);
$profile_args['bodystyle'] = intval($profile_args['bodystyle']);
$profile_args['companytype'] = intval($profile_args['companytype']);
$profile_args['income'] = intval($profile_args['income']);
$profile_args['workstatus'] = intval($profile_args['workstatus']);
$profile_args['education'] = intval($profile_args['education']);
$profile_args['specialty'] = intval($profile_args['specialty']);
$profile_args['tophome'] = intval($profile_args['tophome']);
$profile_args['consume'] = intval($profile_args['consume']);
$profile_args['smoking'] = intval($profile_args['smoking']);
$profile_args['drinking'] = intval($profile_args['drinking']);
$profile_args['faith'] = intval($profile_args['faith']);
$profile_args['workout'] = intval($profile_args['workout']);
$profile_args['rest'] = intval($profile_args['rest']);
$profile_args['havechildren'] = intval($profile_args['havechildren']);
$profile_args['talive'] = intval($profile_args['talive']);
$profile_args['romantic'] = intval($profile_args['romantic']);
$profile_args['molstatus'] = 1;
$profile_args['language'] = XRequest::getComArgs('language');
$profile_args['lifeskill'] = XRequest::getComArgs('lifeskill');
$profile_args['sports'] = XRequest::getComArgs('sports');
$profile_args['food'] = XRequest::getComArgs('food');
$profile_args['book'] = XRequest::getComArgs('book');
$profile_args['film'] = XRequest::getComArgs('film');
$profile_args['attention'] = XRequest::getComArgs('attention');
$profile_args['leisure'] = XRequest::getComArgs('leisure');
$profile_args['interest'] = XRequest::getComArgs('interest');
$profile_args['travel'] = XRequest::getComArgs('travel');
if ($profile_args['ageyear']<1) {
XHandle::halt('请选择生日年份','',1);
}
if ($profile_args['agemonth']<1 ||$profile_args['agemonth']>12) {
XHandle::halt('请选择生日月份','',1);
}
if ($profile_args['ageday']<1 ||$profile_args['ageday']>31) {
XHandle::halt('请选择生日日期','',1);
}
if (strlen($profile_args['agemonth']) == 1) {
$profile_args['agemonth'] = '0'.$profile_args['agemonth'];
}
if (strlen($profile_args['ageday']) == 1) {
$profile_args['ageday'] = '0'.$profile_args['ageday'];
}
$profile_args['birthday'] = $profile_args['ageyear'].'-'.$profile_args['agemonth'].'-'.$profile_args['ageday'];
$lunar = parent::import('lunar','util');
$profile_args['astro'] = $lunar->getAstro($profile_args['birthday']);
$profile_args['lunar'] = $lunar->getLunar($profile_args['birthday']);
$lungarID = $lunar->getLunarID($profile_args['lunar']);
$astroID = $lunar->getAstroID($profile_args['astro']);
unset($lunar);
if ($profile_args['marrystatus']==0) {
XHandle::halt('请选择婚姻状态','',1);
}
if ($profile_args['provinceid'] == 0) {
XHandle::halt('请选择所在一级地区','',1);
}
if ($profile_args['cityid'] == 0) {
XHandle::halt('请选择所在二级地区','',1);
}
if ($profile_args['lovesort'] == 0) {
XHandle::halt('请选择交友类型','',1);
}
if ($profile_args['salary'] == 0) {
XHandle::halt('请选择月薪收入','',1);
}
if (empty($profile_args['monolog'])) {
XHandle::halt('内心独白不能为空','',1);
}
if (empty($profile_args['education'])) {
XHandle::halt('请选择学历','',1);
}
$contact_args = XRequest::getGpc(array(
'privacy','realname','idnumber','telephone','mobile',
'qq','msn','address','zipcode','skype','homepage','facebook',
));
$contact_args['privacy'] = intval($contact_args['privacy']);
$indexs_args = array(
'gender'=>$main_args['gender'],
'ageyear'=>$profile_args['ageyear'],
'provinceid'=>$profile_args['provinceid'],
'cityid'=>$profile_args['cityid'],
'distid'=>$profile_args['distid'],
'height'=>$profile_args['height'],
'weight'=>$profile_args['weight'],
'salary'=>$profile_args['salary'],
'education'=>$profile_args['education'],
'marry'=>$profile_args['marrystatus'],
'lovesort'=>$profile_args['lovesort'],
'lunar'=>$lungarID,
'astro'=>$astroID,
'child'=>$profile_args['childrenstatus'],
'house'=>$profile_args['housing'],
'car'=>$profile_args['caring'],
'jobs'=>$profile_args['jobs'],
'monolog'=>1,
);
return array($main_args,$profile_args,$contact_args,$indexs_args);
}
public function validEdit() {
$id = XRequest::getInt('id');
if ($id<1) {
XHandle::halt('ID丢失','',1);
}
$main_args = XRequest::getGpc(array('gender'));
$main_args['gender'] = intval($main_args['gender']);
if ($main_args['gender']<1) {
XHandle::halt('请选择性别','',1);
}
$profile_args = XRequest::getGpc(array(
'ageyear','agemonth','ageday','blood','marrystatus','childrenstatus','height',
'nationality','nationprovinceid','nationcityid','provinceid','cityid','distid',
'lovesort','personality','national','jobs','salary','housing','caring','beforeregion',
'weight','profile','charmparts','hairstyle','haircolor','facestyle','bodystyle',
'companytype','income','workstatus','companyname','education','specialty','school',
'schoolyear','tophome','consume','smoking','drinking','faith','workout','rest',
'havechildren','talive','romantic',
));
$profile_args['ageyear'] = intval($profile_args['ageyear']);
$profile_args['agemonth'] = intval($profile_args['agemonth']);
$profile_args['ageday'] = intval($profile_args['ageday']);
$profile_args['blood'] = intval($profile_args['blood']);
$profile_args['marrystatus'] = intval($profile_args['marrystatus']);
$profile_args['childrenstatus'] = intval($profile_args['childrenstatus']);
$profile_args['height'] = intval($profile_args['height']);
$profile_args['nationality'] = intval($profile_args['nationality']);
$profile_args['nationprovinceid'] = intval($profile_args['nationprovinceid']);
$profile_args['nationcityid'] = intval($profile_args['nationcityid']);
$profile_args['provinceid'] = intval($profile_args['provinceid']);
$profile_args['cityid'] = intval($profile_args['cityid']);
$profile_args['distid'] = intval($profile_args['distid']);
$profile_args['lovesort'] = intval($profile_args['lovesort']);
$profile_args['personality'] = intval($profile_args['personality']);
$profile_args['national'] = intval($profile_args['national']);
$profile_args['jobs'] = intval($profile_args['jobs']);
$profile_args['salary'] = intval($profile_args['salary']);
$profile_args['housing'] = intval($profile_args['housing']);
$profile_args['caring'] = intval($profile_args['caring']);
$profile_args['beforeregion'] = intval($profile_args['beforeregion']);
$profile_args['weight'] = intval($profile_args['weight']);
$profile_args['profile'] = intval($profile_args['profile']);
$profile_args['charmparts'] = intval($profile_args['charmparts']);
$profile_args['hairstyle'] = intval($profile_args['hairstyle']);
$profile_args['haircolor'] = intval($profile_args['haircolor']);
$profile_args['facestyle'] = intval($profile_args['facestyle']);
$profile_args['bodystyle'] = intval($profile_args['bodystyle']);
$profile_args['companytype'] = intval($profile_args['companytype']);
$profile_args['income'] = intval($profile_args['income']);
$profile_args['workstatus'] = intval($profile_args['workstatus']);
$profile_args['education'] = intval($profile_args['education']);
$profile_args['specialty'] = intval($profile_args['specialty']);
$profile_args['tophome'] = intval($profile_args['tophome']);
$profile_args['consume'] = intval($profile_args['consume']);
$profile_args['smoking'] = intval($profile_args['smoking']);
$profile_args['drinking'] = intval($profile_args['drinking']);
$profile_args['faith'] = intval($profile_args['faith']);
$profile_args['workout'] = intval($profile_args['workout']);
$profile_args['rest'] = intval($profile_args['rest']);
$profile_args['havechildren'] = intval($profile_args['havechildren']);
$profile_args['talive'] = intval($profile_args['talive']);
$profile_args['romantic'] = intval($profile_args['romantic']);
$profile_args['language'] = XRequest::getComArgs('language');
$profile_args['lifeskill'] = XRequest::getComArgs('lifeskill');
$profile_args['sports'] = XRequest::getComArgs('sports');
$profile_args['food'] = XRequest::getComArgs('food');
$profile_args['book'] = XRequest::getComArgs('book');
$profile_args['film'] = XRequest::getComArgs('film');
$profile_args['attention'] = XRequest::getComArgs('attention');
$profile_args['leisure'] = XRequest::getComArgs('leisure');
$profile_args['interest'] = XRequest::getComArgs('interest');
$profile_args['travel'] = XRequest::getComArgs('travel');
if ($profile_args['ageyear']<1) {
XHandle::halt('请选择生日年份','',1);
}
if ($profile_args['agemonth']<1 ||$profile_args['agemonth']>12) {
XHandle::halt('请选择生日月份','',1);
}
if ($profile_args['ageday']<1 ||$profile_args['ageday']>31) {
XHandle::halt('请选择生日日期','',1);
}
if (strlen($profile_args['agemonth']) == 1) {
$profile_args['agemonth'] = '0'.$profile_args['agemonth'];
}
if (strlen($profile_args['ageday']) == 1) {
$profile_args['ageday'] = '0'.$profile_args['ageday'];
}
$profile_args['birthday'] = $profile_args['ageyear'].'-'.$profile_args['agemonth'].'-'.$profile_args['ageday'];
$lunar = parent::import('lunar','util');
$profile_args['astro'] = $lunar->getAstro($profile_args['birthday']);
$profile_args['lunar'] = $lunar->getLunar($profile_args['birthday']);
$lungarID = $lunar->getLunarID($profile_args['lunar']);
$astroID = $lunar->getAstroID($profile_args['astro']);
unset($lunar);
if ($profile_args['marrystatus']==0) {
XHandle::halt('请选择婚姻状态','',1);
}
if ($profile_args['provinceid'] == 0) {
XHandle::halt('请选择所在一级地区','',1);
}
if ($profile_args['cityid'] == 0) {
XHandle::halt('请选择所在二级地区','',1);
}
if ($profile_args['lovesort'] == 0) {
XHandle::halt('请选择交友类型','',1);
}
if ($profile_args['salary'] == 0) {
XHandle::halt('请选择月薪收入','',1);
}
if (empty($profile_args['education'])) {
XHandle::halt('请选择学历','',1);
}
$contact_args = XRequest::getGpc(array(
'privacy','realname','idnumber','telephone','mobile',
'qq','msn','address','zipcode','skype','homepage','facebook',
));
$contact_args['privacy'] = intval($contact_args['privacy']);
$indexs_args = array(
'gender'=>$main_args['gender'],
'ageyear'=>$profile_args['ageyear'],
'provinceid'=>$profile_args['provinceid'],
'cityid'=>$profile_args['cityid'],
'distid'=>$profile_args['distid'],
'height'=>$profile_args['height'],
'weight'=>$profile_args['weight'],
'salary'=>$profile_args['salary'],
'education'=>$profile_args['education'],
'marry'=>$profile_args['marrystatus'],
'lovesort'=>$profile_args['lovesort'],
'lunar'=>$lungarID,
'astro'=>$astroID,
'child'=>$profile_args['childrenstatus'],
'house'=>$profile_args['housing'],
'car'=>$profile_args['caring'],
'jobs'=>$profile_args['jobs'],
);
return array($id,$main_args,$profile_args,$contact_args,$indexs_args);
}
}
?>