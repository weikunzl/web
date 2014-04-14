<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="account"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 帐号信息</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<!--{if $a=='run'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=account">我的帐号</a></li>
		  <li class="tab_item<!--{if $a=='editpassword'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=account&a=editpassword">修改密码</a></li>
		  <li class="tab_item<!--{if $a=='recall'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=account&a=recall">邮件接收</a></li>
		  <li class="tab_item<!--{if $a=='setstatus'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=account&a=setstatus">设置状态</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

	<div class="div_smallnav_content_hover">
	  <!--{if $a eq 'run'}--> 
      <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>我的帐号</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 会员ID -->
		  <tr>
			<td width="15%" class="lblock">交友ID：</td>
			<td width="85%" class="rblock"><!--{$u.userid}--></td>
		  </tr>
		  <!-- 会员名称 -->
		  <tr>
			<td class="lblock">登录账号：</td>
			<td class="rblock"><!--{$u.username}--></td>
		  </tr>
		  <!-- Email -->
		  <tr>
			<td class="lblock">登录邮箱：</td>
			<td class="rblock"><!--{$u.email}--></td>
		  </tr>
		  <!-- 交友状态 -->
		  <tr>
			<td class="lblock">交友状态：</td>
			<td class="rblock">
			<!--{if $u.lovestatus==1}-->
			<font color='green'>征友进行中</font>
			<!--{else}-->
			<font color='red'>已关闭征友</font>
			<!--{/if}-->
			&nbsp;&nbsp;&nbsp;
			<input type="button" class="button-red" value="修改状态" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=account&a=setstatus';" />
			</td>
		  </tr>
		  <!-- 诚信星级 -->
		  <tr>
			<td class="lblock">诚信星级 </td>
			<td class="rblock">
			  <img src="<!--{$ucpath}-->images/cid<!--{if $u.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.idnumberrz==0}-->身份证未认证<!--{else}-->已身份证认证<!--{/if}-->" />&nbsp;
			  <img src="<!--{$ucpath}-->images/video<!--{if $u.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.videorz==0}-->视频未认证<!--{else}-->已视频认证<!--{/if}-->" />&nbsp;
			  <img src="<!--{$ucpath}-->images/email<!--{if $u.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.emailrz==0}-->邮箱未认证<!--{else}-->已邮箱认证<!--{/if}-->" />&nbsp;
			  <img src="<!--{$ucpath}-->images/mobile<!--{if $u.mobilerz==0}-->_h<!--{/if}-->.png" title="<!--{if $u.mobilerz==0}-->手机未认证<!--{else}-->已手机认证<!--{/if}-->" />
			  &nbsp;&nbsp;&nbsp;
			  <input type="button" class="button-green" value="诚信认证" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=certify';" />
			</td>
		  </tr>
		  <!-- 会员组 -->
		  <tr>
			<td class="lblock">会员组： </td>
			<td class="rblock"><!--{$u.levelimg}--> <b><!--{$g.groupname}--></b>&nbsp;&nbsp;&nbsp;<!--{if $g.groupid>1}-->（VIP到期 <!--{$u.vipenddate_t}-->）<!--{else}-->
			&nbsp;&nbsp;&nbsp;
			
			<a class="btn_c1" href="<!--{$ucfile}-->?c=vip"><span>升级会员服务</span></a><!--{/if}--></td>
		  </tr>
		  <!-- 剩余积分 -->
		  <tr>
			<td class="lblock">积 分：</td>
			<td class="rblock"><font color="blue"><b><!--{$u.points}--></b></font> </td>
		  </tr>
		  <!-- 剩余金币 -->
		  <tr>
			<td class="lblock">金 币：</td>
			<td class="rblock"><font color="green"><b><!--{$u.money}--></b></font> &nbsp;&nbsp;&nbsp;
			<input type="button" value="在线充值" class="button-qing" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=payment';" />&nbsp;&nbsp;&nbsp;
			<!--{if $config.app.card=='1'}-->
			<input type="button" value="充值卡充值" class="button-qing" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=card';" />
			<!--{/if}-->
			</td>
		  </tr>
		  <!-- 注册时间 -->
		  <tr>
			<td class="lblock">注册时间 </td>
			<td class="rblock"><!--{$u.regtime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		  </tr>
		  <!-- 登录次数 -->
		  <tr>
			<td class="lblock">登录次数 </td>
			<td class="rblock"><!--{$u.logintimes}--> 次</td>
		  </tr>
		  <!-- 登录时间 -->
		  <tr>
			<td class="lblock">登录时间 </td>
			<td class="rblock"><!--{$u.logintime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		  </tr>
      </table>
	  <!--{/if}-->

	  <!--{if $a eq 'editpassword'}--> 
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=account&a=savepassword" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>修改密码</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 旧密码 --> 
		  <tr>
			<td class='lblock' width="20%">旧 密 码 <span class="f_red">*</span></td>
			<td class='rblock'><input type="password" name="oldpassword" id="oldpassword" class="input-150" maxlength="16" /> <span id="doldpassword" class="f_red"></span></td>
		  </tr>
		  <!-- 新密码 -->
		  <tr>
			<td class='lblock'>新 密 码 <span class="f_red">*</span></td>
			<td class='rblock'><input type="password" name="newpassword" id="newpassword" class="input-150" maxlength="16" /> <span id="dnewpassword" class="f_red"></span> (6-16个字符)</td>
		  </tr>
		  <!-- 确认新密码 -->
		  <tr>
			<td class='lblock'>再次输入 <span class="f_red">*</span></td>
			<td class='rblock'><input type="password" name="confirmpassword" id="confirmpassword" class="input-150" maxlength="16" /> <span id="dconfirmpassword" class="f_red"></span></td>
		  </tr>
		  <!-- 提交保存 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'><input type="submit" name="btn_save" class="button-red" value="修 改" onclick="return checkform();" /></td>
		  </tr>
	  </table>
	  </form>
	  <!--{/if}-->

	  <!--{if $a eq 'recall'}-->
	  <form name="myform" action="<!--{$ucfile}-->?c=account&a=saverecall" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>邮件接收设置</p><span class="shadow"></span></div></td>
		  </tr>
		  <tr>
			<td colspan="2"><b>接收会员打招呼、写信件和送礼物邮件提醒</b><br />
			只有通过认证的邮箱才可以接收邮件。<a href="<!--{$urlpath}-->usercp.php?c=certify&a=email">邮箱认证</a>
			</td>
		  </tr>
		  <tr>
			<td class='lblock' width='10%'></td>
			<td class='rblock' width='90%'>开启 <input type="radio" name="recall" id="recall" value='1'<!--{if $u.recall=='1'}--> checked<!--{/if}--> /> <span id="drecall" class="f_red"></span></td>
		  </tr>
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'>关闭 <input type="radio" name="recall" id="recall" value='0'<!--{if $u.recall=='0'}--> checked<!--{/if}--> /> <span id="drecall" class="f_red"></span></td>
		  </tr>
		  <!-- 提交保存 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'><input type="submit" name="btn_save" value="保 存" class="button-red" /></td>
		  </tr>
	  </table>
	  </form>
	  <!--{/if}-->

	  <!--{if $a eq 'setstatus'}-->
	  <form name="myform" action="<!--{$ucfile}-->?c=account&a=savestatus" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>设置交友状态</p><span class="shadow"></span></div></td>
		  </tr>
		  <tr>
			<td colspan="2"><b>如果征友状态关闭，别人再也无法看到您的资料和照片；</b><br />
			征友状态关闭之后，不需要再做任何其它操作。
			</td>
		  </tr>
		  <tr>
			<td class='lblock' width='10%'></td>
			<td class='rblock' width='90%'>征友进行中 <input type="radio" name="lovestatus" value="1"<!--{if $u.lovestatus==1}--> checked<!--{/if}--> /> <span id="dlovestatus" class="f_red"></span></td>
		  </tr>
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'>关闭征友 <input type="radio" name="lovestatus" value="2"<!--{if $u.lovestatus==2}--> checked<!--{/if}--> /> <span id="dlovestatus" class="f_red"></span></td>
		  </tr>
		  <!-- 提交保存 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'><input type="submit" name="btn_save" value="保 存" class="button-red" /></td>
		  </tr>
	  </table>
	  </form>
	  <!--{/if}-->


    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=account">帐号信息</a></li>
      <li><a href="<!--{$ucfile}-->?c=account&a=editpassword">修改密码</a></li>
      <li><a href="<!--{$ucfile}-->?c=account&a=recall">邮件接收</a></li>
	  <li><a href="<!--{$ucfile}-->?c=account&a=setstatus">设置状态</a></li>
    </ul>
  </div>
  <div style="margin:30px;"></div>
</div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
function checkform() {
	var t = '';
	var v = '';
    
	//旧密码
	t = 'oldpassword';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('旧密码不能为空', t);
		return false;
	}
    
	//新密码
	t = 'newpassword';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('请输入新密码', t);
		return false;
	} else {
		if(v.length <6 || v.length>16) {
			dmsg('新密码长度必须为6-16个字符', t);
			return false;
		}
	
	}
    
	//确认密码
	if($('#confirmpassword').val() != $('#newpassword').val()) {
		dmsg('确认新密码不正确', 'confirmpassword');
		return false;
	}

	$("#myform").submit();

	return true;
}
</script>