<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class profileUService extends X {
public function validBaseProfile() {
$args = XRequest::getGpc(array(
'blood','childrenstatus','nationality','beforeregion','nationprovinceid','nationcityid',
'provinceid','cityid','distid','lovesort','personality','national',
'jobs','salary','housing','caring','weight','profile',
'charmparts','hairstyle','haircolor','facestyle','bodystyle',
));
$args['blood'] = intval($args['blood']);
$args['childrenstatus'] = intval($args['childrenstatus']);
$args['nationality'] = intval($args['nationality']);
$args['beforeregion'] = intval($args['beforeregion']);
$args['nationprovinceid'] = intval($args['nationprovinceid']);
$args['nationcityid'] = intval($args['nationcityid']);
$args['provinceid'] = intval($args['provinceid']);
$args['cityid'] = intval($args['cityid']);
$args['distid'] = intval($args['distid']);
$args['lovesort'] = intval($args['lovesort']);
$args['personality'] = intval($args['personality']);
$args['national'] = intval($args['national']);
$args['jobs'] = intval($args['jobs']);
$args['salary'] = intval($args['salary']);
$args['housing'] = intval($args['housing']);
$args['caring'] = intval($args['caring']);
$args['weight'] = intval($args['weight']);
$args['profile'] = intval($args['profile']);
$args['charmparts'] = intval($args['charmparts']);
$args['hairstyle'] = intval($args['hairstyle']);
$args['haircolor'] = intval($args['haircolor']);
$args['facestyle'] = intval($args['facestyle']);
$args['bodystyle'] = intval($args['bodystyle']);
if ($args['provinceid']<1) {
XHandle::halt('请选择所在一级地区','',1);
}
if ($args['cityid']<1) {
XHandle::halt('请选择所在二级地区','',1);
}
if ($args['lovesort']<1) {
XHandle::halt('请选择交友类别','',1);
}
if ($args['salary']<1) {
XHandle::halt('请选择月薪','',1);
}
return $args;
}
public function validMoreProfile() {
$args = XRequest::getGpc(array(
'companytype','income','workstatus','companyname',
'specialty','school','schoolyear','tophome','consume','smoking',
'drinking','faith','workout','rest','havechildren','talive','romantic',
));
$args['companytype'] = intval($args['companytype']);
$args['income'] = intval($args['income']);
$args['workstatus'] = intval($args['workstatus']);
$args['specialty'] = intval($args['specialty']);
$args['tophome'] = intval($args['tophome']);
$args['consume'] = intval($args['consume']);
$args['smoking'] = intval($args['smoking']);
$args['drinking'] = intval($args['drinking']);
$args['faith'] = intval($args['faith']);
$args['workout'] = intval($args['workout']);
$args['rest'] = intval($args['rest']);
$args['havechildren'] = intval($args['havechildren']);
$args['talive'] = intval($args['talive']);
$args['romantic'] = intval($args['romantic']);
$args['language'] = XRequest::getComArgs('language');
$args['lifeskill'] = XRequest::getComArgs('lifeskill');
$args['sports'] = XRequest::getComArgs('sports');
$args['food'] = XRequest::getComArgs('food');
$args['book'] = XRequest::getComArgs('book');
$args['film'] = XRequest::getComArgs('film');
$args['attention'] = XRequest::getComArgs('attention');
$args['leisure'] = XRequest::getComArgs('leisure');
$args['interest'] = XRequest::getComArgs('interest');
$args['travel'] = XRequest::getComArgs('travel');
return $args;
}
public function validMonolog() {
$content = XRequest::getArgs('content');
if (!empty($content)) {
if (true === XFilter::checkExistsForbidChar($content)) {
XHandle::halt('对不起，输入的内心独白，含有系统禁止的字符！','',1);
}
}
$content = XFilter::filterForbidChar($content);
if (XHandle::getWordLength($content) <20 ||XHandle::getWordLength($content)>1500) {
XHandle::halt('对不起，内心独白字数必须在20~1500之间。','',1);
}
if (intval(parent::$cfg['filternumber']) == 1 &&intval(parent::$cfg['filterlennumber']) >0) {
if (true === XValid::contNumber($content,parent::$cfg['filterlennumber'])) {
XHandle::halt('对不起，内心独白不能连续出现'.parent::$cfg['filterlennumber'].'个数字','',1);
}
}
return $content;
}
public function validContact() {
$args = XRequest::getGpc(array(
'privacy','telephone','mobilerz','mobile','qq','msn',
'address','zipcode','skype','homepage','facebook',
));
$args['privacy'] = intval($args['privacy']);
$args['mobilerz'] = intval($args['mobilerz']);
if (empty($args['mobile']) &&empty($args['qq'])) {
XHandle::halt('手机号码和QQ号码至少填写一项','',1);
}
else {
if ($args['mobilerz'] == 0) {
if (!empty($args['mobile'])) {
if (false === XValid::isMobile($args['mobile'])) {
XHandle::halt('对不起，手机号码格式不正确，请填写11位有效手机号。','',1);
}
}
}
if (!empty($args['qq'])) {
if (false === XValid::isQQ($args['qq'])) {
XHandle::halt('对不起，QQ号码格式不正确，请填写5-11位数字','',1);
}
}
}
unset($args['mobilerz']);
return $args;
}
}
?>