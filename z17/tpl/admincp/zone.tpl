<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>设置广告版位</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=zone">广告版位</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=zone&a=add" class="btn-general"><span>添加版位</span></a>广告版位</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
	<form action="<!--{$cpfile}-->?c=zone&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">版位名称</div></th>
		<th width="20%"><div class="th-gap">版位标识</div></th>
		<th width="8%"><div class="th-gap">所属风格</div></th>
		<th width="8%"><div class="th-gap">类型</div></th>
		<th width="12%"><div class="th-gap">大小</div></th>
		<th width="8%"><div class="th-gap">广告数</div></th>
		<th width="7%"><div class="th-gap">状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $zone as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.zoneid}-->" onClick="checkItem(this, 'chkAll')"></td>
		<td><!--{$volist.zonename}--></td>
		<td align="center"><!--{$volist.idmark}--></td>
		<td align="center"><!--{$volist.templet}--></td>
		<td align="center"><!--{$volist.sort}--></td>
		<td align="center"><!--{$volist.zonewidth}-->x<!--{$volist.zoneheight}-->(px)</td>
		<td align="center"><!--{$volist.adscount}--></td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.zoneid}-->" value="flagopen" />
			<img id="flag<!--{$volist.zoneid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.zoneid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.zoneid}-->" value="flagclose" />
			<img id="flag<!--{$volist.zoneid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.zoneid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=zone&a=edit&id=<!--{$volist.zoneid}-->&page=<!--{$page}-->" class="icon-set">设置</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=zone&a=del&id[]=<!--{$volist.zoneid}-->" onClick="{if(confirm('确定要删除该信息？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="9" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除选定信息？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=zone&a=add">添加广告版位</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=zone" class="btn-general"><span>返回列表</span></a>添加广告版位</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=zone" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">版位名称：<span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="zonename" id="zonename" class="input-txt" /> <span class='f_red' id="dzonename"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>版位标识：<span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="idmark" id="idmark" class="input-txt" /> <span class='f_red' id="didmark"></span> （只能字母，数字，下横线，中横线组成）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>版位类型：<span class='f_red'>*</span></td>
		<td class='hback'>
		<select name="sort" id="sort">
		<option value=''>请选择</option>
		<option value='slide'>幻灯片</option>
		<option value='flash'>Flash</option>
		<option value='picture'>单张图片</option>
		</select>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位宽：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zonewidth" id="zonewidth" class="input-s" /> 像素(px) <span class='f_red' id="dzonewidth"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位高：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zoneheight" id="zoneheight" class="input-s" /> 像素(px) <span class='f_red' id="dzoneheight"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态：<span class='f_red'></span></td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked /> 正常，<input type="radio" name="flag" id="flag" value="0" /> 锁定</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑广告版位</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=zone&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑广告版位</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=zone&page=<!--{$page}-->" onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1'>版位标识：<span class='f_red'></span></td>
		<td class='hback'><!--{$zone.idmark}--> （不能修改）</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="15%">版位名称：<span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="zonename" id="zonename" class="input-txt" value="<!--{$zone.zonename|stripslashes}-->" /> <span class='f_red' id="dzonename"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>版位类型：<span class='f_red'>*</span></td>
		<td class='hback'>
		<select name="sort" id="sort">
		<option value=''>请选择</option>
		<option value='slide'<!--{if $zone.sort=='slide'}--> selected<!--{/if}-->>幻灯片</option>
		<option value='flash'<!--{if $zone.sort=='flash'}--> selected<!--{/if}-->>Flash</option>
		<option value='picture'<!--{if $zone.sort=='picture'}--> selected<!--{/if}-->>单张图片</option>
		</select>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位宽：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zonewidth" id="zonewidth" class="input-s" value="<!--{$zone.zonewidth}-->" /> 像素(px) <span class='f_red' id="dzonewidth"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位高：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zoneheight" id="zoneheight" class="input-s" value="<!--{$zone.zoneheight}-->" /> 像素(px) <span class='f_red' id="dzoneheight"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态：<span class='f_red'></span></td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $zone.flag=='1'}--> checked<!--{/if}--> /> 正常，<input type="radio" name="flag" id="flag" value="0"<!--{if $zone.flag=='0'}--> checked<!--{/if}--> /> 锁定</td>
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

	t = "zonename";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位名称不能为空", t);
		return false;
	}

	t = "idmark";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位标识不能为空", t);
		return false;
	}

	t = "sort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位类型不能为空", t);
		return false;
	}

	return true;
}

function checkedit() {
	var t = "";
	var v = "";

	t = "zonename";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位名称不能为空", t);
		return false;
	}

	t = "sort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位类型不能为空", t);
		return false;
	}

	return true;
}
</script>
