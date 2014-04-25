<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="menuid" value="certify"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div class="user_main">

  <div class="main_right">
    <div class="div_">诚信认证</div>
	<div class="nav-tips">您当前诚信星级为：<b><font color="green"><!--{$u.star}--></font></b>级，每成功认证一项，诚信星级加一，并且点亮改认证图标。</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=certify">诚信认证</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover basicdata">

	  <!--{if $a eq 'run'}--> 
	  <ul>
		<li class="auth_logo">
		  <!--{if $u.emailrz=='1'}-->
		  <img src="<!--{$ucpath}-->images/mail.png" title="已认证" />
		  <!--{else}-->
		  <img src="<!--{$ucpath}-->images/mail2.png" title="未认证" />
		  <!--{/if}-->
		  <span class="auth_title" ckl="email" title="用于找回密码，接收交友推荐邮件">邮箱认证</span>
		</li>
		<li class="auth_logo">
		  <!--{if $u.videorz=='1'}-->
		  <img src="<!--{$ucpath}-->images/vedio.png" title="已认证" />
		  <!--{else}-->
		  <img src="<!--{$ucpath}-->images/vedio2.png" title="未认证" />
		  <!--{/if}-->
		  <span class="auth_title" ckl="vedio" title="表明您的视频信息已经认证">视频认证</span>
		</li>
		<li class="auth_logo">
		  <img src="<!--{$ucpath}-->images/id2.png" title="未认证" />
		  <span class="auth_title" ckl="id" title="表明您的身份证信息已经认证">身份认证</span>
		</li>
	  </ul>

      <!--邮箱认证 Begin-->
	  <div class="auth_ck_detail" id="auth_ck_email">
	    <div class="item_title item_margin"><p>邮箱认证</p><span class="shadow"></span></div>
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
		    <td class="lblock" width="15%">您的注册邮箱：</td>
			<td class="rblock" width="85%">
			<!--{$u.email}-->&nbsp;&nbsp;&nbsp;
			<!--{if $u.emailrz == '1'}-->
			<font color="green">已认证</font>
			<!--{else}-->
			<input type="button" value="发送认证邮件" onclick="ajax_sendmailkey('response_tips', '');" class="button-red" /> <span id="response_tips"></span>
			<!--{/if}-->
			</td>
		  </tr>
		</table>
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
		  <tr>
			<td>
			<strong>为什么要进行邮箱认证？</strong><br />
			1.当您忘记密码时，可以帮您找回密码；<br />
			2.可以用来接网站新来信提醒（如果您不想接收也可在账号设置里取消）；<br />
			3.认证通过后可在您的资料页点亮邮箱认证图标，提高你的诚信等级。<br />
			</td>
		  </tr>
		</table>
	  </div>
	  <!--//邮箱认证 End-->

      <!--视频认证 Begin-->
	  <div class="auth_ck_detail" id="auth_ck_vedio">
	    <div class="item_title item_margin"><p>视频认证</p><span class="shadow"></span></div>
		<form name="qq_myform" id="qq_myform" action="<!--{$ucfile}-->?c=certify&a=rzqq" method="post">
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <!--{if $u.videorz == '1'}-->
		  <tr>
		    <td class="lblock" width="15%">视频认证：</td>
			<td class="rblock" width="85%"><font color="green">已认证</font></td>
		  </tr>
		  <!--{else}-->
		  <script type="text/javascript" src="<!--{$urlpath}-->tpl/static/swf/webcam.js"></script>
		  <tr>
		    <td colspan="2">
				点击“拍照”后，系统将会自动拍照，并保存到您的资料中，可能有点慢，请您稍等...<br />
				<font color="#df4070"><b>您的电脑必须安装有视频摄像头才能在线拍照</b></font>
			</td>
		  </tr>
		  <tr>
		    <td id="cam">
			   <script language="JavaScript">
					webcam.set_api_url('usercp.php?c=camera&a=webcam');
					webcam.set_quality(90);
					webcam.set_shutter_sound(true);
					document.write(webcam.get_html(320, 230, 300, 218));
				</script>
				
				<script language="JavaScript">
					webcam.set_hook('onComplete', 'my_completion_handler');
					function take_snapshot() {
						$('#tips_txt').html("<font color='blue'>拍照中，请稍候...</font>");
						$('#results').html("<p style='text-align:center;'><font color='gray'>拍照图片预览</font></p>");
						webcam.snap();
					}
					function my_completion_handler(msg) {
						if (msg == 'save fail' || msg == null) {
							$('#tips_txt').html("<font color='red'>视频照片保存失败！</font>");
						}
						else {
							$('#tips_txt').html("<font color='green'>拍照成功，请等待网站审核！</font>");
							$('#results').html('<img src="'+msg+'" />');
							webcam.reset();
						}
					}
				</script>
			</td>
			<td id="results"></td>
		  </tr>
		  <tr>
			<td width="50%"><input type="button" value="点击拍照" onclick="take_snapshot();" class="button-red" /></td>
			<td width="50%" id="tips_txt"></td>
		  </tr>
		  <!--{/if}-->
		  <tr>
			<td colspan="2">
				为什么要视频认证？<br />
				认证通过后可在您的资料页点亮视频认证图标，提高你的诚信等级；<br />
			</td>
		  </tr>
		</table>
		</form>
	  </div>
	  <!--//视频认证 End-->

      <!--身份认证 Begin-->
	  <div class="auth_ck_detail" id="auth_ck_id">
	    <div class="item_title item_margin"><p>身份认证</p><span class="shadow"></span></div>
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
		    <td class="lblock" width="15%">认证项目：</td>
			<td class="rblock" width="85%">
				身份认证：<!--{if $u.idnumberrz=='1'}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- 婚姻认证 -->
				婚姻认证&nbsp;&nbsp;<!--{if $u.marryrz==1}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- 学历认证 -->
				学历认证&nbsp;&nbsp;<!--{if $u.educationrz==1}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- 房产认证 -->
				房产认证&nbsp;&nbsp;<!--{if $u.houserz==1}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
				<!-- 汽车认证 -->
				汽车认证&nbsp;&nbsp;<!--{if $u.carrz==1}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- 收入认证 -->
				收入认证&nbsp;&nbsp;<!--{if $u.incomerz==1}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- 身高认证 -->
				身高认证&nbsp;&nbsp;<!--{if $u.heightrz==1}--><img src="<!--{$ucpath}-->images/dui.gif" /><!--{else}--><img src="<!--{$ucpath}-->images/cuo.gif" /><!--{/if}-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		  </tr>
		  <tr>
		    <td class="lblock">待审/锁定的证件：</td>
			<td class="rblock">
			    <!--{if empty($certify)}-->
				~~
				<!--{else}-->
				<!--{foreach $certify as $volist}-->
				<a href="<!--{$volist.uploadfiles}-->" target="_blank"><!--{$volist.type}--></a>&nbsp;&nbsp;<a href="###" onclick="del(<!--{$volist.certifyid}-->);">删除</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!--{if $volist.i%4==0}-->
				<br />
				<!--{/if}-->
				<!--{/foreach}-->
				<!--{/if}-->
			</td>
		  </tr>
		</table>
		
		<div class="item_title item_margin"><p>上传证件</p><span class="shadow"></span></div>
		<form action="<!--{$ucfile}-->?c=certify&a=saveupload&uploadpart=sf_upfile" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
		<input type="hidden" name="halttype" value="<!--{$halttype}-->" />
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <!-- 证件类型 -->
		  <tr>
			<td class="lblock" width="15%">证件类别 <span class="f_red">*</font></td>
			<td class="rblock" width="85%"><!--{hook mod='certify' type='select' name='certifytype' text='=请选择='}--> <span id="dcertifytype" class="f_red"></span></td>
		  </tr>
		  <!-- 选择证件 -->
		  <tr>
			<td class="lblock">上传证件图片 <span class="f_red">*</span></td>
			<td class="rblock"><input name="sf_upfile" type="file" class="filePrew" id="sf_upfile" /> <span id="dsf_upfile" class="f_red"></span></td>
		  </tr>
		  <!-- 上传按钮 -->
		  <tr id="id_uploadbox">
			<td class="lblock"></td>
			<td class="rblock">
			<input type="button" id="btn_u" value="上传证件" onclick="return checkupload();" class="button-green" />
			</td>
		  </tr>
		  <!-- 上传提示 -->
		  <tr id="id_loadingbar" style="display:none;">
			<td class="lblock"></td>
			<td class="rblock"><img src="<!--{$uctplpath}-->images/uploading.gif" alt="图片上传中，请稍等..." width="220" height="19" border="0" /> 图片上传中，请稍等...</td>
		  </tr>
		</table>
		</form>

		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
		  <tr>
		    <td>
				<b>诚信升级：</b><br />
				1、提交个人证件，彰显征友诚心！<br />
				2、每上传一个证件通过审核，即可增加一颗星；<br />
				3、最高诚信指数为十星级；<br /><br />
				<b>温馨提示：</b><br />
				1、网站严格保守用户的证件隐私信息；<br />
				2、证件上传后，预览图仅对您自己可见；<br />
				3、您的证件通过审核后，其他会员只可看到您的诚信指数变化，不会看到证件内容；<br />
				4、如未征求您本人同意，网站绝不向任何第三方透露您的个人隐私；<br />
				5、您的会员资料页面仅仅显示您提交了何种证件名称，而不会显示您证件上的隐私信息；<br />
				<font color=red>6、您上传证件中的身份证号码信息与您的注册生日必须一致，如果不一致，系统将自动按照您上传证件中身份证号码的生日修改您的资料；如您上传的证件超过了证件有效期，将不能被审核通过，请选择有效期内的证件上传。 </font><br />

			</td>
		  </tr>
		</table>

	  </div>
	  <!--//身份认证 End-->


	  <!--{/if}-->


	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"></div>
  <!--//main_right End-->
  
</div>
<!--//user_main End-->

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
//诚信认证TAB切换
$(function() {
	$(".auth_title").click(function() {
		$(".auth_ck_detail").hide();
		$("#auth_ck_" + $(this).attr("ckl")).show();
	});
});

//上传证件
function checkupload(){
	//选择证件类型
	if($('#certifytype').val() == '') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请选择证件类别', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
    //选择图片
    if ($('#sf_upfile').val() == '') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请选择要上传的照片', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	//判断格式
	if (false == validImageType($('#sf_upfile').val())) {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '图片格式不正确，只能上传jpg,jpeg,png和gif格式图片。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		//alert('图片格式不正确，只能上传jpg,jpeg,png和gif格式图片。');
		return false;
	}
	//显示隐藏
	$('#id_uploadbox').hide();
	$('#id_loadingbar').show();
	$('#upload_form').submit();
	return true;
}

//删除待审证件
function del(id){
	$.dialog({
		lock:true,
		title: '提示',
		content: '确定要删除吗？', 
		icon: 'warning',
		button: [
			{
				name: '确定',
				callback: function () {
					top.window.location = _ROOT_PATH + "usercp.php?c=certify&a=del&id="+id;
				}
			}, 
			{
				name: '取消'
			}
		]
	});
}

//提交手机验证
function checkrzmobile() {
	var mobile = $('#mobile').val();
	var code = $('#checkcode').val();
	if (!isMobile(mobile)) {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '对不起，手机号码格式不正确。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	if (code == '') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '对不起，验证码不能为空。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	$('#myform').submit();
	return true;
	
}
function getmbkey(obj, tip, bt) {
	var mobile = $('#mobile').val();
	if (!isMobile(mobile)) {
		$.dialog({
			lock:true,
			title: '错误提示', 
			content: '对不起，手机号码格式不正确。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	ajax_getmbkey(mobile, tip, bt);
}

//发送验证码
function checksendrzm(tips, btn) {
	var qq = $('#qq').val();
	if (!isQQ(qq)) {
		//alert('对不起，QQ号码格式不正确。');
		$.dialog({
			lock:true,
			title: '错误提示', 
			content: '对不起，QQ号码格式不正确。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	ajax_sendqqrzm(qq, tips, btn);
}

//提交QQ验证
function checkrzqq() {
	var qq = $('#qq').val();
	var qqrzm = $('#qqrzm').val();
	if (!isQQ(qq)) {
		$.dialog({
			lock:true,
			title: '错误提示', 
			content: '对不起，QQ号码格式不正确。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	if (qqrzm == '') {
		$.dialog({
			lock:true,
			title: '错误提示', 
			content: '对不起，验证码不能为空。', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	return true;
}
</script>