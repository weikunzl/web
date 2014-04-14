<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class onlineIAction extends indexbase {
private $service = null;
private $_tplfile = null;
private $type = null;
private $s_uid = 0;
private $s_username = null;
private $s_sex = 0;
private $s_sage = 0;
private $s_eage = 0;
private $s_dist1 = 0;
private $s_dist2 = 0;
private $s_dist3 = 0;
private $s_avatar = 0;
private $countsql = null;
private $_urlitem = null;
private function _new() {
$this->service = parent::service('online','is');
}
private function _unset() {
unset($this->service);
}
private function _getListItems() {
$this->_new();
$this->type = $this->service->validType();
list($this->countsql,$args) = $this->service->validSearch();
if (is_array($args)) {
$this->s_sex = intval($args['s_sex']);
$this->s_sage = intval($args['s_sage']);
$this->s_eage = intval($args['s_eage']);
$this->s_dist1 = intval($args['s_dist1']);
$this->s_dist2 = intval($args['s_dist2']);
$this->s_dist3 = intval($args['s_dist3']);
$this->s_avatar = intval($args['s_avatar']);
}
if ($this->type == 'more') {
$this->_tplfile = $this->getTPLFile('online_list_more');
}
else {
$this->_tplfile = $this->getTPLFile('online_list');
}
if ($this->s_sex >0) {
$this->_urlitem .= !empty($this->_urlitem) ?'&s_sex='.$this->s_sex : 's_sex='.$this->s_sex;
}
if ($this->s_sage>0 &&$this->s_eage>0) {
$this->_urlitem .= !empty($this->_urlitem) ?'&s_sage='.$this->s_sage.'&s_eage='.$this->s_eage : 's_sage='.$this->s_sage.'&s_eage='.$this->s_eage;
}
if ($this->s_dist1>0) {
$this->_urlitem .= !empty($this->_urlitem) ?'&s_dist1='.$this->s_dist1 : 's_dist1='.$this->s_dist1;
}
if ($this->s_dist2>0) {
$this->_urlitem .= !empty($this->_urlitem) ?'&s_dist2='.$this->s_dist2 : 's_dist2='.$this->s_dist2;
}
if ($this->s_dist3>0) {
$this->_urlitem .= !empty($this->_urlitem) ?'&s_dist3='.$this->s_dist3 : 's_dist3='.$this->s_dist3;
}
if ($this->s_avatar>0) {
$this->_urlitem .= !empty($this->_urlitem) ?'&s_avatar='.$this->s_avatar : 's_avatar='.$this->s_avatar;
}
if (parent::$cfg['usermaxpage']>0) {
$this->page = $this->page >parent::$cfg['usermaxpage'] ?intval(parent::$cfg['usermaxpage']) : $this->page;
}
$this->pagesize = intval(parent::$cfg['userpagesize']);
$this->_unset();
}
public function action_run() {
if (false === $this->existsTplFile('online_index')) {
$this->action_list();
}
else {
$this->getMeta('ch_online_index');
$var_array = array(
'page_title'=>$this->metawrap['title'],
'page_description'=>$this->metawrap['description'],
'page_keyword'=>$this->metawrap['keyword'],
);
$this->_tplfile = $this->getTPLFile('online_index');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
public function action_list() {
if (parent::$wrap_user['userid'] == 0) {
XHandle::redirect(parent::$urlpath.'index.php?c=passport&a=login');
}
else {
if (intval($this->login_groupwrap['view']['viewonlineuser']) != 1) {
XHandle::halt('对不起，您所在的会员组没有权限使用访问该页面，请升级VIP','',1);
}
}
$this->_getListItems();
$orderby = ' ORDER BY v.userid DESC';
$model = parent::model('online','im');
list($total,$data) = $model->getList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>'',
'orderby'=>$orderby,
'countwhere'=>$this->countsql,
)
);
parent::loadLib('url');
if ($this->type == 'more') {
if (!empty($this->_urlitem)) {
$url = XUrl::getListUrl('online','type=more&'.$this->_urlitem);
}
else {
$url = XUrl::getListUrl('online','type=more');
}
}
else {
$url = XUrl::getListUrl('online',$this->_urlitem);
}
$showpage = XPage::index($total,$this->pagesize,$this->page,$url,10,intval(parent::$cfg['usermaxpage']));
$this->getMeta('ch_online_list');
$page_title = $this->metawrap['title'];
$page_keyword = $this->metawrap['keyword'];
$page_description = $this->metawrap['description'];
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>$showpage,
'online'=>$data,
'page_title'=>$page_title,
'page_keyword'=>$page_keyword,
'page_description'=>$page_description,
'urlitem'=>$this->_urlitem,
's_sex'=>$this->s_sex,
's_sage'=>$this->s_sage,
's_eage'=>$this->s_eage,
's_dist1'=>$this->s_dist1,
's_dist2'=>$this->s_dist2,
's_dist3'=>$this->s_dist3,
's_avatar'=>$this->s_avatar,
'type'=>$this->type,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
?>