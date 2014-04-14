<div class="top">
  <!--{if $login.status == 1}-->
  欢迎您：<!--{$login.info.levelimg}--><!--{$login.info.username}-->(ID:<!--{$login.userid}-->)<br />
  <a href="<!--{$wapfile}-->?c=cp_message">您有封 (<!--{count mod='user' type='newmessage' value=$login.userid}-->) 新信件</a><br />
  <!--{/if}-->
  <p>
  <a href="<!--{$wapfile}-->">首页</a>|
  <a href="<!--{$wapfile}-->?c=user&a=list">搜索</a>|
  <!--{if $login.status==1}-->
  <a href="<!--{$wapfile}-->?c=cp">会员中心</a>|
  <a href="<!--{$wapfile}-->?c=passport&a=logout">退出登录</a>
  <!--{else}-->
  <a href="<!--{$wapfile}-->?c=passport&a=login">登录</a>|
  <a href="<!--{$wapfile}-->?c=passport&a=reg">注册 </a>
  <!--{/if}-->
  </p>
</div>