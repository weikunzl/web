<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='info'}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="member">
    <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->
	<div class="current_path">
	  <div id="rank" class="search_sle">你的位置：<a href="<!--{$appfile}-->">首页</a> &gt;&gt; <a href="<!--{$appfile}-->?c=info">新闻公告</a> &gt;&gt; 正文 </div>
	</div>

    <div class="ableft">
	  <!--{assign var='infocat' value=vo_list("mod={infocat}")}-->
	  <!--{foreach $infocat as $volist}-->
      <h2 class='ablefth3'><a href="<!--{$volist.url}-->"><!--{$volist.catname}--></a></h2>
	  <!--{/foreach}-->
    </div>

    <div class="abright">
      <h2><!--{$info.title}--></h2>
	  <div class="jian">发表时间：<!--{$info.addtime|date_format:"%m-%d %H:%M"}-->&nbsp;&nbsp;&nbsp;&nbsp;浏览：<font id='json_hits'></font></div>
      <div class="abcontent">
	  <!--{$info.content}--> 
	  <br />
	  <!--{assign var='pluginaction' value=XHook::doAction('content_share')}-->
	  </div>
	  <div class="share">
		上一篇：<!--{$previous_item}--><br>
		下一篇：<!--{$next_item}-->
	  </div>

	  <div class="related_content">
		<div class="related_title">相关文章</div>
		<div class="related_w">
		  <!--{assign var='related' value=vo_list("mod={info} where={v.catid='<!--{$info.catid}-->' AND v.infoid!='<!--{$id}-->'} num={8}")}-->
		  <!--{foreach $related as $volist}-->
		  <div class="<!--{if $volist.i%2 == 2}-->related_wr<!--{else}-->related_wl<!--{/if}-->"> ▪ <a href="<!--{$volist.url}-->"><!--{$volist.title}--></a></div>
		  <!--{/foreach}-->
		<div class="c"></div>
		</div>
	  </div>


    </div>
    <div style="clear:both;"></div>

  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script type='text/javascript'>
$(function(){
	update_hits('<!--{$id}-->', 'info', 'json_hits');
});
</script>