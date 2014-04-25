<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class control extends userbase {
	private $_comeurl = null;
	private $type = NULL;
	private $uid = NULL;
	private function _getItems() {
		$this->type = XRequest::getArgs ( 'type' );
		$this->uid = XRequest::getInt ( 'uid' );
		$this->_comeurl = 'page=' . $this->page;
		$this->pagesize = 10;
	}
	public function control_run() {
		$this->_getItems ();
		$searchsql = '';
		$model = parent::model ( 'weibo', 'um' );
		if ($this->type == 'my') {
			list ( $datacount, $data ) = $model->getMyList ( array (
					'page' => $this->page,
					'pagesize' => $this->pagesize,
					'searchsql' => $searchsql 
			) );
		} elseif ($this->type == 'listen') {
			list ( $datacount, $data ) = $model->getListenList ( array (
					'page' => $this->page,
					'pagesize' => $this->pagesize,
					'searchsql' => $searchsql 
			) );
		} else {
			if ($this->uid > 0) {
				$searchsql .= "AND v.userid='" . $this->uid . "'";
			}
			list ( $datacount, $data ) = $model->getAllList ( array (
					'page' => $this->page,
					'pagesize' => $this->pagesize,
					'searchsql' => $searchsql 
			) );
		}
		$url = XRequest::getPhpSelf ();
		$url .= '?c=weibo&type=' . $this->type . '&uid=' . $this->uid . '';
		$var_array = array (
				'page' => $this->page,
				'nextpage' => $this->page + 1,
				'prepage' => $this->page - 1,
				'pagecount' => ceil ( $datacount / $this->pagesize ),
				'pagesize' => $this->pagesize,
				'total' => $datacount,
				'showpage' => XPage::user ( $datacount, $this->pagesize, $this->page, $url ),
				'weibo' => $data,
				'type' => $this->type,
				'uid' => $this->uid,
				'page_title' => $this->getTitle ( 'weibo_all' ) 
		);
		unset ( $model );
		TPL::assign ( $var_array );
		TPL::display ( $this->uctpl . 'weibo.tpl' );
	}
	public function control_saveweibo() {
		$response = 0;
		$error = '';
		$msg = '';
		$content = XRequest::getArgs ( 'content' );
		if (empty ( $content )) {
			$error .= "心情内容不能为空<br />";
		} else {
			if (true === XFilter::checkExistsForbidChar ( $content )) {
				$error .= "心情含有系统禁止的字符<br />";
			}
			if (intval ( parent::$cfg ['filternumber'] ) == 1 && intval ( parent::$cfg ['filterlennumber'] ) > 0) {
				if (true === XValid::contNumber ( $content, parent::$cfg ['filterlennumber'] )) {
					$error .= "心情不能连续出现" . parent::$cfg ['filterlennumber'] . "个数字<br />";
				}
			}
			if (XHandle::getWordLength ( $content ) > 500) {
				$error .= "心情字数大于500<br />";
			}
		}
		if (empty ( $error )) {
			$model = parent::model ( 'weibo', 'um' );
			$result = $model->doAddWeibo ( $content );
			unset ( $model );
			if (true === $result) {
				$response = 1;
				if (intval ( parent::$cfg ['auditweibo'] ) == 1) {
					$msg = "发表成功，请等待审核。";
				}
			}
		} else {
			$msg = $error;
		}
		echo json_encode ( array (
				'response' => $response,
				'msg' => $msg 
		) );
	}
	public function control_getcomdata() {
		$data = '';
		$wbid = XRequest::getArgs ( 'wbid' );
		if (true === XValid::isNumber ( $wbid ) && $wbid > 0) {
			$model = parent::model ( 'weibo', 'um' );
			$data = $model->getCommentList ( $wbid );
			unset ( $model );
		}
		$var_array = array (
				'comment' => $data,
				'wbid' => $wbid 
		);
		TPL::assign ( $var_array );
		$tpl_data = TPL::fetch ( $this->uctpl . 'weibo_comment.tpl' );
		echo json_encode ( array (
				'result' => $tpl_data 
		) );
	}
	public function control_savecomment() {
		$response = 0;
		$error = '';
		$msg = '';
		$wbid = XRequest::getArgs ( 'wbid' );
		$content = XRequest::getArgs ( 'content' );
		if (false === XValid::isNumber ( $wbid ) || $wbid < 1) {
			$error .= "心情ID错误！";
		}
		if (empty ( $content )) {
			$error .= "评论内容不能为空";
		} else {
			if (true === XFilter::checkExistsForbidChar ( $content )) {
				$error .= "评论含有系统禁止的字符<br />";
			}
			if (intval ( parent::$cfg ['filternumber'] ) == 1 && intval ( parent::$cfg ['filterlennumber'] ) > 0) {
				if (true === XValid::contNumber ( $content, parent::$cfg ['filterlennumber'] )) {
					$error .= "评论不能连续出现" . parent::$cfg ['filterlennumber'] . "个数字<br />";
				}
			}
			if (XHandle::getWordLength ( $content ) > 500) {
				$error .= "评论字数大于500<br />";
			}
		}
		if (empty ( $error )) {
			$model = parent::model ( 'weibo', 'um' );
			$result = $model->doSaveComment ( $wbid, $content );
			unset ( $model );
			if (true === $result) {
				$response = 1;
				if (intval ( parent::$cfg ['auditcomment'] ) == 1) {
					$msg = "评论成功，请等待审核。";
				}
			}
		} else {
			$msg = $error;
		}
		echo json_encode ( array (
				'response' => $response,
				'msg' => $msg 
		) );
	}
}
?>