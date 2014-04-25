<?php /* Smarty version Smarty-3.1.14, created on 2014-04-25 10:17:22
         compiled from "C:\svn\z17z17\web\z17\tpl\templets\default\9izbdq_passport_jdlogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238595354d08f0d1986-23657610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a66694e0303840deb7f4282935c9b482fefc761' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\templets\\default\\9izbdq_passport_jdlogin.tpl',
      1 => 1398392236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238595354d08f0d1986-23657610',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354d08f18b988_41881970',
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'skinpath' => 0,
    'urlpath' => 0,
    'forward' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354d08f18b988_41881970')) {function content_5354d08f18b988_41881970($_smarty_tpl) {?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><![endif]-->
<html class="no-js" lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>会员登录</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
body {
	padding:0px;
	margin:0px;
	font-size:13px;
}
*{padding:0px; margin:0px;}
p,ul,li,h1,h2,h3,h4,h5,h6 {padding:0px; margin:0px;}
ul,li {list-style:none;}
img {border:0px;}
body { margin:0px;font-family: Verdana, Geneva, sans-serif;font-size: 12px;color:#666666;}
a {color:#666666;text-decoration: none;blr:expression(this.onFocus=this.blur());outline:none;}
a:hover {text-decoration:none;color:#444444;}
/*文本框*/
.small_text {
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
	box-shadow: 2px 2px 2px #F0F0F0 inset;
	color: #333333;
	font-family: inherit;
	font-size: 100%;
	line-height: 18px;
	margin: 0;
	padding:10px 4px;
	vertical-align: middle;
	width:80px;
}
/*按钮*/
.btn_green {
	border:0px solid gray;
	padding:5px 30px;
	margin:0px;
	color:#fff;
	font-weight:bold;
	background:#43b015;
	border-radius: 3px 3px 3px 3px;
	cursor:pointer;
}
.btn_red {
	border:0px solid gray;
	padding:5px 30px;
	margin:0px;
	color:#fff;
	font-weight:bold;
	background:#F5487A;
	border-radius: 3px 3px 3px 3px;
	cursor:pointer;
}
.btn_red:hover {
	border:0px solid gray;
	padding:5px 30px;
	margin:0px;
	color:#fff;
	font-weight:bold;
	background:#F42460;
	border-radius: 3px 3px 3px 3px;
}
.input_text {
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
	box-shadow: 2px 2px 2px #F0F0F0 inset;
	color: #333333;
	font-family: inherit;
	font-size: 100%;
	line-height: 18px;
	margin: 0;
	padding: 10px 4px;
	vertical-align: middle;
	width:220px;
}
img {
	vertical-align:middle;
}
.login_dialog_left {
	float:left;
	height:320px;
	background-color:#fff;
	width:60%;
}
.login_dialog_left h2 {
	text-align:center;
	background:none repeat scroll 0 0 #EFEFEF;
	padding:16px;
	font-family:微软雅黑;
	font-size:16px;
	margin-top:0px;
}
.reg_dialog {
	line-height:50px;
}
.login_dialog_right {
	float:left;
	height:320px;
	text-align:center;
	width:40%;
	background:url("<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
images/login_regbg.png") no-repeat scroll 60px 200px transparent;
	background-color:#f8f8f8;
}
.login_dialog_right h2 {
	text-align:center;
	background:none repeat scroll 0 0 #EDEDED;
	padding:16px;
	font-family:微软雅黑;
	font-size:16px;
	margin-top:0px;
}
.login_dialog_form {
	line-height:40px;
	padding:10px 30px;
}
.login_dialog_form a {
	vertical-align:middle;
}
</style>
</head>
<body>
<div class="login_dialog_main">
  <div class="login_dialog_left">
	<h2>会员登录</h2>
	<div class="login_dialog_form">
	  <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=loginpost&halttype=jdbox&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
" name="login_form" id="login_form" />
	  <table>
		<tr>
		  <td>帐号：</td>
		  <td><input type="text" name="loginname" id="loginname" class="input_text" value="用户名/邮箱" onblur="if(this.value==''){this.value='用户名/邮箱';this.style.color='#666'}" onfocus="if(this.value=='用户名/邮箱'){this.value='';this.style.color='#666'}" /></td>
		</tr>
		<tr>
		  <td>密码：</td>
		  <td><input type="password" name="password" id="password" class="input_text" /></td>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['logincode']=='1'){?>
		<tr>
		  <td>验证码：</td>
		  <td>
		    <input type="text" class="small_text" id="checkcode" name="checkcode" value="" />
			&nbsp;&nbsp;
			<img id="checkCodeImg" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refreshCode();"> 换一张</a>
		  </td>
		</tr>
		<?php }?>
		<tr>
		  <td height="40"></td>
		  <td style="line-height:20px;">
		    <input type="button" class="btn_red" id="btnlogin" value="登 录" onclick="check_login();" />
			&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=forget" target="_top">忘记密码？</a>
		  </td>
		</tr>

	  </table>
	  </form>
	</div>
  </div>
  <div class="login_dialog_right">
	<h2>新会员注册</h2>
	<div class="reg_dialog">
	  <p>还没有注册会员？</p>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=reg" class="btn_green" target="_top">马上注册</a> 
	</div>
  </div>
</div>
</body>
</html>
<script language="javascript">
function check_login() {
	var loginname = $("#loginname").val();
	var password = $("#password").val();

    if (loginname == "" || loginname == '用户名/邮箱') {
	    $.dialog.tips("登录帐号不能为空", 3);
		return false;
	} 

	if (password == "") {
		$.dialog.tips("登录密码不能为空", 3);
		return false;
	} 

	<?php if ($_smarty_tpl->tpl_vars['config']->value['logincode']=='1'){?>
	if ($("#checkcode").val() == "") {
		$.dialog.tips("验证码不能为空", 3);
		return false;
	}
	<?php }?>

	$('#login_form').submit();
}

function changeDefaultInputValue() {
	var a = $("#loginname").val();
	if (a == "") {
		$("#loginname").val("用户名/邮箱");
	} 
	else {
		if(a == '用户名/邮箱') {
			$("#loginname").val("");
		}
	}
	$('#loginname').attr("placeholder", "用户名/邮箱");
}

//验证码
function refreshCode() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
	}
}
</script><?php }} ?>