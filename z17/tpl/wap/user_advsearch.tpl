<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<p class="slide_bg_l pl_5">搜索设置</p>
<div class="index_p">
  <h4 class="slide_bg_d">【搜索设置】</h4>
  <form name="searchForm" action="<!--{$wapfile}-->?c=user&a=list" method="post">
    <div>
	  我&nbsp;&nbsp;要&nbsp;找：
	  <select name="s_sex" id='s_sex'>
		<!--{if $login.status == 1}-->
        <option value="1"<!--{if $login.info.gender==2}--> selected<!--{/if}-->>男会员</option>
        <option value="2"<!--{if $login.info.gender==1}--> selected<!--{/if}-->>女会员</option>
		<!--{else}-->
        <option value="1">男会员</option>
        <option value="2" selected="selected">女会员</option>
		<!--{/if}-->
      </select>
      <br />
      所在地区：
	  <!--{area type='dist1' name='s_dist1' text='=不限='}-->
      <br />
      年　　龄：
      <!--{hook mod='age' name='s_sage' value='20' text='=不限='}-->&nbsp;~&nbsp;<!--{hook mod='age' name='s_eage' value='30' text='=不限='}--> 岁
	  <br />
      身　　高：
      <!--{hook mod='height' name='s_sheight' value='155' text='=不限='}--><span>&nbsp;~&nbsp;</span><!--{hook mod='height' name='s_eheight' value='175' text='=不限='}--> CM
	  <br />
      月&nbsp;&nbsp;收&nbsp;入：
	  <!--{hook mod='var' item='salary' type='select' name='s_ssalary' text='=不限='}--><span>&nbsp;~&nbsp;</span><!--{hook mod='var' item='salary' type='select' name='s_esalary' text='=不限='}-->
	  <br />
      学　　历：
      <!--{hook mod='var' item='education' type='select' name='s_sedu' text='=不限='}--><span>&nbsp;~&nbsp;</span><!--{hook mod='var' item='education' type='select' name='s_eedu' text='=不限='}-->
      <br />
      婚　　史：
      <!--{hook mod='var' item='marrystatus' name='s_marry' type='select' text='=不限='}-->
      <br />
      有无子女：
      <!--{hook mod='var' item='childrenstatus' type='select' name='s_havechild' text='=不限='}-->
      <br />
      住房情况：
      <!--{hook mod='var' item='housing' type='select' name='s_house' text='=不限='}-->
      <br />
      购车情况：
      <!--{hook mod='var' item='caring' type='select' name='s_car' text='=不限='}-->
	  <br />
	  形&nbsp;&nbsp;像&nbsp;照：
	  <select name='s_avatar' id='s_avatar'><option value=''>不限</option><option value='1' selected>有</option></select>
    </div>
    <p class="slide_bg_l">
	<input type="submit" value="立即搜索" class="submit_b"/>
    </p>
  </form>
</div>
<p class="slide_bg_l pl_5">
当前位置:<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; 高级搜索</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
</html>