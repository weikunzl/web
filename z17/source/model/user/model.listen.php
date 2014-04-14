<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class listenUModel extends X {
	private function _buildSql() {
		$sql = "SELECT v.friendid, v.fuserid, u.*, s.*, vip.vipenddate, p.*" . " FROM " . DB_PREFIX . "friend AS v" . " LEFT JOIN " . DB_PREFIX . "user AS u ON v.fuserid=u.userid" . " LEFT JOIN " . DB_PREFIX . "user_status AS s ON v.fuserid=s.userid" . " LEFT JOIN " . DB_PREFIX . "user_validate AS vip ON v.fuserid=vip.userid" . " LEFT JOIN " . DB_PREFIX . "user_profile AS p ON v.fuserid=p.userid";
		return $sql;
	}
	public function getList($items) {
		$items ['orderby'] = empty ( $items ['orderby'] ) ? ' ORDER BY v.friendid DESC' : $items ['orderby'];
		$pagesize = intval ( $items ['pagesize'] );
		$where = " WHERE v.userid='" . parent::$wrap_user ['userid'] . "' AND v.black='0' AND v.ftype='0' " . $items ['searchsql'];
		$start = ($items ['page'] - 1) * $pagesize;
		$countsql = "SELECT COUNT(*) FROM " . DB_PREFIX . "friend AS v" . $where;
		$total = parent::$obj->fetch_count ( $countsql );
		$sql = $this->_buildSql () . $where . $items ['orderby'] . " LIMIT " . $start . ", " . $pagesize . "";
		$data = parent::$obj->getall ( $sql );
		return array ($total, $this->_handleList ( $data, 'fuserid' ) );
	}
	public function volistAll($where = '', $orderby = '', $num = 0) {
		$sql = $this->_buildSql () . " WHERE v.black='1' AND f.ftype='0'";
		$sql .= ! empty ( $where ) ? ' AND ' . $where : '';
		$sql .= ! empty ( $orderby ) ? ' ORDER BY ' . $orderby : ' ORDER BY v.friendid DESC';
		$num = intval ( $num ) < 1 ? 20 : intval ( $num );
		$sql .= " LIMIT {$num}";
		$data = parent::$obj->getall ( $sql );
		return $this->_handleList ( $data, 'fuserid' );
	}
	public function doListen($fuid) {
		$result = false;
		$sql = "SELECT friendid FROM " . DB_PREFIX . "friend WHERE fuserid='{$fuid}' AND userid='" . parent::$wrap_user ['userid'] . "' LIMIT 1";
		$rows = parent::$obj->fetch_first ( $sql );
		if (empty ( $rows )) {
			$friendid = parent::$obj->fetch_newid ( "SELECT MAX(friendid) FROM " . DB_PREFIX . "friend", 1 );
			$array = array ('friendid' => $friendid, 'userid' => parent::$wrap_user ['userid'], 'fuserid' => $fuid, 'timeline' => time (), 'flag' => 1, 'black' => 0 );
			$result = parent::$obj->insert ( DB_PREFIX . 'friend', $array );
		} else {
			$array = array ('timeline' => time (), 'flag' => 1, 'black' => 0 );
			$result = parent::$obj->update ( DB_PREFIX . 'friend', $array, "friendid='" . $rows ['friendid'] . "'" );
		}
		unset ( $rows );
		return $result;
	}
	public function doBlack($fuid) {
		$result = false;
		$sql = "SELECT friendid FROM " . DB_PREFIX . "friend WHERE fuserid='{$fuid}' AND userid='" . parent::$wrap_user ['userid'] . "'";
		$rows = parent::$obj->fetch_first ( $sql );
		if (empty ( $rows )) {
			$friendid = parent::$obj->fetch_row ( "SELECT MAX(friendid) FROM " . DB_PREFIX . "friend", 1 );
			$array = array ('friendid' => $friendid, 'userid' => parent::$wrap_user ['userid'], 'fuserid' => $fuid, 'timeline' => time (), 'flag' => 1, 'black' => 1 );
			$result = parent::$obj->insert ( DB_PREFIX . 'friend', $array );
		} else {
			$array = array ('timeline' => time (), 'black' => 1 );
			$result = parent::$obj->update ( DB_PREFIX . 'friend', $array, "friendid='" . $rows ['friendid'] . "'" );
		}
		unset ( $rows );
		$this->delFromChatPals ( $fuid );
		return $result;
	}
	public function doDel($fuid) {
		$sql = "DELETE FROM " . DB_PREFIX . "friend WHERE `fuserid`='{$fuid}' AND `userid`='" . parent::$wrap_user ['userid'] . "'";
		$result = parent::$obj->query ( $sql );
		if (true === $result) {
			$this->delFromChatPals ( $fuid );
		}
		return $result;
	}
	public function getListenCount($userid) {
		$sql = "SELECT COUNT(*) FROM " . DB_PREFIX . "friend WHERE `userid`='{$userid}' AND `black`='0' AND `ftype`='0'";
		return parent::$obj->fetch_count ( $sql );
	}
	public function getBlackCount($userid) {
		$sql = "SELECT COUNT(*) FROM " . DB_PREFIX . "friend WHERE `userid`=>'{$userid}' AND `black`='1'";
		return parent::$obj->fetch_first ( $sql );
	}
	public function checkAllowListen($g, $uid = 0) {
		$status = false;
		if ($g ['friend'] ['friendlimit'] == 1) {
			$allow_listen = intval ( $g ['friend'] ['friendnum'] );
			$uid = $uid == 0 ? parent::$wrap_user ['userid'] : $uid;
			$listens = $this->getListenCount ( $uid );
			if (intval ( $listens + 1 ) > $allow_listen) {
				$status = false;
			} else {
				$status = true;
			}
		} else {
			$status = true;
		}
		unset ( $g );
		return $status;
	}
	public function checkListened($fuid, $uid) {
		$status = false;
		$sql = "SELECT `friendid` FROM " . DB_PREFIX . "friend" . " WHERE `userid`='{$uid}' AND `fuserid`='{$fuid}' AND `black`='0' LIMIT 1";
		$rows = parent::$obj->fetch_first ( $sql );
		if (! empty ( $rows )) {
			$status = true;
		}
		unset ( $rows );
		return $status;
	}
	public function checkBlacked($fuid, $uid) {
		$status = false;
		$sql = "SELECT `friendid` FROM " . DB_PREFIX . "friend" . " WHERE `userid`='{$uid}' AND `fuserid`='{$fuid}' AND `black`='1'";
		$rows = parent::$obj->fetch_first ( $sql );
		if (! empty ( $rows )) {
			$status = true;
		}
		unset ( $rows );
		return $status;
	}
	public function getListenInfo($fuid, $uid) {
		$arr = null;
		$sql = "SELECT `black` FROM " . DB_PREFIX . "friend" . " WHERE userid='{$uid}' AND `fuserid`='{$fuid}'";
		$rows = parent::$obj->fetch_first ( $sql );
		if (! empty ( $rows )) {
			$arr = array ('fuid' => $fuid, 'black' => $rows ['black'] );
		}
		unset ( $sql, $rows );
		return $arr;
	}
	private function _handleList($data, $uidname = 'userid') {
		if (! empty ( $data )) {
			parent::loadLib ( array ('url', 'mod', 'user' ) );
			$i = 1;
			foreach ( $data as $key => $value ) {
				$data [$key] ['age'] = XMod::getAge ( $value ['ageyear'] );
				$data [$key] ['homeurl'] = XUrl::getHomeUrl ( $value [$uidname] );
				$data [$key] ['useravatar'] = XUser::getAvatar ( $value ['gender'], $value ['avatar'], $value ['avatarflag'] );
				$data [$key] ['avatarurl'] = XUser::getAvatarUrl ( $value ['gender'], $value ['avatar'], $value ['avatarflag'] );
				$data [$key] ['levelimg'] = XUser::getIdentify ( $value ['gender'], $value ['groupid'], $value ['vipenddate'] );
				$data [$key] ['i'] = $i;
				$i = ($i + 1);
			}
		}
		return $data;
	}
	public function doAjListen($tuid, $ginfo) {
		$result = 0;
		$tuid = intval ( $tuid );
		if (parent::$wrap_user ['userid'] == $tuid) {
			$result = 1;
		} else {
			if (false === $this->checkAllowListen ( $ginfo )) {
				$result = 2;
			} else {
				$sql = "SELECT * FROM " . DB_PREFIX . "friend" . " WHERE `userid`='" . parent::$wrap_user ['userid'] . "' AND `fuserid`='{$tuid}'";
				$rows = parent::$obj->fetch_first ( $sql );
				if (! empty ( $rows )) {
					if ($rows ['black'] == 0) {
						$result = 3;
					} else {
						parent::$obj->update ( DB_PREFIX . 'friend', array ('black' => 0 ), "friendid='" . $rows ['friendid'] . "'" );
						$result = 4;
					}
				} else {
					$friendid = parent::$obj->fetch_newid ( "SELECT MAX(friendid) FROM " . DB_PREFIX . "friend", 1 );
					$array = array ('friendid' => $friendid, 'userid' => parent::$wrap_user ['userid'], 'fuserid' => $tuid, 'timeline' => time (), 'flag' => 1, 'black' => 0 );
					parent::$obj->insert ( DB_PREFIX . 'friend', $array );
					$result = 4;
				}
				$this->addToChatPals ( $tuid );
			}
		}
		return $result;
	}
	public function doAjDelListen($tuid) {
		$result = 0;
		$tuid = intval ( $tuid );
		if (parent::$wrap_user ['userid'] == $tuid) {
			$result = 1;
		} else {
			$query = "DELETE FROM " . DB_PREFIX . "friend" . " WHERE `userid`='" . parent::$wrap_user ['userid'] . "'" . " AND `fuserid`='{$tuid}'";
			parent::$obj->query ( $query );
			$result = 2;
			$this->delFromChatPals ( $tuid );
		}
		return $result;
	}
	public function doAjBlack($tuid) {
		$result = 0;
		$tuid = intval ( $tuid );
		if (parent::$wrap_user ['userid'] == $tuid) {
			$result = 1;
		} else {
			$query = "SELECT `friendid` FROM " . DB_PREFIX . "friend" . " WHERE `userid`='" . parent::$wrap_user ['userid'] . "'" . " AND `fuserid`='{$tuid}'";
			$rows = parent::$obj->fetch_first ( $query );
			if (! empty ( $rows )) {
				parent::$obj->update ( DB_PREFIX . 'friend', array ('black' => 1 ), "friendid='" . $rows ['friendid'] . "'" );
			} else {
				$friendid = parent::$obj->fetch_newid ( "SELECT MAX(friendid) FROM " . DB_PREFIX . "friend", 1 );
				$array = array ('friendid' => $friendid, 'userid' => parent::$wrap_user ['userid'], 'fuserid' => $tuid, 'timeline' => time (), 'flag' => 1, 'black' => 1 );
				parent::$obj->insert ( DB_PREFIX . 'friend', $array );
			}
			$result = 2;
			$this->delFromChatPals ( $tuid );
		}
		return $result;
	}
	public function getListenStatus($uid) {
		$uid = intval ( $uid );
		$flag = 0;
		if (parent::$wrap_user ['userid'] > 0) {
			$sql = "SELECT `black` FROM " . DB_PREFIX . "friend" . " WHERE `fuserid`='{$uid}' AND `userid`='" . parent::$wrap_user ['userid'] . "'";
			$rows = parent::$obj->fetch_first ( $sql );
			if (! empty ( $rows )) {
				if ($rows ['black'] == 1) {
					$flag = 2;
				} else {
					$flag = 1;
				}
			}
			unset ( $rows, $sql );
		}
		return $flag;
	}
	public function addToChatPals($fuid) {
		if (true === parent::$cfg ['webim_enable']) {
			if (true === parent::$obj->table_exist ( 'chat_pals' )) {
				$pals_sql = "SELECT `pals_id` FROM " . DB_PREFIX . "chat_pals" . " WHERE `host_id`='" . parent::$wrap_user ['userid'] . "'" . " AND `pals_id`='{$fuid}'";
				$pals_rs = parent::$obj->fetch_first ( $pals_sql );
				if (empty ( $pals_rs )) {
					$pals_array = array ('host_id' => parent::$wrap_user ['userid'], 'pals_id' => $fuid );
					parent::$obj->insert ( DB_PREFIX . 'chat_pals', $pals_array );
				}
				unset ( $pals_sql );
				unset ( $pals_rs );
			}
		}
	}
	public function delFromChatPals($fuid) {
		if (true === parent::$cfg ['webim_enable']) {
			if (true === parent::$obj->table_exist ( 'chat_pals' )) {
				$pals_sql = "DELETE FROM " . DB_PREFIX . "chat_pals" . " WHERE `host_id`='" . parent::$wrap_user ['userid'] . "'" . " AND `pals_id`='{$fuid}'";
				parent::$obj->query ( $pals_sql );
				unset ( $pals_sql );
			}
		}
	}
	public function countPalsNums() {
		$count = 0;
		if (true === parent::$cfg ['webim_enable']) {
			if (true === parent::$obj->table_exist ( 'chat_pals' )) {
				$count_sql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "chat_pals" . " WHERE `host_id`='" . parent::$wrap_user ['userid'] . "'";
				$count = parent::$obj->fetch_count ( $count_sql );
				unset ( $count_sql );
			}
		}
		return $count;
	}
}
?>