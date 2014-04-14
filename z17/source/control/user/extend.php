<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control extends userbase {
public function control_run() {}
public function control_connect() {
$model = parent::model('connect','um');
$data = $model->getList();
foreach ($data as $key=>$value) {
$data[$key]['bindcount'] = $model->getBindCount($value['authid']);
}
unset($model);
$var_array = array(
'connect'=>$data,
'page_title'=>$this->getTitle('extend_connect'),
);
TPL::assign($var_array);
TPL::display($this->uctpl.'extend.tpl');
}
public function control_cpa() {
$model = parent::model('cpa','im');
$cpa_info = $model->getCapInfo();
if (!empty($cpa_info)) {
$cpacounts = $model->staticUser(0);
$settlecounts = $model->staticUser(1);
$unsettlecounts = $model->staticUser(2);
$totalmoney = $model->settleCounts(1);
$totalpoints = $model->settleCounts(2);
$cpaurl = parent::$cfg['siteurl'].'index.php?a=cpa&tuid='.parent::$wrap_user['userid'];
$searchsql = "";
list($total,$data) = $model->getList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql));
$url = XRequest::getPhpSelf();
$url .= '?c=extend&a=cpa';
}
unset($model);
$var_array = array(
'page_title'=>$this->getTitle('extend_cpa'),
'cpainfo'=>$cpa_info,
'cpacounts'=>$cpacounts,
'settlecounts'=>$settlecounts,
'unsettlecounts'=>$unsettlecounts,
'totalmoney'=>$totalmoney,
'totalpoints'=>$totalpoints,
'cpaurl'=>$cpaurl,
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>XPage::user($total,$this->pagesize,$this->page,$url),
'list'=>$data,
);
TPL::assign($var_array);
TPL::display($this->uctpl.'extend.tpl');
}
public function control_settlecpa() {
$model = parent::model('cpa','im');
list($result,$counts) = $model->doSettle();
unset($model);
if (true === $result) {
XHandle::halt('结算成功，共结算['.$counts.']个会员',$this->ucfile.'?c=extend&a=cpa',0);
}
else {
XHandle::halt('结算失败，请检查推广的会员都有效！',$this->ucfile.'?c=extend&a=cpa',4);
}
}
public function control_transfer() {
$model = parent::model('transfer','um');
$data = $model->transfer_config;
unset($model);
if (empty($data)) {
XHandle::halt('对不起，网站没有开启积分转换功能。','',1);
}
else {
$max_trans_money = 0;
$max_trans_points = 0;
$max_trans_money = floor($this->u['points']/$data['trade_money_ratio']);
$max_trans_points = ($this->u['money']*$data['trade_points_ratio']);
}
$var_array = array(
'transfer'=>$data,
'max_trans_money'=>$max_trans_money,
'max_trans_points'=>$max_trans_points,
'page_title'=>$this->getTitle('extend_transfer'),
);
TPL::assign($var_array);
TPL::display($this->uctpl.'extend.tpl');
}
public function control_transfermoney() {
$service = parent::service('transfer','us');
$quantity = $service->validQuantiy();
unset($service);
$model = parent::model('transfer','um');
$data = array();
$data = $model->transfer_config;
if (false === $model->transMoneyStatus()) {
XHandle::halt('对不起，网站已关闭'.XLang::get('points').'转换'.XLang::get('money').'功能。','',1);
}
$need_points = 0;
$need_points = floatval($quantity * $data['trade_money_ratio']);
if ($need_points >$this->u['points']) {
XHandle::halt('对不起，您的可用'.XLang::get('points').'不足。','',1);
}
if ($need_points >0) {
$result = $model->doTransMoney($need_points,$quantity);
}
else {
$result = false;
}
unset($model);
unset($data);
if (true === $result) {
XHandle::halt('转换成功',$this->ucfile.'?c=extend&a=transfer',0);
}
else {
XHandle::halt('转换失败','',1);
}
}
public function control_transferpoints() {
$service = parent::service('transfer','us');
$quantity = $service->validQuantiy();
unset($service);
$model = parent::model('transfer','um');
$data = array();
$data = $model->transfer_config;
if (false === $model->transPointsStatus()) {
XHandle::halt('对不起，网站已关闭'.XLang::get('money').'转换'.XLang::get('points').'功能。','',1);
}
if ($this->u['money'] <$quantity) {
XHandle::halt('对不起，您的可用'.XLang::get('money').'不足本次转换。','',1);
}
$get_points = 0;
$get_points = floatval($quantity * $data['trade_points_ratio']);
if ($get_points >0) {
$result = $model->doTransPoints($quantity,$get_points);
}
else {
$result = false;
}
unset($model);
unset($data);
if (true === $result) {
XHandle::halt('转换成功',$this->ucfile.'?c=extend&a=transfer',0);
}
else {
XHandle::halt('转换失败','',1);
}
}
public function control_delconnect() {
$service = parent::service('connect','us');
$id = $service->validID();
unset($service);
$model = parent::model('connect','um');
$result = $model->doDel($id);
unset($model);
if (true === $result) {
XHandle::halt('删除成功',$this->ucfile.'?c=extend&a=connect',0);
}
else {
XHandle::halt('删除失败','',1);
}
}
}
?>