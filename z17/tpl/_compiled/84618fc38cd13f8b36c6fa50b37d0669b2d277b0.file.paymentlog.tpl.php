<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:12
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\paymentlog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10913532e89102d8660-99867171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84618fc38cd13f8b36c6fa50b37d0669b2d277b0' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\paymentlog.tpl',
      1 => 1352865946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10913532e89102d8660-99867171',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'suserid' => 0,
    'susername' => 0,
    'netpay_select' => 0,
    'sdate' => 0,
    'edate' => 0,
    'sflag' => 0,
    'paymentlog' => 0,
    'volist' => 0,
    'pagecount' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e89103c8114_04876444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e89103c8114_04876444')) {function content_532e89103c8114_04876444($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>在线充值记录</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=paymentlog">在线充值记录</a></p></div>
  <div class="main-cont">
    <h3 class="title">在线充值记录</h3>

	<div class="search-area5">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=paymentlog" />
	  <div class="item">
	  <label>会员ID&nbsp;</label><input type="text" name="suserid" id="suserid" value="<?php if ($_smarty_tpl->tpl_vars['suserid']->value>0){?><?php echo $_smarty_tpl->tpl_vars['suserid']->value;?>
<?php }?>" class="input-s" />&nbsp;
	  <label>会员名称&nbsp;</label><input type="text" name="susername" id="susername" value="<?php echo $_smarty_tpl->tpl_vars['susername']->value;?>
" class="input-s" />&nbsp;
	  <label>支付方式&nbsp;</label><?php echo $_smarty_tpl->tpl_vars['netpay_select']->value;?>
&nbsp;
      <label>充值时间&nbsp;</label><input type="text" name="sdate" id="sdate" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
"  readonly onClick="WdatePicker();" class="input-s" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<?php echo $_smarty_tpl->tpl_vars['edate']->value;?>
"  readonly onClick="WdatePicker();" class="input-s" />&nbsp;
	  <label>状态&nbsp;</label><select name='sflag' id='sflag'>
	  <option value=''>不限</option>
	  <option value='wuxiao'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='wuxiao'){?> selected<?php }?>>无效</option>
	  <option value='success'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='success'){?> selected<?php }?>>成功</option>
	  <option value='fail'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='fail'){?> selected<?php }?>>失败</option>
	  </select>
	  &nbsp;&nbsp;&nbsp;<input type="submit" class="button_s" value=" 搜 索 " />
      </div>
	  </form>
	</div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="15%"><div class="th-gap">充值会员</div></th>
		<th width="18%"><div class="th-gap">充值方式</div></th>
		<th width="20%"><div class="th-gap">充值单号</div></th>
		<th width="15%"><div class="th-gap">充值金额</div></th>
		<th width="18%"><div class="th-gap">充值时间</div></th>
		<th><div class="th-gap">状态</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paymentlog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td><a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['mentname'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['paynum'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['amount'];?>
</td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['addtime'],"%Y-%m-%d %H:%M");?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['paystatus']==10){?>
		<font color='green'>成功</font>
		<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['paystatus']==11){?>
		<font color='red'>失败</font>
		<?php }else{ ?>
		<font color='#999999'>无效</font>
		<?php }?>
		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
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
</div>
<?php }?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html><?php }} ?>