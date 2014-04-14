<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class hiUService extends X {
public function validID() {
$id = XRequest::getInt('id');
if ($id <1) {
XHandle::halt('对不起，ID丢失。','',1);
}
else {
return $id;
}
}
public function validArrayID() {
$ids = XRequest::getArray('id');
if (empty($ids)) {
XHandle::halt("对不起，ID错误！",'',1);
}
return $ids;
}
public function validToUid() {
$touid = XRequest::getInt('touid');
if ($touid <1) {
XHandle::artTips('','对不起，会员ID错误！');
}
if (parent::$wrap_user['userid'] == $touid) {
XHandle::artTips('','对不起，您不能给自己发问候语！');
}
return $touid;
}
public function validGreetID() {
$greetid = XRequest::getInt('greetid');
if ($greetid <1) {
XHandle::halt('对不起，请选择要打招呼/问候内容。','',1);
}
return $greetid;
}
}
?>