<?php
if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class indexbase extends X {
	public $appfile = '';
	public $pagesize = 30;
	public $page = 1;
	public $halttype = null;
	public $metawrap = null;
	public $login_infowrap = null;
	public $login_groupwrap = null;
	public function __construct() {
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
		$this->halttype = XRequest::getArgs ( 'halttype' );
		$this->appfile = PATH_URL . 'index.php';
		TPL::assign ( array (
				'a' => $GLOBALS ['a'],
				'appfile' => $this->appfile,
				'lang' => XLang::loadLang (),
				'halttype' => $this->halttype 
		) );
		$this->page = intval ( XRequest::getArgs ( 'page' ) );
		$this->page = $this->page < 1 ? 1 : $this->page;
	}
	public function baseInit() {
		$this->loadLoginStatus ();
		$this->_loadMenu ();
	}
	public function existsTplFile($tplname) {
		$tplfile = parent::$tplpath . OESOFT_TPLPRE . $tplname . '.tpl';
		if (! file_exists ( BASE_ROOT . './' . $tplfile )) {
			return false;
		} else {
			return true;
		}
	}
	public function getTPLFile($tplname) {
		$simplefile = parent::$tplpath . $tplname . '.tpl';
		$tplfile = parent::$tplpath . OESOFT_TPLPRE . $tplname . '.tpl';
		if (! file_exists ( BASE_ROOT . './' . $tplfile )) {
			XHandle::halt ( '模板文件[' . $simplefile . ']不存在，请检查！', '', 1 );
		} else {
			return $tplfile;
		}
	}
	public function loadLoginStatus() {
		$model_login = parent::model ( 'passport', 'im' );
		if (false === $model_login->checkLogin ()) {
			if($GLOBALS ['c'] == 'passport' || $GLOBALS ['c'] == 'about'){
				parent::$wrap_user ['userid'] = 0;
				$var_login = array (
						'login' => array (
								'status' => 0,
								'userid' => 0,
								'username' => '',
								'gender' => 0
						)
				);
			}else{
				if ($this->halttype == 'jdbox') {
					XHandle::redirect ( PATH_URL . 'index.php?c=passport&a=jdlogin' );
					die ();
				} else {
					XHandle::redirect ( PATH_URL . 'index.php?c=passport&a=login' );
					die ();
				}
			}
			
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
			unset ( $logininfo );
			unset ( $groupinfo );
		}
		TPL::assign ( $var_login );
		unset ( $model_login );
	}
	public function checkLogin() {
		$model_login = parent::model ( 'passport', 'im' );
		if (false === $model_login->checkLogin ()) {
			XHandle::redirect ( $this->appfile . '?c=passport&a=login' );
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
	public function validRegTime() {
		$rs = true;
		return $rs;
	}
}
?>