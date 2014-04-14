<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
function cmd_count($extract) {
if (!empty($extract)) {
@extract($extract);
$mod = empty($extract['mod']) ?'var': trim($extract['mod']);
$type = empty($extract['type']) ?'': trim($extract['type']);
$value = empty($extract['value']) ?0 : intval($extract['value']);
if ($mod == 'user'&&$type == 'album') {
$model_album = X::model('album','um');
return $model_album->getValidAlbumCount($value);
unset($model_album);
}
elseif ($mod == 'user'&&$type == 'diary') {
$model_diary = X::model('diary','um');
return $model_diary->getValidDiaryCount($value);
unset($model_diary);
}
elseif ($mod == 'user'&&$type == 'weibo') {;
$model_weibo = X::model('weibo','im');
return $model_weibo->getUserWeiboCount($value);
unset($model_weibo);
}
elseif ($mod == 'user'&&$type == 'listen') {
$model_listen = X::model('listen','um');
return $model_listen->getListenCount($value);
unset($model_listen);
}
elseif ($mod == 'user'&&$type == 'fans') {
$model_fans = X::model('fans','um');
return $model_fans->getFansCount($value);
unset($model_fans);
}
elseif ($mod == 'user'&&$type == 'gift') {
$model_gift = X::model('gift','um');
return $model_gift->getGiftCount($value);
unset($model_gift);
}
elseif ($mod == 'user'&&$type == 'message') {
$model_message = X::model('message','um');
return $model_message->countReceiveMessage($value,'receive');
unset($model_message);
}
elseif ($mod == 'user'&&$type == 'newmessage') {
$model_message = X::model('message','um');
return $model_message->countReceiveMessage($value,'new');
unset($model_message);
}
elseif ($mod == 'user'&&$type == 'hi') {
$model_message = X::model('hi','um');
return $model_message->countReceiveHi($value,'receive');
unset($model_message);
}
elseif ($mod == 'user'&&$type == 'newhi') {
$model_hi = X::model('hi','um');
return $model_hi->countReceiveHi($value,'new');
unset($model_hi);
}
elseif ($mod == 'user'&&$type == 'system') {
$model_sys = X::model('sysmsg','um');
return $model_sys->getNoreadCount($value);
unset($model_sys);
}
elseif ($mod == 'user'&&$type == 'all') {
$model_user = X::model('user','im');
return number_format($model_user->getUserCount());
unset($model_user);
}
}
}
TPL::regFunction('count','cmd_count');
?>