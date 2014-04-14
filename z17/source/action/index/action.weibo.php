<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class weiboIAction extends indexbase {
private $service = null;
private $_tplfile = null;
private $type = null;
private $uid = null;
private $id = null;
private $_urlitem = null;
private function _new() {
$this->service = parent::service('weibo','is');
}
private function _unset() {
unset($this->service);
}
private function _getListItems() {
$this->_new();
$this->type = $this->service->validType();
$this->uid = $this->service->validUid();
$this->_unset();
if (!empty($this->type)) {
$this->_urlitem .= "&type=".$this->type;
}
if ($this->uid>0) {
$this->_urlitem .= "&uid=".$this->uid;
}
if (parent::$cfg['weibomaxpage']>0) {
$this->page = $this->page >parent::$cfg['weibomaxpage'] ?intval(parent::$cfg['weibomaxpage']) : $this->page;
}
$this->pagesize = intval(parent::$cfg['weibopagesize']);
$this->_tplfile = $this->getTPLFile('weibo_list');
}
private function _getDetailItems() {
$this->_new();
$this->id = $this->service->validID();
$this->_unset();
$this->pagesize = intval(parent::$cfg['commentpagesize']);
$this->_tplfile = $this->getTPLFile('weibo_detail');
}
public function action_run() {
$this->getMeta('ch_weibo_index');
$var_array = array(
'page_title'=>$this->metawrap['title'],
'page_description'=>$this->metawrap['description'],
'page_keyword'=>$this->metawrap['keyword'],
);
$this->_tplfile = $this->getTPLFile('weibo_index');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
public function action_list() {
$this->_getListItems();
$model = parent::model('weibo','im');
$searchsql = '';
if ($this->type == 'listen') {
$this->checkLogin();
$users = $model->listenUsers();
$searchsql .= " AND v.userid IN ({$users}) ";
}
elseif ($this->type == 'my') {
$this->checkLogin();
$searchsql .= " AND v.userid='".parent::$wrap_user['userid']."'";
}
elseif ($this->type == 'user') {
if ($this->uid <1) {
XHandle::halt('对不起，会员ID错误！','',1);
}
$searchsql .= " AND v.userid='{$this->uid}'";
}
else {
}
$orderby = ' ORDER BY v.wbid DESC';
$where_args = array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
'orderby'=>$orderby,
);
if ($this->type == 'listen') {
$where_args['type'] = 'listen';
}
list($total,$data) = $model->getList($where_args);
if ($this->uid >0) {
$user = $model->getUserInfo($this->uid);
}
else {
$user = array();
}
parent::loadLib('url');
$url = XUrl::getListUrl('weibo',$this->_urlitem);
$showpage = XPage::index($total,$this->pagesize,$this->page,$url,10,intval(parent::$cfg['weibomaxpage']));
if ($this->type == 'listen') {
$this->getMeta('ch_weibo_listen');
}
elseif ($this->type == 'my') {
$this->getMeta('ch_weibo_my');
}
elseif ($this->type == 'user') {
$this->getMeta('ch_weibo_user');
}
else {
$this->getMeta('ch_weibo_list');
}
$page_title = $this->metawrap['title'];
$page_keyword = $this->metawrap['keyword'];
$page_description = $this->metawrap['description'];
if ($this->type == 'user'&&!empty($user)) {
$page_title = str_ireplace(
array('{u.username}'),
array($user['username']),
$page_title
);
$page_keyword = str_ireplace(
array('{u.username}'),
array($user['username']),
$page_keyword
);
$page_description = str_ireplace(
array('{u.username}'),
array($user['username']),
$page_description
);
}
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>$showpage,
'urlitem'=>$this->_urlitem,
'weibo'=>$data,
'user'=>$user,
'type'=>$this->type,
'page_title'=>$page_title,
'page_keyword'=>$page_keyword,
'page_description'=>$page_description,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
public function action_detail() {
$this->_getDetailItems();
$model = parent::model('weibo','im');
$data = $model->getOneData($this->id);
if (empty($data)) {
XHandle::halt('对不起，读取信息不存在或者已删除！',$this->appfile,0);
}
$previous_data = $model->getPrevious($this->id);
if (!empty($previous_data)) {
$previous_item = "<a href='".$previous_data['url']."'>上一条微博</a>";
}
else {
$previous_item = '没有了';
}
unset($previous_data);
$next_data = $model->getNext($this->id);
if (!empty($next_data)) {
$next_item = "<a href='".$next_data['url']."'>下一条微博</a>";
}
else {
$next_item = '没有了';
}
unset($next_data);
$searchsql = " AND v.wbid='{$this->id}'";
$orderby = ' ORDER BY v.cmid DESC';
$model = parent::model('weibo','im');
list($total,$comment) = $model->getCommentList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
'orderby'=>$orderby,
)
);
parent::loadLib('url');
$url = XUrl::getCommentUrl('weibo',$this->id);
$showpage = XPage::index($total,$this->pagesize,$this->page,$url,10);
$this->getMeta('ch_weibo_detail');
$page_title = $this->metawrap['title'];
$page_description = $this->metawrap['description'];
$page_keyword = $this->metawrap['keyword'];
$page_title = str_ireplace(
array('{u.username}'),
array($data['username']),
$page_title
);
$page_keyword = str_ireplace(
array('{u.username}'),
array($data['username']),
$page_keyword
);
$page_description = str_ireplace(
array('{u.username}'),
array($data['username']),
$page_description
);
$var_array = array(
'weibo'=>$data,
'comment'=>$comment,
'page_title'=>$page_title,
'page_keyword'=>$page_keyword,
'page_description'=>$page_description,
'id'=>$this->id,
'total'=>$total,
'showpage'=>$showpage,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
?>