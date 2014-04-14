<style>
.popwin-msg-content {
	padding:5px;
	margin-right:10px;
}
.popwin-msg-content li {
	width:90px;float:left;padding-left:5px;padding-right:5px;
}
.popwin-msg-content li span {
	display:block;color:#999999;text-align:center;
}

.popwin-msg-content .popwin-gift {width:80px;height:80px;padding:1px;border:1px solid #eeeeee;}
.popwin-msg-content .popwin-giftname {display:block;text-align:center;overflow:hidden;height:25px;line-height:25px;}

.popwin-msg-content h3 {
	text-align:left;display:block;
	height:25px;
	font-size:14px;
	color:#333333;
}
.popwin-msg-content p {
	text-align:left;
	line-height:20px;
}
</style>
<!--{if empty($gift)}-->
<div class="popwin-nothing">对不起，暂无收到新礼物。</div>
<!--{else}-->
<div class="popwin-msg-content">
  <ul>
    <!--{foreach $gift as $volist}-->
	<li>
	  <div class="popwin-gift"><a href="<!--{$urlpath}-->usercp.php?c=gift&a=viewreceive&id=<!--{$volist.recordid}-->" title="点击查看"><img src="<!--{$urlpath}--><!--{$volist.imgurl}-->" width="80px" height="80px" /></a></div>
	  <div class="popwin-giftname"><!--{$volist.giftname}--></div>
	  <span><!--{$volist.sendtimeline|date_format:"%Y-%m-%d %H:%M:%S"}--></span>
	</li>
	<!--{/foreach}-->
  </ul>
  <div class="clear"></div>
</div>
<!--{/if}-->