<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class weiboIModel extends X {
private function _buildUserSql() {
$sql = "SELECT u.userid, u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."user AS u".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON u.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON u.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON u.userid=p.userid";
return $sql;
}
private function _buildSql() {
$sql = "SELECT v.*,".
" u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."weibo AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.userid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid";
return $sql;
}
private function _buildCommentSql() {
$sql = "SELECT v.*,".
" u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary".
" FROM ".DB_PREFIX."weibo_comment AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.cmuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.cmuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.cmuserid=p.userid";
return $sql;
}
public function getList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.wbid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['weibopagesize']) : intval($items['pagesize']);
$where      = " WHERE v.flag='1'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."weibo AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildSql().$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data,'userid'));
}
public function listenUsers() {
$strusers = null;
$sql = "SELECT `fuserid` FROM ".DB_PREFIX."friend".
" WHERE userid='".parent::$wrap_user['userid']."' AND `black`='0' ";
$data = parent::$obj->getall($sql);
if (!empty($data)) {
$i = 0;
foreach ($data as $key=>$value) {
if ($i == 0) {
$fuhao = '';
}
else {
$fuhao = ',';
}
$strusers .= $fuhao.$value['fuserid'];
$i++;
}
}
unset($data);
return $strusers;
}
public function getCommentList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.cmid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['commentpagesize']) : intval($items['pagesize']);
$where      = " WHERE v.cmflag='1' AND v.rootid='0'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."weibo_comment AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildCommentSql().$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$data[$key]['childcomment'] = $this->getChildComment($value['wbid'],$value['cmid'],$childnum);
}
return array($total,$this->_handleList($data,'cmuserid'));
}
public function volistAll($where='',$orderby='',$num=0) {
$sql = $this->_buildSql()." WHERE v.flag='1'";
if (!empty($where)) {
$sql .= " AND ".$where;
}
if (!empty($orderby)) {
$sql .= " ".$orderby;
}
else {
$sql .= " ORDER BY v.wbid DESC";
}
$num = intval($num)<1 ?intval(parent::$cfg['weibonum']) : intval($num);
$sql .= " LIMIT ".$num."";
$data = parent::$obj->getall($sql);
return $this->_handleList($data,'userid');
}
public function volistAllComment($where='',$orderby='',$num=0) {
$sql = $this->_buildCommentSql()." WHERE v.cmflag='1'";
if (!empty($where)) {
$sql .= " AND ".$where;
}
if (!empty($orderby)) {
$sql .= " ".$orderby;
}
else {
$sql .= " ORDER BY v.cmid DESC";
}
$num = intval($num)<1 ?intval(parent::$cfg['weibocommentnum']) : intval($num);
$sql .= " LIMIT ".$num."";
$data = parent::$obj->getall($sql);
return $this->_handleList($data,'cmuserid');
}
public function volistComment($where='',$orderby='',$num=0,$childnum=0) {
$sql = $this->_buildCommentSql()." WHERE v.cmflag='1' AND v.rootid='0'";
$sql .= !empty($where) ?' AND '.$where : '';
$sql .= !empty($orderby) ?' '.$orderby : ' ORDER BY v.cmid DESC';
if ($num >0) {
$sql .= " LIMIT {$num}";
}
$data = parent::$obj->getall($sql);
foreach ($data as $key=>$value) {
$data[$key]['childcomment'] = $this->getChildComment($value['wbid'],$value['cmid'],$childnum);
}
return $this->_handleList($data,'cmuserid');
}
public function getChildComment($wbid,$rootid,$num=0) {
$sql = $this->_buildCommentSql()." WHERE v.wbid='{$wbid}' AND v.cmflag='1' AND v.rootid='{$rootid}'";
$sql .= " ORDER BY v.cmid DESC";
if ($num >0) {
$sql .= " LIMIT {$num}";
}
$data = parent::$obj->getall($sql);
return $this->_handleList($data,'cmuserid');
}
public function getOneData($id) {
$data = array();
$sql = $this->_buildSql().
" WHERE v.wbid='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$data['weibocount'] = $this->getUserWeiboCount($data['userid']);
}
else {
$data['weibocount'] = 0;
}
return $this->_handleData($data,'userid');
}
public function getPrevious($id) {
$sql = "SELECT `wbid`".
" FROM ".DB_PREFIX."weibo".
" WHERE `wbid`<{$id} AND `flag`='1'".
" ORDER BY `wbid` DESC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadLib('url');
$rows['url'] = XUrl::getContentUrl('weibo',$rows['wbid']);
return $rows;
}
else {
return NULL;
}
unset($rows);
}
public function getNext($id) {
$sql = "SELECT `wbid`".
" FROM ".DB_PREFIX."weibo".
" WHERE `wbid`>{$id} AND `flag`='1'".
" ORDER BY `wbid` ASC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadLib('url');
$rows['url'] = XUrl::getContentUrl('weibo',$rows['wbid']);
return $rows;
}
else {
return NULL;
}
unset($rows);
}
private function _handleList($data,$uidname='userid') {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
$i = 1;
foreach($data as $key=>$value) {
$data[$key]['age'] = XMod::getAge($value['ageyear']);
$data[$key]['homeurl'] = XUrl::getHomeUrl($value[$uidname]);
$data[$key]['useravatar'] = XUser::getAvatar($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['avatarurl'] = XUser::getAvatarUrl($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['levelimg'] = XUser::getIdentify($value['gender'],$value['groupid'],$value['vipenddate']);
$data[$key]['commentcount'] = $this->_getCommentCount($value['wbid']);
$data[$key]['content'] = XHandle::repEmface($value['content']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
}
return $data;
}
private function _handleData($data,$uidname='userid') {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
$data['url'] = XUrl::getContentUrl('diary',$data['diaryid']);
$data['age'] = XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data[$uidname]);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
$data['commentcount'] = $this->_getCommentCount($data['wbid']);
}
return $data;
}
private function _getCommentCount($id) {
$sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."weibo_comment".
" WHERE `wbid`='{$id}' AND `cmflag`='1'";
return parent::$obj->fetch_count($sql);
}
public function getUserInfo($id) {
$sql = $this->_buildUserSql()." WHERE u.userid='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
parent::loadLib(array('mod','user','url'));
$data['age'] = XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data['userid']);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
$data['weibocount'] = $this->getUserWeiboCount($data['userid']);
}
return $data;
}
public function getUserWeiboCount($uid) {
$count_sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."weibo WHERE `userid`='{$uid}' AND `flag`='1'";
return parent::$obj->fetch_count($count_sql);
}
public function doSaveWeibo($content) {
$response = 0;
if (parent::$cfg['auditweibo'] == 1) {
$flag = 0;
}
else {
$flag = 1;
}
$wbid = parent::$obj->fetch_newid("SELECT MAX(wbid) FROM ".DB_PREFIX."weibo",1);
$array = array(
'wbid'=>$wbid,
'userid'=>parent::$wrap_user['userid'],
'content'=>$content,
'addtime'=>time(),
'wbtype'=>'weibo',
'flag'=>$flag,
);
$result = parent::$obj->insert(DB_PREFIX.'weibo',$array);
if (true === $result) {
if ($flag == 0) {
$response = 2;
}
else {
$response = 1;
}
}
else {
$response = 3;
}
unset($array);
return $response;
}
public function doSaveComment($wbid,$comid,$content) {
$rootid = 0;
if ($comid >0) {
$com_sql = "SELECT `rootid`, `cmuserid` FROM ".DB_PREFIX."weibo_comment".
" WHERE `cmid`='{$comid}'";
$com_data = parent::$obj->fetch_first($com_sql);
if (!empty($com_data)) {
if ($com_data['rootid'] >0) {
$rootid = $com_data['rootid'];
}
else {
$rootid = $comid;
}
$touser = $this->_getUserName($com_data['cmuserid']);
$content = '@'.$touser.'：'.$content;
}
unset($com_data);
}
$response = 0;
if (parent::$cfg['auditweibo'] == 1) {
$flag = 0;
}
else {
$flag = 1;
}
$cmid = parent::$obj->fetch_newid("SELECT MAX(cmid) FROM ".DB_PREFIX."weibo_comment",1);
$array = array(
'cmid'=>$cmid,
'wbid'=>$wbid,
'rootid'=>$rootid,
'cmuserid'=>parent::$wrap_user['userid'],
'cmcontent'=>$content,
'cmtime'=>time(),
'cmflag'=>$flag,
);
$result = parent::$obj->insert(DB_PREFIX.'weibo_comment',$array);
if (true === $result) {
if ($flag == 0) {
$response = 2;
}
else {
$response = 1;
}
}
else {
$response = 3;
}
unset($array);
return $response;
}
private function _getUserName($uid) {
$sql = "SELECT `username` FROM ".DB_PREFIX."user WHERE `userid`='{$uid}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
return $data['username'];
}
else {
return '';
}
unset($data);
}
}
?>