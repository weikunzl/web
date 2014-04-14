<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends wapbase {
private $service = null;
private $_tplfile = null;
private $type = null;
private $_comeurl = null;
private $_urlitem = null;
private function _new() {
$this->service = parent::service('message','ws');
}
private function _unset() {
unset($this->service);
}
private function _getItems() {
$this->type = XRequest::getArgs('type');
$this->_urlitem = 'type='.$this->type;
$this->_comeurl = 'page='.$this->page.'&'.$this->_urlitem;
}
public function control_run() {
$this->checkLogin();
$this->_getItems();
if ($this->type == 'unread') {
$orderby = ' ORDER BY v.readflag ASC';
}
elseif ($this->type == 'topunread') {
$orderby = ' ORDER BY v.readflag ASC, v.istop DESC';
}
else {
$orderby = ' ORDER BY v.msgid DESC';
}
$searchsql = '';
$model = parent::model('message','um');
list($datacount,$data) = $model->getReceiveList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql,'orderby'=>$orderby));
$url = $this->wapfile.'?c=cp_message&type='.$this->type;
if (!empty($data)) {
$showpage = XPage::index($datacount,$this->pagesize,$this->page,$url,5,10000);
}
else {
$showpage = '';
}
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>$showpage,
'message'=>$data,
'type'=>$this->type,
'urlitem'=>$this->_urlitem,
'page_title'=>'会员来信-会员中心',
);
unset($model);
$this->_tplfile = $this->getTPLFile('cp_message');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
public function control_readmsg() {
$this->checkLogin();
if (parent::$wrap_user['userid'] == 0) {
XHandle::redirect($this->wapfile);
}
$this->_getItems();
$this->_new();
$id = $this->service->validID();
$this->_unset();
$model = parent::model('readmsg','um');
$data = $model->getOneMsg($id);
if (empty($data)) {
XHandle::wapHalt('对不起，该信件不存在或者已删除！','',1);
}
else {
if ($data['readflag'] == 0) {
$m = parent::model('message','um');
$needpay = $m->checkViewNeedPay($data['frominfo']['gender'],$this->login_groupwrap['msg']);
unset($m);
if (true === $needpay) {
XHandle::redirect($this->ucfile.'?c=cp_message&a=readpay&id='.$id.'&'.$this->_comeurl);
}
else {
$model->doReadMsg($id,$data['frominfo']['userid'],$data['frominfo']['gender'],$this->login_groupwrap['msg']);
}
}
$var_array = array(
'id'=>$id,
'message'=>$data,
'page_title'=>'阅读信件-会员中心',
'previous_id'=>$model->getPreviousID($id),
'next_id'=>$model->getNextID($id),
'comeurl'=>$this->_comeurl,
);
$this->_tplfile = $this->getTPLFile('cp_message');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
unset($model);
}
public function control_readpay() {
$this->checkLogin();
if (parent::$wrap_user['userid'] == 0) {
XHandle::redirect($this->wapfile);
}
$this->_getItems();
$this->_new();
$id = $this->service->validID();
$this->_unset();
$fee = floatval($this->login_groupwrap['fee']['viewmsgfee']);
if ($fee <=0 ) {
$fee = 1;
}
if (parent::$wrap_user['money'] <$fee) {
XHandle::wapHalt('金币不足，无法支付查看信件','',1);
}
else {
$model = parent::model('readmsg','um');
$fromuid = $model->getFromUid($id);
if ($fromuid == 0) {
XHandle::wapHalt('该信件不存在或已删除','',1);
}
else {
$result = $model->doPayReadMsg($id,$fee,$fromuid);
if (true === $result) {
XHandle::redirect($this->wapfile.'?c=cp_message&a=readmsg&id='.$id.'&'.$this->_comeurl);
}
else {
XHandle::wapHalt('阅读信件支付失败','',1);
}
}
unset($model);
}
}
public function control_outmsg() {
$this->checkLogin();
$this->_getItems();
$searchsql = '';
if ($this->type == 'unread') {
$orderby = ' ORDER BY v.readflag ASC';
}
elseif ($this->type == 'read') {
$orderby = ' ORDER BY v.readflag DESC, v.msgid DESC';
}
else {
$orderby = ' ORDER BY v.msgid DESC';
}
$model = parent::model('outmsg','um');
list($datacount,$data) = $model->getOutList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql,'orderby'=>''));
unset($model);
$url = $this->wapfile.'?c=cp_message&a=outmsg&type='.$this->type;
if (!empty($data)) {
$showpage = XPage::index($datacount,$this->pagesize,$this->page,$url,5,10000);
}
else {
$showpage = '';
}
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>$showpage,
'outmsg'=>$data,
'type'=>$this->type,
'urlitem'=>$this->_urlitem,
'page_title'=>'已发信件',
);
$this->_tplfile = $this->getTPLFile('cp_outmsg');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
public function control_viewoutmsg() {
$this->checkLogin();
$this->_getItems();
$this->_new();
$id = $this->service->validID();
$this->_unset();
$model = parent::model('outmsg','um');
$data = $model->getOneData($id);
unset($model);
if (empty($data)) {
XHandle::wapHalt('对不起，数据不存在或已删除！','',1);
}
else {
$var_array = array(
'id'=>$id,
'outmsg'=>$data,
'comeurl'=>$this->_comeurl,
'page_title'=>'已发信件-会员中心',
);
$this->_tplfile = $this->getTPLFile('cp_outmsg');
TPL::assign($var_array);
TPL::display($this->_tplfile);
}
}
}
?>