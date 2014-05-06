<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class tenpayIModel extends X {
	private $title = '在线充值';
	private $payment = null;
	private $back = null;
	private $back_url = null;
	private $debug = 0;
	private $currency = 'CNY';
	private $sign_type = 'MD5';
	public function _get($paymentdata, $backdata = null) {
		$this->payment = $paymentdata;
		$this->back = $backdata;
		$this->back_url = parent::$cfg ['siteurl'] . 'index.php';
	}
	private function _initSDK() {
		require_once BASE_ROOT . './source/block/netpay/tenpay/PayRequestHandler.class.php';
		require_once BASE_ROOT . './source/block/netpay/tenpay/PayResponseHandler.class.php';
	}
	public function doSubmit() {
		$this->_initSDK ();
		$model_payment = parent::model ( 'payment', 'im' );
		$log_array = array ('paymentid' => intval ( $this->payment ['payment_id'] ), 'amount' => floatval ( $this->payment ['amount'] ), 'currency' => $this->currency, 'userid' => intval ( $this->payment ['userid'] ) );
		$paynum = $model_payment->createPaymentLog ( $log_array );
		unset ( $model_payment );
		unset ( $log_array );
		$bargainor_id = $this->payment ['appid'];
		$key = $this->payment ['appkey'];
		$strDate = date ( "Ymd" );
		$strTime = date ( "His" );
		$randNum = rand ( 1000, 9999 );
		$strReq = $strTime . $randNum;
		$sp_billno = $paynum;
		$transaction_id = $bargainor_id . $strDate . $strReq;
		$total_fee = ($this->payment ['amount'] * 100);
		$desc = $this->title;
		$reqHandler = new PayRequestHandler ();
		$reqHandler->init ();
		$reqHandler->setKey ( $key );
		$reqHandler->setParameter ( 'bargainor_id', $bargainor_id );
		$reqHandler->setParameter ( 'sp_billno', $sp_billno );
		$reqHandler->setParameter ( 'transaction_id', $transaction_id );
		$reqHandler->setParameter ( 'total_fee', $total_fee );
		$reqHandler->setParameter ( 'return_url', $this->back_url );
		$reqHandler->setParameter ( 'notify_url', $this->back_url );	//add by wangkai
		$reqHandler->setParameter ( 'desc', $desc );
		$reqHandler->setParameter ( 'cs', 'utf-8' );
		$reqHandler->setParameter ( 'spbill_create_ip', $_SERVER ['REMOTE_ADDR'] );
		$url = $reqHandler->getRequestURL ();
		unset ( $reqHandler );
		header ( "Location:{$url}" );
	}
	
	public function doCallBack() {
		$this->_initSDK ();
		$aliapy_config = array ('partner' => $this->payment ['appid'], 'key' => $this->payment ['appkey'], 'seller_email' => $this->payment ['appaccount'], 'return_url' => $this->back_url, 'sign_type' => $this->sign_type, 'input_charset' => 'utf-8', 'transport' => 'http' );
		$resHandler = new PayResponseHandler ();
		$resHandler->setKey ( $this->payment ['appkey'] );
		if (true === $resHandler->isTenpaySign ()) {
			$transaction_id = $resHandler->getParameter ( 'transaction_id' );
			$pay_result = $resHandler->getParameter ( 'pay_result' );
			if ($pay_result == '0') {
				$this->back ['amount'] = ($this->back ['amount'] / 100);
				$model_payment = parent::model ( 'payment', 'im' );
				$notic_array = array ('realamount' => $this->back ['amount'], 'dealnum' => $transaction_id, 'merchantfee' => 0, 'errorcode' => '' );
				$notic_result = $model_payment->noticPayment ( $this->back ['paynum'], $this->back ['userid'], $notic_array );
				unset ( $model_payment );
				if ($notic_result == 11) {
					TPL::display ( parent::$tplpath . OESOFT_TPLPRE . 'payment_fail.tpl' );
				} else {
					if ($notic_result == 10) {
						$color = 'green';
					} else {
						$color = 'blue';
					}
					$var_array = array ('title' => $this->title, 'userid' => $this->back ['userid'], 'paynum' => $this->back ['paynum'], 'amount' => $this->back ['amount'], 'currency' => $this->currency, 'tradeno' => $trade_no, 'color' => $color );
					TPL::assign ( $var_array );
					TPL::display ( parent::$tplpath . OESOFT_TPLPRE . 'payment_success.tpl' );
				}
			} else {
				TPL::display ( parent::$tplpath . OESOFT_TPLPRE . 'payment_fail.tpl' );
			}
		} else {
			XHandle::halt ( '对不起，财付通密钥验证失败！', '', 1 );
		}
		unset ( $resHandler );
	}
	
	//add by wangkai
	public function doCallBack2(){
		$this->_initSDK ();
		$aliapy_config = array ('partner' => $this->payment ['appid'], 'key' => $this->payment ['appkey'], 'seller_email' => $this->payment ['appaccount'], 'return_url' => $this->back_url, 'sign_type' => $this->sign_type, 'input_charset' => 'utf-8', 'transport' => 'http' );
		$resHandler = new PayResponseHandler ();
		$resHandler->setKey ( $this->payment ['appkey'] );
		if (true === $resHandler->isTenpaySign ()) {
			$transaction_id = $resHandler->getParameter ( 'transaction_id' );
			$pay_result = $resHandler->getParameter ( 'pay_result' );
			if ($pay_result == '0') {
				$this->back ['amount'] = ($this->back ['amount'] / 100);
				$model_payment = parent::model ( 'payment', 'im' );
				$notic_array = array ('realamount' => $this->back ['amount'], 'dealnum' => $transaction_id, 'merchantfee' => 0, 'errorcode' => '' );
				$notic_result = $model_payment->noticPayment ( $this->back ['paynum'], $this->back ['userid'], $notic_array );
				unset ( $model_payment );
				if ($notic_result == 11) {	//失败
					TPL::display ( parent::$tplpath . OESOFT_TPLPRE . 'payment_fail.tpl' );
				} else {
					die('success');	//如果是异步，直接返回
					/*if ($notic_result == 10) {
						$color = 'green';
					} else {
						$color = 'blue';
					}
					$var_array = array ('title' => $this->title, 'userid' => $this->back ['userid'], 'paynum' => $this->back ['paynum'], 'amount' => $this->back ['amount'], 'currency' => $this->currency, 'tradeno' => $trade_no, 'color' => $color );
					TPL::assign ( $var_array );
					TPL::display ( parent::$tplpath . OESOFT_TPLPRE . 'payment_success.tpl' );*/
				}
			} else {
				TPL::display ( parent::$tplpath . OESOFT_TPLPRE . 'payment_fail.tpl' );
			}
		} else {
			XHandle::halt ( '对不起，财付通密钥验证失败！', '', 1 );
		}
		unset ( $resHandler );
	}
}
?>