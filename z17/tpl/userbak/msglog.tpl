<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="message"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->
  <div class="main_right">

    <div class="div_">个人中心 &gt;&gt; 通信记录</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=message">会员来信</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=sysmsg">系统信件</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <div class="nav-tips">
	    <div class="span">共有<!--{$total}-->条记录&nbsp;&nbsp;返回：<a href="<!--{$ucfile}-->?c=message">收信列表</a>&nbsp;&nbsp;<a href="<!--{$ucfile}-->?c=outmsg">发信列表</a></div>
		阅读与“<!--{$tauser.username}-->”的通信记录<br />
		<!--{if $tauser.gender==1}-->男<!--{else}-->女<!--{/if}-->
		<!--{$tauser.age}--> 岁
		<!--{$tauser.height}-->CM&nbsp;
		<!--{hook mod='var' item='marrystatus' type='text' value=$tauser.marrystatus}--> 
		<!--{area type='text' value=$tauser.provinceid}--> 
		<!--{area type='text' value=$tauser.cityid}--> 
		<!--{hook mod='var' item='education' type='text' value=$tauser.education}-->  
		<!--{$volist.sendtime|date_format:"%m-%d %H:%M"}-->
	  </div>
	  <!--{if empty($msglog)}-->
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td align="center">对不起，没有任何记录！</td>
		</tr>
	  </table>
	  <!--{else}-->
      <div class="xj_detail_">
        <div>
          <div style="float:left; width:40%; border-bottom:1px dashed gray; margin:10px 0px;"></div>
          <div style="float:left; width:20%; text-align:center;">通信记录</div>
          <div style="float:right; width:40%; border-bottom:1px dashed gray; margin:10px 0px;"></div>
        </div>
        <div class="clear"></div>
		<!--{foreach $msglog as $volist}-->
		<!--{if $volist.fromuserid==$u.userid}-->
        <div style="text-align:center; margin:10px 0px;"><span class="xj_detail_item_time"><!--{$volist.sendtime|date_format:"%Y-%m-%d %H:%M:%S"}--></span></div>
        <div class="clear"></div>
        <div class="xj_detail_logo ri"><!--{avatar value=$u.avatarurl width='48' height='58'}--><br /><!--{$u.username}--></div>
        <div class="xj_detail_ritem">
          <div class="pb-action-holder-r">
            <div class="pb-triangle-r"></div>
            <div class="pb-action-shadow-top-r"></div>
            <div id="Div1" class="pb-action-r"><!--{$volist.content|nl2br}--></div>
            <div class="pb-action-shadow-bottom-r"></div>
          </div>
        </div>
        <div class="clear"></div>
		<!--{else}-->
        <div style="text-align:center; margin:10px 0px;"><span class="xj_detail_item_time"><!--{$volist.sendtime|date_format:"%Y-%m-%d %H:%M:%S"}--></span></div>
        <div class="clear"></div>
        <div class="xj_detail_logo fl"><a href="<!--{$tauser.homeurl}-->" target="_blank"><!--{avatar value=$tauser.avatarurl width='48' height='58'}--></a><br /><!--{$tauser.username}--><br /><a href='###' onclick="artbox_writemsg('<!--{$tauser.userid}-->', 'reload');">给TA写信</a></div>
        <div class="xj_detail_litem">
          <div class="pb-action-holder">
            <div class="pb-triangle"></div>
            <div class="pb-action-shadow-top"></div>
            <div id="pb-action" class="pb-action"><!--{$volist.content|nl2br}--></div>
            <div class="pb-action-shadow-bottom"></div>
          </div>
        </div>
        <div class="clear"></div>
		<!--{/if}-->
		<!--{/foreach}-->

      </div>
	  <!--//xj_detail_ End-->
	  <!--{/if}-->
	  <!--{if $showpage!=""}-->
	  <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	  <div class="clear"></div>
	  <!--{/if}-->
    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->


  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=message">会员来信</a></li>
      <li><a href="<!--{$ucfile}-->?c=outmsg">已发信件</a></li>
	  <li><a href="<!--{$ucfile}-->?c=hi">收到问候</a></li>
	  <li><a href="<!--{$ucfile}-->?c=hi&a=to">已发问候</a></li>
	  <li><a href="<!--{$ucfile}-->?c=sysmsg">系统信件</a></li>
    </ul>
  </div>

</div>
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
