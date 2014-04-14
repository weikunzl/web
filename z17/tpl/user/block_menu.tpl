  <div class="user_main_left">

    <div class="user_info_">
	  <div class="J_UserLogo"><a href="<!--{$ucfile}-->?c=avatar"><img src="<!--{$u.avatarurl}-->" width="48" height="58" title="设置行形象照" /></a></div>
	  <div class="J_UserInfoBox">
	    <!--{$u.levelimg}--><a href="<!--{$u.homeurl}-->" target="_blank" title="访问我的主页"><!--{$u.username}--></a>&nbsp;
		  <br />
		  <a href="<!--{$ucfile}-->?c=certify"><img src="<!--{$ucpath}-->images/cid<!--{if $u.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.idnumberrz==0}-->身份证未认证<!--{else}-->已身份证认证<!--{/if}-->" /></a>&nbsp;
		  <a href="<!--{$ucfile}-->?c=certify"><img src="<!--{$ucpath}-->images/email<!--{if $u.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.emailrz==0}-->邮箱未认证<!--{else}-->已邮箱认证<!--{/if}-->" /></a>&nbsp;
		  <a href="<!--{$ucfile}-->?c=certify"><img src="<!--{$ucpath}-->images/video<!--{if $u.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.videorz==0}-->视频未认证<!--{else}-->已视频认证<!--{/if}-->" /></a>&nbsp;
		<br />
		<font color="green">(<!--{$u.groupname}-->)</font>
	  </div>
	  <div class="clear"> </div>
	</div>
	<div class="user-info-tip">
	  <p>
		<a href="<!--{$u.homeurl}-->" target="_blank">预览我的个人主页</a><br />
		<!--{if $u.lovestatus=='1'}-->
		<font color="green">征友进行中</font>
		<!--{else}-->
		<font color="gray">已关闭征友</font>
		<!--{/if}-->
		<a href="<!--{$ucfile}-->?c=account&a=setstatus">修改</a>
		<br />
		帐户金币：<!--{$u.money}-->
	  </p>
	</div>
	<div class="user-info-tip">
	  <div class="user-info-tip-left">
		<table cellspacing="0" cellpadding="0" border="0" align="center">
		  <tr>
		    <td class="numberInbox">
			  <!--{assign var="count_msg" value=<!--{count mod='user' type='newmessage' value=$u.userid}-->}-->
			  <div class="numberR"><a href="<!--{$ucfile}-->?c=message"><!--{if $count_msg>99}-->99+<!--{else}--><!--{$count_msg}--><!--{/if}--></a></div>
			</td>
		  </tr>
		  <tr>
		    <td height="30">收件箱</td>
		  </tr>
		</table>
	  </div>
	  <div class="user-info-tip-right">
		<table cellspacing="0" cellpadding="0" border="0" align="center">
		  <tr>
		    <td class="numberInbox">
			  <!--{assign var="count_hi" value=<!--{count mod='user' type='newhi' value=$u.userid}-->}-->
			  <div class="numberR"><a href="<!--{$ucfile}-->?c=hi"><!--{if $count_hi>99}-->99+<!--{else}--><!--{$count_hi}--><!--{/if}--></a></div>
			</td>
		  </tr>
		  <tr>
		    <td height="30">打招呼</td>
		  </tr>
		</table>
	  </div>
	  <div class="clear"></div>
	</div>
	
	<div class="user_menu_hr"></div>
    <div class="user_menu_item">
	  <ul>
        <li<!--{if $cp_menuid=='account'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562879.png" /><a href="<!--{$ucfile}-->?c=account">交友帐号</a></li>
        <li<!--{if $cp_menuid=='payment'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562761.png" /><a href="<!--{$ucfile}-->?c=payment"><b><font color="red">在线充值</font></b></a></li>
        <li<!--{if $cp_menuid=='vip'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562855.png" /><a href="<!--{$ucfile}-->?c=vip">会员服务</a></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
	    <li<!--{if $cp_menuid=='message'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562810.png" /><a href="<!--{$ucfile}-->?c=message"><b><font color="red">我的信件</font></b></a></li>
		<li<!--{if $cp_menuid=='hi'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562717.png" /><a href="<!--{$ucfile}-->?c=hi">我的问候</a></li>
		<li<!--{if $cp_menuid=='sysmsg'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562812.png" /><a href="<!--{$ucfile}-->?c=sysmsg">系统消息</a></li>
		<li<!--{if $cp_menuid=='gift'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562785.png" /><a href="<!--{$ucfile}-->?c=gift">我的礼物</a></li>
		<li<!--{if $cp_menuid=='listen'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562709.png" /><a href="<!--{$ucfile}-->?c=listen"><b><font color="red">我的关注</font></b></a></li>
		<li<!--{if $cp_menuid=='fans'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562808.png" /><a href="<!--{$ucfile}-->?c=fans">我的粉丝</a></li>
		<li<!--{if $cp_menuid=='visitme'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562779.png" /><a href="<!--{$ucfile}-->?c=visitme">谁看过我</a></li>
		<li<!--{if $cp_menuid=='visit'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562757.png" /><a href="<!--{$ucfile}-->?c=visit">我看过谁</a></li>
		<li<!--{if $cp_menuid=='match'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562832.png" /><a href="<!--{$ucfile}-->?c=match"><b><font color="red">缘分速配</font></b></a></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
        <li<!--{if $cp_menuid=='avatar'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562711.png" /><a href="<!--{$ucfile}-->?c=avatar">形象照</a></li>
        <li<!--{if $cp_menuid=='album'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562793.png" /><a href="<!--{$ucfile}-->?c=album">我的相册</a><span><a href="<!--{$ucfile}-->?c=album&a=upload">上传</a></span></li>
		<li<!--{if $cp_menuid=='profile'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562783.png" /><a href="<!--{$ucfile}-->?c=profile"><b><font color="red">编辑资料</font></b></a></li>
        <li<!--{if $cp_menuid=='certify'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562811.png" /><a href="<!--{$ucfile}-->?c=certify"><b><font color="red">诚信认证</font></b></a></li>
        <li<!--{if $cp_menuid=='cond'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562843.png" /><a href="<!--{$ucfile}-->?c=cond">择友条件</a></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
        <li<!--{if $cp_menuid=='weibo'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562851.png" /><a href="<!--{$ucfile}-->?c=weibo"><b><font color="red">心情微播</font></b></a></span></li>
        <li<!--{if $cp_menuid=='diary'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562885.png" /><a href="<!--{$ucfile}-->?c=diary">我的日记</a><span><a href="<!--{$ucfile}-->?c=diary&a=add">发表</a></span></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
        <li<!--{if $cp_menuid=='extend' && $a=='connect'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562804.png" /><a href="<!--{$ucfile}-->?c=extend&a=connect">绑定登录</a></li>
        <li<!--{if $cp_menuid=='extend' && $a=='cpa'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562848.png" /><a href="<!--{$ucfile}-->?c=extend&a=cpa">推广注册</a></li>
        <li<!--{if $cp_menuid=='extend' && $a=='transfer'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562743.png" /><a href="<!--{$ucfile}-->?c=extend&a=transfer">积分转换</a></li>
        <li<!--{if $cp_menuid=='money'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562763.png" /><a href="<!--{$ucfile}-->?c=money">金币记录</a></li>
        <li<!--{if $cp_menuid=='points'}--> class="current"<!--{/if}-->><img src="<!--{$ucpath}-->images/menu/green/562875.png" /><a href="<!--{$ucfile}-->?c=points">积分记录</a></li>
      </ul>
	  <div class="clear"></div>
	</div>
  </div>
  <!--//user_main_left End-->