<div class="user_fixed-bar" id="user_header">
  <div class="user_containerss"> 
    <a href="<!--{$urlpath}-->"><img src="<!--{$ucpath}-->images/logo.png" class="user_logo" /></a>
    <ul class="user_top_menu">
	  <li><a href="<!--{$ucfile}-->">交友中心</a></li>
	  <li><a href="<!--{$urlpath}-->index.php?c=user">搜索会员</a></li>
	  <li><a href="<!--{$ucfile}-->?c=weibo">心情微播</a></li>
    </ul>
    <div class="user-top-setting">
	  <div class="user-top-avatar"><a href="<!--{$urlpath}-->usercp.php?c=avatar" title="设置形象照"><img src="<!--{$u.avatarurl}-->" width="25" height="25" /></a></div>
	  <div class="user-top-username"><a href="<!--{$u.homeurl}-->" target="_blank" title="访问我的主页"><!--{$u.username}--></a></div>
	  <div class="user-top-tips">
		<div class="user-top-tips-list">
		  <!--{assign var="count_msg" value=<!--{count mod='user' type='newmessage' value=$u.userid}-->}-->
		  <a href="<!--{$urlpath}-->usercp.php?c=message">未读信件(<!--{if $count_msg>99}-->99+<!--{else}--><!--{$count_msg}--><!--{/if}-->)</a>
		  
		  <!--{assign var="count_hi" value=<!--{count mod='user' type='newhi' value=$u.userid}-->}-->
		  <a href="<!--{$urlpath}-->usercp.php?c=hi">未读问候(<!--{if $count_hi>99}-->99+<!--{else}--><!--{$count_hi}--><!--{/if}-->)</a>
		  
		  <!--{assign var="count_sys" value=<!--{count mod='user' type='system' value=$u.userid}-->}-->
		  <a href="<!--{$urlpath}-->usercp.php?c=sysmsg">系统消息(<!--{if $count_sys>99}-->99+<!--{else}--><!--{$count_sys}--><!--{/if}-->)</a>
		</div>
		<div class="user-top-tips-ol" name='tip_title'>
		  <span class="user-top-tips-btn">信件&nbsp;<img src="<!--{$ucpath}-->images/jiantou.gif" /></span>
		</div>
	  </div>
	  <div class="user-top-set"><a href="<!--{$ucfile}-->?c=certify">认证</a></div>
	  <div class="user-top-set"><a href="<!--{$ucfile}-->?c=payment">充值</a></div>
	  <div class="user-top-set"><a href="<!--{$ucfile}-->?c=account&a=editpassword">修改密码</a></div>
	  <div class="user-top-logout"><a href="<!--{$urlpath}-->index.php?c=passport&a=logout">退出</a></div>
	</div>
    <div class="clear"></div>
  </div>
</div>
<script type='text/javascript'>
$(function() {
	$(".user-top-tips").on ({
        mouseover: function() {
		    $("div[name='tip_title']").removeClass("user-top-tips").addClass("user-top-tips-on");
			$(".user-top-tips-list").show();
        },
        mouseout: function() {
			$("div[name='tip_title']").removeClass("user-top-tips-on").addClass("user-top-tips");
			$(".user-top-tips-list").hide();
        }
	});
});
</script>