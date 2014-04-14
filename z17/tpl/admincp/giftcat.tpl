<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>礼物分类</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=giftcat">礼物分类</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=giftcat&a=add" class="btn-general"><span>添加分类</span></a>礼物分类</h3>
	<form action="<!--{$cpfile}-->?c=giftcat&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择</div></th>
		<th width="10%"><div class="th-gap">ID</div></th>
		<th width="20%"><div class="th-gap">分类名称</div></th>
		<th width="10%"><div class="th-gap">排序</div></th>
		<th width="20%"><div class="th-gap">录入时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $giftcat as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.catid}-->" onClick="checkItem(this, 'chkAll')"></td>
		<td align="center"><!--{$volist.catid}--></td>
		<td><!--{$volist.catname}--></td>
		<td align="center"><!--{$volist.orders}--></td>
		<td><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=giftcat&a=edit&id=<!--{$volist.catid}-->&page=<!--{$page}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=giftcat&a=del&id[]=<!--{$volist.catid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="5"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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

<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=giftcat&a=add">添加礼物分类</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=giftcat" class="btn-general"><span>返回列表</span></a>添加礼物分类</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=giftcat" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>分类名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<input type="text" name="catname" id="catname" class="input-200" />  <span id='dcatname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span>编辑礼物分类</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=giftcat&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑礼物分类</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=giftcat&page=<!--{$page}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>分类名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<input type="text" name="catname" id="catname" class="input-200" value="<!--{$giftcat.catname}-->" />  <span id='dcatname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<!--{$giftcat.orders}-->" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
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
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "catname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("分类名称不能为空", t);
		return false;
	}

	return true;
}
</script>
