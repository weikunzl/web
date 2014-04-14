<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:18:02
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32581532fb1fac6c571-04593744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18d53bb04c47c22c0709844de7470756a3649a3e' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\index.tpl',
      1 => 1353896524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32581532fb1fac6c571-04593744',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'config' => 0,
    'wapfile' => 0,
    'login' => 0,
    'user' => 0,
    'volist' => 0,
    'abouttip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb1faef26b2_02838957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb1faef26b2_02838957')) {function content_532fb1faef26b2_02838957($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="index_p"> 
  有<?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countusers']);?>
位会员在寻找真爱 <br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=online&a=list&s_sex=1">当前在线男会员</a><br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=online&a=list&s_sex=2">当前在线女会员</a><br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=user&a=advsearch">进入高级搜索</a><br />
  <h4 class="slide_bg_d">【推荐会员】</h4>
  <div> 
    <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
	    <?php if ($_smarty_tpl->tpl_vars['login']->value['info']['gender']==1){?>
			<?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='2'} num={5}"), null, 0);?> 
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='1'} num={5}"), null, 0);?> 
		<?php }?>
	<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1'} num={5}"), null, 0);?> 
	<?php }?>
	<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['volist']->value['i']==1){?>
    <?php echo cmd_avatar(array('width'=>'40','height'=>'49','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
<br />
	<?php }?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
 /<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>/<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
/<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
 </a> <br />
	<?php } ?>
    <p class="slide_bg_l"><a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=user&a=list">更多会员&gt;&gt;</a></p>
  </div>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=client">手机客户端下载</a><br />
  <p class="slide_bg_l"> 

    <?php $_smarty_tpl->tpl_vars['abouttip'] = new Smarty_variable(vo_list("mod={about} where={v.navshow='1'} num={4}"), null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['abouttip']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=about&a=detail&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['volist']->value['i']%2!=0){?>&nbsp;|&nbsp;<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['volist']->value['i']%2==0){?><br /><?php }?>
	<?php } ?>

  </p>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>