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
<!--{if empty($newreg)}-->
<div class="popwin-nothing">对不起，暂无新会员。</div>
<!--{else}-->
<div class="popwin-msg-content">
  <!--{foreach $newreg as $volist}-->
  <p>
  <font color="#B0778C"><!--{$volist.username}-->， <!--{$volist.age}-->岁， <!--{hook mod='var' item='marrystatus' type='text' value=$volist.marrystatus}--></font>新人报到<br />
  TA可能就是您要找的人哦，主动联系，把握自己的幸福吧。
  </p>
  <div class="popwin-buttons">
   <a href="###" class="popwin-button1" onclick="artbox_hi('<!--{$volist.userid}-->');" style="color:#ffffff;">打招呼</a>
   <a href="<!--{$volist.homeurl}-->" target="_blank" class="popwin-button2" style="color:#8E5A5C;">看TA资料</a>
   <div class="clear"></div>
  </div>
  <!--{/foreach}-->
</div>
<!--{/if}-->