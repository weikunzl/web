<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:43
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\maillog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27424532e892f185758-40864765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7da33e906d29112485ad77a9682f827be92f3ea0' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\maillog.tpl',
      1 => 1340787943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27424532e892f185758-40864765',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'susername' => 0,
    'semail' => 0,
    'stitle' => 0,
    'page' => 0,
    'urlitem' => 0,
    'maillog' => 0,
    'volist' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e892f307cd1_95997356',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e892f307cd1_95997356')) {function content_532e892f307cd1_95997356($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>邮件发送记录</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=maillog">邮件发送记录</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=maillog" />
	  <div class="item">
	   <label>收件人：</label><input type="text" id="susername" name="susername" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['susername']->value;?>
" />&nbsp;&nbsp;
	   <label>邮箱：</label><input type="text" id="semail" name="semail" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['semail']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<label>主题：</label><input type="text" id="stitle" name="stitle" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=maillog&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="12%"><div class="th-gap">收件人</div></th>
		<th width="20%"><div class="th-gap">Email</div></th>
		<th width="22%"><div class="th-gap">邮件主题</div></th>
		<th width="17%"><div class="th-gap">发送时间</div></th>
		<th width="10%"><div class="th-gap">状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maillog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['logid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['logid'];?>
</td>
		<td align="left"><?php if ($_smarty_tpl->tpl_vars['volist']->value['userid']>0){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
<?php }else{ ?>~~<?php }?></td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['email'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['subject'];?>
</td>
		<td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="center"><?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==1){?><font color='green'>成功</font><?php }else{ ?><font color='red'>失败</font><?php }?></td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=maillog&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['logid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
		<input class="button" name="btn_del" type="button" value="批量删除" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b> ]条记录</td>
	  </tr>
	  <?php }?>
	</table>
	</form>
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