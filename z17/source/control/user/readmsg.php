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
	
	public function control_run() {}
	
	public function control_read() {
		$this->_getItems();
		$service = parent::service('readmsg','us');
		$id = $service->validID();
		unset($service);
		$model = parent::model('readmsg','um');
		$data = $model->getOneMsg($id);
		if (empty($data)) {
			XHandle::halt('对不起，该信件不存在或者已删除！','',1);
		}
		else {
			if ($data['readflag'] == 0) {
				var_dump($this->g['msg']);
				$m = parent::model('message','um');
				$needpay = $m->checkViewNeedPay($data['frominfo']['gender'],$this->g['msg']);
				unset($m);
				if (true === $needpay) {
					XHandle::redirect($this->ucfile.'?c=message&'.$this->_comeurl);
				}
				else {
					$model->doReadMsg($id,$data['frominfo']['userid'],$data['frominfo']['gender'],$this->g['msg']);
				}
			}
			$var_array = array(
					'id'=>$id,
					'message'=>$data,
					'page_title'=>$this->getTitle('message_view'),
					'previous_id'=>$model->getPreviousID($id),
					'next_id'=>$model->getNextID($id),
					'comeurl'=>$this->_comeurl,
				);
			TPL::assign($var_array);
			TPL::display($this->uctpl.'message_read.tpl');
		}
	unset($model);
	}
}
?>