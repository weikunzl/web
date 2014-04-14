<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:18:03
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\block_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20392532fb1fb162057-97900554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3b87227ab4ef36b8a55453c6f6acf0dcd42c272' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\block_menu.tpl',
      1 => 1354152129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20392532fb1fb162057-97900554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login' => 0,
    'wapfile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb1fb198a14_66782681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb1fb198a14_66782681')) {function content_532fb1fb198a14_66782681($_smarty_tpl) {?><div class="top">
  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
  欢迎您：<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['levelimg'];?>
<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['username'];?>
(ID:<?php echo $_smarty_tpl->tpl_vars['login']->value['userid'];?>
)<br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_message">您有封 (<?php echo cmd_count(array('mod'=>'user','type'=>'newmessage','value'=>$_smarty_tpl->tpl_vars['login']->value['userid']),$_smarty_tpl);?>
) 新信件</a><br />
  <?php }?>
  <p>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">首页</a>|
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=user&a=list">搜索</a>|
  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp">会员中心</a>|
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&a=logout">退出登录</a>
  <?php }else{ ?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&a=login">登录</a>|
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&a=reg">注册 </a>
  <?php }?>
  </p>
</div><?php }} ?>