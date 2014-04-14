<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends userbase {
public function control_run() {
$searchsql = '';
$model = parent::model('black','um');
list($datacount,$data) = $model->getList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql));
$url = XRequest::getPhpSelf();
$url .= '?c=black';
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>XPage::user($datacount,$this->pagesize,$this->page,$url),
'black'=>$data,
'page_title'=>$this->getTitle('black_run'),
);
unset($model);
TPL::assign($var_array);
TPL::display($this->uctpl.'black.tpl');
}
public function control_del() {
$id = XRequest::getArgs('id');
if (false === XValid::isNumber($id) ||$id <1) {
XHandle::halt('ID丢失','',1);
}
$model = parent::model('black','um');
$result = $model->doDel($id);
unset($model);
if (true === $result) {
XHandle::halt('删除成功',$this->ucfile.'?c=black',0);
}
else {
XHandle::halt('删除失败','',1);
}
}
}
?>