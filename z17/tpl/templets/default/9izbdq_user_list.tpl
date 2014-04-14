<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='user'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="search_max w960 online_page">
	<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->
    <div class="search_sort">
      <div class="search_tips"> 共<span><!--{$total}--></span>人符合您的搜索条件 </div>
      <div class="search_sort_sle" id="rank"> 
	    <strong>显示方式：</strong> 		
	    <a class="btnc btn_c3" href="<!--{$appfile}-->?c=user&a=list<!--{if $page>1}-->&page=<!--{$page}--><!--{/if}--><!--{if !empty($urlitem)}-->&<!--{$urlitem}--><!--{/if}-->"> <span class='h'><b>头像模式</b></span> </a>&nbsp;
		<a class="btnc3 btn_c3" href="<!--{$appfile}-->?c=user&a=list<!--{if $page>1}-->&page=<!--{$page}--><!--{/if}-->&type=more<!--{if !empty($urlitem)}-->&<!--{$urlitem}--><!--{/if}-->"> <span><b>独白模式</b></span> </a> 
	  </div>
    </div>
    <div class="online_list">

      <ul class="search_pic_list clearfix">
	    <!--{foreach $user as $volist}-->
        <li>
          <div class="search_user_bg"> <a target="_blank" href="<!--{$volist.homeurl}-->"><!--{avatar width='112' height='135' css='img100' value=$volist.avatarurl}--></a> </div>
          <div class="search_user_inform">
            <p class="search_user_t1"><!--{$volist.levelimg}--><a target="_blank" href="<!--{$volist.homeurl}-->"><!--{$volist.username}--></a> </p>
            <p class="search_user_add"><!--{$volist.age}-->岁 <!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}--></p>
            <p class="search_vt"> 
				<a class="btn_bt1 chat sayHiBtn" href="###" onclick="artbox_hi(<!--{$volist.userid}-->);"><span><img src="<!--{$skinpath}-->themes/images/d.gif"></span></a> 
				<a class="btn_bt2 mail sendEmailBtn" href="javascript:void(0);" onclick="artbox_writemsg(<!--{$volist.userid}-->);"><span><img src="<!--{$skinpath}-->themes/images/r.gif"></span></a>
			</p>
          </div>
        </li>
	    <!--{/foreach}-->
        <div style="clear:both;"></div>
      </ul>
      <div style="clear:both;"></div>

	  <!--{if !empty($showpage)}-->
      <div class="page1">
        <div class="pagecode">
		<!--{$showpage}-->
        </div>
        <div style="clear:both;"></div>
      </div>
	  <!--{/if}-->

    </div>
    <div class="onright"> 

      <div class="divtitle">推荐会员</div>
      <div class="onhead">
	    <!--{assign var='eliteuser' value=vo_list("mod={spuser} type={elite} num={9}")}-->
		<!--{foreach $eliteuser as $volist}-->
        <div class="odh">
		  <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{avatar width='70' height='86' value=$volist.avatarurl}--></a><br>
          <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a>
		</div>
		<!--{/foreach}-->
        <div style="clear:both;"></div>
      </div>
      <div class="divtitle" style="margin-top:5px;">最新日记</div>
      <ul class="list_so">
	    <!--{assign var='diary' value=vo_list("mod={diary} orderby={v.hits DESC} num={15}")}-->
		<!--{foreach $diary as $volist}-->
        <li><a target="_blank" href="<!--{$volist.url}-->" title="<!--{$volist.title}-->"><!--{$volist.title|filterhtml:20}--></a> </li>
		<!--{/foreach}-->
      </ul>
      <div class="divtitle" style="margin-top:5px;">猜你喜欢</div>
      <div class="onhead">
	    <!--{assign var='mchuser' value=vo_list("mod={matchuser} num={9}")}-->
		<!--{foreach $mchuser as $volist}-->
        <div class="odh">
		  <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{avatar width='70' height='86' value=$volist.avatarurl}--></a><br>
          <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a>
		</div>
		<!--{/foreach}-->
        <div style="clear:both;"></div>
      </div>

	  <!--{assign var='ads' value=get_ads('channel_smbanner_2')}-->
	  <!--{if !empty($ads)}-->
	  <div class="onrightad"><a <!--{if !empty($ads.url) && $ads.url!='#'}-->href="<!--{$ads.url}-->" target="<!--{$ads.target}-->"<!--{/if}-->><img src="<!--{$ads.uploadfiles}-->" width='<!--{$ads.width}-->' height='<!--{$ads.height}-->' border='0' title="<!--{$ads.title}-->" /></a></div>
	  <!--{/if}-->
	  
	  </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>