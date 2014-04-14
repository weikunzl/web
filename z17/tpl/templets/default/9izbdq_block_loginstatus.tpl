	

	<div class='toplogin'>
	<!--{if $usercpmod == 'yes'}-->
	欢迎您：<!--{$u.levelimg}--><!--{$u.username}-->，<a href="<!--{$urlpath}-->usercp.php">会员中心</a> | <a href="<!--{$urlpath}-->usercp.php?c=payment">在线充值</a> | <a href="<!--{$urlpath}-->index.php?c=passport&a=logout">退出登录</a>
	<!--{else}-->
	<!--{if $login.status == 1}-->
	<!--{if $login.info.integrity==0}-->
	<!--{if $a !='perfect'}-->
	<script>alert('对不起，请先完善交友帐号信息，才能正常使用。');window.location.href="<!--{$urlpath}-->index.php?c=passport&a=perfect";</script>
	<!--{/if}-->
	<!--{/if}-->
	欢迎您：<!--{$login.info.levelimg}--><!--{$login.username}-->，<a href="<!--{$urlpath}-->usercp.php">会员中心</a> | <a href="<!--{$urlpath}-->usercp.php?c=payment">在线充值</a> | <a href="<!--{$appfile}-->?c=passport&a=logout">退出登录</a>
	<!--{else}-->
	游客欢迎您 <a href="<!--{$appfile}-->?c=passport&a=login">登录网站</a>&nbsp;|&nbsp;<a href="<!--{$appfile}-->?c=passport&a=reg">免费注册</a>
	<!--{/if}-->
	<!--{/if}-->
	</div>	
