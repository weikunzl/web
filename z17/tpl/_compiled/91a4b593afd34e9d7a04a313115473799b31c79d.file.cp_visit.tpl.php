<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:20:07
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\cp_visit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9085532fb277079ef6-77160757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91a4b593afd34e9d7a04a313115473799b31c79d' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\cp_visit.tpl',
      1 => 1354159690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9085532fb277079ef6-77160757',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'wapfile' => 0,
    'visit' => 0,
    'volist' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb277161237_38688987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb277161237_38688987')) {function content_532fb277161237_38688987($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_cpmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="slide_bg_l pl_5">
<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_visit&a=visitme">谁看过我</a>|<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_visit">我看过谁</a>
</div>
<h3 class="slide_bg_d">我看过谁</h3>
<div class="index_p">
  
  <?php if (empty($_smarty_tpl->tpl_vars['visit']->value)){?>
  您还没有访问任何人的主页哦！
  <?php }else{ ?>

  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
  <div class="user_list"> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeuserid'];?>
"><?php echo cmd_avatar(array('width'=>'40','height'=>'50','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a><br/>
    <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeuserid'];?>
">
	<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
 <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['volist']->value['education']),$_smarty_tpl);?>
 <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'salary','value'=>$_smarty_tpl->tpl_vars['volist']->value['salary']),$_smarty_tpl);?>

	</a><br/>
  </div>
  <?php } ?>

  <?php }?>

  <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)){?>
  <div class="page"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
  <?php }?>

</div>

<p class="slide_bg_l pl_5">
当前位置：<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">首页</a> &gt;&gt; <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp">会员中心</a> &gt;&gt; <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_visit">我看过谁</a>
</p>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>