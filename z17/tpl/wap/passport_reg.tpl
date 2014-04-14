<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="index_p"> 欢迎注册[<!--{$config.sitename}-->]会员</div>
<h3 class="slide_bg_d">【帐号信息】</h3>
<form  action="<!--{$wapfile}-->?c=passport"  method="post" style="margin:0px;">
<input type='hidden' name='a' value='reg1' />
  <table>
    <tr>
      <td>*昵　　称:</td>
      <td><input type="text" name="username" style="width:120px" /></td>
    </tr>
    <tr>
      <td>*密　　码:</td>
      <td><input type="text" name="password" type="password" style="width:120px" /></td>
    </tr>
    <tr>
      <td>*登录邮箱:</td>
      <td><input type="text" name="email" style="width:130px;" /></td>
    </tr>
  </table>
  <h3  class="slide_bg_d">【资料信息】</h3>
  <table>
    <tr>
      <td>*性　　别:</td>
      <td><select name="gender" id="gender">
          <option selected="selected" value="1">男</option>
          <option value="2">女</option>
        </select></td>
    </tr>
    <tr>
      <td>*生　　日:</td>
      <td><input type="text" name="birthday" style="width:120px" /><br />
        (格式:19880201) </td>
    </tr>
    <tr>
      <td>*婚姻状况:</td>
      <td><!--{hook mod='var' item='marrystatus' name='marrystatus' type='select' text='=请选择='}--></td>
    </tr>
    <tr>
      <td>*学　　历:</td>
      <td><!--{hook mod='var' item='education' name='education' type='select' text='=请选择='}--></td>
    </tr>
    <tr>
      <td>*身　　高:</td>
      <td><!--{hook mod='height' name='height' text='=请选择=' value='160'}--> CM</td>
    </tr>
    <tr>
      <td>*所在地区:</td>
      <td><!--{area type='dist1' name='provinceid' text='=请选择='}--></td>
    </tr>
	<!--{if $config.reglovesort == '1'}-->
    <tr>
      <td><!--{if $config.requestlovesort=='1'}-->*<!--{/if}-->交友类型:</td>
      <td><!--{hook mod='lovesort' type='select' name='lovesort' text='=请选择='}--></td>
    </tr>
	<!--{/if}-->

	<!--{if $config.regsalary == '1'}-->
    <tr>
      <td><!--{if $config.requestsalary=='1'}-->*<!--{/if}-->月薪收入:</td>
      <td><!--{hook mod='var' item='salary' name='salary' type='select' text='=请选择='}--></td>
    </tr>
	<!--{/if}-->
    
	<!--{if $config.regweight == '1'}-->
    <tr>
      <td><!--{if $config.requestweight=='1'}-->*<!--{/if}-->体　　重:</td>
      <td><!--{hook mod='weight' name='weight' text='=请选择='}--> KG</td>
    </tr>
	<!--{/if}-->
    
	<!--{if $config.regmobile == '1'}-->
    <tr>
      <td><!--{if $config.requestmobile=='1'}-->*<!--{/if}-->手机号码:</td>
      <td><input type="text" name="mobile" style="width:120px" /></td>
    </tr>
	<!--{/if}-->

	<!--{if $config.regqq == '1'}-->
    <tr>
      <td><!--{if $config.requestqq=='1'}-->*<!--{/if}-->QQ号码:</td>
      <td><input type="text" name="qq" style="width:120px" /></td>
    </tr>
	<!--{/if}-->
	
	<!--{if $config.regidnumber == '1'}-->
    <tr>
      <td><!--{if $config.requestidnumber=='1'}-->*<!--{/if}-->身份证号:</td>
      <td><input type="text" name="idnumber" style="width:120px" /></td>
    </tr>
	<!--{/if}-->

  </table>
  <div class="slide_bg_l pl_5">
    <input class="submit_b"  type="submit" value="注册提交" />
  </div>
</form>
<div class="index_p"> 温馨提示：<br />
  1.性别/生日/婚姻状况/学历/身高注册后不可修改,请认真填写!<br />
  2.生日格式是由四位的年份数,两位的月份数,两位的日期数组成,假设是1988年2月1日出生的, 生日应该填写成:19880201<br />
  <div class="bot1"></div>
  已注册用户,<a href="<!--{$wapfile}-->?c=passport&a=login">[直接登录]</a><br />
  如果无法注册,请使用电脑打开网站进行注册<br />
</div>

<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
