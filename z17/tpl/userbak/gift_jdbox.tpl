<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<script type="text/javascript">
//选择礼物
function select_gift(id, points, giftname){
	$(".mod-gift a span").removeClass("icon-selected");
	$("#select-"+id).addClass("icon-selected");

	$("#giftid").val(id);
	$("#points").val(points);
	$("#tips-giftname").html(giftname);
	$("#tips-points").html(points);
	$("#words").val($("#msg-"+id).html());
}
</script>
<style>
.gift-ft {clear:both;margin-top:10px;}
.gift-words {width: 575px;}
.m-gift-send {
	clear:both;
	margin-top:10px;
	text-align:right;
}
.visual-none {
	color:#0981C6;
	margin-right:10px;
}
.give-topic {margin: 0px 20px;}
.menu-list{position:relative; margin-top:10px;width:100%;}
.menu-list .menu-item{
	border:1px solid #e1e1e1; margin-right:10px; float:left; 
	padding:5px 10px;background:#F5F5F5; cursor:pointer;
	height:15px; line-height:15px;
}
.menu-list .menu-current{background:#fff;}

.gift-list {margin-top:10px;margin-bottom:5px;}
.gift-list li{
	width:90px;height:120px;float:left;padding:5px 12px 5px 10px;
}
.gift-list li img{
	padding:3px;border:1px solid #dddddd;
}
.gift-list .gift-text{text-align:center;display:block;line-height:20px;margin-top:5px;}

.mod-gift .icon-selected {
	background-image:url(<!--{$ucpath}-->images/selected_icon.png);
	position: absolute;
	cursor: pointer;
	display: block;
	height: 20px;
	line-height: 120px;
	overflow: hidden;
	width: 20px;
	margin-left: 80px;
	margin-top: -20px;
}
</style>
<div class="give-topic">
  <div class="nav-tips">
    送给用户：<!--{$touserinfo.levelimg}--> <a href="<!--{$touserinfo.homeurl}-->" target="_blank"><!--{$touserinfo.username}--></a>&nbsp;(<!--{if $touserinfo.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;<!--{$touser.marry_t}-->&nbsp;<!--{$touserinfo.age}-->岁&nbsp;&nbsp;
	<!--{area type='text' value=$touserinfo.provinceid}--> <!--{area type='text' value=$touserinfo.cityid}-->
	&nbsp;<!--{hook mod='var' item='education' type='text' value=$touserinfo.education}-->)
  </div>
  <!--TAB BEGIN-->
  <div class="menu-list">
    <ul>
	  <li class="menu-item<!--{if $catid=='0'}--> menu-current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=gift&a=send&touid=<!--{$touid}-->&catid=<!--{$volist.catid}-->&halttype=jdbox">全部礼物</a></li>
	  <!--{assign var='giftcat' value=vo_list("mod={giftcat}")}-->
	  <!--{foreach $giftcat as $volist}-->
	  <li class="menu-item<!--{if $catid==$volist.catid}--> menu-current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=gift&a=send&touid=<!--{$touid}-->&catid=<!--{$volist.catid}-->&halttype=jdbox"><!--{$volist.catname}--></a></li>
	  <!--{/foreach}-->
	</ul>
  </div>
  <!--TAB END-->
  
  <div class="gift-list">
    <ul>
	  <!--{foreach $gift as $volist}-->
	  <li class="mod-gift">
	    <a href="###" onclick="select_gift('<!--{$volist.giftid}-->', '<!--{$volist.points}-->', '<!--{$volist.giftname}-->');"><img src="<!--{$volist.imgurl}-->" width="75" height="75" />
		<span id="select-<!--{$volist.giftid}-->"></span>
		</a>
		<span id="msg-<!--{$volist.giftid}-->" style="display:none;"><!--{$volist.intro}--></span>
		<div class="gift-text">
		<!--{$volist.giftname}--><br />
		<!--{$lang.points}-->：<!--{$volist.points}-->
		</div>
	  </li>
	  <!--{/foreach}-->
	</ul>
	<div class="clear"></div>
  </div>
  <!--{if $showpage!=""}-->
  <div class="page_digg" style="margin-top:5px"><!--{$showpage}--></div>
  <div class="clear"></div>
  <!--{/if}-->

  <form action='<!--{$ucfile}-->?c=gift&halttype=jdbox' method='post' name='myform' id='myform' style='margin:0'>
  <input type='hidden' name='a' id='a' value='savesend' />
  <input type='hidden' name='giftid' id='giftid' value='' />
  <input type='hidden' name='touid' id='touid' value='<!--{$touid}-->' />
  <input type="hidden" name="points" id="points" value="0" />
  <div class="gift-ft">
	<div class="panel">
	  <label for="gift-words">赠言：</label>
	  <input type="text" class="gift-words"id="words" name="words" disabled="disabled" value="" />
	</div>
	<div class="m-gift-send">
	  <div class="form_send_box">
	    <i id="calendarGift" class="img i-calendar">
		选择的礼物：<span class="visual-none" id="tips-giftname"></span>
		积分：<span class="visual-none" id="tips-points"></span> 
		</i> 
		<input type="button" name="btn_send" id="btn_send" value="确定赠送" class="button-red" />
	  </div>
	</div>
  </div>
  </form>

</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	//提交赠送
	$("#btn_send").click(function(){
		var touid = <!--{$touid}-->;
		if (touid == <!--{$u.userid}-->) {
			$.dialog.tips("对不起，不能给自己赠送礼物。", 3);
			return false;
		}

		if ($("#giftid").val() == '') {
			$.dialog.tips("请选择要赠送的礼物。", 3);
			return false;
		}

		//积分是否足够
		var points = $("#points").val();
		if (<!--{$u.points}--> < points) {
			$.dialog.tips("对不起，你所选礼物积分不足。", 3);
			return false;
		}

		$('#myform').submit();
		return true;
	});

});
</script>