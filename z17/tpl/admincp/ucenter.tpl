<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>UCenter整合</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=ucenter">UCenter整合</a></p></div>
  <div class="main-cont">
	<h3 class="title">UCenter整合</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=ucenter&a=saveedit" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_c1' colspan='2'>温馨提示：本整合接口支持UC1.5,1.6,DZ7.x,DX1.5,2.x整合，建议您使用DX2.0,2.5版本。<br />使用该整合，请将对应的程序设置为同一个邮箱只允许注册一个用户。</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="20%">UCenter 整合状态 <span class='f_red'></span></td>
		<td class='hback' width="80%"><input type="radio" name="uc_flag" id="uc_flag" value="1"<!--{if $uc_flag === true}--> checked<!--{/if}--> />开启，<input type="radio" name="uc_flag" id="uc_flag" value="0"<!--{if $uc_flag === false}--> checked<!--{/if}--> />关闭<span id="duc_flag"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_api" id="uc_api" class="input-txt" value="<!--{$uc_api}-->" /> <span id="duc_api" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter IP <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_ip" id="uc_ip" class="input-txt" value="<!--{$uc_ip}-->" /> <span id="duc_ip" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 通信密钥 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_key" id="uc_key" class="input-txt" value="<!--{$uc_key}-->" /> <span id="duc_key" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 应用ID <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_appid" id="uc_appid" class="input-s" value="<!--{$uc_appid}-->" /> <span id="duc_appid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 系统编码 <span class="f_red"></span> </td>
		<td class='hback'><select name="uc_charset" id="uc_charset"><option value="utf-8"<!--{if $uc_charset=='utf-8'}--> selected<!--{/if}-->>utf-8</option><option value="gbk"<!--{if $uc_charset=='gbk'}--> selected<!--{/if}-->>gbk</option></select> <span id='duc_charset' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 连接方式 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="uc_connect" id="uc_connect" value="mysql"<!--{if $uc_connect=='mysql'}--> checked<!--{/if}--> />mysql，<input type="radio" name="uc_connect" id="uc_connect" value="http"<!--{if $uc_connect=='http'}--> checked<!--{/if}--> />http <span id="duc_connect"></span>
		<br />
		<font color="#999999">如果您的程序不在同一个服务器，且不支持IP访问mysql，请使用http方式。</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3' colspan="2">选择mysql方式，请填写以下UCenter数据信息</td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库服务器 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbhost" id="uc_dbhost" class="input-150" value="<!--{$uc_dbhost}-->" /> <span id="duc_dbhost" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库用户 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbuser" id="uc_dbuser" class="input-150" value="<!--{$uc_dbuser}-->" /> <span id="duc_dbuser" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库密码 <span class="f_red"></span> </td>
		<td class='hback'><input type="password" name="uc_dbpw" id="uc_dbpw" class="input-150" value="<!--{$uc_dbpw}-->" /> <span id="duc_dbpw" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库名 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbname" id="uc_dbname" class="input-150" value="<!--{$uc_dbname}-->" /> <span id="duc_dbname" class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_1'>UCenter 表名前缀 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbtablepre" id="uc_dbtablepre" class="input-150" value="<!--{$uc_dbtablepre}-->" /> <span id="duc_dbtablepre" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库编码 <span class="f_red"></span> </td>
		<td class='hback'><select name="uc_dbcharset" id="uc_dbcharset"><option value="utf8"<!--{if $uc_dbcharset=='utf8'}--> selected<!--{/if}-->>utf8</option><option value="gbk"<!--{if $uc_dbcharset=='gbk'}--> selected<!--{/if}-->>gbk</option></select> <span id='duc_dbcharset' class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>
