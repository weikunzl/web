<?php /* Smarty version Smarty-3.1.14, created on 2014-03-26 14:51:32
         compiled from "C:\svn\eolove\tpl\admincp\frm_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27500533278f49bbe43-72653038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e18c9011d74725c973424250bdf18a5dfb600ce8' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\admincp\\frm_main.tpl',
      1 => 1356405374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27500533278f49bbe43-72653038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'cppath' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533278f4ab2bc0_78709273',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533278f4ab2bc0_78709273')) {function content_533278f4ab2bc0_78709273($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<title>首页</title>
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
css/admin.css" media="screen" />
</head>
<body>
<div class="main-wrap">
<div class="path">
  <p>当前位置：管理首页<span></span></p>
</div>
<div class="main-cont">
  <h3 class="title">产品服务</h3>
  <div class="box">
    <div class="btn-group clear">
	  <a class="btn-general" href="http://www.phpcoo.com/" target="_blank"><span>OElove官方网站</span></a>
	  <a class="btn-general" href="http://bbs.phpcoo.com/" target="_blank"><span>技术论坛</span></a>
	  <a class="btn-general" href="http://www.phpcoo.com/contact" target="_blank"><span>联系客服</span></a>
	  <a class="btn-general" href="mailto:phpcoo@qq.com"><span>意见反馈</span></a>
	  <a class="btn-general" href="http://v3.phpcoo.com/" target="_blank"><span>商业版在线演示</span></a>
	</div>
  </div>

  <h3 class="title">官方最新动态</h3>
  <div class="box">
    <ul class="news-item" id="news">
	  <script language="javascript" src="http://www.phpcoo.com/data/include/oecms.php"></script>
	</ul>
  </div>

  <h3 class="title" style='display:block;'>网站基本数据</h3>
  <div class="box" style="display:block;width:700px;">
    <ul class="group-item">
	  <li>会员总数：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countusers']);?>
</span></li>
	  <li>男 会 员：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countmaleusers']);?>
</span></li>
	  <li>女 会 员：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countfemaleusers']);?>
</span></li>
	</ul>
	<ul class="group-item">
	  <li>在线会员：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countonlineusers']);?>
</span></li>
	  <li>信件总数：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countmessages']);?>
</span></li>
	  <li>日记总数：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countdiarys']);?>
</span></li>
	</ul>
	<ul class="group-item">
	  <li>心情播报：<span><?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countweibos']);?>
</span></li>
	</ul>
  </div>
</div>
<div style="clear:both;"></div>
</div>
</body>
</html>

<?php }} ?>