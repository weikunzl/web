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
<!--{if empty($newvisit)}-->
<div class="popwin-nothing">对不起，暂无最新访客。</div>
<!--{else}-->
<div class="popwin-msg-content">
  <ul>
    <!--{foreach $newvisit as $volist}-->
    <li>
      <div class="popwin-ster">
		<img src="<!--{$volist.userinfo.avatarurl}-->" width="50px" height="60px" />
	  </div>
      <div class="popwin-user">
	    <span>
		  <b><a href="<!--{$volist.userinfo.homeurl}-->" target="_blank"><!--{$volist.userinfo.username}--></a></b>&nbsp;
		  (<font color="#999999">
			<!--{if $volist.userinfo.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;&nbsp;<!--{$volist.userinfo.age}-->岁&nbsp;
			<!--{hook mod='var' item='marrystatus' type='text' value=$volist.userinfo.marrystatus}-->
			<!--{hook mod='var' item='education' type='text' value=$volist.userinfo.education}-->
		  </font>)
		</span>
		<p>
		曾经浏览过您的资料，TA可能对你很感兴趣<br />遇到缘分千万不要错过，马上主动出击吧。<br />
		<div style="float:right;padding-top:10px;"><a href="<!--{$volist.userinfo.homeurl}-->" style="color:#428DB8;" target="_blank">浏览TA的资料</a></div> 
		</p>
	  </div>
	  <div class="clear"></div>
    </li>
	<!--{/foreach}-->
  </ul>
  <div class="clear"></div>
</div>
<!--{/if}-->