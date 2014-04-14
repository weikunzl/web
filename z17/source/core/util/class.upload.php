<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class uploadClass {
const UPLOAD_ERR_INI_SIZE   = 1;
const INPUT_MAX_FILE_SIZE   = 2;
const UPLOAD_HALF           = 3;
const UPLOAD_ERR_NO_TMP_DIR = 4;
private $attchementdir = 'data/attachment/';
private $params;
private $defaultMaxSize = 2048000;
private $defaultAllowFileType = array(
'gif','jpeg','jpg','png',
'swf','flv','rar','zip','tar','gz',
);
private $defaultForbidType = array(
'php','html','shtml','js','asp','aspx',
'jsp','exe','sql'
);
private $errorCodeArr = array(
'upload_error'=>-1,
'not_upload_files'=>-2,
'not_an_allowed_type'=>-3,
'file_size_is_large'=>-4,
'upload_err_ini_size'=>-5,
'input_max_file_size'=>-6,
'upload_half'=>-7,
'upload_err_no_tmp_dir'=>-8,
'illegal_file_type'=>-9,
'upload_content_error'=>-10  
);
public function upload($name,$module='',$path='',$params = array(),$userid='') {
$datedir = date("Ym",time())."/".date("d",time());
if (empty($path)) {
$path = $this->attchementdir.$datedir;
}
else {
if ($module == 'avatar'&&$userid != '') {
$path = $this->attchementdir.$path.'/'.$datedir.'/'.$userid;
}
elseif ($module == 'temp'&&$userid != '') {
$path = $this->attchementdir.$path.'/'.$userid;
}
else {
$path = $this->attchementdir.$path.'/'.$datedir;
}
}
if ($module == 'avatar'&&$userid != '') {
$newName = 'avatar_big';
}
else {
$newName = substr(md5(time().XHandle::getRndChar(12)),8,16);
}
$this->params = $this->parseParams($params);
$uploadInfo = $this->init($name,$newName,$path);
if (!$uploadInfo) return $this->error('upload_error');
$errorVal = $this->checkUpload($uploadInfo['error']);
if ($errorVal !== true) return $this->error($errorVal);
if (!$this->checkIsUploadFile($uploadInfo['tmp_name'])) return $this->error('not_upload_files');
if (!$this->checkType($uploadInfo['ext'])) return $this->error('not_an_allowed_type');
if (!$this->checkSize($uploadInfo['size'])) return $this->error('file_size_is_large');
if (!$this->checkNewName($newName)) return $this->error('illegal_file_type');
$result = $this->save($uploadInfo['tmp_name'],$uploadInfo['source'],$uploadInfo['path']);
if ($result == false) {
return $this->error('upload_error');
}else {
$checkContentResult = $this->checkContent($uploadInfo);
if ($checkContentResult !== true) return $this->error($checkContentResult);
return $uploadInfo;
}
}
public function setParams($params) {
$this->params = $this->parseParams($params);
}
private function init($name,$newName,$path) {
$newName = $this->escapeStr($newName);
$path    = $this->escapeDir($path);
$file    = $_FILES[$name];
if (!$file['tmp_name'] ||$file['tmp_name'] == '') return false;
$file['name']     = $this->escapeStr($file['name']);
$file['ext']      = strtolower(substr(strrchr($file['name'],'.'),1));
$file['size']     = intval($file['size']);
$file['type']     = $file['type'];
$file['tmp_name'] = $file['tmp_name'];
$file['source']   = $path .'/'.$newName .'.'.$file['ext'];
$file['path']     = $path;
$file['newName']  = $newName.'.'.$file['ext'];
return $file;
}
private function parseParams(array $params) {
$temp = array();
$temp['maxSize']       = (isset($params['maxSize'])) ?(int)$params['maxSize'] : $this->defaultMaxSize;
$temp['allowFileType'] = (is_array($params['allowFileType'])) ?$params['allowFileType'] : $this->defaultAllowFileType;
return $temp;
}
private function save($tmpName,$filename,$path) {
$filename = BASE_ROOT.$filename;
X::loadUtil('file');
XFile::createDir($path);
if (function_exists("move_uploaded_file") &&@move_uploaded_file($tmpName,$filename)) {
@chmod($filename,0777);
return true;
}elseif (@copy($tmpName,$filename)) {
@chmod($filename,0777);
return true;
}
return false;
}
private function checkUpload($error) {
if ($error == uploadClass::UPLOAD_ERR_INI_SIZE) {
return 'upload_err_ini_size';
}elseif ($error == uploadClass::INPUT_MAX_FILE_SIZE) {
return 'input_max_file_size';
}elseif ($error == uploadClass::UPLOAD_HALF) {
return 'upload_half';
}elseif ($error == uploadClass::UPLOAD_ERR_NO_TMP_DIR) {
return 'upload_err_no_tmp_dir';
}else {
return true;
}
}
private function checkType($uploadType) {
if (!in_array(strtolower($uploadType),$this->params['allowFileType']) ||in_array(strtolower($uploadType),$this->defaultForbidType)){
return false;
}
else {
return true;
}
}
private function checkSize($uploadSize) {
return ($uploadSize <1 ||$uploadSize >($this->params['maxSize'] * 1024)) ?false : true;
}
private function checkNewName($newName) {
$newName = strtolower($newName);
return (strpos($newName,'..') !== false ||strpos($newName,'.php.') !== false) ?false : true;
}
private function checkIsUploadFile($tmpName) {
if (!$tmpName ||$tmpName == 'none') {
return false;
}elseif (function_exists('is_uploaded_file') &&!is_uploaded_file($tmpName) &&!is_uploaded_file(str_replace('\\\\','\\',$tmpName))) {
return false;
}else {
return true;
}
}
public function checkContent($uploadInfo) {
$file_content = $this->readover(BASE_ROOT.$uploadInfo['source']);
if (empty($file_content)) {
@unlink(BASE_ROOT.$uploadInfo['source']);
return 'upload_content_error';
}
else {
$forbid_chars = array(
'0'=>"?php",
'1'=>"cmd.exe",
'2'=>"mysql_connect",
'3'=>"phpinfo()",
'4'=>"get_current_user",
'5'=>"zend",
'6'=>"submit",
'7'=>"post",
'8'=>"eval",
'9'=>"_GET",
'10'=>"_POST",
'11'=>"_REQUEST",
'12'=>"base64_decode",
'13'=>"echo",
);
foreach ($forbid_chars as $key=>$value) {
if (stripos($file_content,$value)) {
@unlink(BASE_ROOT.$uploadInfo['source']);
return 'upload_content_error';
break;
}
}
}
if (in_array(strtolower($uploadInfo['ext']),array('gif','jpg','jpeg','png'))) {
if (!$this->getFileSize($uploadInfo['source'])) {
@unlink(BASE_ROOT.$uploadInfo['source']);
return 'input_max_file_size';
}
}
return true;
}
private function getFileSize($file) {
if (empty($file)) {
return false;
}
else {
if (!file_exists(BASE_ROOT.$file)) {
return false;
}
else {
if (filesize(BASE_ROOT.$file)>$this->params['maxSize']){
return false;
}
else{
return true;
}
}
}
}
private static function createFolder($path) {
if (!is_dir($path)) {
uploadClass::createFolder(dirname($path));
@mkdir($path);
@chmod($path,0777);
@fclose(@fopen($path .'/index.html','w'));
@chmod($path .'/index.html',0777);
}
}
private function readover($fileName,$method = 'rb') {
$data = '';
if ($handle = @fopen($fileName,$method)) {
flock($handle,LOCK_SH);
$data = @fread($handle,filesize($fileName));
fclose($handle);
}
return $data;
}
private function getImgSize($srcFile,$srcExt = null) {
empty($srcExt) &&$srcExt = strtolower(substr(strrchr($srcFile,'.'),1));
$srcdata = array();
if (function_exists('read_exif_data') &&in_array($srcExt,array(
'jpg',
'jpeg',
'jpe',
'jfif'
))) {
$datatemp = @read_exif_data($srcFile);
$srcdata['width'] = $datatemp['COMPUTED']['Width'];
$srcdata['height'] = $datatemp['COMPUTED']['Height'];
$srcdata['type'] = 2;
unset($datatemp);
}
!$srcdata['width'] &&list($srcdata['width'],$srcdata['height'],$srcdata['type']) = @getimagesize($srcFile);
if (!$srcdata['type'] ||($srcdata['type'] == 1 &&in_array($srcExt,array(
'jpg',
'jpeg',
'jpe',
'jfif'
)))) {
return false;
}
return $srcdata;
}
private function escapeStr($string) {
$string = str_replace(array("\0","%00","\r"),'',$string);
$string = preg_replace(array('/[\\x00-\\x08\\x0B\\x0C\\x0E-\\x1F]/','/&(?!(#[0-9]+|[a-z]+);)/is'),array('','&amp;'),$string);
$string = str_replace(array("%3C",'<'),'&lt;',$string);
$string = str_replace(array("%3E",'>'),'&gt;',$string);
$string = str_replace(array('"',"'","\t",'  '),array('&quot;','&#39;','    ','&nbsp;&nbsp;'),$string);
return $string;
}
private function escapeDir($dir) {
$dir = str_replace(array("'",'#','=','`','$','%','&',';'),'',$dir);
return trim(preg_replace('/(\/){2,}|(\\\){1,}/','/',$dir),'/');
}
private function escapePath($fileName,$ifCheck = true) {
$tmpname = strtolower($fileName);
$tmparray = array('://',"\0");
$ifCheck &&$tmparray[] = '..';
if (str_replace($tmparray,'',$tmpname) != $tmpname) {
return false;
}
return true;
}
private function error($errorCode) {
return $this->errorCodeArr[$errorCode];
}
public function noteError($type) {
echo "<meta http-equiv='Content-Type' content='text/html; charset=".OESOFT_CHARTSET."' /><style>body{margin:0px;font-size:12px;}</style>";
if ($type == '-1') {
echo "上传失败";
}
elseif ($type == '-2') {
echo "不是通过HTTP POST方法上传";
}
elseif ($type == '-3') {
echo "图片/附件类型有错";
}
elseif ($type == '-4') {
echo "文件超过允许上传的大小";
}
elseif ($type == '-5') {
echo "上传文件超过服务器上传限制";
}
elseif ($type == '-6') {
echo "上传文件超过表达最大上传限制";
}
elseif ($type == '-7') {
echo "图片/附件只上传了一半";
}
elseif ($type == '-8') {
echo "图片/附件上传的临时目录出错";
}
elseif ($type == '-9') {
echo "图片/附件新的文件名命名不合法";
}
else {
echo "上传的内容不合法";
}
die();
}
}
?>