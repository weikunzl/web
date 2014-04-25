<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class specialIModel extends X {
	private $allowmaxpage = 500;
	private function _buildCountParamsSql() {
		$sql = "SELECT count(*) AS my_count FROM " . DB_PREFIX . "user_params AS v" . " WHERE v.flag='1' AND v.lovestatus='1'";
		return $sql;
	}
	private function _buildListParamsSql() {
		$sql = "SELECT v.userid FROM " . DB_PREFIX . "user_params AS v" . " WHERE v.flag='1' AND v.lovestatus='1'";
		return $sql;
	}
	private function _getUserIds($data) {
		$strusers = '';
		if (! empty ( $data )) {
			$i = 0;
			foreach ( $data as $key => $value ) {
				if ($i == 0) {
					$fuhao = '';
				} else {
					$fuhao = ',';
				}
				$strusers .= $fuhao . $value ['userid'];
				$i ++;
			}
		}
		unset ( $data );
		return $strusers;
	}
	private function _buildSql() {
		$sql = "SELECT v.*," . " s.emailrz, s.mobilerz, s.idnumberrz, s.videorz, s.star," . " vip.vipenddate," . " p.*" . " FROM " . DB_PREFIX . "user AS v" . " LEFT JOIN " . DB_PREFIX . "user_status AS s ON v.userid=s.userid" . " LEFT JOIN " . DB_PREFIX . "user_validate AS vip ON v.userid=vip.userid" . " LEFT JOIN " . DB_PREFIX . "user_profile AS p ON v.userid=p.userid";
		return $sql;
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
	public function volistListIndexs($where = '', $orderby = '', $num = 10, $type = '') {
		$num = $num < 1 ? 10 : $num;
		if ($type == 'elite') {
			$indexs_count_sql = $this->_buildCountParamsSql () . " AND v.elite='1'";
			$user_sql = $this->_buildListParamsSql () . " AND v.elite='1'";
		} elseif ($type == 'liehun') {
			$indexs_count_sql = $this->_buildCountParamsSql () . " AND v.liehun='1'";
			$user_sql = $this->_buildListParamsSql () . " AND v.liehun='1'";
		} elseif ($type == 'vip') {
			$indexs_count_sql = $this->_buildCountParamsSql () . " AND v.groupid>1";
			$user_sql = $this->_buildListParamsSql () . " AND v.groupid>1";
		} else {
			$indexs_count_sql = $this->_buildCountParamsSql ();
			$user_sql = $this->_buildListParamsSql ();
		}
		$indexs_count_sql .= ! empty ( $where ) ? ' AND ' . $where : '';
		$user_sql .= ! empty ( $where ) ? ' AND ' . $where : '';
		$indexs_total = parent::$obj->fetch_count ( $indexs_count_sql );
		if ($indexs_total > 0) {
			$totalpage = intval ( $indexs_total / $num );
			if ($indexs_total <= $num) {
				$page = 1;
			} else {
				$totalpage = $totalpage > $this->allowmaxpage ? $this->allowmaxpage : $totalpage;
				if ($totalpage > 1) {
					$page = rand ( 1, $totalpage );
				} else {
					$page = 1;
				}
			}
			$start = (($page - 1) * $num);
			$users_sql = $user_sql . " ORDER BY v.userid DESC LIMIT {$start}, {$num}";
			$users_data = parent::$obj->getall ( $users_sql );
			$ids = $this->_getUserIds ( $users_data );
			$orderby = ! empty ( $orderby ) ? ' ORDER BY ' . $orderby : ' ORDER BY v.userid DESC';
			$sql = $this->_buildSql () . " WHERE v.userid IN (" . $ids . ") " . $orderby;
			$indexs_data = parent::$obj->getall ( $sql );
		} else {
			$indexs_data = null;
		}
		unset ( $indexs_count_sql );
		return $this->_handleList ( $indexs_data, 'userid' );
		unset ( $indexs_data );
	}
	public function spListUser($where = '', $orderby = '', $num = 10, $type = '') {
		if (parent::$wrap_user ['userid'] > 0) {
			if (parent::$wrap_user ['gender'] == 1) {
				$where .= empty ( $where ) ? "v.gender='2'" : " AND v.gender='2'";
			} else {
				$where .= empty ( $where ) ? "v.gender='1'" : " AND v.gender='1'";
			}
		}
		return $this->volistListIndexs ( $where, $orderby, $num, $type );
	}
	
	public function matchListUser($where = '', $orderby = '', $num = 10, $type = '') {
		$datas = '';
		if (parent::$wrap_user ['userid'] > 0) {
			$m_match = parent::model ( 'match', 'um' );
			$m_ids = $m_match->getMatchUserIDs ( parent::$wrap_user ['userid'] );
			unset ( $m_match );
			if (empty ( $m_ids )) {
				if (parent::$wrap_user ['gender'] == 1) {
					$where .= empty ( $where ) ? "v.gender='2'" : " AND v.gender='2'";
				} else {
					$where .= empty ( $where ) ? "v.gender='1'" : " AND v.gender='1'";
				}
				$datas = $this->volistListIndexs ( $where, $orderby, $num, $type );
			} else {
				$orderby = ! empty ( $orderby ) ? ' ORDER BY ' . $orderby : ' ORDER BY v.userid DESC';
				$sql = $this->_buildSql () . " WHERE v.userid IN (" . $m_ids . ") " . $orderby . " LIMIT {$num}";
				$userdata = parent::$obj->getall ( $sql );
				$datas = $this->_handleList ( $userdata, 'userid' );
			}
		} else {
			$datas = $this->volistListIndexs ( $where, $orderby, $num, $type );
		}
		return $datas;
	}
}
?>