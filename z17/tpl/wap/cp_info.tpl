<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<h3 class="slide_bg_d">【用户资料】 <a href="<!--{$wapfile}-->?c=home&uid=<!--{$login.info.userid}-->">预览我的资料</a></h3>
<div class="index_p">
  <div> 
    <a href="<!--{$wapfile}-->?c=cp_info&a=avatar">形 象 照</a><!--{if !empty($login.info.avatar)}--><font color="green">√</font><!--{else}--><font color="red">×</font><!--{/if}--><br />
    <a href="<!--{$wapfile}-->?c=cp_info&a=base">基本资料</a><br />
    <a href="<!--{$wapfile}-->?c=cp_info&a=monolog">内心独白</a><br />
    <a href="<!--{$wapfile}-->?c=cp_info&a=profile">详细资料</a><br />
    <a href="<!--{$wapfile}-->?c=cp_info&a=contact">联系资料</a><br />
	<a href="<!--{$wapfile}-->?c=cp_info&a=area">修改地区</a><br />
    <a href="<!--{$wapfile}-->?c=cp_photo">我的相片(<!--{count mod='user' type='album' value=$login.userid}-->张)</a><br />
  </div>
</div>
<p class="slide_bg_l pl_5">
当前位置：<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info">用户资料</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>