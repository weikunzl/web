<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class messageUService extends X {
public function validID() {
$id = XRequest::getArgs('id');
if (false === XValid::isNumber($id)) {
XHandle::halt('对不起，ID丢失。','',1);
}
else {
if ($id <1) {
XHandle::halt('对不起，ID丢失。','',1);
}
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
public function validToUid($isajax=0) {
$touid = XRequest::getInt('touid');
if ($touid <1) {
if ($isajax == 1) {
echo json_encode(array('response'=>0,'msg'=>"对不起，会员ID错误！"));
die();
}
else {
XHandle::artTips('','对不起，会员ID错误！');
}
}
if (parent::$wrap_user['userid'] == $touid) {
if ($isajax == 1) {
echo json_encode(array('response'=>0,'msg'=>"对不起，您不能给自己写信件！"));
die();
}
else {
XHandle::artTips('','对不起，您不能给自己写信件！');
}
}
return $touid;
}
public function validContent() {
$content = XRequest::getArgs('content');
if (empty($content)) {
echo json_encode(array('response'=>0,'msg'=>'信件内容不能为空'));
die();
}
else {
if (true === XFilter::checkExistsForbidChar($content)) {
echo json_encode(array('response'=>0,'msg'=>'对不起，内容含有系统禁止的字符。'));
die();
}
if (intval(parent::$cfg['filternumber']) == 1 &&intval(parent::$cfg['filterlennumber']) >0) {
if (true === XValid::contNumber($content,parent::$cfg['filterlennumber'])) {
echo json_encode(array('response'=>0,'msg'=>'对不起，信件内容不能连续出现'.parent::$cfg['filterlennumber'].'个数字'));
die();
}
}
}
return $content;
}
}
?>