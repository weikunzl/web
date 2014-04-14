<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:53:47
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\block_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21098532ed95ba042a4-48133961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7c22f28c254db9b136ac361dab074c824dc2a9a' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\block_top.tpl',
      1 => 1390724900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21098532ed95ba042a4-48133961',
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
  'unifunc' => 'content_532ed95ba1cc45_20221880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed95ba1cc45_20221880')) {function content_532ed95ba1cc45_20221880($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['config']->value['usercpskin']=='1'){?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value).((string)$_smarty_tpl->tpl_vars['config']->value['templet'])."/block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>