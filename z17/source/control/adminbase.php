<?php
if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class adminbase extends X {
	public $db;
	public $cpfile;
	public $cptpl;
	public $pagesize = 30;
	public $page = 1;
	public function __construct() {
		$this->db = parent::$obj;
		$this->cpfile = __ADMIN_FILE__;
		$this->cptpl = 'tpl/' . __ADMIN_TPLDIR__ . '/';
		$this->page = intval ( XRequest::getArgs ( 'page' ) );
		if ($this->page < 1) {
			$this->page = 1;
		}
		TPL::assign ( array (
				'a' => $GLOBALS ['a'],
				'lang' => XLang::loadLang () 
		) );
	}
	public function checkLogin() {
		$pass = parent::model ( 'login', 'am' );
		if (false === $pass->checkLogin ()) {
			XHandle::redirect ( $this->cpfile . '?c=login' );
		}
		unset ( $pass );
	}
	public function checkAuth($value) {
		$auth = parent::model ( 'login', 'am' );
		$auth->checkAuth ( $value );
		unset ( $auth );
	}
	public function log($em, $oplog = '', $result = 1) {
		require_once BASE_ROOT . './source/roll/elements.php';
		$emarray = array ();
		$emarray = roll_get_em_array ();
		$log_string = '';
		if (! empty ( $em )) {
			$log_string = $emarray [$em];
		}
		if (! empty ( $oplog )) {
			$log_string .= ! empty ( $log_string ) ? '-' . $oplog : $oplog;
		}
		if (! empty ( $log_string )) {
			$logid = parent::$obj->fetch_newid ( "SELECT MAX(logid) FROM " . DB_PREFIX . "log", 1 );
			$log_array = array (
					'logid' => $logid,
					'opuser' => parent::$wrap_admin ['adminname'],
					'ip' => XRequest::getip (),
					'content' => $log_string,
					'logtype' => 1,
					'timeline' => time (),
					'success' => $result 
			);
			parent::$obj->insert ( DB_PREFIX . 'log', $log_array );
			unset ( $log_array );
		}
	}
}
?>