<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:08
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8485532e890c7093e4-73677430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45c2a86993a02c9b10f3f31ef5d1c93c78d12244' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\album.tpl',
      1 => 1354260044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8485532e890c7093e4-73677430',
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
    'stype' => 0,
    'skeyword' => 0,
    'sflag' => 0,
    'page' => 0,
    'urlitem' => 0,
    'album' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e890c9274b7_55633799',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e890c9274b7_55633799')) {function content_532e890c9274b7_55633799($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>相册管理</title>
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
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album">相册管理</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album" />
	  <div class="item">
	    <label>搜索：</label>
		<select name='stype' id='stype'>
		<option value=''></option>
		<option value='userid'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='userid'){?> selected<?php }?>>会员ID</option>
		<option value='username'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='username'){?> selected<?php }?>>会员名称</option>
		<option value='email'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='email'){?> selected<?php }?>>邮箱</option>
		<option value='title'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='title'){?> selected<?php }?>>照片标题</option>
		</select>
		&nbsp;
		<input type="text" id="skeyword" name="skeyword" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;
		<label>状态：</label>
		<select name='sflag' id='sflag'>
		<option value=''>全部</option>
		<option value='pass'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='pass'){?> selected<?php }?>>正常</option>
		<option value='lock'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='lock'){?> selected<?php }?>>锁定</option>
		</select>
		&nbsp;&nbsp;&nbsp;
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
		<th width="15%"><div class="th-gap">会员名称</div></th>
		<th width="15%"><div class="th-gap">会员信息</div></th>
		<th width="13%"><div class="th-gap">照片</div></th>
		<th width="10%"><div class="th-gap">状态</div></th>
		<th width="10%"><div class="th-gap">上传时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
<a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a> (<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
)<br /><?php echo $_smarty_tpl->tpl_vars['volist']->value['email'];?>
</td>
		<td align="left">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['volist']->value['ageyear']),$_smarty_tpl);?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>

		</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['uploadfiles'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['thumbfiles'];?>
" border="0" /></a>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']=='1'){?>
		<font color='green'>正常</font>
		<?php }else{ ?>
		<font color='#999999'>锁定</font>
		<?php }?>
		</td>
		<td align="center">
		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d");?>
<br />
		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%H:%M:%S");?>
<br />
		<a href='javascript:void(0);' onclick="tbox_album_add('上传照片', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
')">上传照片</a>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']=='1'){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&a=suoding&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-set">锁定</a>
		&nbsp;&nbsp;
		<a href="javascript:void(0);" onclick="tbox_setavatar('设置形象照', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
')" class="icon-add">设为形象照</a>
		<?php }else{ ?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&a=tongguo&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-set">审核通过</a>
		<?php }?>
		&nbsp;&nbsp;
		<a href="javascript:void(0);" onclick="tbox_album_edit('编辑照片', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
')" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
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
		<input class="button" name="btn_pass" type="button" value="批量审核" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('tongguo');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_lock" type="button" value="批量锁定" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('suoding');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;
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

<!-- 上传照片 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="add"){?>
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&fromtype=jdbox" onsubmit='return checkadd();' />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
 </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>

		<?php if ($_smarty_tpl->tpl_vars['user']->value['gender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['user']->value['ageyear']),$_smarty_tpl);?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['cityid']),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片标题 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='text' name='title' id='title' class='input-txt' /> <span id='dtitle' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片地址 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td>
			  <input type='hidden' name='thumbfiles' id='thumbfiles'  />
			  <input type="text" name="uploadfiles" id="uploadfiles" class="input-150" readonly='only'  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=album&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <br />
		  <font color="#999999">上传图片只支持：gif,jpeg,jpg,png格式</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>审核状态 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='radio' name='flag' id='flag' value='1' checked />通过，<input type='radio' name='flag' id='flag' value='0' />锁定 <span id='dflag' class='f_red'></span> <font color="#999999">(只有通过才能显示)</font></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>锁定说明 </td>
		<td class='hback' colspan='3'>
		<textarea name='auditremark' id='auditremark' style='width:60%;height:70px;overflow:auto;'></textarea>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="4" align="center"><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<!-- 编辑照片 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=='edit'){?>
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album&fromtype=jdbox" onsubmit='return checkadd();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name='id' value="<?php echo $_smarty_tpl->tpl_vars['album']->value['photoid'];?>
" />
	<input type="hidden" name='userid' value="<?php echo $_smarty_tpl->tpl_vars['album']->value['userid'];?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['album']->value['userid'];?>
 </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['album']->value['email'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<?php echo $_smarty_tpl->tpl_vars['album']->value['username'];?>

		<?php if ($_smarty_tpl->tpl_vars['album']->value['gender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['album']->value['ageyear']),$_smarty_tpl);?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['album']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['album']->value['cityid']),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片标题 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='text' name='title' id='title' class='input-txt' value="<?php echo $_smarty_tpl->tpl_vars['album']->value['title'];?>
" /> <span id='dtitle' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片地址 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td>
			  <input type='hidden' name='thumbfiles' id='thumbfiles' value="<?php echo $_smarty_tpl->tpl_vars['album']->value['thumbfiles'];?>
" />
			  <input type="text" name="uploadfiles" id="uploadfiles" class="input-150" readonly='only' value="<?php echo $_smarty_tpl->tpl_vars['album']->value['uploadfiles'];?>
"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=album&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <br />
		  <font color="#999999">上传图片只支持：gif,jpeg,jpg,png格式</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>审核状态 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='radio' name='flag' id='flag' value='1'<?php if ($_smarty_tpl->tpl_vars['album']->value['flag']=='1'){?> checked<?php }?> />通过，<input type='radio' name='flag' id='flag' value='0'<?php if ($_smarty_tpl->tpl_vars['album']->value['flag']=='0'){?> checked<?php }?> />锁定 <span id='dflag' class='f_red'></span> <font color="#999999">(只有通过才能显示)</font></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>锁定说明 </td>
		<td class='hback' colspan='3'>
		<textarea name='auditremark' id='auditremark' style='width:60%;height:70px;overflow:auto;'><?php echo $_smarty_tpl->tpl_vars['album']->value['auditremark'];?>
</textarea>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="4" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<!-- 设置形象照 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=='avatar'){?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."imgcropper.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main-wrap">
  <div class="main-cont">
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['album']->value['userid'];?>
 </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['album']->value['email'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<?php echo $_smarty_tpl->tpl_vars['album']->value['username'];?>

		<?php if ($_smarty_tpl->tpl_vars['album']->value['gender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['album']->value['ageyear']),$_smarty_tpl);?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['album']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['album']->value['cityid']),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback' colspan='4' id='avatar_editor'>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."imgcropper.avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</td>
	  </tr>
	</table>

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
//上传照片
function checkadd() {
	var t = "";
	var v = "";

	t = "title";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("照片标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "uploadfiles";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("照片地址不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

</script><?php }} ?>