<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>在线充值记录</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=paymentlog">在线充值记录</a></p></div>
  <div class="main-cont">
    <h3 class="title">在线充值记录</h3>

	<div class="search-area5">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=paymentlog" />
	  <div class="item">
	  <label>会员ID&nbsp;</label><input type="text" name="suserid" id="suserid" value="<!--{if $suserid>0}--><!--{$suserid}--><!--{/if}-->" class="input-s" />&nbsp;
	  <label>会员名称&nbsp;</label><input type="text" name="susername" id="susername" value="<!--{$susername}-->" class="input-s" />&nbsp;
	  <label>支付方式&nbsp;</label><!--{$netpay_select}-->&nbsp;
      <label>充值时间&nbsp;</label><input type="text" name="sdate" id="sdate" value="<!--{$sdate}-->"  readonly onClick="WdatePicker();" class="input-s" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<!--{$edate}-->"  readonly onClick="WdatePicker();" class="input-s" />&nbsp;
	  <label>状态&nbsp;</label><select name='sflag' id='sflag'>
	  <option value=''>不限</option>
	  <option value='wuxiao'<!--{if $sflag=='wuxiao'}--> selected<!--{/if}-->>无效</option>
	  <option value='success'<!--{if $sflag=='success'}--> selected<!--{/if}-->>成功</option>
	  <option value='fail'<!--{if $sflag=='fail'}--> selected<!--{/if}-->>失败</option>
	  </select>
	  &nbsp;&nbsp;&nbsp;<input type="submit" class="button_s" value=" 搜 索 " />
      </div>
	  </form>
	</div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="15%"><div class="th-gap">充值会员</div></th>
		<th width="18%"><div class="th-gap">充值方式</div></th>
		<th width="20%"><div class="th-gap">充值单号</div></th>
		<th width="15%"><div class="th-gap">充值金额</div></th>
		<th width="18%"><div class="th-gap">充值时间</div></th>
		<th><div class="th-gap">状态</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $paymentlog as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td><a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a></td>
		<td align="left"><!--{$volist.mentname}--></td>
		<td align="left"><!--{$volist.paynum}--></td>
		<td align="left"><!--{$volist.amount}--></td>
		<td><!--{$volist.addtime|date_format:"%Y-%m-%d %H:%M"}--></td>
		<td align="center">
		<!--{if $volist.paystatus==10}-->
		<font color='green'>成功</font>
		<!--{elseif $volist.paystatus==11}-->
		<font color='red'>失败</font>
		<!--{else}-->
		<font color='#999999'>无效</font>
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

<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>