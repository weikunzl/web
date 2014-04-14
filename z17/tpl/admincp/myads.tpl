<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>广告管理</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=myads">广告管理</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=myads&a=add" class="btn-general"><span>添加广告</span></a>广告管理</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=myads" />
	  <div class="item">
	    当前使用风格：<!--{$config.templet}-->&nbsp;&nbsp;&nbsp;
	    <label>广告版位：</label><!--{$zone_select}-->&nbsp;&nbsp;
		<label>广告名称：</label><input type="text" id="sname" name="sname" class="input-100" value="<!--{$sname}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=myads&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">所在版位</div></th>
		<th width="13%"><div class="th-gap">广告名称</div></th>
		<th width="13%"><div class="th-gap">广告标识</div></th>
		<th width="15%"><div class="th-gap">类型/大小</div></th>
		<th width="8%"><div class="th-gap">所属风格</div></th>
		<th width="7%"><div class="th-gap">排序</div></th>
		<th width="7%"><div class="th-gap">状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $myads as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.aid}-->" onClick="checkItem(this, 'chkAll')"></td>
		<td align="left"><!--{$volist.zonename}--></td>
		<td align="left"><!--{$volist.adname}--></td>
		<td align="left"><!--{$volist.tagname}--></td>
		<td align="center"><!--{$volist.normbody.type}--> (<!--{$volist.normbody.width}-->*<!--{$volist.normbody.height}-->px)</td>
		<td align="center"><!--{$volist.templet}--></td>
		<td align="center"><!--{$volist.orders}--></td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.aid}-->" value="flagopen" />
			<img id="flag<!--{$volist.aid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.aid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.aid}-->" value="flagclose" />
			<img id="flag<!--{$volist.aid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.aid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td align="center"><a href="<!--{$cpfile}-->?c=myads&a=edit&id=<!--{$volist.aid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=myads&a=del&id[]=<!--{$volist.aid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="9" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=myads&a=add">添加广告</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=myads" class="btn-general"><span>返回列表</span></a>添加广告</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=myads" onsubmit='return checkform();' />
	<input type='hidden' name='a' id='a' value='saveadd' />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">所在广告版位 <span class='f_red'></span></td>
		<td class='hback' width="85%"><!--{$zone_select}--> <span id="dzoneid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="adname" id="adname" class="input-txt" /> <span id='dadname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告标识 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="tagname" id="tagname" class="input-txt" /> <span id='dtagname' class='f_red'></span> （只能有字母、数字，下横线，中横线组成）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告链接地址 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="url" id="url" class="input-txt" /> <span id='durl' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接打开方式 <span class="f_red"></span> </td>
		<td class='hback'><select name="target" id="target"><option value="1">本页面</option><option value="2">新页面</option></select> <span id='dtarget' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" /> <span id='dorders' class='f_red'></span> （同一个版位有效，数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />正常，<input type="radio" name="flag" id="flag" value="0" />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan='2' align='center'><b>广告内容</b> <span class="f_red"></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告类型 </td>
		<td class='hback'><input type="radio" name="type" id="type" value='picture' checked />图片，<input type="radio" name="type" id="type" value='flash' />Flash</td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片/Flash地址 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告宽  <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="width" id="width" class="input-s" value="" />像素  <span id='dwidth' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告高 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="height" id="height" class="input-s" value="" />像素  <span id='dheight' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>标题描述 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" value="" />  <span id='dtitle' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑广告</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=myads&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑广告图片</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<!--{$config.templet}--></div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=myads&<!--{$comeurl}-->" onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1'>广告标识 <span class="f_red">*</span> </td>
		<td class='hback'><!--{$myads.tagname}--> （不能更改）</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="15%">所在广告版位 <span class='f_red'></span></td>
		<td class='hback' width="85%"><!--{$zone_select}--> <span id="dzoneid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="adname" id="adname" class="input-txt" value="<!--{$myads.adname}-->" /> <span id='dadname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告链接地址 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="url" id="url" class="input-txt" value="<!--{$myads.url}-->" /> <span id='durl' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接打开方式 <span class="f_red"></span> </td>
		<td class='hback'><select name="target" id="target"><option value="1"<!--{if $myads.target=='1'}--> selected<!--{/if}-->>本页面</option><option value="2"<!--{if $myads.target=='2'}--> selected<!--{/if}-->>新页面</option></select> <span id='dtarget' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<!--{$myads.orders}-->" /> <span id='dorders' class='f_red'></span> （同一个版位有效，数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $myads.flag==1}--> checked<!--{/if}--> />正常，<input type="radio" name="flag" id="flag" value="0"<!--{if $myads.flag==0}--> checked<!--{/if}--> />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan='2' align='center'><b>广告内容</b> <span class="f_red"></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告类型 </td>
		<td class='hback'><input type="radio" name="type" id="type" value='picture'<!--{if $myads.normbody.type=='picture'}--> checked<!--{/if}--> />图片，<input type="radio" name="type" id="type" value='flash'<!--{if $myads.normbody.type=='flash'}--> checked<!--{/if}--> />Flash</td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片/Flash地址 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt" value="<!--{$myads.normbody.uploadfiles}-->" /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告宽  <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="width" id="width" class="input-s" value="<!--{$myads.normbody.width}-->" />像素  <span id='dwidth' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告高 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="height" id="height" class="input-s" value="<!--{$myads.normbody.height}-->" />像素  <span id='dheight' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>标题描述 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" value="<!--{$myads.normbody.title}-->" />  <span id='dtitle' class='f_red'></span></td>
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

	t = "adname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("广告名称不能为空", t);
		return false;
	}
	t = "tagname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("广告标识不能为空", t);
		return false;
	}

	t = "uploadfiles";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("图片/Flash地址不能为空", t);
		return false;
	}
	return true;
}

function checkedit() {
	var t = "";
	var v = "";

	t = "adname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("广告名称不能为空", t);
		return false;
	}

	t = "uploadfiles";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("图片/Flash地址不能为空", t);
		return false;
	}
	return true;
}
</script>