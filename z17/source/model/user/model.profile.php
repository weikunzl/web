<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class profileUModel extends X {
public function doEditBaseProfile($main_args) {
$result = parent::$obj->update(DB_PREFIX.'user_profile',$main_args,"userid='".parent::$wrap_user['userid']."'");
if (true === $result) {
$indexs_args = array();
$indexs_args = $main_args;
$indexs_args['child'] = intval($main_args['childrenstatus']);
$indexs_args['house'] = intval($main_args['housing']);
$indexs_args['car'] = intval($main_args['caring']);
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs(parent::$wrap_user['userid'],$indexs_args);
unset($m_indexs);
unset($indexs_args);
}
return $result;
}
public function doEditMoreProfile($main_args) {
$result = parent::$obj->update(DB_PREFIX.'user_profile',$main_args,"userid='".parent::$wrap_user['userid']."'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs(parent::$wrap_user['userid'],$main_args);
unset($m_indexs);
}
return $result;
}
public function doEditMonolog($content) {
$array = array(
'monolog'=>$content,
'moluptime'=>time(),
);
if (!empty($content)) {
if (parent::$cfg['auditmonolog'] == 1) {
$molstatus = -2;
}
else {
$molstatus = 1;
}
}
else {
$molstatus = 0;
}
$array['molstatus'] = $molstatus;
$result = parent::$obj->update(DB_PREFIX.'user_profile',$array,"userid='".parent::$wrap_user['userid']."'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs(parent::$wrap_user['userid'],array('monolog'=>$molstatus));
unset($m_indexs);
}
return $result;
}
public function doEditContact($args) {
return parent::$obj->update(DB_PREFIX.'user_attr',$args,"userid='".parent::$wrap_user['userid']."'");
}
public function doEditArea($args) {
$result = parent::$obj->update(DB_PREFIX.'user_profile',$args,"userid='".parent::$wrap_user['userid']."'");
if (true === $result) {
$m_indexs = parent::model('indexs','am');
$m_indexs->updateIndexs(parent::$wrap_user['userid'],$args);
unset($m_indexs);
}
return $result;
}
public function doEditHomeTown($args) {
return parent::$obj->update(DB_PREFIX.'user_profile',$args,"userid='".parent::$wrap_user['userid']."'");
}
}
?>