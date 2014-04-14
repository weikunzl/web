<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>交友类型</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=lovesort">交友类型</a></p></div>
  <div class="main-cont">

	<h3 class="title">添加交友类型</h3>
	<form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=lovesort&a=saveadd" onsubmit="return checkform();" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' align="center">类型名称 <span class='f_red'>*</span></td>
		<td class='hback_1' align="center">排序 <span class='f_red'></span></td>
		<td class='hback_1' align='center'>保存</td>
	  </tr>
	  <tr>
		<td class='hback' align="center">
		<input type='text' name='sortname' id='sortname' class='input-150' />
		<span class='f_red' id="dsortname"></span>
		</td>
		<td class='hback' align="center">
		<input type='text' name='orders' id='orders' class='input-100' />
		<span class='f_red' id="dorders"></span>
		</td>
		<td class='hback' align='center'><input type="submit" name="btn_save" class='button' value="添加保存" /></td>
	  </tr>
	</table>
	</form>

    <h3 class="title">交友类型</h3>
	<form action="<!--{$cpfile}-->?c=lovesort&a=saveedit" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择ID</div></th>
		<th width="30%"><div class="th-gap">类型名称</div></th>
		<th width="25%"><div class="th-gap">排序</div></th>
		<th width="12%"><div class="th-gap">删除</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $lovesort as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.sortid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.sortid}--></td>
		<td align="left"><input type="text" name="sortname_<!--{$volist.sortid}-->" id="sortname_<!--{$volist.sortid}-->" value="<!--{$volist.sortname}-->" class="input-100" /></td>
		<td align="left"><input type="text" name="orders_<!--{$volist.sortid}-->" id="orders_<!--{$volist.sortid}-->" value="<!--{$volist.orders}-->" class="input-100" /></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=lovesort&a=del&id[]=<!--{$volist.sortid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="4" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="3"><input class="button" name="btn_del" type="submit" value=" 更 新 " class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "sortname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("类型名称不能为空", t);
		return false;
	}

	return true;
}
</script>
