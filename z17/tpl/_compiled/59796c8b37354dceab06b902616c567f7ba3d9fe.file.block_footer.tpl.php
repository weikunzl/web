<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 17:40:10
         compiled from "C:\svn\z17z17\web\z17\tpl\user\block_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191365354e77a3c3e20-05381465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59796c8b37354dceab06b902616c567f7ba3d9fe' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\block_footer.tpl',
      1 => 1398066164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191365354e77a3c3e20-05381465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'uctplpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354e77a3d0267_52001545',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354e77a3d0267_52001545')) {function content_5354e77a3d0267_52001545($_smarty_tpl) {?><div class="user_footer">
  <?php echo $_smarty_tpl->tpl_vars['config']->value['sitefooter'];?>

</div>
<!--//user_footer End-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_popwin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>