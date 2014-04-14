<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class readmsgUService extends X {
public function validID() {
$id = XRequest::getArgs('id');
if (false === XValid::isNumber($id)) {
XHandle::halt('ID错误','',1);
}
if ($id <1) {
XHandle::halt('ID错误','',1);
}
return $id;
}
}
?>