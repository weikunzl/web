<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>系统日志</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：插件&应用<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=log">系统日志</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=log&a=delall" class="btn-general" onClick="{if(confirm('确定要全部删除吗？')){return true;}return false;}"><span>删除所有记录</span></a>系统日志</h3>
	<form action="<!--{$cpfile}-->?c=log&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="12%"><div class="th-gap">编号</div></th>
		<th width="12%"><div class="th-gap">操作人</div></th>
		<th width="12%"><div class="th-gap">操作IP</div></th>
		<th width="20%"><div class="th-gap">操作时间</div></th>
		<th><div class="th-gap">操作记录</div></th>
		<th width="10%"><div class="th-gap">删除</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $log as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.logid}-->" onClick="checkItem(this, 'chkAll')"> <!--{$volist.logid}--></td>
		<td><!--{$volist.opuser}--></td>
		<td><!--{$volist.ip}--></td>
		<td><!--{$volist.timeline|date_format:"%Y/%m/%d %H:%M:%S"}--></td>
		<td><!--{$volist.content}--></td>
		<td align="center"><a href="<!--{$cpfile}-->?c=log&a=del&id[]=<!--{$volist.logid}-->" onClick="{if(confirm('确定要删除该信息?')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="left"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox">全选</td>
		<td class="hback" colspan="5"><input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定删除选定信息吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
