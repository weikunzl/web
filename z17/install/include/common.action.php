<?php

if(!defined('INSTALL_OESOFT')) {
exit('Access Denied');
}
function action_saveconf() {
$error = null;
$adminname = XRequest::getArgs('adminname');
$password = XRequest::getArgs('password');
$confirmpassword = XRequest::getArgs('confirmpassword');
$path = XRequest::getArgs('path');
$sitename = XRequest::getArgs('sitename');
$siteurl = XRequest::getArgs('siteurl');
if (empty($adminname)) {
$error .= "管理员账号不能为空<br />";
}
if (empty($password)) {
$error .= "管理员密码不能为空<br />";
}
else {
if ($confirmpassword != $password) {
$error .= "确认密码不正确<br />";
}
}
if (empty($path)) {
$error .= "安装目录不能为空<br />";
}
if (empty($sitename)) {
$error .= "网站名称不能为空<br />";
}
if (empty($siteurl)) {
$error .= "网站URL地址不能为空<br />";
}
if (empty($error)) {
$cache_data = "<?php
define('OE_ADMINNAME', '".$adminname."');
define('OE_PASSWORD', '".$password."');
define('OE_PATH', '".$path."');
define('OE_SITENAME', '".$sitename."');
define('OE_SITEURL', '".$siteurl."');
?>
";
$file = 'install/data/conf.php';
XFile::createFile($file);
if (false === XFile::writeFile($file,$cache_data)) {
$error .= "install/data/目录没有写入权限";
}
}
return $error;
}
function action_savedb() {
$error = null;
$dbserver = XRequest::getArgs('dbserver');
$dbuser = XRequest::getArgs('dbuser');
$dbpassword = XRequest::getArgs('dbpassword');
$dbname = XRequest::getArgs('dbname');
$dbpre = XRequest::getArgs('dbpre');
$installdist = XRequest::getArgs('installdist');
$installdist = intval($installdist);
if (empty($dbserver)) {
$error .= "数据库服务器地址不能为空<br />";
}
if (empty($dbuser)) {
$error .= "数据库用户名不能为空<br />";
}
if (empty($dbpassword)) {
$error .= "数据库用户密码不能为空<br />";
}
if (empty($dbname)) {
$error .= "数据库名称不能为空<br />";
}
if (empty($dbpre)) {
$error .= "数据表前缀不能为空<br />";
}
else {
if (strlen($dbpre) <2) {
$error .= "数据表前缀格式不正确<br />";
}
else {
if (substr($dbpre,-1,1) != '_') {
$error .= "数据表前缀格式不正确<br />";
}
}
}
$conn = @mysql_connect($dbserver,$dbuser,$dbpassword);
if (!$conn) {
$error .= "无法连接Mysql数据库服务器";
}
else {
if (!@mysql_select_db($dbname,$conn)) {
if (!@mysql_query("CREATE DATABASE {$dbname}")) {
$error .= "创建数据库{$dbname}失败，您的用户名可能没有创建数据库的权限";
}
}
if (empty($error)) {
$sqlversion = @mysql_get_server_info();
if (empty($sqlversion)) {
$sqlversion = '5.0';
}
if ($sqlversion >'4.1') {
mysql_query("set names 'utf8'");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
mysql_query("ALTER DATABASE {$dbname} DEFAULT CHARACTER SET utf8 COLLATE 'utf8_general_ci'");
}
if ($sqlversion>'5.0') {
mysql_query("SET sql_mode=''");
}
}
}
if (empty($error)) {
$cache_data = "<?php
define('OE_DBHOST', '".$dbserver."');
define('OE_DBNAME', '".$dbname."');
define('OE_DBUSER', '".$dbuser."');
define('OE_DBPASSWORD', '".$dbpassword."');
define('OE_DBPRE', '".$dbpre."');
define('OE_DBCHARSET', 'utf8');
define('OE_DBCONNECT', 0);
define('OE_INSTALLDIST', ".$installdist.");
?>
";
$file = 'install/data/db.php';
XFile::createFile($file);
if (false === XFile::writeFile($file,$cache_data)) {
$error .= "install/data/目录没有写入权限";
}
}
return $error;
}
function action_del() {
XFile::delFile('install/data/db.php');
XFile::delFile('install/data/conf.php');
}
?>