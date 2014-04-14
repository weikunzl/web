<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>邮件发送内容</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=mailcontent">邮件发送内容</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=mailcontent" />
	  <div class="item">
	    <label>邮件主题：</label>
		&nbsp;
		<input type="text" id="stitle" name="stitle" class="input-100" value="<!--{$stitle}-->" />&nbsp;
		<label>邮件内容：</label>
		<input type="text" id="skeyword" name="skeyword" class="input-100" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=mailcontent&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
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
	  <!--{foreach $mailcontent as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.contentid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.contentid}--></td>
		<td align="left"><!--{$volist.subject}--></td>
		<td align="left"><!--{$volist.createline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		<td align="center"><!--{$volist.sendcount}--></td>
		<td align="center"><font color='green'><!--{$volist.successcount}--></font></td>
		<td align="center"><font color='red'><!--{$volist.failcount}--></font></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=mailcontent&a=view&id=<!--{$volist.contentid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-sort">查看</a>
		&nbsp;
		<a href="<!--{$cpfile}-->?c=mailcontent&a=del&id[]=<!--{$volist.contentid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
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

<!-- 查看邮件内容 -->
<!--{if $a eq "view"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span>查看邮件发送内容</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=mailcontent&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>查看邮件发送内容</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">邮件主题 <span class='f_red'></span></td>
		<td class='hback' width="85%"><!--{$mailcontent.subject}--> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件内容 <span class='f_red'></span></td>
		<td class='hback'><!--{$mailcontent.content}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>生成时间 <span class='f_red'></span></td>
		<td class='hback'><!--{$mailcontent.createline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="button" name="btn_return" class="button" value="返回列表" onclick="javascript:window.location.href='<!--{$cpfile}-->?c=mailcontent&<!--{$comeurl}-->';" /></td>
	  </tr>
	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
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