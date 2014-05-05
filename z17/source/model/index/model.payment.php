<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class paymentIModel extends X {
	public function getOneData($id) {
		$info = null;
		$sql = "SELECT v.*, p.logo, p.filepath FROM " . DB_PREFIX . "payment AS v" . " LEFT JOIN " . DB_PREFIX . "payment_plugin AS p ON v.pluginid=p.pluginid" . " WHERE v.mentid='{$id}'";
		$data = parent::$obj->fetch_first ( $sql );
		if (! empty ( $data )) {
			$info = array ('payment_id' => $data ['mentid'], 'name' => $data ['mentname'], 'appid' => $data ['authid'], 'appkey' => $data ['privatekey'], 'appaccount' => $data ['authaccount'], 'feetype' => $data ['poundagetype'], 'fee' => $data ['poundage'], 'sdkname' => $data ['filepath'], 'logo' => parent::$urlpath . $data ['logo'] );
		}
		unset ( $data );
		return $info;
	}
	public function getOnePaymentLog($id) {
		$result_array = null;
		$sql = "SELECT `paymentid`, `userid`, `amount`, `paynum` FROM " . DB_PREFIX . "payment_log" . " WHERE `paynum`='{$id}'";
		$data = parent::$obj->fetch_first ( $sql );
		if (! empty ( $data )) {
			$result_array = array ('payment_id' => intval ( $data ['paymentid'] ), 'userid' => intval ( $data ['userid'] ), 'paynum' => $data ['paynum'] );
		}
		unset ( $data );
		return $result_array;
	}
	public function createPaymentLog($args) {
		$paynum = parent::$obj->fetch_newid ( "SELECT MAX(paynum) FROM " . DB_PREFIX . "payment_log", 100000 );
		$args = array_merge ( array ('paynum' => $paynum, 'addtime' => time () ), $args );
		parent::$obj->insert ( DB_PREFIX . 'payment_log', $args );
		return $paynum;
	}
	public function noticPayment($paynum, $userid, $args) {
		$result = 0;
		$sql = "SELECT `paystatus` FROM " . DB_PREFIX . "payment_log" . " WHERE `paynum`='{$paynum}' AND `userid`='{$userid}'";
		$data = parent::$obj->fetch_first ( $sql );
		if (! empty ( $data )) {
			if ($data ['paystatus'] == 0) {	//应该是未付款
				$realamount = floatval ( $args ['realamount'] );
				$array = array ('dealnum' => $args ['dealnum'], 'realamount' => $realamount, 'merchantfee' => floatval ( $args ['merchantfee'] ), 'paystatus' => 10, 'notictime' => time (), 'errorcode' => $args ['errorcode'] );
				parent::$obj->update ( DB_PREFIX . 'payment_log', $array, "`paynum`='{$paynum}'" );
				$result = 10;	//已付款
				if ($realamount > 0) {
					$moneylog = XLang::get ( 'money_paymentlog' );
					$moneylog = str_ireplace ( array ('{amount}', '{paynum}', '{dealnum}' ), array ($realamount, $paynum, $args ['dealnum'] ), $moneylog );
					$moeny_array = array ('userid' => $userid, 'actiontype' => 1, 'amount' => $realamount, 'logcontent' => $moneylog, 'opuser' => $userid, 'ordernum' => $paynum );
					$model_money = parent::model ( 'money', 'am' );
					$model_money->doAdd ( $moeny_array, 1 );
					unset ( $model_money );
				}
			} else {
				$result = 1;	//不需要付款
			}
		} else {
			$result = 11;
		}
		return $result;
	}
}
?>