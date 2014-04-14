<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="slide_bg_l pl_5">您所进行的操作需要先登录!</div>
<h3 class="slide_bg_d" >【<!--{$config.sitename}-->-会员登录】</h3>
<div class="index_p">
  <form method="post" action="<!--{$wapfile}-->?c=passport&forward=<!--{$forward}-->">
    <input type="hidden" name="a" value='loginpost' />
    <label> 用户名/邮箱：</label>
    <br />
    <input type="text" name="loginname" id="loginname" />
    <br />
    <label>密码：</label>
    <br />
    <input type="password" name="password" id='password' />
    <br />
    <input  class="submit_b" type="submit" value="立即登录" />
  </form>
  <a href="<!--{$wapfile}-->?c=passport&a=reg">注册新会员</a> 
</div>
<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">网站首页</a> &gt;&gt; 会员登录 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
