<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<h3 class="slide_bg_d">【内心独白】</h3>
<div class="index_p">
  <div>
    <form action="<!--{$wapfile}-->?c=cp_info" method="post">
	<input type="hidden" name="a" value="savemonolog" />
      <textarea rows="5" cols="30" name="content"><!--{$login.info.monolog}--></textarea>
      <br />
      20-1500字 <br />
      <input class="submit_b" type="submit" value="保存"/>
    </form>
  </div>
</div>
<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info" >用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=monolog">内心独白</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>