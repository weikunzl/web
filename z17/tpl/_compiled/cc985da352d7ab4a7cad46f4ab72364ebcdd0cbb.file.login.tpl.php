<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 14:52:01
         compiled from "C:\svn\eolove\tpl\admincp\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:445553312791a0fb11-98303038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc985da352d7ab4a7cad46f4ab72364ebcdd0cbb' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\admincp\\login.tpl',
      1 => 1371695146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '445553312791a0fb11-98303038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'config' => 0,
    'copyright_author' => 0,
    'cppath' => 0,
    'cpfile' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53312791bea5f7_65336730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53312791bea5f7_65336730')) {function content_53312791bea5f7_65336730($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>管理员登录-[<?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
]</title>
<meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['copyright_author']->value;?>
" />
<link href="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
css/admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
html{ background:#F2F5F8;}
body{ background:#F2F5F8;}
</style>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
js/jquery-1.4.4.min.js'></script>
<!--[if lte IE 6]>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
js/DD_belatedPNG-min.js'></script>
<script language="javascript">DD_belatedPNG.fix('.login-tit,.admin-logo,.tit');</script>
<![endif]-->
</head>
<body>
<div id="login-wrap">
  <div class="login-main">
    <div class="login-tit">
	  <div class="admin-logo"></div>
	  <div class="tit"></div>
	</div>
	<div class="login-cont">
	  <form id="loginFrm" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=login" method="post" onsubmit="return checkform();">
	  <input type="hidden" name="a" id="a" value="login" />
	  <div class="account1">
	    <label>登录帐号：</label>
		<input class="input-txt w180" id="username" name="username" type="text" /><span id="username_msg"></span>
	  </div>
	  <div class="account1">
	    <label for="">登录密码：</label>
		<input class="input-txt w180" id="password" name="password" type="password" /><span id="password_msg"></span>
	  </div>

	  <?php if ($_smarty_tpl->tpl_vars['config']->value['admincode']==1){?>
	  <div class="account2">
	    <label for="">验 证 码：</label>
		<input class="input-txt w180" id="checkcode" name="checkcode" type="text" autocomplete="off" />
		<span id="checkcode_msg"></span>
	  </div>
	  
	  <div class="account3">
	    <img id="checkCodeImg" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
source/include/imagecode.php?act=verifycode" />
		<a href="javascript:refreshCc();">看不清楚，换一张</a>
	  </div>
	  <?php }?>

	  <input class="admin-btn-no" name=""  type="submit" value="登 录" />
	  </form>
	</div>
  </div>
</div>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<script language="javascript" type="text/javascript">
function refreshCc() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
	}
}
function checkform(){
    if($("#username").val()==""){
	    $("#username_msg").html("登录帐号不能为空");
		return false;
	}
    if($("#password").val()==""){
	    $("#password_msg").html("登录密码不能为空");
		return false;
	}
	<?php if ($_smarty_tpl->tpl_vars['config']->value['admincode']==1){?>
    if($("#checkcode").val()==""){
	    $("#checkcode_msg").html("验证码不能为空");
		return false;
	}
	<?php }?>
	return true;
}
</script>
<?php }} ?>