<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>自定义HTML标签</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=htmllabel">自定义HTML标签</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=htmllabel&a=add" class="btn-general"><span>添加标签</span></a>自定义HTML标签</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
	<form action="<!--{$cpfile}-->?c=htmllabel&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="12%"><div class="th-gap">描述</div></th>
		<th width="12%"><div class="th-gap">标签名</div></th>
		<th width="25%"><div class="th-gap">调用标签</div></th>
		<th width="8%"><div class="th-gap">所属风格</div></th>
		<th width="8%"><div class="th-gap">状态</div></th>
		<th width="15%"><div class="th-gap">录入时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $htmllabel as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center">
		<!--{if $volist.issystem=='0'}-->
		<input name="id[]" type="checkbox" value="<!--{$volist.labelid}-->" onClick="checkItem(this, 'chkAll')">
		<!--{else}-->
		<input type='checkbox' disabled />
		<!--{/if}-->
		</td>
		<td align="left"><!--{$volist.description}--></td>
		<td align="center"><!--{$volist.labelname}--></td>
		<td align="left">&lt;!--{label name='<!--{$volist.labelname}-->'}--&gt;</td>
		<td align='center'><!--{$volist.templet}--></td>
		
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.labelid}-->" value="flagopen" />
			<img id="flag<!--{$volist.labelid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.labelid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.labelid}-->" value="flagclose" />
			<img id="flag<!--{$volist.labelid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.labelid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td title="<!--{$volist.timeline|date_format:"%H:%M:%S"}-->"><!--{$volist.timeline|date_format:"%Y/%m/%d"}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=htmllabel&a=edit&id=<!--{$volist.labelid}-->&page=<!--{$page}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;
		<!--{if $volist.issystem=='0'}-->
		<a href="<!--{$cpfile}-->?c=htmllabel&a=del&id[]=<!--{$volist.labelid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a>
		<!--{/if}-->
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
		<td class="hback" colspan="7"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定删除选定信息吗!?')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=htmllabel&a=add">添加HTML标签</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=htmllabel" class="btn-general"><span>返回列表</span></a>添加HTML标签</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=htmllabel" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>标签名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="labelname" id="labelname" class="input-txt" /> <span id='dlabelname' class='f_red'></span> (标签名只能字母、下横线、中横线、数字组成)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>标签描述 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="description" id="description" class="input-txt" />  <span id='ddescription' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>状态设置 </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />正常，<input type="radio" name="flag" id="flag" value="0" />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_1'>标签内容</td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <br />1、支持config标签，调用config标签时不需要使用起始符“&lt!--”和结束符“--&gt;”<br />
		           如：调用网站名称只需在内容里填写  {$config.sitetitle}<br />
		        2、支持{$skinpath}、{$urlpath}标签。
		</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑HTML标签</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=htmllabel&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑HTML标签</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=htmllabel&page=<!--{$page}-->" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>标签名称 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><!--{$htmllabel.labelname}--> (不可更改)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>标签描述 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="description" id="description" class="input-txt" value="<!--{$htmllabel.description}-->" />  <span id='ddescription' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>状态设置 </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $htmllabel.flag=='1'}--> checked<!--{/if}--> />正常，<input type="radio" name="flag" id="flag" value="0"<!--{if $htmllabel.flag=='0'}--> checked<!--{/if}--> />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_1'>标签内容</td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"><!--{$htmllabel.content}--></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <br />1、支持config标签，调用config标签时不需要使用起始符“&lt!--”和结束符“--&gt;”<br />
		           如：调用网站名称只需在内容里填写  {$config.sitetitle}<br />
		        2、支持{$skinpath}、{$urlpath}标签。
		</td>
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

	t = "labelname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("标签名称不能为空", t);
		return false;
	}
	t = "description";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("标签描述不能为空", t);
		return false;
	}
	return true;
}
</script>
