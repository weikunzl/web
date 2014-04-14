<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 15:06:06
         compiled from "C:\svn\eolove\tpl\user\block_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2600953312ade973326-80400245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd098074db605897c6d379f23b91f8d5df5b513c6' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\user\\block_footer.tpl',
      1 => 1376971770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2600953312ade973326-80400245',
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
  'unifunc' => 'content_53312ade97f983_95089208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53312ade97f983_95089208')) {function content_53312ade97f983_95089208($_smarty_tpl) {?><div class="user_footer">
  <?php echo $_smarty_tpl->tpl_vars['config']->value['sitefooter'];?>

</div>
<!--//user_footer End-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_popwin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>