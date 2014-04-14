<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control extends adminbase {
private $_comeurl = NUll;
private $_urlitem = NULL;
var $fromtype = NULL;
private $listArgs = NULL;
private $_likesql = NULL;
private $_paramsql = NULL;
private $simpleArgs = NULL;
public function __construct() {
$this->control();
}
private function control() {
parent::__construct();
$this->checkLogin();
}
private function _getListItems() {
$service = parent::service('user','as');
list($this->_likesql,$this->_paramsql,$this->listArgs) = $service->validSearch();
unset($service);
$this->fromtype = XRequest::getArgs('fromtype');
foreach ($this->listArgs as $key=>$value) {
$this->_urlitem .= $key.'='.urlencode($value).'&';
}
if (!empty($this->_urlitem)) {
$this->_urlitem .= 'fromtype='.$this->fromtype;
}
else {
$this->_urlitem .= '&fromtype='.$this->fromtype;
}
$this->_comeurl = $this->_urlitem."&page=".$this->page."";
}
private function _getSimpleItems() {
$service = parent::service('user','as');
$this->simpleArgs = $service->validSimpleItems();
unset($service);
$this->fromtype = XRequest::getArgs('fromtype');
foreach ($this->simpleArgs as $key=>$value) {
$this->_urlitem .= $key.'='.urlencode($value).'&';
}
if (!empty($this->_urlitem)) {
$this->_urlitem .= 'fromtype='.$this->fromtype;
}
else {
$this->_urlitem .= '&fromtype='.$this->fromtype;
}
$this->_comeurl = $this->_urlitem."&page=".$this->page."";
}
public function control_run() {
$this->checkAuth('user_volist');
$this->_getListItems();
$searchsql = '';
$orderby = '';
if (!empty($this->_likesql)) {
$searchsql = $this->_likesql;
$orderby = '';
}
else {
$searchsql = $this->_paramsql;
if ($this->listArgs['sorderby'] == 'reg') {
$orderby .= ' ORDER BY ps.addtime';
}
elseif ($this->listArgs['sorderby'] == 'login') {
$orderby .= ' ORDER BY ps.ontime';
}
elseif ($this->listArgs['sorderby'] == 'group') {
$orderby .= ' ORDER BY ps.groupid';
}
else {
$orderby .= ' ORDER BY ps.userid';
}
if ($this->listArgs['sorders'] == 'asc') {
$orderby .= ' ASC';
}
else {
$orderby .= ' DESC';
}
}
$model = parent::model('user','am');
if (!empty($this->_likesql)) {
list($total,$data) = $model->getLikeList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql,'orderby'=>$orderby));
}
else {
list($total,$data) = $model->getParamsList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql,'orderby'=>$orderby));
}
unset($model);
$url = XRequest::getPhpSelf();
$url .= '?c=user&'.$this->_urlitem;
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>XPage::admin($total,$this->pagesize,$this->page,$url,10),
'user'=>$data,
'urlitem'=>$this->_urlitem,
'comeurl'=>$this->_comeurl,
'fromtype'=>$this->fromtype,
);
if (is_array($this->listArgs)) {
$var_array = array_merge($var_array ,$this->listArgs);
}
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
public function control_penymonolog() {
$this->checkAuth('user_volist');
$this->_getSimpleItems();
$searchsql = '';
if ($this->simpleArgs['sflag'] == 1) {
$searchsql .= " AND v.molstatus = '-2'";
}
elseif ($this->simpleArgs['sflag'] == 2) {
$searchsql .= " AND v.molstatus = '-1'";
}
elseif ($this->simpleArgs['sflag'] == 3) {
$searchsql .= " AND v.molstatus = '1'";
}
if (!empty($this->simpleArgs['skeyword'])) {
if ($this->simpleArgs['stype'] == 'userid') {
if (true === XValid::isNumber($this->simpleArgs['skeyword'])) {
$searchsql .= " AND v.userid='".$this->simpleArgs['skeyword']."'";
}
}
}
$model = parent::model('user','am');
list($total,$data) = $model->getPenyMonologList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
)
);
unset($model);
$url = XRequest::getPhpSelf();
$url .= '?c=user&a=penymonolog&'.$this->_urlitem;
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>XPage::admin($total,$this->pagesize,$this->page,$url,10),
'urlitem'=>$this->_urlitem,
'comeurl'=>$this->_comeurl,
'stype'=>$this->simpleArgs['stype'],
'skeyword'=>$this->simpleArgs['skeyword'],
'sflag'=>$this->simpleArgs['sflag'],
'user'=>$data,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
public function control_penyavatar() {
$this->checkAuth('user_volist');
$this->_getSimpleItems();
$searchsql = "";
if ($this->simpleArgs['sflag'] == 1) {
$searchsql .= " AND v.avatarflag = '-2'";
}
elseif ($this->simpleArgs['sflag'] == 2) {
$searchsql .= " AND v.avatarflag = '-1'";
}
elseif ($this->simpleArgs['sflag'] == 3) {
$searchsql .= " AND v.avatarflag = '1'";
}
else {
$searchsql .= " AND v.avatarflag IN(-2, -1, 1)";
}
if (!empty($this->simpleArgs['skeyword'])) {
if ($this->simpleArgs['stype'] == 'userid') {
if (true === XValid::isNumber($this->simpleArgs['skeyword'])) {
$searchsql .= " AND v.userid='".$this->simpleArgs['skeyword']."'";
}
}
}
$model = parent::model('user','am');
list($total,$data) = $model->getPenyAvatarList(
array(
'page'=>$this->page,
'pagesize'=>$this->pagesize,
'searchsql'=>$searchsql,
)
);
unset($model);
$url = XRequest::getPhpSelf();
$url .= '?c=user&a=penyavatar&'.$this->_urlitem;
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>XPage::admin($total,$this->pagesize,$this->page,$url,10),
'urlitem'=>$this->_urlitem,
'comeurl'=>$this->_comeurl,
'stype'=>$this->simpleArgs['stype'],
'skeyword'=>$this->simpleArgs['skeyword'],
'sflag'=>$this->simpleArgs['sflag'],
'user'=>$data,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
public function control_search() {
$this->checkAuth('user_volist');
$backinput = XRequest::getArgs('backinput');
$backtips = XRequest::getArgs('backtips');
$ssex = XRequest::getInt('ssex');
$susername = XRequest::getArgs('susername');
$semail = XRequest::getArgs('semail');
$this->_urlitem = "backinput={$backinput}&backtips={$backtips}&ssex={$ssex}".
"&susername=".urlencode($susername)."&semail=".urlencode($semail)."";
$this->pagesize = 10;
$searchsql = "";
if ($ssex>0) {
$searchsql .= " AND v.gender='{$ssex}'";
}
if (true === XValid::isUserArgs($susername)) {
$searchsql .= " AND v.username LIKE '".$susername."%'";
}
if (true === XValid::isEmail($semail)) {
$searchsql .= " AND v.email LIKE '".$semail."%'";
}
$model = parent::model('user','am');
list($total,$data) = $model->getSearchList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql));
$url = XRequest::getPhpSelf();
$url .= "?c=user&a=search&".$this->_urlitem;
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($total/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$total,
'showpage'=>XPage::admin($total,$this->pagesize,$this->page,$url,8),
'user'=>$data,
'ssex'=>$ssex,
'susername'=>$susername,
'semail'=>$semail,
'urlitem'=>$this->_urlitem,
'backinput'=>$backinput,
'backtips'=>$backtips,
);
unset($model);
TPL::assign($var_array);
TPL::display($this->cptpl.'user_search.tpl');
}
public function control_add() {
$this->checkAuth('user_add');
parent::loadLib('mod');
$var_array = array(
'group_select'=>XMod::selectUserGroup('','groupid'),
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
public function control_saveadd() {
$this->checkAuth('user_add');
$service = parent::service('user','as');
list($main_args,$profile_args,$contact_args,$params_args) = $service->validAdd();
unset($service);
$model = parent::model('user','am');
if (true === $model->doExistsUserName($main_args['username'])) {
XHandle::halt('该用户名已存在，请使用另外一个。','',1);
}
if (true === $model->doExistsEmail($main_args['email'])) {
XHandle::halt('该邮箱已被注册，请填写另外一个。','',1);
}
$uc_model = parent::model('uc','im');
$uc_result = $uc_model->inteReg($main_args['username'],$main_args['password'],$main_args['email']);
if ($uc_result <0) {
XHandle::halt('注册失败，UC已经存在该用户或者UC用户名格式不正确！','',1);
}
unset($uc_model);
$result = $model->doAdd($main_args,$profile_args,$contact_args,$params_args);
unset($model);
if (true === $result) {
$this->log('user_add',"用户名(".$main_args['username'].")",1);
XHandle::halt('添加成功',$this->cpfile.'?c=user',0);
}
else {
$this->log('user_add',"用户名(".$main_args['username'].")",0);
XHandle::halt('添加失败','',1);
}
}
public function control_edit() {
$this->checkAuth('user_edit');
$this->_getListItems();
$id = XRequest::getInt('id');
$this->_validID($id);
$model = parent::model('user','am');
$data = $model->getData($id);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
parent::loadLib('mod');
$group_select = XMod::selectUserGroup($data['groupid'],'groupid');
$var_array = array(
'user'=>$data,
'id'=>$id,
'page'=>$this->page,
'comeurl'=>$this->_comeurl,
'group_select'=>$group_select,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
}
public function control_saveedit() {
$this->checkAuth('user_edit');
$this->_getListItems();
$service = parent::service('user','as');
list($id,$main_args,$profile_args,$contact_args,$params_args) = $service->validEdit();
unset($service);
$model = parent::model('user','am');
$result = $model->doEdit($id,$main_args,$profile_args,$contact_args,$params_args);
unset($model);
if (true === $result) {
$this->log('user_edit',"userid=".$id."",1);
XHandle::halt('编辑成功',$this->cpfile.'?c=user&a=edit&id='.$id.'&'.$this->_comeurl.'',0);
}
else {
$this->log('user_edit',"userid=".$id."",0);
XHandle::halt('编辑失败','',1);
}
}
public function control_view() {
$this->checkAuth('user_view');
$service = parent::service('user','as');
$id = $service->validID();
unset($service);
$model = parent::model('user','am');
$data = $model->getData($id);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
$vip_array = $model->handleVipValid($data['groupid'],$data['vipenddate']);
$data = array_merge($data,$vip_array);
$var_array = array(
'user'=>$data,
'id'=>$id,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
unset($model);
}
public function control_del() {
$this->checkAuth('user_del');
$this->_getListItems();
$array_id = XRequest::getArray('id');
$this->_validID($array_id);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doDel($id);
}
unset($model);
if (true === $result) {
$this->log('user_del',"uid={$array_id}",1);
XHandle::halt('删除成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
else {
$this->log('user_del',"uid={$array_id}",0);
XHandle::halt('删除失败','',1);
}
}
public function control_update() {
$this->checkAuth('user_edit');
$args = XRequest::getGpc(array('id','type'));
$model = parent::model('user','am');
$model->doUpdate(intval($args['id']),trim($args['type']));
unset($model);
}
public function control_editpass() {
$this->checkAuth('user_edit');
$this->_getListItems();
$userid = XRequest::getInt('userid');
$this->_validID($userid);
$model = parent::model('user','am');
$data = $model->getData($userid);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
$var_array = array(
'user'=>$data,
'userid'=>$userid,
'comeurl'=>$this->_comeurl,
'fromtype'=>$this->fromtype,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
}
public function control_savepassword() {
$this->checkAuth('user_edit');
$this->fromtype = XRequest::getArgs('fromtype');
$service = parent::service('user','as');
list($userid,$password) = $service->validEditPassword();
unset($service);
$model = parent::model('user','am');
$result = $model->doEditPassword($userid,$password);
$uc_model = parent::model('uc','im');
$uc_model->inteEditPassword($model->getUserByName($userid),$password);
unset($uc_model);
unset($model);
if (true === $result) {
$this->log('',"修改会员密码,uid={$userid}",1);
if ($this->fromtype == 'jdbox') {
XHandle::tbDialog('密码修改成功',0);
}
else {
XHandle::halt('编辑成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
}
else {
$this->log('',"修改会员密码,uid={$userid}",0);
XHandle::halt('编辑失败','',1);
}
}
public function control_monolog() {
$this->checkAuth('user_edit');
$this->_getSimpleItems();
$userid = XRequest::getInt('userid');
$this->_validID($userid);
$model = parent::model('user','am');
$data = $model->getData($userid);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
$var_array = array(
'user'=>$data,
'userid'=>$userid,
'comeurl'=>$this->_comeurl,
'fromtype'=>$this->fromtype,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
}
public function control_savemonolog() {
$this->checkAuth('user_edit');
$this->_getSimpleItems();
$service = parent::service('user','as');
list($userid,$args) = $service->validEditMonolog();
unset($service);
$model = parent::model('user','am');
$result = $model->doEditMonolog($userid,$args);
unset($model);
if (true === $result) {
$this->log('',"审核内心独白,uid={$userid}",1);
if ($this->fromtype == 'jdbox') {
XHandle::tbDialog('操作成功',0);
}
else {
XHandle::halt('编辑成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
}
else {
$this->log('',"审核内心独白,uid={$userid}",0);
XHandle::halt('编辑失败','',1);
}
}
public function control_rzmanage() {
$this->checkAuth('user_edit');
$this->_getListItems();
$userid = XRequest::getInt('userid');
$this->_validID($userid);
$model = parent::model('user','am');
$data = $model->getData($userid);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
$var_array = array(
'user'=>$data,
'userid'=>$userid,
'comeurl'=>$this->_comeurl,
'fromtype'=>$this->fromtype,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
}
public function control_saverz() {
$this->checkAuth('user_edit');
$this->fromtype = XRequest::getArgs('fromtype');
$service = parent::service('user','as');
list($userid,$args) = $service->validEditrz();
unset($service);
$model = parent::model('user','am');
$result = $model->doEditRz($userid,$args);
unset($model);
if (true === $result) {
$this->log('',"修改认证项目,uid={$userid}",1);
if ($this->fromtype == 'jdbox') {
XHandle::tbDialog('操作成功',0);
}
else {
XHandle::halt('编辑成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
}
else {
$this->log('',"修改认证项目,uid={$userid}",0);
XHandle::halt('编辑失败','',1);
}
}
public function control_vip() {
$this->checkAuth('user_vip');
$this->_getListItems();
$userid = XRequest::getInt('userid');
$this->_validID($userid);
$model = parent::model('user','am');
$data = $model->getData($userid);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
$m = parent::model('usergroup','am');
$group = $m->getVipGroupList();
unset($m);
$var_array = array(
'user'=>$data,
'userid'=>$userid,
'comeurl'=>$this->_comeurl,
'fromtype'=>$this->fromtype,
'group'=>$group,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
}
public function control_vipopen() {
$this->checkAuth('user_vip');
$this->fromtype = XRequest::getArgs('fromtype');
$service = parent::service('user','as');
list($userid,$args) = $service->validOpen();
unset($service);
$model = parent::model('user','am');
$result = $model->doOpenVip($userid,$args);
unset($model);
if (true === $result) {
$this->log('user_vip',"uid={$userid}",1);
if ($this->fromtype == 'jdbox') {
XHandle::tbDialog('操作成功',1);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
}
else {
$this->log('user_vip',"uid={$userid}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_viphandle() {
$this->checkAuth('user_vip');
$this->fromtype = XRequest::getArgs('fromtype');
$service = parent::service('user','as');
list($userid,$args) = $service->validHandle();
unset($service);
$model = parent::model('user','am');
$result = $model->doHandleVip($userid,$args);
unset($model);
if (true === $result) {
$this->log('user_vip',"uid={$userid}",1);
if ($this->fromtype == 'jdbox') {
XHandle::tbDialog('操作成功',1);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
}
else {
$this->log('user_vip',"uid={$userid}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_vipcancel() {
$this->checkAuth('user_vip');
$this->fromtype = XRequest::getArgs('fromtype');
$service = parent::service('user','as');
list($userid,$returnmoney,$cancelcontent) = $service->validCancel();
unset($service);
$model = parent::model('user','am');
$result = $model->doCancelVip($userid,$returnmoney,$cancelcontent);
unset($model);
if (true === $result) {
$this->log('user_vip',"uid={$userid}",1);
if ($this->fromtype == 'jdbox') {
XHandle::tbDialog('操作成功',1);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&'.$this->_comeurl.'',0);
}
}
else {
$this->log('user_vip',"uid={$userid}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_avatar() {
$this->checkAuth('user_edit');
$id = XRequest::getInt('id');
$this->_validID($id);
$model = parent::model('user','am');
$data = $model->getData($id);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
$var_array = array(
'user'=>$data,
'id'=>$id,
'page'=>$this->page,
'fromtype'=>'jdbox',
);
TPL::assign($var_array);
TPL::display($this->cptpl.'user.tpl');
}
}
public function control_unpassavatar() {
$this->checkAuth('user_edit');
$this->_getSimpleItems();
$service = parent::service('user','as');
$array_id = $service->validArrayID();
unset($service);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doUnPassAvatar($id);
}
unset($model);
if (true === $result) {
$this->log('',"审核头像[未通过],uid={$array_id}",1);
if ($this->fromtype == 'jdbox') {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=avatar&id='.$id.'&fromtype=jdbox',0);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=penyavatar&'.$this->_comeurl,0);
}
}
else {
$this->log('',"审核头像[未通过],uid={$array_id}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_passavatar() {
$this->checkAuth('user_edit');
$this->_getSimpleItems();
$service = parent::service('user','as');
$array_id = $service->validArrayID();
unset($service);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doPassAvatar($id);
}
unset($model);
if (true === $result) {
$this->log('',"审核头像[通过],uid={$array_id}",1);
if ($this->fromtype == 'jdbox') {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=avatar&id='.$id.'&fromtype=jdbox',0);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=penyavatar&'.$this->_comeurl,0);
}
}
else {
$this->log('',"审核头像[通过],uid={$array_id}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_delavatar() {
$this->checkAuth('user_edit');
$this->_getSimpleItems();
$service = parent::service('user','as');
$array_id = $service->validArrayID();
unset($service);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doDelAvatar($id);
}
unset($model);
if (true === $result) {
$this->log('',"删除形象照,uid={$array_id}",1);
if ($this->fromtype == 'jdbox') {
XHandle::halt('删除成功',$this->cpfile.'?c=user&a=avatar&id='.$id.'&fromtype=jdbox',0);
}
else {
XHandle::halt('头像删除成功',$this->cpfile.'?c=user&a=penyavatar',0);
}
}
else {
$this->log('',"删除形象照,uid={$array_id}",0);
XHandle::halt('头像删除失败','',1);
}
}
public function control_unpassmonolog() {
$this->checkAuth('user_edit');
$service = parent::service('user','as');
$array_id = $service->validArrayID();
unset($service);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doUnPassMonolog($id);
}
unset($model);
if (true === $result) {
$this->log('',"审核独白[未通过],uid={$array_id}",1);
if ($this->fromtype == 'jdbox') {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=monolog&id='.$id.'&fromtype=jdbox',0);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=penymonolog&'.$this->_comeurl,0);
}
}
else {
$this->log('',"审核独白[未通过],uid={$array_id}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_passmonolog() {
$this->checkAuth('user_edit');
$service = parent::service('user','as');
$array_id = $service->validArrayID();
unset($service);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doPassMonolog($id);
}
unset($model);
if (true === $result) {
$this->log('',"审核独白[通过],uid={$array_id}",1);
if ($this->fromtype == 'jdbox') {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=monolog&id='.$id.'&fromtype=jdbox',0);
}
else {
XHandle::halt('操作成功',$this->cpfile.'?c=user&a=penymonolog&'.$this->_comeurl,0);
}
}
else {
$this->log('',"审核独白[通过],uid={$array_id}",0);
XHandle::halt('操作失败','',1);
}
}
public function control_delMonolog() {
$this->checkAuth('user_edit');
$service = parent::service('user','as');
$array_id = $service->validArrayID();
unset($service);
$model = parent::model('user','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doDelMonolog($id);
}
unset($model);
if (true === $result) {
$this->log('',"删除独白,uid={$array_id}",1);
if ($this->fromtype == 'jdbox') {
XHandle::halt('删除成功',$this->cpfile.'?c=user&a=monolog&id='.$id.'&fromtype=jdbox',0);
}
else {
XHandle::halt('删除成功',$this->cpfile.'?c=user&a=penymonolog&'.$this->_comeurl,0);
}
}
else {
$this->log('',"删除独白,uid={$array_id}",0);
XHandle::halt('删除失败','',1);
}
}
public function control_login() {
$service = parent::service('user','as');
$id = $service->validID();
unset($service);
$model = parent::model('user','am');
$result = $model->doLogin($id);
unset($model);
if (true === $result) {
XHandle::halt('登录成功',parent::$urlpath.'usercp.php',0);
}
else {
XHandle::halt('登录失败','',1);
}
}
private function _validID($id) {
if (empty($id)) {
XHandle::halt('ID丢失，请选择要操作的ID','',1);
}
}
}
?>