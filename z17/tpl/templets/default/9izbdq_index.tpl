<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='index'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="indexbg">
    <div class="index">	
        
	<!--{if $login.status == 1}-->
	<div class="loginwrap">
		<!--{assign var='zone' value=get_zone('index_slide_banner')}-->
	<div class="huar"> 
          <div class="llgo">
            <div class="login_gooo">
              <div class="login_xxxxx"> 
				<div class="login_gohead">
					<a href="<!--{$urlpath}-->usercp.php" class="login_gohead_img" title="<!--{$login.info.username}-->"><!--{$login.info.useravatar}--></a>
					<a href="<!--{$urlpath}-->usercp.php?c=avatar" class="login_gohead_up">更新头像</a>
				</div>
                <div class="login_xinxi">
                  <div><a href="<!--{$urlpath}-->usercp.php" ><!--{$login.info.username}--></a></div>
				  <div>等级：<!--{$login.info.levelimg}-->&nbsp;&nbsp;余额：<!--{$login.info.money}--></div>
				  <div></div>
                  <div>
					<span>
					  <img src="<!--{$skinpath}-->themes/images/cid<!--{if $login.info.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $login.info.idnumberrz==1}-->已身份证认证<!--{else}-->身份证未认证<!--{/if}-->">
					  <img src="<!--{$skinpath}-->themes/images/video<!--{if $login.info.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $login.info.videorz==1}-->已视频认证<!--{else}-->视频未认证<!--{/if}-->">
					  <img src="<!--{$skinpath}-->themes/images/email<!--{if $login.info.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $login.info.emailrz==1}-->已邮箱认证<!--{else}-->邮箱未认证<!--{/if}-->"> 
					</span>
					<!--{$login.info.star}-->星&nbsp;&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=certify">诚信认证</a>
				  </div>
				  
				  <div>相册：<!--{count mod='user' type='album' value=$login.info.userid}--> 张 <a href="<!--{$urlpath}-->usercp.php?c=album">上传</a></div>
				  <div><a href="<!--{$urlpath}-->usercp.php?c=visitme">访问(<!--{$login.info.hits}--></a>)&nbsp;|&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=fans">粉丝(<!--{count mod='user' type='fans' value=$login.info.userid}-->)</a></div>
						  <div><a href="<!--{$appfile}-->?c=passport&a=logout">退出</a>
					<!--&nbsp;|&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=payment">充值</a>-->
					&nbsp;|&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=account&a=invite"><font color="red">邀请</font></a></div>
                </div>
                <div class="c"></div>
              </div>
             
            </div>

	    <div class="login_right">
		<div class="login_right_top">
		<ul>
		<li><a href="<!--{$urlpath}-->usercp.php?c=message"><div class="newmsgbox div_red"><img src="/tpl/user/images/menu/green/562810.png"><div>新信件(<!--{count mod='user' type='newmessage' value=$login.info.userid}-->)</div></div></a></li>
		<li><a href="<!--{$urlpath}-->usercp.php?c=hi"><div class="newmsgbox div_yellow"><img src="/tpl/user/images/menu/green/562779.png"><div>新招呼(<!--{count mod='user' type='newhi' value=$login.info.userid}-->)</div></div></a></li>
		<li><a href="<!--{$urlpath}-->usercp.php?c=listen"><div class="newmsgbox div_blue"><img src="/tpl/user/images/menu/green/562709.png"><div>我的关注</div></div></a></li>
		<li><a href="<!--{$urlpath}-->usercp.php?c=gift"><div class="newmsgbox div_green"><img src="/tpl/user/images/menu/green/562785.png"><div>礼物(<!--{count mod='user' type='gift' value=$login.info.userid}-->)</div></div></a></li>
		</ul>
		</div>
		<div class="login_right_weibo">
		    <div class="fl" style="position:relative;">
			<textarea class="mood-textarea" id="mood_content" name="mood_content" onkeydown="textCounter('mood_content', 'counter', 500);" onkeyup="textCounter('mood_content', 'counter', 500);" onclick="obj_del_wbcontent('mood_content');" onblur="obj_attr_wbcontent('mood_content');">记录每一天的心情...</textarea>
			 <div id="display-eif"></div>
		    </div>
		    <div class="fr">
			  <div class="mood-post-button" onclick="obj_public_mood('mood_content');"><img src="<!--{$ucpath}-->images/button-mood.gif"></div>
		    </div>
		    <div class="clear"></div>
		</div>
	    </div><!--login_right -->
          </div><!--llgo -->
	  </div>
	</div>
	<!--{/if}-->

        

    </div>
  </div>
  <div class="bigline"></div>
  <div class="index1">
    <div class="left3">
	  
	  <h2 class="hh3">
	    <label><a id="tab_label_tag_0" href="###" class="nnn" onMouseOver="tab_label('0');">最新会员</a></label>
	    <!--{if $login.info.gender==1}-->
	    <label><a id="tab_label_tag_1" href="###" onMouseOver="tab_label('1');">推荐女会员</a></label> 
	    <!--{/if}-->
	    <!--{if $login.info.gender==2}-->
	    <label><a id="tab_label_tag_2" href="###" onMouseOver="tab_label('2');">推荐男会员</a></label>
	    <!--{/if}-->
		
	    <a href="<!--{$appfile}-->?c=user" class="more3">更多&gt;&gt;</a> 
	  </h2>
      <div class="left3list" style="display:block;" id="tab_label_0">
        <ul>
          <!--{assign var='user' value=vo_list("mod={user} where={v.avatar='1'} num={18}")}--> 
          <!--{foreach $user as $volist}-->
          <li><a href="<!--{$volist.homeurl}-->" target="_blank"><img src="<!--{$volist.avatarurl}-->" width='90px' height='110px' title="<!--{$volist.username}-->" alt="<!--{$volist.username}-->" /></a>
            
            <div class="areaf"> <span><!--{area type='text' value=$volist.cityid}--></span> <span><!--{$volist.age}-->岁</span> </div>
	    <div class="guangzh"><a href="javascript:void(0);" onclick="artbox_hi(<!--{$volist.userid}-->);">打招呼</a><a href="javascript:void(0);" onclick="artbox_writemsg(<!--{$volist.userid}-->);">写信件</a></div>
          </li>
          <!--{/foreach}-->
        </ul>
      </div>

      <div class="left3list" style="display:none;" id="tab_label_1">
        <ul>
          <!--{assign var='user' value=vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='2'} num={18}")}--> 
          <!--{foreach $user as $volist}-->
          <li><a href="<!--{$volist.homeurl}-->" target="_blank"><img src="<!--{$volist.avatarurl}-->" width='90px' height='110px' title="<!--{$volist.username}-->" alt="<!--{$volist.username}-->" /></a>
            
            <div class="areaf"> <span><!--{area type='text' value=$volist.cityid}--></span> <span><!--{$volist.age}-->岁</span> </div>
	    <div class="guangzh"><a href="javascript:void(0);" onclick="artbox_hi(<!--{$volist.userid}-->);">打招呼</a><a href="javascript:void(0);" onclick="artbox_writemsg(<!--{$volist.userid}-->);">写信件</a></div>
          </li>
          <!--{/foreach}-->
        </ul>
      </div>

      <div class="left3list" style="display:none;" id="tab_label_2">
        <ul>
          <!--{assign var='user' value=vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='1'} num={18}")}--> 
          <!--{foreach $user as $volist}-->
          <li><a href="<!--{$volist.homeurl}-->" target="_blank"><img src="<!--{$volist.avatarurl}-->" width='90px' height='110px' title="<!--{$volist.username}-->" alt="<!--{$volist.username}-->" /></a>
            
            <div class="areaf"> <span><!--{area type='text' value=$volist.cityid}--></span> <span><!--{$volist.age}-->岁</span> </div>
	    <div class="guangzh"><a href="javascript:void(0);" onclick="artbox_hi(<!--{$volist.userid}-->);">打招呼</a><a href="javascript:void(0);" onclick="artbox_writemsg(<!--{$volist.userid}-->);">写信件</a></div>
          </li>
          <!--{/foreach}-->
        </ul>
      </div>

	<script>
	//显示隐藏
	function tab_label(tabid) {
		var taglength = 3;//$("a[id='tab_label_tag']").length;
		for (i=0; i<taglength; i++){
			if (tabid == i) {
				$('#tab_label_tag_'+i).addClass('nnn');
				$('#tab_label_'+i).show();
			}
			else {
				$('#tab_label_tag_'+i).removeClass('nnn');
				$('#tab_label_'+i).hide();
			}
		}
	}
	</script>

    </div>
    <div class="right3">
      <h2 class="righth3"><a href="<!--{$urlpath}-->usercp.php?c=weibo" class="more3">心情微播</a></h2>
      <div class="right3ser">
	      <!--{assign var='weibo' value=vo_list("mod={weibo} num={3}")}-->
		  <!--{foreach $weibo as $volist}-->
		  <p class="fitem fitem-i">
		  <a href="<!--{$volist.homeurl}-->"><!--{$volist.username}--></a>. <!--{$volist.age}-->岁，<!--{area type='text' value=$volist.cityid}--><br />
		  <!--{$volist.content|filterhtml:35}-->...
		  </p>
	      <!--{/foreach}-->
		<div style="float:right"><a href="<!--{$urlpath}-->usercp.php?c=weibo" class="more3">更多&gt;&gt;</a> </div>
      </div>


      <div class="paper-aside noticesec">
        <div class="titlebar">
          <div class="title3">明星会员</div>
        </div>
        <div class="noticewrap">
			<!--{assign var='vipuser' value=vo_list("mod={listuser} type={vip} where={v.avatar='1' AND v.monolog='1'} num={1}")}-->
			<!--{foreach $vipuser as $volist}-->
			<div class="right_vip"><a href="<!--{$volist.homeurl}-->"><!--{$volist.useravatar}--></a></div>
			<div class="right_vip_head">
				<!--{$volist.levelimg}--><span class="right_vip_head_name"><!--{$volist.username}--></span><br>
				<!--{$volist.age}--> 岁　<br>
				<!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}--> <br>
				<!--{hook mod='var' type='text' item='education' value=$volist.education}-->
			</div>
			<div class="right_vip_info">
				<!--{$volist.monolog|filterhtml:60}-->...<a href="<!--{$volist.homeurl}-->" target="_blank">查看资料</a>
			</div>
			<div class="right_vip_op"> 
				<span class="d3"><a href="###" onClick="artbox_hi('<!--{$volist.userid}-->');"><span class="icon24 icon24-follow"></span>打招呼</a></span> 
				<span class="d4"><a href="###" onClick="artbox_writemsg('<!--{$volist.userid}-->');"><span class="icon24 icon24-follow"></span>写信件</a></span>
			</div>
			<!--{/foreach}-->
			<div style="clear:both"></div>
        </div>
      </div>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div class="bigline"></div>


</div>	

<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script language="javascript">
function checklogin(){
    //帐号
    if($("#loginname").val() == "" || $("#loginname").val() == '用户名/邮箱'){
		alert('登录帐号不能为空');
		return false;
	} 

	//密码
	if($("#password").val() == "") {
		alert('登录密码不能为空');
		return false;
	} 

	<!--{if $config.regcode=='1'}-->
	if($("#checkcode").val() == "") {
		alert('验证码不能为空');
		return false;
	}
	<!--{/if}-->

	$('#login_form').submit();
	return true;
}
//验证码
function refreshCode() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
	}
}

function changeDefaultInputValue() {
	var a = $("#loginname").val();
	if(a == "") {
		$("#loginname").val("用户名/邮箱");
	} else {
		if(a == '用户名/邮箱') {
			$("#loginname").val("");
		}
	}
	$('#loginname').attr("placeholder","用户名/邮箱");
}
//发表心情
function obj_public_mood(content_id) {
	var content = $("#"+content_id).val();
	//心情内容
	if (content == '' || content == '记录每一天的心情...') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请填写心情内容', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	if (strQuantity(content) > 500) {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '心情内容不能大于500个字', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}

	//发表心情
	$.ajax({
		type: "POST",
		url: _ROOT_PATH + "usercp.php?c=weibo",
		cache: false,
		data: {a:"saveweibo", content:content, r:get_rndnum(8)},
		dataType: "json",
		success: function(data) {
			var json = eval(data);
			var response = json.response;
			var msg = json.msg;
			if (response == '1') {
				var tips = "";
				if (msg.length > 0) {
					tips = msg;
				}
				else {
					tips = "发表成功";
				}
				$.dialog({
					lock:true,
					title: '成功提示',
					content: tips, 
					icon: 'succeed',
					button: [ 
						{
							name: '确定',
							callback: function () {
								window.top.location.reload();
							}
						}
					]
				});
			}
			else {
				var tips = "";
				if (msg.length > 0) {
					tips = msg;
				}
				else {
					tips = "发表失败";
				}
				$.dialog.tips(tips, 3);
			}
		},
		error: function() {

		}
	});

}
//心情文本框
function obj_del_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content == '记录每一天的心情...') {
		$("#"+content_id).val("");
	}
}
function obj_attr_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content == '') {
		$("#title").val("记录每一天的心情...");
	}
}
function obj_cancel_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content != '记录每一天的心情...') {
		$("#"+content_id).val("记录每一天的心情...");
	}
}
</script>