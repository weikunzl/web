<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class connectIService extends X {
public function validID() {
$id = XRequest::getInt('id');
if ($id<1) {
XHandle::halt('对不起，ID错误！','',1);
}
return $id;
}
public function validMod() {
$mod = XRequest::getArgs('mod');
if (empty($mod)) {
XHandle::halt('对不起，载入第三方MOD失败。','',1);
}
if (!in_array($mod,array('qq','sina'))) {
XHandle::halt('对不起，所执行的Mod不允许。','',1);
}
return $mod;
}
}
?>