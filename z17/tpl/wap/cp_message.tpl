<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->

<p class="slide_bg_l pl_5 mb_0"> 
  <a href="<!--{$wapfile}-->?c=cp_message">会员来信</a>|<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg">已发信件</a>
</p>

<!--{if $a eq 'run'}-->
<h3 class="slide_bg_d pl_5">【会员来信】</h3>
<p class="slide_bg_l pl_5 mb_0"> 
<a href="<!--{$wapfile}-->?c=cp_message">全部</a>|<a href="<!--{$wapfile}-->?c=cp_message&type=unread">未读</a>|<a href="<!--{$wapfile}-->?c=cp_message&type=topunread">未读置顶</a>
</p>
<div class="index_p">
  
  <!--{if empty($message)}-->
  对不起，没有会员来信！
  <!--{else}-->

  <!--{foreach $message as $volist}-->
  <div> 
    <a href="<!--{$wapfile}-->?c=home&uid=<!--{$volist.fromuserid}-->">
    <!--{avatar width='40' height='50' value=$volist.avatarurl}--></a> <br />
    <!--{$volist.username}--> <!--{$volist.age}-->岁 <!--{area type='text' value=$volist.cityid}--> <br />
    <!--{$volist.sendtime|date_format:"%m/%d %H:%M"}--> <br />
    <!--{if $volist.readflag==0}--><font color="#999999">未读</font><!--{else}--><font color="green">已读</font><!--{/if}--> <a href="<!--{$wapfile}-->?c=cp_message&a=readmsg&id=<!--{$volist.msgid}-->&page=<!--{$page}-->&<!--{$urlitem}-->">阅读信件</a>
  </div>
  <div class="bot1"></div>
  <!--{/foreach}-->

  <!--{/if}-->

  <!--{if !empty($showpage)}-->
  <div class="page"><!--{$showpage}--></div>
  <!--{/if}-->
</div>
<!--{/if}-->


<!--{if $a eq 'readmsg'}-->
<h3 class="slide_bg_d pl_5">【阅读会员来信】</h3>
<div class="index_p">
  <div> 
    发 件 人：<a href="<!--{$wapfile}-->?c=home&uid=<!--{$message.frominfo.userid}-->"><!--{$message.frominfo.username}--></a><br />
	发件时间：<!--{$message.sendtime|date_format:"%m/%d %H:%M"}--> <br />
	信件内容：<!--{$message.content}-->
  </div>
</div>
<p>
<a href="<!--{$wapfile}-->?c=cp_message&<!--{$comeurl}-->">返回上一页</a>
</p>
<!--{/if}-->

<p class="slide_bg_l pl_5">
当前位置：<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_message">会员来信</a> 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</html>