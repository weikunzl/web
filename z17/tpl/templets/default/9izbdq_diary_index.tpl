<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='diary'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce member">
    <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->

    <div class="left blog">

      <div class="ad">
        <div class="leftad">
	    <!--{assign var='ads' value=get_ads('diary_banner_1')}-->
	    <!--{if !empty($ads)}-->
	    <a <!--{if !empty($ads.url) && $ads.url!='#'}-->href="<!--{$ads.url}-->" target="<!--{$ads.target}-->"<!--{/if}-->><img src="<!--{$ads.uploadfiles}-->" width='<!--{$ads.width}-->' height='<!--{$ads.height}-->' border='0' title="<!--{$ads.title}-->" /></a>
	    <!--{/if}-->
	    <!--{assign var='ads' value=get_ads('diary_banner_2')}-->
	    <!--{if !empty($ads)}-->
	    <a <!--{if !empty($ads.url) && $ads.url!='#'}-->href="<!--{$ads.url}-->" target="<!--{$ads.target}-->"<!--{/if}-->><img src="<!--{$ads.uploadfiles}-->" width='<!--{$ads.width}-->' height='<!--{$ads.height}-->' border='0' title="<!--{$ads.title}-->" /></a>
	    <!--{/if}-->
		</div>
        <div class="le2">
		  

          <div class='elite'>
		    <!--{assign var='elitediary' value=vo_list("mod={diary} where={v.elite='1'} num={1}")}-->
			<!--{foreach $elitediary as $volist}-->
		    <a href="<!--{$volist.url}-->" target="_blank"><!--{$volist.title}--></a> <br>
            <div class="rzjie"><!--{$volist.content|filterhtml:85}-->...</div>
			<!--{/foreach}-->
          </div>

          <ul class="rzul">
		    <!--{assign var='newdiary' value=vo_list("mod={diary} num={6}")}-->
			<!--{foreach $newdiary as $volist}-->
            <li><a href="<!--{$volist.url}-->"><span> ▪ </span><!--{$volist.title}--></a></li>
			<!--{/foreach}-->
            <div style="clear:both"></div>
          </ul>
          <div class="rztu">
		    <!--{assign var='picdiary' value=vo_list("mod={diary} where={v.thumbfiles != ''} num={3}")}-->
			<!--{foreach $picdiary as $volist}-->
            <div class="stu"><img src="<!--{$volist.thumbfiles}-->" width='100px' height='75px'><a href="<!--{$volist.url}-->" title="<!--{$volist.title}-->"><!--{$volist.title|filterhtml:8}--></a></div>
			<!--{/foreach}-->
          </div>
          <span class="neww"> <img src="<!--{$skinpath}-->themes/images/new_diary.png"></span> </div>
        <div style="clear:both"></div>
      </div>

      <div class="aa">
		
		<!--{assign var="diary_cat" value=vo_list("mod={diarycat}")}-->
	    <!--{foreach $diary_cat as $volist}-->
        <div class="<!--{if $volist.i % 2 == 0}-->a2<!--{else}-->a1<!--{/if}-->">
          <h2>
            <div>⿻ <a href="<!--{$appfile}-->?c=diary&a=list&cid=<!--{$volist.catid}-->" target="_blank"><!--{$volist.catname}--></a></div>
            <a href="<!--{$appfile}-->?c=diary&a=list&cid=<!--{$volist.catid}-->" class="mo" target="_blank">更多&gt;&gt;</a>
		  </h2>
          <ul>
		    <!--{assign var='diary' value=vo_list("mod={diary} where={v.catid='<!--{$volist.catid}-->'} num={6}")}-->
			<!--{foreach $diary as $val}-->
            <li><a href="<!--{$val.url}-->" target="_blank"><span> ▪ </span><!--{$val.title}--></a></li>
			<!--{/foreach}-->
            <div style="clear:both"></div>
          </ul>
        </div>
		<!--{/foreach}-->

      </div>
    </div>

    <div class="right">
      <h2>猜你喜欢</h2>
	  <!--{assign var='mchuser' value=vo_list("mod={matchuser} num={9}")}-->
	  <!--{foreach $mchuser as $volist}-->
      <div class="iemg"> <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{avatar width='80' height='96' value=$volist.avatarurl}--></a>
        <!--{$volist.levelimg}--><a href="<!--{$volist.homeurl}-->" title="<!--{$volist.username}-->" target="_blank"><!--{$volist.username}--></a><br>
        <!--{$volist.age}-->岁  <!--{area type='text' value=$volist.provinceid}-->
	  </div>
	  <!--{/foreach}-->
      <div style="clear:both;"></div>
      <h2 style="margin-top:5px;">最新日记</h2>
      <ul class="list_blog">
	    <!--{assign var='newdiary' value=vo_list("mod={diary} num={15}")}-->
		<!--{foreach $newdiary as $volist}-->
        <li><a target="_blank" href="<!--{$volist.url}-->" title="<!--{$volist.title}-->"><!--{$volist.title|filterhtml:20}--> </a> </li>
		<!--{/foreach}-->
      </ul>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>