<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='online'}--> 
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce member"> 
    <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search_online.tpl"}-->
    <div class="search_sort">
      <div class="search_tips">在线会员 共<span><!--{$total}--></span>人符合您的搜索条件 </div>
      <div id="rank" class="search_sort_sle"> <strong>显示方式：</strong> 

		<a class="btnc btn_c3" href="<!--{$appfile}-->?c=online&a=list<!--{if $page>1}-->&page=<!--{$page}--><!--{/if}--><!--{if !empty($urlitem)}-->&<!--{$urlitem}--><!--{/if}-->"> <span><b>头像模式</b></span> </a>&nbsp;
		<a class="btnc3 btn_c3" href="<!--{$appfile}-->?c=online&a=list<!--{if $page>1}-->&page=<!--{$page}--><!--{/if}-->&type=more<!--{if !empty($urlitem)}-->&<!--{$urlitem}--><!--{/if}-->"> <span class='h'><b>独白模式</b></span> </a> 

	  </div>
    </div>
    <div class="left men">
      <div class="content">
	    
		<!--{foreach $online as $volist}-->
        <ul>
          <li>
            <div class="img"><a target="_blank" href="<!--{$volist.homeurl}-->"><!--{avatar width='112' height='135' css='img100' value=$volist.avatarurl}--></a></div>
            <div class="r">
              <h2><div class="biaoshi"><!--{$volist.levelimg}--></div><a target="_blank" href="<!--{$volist.homeurl}-->" class='title'> <!--{$volist.username}--></a> <span>诚信认证：
			  <a class="rz"><img src="<!--{$skinpath}-->themes/images/cid<!--{if $volist.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $volist.idnumberrz==0}-->身份证未认证<!--{else}-->已身份证认证<!--{/if}-->" /></a> 
			  <a class="rz"><img src="<!--{$skinpath}-->themes/images/video<!--{if $volist.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $volist.videorz==0}-->视频未认证<!--{else}-->已视频认证<!--{/if}-->" /></a> 
			  <a class="rz"><img src="<!--{$skinpath}-->themes/images/email<!--{if $volist.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $volist.emailrz==0}-->邮箱未认证<!--{else}-->已邮箱认证<!--{/if}-->" /></a> 
			  </span>
			  </h2>
              <div class="con">
                <div class="conten"><!--{if $volist.gender==1}-->男<!--{else}-->女<!--{/if}-->，<!--{$volist.age}-->岁，<!--{$volist.height}-->CM，<!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}--><br>
                  <!--{$volist.monolog|filterhtml:110}-->.. </div>
              </div>
            </div>
            <div style="clear:both;"></div>
            <div class="bottom">
              <div class="l1"><a href="<!--{$volist.homeurl}-->" target="_blank">共有<!--{count mod='user' type='album' value=$volist.userid}-->张相片</a></div>
              <div class="l2"> 
			    <a href="###" onclick="artbox_hi(<!--{$volist.userid}-->);">打招呼</a> 
			    <a href="###" onclick="artbox_writemsg(<!--{$volist.userid}-->);">发信件</a> 
			    <a href="<!--{$volist.homeurl}-->" target="_blank">查看资料</a> 
			  </div>
            </div>
          </li>
        </ul>
		<!--{/foreach}-->
      </div>

	  <!--{if !empty($showpage)}-->
      <div class="page1">
        <div class="pagecode">
		<!--{$showpage}-->
        </div>
        <div style="clear:both;"></div>
      </div>
	  <!--{/if}-->

    </div>
    <div class="right yue1">
      <h2 style="margin-top:10px;">猜你喜欢</h2>
	  <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->user_80x96.tpl"}-->
      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>