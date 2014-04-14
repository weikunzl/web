<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第三步 设置联系方式</h1>
      </div>
      <form method="post" action="<!--{$urlpath}-->index.php?c=passport" name="reg_form" id="reg_form" />
	    <input type='hidden' name='a' id='a' value='savecontact' />
        <div class="form_box">
          
          <div class="form_li s">
            <label><font color='red'>*</font> 手机号：</label>
			<!--{if $login.info.mobilerz == '1'}-->
            <input type='text' name='mobile' id='mobile' class='w1' maxlength='11' value="<!--{$login.info.mobile}-->" readonly="only" /> (已验证，不能更改)
			<!--{else}-->
			<input type='text' name='mobile' id='mobile' class='w1' maxlength='11' value="<!--{$login.info.mobile}-->" /> (手机号码或者QQ必须填写一项)
			<!--{/if}-->
		  </div>
          <div class="form_li s">
            <label><font color='red'>*</font> QQ号码：</label>
            <input type='text' name='qq' id='qq' class='w2' maxlength='11' value="<!--{$login.info.qq}-->" /> (手机号码或者QQ必须填写一项)
          </div>
          <div class="form_li s">
            <label>电话号码：</label>
            <input type='text' name='telephone' id='telephone' class='w1' value="<!--{$login.info.telephone}-->" />
          </div>
          <div class="form_li s">
            <label>MSN：</label>
            <input type='text' name='msn' id='msn' class='w1' value="<!--{$login.info.msn}-->" />
          </div>
          <div class="form_li s">
            <label>博客/微博：</label>
            <input type='text' name='homepage' id='homepage' class='w1' value="<!--{$login.info.homepage}-->" />
          </div>
          <div class="form_li s">
            <label>联系地址：</label>
            <input type='text' name='address' id='address' class='w1' value="<!--{$login.info.address}-->" />
          </div>
          <div class="form_li s">
            <label>邮政编码：</label>
            <input type='text' name='zipcode' id='zipcode' class='w2' value="<!--{$login.info.zipcode}-->" />
          </div>
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' onclick="return checkreg();"> <button class="button_register">下一步</button> </a>
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
	var mobile = $('#mobile').val();
	var qq = $('#qq').val();

	if (mobile == '' && qq == '') {
		alert('手机号码或者QQ至少填写一项');
		return false;
	}
	else {
		if (mobile != '') {
			if (!isMobile(mobile)) {
				alert('手机号码不正确！');
				return false;
			}
		}
		if (qq != '') {
			if (!isQQ(qq)) {
				alert('QQ号码格式不正确，请填写5-11位数字');
				return false;
			}
		}
	}
	$('#reg_form').submit();
	return true;
}
</script>