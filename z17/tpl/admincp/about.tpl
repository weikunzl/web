<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>单页内容</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq 'run'}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=about">单页列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=about&a=add" class="btn-general"><span>添加单页</span></a>单页列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=about" />
	  <div class="item">
	    <label>分类&nbsp;</label><!--{$category_select}-->&nbsp;&nbsp;
		<label>名称&nbsp;</label><input type="text" id="stitle" name="stitle" class="input-100" value="<!--{$stitle}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=about&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="12%"><div class="th-gap">所属分类</div></th>
		<th width="15%"><div class="th-gap">单页名称</div></th>
		<th width="8%"><div class="th-gap">排序</div></th>
		<th width="10%"><div class="th-gap">打开方式</div></th>
		<th width="10%"><div class="th-gap">链接类型</div></th>
		<th width="15%"><div class="th-gap">站外URL</div></th>
		<th width="10%"><div class="th-gap">导航显示</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $about as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.abid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.abid}--></td>
		<td align="center"><!--{$volist.catname}--></td>
		<td align="left"><a href="../index.php?c=about&a=detail&id=<!--{$volist.abid}-->" target="_blank"><!--{$volist.title}--></a></td>
		<td align="center"><!--{$volist.orders}--></td>
		<td align="center">
		<!--{if $volist.target=='1'}--><font color="green">本页面</font><!--{else}--><font color='blue'>新页面</font><!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.linktype=='1'}--><font color="green">站内</font><!--{else}--><font color='blue'>站外</font><!--{/if}-->
		</td>
		<td align="left"><!--{$volist.linkurl}--></td>
		<td align="center">
		<!--{if $volist.navshow==0}-->
			<input type="hidden" id="attr_navshow<!--{$volist.abid}-->" value="navshowopen" />
			<img id="navshow<!--{$volist.abid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('navshow','<!--{$volist.abid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_navshow<!--{$volist.abid}-->" value="navshowclose" />
			<img id="navshow<!--{$volist.abid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('navshow','<!--{$volist.abid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center"><a href="<!--{$cpfile}-->?c=about&a=edit&id=<!--{$volist.abid}-->&<!--{$urlitem}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=about&a=del&id[]=<!--{$volist.abid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页内容<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=about&a=add">添加单页</a></p></div>
  <div class="main-cont">
	<h3 class="title">添加单页</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=about" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><!--{$category_select}-->  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>单页标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" class="input-txt" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" /> <span id='dorders' class='f_red'></span><font color='#999999'> (数字越小越靠前 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>导航显示 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='navshow' id='navshow' value='1' />是，<input type='radio' name='navshow' id='navshow' value='2' checked />否<span id='dnavshow' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页简介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页图片 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"   /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=article&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>	
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页内容</td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan="2">SEO优化设置 </td>
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
		<td class='hback_yellow' colspan="2">个性化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='linktype' id='linktype' value='1' checked />站内，<input type='radio' name='linktype' id='linktype' value='2' />站外</td>
	  </tr>
	  <tr>
		<td class='hback_1'>站外URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="linkurl" id="linkurl" class="input-txt" />  <span id='dlinkurl' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='target' id='target' value='1' checked />本页，<input type='radio' name='target' id='target' value='2' />新页</td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页内容<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=about&a=edit&catid=<!--{$catid}-->&id=<!--{$id}-->">编辑单页</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=about&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑单页</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=about" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><!--{$category_select}-->  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>单页标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" value="<!--{$about.title}-->" class="input-txt" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<!--{$about.orders}-->" /> <span id='dorders' class='f_red'></span><font color='#999999'> (数字越小越靠前 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>导航显示 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='navshow' id='navshow' value='1'<!--{if $about.navshow=='1'}--> checked<!--{/if}--> />是，<input type='radio' name='navshow' id='navshow' value='2'<!--{if $about.navshow=='2'}--> checked<!--{/if}--> />否<span id='dnavshow' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页简介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"><!--{$about.intro}--></textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页图片 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt" value="<!--{$about.uploadfiles}-->"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=article&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>	
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页内容</td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"><!--{$about.content}--></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan="2">SEO优化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" value="<!--{$about.metakeyword}-->" class="input-txt" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"><!--{$about.metadescription}--></textarea>  <span id='dmetadescription' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan="2">个性化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='linktype' id='linktype' value='1'<!--{if $about.linktype=='1'}--> checked<!--{/if}--> />站内，<input type='radio' name='linktype' id='linktype' value='2'<!--{if $about.linktype=='2'}--> checked<!--{/if}--> />站外</td>
	  </tr>
	  <tr>
		<td class='hback_1'>站外URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="linkurl" id="linkurl" value="<!--{$about.linkurl}-->" class="input-txt" />  <span id='dlinkurl' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='target' id='target' value='1'<!--{if $about.target=='1'}--> checked<!--{/if}--> />本页，<input type='radio' name='target' id='target' value='2'<!--{if $about.target=='2'}--> checked<!--{/if}--> />新页</td>
	  </tr>
	  <tr>
		<td class='hback_1'>指定模板文件 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="tplname" id="tplname" value="<!--{$about.tplname}-->" class="input-150" />.tpl 
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
	var t = '';
	var v = '';

	t = 'catid';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('请选择所属分类', t);
		return false;
	}

	t = 'title';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('标题不能为空', t);
		return false;
	}
	return true;
}
</script>
