<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class ajaxIAction extends indexbase {
	private $service = null;
	private function _new() {
		$this->service = parent::service ( 'ajax', 'is' );
	}
	private function _unset() {
		unset ( $this->service );
	}
	public function action_checkemail() {
		$email = XRequest::getArgs ( 'email' );
		$type = XRequest::getArgs ( 'type' );
		$response = 0;
		if (false === XValid::isEmail ( $email )) {
			$response = 1;
		} else {
			if ($type == 'love') {
				$m = parent::model ( 'user', 'am' );
				$result = $m->doExistsEmail ( $email );
				unset ( $m );
				if (true === $result) {
					$response = 2;
				} else {
					$response = 3;
				}
			} else {
				$uc_model = parent::model ( 'uc', 'im' );
				$uc_result = $uc_model->checkEmail ( $email );
				unset ( $uc_model );
				if ($uc_result < 0) {
					$response = 4;
				} else {
					$m = parent::model ( 'user', 'am' );
					$result = $m->doExistsEmail ( $email );
					unset ( $m );
					if (true === $result) {
						$response = 2;
					} else {
						$response = 3;
					}
				}
			}
		}
		unset ( $email );
		echo json_encode ( array (
				'response' => $response 
		) );
	}
	public function action_checkuser() {
		$username = XRequest::getGpc ( 'username' );
		$response = 0;
		if (false === XValid::isUserArgs ( $username )) {
			$response = 1;
		} else {
			$uc_model = parent::model ( 'uc', 'im' );
			$uc_result = $uc_model->checkUserName ( $username );
			unset ( $uc_model );
			if ($uc_result < 0) {
				$response = 5;
			} else {
				if (true === XFilter::checkExistsForbidUserName ( $username )) {
					$response = 2;
				}
				if (intval ( parent::$cfg ['regusernumber'] ) == 1) {
					if (true === XValid::contNumber ( $username, parent::$cfg ['usernumberlen'] )) {
						$response = 2;
					}
				}
				if ($response != 2) {
					$m = parent::model ( 'user', 'am' );
					$result = $m->doExistsUserName ( $username );
					unset ( $m );
					if (true === $result) {
						$response = 3;
					} else {
						$response = 4;
					}
				}
			}
		}
		unset ( $username );
		echo json_encode ( array (
				'response' => $response 
		) );
	}
	public function action_checkcode() {
		$checkcode = XRequest::getArgs ( 'checkcode' );
		$response = 0;
		if (! empty ( $checkcode )) {
			parent::loadUtil ( 'session' );
			$nowcode = XSession::get ( 'verifycode' );
			if ($checkcode == $nowcode) {
				$response = 1;
			}
		}
		echo json_encode ( array (
				'response' => $response 
		) );
	}
	public function action_fetchcity() {
		$data = '';
		$rootid = XRequest::getInt ( 'rootid' );
		if ($rootid > 0) {
			$m = parent::model ( 'area', 'am' );
			$data = $m->getJsonChilds ( intval ( $rootid ) );
			unset ( $m );
		}
		echo $data;
	}
	public function action_fetchdist() {
		$data = '';
		$rootid = XRequest::getInt ( 'rootid' );
		if ($rootid > 0) {
			$m = parent::model ( 'area', 'am' );
			$data = $m->getJsonChilds ( intval ( $rootid ) );
			unset ( $m );
		}
		echo $data;
	}
	public function action_hometown() {
		$data = '';
		$rootid = XRequest::getInt ( 'rootid' );
		if ($rootid > 0) {
			$m = parent::model ( 'hometown', 'am' );
			$data = $m->getJsonChilds ( intval ( $rootid ) );
			unset ( $m );
		}
		echo $data;
	}
	public function action_imbox() {
		if (parent::$wrap_user ['userid'] > 0) {
			$this->_ejectLogin ();
		} else {
			$this->_ejectNotLogin ();
		}
	}
	private function _ejectNotLogin() {
		$i = rand ( 1, 3 );
		$model = parent::model ( 'imbox', 'im' );
		if ($i == 1) {
			$content = $model->imTips ();
		} elseif ($i == 2) {
			$content = $model->imNewReg ();
		} else {
			$content = $model->imNewLogin ();
		}
		unset ( $model );
		echo json_encode ( array (
				'msg' => $content 
		) );
	}
	private function _ejectLogin() {
		$content = '';
		$i = rand ( 2, 8 );
		$model = parent::model ( 'imbox', 'im' );
		if ($i == 2) {
			$content = $model->imNewReg ();
		} elseif ($i == 3) {
			$content = $model->imNewLogin ();
		} elseif ($i == 4) {
			$content = $model->imMatch ();
		} elseif ($i == 5) {
			$content = $model->imView ();
		} elseif ($i == 6) {
			$content = $model->imMessage ();
		} elseif ($i == 7) {
			$content = $model->imHi ();
		} elseif ($i == 8) {
			$content = $model->imGift ();
		}
		unset ( $model );
		echo json_encode ( array (
				'msg' => $content 
		) );
	}
	public function action_acceptask() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validAcceptask ();
		$this->_unset ();
		$response = false;
		$array = null;
		if (! empty ( $error )) {
			$array = array (
					'response' => $response,
					'error' => $error 
			);
		} else {
			$model = parent::model ( 'ask', 'um' );
			$result = $model->doAccept ( intval ( $args ['id'] ), intval ( $args ['anid'] ) );
			unset ( $model );
			if ($result == 2) {
				$array = array (
						'response' => $response,
						'error' => '对不起，读取数据错误！' 
				);
			} elseif ($result == 3) {
				$array = array (
						'response' => $response,
						'error' => '对不起，该求助已采纳建议！' 
				);
			} elseif ($result == 4) {
				$array = array (
						'response' => true,
						'error' => '建议采纳成功' 
				);
			} else {
				$array = array (
						'response' => $response,
						'error' => '建议采纳失败' 
				);
			}
		}
		echo json_encode ( $array );
	}
	public function action_ceshitruerate() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validCeshiTrueRate ();
		$this->_unset ();
		$response = false;
		$array = null;
		if (! empty ( $error )) {
			$array = array (
					'response' => $response,
					'error' => $error 
			);
		} else {
			$model = parent::model ( 'ceshi', 'im' );
			$result = $model->scoreTrueRate ( intval ( $args ['id'] ), intval ( $args ['istrue'] ) );
			unset ( $model );
			if ($result == 0) {
				$array = array (
						'response' => $response,
						'error' => '对不起，读取数据错误！' 
				);
			} elseif ($result == 1) {
				$array = array (
						'response' => $response,
						'error' => '对不起，您已经提交过，请不要重复！' 
				);
			} elseif ($result == 2) {
				$array = array (
						'response' => true,
						'error' => '提交成功' 
				);
			} else {
				$array = array (
						'response' => $response,
						'error' => '提交失败' 
				);
			}
		}
		echo json_encode ( $array );
	}
	public function action_diarycomment() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validDiaryComment ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'diary', 'im' );
			$response = $model->doSaveComment ( intval ( $args ['id'] ), $args ['content'] );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_ceshicomment() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validCechiComment ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'ceshi', 'im' );
			$response = $model->doSaveComment ( intval ( $args ['id'] ), $args ['content'] );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_storycomment() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validStoryComment ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'story', 'im' );
			$response = $model->doSaveComment ( intval ( $args ['id'] ), $args ['content'] );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_askcomment() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validAskComment ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'ask', 'im' );
			$response = $model->doSaveComment ( intval ( $args ['id'] ), $args ['content'] );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_datingapp() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validDatingApp ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'dating', 'im' );
			$response = $model->doSaveApp ( intval ( $args ['id'] ), $args ['contact'], $args ['content'] );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_weibo() {
		$this->_new ();
		list ( $content, $error ) = $this->service->validWeibo ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'weibo', 'im' );
			$response = $model->doSaveWeibo ( $content );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_weibocomment() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validWeiboComment ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
			echo json_encode ( $array );
		} else {
			$model = parent::model ( 'weibo', 'im' );
			$response = $model->doSaveComment ( $args ['wbid'], $args ['comid'], $args ['content'] );
			$array = array (
					'error' => '',
					'response' => $response 
			);
			unset ( $model );
			echo json_encode ( $array );
		}
	}
	public function action_hits() {
		$this->_new ();
		list ( $id, $type ) = $this->service->validHits ();
		$this->_unset ();
		$hits = 0;
		if ($id > 0) {
			$type = empty ( $type ) ? 'diary' : $type;
			if (in_array ( $type, array (
					'ask',
					'ceshi',
					'dating',
					'diary',
					'info',
					'party',
					'story',
					'home' 
			) )) {
				$model = parent::model ( $type, 'im' );
				$hits = $model->updateHits ( $id );
				unset ( $model );
			}
		}
		$json = array (
				'hits' => $hits 
		);
		echo json_encode ( $json );
	}
	public function action_serial() {
		$model = parent::model ( 'ajax', 'im' );
		$data = $model->getSerial ();
		unset ( $model );
		$json = array (
				'result' => $data 
		);
		echo json_encode ( $json );
	}
	public function action_rabbit() {
		$type = XRequest::getArgs ( 'type' );
		$model = parent::model ( 'ajax', 'im' );
		$data = $model->getRabbit ( $type );
		unset ( $model );
		if (empty ( $data )) {
			$json = array (
					'result' => - 1,
					'error' => '' 
			);
		} else {
			$json = $data;
		}
		echo json_encode ( $json );
	}
	public function action_updateserial() {
		$this->_new ();
		$args = $this->service->validSerial ();
		$this->_unset ();
		$model = parent::model ( 'ajax', 'im' );
		$model->doUpdateSerial ( $args );
		unset ( $model );
		echo json_encode ( array (
				'response' => true 
		) );
	}
	public function action_listen() {
		$this->_new ();
		list ( $tuid, $error ) = $this->service->validTuid ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
		} else {
			$m_pass = parent::model ( 'passport', 'im' );
			list ( $uinfo, $ginfo ) = $m_pass->getLoginUserInfo ( parent::$wrap_user ['userid'] );
			unset ( $m_pass );
			$m_listen = parent::model ( 'listen', 'um' );
			$result = $m_listen->doAjListen ( $tuid, $ginfo );
			unset ( $m_listen );
			if ($result == 1) {
				$array = array (
						'error' => '对不起，对方ID不能为自己',
						'response' => 0 
				);
			} elseif ($result == 2) {
				$array = array (
						'error' => '对不起，所在会员组关注好友数已满',
						'response' => 0 
				);
			} elseif ($result == 3) {
				$array = array (
						'error' => '对不起，已关注，请不要重复操作',
						'response' => 0 
				);
			} elseif ($result == 4) {
				$array = array (
						'error' => '关注成功',
						'response' => 1 
				);
			} else {
				$array = array (
						'error' => '关注失败',
						'response' => 0 
				);
			}
		}
		echo json_encode ( $array );
	}
	public function action_dellisten() {
		$this->_new ();
		list ( $tuid, $error ) = $this->service->validTuid ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
		} else {
			$m_listen = parent::model ( 'listen', 'um' );
			$result = $m_listen->doAjDelListen ( $tuid );
			unset ( $m_listen );
			if ($result == 1) {
				$array = array (
						'error' => '对不起，对方ID不能为自己',
						'response' => 0 
				);
			} elseif ($result == 2) {
				$array = array (
						'error' => '取消成功',
						'response' => 1 
				);
			} else {
				$array = array (
						'error' => '取消失败',
						'response' => 0 
				);
			}
		}
		echo json_encode ( $array );
	}
	public function action_black() {
		$this->_new ();
		list ( $tuid, $error ) = $this->service->validTuid ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'error' => $error,
					'response' => 0 
			);
		} else {
			$m_listen = parent::model ( 'listen', 'um' );
			$result = $m_listen->doAjBlack ( $tuid );
			unset ( $m_listen );
			if ($result == 1) {
				$array = array (
						'error' => '对不起，对方ID不能为自己',
						'response' => 0 
				);
			} elseif ($result == 2) {
				$array = array (
						'error' => '拉黑成功',
						'response' => 1 
				);
			} else {
				$array = array (
						'error' => '拉黑失败',
						'response' => 0 
				);
			}
		}
		echo json_encode ( $array );
	}
	public function action_setavatar() {
		$res = false;
		$mess = '';
		$this->_new ();
		list ( $img, $cd, $mess ) = $this->service->validSetAvatar ();
		$this->_unset ();
		if (empty ( $mess )) {
			$model_avatar = parent::model ( 'avatar', 'am' );
			if (true === $model_avatar->doCutAvatar ( parent::$wrap_user ['userid'], $img, $cd, 'user' )) {
				$res = true;
				if (intval ( parent::$cfg ['auditavatar'] ) == 1) {
					$mess = '设置成功，请等待网站审核';
				} else {
					$mess = '设置成功';
				}
				parent::loadUtil ( 'file' );
				XFile::delDir ( BASE_ROOT . './data/attachment/temp/' . parent::$wrap_user ['userid'] );
			} else {
				$res = false;
				$mess = '设置失败';
			}
			unset ( $model_avatar );
		}
		echo json_encode ( array (
				'response' => $res,
				'message' => $mess 
		) );
	}
	public function action_visithome() {
		$this->_new ();
		list ( $homeuid, $error ) = $this->service->validHomeUid ();
		$this->_unset ();
		if (! empty ( $error )) {
			$array = array (
					'response' => 0,
					'error' => $error 
			);
		} else {
			$m_visit = parent::model ( 'visit', 'um' );
			$result = $m_visit->recordVisitHome ( $homeuid );
			unset ( $m_visit );
			if (true === $result) {
				$array = array (
						'response' => 1,
						'error' => '记录成功' 
				);
			} else {
				$array = array (
						'response' => 0,
						'error' => '记录失败' 
				);
			}
		}
		echo json_encode ( $array );
	}
	public function action_sendhomesms() {
		$this->_new ();
		list ( $args, $error ) = $this->service->validHomeSms ();
		$this->_unset ();
		$response = false;
		if (empty ( $error )) {
			$m_pass = parent::model ( 'passport', 'im' );
			list ( $uinfo, $ginfo ) = $m_pass->getLoginUserInfo ( parent::$wrap_user ['userid'] );
			unset ( $m_pass );
			if ($args ['type'] == 0) {
				if ($uinfo ['mbsms'] <= 0) {
					$error .= "对不起，您的帐号可用短信数量不足！";
				}
			} else {
				if ($uinfo ['money'] < floatval ( $ginfo ['fee'] ['smsfee'] )) {
					$error .= "对不起，您的帐号可用余额不足！";
				}
			}
			if (empty ( $error )) {
				$model = parent::model ( 'ajax', 'im' );
				list ( $result, $error ) = $model->ajaxSendHomeSms ( intval ( $args ['uid'] ), $args ['content'], $args ['type'], $ginfo ['fee'] ['smsfee'] );
				unset ( $model );
				if ($result == 0) {
					$error = "会员数据不存在！";
				} elseif ($result == 1) {
					$error = "手机号码错误！";
				} elseif ($result == 2) {
					$error = "手机号码未认证！";
				} elseif ($result == 3) {
					$response = true;
					$error = "发送成功";
				} else {
					if (empty ( $error )) {
						$error = '发送失败';
					}
				}
			}
		}
		echo json_encode ( array (
				'response' => $response,
				'message' => $error 
		) );
	}
	public function action_getmbkey() {
		$this->_new ();
		list ( $mobile, $error ) = $this->service->validMobileKey ();
		$this->_unset ();
		$response = false;
		if (empty ( $error )) {
			$model = parent::model ( 'ajax', 'im' );
			list ( $result, $error ) = $model->ajaxGetMobileKey ( $mobile );
			unset ( $model );
			if ($result == 0) {
				$error = "会员数据不存在！";
			} elseif ($result == 1) {
				$error = "该手机号码已认证！";
			} elseif ($result == 2) {
				$response = true;
				$error = "验证码发送成功，请注意查收";
			} else {
				if (empty ( $error )) {
					$error = '验证码发送失败';
				}
			}
		}
		echo json_encode ( array (
				'response' => $response,
				'message' => $error 
		) );
	}
	public function action_getmbcode() {
		$this->_new ();
		list ( $mobile, $error ) = $this->service->validMobileCode ();
		$this->_unset ();
		$response = false;
		if (empty ( $error )) {
			$model = parent::model ( 'ajax', 'im' );
			list ( $result, $error ) = $model->ajaxGetMobileCode ( $mobile );
			unset ( $model );
			if ($result == 0) {
				$error = "发送失败，未知错误！";
			} elseif ($result == 1) {
				$response = true;
				$error = "验证码发送成功，请注意查收";
			} else {
				if (empty ( $error )) {
					$error = '验证码发送失败';
				}
			}
		}
		echo json_encode ( array (
				'response' => $response,
				'message' => $error 
		) );
	}
	public function action_sendmailkey() {
		$error = null;
		$response = false;
		if (parent::$wrap_user ['userid'] < 1) {
			$error = "对不起，你还没登录网站，请先登录。";
		}
		if (empty ( $error )) {
			$model = parent::model ( 'ajax', 'im' );
			list ( $result, $error ) = $model->sendMailKey ();
			unset ( $model );
			if ($result == 0) {
				$error = "对不起，读取邮箱失败！";
			} elseif ($result == 1) {
				$error = "对不起，该邮箱已认证！";
			} elseif ($result == 2) {
				$error = "认证邮件已发送成功，请注意查收。";
				$response = true;
			} else {
				$error = "邮件发送失败";
			}
		}
		echo json_encode ( array (
				'response' => $response,
				'message' => $error 
		) );
	}
}
?>