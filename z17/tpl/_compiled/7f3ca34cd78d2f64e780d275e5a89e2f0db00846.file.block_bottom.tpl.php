<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:18:03
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\block_bottom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21094532fb1fb57f6b3-03747424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f3ca34cd78d2f64e780d275e5a89e2f0db00846' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\block_bottom.tpl',
      1 => 1353896093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21094532fb1fb57f6b3-03747424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wapfile' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb1fb5a03a8_92068262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb1fb5a03a8_92068262')) {function content_532fb1fb5a03a8_92068262($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><div class="bottom">
  <div class="bot2">
  &lt; <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">返回首页</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=index&a=skin">切换风格</a> &gt; <br />
  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%m");?>
月<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%d");?>
日 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%H:%M");?>

  </div>
</div><?php }} ?>