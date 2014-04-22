<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class passportIService extends X {
	public function validReg() {
		$main_args = XRequest::getGpc ( array ('username', 'password', 'confirmpassword', 'email', 'checkcode', 'gender' ) );
		$main_args ['gender'] = intval ( $main_args ['gender'] );
		$profile_args = XRequest::getGpc ( array ('ageyear', 'agemonth', 'ageday', 'marrystatus', 'lovesort', 'education', 'salary', 'height', 'weight', 'provinceid', 'cityid', 'distid' ) );
		$contact_args = XRequest::getGpc ( array ('mobile', 'qq', 'idnumber', 'homepage' ) );
		$mobilecode = XRequest::getArgs ( 'mobilecode' );
		$mobilerz = 0;
		if (parent::$cfg ['regcode'] == 1) {
			parent::loadUtil ( 'session' );
			if ($main_args ['checkcode'] != XSession::get ( 'verifycode' )) {
				XHandle::halt ( '对不起，验证码不正确！', '', 1 );
			}
		}
		if (false === XValid::isUserArgs ( $main_args ['username'] )) {
			XHandle::halt ( '用户名格式不正确', '', 1 );
		} else {
			if (XHandle::getLength ( $main_args ['username'] ) < 3 || XHandle::getLength ( $main_args ['username'] ) > 16) {
				XHandle::halt ( '用户名长度不正确，必须为3-16个字符，1个汉字=2个字符', '', 1 );
			} else {
				if (true === XFilter::checkExistsForbidUserName ( $main_args ['username'] )) {
					XHandle::halt ( '对不起，该用户名系统已禁止！', '', 1 );
				}
				if (intval ( parent::$cfg ['regusernumber'] ) == 1) {
					if (true === XValid::contNumber ( $main_args ['username'], parent::$cfg ['usernumberlen'] )) {
						XHandle::halt ( '对不起，用户名不能连续出现' . parent::$cfg ['usernumberlen'] . '个数字', '', 1 );
					}
				}
			}
		}
		$m = parent::model ( 'passport', 'im' );
		if (true === $m->doExistsUserName ( $main_args ['username'] )) {
			XHandle::halt ( '对不起，该用户名已存在！', '', 1 );
		}
		if (false === XValid::isLength ( $main_args ['password'], 6, 16 )) {
			XHandle::halt ( '密码长度不正确', '', 1 );
		} else {
			if ($main_args ['confirmpassword'] != $main_args ['password']) {
				XHandle::halt ( '确认密码不正确', '', 1 );
			}
		}
		if (false === XValid::isEmail ( $main_args ['email'] )) {
			XHandle::halt ( '邮箱格式不能为空', '', 1 );
		}
		if (true === $m->doExistsEmail ( $main_args ['email'] )) {
			XHandle::halt ( '对不起，该邮箱已存在！', '', 1 );
		}
		unset ( $m );
		unset ( $main_args ['confirmpassword'] );
		unset ( $main_args ['checkcode'] );
		$profile_args ['ageyear'] = intval ( $profile_args ['ageyear'] );
		$profile_args ['agemonth'] = intval ( $profile_args ['agemonth'] );
		$profile_args ['ageday'] = intval ( $profile_args ['ageday'] );
		$profile_args ['marrystatus'] = intval ( $profile_args ['marrystatus'] );
		$profile_args ['lovesort'] = intval ( $profile_args ['lovesort'] );
		$profile_args ['education'] = intval ( $profile_args ['education'] );
		$profile_args ['salary'] = intval ( $profile_args ['salary'] );
		$profile_args ['height'] = intval ( $profile_args ['height'] );
		$profile_args ['weight'] = intval ( $profile_args ['weight'] );
		$profile_args ['provinceid'] = intval ( $profile_args ['provinceid'] );
		$profile_args ['cityid'] = intval ( $profile_args ['cityid'] );
		$profile_args ['distid'] = intval ( $profile_args ['distid'] );
		if ($profile_args ['ageyear'] < 1) {
			XHandle::halt ( '请选择生日年份', '', 1 );
		}
		if ($profile_args ['agemonth'] < 1 || $profile_args ['agemonth'] > 12) {
			XHandle::halt ( '请选择生日月份', '', 1 );
		}
		if ($profile_args ['ageday'] < 1 || $profile_args ['ageday'] > 31) {
			XHandle::halt ( '请选择生日日期', '', 1 );
		}
		if (strlen ( $profile_args ['agemonth'] ) == 1) {
			$profile_args ['agemonth'] = '0' . $profile_args ['agemonth'];
		}
		if (strlen ( $profile_args ['ageday'] ) == 1) {
			$profile_args ['ageday'] = '0' . $profile_args ['ageday'];
		}
		$profile_args ['birthday'] = $profile_args ['ageyear'] . '-' . $profile_args ['agemonth'] . '-' . $profile_args ['ageday'];
		if ($profile_args ['marrystatus'] == 0) {
			XHandle::halt ( '请选择婚姻状态', '', 1 );
		}
		if (empty ( $profile_args ['education'] )) {
			XHandle::halt ( '请选择学历', '', 1 );
		}
		if ($profile_args ['height'] == 0) {
			XHandle::halt ( '请选择身高', '', 1 );
		}
		if ($profile_args ['provinceid'] == 0) {
			XHandle::halt ( '请选择所在一级地区', '', 1 );
		}
		if ($profile_args ['cityid'] == 0) {
			XHandle::halt ( '请选择所在二级地区', '', 1 );
		}
		if (intval ( parent::$cfg ['reglovesort'] ) == 1 && intval ( parent::$cfg ['requestlovesort'] ) == 1) {
			if ($profile_args ['lovesort'] == 0) {
				XHandle::halt ( '请选择交友类型', '', 1 );
			}
		}
		if (intval ( parent::$cfg ['regsalary'] ) == 1 && intval ( parent::$cfg ['requestsalary'] ) == 1) {
			if ($profile_args ['salary'] == 0) {
				XHandle::halt ( '请选择月薪收入', '', 1 );
			}
		}
		if (intval ( parent::$cfg ['regweight'] ) == 1 && intval ( parent::$cfg ['requestweight'] ) == 1) {
			if ($profile_args ['weight'] == 0) {
				XHandle::halt ( '请选择体重', '', 1 );
			}
		}
		if (intval ( parent::$cfg ['regmobile'] ) == 1 && intval ( parent::$cfg ['requestmobile'] ) == 1) {
			if (false === XValid::isMobile ( $contact_args ['mobile'] )) {
				XHandle::halt ( '手机号码格式不正确', '', 1 );
			} else {
				if (intval ( parent::$cfg ['regmbcode'] ) == 1 && intval ( parent::$cfg ['requestmbcode'] ) == 1) {
					if (empty ( $mobilecode )) {
						XHandle::halt ( '请输入手机验证码', '', 1 );
					} else {
						$m_passport = parent::model ( 'passport', 'im' );
						if (false === $m_passport->checkMobileCode ( $contact_args ['mobile'], $mobilecode )) {
							XHandle::halt ( '您输入的手机验证码错误！', '', 1 );
						} else {
							$mobilerz = 1;
						}
						unset ( $m_passport );
					}
				}
			}
		}
		if (intval ( parent::$cfg ['regqq'] ) == 1 && intval ( parent::$cfg ['requestqq'] ) == 1) {
			if (false === XValid::isQQ ( $contact_args ['qq'] )) {
				XHandle::halt ( 'QQ号码格式不正确', '', 1 );
			}
		}
		if (intval ( parent::$cfg ['regweibo'] ) == 1 && intval ( parent::$cfg ['requestweibo'] ) == 1) {
			if (false === XValid::isQQ ( $contact_args ['homepage'] )) {
				XHandle::halt ( '微博/博客地址不能为空', '', 1 );
			}
		}
		if (intval ( parent::$cfg ['regidnumber'] ) == 1 && intval ( parent::$cfg ['requestidnumber'] ) == 1) {
			if (strlen ( $contact_args ['idnumber'] ) == 15 || strlen ( $contact_args ['idnumber'] ) == 18) {
			} else {
				XHandle::halt ( '身份证号格式不正确', '', 1 );
			}
		}
		$lunar = parent::import ( 'lunar', 'util' );
		$profile_args ['astro'] = $lunar->getAstro ( $profile_args ['birthday'] );
		$profile_args ['lunar'] = $lunar->getLunar ( $profile_args ['birthday'] );
		$lungarID = $lunar->getLunarID ( $profile_args ['lunar'] );
		$astroID = $lunar->getAstroID ( $profile_args ['astro'] );
		unset ( $lunar );
		$params_args = array ('gender' => $main_args ['gender'], 'ageyear' => $profile_args ['ageyear'], 'provinceid' => $profile_args ['provinceid'], 'cityid' => $profile_args ['cityid'], 'distid' => $profile_args ['distid'], 'height' => $profile_args ['height'], 'weight' => $profile_args ['weight'], 'salary' => $profile_args ['salary'], 'education' => $profile_args ['education'], 'marry' => $profile_args ['marrystatus'], 'lovesort' => $profile_args ['lovesort'], 'lunar' => $lungarID, 'astro' => $astroID, 'rzmobile' => $mobilerz );
		return array ($main_args, $profile_args, $contact_args, $params_args );
	}
	
	public function validPerfect() {
		if (parent::$wrap_user ['userid'] == 0) {
			XHandle::redirect ( parent::$urlpath . 'index.php?c=passport&a=login' );
		}
		$email = XRequest::getArgs ( 'email' );
		$main_args = XRequest::getGpc ( array ('gender' ) );
		$profile_args = XRequest::getGpc ( array ('ageyear', 'agemonth', 'ageday', 'marrystatus', 'lovesort', 'education', 'salary', 'height', 'weight', 'provinceid', 'cityid', 'distid' ) );
		$main_args ['gender'] = intval ( $main_args ['gender'] );
		$main_args ['integrity'] = 1;
		if (! empty ( $email )) {
			if (false === XValid::isEmail ( $email )) {
				XHandle::halt ( '邮箱格式不正确', "", 1 );
			}
			$m = parent::model ( 'passport', 'im' );
			if (true === $m->doExistsEmail ( $email )) {
				XHandle::halt ( '对不起，该邮箱已存在！', '', 1 );
			}
			unset ( $m );
			$main_args ['email'] = $email;
		}
		$m = parent::model ( 'passport', 'im' );
		if (true === $m->doExistsEmail ( $main_args ['email'] )) {
			XHandle::halt ( '对不起，该邮箱已存在！', '', 1 );
		}
		unset ( $m );
		$profile_args ['ageyear'] = intval ( $profile_args ['ageyear'] );
		$profile_args ['agemonth'] = intval ( $profile_args ['agemonth'] );
		$profile_args ['ageday'] = intval ( $profile_args ['ageday'] );
		$profile_args ['marrystatus'] = intval ( $profile_args ['marrystatus'] );
		$profile_args ['lovesort'] = intval ( $profile_args ['lovesort'] );
		$profile_args ['education'] = intval ( $profile_args ['education'] );
		$profile_args ['salary'] = intval ( $profile_args ['salary'] );
		$profile_args ['height'] = intval ( $profile_args ['height'] );
		$profile_args ['weight'] = intval ( $profile_args ['weight'] );
		$profile_args ['provinceid'] = intval ( $profile_args ['provinceid'] );
		$profile_args ['cityid'] = intval ( $profile_args ['cityid'] );
		$profile_args ['distid'] = intval ( $profile_args ['distid'] );
		if ($profile_args ['ageyear'] < 1) {
			XHandle::halt ( '请选择生日年份', '', 1 );
		}
		if ($profile_args ['agemonth'] < 1 || $profile_args ['agemonth'] > 12) {
			XHandle::halt ( '请选择生日月份', '', 1 );
		}
		if ($profile_args ['ageday'] < 1 || $profile_args ['ageday'] > 31) {
			XHandle::halt ( '请选择生日日期', '', 1 );
		}
		if (strlen ( $profile_args ['agemonth'] ) == 1) {
			$profile_args ['agemonth'] = '0' . $profile_args ['agemonth'];
		}
		if (strlen ( $profile_args ['ageday'] ) == 1) {
			$profile_args ['ageday'] = '0' . $profile_args ['ageday'];
		}
		$profile_args ['birthday'] = $profile_args ['ageyear'] . '-' . $profile_args ['agemonth'] . '-' . $profile_args ['ageday'];
		if ($profile_args ['marrystatus'] == 0) {
			XHandle::halt ( '请选择婚姻状态', '', 1 );
		}
		if ($profile_args ['lovesort'] == 0) {
			XHandle::halt ( '请选择交友类型', '', 1 );
		}
		if (empty ( $profile_args ['education'] )) {
			XHandle::halt ( '请选择学历', '', 1 );
		}
		if ($profile_args ['salary'] == 0) {
			XHandle::halt ( '请选择月薪收入', '', 1 );
		}
		if ($profile_args ['height'] == 0) {
			XHandle::halt ( '请选择身高', '', 1 );
		}
		if ($profile_args ['weight'] == 0) {
			XHandle::halt ( '请选择体重', '', 1 );
		}
		if ($profile_args ['provinceid'] == 0) {
			XHandle::halt ( '请选择所在一级地区', '', 1 );
		}
		if ($profile_args ['cityid'] == 0) {
			XHandle::halt ( '请选择所在二级地区', '', 1 );
		}
		$lunar = parent::import ( 'lunar', 'util' );
		$profile_args ['astro'] = $lunar->getAstro ( $profile_args ['birthday'] );
		$profile_args ['lunar'] = $lunar->getLunar ( $profile_args ['birthday'] );
		$lungarID = $lunar->getLunarID ( $profile_args ['lunar'] );
		$astroID = $lunar->getAstroID ( $profile_args ['astro'] );
		unset ( $lunar );
		$params_args = array ('gender' => $main_args ['gender'], 'ageyear' => $profile_args ['ageyear'], 'provinceid' => $profile_args ['provinceid'], 'cityid' => $profile_args ['cityid'], 'distid' => $profile_args ['distid'], 'height' => $profile_args ['height'], 'weight' => $profile_args ['weight'], 'salary' => $profile_args ['salary'], 'education' => $profile_args ['education'], 'marry' => $profile_args ['marrystatus'], 'lovesort' => $profile_args ['lovesort'], 'lunar' => $lungarID, 'astro' => $astroID );
		return array ($main_args, $profile_args, $params_args );
	}
	
	public function validForward() {
		$forward = XRequest::getArgs ( 'forward' );
		if (empty ( $forward )) {
			$forward = $_SERVER ['HTTP_REFERER'];
		}
		if (strpos ( $forward, 'passport' )) {
			$forward = parent::$urlpath;
		}
		return $forward;
	}
	
	public function validLogin() {
		$args = XRequest::getGpc ( array ('loginname', 'password', 'checkcode' ) );
		if (parent::$cfg ['logincode'] == 1) {
			parent::loadUtil ( 'session' );
			if ($args ['checkcode'] != XSession::get ( 'verifycode' )) {
				XHandle::halt ( '对不起，验证码不正确！', '', 1 );
			}
		}
		if (false == XValid::isUserArgs ( $args ['loginname'] ) && false === XValid::isEmail ( $args ['loginname'] )) {
			XHandle::halt ( '登录账号必须为有效用户名或者邮箱', '', 1 );
		}
		if (true === XValid::isUserArgs ( $args ['loginname'] )) {
			if (XHandle::getLength ( $args ['loginname'] ) < 3 || XHandle::getLength ( $args ['loginname'] ) > 16) {
				XHandle::halt ( '用户名长度不正确，必须为3-16个字符，1个汉字=2个字符', '', 1 );
			}
		}
		if (false === XValid::isLength ( $args ['password'], 6, 16 )) {
			XHandle::halt ( '密码长度不正确', '', 1 );
		}
		unset ( $args ['checkcode'] );
		return $args;
	}
	
	public function validForget() {
		$args = XRequest::getGpc ( array ('username', 'email', 'checkcode' ) );
		if (parent::$cfg ['forgetcode'] == 1) {
			parent::loadUtil ( 'session' );
			if ($args ['checkcode'] != XSession::get ( 'verifycode' )) {
				XHandle::halt ( '对不起，验证码不正确！', '', 1 );
			}
		}
		if (false === XValid::isUserArgs ( $args ['username'] )) {
			XHandle::halt ( '用户名格式不正确', '', 1 );
		} else {
			if (XHandle::getLength ( $args ['username'] ) < 3 || XHandle::getLength ( $args ['username'] ) > 16) {
				XHandle::halt ( '用户名长度不正确，必须为3-16个字符，1个汉字=2个字符', '', 1 );
			}
		}
		if (false === XValid::isEmail ( $args ['email'] )) {
			XHandle::halt ( '邮箱格式不正确', '', 1 );
		}
		unset ( $args ['checkcode'] );
		return $args;
	}
	
	public function validValid() {
		$encode = XRequest::getArgs ( 'key', '', false );
		$array = array ();
		if (empty ( $encode )) {
			XHandle::halt ( '对不起，验证密钥不能为空！', '', 1 );
		} else {
			$decode = $this->_deCodeKey ( $encode );
			if (empty ( $decode )) {
				XHandle::halt ( '对不起，验证密钥丢失！', '', 1 );
			} else {
				$args = explode ( '-', $decode );
				$array = array ('userid' => intval ( $args [0] ), 'key' => $args [1], 'encode' => $encode );
				if ((time () - intval ( $args [2] )) > 86400) {
					XHandle::halt ( '对不起，邮件有效时间已过期，请在24小时内进行验证。', PATH_URL . 'index.php', 4 );
				}
			}
		}
		return $array;
	}
	
	public function validGetPass() {
		$encode = XRequest::getArgs ( 'key', '', false );
		$array = array ();
		if (empty ( $encode )) {
			XHandle::halt ( '对不起，验证密钥不能为空！', '', 1 );
		} else {
			$decode = $this->_deCodeKey ( $encode );
			if (empty ( $decode )) {
				XHandle::halt ( '对不起，验证密钥丢失！', '', 1 );
			} else {
				$args = explode ( '-', $decode );
				$array = array ('userid' => intval ( $args [0] ), 'key' => $args [1], 'encode' => $encode );
				if ((time () - intval ( $args [2] )) > 86400) {
					XHandle::halt ( '对不起，邮件有效时间已过期，请在24小时内进行验证。', PATH_URL . 'index.php?c=passport&a=forget', 4 );
				}
			}
		}
		return $array;
	}
	
	public function validChange() {
		$userinfo = $this->_validGetPass ();
		$args = XRequest::getGpc ( array ('password', 'confirmpassword', 'checkcode' ) );
		if (parent::$cfg ['forgetcode'] == 1) {
			parent::loadUtil ( 'session' );
			if ($args ['checkcode'] != XSession::get ( 'verifycode' )) {
				XHandle::halt ( '对不起，验证码不正确！', '', 1 );
			}
		}
		if (false === XValid::isLength ( $args ['password'], 6, 16 )) {
			XHandle::halt ( '密码长度不正确', '', 1 );
		} else {
			if ($args ['confirmpassword'] != $args ['password']) {
				XHandle::halt ( '确认密码不正确', '', 1 );
			}
		}
		unset ( $args ['checkcode'] );
		unset ( $args ['confirmpassword'] );
		$args ['userid'] = $userinfo ['userid'];
		$args ['key'] = $userinfo ['key'];
		return $args;
	}
	
	private function _validGetPass() {
		$encode = XRequest::getArgs ( 'key', '', false );
		$array = array ();
		if (empty ( $encode )) {
			XHandle::halt ( '对不起，验证密钥不能为空！', '', 1 );
		} else {
			$decode = $this->_deCodeKey ( $encode );
			if (empty ( $decode )) {
				XHandle::halt ( '对不起，验证密钥丢失！', '', 1 );
			} else {
				$args = explode ( '-', $decode );
				$array = array ('userid' => intval ( $args [0] ), 'key' => $args [1], 'encode' => $encode );
				if ((time () - intval ( $args [2] )) > 86400) {
					XHandle::halt ( '对不起，邮件有效时间已过期，请在24小时内进行验证。', PATH_URL . 'index.php?c=passport&a=forget', 4 );
				}
			}
		}
		return $array;
	}
	
	private function _deCodeKey($encode) {
		$string = NULL;
		if (! empty ( $encode )) {
			$code = parent::import ( 'code', 'util' );
			$string = $code->authCode ( $encode, 'DECODE', OESOFT_RANDKEY );
			unset ( $code );
		}
		return $string;
	}
	
	public function validSetMonolog() {
		$content = XRequest::getArgs ( 'content' );
		if (empty ( $content )) {
			XHandle::halt ( '内心独白不能为空', '', 1 );
		} else {
			if (true === XFilter::checkExistsForbidChar ( $content )) {
				XHandle::halt ( '对不起，输入的内心独白，含有系统禁止的字符！', '', 1 );
			}
		}
		if (XHandle::getWordLength ( $content ) < parent::$cfg ['molminlen'] || XHandle::getWordLength ( $content ) > parent::$cfg ['molmaxlen']) {
			XHandle::halt ( '内心独白字数必须在' . parent::$cfg ['molminlen'] . '~' . parent::$cfg ['molmaxlen'] . '个。', '', 1 );
		}
		if (intval ( parent::$cfg ['filternumber'] ) == 1 && intval ( parent::$cfg ['filterlennumber'] ) > 0) {
			if (true === XValid::contNumber ( $content, parent::$cfg ['filterlennumber'] )) {
				XHandle::halt ( '对不起，内心独白不能连续出现' . parent::$cfg ['filterlennumber'] . '个数字', '', 1 );
			}
		}
		return $content;
	}
	
	public function validSetContact() {
		$args = XRequest::getGpc ( array ('privacy', 'telephone', 'mobile', 'qq', 'msn', 'address', 'zipcode', 'skype', 'homepage', 'facebook' ) );
		if (empty ( $args ['mobile'] ) && empty ( $args ['qq'] )) {
			XHandle::halt ( '手机号码和QQ号至少填写一项', '', 1 );
		} else {
			if (! empty ( $args ['mobile'] )) {
				if (false === XValid::isMobile ( $args ['mobile'] )) {
					XHandle::halt ( '手机号码格式不正确，请填写11位有效手机号码', '', 1 );
				}
			}
			if (! empty ( $args ['qq'] )) {
				if (false === XValid::isQQ ( $args ['qq'] )) {
					XHandle::halt ( 'QQ号码格式不正确，请填写5-11位数字', '', 1 );
				}
			}
		}
		return $args;
	}
	
	public function validUpload() {
		$files = XRequest::getArgs ( 'uploadpart', '', false );
		if (empty ( $files )) {
			XHandle::halt ( '请选择要上传的形象照', '', 1 );
		}
		return $files;
	}
	
	public function validGetAvatar() {
		$url = XRequest::getArgs ( 'url', '', false );
		if (empty ( $url )) {
			XHandle::halt ( '照片地址不能为空！', '', 1 );
		}
		$code = parent::import ( 'code', 'util' );
		$url = $code->authCode ( $url, 'DECODE', OESOFT_RANDKEY, 0 );
		unset ( $code );
		if (empty ( $url )) {
			XHandle::halt ( '照片信息不全。', '', 1 );
		}
		return $url;
	}
	
	public function getOneMonolog(){
		//$model = parent::model( "passport", "im" );
        //$result = $model->getUserInfo();
        $model = parent::model ( 'home', 'im' );
        if(!isset($_SESSION)){
        	session_start();
        }
    	$uid = $_SESSION['uid'];
		$home = $model->getOneData ( $uid );
        //var_dump($home);exit;
        $sex = strval($home['gender'])-1;
        
        if(strval($home['lovesort'])==0){
        	$lovesort = 3;
        }else{
        	$lovesort = strval($home['lovesort'])-1;
        }
        
		$url = "http://localhost:6666/monolog.php?age=".$home['age']."&sex=".$sex."&want=".$lovesort;
		$curl = parent::import('curl','util');
		$data = $curl->get($url);
		unset($curl);
		if ($data == 'fail') {
			$data = '';
		}
		return $data;
	}
}
?>