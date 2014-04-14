<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:36
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\diarycomment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28028532e8964b07433-26015523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d2db573a82296df805228e3a5ef48fc949018f6' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\diarycomment.tpl',
      1 => 1352863976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28028532e8964b07433-26015523',
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
    'skeyword' => 0,
    'stype' => 0,
    'comment' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'page' => 0,
    'urlitem' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'comeurl' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e8964c44de8_27579119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8964c44de8_27579119')) {function content_532e8964c44de8_27579119($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>日记评论</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment">日记评论</a></p></div>
  <div class="main-cont">
    <h3 class="title">日记评论</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment" />
	  <div class="item">
	    <label>评论人&nbsp;&nbsp;</label><input type="text" id="susername" name="susername" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['susername']->value;?>
" />&nbsp;&nbsp;
		<label>评论&nbsp;&nbsp;</label><input type="text" id="skeyword" name="skeyword" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;
		<label>状态&nbsp;</label><select name="stype" id="stype">
		<option value=''></option>
		<option value='audit'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='audit'){?> selected<?php }?>>待审核</option>
		<option value='audited'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='audited'){?> selected<?php }?>>已审核</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="18%"><div class="th-gap">日记标题</div></th>
		<th width="11%"><div class="th-gap">评论人</div></th>
		<th><div class="th-gap">评论内容</div></th>
		<th width="6%"><div class="th-gap">审核</div></th>
		<th width='13%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
</td>
		<td><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=diary&a=detail&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['diary_title'];?>
</a></td>
		<td title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%H:%M:%S");?>
"><a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['cmuserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['cmusername'];?>
</a><br/ ><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y/%m/%d");?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['content'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">修改</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="5"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span>编辑日记评论</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑日记评论</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>日记标题 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><?php echo $_smarty_tpl->tpl_vars['comment']->value['diary_title'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论人 <span class="f_red"></span> </td>
		<td class='hback'><a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['cmuserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['comment']->value['cmusername'];?>
</a> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论时间 <span class="f_red"></span> </td>
		<td class='hback'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value['timeline'],"%Y-%m-%d %H:%M:%S");?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论人IP<span class="f_red"></span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['comment']->value['ip'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>审核状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['comment']->value['flag']=='1'){?> checked<?php }?> />通过，<input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['comment']->value['flag']=='0'){?> checked<?php }?> />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论内容 <span class="f_red">*</span> </td>
		<td class='hback'><textarea name="content" id="content" style="width:60%;height:80px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>
</textarea> <br /> <span id='dcontent' class='f_red'></span></td>
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
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("评论内容不能为空", t);
		$('#'+t).focus();
		return false;
	}

	return true;
}
</script>
<?php }} ?>