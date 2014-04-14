<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class connectUModel extends X {
public function getList() {
$sql = "SELECT * FROM ".DB_PREFIX."oauth WHERE flag='1' ORDER BY orders ASC";
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$data[$key]['logo'] = PATH_URL.$value['logo'];
$data[$key]['apiurl'] = PATH_URL.'index.php?c=connect&mod='.$value['filepath'];
}
return $data;
}
public function getBindCount($id) {
$sql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."oauth_user".
" WHERE authmod='{$id}' AND userid='".parent::$wrap_user['userid']."'";
return parent::$obj->fetch_count($sql);
}
public function doDel($id) {
$sql = "DELETE FROM ".DB_PREFIX."oauth_user".
" WHERE id='{$id}' AND userid='".parent::$wrap_user['userid']."'";
return parent::$obj->query($sql);
}
}
?>