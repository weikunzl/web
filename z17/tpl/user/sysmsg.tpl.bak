<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<!--{assign var="menuid" value="message"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->

<div class="user_main">

  <div class="main_right">
    <div class="div_"> 我的消息 &gt;&gt; 系统消息</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=message">会员来信</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=sysmsg">系统消息</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    <div class="div_smallnav_content_hover">

	  <!--{if $a eq 'run'}-->
	  <div class="nav-tips">
	    <div class="span">共<!--{$total}-->条消息</div>
	    筛选排序：
	    <img src="<!--{$ucpath}-->images/tips-msg01.gif" /><a href="<!--{$ucfile}-->?c=sysmsg&type=unread">未读消息</a> &nbsp;&nbsp;&nbsp;
	    <img src="<!--{$ucpath}-->images/tips-msg02.gif" /><a href="<!--{$ucfile}-->?c=sysmsg&type=read">已读消息</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <form action="<!--{$ucfile}-->?c=sysmsg" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='12%'>状态</td>
		  <td width='15%'>发件人</td>
		  <td width='45%'>消息标题</td>
		  <td width='20%'>时间</td>
		  <td>操作</td>
		</tr>
		<!--{if empty($sysmsg)}-->
		<tr>
		  <td colspan="5" align="center" class='hback'>对不起， 暂没有系统消息。</td>
		</tr>
		<!--{else}-->
		<!--{foreach $sysmsg as $volist}-->
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<!--{$volist.msgid}-->' onClick="checkItem(this, 'chkAll')">
			<!--{if $volist.readflag == '0'}-->
			  <img src="<!--{$ucpath}-->images/tips-msg01.gif" title="未读消息" alt="未读消息" />
			<!--{elseif $volist.readflag == '1'}-->
			   <img src="<!--{$ucpath}-->images/tips-msg02.gif" title="已读消息" alt="已读消息" />
			<!--{/if}-->
		  </td>
		  <td style="text-align:left;">系统管理员</td>
		  <td style="text-align:left;"><!--{$volist.subject}--></td>
		  <td><!--{$volist.sendtime|date_format:"%Y/%m/%d %H:%M:%S"}--></td>
		  <td align="left"><a href='<!--{$ucfile}-->?c=sysmsg&a=view&id=<!--{$volist.msgid}-->&page=<!--{$page}-->&type=<!--{$type}-->'>查看</a></td>
		</tr>
		<!--{/foreach}-->
		<tr>
		  <td><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}"  class="button-qing" style="cursor:pointer;" />
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
	    <div class="span"><a href="<!--{$ucfile}-->?c=sysmsg&<!--{$comeurl}-->">返回列表</a></div>
	    筛选排序：
	    <img src="<!--{$ucpath}-->images/tips-msg01.gif" /><a href="<!--{$ucfile}-->?c=sysmsg&type=unread">未读消息</a> &nbsp;&nbsp;&nbsp;
	    <img src="<!--{$ucpath}-->images/tips-msg02.gif" /><a href="<!--{$ucfile}-->?c=sysmsg&type=read">已读消息</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td class="lblock" width="15%">消息标题：</td>
		  <td class="rblock" width="85%"><!--{$sysmsg.subject}--></td>
		</tr>
		<tr>
		  <td class="lblock">时间：</td>
		  <td class="rblock"><!--{$sysmsg.sendtime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		</tr>
		<tr>
		  <td class="lblock">发 件 人：</td>
		  <td class="rblock">系统管理员</td>
		</tr>
		<tr>
		  <td class="lblock">消息内容：</td>
		  <td class="rblock"><!--{$sysmsg.content|nl2br}--></td>
		</tr>
		<tr>
		  <td class="lblock"></td>
		  <td class="rblock">
		  <input type="button" name="btn_return" id="btn_return" value="返回列表" class="button-qing" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=sysmsg&<!--{$comeurl}-->';" />
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