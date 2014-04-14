<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>问候语设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=greet">问候语</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=greet&a=add" class="btn-general"><span>添加问候语</span></a>问候语</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=greet" />
	  <div class="item">
	    <label>问候对象：</label>
		<select name="stype" id="stype">
		<option value=''></option>
		<option value='male'<!--{if $stype=='male'}--> selected<!--{/if}-->>男会员</option>
		<option value='female'<!--{if $stype=='female'}--> selected<!--{/if}-->>女会员</option>
		</select>
		&nbsp;&nbsp;
		<label>问候语：</label><input type="text" id="sgreet" name="sgreet" class="input-txt" value="<!--{$sgreet}-->" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="8%"><div class="th-gap">状态</div></th>
		<th width="8%"><div class="th-gap">男会员</div></th>
		<th width="8%"><div class="th-gap">女会员</div></th>
		<th><div class="th-gap">问候语</div></th>
		<th width="8%"><div class="th-gap">使用</div></th>
		<th width="15%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $greet as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.greetid}--></td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.greetid}-->" value="flagopen" />
			<img id="flag<!--{$volist.greetid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.greetid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.greetid}-->" value="flagclose" />
			<img id="flag<!--{$volist.greetid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.greetid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.male==0}-->
			<input type="hidden" id="attr_male<!--{$volist.greetid}-->" value="maleopen" />
			<img id="male<!--{$volist.greetid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('male','<!--{$volist.greetid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_male<!--{$volist.greetid}-->" value="maleclose" />
			<img id="male<!--{$volist.greetid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('male','<!--{$volist.greetid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.female==0}-->
			<input type="hidden" id="attr_female<!--{$volist.greetid}-->" value="femaleopen" />
			<img id="female<!--{$volist.greetid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('female','<!--{$volist.greetid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_female<!--{$volist.greetid}-->" value="femaleclose" />
			<img id="female<!--{$volist.greetid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('female','<!--{$volist.greetid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="left"><!--{$volist.greeting}--></td>
		<td align="center"><!--{$volist.usecount}--></td>

		<td align="center">
		<a href="<!--{$cpfile}-->?c=greet&a=edit&id=<!--{$volist.greetid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-set">设置</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=greet&a=del&id[]=<!--{$volist.greetid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复。')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=greet&a=add">添加问候语</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=greet" class="btn-general"><span>返回列表</span></a>添加问候语</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=greet" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">状 态 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="radio" name="flag" id="flag" value="1" checked />正常，<input type="radio" name="flag" id="flag" value="0" />锁定 <span class='f_red' id="dflag"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>问候对象 <span class='f_red'></span></td>
		<td class='hback'><input type="checkbox" name="male" id="male" value="1" />男会员，<input type="checkbox" name="female" id="female" value="1" />女会员</td>
	  </tr>
	  <tr>
		<td class='hback_1'>问候语 <span class='f_red'>*</span></td>
		<td class='hback'><textarea name="greeting" id="greeting" style="width:60%;height:150px;overflow:auto;"></textarea>
		<span class='f_red' id="dgreeting"></span></td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑问候语</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=greet&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑问候语</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=greet&<!--{$comeurl}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">状 态 <span class='f_red'>*</span></td>
		<td class='hback' width="85%">
		<input type="radio" name="flag" id="flag" value="1"<!--{if $greet.flag=='1'}--> checked<!--{/if}--> />正常，
		<input type="radio" name="flag" id="flag" value="0"<!--{if $greet.flag=='0'}--> checked<!--{/if}--> />锁定 
		<span class='f_red' id="dflag"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>问候对象 <span class='f_red'></span></td>
		<td class='hback'><input type="checkbox" name="male" id="male" value="1"<!--{if $greet.male=='1'}--> checked<!--{/if}--> />男会员，<input type="checkbox" name="female" id="female" value="1"<!--{if $greet.female=='1'}--> checked<!--{/if}--> />女会员</td>
	  </tr>
	  <tr>
		<td class='hback_1'>问候语 <span class='f_red'>*</span></td>
		<td class='hback'><textarea name="greeting" id="greeting" style="width:60%;height:150px;overflow:auto;"><!--{$greet.greeting}--></textarea>
		<span class='f_red' id="dgreeting"></span></td>
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

	t = "greeting";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("问候语不能为空", t);
		return false;
	}

	return true;
}

</script>
