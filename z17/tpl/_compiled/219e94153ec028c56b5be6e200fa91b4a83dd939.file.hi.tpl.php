<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:13
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\hi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25798532e8911510285-38376249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '219e94153ec028c56b5be6e200fa91b4a83dd939' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\hi.tpl',
      1 => 1349852745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25798532e8911510285-38376249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'fromtype' => 0,
    'a' => 0,
    'cpfile' => 0,
    'ftype' => 0,
    'fkeyword' => 0,
    'ttype' => 0,
    'tkeyword' => 0,
    'sdate' => 0,
    'edate' => 0,
    'hi' => 0,
    'volist' => 0,
    'pagecount' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e891169b4c3_86135099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e891169b4c3_86135099')) {function content_532e891169b4c3_86135099($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>会员问候</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
<?php }?>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=hi">会员问候</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=hi" />
	  <div class="item">
	    <label>发件人：</label>
		<select name='ftype' id='ftype'>
		<option value=''></option>
		<option value='userid'<?php if ($_smarty_tpl->tpl_vars['ftype']->value=='userid'){?> selected<?php }?>>会员ID</option>
		<option value='username'<?php if ($_smarty_tpl->tpl_vars['ftype']->value=='username'){?> selected<?php }?>>会员名称</option>
		<option value='email'<?php if ($_smarty_tpl->tpl_vars['ftype']->value=='email'){?> selected<?php }?>>邮箱</option>
		</select>
		&nbsp;
		<input type="text" id="fkeyword" name="fkeyword" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['fkeyword']->value;?>
" />
		&nbsp;&nbsp;
	    <label>收件人：</label>
		<select name='ttype' id='ttype'>
		<option value=''></option>
		<option value='userid'<?php if ($_smarty_tpl->tpl_vars['ttype']->value=='userid'){?> selected<?php }?>>会员ID</option>
		<option value='username'<?php if ($_smarty_tpl->tpl_vars['ttype']->value=='username'){?> selected<?php }?>>会员名称</option>
		<option value='email'<?php if ($_smarty_tpl->tpl_vars['ttype']->value=='email'){?> selected<?php }?>>邮箱</option>
		</select>
		&nbsp;
		<input type="text" id="tkeyword" name="tkeyword" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['tkeyword']->value;?>
" />
		&nbsp;&nbsp;
		<br />
		<label>发件日期：</label><input type="text" name="sdate" id="sdate" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<?php echo $_smarty_tpl->tpl_vars['edate']->value;?>
"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="15%"><div class="th-gap">发件人</div></th>
		<th width="15%"><div class="th-gap">收件人</div></th>
		<th width="11%"><div class="th-gap">发件时间</div></th>
		<th width="6%"><div class="th-gap">阅读</div></th>
		<th><div class="th-gap">问候语</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
		<td align="left">
		<a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fromuserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['fromusername'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['volist']->value['fromgender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['volist']->value['fromageyear']),$_smarty_tpl);?>
岁
		</td>
		<td align="left">
		<a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['touserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tousername'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['volist']->value['togender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['volist']->value['toageyear']),$_smarty_tpl);?>
岁
		</td>
		<td align="center" title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%H:%M:%S");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y-%m-%d");?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']=='1'){?>
		<font color='green'>已阅</font>
		<?php }else{ ?>
		<font color='#999999'>未阅</font>
		<?php }?>
		</td>
		<td>#<?php echo $_smarty_tpl->tpl_vars['volist']->value['greetid'];?>
 <?php echo $_smarty_tpl->tpl_vars['volist']->value['message'];?>
</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="5" align="center">暂无信息</td>
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

<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
<?php }?>

</body>
</html>
<?php }} ?>