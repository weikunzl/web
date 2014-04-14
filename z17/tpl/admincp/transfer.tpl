<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>积分转换设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=transfer">积分转换设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">积分转换设置</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=transfer&a=saveedit" />
	<table cellpadding='10' cellspacing='10' class='tab'>
	  <tr>
		<td class="hback_c1" width="20%">积分转换金币： </td>
		<td class="hback_none" width="80%">
		<input type="radio" name="trade_money" id="trade_money" value="1"<!--{if $transfer.trade_money=='1'}--> checked<!--{/if}--> />开启，<input type="radio" name="trade_money" id="trade_money" value="0"<!--{if $transfer.trade_money=='0'}--> checked<!--{/if}-->  />关闭<span id="dtrade_money"></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c1'>1个金币需要积分数：</td>
		<td class='hback_none'><input name="trade_money_ratio" id="trade_money_ratio" value="<!--{$transfer.trade_money_ratio}-->" class="input-s" type="text" /><span id="dtrade_money_ratio"></span></td>
	  </tr>
	  <tr>
		<td class='hback_c3'>金币转换积分：</td>
		<td class='hback_none'><input type="radio" name="trade_points" id="trade_points" value="1"<!--{if $transfer.trade_points=='1'}--> checked<!--{/if}--> />开启，<input type="radio" name="trade_points" id="trade_points" value="0"<!--{if $transfer.trade_points=='0'}--> checked<!--{/if}--> />关闭<span id="dtrade_points"></span></td>
	  </tr>
	  <tr>
		<td class='hback_c3'>1个金币可转换积分数：</td>
		<td class='hback_none'><input name="trade_points_ratio" id="trade_points_ratio" value="<!--{$transfer.trade_points_ratio}-->" class="input-s" type="text" /><span id="dtrade_points_ratio"></span></td>
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
