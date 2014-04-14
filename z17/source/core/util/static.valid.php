<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class XValid {
public static function isLength($value,$min = 0,$max= 0) {
$value = trim($value);
if ($min != 0 &&strlen($value) <$min) return false;
if ($max != 0 &&strlen($value) >$max) return false;
return true;
}
public static function isRequire($value) {
return preg_match('/.+/',trim($value));
}
public static function isEmpty($value) {
return (empty($value) ||$value=="");
}
public static function isArray($value) {
if (!is_array($value) ||empty($value)) return false;
return true;
}
public static function isEmail($value) {
if (strlen($value)>6) {
if (preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/",trim($value))){
return true;
}
else {
return false;
}
}
else {
return false;
}
}
public static function isip($value) {
if (preg_match('/^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/',trim($value))) {
return true;
}
else {
return false;
}
}
public static function isInt($value) {
if (preg_match('/\d+$/',trim($value))) {
return true;
}
else {
return false;
}
}
public static function isNumber($value) {
if(is_numeric($value)) {
return true;
}
else {
return false;
}
}
public static function contNumber($str,$len=6,$trans=true) {
if ($len <1) {
$len = 1;
}
$res = false;
if (!empty($str)) {
if (true === $trans) {
$str = self::_replaceNumbers($str);
}
if (preg_match("/[0-9]{".$len."}/i",$str)) {
$res = true;
}
}
return $res;
}
private static function _replaceNumbers($s) {
if (!empty($s)) {
$s = XHandle::filterHtml($s);
$s = str_ireplace(
array('-','|','{','}'),
array('','','',''),
$s
);
$s = str_ireplace(
array('一','二','三','四','五','六','七','八','九','零','壹','贰','叁','肆','伍','陆','柒','捌','玖'),
array('1','2','3','4','5','6','7','8','9','0','1','2','3','4','5','6','7','8','9'),
$s
);
}
return $s;
}
public static function isCard($value){
return preg_match("/^(\d{15}|\d{17}[\dx])$/i",$value);
}
public static function isPhone($value) {
return preg_match('/^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/',trim($value));
}
public static function isMobile($value) {
if (strlen($value) == 11) {
if (preg_match('/13[0123456789]{1}\d{8}|15[0123456789]{1}\d{8}|18[0123456789]{1}\d{8}/',$value)) {
return true;
}
else {
return false;
}
}
else {
return false;
}
}
public static function isUrl($value) {
return preg_match('/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/i',trim($value));
}
public static function isZip($value) {
if (preg_match('/^[1-9]\d{5}$/',trim($value))) {
return true;
}
else {
return false;
}
}
public static function isQQ($value) {
if (preg_match('/^[0-9]\d{5,11}$/',trim($value))) {
return true;
}
else {
return false;
}
}
public static function isEnglish($value) {
if (preg_match('/^[A-Za-z]+$/',trim($value))) {
return true;
}
else {
return false;
}
}
public static function isChinese($value) {
if (preg_match("/^([\xE4-\xE9][\x80-\xBF][\x80-\xBF])+$/",trim($value))) {
return true;
}
else {
return false;
}
}
public static function isUserArgs($s_str){
if(preg_match("/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]+$/u",$s_str)){
return true;
}else {
return false;
}
}
public static function isPlugin($plugin) {
$plugin_path = $plugin.'/'.$plugin.'.php';
if (is_string($plugin_path) &&preg_match("/^[\w\-\/]+\.php$/",$plugin_path) &&file_exists(BASE_ROOT .'source/plugin/'.$plugin_path)) {
return true;
}else {
return false;
}
}
public static function isDir($file) {
return is_dir($file);
}
public static function mathDir($s_str) {
if(preg_match("/^[0-9a-zA-Z_-]+$/u",$s_str)){
return true;
}else {
return false;
}
}
public static function isLabel($s_str) {
if(preg_match("/^[0-9a-zA-Z_-]+$/u",$s_str)){
return true;
}else {
return false;
}
}
public static function isSpChar($s_str) {
if(preg_match("/^[0-9a-zA-Z_-]+$/u",$s_str)){
return true;
}else {
return false;
}
}
public static function isModuleAttr($s_str) {
if(preg_match("/^[a-z]+$/i",$s_str)){
return true;
}else {
return false;
}
}
public static function isComChar($str) {
if (preg_match("/^[0-9,]+$/i",$str)) {
return true;
}
else {
return false;
}
}
public static function isDate($date) {
if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$date)) {
return true;
}
else {
return false;
}
}
}
?>