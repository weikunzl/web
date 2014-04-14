<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>短信群发</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!-- 短信群发_筛选会员 -->
<!--{if $a eq "group"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=smssend&a=group">按筛选条件群发手机短信</a></p></div>
  <div class="main-cont">
	<h3 class="title">按筛选条件群发手机短信</h3>

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=smssend" onsubmit='return checksendgroup();' />
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
		<td class='hback'><!--{hook mod='age' name='startage' text='=不限='}--> 岁~ <!--{hook mod='age' name='endage' text='=不限='}--> 岁</td>
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
		<td class='hback'><!--{hook mod='lovesort' type='checkbox' name='lovesort'}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>婚姻状态 <span class='f_red'></span></td>
		<td class='hback'><!--{hook mod='var' type='checkbox' item='marrystatus' name='marry'}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员组 <span class='f_red'></span></td>
		<td class='hback'><!--{hook mod='usergroup' type='checkbox' name='groupid'}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>所在地区 <span class='f_red'></span></td>
		<td class='hback'>
		<!--{area type='dist1' name='provinceid' ajax='1' cname='cityid' cajax='1' dname='distid' text='=请选择='}-->&nbsp;<span id='dprovinceid' class='f_red'></span>
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
	  <tr id="mod_content" style="display:;">
		<td class='hback_1'>短信内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:40%;height:80px;overflow:hidden;" onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"></textarea>
		  <span id='dcontent' class='f_red'></span>		  
		  <br /><font color='#999999'>(温馨提示，短信内容最多不能超过70个字。)</font>
		  已经输入<span id="counter">0</span>字
		</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="提交发送任务" /></td>
	  </tr>
	</table>
	</form>


  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->


<!-- 指定手机号码发送短信 -->
<!--{if $a eq "single"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=smssend&a=single">指定手机号码发送短信</a></p></div>
  <div class="main-cont">
	<h3 class="title">指定手机号码发送短信</h3>

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=smssend" onsubmit='return checksendsingle();' />
    <input type='hidden' name='a' id='a' value='sendsingle' />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>手机号码 <span class='f_red'>*</span></td>
		<td class='hback' width='85%'><textarea name="recmobile" id="recmobile" style="width:40%;height:80px;overflow:auto;"></textarea><br /><font color="#999999">填写接收人的手机号码，多个请用英文逗号“,”隔开，手机号码必须有效且为中国大陆号码。</font> <br /><span id='drecmobile' class='f_red'></span> </td>
	  </tr>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1'>短信内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:40%;height:80px;overflow:hidden;" onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"></textarea>
		  <span id='dcontent' class='f_red'></span>		  
		  <br /><font color='#999999'>(温馨提示，短信内容最多不能超过70个字。)</font>
		  已经输入<span id="counter">0</span>字
		</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="提交发送任务" /></td>
	  </tr>
	</table>
	</form>


  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!-- VIP到期群发  -->
<!--{if $a eq "offvip"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=smssend&a=offvip">群发VIP到期会员短信</a></p></div>
  <div class="main-cont">
	<h3 class="title">群发VIP到期会员短信</h3>

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=smssend" onsubmit='return checksendgroup();' />
    <input type='hidden' name='a' id='a' value='saveoffvip' />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td colspan='2' class='hback_c2' align="center"><b>发送设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>每次发送 <span class='f_red'>*</span></td>
		<td class='hback' width='85%'><input type="text" name="pagesize" id="pagesize" value="10" class="input-s" /> 封 <span id='dpagesize' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>每次间隔 <span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="refresh" id="refresh" value="1" class="input-s" /> 秒 <span id='drefresh' class='f_red'></span></td>
	  </tr>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1'>短信内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:40%;height:80px;overflow:hidden;" onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"></textarea>
		  <span id='dcontent' class='f_red'></span>		  
		  <br /><font color='#999999'>(温馨提示，短信内容最多不能超过70个字。)</font>
		  已经输入<span id="counter">0</span>字
		</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="提交发送任务" /></td>
	  </tr>
	</table>
	</form>


  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->


<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->

</body>
</html>
<script type="text/javascript">
//提交群发短信
function checksendgroup() {
	var t = "";
	var v = "";

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("短信内容不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//提交指定手机号码
function checksendsingle() {
	var t = "";
	var v = "";

	t = "recmobile";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("手机号码不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("短信内容不能为空", t);
		$('#'+t).focus();
		return false;
	}

	return true;
}

</script>