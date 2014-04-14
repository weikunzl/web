<style>
.popwin-msg-content {
	padding:5px;
	margin-right:10px;
}
.popwin-msg-content p {
	padding-bottom:10px;
	text-align:left;
	line-height:25px;
}
.popwin-msg-content .popwin-buttons {
	height:30px;clear:both;
}
.popwin-button1 {
	background: none repeat scroll 0 0 #D83473;
    color: #FFFFFF;
	width:90px;
	border: 0 none;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
    height: 30px;
    text-align: center;
    vertical-align: top;
	display:inline;
	float:left;
	line-height:30px;
}
.popwin_a1{color:#ffffff;}
.popwin-button1 a:hover{color:#ffffff;}
.popwin-button2 {
	background: none repeat scroll 0 0 #EADFDF;
    color: #8E5A5C;
	width:90px;
	border: 0 none;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
    height: 30px;
    text-align: center;
    vertical-align: top;
	display:inline;
	float:right;
	line-height:30px;
}
.popwin-button2 a {color:#8E5A5C;}
.popwin-button2 a:hover{color:#8E5A5C;}
</style>
<!--{if empty($hi)}-->
<div class="popwin-nothing">对不起，暂无收到新问候。</div>
<!--{else}-->
<div class="popwin-msg-content">
  <!--{foreach $hi as $volist}-->
  <p>
  时间：<!--{$volist.sendtime|date_format:"%Y/%m/%d %H:%M"}--><br />
  “<b><font color="#B0778C"><!--{$volist.username}--></font></b>”向你打招呼了，<a href="<!--{$urlpath}-->usercp.php?c=hi&a=read&id=<!--{$volist.hiid}-->" style="color:#428DB8;">查看</a><br />
  TA可能是你一直期待的人<br />成为联系TA的第一个人吧。
  </p>
  <div class="popwin-buttons">
   <a href="###" class="popwin-button1" onclick="artbox_writemsg('<!--{$volist.fromuserid}-->');" style="color:#ffffff;">给TA写信</a>
   <a href="<!--{$volist.homeurl}-->" target="_blank" class="popwin-button2" style="color:#8E5A5C;">看TA资料</a>
   <div class="clear"></div>
  </div>
  <!--{/foreach}-->
</div>
<!--{/if}-->