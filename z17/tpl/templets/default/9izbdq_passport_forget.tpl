<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <form method="post" action="<!--{$urlpath}-->index.php?c=passport&a=forgetpost" name="forget_form" id="forget_form" />
    <div class="left public_960box_m">
      <h2>找回密码</h2>
      <ul class="form_box left_form">
        <li class="form_li form_ml title">邮箱找回密码</li>
        <li class="form_ml desc">
          <p>请输入您的注册邮箱，我们将给您发送密码重置邮件。</p>
        </li>
        <li class="form_ml">
          <p class="form_msg" id="left_form_msg"></p>
        </li>
        <li class="form_li">
          <label>用户名：</label>
          <input type="text" name="username" id="username" maxlength="16"class="w1">
		  <span id='dusername'></span>
        </li>
        <li class="form_li">
          <label>邮&#12288;箱：</label>
          <input type="type" name="email" id="email" class="w1">
		  <span id='demail'></span>
        </li>
		<!--{if $config.forgetcode == '1'}-->
        <li class="form_li">
          <label>验证码：</label>
		  <input type="text" id="checkcode" name="checkcode" class='w2' autocomplete="off" /> <img id="checkCodeImg" src="<!--{$urlpath}-->source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refreshCode();"> 换一张</a>

		  <span id='dcheckcode'></span>
        </li>
		<!--{/if}-->
        <li class="form_ml pt15">
		<a class="btn_a1" href="javascript:void(0);"> <button class="login_register" onclick="return checkforget();">提 交</button> </a></li>
      </ul>
    </div>
	</form>
    <div class="right"> 
	  <a class="login" href="<!--{$urlpath}-->index.php?c=passport&a=login">已有账号？ 点此登录&gt;&gt;</a>
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
function checkforget(){
	var t = "";
	var v = "";

	t = "username";
	v = $("#"+t).val();
	if(v=="") {
		alert("用户名不能为空");
		$('#'+t).focus();
		return false;
	}

	t = "email";
	v = $("#"+t).val();
	if(v=="") {
		alert("邮箱地址不能为空");
		$('#'+t).focus();
		return false;
	}

	<!--{if $config.forgetcode=='1'}-->
	t = "checkcode";
	v = $("#"+t).val();
	if(v=="") {
		alert("验证码不能为空");
		$('#'+t).focus();
		return false;
	}
	<!--{/if}-->
	
	$('#forget_form').submit();
	return true;
}
//验证码
function refreshCode() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
	}
}
</script>