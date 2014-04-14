<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:53:47
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\block_top_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4955532ed95ba36f59-50788151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8076cae5dd4265e4db79e5678feb1ba19caa6c2' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\block_top_content.tpl',
      1 => 1390724874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4955532ed95ba36f59-50788151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlpath' => 0,
    'ucpath' => 0,
    'ucfile' => 0,
    'u' => 0,
    'count_msg' => 0,
    'count_hi' => 0,
    'count_sys' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed95baf2ed0_87672884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed95baf2ed0_87672884')) {function content_532ed95baf2ed0_87672884($_smarty_tpl) {?><div class="user_fixed-bar" id="user_header">
  <div class="user_containerss"> 
    <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/logo.png" class="user_logo" /></a>
    <ul class="user_top_menu">
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
">交友中心</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user">搜索会员</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=weibo">心情微播</a></li>
    </ul>
    <div class="user-top-setting">
	  <div class="user-top-avatar"><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=avatar" title="设置形象照"><img src="<?php echo $_smarty_tpl->tpl_vars['u']->value['avatarurl'];?>
" width="25" height="25" /></a></div>
	  <div class="user-top-username"><a href="<?php echo $_smarty_tpl->tpl_vars['u']->value['homeurl'];?>
" target="_blank" title="访问我的主页"><?php echo $_smarty_tpl->tpl_vars['u']->value['username'];?>
</a></div>
	  <div class="user-top-tips">
		<div class="user-top-tips-list">
		  <?php ob_start();?><?php echo cmd_count(array('mod'=>'user','type'=>'newmessage','value'=>$_smarty_tpl->tpl_vars['u']->value['userid']),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["count_msg"] = new Smarty_variable($_tmp1, null, 0);?>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=message">未读信件(<?php if ($_smarty_tpl->tpl_vars['count_msg']->value>99){?>99+<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['count_msg']->value;?>
<?php }?>)</a>
		  
		  <?php ob_start();?><?php echo cmd_count(array('mod'=>'user','type'=>'newhi','value'=>$_smarty_tpl->tpl_vars['u']->value['userid']),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["count_hi"] = new Smarty_variable($_tmp2, null, 0);?>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=hi">未读问候(<?php if ($_smarty_tpl->tpl_vars['count_hi']->value>99){?>99+<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['count_hi']->value;?>
<?php }?>)</a>
		  
		  <?php ob_start();?><?php echo cmd_count(array('mod'=>'user','type'=>'system','value'=>$_smarty_tpl->tpl_vars['u']->value['userid']),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["count_sys"] = new Smarty_variable($_tmp3, null, 0);?>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=sysmsg">系统消息(<?php if ($_smarty_tpl->tpl_vars['count_sys']->value>99){?>99+<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['count_sys']->value;?>
<?php }?>)</a>
		</div>
		<div class="user-top-tips-ol" name='tip_title'>
		  <span class="user-top-tips-btn">信件&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/jiantou.gif" /></span>
		</div>
	  </div>
	  <div class="user-top-set"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify">认证</a></div>
	  <div class="user-top-set"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment">充值</a></div>
	  <div class="user-top-set"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=editpassword">修改密码</a></div>
	  <div class="user-top-logout"><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=logout">退出</a></div>
	</div>
    <div class="clear"></div>
  </div>
</div>
<script type='text/javascript'>
$(function() {
	$(".user-top-tips").on ({
        mouseover: function() {
		    $("div[name='tip_title']").removeClass("user-top-tips").addClass("user-top-tips-on");
			$(".user-top-tips-list").show();
        },
        mouseout: function() {
			$("div[name='tip_title']").removeClass("user-top-tips-on").addClass("user-top-tips");
			$(".user-top-tips-list").hide();
        }
	});
});
</script><?php }} ?>