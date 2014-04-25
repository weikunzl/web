<div id="header">
  <div class="n_top">
    <div class="nn_top">
      <div class="n_logo"> <a href="<!--{$urlpath}-->index.php"><img src="<!--{$config.logo}-->" height="80px" style="padding-top:10px"  alt="<!--{$config.sitename}-->" /></a> </div>
      <div class="n_top_banner"> 
        <!--{assign var='topads' value=get_ads('top_banner')}--> 
        <!--{if !empty($topads)}--> 
        <a <!--{if !empty($topads.url) && $topads.url!='#'}-->href="<!--{$topads.url}-->" target="<!--{$topads.target}-->"<!--{/if}-->><img src="<!--{$topads.uploadfiles}-->" width='<!--{$topads.width}-->' height='<!--{$topads.height}-->'  style="padding-top:25px" border='0' title="<!--{$topads.title}-->" /></a> 
        <!--{/if}--> 
      </div>
      <div class="n_top_right">
        <div class="n_tops">
        </div>
        <div class="n_topp"> 
          <!--{if $login.status == 1}--> 
			  <!--{if $login.info.integrity=='0'}--> 
			  <!--{if $a !='perfect'}--> 
			  <script>alert('对不起，请先完善交友帐号信息，才能正常使用。');window.location.href="<!--{$urlpath}-->index.php?c=passport&a=perfect";</script> 
			  <!--{/if}--> 
			  <!--{/if}--> 
		欢迎您： 
		<!--{if !empty($login.info.levelimg)}-->
			<!--{$login.info.levelimg}-->
		<!--{else}-->
			<!--{$u.levelimg}-->
		<!--{/if}-->
		<!--{$login.username}-->， <a href="<!--{$urlpath}-->index.php?c=passport&a=logout">退出登录</a> 
          <!--{else}--> 
          游客欢迎您 <a href="###" onclick="artbox_loginbox();">登录网站</a>&nbsp;
		  <!--{assign var='connect' value=vo_list("mod={connect}")}-->
		  |&nbsp;<a href="<!--{$urlpath}-->index.php?c=passport&a=reg">免费注册</a> 

          <!--{/if}--> 
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
          <a href="<!--{$urlpath}-->index.php?c=user&s_sex=<!--{$yx_sex}-->&s_dist1=<!--{$login.info.provinceid}-->&s_dist2=<!--{$login.info.cityid}-->">缘分搜索</a>
		  <!--{else}-->
		  <a href="<!--{$urlpath}-->index.php?c=user">缘分搜索</a>
		  <!--{/if}-->
		  </li>
          <li<!--{if $menuid=='online'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->index.php?c=online">在线会员</a>
          </li>
	  <li<!--{if $menuid=='message'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->usercp.php?c=message">我的消息</a>
          </li>
	  <li<!--{if $menuid=='profile'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->usercp.php?c=profile">我的资料</a>
          </li>
	  <li<!--{if $menuid=='vip'}--> class='current'<!--{/if}-->><a href="<!--{$urlpath}-->usercp.php?c=vip">服务</a>
          </li>
        </ul>
      </div>
     
    </div>
  </div>
</div>
