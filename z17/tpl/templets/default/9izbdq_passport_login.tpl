<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="loginbox">
        <div class="log_box">
          <form method="post" action="<!--{$urlpath}-->index.php?c=passport&a=loginpost&forward=<!--{$forward}-->" name="login_form" id="login_form" />
            <div class="form_li  desc">登录网站</div>
            <div class="formtip">
              <p id="login_error_msg" class="color5"></p>
            </div>
            <div class="form_li pas">
              <label class="lo_la">账&#12288;号：</label>
              <input type="text" name='loginname' id='loginname' value='用户名/邮箱' class="w1" onclick="changeDefaultInputValue();" onblur="changeDefaultInputValue();" />
            </div>
            <div class="form_li pas">
              <label class="lo_la">密&#12288;码：</label>
              <input type="password" name="password" id="password" class="w1" />
            </div>
			<!--{if $config.logincode == '1'}-->
            <div class="form_li pas">
              <label class="lo_la">验证码：</label>
              <input type="text" id="checkcode" name="checkcode" autocomplete="off" class="w2" /> <img id="checkCodeImg" src="<!--{$urlpath}-->source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refreshCode();"> 换一张</a>
            </div>
			<!--{/if}-->
            <div class="form_li"><a class="btn_a1" href="###">
			  <button class="login_register" onclick="return checklogin();">登  录</button>
              </a><a href="<!--{$urlpath}-->index.php?c=passport&a=forget">忘记密码</a></div>
          </form>
        </div>
        <div class="cooperation">
          <p class="login_list clearfix color3"> <span class="li_d">·</span>没有账号？ <a class="no_ico" href="<!--{$urlpath}-->index.php?c=passport&a=reg">立即注册</a><br>
		  
		  </p>
        </div>
      </div>
    </div>
    <div class="right"> 
	  <a class="login" href="<!--{$urlpath}-->index.php?c=passport&a=reg">没有账号？点击注册&gt;&gt;</a>
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