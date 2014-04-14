<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class control extends adminbase {
private $_comeurl = NUll;
private $_urlitem = NULL;
private $scatid = NULL;
private $suserid = 0;
private $stype = NULL;
private $stitle = NULL;
public function __construct() {
$this->control();
}
private function control() {
parent::__construct();
$this->checkLogin();
}
private function _getItems() {
$this->scatid = XRequest::getInt('scatid');
$this->suserid = XRequest::getInt('suserid');
$this->stype = XRequest::getGpc('stype');
$this->stitle = XRequest::getGpc('stitle');
$this->_urlitem = "scatid=".$this->scatid."&suserid=".$this->suserid.
"&stype=".$this->stype."&stitle=".urlencode($this->stitle)."";
$this->_comeurl = $this->_urlitem."&page=".$this->page."";
}
public function control_run() {
$this->checkAuth('diary_volist');
$this->_getItems();
$searchsql = "";
if ($this->scatid>0) {
$searchsql .= " AND v.catid='".$this->scatid."'";
}
if ($this->suserid >0) {
$searchsql .= " AND v.userid='{$this->suserid}'";
}
if (!empty($this->stitle)) {
$searchsql .= " AND v.title LIKE '{$this->stitle}%'";
}
if ($this->stype == 'audit') {
$searchsql .= " AND v.flag='0'";
}
if ($this->stype == 'audited') {
$searchsql .= " AND v.flag='1'";
}
$model = parent::model('diary','am');
list($total,$data) = $model->getList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql));
unset($model);
$url = XRequest::getPhpSelf();
$url .= '?c=diary&'.$this->_urlitem;
parent::loadLib('mod');
$category_select = XMod::selectDiaryCategory($this->scatid,'scatid');
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
'scatid'=>$this->scatid,
'susername'=>$this->susername,
'suserid'=>$this->suserid,
'stype'=>$this->stype,
'stitle'=>$this->stitle,
'diary'=>$data,
'category_select'=>$category_select,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'diary.tpl');
}
public function control_add() {
$this->checkAuth('diary_add');
parent::loadLib('mod');
$category_select = XMod::selectDiaryCategory('','catid');
$var_array = array(
'category_select'=>$category_select,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'diary.tpl');
}
public function control_edit() {
$this->checkAuth('diary_edit');
$id = XRequest::getInt('id');
$this->_validID($id);
$this->_getItems();
$model = parent::model('diary','am');
$data = $model->getData($id);
unset($model);
if (empty($data)) {
XHandle::halt('对不起，读取数据不存在！','',1);
}
else {
parent::loadLib('mod');
$category_select = XMod::selectDiaryCategory($data['catid'],'catid');
$var_array = array(
'diary'=>$data,
'id'=>$id,
'page'=>$this->page,
'comeurl'=>$this->_comeurl,
'category_select'=>$category_select,
);
TPL::assign($var_array);
TPL::display($this->cptpl.'diary.tpl');
}
}
public function control_saveadd() {
$this->checkAuth('diary_add');
$args = $this->_validAdd();
$model = parent::model('diary','am');
$result = $model->doAdd($args);
unset($model);
if (true === $result) {
$this->log('diary_add','',1);
XHandle::halt('添加成功',$this->cpfile.'?c=diary',0);
}
else {
$this->log('diary_add','',0);
XHandle::halt('添加失败','',1);
}
}
public function control_saveedit() {
$this->checkAuth('diary_edit');
$this->_getItems();
list($id,$args) = $this->_validEdit();
$model = parent::model('diary','am');
$result = $model->doEdit($id,$args);
unset($model);
if (true === $result) {
$this->log('diary_edit','id='.$id.'',1);
XHandle::halt('编辑成功',$this->cpfile.'?c=diary&'.$this->_comeurl.'',0);
}
else {
$this->log('diary_edit','id='.$id.'',0);
XHandle::halt('编辑失败','',1);
}
}
public function control_del() {
$this->checkAuth('diary_del');
$array_id = XRequest::getArray('id');
$this->_validID($array_id);
$model = parent::model('diary','am');
for($ii=0;$ii<count($array_id);$ii++){
$id = intval($array_id[$ii]);
$result = $model->doDel($id);
}
unset($model);
if (true === $result) {
$this->log('diary_del','id='.$array_id.'',1);
XHandle::halt('删除成功',$this->cpfile.'?c=diary',0);
}
else {
$this->log('diary_del','id='.$array_id.'',0);
XHandle::halt('删除失败','',1);
}
}
public function control_update() {
$this->checkAuth('diary_edit');
$args = XRequest::getGpc(array('id','type'));
$model = parent::model('diary','am');
$model->doUpdate(intval($args['id']),trim($args['type']));
unset($model);
}
private function _validAdd() {
$args = XRequest::getGpc(array(
'userid','catid','weather','feel','title',
'thumbfiles','uploadfiles','hits','flag','elite',
'diaryopen','content',
));
$args['userid'] = intval($args['userid']);
$args['catid'] = intval($args['catid']);
if ($args['userid']<1) {
XHandle::halt('请选择会员','',1);
}
if ($args['catid']<1) {
XHandle::halt('请选择所属分类','',1);
}
if (empty($args['title'])) {
XHandle::halt('标题不能为空','',1);
}
if (empty($args['content'])) {
XHandle::halt('内容不能为空','',1);
}
if (!empty($args['uploadfiles'])) {
if (!file_exists(BASE_ROOT.'./'.$args['thumbfiles'])) {
$args['thumbfiles'] = $args['uploadfiles'];
}
}
$args['weather'] = intval($args['weather']);
$args['feel'] = intval($args['feel']);
$args['hits'] = intval($args['hits']);
$args['flag'] = intval($args['flag']);
$args['elite'] = intval($args['elite']);
$args['diaryopen'] = intval($args['diaryopen']);
return $args;
}
private function _validEdit() {
$id = XRequest::getInt('id');
$args = XRequest::getGpc(array(
'userid','catid','weather','feel','title',
'thumbfiles','uploadfiles','hits','flag','elite',
'diaryopen','content',
));
if ($id<1) {
XHandle::halt('ID丢失','',1);
}
$args['userid'] = intval($args['userid']);
$args['catid'] = intval($args['catid']);
if ($args['userid']<1) {
XHandle::halt('请选择会员','',1);
}
if ($args['catid']<1) {
XHandle::halt('请选择所属分类','',1);
}
if (empty($args['title'])) {
XHandle::halt('标题不能为空','',1);
}
if (empty($args['content'])) {
XHandle::halt('内容不能为空','',1);
}
if (!empty($args['uploadfiles'])) {
if (!file_exists(BASE_ROOT.'./'.$args['thumbfiles'])) {
$args['thumbfiles'] = $args['uploadfiles'];
}
}
$args['weather'] = intval($args['weather']);
$args['feel'] = intval($args['feel']);
$args['hits'] = intval($args['hits']);
$args['flag'] = intval($args['flag']);
$args['elite'] = intval($args['elite']);
$args['diaryopen'] = intval($args['diaryopen']);
return array($id,$args);
}
private function _validID($id) {
if (empty($id)) {
XHandle::halt('ID丢失，请选择要操作的ID','',1);
}
}
}
?>