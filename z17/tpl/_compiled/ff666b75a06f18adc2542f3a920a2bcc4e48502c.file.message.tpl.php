<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:13
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27783532e8911e6d277-03678688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff666b75a06f18adc2542f3a920a2bcc4e48502c' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\message.tpl',
      1 => 1349662409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27783532e8911e6d277-03678688',
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
    'skeyword' => 0,
    'page' => 0,
    'urlitem' => 0,
    'message' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e89122172a4_71733990',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e89122172a4_71733990')) {function content_532e89122172a4_71733990($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>信件管理</title>
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
?c=message">会员信件</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=message" />
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
		<label>信件内容：</label>
		<input type="text" id="skeyword" name="skeyword" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="15%"><div class="th-gap">发件人</div></th>
		<th width="15%"><div class="th-gap">收件人</div></th>
		<th width="11%"><div class="th-gap">发件时间</div></th>
		<th width="6%"><div class="th-gap">阅读</div></th>
		<th width="6%"><div class="th-gap">置顶</div></th>
		<th><div class="th-gap">信件内容</div></th>
		<th width='12%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
</td>
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
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['readflag']=='1'){?>
		<font color='green'>已阅</font>
		<?php }else{ ?>
		<font color='#999999'>未阅</font>
		<?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['istop']==0){?>
			<input type="hidden" id="attr_istop<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
" value="istopopen" />
			<img id="istop<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('istop','<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_istop<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
" value="istopclose" />
			<img id="istop<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('istop','<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['content'],20);?>
</td>
		<td align="center">
		<a href="javascript:void(0);" onclick="tbox_message_edit('查看/编辑会员信件', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
')" class="icon-edit">查看</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=message&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="7">
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

<!-- 查看信件/编辑信件 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=='edit'){?>
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=message&fromtype=jdbox" onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name='id' value="<?php echo $_smarty_tpl->tpl_vars['message']->value['msgid'];?>
" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
	    <td class='hback_1' width='20%'>信件ID </td>
		<td class='hback' width='80%'><?php echo $_smarty_tpl->tpl_vars['message']->value['msgid'];?>
 （发件时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['sendtime'],"%Y-%m-%d %H:%M:%S");?>
）</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>发件人 <span class="f_red"></span> </td>
		<td class='hback'>
		<?php echo $_smarty_tpl->tpl_vars['message']->value['fromusername'];?>
 
		<?php if ($_smarty_tpl->tpl_vars['message']->value['fromgender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['message']->value['fromageyear']),$_smarty_tpl);?>
岁
		<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['fromprovinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['fromcityid']),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>收件人 <span class="f_red"></span></td>
		<td class='hback'>
		<?php echo $_smarty_tpl->tpl_vars['message']->value['tousername'];?>
 
		<?php if ($_smarty_tpl->tpl_vars['message']->value['togender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['message']->value['toageyear']),$_smarty_tpl);?>
岁
		<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['toprovinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['tocityid']),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>状态设置 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type='radio' name='flag' id='flag' value='1'<?php if ($_smarty_tpl->tpl_vars['message']->value['flag']=='1'){?> checked<?php }?> />通过，<input type='radio' name='flag' id='flag' value='0'<?php if ($_smarty_tpl->tpl_vars['message']->value['flag']=='0'){?> checked<?php }?> />锁定 <span id='dflag' class='f_red'></span>&nbsp;&nbsp;
		<input type='checkbox' name='istop' id='istop' value='1'<?php if ($_smarty_tpl->tpl_vars['message']->value['istop']=='1'){?> checked<?php }?> />置顶
		
		</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>信件内容 <span class="f_red">*</span></td>
		<td class='hback'>
		<textarea name='content' id='content' style='width:90%;height:160px;overflow:auto;'><?php echo $_smarty_tpl->tpl_vars['message']->value['content'];?>
</textarea>
		<br /><span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="2" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>




<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
<?php }?>

</body>
</html>

<script type="text/javascript">
//编辑信件
function checkedit() {
	var t = "";
	var v = "";

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("信件内容不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

</script><?php }} ?>