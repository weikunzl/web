<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class passportIAction extends indexbase {
	private $service = null;
	private $_tplfile = null;
	private function _new() {
		$this->service = parent::service ( 'passport', 'is' );
	}
	private function _unset() {
		unset ( $this->service );
	}
	public function action_reg() {
		if (intval ( parent::$cfg ['userreg'] ) == 0) {
			XHandle::halt ( '对不起，本站已关闭会员注册功能！', $this->appfile, 4 );
		}
		if (intval ( parent::$wrap_user ['userid'] > 0 )) {
			XHandle::halt ( '对不起，您已经登录了网站！', $this->appfile, 4 );
		}
		$this->getMeta ( 'ch_reg_step1' );
		$var_array = array (
				'page_title' => $this->metawrap ['title'], 
				'page_keyword' => $this->metawrap ['keyword'], 
				'page_description' => $this->metawrap ['description'],
				'invite_code'=> XRequest::getArgs('code') );
		$this->_tplfile = $this->getTPLFile ( 'passport_reg' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_perfect() {
		$this->checkLogin ();
		if (intval ( $this->login_infowrap ['integrity'] ) == 1) {
			XHandle::redirect ( parent::$urlpath . 'index.php' );
		} else {
			$var_array = array ('page_title' => '完善交友资料-' . parent::$cfg ['sitename'], 'page_keyword' => '', 'page_description' => '' );
			$this->_tplfile = $this->getTPLFile ( 'passport_perfect' );
			TPL::assign ( $var_array );
			TPL::display ( $this->_tplfile );
		}
	}
	public function action_login() {
		$this->_new ();
		$forward = $this->service->validForward ();
		$this->_unset ();
		if (intval ( parent::$cfg ['usercpflag'] ) == 0) {
			XHandle::halt ( '对不起，本站已关闭会员中心功能！', $this->appfile, 4 );
		}
		if (intval ( parent::$wrap_user ['userid'] ) > 0) {
			XHandle::halt ( '对不起，您已经登录了网站！', $this->appfile, 4 );
		}
		$this->getMeta ( 'ch_login' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'], 'forward' => urlencode ( $forward ) );
		$this->_tplfile = $this->getTPLFile ( 'passport_login' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_jdlogin() {
		if (intval ( parent::$cfg ['usercpflag'] ) == 0) {
			XHandle::halt ( '对不起，本站已关闭会员中心功能！', '', 1 );
		}
		if (intval ( parent::$wrap_user ['userid'] ) > 0) {
			XHandle::halt ( '对不起，您已经登录了网站！', '', 1 );
		}
		$this->getMeta ( 'ch_login' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'] );
		$this->_tplfile = $this->getTPLFile ( 'passport_jdlogin' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_valid() {
		$this->_new ();
		$args = $this->service->validValid ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doValid ( $args ['userid'], $args ['key'] );
		unset ( $model );
		if ($result == 0) {
			XHandle::halt ( '对不起，验证的用户不存在！', '', 1 );
		} elseif ($result == 1) {
			XHandle::halt ( '对不起，该邮箱已验证！', $this->appfile, 4 );
		} elseif ($result == 2) {
			XHandle::halt ( '对不起，验证密钥不正确！', '', 1 );
		} elseif ($result == 3) {
			XHandle::halt ( '恭喜你，邮件验证成功。', $this->appfile, 0 );
		}
	}
	public function action_forget() {
		if (intval ( parent::$wrap_user ['userid'] ) > 0) {
			XHandle::halt ( '对不起，您已经登录了网站！', $this->appfile, 4 );
		}
		$this->getMeta ( 'ch_forget' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'] );
		$this->_tplfile = $this->getTPLFile ( 'passport_forget' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_getpass() {
		if (intval ( parent::$wrap_user ['userid'] ) > 0) {
			XHandle::halt ( '对不起，您已经登录了网站！', $this->appfile, 4 );
		}
		$this->_new ();
		$args = $this->service->validGetPass ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->checkGetPassKey ( $args ['userid'], $args ['key'] );
		unset ( $model );
		if (false === $result) {
			XHandle::halt ( '对不起，取回密码用户不存在或者验证密钥不正确！<br />请重新发送邮件。', $this->appfile . '?c=passport&a=forget', 4 );
		} else {
			$this->getMeta ( 'ch_setpass' );
			$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'], 'userid' => $args ['userid'], 'key' => $args ['encode'] );
			$this->_tplfile = $this->getTPLFile ( 'passport_getpass' );
			TPL::assign ( $var_array );
			TPL::display ( $this->_tplfile );
		}
	}
	public function action_logout() {
		$model = parent::model ( 'passport', 'im' );
		$model->logout ();
		unset ( $model );
		$uc_model = parent::model ( 'uc', 'im' );
		$uc_model->inteLogout ();
		unset ( $uc_model );
		XHandle::halt ( '退出成功', $this->appfile, 0 );
	}
	public function action_regpost() {
		$this->_new ();
		
		//添加注册邀请码
		$invite_code = XRequest::getArgs ( 'invitecode' );
		if(empty($invite_code))
			XHandle::halt ( '对不起，注册需要邀请码！', '', 1 );
		$model = parent::model ( 'account', 'um' );
		$inviteUser = $model->doCheckInviteCode($invite_code);
		unset ( $model );
		if(empty($inviteUser))
			XHandle::halt ( '对不起，注册邀请码无效或已过期！', '', 1 );
		//
		
		list ( $main_args, $profile_args, $contact_args, $params_arags ) = $this->service->validReg ();
		$this->_unset ();
		$uc_model = parent::model ( 'uc', 'im' );
		$uc_result = $uc_model->inteReg ( $main_args ['username'], $main_args ['password'], $main_args ['email'] );
		if ($uc_result < 0) {
			XHandle::halt ( '注册失败，UC已经存在该用户或者UC用户名格式不正确！', '', 1 );
		}
		unset ( $uc_model );
		$model = parent::model ( 'passport', 'im' );
		list ( $result, $uid ) = $model->doReg ( $main_args, $profile_args, $contact_args, $params_arags, 1 );
		unset ( $model );
		if (true === $result) {
			//注册完成,邀请码失效
			$model = parent::model ( 'account', 'um' );
			$model->doDelInviteCode($invite_code);
			unset ( $model );
			//
			XHandle::redirect ( $this->appfile . '?c=passport&a=setmonolog' );
		} else {
			XHandle::halt ( '对不起，会员注册失败！', '', 1 );
		}
	}
	public function action_saveperfect() {
		$this->checkLogin ();
		if (intval ( $this->login_infowrap ['integrity'] ) != 0) {
			XHandle::redirect ( $this->appfile );
		} else {
			$this->_new ();
			list ( $main_args, $profile_args, $params_arags ) = $this->service->validPerfect ();
			$this->_unset ();
			$model = parent::model ( 'passport', 'im' );
			$result = $model->doPerfect ( $main_args, $profile_args, $params_arags );
			unset ( $model );
			if (true === $result) {
				XHandle::redirect ( $this->appfile . '?c=passport&a=setmonolog' );
			} else {
				XHandle::halt ( '对不起，会员资料保存失败！', '', 1 );
			}
		}
	}
	public function action_loginpost() {
		$this->_new ();
		$args = $this->service->validLogin ();
		$forward = $this->service->validForward ();
		$this->_unset ();
		$uc_model = parent::model ( 'uc', 'im' );
		$uc_model->inteLogin ( $args ['loginname'], $args ['password'] );
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doLogin ( $args ['loginname'], $args ['password'] );
		unset ( $model );
		if ($result == 1) {
			XHandle::halt ( '对不起，该帐号处于锁定状态！', '', 1 );
		} elseif ($result == 2) {
			XHandle::halt ( '登录失败，帐号或者密码错误！', '', 1 );
		} elseif ($result == 3) {
			if (true === $uc_model->uc_Integration && $uc_model->ucinfo [0] == '-1') {
				$uc_model->inteLoginReg ( $args ['loginname'], $args ['password'] );
			}
			if (true === $uc_model->uc_Integration && $uc_model->ucinfo [0] == '-2') {
				$uc_model->inteEditPassword ( $args ['loginname'], $args ['password'] );
			}
			if ($this->halttype == 'jdbox') {
				XHandle::jqDialog ( '', 1 );
			} else {
				if (! empty ( $forward )) {
					XHandle::halt ( '登录成功', $forward, 0 );
				} else {
					XHandle::halt ( '登录成功', $this->appfile, 0 );
				}
			}
		} else {
			XHandle::halt ( '登录错误，请联系网站管理员！', '', 1 );
		}
		unset ( $uc_model );
	}
	public function action_forgetpost() {
		$this->_new ();
		$args = $this->service->validForget ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doForGet ( $args ['username'], $args ['email'] );
		unset ( $model );
		if ($result == 1) {
			XHandle::halt ( '用户名不存在', '', 1 );
		} elseif ($result == 2) {
			XHandle::halt ( '用户名没有填写邮箱地址', '', 1 );
		} elseif ($result == 3) {
			XHandle::halt ( '用户的邮箱地址不正确', '', 1 );
		} elseif ($result == 4) {
			XHandle::halt ( '取回密码邮件发送失败', '', 1 );
		} elseif ($result == 5) {
			XHandle::halt ( '取回密码邮件发送成功', $this->appfile, 0 );
		}
	}
	public function action_changepost() {
		$this->_new ();
		$args = $this->service->validChange ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doSetNewPass ( $args ['userid'], $args ['key'], $args ['password'] );
		unset ( $model );
		if (true === $result) {
			$m_admin = parent::model ( 'user', 'am' );
			$uc_model = parent::model ( 'uc', 'im' );
			$uc_model->inteEditPassword ( $m_admin->getUserByName ( $args ['userid'] ), $args ['password'] );
			unset ( $uc_model, $m_admin );
			XHandle::halt ( '恭喜你，你的密码已找回，请记住新密码。', $this->appfile, 0 );
		} else {
			XHandle::halt ( '对不起，找回密码失败。', $this->appfile . '?c=passport&a=forget', 4 );
		}
	}
	
	/**
	 * 内心独白
	 */
	public function action_setmonolog() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=profile&a=monolog' );
		}
		$this->getMeta ( 'ch_reg_step2' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 
							'page_keyword' => $this->metawrap ['keyword'], 
							'page_description' => $this->metawrap ['description'] );
		
		/*取独白*/
		$this->_new();
		$monolog = $this->service->getOneMonolog();
		$var_array['monolog'] = $monolog;
		$var_array['monolog_len'] = mb_strlen($monolog);
		
		$this->_tplfile = $this->getTPLFile ( 'passport_setmonolog' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	
	public function action_getmonolog(){
		/*取独白*/
		$this->_new();
		$monolog = $this->service->getOneMonolog();
		echo $monolog;
	}
	
	/**
	 * 保存内心独白
	 */
	public function action_savemonolog() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=profile&a=monolog' );
		}
		$this->_new ();
		$content = $this->service->validSetMonolog ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doSaveMonolog ( parent::$wrap_user ['userid'], $content );
		unset ( $model );
		XHandle::redirect ( $this->appfile . '?c=passport&a=setcontact' );
	}
	
	public function action_setcontact() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=profile&a=contact' );
		}
		$this->getMeta ( 'ch_reg_step3' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'] );
		$this->_tplfile = $this->getTPLFile ( 'passport_setcontact' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_savecontact() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=profile&a=contact' );
		}
		$this->_new ();
		$args = $this->service->validSetContact ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doSaveContact ( parent::$wrap_user ['userid'], $args );
		unset ( $model );
		XHandle::redirect ( $this->appfile . '?c=passport&a=uploadavatar' );
	}
	public function action_uploadavatar() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=avatar' );
		}
		$this->getMeta ( 'ch_reg_step4' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'] );
		$this->_tplfile = $this->getTPLFile ( 'passport_uploadavatar' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_saveupload() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=avatar' );
		}
		$this->_new ();
		$uploadpart = $this->service->validUpload ();
		$this->_unset ();
		$model_upload = parent::model ( 'upload', 'am' );
		$data = $model_upload->doSaveUpload ( $uploadpart, 'temp', '', intval ( parent::$wrap_user ['userid'] ) );
		if (is_array ( $data )) {
			$code = parent::import ( 'code', 'util' );
			$url = $code->authCode ( $data ['source'], 'ENCODE', OESOFT_RANDKEY, 0 );
			unset ( $code );
			XHandle::redirect ( $this->appfile . '?c=passport&a=setavatar&url=' . urlencode ( $url ) );
		} else {
			$model_upload->noteError ( $data );
		}
		unset ( $model_upload );
	}
	public function action_setavatar() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=avatar' );
		}
		$this->_new ();
		$url = $this->service->validGetAvatar ();
		$this->_unset ();
		$this->getMeta ( 'ch_reg_step4' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'], 'imgurl' => $url );
		$this->_tplfile = $this->getTPLFile ( 'passport_setavatar' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	public function action_saveavatar() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=avatar' );
		}
		parent::loadFunc ( 'avatar', 'util' );
		list ( $userid, $info ) = avatar_saving ( intval ( parent::$wrap_user ['userid'] ) );
		if ($userid > 0 && true === $info ['status']) {
			$model = parent::model ( 'album', 'am' );
			$model->doSetAvatar ( $userid, $info ['avatar'], 'user' );
			unset ( $model );
		}
		parent::loadUtil ( 'file' );
		XFile::delDir ( BASE_ROOT . './data/attachment/temp/' . $userid );
		$s = new avatarStatusClass ();
		$s->data->urls [0] = $info ['avatar'];
		$s->status = 1;
		$s->statusText = '设置成功';
		echo json_encode ( $s );
	}
	
	public function action_setcond() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=cond' );
		}
		$this->getMeta ( 'ch_reg_step5' );
		$var_array = array ('page_title' => $this->metawrap ['title'], 'page_keyword' => $this->metawrap ['keyword'], 'page_description' => $this->metawrap ['description'] );
		$this->_tplfile = $this->getTPLFile ( 'passport_setcond' );
		TPL::assign ( $var_array );
		TPL::display ( $this->_tplfile );
	}
	
	public function action_savecond() {
		$this->checkLogin ();
		if (false === $this->validRegTime ()) {
			XHandle::redirect ( parent::$urlpath . 'usercp.php?c=cond' );
		}
		$service = parent::service ( 'cond', 'us' );
		$args = $service->validCond ();
		$this->_unset ();
		$model = parent::model ( 'passport', 'im' );
		$result = $model->doSaveCond ( parent::$wrap_user ['userid'], $args );
		unset ( $model );
		XHandle::redirect ( PATH_URL . 'usercp.php' );
	}
}
?>