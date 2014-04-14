<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:42
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\mailcontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18979532e892e272453-23676982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '565a5a2f687bf47e1f1d3690b70ecaf7713405e9' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\mailcontent.tpl',
      1 => 1340787867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18979532e892e272453-23676982',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'stitle' => 0,
    'skeyword' => 0,
    'page' => 0,
    'urlitem' => 0,
    'mailcontent' => 0,
    'volist' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e892e3f4a03_41998648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e892e3f4a03_41998648')) {function content_532e892e3f4a03_41998648($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>邮件发送内容</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent">邮件发送内容</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent" />
	  <div class="item">
	    <label>邮件主题：</label>
		&nbsp;
		<input type="text" id="stitle" name="stitle" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
" />&nbsp;
		<label>邮件内容：</label>
		<input type="text" id="skeyword" name="skeyword" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="30%"><div class="th-gap">邮件主题</div></th>
		<th width="17%"><div class="th-gap">生成时间</div></th>
		<th width="10%"><div class="th-gap">发送总数</div></th>
		<th width="10%"><div class="th-gap">成功总数</div></th>
		<th width="10%"><div class="th-gap">失败总数</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mailcontent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['subject'];?>
</td>
		<td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['createline'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['sendcount'];?>
</td>
		<td align="center"><font color='green'><?php echo $_smarty_tpl->tpl_vars['volist']->value['successcount'];?>
</font></td>
		<td align="center"><font color='red'><?php echo $_smarty_tpl->tpl_vars['volist']->value['failcount'];?>
</font></td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent&a=view&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-sort">查看</a>
		&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
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

<!-- 查看邮件内容 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="view"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span>查看邮件发送内容</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>查看邮件发送内容</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">邮件主题 <span class='f_red'></span></td>
		<td class='hback' width="85%"><?php echo $_smarty_tpl->tpl_vars['mailcontent']->value['subject'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件内容 <span class='f_red'></span></td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['mailcontent']->value['content'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>生成时间 <span class='f_red'></span></td>
		<td class='hback'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mailcontent']->value['createline'],"%Y-%m-%d %H:%M:%S");?>
</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="button" name="btn_return" class="button" value="返回列表" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
';" /></td>
	  </tr>
	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<script type="text/javascript">
//发送系统消息
function checkform() {
	var t = "";
	var v = "";

	t = "subject";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("消息标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "content";
	v = editor.text();
	if(editor.isEmpty()) {
		dmsg("消息内容不能为空", t);
		editor.focus();
		return false;
	}

	return true;
}

</script><?php }} ?>