<?php

if(!defined('INSTALL_OESOFT')) {
exit('Access Denied');
}
class XRequest {
public static function getPost($name = '') {
if (empty($name)) return $_POST;
return (isset($_POST[$name])) ?$_POST[$name] : '';
}
public static function getGet($name = '') {
if (empty($name)) return $_GET;
return (isset($_GET[$name])) ?$_GET[$name] : '';
}
public static function getCookie($name = '') {
if ($name == '') return $_COOKIE;
return (isset($_COOKIE[$name])) ?$_COOKIE[$name] : '';
}
public static function getSession($name = '') {
if ($name == '') return $_SESSION;
return (isset($_SESSION[$name])) ?$_SESSION[$name] : '';
}
public static function fetchEnv($name = '') {
if ($name == '') return $_ENV;
return (isset($_ENV[$name])) ?$_ENV[$name] : '';
}
public static function getService($name = '') {
if ($name == '') return $_SERVER;
return (isset($_SERVER[$name])) ?$_SERVER[$name] : '';
}
public static function getPhpSelf() {
return strip_tags(self::getService('PHP_SELF'));
}
public static function getServiceName() {
return self::getService('SERVER_NAME');
}
public static function getRequestTime() {
return self::getService('REQUEST_TIME');
}
public static function getUserAgent() {
return self::getService('HTTP_USER_AGENT');
}
public static function getUri() {
return self::getService('REQUEST_URI');
}
public static function isPost() {
return (strtolower(self::getService('REQUEST_METHOD')) == 'post') ?true : false;
}
public static function isGet() {
return (strtolower(self::getService('REQUEST_METHOD')) == 'get') ?true : false;
}
public static function isAjax() {
if (self::getService('HTTP_X_REQUESTED_WITH') &&strtolower(self::getService('HTTP_X_REQUESTED_WITH')) == 'xmlhttprequest') return true;
if (self::getService('HTTP_REQUEST_TYPE') &&strtolower(self::getService('HTTP_REQUEST_TYPE')) == 'ajax') return true;
if (self::getPost('oe_ajax') ||self::getGet('oe_ajax')) return true;
return false;
}
public static function getip() {
static $realip;
if (isset($_SERVER)){
if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
$realip = $_SERVER["HTTP_CLIENT_IP"];
}else {
$realip = $_SERVER["REMOTE_ADDR"];
}
}else {
if (getenv("HTTP_X_FORWARDED_FOR")){
$realip = getenv("HTTP_X_FORWARDED_FOR");
}else if (getenv("HTTP_CLIENT_IP")) {
$realip = getenv("HTTP_CLIENT_IP");
}else {
$realip = getenv("REMOTE_ADDR");
}
}
$one = '([0-9]|[0-9]{2}|1\d\d|2[0-4]\d|25[0-5])';
if(!@preg_match('/'.$one.'\.'.$one.'\.'.$one.'\.'.$one.'$/',$realip)){$realip='0.0.0.0';};
return $realip;
}
protected static function uri() {
$uri = self::getUri();
$file = dirname($_SERVER['SCRIPT_NAME']);
$request = str_replace($file,'',$uri);
$request = explode('/',trim($request,'/'));
if (isset($request[0])) {
$_GET['c'] = $request[0];
unset($request[0]);
}
if (isset($request[1])) {
$_GET['a'] = $request[1];
unset($request[1]);
}
if (count($request) >1) {
$mark = 0;
$val = $key = array();
foreach($request as $value){
$mark++;
if ($mark %2 == 0) {
$val[] = $value;
}else {
$key[] = $value;
}
}
if(count($key) !== count($val)) $val[] = NULL;
$get = array_combine($key,$val);
foreach($get as $key=>$value) $_GET[$key] = $value;
}
return true;
}
public static function getGpc($value,$isfliter = true) {
if (!is_array($value)) {
if (isset($_GET[$value])) $temp = trim($_GET[$value]);
if (isset($_POST[$value])) $temp = trim($_POST[$value]);
$temp = ($isfliter === true) ?XFilter::filterStr($temp) : $temp;
return trim($temp);
}else {
$temp = array();
foreach ($value as $val) {
if (isset($_GET[$val])) $temp[$val] = trim($_GET[$val]);
if (isset($_POST[$val])) $temp[$val] = trim($_POST[$val]);
$temp[$val] = ($isfliter === true) ?XFilter::filterStr($temp[$val]) : $temp[$val];
}
return $temp;
}
}
public static function getArgs($value,$default=NULL,$isfliter = true) {
if (!empty($value)) {
if (isset($_GET[$value])) $temp = trim($_GET[$value]);
if (isset($_POST[$value])) $temp = trim($_POST[$value]);
if ($isfliter == true) {
$temp = XFilter::filterStr($temp);
}
else {
$temp = XFilter::stripArray($temp);
}
if (empty($temp) &&!empty($default)) {
$temp = $default;
}
return trim($temp);
}
else {
return '';
}
}
public static function getInt($value,$default=NULL) {
if (!empty($value)) {
if (isset($_GET[$value])) $temp = $_GET[$value];
if (isset($_POST[$value])) $temp = $_POST[$value];
$temp = XFilter::filterStr($temp);
if (empty($temp) OR false === XValid::isNumber($temp)){
if (true === XValid::isNumber($default)) {
$temp = $default;
}
else {
$temp = 0;
}
}
return intval($temp);
}
else {
return 0;
}
}
public static function getArray($value) {
if (!empty($value)) {
if (isset($_GET[$value])) $temp = $_GET[$value];
if (isset($_POST[$value])) $temp = $_POST[$value];
return $temp;
}
else {
return '';
}
}
public static function recArgs($value) {
if (!empty($value)) {
if (isset($_GET[$value])) $temp = $_GET[$value];
if (isset($_POST[$value])) $temp = $_POST[$value];
return XFilter::filterBadChar($temp);
}
else {
return '';
}
}
public static function getComArgs($itemname) {
$args = '';
$array = self::getArray($itemname);
if (!empty($array)) {
for ($ii=0;$ii<count($array);$ii++) {
$val = XFilter::filterBadChar($array[$ii]);
if (!empty($val)) {
if ($ii==0) {
$args = $val;
}
else {
if ($args=="") {
$args = $val;
}
else {
$args = $args.','.$val;
}
}
}
}
}
return $args;
}
public static function getComInts($name) {
$args = '';
$array = self::getArray($name);
if (!empty($array)) {
for ($ii=0;$ii<count($array);$ii++) {
$val = intval(XFilter::filterBadChar($array[$ii]));
if (!empty($val)) {
if ($ii==0) {
$args = $val;
}
else {
if ($args == '') {
$args = $val;
}
else {
$args = $args.','.$val;
}
}
}
}
}
return $args;
}
}
?>