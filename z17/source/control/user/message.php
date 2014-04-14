<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class control extends userbase {
	private $type = null;
	private $_comeurl = null;
	private $_urlitem = null;
	private function _getItems() {
		$this->type = XRequest::getArgs ( 'type' );
		$this->_urlitem = 'type=' . $this->type;
		$this->_comeurl = 'page=' . $this->page . '&' . $this->_urlitem;
	}
	public function control_run() {
		$this->_getItems ();
		if ($this->type == 'unread') {
			$orderby = ' ORDER BY v.readflag ASC';
		} elseif ($this->type == 'topunread') {
			$orderby = ' ORDER BY v.readflag ASC, v.istop DESC';
		} else {
			$orderby = ' ORDER BY v.msgid DESC';
		}
		$searchsql = '';
		$model = parent::model ( 'message', 'um' );
		list ( $datacount, $data ) = $model->getReceiveList ( array (
				'page' => $this->page,
				'pagesize' => $this->pagesize,
				'searchsql' => $searchsql,
				'orderby' => $orderby 
		), $this->g ['msg'] );
		unset ( $model );
		$url = XRequest::getPhpSelf ();
		$url .= '?c=message&' . $this->_urlitem;
		$var_array = array (
				'page' => $this->page,
				'nextpage' => $this->page + 1,
				'prepage' => $this->page - 1,
				'pagecount' => ceil ( $datacount / $this->pagesize ),
				'pagesize' => $this->pagesize,
				'total' => $datacount,
				'showpage' => XPage::user ( $datacount, $this->pagesize, $this->page, $url ),
				'message' => $data,
				'type' => $this->type,
				'urlitem' => $this->_urlitem,
				'page_title' => $this->getTitle ( 'message_run' ),
				'usercount' => $usercount 
		);
		TPL::assign ( $var_array );
		TPL::display ( $this->uctpl . 'message.tpl' );
	}
	public function control_del() {
		$this->_getItems ();
		$result = false;
		$service = parent::service ( 'message', 'us' );
		$ids = $service->validArrayID ();
		unset ( $service );
		$model = parent::model ( 'message', 'um' );
		for($ii = 0; $ii < count ( $ids ); $ii ++) {
			$id = $ids [$ii];
			if (true === XValid::isNumber ( $id )) {
				$result = $model->doDel ( $id );
			}
		}
		unset ( $model );
		if (true === $result) {
			XHandle::halt ( '删除成功', $this->ucfile . '?c=message&' . $this->_comeurl, 0 );
		} else {
			XHandle::halt ( '删除失败', '', 1 );
		}
	}
	public function control_write() {
		$service = parent::service ( 'message', 'us' );
		$touid = $service->validToUid ();
		unset ( $service );
		$model_userauth = parent::model ( 'userauth', 'um' );
		if (true === $model_userauth->checkLimitAvatarRized ( $this->u ['avatar'], $this->u ['avatarflag'] )) {
			XHandle::artTips ( 'avatar', '' );
		}
		if (true === $model_userauth->checkLimitEmailRized ( $this->u ['emailrz'] )) {
			XHandle::artTips ( 'emailrz', '' );
		}
		unset ( $model_userauth );
		$model_user = parent::model ( 'user', 'um' );
		$touser = $model_user->getUserSimpleInfo ( $touid );
		unset ( $model_user );
		if (empty ( $touser )) {
			XHandle::artTips ( '', '对不起，对方信息不存在或已删除！' );
		} else {
			$model = parent::model ( 'message', 'um' );
			$paystatus = $model->checkWriteNeedPay ( $touser ['gender'], $this->g ['msg'] );
			unset ( $model );
			$var_array = array (
					'touid' => $touid,
					'touser' => $touser,
					'page_title' => $this->getTitle ( 'message_send' ),
					'paystatus' => $paystatus 
			);
			TPL::assign ( $var_array );
			TPL::display ( $this->uctpl . 'writemsg_jdbox.tpl' );
		}
	}
	public function control_savewrite() {
		$paymoney = 0;
		$response = 0;
		$msg = "";
		$service = parent::service ( 'message', 'us' );
		$touid = $service->validToUid ( 1 );
		$message = $service->validContent ();
		unset ( $service );
		$model_user = parent::model ( 'user', 'um' );
		$tauser = $model_user->getUserSimpleInfo ( $touid );
		unset ( $model_user );
		if (empty ( $tauser )) {
			$msg .= "对不起，收信人不能为空。<br />";
		}
		$model = parent::model ( 'message', 'um' );
		if (empty ( $msg )) {
			$needpay = $model->checkWriteNeedPay ( $tauser ['gender'], $this->g ['msg'] );
			if (true === $needpay) {
				$paymoney = floatval ( $this->g ['fee'] ['sendmsgfee'] );
				if ($paymoney <= 0) {
					$paymoney = 1;
				}
				if (parent::$wrap_user ['money'] < $paymoney) {
					$msg .= "金币不足，无法写信件。<br />";
				}
			}
		}
		if (empty ( $msg )) {
			$result = $model->doWriteMsg ( $message, $touid, $tauser ['gender'], $tauser ['username'], $paymoney, array (
					'g' => $this->g 
			) );
			unset ( $model );
			if (true === $result) {
				$response = 1;
			}
		}
		echo json_encode ( array (
				'response' => $response,
				'msg' => $msg 
		) );
	}
	public function control_greet() {
		$sex = XRequest::getInt ( 'sex' );
		$model = parent::model ( 'message', 'um' );
		$response = $model->getGreet ( $sex );
		unset ( $model );
		echo json_encode ( array (
				'response' => $response 
		) );
	}
	public function control_readpay() {
		$response = 0;
		$msg = "";
		$service = parent::service ( 'message', 'us' );
		$id = $service->validID ();
		unset ( $service );
		$fee = floatval ( $this->g ['fee'] ['viewmsgfee'] );
		if ($fee <= 0) {
			$fee = 1;
		}
		if ($this->u ['money'] < $fee) {
			$msg = "金币不足，请先充值";
		} else {
			$model = parent::model ( 'readmsg', 'um' );
			$fromuid = $model->getFromUid ( $id );
			if ($fromuid == 0) {
				$msg .= "该信件不存在或已删除";
			} else {
				$result = $model->doPayReadMsg ( $id, $fee, $fromuid );
				if (true === $result) {
					$response = 1;
				}
			}
			unset ( $model );
		}
		echo json_encode ( array (
				'response' => $response,
				'msg' => $msg 
		) );
	}
}
?>