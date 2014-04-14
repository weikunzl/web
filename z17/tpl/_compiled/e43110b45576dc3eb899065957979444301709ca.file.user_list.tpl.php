<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:19:36
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1089532fb258686d32-87684878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43110b45576dc3eb899065957979444301709ca' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\user_list.tpl',
      1 => 1353640813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1089532fb258686d32-87684878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'wapfile' => 0,
    'user' => 0,
    'volist' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb2587703d1_03148321',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb2587703d1_03148321')) {function content_532fb2587703d1_03148321($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<p class="slide_bg_l pl_5"> 
<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=user&a=advsearch">高级搜索设置</a>
</p>
<h3 class="slide_bg_d mb_0">【搜索结果】</h3>
<p class="slide_bg_l pl_5" style="display:none;"> 默认|<a>新注册</a>|<a>新相片</a>|<a>新登录</a> </p>
<div class="index_p">
  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
  <div class="user_list"> 
    <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
"> <?php echo cmd_avatar(array('width'=>'40','height'=>'49','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
 </a><br />
    <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a> -<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>-<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁<br /><?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>

    -<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_do&a=hi&touid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
">打招呼</a>-<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_do&a=writemsg&touid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
">写信件</a> <br/>
  </div>
  <?php } ?>
  <div class="page"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
</div>
<p class="slide_bg_l pl_5"> 当前位置:<br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">首页</a> &gt;&gt; 搜索结果 
</p>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>