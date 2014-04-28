<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="menuid" value="vip"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->

<div class="user_main">


  <div class="main_right">
    <div class="div_"> 服务 &gt;&gt; 会员升级 </div>
	<div class="nav-tips">
	您当前所在会员组：<!--{$u.levelimg}--> <b><!--{$g.groupname}--></b><!--{if $g.groupid>1}-->&nbsp;&nbsp;&nbsp;（有效期到 <!--{$u.vipenddate_t}-->）<!--{/if}-->&nbsp;&nbsp;&nbsp;剩余可用<!--{$lang.money}-->：<b><font color='green'><!--{$u.money}--></font>
	</b>
	</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=vip">会员升级</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=payment">在线充值</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>会员组</p><span class="shadow"></span></div>
	  <form method="post" id="vip_form" action="<!--{$ucfile}-->?c=vip&a=savevip">
      <div class="vip_list">
		<!--{foreach $group as $volist}-->
        <div class="vip_title">
		  <img src="<!--{$urlpath}--><!--{$volist.maleimg}-->" align='absmiddle' border='0' />&nbsp;&nbsp;
		  <img src="<!--{$urlpath}--><!--{$volist.femaleimg}-->" align='absmiddle' border='0' />
		  <br /><!--{$volist.groupname}-->
		</div>
        <div style="float:left; line-height:25px;">
		<!--{if $volist.groupid==1}-->
		永久 免费
		<!--{else}-->
			<!--{if !empty($volist.commer)}-->
			<!--{foreach $volist.commer as $val}-->
			<input type="radio" name="viptype" id="viptype" value="<!--{$volist.groupid}-->_<!--{$val.orders}-->" />&nbsp;有效<!--{$val.days}-->天，支付<!--{$lang.money}--><!--{$val.money}--><!--{$lang.money_dot}--><br />
			<!--{/foreach}-->
			<!--{/if}-->
		<!--{/if}-->
		</div>
        <div style="float:right;">
		<!--{if $volist.groupid>1}-->
		<input type="button" value="购买升级" onclick="return checkvip();" class="button-green" />
		<!--{/if}-->
		</div>
        <div class="clear"></div>
        <div class="hr_dashed"></div>
		<!--{/foreach}-->

        <div class="item_title item_margin">
		  <p>会员特权</p>
		  <span class="shadow"></span>
		  <span class="rtips">（灰色项表示没有权限，绿色项表示有权限）</span>
		</div>

		<!--{foreach $group as $volist}-->
        <div class="tq_list_title"><!--{$volist.groupname}-->特权</div>
        <div class="tq_list"> 
		<!-- span class="tq_item">每天登录积分(<!--{$volist.loginpoints}-->)</span--> 
		<span class="tq_item">上传照片(<!--{if $volist.photo.photolimit==1}--><!--{$volist.photo.photonum}-->张 <!--{else}--> 不限<!--{/if}-->)</span> 
		<span class="tq_item">关注好友(<!--{if $volist.friend.friendlimit==1}--><!--{$volist.friend.friendnum}--> 个 <!--{else}--> 不限<!--{/if}-->)</span> 

		<span class="tq_item">每天给同性会员发信件(<!--{if $volist.msg.txsendlimit==1}--><!--{$volist.msg.txsendnum}--> 封 <!--{else}--> 不限<!--{/if}-->)</span> 
		<span class="tq_item">每天查看同性会员信件(<!--{if $volist.msg.txviewlimit==1}--><!--{$volist.msg.txviewnum}--> 封 <!--{else}--> 不限<!--{/if}-->)</span> 
		<span class="tq_item">每天给异性会员发信件(<!--{if $volist.msg.yxsendlimit==1}--><!--{$volist.msg.yxsendnum}--> 封 <!--{else}--> 不限<!--{/if}-->)</span> 
		<span class="tq_item">每天查看异性会员信件(<!--{if $volist.msg.yxviewlimit==1}--><!--{$volist.msg.yxviewnum}--> 封 <!--{else}--> 不限<!--{/if}-->)</span> 

		<span class="tq_item<!--{if $volist.msg.msgistop==1}--> ee<!--{else}--> cc<!--{/if}-->">信件置顶</span> 
		<span class="tq_item<!--{if $volist.view.viewcontact=='1'}--> ee<!--{else}--> cc<!--{/if}-->">查看会员联系方式</span> 
		<span class="tq_item<!--{if $volist.view.viewlogintime=='1'}--> ee<!--{else}--> cc<!--{/if}-->">查看会员登录情况</span> 
		<span class="tq_item<!--{if $volist.view.viewvisitor=='1'}--> ee<!--{else}--> cc<!--{/if}-->">查看最近访客</span> 
		<span class="tq_item<!--{if $volist.view.viewmatch=='1'}--> ee<!--{else}--> cc<!--{/if}-->">查看缘分速配</span> 
		<span class="tq_item<!--{if $volist.view.useadvsearch=='1'}--> ee<!--{else}--> cc<!--{/if}-->">使用会员高级搜索</span> 
		<span class="tq_item<!--{if $volist.view.viewonlineuser=='1'}--> ee<!--{else}--> cc<!--{/if}-->">访问会员在线页面</span> 
		</div>
        <div class="clear"></div>
		<!--{/foreach}-->

      </div>
	  <!--// vip_list End-->
	  </form>

    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=vip">会员升级</a></li>
      <li><a href="<!--{$ucfile}-->?c=payment">在线充值</a></li>
	  <!--{if $config.app.card=='1'}-->
      <li><a href="<!--{$ucfile}-->?c=card">充值卡充值</a></li>
	  <!--{/if}-->
      <li><a href="<!--{$ucfile}-->?c=buysms">购买短信</a></li>
	  <li><a href="<!--{$ucfile}-->?c=buypostage">购买邮票</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script language="javascript">
function checkvip(){
	var t = "";
	t = 'viptype';
	var item = $("input[name='viptype']:checked");
	var len  = item.length;
	if(len==0) {
		$.dialog({
			lock:true,
			title: '错误',
			content: '请选择要升级的类别(有效期)', 
			icon: 'error',
			button: [{name: '确定'}]
		});
		return false;
	}
	<!--{if $u.vip==1}-->
		$.dialog({
			lock:true,
			title: '温馨提示',
			content: '您当前所在的会员组还没有到期，确定重新升级？', 
			icon: 'warning',
			button: [
				{
					name: '确定',
					callback: function () {
						$('#vip_form').submit();
						return true;
					}
				}, 
				{
					name: '取消'
				}
			]
		});
	<!--{else}-->
		$.dialog({
			lock:true,
			title: '温馨提示',
			content: '确定要升级吗？', 
			icon: 'warning',
			button: [
				{
					name: '确定',
					callback: function () {
						$('#vip_form').submit();
						return true;
					}
				}, 
				{
					name: '取消'
				}
			]
		});
	<!--{/if}-->
}
</script>
