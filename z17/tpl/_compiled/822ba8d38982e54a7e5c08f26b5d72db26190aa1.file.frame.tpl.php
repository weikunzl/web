<?php /* Smarty version Smarty-3.1.14, created on 2014-03-26 14:51:32
         compiled from "C:\svn\eolove\tpl\admincp\frame.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32599533278f43da218-76479353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '822ba8d38982e54a7e5c08f26b5d72db26190aa1' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\admincp\\frame.tpl',
      1 => 1331272158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32599533278f43da218-76479353',
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
  'unifunc' => 'content_533278f4428d47_23667256',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533278f4428d47_23667256')) {function content_533278f4428d47_23667256($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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