<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class ajaxIService extends X {
public function validDiaryComment() {
$error = '';
$args = XRequest::getGpc(array(
'id','content','checkcode'
));
$args['id'] = intval($args['id']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "ID丢失\n";
}
if (empty($args['content'])) {
$error .= "评论内容不能为空\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "评论内容含有系统禁止的字符\n";
}
if (intval(parent::$cfg['filternumber']) == 1 &&intval(parent::$cfg['filterlennumber']) >0) {
if (true === XValid::contNumber($args['content'],parent::$cfg['filterlennumber'])) {
$error .= "评论内容不能连续出现".parent::$cfg['filterlennumber']."个数字\n";
}
}
}
if (parent::$cfg['commentcode'] == 1) {
parent::loadUtil('session');
if ($args['checkcode'] != XSession::get('verifycode')) {
$error .= "验证码不正确\n";
}
}
unset($args['checkcode']);
return array($args,$error);
}
public function validCechiComment() {
$error = '';
$args = XRequest::getGpc(array(
'id','content','checkcode'
));
$args['id'] = intval($args['id']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "ID丢失\n";
}
if (empty($args['content'])) {
$error .= "评论内容不能为空\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "评论内容含有系统禁止的字符\n";
}
}
if (parent::$cfg['commentcode'] == 1) {
parent::loadUtil('session');
if ($args['checkcode'] != XSession::get('verifycode')) {
$error .= "验证码不正确\n";
}
}
unset($args['checkcode']);
return array($args,$error);
}
public function validStoryComment() {
$error = '';
$args = XRequest::getGpc(array(
'id','content','checkcode'
));
$args['id'] = intval($args['id']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "ID丢失\n";
}
if (empty($args['content'])) {
$error .= "祝福内容不能为空\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "祝福内容含有系统禁止的字符\n";
}
}
if (parent::$cfg['commentcode'] == 1) {
parent::loadUtil('session');
if ($args['checkcode'] != XSession::get('verifycode')) {
$error .= "验证码不正确\n";
}
}
unset($args['checkcode']);
return array($args,$error);
}
public function validAskComment() {
$error = '';
$args = XRequest::getGpc(array(
'id','content','checkcode'
));
$args['id'] = intval($args['id']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "ID丢失\n";
}
if (empty($args['content'])) {
$error .= "解答内容不能为空\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "解答内容含有系统禁止的字符\n";
}
}
if (parent::$cfg['commentcode'] == 1) {
parent::loadUtil('session');
if ($args['checkcode'] != XSession::get('verifycode')) {
$error .= "验证码不正确\n";
}
}
unset($args['checkcode']);
return array($args,$error);
}
public function validDatingApp() {
$error = '';
$args = XRequest::getGpc(array(
'id','contact','content','checkcode'
));
$args['id'] = intval($args['id']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "ID丢失\n";
}
else {
$m = parent::model('dating','im');
if (true === $m->checkExistsApp($args['id'])) {
$error .= "对不起，您已经报名！\n";
}
unset($m);
}
if (empty($args['contact'])) {
$error .= "联系方式不能为空\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['contact'])) {
$error .= "联系方式含有系统禁止的字符\n";
}
}
if (!empty($args['content'])) {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "留言内容含有系统禁止的字符\n";
}
}
if (parent::$cfg['commentcode'] == 1) {
parent::loadUtil('session');
if ($args['checkcode'] != XSession::get('verifycode')) {
$error .= "验证码不正确\n";
}
}
unset($args['checkcode']);
return array($args,$error);
}
public function validHits() {
$id = XRequest::getInt('id');
$type = XRequest::getArgs('type');
$type = empty($type) ?'diary': $type;
$id = false === XValid::isNumber($id) ?0 : intval($id);
return array($id,$type);
}
public function validWeibo() {
$error = '';
$content = XRequest::getArgs('content');
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if (empty($content)) {
$error .= "微播内容不能为空！\n";
}
else {
if (true === XFilter::checkExistsForbidChar($content)) {
$error .= "微播内容含有系统禁止的字符！\n";
}
if (XHandle::getWordLength($content) >140) {
$error .= "微播内容大于140个字\n";
}
if (intval(parent::$cfg['filternumber']) == 1 &&intval(parent::$cfg['filterlennumber']) >0) {
if (true === XValid::contNumber($content,parent::$cfg['filterlennumber'])) {
$error .= "微播内容不能连续出现".parent::$cfg['filterlennumber']."个数字\n";
}
}
}
return array($content,$error);
}
public function validWeiboComment() {
$error = '';
$args = XRequest::getGpc(array(
'wbid','comid','content'
));
$args['wbid'] = intval($args['wbid']);
$args['comid'] = intval($args['comid']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['wbid'] <1) {
$error .= "ID丢失！\n";
}
if (empty($args['content'])) {
$error .= "评论内容不能为空！\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "评论内容含有系统禁止的字符！\n";
}
if (XHandle::getWordLength($args['content']) >140) {
$error .= "评论内容大于140个字\n";
}
if (intval(parent::$cfg['filternumber']) == 1 &&intval(parent::$cfg['filterlennumber']) >0) {
if (true === XValid::contNumber($args['content'],parent::$cfg['filterlennumber'])) {
$error .= "评论不能连续出现".parent::$cfg['filterlennumber']."个数字\n";
}
}
}
return array($args,$error);
}
public function validAcceptask() {
$error = '';
$args = XRequest::getGpc(array(
'id','anid'
));
$args['id'] = intval($args['id']);
$args['anid'] = intval($args['anid']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "求助ID丢失！\n";
}
if ($args['anid'] <1) {
$error .= "建议ID丢失\n";
}
return array($args,$error);
}
public function validCeshiTrueRate() {
$error = '';
$args = XRequest::getGpc(array(
'id','istrue'
));
$args['id'] = intval($args['id']);
$args['istrue'] = intval($args['istrue']);
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站！\n";
}
if ($args['id'] <1) {
$error .= "测试ID丢失\n";
}
return array($args,$error);
}
public function validTuid() {
$tuid = XRequest::getInt('tuid');
$error = '';
if ($tuid <1) {
$error = "对方ID无效\n";
}
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站\n";
}
else {
if (parent::$wrap_user['userid'] == $tuid) {
$error .= "对方ID不能是自己\n";
}
}
return array($tuid,$error);
}
public function validHomeUid() {
$homeuid = XRequest::getInt('homeuid');
$error = '';
if ($homeuid <1) {
$error = "空间ID无效\n";
}
if (parent::$wrap_user['userid'] == 0) {
$error .= "您还没有登录网站\n";
}
else {
if (parent::$wrap_user['userid'] == $homeuid) {
$error .= "空间ID不能是自己\n";
}
}
return array($homeuid,$error);
}
public function validSetAvatar() {
$error = '';
$img = XRequest::getArgs('img');
$args = XRequest::getGpc(array(
'x','y','w','h','pw','ph'
));
$args['x'] = intval($args['x']);
$args['y'] = intval($args['y']);
$args['w'] = intval($args['w']);
$args['h'] = intval($args['h']);
$args['pw'] = intval($args['pw']);
$args['ph'] = intval($args['ph']);
if ($args['x'] == 0 &&$args['y']== 0) {
$error .= "图片坐标不正确！\n";
}
if ($args['w'] == 0) {
$error .= "图片大小不符合！\n";
}
if ($args['h'] == 0) {
$error .= "图片大小不符合！\n";
}
if ($args['pw'] <parent::$cfg['avatarwidth'] ||$args['ph'] <parent::$cfg['avatarheight']) {
$error .= "图片大小不符合，至少".parent::$cfg['avatarwidth']."x".parent::$cfg['avatarheight']."像素\n";
}
if (empty($img)) {
$error .= "图片不能为空！\n";
}
else {
if (substr($img,0,15) != 'data/attachment') {
$error .= "图片地址不正确！\n";
}
}
if (intval(parent::$wrap_user['userid']) == 0) {
$error .= " 请先登录网站！\n";
}
return array($img,$args,$error);
}
public function validHomeSms() {
$error = null;
if (false === OESMS_FLAG) {
$error = "对不起，网站已关闭手机短信功能；<br />请联系网站管理员开启\n";
}
if (intval(parent::$wrap_user['userid']) == 0) {
$error .= "请先登录网站！\n";
}
$args = XRequest::getGpc(array(
'uid','content','type'
));
$args['uid'] = intval($args['uid']);
$args['type'] = intval($args['type']);
if (empty($error)) {
if ($args['uid'] == 0) {
$error .= "会员ID错误\n";
}
if (empty($args['content'])) {
$error .= "短信内容不能为空\n";
}
else {
if (true === XFilter::checkExistsForbidChar($args['content'])) {
$error .= "对不起，短信内容含系统禁止字符\n";
}
$sender = OESMS_SENDER;
if (!empty($sender)) {
$sender = '['.$sender.']';
}
$senderlen = XHandle::getWordLength($sender);
$wordlen = XHandle::getWordLength($args['content']);
$maxlen = (70-$senderlen);
if ($wordlen >$maxlen) {
$error .= "对不起，短信内容字数必须小于等于{$maxlen}个\n";
}
$args['content'] = $args['content'];
}
}
return array($args,$error);
}
public function validMobileKey() {
$error = null;
if (false === OESMS_FLAG) {
$error = "对不起，网站已关闭手机短信功能；<br />请联系网站管理员开启！\n";
}
if (intval(parent::$wrap_user['userid']) == 0) {
$error .= "请先登录网站！\n";
}
$mobile = XRequest::getArgs('mobile');
if (false === XValid::isMobile($mobile)) {
$error .= "手机号码不正确！\n";
}
return array($mobile,$error);
}
public function validMobileCode() {
$error = null;
if (false === OESMS_FLAG) {
$error = "对不起，网站已关闭手机短信功能；<br />请联系网站管理员开启！\n";
}
$mobile = XRequest::getArgs('mobile');
if (false === XValid::isMobile($mobile)) {
$error .= "手机号码不正确！\n";
}
return array($mobile,$error);
}
public function validSerial() {
$args = XRequest::getGpc(array(
'response','domain','authdate','version','type'
));
$args['response'] = intval($args['response']);
$extend = XRequest::getGpc(array(
'lasttime','amhold','umhold',
'imhold','jshold',
));
$extend['lasttime'] = intval($extend['lasttime']);
$extend['amhold'] = intval($extend['amhold']);
$extend['umhold'] = intval($extend['umhold']);
$extend['imhold'] = intval($extend['imhold']);
$extend['jshold'] = intval($extend['jshold']);
$args['extend'] = $extend;
return $args;
}
}
?>