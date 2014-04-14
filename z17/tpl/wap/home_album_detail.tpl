<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<h3 class="slide_bg_d">【<!--{$home.username}-->相片原图】</h3>
<div class="index_p">
  <div> <a href="<!--{$wapfile}-->?c=home&a=album&uid=<!--{$home.userid}-->">返回相片列表</a> </div>
</div>
<div>
<!--{if $nextid>0}-->
<a href="<!--{$wapfile}-->?c=home&a=album_detail&id=<!--{$nextid}-->&uid=<!--{$album.userid}-->">上一页</a> 
<!--{/if}-->
&nbsp;&nbsp;
<!--{if $previousid>0}-->
<a href="<!--{$wapfile}-->?c=home&a=album_detail&id=<!--{$previousid}-->&uid=<!--{$album.userid}-->">下一页</a> 
<!--{/if}-->
</div>
<div class="index_p">
  <div> 
    提示:由于图片较大,可能加载较慢! <br />
    <img src="<!--{$album.uploadfiles}-->" border="0" /> 
  </div>
</div>
<h3 class="slide_bg_d">【选择操作】</h3>

<div class="index_p">
  <div>
    <p> 
	{<a href="<!--{$wapfile}-->?c=cp_do&a=hi&touid=<!--{$home.userid}-->">打招呼</a>&nbsp;|&nbsp;
    <a href="<!--{$wapfile}-->?c=cp_do&a=writemsg&touid=<!--{$home.userid}-->">写信件</a>&nbsp;|&nbsp;
    <a href="<!--{$wapfile}-->?c=cp_do&a=listen&touid=<!--{$home.userid}-->">关注<!--{if $home.gender==1}-->他<!--{else}-->她<!--{/if}--></a>}
    </p>
  </div>
</div>

<p class="slide_bg_l pl_5"> 
  <a href="<!--{$wapfile}-->?c=home&uid=<!--{$home.userid}-->">返回[<!--{$home.username}-->]资料页</a>
  <br />
  当前位置:<br />
  <a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=home&uid=<!--{$home.userid}-->"><!--{$home.username}--></a> &gt;&gt; <a href="<!--{$wapfile}-->?c=home&a=album&uid=<!--{$home.userid}-->">相片列表</a> &gt;&gt; 相册原图
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>