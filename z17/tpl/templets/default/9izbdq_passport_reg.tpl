<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>30秒免费注册， 开启您的择友之旅~</h1>
      </div>
	  <form method="post" action="<!--{$urlpath}-->index.php?c=passport&a=regpost" name="register_form" id="register_form" />
        <div class="form_box">
          <input type="hidden" value="<!--{$forward}-->" name="forward">
          
		  <div class='reg_tips_center'>账号信息 带*号必填</div>
          <div id="div_email" class="form_li">
            <label><font color="red">*</font> 昵&#12288;&#12288;称：</label>
            <input type="text" name="username" id="username" class="w1" maxlength="16" onblur="ajax_user('username','tip_username');" />  <span id="tip_username"></span>
			<br /><font color="#999999">长度3-16个字符，1个汉字=2个字符
			<br />格式由26个字母，数字，汉字，下横线，中横线组成。</font>
		  </div>
          <div class="form_li">
            <label><font color="red">*</font> 登录密码：</label>
            <input type="password" name="password" id="password" class="w1" /> <font color="#999999">长度6-16个字符</font>
          </div>
          <div class="form_li">
            <label><font color="red">*</font> 确认密码：</label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="w1" /> <font color="#999999"> 输入以上密码</font>
          </div>
          <div class="form_li">
            <label><font color="red">*</font> 登录邮箱：</label>
            <input type="text" name="email" id="email" class="w1" onblur="ajax_email('email','tip_email');" /> <font color="red">*</font> <span id="tip_email"><font color="#999999"> 请输入有效邮箱地址</font></span>
          </div>
	  <div class="form_li">
            <label><font color="red">*</font> 邀请注册码：</label>
		<!--{if $invite_code}-->
		<!--{$invite_code}-->
		<input type="hidden" name="invitecode" id="invitecode" value="<!--{$invite_code}-->" />
		<!--{else}-->
		<input type="text" name="invitecode" id="invitecode" class="w1" /> <font color="red">*</font> <font color="#999999"> 请输入邀请注册码</font>
		<!--{/if}-->
          </div>
		  <!--{if $config.regcode == '1'}-->
          <div class="form_li">
            <label><font color="red">*</font> 验&nbsp;证&nbsp;码&nbsp;：</label>
            <input type="text" id="checkcode" name="checkcode" class='w2' autocomplete="off" onblur="ajax_checkcode('checkcode','tip_checkcode');" maxlength='8' /> <img id="checkCodeImg" src="<!--{$urlpath}-->source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refreshCode('tip_checkcode');"> 换一张</a>  <span id="tip_checkcode"><font color="#999999">请输入验证码</font></span>
          </div>
		  <!--{/if}-->


		  <div class='reg_tips_center'>基本信息 带*号必填</div>
          <div class="bitian">
            <div id="div_gender" class="form_li">
              <label><font color="red">*</font>  您的性别：</label>
              <input type='radio' name='gender' id='gender' value='1' checked />男， <input type='radio' name='gender' id='gender' value='2' />女 <span id='dgender' class='f_red'></span> <font color='#999999'>(一旦选择不能修改)</font>
            </div>
            <div id="div_birthday" class="form_li">
              <label><font color="red">*</font> 出生日期：</label>
              <!--{hook mod='year' name='ageyear' text='请选择'}-->年
			  <!--{hook mod='month' name='agemonth' text='请选择'}-->月
			  <!--{hook mod='day' name='ageday' text='请选择'}-->日
			  <font color='#999999'>(一旦选择不能修改)</font>
			</div>
            <div id="div_marriage" class="form_li">
              <label><font color="red">*</font>  婚姻状况：</label>
              <!--{hook mod='var' item='marrystatus' name='marrystatus' type='select' text='=请选择='}-->
				<font color='#999999'>(一旦选择不能修改)</font>
            </div>
            <div id="div_eduction" class="form_li">
              <label><font color="red">*</font>  学&#12288;&#12288;历：</label>
              <!--{hook mod='var' item='education' name='education' type='select' text='=请选择='}--> <font color='#999999'>(一旦选择不能修改)</font>
            </div>
            <div id="div_height" class="form_li">
              <label><font color="red">*</font>  身&#12288;&#12288;高：</label>
              <!--{hook mod='height' name='height' text='=请选择=' value=160}--> CM <font color='#999999'>(一旦选择不能修改)</font>
            </div>
            <div id="div_workCity" class="form_li form_city">
              <label><font color="red">*</font>  所在地区：</label>
              <!--{area type='dist1' name='provinceid' ajax='1' cname='cityid' cajax='1' dname='distid' text='=请选择='}-->&nbsp;<span id='dprovinceid' class='f_red'></span>
				<span id="json_cityid"></span>&nbsp;
				<span id="json_distid"></span>
			</div>
			<!--{if $config.reglovesort == '1'}-->
            <div id="div_lovekind" class="form_li">
              <label><font color="red"><!--{if $config.requestlovesort=='1'}-->*<!--{/if}--></font>  交友类型：</label>
              <!--{hook mod='lovesort' type='select' name='lovesort' text='=请选择='}-->
            </div>
			<!--{/if}-->
			<!--{if $config.regsalary == '1'}-->
            <div id="div_salary" class="form_li">
              <label><font color="red"><!--{if $config.requestsalary=='1'}-->*<!--{/if}--></font>  月薪收入：</label>
              <!--{hook mod='var' item='salary' name='salary' type='select' text='=请选择='}-->
            </div>
			<!--{/if}-->
			<!--{if $config.regweight == '1'}-->
            <div id="div_weigth" class="form_li">
              <label><font color="red"><!--{if $config.requestweight=='1'}-->*<!--{/if}--></font>  体&#12288;&#12288;重：</label>
              <!--{hook mod='weight' name='weight' text='=请选择=' value=50}--> KG
            </div>
			<!--{/if}-->

		    <!--{if $config.regmobile == '1'}-->
            <div id="div_mobile" class="form_li">
              <label><font color="red"><!--{if $config.requestmobile=='1'}-->*<!--{/if}--></font>  手机号码：</label>
              <input type="text" name="mobile" id="mobile" class="w1" /> <span id='dmobile' class='f_red'></span> <font color='#999999'>(接收网站短信用)</font>
            </div>

			<!--{/if}-->
			<!--{if $config.regqq == '1'}-->
            <div id="div_qq" class="form_li">
              <label><font color="red"><!--{if $config.requestqq=='1'}-->*<!--{/if}--></font>&nbsp;&nbsp;Q Q号码：</label>
              <input type="text" name="qq" id="qq" class="w1" /> <span id='dqq' class='f_red'></span>
            </div>
			<!--{/if}-->

			<!--{if $config.regweibo == '1'}-->
            <div id="div_weibo" class="form_li">
              <label><font color="red"><!--{if $config.requestweibo=='1'}-->*<!--{/if}--></font> 微博/博客：</label>
              <input type="text" name="homepage" id="homepage" class="w1" /> <span id='dhomepage' class='f_red'></span>
            </div>
			<!--{/if}-->

			<!--{if $config.regidnumber == '1'}-->
            <div id="div_idnumber" class="form_li">
              <label><font color="red"><!--{if $config.requestidnumber=='1'}-->*<!--{/if}--></font> 身份证号：</label>
              <input type="text" name="idnumber" id="idnumber" class="w1" /> <span id='didnumber' class='f_red'></span>
            </div>
			<!--{/if}-->

          </div>

          <div class="form_li">
            <div class="serve_text">
              <input type="checkbox" name='agree' id='agree' value='true' />
              <label>已阅读和同意 <a href="<!--{$urlpath}-->index.php?c=about&a=detail&id=8" target="_blank">注册条款</a> 和 <a href="<!--{$urlpath}-->index.php?c=about&a=detail&id=7" target="_blank">隐私政策</a></label>
            </div>
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' style="pointer:hand;" >
              <button class="button_register" style="pointer:hand;" type='button' onclick="return checkreg();">免费注册</button>
              </a> 
			</div>
          </div>
        </div>
      </form>
    </div>
    <div class="right"> 
	  <a class="login" href="<!--{$urlpath}-->index.php?c=passport&a=login">已有帐号？ 点此登录&gt;&gt;</a>
      <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->passport_tips.tpl"}-->
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script language="javascript">
function checkreg(){
    
	var t = "";
	var v = "";

	t = "username";
	v = $("#"+t).val();
	if(v=="") {
		alert("用户名不能为空");
		$('#'+t).focus();
		return false;
	}

	t = "password";
	v = $("#"+t).val();
	if(v=="") {
		alert("密码不能为空");
		$('#'+t).focus();
		return false;
	}
	else {
		if(v.length<6) {
			alert('密码长度不对');
			$('#'+t).focus();
			return false;
		}

		if($('#confirmpassword').val() != v) {
			alert("确认密码不正确");
			$('#confirmpassword').focus();
			return false;
		}
	}

	t = "email";
	v = $("#"+t).val();
	if(v=="") {
		alert("邮箱不能为空");
		$('#'+t).focus();
		return false;
	}

	t = "invitecode";
	v = $("#"+t).val();
	if(v=="") {
		alert("邀请注册码不能为空");
		$('#'+t).focus();
		return false;
	}

	<!--{if $config.regcode=='1'}-->
	t = "checkcode";
	v = $("#"+t).val();
	if(v=="") {
		alert("验证码不能为空");
		$('#'+t).focus();
		return false;
	}
	<!--{/if}-->


	t = "email";
	v = $("#"+t).val();
	if(v=="") {
		alert("邮箱不能为空");
		$('#'+t).focus();
		return false;
	}

	t = "ageyear";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择生日年份");
		$('#'+t).focus();
		return false;
	}

	t = "agemonth";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择生日月份");
		$('#'+t).focus();
		return false;
	}

	t = "ageday";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择生日日期");
		$('#'+t).focus();
		return false;
	}

	t = "marrystatus";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择婚姻状况");
		$('#'+t).focus();
		return false;
	}

	t = "education";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择学历");
		$('#'+t).focus();
		return false;
	}

	t = "height";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择身高");
		$('#'+t).focus();
		return false;
	}

	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择所在地区");
		$('#'+t).focus();
		return false;
	}

	t = "cityid";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择所在地区");
		$('#'+t).focus();
		return false;
	}
    
	<!--{if $config.reglovesort=='1' && $config.requestlovesort=='1'}-->
	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择交友类别");
		$('#'+t).focus();
		return false;
	}
	<!--{/if}-->
    
	<!--{if $config.regsalary=='1' && $config.requestsalary=='1'}-->
	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择月收入");
		$('#'+t).focus();
		return false;
	}
	<!--{/if}-->
    
	<!--{if $config.regweight=='1' && $config.requestweight=='1'}-->
	t = "weight";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择体重");
		$('#'+t).focus();
		return false;
	}
	<!--{/if}-->

	//联系方式
	<!--{if $config.regmobile=='1' && $config.requestmobile=='1'}-->
	t = "mobile";
	v = $("#"+t).val();
	if(v == "") {
		alert("请填写手机号码");
		$('#'+t).focus();
		return false;
	}
	else {
		if (!isMobile(v)) {
			alert('手机号码不正确！');
			$('#'+t).focus();
			return false;
		}
	}

	<!--{/if}-->
    
	<!--{if $config.regqq=='1' && $config.requestqq=='1'}-->
	t = "qq";
	v = $("#"+t).val();
	if(v == "") {
		alert("请填写QQ号码");
		$('#'+t).focus();
		return false;
	}
	else {
		if (!isQQ(v)) {
			alert('QQ号码格式不正确，请填写5-11位数字');
			$('#'+t).focus();
			return false;
		}
	}
	<!--{/if}-->

	<!--{if $config.regweibo=='1' && $config.requestweibo=='1'}-->
	t = "homepage";
	v = $("#"+t).val();
	if(v=="") {
		alert("请填写微博/博客地址");
		$('#'+t).focus();
		return false;
	}
	<!--{/if}-->

	<!--{if $config.regidnumber=='1' && $config.requestidnumber=='1'}-->
	t = "idnumber";
	v = $("#"+t).val();
	if(v == "") {
		alert("请填写身份证号");
		$('#'+t).focus();
		return false;
	}
	else {
		if (v.length == 15 || v.length == 18) {
		}
		else {
			alert('身份证号码格式不正确');
			$('#'+t).focus();
			return false;
		}
	}
	<!--{/if}-->


	//选择同意
	if ($("input[name=agree]:checked").val() != 'true') {
		alert('请同意注册条款和隐私政策');
		return false;
	}

	$('#register_form').submit();
	return true;
}
//验证码
function refreshCode(tipsid) {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
		if (tipsid != '') {
			$('#'+tipsid).html('<font color=#999999>请输入验证码</font>');
		}
	}
}
</script>