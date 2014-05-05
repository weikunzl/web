<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var='menuid' value='userapp'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="indexbg">
	 <div class="index1">
		 <div class="myinfo_left">

			<!-- info -->
            <div class="myinfo">
				  <div class="myinfo_head">
						<a href="" class="login_gohead_img" title="<!--{$login.info.username}-->"><!--{$u.useravatar}--></a>
						<div><a href="<!--{$urlpath}-->usercp.php?c=avatar" class="login_gohead_up">更新头像</a></div>
						<div>
							  <img src="<!--{$skinpath}-->themes/images/cid<!--{if $u.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.idnumberrz==1}-->已身份证认证<!--{else}-->身份证未认证<!--{/if}-->">
							  <img src="<!--{$skinpath}-->themes/images/video<!--{if $u.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.videorz==1}-->已视频认证<!--{else}-->视频未认证<!--{/if}-->">
							  <img src="<!--{$skinpath}-->themes/images/email<!--{if $u.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.emailrz==1}-->已邮箱认证<!--{else}-->邮箱未认证<!--{/if}-->"> 
						</div>
				  </div>

				  <div class="myinfo_op">
					<div class="myinfo_op_top" style="text-align:left">
						<!--{$u.levelimg}--><!--{$login.username}-->
						<a href="<!--{$urlpath}-->usercp.php?c=vip">服务</a>
						等级：<!--{$u.levelimg}-->&nbsp;&nbsp;余额：<!--{$u.money}-->
						&nbsp;&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=payment">充值</a>
					</div>
					<div class="myinfo_op_top">
						<ul>
							<li><a href="<!--{$urlpath}-->usercp.php?c=message"><div class="myinfo_op_box div_red">消息</div></a></li>
							<li><a href="<!--{$urlpath}-->usercp.php?c=listen"><div class="myinfo_op_box div_yellow">关注</div></a></li>
							<li><a href="<!--{$urlpath}-->usercp.php?c=gift"><div class="myinfo_op_box div_green">礼物</div></a></li>
							<li><a href="<!--{$urlpath}-->usercp.php?c=album"><div class="myinfo_op_box div_blue">相册</div></a></li>
						</ul>
					</div>
				  </div><!--login_right -->
			</div>
				 <!-- end info -->
	  
			<h2 class="hh3">心情微播</h2>

			    <!--发表心情-->
			  <div class="mood-post-box" style="height:80px;padding-top:20px;">
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


		</div><!--left3-->

		<div class="right3">
			  <h2 class="myinfo_righth3">账号信息</h2>
			  <div class="myinfo_right3ser">
				  <div class="myinfo_account_l">会员级别：<!--{$u.levelimg}--></div>
				  <div class="myinfo_account_r"><a href="<!--{$urlpath}-->usercp.php?c=visitme">访问人气：</a><!--{$u.hits}--></div>
				  <div class="myinfo_account_l"><a href="<!--{$urlpath}-->usercp.php?c=album">个人相册：</a><!--{count mod='user' type='album' value=$u.userid}--></div>
				  <div class="myinfo_account_r">心情日记：</div>
				  <div class="myinfo_account_l"><a href="<!--{$urlpath}-->usercp.php?c=gift">收到礼物：</a><!--{count mod='user' type='gift' value=$u.userid}--></div>
				  <div class="myinfo_account_r">微博动态：</div>
				  <div class="myinfo_account_l"><a href="<!--{$urlpath}-->usercp.php?c=listen">关&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注：</a></div>
				  <div class="myinfo_account_r"><a href="<!--{$urlpath}-->usercp.php?c=fans">粉&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;丝：</a><!--{count mod='user' type='fans' value=$u.userid}--></div>
				  <div class="myinfo_account_l">注册时间：</div><div class="myinfo_account_r">最后登录：</div>
			  </div>
			  <h2 class="myinfo_righth3">今日速配</h2>
			  <!--{assign var='match' value=vo_list("mod={mymatch} value={<!--{$u.userid}-->} num={5}")}-->
			  <div class="myinfo_right3ser">
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
		<!--end right3-->

	</div>
	<!--end index1-->
</div>
</div>
<!--//page-index End--> 

<!--{include file="<!--{$uctplpath}-->block_eif.tpl"}--> 
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}--> 
</body>
</html>