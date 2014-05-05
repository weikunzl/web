<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="menuid" value="points"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div class="user_main">
  <div class="main_right">
    <div class="div_"> 服务 &gt;&gt; 积分记录 </div>
	<div class="nav-tips">
	您当前剩余积分：<b><font color='green'><!--{$u.points}--></font></b>
	</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=money">金额记录</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=points">积分记录</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <!--{if $a eq 'run'}-->
	  <form method="post" id="search_form" action="<!--{$ucfile}-->?c=points" />
	  <div class="item" style="padding:10px 0px;">
		<label>开始日期&nbsp;</label><input type="text" name="sdate" id="sdate" value="<!--{$sdate}-->" class="input-100" readonly onClick="WdatePicker();" />&nbsp;&nbsp;
		<label>结束日期&nbsp;</label><input type="text" name="edate" id="edate" value="<!--{$edate}-->" class="input-100" readonly onClick="WdatePicker();" />&nbsp;&nbsp;
		<label>关键字&nbsp;</label><input type="text" name="skeyword" id="skeyword" value="<!--{$skeyword}-->" class="input-150" />&nbsp;&nbsp;
		<input type="submit" value="搜 索" name="btn_search" class="button-coff" />		  
	  </div>
	  </form>
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='20%'>时间</td>
		  <td width='20%'>增加</td>
		  <td width='12%'>减少</td>
		  <td width='12%'>剩余</td>
		  <td>备注</td>
		</tr>
		<!--{foreach $pointslog as $volist}-->
		<tr>
		  <td><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		  <td><!--{if $volist.actiontype==1}--><font color="green"><!--{$volist.points}--></font><!--{/if}--></td>
		  <td><!--{if $volist.actiontype==2}--><font color="red"><!--{$volist.points}--></font><!--{/if}--></td>
		  <td><font color="blue"><!--{$volist.rempoints}--></font></td>
		  <td align="left"><!--{$volist.logcontent}--></td>
		</tr>
		<!--{foreachelse}-->
		<tr>
		  <td colspan="5" align="center" class='hback'>对不起， 暂无记录。</td>
		</tr>
		<!--{/foreach}-->
	  </table>
	  <!--{if $showpage!=""}-->
	  <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	  <!--{/if}-->
	  <!--{/if}-->
    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=money">金额记录</a></li>
      <li><a href="<!--{$ucfile}-->?c=points">积分记录</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>