<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='info'}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce member">
    <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->
    <div class="left ri_list">
      <img src="<!--{$skinpath}-->themes/images/path_info.jpg">
      
	  <!--{assign var='infocatlist' value=vo_list("mod={infocat}")}-->
	  <!--{if !empty($infocatlist)}-->
      <div class='listtype'>
	  <a href="<!--{$appfile}-->?c=info&a=list"<!--{if $cid==0}--> class='listnow'<!--{/if}-->>全部文章</a> 
	  <!--{foreach $infocatlist as $val}-->
	  <a href="<!--{$val.url}-->"<!--{if $cid==$val.catid}--> class='listnow'<!--{/if}-->><!--{$val.catname}--></a>
	  <!--{/foreach}-->
	  </div>
	  <!--{/if}-->
      <div class="content">
        <ul>
		  <!--{foreach $info as $volist}-->
          <li>
           <a href="<!--{$volist.url}-->" class="tit" target="_blank" title="<!--{$volist.title}-->"> ▪ <!--{$volist.title}--> </a> <span><!--{$volist.addtime|date_format:"%Y-%m-%d"}--></span>
          </li>
		  <!--{if $volist.i%5 == 0}-->
		  <!--{if $volist.i==$pagesize}-->
		  <!--{else}-->
		  </ul>
		  <ul>
		  <!--{/if}-->
		  <!--{/if}-->
		  <!--{/foreach}-->
        </ul>
      </div>
	  <!--{if !empty($showpage)}-->
      <div class="page1">
        <div class="pagecode">
		<!--{$showpage}-->
        </div>
        <div style="clear:both;"></div>
      </div>
	  <!--{/if}-->

    </div>
    <div class="right yue1">
     <h2>最新日记</h2>
      <ul class="list_blog">
	    <!--{assign var='diary' value=vo_list("mod={diary} num={10}")}-->
		<!--{foreach $diary as $volist}-->
        <li><a target="_blank" href="<!--{$volist.url}-->" title="<!--{$volist.title}-->"><!--{$volist.title|filterhtml:20}--></a> </li>
		<!--{/foreach}-->
      </ul>
      <h2 style="margin-top:10px;">猜你喜欢</h2>
	  <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->user_80x96.tpl"}-->
      <div style="clear:both;"></div>
     
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>