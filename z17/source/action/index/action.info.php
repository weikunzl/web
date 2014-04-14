<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class infoIAction extends indexbase {
private $service = null;
private $_tplfile = null;
private $cid = null;
private $id = null;
private $_urlitem = null;
private function _new() {
$this->service = parent::service('info','is');
}
private function _unset() {
unset($this->service);
}
private function _getListItems() {
$this->_new();
$this->cid = $this->service->validCid();
$this->_unset();
if ($this->cid>0) {
$this->_urlitem = 'cid='.$this->cid;
}
if (parent::$cfg['infomaxpage']>0) {
$this->page = $this->page >parent::$cfg['infomaxpage'] ?intval(parent::$cfg['infomaxpage']) : $this->page;
}
$this->pagesize = intval(parent::$cfg['infopagesize']);
$this->_tplfile = $this->getTPLFile('info_list');
}
private function _getDetailItems() {
$this->_new();
$this->id = $this->service->validID();
$this->_unset();
$this->_tplfile = $this->getTPLFile('info_detail');
}
public function action_run() {
if (false === $this->existsTplFile('info_index')) {
$this->action_list();
}
else {
$this->getMeta('ch_info_index');
$var_array = array(
'page_title'=>$this->metawrap['title'],
'page_description'=>$this->metawrap['description'],
'page_keyword'=>$this->metawrap['keyword'],
);
$this->_tplfile = $this->getTPLFile('info_index');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
public function action_list() {
$this->_getListItems();
$searchsql = '';
if ($this->cid >0) {
$searchsql .= " AND v.catid='{$this->cid}'";
}
$orderby = '';
$model = parent::model('info','im');
list($total,$data) = $model->getList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
'orderby'=>$orderby,
)
);
parent::loadLib('url');
$url = XUrl::getListUrl('info',$this->_urlitem);
$showpage = XPage::index($total,$this->pagesize,$this->page,$url,10,intval(parent::$cfg['infomaxpage']));
if ($this->cid >0) {
$this->getMeta('ch_info_list_cat');
}
else {
$this->getMeta('ch_info_list');
}
$page_title = $this->metawrap['title'];
$page_keyword = $this->metawrap['keyword'];
$page_description = $this->metawrap['description'];
$catdata = $this->cid>0 ?$model->getOneCat($this->cid) : null;
$page_title = str_ireplace(
array('{cat.name}','{cat.keyword}','{cat.description}'),
array($catdata['catname'],$catdata['metakeyword'],$catdata['metadescription']),
$page_title
);
$page_description = str_ireplace(
array('{cat.name}','{cat.keyword}','{cat.description}'),
array($catdata['catname'],$catdata['metakeyword'],$catdata['metadescription']),
$page_description
);
$page_keyword = str_ireplace(
array('{cat.name}','{cat.keyword}','{cat.description}'),
array($catdata['catname'],$catdata['metakeyword'],$catdata['metadescription']),
$page_keyword
);
if (!empty($catdata)) {
$tplname = empty($catdata['tplname']) ?'info_list': trim($catdata['tplname']);
}
else {
$tplname = 'info_list';
}
$this->_tplfile = $this->getTPLFile($tplname);
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>$showpage,
'urlitem'=>$this->_urlitem,
'info'=>$data,
'cid'=>$this->cid,
'catdata'=>$catdata,
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
$model = parent::model('info','im');
$data = $model->getOneData($this->id);
if (empty($data)) {
XHandle::halt('对不起，读取信息不存在或者已删除！',$this->appfile,0);
}
$previous_data = $model->getPrevious($this->id);
if (!empty($previous_data)) {
$previous_item = "<a href='".$previous_data['url']."'>".$previous_data['title']."</a>";
}
else {
$previous_item = '没有了';
}
unset($previous_data);
$next_data = $model->getNext($this->id);
if (!empty($next_data)) {
$next_item = "<a href='".$next_data['url']."'>".$next_data['title']."</a>";
}
else {
$next_item = '没有了';
}
unset($next_data);
$this->getMeta('ch_info_detail');
$page_title = $this->metawrap['title'];
$page_description = $this->metawrap['description'];
$page_keyword = $this->metawrap['keyword'];
$page_title = str_ireplace(
array('{title}','{username}','{cat.name}'),
array($data['title'],$data['username'],$data['catname']),
$page_title
);
$page_description = str_ireplace(
array('{title}','{username}','{cat.name}'),
array($data['title'],$data['username'],$data['catname']),
$page_description
);
$page_keyword = str_ireplace(
array('{title}','{username}','{cat.name}'),
array($data['title'],$data['username'],$data['catname']),
$page_keyword
);
$tplname = empty($data['tplname']) ?'info_detail': trim($data['tplname']);
$this->_tplfile = $this->getTPLFile($tplname);
$var_array = array(
'info'=>$data,
'page_title'=>$page_title,
'page_keyword'=>$page_keyword,
'page_description'=>$page_description,
'previous_item'=>$previous_item,
'next_item'=>$next_item,
'id'=>$this->id,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
?>