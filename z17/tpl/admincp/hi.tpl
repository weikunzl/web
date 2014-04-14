<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>会员问候</title>
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
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>信件&消息<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=hi">会员问候</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=hi" />
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
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="15%"><div class="th-gap">发件人</div></th>
		<th width="15%"><div class="th-gap">收件人</div></th>
		<th width="11%"><div class="th-gap">发件时间</div></th>
		<th width="6%"><div class="th-gap">阅读</div></th>
		<th><div class="th-gap">问候语</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $hi as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
		<td align="left">
		<a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.fromuserid}-->');"><!--{$volist.fromusername}--></a> <!--{if $volist.fromgender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.fromageyear}-->岁
		</td>
		<td align="left">
		<a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.touserid}-->');"><!--{$volist.tousername}--></a> <!--{if $volist.togender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.toageyear}-->岁
		</td>
		<td align="center" title="<!--{$volist.sendtime|date_format:"%H:%M:%S"}-->"><!--{$volist.sendtime|date_format:"%Y-%m-%d"}--></td>
		<td align="center">
		<!--{if $volist.status == '1'}-->
		<font color='green'>已阅</font>
		<!--{else}-->
		<font color='#999999'>未阅</font>
		<!--{/if}-->
		</td>
		<td>#<!--{$volist.greetid}--> <!--{$volist.message}--></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="5" align="center">暂无信息</td>
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

<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
<!--{/if}-->

</body>
</html>
