<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <form method="post" action="<!--{$urlpath}-->index.php?c=passport&a=changepost" name="set_form" id="set_form" />
	<input type="hidden" name="key" id="key" value="<!--{$key}-->" />
    <div class="left public_960box_m">
      <h2>取回密码，设置新密码</h2>
      <ul class="form_box left_form">
        <li class="form_ml">
          <p class="form_msg" id="left_form_msg"></p>
        </li>
        <li class="form_li">
          <label>会&nbsp;员&nbsp;ID：</label>
          <!--{$userid}-->
        </li>
        <li class="form_li">
          <label>新&nbsp;密&nbsp;码：&nbsp;</label>
          <input type="password" name="password" id="password" class="w3" /> <font color="#999999">长度6-16个字符</font>
		  <span id='dusername'></span>
        </li>
        <li class="form_li">
          <label>确认密码：</label>
          <input type="password" name="confirmpassword" id="confirmpassword" class="w3" /> <font color="#999999"> 输入以上密码</font>
		  <span id='demail'></span>
        </li>
		<!--{if $config.forgetcode == '1'}-->
        <li class="form_li">
          <label>验&nbsp;证&nbsp;码：&nbsp;</label>
		  <input type="text" id="checkcode" name="checkcode" class='w2' autocomplete="off" /> <img id="checkCodeImg" src="<!--{$urlpath}-->source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refreshCode();"> 换一张</a>
		  <span id='dcheckcode'></span>
        </li>
		<!--{/if}-->
        <li class="form_ml pt15">
		<a class="btn_a1" href="javascript:void(0);" onclick="checkchange();"> <button class="login_register">提 交</button> </a></li>
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
function checkchange(){
	var t = "";
	var v = "";

	t = "password";
	v = $("#"+t).val();
	if(v=="") {
		alert("新密码不能为空");
		$('#'+t).focus();
		return false;
	}
	else {
		if($('#confirmpassword').val() != v) {
			alert("确认密码不正确");
			$('#confirmpassword').focus();
			return false;
		}
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

	$('#set_form').submit();
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