<?php

require_once 'include/install.inc.php';
require_once 'include/install.function.php';
require_once 'include/common.action.php';
$db = new mysqlClass;
$db->connect(OE_DBHOST,OE_DBUSER,OE_DBPASSWORD,OE_DBNAME,OE_DBCHARSET,OE_DBCONNECT,true);
$array = array();
$result = false;
$message = '';
$sql_script = getSqlScript('mainsql');
if (!empty($sql_script)) {
action_excute_sql($sql_script);
$result = true;
$message .= "sql主表结构安装成功<br />";
}
else {
$message .= "读取sql主表结构脚本失败！<br />";
$result = false;
}
$sql_data = getSqlScript('maindata');
if (!empty($sql_data)) {
action_excute_sql($sql_data);
$result = true;
$message .= "sql主表数据安装成功<br />";
}
else {
$message .= "读取sql主表数据脚本失败！<br />";
$result = false;
}
if (OE_INSTALLDIST == 1) {
$sql_dist = getSqlScript('dist');
if (!empty($sql_dist)) {
action_excute_sql($sql_dist);
$message .= "导入体验数据成功<br />";
}
}
if (true === $result) {
create_conf();
update_data();
$message .= "恭喜你，网站安装成功！";
}
echo json_encode(array('response'=>$result,'message'=>$message));
function action_excute_sql($sqlpack) {
global $db;
$sqls = handle_sql_string($sqlpack);
if (is_array($sqls)) {
foreach ($sqls as $sql) {
if (trim($sql) != '') {
$db->query($sql);
}
}
}
else{
$db->query($sqls);
}
return true;
}
function create_conf() {
$db_content="<?php
/**
 * @CopyRight  (C)2010-2012 OEdev.Net Inc.
 * @WebSite    www.phpcoo.com,www.oedev.net
 * @Author     OEdev <phpcoo@qq.com>
 * @Brief      OElove v3.X
**/
///数据库类型
define('DB_TYPE', 'mysql');
///数据库编码
define('DB_CHARSET', 'utf8');
///数据库服务器
define('DB_HOST', '".OE_DBHOST."');
///数据库名
define('DB_DATA', '".OE_DBNAME."');
///数据库登录帐号
define('DB_USER', '".OE_DBUSER."');
///数据库登录密码
define('DB_PASS', '".OE_DBPASSWORD."');
///数据表前缀
define('DB_PREFIX', '".OE_DBPRE."');
///数据库持久连接 0=关闭, 1=打开
define('DB_PCONNECT', 0);
?>";
$db_file = 'source/conf/db.inc.php';
XFile::createFile($db_file);
XFile::writeFile($db_file,$db_content);
$config_content="<?php
/**
 * @CopyRight  (C)2010-2012 OEdev.Net Inc.
 * @WebSite    www.phpcoo.com,www.oedev.net
 * @Author     OEdev <phpcoo@qq.com>
 * @Brief      OElove v3.X
**/
///设置时区
define('OESOFT_TIMEZONE', 'Asia/Shanghai');
///系统安装目录
define('OESOFT_ROOT', '".OE_PATH."');
///系统Cookies前缀
define('OESOFT_COOKIEPRE', '".getRndChar(8)."');
///系统编码
define('OESOFT_CHARSET', 'utf-8');
///自定义链接路径
define('PATH_URL', '".OE_PATH."');
///前台默认模版目录 不需要填写tpl目录
define('__TPLDIR__', 'default');
///后台默认模版目录 不需要填写tpl目录
define('__ADMIN_TPLDIR__', 'admincp');
///后台管理文件
define('__ADMIN_FILE__', 'admincp.php');
///系统随机码
define('OESOFT_RANDKEY', '".getRndChar(16)."');
///设置文件体积大小
define('OESOFT_MEMORY_LIMIT', '32M');
///其他设置
define('OESOFT_STYPE', '0');
///安装标识
define('OELOVE', true);
?>";
$config_file = 'source/conf/config.inc.php';
XFile::createFile($config_file);
XFile::writeFile($config_file,$config_content);
$lock_content = "OK";
$lock_file = 'install/data/install.lock';
XFile::createFile($lock_file);
XFile::writeFile($lock_file,$lock_content);
}
function update_data() {
global $db;
$sql = "SELECT `optionvalue` FROM ".OE_DBPRE."options WHERE `optionname`='site_base'";
$data = $db->fetch_first($sql);
if (!empty($data)) {
$array = doUnSerialize($data);
if (is_array($array)) {
$array['sitename'] = OE_SITENAME;
$array['siteurl'] = OE_SITEURL;
$serial_content = serialize($array);
$db->update(OE_DBPRE.'options',array('optionvalue'=>$serial_content),"`optionname`='site_base'");
}
}
unset($sql);
unset($data);
$sql = "SELECT `adminid` FROM ".OE_DBPRE."admin".
" WHERE `adminname`='".OE_ADMINNAME."'";
$rows = $db->fetch_first($sql);
if (empty($rows)) {
$adminid = $db->fetch_newid("SELECT MAX(adminid) FROM ".OE_DBPRE."admin",1);
$arr = array(
'adminid'=>$adminid,
'adminname'=>OE_ADMINNAME,
'password'=>md5(OE_PASSWORD),
'groupid'=>0,
'super'=>1,
'timeline'=>time(),
'flag'=>1,
'memo'=>'超级管理员',
);
$db->insert(OE_DBPRE.'admin',$arr);
}
unset($sql);
unset($rows);
}
?>