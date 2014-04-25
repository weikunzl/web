<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="cp_menuid" value="weibo"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
 <style>
 .hr-dashed{margin:10px 0px; border-bottom:1px dashed #e1e1e1; clear:both; width:100%;display:inline-block;}
.weibo-item{margin-top:10px;}
.weibo-left{
	float:left; width:160px;
}
.weibo-left .weibo-time{
    padding:3px 5px; background:#f0f0f0;
	border-radius:10px; 
	line-height:20px;
	border-width: 1px;box-shadow: 1px 1px 1px 1px #F0F0F0; 
	color:Gray;
	width:115px;
	text-align:center;
}
.weibo-left .weibo-button{padding:5px;line-height:20px;}

.weibo-right{
	border-left:2px solid #FAEBD7; float:left; padding:3px 10px 10px 20px; 
	width:600px; margin-left:20px;
}

.weibo-box-left{
	width:55px;float:left;
}
.weibo-box-left img{
	padding:1px;border:1px solid #ddd;width:50px;height:60px;
}

.weibo-box-right {
	float:left;width:520px;margin-left:10px;line-height:20px;
}
.weibo-box-right .user-info {
	height:25px;line-height:25px;
}
.weibo-box-right .wb-content{
	background-color: #fcfcfc;
    /*border: 1px solid #f8f8f8;
    border-radius: 3px 3px 3px 3px;
	*/
	padding: 5px 8px;
}
.weibo-box-right .wb-content p{
	color:#666666;line-height: 20px;word-wrap: break-word;
}
.icon-clock {
	background-image: url("<!--{$ucpath}-->images/friends_recent_visitors_v4.png");
	background-position: -109px -34px;display: block;
	height: 13px;position: absolute;width: 13px; margin-left:-92px; margin-top:4px;
}

/*reply*/
.wb-reply{
    background-color: #FFFFFF;
    border: 1px solid #DCDCDC;
    margin-bottom: 10px;
    margin-left: 5px;
    margin-top: 8px;
    width: 98%;
	display:none;
}
.wb-reply-form{
    padding: 10px;
    text-align: center;
}
.wb-reply-form-textarea{
    background-color: #FFFFFF;
    border: 1px solid #CECECE;
    color: #717171;
    height: 30px;
    padding: 5px;
    width: 95%;
	overflow:auto;
}
.wb-reply-btn{
    height: 22px;
    padding: 5px 0 5px 5px;
    text-align: right;
}
.wb-reply-btn .reply-eif {
	position:relative;float:left;
}
.wb-reply-btn .reply-eif img {vertical-align: middle;padding-bottom:3px;}
.wb-cmlist {
	margin-top:10px;padding:10px;width:95%;
}
.wb-cmlist li {
	float:left;width:100%;
	border-bottom:1px dashed #E8E8E8;
	color:#666666;
	padding-top:5px;
	padding-bottom:5px;

}
.wb-cmlist .who-img{
	float:left;width:30px;margin-right:10px;
}
.wb-cmlist .who-img img{width:30px;height:37px;}
.wb-cmlist .who-comm {
	float:left;line-height:20px;color:#666666;width:430px;
}

</style>
<div class="user_main">

  <div class="main_right">
    <div class="div_"> 心情微播</div>

    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<!--{if empty($type)}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=weibo&uid=<!--{$uid}-->">随便看看</a></li>
		  <li class="tab_item<!--{if $type == 'my'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=weibo&type=my">我的心情</a></li>
		  <li class="tab_item<!--{if $type == 'listen'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=weibo&type=listen">好友心情</a></li>
		</ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">

	  <div class="mood-post-form" style="padding-bottom:50px;">
	    <div class="mood-title"><img src="<!--{$ucpath}-->images/mood.gif"></div>
	    <div class="mood-post-content">
		  <textarea class="mood-textarea" id="mood_content" name="mood_content" onkeydown="textCounter('mood_content', 'counter', 500);" onkeyup="textCounter('mood_content', 'counter', 500);" onclick="obj_del_wbcontent('mood_content');" onblur="obj_attr_wbcontent('mood_content');">记录每一天的心情...</textarea>
	      <div class="mood-btn-block">
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

	  <!--{if empty($weibo)}-->
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
	    <tr>
		  <td align="center">对不起，没有你要看的心情。</td>
		</tr>
	  </table>
	  <!--{else}-->
	  <!--{foreach $weibo as $volist}-->
      <div class="weibo-item">
        <div class="weibo-left">
		  <div class="weibo-time"><!--{$volist.addtime|date_format:"%Y/%m/%d %H:%M"}--></div>
		  <div class="weibo-button">
		    <!--{if $volist.userid != $u.userid}-->
		    <p>
			<a href="###" onclick="artbox_hi('<!--{$volist.userid}-->');">打招呼</a>&nbsp;&nbsp;<a href="###" onclick="artbox_writemsg('<!--{$volist.userid}-->');">写信件</a><br />
			<span id="tips_listen_<!--{$volist.wbid}-->"><script>obj_listen_status('<!--{$volist.userid}-->', 'tips_listen_<!--{$volist.wbid}-->');</script></span>
		    </p>
			<!--{/if}-->
		  </div>
		</div>
		<!--//weibo-left End-->

        <div class="weibo-right">
		  <div class="weibo-box-left">
		  <!--{if $volist.userid==$u.userid}-->
		  <img src="<!--{$u.avatarurl}-->" />
		  <!--{else}-->
		  <img src="<!--{$volist.user.avatarurl}-->" />
		  <!--{/if}-->
		  </div>
		  <div class="weibo-box-right">
			<i class="icon-clock"></i>
			<div class="user-info">
			  <span style="float:right;line-height:20px;cursor:pointer;" onclick="comm_showhide('<!--{$volist.wbid}-->');">评论(<!--{$volist.commentcount}-->)</span>
			  <!--{if $volist.userid == $u.userid}-->
			  <!--{$u.username}--> &nbsp;&nbsp;&nbsp;
			  <font color="#999999">
			  <!--{$u.age}-->岁 <!--{$u.height}-->CM <!--{area type="text" value=$u.provinceid}--> <!--{area type="text" value=$u.cityid}--> 
			  </font>
			  <!--{else}-->
			  <a href="<!--{$ucfile}-->?c=weibo&uid=<!--{$volist.userid}-->"><!--{$volist.user.username}--></a>&nbsp;&nbsp;&nbsp;
			  <font color="#999999">
			  <!--{$volist.user.age}-->岁 <!--{$volist.user.height}-->CM <!--{area type="text" value=$volist.user.provinceid}--> <!--{area type="text" value=$volist.user.cityid}--> 
			  </font>
			  <!--{/if}-->
			  
			</div>
			<div class="wb-content"><p><!--{$volist.content|nl2br}--></p></div>

			<!--评论区-->
			<div class="wb-reply" id="comment-<!--{$volist.wbid}-->">
			  <div class="wb-reply-form">
			    <textarea id="content_<!--{$volist.wbid}-->" name="content_<!--{$volist.wbid}-->" class="wb-reply-form-textarea" onclick="del_comm_content('<!--{$volist.wbid}-->');" onblur="attr_comm_content('<!--{$volist.wbid}-->');">添加评论...</textarea>
				<div class="wb-reply-btn">
				  <div class="reply-eif">
				  <a href="###" onclick="show_more_face('display_eif_<!--{$volist.wbid}-->', 'content_<!--{$volist.wbid}-->');"><img src="<!--{$ucpath}-->images/eif.gif">表情</a>
				  </div>
				  <div id="display_eif_<!--{$volist.wbid}-->"></div>
				  <input type="button" value="发表评论" class="button-coff" onclick="do_comment('<!--{$volist.wbid}-->');" />&nbsp;&nbsp;&nbsp;<a href="###" onclick="javascript:$('#content_<!--{$volist.wbid}-->').val('');">取消</a>
				</div>
			  </div>
			  <div class="wb-cmlist">
			    <ul id="comlist-<!--{$volist.wbid}-->">
				</ul>
				<div class="clear"></div>
			  </div>
			</div>

		  </div>
		  <div class="clear"></div>
		  <!--//weibo-box-right-->
		  <div class="hr-dashed"></div>
        </div>
		
		<!--//weibo-right End-->

      </div>
	  <!--{/foreach}-->
	  <!--{/if}-->


      <div class="clear"> </div>
	  <!--{if $showpage!=""}-->
	  <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	  <div class="clear"></div>
	  <!--{/if}-->

    </div>
	<!--//div_smallnav_content_hover End-->



  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=weibo">随便看看</a></li>
      <li><a href="<!--{$ucfile}-->?c=weibo&type=my">我的心情</a></li>
	  <li><a href="<!--{$ucfile}-->?c=weibo&type=listen">好友心情</a></li>
    </ul>
  </div>
  <div class="clear"> </div>
  <div style="margin: 30px;"> </div>
</div>
<!--//user_main End-->
<!--{include file="<!--{$uctplpath}-->block_eif.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
//评论显示隐藏
function comm_showhide(id) {
	if ($("#comment-"+id).css("display") == 'none') {
		//显示
		$("#comment-"+id).show();
		get_comment_list(id);
	}
	else {
		//隐藏
		$("#comment-"+id).hide();
	}	
}
//提交评论
function do_comment(id) {
	if (id < 1) {
		$.dialog.tips("心情ID丢失", 3);
		return false;
	}	
	var content = $("#content_"+id).val();
	if (content == '' || content == '添加评论...') {
		$.dialog.tips("请填写评论内容", 3);
		$("#content_"+id).focus();
		return false;
	}
	if (strQuantity(content) > 500) {
	    $.dialog.tips("评论内容不能大于500个字！", 3);
		$("#content_"+id).focus();
		return false;
	}

	//提交评论
	$.ajax({
		type: "POST",
		url: _ROOT_PATH + "usercp.php?c=weibo&a=savecomment",
		cache: false,
		data: {wbid:id, content:content, r:get_rndnum(8)},
		dataType: "json",
		success: function(data) {
			var json = eval(data);
			var response = json.response;
			var msg = json.msg;
			if (response == '1') {
				if (msg != "" || msg.length>0) {
					$.dialog.tips(msg, 3);
				}
				else {
					$.dialog.tips("评论成功", 3);
					//重载评论
					get_comment_list(id);
				}
				//清除评论
				$("#content_"+id).val("添加评论...");
			}
			else {
				if (msg != "" || msg.length>0) {
					$.dialog.tips(msg, 3);
				}
				else {
					$.dialog.tips("评论失败", 3);
				}
			}
		},
		error: function() {

		}
	});

}
//评论内容
function del_comm_content(id) {
	var content = $("#content_"+id).val();
	if (content == '添加评论...') {
		$("#content_"+id).val("");
	}
}
function attr_comm_content(id) {
	var content = $("#content_"+id).val();
	if (content == '') {
		$("#content_"+id).val("添加评论...");
	}
}
//回复
function addon_reply(id, username) {
	$("#content_"+id).val("@"+username+"：");
}

//载入评论
function get_comment_list(id) {
	if (id > 0) {
		$("#comlist-"+id).html('loading');
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=weibo&a=getcomdata",
			cache: false,
			data: {wbid:id, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var result = json.result;
				$("#comlist-"+id).html(result);
			},
			error: function() {

			}
		});
	}
}
</script>