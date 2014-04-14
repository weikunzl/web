<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class indexsAModel extends X {
public function createIndexs($params_array) {
$result = false;
$userid = intval($params_array['userid']);
$sql = "SELECT `userid` FROM ".DB_PREFIX."user_params".
" WHERE `userid`=>'{$userid}'";
$data = parent::$obj->fetch_first($sql);
if (empty($data)) {
$result = parent::$obj->insert(DB_PREFIX.'user_params',$params_array);
}
unset($data);
return $result;
}
private function _buildParams($items) {
$params = array();
$mixed = array(
'flag','lovestatus','gender','avatar','monolog','ageyear',
'provinceid','cityid','distid','groupid','height','weight',
'salary','education','marry','lovesort','child','house','car',
'lunar','astro','star','rzemail','rzmobile','rzidnumber','rzvideo','jobs',
);
if (is_array($items)) {
foreach ($mixed as $key=>$value) {
if (array_key_exists($value,$items)) {
$params[$value] = $items[$value];
}
}
}
return $params;
}
public function updateIndexs($userid,$array) {
$result = false;
$params_array = $this->_buildParams($array);
if (!empty($params_array)) {
$result = parent::$obj->update(DB_PREFIX.'user_params',$params_array,"`userid`='{$userid}'");
}
unset($params_array);
return $result;
}
public function updateIndexsOthers($userid,$array) {
$result = false;
if (is_array($array)) {
$result = parent::$obj->update(DB_PREFIX.'user_params',$array,"`userid`='{$userid}'");
}
return $result;
}
}
?>