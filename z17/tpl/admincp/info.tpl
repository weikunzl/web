<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>公告内容</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq 'run'}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=info">公告列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=info&a=add" class="btn-general"><span>发布公告</span></a>公告列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=info" />
	  <div class="item">
	    <label>分类&nbsp;</label><!--{$category_select}-->&nbsp;&nbsp;
		<label>标题&nbsp;</label><input type="text" id="stitle" name="stitle" class="input-150" value="<!--{$stitle}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=info&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="13%"><div class="th-gap">分类</div></th>
		<th width="25%"><div class="th-gap">标题</div></th>
		<th width="10%"><div class="th-gap">浏览</div></th>
		<th width="6%"><div class="th-gap">图片</div></th>
		<th width="6%"><div class="th-gap">状态</div></th>
		<th width="6%"><div class="th-gap">推荐</div></th>
		<th width="12%"><div class="th-gap">发布时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $info as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.infoid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.infoid}--></td>
		<td align="center"><!--{$volist.catname}--></td>
		<td align="left"><a href="../index.php?c=info&a=detail&id=<!--{$volist.infoid}-->" target="_blank"><!--{$volist.title}--></a></td>
		<td align="center"><!--{$volist.hits}--></td>
		<td align="center">
		<!--{if !empty($volist.thumbfiles)}-->
		<font color="green">有</font>
		<!--{else}-->
		<font color="#999999">无</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.infoid}-->" value="flagopen" />
			<img id="flag<!--{$volist.infoid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.infoid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.infoid}-->" value="flagclose" />
			<img id="flag<!--{$volist.infoid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.infoid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td align="center">
		<!--{if $volist.elite==0}-->
			<input type="hidden" id="attr_elite<!--{$volist.infoid}-->" value="eliteopen" />
			<img id="elite<!--{$volist.infoid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.infoid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_elite<!--{$volist.infoid}-->" value="eliteclose" />
			<img id="elite<!--{$volist.infoid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.infoid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td align="center" title="<!--{$volist.addtime|date_format:"%Y-%m-%d %H:%M:%S"}-->"><!--{$volist.addtime|date_format:"%Y-%m-%d"}--></td>
		<td align="center"><a href="<!--{$cpfile}-->?c=info&a=edit&id=<!--{$volist.infoid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=info&a=del&id[]=<!--{$volist.infoid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="9" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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


<!--{if $a eq 'add'}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告内容<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=info&a=add">添加公告</a></p></div>
  <div class="main-cont">
	<h3 class="title">添加单页</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=info" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_c1' colspan="2">基本内容 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><!--{$category_select}-->  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>公告标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" class="input-txt" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" /> <font color='#999999'>(自动生成)</font> <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc"></span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>摘要 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="summary" id="summary" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dsummary' class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_1'>公告内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c2' colspan="2">SEO优化设置 </td>
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
		<td class='hback_c3' colspan="2">其他设置 </td>
	  </tr>
	  <tr>
	    <td class='hback_1'>浏览次数 <span class='f_red'></span></td>
		<td><input type='text' name='hits' id='hits' class='input-s' /> <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>推 荐 <span class='f_red'></span></td>
		<td><input type="radio" name="elite" id="elite" value="1" />是，<input type="radio" name="elite" id="elite" value="0" checked />否</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>状 态 <span class='f_red'></span></td>
		<td><input type="radio" name="flag" id="flag" value="1" checked />正常，<input type="radio" name="flag" id="flag" value="0" />锁定</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>发布时间 <span class='f_red'></span></td>
		<td><input type="text" name="addtime" id="addtime" class="input-150" value="<!--{$timeline|date_format:"%Y-%m-%d %H:%M:%S"}-->" /> <span id='daddtime' class='f_red'></span> 当前时间为：<!--{$timeline|date_format:"%Y-%m-%d %H:%M:%S"}--> 注意不要改变格式。</td>
	  </tr>
	  <tr>
		<td class='hback_1'>指定模板文件 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="tplname" id="tplname" class="input-150" />.tpl 
		<span id='dtplname' class='f_red'></span>  &nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_templet('选择模板文件', 'tplname');">选择模板</a> <br /> <font color='#999999'>(模板文件无扩展名，并确保模板文件夹存在，不填写使用默认模板)</font></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告内容<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=info&a=edit&id=<!--{$id}-->">编辑公告</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=info&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑公告</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=info" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_c1' colspan="2">基本内容 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><!--{$category_select}-->  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>公告标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" class="input-txt" value="<!--{$info.title}-->" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt" value="<!--{$info.uploadfiles}-->" /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" value="<!--{$info.thumbfiles}-->" /> <font color='#999999'>(自动生成)</font> <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc"></span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>摘要 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="summary" id="summary" style="width:50%;height:60px;overflow:auto;"><!--{$info.summary}--></textarea>  <span id='dsummary' class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_1'>公告内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"><!--{$info.content}--></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c2' colspan="2">SEO优化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" class="input-txt" value="<!--{$info.metakeyword}-->" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"><!--{$info.metadescription}--></textarea>  <span id='dmetadescription' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_c3' colspan="2">其他设置 </td>
	  </tr>
	  <tr>
	    <td class='hback_1'>浏览次数 <span class='f_red'></span></td>
		<td><input type='text' name='hits' id='hits' class='input-s' value="<!--{$info.hits}-->" /> <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>推 荐 <span class='f_red'></span></td>
		<td><input type="radio" name="elite" id="elite" value="1"<!--{if $info.elite=='1'}--> checked<!--{/if}--> />是，<input type="radio" name="elite" id="elite" value="0"<!--{if $info.elite=='0'}--> checked<!--{/if}--> />否</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>状 态 <span class='f_red'></span></td>
		<td><input type="radio" name="flag" id="flag" value="1"<!--{if $info.flag=='1'}--> checked<!--{/if}--> />正常，<input type="radio" name="flag" id="flag" value="0"<!--{if $info.flag=='0'}--> checked<!--{/if}--> />锁定</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>发布时间 <span class='f_red'></span></td>
		<td><input type="text" name="addtime" id="addtime" class="input-150" value="<!--{$info.addtime|date_format:"%Y-%m-%d %H:%M:%S"}-->" /> <span id='daddtime' class='f_red'></span> <font color="#999999"> 注意不要改变格式。</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>指定模板文件 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="tplname" id="tplname" class="input-150" value="<!--{$info.tplname}-->" />.tpl 
		<span id='dtplname' class='f_red'></span>  &nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_templet('选择模板文件', 'tplname');">选择模板</a> <br /> <font color='#999999'>(模板文件无扩展名，并确保模板文件夹存在，不填写使用默认模板)</font></td>
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

	t = "catid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择分类", t);
		$('#'+t).focus();
		return false;
	}

	t = "title";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "content";
	v = editor.text();
	if(editor.isEmpty()) {
		dmsg("内容不能为空", t);
		editor.focus();
		return false;
	}
	return true;
}

</script>