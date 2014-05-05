<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<h3 class="slide_bg_d pl_5">【给<!--{$touser.username}-->写信件】</h3>
<div class="index_p">
  <div>
    <form action="<!--{$wapfile}-->?c=cp_do" method="post" style="margin:0;">
	  <input type="hidden" name="a" value="savewrite" />
	  <input type="hidden" name="touid" value="<!--{$touid}-->" />
      <textarea name="content"  rows="5" cols="30"></textarea>
      <br />
      <input type="submit" name="submit" class="submit_b" value="发送信件" />
      <br />
    </form>
	<br />
	您当前余额：<font color="green"><b><!--{$login.info.money}--></b></font>元，如果不够支付，请先充值&gt;&gt;<br />
	<!--{if true === $paystatus}-->
	您必须支付<font color="red"><b><!--{$fee}--></b></font>元才可以给TA写这封信。
	<!--{else}-->
	您可以免费给TA写信件，信件内容必须是健康。
	<!--{/if}-->
  </div>
</div>
<p class="slide_bg_l pl_5">
当前位置：<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp">会员中心</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_do&a=writemsg&touid=<!--{$touid}-->">写信件</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>