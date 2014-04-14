<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第五步 设置择友条件</h1>
      </div>
      <form method="post" action="<!--{$urlpath}-->index.php?c=passport&a=savecond" name="reg_form" id="reg_form" />
        <div class="form_box">
          
          <div class="form_li s">
            <label>性 别：</label>
            <input type='radio' name='gender' id='gender' value='0' checked />不限，
			<input type='radio' name='gender' id='gender' value='1' />男会员，
			<input type='radio' name='gender' id='gender' value='2' />女会员
		  </div>
          <div class="form_li s">
            <label>年 龄：</label>
            <!--{hook mod='age' name='startage' text='不限'}--> 到 <!--{hook mod='age' name='endage' text='不限'}--> 岁
          </div>
          <div class="form_li s">
            <label>身 高：</label>
            <!--{hook mod='height' name='startheight' text='不限'}--> 到 <!--{hook mod='height' name='endheight' text='不限'}--> CM
          </div>
          <div class="form_li s">
			<div>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
				  <td width="70px" align="right">婚 史：</td>
				  <td style='margin-left:5px;'><!--{hook mod='var' item='marrystatus' name='marry' type='checkbox'}--></td>
			    </tr>
			  </table>
			  <div class="c"></div>
			</div>
          </div>
          <div class="form_li s">
			<div>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
				  <td width="70px" align="right">交友类别：</td>
				  <td style='margin-left:5px;'><!--{hook mod='lovesort' name='lovesort' type='checkbox'}--></td>
			    </tr>
			  </table>
			  <div class="c"></div>
			</div>
          </div>
          <div class="form_li s">
            <label>学 历：</label>
            <!--{hook mod='var' item='education' name='startedu' type='select' text='不限'}--> 到 
			<!--{hook mod='var' item='education' name='endedu' type='select' text='不限'}-->
          </div>
          <div class="form_li s">
		    <div class="youb">
              <label>所在地区：</label>
				<div class="yout">
				<table width='98%' border='0' align='left' cellpadding='0' cellspacing='0'>
				  <tr>
				    <td><font color='#999999'>(最多设置5个地区，必须选择二级地区才会生效。)</font></td>
				  </tr>
				  <tr>
				    <td>
				<!--{area type='dist1' name='province_1' value='' ajax='1' cname='city_1' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
				<span id="json_city_1">
				<!--{area type='dist2' pvalue='' cname='city_1' cvalue='' text='==不限=='}-->
				</span>&nbsp;&nbsp;

				<br />
				<!--{area type='dist1' name='province_2' value='' ajax='1' cname='city_2' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
				<span id="json_city_2">
				<!--{area type='dist2' pvalue='' cname='city_2' cvalue='' text='==不限=='}-->
				</span>&nbsp;&nbsp;

				<br />
				<!--{area type='dist1' name='province_3' value='' ajax='1' cname='city_3' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
				<span id="json_city_3">
				<!--{area type='dist2' pvalue='' cname='city_3' cvalue='' text='==不限=='}-->
				</span>&nbsp;&nbsp;

				<br />
				<!--{area type='dist1' name='province_4' value='' ajax='1' cname='city_4' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
				<span id="json_city_4">
				<!--{area type='dist2' pvalue='' cname='city_4' cvalue='' text='==不限=='}-->
				</span>&nbsp;&nbsp;

				<br />
				<!--{area type='dist1' name='province_5' value='' ajax='1' cname='city_5' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
				<span id="json_city_5">
				<!--{area type='dist2' pvalue='' cname='city_5' cvalue='' text='==不限=='}-->
				</span>&nbsp;&nbsp;  
				    </td>
				  </tr>
				</table>
			  </div>
			  <div class="c"></div>
			</div>

          </div>
          <div class="form_li s">
            <label>诚信星级：</label>
			<!--{hook mod='star' name='star' text='=不限='}-->&nbsp;&nbsp;星&nbsp;&nbsp;
			<select name='starup' id='starup'>
			<option value=''></option>
			<option value='1'>以上</option>
			<option value='2'>以下</option>
			</select>
          </div>
          <div class="form_li s">
            <label>形象照：</label>
            <input type='radio' name='avatar' id='avatar' value='1' />有形象照，<input type='radio' name='avatar' id='avatar' value='0' checked />不限
          </div>
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' onclick="return checkreg();"> <button class="button_register">保存设置</button> </a>
              <label>&nbsp;&nbsp;&nbsp;<a href="<!--{$urlpath}-->usercp.php">跳过，进入会员中心</a> </label>
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
	$('#reg_form').submit();
	return true;
}
</script>