<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>赠送记录</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=giftrecord">赠送记录</a></p></div>
  <div class="main-cont">
    <h3 class="title">赠送记录</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=giftrecord" />
	  <div class="item">
		<label>赠言&nbsp;&nbsp;</label><input type="text" id="skeyword" name="skeyword" class="input-150" value="<!--{$skeyword}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=giftrecord&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="12%"><div class="th-gap">赠送人</div></th>
		<th width="15%"><div class="th-gap">接收人</div></th>
		<th width="15%"><div class="th-gap">礼物</div></th>
		<th width="10%"><div class="th-gap">赠送时间</div></th>
		<th width="7%"><div class="th-gap">查看</div></th>
		<th><div class="th-gap">赠言</div></th>
		<th width='13%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $giftrecord as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.recordid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.recordid}--></td>
		<td><a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.fromuserid}-->');"><!--{$volist.fusername}--></a></td>
		<td><a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.touserid}-->');"><!--{$volist.tusername}--></a></td>
		<td align="center"><!--{$volist.giftname}--><img src="<!--{$urlpath}--><!--{$volist.imgurl}-->" /></td>
		<td align="center" title="<!--{$volist.sendtimeline|date_format:"%H:%M:%S"}-->"><!--{$volist.sendtimeline|date_format:"%Y/%m/%d"}--></td>
		</td>
		<td align="center">
		<!--{if $volist.viewstatus=='1'}-->
		<font color="green">已查看</font>
		<!--{else}-->
		<font color="#999999">未查看</font>
		<!--{/if}-->
		</td>
		<td align="left"><!--{$volist.message}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=giftrecord&a=edit&id=<!--{$volist.recordid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-edit">修改</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=giftrecord&a=del&id[]=<!--{$volist.recordid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="7"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span>编辑赠送记录</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=giftrecord&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑赠送记录</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=giftrecord&<!--{$comeurl}-->" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>赠送人 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><!--{$giftrecord.fusername}--> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>接收人 <span class="f_red"></span> </td>
		<td class='hback'><!--{$giftrecord.tusername}--> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物信息 <span class="f_red"></span> </td>
		<td class='hback'>
		<!--{$giftrecord.giftname}--><br />
		<img src="<!--{$urlpath}--><!--{$giftrecord.imgurl}-->" />
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠送时间 <span class="f_red"></span> </td>
		<td class='hback'><!--{$giftrecord.sendtimeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>查看状态<span class="f_red"></span> </td>
		<td class='hback'>
		<!--{if $giftrecord.viewstatus == '1'}-->
		<font color="green">已查看</font>
		<!--{else}-->
		<font color="#999999">未查看</font>
		<!--{/if}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠 言 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="message" id="message" style="width:60%;height:80px;overflow:auto;"><!--{$giftrecord.message}--></textarea>  <span id='dmessage' class='f_red'></span></td>
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
<!--{/if}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>