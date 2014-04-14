<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class labelIModel extends X {
public function repLabel($content) {
if (!empty($content)) {
return str_ireplace(
array("{\$config.sitename}","{\$config.siteurl}","{\$config.sitetitle}","{\$urlpath}","{\$skinpath}"),
array(parent::$cfg['sitename'],parent::$cfg['siteurl'],parent::$cfg['sitetitle'],parent::$urlpath,parent::$skinpath),
$content
);
}
else {
return '';
}
}
public function getOne($labelname) {
$cache = parent::import('cache','lib');
if (true === $cache->checkCaChe('htmllabel')) {
$data = $cache->readCache('htmllabel');
if (!empty($data)) {
return $this->repLabel($data[$labelname]);
}
else{
return '';
}
}
else {
$sql = "SELECT `content` FROM ".DB_PREFIX."htmllabel".
" WHERE lower(labelname)='{$labelname}' AND `templet`='".parent::$cfg['templet']."'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data['content'])) {
return $this->repLabel($data['content']);
}
else {
return '';
}
unset($data);
}
unset($cache);
}
}
?>