<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:52:09
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\artTips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14037532ed8f9591c85-59965618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5277e6c90c236b578acb80c12aa4bbbac7052f6b' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\artTips.tpl',
      1 => 1377572083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14037532ed8f9591c85-59965618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'ucpath' => 0,
    'mod' => 0,
    'content' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed8f96a0985_00049684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed8f96a0985_00049684')) {function content_532ed8f96a0985_00049684($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
.artTips-wrap{
	margin:0 auto;width:80%;
}
.artTips-content {
    background: url("<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/artTips.jpg") no-repeat scroll left top #F7F7F7;
    height: auto !important;
    margin: 80px 0 15px;
    min-height: 63px;
    padding-left: 90px;
}
.artTips-remindClose {
	float: right;
    height: 15px;
    padding: 2px;
    width: 15px;
}
a.closeButtonA, a.closeButtonA:link, a.closeButtonA:visited, a.closeButtonA:hover {
    background: url("<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/artTipscloseButton.jpg") no-repeat scroll center center transparent;
    display: block;
    height: 15px;
    text-decoration: underline;
    width: 15px;
}
a.closeButtonA:hover {
    background: url("<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/artTipscloseButtonHover.jpg") no-repeat scroll center center transparent;
}

.artTips-remind {
    color: #666666;
    float: left;
    line-height: 22px;
    padding-top: 10px;
    width: 380px;
}
</style>
<?php if (empty($_smarty_tpl->tpl_vars['mod']->value)){?>
<!--默认提示-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
	<div class="clear"></div>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['mod']->value=='avatar'){?>
<!--上传头像-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
		你还没有形象照，这会大大影响征友效果，97%的人只看有照片的会员，同时无法打招呼和写信件，赶紧上传形象照吧！<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=avatar" target="_top">马上上传&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['mod']->value=='sms'){?>
<!--手机号码-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
		你的手机号码还没通过认证，只有认证了手机号码才能给会员发手机短信，赶紧去认证手机吧！<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=certify" target="_top">马上认证&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['mod']->value=='emailrz'){?>
<!--邮箱认证-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
	    你的邮箱还没进行验证，无法打招呼和写信件。验证邮箱可以提升您的诚信星级，还可以用来接收网站发送的邮件。
		<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=certify" target="_top">马上认证&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['mod']->value=='contact'){?>
<!--查看联系方式-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
	    你的邮箱还没进行验证，无法查看会员联系方式。<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=certify" target="_top">马上认证&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<?php }?>


</body>
</html><?php }} ?>