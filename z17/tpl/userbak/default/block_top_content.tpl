<link href="<!--{$ucpath}-->default/css.css" rel="stylesheet" />
<div id="header">
  <div class="n_top">
    <div class="nn_top">
      <div class="n_logo"> <a href="<!--{$urlpath}-->index.php"><img src="<!--{$config.logo}-->"  alt="<!--{$config.sitename}-->" /></a> </div>
      <div class="n_top_banner"> 
        <!--{assign var='topads' value=get_ads('top_banner')}--> 
        <!--{if !empty($topads)}--> 
        <a <!--{if !empty($topads.url) && $topads.url!='#'}-->href="<!--{$topads.url}-->" target="<!--{$topads.target}-->"<!--{/if}-->><img src="<!--{$topads.uploadfiles}-->" width='<!--{$topads.width}-->' height='<!--{$topads.height}-->' border='0' title="<!--{$topads.title}-->" /></a> 
        <!--{/if}--> 
      </div>
      <div class="n_top_right">
        <div class="n_tops"> <span class="n_tops_1"> <a href="javascript:void(0);" class="waptips" title="在手机浏览器输入“<!--{$config.siteurl}-->”即可访问。">手机交友</a> </span> <span class="n_tops_2"><a href="<!--{$urlpath}-->usercp.php?c=vip">会员服务</a></span> <span class="n_tops_3"><a href="###" onclick="addfavorite('<!--{$config.siteurl}-->', '<!--{$config.sitename}-->');">收藏本站</a></span>
          <div class="cc"></div>
        </div>
        <div class="n_topp"> 
          欢迎您： <!--{$u.levelimg}--><!--{$u.username}-->， <a href="<!--{$u.homeurl}-->">个人主页</a> | <a href="<!--{$appfile}-->?c=passport&a=logout">退出登录</a> 
        </div>
      </div>
    </div>
  </div>
  <div class="n_nav">
    <div class="n_ul">
      <div class="n_navleft">
        <ul>
          <li<!--{if $menuid=='index'}--> class='current first'<!--{/if}-->><a href="<!--{$urlpath}-->">交友首页</a></li>
		  <li <!--{if $menuid=='user'}--> class='current'<!--{/if}-->>
		  <!--{if $login.status == '1'}-->
		    <!--{if $login.info.gender == '1'}-->
			<!--{assign var='yx_sex' value='2'}-->
			<!--{elseif $login.info.gender == '2'}-->
			<!--{assign var='yx_sex' value='1'}-->
			<!--{else}-->
			<!--{assign var='yx_sex' value='0'}-->
			<!--{/if}-->
          <a href="<!--{$urlpath}-->index.php?c=user&s_sex=<!--{$yx_sex}-->&s_dist1=<!--{$login.info.provinceid}-->&s_dist2=<!--{$login.info.cityid}-->">同城异性</a>
		  <!--{else}-->
		  <a href="<!--{$urlpath}-->index.php?c=user">同城异性</a>
		  <!--{/if}-->
		  </li>
          <li<!--{if $menuid=='online'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->index.php?c=online">在线会员</a>
          </li>
          <li<!--{if $menuid=='diary'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->index.php?c=diary">心情日记</a>
          </li>
          <li<!--{if $menuid=='advsearch'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->index.php?c=user&a=advsearch">高级搜索</a>
          </li>
        </ul>
      </div>
      <div class="n_navright">
        <ul>
		  <!--{if $login.status == '1'}-->
          <li><a href="<!--{$urlpath}-->usercp.php?c=vip">升级VIP</a></li>
          <li><a href="<!--{$urlpath}-->usercp.php?c=payment">在线充值</a>&nbsp;&nbsp;|&nbsp;</li>
          <li><a href="<!--{$urlpath}-->usercp.php">会员中心</a>&nbsp;&nbsp;|&nbsp;</li>
		  <!--{else}-->
          <li><a href="###" onclick="artbox_loginbox();">升级VIP</a></li>
          <li><a href="###" onclick="artbox_loginbox();">在线充值</a>&nbsp;&nbsp;|&nbsp;</li>
          <li><a href="###" onclick="artbox_loginbox();">会员中心</a>&nbsp;&nbsp;|&nbsp;</li>
		  <!--{/if}-->
        </ul>
		<div class="cc"></div>
      </div>
	  
    </div>
  </div>
</div>
