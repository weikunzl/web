<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class aboutIAction extends indexbase {
private $service = null;
private $_tplfile = null;
private $cid = null;
private $id = null;
private $_urlitem = null;
private function _new() {
$this->service = parent::service('about','is');
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
}
private function _getDetailItems() {
$this->_new();
$this->id = $this->service->validID();
$this->_unset();
}
public function action_run() {
}
public function action_detail() {
$this->_getDetailItems();
$model = parent::model('about','im');
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
$this->getMeta('ch_about_detail');
$page_title = $this->metawrap['title'];
$page_description = $this->metawrap['description'];
$page_keyword = $this->metawrap['keyword'];
$page_title = str_ireplace(
array('{title}','{cat.name}'),
array($data['title'],$data['catname']),
$page_title
);
$page_description = str_ireplace(
array('{title}','{cat.name}'),
array($data['title'],$data['catname']),
$page_description
);
$page_keyword = str_ireplace(
array('{title}','{cat.name}'),
array($data['title'],$data['catname']),
$page_keyword
);
unset($model);
$tplname = empty($data['tplname']) ?'about_detail': trim($data['tplname']);
$this->_tplfile = $this->getTPLFile($tplname);
$var_array = array(
'about'=>$data,
'page_title'=>$page_title,
'page_keyword'=>$page_keyword,
'page_description'=>$page_description,
'previous_item'=>$previous_item,
'next_item'=>$next_item,
'id'=>$this->id,
);
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
?>