<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<h3 class="slide_bg_d">【<!--{$home.username}-->相片列表】</h3>
<div class="index_p">
<!--{if empty($album)}-->
<p>
对不起，该会员还没上传相册。
</p>
<!--{else}-->
  <!--{foreach $album as $volist}-->
  <div class="bot1"> 
    <a href="<!--{$wapfile}-->?c=home&a=album_detail&id=<!--{$volist.photoid}-->&uid=<!--{$home.userid}-->"><img alt="<!--{$volist.title}-->" src="<!--{$volist.thumbfiles}-->" width="72" height="90" border="0" /></a> <br />
    <a href="<!--{$wapfile}-->?c=home&a=album_detail&id=<!--{$volist.photoid}-->&uid=<!--{$home.userid}-->">查看原图</a> <br />
  </div>
  <!--{/foreach}-->

  <!--{if !empty($showpage)}-->
  <div class="page"><!--{$showpage}--></div>
  <!--{/if}-->
<!--{/if}-->
</div>

<p class="slide_bg_l pl_5"> 
  <a href="<!--{$wapfile}-->?c=home&uid=<!--{$home.userid}-->">返回[<!--{$home.username}-->]资料页</a>
  <br />
  当前位置:<br />
  <a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=home&uid=<!--{$home.userid}-->"><!--{$home.username}--></a> &gt;&gt; 相片列表 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
