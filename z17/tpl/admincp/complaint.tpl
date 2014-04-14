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
  <div class="path"><p>当前位置：插件&应用<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=complaint">举报管理</a></p></div>
  <div class="main-cont">
    <h3 class="title">举报管理</h3>
	<form action="<!--{$cpfile}-->?c=complaint&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="12%"><div class="th-gap">被举报的会员</div></th>
		<th width="10%"><div class="th-gap">举报类型</div></th>
		<th width="25%"><div class="th-gap">举报人信息</div></th>
		<th width="25%"><div class="th-gap">情况说明</div></th>
		<th width="10%"><div class="th-gap">处理状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $complaint as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.id}-->" onClick="checkItem(this, 'chkAll')"> <!--{$volist.id}--></td>
		<td><a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.cpuid}-->')"><!--{$volist.cpusername}--></a></td>
		<td align="center">
		<!--{if $volist.cptype==1}-->
		内容虚假
		<!--{else if $volist.cptype==2}-->
		色情服务
		<!--{else}-->
		这是骗子
		<!--{/if}-->
        </td>
		<td>
		<!--{if $volist.fromuid>0}-->
		<a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.fromuid}-->')"><!--{$volist.fromusername}--></a>
		<!--{/if}-->
		电话:<!--{$volist.telephone}--><br /> Email:<!--{$volist.email}-->
        </td>
		<td><!--{$volist.content|nl2br}--></td>
		<td align="center">
		<!--{if $volist.flag==1}-->
		  <font color="red">已冻结</font>
		<!--{else}-->
		  <font color="#999999">未冻结</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.flag==1}-->
		<a href="<!--{$cpfile}-->?c=complaint&a=cancel&uid=<!--{$volist.cpuid}-->&page=<!--{$page}-->">解除冻结</a>
		<!--{else}-->
		<a href="<!--{$cpfile}-->?c=complaint&a=dongjie&uid=<!--{$volist.cpuid}-->&page=<!--{$page}-->">冻结账号</a>
		<!--{/if}-->
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="left"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox">全选</td>
		<td class="hback" colspan="6"><input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定删除选定信息吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
