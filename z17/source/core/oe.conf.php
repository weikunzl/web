<?php
header ( "Content-type: text/html; charset=utf-8" );
@set_time_limit ( 0 );
@error_reporting ( E_ALL & ~ E_NOTICE );
if (PHP_VERSION < "5.3") {
	@set_magic_quotes_runtime ( 0 );
}
$oelove_mic_time = explode ( ' ', microtime () );
$oelove_starttime = $oelove_mic_time [1] + $oelove_mic_time [0];
define ( 'IN_OESOFT', TRUE );
define ( 'BASE_ROOT', substr ( dirname ( __FILE__ ), 0, - 11 ) );
if (! function_exists ( 'get_magic_quotes_gpc' )) {
	define ( 'MAGIC_QUOTES_GPC', false );
} else {
	define ( 'MAGIC_QUOTES_GPC', @get_magic_quotes_gpc () );
}
if (PHP_VERSION < '4.1.0') {
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}
function daddslashes($string) {
	if (! MAGIC_QUOTES_GPC) {
		if (is_array ( $string )) {
			foreach ( $string as $key => $val ) {
				$string [$key] = daddslashes ( $val );
			}
		} else {
			$string = addslashes ( $string );
		}
	}
	return $string;
}
if (isset ( $_REQUEST ['GLOBALS'] ) or isset ( $_FILES ['GLOBALS'] )) {
	exit ( 'Request tainting attempted.' );
}
$_GET = daddslashes ( $_GET );
$_POST = daddslashes ( $_POST );
$_COOKIE = daddslashes ( $_COOKIE );
$_REQUEST = daddslashes ( $_REQUEST );
$_FILES = daddslashes ( $_FILES );
$_SERVER = daddslashes ( $_SERVER );
require_once BASE_ROOT . './source/core/util/static.runtime.php';
XRunTime::start ();
$conf_packs = array (
		'db.inc',
		'config.inc',
		'version.inc',
		'tpl.pre',
		'mail.inc',
		'jbox.inc' 
);
foreach ( $conf_packs as $key => $value ) {
	if ($value == 'webim.inc') {
		if (file_exists ( BASE_ROOT . './source/conf/' . $value . '.php' )) {
			require_once BASE_ROOT . './source/conf/' . $value . '.php';
		}
	} else {
		if (! file_exists ( BASE_ROOT . './source/conf/' . $value . '.php' )) {
			die ( "sorry, [{$value}] conf file is not exist!" );
		} else {
			require_once BASE_ROOT . './source/conf/' . $value . '.php';
		}
	}
}
if (file_exists ( BASE_ROOT . './source/conf/lockusers.php' )) {
	require_once BASE_ROOT . './source/conf/lockusers.php';
}
if (file_exists ( BASE_ROOT . './source/conf/forbidargs.php' )) {
	require_once BASE_ROOT . './source/conf/forbidargs.php';
}
if (PHP_VERSION >= '5.1') {
	date_default_timezone_set ( OESOFT_TIMEZONE );
}
ini_set ( 'memory_limit', OESOFT_MEMORY_LIMIT );
$plugin_hooks = array ();
?>