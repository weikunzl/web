<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 14:34:46
         compiled from "C:\svn\z17\tpl\user\block_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220815333c6863af063-20812609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91f006590dd3542051b37241403ade0a5e45d46' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\block_top.tpl',
      1 => 1390724902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220815333c6863af063-20812609',
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
  'unifunc' => 'content_5333c6863cc765_31758799',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333c6863cc765_31758799')) {function content_5333c6863cc765_31758799($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['config']->value['usercpskin']=='1'){?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value).((string)$_smarty_tpl->tpl_vars['config']->value['templet'])."/block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>