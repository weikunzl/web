<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
class userIService extends X {
	public function validSearch() {
		$args = array ();
		$countwhere = '';
		$s_searchtype = XRequest::getArgs ( 's_searchtype' );
		$s_sex = XRequest::getInt ( 's_sex' );
		$s_sage = XRequest::getInt ( 's_sage' );
		$s_eage = XRequest::getInt ( 's_eage' );
		$s_dist1 = XRequest::getInt ( 's_dist1' );
		$s_dist2 = XRequest::getInt ( 's_dist2' );
		$s_dist3 = XRequest::getInt ( 's_dist3' );
		$s_lovesort = XRequest::getInt ( 's_lovesort' );
		$s_sheight = XRequest::getInt ( 's_sheight' );
		$s_eheight = XRequest::getInt ( 's_eheight' );
		$s_ssalary = XRequest::getInt ( 's_ssalary' );
		$s_esalary = XRequest::getInt ( 's_esalary' );
		$s_sedu = XRequest::getInt ( 's_sedu' );
		$s_eedu = XRequest::getInt ( 's_eedu' );
		if ($s_searchtype == 'adv') {
			$s_marry = XRequest::getComInts ( 's_marry' );
			$s_havechild = XRequest::getComInts ( 's_havechild' );
		} else {
			$s_marry = XRequest::getArgs ( 's_marry' );
			$s_havechild = XRequest::getArgs ( 's_havechild' );
		}
		$s_house = XRequest::getInt ( 's_house' );
		$s_car = XRequest::getInt ( 's_car' );
		$s_avatar = XRequest::getInt ( 's_avatar' );
		$s_jobs = XRequest::getInt ( 's_jobs' );
		$args = array ('s_sex' => $s_sex, 's_sage' => $s_sage, 's_eage' => $s_eage, 's_dist1' => $s_dist1, 's_dist2' => $s_dist2, 's_dist3' => $s_dist3, 's_lovesort' => $s_lovesort, 's_sheight' => $s_sheight, 's_eheight' => $s_eheight, 's_ssalary' => $s_ssalary, 's_esalary' => $s_esalary, 's_sedu' => $s_sedu, 's_eedu' => $s_eedu, 's_marry' => $s_marry, 's_havechild' => $s_havechild, 's_house' => $s_house, 's_car' => $s_car, 's_avatar' => $s_avatar, 's_jobs' => $s_jobs );
		$sql = '';
		if ($s_sex > 0) {
			$sql .= " AND v.gender='{$s_sex}'";
			$countwhere .= " AND ps.gender='{$s_sex}'";
		}
		if ($s_sage > 0 && $s_eage > 0) {
			$year = date ( 'Y', time () );
			$sageline = ($year - $s_eage);
			$eageline = ($year - $s_sage);
			$sql .= " AND p.ageyear >= {$sageline} AND p.ageyear <= {$eageline}";
			$countwhere .= " AND ps.ageyear >= {$sageline} AND ps.ageyear <= {$eageline}";
		}
		if ($s_dist1 > 0) {
			$sql .= " AND p.provinceid='{$s_dist1}'";
			$countwhere .= " AND ps.provinceid='{$s_dist1}'";
		}
		if ($s_dist2 > 0) {
			$sql .= " AND p.cityid='{$s_dist2}'";
			$countwhere .= " AND ps.cityid='{$s_dist2}'";
		}
		if ($s_dist3 > 0) {
			$sql .= " AND p.distid='{$s_dist3}'";
			$countwhere .= " AND ps.distid='{$s_dist3}'";
		}
		if ($s_lovesort > 0) {
			$sql .= " AND p.lovesort='{$s_lovesort}'";
			$countwhere .= " AND ps.lovesort='{$s_lovesort}'";
		}
		if ($s_sheight > 0 && $s_eheight > 0) {
			$sql .= " AND p.height >= {$s_sheight} AND p.height <= {$s_eheight}";
			$countwhere .= " AND ps.height >= {$s_sheight} AND ps.height <= {$s_eheight}";
		}
		if ($s_ssalary > 0 && $s_esalary > 0) {
			$sql .= " AND p.salary >= {$s_ssalary} AND p.salary <= {$s_esalary}";
			$countwhere .= " AND ps.salary >= {$s_ssalary} AND ps.salary <= {$s_esalary}";
		}
		if ($s_sedu > 0 && $s_eedu > 0) {
			$sql .= " AND p.education >= {$s_sedu} AND p.education <= {$s_eedu}";
			$countwhere .= " AND ps.education >= {$s_sedu} AND ps.education <= {$s_eedu}";
		}
		if (true === XValid::isComChar ( $s_marry )) {
			$sql .= " AND p.marrystatus IN ({$s_marry})";
			$countwhere .= " AND ps.marry IN ({$s_marry})";
		}
		if (true === XValid::isComChar ( $s_havechild )) {
			$sql .= " AND p.childrenstatus IN ({$s_havechild})";
			$countwhere .= " AND ps.child IN ({$s_havechild})";
		}
		if ($s_house > 0) {
			$sql .= " AND p.housing='{$s_house}'";
			$countwhere .= " AND ps.house='{$s_house}'";
		}
		if ($s_car > 0) {
			$sql .= " AND p.caring='{$s_car}'";
			$countwhere .= " AND ps.car='{$s_car}'";
		}
		if ($s_avatar == 1) {
			$sql .= " AND v.avatar != '' AND v.avatarflag = '1'";
			$countwhere .= " AND ps.avatar='1'";
		}
		if ($s_jobs > 0) {
			$sql .= " AND p.jobs='{$s_jobs}'";
			$countwhere .= " AND ps.jobs='{$s_jobs}'";
		}
		return array ($sql, $countwhere, $args );
	}
	public function validUid() {
		$uid = XRequest::getInt ( 's_uid' );
		if (false === XValid::isNumber ( $uid ) || $uid < 0) {
			$uid = 0;
		}
		return $uid;
	}
	public function validUserName() {
		$username = XRequest::getArgs ( 's_username' );
		if (false === XValid::isUserArgs ( $username )) {
			$username = '';
		}
		return $username;
	}
	public function validType() {
		$type = XRequest::getArgs ( 'type' );
		return $type;
	}
}
?>