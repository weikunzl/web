<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class messageUModel extends X {
	public function getHashMsgCount($hid, $firstuid = 0) {
		$count_sql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "message" . " WHERE `todeleted`='0' AND `hashid`='{$hid}'";
		return parent::$obj->fetch_count ( $count_sql );
	}
	public function getReceiveList($items, $grp = NULL) {
		$items ['orderby'] = empty ( $items ['orderby'] ) ? ' ORDER BY v.msgid DESC' : $items ['orderby'];
		$pagesize = intval ( $items ['pagesize'] );
		$where = " WHERE v.touserid='" . parent::$wrap_user ['userid'] . "' AND v.todeleted='0' " . $items ['searchsql'];
		$start = ($items ['page'] - 1) * $pagesize;
		$countsql = "SELECT COUNT(*) FROM " . DB_PREFIX . "message AS v" . $where;
		$total = parent::$obj->fetch_count ( $countsql );
		$sql = "SELECT v.*, u.username, u.gender, u.avatar, u.avatarflag, u.groupid," . " p.ageyear, p.provinceid, p.cityid, p.distid," . " p.marrystatus, p.education, p.salary, p.height," . " vip.vipenddate, h.firstuid" . " FROM " . DB_PREFIX . "message AS v" . " LEFT JOIN " . DB_PREFIX . "user AS u ON v.fromuserid=u.userid" . " LEFT JOIN " . DB_PREFIX . "user_profile AS p ON v.fromuserid=p.userid" . " LEFT JOIN " . DB_PREFIX . "user_validate AS vip ON v.fromuserid=vip.userid" . " LEFT JOIN " . DB_PREFIX . "message_hash AS h ON v.hashid=h.hashid" . $where . $items ['orderby'] . " LIMIT " . $start . ", " . $pagesize . "";
		$data = parent::$obj->getall ( $sql );
		$i = 1;
		parent::loadLib ( array (
				'mod',
				'user' 
		) );
		foreach ( $data as $key => $value ) {
			$data [$key] ['age'] = XMod::getAge ( $value ['ageyear'] );
			$data [$key] ['homeurl'] = XUrl::getHomeUrl ( $value ['fromuserid'] );
			$data [$key] ['useravatar'] = XUser::getAvatar ( $value ['gender'], $value ['avatar'], $value ['avatarflag'] );
			$data [$key] ['avatarurl'] = XUser::getAvatarUrl ( $value ['gender'], $value ['avatar'], $value ['avatarflag'] );
			$data [$key] ['levelimg'] = XUser::getIdentify ( $value ['gender'], $value ['groupid'], $value ['vipenddate'] );
			if ($value ['readflag'] == 1) {
				$data [$key] ['needpaystatus'] = false;
			} else {
				$data [$key] ['needpaystatus'] = $this->checkViewNeedPay ( $value ['gender'], $grp );
			}
			$data [$key] ['i'] = $i;
			$i = ($i + 1);
		}
		return array (
				$total,
				$data 
		);
	}
	public function doDel($id) {
		$result = false;
		$sql = "SELECT v.msgid, hash.firstuid" . " FROM " . DB_PREFIX . "message AS v" . " LEFT JOIN " . DB_PREFIX . "message_hash AS hash ON v.hashid=hash.hashid" . " WHERE v.msgid='{$id}' AND v.touserid='" . parent::$wrap_user ['userid'] . "'";
		$rows = parent::$obj->fetch_first ( $sql );
		if (! empty ( $rows )) {
			if ($rows ['firstuid'] == parent::$wrap_user ['userid']) {
				$array = array (
						'todeleted' => 1,
						'first_tdeleted' => 1 
				);
			} else {
				$array = array (
						'todeleted' => 1,
						'sec_tdeleted' => 1 
				);
			}
			$result = parent::$obj->update ( DB_PREFIX . 'message', $array, "msgid='{$id}'" );
		}
		unset ( $rows );
		return $result;
	}
	public function doWriteMsg($message, $touid, $tosex, $tousername = '', $payfee = 0, $extends = array()) {
		$result = false;
		$hashid = (intval ( parent::$wrap_user ['userid'] ) + intval ( $touid ));
		$time = time ();
		$hash_sql = "SELECT `hashid` FROM " . DB_PREFIX . "message_hash WHERE `hashid`='{$hashid}'";
		$hash_data = parent::$obj->fetch_first ( $hash_sql );
		if (empty ( $hash_data )) {
			$hash_array = array (
					'hashid' => $hashid,
					'timeline' => $time,
					'firstuid' => parent::$wrap_user ['userid'] 
			);
			parent::$obj->insert ( DB_PREFIX . 'message_hash', $hash_array );
		}
		unset ( $hash_sql, $hash_data );
		if (intval ( $extends ['g'] ['msg'] ['msgistop'] ) == 1) {
			$istop = 1;
		} else {
			$istop = 0;
		}
		$msgid = parent::$obj->fetch_newid ( "SELECT MAX(msgid) FROM " . DB_PREFIX . "message", 1 );
		$array = array (
				'msgid' => $msgid,
				'hashid' => $hashid,
				'content' => $message,
				'fromuserid' => parent::$wrap_user ['userid'],
				'touserid' => $touid,
				'flag' => 1,
				'readflag' => 0,
				'sendtime' => $time,
				'fromdeleted' => 0,
				'todeleted' => 0,
				'istop' => $istop 
		);
		$result = parent::$obj->insert ( DB_PREFIX . 'message', $array );
		if (true === $result) {
			$sendid = parent::$obj->fetch_newid ( "SELECT MAX(sendid) FROM " . DB_PREFIX . "message_daysends", 1 );
			$send_array = array (
					'sendid' => $sendid,
					'senduserid' => parent::$wrap_user ['userid'],
					'touserid' => $touid,
					'msgid' => $msgid,
					'tyear' => date ( 'Y', $time ),
					'tmonth' => date ( 'm', $time ),
					'tday' => date ( 'd', $time ),
					'dateline' => strtotime ( date ( 'Y-m-d', $time ) ),
					'tosex' => $tosex 
			);
			parent::$obj->insert ( DB_PREFIX . 'message_daysends', $send_array );
			if (isset ( $extends ['pid'] )) {
				if (true === XValid::isNumber ( $pid ) && $pid > 0) {
					parent::$obj->update ( DB_PREFIX . 'message', array (
							'replystatus' => 1 
					), "msgid='{$pid}'" );
				}
			}
			if (isset ( $extends ['id'] )) {
				if (true === XValid::isNumber ( $id ) && $id > 0) {
					parent::$obj->update ( DB_PREFIX . 'message', array (
							'replystatus' => 1 
					), "msgid='{$id}'" );
				}
			}
			if ($payfee > 0) {
				$log_content = XLang::get ( 'money_sendmsglog' );
				$log_content = str_ireplace ( array (
						'{userid}',
						'username',
						'{fee}' 
				), array (
						$touid,
						$tousername,
						$payfee 
				), $log_content );
				$log_array = array (
						'userid' => parent::$wrap_user ['userid'],
						'actiontype' => 2,
						'amount' => $payfee,
						'logcontent' => $log_content,
						'opuser' => parent::$wrap_user ['username'] 
				);
				$m_money = parent::model ( 'money', 'am' );
				$m_money->doAdd ( $log_array );
				unset ( $m_money, $log_array );
			}
		}
		return $result;
	}
	public function countNotRead($uid) {
		$sql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "message" . " WHERE `readflag`='0' AND `flag`='1' AND `todeleted`='0' AND `touserid`='{$uid}'";
		return parent::$obj->fetch_count ( $sql );
	}
	public function countReceiveMessage($uid, $type = 'receive') {
		$sql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "message" . " WHERE `flag`='1' AND `todeleted`='0' AND `touserid`='{$uid}'";
		if ($type == 'new') {
			$sql .= " AND `readflag`='0'";
		}
		$count = 0;
		$count = parent::$obj->fetch_count ( $sql );
		unset ( $sql );
		return $count;
	}
	public function checkWriteNeedPay($tosex, $grp) {
		$maxsend = 0;
		$res = false;
		if (parent::$wrap_user ['gender'] == $tosex) {
			if (intval ( $grp ['txsendlimit'] ) == 1) {
				$maxsend = intval ( $grp ['txsendnum'] );
				if ($maxsend == 0) {
					$res = true;
				} else {
					$havesend = $this->countMsgSends ( $tosex );
					if ($havesend >= $maxsend) {
						$res = true;
					}
				}
			}
		} else {
			if (parent::$wrap_user ['gender'] == 1 && intval ( $grp ['yxsendlimit'] ) == 1) {
				$maxsend = intval ( $grp ['yxsendnum'] );
				if ($maxsend == 0) {
					$res = true;
				} else {
					$havesend = $this->countMsgSends ( $tosex );
					if ($havesend >= $maxsend) {
						$res = true;
					}
				}
			}
		}
		return $res;
	}
	/*
	 * 
	 */
	public function checkViewNeedPay($fromsex, $grp) {
		$maxsend = 0;
		$res = false;
		if (parent::$wrap_user ['gender'] == $fromsex) {
			if (intval ( $grp ['txviewlimit'] ) == 1) {
				$maxview = intval ( $grp ['txviewnum'] );
				if ($maxview == 0) {
					$res = true;
				} else {
					$haveview = $this->countMsgViews ( $fromsex );
					if ($haveview >= $maxview) {
						$res = true;
					}
				}
			}
		} else {
			if (parent::$wrap_user ['gender'] == 1 && intval ( $grp ['yxviewlimit'] ) == 1) {
				$maxview = intval ( $grp ['yxviewnum'] );
				echo $maxview;
				echo 333;
				if ($maxview == 0) {
					$res = true;
				} else {
					$haveview = $this->countMsgViews ( $fromsex );
					echo $haveview;
					if ($haveview >= $maxview) {
						$res = true;
					}
				}
			}
		}
		return $res;
	}
	public function countMsgSends($tosex = 0) {
		$dateline = strtotime ( date ( "Y-m-d", time () ) );
		$sql = "SELECT COUNT(sendid) FROM " . DB_PREFIX . "message_daysends" . " WHERE `senduserid`='" . parent::$wrap_user ['userid'] . "' AND dateline='{$dateline}'";
		if ($tosex > 0) {
			$sql .= " AND tosex='{$tosex}'";
		}
		$count = parent::$obj->fetch_count ( $sql );
		return $count;
	}
	public function countMsgViews($fromsex = 0) {
		$dateline = strtotime ( date ( "Y-m-d", time () ) );
		$sql = "SELECT COUNT(viewid) FROM " . DB_PREFIX . "message_dayviews" . " WHERE `readuserid`='" . parent::$wrap_user ['userid'] . "' AND dateline='{$dateline}'";
		if ($fromsex > 0) {
			$sql .= " AND fromsex='{$fromsex}'";
		}
		$count = parent::$obj->fetch_count ( $sql );
		return $count;
	}
	public function getGreet($tasex) {
		$res = null;
		$sql = "SELECT `greeting` FROM " . DB_PREFIX . "greet WHERE `flag`='1'";
		if ($tasex == 1) {
			$sql .= " AND `male`='1'";
		} else {
			$sql .= " AND `female`='1'";
		}
		$sql .= " ORDER BY RAND() LIMIT 1";
		$data = parent::$obj->fetch_first ( $sql );
		if (! empty ( $data )) {
			$res = $data ['greeting'];
		}
		unset ( $sql, $data );
		return $res;
	}
}
?>