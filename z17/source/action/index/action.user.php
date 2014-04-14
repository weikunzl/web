<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class userIAction extends indexbase {
	private $service = null;
	private $_tplfile = null;
	private $type = null;
	private $s_uid = 0;
	private $s_username = null;
	private $s_sex = 0;
	private $s_sage = 0;
	private $s_eage = 0;
	private $s_dist1 = 0;
	private $s_dist2 = 0;
	private $s_dist3 = 0;
	private $s_lovesort = 0;
	private $s_sheight = 0;
	private $s_eheight = 0;
	private $s_ssalary = 0;
	private $s_esalary = 0;
	private $s_sedu = 0;
	private $s_eedu = 0;
	private $s_marry = null;
	private $s_havechild = null;
	private $s_house = 0;
	private $s_car = 0;
	private $s_avatar = 0;
	private $s_jobs = 0;
	private $comsql = null;
	private $countsql = null;
	private $_urlitem = null;
	private function _new() {
		$this->service = parent::service ( 'user', 'is' );
	}
	private function _unset() {
		unset ( $this->service );
	}
	private function _getListItems() {
		$this->_new ();
		$this->type = $this->service->validType ();
		$this->s_uid = $this->service->validUid ();
		$this->s_username = $this->service->validUserName ();
		list ( $this->comsql, $this->countsql, $args ) = $this->service->validSearch ();
		if (is_array ( $args )) {
			$this->s_sex = intval ( $args ['s_sex'] );
			$this->s_sage = intval ( $args ['s_sage'] );
			$this->s_eage = intval ( $args ['s_eage'] );
			$this->s_dist1 = intval ( $args ['s_dist1'] );
			$this->s_dist2 = intval ( $args ['s_dist2'] );
			$this->s_dist3 = intval ( $args ['s_dist3'] );
			$this->s_lovesort = intval ( $args ['s_lovesort'] );
			$this->s_sheight = intval ( $args ['s_sheight'] );
			$this->s_eheight = intval ( $args ['s_eheight'] );
			$this->s_ssalary = intval ( $args ['s_ssalary'] );
			$this->s_esalary = intval ( $args ['s_esalary'] );
			$this->s_sedu = intval ( $args ['s_sedu'] );
			$this->s_eedu = intval ( $args ['s_eedu'] );
			$this->s_marry = trim ( $args ['s_marry'] );
			$this->s_havechild = trim ( $args ['s_havechild'] );
			$this->s_house = intval ( $args ['s_house'] );
			$this->s_car = intval ( $args ['s_car'] );
			$this->s_avatar = intval ( $args ['s_avatar'] );
			$this->s_jobs = intval ( $args ['s_jobs'] );
		}
		if ($this->type == 'more') {
			$this->_tplfile = $this->getTPLFile ( 'user_list_more' );
		} else {
			$this->_tplfile = $this->getTPLFile ( 'user_list' );
		}
		if ($this->s_sex > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_sex=' . $this->s_sex : 's_sex=' . $this->s_sex;
		}
		if ($this->s_sage > 0 && $this->s_eage > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_sage=' . $this->s_sage . '&s_eage=' . $this->s_eage : 's_sage=' . $this->s_sage . '&s_eage=' . $this->s_eage;
		}
		if ($this->s_dist1 > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_dist1=' . $this->s_dist1 : 's_dist1=' . $this->s_dist1;
		}
		if ($this->s_dist2 > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_dist2=' . $this->s_dist2 : 's_dist2=' . $this->s_dist2;
		}
		if ($this->s_dist3 > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_dist3=' . $this->s_dist3 : 's_dist3=' . $this->s_dist3;
		}
		if ($this->s_lovesort > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_lovesort=' . $this->s_lovesort : 's_lovesort=' . $this->s_lovesort;
		}
		if ($this->s_sheight > 0 && $this->s_eheight > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_sheight=' . $this->s_sheight . '&s_eheight=' . $this->s_eheight : 's_sheight=' . $this->s_sheight . '&s_eheight=' . $this->s_eheight;
		}
		if ($this->s_ssalary > 0 && $this->s_esalary > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_ssalary=' . $this->s_ssalary . '&s_esalary=' . $this->s_esalary : 's_ssalary=' . $this->s_ssalary . '&s_esalary=' . $this->s_esalary;
		}
		if ($this->s_sedu > 0 && $this->s_eedu > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_sedu=' . $this->s_sedu . '&s_eedu=' . $this->s_eedu : 's_sedu=' . $this->s_sedu . '&s_eedu=' . $this->s_eedu;
		}
		if (! empty ( $this->s_marry )) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_marry=' . $this->s_marry : 's_marry=' . $this->s_marry;
		}
		if (! empty ( $this->s_havechild )) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_havechild=' . $this->s_havechild : 's_havechild=' . $this->s_havechild;
		}
		if ($this->s_house > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_house=' . $this->s_house : 's_house=' . $this->s_house;
		}
		if ($this->s_car > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_car=' . $this->s_car : 's_car=' . $this->s_car;
		}
		if ($this->s_jobs > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_jobs=' . $this->s_jobs : 's_jobs=' . $this->s_jobs;
		}
		if ($this->s_avatar > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_avatar=' . $this->s_avatar : 's_avatar=' . $this->s_avatar;
		}
		if ($this->s_uid > 0) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_uid=' . $this->s_uid : 's_uid=' . $this->s_uid;
		}
		if (true === XValid::isUserArgs ( $this->s_username )) {
			$this->_urlitem .= ! empty ( $this->_urlitem ) ? '&s_username=' . urlencode ( $this->s_username ) : 's_username=' . urlencode ( $this->s_username );
		}
		if (parent::$cfg ['usermaxpage'] > 0) {
			$this->page = $this->page > parent::$cfg ['usermaxpage'] ? intval ( parent::$cfg ['usermaxpage'] ) : $this->page;
		}
		$this->pagesize = intval ( parent::$cfg ['userpagesize'] );
		$this->_unset ();
	}
	public function action_run() {
		if (false === $this->existsTplFile ( 'user_index' )) {
			$this->action_list ();
		} else {
			$this->getMeta ( 'ch_user_index' );
			$var_array = array (
					'page_title' => $this->metawrap ['title'],
					'page_description' => $this->metawrap ['description'],
					'page_keyword' => $this->metawrap ['keyword'] 
			);
			$this->_tplfile = $this->getTPLFile ( 'user_index' );
			TPL::assign ( $var_array );
			TPL::display ( $this->_tplfile );
		}
	}
	public function action_list() {
		if (intval ( parent::$cfg ['visituserlist'] ) == 1) {
			if (parent::$wrap_user ['userid'] == 0) {
				XHandle::redirect ( parent::$urlpath . 'index.php?c=passport&a=login' );
			}
		}
		$this->_getListItems ();
		if ($this->s_uid > 0) {
			$searchsql .= " AND v.userid='" . $this->s_uid . "'";
			$this->countsql = " AND ps.userid = '" . $this->s_uid . "'";
		} else {
			$searchsql = $this->comsql;
		}
		$orderby = ' ORDER BY v.userid DESC';
		$model = parent::model ( 'user', 'im' );
		list ( $total, $data ) = $model->getList ( array (
				'page' => $this->page,
				'pagesize' => $this->pagesize,
				'searchsql' => $searchsql,
				'orderby' => $orderby,
				'countwhere' => $this->countsql 
		) );
		parent::loadLib ( 'url' );
		if ($this->type == 'more') {
			if (! empty ( $this->_urlitem )) {
				$url = XUrl::getListUrl ( 'user', 'type=more&' . $this->_urlitem );
			} else {
				$url = XUrl::getListUrl ( 'user', 'type=more' );
			}
		} else {
			$url = XUrl::getListUrl ( 'user', $this->_urlitem );
		}
		$showpage = XPage::index ( $total, $this->pagesize, $this->page, $url, 10, intval ( parent::$cfg ['usermaxpage'] ) );
		if ($this->s_dist2 > 0 || $this->s_dist1 > 0) {
			parent::loadLib ( 'mod' );
			$this->getMeta ( 'ch_user_search_result' );
			if ($this->s_dist2 > 0) {
				$areaname = XMod::getAreaName ( $this->s_dist2 );
			} else {
				$areaname = XMod::getAreaName ( $this->s_dist1 );
			}
		} else {
			$this->getMeta ( 'ch_user_list' );
		}
		$page_title = $this->metawrap ['title'];
		$page_keyword = $this->metawrap ['keyword'];
		$page_description = $this->metawrap ['description'];
		$page_title = str_ireplace ( array (
				'{area}' 
		), array (
				$areaname 
		), $page_title );
		$page_description = str_ireplace ( array (
				'{area}' 
		), array (
				$areaname 
		), $page_description );
		$page_keyword = str_ireplace ( array (
				'{area}' 
		), array (
				$areaname 
		), $page_keyword );
		$var_array = array (
				'page' => $this->page,
				'nextpage' => $this->page + 1,
				'prepage' => $this->page - 1,
				'pagecount' => ceil ( $total / $this->pagesize ),
				'pagesize' => $this->pagesize,
				'total' => $total,
				'showpage' => $showpage,
				'user' => $data,
				'page_title' => $page_title,
				'page_keyword' => $page_keyword,
				'page_description' => $page_description,
				'urlitem' => $this->_urlitem,
				's_sex' => $this->s_sex,
				's_sage' => $this->s_sage,
				's_eage' => $this->s_eage,
				's_dist1' => $this->s_dist1,
				's_dist2' => $this->s_dist2,
				's_dist3' => $this->s_dist3,
				's_lovesort' => $this->s_lovesort,
				's_sheight' => $this->s_sheight,
				's_eheight' => $this->s_eheight,
				's_ssalary' => $this->s_ssalary,
				's_esalary' => $this->s_esalary,
				's_sedu' => $this->s_sedu,
				's_eedu' => $this->s_eedu,
				's_marry' => $this->s_marry,
				's_havechild' => $this->s_havechild,
				's_house' => $this->s_house,
				's_car' => $this->s_car,
				's_jobs' => $this->s_jobs,
				's_avatar' => $this->s_avatar,
				'type' => $this->type,
				's_uid' => $this->s_uid,
				's_username' => $this->s_username 
		);
		unset ( $model );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_advsearch() {
		if (parent::$wrap_user ['userid'] == 0) {
			XHandle::redirect ( parent::$urlpath . 'index.php?c=passport&a=login' );
			die ();
		} else {
			if (intval ( $this->login_groupwrap ['view'] ['useadvsearch'] ) != 1) {
				XHandle::halt ( '对不起，您所在的会员组没有权限使用高级搜索功能，请升级VIP', '', 1 );
			}
		}
		$this->getMeta ( 'ch_advsearch' );
		$var_array = array (
				'page_title' => $this->metawrap ['title'],
				'page_description' => $this->metawrap ['description'],
				'page_keyword' => $this->metawrap ['keyword'] 
		);
		$this->_tplfile = $this->getTPLFile ( 'user_advsearch' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
}
?>