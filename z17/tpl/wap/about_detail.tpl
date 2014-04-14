<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="index_p">
  <p class="slide_bg_l pl_5"> 
	<!--{assign var='abouttip' value=vo_list("mod={about} where={v.navshow='1'} num={4}")}-->
	<!--{foreach $abouttip as $volist}-->
	<a href="<!--{$wapfile}-->?c=about&a=detail&id=<!--{$volist.abid}-->"><!--{$volist.title}--></a> <br />
	<!--{/foreach}-->
  </p>
  <h4 class="slide_bg_d">【<!--{$about.title}-->】</h4>
  <div>
  <!--{$about.content}-->
  </div>
</div>
<p class="slide_bg_l pl_5"> 
  当前位置：<br />
  <a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=about&a=detail&id=<!--{$id}-->"><!--{$about.title}--></a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>