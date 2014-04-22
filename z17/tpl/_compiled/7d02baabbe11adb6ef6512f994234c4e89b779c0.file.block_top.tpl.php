<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 17:40:09
         compiled from "C:\svn\z17z17\web\z17\tpl\user\block_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53735354e779dd1269-72289911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d02baabbe11adb6ef6512f994234c4e89b779c0' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\block_top.tpl',
      1 => 1398066164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53735354e779dd1269-72289911',
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
  'unifunc' => 'content_5354e779dea2a2_65261634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354e779dea2a2_65261634')) {function content_5354e779dea2a2_65261634($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['config']->value['usercpskin']=='1'){?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value).((string)$_smarty_tpl->tpl_vars['config']->value['templet'])."/block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>