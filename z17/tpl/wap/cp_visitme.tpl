<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<div class="slide_bg_l pl_5">
<a href="<!--{$wapfile}-->?c=cp_visit&a=visitme">谁看过我</a>|<a href="<!--{$wapfile}-->?c=cp_visit">我看过谁</a>
</div>
<h3 class="slide_bg_d">谁看过我</h3>
<div class="index_p">
  
  <!--{if empty($visitme)}-->
  还没有人访问您的主页哦！
  <!--{else}-->

  <!--{foreach $visitme as $volist}-->
  <div class="user_list"> <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.viewuserid}-->"><!--{avatar width='40' height='50' value=$volist.avatarurl}--></a><br/>
    <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.viewuserid}-->">
	<!--{$volist.username}--> <!--{$volist.age}-->岁 <!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}--> <!--{hook mod='var' type='text' item='education' value=$volist.education}--> <!--{hook mod='var' type='text' item='salary' value=$volist.salary}-->
	</a><br/>
  </div>
  <!--{/foreach}-->

  <!--{/if}-->

  <!--{if !empty($showpage)}-->
  <div class="page"><!--{$showpage}--></div>
  <!--{/if}-->

</div>

<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp">会员中心</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_visit&a=visitme">谁看过我</a></p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
