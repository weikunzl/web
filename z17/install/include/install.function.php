<?php

if(!defined('INSTALL_OESOFT')) {
exit('Access Denied');
}
function isFunction($name) {
return function_exists($name);
}
function checkPhpVersion() {
if (PHP_VERSION <5.2) {
return false;
}
else {
return true;
}
}
function checkZend() {
$PHP_VERSION = PHP_VERSION;
$PHP_VERSION = substr($PHP_VERSION,2,1);
if ($PHP_VERSION >2) {
$zend = 3;
}
else {
$zend = 2;
}
if ($zend == 3) {
if (get_cfg_var('zend_loader.enable')) {
return true;
}
else {
return false;
}
}
else {
if (true == isFunction('zend_optimizer_version')) {
return true;
}
else {
false;
}
}
}
function isWrite($dir) {
if (is_writeable(INSTALL_ROOT.$dir)) {
return true;
}
else {
return false;
}
}
function getServer() {
$os = explode(" ",php_uname());
$os_name = $os[0];
if ('/'==DIRECTORY_SEPARATOR){
$ver = $os[2];
}
else{
$ver = $os[1];
}
return $os_name.' '.$ver;
}
function getEngine() {
return $_SERVER['SERVER_SOFTWARE'];
}
function getRndChar($length,$type=0){
switch($type){
case 1:$pattern = "1234567890";break;
case 2:$pattern = "abcdefghijklmnopqrstuvwxyz";break;
case 3:$pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";break;
case 4:$pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890~!@#$%^&*()_-+=";break;
case 5:$pattern = "123456789";break;
default:$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
}
$size = strlen($pattern)-1;
$key = $pattern{rand(0,$size)};
for($i=1;$i<$length;$i++){
$key.= $pattern{rand(0,$size)};
}
return $key;
}
function checkInstall() {
if (file_exists(INSTALL_ROOT.'./install/data/install.lock')) {
echo "对不起，您已经完成了网站安装，如果您需要重新安装，请先删除install/data/install.lock文件再试。";
die();
}
}
function getSqlScript($type) {
$content = '';
if ($type == 'mainsql') {
$sql_file = INSTALL_ROOT.'./install/data/v3_script.sql';
}
elseif ($type == 'maindata') {
$sql_file = INSTALL_ROOT.'./install/data/v3_data.sql';
}
elseif ($type == 'dist') {
$sql_file = INSTALL_ROOT.'./install/data/v3_dist_data.sql';
}
if (file_exists($sql_file)) {
$content = file_get_contents($sql_file);
}
return $content;
}
function handle_sql_string($sql) {
if(PHP_VERSION >'4.1'){
$sql = preg_replace("/TYPE=(InnoDB|MyISAM)( DEFAULT CHARSET=[^; ]+)?/","TYPE=\\1 DEFAULT CHARSET=utf8",$sql);
}
$sql = str_replace("\r","\n",$sql);
$sql = str_replace('{dbpre}',OE_DBPRE,$sql);
$ret = array();
$num = 0;
$queriesarray = explode(";\n",trim($sql));
unset($sql);
foreach($queriesarray as $query){
$ret[$num] = '';
$queries = explode("\n",trim($query));
$queries = array_filter($queries);
foreach($queries as $query){
$str1 = substr($query,0,1);
if($str1 != '#'&&$str1 != '-') $ret[$num] .= $query;
}
$num++;
}
return($ret);
}
function doUnSerialize($serial_str){
$serial_str= preg_replace('!s:(\d+):"(.*?)";!se',"'s:'.strlen('$2').':\"$2\";'",$serial_str );
$serial_str= str_replace("\r","",$serial_str);
return @unserialize($serial_str);
}
?>