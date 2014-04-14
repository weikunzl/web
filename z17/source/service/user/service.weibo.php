<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class weiboUService extends X {
public function validAdd() {
$content = XRequest::getArgs('content');
if (empty($content)) {
XHandle::halt('微博内容不能为空','',1);
}
else {
if (true === XFilter::checkExistsForbidChar($content)) {
XHandle::halt('对不起，内容含有系统禁止的字符。','',1);
}
$content = XFilter::filterForbidChar($content);
}
return $content;
}
public function validID() {
$id = XRequest::getInt('id');
if ($id <1) {
XHandle::halt('对不起，ID丢失。','',1);
}
else {
return $id;
}
}
}
?>