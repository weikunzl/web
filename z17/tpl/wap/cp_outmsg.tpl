<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->

<p class="slide_bg_l pl_5 mb_0"> 
  <a href="<!--{$wapfile}-->?c=cp_message">会员来信</a>|<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg">已发信件</a>
</p>

<!--{if $a eq 'outmsg'}-->
<h3 class="slide_bg_d pl_5">【已发信件】</h3>
<p class="slide_bg_l pl_5 mb_0"> 
<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg">全部</a>|<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg&type=unread">未读</a>|<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg&type=read">已读</a>
</p>
<div class="index_p">
  
  <!--{if empty($outmsg)}-->
  对不起，没有已发信件！
  <!--{else}-->

  <!--{foreach $outmsg as $volist}-->
  <div> 
    <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.touserid}-->">
    <!--{avatar width='40' height='50' value=$volist.avatarurl}--></a> <br />
    <!--{$volist.username}--> <!--{$volist.age}-->岁 <!--{area type='text' value=$volist.cityid}--> <br />
    <!--{$volist.sendtime|date_format:"%m/%d %H:%M"}--> <br />
    <!--{if $volist.readflag==0}-->未读<!--{else}-->已读<!--{/if}--> <a href="<!--{$wapfile}-->?c=cp_message&a=viewoutmsg&id=<!--{$volist.msgid}-->&page=<!--{$page}-->&<!--{$urlitem}-->">查看详情</a>
  </div>
  <div class="bot1"></div>
  <!--{/foreach}-->

  <!--{/if}-->

  <!--{if !empty($showpage)}-->
  <div class="page"><!--{$showpage}--></div>
  <!--{/if}-->
</div>
<!--{/if}-->


<!--{if $a eq 'viewoutmsg'}-->
<h3 class="slide_bg_d pl_5">【已发信件】</h3>
<div class="index_p">
  <div> 
    收 件 人：<a href="<!--{$wapfile}-->?c=home&uid=<!--{$outmsg.touserid}-->"><!--{$outmsg.username}--></a><br />
	发件时间：<!--{$outmsg.sendtime|date_format:"%m/%d %H:%M"}--> <br />
	信件内容：<!--{$outmsg.content}-->
  </div>
</div>
<p>
<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg&<!--{$comeurl}-->">返回上一页</a>
</p>
<!--{/if}-->

<p class="slide_bg_l pl_5">
当前位置：<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_message&a=outmsg">已发信件</a> 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</html>