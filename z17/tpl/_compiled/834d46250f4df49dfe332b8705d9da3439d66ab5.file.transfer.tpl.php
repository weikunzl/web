<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:09
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\transfer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6476532e8949cb73a9-49561865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '834d46250f4df49dfe332b8705d9da3439d66ab5' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\transfer.tpl',
      1 => 1336991905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6476532e8949cb73a9-49561865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'transfer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e8949e1f873_09267346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8949e1f873_09267346')) {function content_532e8949e1f873_09267346($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>积分转换设置</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=transfer">积分转换设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">积分转换设置</h3>
    <form name="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=transfer&a=saveedit" />
	<table cellpadding='10' cellspacing='10' class='tab'>
	  <tr>
		<td class="hback_c1" width="20%">积分转换金币： </td>
		<td class="hback_none" width="80%">
		<input type="radio" name="trade_money" id="trade_money" value="1"<?php if ($_smarty_tpl->tpl_vars['transfer']->value['trade_money']=='1'){?> checked<?php }?> />开启，<input type="radio" name="trade_money" id="trade_money" value="0"<?php if ($_smarty_tpl->tpl_vars['transfer']->value['trade_money']=='0'){?> checked<?php }?>  />关闭<span id="dtrade_money"></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c1'>1个金币需要积分数：</td>
		<td class='hback_none'><input name="trade_money_ratio" id="trade_money_ratio" value="<?php echo $_smarty_tpl->tpl_vars['transfer']->value['trade_money_ratio'];?>
" class="input-s" type="text" /><span id="dtrade_money_ratio"></span></td>
	  </tr>
	  <tr>
		<td class='hback_c3'>金币转换积分：</td>
		<td class='hback_none'><input type="radio" name="trade_points" id="trade_points" value="1"<?php if ($_smarty_tpl->tpl_vars['transfer']->value['trade_points']=='1'){?> checked<?php }?> />开启，<input type="radio" name="trade_points" id="trade_points" value="0"<?php if ($_smarty_tpl->tpl_vars['transfer']->value['trade_points']=='0'){?> checked<?php }?> />关闭<span id="dtrade_points"></span></td>
	  </tr>
	  <tr>
		<td class='hback_c3'>1个金币可转换积分数：</td>
		<td class='hback_none'><input name="trade_points_ratio" id="trade_points_ratio" value="<?php echo $_smarty_tpl->tpl_vars['transfer']->value['trade_points_ratio'];?>
" class="input-s" type="text" /><span id="dtrade_points_ratio"></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<?php }} ?>