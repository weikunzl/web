<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>注册推广设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=promotion">注册推广</a></p></div>
  <div class="main-cont">
	<h3 class="title">注册推广</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=promotion&a=saveedit" />
	<table cellpadding='10' cellspacing='10' class='tab'>
	  <tr>
		<td class="hback_none" width="15%">推广状态： </td>
		<td class="hback_none" width="85%"><input type="radio" name="promotion" id="promotion" value="1"<!--{if $promotion.promotion===true}--> checked<!--{/if}--> />开启，<input type="radio" name="promotion" 
id="promotion" value="0"<!--{if $promotion.promotion===false}--> checked<!--{/if}--> />关闭<span id="dpromotion"></span>
</td>
	  </tr>
	  <tr>
		<td class='hback_none'>有效推广设置：</td>
		<td class='hback_none'><input type="checkbox" name="emailvalid" id="emailvalid" value="1" checked disabled />邮箱有效，<input type="checkbox" name="avatarvalid" id="avatarvalid" value="1"<!--{if $promotion.avatarvalid=='1'}--> checked<!--{/if}--> />上传了有效头像<br /><font color="#999999">（推广的有效会员至少需要通过邮箱认证）</font></td>
	  </tr>
	  <tr>
		<td class='hback_none'>推广跳转地址：</td>
		<td class='hback_none'><input type="radio" name="jumptype" id="jumptype" value="1"<!--{if $promotion.jumptype=='1'}--> checked<!--{/if}--> />注册页，<input type="radio" name="jumptype" id="jumptype" value="2"<!--{if $promotion.jumptype=='2'}--> checked<!--{/if}--> />首页<span id="djumptype"></span></td>
	  </tr>

	  <tr>
		<td class='hback_c3' colspan='2'>每成功推广一个会员，奖励金币和积分，以及达到几个会员后自动结算</td>
	  </tr>
	  <tr>
		<td class='hback_none'>奖励金币个数：</td>
		<td class='hback_none'><input name="onemoney" id="onemoney" value="<!--{$promotion.onemoney}-->" class="input-s" type="text" /><span id="donemoney"></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'>奖励积分个数：</td>
		<td class='hback_none'><input name="onepoints" id="onepoints" value="<!--{$promotion.onepoints}-->" class="input-s" type="text" /><span id="donepoints"></span></td>
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

<!--{if $a eq "list"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=promotion&a=list">推广列表</a></p></div>
  <div class="main-cont">
	<h3 class="title">推广列表</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="15%"><div class="th-gap">推广人ID</div></th>
		<th width="15%"><div class="th-gap">注册会员ID</div></th>
		<th width="18%"><div class="th-gap">注册时间</div></th>
		<th width="8%"><div class="th-gap">邮箱</div></th>
		<th width="8%"><div class="th-gap">头像</div></th>
		<th width="10%"><div class="th-gap">奖励金币</div></th>
		<th width="10%"><div class="th-gap">奖励积分</div></th>
		<th><div class="th-gap">状态</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $promotion as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td><a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.tuserid}-->');"><!--{$volist.tuserid}--></a></td>
		<td><a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.ruserid}-->');"><!--{$volist.ruserid}--></a></td>
		<td><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		<td align="center">
		<!--{if $volist.rzemail=='1'}-->
		<font color="green">有效</font>
		<!--{else}-->
		<font color="#999999">无效</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.avatar=='1'}-->
		<font color="green">有效</font>
		<!--{else}-->
		<font color="#999999">无效</font>
		<!--{/if}-->
		</td>
		<td align="center"><!--{$volist.validmoney}--></td>
		<td align="center"><!--{$volist.validpoints}--></td>
		<td align="center">
		<!--{if $volist.settleflag=='1'}-->
		<font color='green'>已结算</font>
		<!--{else}-->
		<font color='blue'>未结算</font>
		<!--{/if}-->
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
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
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>
