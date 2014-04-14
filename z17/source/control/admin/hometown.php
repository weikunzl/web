<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends adminbase {
public function __construct() {
$this->control();
}
private function control() {
parent::__construct();
$this->checkLogin();
}
public function control_run() {
$this->checkAuth('hometown_volist');
$model = parent::model('hometown','am');
list($datacount,$data) = $model->getList();
$url = XRequest::getPhpSelf();
$url .= '?c=hometown';
foreach($data as $key =>$value){
if($value['depth']==0){
$data[$key]['tree_node'] = $value['areaname'];
}else{
$tree = "";
if($value['depth']==1){
$tree = "&nbsp;&nbsp;├ ";
}else{
for($ii=2;$ii<=$value['depth'];$ii++){
$tree .= "&nbsp;&nbsp;│";
}
$tree .= "&nbsp;&nbsp;├ ";
}
$data[$key]['tree_node'] = $tree.$value['areaname'];
}
}
$var_array = array(
'total'=>$datacount,
'area'=>$data,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->cptpl.'hometown.tpl');
}
public function control_add() {
$this->checkAuth('hometown_add');
parent::loadLib('mod');
$var_array = array(
'area_root'=>XMod::selecHomeTown(XRequest::getInt('rootid'),'rootid','一级地区'),
);
TPL::assign($var_array);
TPL::display($this->cptpl.'hometown.tpl');
}
public function control_edit() {
$this->checkAuth('hometown_edit');
$id = XRequest::getInt('id');
$this->_validID($id);
$model = parent::model('hometown','am');
$data = $model->getData($id);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
parent::loadLib('mod');
$var_array = array(
'area'=>$data,
'id'=>$id,
'area_root'=>XMod::selecHomeTown($data['rootid'],'rootid','一级地区'),
);
TPL::assign($var_array);
TPL::display($this->cptpl.'hometown.tpl');
}
unset($model);
}
public function control_saveadd() {
$this->checkAuth('hometown_add');
$args = $this->_validAdd();
$model = parent::model('hometown','am');
$result = $model->doAdd($args);
unset($model);
if (true === $result) {
$this->log('hometown_add','',1);
XHandle::halt('添加成功',$this->cpfile.'?c=hometown',0);
}
else {
$this->log('hometown_add','',0);
XHandle::halt('添加失败','',1);
}
}
public function control_saveedit() {
$this->checkAuth('hometown_edit');
list($id,$args) = $this->_validEdit();
$model = parent::model('hometown','am');
$result = $model->doEdit($id,$args);
unset($model);
if ($result == 1) {
XHandle::halt('编辑失败，移动栏目错误，有子栏目时，不允许移动到同一树状子栏目下面','',1);
}
elseif ($result == 2) {
$this->log('hometown_edit','id='.$id.'',1);
XHandle::halt('编辑成功',$this->cpfile.'?c=hometown',0);
}
else {
$this->log('hometown_edit','id='.$id.'',0);
XHandle::halt('编辑失败','',1);
}
}
public function control_del() {
$this->checkAuth('hometown_del');
$id = XRequest::getInt('id');
if ($id <1) {
XHandle::halt('ID错误','',1);
}
$model = parent::model('hometown','am');
$result = $model->doDel($id);
unset($model);
if (true === $result) {
$this->log('hometown_del','id='.$id.'',1);
XHandle::halt('删除成功',$this->cpfile.'?c=hometown',0);
}
else {
$this->log('hometown_del','id='.$id.'',0);
XHandle::halt('删除失败','',1);
}
}
public function control_update() {
$this->checkAuth('hometown_edit');
$args = XRequest::getGpc(array('id','type'));
$model = parent::model('hometown','am');
$model->doUpdate(intval($args['id']),trim($args['type']));
unset($model);
}
private function _validAdd() {
$args = XRequest::getGpc(array(
'areaname','spreadname','rootid','orders',
));
if (empty($args['areaname'])) {
XHandle::halt('地区名称不能为空','',1);
}
$args['rootid'] = intval($args['rootid']);
$args['orders'] = intval($args['orders']);
return $args;
}
private function _validEdit() {
$id = XRequest::getInt('id');
$args = XRequest::getGpc(array(
'areaname','spreadname','rootid','orders',
));
if ($id<1) {
XHandle::halt('ID丢失','',1);
}
if (empty($args['areaname'])) {
XHandle::halt('地区名称不能为空','',1);
}
$args['rootid'] = intval($args['rootid']);
if ($id == $args['rootid']) {
XHandle::halt('对不起，所属节点不能选择自己。','',1);
}
$args['orders'] = intval($args['orders']);
return array($id,$args);
}
private function _validID($id) {
if (empty($id)) {
XHandle::halt('ID丢失，请选择要操作的ID','',1);
}
}
}
?>