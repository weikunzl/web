<?php
if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class wapbase extends X {
	public $wapfile = '';
	public $waptpl = 'tpl/wap/';
	public $wapskin = 'tpl/wap/';
	public $pagesize = 10;
	public $page = 1;
	public $metawrap = null;
	public $login_infowrap = null;
	public $login_groupwrap = null;
	public $skinid = 8;
	public function __construct() {
		$this->wapskin = PATH_URL . $this->wapskin;
		$this->getBaseParams ();
		$this->baseInit ();
	}
	public function __get($property_name) {
		if (isset ( $property_name )) {
			return $this->$property_name;
		} else {
			return false;
		}
	}
	public function __set($property_name, $value) {
		$this->$property_name = $value;
	}
	public function getBaseParams() {
		$this->wapfile = PATH_URL . 'wap.php';
		$this->skinid = $this->_getSkinID ();
		TPL::assign ( array (
				'a' => $GLOBALS ['a'],
				'wapfile' => $this->wapfile,
				'lang' => XLang::loadLang (),
				'wapskin' => $this->wapskin,
				'waptpl' => $this->waptpl,
				'time' => time (),
				'xmlhead' => "<?xml version='1.0' encoding='UTF-8'?>",
				'skinid' => $this->skinid 
		) );
		$this->page = intval ( XRequest::getArgs ( 'page' ) );
		$this->page = $this->page < 1 ? 1 : $this->page;
	}
	public function baseInit() {
		$this->loadLoginStatus ();
		$this->_loadMenu ();
	}
	public function existsTplFile($tplname) {
		$tplfile = $this->waptpl . $tplname . '.tpl';
		if (! file_exists ( BASE_ROOT . './' . $tplfile )) {
			return false;
		} else {
			return true;
		}
	}
	public function getTPLFile($tplname) {
		$tplfile = $this->waptpl . $tplname . '.tpl';
		if (! file_exists ( BASE_ROOT . './' . $tplfile )) {
			XHandle::wapError ( 'Wap模板文件[' . $tplfile . ']不存在，请检查！' );
		} else {
			return $tplfile;
		}
	}
	public function loadLoginStatus() {
		$model_login = parent::model ( 'passport', 'im' );
		if (false === $model_login->checkLogin ()) {
			parent::$wrap_user ['userid'] = 0;
			$var_login = array (
					'login' => array (
							'status' => 0,
							'userid' => 0,
							'username' => '',
							'gender' => 0 
					) 
			);
		} else {
			list ( $logininfo, $groupinfo ) = $model_login->getLoginUserInfo ( parent::$wrap_user ['userid'] );
			$var_login = array (
					'login' => array (
							'status' => 1,
							'userid' => parent::$wrap_user ['userid'],
							'username' => parent::$wrap_user ['username'],
							'gender' => parent::$wrap_user ['gender'],
							'info' => $logininfo,
							'group' => $groupinfo 
					) 
			);
			$this->login_groupwrap = $groupinfo;
			$this->login_infowrap = $logininfo;
			unset ( $logininfo, $groupinfo );
		}
		TPL::assign ( $var_login );
		unset ( $model_login );
	}
	public function checkLogin() {
		$model_login = parent::model ( 'passport', 'im' );
		if (false === $model_login->checkLogin ()) {
			XHandle::redirect ( $this->wapfile . '?c=passport&a=login' );
		}
		unset ( $model_login );
	}
	public function getMeta($idmark) {
		$model_seo = parent::model ( 'seo', 'im' );
		$data = $model_seo->getOneData ( $idmark );
		unset ( $model_seo );
		$this->metawrap = $data;
		return $data;
	}
	public function _loadMenu() {
		$model_seo = parent::model ( 'seo', 'im' );
		$model_seo->loadChLabel ();
		unset ( $model_seo );
	}
	private function _getSkinID() {
		parent::loadUtil ( 'cookie' );
		$styleid = intval ( XCookie::get ( 'styleid' ) );
		if ($styleid < 1) {
			$styleid = 8;
		}
		return $styleid;
	}
	public function validRegTime() {
		$time = time ();
		$regtime = $this->login_infowrap ['regtime'];
		if (($time - $regtime) > 60 * 5) {
			return false;
		} else {
			return true;
		}
	}
}
?>