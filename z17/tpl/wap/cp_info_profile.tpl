<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<form action="<!--{$wapfile}-->?c=cp_info" method="post">
<input type="hidden" name="a" value="saveprofile" />
<h3 class="slide_bg_d">【工作学习】</h3>
<div class="index_p">
  <div>

    <table cellpadding='3' cellspacing='3' border='0'>
	  <tr>
	    <td>公司类型：</td>
		<td><!--{hook mod='var' type='select' item='companytype' name='companytype' text='=请选择=' value=$login.info.companytype}--></td>
	  </tr>
	  <tr>
	    <td>收入描述：</td>
		<td><!--{hook mod='var' type='select' item='income' name='income' text='=请选择=' value=$login.info.income}--></td>
	  </tr>
	  <tr>
	    <td>工作状况：</td>
		<td><!--{hook mod='var' type='select' item='workstatus' name='workstatus' text='=请选择=' value=$login.info.workstatus}--></td>
	  </tr>
	  <tr>
	    <td>公司名称：</td>
		<td><input type="text" name="companyname" id="companyname" value="<!--{$login.info.companyname}-->" style="width:120px;" /></td>
	  </tr>
	  <tr>
	    <td>专业类型：</td>
		<td><!--{hook mod='var' type='select' item='specialty' name='specialty' text='=请选择=' value=$login.info.specialty}--></td>
	  </tr>
	  <tr>
	    <td>毕业学校：</td>
		<td><input type='text' name='school' id='school' value="<!--{$login.info.school}-->" style="width:120px;" /></td>
	  </tr>
	  <tr>
	    <td>入学年份：</td>
		<td><input type='text' name='schoolyear' id='schoolyear' value="<!--{$login.info.schoolyear}-->" style="width:120px;" /></td>
	  </tr>
	  <tr>
	    <td>语言能力：</td>
		<td><!--{hook mod='var' type='multiple' item='language' name='language' text='=请选择=' value=$login.info.language}--> </td>
	  </tr>
	</table>

  </div>
</div>
<h3 class="slide_bg_d">【生活描述】</h3>
<div class="index_p">
  <div>

    <table cellpadding='3' cellspacing='3' border='0'>
	  <tr>
	    <td>家中排行：</td>
		<td><!--{hook mod='var' type='select' item='tophome' name='tophome' text='=请选择=' value=$login.info.tophome}--></td>
	  </tr>
	  <tr>
	    <td>最大消费：</td>
		<td><!--{hook mod='var' type='select' item='consume' name='consume' text='=请选择=' value=$login.info.consume}--></td>
	  </tr>
	  <tr>
	    <td>是否吸烟：</td>
		<td><!--{hook mod='var' type='select' item='smoking' name='smoking' text='=请选择=' value=$login.info.smoking}--></td>
	  </tr>
	  <tr>
	    <td>是否喝酒：</td>
		<td><!--{hook mod='var' type='select' item='drinking' name='drinking' text='=请选择=' value=$login.info.drinking}--></td>
	  </tr>
	  <tr>
	    <td>宗教信仰：</td>
		<td><!--{hook mod='var' type='select' item='faith' name='faith' text='=请选择=' value=$login.info.faith}--></td>
	  </tr>
	  <tr>
	    <td>锻炼习惯：</td>
		<td><!--{hook mod='var' type='select' item='workout' name='workout' text='=请选择=' value=$login.info.workout}--> </td>
	  </tr>
	  <tr>
	    <td>作息习惯：</td>
		<td><!--{hook mod='var' type='select' item='rest' name='rest' text='=请选择=' value=$login.info.rest}--></td>
	  </tr>
	  <tr>
	    <td>是否要孩子：</td>
		<td><!--{hook mod='var' type='select' item='havechildren' name='havechildren' text='=请选择=' value=$login.info.havechildren}--></td>
	  </tr>
	  <tr>
	    <td>与对方父母同住：</td>
		<td><!--{hook mod='var' type='select' item='talive' name='talive' text='=请选择=' value=$login.info.talive}--></td>
	  </tr>
	  <tr>
	    <td>喜欢制造浪漫：</td>
		<td><!--{hook mod='var' type='select' item='romantic' name='romantic' text='=请选择=' value=$login.info.romantic}--></td>
	  </tr>
	  <tr>
	    <td>生活技能：</td>
		<td><!--{hook mod='var' item='lifeskill' name='lifeskill' text='=请选择=' type='multiple' value=$login.info.lifeskill}--></td>
	  </tr>
	</table>
  </div>
</div>

<h3 class="slide_bg_d">【兴趣爱好】</h3>
<div class="index_p">
  <div>

    <table cellpadding='3' cellspacing='3' border='0'>
	  <tr>
	    <td>喜欢的运动：</td>
		<td><!--{hook mod='var' item='sports' name='sports' type='multiple' text='==请选择==' value=$login.info.sports}--></td>
	  </tr>
	  <tr>
	    <td>喜欢的食物：</td>
		<td><!--{hook mod='var' item='food' name='food' type='multiple' text='==请选择==' value=$login.info.food}--></td>
	  </tr>
	  <tr>
	    <td>喜欢的书籍：</td>
		<td><!--{hook mod='var' item='book' name='book' type='multiple' text='==请选择==' value=$login.info.book}--></td>
	  </tr>
	  <tr>
	    <td>喜欢的电影：</td>
		<td><!--{hook mod='var' item='film' name='film' type='multiple' text='==请选择==' value=$login.info.film}--></td>
	  </tr>
	  <tr>
	    <td>业余爱好：</td>
		<td><!--{hook mod='var' item='interest' name='interest' type='multiple' text='==请选择==' value=$login.info.interest}--></td>
	  </tr>
	  <tr>
	    <td>喜欢的旅游：</td>
		<td><!--{hook mod='var' item='travel' name='travel' type='multiple' text='==请选择==' value=$login.info.travel}--></td>
	  </tr>
	  <tr>
	    <td>关注的节目：</td>
		<td><!--{hook mod='var' item='attention' name='attention' type='multiple' text='==请选择==' value=$login.info.attention}--></td>
	  </tr>
	  <tr>
	    <td>娱乐休闲：</td>
		<td><!--{hook mod='var' item='leisure' name='leisure' type='multiple' text='==请选择==' value=$login.info.leisure}--></td>
	  </tr>
	  <tr>
	    <td colspan="2"><input type="submit" name="btn_save" value="编辑保存" class="submit_b"></td>
	  </tr>
	</table>
	温馨提示：如果您的手机不支持多选复选框，您可能只能选一项，如果需要多选，建议您电脑登录网站进行修改。
  </div>
</div>

</form>


<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info">用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=profile">详细资料</a> 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>