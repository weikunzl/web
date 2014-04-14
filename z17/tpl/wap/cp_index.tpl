<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->

<div class="index_p"> 
<a href="<!--{$wapfile}-->?c=cp_info">资料修改</a>&nbsp;&nbsp;
<a href="<!--{$wapfile}-->?c=home&uid=<!--{$login.userid}-->">预览</a><br/>
我的金币：<!--{$login.info.money}-->&nbsp;&nbsp;<br/>
我的积分：<!--{$login.info.points}-->&nbsp;&nbsp;<br />
</div>
<h3 class="slide_bg_d">【会员中心】</h3>
<div class="index_p"> 
  <a href="<!--{$wapfile}-->?c=cp_message">我的信件</a>|<a href="<!--{$wapfile}-->?c=cp_message&a=outmsg">已发信件</a><br/>
  <a href="<!--{$wapfile}-->?c=cp_visit&a=visitme">谁看过我</a>|<a href="<!--{$wapfile}-->?c=cp_visit">我看过谁</a><br />
  <a href="<!--{$wapfile}-->?c=cp_listen">我关注的会员</a><br/>
  <a href="<!--{$wapfile}-->?c=cp_fans">关注我的会员</a><br/>
  <div class="bot1"> </div>
  <a href="<!--{$wapfile}-->?c=cp_money">金币记录</a>|<a href="<!--{$wapfile}-->?c=cp_points">积分记录</a><br/>
  <a href="<!--{$wapfile}-->?c=cp_info&a=editpassword">修改密码</a>|<a href="<!--{$wapfile}-->?c=passport&a=logout">退出登录</a><br/>
</div>
<p class="slide_bg_l pl_5">
当前位置：<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp">会员中心</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
