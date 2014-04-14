<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>系统消息管理</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
<!--{/if}-->
</head>
<body>
<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{/if}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=systemmsg">系统消息</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=systemmsg" />
	  <div class="item">
	    <label>消息标题：</label>
		&nbsp;
		<input type="text" id="stitle" name="stitle" class="input-100" value="<!--{$stitle}-->" />&nbsp;
		<label>消息内容：</label>
		<input type="text" id="skeyword" name="skeyword" class="input-100" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=systemmsg&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
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
	  <!--{foreach $systemmsg as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.contentid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.msgid}--></td>
		<td align="left"><!--{$volist.subject}--></td>
		<td align="left"><!--{$volist.createline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		<td align="center"><!--{$volist.msgcount}--></td>
		<td align="center"><font color='green'><!--{$volist.readcount}--></font></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=systemmsg&a=view&id=<!--{$volist.contentid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-sort">查看</a>
		&nbsp;
		<a href="<!--{$cpfile}-->?c=systemmsg&a=del&id[]=<!--{$volist.contentid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="5">
		<input class="button" name="btn_del" type="button" value="批量删除" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
	  </tr>
	  <!--{/if}-->
	</table>
	</form>
	<!--{if $pagecount>1}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><!--{$showpage}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->

<!-- 按筛选条件群发 -->
<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=systemmsg&a=add">按筛选条件群发站内消息</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=systemmsg" class="btn-general"><span>返回列表</span></a>按筛选条件群发站内消息</h3>

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=systemmsg" onsubmit='return checkform();' />
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
<!--{/if}-->


<!-- 群发VIP到期会员消息 -->
<!--{if $a eq "offvip"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=systemmsg&a=offvip">群发VIP到期会员消息</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=systemmsg" class="btn-general"><span>返回列表</span></a>群发VIP到期会员消息</h3>

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=systemmsg" onsubmit='return checkform();' />
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
<!--{/if}-->


<!-- 查看系统消息 -->
<!--{if $a eq "view"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span>查看系统消息</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=systemmsg&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>查看系统消息</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">消息主题 <span class='f_red'></span></td>
		<td class='hback' width="85%"><!--{$systemmsg.subject}--> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>消息内容 <span class='f_red'></span></td>
		<td class='hback'><!--{$systemmsg.content}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>生成时间 <span class='f_red'></span></td>
		<td class='hback'><!--{$systemmsg.createline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="button" name="btn_return" class="button" value="返回列表" onclick="javascript:window.location.href='<!--{$cpfile}-->?c=systemmsg&<!--{$comeurl}-->';" /></td>
	  </tr>
	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->


<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
<!--{/if}-->

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

</script>