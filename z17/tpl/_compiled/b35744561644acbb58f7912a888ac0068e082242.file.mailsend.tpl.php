<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:39
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\mailsend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1874532e892b5462e9-88207859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b35744561644acbb58f7912a888ac0068e082242' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\mailsend.tpl',
      1 => 1352362149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1874532e892b5462e9-88207859',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e892b655389_91838822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e892b655389_91838822')) {function content_532e892b655389_91838822($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>邮件群发</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<!-- 群发邮件_筛选会员 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="group"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend&a=group">按筛选条件群发邮件</a></p></div>
  <div class="main-cont">
	<h3 class="title">群发会员邮件</h3>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend" onsubmit='return checksendgroup();' />
    <input type='hidden' name='a' id='a' value='savegroup' />
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
		<td class='hback'><input type="text" name="pagesize" id="pagesize" value="10" class="input-s" /> 封 <span id='dpagesize' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>每次间隔 <span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="refresh" id="refresh" value="1" class="input-s" /> 秒 <span id='drefresh' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td colspan='2' class='hback_c3' align="center"><b>邮件内容</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件模板 <span class='f_red'></span></td>
		<td class='hback'><input type='hidden' name='tplid' id='tplid' value='' /><span id="tips_mailtpl" style="display:none;">&nbsp;&nbsp;</span><a href="javascript:void(0);" onclick="tbox_get_mailtpl('选择邮件模板', 'myform', 'tplid', 'tips_mailtpl');">选择邮件模板</a>
		<br />
		<font color='#999999'>（选了模板则不需要填写以下的邮件标题和内容）</font>
		</td>
	  </tr>
	  <tr id="mod_subject" style="display:;">
		<td class='hback_1'>邮件主题 <span class='f_red'>*</span></td>
		<td class='hback'><input type='text' name='subject' id='subject' class="input-txt" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1'>邮件内容 <span class="f_red">*</span> </td>
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


<!-- 指定邮箱发送邮件 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="single"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend&a=single">指定邮箱发送邮件</a></p></div>
  <div class="main-cont">
	<h3 class="title">指定邮箱发送邮件</h3>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend" onsubmit='return checksendsingle();' />
    <input type='hidden' name='a' id='a' value='sendsingle' />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>接收邮箱 <span class='f_red'>*</span></td>
		<td class='hback' width='85%'><textarea name="recemail" id="recemail" style="width:60%;height:80px;overflow:auto;"></textarea><br /><font color="#999999">填写接收人的邮箱，多个请用英文逗号“,”隔开，接收邮箱必须有效。</font> <br /><span id='drecemail' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件模板 <span class='f_red'></span></td>
		<td class='hback'><input type='hidden' name='tplid' id='tplid' value='' /><span id="tips_mailtpl" style="display:none;">&nbsp;&nbsp;</span><a href="javascript:void(0);" onclick="tbox_get_mailtpl('选择邮件模板', 'myform', 'tplid', 'tips_mailtpl');">选择邮件模板</a>
		<br />
		<font color='#999999'>（选了模板则不需要填写以下的邮件标题和内容）</font>
		</td>
	  </tr>
	  <tr id="mod_subject" style="display:;">
		<td class='hback_1'>邮件主题 <span class='f_red'>*</span></td>
		<td class='hback'><input type='text' name='subject' id='subject' class="input-txt" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1'>邮件内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:95%;height:280px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>

	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="提交邮件任务" /></td>
	  </tr>
	</table>
	</form>


  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<!-- 群发邮件_VIP到期会员 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="offvip"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend&a=offvip">群发VIP到期邮件</a></p></div>
  <div class="main-cont">
	<h3 class="title">群发VIP到期会员邮件</h3>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend" onsubmit='return checksendoffvip();' />
    <input type='hidden' name='a' id='a' value='saveoffvip' />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td colspan='2' class='hback_c2' align="center"><b>发送设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width="15%">每次发送 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="pagesize" id="pagesize" value="10" class="input-s" /> 封 <span id='dpagesize' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>每次间隔 <span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="refresh" id="refresh" value="1" class="input-s" /> 秒 <span id='drefresh' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td colspan='2' class='hback_c3' align="center"><b>邮件内容</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件模板 <span class='f_red'></span></td>
		<td class='hback'><input type='hidden' name='tplid' id='tplid' value='' /><span id="tips_mailtpl" style="display:none;">&nbsp;&nbsp;</span><a href="javascript:void(0);" onclick="tbox_get_mailtpl('选择邮件模板', 'myform', 'tplid', 'tips_mailtpl');">选择邮件模板</a>
		<br />
		<font color='#999999'>（选了模板则不需要填写以下的邮件标题和内容）</font>
		</td>
	  </tr>
	  <tr id="mod_subject" style="display:;">
		<td class='hback_1'>邮件主题 <span class='f_red'>*</span></td>
		<td class='hback'><input type='text' name='subject' id='subject' class="input-txt" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1'>邮件内容 <span class="f_red">*</span> </td>
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


<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>

</body>
</html>
<script type="text/javascript">
//提交群发邮件
function checksendgroup() {
	var t = "";
	var v = "";

	if($("#tplid").val()==""){
		t = "subject";
		v = $("#"+t).val();
		if(v=="") {
			dmsg("邮件主题不能为空", t);
			$('#'+t).focus();
			return false;
		}

		t = "content";
		v = editor.text();
		if(editor.isEmpty()) {
			dmsg("邮件内容不能为空", t);
			editor.focus();
			return false;
		}
	}
	return true;
}

//提交指定邮箱
function checksendsingle() {
	var t = "";
	var v = "";

	t = "recemail";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("接收邮箱不能为空", t);
		$('#'+t).focus();
		return false;
	}
    
	if($("#tplid").val()==""){

		t = "subject";
		v = $("#"+t).val();
		if(v=="") {
			dmsg("邮件主题不能为空", t);
			$('#'+t).focus();
			return false;
		}

		t = "content";
		v = editor.text();
		if(editor.isEmpty()) {
			dmsg("邮件内容不能为空", t);
			editor.focus();
			return false;
		}
	}
	return true;
}

//删除邮件模板
function deltpl(){
    $('#tplid').val('');
	$('#tips_mailtpl').hide();
	$('#mod_subject').show();
	$('#mod_content').show();
}
</script><?php }} ?>