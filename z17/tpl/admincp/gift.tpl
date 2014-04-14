<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>礼物信息</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=gift">礼物信息</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=gift&a=add" class="btn-general"><span>添加礼物</span></a>礼物信息</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=gift" />
	  <div class="item">
	    <label>所属分类&nbsp;&nbsp;</label><!--{$category_select}-->&nbsp;&nbsp;
		<label>礼物名称&nbsp;&nbsp;</label><input type="text" id="sname" name="sname" size="20" class="input-150" value="<!--{$sname}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=gift&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="12%"><div class="th-gap">所属分类</div></th>
		<th width="15%"><div class="th-gap">礼物名称</div></th>
		<th width="15%"><div class="th-gap">礼物图片</div></th>
		<th width="10%"><div class="th-gap">所需积分</div></th>
		<th width="7%"><div class="th-gap">状态</div></th>
		<th width="7%"><div class="th-gap">推荐</div></th>
		<th width="11%"><div class="th-gap">添加日期</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $gift as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.giftid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.giftid}--></td>
		<td align="center"><!--{$volist.catname}--></td>
		<td align="left"><!--{$volist.giftname}--></td>
		<td align="center"><img src="<!--{$urlpath}--><!--{$volist.imgurl}-->" /></td>
		<td align="center"><!--{$volist.points}--></td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.giftid}-->" value="flagopen" />
			<img id="flag<!--{$volist.giftid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.giftid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.giftid}-->" value="flagclose" />
			<img id="flag<!--{$volist.giftid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.giftid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.elite==0}-->
			<input type="hidden" id="attr_elite<!--{$volist.giftid}-->" value="eliteopen" />
			<img id="elite<!--{$volist.giftid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.giftid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_elite<!--{$volist.giftid}-->" value="eliteclose" />
			<img id="elite<!--{$volist.giftid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.giftid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center" title="<!--{$volist.timeline|date_format:"%H:%M:%S"}-->"><!--{$volist.timeline|date_format:"%Y-%m-%d"}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=gift&a=edit&id=<!--{$volist.giftid}-->&<!--{$urlitem}-->" class="icon-set">设置</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=gift&a=del&id[]=<!--{$volist.giftid}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
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

<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=gift&a=add">添加礼物</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=gift" class="btn-general"><span>返回列表</span></a>添加礼物</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=gift" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><!--{$category_select}--> <span id='dcatid' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="giftname" id="giftname" class="input-200" />  <span id='dgiftname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物图片 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="imgurl" id="imgurl" class="input-txt"  /> <span id="dimgurl"></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=gift&uploadinput=imgurl&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片预览 <span class="f_red"></span> </td>
		<td class='hback'><span id="previewsrc"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>状 态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />开启，<input type="radio" name="flag" id="flag" value="0" />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>推 荐 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="elite" id="elite" value="1" />开启，<input type="radio" name="elite" id="elite" value="0" checked />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>所需积分 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="points" id="points" class="input-100" /> <font color="#999999">(不填写表示免费)</font>  <span id='dpoints' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠 言 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dintro' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span>编辑礼物</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=gift&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑礼物</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=gift&<!--{$comeurl}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><!--{$category_select}--> <span id='dcatid' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="giftname" id="giftname" class="input-200" value="<!--{$gift.giftname}-->" />  <span id='dgiftname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物图片 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="imgurl" id="imgurl" class="input-txt" value="<!--{$gift.imgurl}-->" /> <span id="dimgurl"></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=gift&uploadinput=imgurl&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片预览 <span class="f_red"></span> </td>
		<td class='hback'><span id="previewsrc">
		<!--{if !empty($gift.imgurl)}-->
		<img src="<!--{$urlpath}--><!--{$gift.imgurl}-->" width="60px" height="60px" border="0" />
		<!--{/if}-->
		</span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>状 态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $gift.flag=='1'}--> checked<!--{/if}--> />开启，<input type="radio" name="flag" id="flag" value="0"<!--{if $gift.flag=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>推 荐 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="elite" id="elite" value="1"<!--{if $gift.elite=='1'}--> checked<!--{/if}--> />开启，<input type="radio" name="elite" id="elite" value="0"<!--{if $gift.elite=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>所需积分 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="points" id="points" class="input-100" value="<!--{$gift.points}-->" /> <font color="#999999">(不填写表示免费)</font>  <span id='dpoints' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠 言 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"><!--{$gift.intro}--></textarea>  <span id='dintro' class='f_red'></span></td>
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
		dmsg("请选择所属分类", t);
		return false;
	}

	t = "giftname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("礼物名称不能为空", t);
		return false;
	}

	t = "imgurl";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("礼物图片不能为空", t);
		return false;
	}

	return true;
}
</script>
