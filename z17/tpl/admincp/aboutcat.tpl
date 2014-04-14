<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>单页分类</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=aboutcat">单页分类</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=aboutcat&a=add" class="btn-general"><span>添加分类</span></a>单页分类</h3>
	<form action="<!--{$cpfile}-->?c=aboutcat&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择</div></th>
		<th width="20%"><div class="th-gap">分类名称</div></th>
		<th width="10%"><div class="th-gap">图标</div></th>
		<th width="10%"><div class="th-gap">CSS样式</div></th>
		<th width="10%"><div class="th-gap">排序</div></th>
		<th width="10%"><div class="th-gap">单页</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $aboutcat as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.catid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.catid}--></td>
		<td><!--{$volist.catname}--></td>
		<td align="center"><!--{if empty($volist.img)}--><font color="#999999">无图标</font><!--{else}--><font color="green">有图标</font><!--{/if}--></td>
		<td align="center"><!--{$volist.cssname}--></td>
		<td align="center"><!--{$volist.orders}--></td>
		<td align="center"><!--{$volist.aboutcount}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=aboutcat&a=edit&id=<!--{$volist.catid}-->&page=<!--{$page}-->" class="icon-set">设置</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=aboutcat&a=del&id[]=<!--{$volist.catid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=aboutcat&a=add">添加单页分类</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=aboutcat" class="btn-general"><span>返回列表</span></a>添加单页分类</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=aboutcat" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>分类名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<input type="text" name="catname" id="catname" class="input-200" />  <span id='dcatname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'>
		<select name="target" id="target">
		<option value="1">本页面</option>
		<option value="2">新页面</option>
		</select>
		<span id='dtarget' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>CSS样式 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="cssname" id="cssname" class="input-100" />  <span id='dcssname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>分图标类 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="img" id="img" class="input-txt"  /> <span id="dimg"></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=article&uploadinput=img&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>简 介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" class="input-txt" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dmetadescription' class='f_red'></span> </td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页管理<span>&gt;&gt;</span>编辑单页分类</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=aboutcat&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑单页分类</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=aboutcat&page=<!--{$page}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>分类名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<input type="text" name="catname" id="catname" class="input-200" value="<!--{$aboutcat.catname}-->" />  <span id='dcatname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<!--{$aboutcat.orders}-->" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'>
		<select name="target" id="target">
		<option value="1"<!--{if $aboutcat.target=='1'}--> selected<!--{/if}-->>本页面</option>
		<option value="2"<!--{if $aboutcat.target=='2'}--> selected<!--{/if}-->>新页面</option>
		</select>
		<span id='dtarget' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>CSS样式 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="cssname" id="cssname" class="input-100" value="<!--{$aboutcat.cssname}-->" />  <span id='dcssname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>分图标类 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="img" id="img" class="input-txt" value="<!--{$aboutcat.img}-->" /> 
			  <span id="dimg"></span>
			  </td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=article&uploadinput=img&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>简 介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"><!--{$aboutcat.intro}--></textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" class="input-txt" value="<!--{$aboutcat.metakeyword}-->" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"><!--{$aboutcat.metadescription}--></textarea>  <span id='dmetadescription' class='f_red'></span> </td>
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
