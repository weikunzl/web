<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class avatarAModel extends X {
public function getNewImage($uid,$imgurl) {
$newfile = "data/attachment/temp/".$uid.'/avatar_big.jpg';
parent::loadUtil('file');
$result = XFile::copyFile($imgurl,$newfile);
if (true === $result) {
return $newfile;
}
else {
return '';
}
}
public function doCutAvatar($uid,$imgurl,$cd,$type='admin') {
$result = false;
$timer = time();
$datedir = date('Ym',$timer).'/'.date('d',$timer);
$pic_path = 'data/attachment/avatar/'.$datedir.'/'.$uid.'/';
parent::loadUtil('file');
XFile::createDir($pic_path);
$copy_avatar_url = $pic_path.'avatar_big.jpg';
if (true === XFile::copyFile($imgurl,$copy_avatar_url)) {
parent::loadUtil('cropper');
$cut_img_url = XCropper::cutImage($copy_avatar_url,$cd);
if (!empty($cut_img_url) &&file_exists(BASE_ROOT.$cut_img_url)) {
XFile::delFile($copy_avatar_url);
$result = $this->doSetAvatar($uid,$cut_img_url,$type);
}
}
return $result;
}
public function doSetAvatar($userid,$avatar,$type='admin') {
$user_sql = "SELECT `avatar` FROM ".DB_PREFIX."user WHERE `userid`='".intval($userid)."'";
$rows = parent::$obj->fetch_first($user_sql);
if (!empty($rows)) {
parent::loadUtil('file');
if (!empty($rows['avatar'])) {
if ($avatar != $rows['avatar']) {
if (substr($rows['avatar'],0,15) == 'data/attachment'){
XFile::delFile($rows['avatar']);
$big_avatar = str_replace('.thumb.jpg','',$rows['avatar']);
XFile::delFile($big_avatar);
$small_avatar = str_replace('big','small',$big_avatar);
XFile::delFile($small_avatar);
}
}
}
}
unset($rows);
$indexs_avatar = 0;
if ($type == 'user') {
if (intval(parent::$cfg['auditavatar']) == 1) {
$array = array(
'avatar'=>$avatar,
'avatarflag'=>-2,
'avatartime'=>time(),
);
$avatar_ok = 0;
$indexs_avatar = -2;
}
else {
$array = array(
'avatar'=>$avatar,
'avatarflag'=>1,
'avatartime'=>time(),
);
$avatar_ok = 1;
$indexs_avatar = 1;
}
}
else {
$array = array(
'avatar'=>$avatar,
'avatarflag'=>1,
'avatartime'=>time(),
);
$avatar_ok = 1;
$indexs_avatar = 1;
}
parent::$obj->update(DB_PREFIX.'user',$array,"userid='".intval($userid)."'");
$result = true;
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs($userid,array('avatar'=>$indexs_avatar));
unset($m_indexs);
return $result;
}
}
?>