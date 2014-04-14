<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>财务参数设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：业务管理<span>&gt;&gt;</span>财务管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=paramter">财务参数</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=paramter&a=add" class="btn-general"><span>添加参数</span></a>财务参数</h3>

	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=paramter&stype=<!--{$stype}-->" />
	  <div class="item">
	    <label>参数类型：</label>
		<select name='stype' id='stype'>
		<option value=''>全部类型</option>
		<option value="in"<!--{if $stype=='in'}--> selected<!--{/if}-->>收入种类</option>
		<option value="out"<!--{if $stype=='out'}--> selected<!--{/if}-->>支出种类</option>
		<option value="money"<!--{if $stype=='money'}--> selected<!--{/if}-->>款项类别</option>
		<option value="token"<!--{if $stype=='token'}--> selected<!--{/if}-->>凭证类别</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>

	<form action="<!--{$cpfile}-->?c=paramter&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">排序</div></th>
		<th width="20%"><div class="th-gap">参数类型</div></th>
		<th><div class="th-gap">参数名称</div></th>
		<th width="15%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $paramter as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.paramid}-->" onClick="checkItem(this, 'chkAll')"></td>
		<td align="center"><!--{$volist.orders}--></td>
		<td align="center">
		<!--{if $volist.paramtype=='in'}-->
		<font color='#008000'>收入种类</font>
		<!--{elseif $volist.paramtype=='out'}-->
		<font color='#ff0000'>支出种类</font>
		<!--{elseif $volist.paramtype=='money'}-->
		<font color='#008080'>款项类别</font>
		<!--{elseif $volist.paramtype=='token'}-->
		<font color='#0000ff'>凭证类别</font>
		<!--{/if}-->
		</td>
		<td align="left"><!--{$volist.paramvalue}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=paramter&a=edit&id=<!--{$volist.paramid}-->&page=<!--{$page}-->" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=paramter&a=del&id[]=<!--{$volist.paramid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="5" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="4"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
  <div class="path"><p>当前位置：业务管理<span>&gt;&gt;</span>财务管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=paramter&a=add">添加财务参数</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=paramter" class="btn-general"><span>返回列表</span></a>添加财务参数</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=paramter" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>参数类型 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<select name="paramtype" id="paramtype">
		<option value=''></option>
		<option value='in'>收入种类</option>
		<option value='out'>支出种类</option>
		<option value='money'>款项类别</option>
		<option value='token'>凭证类别</option>
		</select>
		<span id='dparamtype' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="paramvalue" id="paramvalue" class="input-150" />  <span id='dparamvalue' class='f_red'></span> 排序：</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
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
  <div class="path"><p>当前位置：业务管理<span>&gt;&gt;</span>财务管理<span>&gt;&gt;</span>编辑财务参数</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=paramter&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑财务参数</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=paramter&page=<!--{$page}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>参数类型 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<select name="paramtype" id="paramtype">
		<option value=''></option>
		<option value='in'<!--{if $paramter.paramtype=='in'}--> selected<!--{/if}-->>收入种类</option>
		<option value='out'<!--{if $paramter.paramtype=='out'}--> selected<!--{/if}-->>支出种类</option>
		<option value='money'<!--{if $paramter.paramtype=='money'}--> selected<!--{/if}-->>款项类别</option>
		<option value='token'<!--{if $paramter.paramtype=='token'}--> selected<!--{/if}-->>凭证类别</option>
		</select>
		<span id='dparamtype' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="paramvalue" id="paramvalue" class="input-150" value="<!--{$paramter.paramvalue}-->" />  <span id='dparamvalue' class='f_red'></span> 排序：</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<!--{$paramter.orders}-->" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
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

	t = "paramtype";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择参数类型", t);
		return false;
	}

	t = "paramvalue";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("参数名称不能为空", t);
		return false;
	}

	return true;
}
</script>
