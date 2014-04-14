<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<div class="index_p"> 
  当前形象照：
    <!--{if $login.info.avatar != ''}-->
	  <!--{if $login.info.avatarflag == 1}-->
	  <font color="green">正常</font>
	  <!--{else}-->
	  <font color="#999999">锁定</font>
	  <!--{/if}-->
    <!--{/if}-->
    <br />
	<!--{if !empty($login.info.avatar)}-->
	<img src="<!--{$urlpath}--><!--{$login.info.avatar}-->" />
	<!--{else}-->
	<!--{$login.info.useravatar}-->
	<!--{/if}-->
  <br/>
  <h3 class="slide_bg_d">【上传形象照】</h3>
  1、清析的正面单人照；<br />
  2、jpg,gif,png 格式；<br />
  3、受手机网速影响上传需要一定的时间，请耐心等待；<br/>
  <form method="post" action="<!--{$wapfile}-->?c=cp_info&uploadpart=photo" enctype="multipart/form-data">
    <input type='hidden' name='a' value="saveavatar" />
    <input name="photo" type="file"  />
    <br />
    <input type="submit" class="submit_b" value="立即上传" />
    <br/>
  </form>
  温馨提示：<br/>
  1、只有智能手机才可以通过网页上传相片；<br/>
  2、如果您是智能手机，但也上传不了相片，建议您下载使用“UC浏览器”来访问本站，再尝试使用手机上传；<br/>
  3、您也可以用过电脑登录网站进行上传。<br/>
</div>
<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info">用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=avatar">形象照</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
