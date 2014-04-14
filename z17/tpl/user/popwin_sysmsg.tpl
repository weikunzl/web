<style>
.popwin-msg-content {
	padding:5px;
	margin-right:10px;
}
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
<!--{if empty($sysmsg)}-->
<div class="popwin-nothing">对不起，暂无新消息。</div>
<!--{else}-->
<div class="popwin-msg-content">
<!--{foreach $sysmsg as $volist}-->
  <h3><!--{$volist.subject}--></h3>
  <p style="padding-bottom:10px;">
  <!--{$volist.content|filterhtml:95}-->...
  </p>
  <p style="color:#999;text-align:right;border-top:1px dashed #E6E1E2;padding-top:10px;">
   <!--{$volist.sendtime|date_format:"%Y/%m/%d %H:%M:%S"}-->&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="<!--{$urlpath}-->usercp.php?c=sysmsg&a=view&id=<!--{$volist.msgid}-->" style="color:#428DB8;">阅读消息&gt;&gt;</a>
  </p>
<!--{/foreach}-->
</div>
<!--{/if}-->