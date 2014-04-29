<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class weiboUModel extends X {
	private function _getWeiboComments($id) {
		$sql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "weibo_comment WHERE `wbid`='{$id}'";
		return intval ( parent::$obj->fetch_count ( $sql ) );
	}
	public function getAllList($items) {
		$items ['orderby'] = empty ( $items ['orderby'] ) ? ' ORDER BY v.wbid DESC' : $items ['orderby'];
		$pagesize = intval ( $items ['pagesize'] );
		$where = " WHERE `flag`='1' " . $items ['searchsql'];
		$start = ($items ['page'] - 1) * $pagesize;
		$countsql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "weibo AS v" . $where;
		$total = parent::$obj->fetch_count ( $countsql );
		$sql = "SELECT v.*" . " FROM " . DB_PREFIX . "weibo AS v" . $where . $items ['orderby'] . " LIMIT " . $start . ", " . $pagesize . "";
		$data = parent::$obj->getall ( $sql );
		$i = 1;
		foreach ( $data as $key => $value ) {
			$data [$key] ['commentcount'] = $this->_getWeiboComments ( $value ['wbid'] );
			$data [$key] ['user'] = $this->getOneUser ( $value ['userid'] );
			$data [$key] ['content'] = XHandle::repEmface ( $value ['content'] );
			$data [$key] ['i'] = $i;
			$i = ($i + 1);
		}
		return array (
				$total,
				$data 
		);
	}
	public function getMyList($items) {
		$items ['orderby'] = empty ( $items ['orderby'] ) ? ' ORDER BY v.wbid DESC' : $items ['orderby'];
		$pagesize = intval ( $items ['pagesize'] );
		$where = " WHERE `flag`='1' AND v.userid='" . parent::$wrap_user ['userid'] . "' " . $items ['searchsql'];
		$start = ($items ['page'] - 1) * $pagesize;
		$countsql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "weibo AS v" . $where;
		$total = parent::$obj->fetch_count ( $countsql );
		$sql = "SELECT v.*" . " FROM " . DB_PREFIX . "weibo AS v" . $where . $items ['orderby'] . " LIMIT " . $start . ", " . $pagesize . "";
		$data = parent::$obj->getall ( $sql );
		$i = 1;
		foreach ( $data as $key => $value ) {
			$data [$key] ['commentcount'] = $this->_getWeiboComments ( $value ['wbid'] );
			$data [$key] ['content'] = XHandle::repEmface ( $value ['content'] );
			$data [$key] ['i'] = $i;
			$i = ($i + 1);
		}
		return array (
				$total,
				$data 
		);
	}
	public function getListenList($items) {
		$items ['orderby'] = empty ( $items ['orderby'] ) ? ' ORDER BY v.wbid DESC' : $items ['orderby'];
		$pagesize = intval ( $items ['pagesize'] );
		$where = " WHERE `flag`='1' AND v.userid IN (" . "SELECT `fuserid` FROM " . DB_PREFIX . "friend" . " WHERE `userid`='" . parent::$wrap_user ['userid'] . "' AND `black`='0'" . ") " . $items ['searchsql'];
		$start = ($items ['page'] - 1) * $pagesize;
		$countsql = "SELECT COUNT(*) AS my_count FROM " . DB_PREFIX . "weibo AS v" . $where;
		$total = parent::$obj->fetch_count ( $countsql );
		$sql = "SELECT v.*" . " FROM " . DB_PREFIX . "weibo AS v" . $where . $items ['orderby'] . " LIMIT " . $start . ", " . $pagesize . "";
		$data = parent::$obj->getall ( $sql );
		$i = 1;
		foreach ( $data as $key => $value ) {
			$data [$key] ['commentcount'] = $this->_getWeiboComments ( $value ['wbid'] );
			$data [$key] ['user'] = $this->getOneUser ( $value ['userid'] );
			$data [$key] ['content'] = XHandle::repEmface ( $value ['content'] );
			$data [$key] ['i'] = $i;
			$i = ($i + 1);
		}
		return array (
				$total,
				$data 
		);
	}
	public function getCommentList($wbid) {
		$sql = "SELECT v.*, u.username, u.gender, u.avatar, u.avatarflag" . " FROM " . DB_PREFIX . "weibo_comment AS v" . " LEFT JOIN " . DB_PREFIX . "user AS u ON v.cmuserid=u.userid" . " WHERE v.wbid='{$wbid}' AND v.cmflag='1' ORDER BY v.cmid DESC";
		$data = parent::$obj->getall ( $sql );
		$i = 1;
		parent::loadLib ( array (
				'url',
				'mod',
				'user' 
		) );
		foreach ( $data as $key => $value ) {
			$data [$key] ['homeurl'] = XUrl::getHomeUrl ( $value ['cmuserid'] );
			$data [$key] ['avatarurl'] = XUser::getAvatarUrl ( $value ['gender'], $value ['avatar'], $value ['avatarflag'] );
			$data [$key] ['cmcontent'] = XHandle::repEmface ( $value ['cmcontent'] );
			$data [$key] ['i'] = $i;
			$i = ($i + 1);
		}
		return $data;
	}
	public function doAddWeibo($content) {
		$wbid = parent::$obj->fetch_newid ( "SELECT MAX(wbid) FROM " . DB_PREFIX . "weibo", 1 );
		$args = array (
				'wbid' => $wbid,
				'userid' => parent::$wrap_user ['userid'],
				'content' => $content,
				'addtime' => time (),
				'wbtype' => 'weibo' 
		);
		if (parent::$cfg ['auditweibo'] == 1) {
			$args ['flag'] = 0;
		} else {
			$args ['flag'] = 1;
		}
		$result = parent::$obj->insert ( DB_PREFIX . 'weibo', $args );
		unset ( $wbid, $args );
		return $result;
	}
	public function doDelWeibo($wbid) {
		$result = false;
		$sql = "SELECT * FROM " . DB_PREFIX . "weibo WHERE wbid='{$wbid}' AND userid='" . parent::$wrap_user ['userid'] . "'";
		$rows = parent::$obj->fetch_first ( $sql );
		if (! empty ( $rows )) {
			$result = parent::$obj->query ( "DELETE FROM " . DB_PREFIX . "weibo_comment WHERE wbid='{$wbid}'" );
			if (true === $result) {
				parent::$obj->query ( "DELETE FROM " . DB_PREFIX . "weibo WHERE wbid='{$wbid}'" );
			}
		}
		unset ( $rows );
		return $result;
	}
	public function doDelWeiboComment($id) {
		$result = false;
		$sql = "SELECT v.cmid FROM " . DB_PREFIX . "weibo_comment AS v" . " LEFT JOIN " . DB_PREFIX . "weibo AS w ON v.wbid=w.wbid" . " WHERE v.cmid='{$id}' AND w.userid='" . parent::$wrap_user ['userid'] . "'";
		$rows = parent::$obj->fetch_first ( $sql );
		if (! empty ( $rows )) {
			$result = parent::$obj->query ( "DELETE FROM " . DB_PREFIX . "weibo_comment WHERE cmid='{$id}'" );
		}
		unset ( $rows );
		return $result;
	}
	public function getOneUser($id) {
		$sql = "SELECT v.*," . " s.*," . " vip.vipenddate," . " e.*, p.*" . " FROM " . DB_PREFIX . "user AS v" . " LEFT JOIN " . DB_PREFIX . "user_status AS s ON v.userid=s.userid" . " LEFT JOIN " . DB_PREFIX . "user_validate AS vip ON v.userid=vip.userid" . " LEFT JOIN " . DB_PREFIX . "user_attr AS e ON v.userid=e.userid" . " LEFT JOIN " . DB_PREFIX . "user_profile AS p ON v.userid=p.userid" . " WHERE v.userid='{$id}'";
		$data = parent::$obj->fetch_first ( $sql );
		if (! empty ( $data )) {
			parent::loadLib ( array (
					'url',
					'mod',
					'user' 
			) );
			$data ['homeurl'] = XUrl::getHomeUrl ( $data ['userid'] );
			$data ['age'] = XMod::getAge ( $data ['ageyear'] );
			$data ['useravatar'] = XUser::getAvatar ( $data ['gender'], $data ['avatar'], $data ['avatarflag'] );
			$data ['levelimg'] = XUser::getIdentify ( $data ['gender'], $data ['groupid'], $data ['vipenddate'] );
			$data ['avatarurl'] = XUser::getAvatarUrl ( $data ['gender'], $data ['avatar'], $data ['avatarflag'] );
		}
		return $data;
	}
	public function doSaveComment($wbid, $content) {
		$cmid = parent::$obj->fetch_newid ( "SELECT MAX(cmid) FROM " . DB_PREFIX . "weibo_comment", 1 );
		$add_array = array (
				'cmid' => $cmid,
				'wbid' => $wbid,
				'cmuserid' => parent::$wrap_user ['userid'],
				'cmcontent' => $content,
				'cmtime' => time () 
		);
		if (intval ( parent::$cfg ['auditcomment'] ) == 1) {
			$add_array ['cmflag'] = 0;
		} else {
			$add_array ['cmflag'] = 1;
		}
		return parent::$obj->insert ( DB_PREFIX . 'weibo_comment', $add_array );
	}
}
?>