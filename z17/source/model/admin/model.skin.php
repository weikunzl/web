<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class skinAModel extends X {
public function getList() {
$templet_path = BASE_ROOT.'tpl/templets/';
$handle = @opendir($templet_path) OR die('OElove template path error!');
$templets = array();
while ($file = @readdir($handle)){
if (@file_exists($templet_path.$file.'/copyright.conf')){
$templets[] = $this->getCopyRight($file);
}
}
closedir($handle);
$tplnums = count($templets);
return array($tplnums,$templets);
}
public function getCopyRight($tpldir='') {
if (empty($tpldir)) {
$nonce_templet = XOption::get('nonce_templet');
}
else {
$nonce_templet = $tpldir;
}
$nonce_tpldata = @implode('',@file(BASE_ROOT.'tpl/templets/'.$nonce_templet.'/copyright.conf'));
preg_match("/Template Name:(.*)/i",$nonce_tpldata,$nonce_tplname);
preg_match("/Version:(.*)/i",$nonce_tpldata,$nonce_tplversion);
preg_match("/Description:(.*)/i",$nonce_tpldata,$nonce_tpldesc);
preg_match("/Author:(.*)/i",$nonce_tpldata,$nonce_tplauthor);
preg_match("/Author Url:(.*)/i",$nonce_tpldata,$nonce_tplurl);
preg_match("/Amount:(.*)/i",$nonce_tpldata,$nonce_amount);
preg_match("/For Version:(.*)/i",$nonce_tpldata,$nonce_tplforversion);
preg_match("/Last Update:(.*)/i",$nonce_tpldata,$nonce_tpllastupdate);
$nonce_tplname = !empty($nonce_tplname[1]) ?trim($nonce_tplname[1]) : $nonce_templet;
$nonce_tplversion = !empty($nonce_tplversion[1]) ?trim($nonce_tplversion[1]) : '';
$nonce_tpldesc = !empty($nonce_tpldesc[1]) ?trim($nonce_tpldesc[1]) : '';
$nonce_tplurl = !empty($nonce_tplurl[1]) ?trim($nonce_tplurl[1]) : '';
if(isset($nonce_tplauthor[1])){
$nonce_tplauthor = !empty($nonce_tplauthor[1]) ?"作者：<a href=\"{$nonce_tplurl}\" target='_blank'>{$nonce_tplauthor[1]}</a>": "作者：{$nonce_tplauthor[1]}";
}else{
$nonce_tplauthor = '';
}
$nonce_amount = !empty($nonce_amount[1]) ?'售价：'.$nonce_amount[1].'元': '';
$nonce_tplforversion = !empty($nonce_tplforversion[1]) ?'适用于OElove：'.trim($nonce_tplforversion[1]) : '';
$nonce_tpllastupdate = !empty($nonce_tpllastupdate[1]) ?'最后更新：'.trim($nonce_tpllastupdate[1]) : '';
return array(
'tplname'=>$nonce_tplname,
'version'=>$nonce_tplversion,
'desc'=>$nonce_tpldesc,
'author'=>$nonce_tplauthor,
'authorurl'=>$nonce_tplurl,
'amount'=>$nonce_amount,
'forversion'=>$nonce_tplforversion,
'lastupdate'=>$nonce_tpllastupdate,
'preview'=>PATH_URL.'tpl/templets/'.$nonce_templet.'/preview.jpg',
'tpldir'=>$nonce_templet,
);
}
public function doUseTemplet($id) {
$array = array(
'optionvalue'=>$id,
);
$result = parent::$obj->update(DB_PREFIX.'options',$array,"optionname='nonce_templet'");
if (true === $result){
$cache = parent::import('cache','lib');
$cache->updateCache('options');
parent::$cfg['templet'] = $id;
$cache->updateCache('htmllabel');
unset($cache);
parent::loadUtil('file');
$tpl_pre = $this->_getPre($id);
$content = "<?php define('OESOFT_TPLPRE','".$tpl_pre."');?>";
XFile::createFile('source/conf/tpl.pre.php');
XFile::writeFile('source/conf/tpl.pre.php',$content);
unset($tpl_pre,$content);
return true;
}
else {
return false;
}
}
public function doDelTemplet($id) {
if (empty($id)) {
return false;
}
else {
$templet_path = BASE_ROOT.'tpl/templets/'.$id;
parent::loadUtil('file');
return XFile::delDir($templet_path);
}
}
private function _getPre($id) {
$pre = null;
if (!empty($id)) {
$pre_file = BASE_ROOT.'tpl/templets/'.$id.'/pre.php';
if (file_exists($pre_file)) {
$pre = require_once($pre_file);
}
}
return $pre;
}
}
?>