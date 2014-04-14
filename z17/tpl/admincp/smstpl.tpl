<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>营销推广</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{if $a != 'search'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{/if}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=smstpl">短信模板设置</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=smstpl&a=add" class="btn-general"><span>添加短信模板</span></a>短信模板设置</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="10%"><div class="th-gap">ID</div></th>
		<th width="10%"><div class="th-gap">短信类别</div></th>
		<th><div class="th-gap">短信内容</div></th>
		<th width="15%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $smstpl as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
		<td align="center"><!--{$volist.tplid}--></td>
		<td align="center"><!--{$volist.tplsort}--></td>
		<td align="left"><!--{$volist.content}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=smstpl&a=edit&id=<!--{$volist.tplid}-->&page=<!--{$page}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;
		<!--{if $volist.tplsort == 'other'}-->
		<a href="<!--{$cpfile}-->?c=smstpl&a=del&id[]=<!--{$volist.tplid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a>
		<!--{else}-->
		<font color="#999999">删除</font>
		<!--{/if}-->

		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="4" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	</table>
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
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=smstpl&a=add">添加短信模板</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=smstpl" class="btn-general"><span>返回列表</span></a>添加短信模板</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=smstpl" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1' width='18%'>短信内容：<span class="f_red">*</span> </td>
		<td class='hback' width='82%'>
		  <textarea name="content" id="content" style="width:40%;height:80px;overflow:hidden;" onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"></textarea>
		  <span id='dcontent' class='f_red'></span>		  
		  <br /><font color='#999999'>(温馨提示，短信内容最多不能超过70个字。)</font>
		  已经输入<span id="counter">0</span>字
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>备注说明：</td>
		<td><textarea name='remark' id='remark' style="width:40%;height:60px;overflow:hidden;"></textarea> <span id='dremark' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>短信营销<span>&gt;&gt;</span>编辑短信模板</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=smstpl&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑短信模板</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=smstpl&page=<!--{$page}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr id="mod_content" style="display:;">
		<td class='hback_1' width='18%'>短信内容：<span class="f_red">*</span> </td>
		<td class='hback' width='82%'>
		  <textarea name="content" id="content" style="width:40%;height:80px;overflow:hidden;" onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"><!--{$smstpl.content}--></textarea>
		  <span id='dcontent' class='f_red'></span>		  
		  <br /><font color='#999999'>(温馨提示，短信内容最多不能超过70个字。)</font>
		  已经输入<span id="counter">0</span>字
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>备注说明：</td>
		<td><textarea name='remark' id='remark' style="width:40%;height:60px;overflow:hidden;"><!--{$smstpl.remark}--></textarea> <span id='dremark' class='f_red'></span></td>
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

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("短信内容不能为空", t);
		return false;
	}

	return true;
}

</script>
