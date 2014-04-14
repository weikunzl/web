<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 15:06:06
         compiled from "C:\svn\eolove\tpl\user\block_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:732553312ade4f05d0-33894009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39fe4db8d2c823472c97697b64dad964d5f891a6' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\user\\block_top.tpl',
      1 => 1390724902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '732553312ade4f05d0-33894009',
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
  'unifunc' => 'content_53312ade50e4a3_60307605',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53312ade50e4a3_60307605')) {function content_53312ade50e4a3_60307605($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['config']->value['usercpskin']=='1'){?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value).((string)$_smarty_tpl->tpl_vars['config']->value['templet'])."/block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>