<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:19:51
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\cp_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28455532fb2672c33e9-90668808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0310bdd82430d1be8d59792e8fb79fc837fe9838' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\cp_index.tpl',
      1 => 1354179198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28455532fb2672c33e9-90668808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'wapfile' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb26737eae2_56994885',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb26737eae2_56994885')) {function content_532fb26737eae2_56994885($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_cpmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="index_p"> 
<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_info">资料修改</a>&nbsp;&nbsp;
<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['login']->value['userid'];?>
">预览</a><br/>
我的金币：<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['money'];?>
&nbsp;&nbsp;<br/>
我的积分：<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['points'];?>
&nbsp;&nbsp;<br />
</div>
<h3 class="slide_bg_d">【会员中心】</h3>
<div class="index_p"> 
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_message">我的信件</a>|<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_message&a=outmsg">已发信件</a><br/>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_visit&a=visitme">谁看过我</a>|<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_visit">我看过谁</a><br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_listen">我关注的会员</a><br/>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_fans">关注我的会员</a><br/>
  <div class="bot1"> </div>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_money">金币记录</a>|<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_points">积分记录</a><br/>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_info&a=editpassword">修改密码</a>|<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&a=logout">退出登录</a><br/>
</div>
<p class="slide_bg_l pl_5">
当前位置：<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">首页</a> &gt;&gt; <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp">会员中心</a>
</p>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>