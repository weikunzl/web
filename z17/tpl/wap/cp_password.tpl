<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<h3 class="slide_bg_d">【修改密码】</h3>
<div class="index_p">
  <form method="post" action="<!--{$wapfile}-->?c=cp_info">
  <input type='hidden' name='a' value="savepassword" />
    旧 密 码：<br/>
    <input type="password" name="oldpassword" />
    <br/>
    新 密 码：<br/>
    <input type="password" name="newpassword" />
    <br/>
    确认新密码：<br/>
    <input type="password" name="confirmpassword" />
    <br />
    <input class="submit_b" type="submit" value="立即修改" />
  </form>
</div>
<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp">会员中心</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=editpassword">修改密码</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</html>
</html>