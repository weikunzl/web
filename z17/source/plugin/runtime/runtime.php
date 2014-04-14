<?php
/*
Plugin Name: 页面运行时间
Version: v1.0
Plugin URL:
Description: 底部显示页面运行时间和数据库查询次数。
For Version: OElove v3.x所有版本
Author: OElove官方
Author URL: http://www.phpcoo.com/
Last Update: 2012-04-10
*/
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
?>
<?php
/**
 * 显示运行时间和查询SQL次数
*/
function runtime_plugin_view() {
	echo "<div align='center'><p style='font-size:10px; font-family:Arial, Helvetica, sans-serif; line-height:120%;color:#999999'>Processed in ".XRunTime::display()." second(s) , ".X::$obj->querynum." queries</p></div>";
}
XHook::addAction('adm_footer', 'runtime_plugin_view');
XHook::addAction('event_runtime', 'runtime_plugin_view');
XHook::addAction('plugin_runtime', 'runtime_plugin_view');
?>