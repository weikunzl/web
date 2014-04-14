<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="index_p"> 
  有<!--{$config.countusers|number_format}-->位会员在寻找真爱 <br />
  <a href="<!--{$wapfile}-->?c=online&a=list&s_sex=1">当前在线男会员</a><br />
  <a href="<!--{$wapfile}-->?c=online&a=list&s_sex=2">当前在线女会员</a><br />
  <a href="<!--{$wapfile}-->?c=user&a=advsearch">进入高级搜索</a><br />
  <h4 class="slide_bg_d">【推荐会员】</h4>
  <div> 
    <!--{if $login.status == 1}-->
	    <!--{if $login.info.gender == 1}-->
			<!--{assign var='user' value=vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='2'} num={5}")}--> 
		<!--{else}-->
			<!--{assign var='user' value=vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='1'} num={5}")}--> 
		<!--{/if}-->
	<!--{else}-->
	<!--{assign var='user' value=vo_list("mod={listuser} type={elite} where={v.avatar='1'} num={5}")}--> 
	<!--{/if}-->
	<!--{foreach $user as $volist}-->
	<!--{if $volist.i==1}-->
    <!--{avatar width='40' height='49' value=$volist.avatarurl}--><br />
	<!--{/if}-->
    <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.userid}-->"><!--{$volist.username}--> /<!--{if $volist.gender==1}-->男<!--{else}-->女<!--{/if}-->/<!--{$volist.age}-->/<!--{area type='text' value=$volist.cityid}--> </a> <br />
	<!--{/foreach}-->
    <p class="slide_bg_l"><a href="<!--{$wapfile}-->?c=user&a=list">更多会员&gt;&gt;</a></p>
  </div>
  <a href="<!--{$wapfile}-->?c=index&a=client">手机客户端下载</a><br />
  <p class="slide_bg_l"> 

    <!--{assign var='abouttip' value=vo_list("mod={about} where={v.navshow='1'} num={4}")}-->
	<!--{foreach $abouttip as $volist}-->
    <a href="<!--{$wapfile}-->?c=about&a=detail&id=<!--{$volist.abid}-->"><!--{$volist.title}--></a><!--{if $volist.i%2!=0}-->&nbsp;|&nbsp;<!--{/if}-->
	<!--{if $volist.i % 2 == 0}--><br /><!--{/if}-->
	<!--{/foreach}-->

  </p>
</div>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>