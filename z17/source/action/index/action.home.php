<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class homeIAction extends indexbase {
	private $service = null;
	private $_tplfile = null;
	private $uid = 0;
	private $_urlitem = null;
	private function _new() {
		$this->service = parent::service ( 'home', 'is' );
	}
	private function _unset() {
		unset ( $this->service );
	}
	private function _getItems() {
		if (intval ( parent::$cfg ['visithomepage'] ) == 1) {
			if (parent::$wrap_user ['userid'] == 0) {
				XHandle::redirect ( parent::$urlpath . 'index.php?c=passport&a=login' );
				die ();
			}
		}
		$this->_new ();
		$this->uid = $this->service->validUid ();
		$this->_unset ();
		$this->_urlitem = 'uid=' . $this->uid;
	}
	public function action_run() {
		$this->_getItems ();
		parent::loadLib ( 'mod', 'url' );
		$model = parent::model ( 'home', 'im' );
		$home = $model->getOneData ( $this->uid );
		if (empty ( $home )) {
			XHandle::halt ( '对不起，会员主页不存在或已禁止！', '', 1 );
		}
		$cond = $model->getCondData ( $this->uid );
		$this->getMeta ( 'ch_home_base' );
		$page_title = $this->metawrap ['title'];
		$page_description = $this->metawrap ['description'];
		$page_keyword = $this->metawrap ['keyword'];
		$meta_gender = $home ['gender'] == 1 ? XLang::get ( 'sex_male' ) : XLang::get ( 'sex_female' );
		$meta_age = $home ['age'] . XLang::get ( 'age' );
		$meta_province = XMod::getAreaName ( $home ['provinceid'] );
		$meta_city = XMod::getAreaName ( $home ['cityid'] );
		$meta_salary = XMod::getLoveParamter ( 'salary', $home ['salary'], 'text', '' );
		$meta_education = XMod::getLoveParamter ( 'education', $home ['education'], 'text', '' );
		$meta_marry = XMod::getLoveParamter ( 'marrystatus', $home ['marrystatus'], 'text', '' );
		$page_title = str_ireplace ( array ('{u.userid}', '{u.username}', '{u.gender}', '{u.age}', '{u.province}', '{u.city}', '{u.salary}', '{u.education}', '{u.marry}' ), array ($home ['userid'], $home ['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_title );
		$page_description = str_ireplace ( array ('{u.userid}', '{u.username}', '{u.gender}', '{u.age}', '{u.province}', '{u.city}', '{u.salary}', '{u.education}', '{u.marry}' ), array ($home ['userid'], $home ['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_description );
		$page_keyword = str_ireplace ( array ('{u.userid}', '{u.username}', '{u.gender}', '{u.age}', '{u.province}', '{u.city}', '{u.salary}', '{u.education}', '{u.marry}' ), array ($home ['userid'], $home ['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_keyword );
		$next_uid = $model->getNextID ( $this->uid );
		$previous_uid = $model->getPreviousID ( $this->uid );
		$next_url = $next_uid > 0 ? XUrl::getHomeUrl ( $next_uid ) : '';
		$previous_url = $previous_uid > 0 ? XUrl::getHomeUrl ( $previous_uid ) : '';
		unset ( $model );
		$var_array = array ('page_title' => $page_title, 'page_description' => $page_description, 'page_keyword' => $page_keyword, 'home' => $home, 'cond' => $cond, 'uid' => $this->uid, 'next_uid' => $next_uid, 'next_url' => $next_url, 'previous_uid' => $previous_uid, 'previous_url' => $previous_url );
		$listen_data = null;
		if (parent::$wrap_user ['userid'] > 0) {
			$model_listen = parent::model ( 'listen', 'um' );
			$listen_data = $model_listen->getListenInfo ( $this->uid, parent::$wrap_user ['userid'] );
			unset ( $model_listen );
		}
		$var_array ['listen'] = $listen_data;
		$this->_tplfile = $this->getTPLFile ( 'home_space' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_profile() {
		$this->_getItems ();
		parent::loadLib ( 'mod', 'url' );
		$model = parent::model ( 'home', 'im' );
		$home = $model->getOneData ( $this->uid );
		if (empty ( $home )) {
			XHandle::halt ( '对不起，会员主页不存在或已禁止！', '', 1 );
		}
		$cond = $model->getCondData ( $this->uid );
		$this->getMeta ( 'ch_home_profile' );
		$page_title = $this->metawrap ['title'];
		$page_description = $this->metawrap ['description'];
		$page_keyword = $this->metawrap ['keyword'];
		$meta_gender = $home ['gender'] == 1 ? XLang::get ( 'sex_male' ) : XLang::get ( 'sex_female' );
		$meta_age = $home ['age'] . XLang::get ( 'age' );
		$meta_province = XMod::getAreaName ( $home ['provinceid'] );
		$meta_city = XMod::getAreaName ( $home ['cityid'] );
		$meta_salary = XMod::getLoveParamter ( 'salary', $home ['salary'], 'text', '' );
		$meta_education = XMod::getLoveParamter ( 'education', $home ['education'], 'text', '' );
		$meta_marry = XMod::getLoveParamter ( 'marrystatus', $home ['marrystatus'], 'text', '' );
		$page_title = str_ireplace ( array ('{u.userid}', '{u.username}', '{u.gender}', '{u.age}', '{u.province}', '{u.city}', '{u.salary}', '{u.education}', '{u.marry}' ), array ($home ['userid'], $home ['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_title );
		$page_description = str_ireplace ( array ('{u.userid}', '{u.username}', '{u.gender}', '{u.age}', '{u.province}', '{u.city}', '{u.salary}', '{u.education}', '{u.marry}' ), array ($home ['userid'], $home ['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_description );
		$page_keyword = str_ireplace ( array ('{u.userid}', '{u.username}', '{u.gender}', '{u.age}', '{u.province}', '{u.city}', '{u.salary}', '{u.education}', '{u.marry}' ), array ($home ['userid'], $home ['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_keyword );
		$next_uid = $model->getNextID ( $this->uid );
		$previous_uid = $model->getPreviousID ( $this->uid );
		$next_url = $next_uid > 0 ? XUrl::getHomeUrl ( $next_uid ) : '';
		$previous_url = $previous_uid > 0 ? XUrl::getHomeUrl ( $previous_uid ) : '';
		unset ( $model );
		$var_array = array ('page_title' => $page_title, 'page_description' => $page_description, 'page_keyword' => $page_keyword, 'home' => $home, 'cond' => $cond, 'uid' => $this->uid, 'next_uid' => $next_uid, 'next_url' => $next_url, 'previous_uid' => $previous_uid, 'previous_url' => $previous_url );
		$listen_data = null;
		if (parent::$wrap_user ['userid'] > 0) {
			$model_listen = parent::model ( 'listen', 'um' );
			$listen_data = $model_listen->getListenInfo ( $this->uid, parent::$wrap_user ['userid'] );
			unset ( $model_listen );
		}
		$var_array ['listen'] = $listen_data;
		$this->_tplfile = $this->getTPLFile ( 'home_profile' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
}
?>