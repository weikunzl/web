    <div class="hwrap">
      <div class="logowrap"><a href="<!--{$urlpath}-->index.php"><img src="<!--{$config.logo}-->" width="151" height="71" alt="<!--{$config.sitename}-->" /></a></div>
    </div>
	<div class="topad">
	<!--{assign var='topads' value=get_ads('top_banner')}-->
	<!--{if !empty($topads)}-->
	<a <!--{if !empty($topads.url) && $topads.url!='#'}-->href="<!--{$topads.url}-->" target="<!--{$topads.target}-->"<!--{/if}-->><img src="<!--{$topads.uploadfiles}-->" width='<!--{$topads.width}-->' height='<!--{$topads.height}-->' border='0' title="<!--{$topads.title}-->" /></a>
	<!--{/if}-->
	</div>
    <div class="tipswrap"> 
	<span class="tips_wap">
	<a href="javascript:void(0);" class="waptips" title="在手机浏览器输入“<!--{$config.siteurl}-->”即可访问。">手机交友</a>
	</span> <span class="tips_com"><a href="<!--{$urlpath}-->usercp.php?c=vip">会员服务</a></span> <span class="tips_save"><a href="###" onclick="addfavorite('<!--{$config.siteurl}-->', '<!--{$config.sitename}-->');">收藏本站</a></span> 
	</div>
	
