<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<!--{if $a eq 'run'}-->
<div class="index_p">
  <div> 
    目前已有[<font color="green"><!--{$total}--></font>]张相片，
	<!--{if $login.group.photo.photolimit == 1}-->
    您还可以上传[<font color="blue"><!--{$cannums}--></font>]张。
	<!--{else}-->
	还可以继续上传，不受限制。
	<!--{/if}-->
	<br />
    <a href="<!--{$wapfile}-->?c=cp_photo&a=upload">点击上传相片</a> <br />
    全方位展示自己，更快找对象，有照片用户的征友成功率是无照片用户的15倍! 
  </div>
</div>
<h3 class="slide_bg_d">【我的相册】</h3>
<div class="index_p">
  <div> 
    <!--{if empty($album)}-->
    您还没有上传照片
	<!--{else}-->
	<!--{foreach $album as $volist}-->
	<img alt="<!--{$volist.title}-->" src="<!--{$volist.thumbfiles}-->" width="70" height="92" border="0" /><br />
	<a href="<!--{$wapfile}-->?c=cp_photo&a=del&id=<!--{$volist.photoid}-->">删除</a> 
	<!--{if $volist.flag==1}-->
	正常
	<!--{else}-->
	锁定
	<!--{/if}-->
	<br />
	<!--{/foreach}-->
	<!--{/if}-->
  </div>
  <!--{if !empty($showpage)}-->
  <div class="page"><!--{$showpage}--></div>
  <!--{/if}-->
</div>
<!--{/if}-->


<!--{if $a eq 'upload'}-->
<div class="index_p"> 
   目前已有0张相片，还能上传15张。<br/>

  <h3 class="slide_bg_d">【上传相册】</h3>
  1、清析的正面单人照；<br />
  2、jpg,gif,png 格式；<br />
  3、受手机网速影响上传需要一定的时间，请耐心等待；<br/>
  <form method="post" action="<!--{$wapfile}-->?c=cp_photo&uploadpart=photo" enctype="multipart/form-data" style="margin:0;">
  <input type="hidden" name="a" value="saveupload" />
    照片标题：<input type="text" name="title" value="" /><br />
    照片地址：<input name="photo" type="file"  /><br />
    <input type="submit" class="submit_b" value="立即上传" /><br/>
  </form>
  温馨提示：<br/>
  1、只有智能手机才可以通过网页上传相片；<br/>
  2、如果您是智能手机，但也上传不了相片，建议您下载使用“UC浏览器”来访问本站，再尝试使用手机上传；<br/>
  3、您也可以用过电脑登录网站进行上传。<br/>
</div>
<!--{/if}-->

<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info">用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_photo">我的相片</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>