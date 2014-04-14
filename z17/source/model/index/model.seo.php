<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class seoIModel extends X {
private function _repSysLabel($data) {
if (is_array($data)) {
$data['title'] = str_ireplace(
array('{urlpath}','{sitename}'),
array(PATH_URL,parent::$cfg['sitename']),
$data['title']
);
$data['description'] = str_ireplace(
array('{urlpath}','{sitename}'),
array(PATH_URL,parent::$cfg['sitename']),
$data['description']
);
$data['keyword'] = str_ireplace(
array('{urlpath}','{sitename}'),
array(PATH_URL,parent::$cfg['sitename']),
$data['keyword']
);
}
return $data;
}
public function getOneData($idmark) {
$cache = parent::import('cache','lib');
if (true === $cache->checkCaChe('seo')) {
$data = $cache->readCache('seo');
if (!empty($data)) {
return $this->_repSysLabel($data[$idmark]);
}
else{
return '';
}
}
else {
$sql = "SELECT `chname`, `title`, `description`, `keyword` FROM ".DB_PREFIX."seo".
" WHERE lower(idmark)='{$idmark}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
return $this->_repSysLabel($data);
}
else {
return '';
}
unset($data);
}
unset($cache);
}
public function loadChLabel() {
$cache = parent::import('cache','lib');
if (true === $cache->checkCaChe('seo')) {
$data_menu = $cache->readCache('seo');
}
else {
$sql = "SELECT `idmark`, `chname`, `title`, `description`, `keyword`, `url`".
" FROM ".DB_PREFIX."seo ORDER BY `id` ASC";
$data = parent::$obj->getall($sql);
$data_menu = array();
foreach ($data as $key=>$value) {
$data_menu[$value['idmark']] = array(
'chname'=>$value['chname'],
'title'=>$value['title'],
'description'=>$value['description'],
'keyword'=>$value['keyword'],
'url'=>$value['url']
);
}
}
unset($cache);
$var_array = array(
'menu'=>$data_menu,
);
TPL::assign($var_array);
unset($data);
unset($data_menu);
}
}
?>