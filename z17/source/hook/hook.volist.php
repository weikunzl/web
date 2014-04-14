<?php

if(!defined('IN_OESOFT')) {
exit('Access Denied');
}
function vo_list($extracts) {
$params = XHandle::buildTagArray($extracts);
if (!empty($params)) {
@extract($params);
$mod = empty($params['mod']) ?'': strtolower(trim($params['mod']));
$type = empty($params['type']) ?'': strtolower(trim($params['type']));
$where = empty($params['where']) ?'': XFilter::filterSql(trim($params['where']));
$orderby = empty($params['orderby']) ?'': XFilter::filterSql(trim($params['orderby']));
$num = empty($params['num']) ?0 : intval($params['num']);
$childnum = empty($params['childnum']) ?0 : intval($params['childnum']);
$catid = empty($params['catid']) ?0 : intval($params['catid']);
$value	= empty($params['value']) ?0 : intval($params['value']);
if ($mod == 'info') {
$mod_info = X::model('info','im');
return $mod_info->volistAll($where,$orderby,$num);
unset($mod_info);
}
elseif ($mod == 'infocat') {
$mod_infocat = X::model('info','im');
return $mod_infocat->volistCategory($where,$orderby,$num);
unset($mod_infocat);
}
elseif ($mod == 'about') {
$mod_about = X::model('about','im');
return $mod_about->volistAll($where,$orderby,$num);
unset($mod_about);
}
elseif ($mod == 'aboutcat') {
$mod_aboutcat = X::model('about','im');
return $mod_aboutcat->volistCategory($where,$orderby,$num);
unset($mod_aboutcat);
}
elseif ($mod == 'connect') {
$mod_connect = X::model('connect','um');
return $mod_connect->getList();
unset($mod_connect);
}
elseif ($mod == 'giftcat') {
$mod_giftcat = X::model('giftcat','am');
return $mod_giftcat->getAllList();
unset($mod_giftcat);
}
elseif ($mod == 'diary') {
$mod_diary = X::model('diary','im');
return $mod_diary->volistAll($where,$orderby,$num);
unset($mod_diary);
}
elseif ($mod == 'diarycomment') {
$mod_diarycomm = X::model('diary','im');
return $mod_diarycomm->volistComment($where,$orderby,$num);
unset($mod_diarycomm);
}
elseif ($mod == 'diarycat') {
$mod_diarycat = X::model('diary','im');
return $mod_diarycat->volistCategory($where,$orderby,$num);
unset($mod_diarycat);
}
elseif ($mod == 'ask') {
$mod_ask = X::model('ask','im');
return $mod_ask->volistAll($where,$orderby,$num);
unset($mod_ask);
}
elseif ($mod == 'askcomment') {
$mod_askcomm = X::model('ask','im');
return $mod_askcomm->volistComment($where,$orderby,$num);
unset($mod_askcomm);
}
elseif ($mod == 'askcat') {
$mod_askcat = X::model('ask','im');
return $mod_askcat->volistCategory($where,$orderby,$num);
unset($mod_askcat);
}
elseif ($mod == 'dating') {
$mod_dating = X::model('dating','im');
return $mod_dating->volistAll($where,$orderby,$num);
unset($mod_dating);
}
elseif ($mod == 'party') {
$mod_party = X::model('party','im');
return $mod_party->volistAll($where,$orderby,$num);
unset($mod_party);
}
elseif ($mod == 'signup') {
$mod_signup = X::model('party','im');
return $mod_signup->volistSignup($where,$orderby,$num);
unset($mod_signup);
}
elseif ($mod == 'weibo') {
$mod_weibo = X::model('weibo','im');
return $mod_weibo->volistAll($where,$orderby,$num);
unset($mod_weibo);
}
elseif ($mod == 'weibocomment') {
$mod_weibocom = X::model('weibo','im');
return $mod_weibocom->volistComment($where,$orderby,$num,$childnum);
unset($mod_weibocom);
}
elseif ($mod == 'user') {
$mod_user = X::model('user','im');
return $mod_user->volistAll($where,$orderby,$num);
unset($mod_user);
}
elseif ($mod == 'listuser') {
$mod_special = X::model('special','im');
return $mod_special->volistListIndexs($where,$orderby,$num,$type);
unset($mod_special);
}
elseif ($mod == 'spuser') {
$mod_special = X::model('special','im');
return $mod_special->spListUser($where,$orderby,$num,$type);
unset($mod_special);
}
elseif ($mod == 'matchuser') {
$mod_special = X::model('special','im');
return $mod_special->matchListUser($where,$orderby,$num,$type);
unset($mod_special);
}
elseif ($mod == 'album') {
$mod_album = X::model('album','im');
return $mod_album->volistAll($where,$orderby,$num);
unset($mod_album);
}
elseif ($mod == 'ceshi') {
$mod_ceshi = X::model('ceshi','im');
return $mod_ceshi->volistAll($where,$orderby,$num);
unset($mod_ceshi);
}
elseif ($mod == 'ceshicat') {
$mod_ceshicat = X::model('ceshi','im');
return $mod_ceshicat->volistCategory($where,$orderby,$num);
unset($mod_ceshicat);
}
elseif ($mod == 'ceshicomment') {
$mod_ceshicomm = X::model('ceshi','im');
return $mod_ceshicomm->volistComment($where,$orderby,$num);
unset($mod_ceshicomm);
}
elseif ($mod == 'ceshiuser') {
$mod_ceshiuser = X::model('ceshi','im');
return $mod_ceshiuser->volistTestingUser($where,$orderby,$num);
unset($mod_ceshiuser);
}
elseif ($mod == 'story') {
$mod_story = X::model('story','im');
return $mod_story->volistAll($where,$orderby,$num);
unset($mod_story);
}
elseif ($mod == 'storycomment') {
$mod_storycomm = X::model('story','im');
return $mod_storycomm->volistComment($where,$orderby,$num);
unset($mod_storycomm);
}
elseif ($mod == 'storycat') {
$mod_storycat = X::model('story','im');
return $mod_storycat->volistCategory($where,$orderby,$num);
unset($mod_storycat);
}
elseif ($mod == 'gift') {
$mod_gift = X::model('gift','um');
return $mod_gift->volistAll($where,$orderby,$num);
unset($mod_gift);
}
elseif ($mod == 'mylisten') {
$model_listen = X::model('listen','um');
return $model_listen->volistAll($where,$orderby,$num);
unset($model_listen);
}
elseif ($mod == 'myfans') {
$model_fans = X::model('fans','um');
return $model_fans->volistAll($where,$orderby,$num);
unset($model_fans);
}
elseif ($mod == 'mymatch') {
$model_match = X::model('match','um');
return $model_match->volistAll($value,$num);
unset($model_match);
}
elseif ($mod == 'myvisit') {
$model_visit = X::model('visit','um');
return $model_visit->volistAll($value,$num);
unset($model_visit);
}
elseif ($mod == 'myvisitme') {
$model_visitme = X::model('visitme','um');
return $model_visitme->volistAll($value,$num);
unset($model_visitme);
}
elseif ($mod == 'treearea') {
$mod_area = X::model('area','im');
return $mod_area->getTreeArea($where,$orderby,$num);
unset($mod_area);
}
elseif ($mod == 'childarea') {
$mod_area = X::model('area','im');
return $mod_area->getChildArea($catid,$where,$orderby,$num);
unset($mod_area);
}
}
}
?>