<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class listenUService extends X {
public function validFuid() {
$fuid = XRequest::getInt('fuid');
if ($fuid<1) {
XHandle::halt('对不起，关注对象ID错误！','',1);
}
else {
return $fuid;
}
}
public function validID() {
$id = XRequest::getInt('id');
if ($id <1) {
XHandle::halt('对不起，ID错误！','',1);
}
else {
return $id;
}
}
}
?>