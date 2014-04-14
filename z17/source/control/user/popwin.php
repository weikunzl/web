<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control extends userbase {
public function control_run() {
$this->control_newvisit();
}
public function control_msg() {
$num = XRequest::getArgs('num');
$num = $num <1 ?2 : $num;
$model = parent::model('popwin','um');
$data = $model->getListMsg($num);
unset($model);
$var_array = array(
'msg'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_msg.tpl');
echo json_encode(array('result'=>$tpl_data));
}
public function control_hi() {
$num = XRequest::getArgs('num');
$num = $num <1 ?2 : $num;
$model = parent::model('popwin','um');
$data = $model->getListHi($num);
unset($model);
$var_array = array(
'hi'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_hi.tpl');
echo json_encode(array('result'=>$tpl_data));
}
public function control_gift() {
$num = XRequest::getArgs('num');
$num = $num <1 ?2 : $num;
$model = parent::model('popwin','um');
$data = $model->getListGift($num);
unset($model);
$var_array = array(
'gift'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_gift.tpl');
echo json_encode(array('result'=>$tpl_data));
}
public function control_sysmsg() {
$num = XRequest::getArgs('num');
$num = $num <1 ?2 : $num;
$model = parent::model('popwin','um');
$data = $model->getListSysmsg($num);
unset($model);
$var_array = array(
'sysmsg'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_sysmsg.tpl');
echo json_encode(array('result'=>$tpl_data));
}
public function control_newreg() {
$num = XRequest::getArgs('num');
$num = $num <1 ?1 : $num;
$response = 0;
$model = parent::model('popwin','um');
$data = $model->getListRegUser($num);
unset($model);
if (!empty($data)) {
$response = 1;
}
$var_array = array(
'newreg'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_newreg.tpl');
echo json_encode(array('response'=>$response,'result'=>$tpl_data,'type'=>'newreg'));
}
public function control_newvisit() {
$num = XRequest::getArgs('num');
$num = $num <1 ?1 : $num;
$response = 0;
$model = parent::model('popwin','um');
$data = $model->getListNewVisit($num);
unset($model);
if (!empty($data)) {
$response = 1;
}
$var_array = array(
'newvisit'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_newvisit.tpl');
echo json_encode(array('response'=>$response,'result'=>$tpl_data,'type'=>'newvisit'));
}
public function control_match() {
$num = XRequest::getArgs('num');
$num = $num <1 ?1 : $num;
$response = 0;
$model = parent::model('popwin','um');
$data = $model->getListMatch($num);
unset($model);
if (!empty($data)) {
$response = 1;
}
$var_array = array(
'match'=>$data,
);
TPL::assign($var_array);
$tpl_data = TPL::fetch($this->uctpl.'popwin_match.tpl');
echo json_encode(array('response'=>$response,'result'=>$tpl_data,'type'=>'match'));
}
public function control_count() {
$num = 0;
$type = XRequest::getArgs('type');
if ($type == 'msg') {
$model = parent::model('message','um');
$num = $model->countNotRead(parent::$wrap_user['userid']);
unset($model);
}
elseif ($type == 'hi') {
$model = parent::model('hi','um');
$num = $model->countReceiveHi(parent::$wrap_user['userid'],'new');
unset($model);
}
elseif ($type == 'gift') {
$model = parent::model('gift','um');
$num = $model->getNotViewCount(parent::$wrap_user['userid']);
unset($model);
}
elseif ($type == 'sysmsg') {
$model = parent::model('sysmsg','um');
$num = $model->getNoreadCount(parent::$wrap_user['userid']);
unset($model);
}
echo json_encode(array('num'=>$num));
}
}
?>