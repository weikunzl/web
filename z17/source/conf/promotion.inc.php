<?php
/**
 * @Brief 推广注册配置文件
**/
return array (
    //开启true, 关闭false
	'promotion'=>false,
	//注册邮箱有效_必选
	'emailvalid'=>1,
	//上传头像有效_可选
	'avatarvalid'=>1,
	//每推广一个有效会员奖励金币个数
	'onemoney'=>100,
	//每推广一个有效会员奖励积分个数
	'onepoints'=>500,
	//累计推广达到几个有效会员自动结算
	'settlecounts'=>2,
	//推广链接跳转地址,1-注册页，2-首页
	'jumptype'=>2,
);
?>