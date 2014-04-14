<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:20:32
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\passport_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2880532fb2907ac570-84098030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b54ae491745fd2cdf3c3d017cb82e1eb64ddef07' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\passport_login.tpl',
      1 => 1354088805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2880532fb2907ac570-84098030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'config' => 0,
    'wapfile' => 0,
    'forward' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb29080ffb7_24929496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb29080ffb7_24929496')) {function content_532fb29080ffb7_24929496($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="slide_bg_l pl_5">您所进行的操作需要先登录!</div>
<h3 class="slide_bg_d" >【<?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
-会员登录】</h3>
<div class="index_p">
  <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">
    <input type="hidden" name="a" value='loginpost' />
    <label> 用户名/邮箱：</label>
    <br />
    <input type="text" name="loginname" id="loginname" />
    <br />
    <label>密码：</label>
    <br />
    <input type="password" name="password" id='password' />
    <br />
    <input  class="submit_b" type="submit" value="立即登录" />
  </form>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&a=reg">注册新会员</a> 
</div>
<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">网站首页</a> &gt;&gt; 会员登录 
</p>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>