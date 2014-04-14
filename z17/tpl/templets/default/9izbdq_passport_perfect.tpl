<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>完善您的交友帐号资料，才能正常使用</h1>
      </div>
	  <form method="post" action="<!--{$urlpath}-->index.php?c=passport" name="perfect_form" id="perfect_form" />
	    <input type="hidden" name='a' id='a' value='saveperfect' />
		<input type="hidden" value="<!--{$forward}-->" name="forward">
        <div class="form_box">
		  <div class='reg_tips_center'>基本信息 必填</div>
          <div class="bitian">
			<!--{if empty($login.info.email)}-->
		    <div class="form_li">
			  <label><font color="red">*</font> 登录邮箱：</label>
			  <input type="text" name="email" id="email" class="w1" onblur="ajax_email('email','tip_email', 'love');" /> <font color="red">*</font> <span id="tip_email"><font color="#999999"> 请输入有效邮箱地址</font></span>
			</div>
			<!--{/if}-->
		    <!--{if $login.info.gender > 0}-->
		    <input type="hidden" name="gender" id="gender" value="<!--{$login.info.gender}-->" />
		    <!--{else}-->
            <div id="div_gender" class="form_li">
              <label><font color="red">*</font>  您的性别：</label>
              <input type='radio' name='gender' id='gender' value='1' checked />男， <input type='radio' name='gender' id='gender' value='2' />女 <span id='dgender' class='f_red'></span> <font color='#999999'>(一旦选择不能修改)</font>
            </div>
			<!--{/if}-->

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
            <div id="div_lovekind" class="form_li">
              <label><font color="red">*</font>  交友类型：</label>
              <!--{hook mod='lovesort' type='select' name='lovesort' text='=请选择='}-->
            </div>
            <div id="div_eduction" class="form_li">
              <label><font color="red">*</font>  学&#12288;&#12288;历：</label>
              <!--{hook mod='var' item='education' name='education' type='select' text='=请选择='}--> <font color='#999999'>(一旦选择不能修改)</font>
            </div>
            <div id="div_salary" class="form_li">
              <label><font color="red">*</font>  月薪收入：</label>
              <!--{hook mod='var' item='salary' name='salary' type='select' text='=请选择='}-->
            </div>
            <div id="div_height" class="form_li">
              <label><font color="red">*</font>  身&#12288;&#12288;高：</label>
              <!--{hook mod='height' name='height' text='=请选择=' value='160'}--> CM <font color='#999999'>(一旦选择不能修改)</font>
            </div>
            <div id="div_weigth" class="form_li">
              <label><font color="red">*</font>  体&#12288;&#12288;重：</label>
              <!--{hook mod='weight' name='weight' text='=请选择=' value='50'}--> KG
            </div>
            <div id="div_workCity" class="form_li form_city">
              <label><font color="red">*</font>  所在地区：</label>
              <!--{area type='dist1' name='provinceid' ajax='1' cname='cityid' cajax='1' dname='distid' text='=请选择='}-->&nbsp;<span id='dprovinceid' class='f_red'></span>
				<span id="json_cityid"></span>&nbsp;
				<span id="json_distid"></span>
			</div>
          </div>

          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' style="pointer:hand;" >
              <button class="button_register" style="pointer:hand;" type='button' onclick="return checkform();">提交保存</button>
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
function checkform(){
	var t = "";
	var v = "";

	t = "email";
	v = $("#"+t).val();
	if(v=="") {
		alert("邮箱不能为空");
		$('#'+t).focus();
		return false;
	}

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

	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择交友类别");
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

	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择月收入");
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

	t = "weight";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择体重");
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

	
	$('#perfect_form').submit();
	return true;
}
</script>