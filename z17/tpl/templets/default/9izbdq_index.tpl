<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='index'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="indexbg">
    <div class="index"> 
      <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->
      
		
        
	<!--{if $login.status == 1}-->
	<div class="loginwrap">
		<!--{assign var='zone' value=get_zone('index_slide_banner')}-->
	<div class="huar"> 
          <div class="llgo">
            <div class="login_gooo">
              <div class="login_xxxxx"> <a href="<!--{$login.info.homeurl}-->" class="login_gohead" title="<!--{$login.info.username}-->"><!--{$login.info.useravatar}--></a>
                <div class="login_xinxi">
                  <div><!--{$login.info.levelimg}--> <a href="<!--{$login.info.homeurl}-->"><!--{$login.info.username}--></a></div>
                  <div><!--{$lang.money}-->：<!--{$login.info.money}--></div>
                  <div>相册：<!--{count mod='user' type='album' value=$login.info.userid}--> 张 <a href="<!--{$urlpath}-->usercp.php?c=album">上传</a></div>
                  <div><a href="<!--{$appfile}-->?c=passport&a=logout">退出登录</a>&nbsp;|&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=payment">充值</a></div>
                </div>
                <div class="c"></div>
              </div>
	      <!--
              <div class="login_hudong">
			    <span>
				  <img src="<!--{$skinpath}-->themes/images/cid<!--{if $login.info.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $login.info.idnumberrz==1}-->已身份证认证<!--{else}-->身份证未认证<!--{/if}-->">
				  <img src="<!--{$skinpath}-->themes/images/video<!--{if $login.info.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $login.info.videorz==1}-->已视频认证<!--{else}-->视频未认证<!--{/if}-->">
				  <img src="<!--{$skinpath}-->themes/images/email<!--{if $login.info.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $login.info.emailrz==1}-->已邮箱认证<!--{else}-->邮箱未认证<!--{/if}-->">

				  诚信星级：<!--{$login.info.star}-->星，<a href="<!--{$urlpath}-->usercp.php?c=certify">诚信认证</a>
			</span>
                </div>
		-->
             
            </div>

	    <div class="login_right">
		<ul>
		<li><a href="<!--{$urlpath}-->usercp.php?c=message"><div class="newmsgbox div_red"><img src="/tpl/user/images/menu/green/562810.png"><div>新信件(<!--{count mod='user' type='newmessage' value=$login.info.userid}-->)</div></div></a></li>
		<li><a href="<!--{$login.info.homeurl}-->"><div class="newmsgbox div_yellow"><img src="/tpl/user/images/menu/green/562779.png"><div>新访客(<!--{$login.info.hits}-->)</div></div></a></li>
		<li><a href="<!--{$urlpath}-->usercp.php?c=listen"><div class="newmsgbox div_blue"><img src="/tpl/user/images/menu/green/562709.png"><div>新关注(0)</div></div></a></li>
		<li><a href="<!--{$urlpath}-->usercp.php?c=gift"><div class="newmsgbox div_green"><img src="/tpl/user/images/menu/green/562785.png"><div>新礼物(<!--{count mod='user' type='gift' value=$login.info.userid}-->)</div></div></a></li>
		</ul>   
	    </div>
          </div>
	  </div>
	</div>
	<!--{/if}-->

        

    </div>
  </div>
  <div class="bigline"></div>
  <div class="index1">
    <div class="left3">
	  
	  <h2 class="hh3">
	    <label><a id="tab_label_tag" href="###" class="nnn" onMouseOver="tab_label('0');">最新会员</a></label>
	    <label><a id="tab_label_tag" href="###" onMouseOver="tab_label('1');">推荐女会员</a></label> 
	    <label><a id="tab_label_tag" href="###" onMouseOver="tab_label('2');">推荐男会员</a></label>
		
	    <a href="<!--{$appfile}-->?c=user" class="more3">查看更多&gt;&gt;</a> 
	  </h2>
      <div class="left3list" style="display:block;" id="tab_label_0">
        <ul>
          <!--{assign var='user' value=vo_list("mod={user} where={v.avatar='1'} num={18}")}--> 
          <!--{foreach $user as $volist}-->
          <li><a href="<!--{$volist.homeurl}-->" target="_blank"><img src="<!--{$volist.avatarurl}-->" width='90px' height='110px' title="<!--{$volist.username}-->" alt="<!--{$volist.username}-->" /></a>
            
            <div class="areaf"> <span><!--{area type='text' value=$volist.cityid}--></span> <span><!--{$volist.age}-->岁</span> </div>
			<div class="guangzh"><a href="###" onClick="jbox_hibox(<!--{$volist.userid}-->);">打招呼</a><a href="###" onClick="jbox_writebox(<!--{$volist.userid}-->);">写信件</a></div>
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
			<div class="guangzh"><a href="###" onClick="jbox_hibox(<!--{$volist.userid}-->);">打招呼</a><a href="###" onClick="jbox_writebox(<!--{$volist.userid}-->);">写信件</a></div>
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
			<div class="guangzh"><a href="###" onClick="jbox_hibox(<!--{$volist.userid}-->);">打招呼</a><a href="###" onClick="jbox_writebox(<!--{$volist.userid}-->);">写信件</a></div>
          </li>
          <!--{/foreach}-->
        </ul>
      </div>

	<script>
	//显示隐藏
	function tab_label(tabid) {
		var taglength = $("a[id='tab_label_tag']").length;
		for (i=0; i<taglength; i++){
			if (tabid == i) {
				$("a[id='tab_label_tag']").eq(i).addClass('nnn');
				$('#tab_label_'+i).show();
			}
			else {
				$("a[id='tab_label_tag']").eq(i).removeClass('nnn');
				$('#tab_label_'+i).hide();
			}
		}
	}
	</script>

    </div>
    <div class="right3">
      <h2 class="righth3">心情微播</h2>
      <div class="right3ser" style="height:130px;">
	      <!--{assign var='weibo' value=vo_list("mod={weibo} num={2}")}-->
		  <!--{foreach $weibo as $volist}-->
		  <p class="fitem fitem-i">
		  <a href="<!--{$volist.homeurl}-->"><!--{$volist.username}--></a>. <!--{$volist.age}-->岁，<!--{area type='text' value=$volist.cityid}--><br />
		  <!--{$volist.content|filterhtml:35}-->...
          </p>
		  <!--{/foreach}-->
      </div>


      <div class="paper-aside noticesec">
        <div class="titlebar">
          <div class="title3">明星会员</div>
        </div>
        <div class="noticewrap">
			<!--{assign var='vipuser' value=vo_list("mod={listuser} type={vip} where={v.avatar='1' AND v.monolog='1'} num={1}")}-->
			<!--{foreach $vipuser as $volist}-->
			<div class="head5"><a href="<!--{$volist.homeurl}-->"><!--{$volist.useravatar}--></a></div>
			<div class="headr5">
				<span class="headr5_2"><!--{$volist.username}--></span> <!--{$volist.levelimg}--><br>
				<!--{$volist.age}--> 岁　<br>
				<!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}--> <br>
				<!--{hook mod='var' type='text' item='education' value=$volist.education}-->
			</div>
			<div class="headr5_1">
				<!--{$volist.monolog|filterhtml:60}-->...<a href="<!--{$volist.homeurl}-->" target="_blank">查看资料</a>
			</div>
			<div class="headr5_3"> 
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







  <div class="bigline"></div>
  <div class="linkss">
    <div class="linktitle">友情链接</div>
    <div class="linkcontent"><!--{label name='friendlink'}--></div>
  </div>

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
</script>