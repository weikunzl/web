<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
class blackUModel extends X {
public function getList($items) {
$items['orderby'] = empty($items['orderby']) ?' ORDER BY v.friendid DESC': $items['orderby'];
$pagesize   = intval($items['pagesize']);
$where      = " WHERE v.userid='".parent::$wrap_user['userid']."' AND v.black='1' AND v.ftype='0' ".$items['searchsql'];
$start      = ($items['page']-1)*$pagesize;
$countsql   = "SELECT COUNT(v.friendid) AS my_count FROM ".DB_PREFIX."friend AS v".$where;
$total      = parent::$obj->fetch_count($countsql);
$sql        = "SELECT v.friendid, v.fuserid, u.*, s.*, vip.vipenddate, p.*".
" FROM ".DB_PREFIX."friend AS v".
" LEFT JOIN ".DB_PREFIX."user AS u ON v.fuserid=u.userid".
" LEFT JOIN ".DB_PREFIX."user_status AS s ON v.fuserid=s.userid".
" LEFT JOIN ".DB_PREFIX."user_validate AS vip ON v.fuserid=vip.userid".
" LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.fuserid=p.userid".
$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
$data = parent::$obj->getall($sql);
$i = 1;
parent::loadLib(array('mod','user'));
foreach ($data as $key=>$value) {
$data[$key]['age'] = XMod::getAge($value['ageyear']);
$data[$key]['homeurl'] = XUrl::getHomeUrl($value['userid']);
$data[$key]['useravatar'] = XUser::getAvatar($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['avatarurl'] = XUser::getAvatarUrl($value['gender'],$value['avatar'],$value['avatarflag']);
$data[$key]['levelimg'] = XUser::getIdentify($value['gender'],$value['groupid'],$value['vipenddate']);
$data[$key]['i'] = $i;
$i = ($i+1);
}
return array($total,$data);
}
public function doDel($id) {
$sql = "DELETE FROM ".DB_PREFIX."friend".
" WHERE `friendid`='{$id}' AND `userid`='".parent::$wrap_user['userid']."'";
return parent::$obj->query($sql);
unset($sql);
}
}
?>