<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="index_p"> 如果不上传形象照就不会被其它用户搜索出来,搜索或推荐上是有形象照的排前面!<br/>
  <h3 class="slide_bg_d">【上传形象照】</h3>
  1、清析的正面单人照；<br />
  2、大于10K小于2M；<br />
  3、jpg、gif、png格式；<br />
  4、受手机网速影响上传需要一定的时间，请耐心等待。<br/>
  <form method="post" action="<!--{$wapfile}-->?c=passport&uploadpart=photo" enctype="multipart/form-data" style="margin:0;">
    <input type='hidden' name='a' value="saveavatar" />
    <input name="photo" type="file"  />
    <br />
    <input type="submit" class="submit_b" value="立即上传" />
    <br/>
  </form>
  <a href="<!--{$wapfile}-->">跳过此步以后再上传</a><br/>
  温馨提示：<br/>
  1、只有智能手机才可以通过网页上传相片；<br/>
  2、如果您是智能手机但也上传不了相片，建议您下载使用UC浏览器</a>来访问本站，再尝试使用手机上传；<br/>
  3、您也可以用过电脑登录网站进行上传：<!--{$config.siteurl}--><br/>
</div>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
