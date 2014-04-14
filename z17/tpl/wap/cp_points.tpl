<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<p class="slide_bg_l pl_5 mb_0"> 
  <a href="<!--{$wapfile}-->?c=cp_money">金币记录</a>|<a href="<!--{$wapfile}-->?c=cp_points">积分记录</a>
</p>
<h3 class="slide_bg_d mb_0">【积分记录】</h3>
<div class="index_p">
  <table cellpadding='0' cellspacing='0' border='1' width='100%' style="margin-top:10px;border-collapse:collapse; border-color:#f2f2f2">
    <tr>
	  <td width='20%' align='center'>时间</td>
	  <td width='12%' align='center'>增加</td>
	  <td width='12%' align='center'>减少</td>
	  <td width='12%' align='center'>剩余</td>
	  <td align='center'>备注</td>
    </tr>
	<!--{if empty($points)}-->
	<tr>
	  <td colspan="5" align="center">对不起，暂无记录！</td>
	</tr>
	<!--{else}-->
	<!--{foreach $points as $volist}-->
	<tr>
	  <td><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  <td><!--{if $volist.actiontype==1}--><font color="green"><!--{$volist.points}--></font><!--{/if}--></td>
	  <td><!--{if $volist.actiontype==2}--><font color="red"><!--{$volist.points}--></font><!--{/if}--></td>
	  <td><font color="blue"><!--{$volist.rempoints}--></font></td>
	  <td><!--{$volist.logcontent}--></td>
	</tr>
	<!--{/foreach}-->
	<!--{/if}-->
  </table>

  <!--{if !empty($showpage)}-->
  <div class="page"><!--{$showpage}--></div>
  <!--{/if}-->
</div>

<p class="slide_bg_l pl_5">
当前位置：<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp">会员中心</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_points">积分记录</a>
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</html>