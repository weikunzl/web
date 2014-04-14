	  <!--{assign var='mchuser' value=vo_list("mod={matchuser} num={9}")}-->
	  <!--{foreach $mchuser as $volist}-->
      <div class="img_list"> <a href="<!--{$volist.homeurl}-->"><!--{avatar width='80' height='96' css='h3h' value=$volist.avatarurl}--></a><br />
        <!--{$volist.levelimg}--><a href="<!--{$volist.homeurl}-->"><!--{$volist.username}--></a><br>
        <!--{$volist.age}-->岁  <!--{area type='text' value=$volist.provinceid}--> </div>
	  <!--{/foreach}-->