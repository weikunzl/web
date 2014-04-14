<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class adsIModel extends X {
public function getZone($idmark) {
if (true === XValid::isSpChar($idmark)) {
$zone_data = array();
$ads_data = array();
$zone_query = "SELECT `zoneid`,`sort`,`zonewidth`,`zoneheight`".
" FROM ".DB_PREFIX."zone".
" WHERE `idmark`='$idmark' AND `flag`='1' AND `templet`='".parent::$cfg['templet']."'";
$zone_rows	= parent::$obj->fetch_first($zone_query);
if (!empty($zone_rows)) {
$zone_data = array(
'zonewidth'=>$zone_rows['zonewidth'],
'zoneheight'=>$zone_rows['zoneheight'],
'zonetype'=>$zone_rows['sort'],
);
$ads_query = "SELECT *".
" FROM ".DB_PREFIX."myads".
" WHERE `zoneid`='".$zone_rows['zoneid']."' AND `flag`='1'".
" ORDER BY `orders` ASC";
$ads	   = parent::$obj->getall($ads_query);
$i = 1;
foreach ($ads as $key=>$value) {
$info = XHandle::dounSerialize($value['normbody']);
$ads[$key]['i'] = $i;
$ads[$key]['type'] = $info['tpye'];
$ads[$key]['title'] = $info['title'];
if (substr($info['uploadfiles'],0,15) == 'data/attachment') {
$ads[$key]['uploadfiles'] = parent::$urlpath.$info['uploadfiles'];
}
else {
$ads[$key]['uploadfiles'] = $info['uploadfiles'];
}
$ads[$key]['width'] = $info['width'];
$ads[$key]['height'] = $info['height'];
$ads[$key]['url'] = $value['url'];
if ($value['target'] == 1) {
$ads[$key]['target'] = 'self';
}
else {
$ads[$key]['target'] = '_blank';
}
$i = ($i+1);
}
$zone_data['ads'] = $ads;
}
return $zone_data;
}
else {
return NULL;
}
}
public function getAds($idmark) {
if (true == XValid::isSpChar($idmark)) {
$query = "SELECT v.target,v.url,v.normbody,z.sort,z.zonewidth,z.zoneheight".
" FROM ".DB_PREFIX."myads AS v".
" LEFT JOIN ".DB_PREFIX."zone AS z ON v.zoneid=z.zoneid".
" WHERE v.flag='1' AND v.tagname='{$idmark}' AND v.templet='".parent::$cfg['templet']."'";
$data = parent::$obj->fetch_first($query);
if (!empty($data)) {
$info = XHandle::dounSerialize($data['normbody']);
$data['title'] = $info['title'];
$data['type'] = $info['type'];
$data['width'] = $info['width'];
$data['height'] = $info['height'];
if (substr($info['uploadfiles'],0,15) == 'data/attachment') {
$data['uploadfiles'] = parent::$urlpath.$info['uploadfiles'];
}
else {
$data['uploadfiles'] = $info['uploadfiles'];
}
if ($data['target'] == 1) {
$data['target'] = '_self';
}
else {
$data['target'] = '_blank';
}
return $data;
}
else {
return NULL;
}
}
else {
return NULL;
}
}
}
?>