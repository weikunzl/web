<?php

if(!defined('INSTALL_OESOFT')) {
exit('Access Denied');
}
class curlClass {
public function get($url) {
if (!$url) return false;
$ssl = substr($url,0,8) == 'https://'?true : false;
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
if ($ssl) {
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,1);
}
if (ini_get('safe_mode') ||ini_get('open_basedir')) {
$this->curl_redir_exec($curl);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$content = curl_exec($curl);
}
else {
@curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$content = curl_exec($curl);
}
$status = curl_getinfo($curl);
curl_close($curl);
if (intval($status['http_code']) == 200) {
if (ini_get('safe_mode') ||ini_get('open_basedir')) {
if (strpos($content,'charset=utf-8')) {
$astring = explode('charset=utf-8',$content);
$content = trim($astring[1]);
}
return $content;
}
else {
return $content;
}
}
else {
return 'fail';
}
}
public function post($url,$data,$proxy = null,$timeout = 10) {
if (!$url) return false;
$ssl = substr($url,0,8) == 'https://'?true : false;
$curl = curl_init();
if (!is_null($proxy)) curl_setopt ($curl,CURLOPT_PROXY,$proxy);
curl_setopt($curl,CURLOPT_URL,$url);
if ($ssl) {
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,1);
}
curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
@curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
$content = curl_exec($curl);
$status = curl_getinfo($curl);
curl_close($curl);
if (intval($status['http_code']) == 200) {
return $content;
}
else {
return 'fail';
}
}
public function put($url,$data,$proxy = null,$timeout = 10) {
if (!$url) return false;
$ssl = substr($url,0,8) == 'https://'?true : false;
$curl = curl_init();
if (!is_null($proxy)) curl_setopt ($curl,CURLOPT_PROXY,$proxy);
curl_setopt($curl,CURLOPT_URL,$url);
if ($ssl) {
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,1);
}
curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
$data = (is_array($data)) ?http_build_query($data) : $data;
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'PUT');
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Length: '.strlen($data)));
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
$content = curl_exec($curl);
$status = curl_getinfo($curl);
curl_close($curl);
if (intval($status['http_code']) == 200) {
return $content;
}
else {
return 'fail';
}
}
public function del($url,$data,$proxy = null,$timeout = 10) {
if (!$url) return false;
$ssl = substr($url,0,8) == 'https://'?true : false;
$curl = curl_init();
if (!is_null($proxy)) curl_setopt ($curl,CURLOPT_PROXY,$proxy);
curl_setopt($curl,CURLOPT_URL,$url);
if ($ssl) {
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,1);
}
curl_setopt($curl,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
$data = (is_array($data)) ?http_build_query($data) : $data;
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'DEL');
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Length: '.strlen($data)));
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
$content = curl_exec($curl);
$status = curl_getinfo($curl);
curl_close($curl);
if (intval($status['http_code']) == 200) {
return $content;
}
else {
return 'fail';
}
}
private function curl_redir_exec($ch) {
static $curl_loops = 0;
static $curl_max_loops = 20;
if ($curl_loops++>= $curl_max_loops)
{
$curl_loops = 0;
return FALSE;
}
curl_setopt($ch,CURLOPT_HEADER,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$data = curl_exec($ch);
list($header,$data) = explode("\n\n",$data,2);
$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
if ($http_code == 301 ||$http_code == 302)
{
$matches = array();
preg_match('/Location:(.*?)\n/',$header,$matches);
$url = @parse_url(trim(array_pop($matches)));
if (!$url)
{
$curl_loops = 0;
return $data;
}
$last_url = parse_url(curl_getinfo($ch,CURLINFO_EFFECTIVE_URL));
if (!$url['scheme'])
$url['scheme'] = $last_url['scheme'];
if (!$url['host'])
$url['host'] = $last_url['host'];
if (!$url['path'])
$url['path'] = $last_url['path'];
$new_url = $url['scheme'] .'://'.$url['host'] .$url['path'] .($url['query']?'?'.$url['query']:'');
curl_setopt($ch,CURLOPT_URL,$new_url);
return $this->curl_redir_exec($ch);
}else {
$curl_loops=0;
return $data;
}
}
}?>