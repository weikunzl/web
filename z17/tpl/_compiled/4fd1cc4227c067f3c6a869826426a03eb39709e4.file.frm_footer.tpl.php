<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 09:33:49
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\frm_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12048532f8b7d3a9cc4-28463180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fd1cc4227c067f3c6a869826426a03eb39709e4' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\frm_footer.tpl',
      1 => 1356402416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12048532f8b7d3a9cc4-28463180',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cppath' => 0,
    'cptplpath' => 0,
    'cpfile' => 0,
    'copyright_poweredby' => 0,
    'copyright_type' => 0,
    'copyright_version' => 0,
    'copyright_release' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532f8b7d463314_57481760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532f8b7d463314_57481760')) {function content_532f8b7d463314_57481760($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>footer</title>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
css/footer.css" />
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="footer">
<table width="98%" border="0" cellpadding="0" cellspacing="0" align="left">
  <tr>
	<td  align="left" style="padding-left:20px;">快捷操作：
	<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&sflag=2" target="main">审核会员</a>&nbsp;|&nbsp;
	<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penyavatar" target="main">审核头像</a>&nbsp;|&nbsp;
	<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penymonolog" target="main">审核独白</a>&nbsp;|&nbsp;
	<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&sflag=lock" target="main">审核相册</a>&nbsp;|&nbsp;
	<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=videorz&sflag=audit" target="main">视频认证</a>&nbsp;|&nbsp;
	<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&stype=audit" target="main">审核日记</a>
	</td>
	<td align="right" style="padding-right:10px;"><?php echo $_smarty_tpl->tpl_vars['copyright_poweredby']->value;?>
 Version <?php echo $_smarty_tpl->tpl_vars['copyright_type']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['copyright_version']->value;?>
<?php echo $_smarty_tpl->tpl_vars['copyright_release']->value;?>
 </td>
  </tr>
</table>
</div>	
</body>
</html><?php }} ?>