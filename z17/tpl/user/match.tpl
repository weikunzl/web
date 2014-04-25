<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="cp_menuid" value="match"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div class="user_main">
  <div class="main_right">
    <div class="div_"> 我的资料 &gt;&gt; 缘分速配</div>
	<div class="nav-tips">
	以下是根据您设定的择友条件，每天给您速配的会员结果。
	</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=cond">择友条件</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=match">缘分速配</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>缘分速配</p><span class="shadow"></span></div>
	  <!--{if $a eq 'run'}-->
	  <!--{if empty($match)}-->
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td align="center">对不起，暂无配对的会员，马上<a href="<!--{$ucfile}-->?c=cond">设置择友条件</a>，挑选会员！</td>
		</tr>
	  </table>
	  <!--{else}-->
	  <!--{foreach $match as $volist}-->
	  <div class="myfollow_item" id="myfollow_<!--{$volist.userid}-->">
		<div class="myfollow_logo"><a href="<!--{$volist.homeurl}-->" target="_blank"><img class="user-logo" src="<!--{$volist.avatarurl}-->" width="50" height="60" /></a></div>
		<ul class="myfollow_info">
		  <li><a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a>&nbsp;&nbsp;<!--{$volist.age}-->岁</li>
		  <li> 
		  <!--{hook mod='var' type='text' item='marrystatus' value=$volist.marrystatus}--> <!--{$volist.height}-->CM&nbsp;&nbsp;<!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}-->
		  </li>
		  <li>
		  <img src="<!--{$ucpath}-->images/cid<!--{if $volist.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $volist.idnumberrz==0}-->身份证未认证<!--{else}-->已身份证认证<!--{/if}-->" />
		  <img src="<!--{$ucpath}-->images/video<!--{if $volist.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $volist.videorz==0}-->视频未认证<!--{else}-->已视频认证<!--{/if}-->" />
		  <img src="<!--{$ucpath}-->images/email<!--{if $volist.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $volist.emailrz==0}-->邮箱未认证<!--{else}-->已邮箱认证<!--{/if}-->" /> 
		  </li>
		</ul>
		<div class="clear"></div>
		<div class="myfollow_db" id="myfollow_<!--{$volist.userid}-->_db">
		  <!--{if $volist.molstatus==1}-->
		  <!--{$volist.monolog|filterhtml:15}-->..
		  <!--{else}-->
		  <font color='#999999'>暂无内心独白</font>
		  <!--{/if}-->		
		</div>
		<div class="myfollow_gn" id="myfollow_<!--{$volist.userid}-->_gn">
		<a href="###" onclick="artbox_hi('<!--{$volist.userid}-->');">打招呼</a> | 
		<a href="###" onclick="artbox_writemsg('<!--{$volist.userid}-->');">写信件</a> | 
		<a href="###" onclick="artbox_sendgift('<!--{$volist.userid}-->');">送礼物</a>
		</div>
	  </div>
	  <!--{/foreach}-->
	  <div class="clear"></div>
	  <!--{if $showpage!=""}-->
	  <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	  <!--{/if}-->

	  <!--{/if}-->
	  <!--{/if}-->
    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=cond">择友条件</a></li>
      <li><a href="<!--{$ucfile}-->?c=match">缘分速配</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
/*粉丝关注*/
$(function() {
	$(".myfollow_item").bind({
		mouseover: function() {
			$("#" + $(this).attr("id") + "_db").hide();
			$("#" + $(this).attr("id") + "_gn").show();
		},
		mouseout: function() {
			$("#" + $(this).attr("id") + "_db").show();
			$("#" + $(this).attr("id") + "_gn").hide();
		}
	});
});
</script>
