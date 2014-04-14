<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:16
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\ucenter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32312532e8950830732-00139902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ad223f34ad2cbacd46934344a1a11d060ee00cf' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\ucenter.tpl',
      1 => 1352339647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32312532e8950830732-00139902',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'uc_flag' => 0,
    'uc_api' => 0,
    'uc_ip' => 0,
    'uc_key' => 0,
    'uc_appid' => 0,
    'uc_charset' => 0,
    'uc_connect' => 0,
    'uc_dbhost' => 0,
    'uc_dbuser' => 0,
    'uc_dbpw' => 0,
    'uc_dbname' => 0,
    'uc_dbtablepre' => 0,
    'uc_dbcharset' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e8950903a89_62529284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8950903a89_62529284')) {function content_532e8950903a89_62529284($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>UCenter整合</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=ucenter">UCenter整合</a></p></div>
  <div class="main-cont">
	<h3 class="title">UCenter整合</h3>
    <form name="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=ucenter&a=saveedit" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_c1' colspan='2'>温馨提示：本整合接口支持UC1.5,1.6,DZ7.x,DX1.5,2.x整合，建议您使用DX2.0,2.5版本。<br />使用该整合，请将对应的程序设置为同一个邮箱只允许注册一个用户。</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="20%">UCenter 整合状态 <span class='f_red'></span></td>
		<td class='hback' width="80%"><input type="radio" name="uc_flag" id="uc_flag" value="1"<?php if ($_smarty_tpl->tpl_vars['uc_flag']->value===true){?> checked<?php }?> />开启，<input type="radio" name="uc_flag" id="uc_flag" value="0"<?php if ($_smarty_tpl->tpl_vars['uc_flag']->value===false){?> checked<?php }?> />关闭<span id="duc_flag"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_api" id="uc_api" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['uc_api']->value;?>
" /> <span id="duc_api" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter IP <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_ip" id="uc_ip" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['uc_ip']->value;?>
" /> <span id="duc_ip" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 通信密钥 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_key" id="uc_key" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['uc_key']->value;?>
" /> <span id="duc_key" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 应用ID <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_appid" id="uc_appid" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['uc_appid']->value;?>
" /> <span id="duc_appid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 系统编码 <span class="f_red"></span> </td>
		<td class='hback'><select name="uc_charset" id="uc_charset"><option value="utf-8"<?php if ($_smarty_tpl->tpl_vars['uc_charset']->value=='utf-8'){?> selected<?php }?>>utf-8</option><option value="gbk"<?php if ($_smarty_tpl->tpl_vars['uc_charset']->value=='gbk'){?> selected<?php }?>>gbk</option></select> <span id='duc_charset' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 连接方式 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="uc_connect" id="uc_connect" value="mysql"<?php if ($_smarty_tpl->tpl_vars['uc_connect']->value=='mysql'){?> checked<?php }?> />mysql，<input type="radio" name="uc_connect" id="uc_connect" value="http"<?php if ($_smarty_tpl->tpl_vars['uc_connect']->value=='http'){?> checked<?php }?> />http <span id="duc_connect"></span>
		<br />
		<font color="#999999">如果您的程序不在同一个服务器，且不支持IP访问mysql，请使用http方式。</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3' colspan="2">选择mysql方式，请填写以下UCenter数据信息</td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库服务器 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbhost" id="uc_dbhost" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['uc_dbhost']->value;?>
" /> <span id="duc_dbhost" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库用户 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbuser" id="uc_dbuser" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['uc_dbuser']->value;?>
" /> <span id="duc_dbuser" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库密码 <span class="f_red"></span> </td>
		<td class='hback'><input type="password" name="uc_dbpw" id="uc_dbpw" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['uc_dbpw']->value;?>
" /> <span id="duc_dbpw" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库名 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbname" id="uc_dbname" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['uc_dbname']->value;?>
" /> <span id="duc_dbname" class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_1'>UCenter 表名前缀 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="uc_dbtablepre" id="uc_dbtablepre" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['uc_dbtablepre']->value;?>
" /> <span id="duc_dbtablepre" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>UCenter 数据库编码 <span class="f_red"></span> </td>
		<td class='hback'><select name="uc_dbcharset" id="uc_dbcharset"><option value="utf8"<?php if ($_smarty_tpl->tpl_vars['uc_dbcharset']->value=='utf8'){?> selected<?php }?>>utf8</option><option value="gbk"<?php if ($_smarty_tpl->tpl_vars['uc_dbcharset']->value=='gbk'){?> selected<?php }?>>gbk</option></select> <span id='duc_dbcharset' class='f_red'></span></td>
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
<?php }?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<?php }} ?>