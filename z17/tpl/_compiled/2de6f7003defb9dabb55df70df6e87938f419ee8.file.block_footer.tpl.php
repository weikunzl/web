<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:53:47
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\block_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17617532ed95bdcdaa7-37338644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de6f7003defb9dabb55df70df6e87938f419ee8' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\block_footer.tpl',
      1 => 1376971768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17617532ed95bdcdaa7-37338644',
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
  'unifunc' => 'content_532ed95bddcc64_19129261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed95bddcc64_19129261')) {function content_532ed95bddcc64_19129261($_smarty_tpl) {?><div class="user_footer">
  <?php echo $_smarty_tpl->tpl_vars['config']->value['sitefooter'];?>

</div>
<!--//user_footer End-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_popwin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>