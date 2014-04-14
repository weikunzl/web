<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 14:34:46
         compiled from "C:\svn\z17\tpl\user\block_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55015333c6867e6398-95165807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cf28dd1e3401cf164832d03bd070049c6d0ae84' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\block_footer.tpl',
      1 => 1376971770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55015333c6867e6398-95165807',
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
  'unifunc' => 'content_5333c6867f1756_93894106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333c6867f1756_93894106')) {function content_5333c6867f1756_93894106($_smarty_tpl) {?><div class="user_footer">
  <?php echo $_smarty_tpl->tpl_vars['config']->value['sitefooter'];?>

</div>
<!--//user_footer End-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_popwin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>