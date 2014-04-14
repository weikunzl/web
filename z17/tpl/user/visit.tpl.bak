<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="visit"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 我看过谁</div>

    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=listen">我的关注</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=fans">我的粉丝</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=visitme">谁看过我</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=visit">我看过谁</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=black">黑名单</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <!--{if $a eq 'run'}-->
	  <!--{if empty($visit)}-->
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td align="center">对不起，暂无浏览记录！</td>
		</tr>
	  </table>
	  <!--{else}-->
	  <!--{foreach $visit as $volist}-->
	  
	  <div class="myfan_item">
	    <div class="myfan_logo">
		  <img class="user-logo" src="<!--{$volist.avatarurl}-->" width="50" height="60" />
		</div>
	    <div class="myfan_info">
		  <div style="width:100%;">
		    <strong><a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a></strong>
			<div class="myfan-button" id="tips_listen_<!--{$volist.homeuserid}-->"><script>obj_listen_status('<!--{$volist.homeuserid}-->', 'tips_listen_<!--{$volist.homeuserid}-->');</script></div>
			<span><a href="###" onclick="artbox_complaint('<!--{$volist.homeuserid}-->');">举报</a></span>
			<span><a href="###" onclick="artbox_sendgift('<!--{$volist.homeuserid}-->');">送礼物</a></span>
			<span><a href="###" onclick="artbox_writemsg('<!--{$volist.homeuserid}-->');">发信件</a></span>
			<span><a href="###" onclick="artbox_hi('<!--{$volist.homeuserid}-->');">打招呼</a></span>
		  </div>
		  <div class="myfan_x">
			<!--{$volist.age}-->岁 <!--{hook mod='var' type='text' item='marrystatus' value=$volist.marrystatus}--> <!--{$volist.height}-->CM&nbsp;&nbsp;
		    <!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}-->&nbsp;&nbsp;
		    <!--{hook mod='var' type='text' item='education' value=$volist.education}-->&nbsp;&nbsp;<!--{hook mod='var' type='text' item='salary' value=$volist.salary}-->
		  </div>
		  <div class="myfan_d">
		  <!--{if $volist.molstatus==1}-->
		  <!--{$volist.monolog|filterhtml:100}-->...
		  <!--{else}-->
		  <font color='#999999'>暂无内心独白</font>
		  <!--{/if}-->
		  </div>
		</div>
		<div class="clear"></div>
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
      <li><a href="<!--{$ucfile}-->?c=listen">我的关注</a></li>
      <li><a href="<!--{$ucfile}-->?c=fans">我的粉丝</a></li>
	  <li><a href="<!--{$ucfile}-->?c=visitme">谁看过我</a></li>
	  <li><a href="<!--{$ucfile}-->?c=visit">我看过谁</a></li>
	  <li><a href="<!--{$ucfile}-->?c=black">黑名单</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
