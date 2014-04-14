<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="hi"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 已发信件</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=message">会员来信</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=sysmsg">系统消息</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    <div class="div_smallnav_content_hover">

	  <!--{if $a eq 'run'}-->
	  <div class="nav-tips">
	    <div class="span">已发信件<!--{$total}-->封</div>
	    筛选排序：
	    <img src="<!--{$ucpath}-->images/tips-msg01.gif" /><a href="<!--{$ucfile}-->?c=outmsg&type=unread">对方未读</a> &nbsp;&nbsp;&nbsp;
	    <img src="<!--{$ucpath}-->images/tips-msg02.gif" /><a href="<!--{$ucfile}-->?c=outmsg&type=read">对方已读</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <form action="<!--{$ucfile}-->?c=outmsg" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='10%'>状态</td>
		  <td width='55%'>收信人信息</td>
		  <td>查看</td>
		  <td width='12%'>时间</td>
		</tr>
		<!--{if empty($outmsg)}-->
		<tr>
		  <td colspan="4" align="center" class='hback'>对不起， 暂没有已发信件。</td>
		</tr>
		<!--{else}-->
		<!--{foreach $outmsg as $volist}-->
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<!--{$volist.msgid}-->' onClick="checkItem(this, 'chkAll')">
			<!--{if $volist.readflag == '0'}-->
			  <img src="<!--{$ucpath}-->images/tips-msg01.gif" title="未读信件" alt="未读信件" />
			<!--{elseif $volist.readflag == '1'}-->
			   <img src="<!--{$ucpath}-->images/tips-msg02.gif" title="已读信件" alt="已读信件" />
			<!--{/if}-->
		  </td>
		  <td style="text-align:left;">
		    <table border="0" cellpadding="0" cellspacing="0" align="left" class="table-inside">
			  <tr>
			    <td width="60"><img src="<!--{$volist.avatarurl}-->" width="40" height="48" class="table-inside-img" /></td>
				<td>
				  <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a><br />
					<!--{if $volist.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;&nbsp;<!--{$volist.age}-->岁&nbsp;&nbsp;
					<!--{hook mod='var' item='marrystatus' type='text' value=$volist.marrystatus}-->
					<!--{area type='text' value=$volist.provinceid}-->&nbsp;
					<!--{area type='text' value=$volist.cityid}-->&nbsp;
					<!--{hook mod='var' item='education' type='text' value=$volist.education}-->&nbsp;
					<!--{hook mod='var' item='salary' type='text' value=$volist.salary}-->
				</td>
			  </tr>
			</table>
		  </td>
		  <td>
		  <a href='<!--{$ucfile}-->?c=outmsg&a=view&id=<!--{$volist.msgid}-->&<!--{$urlitem}-->' class="letter-button5"></a>
		  </td>
		  <td style="text-align:left;"><!--{$volist.sendtime|date_format:"%Y/%m/%d %H:%M"}--></td>
		</tr>
		<!--{/foreach}-->
		<tr>
		  <td><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}"  class="button-red" style="cursor:pointer;" />
		  </td>
		</tr>
		<!--{/if}-->
	  </table>
	  </form>

	  <!--{if $showpage!=""}-->
	  <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	  <!--{/if}-->
	  <!--{/if}-->
	  
	  <!--{if $a == 'view'}-->
	  <!--阅读已收-->
	  <div class="nav-tips">
	    <div class="span"><a href="<!--{$ucfile}-->?c=outmsg&<!--{$comeurl}-->">返回列表</a></div>
	    筛选排序：
	    <img src="<!--{$ucpath}-->images/tips-msg01.gif" /><a href="<!--{$ucfile}-->?c=outmsg&type=unread">对方未读</a> &nbsp;&nbsp;&nbsp;
	    <img src="<!--{$ucpath}-->images/tips-msg02.gif" /><a href="<!--{$ucfile}-->?c=outmsg&type=read">对方已读</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
		<tr>
		  <td class="lblock" width="15%">发信时间：</td>
		  <td class="rblock" width="85%"><!--{$outmsg.sendtime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		</tr>
		<tr>
		  <td class="lblock">收 件 人：</td>
		  <td class="rblock">
			<!--{$outmsg.levelimg}--><a href="<!--{$outmsg.homeurl}-->"><!--{$outmsg.username}--></a>
			（<!--{if $outmsg.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;&nbsp;<!--{$outmsg.age}-->岁&nbsp;&nbsp;
			<!--{hook mod='var' item='marrystatus' type='text' value=$outmsg.marrystatus}-->
			<!--{area type='text' value=$outmsg.provinceid}-->&nbsp;
			<!--{area type='text' value=$outmsg.cityid}-->&nbsp;
			<!--{hook mod='var' item='education' type='text' value=$outmsg.education}-->&nbsp;
			<!--{hook mod='var' item='salary' type='text' value=$outmsg.salary}-->）
		  </td>
		</tr>
		<tr>
		  <td class="lblock">信件内容：</td>
		  <td class="rblock"><!--{$outmsg.content|nl2br}--></td>
		</tr>
		<tr>
		  <td class="lblock"></td>
		  <td class="rblock">
		  <input type="button" name="btn_return" id="btn_return" value="返回列表" class="button-qing" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=outmsg&<!--{$comeurl}-->';" />
		  </td>
		</tr>
	  </table>
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
	  <li><a href="<!--{$ucfile}-->?c=sysmsg">系统消息</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>