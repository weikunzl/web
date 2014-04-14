<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>交友参数</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=loveparamter">交友参数</a> </p></div>
  <div class="main-cont">
    <h3 class="title">交友参数</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="10%"><div class="th-gap">参数名</div></th>
		<th><div class="th-gap">参数值</div></th>
		<th width="10%"><div class="th-gap">类型</div></th>
		<th width="10%"><div class="th-gap">描述</div></th>
		<th width="10%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $loveparamter as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.ptid}--></td>
		<td align="left"><!--{$volist.ptname}--></td>
		<td align="left"><!--{$volist.ptvalue}--></td>		
		<td align="center"><!--{$volist.pttype}--></td>
		<td><!--{$volist.ptdec}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=loveparamter&a=edit&id=<!--{$volist.ptid}-->" class="icon-set">设置</a>&nbsp;&nbsp;
		<!--{if $volist.issystem=='0'}-->
		<a href="<!--{$cpfile}-->?c=loveparamter&a=del&id[]=<!--{$volist.ptid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a>
		<!--{/if}-->
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=loveparamter&a=add">添加交友参数</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=loveparamter" class="btn-general"><span>返回列表</span></a>添加交友参数</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=loveparamter" onsubmit='return checkadd();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>参数名 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="ptname" id="ptname" class="input-150" /> <span id='dptname' class='f_red'></span> (参数名只能字母、下横线、中横线、数字组成)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数描述 <span class="f_red"></span> </td>
		<td class='hback'><input type="input" name="ptdec" id="ptdec" class="input-txt" /><span id='dptdec' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数值 <span class="f_red">*</span> </td>
		<td class='hback'>
		<textarea name="ptvalue" id="ptvalue" style="width:70%;height:150px;overflow:auto;"></textarea>
		<span id='dptvalue' class='f_red'></span>
		<br />
		(参数集合格式 参数值#参数描述，多个用 | 隔开，参数值必须从1开始！)
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数类型 <span class="f_red"></span> </td>
		<td class='hback'>
		<select name="pttype" id="pttype">
		<option value="select">select 下拉选</option>
		<option value="radio">radio 单选</option>
		<option value="checkbox">checkbox 多选</option>
		</select>
		<span id='dpttype' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="input" name="orders" id="orders" class="input-s" /><span id='dorders' class='f_red'></span>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑交友参数</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=loveparamter&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>编辑交友参数</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=loveparamter&page=<!--{$page}-->"  onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>参数名 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><!--{$loveparamter.ptname}--> (不能修改)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数描述 <span class="f_red"></span> </td>
		<td class='hback'><input type="input" name="ptdec" id="ptdec" class="input-txt" value="<!--{$loveparamter.ptdec}-->" /><span id='dptdec' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数值 <span class="f_red">*</span> </td>
		<td class='hback'>
		<textarea name="ptvalue" id="ptvalue" style="width:70%;height:150px;overflow:auto;"><!--{$loveparamter.ptvalue}--></textarea>
		<span id='dptvalue' class='f_red'></span>
		<br />
		(参数集合格式 参数值#参数描述，多个用 | 隔开，参数值必须从1开始！)
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>参数类型 <span class="f_red"></span> </td>
		<td class='hback'>
		<select name="pttype" id="pttype">
		<option value=""></option>
		<option value="select"<!--{if $loveparamter.pttype=='select'}--> selected<!--{/if}-->>select 下拉选</option>
		<option value="radio"<!--{if $loveparamter.pttype=='radio'}--> selected<!--{/if}-->>radio 单选</option>
		<option value="checkbox"<!--{if $loveparamter.pttype=='checkbox'}--> selected<!--{/if}-->>checkbox 多选</option>
		</select>
		<span id='dpttype' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="input" name="orders" id="orders" class="input-s" value="<!--{$loveparamter.orders}-->" /><span id='dorders' class='f_red'></span>
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
function checkadd() {
	var t = "";
	var v = "";

	t = "ptname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("参数名不能为空", t);
		return false;
	}

	t = "ptvalue";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("参数值不能为空", t);
		return false;
	}
	return true;
}

function checkedit() {
	var t = "";
	var v = "";

	t = "ptvalue";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("参数值不能为空", t);
		return false;
	}
	return true;
}
</script>
