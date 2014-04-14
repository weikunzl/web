<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>户籍地区设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=hometown">户籍地区设置</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=hometown&a=add" class="btn-general"><span>添加户籍</span></a>户籍地区设置</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID编号</div></th>
		<th width="40%"><div class="th-gap">地区名称</div></th>
		<th width="15%"><div class="th-gap">扩展名</div></th>
		<th width="10%"><div class="th-gap">排序</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $area as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.areaid}--></td>
		<td><!--{$volist.tree_node}--></td>
		<td><!--{$volist.spreadname}--></td>
		<td align="center"><!--{$volist.orders}--></td>
		<td align="center">
		
		<!--{if $volist.depth==0}-->
		<a href="<!--{$cpfile}-->?c=hometown&a=add&rootid=<!--{$volist.areaid}-->" class="icon-add">添加子地区</a>
		<!--{/if}-->
		&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=hometown&a=edit&id=<!--{$volist.areaid}-->&page=<!--{$page}-->" class="icon-set">设置</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=hometown&a=del&id=<!--{$volist.areaid}-->" onClick="{if(confirm('确定要删除吗？连同子地区一起删除。')){return true;} return false;}" class="icon-del">删除</a>
		
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="5" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	</table>
	<!--{if $total>1}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='left'>总记录：<!--{$total}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->

<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->&c=hometown&a=add">添加户籍地区</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=hometown" class="btn-general"><span>返回列表</span></a>添加户籍地区</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=hometown" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">地区名称：<span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="areaname" id="areaname" class="input-txt" /> <span class='f_red' id="dareaname"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>扩展名称：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="spreadname" id="spreadname" class="input-100"  /> <span class='f_red' id="dspreadname"></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属节点：<span class='f_red'></span></td>
		<td class='hback'><!--{$area_root}--> <span class='f_red' id="drootid"></span> （不选择默认为根节点，最多支持二级地区）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-100"  /> <span class='f_red' id="dorders"></span> (同级排序，数字越小，越靠前)</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑户籍地区</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=hometown" class="btn-general"><span>返回列表</span></a>编辑户籍地区</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=hometown" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">地区名称：<span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="areaname" id="areaname" class="input-txt" value="<!--{$area.areaname}-->" /> <span class='f_red' id="dareaname"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>扩展名称：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="spreadname" id="spreadname" class="input-100" value="<!--{$area.spreadname}-->"  /> <span class='f_red' id="dspreadname"></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属节点：<span class='f_red'></span></td>
		<td class='hback'><!--{$area_root}--> <span class='f_red' id="drootid"></span> （不选择默认为根节点，最多支持二级地区）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-100" value="<!--{$area.orders}-->"  /> <span class='f_red' id="dorders"></span>(数字越小，越靠前)</td>
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

	t = "areaname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("地区名称不能为空", t);
		return false;
	}
	return true;
}
</script>
