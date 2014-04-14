<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class diaryIAction extends indexbase {
private $service = null;
private $_tplfile = null;
private $cid = null;
private $id = null;
private $_urlitem = null;
private function _new() {
$this->service = parent::service('diary','is');
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
if (parent::$cfg['diarymaxpage']>0) {
$this->page = $this->page >parent::$cfg['diarymaxpage'] ?intval(parent::$cfg['diarymaxpage']) : $this->page;
}
$this->pagesize = intval(parent::$cfg['diarypagesize']);
$this->_tplfile = $this->getTPLFile('diary_list');
$this->_unset();
}
private function _getDetailItems() {
$this->_new();
$this->id = $this->service->validID();
$this->_unset();
$this->pagesize = intval(parent::$cfg['commentpagesize']);
$this->_tplfile = $this->getTPLFile('diary_detail');
}
public function action_run() {
if (false === $this->existsTplFile('diary_index')) {
$this->action_list();
}
else {
$this->getMeta('ch_diary_index');
$var_array = array(
'page_title'=>$this->metawrap['title'],
'page_description'=>$this->metawrap['description'],
'page_keyword'=>$this->metawrap['keyword'],
);
$this->_tplfile = $this->getTPLFile('diary_index');
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
$orderby = ' ORDER BY v.diaryid DESC';
$model = parent::model('diary','im');
list($total,$data) = $model->getList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
'orderby'=>$orderby,
)
);
parent::loadLib('url');
$url = XUrl::getListUrl('diary',$this->_urlitem);
$showpage = XPage::index($total,$this->pagesize,$this->page,$url,10,intval(parent::$cfg['diarymaxpage']));
if ($this->cid >0) {
$this->getMeta('ch_diary_list_cat');
}
else {
$this->getMeta('ch_diary_list');
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
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>$showpage,
'urlitem'=>$this->_urlitem,
'diary'=>$data,
'catdata'=>$catdata,
'page_title'=>$page_title,
'page_keyword'=>$page_keyword,
'page_description'=>$page_description,
'cid'=>$this->cid,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
public function action_detail() {
$this->_getDetailItems();
$model = parent::model('diary','im');
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
$searchsql = " AND v.diaryid='{$this->id}'";
$orderby = ' ORDER BY v.commentid DESC';
list($total,$comment) = $model->getCommentList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
'orderby'=>$orderby,
)
);
if (!empty($comment)) {
foreach($comment as $key=>$value) {
if ($this->page == 1) {
$comment[$key]['ordersi'] = ($total-$value['i'])+1;
}
else {
$comment[$key]['ordersi'] = (($total-($this->page-1)*$this->pagesize)-$value['i'])+1;
}
}
}
parent::loadLib('url');
$url = XUrl::getCommentUrl('diary',$this->id);
$showpage = XPage::index($total,$this->pagesize,$this->page,$url,10);
$this->getMeta('ch_diary_detail');
$page_title = $this->metawrap['title'];
$page_description = $this->metawrap['description'];
$page_keyword = $this->metawrap['keyword'];
$page_title = str_ireplace(
array('{title}','{u.username}','{cat.name}'),
array($data['title'],$data['username'],$data['catname']),
$page_title
);
$page_description = str_ireplace(
array('{title}','{u.username}','{cat.name}'),
array($data['title'],$data['username'],$data['catname']),
$page_description
);
$page_keyword = str_ireplace(
array('{title}','{u.username}','{cat.name}'),
array($data['title'],$data['username'],$data['catname']),
$page_keyword
);
$var_array = array(
'diary'=>$data,
'comment'=>$comment,
'total'=>$total,
'showpage'=>$showpage,
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