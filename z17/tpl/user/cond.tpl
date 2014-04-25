<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="menuid" value="cond"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div class="user_main">
  <div class="main_right">
    <div class="div_">个人中心 &gt;&gt; 设置择友条件</div>
	<div class="nav-tips">设定您的择友要求，配对更对符合你心意的会员。</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=cond">择友条件</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=match">缘分速配</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover basicdata">
	  <!--{if $a eq 'run'}--> 
	  <!--基本资料 Begin-->
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=cond" method="post" >
	  <input type="hidden" name="a" value="savecond" />
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>择友条件</p><span class="shadow"></span></div></td>
		  </tr>

		  <tr>
			<td class='lblock' width="20%">性 别 </td>
			<td class='rblock'>
			<input type='radio' name='gender' id='gender' value='0'<!--{if $cond.gender==0}--> checked<!--{/if}--> />不限，
			<input type='radio' name='gender' id='gender' value='1'<!--{if $cond.gender==1}--> checked<!--{/if}--> />男会员，
			<input type='radio' name='gender' id='gender' value='2'<!--{if $cond.gender==2}--> checked<!--{/if}--> />女会员
			</td>
		  </tr>
		  <tr>
			<td class='lblock'>年 龄 </td>
			<td class='rblock'>
			<!--{hook mod='age' name='startage' text='不限' value=$cond.startage}--> 到 <!--{hook mod='age' name='endage' text='不限' value=$cond.endage}--> 岁
			</td>
		  </tr>
		  <tr>
			<td class='lblock'>身 高 </td>
			<td class='rblock'><!--{hook mod='height' name='startheight' text='不限' value=$cond.startheight}--> 到 <!--{hook mod='height' name='endheight' text='不限' value=$cond.endheight}--> 厘米</td>
		  </tr>
		  <tr>
			<td class='lblock'>婚 史 </td>
			<td class='rblock'><!--{hook mod='var' item='marrystatus' name='marry' type='checkbox' value=$cond.marry}--></td>
		  </tr>
		  <tr>
			<td class='lblock'>交友类别</td>
			<td class='rblock'><!--{hook mod='lovesort' name='lovesort' type='checkbox' value=$cond.lovesort}--></td>
		  </tr>
		  <tr>
			<td class='lblock'>学 历 </td>
			<td class='rblock'>
			<!--{hook mod='var' item='education' name='startedu' type='select' text='不限' value=$cond.startedu}--> 到 
			<!--{hook mod='var' item='education' name='endedu' type='select' text='不限' value=$cond.endedu}-->
			</td>
		  </tr>
		  <!-- 所在地区 -->
		  <tr>
			<td class='lblock'>所在地区</td>
			<td class='rblock'>
			<font color='#999999'>(最多设置5个地区，必须选择二级地区才会生效。)</font>
			<br />
			<!--{area type='dist1' name='province_1' value=$cond.arealist[0].province ajax='1' cname='city_1' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
			<span id="json_city_1">
			<!--{area type='dist2' pvalue=$cond.arealist[0].province cname='city_1' cvalue=$cond.arealist[0].city text='==不限=='}-->
			</span>&nbsp;&nbsp;

			<br />
			<!--{area type='dist1' name='province_2' value=$cond.arealist[1].province ajax='1' cname='city_2' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
			<span id="json_city_2">
			<!--{area type='dist2' pvalue=$cond.arealist[1].province cname='city_2' cvalue=$cond.arealist[1].city text='==不限=='}-->
			</span>&nbsp;&nbsp;

			<br />
			<!--{area type='dist1' name='province_3' value=$cond.arealist[2].province ajax='1' cname='city_3' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
			<span id="json_city_3">
			<!--{area type='dist2' pvalue=$cond.arealist[2].province cname='city_3' cvalue=$cond.arealist[2].city text='==不限=='}-->
			</span>&nbsp;&nbsp;

			<br />
			<!--{area type='dist1' name='province_4' value=$cond.arealist[3].province ajax='1' cname='city_4' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
			<span id="json_city_4">
			<!--{area type='dist2' pvalue=$cond.arealist[3].province cname='city_4' cvalue=$cond.arealist[3].city text='==不限=='}-->
			</span>&nbsp;&nbsp;

			<br />
			<!--{area type='dist1' name='province_5' value=$cond.arealist[4].province ajax='1' cname='city_5' cajax='0' text='==不限=='}-->&nbsp;&nbsp;
			<span id="json_city_5">
			<!--{area type='dist2' pvalue=$cond.arealist[4].province cname='city_5' cvalue=$cond.arealist[4].city text='==不限=='}-->
			</span>&nbsp;&nbsp;
			</td>
		  </tr>
		  <tr>
			<td class='lblock'>诚信星级 </td>
			<td class='rblock'>
			<!--{hook mod='star' name='star' text='=不限=' value=$cond.star}-->&nbsp;&nbsp;星&nbsp;&nbsp;
			<select name='starup' id='starup'>
			<option value=''></option>
			<option value='1'<!--{if $cond.starup==1}--> selected<!--{/if}-->>以上</option>
			<option value='2'<!--{if $cond.starup==2}--> selected<!--{/if}-->>以下</option>
			</select>
			</td>
		  </tr>
		  <tr>
			<td class='lblock'>有无形象照 </td>
			<td class='rblock'>
			<input type='radio' name='avatar' id='avatar' value='1'<!--{if $cond.avatar==1}--> checked<!--{/if}--> />有形象照，
			<input type='radio' name='avatar' id='avatar' value='0'<!--{if $cond.avatar==0}--> checked<!--{/if}--> />不限
			</td>
		  </tr>

		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock' height="50px"></td>
			<td class='rblock' colspan="3">				
			<input type="submit" name="btn_save" value="提交保存" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--基本资料 End-->
	  <!--{/if}-->


	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"></div>
  <!--//main_right End-->
  
  <div class="right_kj" id="kj_box">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=cond">择友条件</a></li>
      <li><a href="<!--{$ucfile}-->?c=match">缘分速配</a></li>
    </ul>
  </div>
  <div style="margin: 30px;"></div>
  <!--//right_kj End-->
  
</div>
<!--//user_main End-->

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>