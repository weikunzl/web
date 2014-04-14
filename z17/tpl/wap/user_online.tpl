<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<p class="slide_bg_l pl_5"> 
<a href="<!--{$wapfile}-->?c=online&a=list">在线会员</a>
</p>
<h3 class="slide_bg_d mb_0">【<!--{if $s_sex==1}-->在线男会员<!--{elseif $s_sex==2}-->在线女会员<!--{else}-->在线会员<!--{/if}-->】</h3>
<p class="slide_bg_l pl_5" style="display:;"> <a href="<!--{$wapfile}-->?c=online&a=list&s_sex=2">在线女会员</a> | <a href="<!--{$wapfile}-->?c=online&a=list&s_sex=1">在线男会员</a> </p>
<div class="index_p">
  <!--{foreach $online as $volist}-->
  <div class="user_list"> 
    <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.userid}-->"> <!--{avatar width='40' height='49' value=$volist.avatarurl}--> </a><br />
    <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.userid}-->"><!--{$volist.username}--></a> -<!--{if $volist.gender== 1}-->男<!--{else}-->女<!--{/if}-->-<!--{$volist.age}-->岁<br /><!--{area type='text' value=$volist.provinceid}--><!--{area type='text' value=$volist.cityid}-->
    -<a href="<!--{$wapfile}-->?c=cp_do&a=hi&touid=<!--{$volist.userid}-->">打招呼</a>-<a href="<!--{$wapfile}-->?c=cp_do&a=writemsg&touid=<!--{$volist.userid}-->">写信件</a> <br/>
  </div>
  <!--{/foreach}-->
  <div class="page"><!--{$showpage}--></div>
</div>
<p class="slide_bg_l pl_5"> 当前位置:<br />
  <a href="<!--{$wapfile}-->">首页</a> &gt;&gt; 在线会员 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</div>
</body>
</html>