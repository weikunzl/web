<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends userbase {
private $type = null;
private $_comeurl = null;
private $_urlitem = null;
private function _getItems() {
$this->type = XRequest::getArgs('type');
$this->_urlitem = 'type='.$this->type;
$this->_comeurl = 'page='.$this->page.'&'.$this->_urlitem;
}
public function control_run() {
$this->_getItems();
if ($this->type == 'unread') {
$orderby = ' ORDER BY v.status ASC';
}
elseif ($this->type == 'read') {
$orderby = ' ORDER BY v.status DESC';
}
else {
$orderby = ' ORDER BY v.hiid DESC';
}
$searchsql = '';
$model = parent::model('hi','um');
list($datacount,$data) = $model->getReceiveList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql,'orderby'=>$orderby));
$url = XRequest::getPhpSelf();
$url .= '?c=hi&'.$this->_urlitem;
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>XPage::user($datacount,$this->pagesize,$this->page,$url),
'hi'=>$data,
'type'=>$this->type,
'urlitem'=>$this->_urlitem,
'page_title'=>$this->getTitle('hi_run'),
);
unset($model);
TPL::assign($var_array);
TPL::display($this->uctpl.'hi.tpl');
}
public function control_to() {
$this->_getItems();
$searchsql = '';
$orderby = '';
$model = parent::model('hi','um');
list($datacount,$data) = $model->getToList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql,'orderby'=>$orderby));
$url = XRequest::getPhpSelf();
$url .= '?c=hi&a=to';
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>XPage::user($datacount,$this->pagesize,$this->page,$url),
'hi'=>$data,
'type'=>$this->type,
'urlitem'=>$this->_urlitem,
'page_title'=>$this->getTitle('hi_to'),
);
unset($model);
TPL::assign($var_array);
TPL::display($this->uctpl.'hi.tpl');
}
public function control_read() {
$this->_getItems();
$service = parent::service('hi','us');
$id = $service->validID();
unset($service);
$model = parent::model('hi','um');
$data = $model->getOneReceive($id);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取信息不存在或已删除！','',1);
}
else {
$var_array = array(
'hi'=>$data,
'id'=>$id,
'page_title'=>$this->getTitle('hi_read'),
'comeurl'=>$this->_comeurl,
'type'=>$this->type,
);
}
TPL::assign($var_array);
TPL::display($this->uctpl.'hi.tpl');
}
public function control_view() {
$this->_getItems();
$service = parent::service('hi','us');
$id = $service->validID();
unset($service);
$model = parent::model('hi','um');
$data = $model->getOneTo($id);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取信息不存在或已删除！','',1);
}
else {
$var_array = array(
'hi'=>$data,
'id'=>$id,
'page_title'=>$this->getTitle('hi_read'),
'comeurl'=>$this->_comeurl,
'type'=>$this->type,
);
}
TPL::assign($var_array);
TPL::display($this->uctpl.'hi.tpl');
}
public function control_hi() {
$service = parent::service('hi','us');
$touid = $service->validToUid();
unset($service);
$model_userauth = parent::model('userauth','um');
if (true === $model_userauth->checkLimitAvatarRized($this->u['avatar'],$this->u['avatarflag'])) {
XHandle::artTips('avatar');
}
if (true === $model_userauth->checkLimitEmailRized($this->u['emailrz'])) {
XHandle::artTips('emailrz');
}
unset($model_userauth);
$model_user = parent::model('user','um');
$touser = $model_user->getUserSimpleInfo($touid);
unset($model_user);
if (empty($touser)) {
XHandle::artTips('','对不起，对方信息不存在或已删除！');
}
else {
$model = parent::model('hi','um');
$greet = $model->getGreetList($touser['gender']);
unset($model);
$var_array = array(
'touid'=>$touid,
'touser'=>$touser,
'greet'=>$greet,
'page_title'=>$this->getTitle('hi_add'),
);
TPL::assign($var_array);
if ($this->halttype == 'jdbox') {
TPL::display($this->uctpl.'hi_jdbox.tpl');
}
else {
TPL::display($this->uctpl.'hi.tpl');
}
}
}
public function control_savehi() {
$service = parent::service('hi','us');
$touid = $service->validToUid();
$greetid = $service->validGreetID();
unset($service);
$type = XRequest::getArgs('type');
$model_user = parent::model('user','um');
$tauser = $model_user->getUserSimpleInfo($touid);
unset($model_user);
if (empty($tauser)) {
XHandle::halt('对不起，收件人不能为空。','',1);
}
$model = parent::model('hi','um');
$result = $model->doSaveHi($touid,$greetid);
unset($model);
if (true === $result) {
if ($type == 'ajax') {
echo json_encode(array('response'=>1,'msg'=>''));
}
else {
if ($this->halttype == 'jdbox') {
XHandle::jqDialog('发送成功',0);
}
else {
XHandle::halt('发送成功',$this->ucfile.'?c=hi&a=hi&touid='.$touid.'&halttype='.$this->halttype,0);
}
}
}
else {
if ($type == 'ajax') {
echo json_encode(array('response'=>0,'msg'=>''));
}
else {
XHandle::halt('发送失败','',1);
}
}
}
public function control_delreceive() {
$this->_getItems();
$result = false;
$service = parent::service('hi','us');
$ids = $service->validArrayID();
unset($service);
$model = parent::model('hi','um');
for($ii=0;$ii<count($ids);$ii++){
$id = intval($ids[$ii]);
$result = $model->doDelReceive($id);
}
unset($model);
if (true === $result) {
XHandle::halt('删除成功',$this->ucfile.'?c=hi&'.$this->_comeurl,0);
}
else {
XHandle::halt('删除失败','',1);
}
}
public function control_delto() {
$this->_getItems();
$result = false;
$service = parent::service('hi','us');
$ids = $service->validArrayID();
unset($service);
$model = parent::model('hi','um');
for($ii=0;$ii<count($ids);$ii++){
$id = intval($ids[$ii]);
$result = $model->doDelTo($id);
}
unset($model);
if (true === $result) {
XHandle::halt('删除成功',$this->ucfile.'?c=hi&a=to&'.$this->_comeurl,0);
}
else {
XHandle::halt('删除失败','',1);
}
}
}
?>