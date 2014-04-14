<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->

<!--{if $a eq 'area'}-->
<h3 class="slide_bg_d">【修改地区】</h3>
<div class="index_p">
  <table cellpadding='3' cellspacing='3' border='0'>
    <tr>
	  <td>所在地区：</td>
	  <td>
	  <!--{area type='text' value=$login.info.provinceid}-->
	  <!--{area type='text' value=$login.info.cityid}-->
	  <!--{area type='text' value=$login.info.distid}-->
	  <a href="<!--{$wapfile}-->?c=cp_info&a=dist1">修改</a>
	  </td>
    </tr>
    <tr>
	  <td>户籍地区：</td>
	  <td>
	  <!--{hometown type='text' value=$login.info.nationprovinceid}-->
	  <!--{hometown type='text' value=$login.info.nationcityid}-->
	  <a href="<!--{$wapfile}-->?c=cp_info&a=hometown1">修改</a>
	  </td>
    </tr>
  </table>
</div>
<!--{/if}-->

<!--{if $a eq 'dist1'}-->
<h3 class="slide_bg_d">【修改地区】</h3>
<div class="index_p">
  <form action="<!--{$wapfile}-->?c=cp_info" method="post">
  <input type="hidden" name="a" value="dist2" />
  <table cellpadding='3' cellspacing='3' border='0'>
    <tr>
	  <td>一级地区：</td>
	  <td><!--{area type='dist1' name='dist1' text='=请选择=' value=$login.info.provinceid}--></td>
    </tr>
    <tr>
	  <td colspan="2"><input type="submit" name="btn_submit" value="提交选择" class="submit_b" /></td>
    </tr>
  </table>
  </form>
</div>
<!--{/if}-->

<!--{if $a eq 'dist2'}-->
<h3 class="slide_bg_d">【修改地区】</h3>
<div class="index_p">
  <form action="<!--{$wapfile}-->?c=cp_info" method="post">
  <input type="hidden" name="a" value="dist3" />
  <input type="hidden" name="provinceid" value="<!--{$dist1}-->" />
  <table cellpadding='3' cellspacing='3' border='0'>
    <tr>
	  <td colspan="2">您已选择一级地区：<!--{area type='text' value=$dist1}--></td>
    </tr>
    <tr>
	  <td>二级地区：</td>
	  <td><!--{area type='dist2' cname='cityid' text='=请选择=' pvalue=$dist1}--></td>
    </tr>
    <tr>
	  <td colspan="2"><input type="submit" name="btn_submit" value="提交选择" class="submit_b" /></td>
    </tr>
  </table>
  </form>
</div>
<!--{/if}-->

<!--{if $a eq 'dist3'}-->
<h3 class="slide_bg_d">【修改地区】</h3>
<div class="index_p">
  <form action="<!--{$wapfile}-->?c=cp_info" method="post">
  <input type="hidden" name="a" value="savedist" />
  <input type="hidden" name="provinceid" value="<!--{$args.provinceid}-->" />
  <input type="hidden" name="cityid" value="<!--{$args.cityid}-->" />
  <table cellpadding='3' cellspacing='3' border='0'>
    <tr>
	  <td colspan="2">您已选择地区：<!--{area type='text' value=$args.provinceid}--> <!--{area type='text' value=$args.cityid}--></td>
    </tr>
    <tr>
	  <td>三级地区：</td>
	  <td><!--{area type='dist3' dname='distid' text='=请选择=' cvalue=$args.cityid}--></td>
    </tr>
    <tr>
	  <td colspan="2"><input type="submit" name="btn_submit" value="提交选择" class="submit_b" /></td>
    </tr>
  </table>
  </form>
</div>
<!--{/if}-->


<!--{if $a eq 'hometown1'}-->
<h3 class="slide_bg_d">【修改户籍】</h3>
<div class="index_p">
  <form action="<!--{$wapfile}-->?c=cp_info" method="post">
  <input type="hidden" name="a" value="hometown2" />
  <table cellpadding='3' cellspacing='3' border='0'>
    <tr>
	  <td>户籍地区：</td>
	  <td><!--{hometown type='dist1' name='nationprovinceid' text='=请选择=' value=$login.info.nationprovinceid}--></td>
    </tr>
    <tr>
	  <td colspan="2"><input type="submit" name="btn_submit" value="提交选择" class="submit_b" /></td>
    </tr>
  </table>
  </form>
</div>
<!--{/if}-->

<!--{if $a eq 'hometown2'}-->
<h3 class="slide_bg_d">【修改户籍】</h3>
<div class="index_p">
  <form action="<!--{$wapfile}-->?c=cp_info" method="post">
  <input type="hidden" name="a" value="savehometown" />
  <input type="hidden" name="nationprovinceid" value="<!--{$nationprovinceid}-->">
  <table cellpadding='3' cellspacing='3' border='0'>
    <tr>
	  <td colspan="2">您已选择户籍地区：<!--{hometown type='text' value=$nationprovinceid}--></td>
    </tr>
    <tr>
	  <td>户籍二级地区：</td>
	  <td><!--{hometown type='dist2' cname='nationcityid' text='=请选择=' pvalue=$nationprovinceid}--></td>
    </tr>
    <tr>
	  <td colspan="2"><input type="submit" name="btn_submit" value="提交选择" class="submit_b" /></td>
    </tr>
  </table>
  </form>
</div>
<!--{/if}-->


<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info">用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=area">修改地区</a> 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>