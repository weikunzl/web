<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>信件管理</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
<!--{/if}-->
</head>
<body>
<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{/if}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=message">会员信件</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=message" />
	  <div class="item">
	    <label>发件人：</label>
		<select name='ftype' id='ftype'>
		<option value=''></option>
		<option value='userid'<!--{if $ftype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		<option value='username'<!--{if $ftype=='username'}--> selected<!--{/if}-->>会员名称</option>
		<option value='email'<!--{if $ftype=='email'}--> selected<!--{/if}-->>邮箱</option>
		</select>
		&nbsp;
		<input type="text" id="fkeyword" name="fkeyword" class="input-100" value="<!--{$fkeyword}-->" />
		&nbsp;&nbsp;
	    <label>收件人：</label>
		<select name='ttype' id='ttype'>
		<option value=''></option>
		<option value='userid'<!--{if $ttype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		<option value='username'<!--{if $ttype=='username'}--> selected<!--{/if}-->>会员名称</option>
		<option value='email'<!--{if $ttype=='email'}--> selected<!--{/if}-->>邮箱</option>
		</select>
		&nbsp;
		<input type="text" id="tkeyword" name="tkeyword" class="input-100" value="<!--{$tkeyword}-->" />
		&nbsp;&nbsp;
		<br />
		<label>发件日期：</label><input type="text" name="sdate" id="sdate" value="<!--{$sdate}-->"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<!--{$edate}-->"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;&nbsp;
		<label>信件内容：</label>
		<input type="text" id="skeyword" name="skeyword" class="input-100" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=album&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="15%"><div class="th-gap">发件人</div></th>
		<th width="15%"><div class="th-gap">收件人</div></th>
		<th width="11%"><div class="th-gap">发件时间</div></th>
		<th width="6%"><div class="th-gap">阅读</div></th>
		<th width="6%"><div class="th-gap">置顶</div></th>
		<th><div class="th-gap">信件内容</div></th>
		<th width='12%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $message as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.msgid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.msgid}--></td>
		<td align="left">
		<a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.fromuserid}-->');"><!--{$volist.fromusername}--></a> <!--{if $volist.fromgender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.fromageyear}-->岁
		</td>
		<td align="left">
		<a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.touserid}-->');"><!--{$volist.tousername}--></a> <!--{if $volist.togender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.toageyear}-->岁
		</td>
		<td align="center" title="<!--{$volist.sendtime|date_format:"%H:%M:%S"}-->"><!--{$volist.sendtime|date_format:"%Y-%m-%d"}--></td>
		<td align="center">
		<!--{if $volist.readflag == '1'}-->
		<font color='green'>已阅</font>
		<!--{else}-->
		<font color='#999999'>未阅</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.istop==0}-->
			<input type="hidden" id="attr_istop<!--{$volist.msgid}-->" value="istopopen" />
			<img id="istop<!--{$volist.msgid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('istop','<!--{$volist.msgid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_istop<!--{$volist.msgid}-->" value="istopclose" />
			<img id="istop<!--{$volist.msgid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('istop','<!--{$volist.msgid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td><!--{$volist.content|filterhtml:20}--></td>
		<td align="center">
		<a href="javascript:void(0);" onclick="tbox_message_edit('查看/编辑会员信件', '<!--{$volist.msgid}-->')" class="icon-edit">查看</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=message&a=del&id[]=<!--{$volist.msgid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="7">
		<input class="button" name="btn_del" type="button" value="批量删除" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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

<!-- 查看信件/编辑信件 -->
<!--{if $a eq 'edit'}-->
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=message&fromtype=jdbox" onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name='id' value="<!--{$message.msgid}-->" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
	    <td class='hback_1' width='20%'>信件ID </td>
		<td class='hback' width='80%'><!--{$message.msgid}--> （发件时间：<!--{$message.sendtime|date_format:"%Y-%m-%d %H:%M:%S"}-->）</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>发件人 <span class="f_red"></span> </td>
		<td class='hback'>
		<!--{$message.fromusername}--> 
		<!--{if $message.fromgender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$message.fromageyear}-->岁
		<!--{area type='text' value=$message.fromprovinceid}--> <!--{area type='text' value=$message.fromcityid}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>收件人 <span class="f_red"></span></td>
		<td class='hback'>
		<!--{$message.tousername}--> 
		<!--{if $message.togender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$message.toageyear}-->岁
		<!--{area type='text' value=$message.toprovinceid}--> <!--{area type='text' value=$message.tocityid}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>状态设置 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type='radio' name='flag' id='flag' value='1'<!--{if $message.flag=='1'}--> checked<!--{/if}--> />通过，<input type='radio' name='flag' id='flag' value='0'<!--{if $message.flag=='0'}--> checked<!--{/if}--> />锁定 <span id='dflag' class='f_red'></span>&nbsp;&nbsp;
		<input type='checkbox' name='istop' id='istop' value='1'<!--{if $message.istop=='1'}--> checked<!--{/if}--> />置顶
		
		</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>信件内容 <span class="f_red">*</span></td>
		<td class='hback'>
		<textarea name='content' id='content' style='width:90%;height:160px;overflow:auto;'><!--{$message.content}--></textarea>
		<br /><span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="2" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->




<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
<!--{/if}-->

</body>
</html>

<script type="text/javascript">
//编辑信件
function checkedit() {
	var t = "";
	var v = "";

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("信件内容不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

</script>