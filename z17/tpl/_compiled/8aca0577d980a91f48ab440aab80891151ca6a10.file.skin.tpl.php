<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:18:26
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\skin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8389532fb212c42529-53472072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aca0577d980a91f48ab440aab80891151ca6a10' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\skin.tpl',
      1 => 1353641102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8389532fb212c42529-53472072',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'wapfile' => 0,
    'forward' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb212e0fb43_80144326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb212e0fb43_80144326')) {function content_532fb212e0fb43_80144326($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="index_p">
  <h4 class="slide_bg_l"><a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">返回默认风格版</a></h4>
  <p>请选择版面皮肤颜色</p>
  <div>
 	<span style="width:10px; height:10px; background:#e35480;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=8&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">玫瑰</a>(默认)<br />
    <span style="width:10px; height:10px; background:#d95200;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=1&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">桔红</a><br />
	<span style="width:10px; height:10px; background:#0cba0d;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=2&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">翠绿</a><br />
	<span style="width:10px; height:10px; background:#155a9f;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=3&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">宝蓝</a><br />
	<span style="width:10px; height:10px; background:#333333;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=4&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">酷黑</a><br />
	<span style="width:10px; height:10px; background:#507a18;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=5&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">榄绿</a><br />
	<span style="width:10px; height:10px; background:#9e1424;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=6&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">朱红</a><br />
    <span style="width:10px; height:10px; background:#7B5035;">&nbsp;&nbsp;</span> <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=saveskin&id=7&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
">咖啡</a><br />
  </div>
  <p>注意:以上彩色皮肤仅适用于支持WAP2.0的手机</p>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>