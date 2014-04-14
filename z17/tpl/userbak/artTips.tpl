<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<style>
.artTips-wrap{
	margin:0 auto;width:80%;
}
.artTips-content {
    background: url("<!--{$ucpath}-->images/artTips.jpg") no-repeat scroll left top #F7F7F7;
    height: auto !important;
    margin: 80px 0 15px;
    min-height: 63px;
    padding-left: 90px;
}
.artTips-remindClose {
	float: right;
    height: 15px;
    padding: 2px;
    width: 15px;
}
a.closeButtonA, a.closeButtonA:link, a.closeButtonA:visited, a.closeButtonA:hover {
    background: url("<!--{$ucpath}-->images/artTipscloseButton.jpg") no-repeat scroll center center transparent;
    display: block;
    height: 15px;
    text-decoration: underline;
    width: 15px;
}
a.closeButtonA:hover {
    background: url("<!--{$ucpath}-->images/artTipscloseButtonHover.jpg") no-repeat scroll center center transparent;
}

.artTips-remind {
    color: #666666;
    float: left;
    line-height: 22px;
    padding-top: 10px;
    width: 380px;
}
</style>
<!--{if empty($mod)}-->
<!--默认提示-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind"><!--{$content}--></div>
	<div class="clear"></div>
  </div>
</div>
<!--{/if}-->

<!--{if $mod == 'avatar'}-->
<!--上传头像-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
		你还没有形象照，这会大大影响征友效果，97%的人只看有照片的会员，同时无法打招呼和写信件，赶紧上传形象照吧！<a href="<!--{$urlpath}-->usercp.php?c=avatar" target="_top">马上上传&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<!--{/if}-->

<!--{if $mod == 'sms'}-->
<!--手机号码-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
		你的手机号码还没通过认证，只有认证了手机号码才能给会员发手机短信，赶紧去认证手机吧！<a href="<!--{$urlpath}-->usercp.php?c=certify" target="_top">马上认证&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<!--{/if}-->

<!--{if $mod == 'emailrz'}-->
<!--邮箱认证-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
	    你的邮箱还没进行验证，无法打招呼和写信件。验证邮箱可以提升您的诚信星级，还可以用来接收网站发送的邮件。
		<a href="<!--{$urlpath}-->usercp.php?c=certify" target="_top">马上认证&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<!--{/if}-->

<!--{if $mod == 'contact'}-->
<!--查看联系方式-->
<div class="artTips-wrap">
  <div class="artTips-content">
    <div class="artTips-remindClose">
	<a class="closeButtonA floatright" onclick="javascript:$.dialog.close();" href="###" title="关闭窗口"></a>
	</div>
	<div class="artTips-remind">
	    你的邮箱还没进行验证，无法查看会员联系方式。<a href="<!--{$urlpath}-->usercp.php?c=certify" target="_top">马上认证&gt;&gt;</a>
	</div>
	<div class="clear"></div>
  </div>
</div>
<!--{/if}-->


</body>
</html>