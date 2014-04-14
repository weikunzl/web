<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class diaryIModel extends X {
private function _buildSql() {
$sql = "SELECT v.*,c.catname, c.target, c.metatitle, c.metakeyword, c.metadescription,".
" u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."diary AS v".
" LEFT JOIN ".DB_PREFIX."diary_category AS c ON v.catid=c.catid".
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
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."diary_comment AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.cmuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.cmuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.cmuserid=p.userid";
return $sql;
}
private function _buildVolistCommentSql() {
$sql = "SELECT v.commentid, v.diaryid, v.cmuserid, v.content,".
" v.timeline, d.title,".
" u.username, u.gender, u.groupid, u.avatar, u.avatarflag,".
" s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star,".
" vip.vipenddate,".
" p.provinceid, p.cityid, p.distid, p.ageyear, p.astro, p.lunar,".
" p.marrystatus, p.education, p.height, p.salary, p.monolog, p.molstatus".
" FROM ".DB_PREFIX."diary_comment AS v".
" LEFT JOIN ".DB_PREFIX."diary AS d ON v.diaryid=d.diaryid".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.cmuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.cmuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.cmuserid=p.userid";
return $sql;
}
private function _buildCategorySql() {
$sql = "SELECT v.* FROM ".DB_PREFIX."diary_category AS v";
return $sql;
}
public function getList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.diaryid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['diarypagesize']) : intval($items['pagesize']);
$where      = " WHERE v.flag='1'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."diary AS v".
" LEFT JOIN ".DB_PREFIX."diary_category AS c ON v.catid=c.catid".
$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildSql().$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data,'userid'));
}
public function getCommentList($items) {
$orderby    = empty($items['orderby']) ?' ORDER BY v.commentid DESC': $items['orderby'];
$pagesize   = empty($items['pagesize']) ?intval(parent::$cfg['commentpagesize']) : intval($items['pagesize']);
$where      = " WHERE v.flag='1'".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."diary_comment AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = $this->_buildCommentSql().$where.$orderby." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
return array($total,$this->_handleList($data,'cmuserid'));
}
public function volistAll($where='',$orderby='',$num=0) {
$sql = $this->_buildSql()." WHERE v.flag='1'";
if (!empty($where)) {
$sql .= ' AND '.$where;
}
if (!empty($orderby)) {
$sql .= ' ORDER BY '.$orderby;
}
else {
$sql .= ' ORDER BY v.diaryid DESC';
}
$num = intval($num)<1 ?intval(parent::$cfg['diarynum']) : intval($num);
$sql .= " LIMIT {$num}";
$data = parent::$obj->getall($sql);
return $this->_handleList($data,'userid');
}
public function volistComment($where='',$orderby='',$num=0) {
$sql = $this->_buildVolistCommentSql()." WHERE v.flag='1'";
if (!empty($where)) {
$sql .= " AND ".$where;
}
if (!empty($orderby)) {
$sql .= " ORDER BY ".$orderby;
}
else {
$sql .= " ORDER BY v.commentid DESC";
}
$num = intval($num)<1 ?intval(parent::$cfg['diarycommentnum']) : intval($num);
$sql .= " LIMIT ".$num."";
$data = parent::$obj->getall($sql);
return $this->_handleList($data,'cmuserid');
}
public function volistCategory($where='',$orderby='',$num=0) {
$sql = $this->_buildCategorySql()." WHERE v.flag='1'";
if (!empty($where)) {
$sql .= " AND ".$where;
}
if (!empty($orderby)) {
$sql .= " ORDER BY ".$orderby;
}
else {
$sql .= " ORDER BY v.orders ASC";
}
$num = intval($num);
if ($num >0) {
$sql .= " LIMIT ".$num."";
}
$data = parent::$obj->getall($sql);
return $this->_handleCategory($data);
}
public function getOneData($id) {
$data = array();
$sql = $this->_buildSql().
" WHERE v.diaryid='{$id}'";
$data = parent::$obj->fetch_first($sql);
return $this->_handleData($data,'userid');
}
public function getOneCat($id) {
$sql = "SELECT `catname`, `metatitle`, `metakeyword`, `metadescription`,".
" `img`, `cssname`, `target`".
" FROM ".DB_PREFIX."diary_category".
" WHERE `catid`='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
parent::loadLib('url');
$data['url'] = XUrl::getListUrl('diary','cid='.$data['catid']);
}
return $data;
}
public function getPrevious($id) {
$sql = "SELECT `diaryid`, `title`".
" FROM ".DB_PREFIX."diary".
" WHERE `diaryid`<{$id} AND `flag`='1'".
" ORDER BY `diaryid` DESC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadLib('url');
$rows['url'] = XUrl::getContentUrl('diary',$rows['diaryid']);
return $rows;
}
else {
return NULL;
}
unset($rows);
}
public function getNext($id) {
$sql = "SELECT `diaryid`, `title`".
" FROM ".DB_PREFIX."diary".
" WHERE `diaryid`>{$id} AND `flag`='1'".
" ORDER BY `diaryid` ASC LIMIT 1";
$rows = parent::$obj->fetch_first($sql);
if (!empty($rows)) {
parent::loadLib('url');
$rows['url'] = XUrl::getContentUrl('diary',$rows['diaryid']);
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
if (!empty($value['catid'])) {
$data[$key]['caturl'] = XUrl::getCategoryUrl('diary',$value['catid']);
}
$data[$key]['url'] = XUrl::getContentUrl('diary',$value['diaryid']);
if (isset($value['thumbfiles'])) {
if (empty($value['thumbfiles'])) {
$data[$key]['thumbfiles'] = parent::$urlpath.'tpl/static/images/nopic_s.jpg';
}
else {
if (substr($value['thumbfiles'],0,15) == 'data/attachment') {
$data[$key]['thumbfiles'] = parent::$urlpath.$value['thumbfiles'];
}
}
}
if (isset($value['uploadfiles'])) {
if (empty($value['uploadfiles'])) {
$data[$key]['uploadfiles'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($value['uploadfiles'],0,15) == 'data/attachment') {
$data[$key]['uploadfiles'] = parent::$urlpath.$value['uploadfiles'];
}
}
}
$data[$key]['sort_title'] = XHandle::cutStrLen($value['title'],parent::$cfg['diarylen']);
$data[$key]['age'] = XMod::getAge($value['ageyear']);
$data[$key]['homeurl'] = XUrl::getHomeUrl($value[$uidname]);
$data[$key]['useravatar'] = XUser::getAvatar($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['avatarurl'] = XUser::getAvatarUrl($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['levelimg'] = XUser::getIdentify($value['gender'],$value['groupid'],$value['vipenddate']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
}
return $data;
}
private function _handleData($data,$uidname='userid') {
if (!empty($data)) {
parent::loadLib(array('url','mod','user'));
if (!empty($data['catid'])) {
$data['caturl'] = XUrl::getCategoryUrl('diary',$data['catid']);
}
$data['url'] = XUrl::getContentUrl('diary',$data['diaryid']);
if (isset($data['thumbfiles'])) {
if (empty($data['thumbfiles'])) {
$data['thumbfiles'] = parent::$urlpath.'tpl/static/images/nopic_s.jpg';
}
else {
if (substr($data['thumbfiles'],0,15) == 'data/attachment') {
$data['thumbfiles'] = parent::$urlpath.$data['thumbfiles'];
}
}
}
if (isset($data['uploadfiles'])) {
if (empty($data['uploadfiles'])) {
$data['uploadfiles'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($data['uploadfiles'],0,15) == 'data/attachment') {
$data['uploadfiles'] = parent::$urlpath.$data['uploadfiles'];
}
}
}
$data['sort_title'] = XHandle::cutStrLen($data['title'],parent::$cfg['diarylen']);
$data['age'] = XMod::getAge($data['ageyear']);
$data['homeurl'] = XUrl::getHomeUrl($data[$uidname]);
$data['useravatar'] = XUser::getAvatar($data['gender'],$data['avatar'],$data['avatarflag']);
$data['avatarurl'] = XUser::getAvatarUrl($data['gender'],$data['avatar'],$data['avatarflag']);
$data['levelimg'] = XUser::getIdentify($data['gender'],$data['groupid'],$data['vipenddate']);
}
return $data;
}
private function _handleCategory($data) {
$i = 1;
parent::loadLib('url');
if (!empty($data)) {
foreach ($data as $key=>$value) {
if (empty($value['img'])) {
$data[$key]['img'] = parent::$urlpath.'tpl/static/images/nopic.jpg';
}
else {
if (substr($value['img'],0,15) == 'data/attachment') {
$data[$key]['img'] = parent::$urlpath.$value['img'];
}
}
$data[$key]['url'] = XUrl::getCategoryUrl('diary',$value['catid']);
$data[$key]['i'] = $i;
$i++;
}
}
return $data;
}
public function doSaveComment($id,$content) {
$response = 0;
if (parent::$cfg['auditcomment'] == 1) {
$flag = 0;
}
else {
$flag = 1;
}
$commentid = parent::$obj->fetch_newid("SELECT MAX(commentid) FROM ".DB_PREFIX."diary_comment",1);
$array = array(
'commentid'=>$commentid,
'diaryid'=>$id,
'cmuserid'=>parent::$wrap_user['userid'],
'content'=>$content,
'timeline'=>time(),
'flag'=>$flag,
);
$result = parent::$obj->insert(DB_PREFIX.'diary_comment',$array);
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
return $response;
}
public function updateHits($id) {
$hits = 0;
$sql = "SELECT `hits` FROM ".DB_PREFIX."diary WHERE `diaryid`='{$id}'";
$data = parent::$obj->fetch_first($sql);
if (!empty($data)) {
$hits = (intval($data['hits'])+1);
parent::$obj->update(DB_PREFIX.'diary',array('hits'=>$hits),"`diaryid`='{$id}'");
}
unset($data);
return $hits;
}
}
?>