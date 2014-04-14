<?php /* Smarty version Smarty-3.1.14, created on 2014-03-26 14:51:32
         compiled from "C:\svn\eolove\tpl\admincp\frm_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27204533278f47dbbf3-44203862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab62671082986880b1a23c31f65a4da12c1b62dc' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\admincp\\frm_top.tpl',
      1 => 1372663502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27204533278f47dbbf3-44203862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cppath' => 0,
    'urlpath' => 0,
    'cpfile' => 0,
    'logincp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533278f4889798_15852172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533278f4889798_15852172')) {function content_533278f4889798_15852172($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>top</title>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
css/top.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
js/top.js"></script>
<!--[if lte IE 6]>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
js/DD_belatedPNG-min.js'></script>
<script language="javascript">DD_belatedPNG.fix('.logo');</script>
<![endif]-->
</head>
<body>
<div id="top">
  <div class="logo"></div>
  <div id="navs">
	<ul>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left&mod=setting">系统设置</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left&mod=content">内容管理</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left&mod=user">用户管理</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left&mod=seo">运营管理</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left&mod=skin">界面模板</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left&mod=app">应用&插件</a></li>
	</ul>  
  </div>
  <div id="right">
    <p>欢迎回来：<?php echo $_smarty_tpl->tpl_vars['logincp']->value['adminname'];?>
&nbsp;&nbsp;<font color="#ffffff">|</font>&nbsp;&nbsp;<a href="index.php" target="_blank">网站首页</a>&nbsp;&nbsp;<font color="#ffffff">|</font>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=login&a=logout" target="_top">退出登录</a>&nbsp;&nbsp;<font color="#ffffff">|</font>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=clearcompiled" target='main'>更新页面缓存</a>&nbsp;&nbsp;<font color="#ffffff">|</font>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=updatecache" target='main'>更新数据缓存</a></p>
  </div>
  <div style="clear:both;"></div>
</div>
</body>
</html><?php }} ?>