<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->

<!--{assign var='menuid' value='index'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->

<div class="user_main">
  

  <div class="user_main_middle">
    <!--发表心情-->

	  <div class="mood-post-box">
	    <div class="mood-post-content">
		  <textarea class="mood-textarea" id="mood_content" name="mood_content" onkeydown="textCounter('mood_content', 'counter', 500);" onkeyup="textCounter('mood_content', 'counter', 500);" onclick="obj_del_wbcontent('mood_content');" onblur="obj_attr_wbcontent('mood_content');">记录每一天的心情...</textarea>
	      <div class="mood-box-block">
			<div class="fl" style="position:relative;">
			  <a href="###" onclick="show_more_face('display-eif', 'mood_content');"><img src="<!--{$ucpath}-->images/eif.gif" style="padding-bottom:3px;">表情</a>
			  <div id="display-eif"></div>
			</div>
			<div class="fr">
			  <div id="post_limit" class="fl" style="padding-top:5px;">还能输入<span id="counter">500</span>字</div>
			  <div class="mood-post-button" onclick="obj_public_mood('mood_content');"><img src="<!--{$ucpath}-->images/button-mood.gif"></div>
			  <div class="mood-post-cancel"><a href="###" onclick="obj_cancel_wbcontent('mood_content');">取消</a></div>
			</div>
			<div class="clear"></div>
		  </div>
	    </div>
	  </div>
      <!--//mood-post-form End-->

	<!--{assign var='match' value=vo_list("mod={mymatch} value={<!--{$u.userid}-->} num={5}")}-->
	<div class="user-md-box" style="padding-bottom:15px;">
	  <div class="user-md-title"><span><a href="<!--{$ucfile}-->?c=match">更多速配&gt;&gt;</a></span>今日速配</div>
	  <div class="user-md-ulist">
	    <ul>
		  <!--{foreach $match as $volist}-->
		  <li>
		  <img src="<!--{$volist.avatarurl}-->" width="75" height="90" /><br />
		  <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a><br />
		  <!--{$volist.age}-->岁，<!--{area type="text" value=$volist.provinceid}-->
		  </li>
		  <!--{/foreach}-->
		</ul>
		<div class="clear"></div>
	  </div>
	</div>
	<!--//user-md-box End-->

    <!--TAB Begin-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=weibo">随便看看</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=weibo&type=my">我的心情</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=weibo&type=listen">好友心情</a></li>
		</ul>
      </div>
	</div>
    <!--TAB End-->

	<div class="user-md-weibo">
	  <!--{assign var='weibo' value=vo_list("mod={weibo} num={10}")}-->
	  <!--{foreach $weibo as $volist}-->
	  <div class="user-md-trends">
	    <div class="user_trends_left"><!--{avatar width='60' height='69' value=$volist.avatarurl}--></div>
        <div class="user_trends_right">
		  <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a>
		  <span class="trends_fs">- 
		  <!--{$volist.age}-->岁 
		  <!--{area type="text" value=$volist.provinceid}--> 
		  <!--{area type="text" value=$volist.cityid}-->
		  </span>
		  <div class="quote-box">
            <div class="feed-box">
			  <p><!--{$volist.content|nl2br}--></p>
			</div>
          </div>
		  <div class="trends_pj">
		    <span><!--{$volist.addtime|date_format:"%m-%d %H:%M"}--></span>
			<!--{if $volist.userid != $u.userid}-->
		    <a href="###" onclick="artbox_writemsg('<!--{$volist.userid}-->');">发信件</a>
		    <a href="###" onclick="artbox_hi('<!--{$volist.userid}-->');">打招呼</a>
		    <a href="###" onclick="artbox_sendgift('<!--{$volist.userid}-->');">送礼物</a>
			<!--{/if}-->
		  </div>
		</div>
		<div class="clear"></div>
	  </div>
	  <!--{/foreach}-->
	  <div class="nav-tips" style="text-align:center;"><a href="<!--{$ucfile}-->?c=weibo">查看更多心情</a></div>

	</div>
	<!--//user-md-weibo End-->

  </div>
  <!--//user_main_middle End-->

  <!--右边 Begin-->
  <div class="user_main_right">
    <div class="user_iph_k">
	  <ul>
	    <li class="gdlh"><a href="<!--{$ucfile}-->?c=vip">升级VIP会员，享受更多服务</a></li>
		<li class="lwsc"><a href="<!--{$ucfile}-->?c=certify">诚信认证点亮图标提高人气</a></li>
      </ul>
	  <div class="clear"></div>
    </div>
	<!--//user_iph_k End-->
	
	<!--{assign var='gift' value=vo_list("mod={gift} where={v.touserid='<!--{$u.userid}-->'} num={9}")}-->
	<!--{if !empty($gift)}-->
	<div class="user-rt-box">
	  <div class="user-rt-title"><span><a href="<!--{$ucfile}-->?c=gift">更多礼物</a></span>收到的礼物</div>
	  <div class="user-index-gift">
		<ul>
		  <!--{foreach $gift as $volist}-->
		  <li><img src="<!--{$volist.imgurl}-->" width="60" height="60" alt="<!--{$volist.giftname}-->" title="<!--{$volist.giftname}-->" /></li>
		  <!--{/foreach}-->
		</ul>
	  </div>
	</div>
	<!--//user-rt-box End-->
	<!--{/if}-->
    
	<!--{assign var='visit' value=vo_list("mod={myvisitme} num={10} value={<!--{$u.userid}-->}")}-->
	<!--{if !empty($visit)}-->
	<div class="user-rt-box">
	  <div class="user-rt-title"><span><a href="<!--{$ucfile}-->?c=visitme">更多&gt;&gt;</a></span>谁看了我</div>
	  <div class="user-index-visit">
	    <ul>
		  <!--{foreach $visit as $volist}-->
		  <li>
		  <p>
		    <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a><br />
			<!--{$volist.age}-->岁 
			<!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}-->
			<!--{if $volist.height>0}-->
			<!--{$volist.height}-->CM
			<!--{/if}-->
			<br />
			<font color="#999999">到访：<!--{$volist.viewtime|date_format:"%m-%d %H:%M"}--></font>
		  </p>
		  <span><img src="<!--{$volist.avatarurl}-->" width='50' height='60' /></span>
		  </li>
		  <!--{/foreach}-->
		</ul>
		<div class="clear"></div>
	  </div>
	</div>
	<!--//user-rt-box End-->
	<!--{/if}-->


  </div>
  <div style="clear:both;"> </div>
  <!--//user_main_right End--> 
  
</div>
<!--//user_main End--> 

<!--{include file="<!--{$uctplpath}-->block_eif.tpl"}--> 
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}--> 
</body>
</html>