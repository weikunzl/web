<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:11
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\promotion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7573532e894b505924-51315763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9767460ca93a66a6dad2c6f7de2c9e8fed934be6' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\promotion.tpl',
      1 => 1356580604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7573532e894b505924-51315763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'promotion' => 0,
    'volist' => 0,
    'pagecount' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e894b6bc5a3_04130120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e894b6bc5a3_04130120')) {function content_532e894b6bc5a3_04130120($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>注册推广设置</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=promotion">注册推广</a></p></div>
  <div class="main-cont">
	<h3 class="title">注册推广</h3>
    <form name="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=promotion&a=saveedit" />
	<table cellpadding='10' cellspacing='10' class='tab'>
	  <tr>
		<td class="hback_none" width="15%">推广状态： </td>
		<td class="hback_none" width="85%"><input type="radio" name="promotion" id="promotion" value="1"<?php if ($_smarty_tpl->tpl_vars['promotion']->value['promotion']===true){?> checked<?php }?> />开启，<input type="radio" name="promotion" 
id="promotion" value="0"<?php if ($_smarty_tpl->tpl_vars['promotion']->value['promotion']===false){?> checked<?php }?> />关闭<span id="dpromotion"></span>
</td>
	  </tr>
	  <tr>
		<td class='hback_none'>有效推广设置：</td>
		<td class='hback_none'><input type="checkbox" name="emailvalid" id="emailvalid" value="1" checked disabled />邮箱有效，<input type="checkbox" name="avatarvalid" id="avatarvalid" value="1"<?php if ($_smarty_tpl->tpl_vars['promotion']->value['avatarvalid']=='1'){?> checked<?php }?> />上传了有效头像<br /><font color="#999999">（推广的有效会员至少需要通过邮箱认证）</font></td>
	  </tr>
	  <tr>
		<td class='hback_none'>推广跳转地址：</td>
		<td class='hback_none'><input type="radio" name="jumptype" id="jumptype" value="1"<?php if ($_smarty_tpl->tpl_vars['promotion']->value['jumptype']=='1'){?> checked<?php }?> />注册页，<input type="radio" name="jumptype" id="jumptype" value="2"<?php if ($_smarty_tpl->tpl_vars['promotion']->value['jumptype']=='2'){?> checked<?php }?> />首页<span id="djumptype"></span></td>
	  </tr>

	  <tr>
		<td class='hback_c3' colspan='2'>每成功推广一个会员，奖励金币和积分，以及达到几个会员后自动结算</td>
	  </tr>
	  <tr>
		<td class='hback_none'>奖励金币个数：</td>
		<td class='hback_none'><input name="onemoney" id="onemoney" value="<?php echo $_smarty_tpl->tpl_vars['promotion']->value['onemoney'];?>
" class="input-s" type="text" /><span id="donemoney"></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'>奖励积分个数：</td>
		<td class='hback_none'><input name="onepoints" id="onepoints" value="<?php echo $_smarty_tpl->tpl_vars['promotion']->value['onepoints'];?>
" class="input-s" type="text" /><span id="donepoints"></span></td>
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

<?php if ($_smarty_tpl->tpl_vars['a']->value=="list"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=promotion&a=list">推广列表</a></p></div>
  <div class="main-cont">
	<h3 class="title">推广列表</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="15%"><div class="th-gap">推广人ID</div></th>
		<th width="15%"><div class="th-gap">注册会员ID</div></th>
		<th width="18%"><div class="th-gap">注册时间</div></th>
		<th width="8%"><div class="th-gap">邮箱</div></th>
		<th width="8%"><div class="th-gap">头像</div></th>
		<th width="10%"><div class="th-gap">奖励金币</div></th>
		<th width="10%"><div class="th-gap">奖励积分</div></th>
		<th><div class="th-gap">状态</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['promotion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td><a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['tuserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tuserid'];?>
</a></td>
		<td><a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['ruserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['ruserid'];?>
</a></td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['rzemail']=='1'){?>
		<font color="green">有效</font>
		<?php }else{ ?>
		<font color="#999999">无效</font>
		<?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['avatar']=='1'){?>
		<font color="green">有效</font>
		<?php }else{ ?>
		<font color="#999999">无效</font>
		<?php }?>
		</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['validmoney'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['validpoints'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['settleflag']=='1'){?>
		<font color='green'>已结算</font>
		<?php }else{ ?>
		<font color='blue'>未结算</font>
		<?php }?>
		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	</table>

	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>1){?>
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</td>
	  </tr>
	</table>
	<?php }?>


  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<?php }} ?>