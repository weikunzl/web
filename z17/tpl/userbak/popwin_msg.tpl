<style>
.popwin-msg-content {
	padding:2px;
}
.popwin-msg-content li {
	width:300px;float:left;
	border-bottom:1px dashed #e1e1e1;
	padding-top:5px;
	padding-bottom:5px;
}
.popwin-ster{float: left;margin: 0 10px 0 0;}
.popwin-ster img{width: 50px;height: 60px; padding:2px; border:1px solid #ddd;}
.popwin-user{float:right;width:230px;}
.popwin-user span{
	font-size: 12px;
	line-height: 22px;overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	height:22px;
}
.popwin-user p{
	font-size: 12px;
	line-height: 25px;
	text-overflow: ellipsis;
	white-space: nowrap;
	color:#666666;
}
</style>
<!--{if empty($msg)}-->
<div class="popwin-nothing">对不起，暂无收到新信件。</div>
<!--{else}-->
<div class="popwin-msg-content">
  <ul>
    <!--{foreach $msg as $volist}-->
    <li>
      <div class="popwin-ster">
		<img src="<!--{$volist.avatarurl}-->" width="50px" height="60px" />
	  </div>
      <div class="popwin-user">
	    <span>
		  <b><a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a></b>&nbsp;
		  (<font color="#999999">
			<!--{if $volist.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;&nbsp;<!--{$volist.age}-->岁&nbsp;
			<!--{hook mod='var' item='marrystatus' type='text' value=$volist.marrystatus}-->
			<!--{area type='text' value=$volist.provinceid}-->&nbsp;
			<!--{area type='text' value=$volist.cityid}-->&nbsp;
			<!--{hook mod='var' item='education' type='text' value=$volist.education}-->
		  </font>)
		</span>
		<p><!--{$volist.sendtime|date_format:"%Y/%m/%d %H:%M"}--> 给您发了一封新信件。<br /><div style="float:right;"><a href="<!--{$urlpath}-->usercp.php?c=message" style="color:#428DB8;">阅读信件</a></div> </p>
	  </div>
	  <div class="clear"></div>
    </li>
	<!--{/foreach}-->
  </ul>
  <div class="clear"></div>
</div>
<!--{/if}-->