<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends userbase {
public function control_run() {
$searchsql = '';
$model = parent::model('listen','um');
list($datacount,$data) = $model->getList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql));
$url = XRequest::getPhpSelf();
$url .= '?c=listen';
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>XPage::user($datacount,$this->pagesize,$this->page,$url),
'listen'=>$data,
'page_title'=>$this->getTitle('listen_run'),
);
unset($model);
TPL::assign($var_array);
TPL::display($this->uctpl.'listen.tpl');
}
public function control_getlisten() {
$uid = XRequest::getInt('uid');
$tipsid = XRequest::getArgs('tipsid');
$flag = "";
if ($uid >0 &&$uid != parent::$wrap_user['userid']) {
$model = parent::model('listen','um');
$flag = $model->getListenStatus($uid);
unset($model);
}
$var_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$uid,
'flag'=>$flag,
'tipsid'=>$tipsid,
);
echo json_encode($var_array);
}
public function control_listen() {
$service = parent::service('listen','us');
$fuid = $service->validFuid();
unset($service);
$tipsid = XRequest::getArgs('tipsid');
$error = "";
$model = parent::model('listen','um');
if (false === $model->checkAllowListen($this->g)) {
$error .= "对不起，您所在会员组已达到关注好友个数，请升级其他组！";
}
if (true === $model->checkListened($fuid,parent::$wrap_user['userid'])) {
$error .= "对不起，您已经关注过该会员！";
}
if (!empty($error)) {
if ($this->halttype == 'ajax') {
$var_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>$error,
'flag'=>0,
'tipsid'=>$tipsid,
);
echo json_encode($var_array);
}
else {
XHandle::halt($error,"",1);
}
}
else {
$result = $model->doListen($fuid);
if ($this->halttype == 'ajax') {
if (true === $result) {
$result_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>$error,
'flag'=>1,
'tipsid'=>$tipsid,
);
}
else {
$result_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>$error,
'flag'=>0,
'tipsid'=>$tipsid,
);
}
echo json_encode($result_array);
}
else {
if (true === $result) {
XHandle::halt('关注成功',$this->ucfile.'?c=listen',0);
}
else {
XHandle::halt('关注失败','',1);
}
}
}
unset($model);
}
public function control_black() {
$service = parent::service('listen','us');
$fuid = $service->validFuid();
unset($service);
$tipsid = XRequest::getArgs('tipsid');
$model = parent::model('listen','um');
$result = $model->doBlack($fuid);
unset($model);
if ($this->halttype == 'ajax') {
if (true === $result) {
$var_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>'',
'flag'=>1,
'tipsid'=>$tipsid,
);
}
else {
$var_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>'操作失败',
'flag'=>0,
'tipsid'=>$tipsid,
);
}
echo json_encode($var_array);
}
else {
if (true === $result) {
XHandle::halt('拉黑成功',$this->ucfile.'?c=listen',0);
}
else {
XHandle::halt('操作失败！','',1);
}
}
}
public function control_cancel() {
$service = parent::service('listen','us');
$fuid = $service->validFuid();
unset($service);
$tipsid = XRequest::getArgs('tipsid');
$model = parent::model('listen','um');
$result = $model->doDel($fuid);
unset($model);
if ($this->halttype == 'ajax') {
if (true === $result) {
$var_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>'',
'flag'=>1,
'tipsid'=>$tipsid,
);
}
else {
$var_array = array(
'type'=>$GLOBALS['a'],
'uid'=>$fuid,
'error'=>'删除失败',
'flag'=>0,
'tipsid'=>$tipsid,
);
}
echo json_encode($var_array);
}
else {
if (true === $result) {
XHandle::halt('删除成功',$this->ucfile.'?c=listen',0);
}
else {
XHandle::halt('删除失败','',1);
}
}
}
}
?>