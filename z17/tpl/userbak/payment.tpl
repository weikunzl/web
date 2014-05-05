<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="payment"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 在线充值 </div>
	<div class="nav-tips">
	您当前余额：<b><font color='green'><!--{$u.money}--></font></b>&nbsp;&nbsp;&nbsp;</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=vip">会员升级</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=payment">在线充值</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <!--{if $a eq 'run'}-->
	  <div class="item_title item_margin"><p>在线充值</p><span class="shadow"></span></div>
	  <form name="pay_form" id="pay_form" action="<!--{$urlpath}-->index.php?c=payment" method="post" target="_blank">
	  <input type='hidden' name='userid' id='userid' value="<!--{$u.userid}-->" />
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td class='lblock' width='25%'>请选择网上支付方式 <span class="f_red">*</span></td>
		  <td class="rblock">
		  <!--{if !empty($payment)}-->
		  <select name='id' id='id' onchange="tab(this.options[this.options.selectedIndex].value);">
		  <!--{else}-->
		  <select name='id' id='id'>
		  <!--{/if}-->
		  <option value=''>请选择</option>
		  <!--{foreach $payment as $volist}-->
		  <option value="<!--{$volist.mentid}-->"><!--{$volist.mentname}--></option>
		  <!--{/foreach}-->
		  </select>

		  <span id="did" class="f_red"></span>
		  </td>
		</tr>
		<tr>
		  <td class='lblock'>充值金额 <span class="f_red">*</span></td>
		  <td class="rblock"><input type="text" name="quantity" id="quantity" class="input-100" maxlength="8" />元 (在线支付金额必须大于0元)
		  
		  <span id="dquantity" class="f_red"></span>
		  </td>
		</tr>
		<tr>
		  <td class="lblock" colspan='2'></td>
		</tr>
		<tr>
		  <td class='lblock'></td>
		  <td class='rblock'>
		  <input type="button" name="btn_save" value="确认充值" onclick="return checkform();" class="button-red" />	  
		  </td>
		</tr>
	  </table>
	  </form>

	  <!--{foreach $payment as $volist}-->
	  <table cellpadding='5' cellspacing='5' border='0' class='user-table table-margin lh35' name="tabtags" id='detail_<!--{$volist.mentid}-->' style="display:none;">
		<tr>
		  <td class='hback_c1' colspan="2" align="center"><b><!--{$volist.mentname}--></b> </td>
		</tr>
		<tr>
		  <td colspan='2'>
		  <img src="<!--{$volist.logo}-->" /><br />
		  <!--{$volist.intro|nl2br}-->
		  </td>
		</tr>
	  </table>
	  <!--{/foreach}-->
	  <!--{/if}-->
    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=vip">会员升级</a></li>
      <li><a href="<!--{$ucfile}-->?c=payment">在线充值</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script language="javascript">
//显示隐藏
function tab(tabid) {
	var taglength = $("table[name='tabtags']").length;;
	for (i=0; i<taglength; i++){
		$("table[name='tabtags']").eq(i).hide();
	}
	if (tabid > 0) {
		$('#detail_'+tabid).show();
	}
}
//提交保存
function checkform() {
	var t = '';
	var v = '';

	t = 'id';
	v = $('#'+t).val();
	if(v == '') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请选择支付方式', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
    
	t = 'quantity';
	v = $('#'+t).val();
	if(v == '') {
		/*
		dmsg('请填写充值金额', t);
		$('#'+t).focus();
		*/
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请填写充值金额', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
    
	$("#pay_form").submit();
	return true;
}
</script>