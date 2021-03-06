<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class control extends adminbase {
	public function __construct() {
		$this->control ();
	}
	private function control() {
		parent::__construct ();
		$this->checkLogin ();
		$this->checkAuth ( 'setting' );
	}
	public function control_run() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'site_base' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			parent::loadLib ( 'mod' );
			//$data ['tjcode'] = stripslashes ( $data ['tjcode'] );
			$data ['timezone_select'] = XMod::selectTimezone ( $data ['timezone'], 'timezone' );
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_footer() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'site_footer' );
		unset ( $model );
		$var_array = array (
				'content' => stripslashes ( $data ) 
		);
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_rewrite() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'site_rewrite' );
		unset ( $model );
		$var_array = $data;
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_upload() {
		$php_upload_maxsize = ini_get ( 'upload_max_filesize' );
		if (function_exists ( "imagecreate" )) {
			if (function_exists ( 'gd_info' )) {
				$gd_ver_info = gd_info ();
				$gd_ver = $gd_ver_info ['GD Version'];
			} else {
				$gd_ver = '支持';
			}
		} else {
			$gd_ver = '不支持';
		}
		$var_array = array ();
		parent::loadLib ( 'option' );
		$data = XOption::get ( 'upload_config' );
		if (! empty ( $data )) {
			$var_array = $data;
		}
		$var_array = array_merge ( $var_array, array (
				'php_upload_maxsize' => $php_upload_maxsize,
				'gd_version' => $gd_ver 
		) );
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_safety() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'site_safety' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_order() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'order_config' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_user() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'user_config' );
		unset ( $model );
		$var_array = array ();
		parent::loadLib ( 'mod' );
		if (! empty ( $data )) {
			$var_array = $data;
			$var_array = array_merge ( $var_array, array (
					'usergroup_select' => XMod::selectUserGroup ( $data ['usergrid'], 'usergrid' ) 
			) );
		} else {
			$var_array = array (
					'usergroup_select' => XMod::selectUserGroup ( '', 'usergrid' ) 
			);
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_mail() {
		$model = parent::model ( 'setting', 'am' );
		$mailinfo = $model->readEmailConfig ();
		unset ( $model );
		$var_array = array (
				'mailinfo' => $mailinfo,
				'os' => XHandle::getOsType () 
		);
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_sms() {
		$model = parent::model ( 'setting', 'am' );
		$smsinfo = $model->readSMSConfig ();
		$smsfee = $model->getOptions ( 'sms_config' );
		unset ( $model );
		if (empty ( $smsfee )) {
			$smsfeenums = 0;
		} else {
			$i = 1;
			$smsfee = XHandle::dounSerialize ( $smsfee );
			foreach ( $smsfee as $key => $value ) {
				$smsfee [$key] ['i'] = $i;
				$i = ($i + 1);
			}
			$smsfeenums = count ( $smsfee );
		}
		$var_array = array (
				'smsinfo' => $smsinfo,
				'smsfee' => $smsfee,
				'smsfeenums' => $smsfeenums 
		);
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_imbox() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'imbox_config' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_index_style() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'index_style' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_main_style() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'main_style' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_card() {
		$model = parent::model ( 'setting', 'am' );
		$data = $model->getOptions ( 'card_config' );
		unset ( $model );
		$var_array = array ();
		if (! empty ( $data )) {
			$var_array = $data;
		}
		TPL::assign ( $var_array );
		TPL::display ( $this->cptpl . 'setting.tpl' );
	}
	public function control_savecard() {
		$args = $this->_validCard ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'card_config', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=card', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_savebase() {
		$args = array ();
		$args = $this->_validBase ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'site_base', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_savefooter() {
		$content = $this->_validFooter ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doUpdate ( 'site_footer', $content );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=footer', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_saverewrite() {
		$args = $this->_validRewrite ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'site_rewrite', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=rewrite', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_saveupload() {
		$args = array ();
		$args = $this->_validUpload ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'upload_config', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=upload', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_savesafety() {
		$args = array ();
		list ( $args, $forbidargs ) = $this->_validSafety ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'site_safety', $args );
		$model->doSaveForbidArgs ( $forbidargs );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=safety', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_saveorder() {
		$args = array ();
		$args = $this->_validOrder ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'order_config', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=order', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_saveuser() {
		$args = array ();
		list ( $args, $lockusers ) = $this->_validUser ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'user_config', $args );
		$model->doSaveLockUsers ( $lockusers );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=user', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_saveimbox() {
		$args = array ();
		$args = $this->_validImbox ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'imbox_config', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=imbox', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_save_index_style() {
		$args = array ();
		$args = $this->_validIndexStyle ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'index_style', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=index_style', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_save_main_style() {
		$args = array ();
		$args = $this->_validMainStyle ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSave ( 'main_style', $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=main_style', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_savemail() {
		$args = $this->_validMail ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSaveEmailConfig ( $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=mail', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_savesms() {
		$args = $this->_validSMS ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doSaveSmsConfig ( $args );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '保存成功', $this->cpfile . '?c=setting&a=sms', 0 );
		} else {
			XHandle::halt ( '保存失败', '', 1 );
		}
	}
	public function control_savesmsconfig() {
		$content = $this->_getSmsFeeItem ();
		$model = parent::model ( 'setting', 'am' );
		$result = $model->doUpdate ( 'sms_config', $content );
		unset ( $model );
		if (true === $result) {
			$this->log ( 'setting' );
			XHandle::halt ( '更新成功', $this->cpfile . '?c=setting&a=sms', 0 );
		} else {
			XHandle::halt ( '更新成功', '', 1 );
		}
	}
	public function control_clearcache() {
		TPL::clearAllCache ();
		XHandle::halt ( '更新成功', $this->cpfile . '?c=setting', 0 );
	}
	public function control_clearcompiled() {
		TPL::clearComplied ();
		XHandle::halt ( '更新成功', $this->cpfile . '?c=setting', 0 );
	}
	public function control_updatecache() {
		$model = parent::model ( 'setting', 'am' );
		$model->doUpdateCache ();
		unset ( $model );
		XHandle::halt ( '更新成功', $this->cpfile . '?c=frame&a=main', 0 );
	}
	private function _validBase() {
		$args = array ();
		$args = XRequest::getGpc ( array (
				'sitename',
				'siteurl',
				'logo',
				'logowidth',
				'logoheight',
				'timezone',
				'icpcode',
				'usercpskin' 
		) );
		$tjcode = XRequest::getArgs ( 'tjcode', '', false );
		//$tjcode = htmlspecialchars($tjcode);
		if (empty ( $args ['sitename'] )) {
			XHandle::halt ( '网站名称不能为空', '', 1 );
		}
		if (empty ( $args ['siteurl'] )) {
			XHandle::halt ( '网站URL地址不能为空', '', 1 );
		} else {
			if (substr ( $args ['siteurl'], - 1 ) != '/') {
				$args ['siteurl'] = $args ['siteurl'] . '/';
			}
		}
		$args ['timezone'] = trim ( $args ['timezone'] );
		if (false == XValid::isNumber ( $args ['timezone'] )) {
			$args ['timezone'] = 8;
		}
		$args ['logowidth'] = intval ( $args ['logowidth'] );
		$args ['logoheight'] = intval ( $args ['logoheight'] );
		$args ['usercpskin'] = intval ( $args ['usercpskin'] );
		$args = array_merge ( $args, array (
				'tjcode' => $tjcode 
		) );
		return $args;
	}
	private function _validFooter() {
		$content = XRequest::getArgs ( 'content', '', false );
		return $content;
	}
	private function _validUpload() {
		$php_upload_maxsize = ini_get ( 'upload_max_filesize' );
		$args = XRequest::getGpc ( array (
				'uploadmaxsize',
				'maxthumbwidth',
				'maxthumbheight',
				'thumbwidth',
				'thumbheight',
				'watermarkflag',
				'watermarkfile',
				'watermarkpos',
				'avatarwidth',
				'avatarheight',
				'albumwidth',
				'albumheight',
				'partywidth',
				'partyheight',
				'storywidth',
				'storyheight',
				'testwidth',
				'testheight',
				'diarywidth',
				'diaryheight' 
		) );
		$args ['uploadmaxsize'] = floatval ( $args ['uploadmaxsize'] );
		if ($args ['uploadmaxsize'] > $php_upload_maxsize) {
			$args ['uploadmaxsize'] = $php_upload_maxsize;
		}
		$args ['maxthumbwidth'] = intval ( $args ['maxthumbwidth'] );
		$args ['maxthumbheight'] = intval ( $args ['maxthumbheight'] );
		$args ['thumbwidth'] = intval ( $args ['thumbwidth'] );
		$args ['thumbheight'] = intval ( $args ['thumbheight'] );
		$args ['watermarkflag'] = intval ( $args ['watermarkflag'] );
		$args ['watermarkpos'] = intval ( $args ['watermarkpos'] );
		$args ['avatarwidth'] = intval ( $args ['avatarwidth'] );
		$args ['avatarheight'] = intval ( $args ['avatarheight'] );
		$args ['albumwidth'] = intval ( $args ['albumwidth'] );
		$args ['albumheight'] = intval ( $args ['albumheight'] );
		$args ['partywidth'] = intval ( $args ['partywidth'] );
		$args ['partyheight'] = intval ( $args ['partyheight'] );
		$args ['storywidth'] = intval ( $args ['storywidth'] );
		$args ['storyheight'] = intval ( $args ['storyheight'] );
		$args ['testwidth'] = intval ( $args ['testwidth'] );
		$args ['testheight'] = intval ( $args ['testheight'] );
		$args ['diarywidth'] = intval ( $args ['diarywidth'] );
		$args ['diaryheight'] = intval ( $args ['diaryheight'] );
		return $args;
	}
	private function _validMail() {
		$args = XRequest::getGpc ( array (
				'flag',
				'smtp',
				'port',
				'sender',
				'email',
				'password',
				'type' 
		) );
		$args ['flag'] = intval ( $args ['flag'] );
		$args ['port'] = intval ( $args ['port'] );
		$args ['type'] = intval ( $args ['type'] );
		return $args;
	}
	private function _validSMS() {
		$args = XRequest::getGpc ( array (
				'flag',
				'account',
				'password',
				'key',
				'sender',
				'testmobile' 
		) );
		$args ['flag'] = intval ( $args ['flag'] );
		return $args;
	}
	private function _validRewrite() {
		$args = XRequest::getGpc ( array (
				'urlsuffix' 
		) );
		if (empty ( $args ['urlsuffix'] )) {
			$args ['urlsuffix'] = 'php';
		}
		return $args;
	}
	private function _validSafety() {
		$args = array ();
		$args = XRequest::getGpc ( array (
				'admincode',
				'commentcode',
				'regcode',
				'logincode',
				'forgetcode' 
		) );
		$args ['admincode'] = intval ( $args ['admincode'] );
		$args ['commentcode'] = intval ( $args ['commentcode'] );
		$args ['regcode'] = intval ( $args ['regcode'] );
		$args ['logincode'] = intval ( $args ['logincode'] );
		$args ['forgetcode'] = intval ( $args ['forgetcode'] );
		$forbidargs = XRequest::getArgs ( 'forbidargs' );
		return array (
				$args,
				$forbidargs 
		);
	}
	private function _validOrder() {
		$args = array ();
		$args = XRequest::getGpc ( array (
				'buynon',
				'currency',
				'symbol',
				'taxrate',
				'orderpagesize' 
		) );
		$args ['buynon'] = intval ( $args ['buynon'] );
		$args ['taxrate'] = floatval ( $args ['taxrate'] );
		$args ['orderpagesize'] = intval ( $args ['orderpagesize'] );
		if (empty ( $args ['currency'] )) {
			$args ['currency'] = 'CNY';
		}
		if (empty ( $args ['symbol'] )) {
			$args ['symbol'] = '￥';
		}
		if ($args ['taxrate'] < 0) {
			$args ['taxrate'] = 0;
		}
		return $args;
	}
	private function _validIndexStyle() {
		$args = XRequest::getGpc ( array (
				'infonum',
				'infolen',
				'usernum',
				'userlen',
				'diarynum',
				'diarylen',
				'datingnum',
				'datinglen',
				'partynum',
				'partylen',
				'storynum',
				'storylen',
				'ceshinum',
				'ceshilen',
				'weibonum',
				'weibolen',
				'aboutnum',
				'aboutlen' 
		) );
		$args ['infonum'] = intval ( $args ['infonum'] );
		$args ['infolen'] = intval ( $args ['infolen'] );
		$args ['usernum'] = intval ( $args ['usernum'] );
		$args ['userlen'] = intval ( $args ['userlen'] );
		$args ['diarynum'] = intval ( $args ['diarynum'] );
		$args ['diarylen'] = intval ( $args ['diarylen'] );
		$args ['datingnum'] = intval ( $args ['downnum'] );
		$args ['datinglen'] = intval ( $args ['datinglen'] );
		$args ['partynum'] = intval ( $args ['partynum'] );
		$args ['partylen'] = intval ( $args ['partylen'] );
		$args ['storynum'] = intval ( $args ['storynum'] );
		$args ['storylen'] = intval ( $args ['storylen'] );
		$args ['ceshinum'] = intval ( $args ['ceshinum'] );
		$args ['ceshilen'] = intval ( $args ['ceshilen'] );
		$args ['weibonum'] = intval ( $args ['weibonum'] );
		$args ['weibolen'] = intval ( $args ['weibolen'] );
		$args ['aboutnum'] = intval ( $args ['aboutnum'] );
		$args ['aboutlen'] = intval ( $args ['aboutlen'] );
		return $args;
	}
	private function _validMainStyle() {
		$args = XRequest::getGpc ( array (
				'infopagesize',
				'infomaxpage',
				'userpagesize',
				'usermaxpage',
				'diarypagesize',
				'diarymaxpage',
				'askpagesize',
				'askmaxpage',
				'datingpagesize',
				'datingmaxpage',
				'partypagesize',
				'partymaxpage',
				'storypagesize',
				'storymaxpage',
				'weibopagesize',
				'weibomaxpage',
				'ceshipagesize',
				'ceshimaxpage',
				'commentpagesize' 
		) );
		$args ['infopagesize'] = intval ( $args ['infopagesize'] );
		$args ['infomaxpage'] = intval ( $args ['infomaxpage'] );
		$args ['userpagesize'] = intval ( $args ['userpagesize'] );
		$args ['usermaxpage'] = intval ( $args ['usermaxpage'] );
		$args ['diarypagesize'] = intval ( $args ['diarypagesize'] );
		$args ['diarymaxpage'] = intval ( $args ['diarymaxpage'] );
		$args ['askpagesize'] = intval ( $args ['askpagesize'] );
		$args ['askmaxpage'] = intval ( $args ['askmaxpage'] );
		$args ['datingpagesize'] = intval ( $args ['datingpagesize'] );
		$args ['datingmaxpage'] = intval ( $args ['datingmaxpage'] );
		$args ['partypagesize'] = intval ( $args ['partypagesize'] );
		$args ['partymaxpage'] = intval ( $args ['partymaxpage'] );
		$args ['storypagesize'] = intval ( $args ['storypagesize'] );
		$args ['storymaxpage'] = intval ( $args ['storymaxpage'] );
		$args ['weibopagesize'] = intval ( $args ['weibopagesize'] );
		$args ['weibomaxpage'] = intval ( $args ['weibomaxpage'] );
		$args ['ceshipagesize'] = intval ( $args ['ceshipagesize'] );
		$args ['ceshimaxpage'] = intval ( $args ['ceshimaxpage'] );
		$args ['commentpagesize'] = intval ( $args ['commentpagesize'] );
		return $args;
	}
	private function _validUser() {
		$args = XRequest::getGpc ( array (
				'usercpflag',
				'userreg',
				'usergrid',
				'useraudit',
				'regusernumber',
				'usernumberlen',
				'reglovesort',
				'requestlovesort',
				'regsalary',
				'requestsalary',
				'regweight',
				'requestweight',
				'regmobile',
				'requestmobile',
				'regqq',
				'requestqq',
				'regidnumber',
				'requestidnumber',
				'regmbcode',
				'requestmbcode',
				'molminlen',
				'molmaxlen',
				'regweibo',
				'requestweibo',
				'regstartid',
				'startage',
				'endage',
				'startheight',
				'endheight',
				'startweight',
				'endweight',
				'maxnum',
				'onlinehold',
				'updatehold',
				'onlineprivate',
				'matchnum',
				'messageruntype',
				'showhomecontact',
				'visithomepage',
				'visituserlist',
				'regpoints',
				'regmoney',
				'avatarpermflag',
				'rzpermflag',
				'auditavatar',
				'auditphoto',
				'auditmonolog',
				'auditdiary',
				'auditdating',
				'auditask',
				'auditstory',
				'auditcomment',
				'auditweibo',
				'filternumber',
				'filterlennumber' 
		) );
		$args ['usercpflag'] = intval ( $args ['usercpflag'] );
		$args ['userreg'] = intval ( $args ['userreg'] );
		$args ['usergrid'] = intval ( $args ['usergrid'] );
		$args ['useraudit'] = intval ( $args ['useraudit'] );
		$args ['regusernumber'] = intval ( $args ['regusernumber'] );
		$args ['usernumberlen'] = intval ( $args ['usernumberlen'] );
		if ($args ['usernumberlen'] <= 0) {
			$args ['usernumberlen'] = 6;
		}
		$args ['reglovesort'] = intval ( $args ['reglovesort'] );
		$args ['requestlovesort'] = intval ( $args ['requestlovesort'] );
		$args ['regsalary'] = intval ( $args ['regsalary'] );
		$args ['requestsalary'] = intval ( $args ['requestsalary'] );
		$args ['regweight'] = intval ( $args ['regweight'] );
		$args ['requestweight'] = intval ( $args ['requestweight'] );
		$args ['regmobile'] = intval ( $args ['regmobile'] );
		$args ['requestmobile'] = intval ( $args ['requestmobile'] );
		$args ['regqq'] = intval ( $args ['regqq'] );
		$args ['requestqq'] = intval ( $args ['requestqq'] );
		$args ['regidnumber'] = intval ( $args ['regidnumber'] );
		$args ['requestidnumber'] = intval ( $args ['requestidnumber'] );
		$args ['regmbcode'] = intval ( $args ['regmbcode'] );
		$args ['requestmbcode'] = intval ( $args ['requestmbcode'] );
		$args ['regweibo'] = intval ( $args ['regweibo'] );
		$args ['requestweibo'] = intval ( $args ['requestweibo'] );
		$args ['molminlen'] = intval ( $args ['molminlen'] );
		$args ['molmaxlen'] = intval ( $args ['molmaxlen'] );
		$args ['regstartid'] = intval ( $args ['regstartid'] );
		$args ['startage'] = intval ( $args ['startage'] );
		$args ['endage'] = intval ( $args ['endage'] );
		$args ['startheight'] = intval ( $args ['startheight'] );
		$args ['endheight'] = intval ( $args ['endheight'] );
		$args ['startweight'] = intval ( $args ['startweight'] );
		$args ['endweight'] = intval ( $args ['endweight'] );
		$args ['maxnum'] = intval ( $args ['maxnum'] );
		$args ['onlinehold'] = intval ( $args ['onlinehold'] );
		$args ['updatehold'] = intval ( $args ['updatehold'] );
		$args ['onlineprivate'] = intval ( $args ['onlineprivate'] );
		$args ['matchnum'] = intval ( $args ['matchnum'] );
		$args ['messageruntype'] = intval ( $args ['messageruntype'] );
		$args ['showhomecontact'] = intval ( $args ['showhomecontact'] );
		$args ['visithomepage'] = intval ( $args ['visithomepage'] );
		$args ['visituserlist'] = intval ( $args ['visituserlist'] );
		$args ['regpoints'] = floatval ( $args ['regpoints'] );
		$args ['regmoney'] = floatval ( $args ['regmoney'] );
		$args ['avatarpermflag'] = intval ( $args ['avatarpermflag'] );
		$args ['rzpermflag'] = intval ( $args ['rzpermflag'] );
		$args ['auditavatar'] = intval ( $args ['auditavatar'] );
		$args ['auditphoto'] = intval ( $args ['auditphoto'] );
		$args ['auditmonolog'] = intval ( $args ['auditmonolog'] );
		$args ['auditdiary'] = intval ( $args ['auditdiary'] );
		$args ['auditdating'] = intval ( $args ['auditdating'] );
		$args ['auditask'] = intval ( $args ['auditask'] );
		$args ['auditstory'] = intval ( $args ['auditstory'] );
		$args ['auditcomment'] = intval ( $args ['auditcomment'] );
		$args ['auditweibo'] = intval ( $args ['auditweibo'] );
		$args ['filternumber'] = intval ( $args ['filternumber'] );
		$args ['filterlennumber'] = intval ( $args ['filterlennumber'] );
		$lockusers = XRequest::getArgs ( 'lockusers' );
		if ($args ['molminlen'] < 3) {
			$args ['molminlen'] = 3;
		}
		if ($args ['molmaxlen'] > 1500) {
			$args ['molmaxlen'] = 1500;
		}
		return array (
				$args,
				$lockusers 
		);
	}
	private function _validImbox() {
		$args = XRequest::getGpc ( array (
				'imbox_gueststatus',
				'imbox_userstatus',
				'imbox_loadtimer',
				'imbox_holdtimer',
				'imbox_loopstatus',
				'imbox_looptimer',
				'imbox_skin',
				'imbox_title',
				'imbox_width',
				'imbox_reglasttime',
				'imbox_visitlasttime' 
		) );
		$guesttips = XRequest::getArgs ( 'imbox_guesttips', '', false );
		$regtips = XRequest::getArgs ( 'imbox_regtips', '', false );
		$logintips = XRequest::getArgs ( 'imbox_logintips', '', false );
		$matchtips = XRequest::getArgs ( 'imbox_matchtips', '', false );
		$viewtips = XRequest::getArgs ( 'imbox_viewtips', '', false );
		$msgtips = XRequest::getArgs ( 'imbox_msgtips', '', false );
		$hitips = XRequest::getArgs ( 'imbox_hitips', '', false );
		$gifttips = XRequest::getArgs ( 'imbox_gifttips', '', false );
		$args ['imbox_gueststatus'] = intval ( $args ['imbox_gueststatus'] );
		$args ['imbox_userstatus'] = intval ( $args ['imbox_userstatus'] );
		$args ['imbox_loadtimer'] = intval ( $args ['imbox_loadtimer'] );
		$args ['imbox_holdtimer'] = intval ( $args ['imbox_holdtimer'] );
		$args ['imbox_loopstatus'] = intval ( $args ['imbox_loopstatus'] );
		$args ['imbox_looptimer'] = intval ( $args ['imbox_looptimer'] );
		$args ['imbox_reglasttime'] = intval ( $args ['imbox_reglasttime'] );
		$args ['imbox_visitlasttime'] = intval ( $args ['imbox_visitlasttime'] );
		$args ['imbox_guesttips'] = $guesttips;
		$args ['imbox_regtips'] = $regtips;
		$args ['imbox_logintips'] = $logintips;
		$args ['imbox_matchtips'] = $matchtips;
		$args ['imbox_viewtips'] = $viewtips;
		$args ['imbox_msgtips'] = $msgtips;
		$args ['imbox_hitips'] = $hitips;
		$args ['imbox_gifttips'] = $gifttips;
		$logintips = XRequest::getInt ( 'logintips_status' );
		$loginloadtimer = XRequest::getInt ( 'logintips_loadtimer' );
		$args ['logintips_status'] = $logintips;
		$args ['logintips_loadtimer'] = $loginloadtimer;
		return $args;
	}
	private function _validCard() {
		$args = XRequest::getGpc ( array (
				'cardflag',
				'cardtype' 
		) );
		$args ['cardflag'] = intval ( $args ['cardflag'] );
		$args ['cardtype'] = intval ( $args ['cardtype'] );
		return $args;
	}
	private function _getSmsFeeItem() {
		$itemmaxsort = XRequest::getInt ( 'itemmaxsort' );
		$array = array ();
		if ($itemmaxsort > 0) {
			for($i = 1; $i < ($itemmaxsort + 1); $i ++) {
				$orders = intval ( XRequest::getInt ( 'item_orders_' . $i ) );
				$nums = intval ( XRequest::getArgs ( 'item_nums_' . $i ) );
				$money = floatval ( XRequest::getArgs ( 'item_money_' . $i ) );
				if ($orders > 0) {
					$array [] = array (
							'orders' => $orders,
							'nums' => $nums,
							'money' => $money 
					);
				}
			}
		}
		if (! empty ( $array ) && is_array ( $array )) {
			$array = XHandle::sysSortArray ( $array, 'orders' );
			return serialize ( $array );
		} else {
			return '';
		}
	}
}
?>