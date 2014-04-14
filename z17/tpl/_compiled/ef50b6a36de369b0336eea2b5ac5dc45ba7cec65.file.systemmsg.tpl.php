<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:20
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\systemmsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1972532e89188c3ac3-55086722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef50b6a36de369b0336eea2b5ac5dc45ba7cec65' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\systemmsg.tpl',
      1 => 1352432956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1972532e89188c3ac3-55086722',
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
    'stitle' => 0,
    'skeyword' => 0,
    'page' => 0,
    'urlitem' => 0,
    'systemmsg' => 0,
    'volist' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e89189fefb9_91826704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e89189fefb9_91826704')) {function content_532e89189fefb9_91826704($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>系统消息管理</title>
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
?c=systemmsg">系统消息</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg" />
	  <div class="item">
	    <label>消息标题：</label>
		&nbsp;
		<input type="text" id="stitle" name="stitle" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
" />&nbsp;
		<label>消息内容：</label>
		<input type="text" id="skeyword" name="skeyword" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="40%"><div class="th-gap">消息主题</div></th>
		<th width="17%"><div class="th-gap">生成时间</div></th>
		<th width="10%"><div class="th-gap">发送总数</div></th>
		<th width="10%"><div class="th-gap">已阅总数</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['systemmsg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['subject'];?>
</td>
		<td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['createline'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['msgcount'];?>
</td>
		<td align="center"><font color='green'><?php echo $_smarty_tpl->tpl_vars['volist']->value['readcount'];?>
</font></td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&a=view&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-sort">查看</a>
		&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['contentid'];?>
" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
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
		<td class="hback" colspan="5">
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

<!-- 按筛选条件群发 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="add"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&a=add">按筛选条件群发站内消息</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg" class="btn-general"><span>返回列表</span></a>按筛选条件群发站内消息</h3>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg" onsubmit='return checkform();' />
    <input type='hidden' name='a' id='a' value='saveadd' />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td colspan='2' class='hback_c1' align="center"><b>会员筛选</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>性别 <span class='f_red'></span></td>
		<td class='hback' width='85%'><input type="radio" name="gender" id="gender" value="0" checked />不限&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="1" />男会员&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="2" />女会员&nbsp;&nbsp;&nbsp;</td>
	  </tr>
	  <tr>
		<td class='hback_1'>年龄范围 <span class="f_red"></span></td>
		<td class='hback'><?php echo cmd_hook(array('mod'=>'age','name'=>'startage','text'=>'=不限='),$_smarty_tpl);?>
 岁~ <?php echo cmd_hook(array('mod'=>'age','name'=>'endage','text'=>'=不限='),$_smarty_tpl);?>
 岁</td>
	  </tr>
	  <tr>
		<td class='hback_1'>注册时间 <span class='f_red'></span></td>
		<td class='hback'><input type="text" name="regdiffday" id="regdiffday" class="input-s" />天&nbsp;<select name="regdiffdaytype" id="regdiffdaytype"><option value="1">之内</option><option value="2">之前</option></select>&nbsp;注册的会员<span id='dregdiffday' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>登录时间 <span class='f_red'></span></td>
		<td class='hback'><input type="text" name="logindiffday" id="logindiffday" class="input-s" />天&nbsp;<select name="logindiffdaytype" id="logindiffdaytype"><option value="1">之内</option><option value="2">之前</option></select>&nbsp;登录的会员<span id='dlogindiffday' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员形象照 <span class='f_red'></span></td>
		<td class='hback'><select name="avatar" id="avatar"><option value="0">不限</option><option value="1">没上传</option><option value="2">有上传，但锁定状态</option><option value='3'>有上传，正常状态</option></select>&nbsp;<span id='davatar' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>交友类别 <span class='f_red'></span></td>
		<td class='hback'><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'checkbox','name'=>'lovesort'),$_smarty_tpl);?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>婚姻状态 <span class='f_red'></span></td>
		<td class='hback'><?php echo cmd_hook(array('mod'=>'var','type'=>'checkbox','item'=>'marrystatus','name'=>'marry'),$_smarty_tpl);?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员组 <span class='f_red'></span></td>
		<td class='hback'><?php echo cmd_hook(array('mod'=>'usergroup','type'=>'checkbox','name'=>'groupid'),$_smarty_tpl);?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>所在地区 <span class='f_red'></span></td>
		<td class='hback'>
		<?php echo cmd_area(array('type'=>'dist1','name'=>'provinceid','ajax'=>'1','cname'=>'cityid','cajax'=>'1','dname'=>'distid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='dprovinceid' class='f_red'></span>
		<span id="json_cityid"></span>&nbsp;
		<span id="json_distid"></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>认证选项 <span class='f_red'></span></td>
		<td class='hback'>
		邮箱认证&nbsp;&nbsp;<select name="emailrz" id="emailrz"><option value="0">不限</option><option value="1">未认证</option><option value="2">已认证</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
		视频认证&nbsp;&nbsp;<select name="videorz" id="videorz"><option value="0">不限</option><option value="1">未认证</option><option value="2">已认证</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
		身份证认证&nbsp;&nbsp;<select name="idnumberrz" id="idnumberrz"><option value="0">不限</option><option value="1">未认证</option><option value="2">已认证</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
		手机认证&nbsp;&nbsp;<select name="mobilerz" id="mobilerz"><option value="0">不限</option><option value="1">未认证</option><option value="2">已认证</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
		
		</td>
	  </tr>
	  <tr>
		<td colspan='2' class='hback_c2' align="center"><b>发送设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>每次发送 <span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="pagesize" id="pagesize" value="50" class="input-s" /> <span id='dpagesize' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>每次间隔 <span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="refresh" id="refresh" value="1" class="input-s" /> 秒 <span id='drefresh' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td colspan='2' class='hback_c3' align="center"><b>消息内容</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>消息主题 <span class='f_red'>*</span></td>
		<td class='hback'><input type='text' name='subject' id='subject' class="input-txt" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>消息内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:95%;height:280px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>

	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="提交群发任务" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<!-- 群发VIP到期会员消息 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="offvip"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&a=offvip">群发VIP到期会员消息</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg" class="btn-general"><span>返回列表</span></a>群发VIP到期会员消息</h3>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg" onsubmit='return checkform();' />
    <input type='hidden' name='a' id='a' value='saveoffvip' />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td colspan='2' class='hback_c2' align="center"><b>发送设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>每次发送 <span class='f_red'>*</span></td>
		<td class='hback' width='85%'><input type="text" name="pagesize" id="pagesize" value="50" class="input-s" /> <span id='dpagesize' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>每次间隔 <span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="refresh" id="refresh" value="1" class="input-s" /> 秒 <span id='drefresh' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td colspan='2' class='hback_c3' align="center"><b>消息内容</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>消息主题 <span class='f_red'>*</span></td>
		<td class='hback'><input type='text' name='subject' id='subject' class="input-txt" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>消息内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:95%;height:280px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>

	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="提交群发任务" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<!-- 查看系统消息 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="view"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span>查看系统消息</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>查看系统消息</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">消息主题 <span class='f_red'></span></td>
		<td class='hback' width="85%"><?php echo $_smarty_tpl->tpl_vars['systemmsg']->value['subject'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>消息内容 <span class='f_red'></span></td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['systemmsg']->value['content'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>生成时间 <span class='f_red'></span></td>
		<td class='hback'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['systemmsg']->value['createline'],"%Y-%m-%d %H:%M:%S");?>
</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="button" name="btn_return" class="button" value="返回列表" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
';" /></td>
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