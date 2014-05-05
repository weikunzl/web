<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<style type="text/css">
.box-main{padding:10px;}
.box-dialog-left{float:left;width:120px;}
.box-dialog-left .user-img{padding:5px; border:1px solid #dddddd;width:100px;height:120px;display:block}
.box-dialog-left .user-info {padding:5px;text-align:center;line-height:22px;}
.box-dialog-left p{line-height:25px;}
.box-dialog-left p img{vertical-align:center;}
.box-dialog-right {float:left;margin-left:10px;width:450px;}

.box-dialog-right .dialog-tips {margin-bottom:5px;border-bottom:1px dashed #ddd;height:30px;}
.box-dialog-right .dialog-tips-l {height:20px;line-height:20px;float:left;font-size:13px;font-weight:bold;padding-top:2px;}
.box-dialog-right .dialog-tips-r {margin-left:10px;height:20px;line-height:20px;float:left;}
.box-dialog-right .dialog-tips-r img {padding-right:5px;}

.box-dialog-right. p {padding-left:10px;line-height:20px;}

.box-dialog-kdmsg {border: 1px solid #F7F7F7;box-shadow: 0 0 0 #666666;padding: 0 25px; width:400px;margin-top:10px;}

.box-dialog-kdmsg .writecon {
    background: url("<!--{$ucpath}-->images/line_cont.jpg") repeat scroll 0 0 transparent;
    border: 0 none;
    height: 210px;
    line-height:30px;
    width: 100%;
	font-size:100%;
	color:#666666;
	overflow:auto;
}
.box-dialog-button{float:right; margin-top:20px;margin-right:20px;}
</style>
<!--{if $a == 'contact'}-->
<div class="box-main">
  <div class="box-dialog-left fl">
    <div class="user-img">
	  <img width="100" height="120" border="0" src="<!--{$home.avatarurl}-->" />
	</div>
	<div class="user-info">
	<a href="<!--{$home.homeurl}-->" target="_blank"><!--{$home.levelimg}--> <b><!--{$home.username}--></b></a><br />
	<!--{if $home.gender=='1'}-->男<!--{else}-->女<!--{/if}--> 
	  <!--{hook mod='var' item='marrystatus' type='text' value=$home.marrystatus}--> 
	  <!--{$home.age}--> 岁<br />
	  <!--{area type='text' value=$home.provinceid}--> <!--{area type='text' value=$home.cityid}--><br />
	  <!--{hook mod='var' item='education' type='text' value=$home.education}--> <!--{$home.height}-->CM
	</div>
	<p>
	</p>
  </div>
  <form id="myform" name="myform" action="<!--{$urlpath}-->usercp.php?c=home&halttype=jdbox" method="post">
  <input type='hidden' name='a' id='a' value="paycontact" />
  <input type='hidden' name='uid' id='uid' value="<!--{$home.userid}-->" />
  <div class="box-dialog-right fl">
    <div class="dialog-tips">
	  <div class="dialog-tips-l" style="color:#3A6391;">支付查看联系方式费用</div>
	  <div class="dialog-tips-r">
		  <img src="<!--{$ucpath}-->images/cid<!--{if $home.idnumberrz=='0'}-->_h<!--{/if}-->.png" title="<!--{if $home.idnumberrz==0}-->身份证未认证<!--{else}-->已身份证认证<!--{/if}-->" /> 
		  <img src="<!--{$ucpath}-->images/video<!--{if $home.videorz=='0'}-->_h<!--{/if}-->.png" title="<!--{if $home.videorz==0}-->视频未认证<!--{else}-->已视频认证<!--{/if}-->" />  
		  <img src="<!--{$ucpath}-->images/email<!--{if $home.emailrz=='0'}-->_h<!--{/if}-->.png" title="<!--{if $home.emailrz==0}-->邮箱未认证<!--{else}-->已邮箱认证<!--{/if}-->" /> 
      </div>
	  <div style="clear:both;"></div>
	</div>
	<p>
	<div class="nav-tips">
	对不起，你需要支付 <font color="red"><b><!--{$g.fee.contactfee}--></b></font> 元才可以查看TA的联系方式。<br />
	<b>温馨提示：</b><br />
	只需付一次费用，以后查看对方的联系方式不再需要支付<br />如果您的余额不够支付，<a href="<!--{$urlpath}-->usercp.php?c=payment" target="_top" style="color:#3A6391;">请先充值&gt;&gt;</a> 或者<a href="<!--{$urlpath}-->usercp.php?c=vip" target="_top" style="color:#3A6391;">升级会员&gt;&gt;</a><br /><br />
	（您的帐号余额：<b><font color="green"><!--{$u.money}--></font></b> 元）
	</div>
	</p>
	<div class="box-dialog-button">
	  <input type="button" value="确定支付" class="button-red" name="btn_pay" id="btn_pay" onclick="confirm_pay();" />
	</div>
	<div class="clear"></div>
  </div>
  </form>
  <div class="clear"></div>
</div>
<!--{/if}-->

<!--{if $a == 'viewcontact'}-->
<div class="box-main">
  <div class="box-dialog-left fl">
    <div class="user-img">
	  <img width="100" height="120" border="0" src="<!--{$home.avatarurl}-->" />
	</div>
	<div class="user-info">
	<a href="<!--{$home.homeurl}-->" target="_blank"><!--{$home.levelimg}--> <b><!--{$home.username}--></b></a><br />
	<!--{if $home.gender=='1'}-->男<!--{else}-->女<!--{/if}--> 
	  <!--{hook mod='var' item='marrystatus' type='text' value=$home.marrystatus}--> 
	  <!--{$home.age}--> 岁<br />
	  <!--{area type='text' value=$home.provinceid}--> <!--{area type='text' value=$home.cityid}--><br />
	  <!--{hook mod='var' item='education' type='text' value=$home.education}--> <!--{$home.height}-->CM
	</div>
	<p>
	</p>
  </div>
  <form id="myform" name="myform" action="<!--{$urlpath}-->usercp.php?c=home&halttype=jdbox" method="post">
  <input type='hidden' name='a' id='a' value="paycontact" />
  <input type='hidden' name='uid' id='uid' value="<!--{$home.userid}-->" />
  <div class="box-dialog-right fl">
    <div class="dialog-tips">
	  <div class="dialog-tips-l" style="color:#3A6391;">查看联系方式</div>
	  <div class="dialog-tips-r">
		  <img src="<!--{$ucpath}-->images/cid<!--{if $home.idnumberrz=='0'}-->_h<!--{/if}-->.png" title="<!--{if $home.idnumberrz==0}-->身份证未认证<!--{else}-->已身份证认证<!--{/if}-->" /> 
		  <img src="<!--{$ucpath}-->images/video<!--{if $home.videorz=='0'}-->_h<!--{/if}-->.png" title="<!--{if $home.videorz==0}-->视频未认证<!--{else}-->已视频认证<!--{/if}-->" />  
		  <img src="<!--{$ucpath}-->images/email<!--{if $home.emailrz=='0'}-->_h<!--{/if}-->.png" title="<!--{if $home.emailrz==0}-->邮箱未认证<!--{else}-->已邮箱认证<!--{/if}-->" /> 
      </div>
	  <div style="clear:both;"></div>
	</div>
	<div class="box-dialog-kdmsg">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td width="15%"><b>邮箱：</b></td>
		  <td class="rblock" width="35%">
			  <!--{if $g.view.viewemail == '1'}-->
				  <!--{$home.email}-->
			  <!--{else}-->
				  ~~
			  <!--{/if}-->
		  </td>
		  <td width="15%"><b>手机：</b></td>
		  <td class="rblock" width="35%">
			  <!--{if empty($home.mobile)}-->
				  <font color="#999999">未填写</font>
			  <!--{else}-->
				  <!--{if $g.view.viewmobile == '1'}-->
					  <!--{$home.mobile}-->
				  <!--{else}-->
					  ~~
				  <!--{/if}-->
			  <!--{/if}-->
		  </td>
		</tr>
	    <tr>
		  <td><b>QQ：</b></td>
		  <td class="rblock">
			  <!--{if empty($home.qq)}-->
				  <font color="#999999">未填写</font>
			  <!--{else}-->
				  <!--{if $g.view.viewqq == '1'}-->
					  <!--{$home.qq}-->
				  <!--{else}-->
					  ~~
				  <!--{/if}-->
			  <!--{/if}-->
		  </td>
		  <td><b>微信：</b></td>
		  <td class="rblock">
			  <!--{if empty($home.msn)}-->
				  <font color="#999999">未填写</font>
			  <!--{else}-->
				  <!--{if $g.view.viewmsn == '1'}-->
					  <!--{$home.msn}-->
				  <!--{else}-->
					  ~~
				  <!--{/if}-->
			  <!--{/if}-->
		  </td>
		</tr>
	    <tr>
		  <td><b>微博：</b></td>
		  <td colspan="3">
			  <!--{if empty($home.homepage)}-->
				  <font color="#999999">未填写</font>
			  <!--{else}-->
				  <!--{if $g.view.viewweibo == '1'}-->
					  <!--{$home.homepage}-->
				  <!--{else}-->
					  ~~
				  <!--{/if}-->
			  <!--{/if}-->
		  </td>
		</tr>
	  </table>
	</div>
	<p>
	<div class="nav-tips">
	  温馨提示：
	 <font color="green">你的会员级别可以查看联系方式或已支付过查看费用；</font><br />如果您的余额不够支付，<a href="<!--{$urlpath}-->usercp.php?c=payment" target="_top" style="color:#3A6391;">请先充值</a>&gt;&gt;&nbsp;&nbsp;&nbsp;或者<a href="<!--{$urlpath}-->usercp.php?c=vip" target="_top" style="color:#3A6391;">升级会员&gt;&gt;</a>
	</div>
	</p>
	<div class="clear"></div>
  </div>
  </form>
  <div class="clear"></div>
</div>
<!--{/if}-->

</body>
</html>
<script type="text/javascript">
function confirm_pay() {
	var needpay = '<!--{$g.fee.contactfee}-->';
	var mypay = '<!--{$u.money}-->';
	if (parseFloat(mypay) < parseFloat(needpay)) {
		$.dialog.tips("对不起，你的余额不足，请先充值！", 3);
		return false;
	}
	$("#myform").submit();
}
</script>