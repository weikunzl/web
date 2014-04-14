<?php
/**
 * @CopyRight  (C)2010-2012 OEdev.Net Inc.
 * @WebSite    www.phpcoo.com,www.oedev.net
 * @Author     OEdev <phpcoo@qq.com>
 * @Brief      OElove v3.X Install
**/
header("Content-type: text/html; charset=utf-8");
@set_time_limit(0);
@error_reporting(E_ALL & ~ E_NOTICE);
if(PHP_VERSION<"5.3"){
    @set_magic_quotes_runtime(0);
}
$oelove_mic_time  = explode(' ', microtime());
$oelove_starttime = $oelove_mic_time[1] + $oelove_mic_time[0];
define('INSTALL_OESOFT', TRUE);
define('INSTALL_ROOT', substr(dirname(__FILE__), 0, -15));
if (!function_exists('get_magic_quotes_gpc')) {
    define('MAGIC_QUOTES_GPC', false);
}else {
    define('MAGIC_QUOTES_GPC', @get_magic_quotes_gpc());
}
if(PHP_VERSION < '4.1.0') {
	$_GET     = &$HTTP_GET_VARS;
	$_POST    = &$HTTP_POST_VARS;
	$_COOKIE  = &$HTTP_COOKIE_VARS;
	$_SERVER  = &$HTTP_SERVER_VARS;
	$_ENV     = &$HTTP_ENV_VARS;
	$_FILES   = &$HTTP_POST_FILES;
}

//加上反斜杠函数
function daddslashes($string) {
    //没有开启魔镜，自动加上反斜杠
	if(!MAGIC_QUOTES_GPC) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])){
	exit('Request tainting attempted.');
}

//所有提交的数据对'和"加上反斜杠
$_GET       = daddslashes($_GET);
$_POST      = daddslashes($_POST);
$_COOKIE	= daddslashes($_COOKIE);
$_REQUEST   = daddslashes($_REQUEST);
$_FILES     = daddslashes($_FILES);
$_SERVER	= daddslashes($_SERVER);

/* 设置时区 */
if (PHP_VERSION >= '5.1'){
    date_default_timezone_set('Asia/Shanghai');
}
/* 设置单个文件大小 */
ini_set('memory_limit', '32M');

//包含文件
if (file_exists(INSTALL_ROOT.'./install/data/db.php')) {
    require_once INSTALL_ROOT.'./install/data/db.php';
}
if (file_exists(INSTALL_ROOT.'./install/data/conf.php')) {
    require_once INSTALL_ROOT.'./install/data/conf.php';
}
require_once INSTALL_ROOT.'./install/include/version.php';
require_once INSTALL_ROOT.'./install/include/class.filter.php';
require_once INSTALL_ROOT.'./install/include/class.request.php';
require_once INSTALL_ROOT.'./install/include/class.file.php';
require_once INSTALL_ROOT.'./install/include/class.curl.php';
require_once INSTALL_ROOT.'./install/include/class.mysql.php';
?>