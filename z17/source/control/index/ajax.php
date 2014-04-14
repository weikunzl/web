<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class control {
	private $action = null;
	private function _new() {
		$this->action = X::action ( 'ajax', 'ia' );
	}
	private function _unset() {
		unset ( $this->action );
	}
	public function control_checkemail() {
		$this->_new ();
		$this->action->action_checkemail ();
		$this->_unset ();
	}
	public function control_checkuser() {
		$this->_new ();
		$this->action->action_checkuser ();
		$this->_unset ();
	}
	public function control_checkcode() {
		$this->_new ();
		$this->action->action_checkcode ();
		$this->_unset ();
	}
	public function control_fetchcity() {
		$this->_new ();
		$this->action->action_fetchcity ();
		$this->_unset ();
	}
	public function control_fetchdist() {
		$this->_new ();
		$this->action->action_fetchdist ();
		$this->_unset ();
	}
	public function control_hometown() {
		$this->_new ();
		$this->action->action_hometown ();
		$this->_unset ();
	}
	public function control_hits() {
		$this->_new ();
		$this->action->action_hits ();
		$this->_unset ();
	}
	public function control_diarycomment() {
		$this->_new ();
		$this->action->action_diarycomment ();
		$this->_unset ();
	}
	public function control_setavatar() {
		$this->_new ();
		$this->action->action_setavatar ();
		$this->_unset ();
	}
	public function control_visithome() {
		$this->_new ();
		$this->action->action_visithome ();
		$this->_unset ();
	}
	public function control_sendmailkey() {
		$this->_new ();
		$this->action->action_sendmailkey ();
		$this->_unset ();
	}
}
?>