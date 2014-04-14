<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>短信发送记录</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：运营管理<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=smslog">短信发送记录</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=smslog" />
	  <div class="item">
	   <label>会员名称：</label><input type="text" id="susername" name="susername" class="input-100" value="<!--{$susername}-->" />&nbsp;&nbsp;
	   <label>手机号码：</label><input type="text" id="smobile" name="smobile" class="input-100" value="<!--{$smobile}-->" />&nbsp;&nbsp;&nbsp;
		<label>短信内容：</label><input type="text" id="skeyword" name="skeyword" class="input-100" value="<!--{$skeyword}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=smslog&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="12%"><div class="th-gap">收件人</div></th>
		<th width="12%"><div class="th-gap">手机号码</div></th>
		<th><div class="th-gap">短信内容</div></th>
		<th width="11%"><div class="th-gap">发送时间</div></th>
		<th width="15%"><div class="th-gap">状态</div></th>
		<th width="10%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $smslog as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.logid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.logid}--></td>
		<td align="left"><!--{if $volist.userid>0}--><!--{$volist.username}--><!--{else}--><font color="#999999">~~</font><!--{/if}--></td>
		<td align="left"><!--{$volist.mobile}--></td>
		<td align="left"><!--{$volist.content}--></td>
		<td align="center"><!--{$volist.sendtime|date_format:"%Y-%m-%d"}--><br /><!--{$volist.sendtime|date_format:"%H:%M:%S"}--></td>
		<td align="center"><!--{if $volist.flag==1}--><font color='green'>成功</font><!--{else}--><font color='red'>失败</font><br /><font color='#999999'><!--{$volist.response}--></font><!--{/if}--></td>
		<td align="center"><a href="<!--{$cpfile}-->?c=smslog&a=del&id[]=<!--{$volist.logid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
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

<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>