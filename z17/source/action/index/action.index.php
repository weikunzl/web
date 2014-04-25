<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class indexIAction extends indexbase {
	private $service = null;
	private $_tplfile = null;
	public function action_run() {
		$this->getMeta ( 'ch_index' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_description' => $this->metawrap ['description'], 'page_keyword' => $this->metawrap ['keyword'] );
		$this->_tplfile = $this->getTPLFile ( 'index' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_cpa() {
		$tuid = XRequest::getInt ( 'tuid' );
		$model_pm = parent::model ( 'cpa', 'im' );
		$url = $model_pm->doCpa ( $tuid );
		unset ( $model_pm );
		$url = empty ( $url ) ? parent::$urlpath : $url;
		XHandle::redirect ( $url );
	}
}
?>