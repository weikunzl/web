<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 09:33:48
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\frame.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9135532f8b7cdc5698-18259707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c6c196038f6b904e18a1c011ef62c249054a43e' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\frame.tpl',
      1 => 1331272158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9135532f8b7cdc5698-18259707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'config' => 0,
    'cpfile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532f8b7ce56531_15276971',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532f8b7ce56531_15276971')) {function content_532f8b7ce56531_15276971($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>管理中心-[<?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
]</title>
<frameset frameborder=10 framespacing=0 border=0 rows="70, *,32">
<frame src="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=top" name="top" frameborder=0 NORESIZE SCROLLING='no' marginwidth=0 marginheight=0>
<frameset frameborder=0  framespacing=0 border=0 cols="170,7, *" id="frame-body">
<frame src="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=left" frameborder=0 id="menu-frame" name="menu" scrolling="auto" marginwidth="0">
<frame src="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=drag" id="drag-frame" name="drag-frame" frameborder="no" scrolling="no">
<frame src="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=main" frameborder=0 id="main-frame" name="main">
</frameset>
<frame src="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=footer" name="footer" frameborder=0 NORESIZE SCROLLING='no' marginwidth=0 marginheight=0>
</frameset><noframes></noframes>
</html><?php }} ?>