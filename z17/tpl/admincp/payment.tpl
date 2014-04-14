<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>收款单据</title>
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
  <div class="path"><p>当前位置：业务管理<span>&gt;&gt;</span>单据管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=payment">收款单据</a></p></div>
  <div class="main-cont">
    <h3 class="title">收款单据</h3>
	<form action="<!--{$cpfile}-->?c=payment&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">支付单号</div></th>
		<th width="10%"><div class="th-gap">支付金额</div></th>
		<th width="8%"><div class="th-gap">币种</div></th>
		<th width="10%"><div class="th-gap">所属会员</div></th>
		<th width="15%"><div class="th-gap">订单号</div></th>
		<th width="10%"><div class="th-gap">支付方式</div></th>
		<th width="10%"><div class="th-gap">支付状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $payment as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.payid}-->" onClick="checkItem(this, 'chkAll')"></td>
		<td align="left"><!--{$volist.payid}--></td>
		<td align="left"><!--{$volist.amount}--></td>
		<td align="center"><!--{$volist.currency}--></td>
		<td align="center"><!--{$volist.username}--></td>
		<td align="left"><!--{$volist.orderid}--></td>
		<td align="center">
		<!--{if $volist.paytype=='online'}-->
		在线支付
		<!--{elseif $volist.paytype=='recharge'}-->
		转账汇款
		<!--{elseif $volist.paytype=='cash'}-->
		现金付款
		<!--{elseif $volist.paytype=='deposit'}-->
		帐号余额支付
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.paystatus==0}-->
		<font color="#999999">未执行</font>
		<!--{elseif $volist.paystatus==10}-->
		<font color="green">支付成功</font>
		<!--{elseif $volist.paystatus==11}-->
		<font color="red">支付失败</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<a href="javascript:void(0);" class="icon-set" onclick="tbox_viewpayment('查看收款单据', '<!--{$volist.payid}-->');">查看</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=payment&a=del&id[]=<!--{$volist.payid}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="9" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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
   
  <!--{if $fromtype != 'jdbox'}-->
  <div class="path"><p>当前位置：业务管理<span>&gt;&gt;</span>单据管理<span>&gt;&gt;</span>添加收款单据</p></div>
  <!--{/if}-->

  <div class="main-cont">
	<h3 class="title">订单[<!--{$order.orderid}-->]付款...操作</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=payment&fromtype=<!--{$fromtype}-->" onsubmit='return checkadd();' />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="orderid" id="orderid" value="<!--{$order.orderid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>订单编号 <span class="f_red"></span> </td>
		<td class='hback' width='35%'><!--{$order.orderid}--></td>
		<td class='hback_1' width='15%'>下单日期 <span class="f_red"></span> </td>
		<td class='hback' width='35%'><!--{$order.createtime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>订单总金额 <span class="f_red"></span> </td>
		<td class='hback'><!--{$order.totalamount}--></td>
		<td class='hback_1'>已收金额 <span class="f_red"></span> </td>
		<td class='hback'><!--{$order.payamount}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款银行 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="bankname" id="bankname" class="input-100" /> <span id='dbankname' class='f_red'></span></td>
		<td class='hback_1'>收款帐号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="account" id="account" class="input-150" /> <span id='daccount' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款金额 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="amount" id="amount" class="input-60" value="<!--{$order.remoney}-->" /> <span id='damount' class='f_red'></span> (不能超出未收款金额)</td>
		<td class='hback_1'>币种 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="currency" id="currency" class="input-60" value="CNY" /> <span id='dcurrency' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>付款人 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="payuser" id="payuser" class="input-60" /> <span id='dpayuser' class='f_red'></span></td>
		<td class='hback_1'>付款时间 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="paytime" id="paytime" class="input-150" value="<!--{$timeline|date_format:"%Y-%m-%d %H:%M:%S"}-->" /> <span id='dpaytime' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属会员 <span class="f_red"></span> </td>
		<td class='hback'>
		<!--{if $order.userid==0}-->
		~~
		<!--{else}-->
		<!--{$order.username}-->
		<br />
		帐号余额：<!--{$order.user_money}-->
		<!--{/if}--></td>
		<td class='hback_1'>付款方式 <span class="f_red">*</span> </td>
		<td class='hback'>
		 <select name="paytype" id="paytype">
		 <option value="">请选择</option>
		 <option value="online">在线支付</option>
		 <option value="recharge">转账汇款</option>
		 <option value="cash">现金付款</option>
		 <option value="deposit">账户余额支付</option>
		 </select>
		 <span id='dpaytype' class='f_red'></span>
		 <br />
		 (如果选择“账户余额支付”，必须非匿名会员订单，且会员帐号余额足够！)
		 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款单备注 <span class="f_red"></span> </td>
		<td class='hback' colspan="3"><textarea name="memo" id="memo" style="width:50%;height:50px;overflow:auto;"></textarea> <span id='dmemo' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan='4' align="center"><input type="submit" name="btn_save" class="button" value=" 提 交 " /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $a eq "view"}-->
<div class="main-wrap">
  
  <!--{if $fromtype != 'jdbox'}-->
  <div class="path"><p>当前位置：业务管理<span>&gt;&gt;</span>单据管理<span>&gt;&gt;</span>查看收款单据</p></div>
  <!--{/if}-->

  <div class="main-cont">
    
	<!--{if $fromtype=='jdbox'}-->
	<h3 class="title">正在查看收款单据[<!--{$payment.payid}-->]</h3>
	<!--{else}-->
	<h3 class="title"><a href="<!--{$cpfile}-->?c=payment&page=<!--{$page}-->" class="btn-general"><span>返回列表</span></a>查看收款单据</h3>
	<!--{/if}-->

	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>收款单号 <span class="f_red"></span> </td>
		<td class='hback_yellow' width='35%'><!--{$payment.payid}--> 
		<!--{if $payment.paystatus==0}-->
		<font color="#999999">未执行</font>
		<!--{elseif $payment.paystatus==10}-->
		<font color="green">支付成功</font>
		<!--{elseif $payment.paystatus==11}-->
		<font color="red">支付失败</font>
		<!--{/if}-->
		</td>
		<td class='hback_1' width='15%'>所属订单号 <span class="f_red"></span> </td>
		<td class='hback_yellow' width='35%'><!--{$payment.orderid}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>支付方式 <span class="f_red"></span> </td>
		<td class='hback_yellow'>
		<!--{if $payment.paytype=='online'}-->
		在线支付
		<!--{elseif $payment.paytype=='recharge'}-->
		转账汇款
		<!--{elseif $payment.paytype=='cash'}-->
		现金付款
		<!--{elseif $payment.paytype=='deposit'}-->
		帐号余额支付
		<!--{/if}-->
		</td>
		<td class='hback_1'>付款金额 <span class="f_red"></span> </td>
		<td class='hback_yellow'><b><!--{$payment.amount}--></b> <!--{$payment.currency}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>生成时间 <span class="f_red"></span> </td>
		<td class='hback_yellow'><!--{$payment.createtime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		<td class='hback_1'>付款时间 <span class="f_red"></span> </td>
		<td class='hback_yellow'><!--{$payment.paytime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款帐号 <span class="f_red"></span> </td>
		<td class='hback_yellow'><!--{$payment.account}--></td>
		<td class='hback_1'>收款银行 <span class="f_red"></span> </td>
		<td class='hback_yellow'><!--{$payment.bankname}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>付款人 <span class="f_red"></span> </td>
		<td class='hback_yellow'><!--{$payment.payuser}--></td>
		<td class='hback_1'>操作人 <span class="f_red"></span> </td>
		<td class='hback_yellow'>
		<!--{if $payment.opid==0}-->
		会员自己
		<!--{else}-->
		<!--{$payment.opname}-->
		<!--{/if}-->
		
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>单据备注 <span class="f_red"></span> </td>
		<td class='hback_yellow' colspan='3'><!--{$payment.memo}--></td>
	  </tr>
	  <!--{if $fromtype == 'jdbox'}-->
	  <tr>
		<td class='hback_none' colspan='4' align="center"><a href="javascript:void(0);" onclick="tbox_close();">关闭窗口</a></td>
	  </tr>
	  <!--{/if}-->
	</table>
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
function checkadd() {
	var t = "";
	var v = "";

	t = "amount";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("收款金额不能为空", t);
		return false;
	}

	t = "paytime";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("付款时间不能为空", t);
		return false;
	}

	t = "paytype";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择付款方式", t);
		return false;
	}

	return true;
}
</script>
