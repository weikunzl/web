<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 14:11:03
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\plugin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28211532e7af73de5e1-12835171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd3b04790812d8e767a9a7461d4404c577b2fb06' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\plugin.tpl',
      1 => 1333895208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28211532e7af73de5e1-12835171',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'plugins' => 0,
    'volist' => 0,
    'cpfile' => 0,
    'total' => 0,
    'plugin_name' => 0,
    'plugin_event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e7af7480e99_82067689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e7af7480e99_82067689')) {function content_532e7af7480e99_82067689($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>插件管理</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：插件中心<span>&gt;&gt;</span>插件管理</p></div>
  <div class="main-cont">
    <h3 class="title">插件管理</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="18%"><div class="th-gap">插件名</div></th>
		<th width="8%"><div class="th-gap">状态</div></th>
		<th width="12%"><div class="th-gap">适用于OEcms</div></th>
		<th width="11%"><div class="th-gap">最后更新</div></th>
		<th width="12%"><div class="th-gap">作者</div></th>
		<th><div class="th-gap">插件描述</div></th>
		<th width="10%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['name'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['active']==1){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=plugin&a=inactive&plugin_id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['pluginname'];?>
" title="点击禁用插件"><font color="green">已激活</font></a>
		<?php }else{ ?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=plugin&a=active&plugin_id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['pluginname'];?>
" title="点击激活插件"><font color="#999999">未激活</font></a>
		<?php }?>
		</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['forversion'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['lastupdate'];?>
</td>
		<td align="left">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['authorurl']!=''){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['authorurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['author'];?>
</a>
		<?php }else{ ?>
		<?php echo $_smarty_tpl->tpl_vars['volist']->value['author'];?>

		<?php }?>
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['description'];?>
</td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=plugin&a=del&plugin_id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['pluginname'];?>
" onClick="{if(confirm('确定要删除该插件吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="7" align="center">对不起，您还没有安装任何插件。</td>
	  </tr>
	  <?php } ?>
	</table>
	<?php if ($_smarty_tpl->tpl_vars['total']->value>1){?>
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='left'>总记录：<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
	  </tr>
	</table>
	<?php }?>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="setting"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：插件中心<span>&gt;&gt;</span>插件管理<span>&gt;&gt;</span><?php echo $_smarty_tpl->tpl_vars['plugin_name']->value;?>
</p></div>
  <div class="main-cont">
	<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['plugin_event']->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['pluginmanage'] = new Smarty_variable(XHook::doAction($_tmp1), null, 0);?>
  </div>
</div>
<?php }?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<?php }} ?>