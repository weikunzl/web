<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>支付方式</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=netpay">支付方式</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=netpay&a=allpayment" class="btn-general"><span>添加支付方式</span></a>支付方式</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="20%"><div class="th-gap">图标</div></th>
		<th width="15%"><div class="th-gap">支付名称</div></th>
		<th width="30%"><div class="th-gap">支付描述</div></th>
		<th width="10%"><div class="th-gap">使用状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $netpay as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.mentid}--></td>
	    <td align="center"><img src="<!--{$urlpath}--><!--{$volist.logo}-->"></td>
		<td><!--{$volist.mentname}--><br /><!--{$volist.filepath}--></td>
		<td><!--{$volist.intro}--></td>
		<td align="center">
		<!--{if $volist.flag == 1}-->
		<font color="green">开启</font>
		<!--{else}-->
		<font color="#999999">关闭</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=netpay&a=edit&id=<!--{$volist.mentid}-->" class="icon-set">设置</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=netpay&a=del&id[]=<!--{$volist.mentid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复。')){return true;} return false;}" class="icon-del">删除</a></td>
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

<!--{if $a eq "allpayment"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=netpay">支付方式</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=netpay" class="btn-general"><span>返回列表</span></a>支付方式</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="10%"><div class="th-gap">ID</div></th>
		<th width="20%"><div class="th-gap">图标</div></th>
		<th width="15%"><div class="th-gap">支付名称</div></th>
		<th width="45%"><div class="th-gap">支付描述</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $netpay as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.pluginid}--></td>
	    <td align="center"><img src="<!--{$urlpath}--><!--{$volist.logo}-->"></td>
		<td><!--{$volist.payname}--><br /><!--{$volist.filepath}--></td>
		<td><!--{$volist.intro}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=netpay&a=add&pluginid=<!--{$volist.pluginid}-->" class="icon-add">添加</a></td>
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

<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=netpay&a=add">添加支付方式</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=netpay" class="btn-general"><span>返回列表</span></a>添加支付方式</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=netpay&a=saveadd" onsubmit='return checkform();' />
	<input type="hidden" name="pluginid" value="<!--{$payment.pluginid}-->" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">支付名称 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="mentname" id="mentname" value="<!--{$payment.payname}-->" class="input-txt" /> <span id="dmentname" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>类型 <span class="f_red"></span> </td>
		<td class='hback'>线上支付</td>
	  </tr>
	  <tr>
		<td class='hback_1'>商户ID号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authid" id="authid" class="input-txt" /> <span id="dauthid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>密钥 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="privatekey" id="privatekey" class="input-txt" /> <span id="dprivatekey" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款帐号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authaccount" id="authaccount" class="input-txt" /> <span id="dauthaccount" class='f_red'></span> <br />
		填写支付宝、PAYPAL收款账号
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>手续费设置 <span class="f_red"></span> </td>
		<td class='hback'>
		  <input type="radio" name="poundagetype" id="poundagetype" value="1" checked onclick="select_type1();" /> 按百分比收费 &nbsp;&nbsp;
		  <input type="radio" name="poundagetype" id="poundagetype" value="2" onclick="select_type2();" /> 按固定额度收费
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'></td>
		<td class='hback'>
		<!-- 百分比收费 -->
		<span id="id_type1_1" style="display:;">费率：</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_1" style="display:none;">金额：</span>
		<input type="text" name="poundage" id="poundage" class="input-s" />
		<!-- 百分比收费 -->
		<span id="id_type1_2" style="display:;">%</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_2" style="display:none;">元</span>
		<!-- 百分比收费 -->
		<span id="id_type1_3" style="display:;">说明：会员将支付充值金额乘以此费率作为手续费</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_3" style="display:none;">说明：会员每笔充值金额需要支付的手续费</span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />开启&nbsp;&nbsp; <input type="radio" name="flag" id="flag" value="0" />关闭 <span id='dflag' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" /> <span id="dorders" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>支付描述 </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:100px;overflow:auto;"><!--{$payment.intro}--></textarea> <span id='dintro' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span>编辑支付方式</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=netpay" class="btn-general"><span>返回列表</span></a>编辑支付方式</h3>
	<div class="search-area3">
	  <div class="item">
	  支付宝商户ID申请地址：<a href="https://b.alipay.com/" target="_blank">https://b.alipay.com/</a> (集成即时到帐和双功能收款)<br />
	  财付通商户ID申请地址：<a href="http://mch.tenpay.com/market/ps_intro_08.shtml" target="_blank">http://mch.tenpay.com/market/ps_intro_08.shtml</a> (集成即时到帐)<br />
	  网银在线商户ID申请地址：<a href="http://www.chinabank.com.cn/" target="_blank">http://www.chinabank.com.cn/</a> (申请企业账号)<br />
	  Paypal申请地址：<a href="http://www.paypal.com/" target="_blank">http://www.paypal.com/</a> （注册高级或者企业用户）
	  </div>
	</div>


    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=netpay&a=saveedit" onsubmit='return checkform();' />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">支付名称 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="mentname" id="mentname" value="<!--{$netpay.mentname}-->" class="input-txt" /> <span id="dmentname" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>类型 <span class="f_red"></span> </td>
		<td class='hback'>线上支付</td>
	  </tr>
	  <tr>
		<td class='hback_1'>商户ID号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authid" id="authid" class="input-txt" value="<!--{$netpay.authid}-->" /> <span id="dauthid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>密钥 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="privatekey" id="privatekey" class="input-txt" value="<!--{$netpay.privatekey}-->" /> <span id="dprivatekey" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款帐号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authaccount" id="authaccount" class="input-txt" value="<!--{$netpay.authaccount}-->" /> <span id="dauthaccount" class='f_red'></span> <br />
		填写支付宝、PAYPAL收款账号
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>手续费设置 <span class="f_red"></span> </td>
		<td class='hback'>
		  <input type="radio" name="poundagetype" id="poundagetype" value="1" onclick="select_type1();"<!--{if $netpay.poundagetype=='1'}--> checked<!--{/if}--> /> 按百分比收费 &nbsp;&nbsp;
		  <input type="radio" name="poundagetype" id="poundagetype" value="2" onclick="select_type2();"<!--{if $netpay.poundagetype=='2'}--> checked<!--{/if}--> /> 按固定额度收费
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'></td>
		<td class='hback'>
		<!-- 百分比收费 -->
		<span id="id_type1_1" style="display:<!--{if $netpay.poundagetype=='2'}-->none<!--{/if}-->;">费率：</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_1" style="display:<!--{if $netpay.poundagetype=='1'}-->none<!--{/if}-->;">金额：</span>
		<input type="text" name="poundage" id="poundage" class="input-s" value="<!--{$netpay.poundage}-->" />
		<!-- 百分比收费 -->
		<span id="id_type1_2" style="display:<!--{if $netpay.poundagetype=='2'}-->none<!--{/if}-->;">%</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_2" style="display:<!--{if $netpay.poundagetype=='1'}-->none<!--{/if}-->;">元</span>
		<!-- 百分比收费 -->
		<span id="id_type1_3" style="display:<!--{if $netpay.poundagetype=='2'}-->none<!--{/if}-->;">说明：会员将支付充值金额乘以此费率作为手续费</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_3" style="display:<!--{if $netpay.poundagetype=='1'}-->none<!--{/if}-->;">说明：会员每笔充值金额需要支付的手续费</span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $netpay.flag=='1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp; <input type="radio" name="flag" id="flag" value="0"<!--{if $netpay.flag=='0'}--> checked<!--{/if}--> />关闭 <span id='dflag' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<!--{$netpay.orders}-->" /> <span id="dorders" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>支付描述 </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:100px;overflow:auto;"><!--{$netpay.intro}--></textarea> <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
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

	t = "mentname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("支付名称不能为空", t);
		return false;
	}
   
	return true;
}

function select_type1(){
	$("#id_type1_1").show();
	$("#id_type1_2").show();
	$("#id_type1_3").show();

	$("#id_type2_1").hide();
	$("#id_type2_2").hide();
	$("#id_type2_3").hide();
}

function select_type2() {
	$("#id_type1_1").hide();
	$("#id_type1_2").hide();
	$("#id_type1_3").hide();

	$("#id_type2_1").show();
	$("#id_type2_2").show();
	$("#id_type2_3").show();
}
</script>
