<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class control extends userbase {
public function control_run() {
$searchsql = '';
$model = parent::model('fans','um');
list($datacount,$data) = $model->getList(array('page'=>$this->page,'pagesize'=>$this->pagesize,'searchsql'=>$searchsql));
unset($model);
$url = XRequest::getPhpSelf();
$url .= '?c=fans';
$var_array = array(
'page'=>$this->page,
'nextpage'=>$this->page+1,
'prepage'=>$this->page-1,
'pagecount'=>ceil($datacount/$this->pagesize),
'pagesize'=>$this->pagesize,
'total'=>$datacount,
'showpage'=>XPage::user($datacount,$this->pagesize,$this->page,$url),
'fans'=>$data,
'page_title'=>$this->getTitle('fans_run'),
);
TPL::assign($var_array);
TPL::display($this->uctpl.'fans.tpl');
}
}
?>