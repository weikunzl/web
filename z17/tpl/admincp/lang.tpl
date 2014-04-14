<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>语言包设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=lang">语言包设置</a></p></div>
  <div class="main-cont">

	<h3 class="title">添加语言包</h3>
	<form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=lang&a=saveadd" onsubmit="return checkform();" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' align="center">备注说明 <span class='f_red'>*</span></td>
		<td class='hback_1' align="center">调用项名 <span class='f_red'>*</span> 由字母,数字,下横线,中横线组成</td>
		<td class='hback_1' align="center">前台显示值 <span class='f_red'></span></td>
		<td class='hback_1' align='center'>保存</td>
	  </tr>
	  <tr>
		<td class='hback' align="center">
		<input type='text' name='langnote' id='langnote' class='input-150' />
		<span class='f_red' id="dlangnote"></span>
		</td>
		<td class='hback' align="center">
		<input type='text' name='langkey' id='langkey' class='input-150' />
		<span class='f_red' id="dlangkey"></span>
		</td>
		<td class='hback' align='center'>
		<input type='text' name='langval' id='langval' class='input-150' />
		<span class='f_red' id="dlangval"></span>
		</td>
		<td class='hback' align='center'><input type="submit" name="btn_save" class='button' value="添加保存" /></td>
	  </tr>
	</table>
	</form>

    <h3 class="title">语言包列表</h3>
	<form action="<!--{$cpfile}-->?c=lang&a=saveedit" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择</div></th>
		<th width="30%"><div class="th-gap">备注说明/调用标签</div></th>
		<th width="25%"><div class="th-gap">前台显示值</div></th>
		<th width="12%"><div class="th-gap">删除</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $langdata as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center">
		<input name="id[]" type="checkbox" value="<!--{$volist.id}-->" onClick="checkItem(this, 'chkAll')">
		</td>
		<td align="left"><!--{$volist.langnote}--> / &lt;!--{$lang.<!--{$volist.langkey}-->}--&gt;</td>
		<td align="left"><input type="text" name="langval_<!--{$volist.id}-->" id="langval_<!--{$volist.id}-->" value="<!--{$volist.langval}-->" class="input-txt" /></td>
		<td align="center">
		
		<!--{if $volist.issystem=='1'}-->
		<font color="#999999">删除</font>
		<!--{else}-->
		<a href="<!--{$cpfile}-->?c=lang&a=del&id[]=<!--{$volist.id}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		<!--{/if}-->

		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="4" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="3"><input class="button" name="btn_del" type="submit" value=" 更 新 " class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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

<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "langnote";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("备注说明不能为空", t);
		return false;
	}

	t = "langkey";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("调用项名不能为空", t);
		return false;
	}

	return true;
}
</script>
