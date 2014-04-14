<?php
/*
Plugin Name: 在线客服代码
Version: v1.0
Plugin URL:
Description: 在线客服浮动窗口，支持左边和右边浮动。
For Version: OElove v3.x所有版本
Author: OElove官方
Author URL: http://www.phpcoo.com/
Last Update: 2012-04-10
*/
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
//载入函数
require_once(BASE_ROOT.'./source/plugin/online/function.php');
/**
 * 注册插件管理菜单
*/
function online_adm_sidebar() {
	echo "<li><a href='".__ADMIN_FILE__."?c=plugin&a=setting&plugin_id=online' target='main'>客服设置</a>&nbsp;&nbsp;<a href='".__ADMIN_FILE__."?c=plugin&a=setting&plugin_id=online&do=list' target='main'>添加客服</a></li>";
}
XHook::addAction('adm_sidebar_ext', 'online_adm_sidebar');

/* 注册前台显示 */
XHook::addAction('event_online', 'online_plugin_preview');
?>