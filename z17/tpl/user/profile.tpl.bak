<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<!--{assign var="menuid" value="profile"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->

<div class="user_main">
 

  <div class="main_right">
    <div class="div_">我的资料 &gt;&gt; 编辑资料</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<!--{if $a=='run'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=profile">基本资料</a></li>
		  <li class="tab_item<!--{if $a=='more'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=profile&a=more">详细资料</a></li>
		  <li class="tab_item<!--{if $a=='monolog'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=profile&a=monolog">内心独白</a></li>
		  <li class="tab_item<!--{if $a=='contact'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=profile&a=contact">联系资料</a></li>
		  <!--{if $config.app.liehun=='1'}-->
		  <li class="tab_item">猎婚资料</li>
		  <!--{/if}-->
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover basicdata">
	  
	  <!--{if $a eq 'run'}--> 
	  <!--基本资料 Begin-->
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=profile&a=savebase" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>基本资料</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 邮箱、名称 -->
		  <tr>
			<td class='lblock' width='15%'>登录邮箱 <span class='f_red'></span></td>
			<td class='rblock' width='35%'><font color="#999999"><!--{$u.email}--> </font></td>
			<td class='lblock' width='15%'>用 户 名 <span class='f_red'></span></td>
			<td class='rblock' width='35%'><!--{$u.levelimg}-->&nbsp;<font color="#999999"><!--{$u.username}--></font></td>
		  </tr>
		  <!-- 性别、生日 -->
		  <tr>
			<td class='lblock'>性 别 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><!--{if $u.gender==1}--><!--{$lang.sex_male}--><!--{else}--><!--{$lang.sex_female}--><!--{/if}--></font> </td>
			<td class='lblock'>生 日 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><!--{$u.birthday}-->&nbsp;&nbsp;<!--{$u.age}-->  岁</font></td>
		  </tr>
		  <!-- 星座、生肖 -->
		  <tr>
			<td class='lblock'>星 座 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><!--{$u.astro}--></font> </td>
			<td class='lblock'>生 肖 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><!--{$u.lunar}--></font> </td>
		  </tr>
		  <!-- 婚姻、身高 -->
		  <tr>
			<td class='lblock'>婚姻状态 <span class='f_red'></span></td>
			<td class='rblock'><font color='#999999'><!--{hook mod='var' type='text' item='marrystatus' value=$u.marrystatus}--></font> <span class='f_red' id='dmarrystatus'></span></td>
			<td class='lblock'>身 高 <span class='f_red'></span></td>
			<td class='rblock'><font color='#999999'><!--{$u.height}--> CM</font> <span class='f_red' id='dheight'></span></td>
		  </tr>
		  <!-- 血型、有无子女 -->
		  <tr>
			<td class='lblock'>血 型 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='blood' name='blood' text='=请选择=' value=$u.blood}--> <span id='dblood' class='f_red'></span></td>
			<td class='lblock'>有无子女 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='childrenstatus' name='childrenstatus' text='=请选择=' value=$u.childrenstatus}--> <span id='dchildrenstatus' class='f_red'></span></td>
		  </tr>
		  <!-- 国籍，户籍 -->
		  <tr>
			<td class='lblock'>国 籍 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='nationality' name='nationality' text='=请选择=' value=$u.nationality}--> <span id='dnationality' class='f_red'></span></td>
			<td class='lblock'>户 籍 <span class='f_red'></span></td>
			<td class='rblock'>
			<!--{hometown type='dist1' name='nationprovinceid' value=$u.nationprovinceid cname='nationcityid' text='=请选择='}-->&nbsp;<span id='dnationprovinceid' class='f_red'></span>
			<span id="json_nationcityid">
			<!--{hometown type='dist2' cname='nationcityid' cvalue=$u.nationcityid pvalue=$u.nationprovinceid text='=请选择='}-->
			</span>&nbsp;<span id='dnationcityid' class='f_red'></span>
			</td>
		  </tr>
		  <!-- 所在地、交友目的 -->
		  <tr>
			<td class='lblock'>所在地区 <span class='f_red'>*</span></td>
			<td class='rblock'>
			<!--{area type='dist1' name='provinceid' value=$u.provinceid ajax='1' cname='cityid' cajax='1' dname='distid' text='=请选择='}-->&nbsp;<span id='provinceid' class='f_red'></span>
			<span id="json_cityid">
			<!--{area type='dist2' pvalue=$u.provinceid cname='cityid' cvalue=$u.cityid cajax='1' dname='distid' dvalue=$u.distid text='=请选择='}-->
			</span>&nbsp; <span id='dcityid' class='f_red'></span>
			<span id="json_distid">
			<!--{area type='dist3' cvalue=$u.cityid dname='distid' dvalue=$u.distid text='=请选择='}-->
			</span>
			</td>
			<td class='lblock'>交友类别 <span class='f_red'>*</span></td>
			<td class='rblock'><!--{hook mod='lovesort' type='select' name='lovesort' text='=请选择=' value=$u.lovesort}--> <span id='dlovesort' class='f_red'></span></td>
		  </tr>
		  <!-- 个性、民族 -->
		  <tr>
			<td class='lblock'>个 性 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='personality' name='personality' text='=请选择=' value=$u.personality}--> <span id="dpersonality"></span></td>
			<td class='lblock'>民 族 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='national' name='national' text='=请选择=' value=$u.national}--> <span id='dnational' class='f_red'></span></td>
		  </tr>
		  <!-- 行业、月薪 -->
		  <tr>
			<td class='lblock'>职 业 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='jobs' name='jobs' text='=请选择=' value=$u.jobs}--> <span id="djobs"></span></td>
			<td class='lblock'>月薪收入 <span class='f_red'>*</span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='salary' name='salary' text='=请选择=' value=$u.salary}--> <span id='dsalary' class='f_red'></span></td>
		  </tr>
		  <!-- 住房、购车 -->
		  <tr>
			<td class='lblock'>住房情况 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='housing' name='housing' text='=请选择=' value=$u.housing}--> <span id="dhousing"></span></td>
			<td class='lblock'>购车情况 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='caring' name='caring' text='=请选择=' value=$u.caring}--> <span id="dcaring"></span></td>
		  </tr>

		  <tr>
			<td colspan="4" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p>外貌体型</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 体重、外貌自评 -->
		  <tr>
			<td class='lblock'>体 重 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='weight' name='weight' value=$u.weight}--> 公斤</td>
			<td class='lblock'>外貌自评 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='profile' name='profile' text='=请选择=' value=$u.profile}--> </td>
		  </tr>
		  <!-- 特征、发型 -->
		  <tr>
			<td class='lblock'>魅力部位 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='charmparts' name='charmparts' text='=请选择=' value=$u.charmparts}--> </td>
			<td class='lblock'>发 型 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='hairstyle' name='hairstyle' text='=请选择=' value=$u.hairstyle}--> </td>
		  </tr>
		  <!-- 发色、面型 -->
		  <tr>
			<td class='lblock'>发 色 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='haircolor' name='haircolor' text='=请选择=' value=$u.haircolor}--> </td>
			<td class='lblock'>脸 型 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='facestyle' name='facestyle' text='=请选择=' value=$u.facestyle}--> </td>
		  </tr>
		  <!-- 体型 -->
		  <tr>
			<td class='lblock'>体 型 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><!--{hook mod='var' type='select' item='bodystyle' name='bodystyle' text='=请选择=' value=$u.bodystyle}--> </td>
		  </tr>
		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock' height="50px"></td>
			<td class='rblock' colspan="3">				
			<input type="button" name="btn_save" value="提交保存" onclick="return checkbase();" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--基本资料 End-->
	  <!--{/if}-->
	  
	  <!--{if $a eq 'more'}--> 
	  <!--详细资料 Begin-->
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=profile&a=savemore" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>工作学习</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 公司类型、收入 -->
		  <tr>
			<td class='lblock' width='15%'>公司类型 <span class='f_red'></span></td>
			<td class='rblock' width="35%"><!--{hook mod='var' type='select' item='companytype' name='companytype' text='=请选择=' value=$u.companytype}--> <span id='dcompanytype' class='f_red'></span></td>
			<td class='lblock' width="15%">收入描述 <span class='f_red'></span></td>
			<td class='rblock' width="35%"><!--{hook mod='var' type='select' item='income' name='income' text='=请选择=' value=$u.income}--> <span id="dincome"></span></td>
		  </tr>
		  <!-- 工作、公司 -->
		  <tr>
			<td class='lblock'>工作状况 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='workstatus' name='workstatus' text='=请选择=' value=$u.workstatus}--> <span id="dworkstatus"></span></td>
			<td class='lblock'>公司名称 <span class='f_red'></span></td>
			<td class='rblock'><input type="text" name="companyname" id="companyname" value="<!--{$u.companyname}-->" class="input-150" /> <span id='dcompanyname' class='f_red'></span></td>
		  </tr>
		  <!-- 学历、专业 -->
		  <tr>
			<td class='lblock'>学 历 <span class='f_red'></span></td>
			<td class='rblock'><font color='#999999'><!--{hook mod='var' item='education' type='text' value=$u.education}--></font> <span id="deducation"></span></td>
			<td class='lblock'>专业类型 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='specialty' name='specialty' text='=请选择=' value=$u.specialty}--> <span id='dspecialty' class='f_red'></span></td>
		  </tr>
		  <!-- 学校 -->
		  <tr>
			<td class='lblock'>毕业学校 <span class='f_red'></span></td>
			<td class='rblock'><input type='text' name='school' id='school' class='input-150' value="<!--{$u.school}-->" /> <span id="dschool"></span></td>
			<td class='lblock'>入学年份 <span class='f_red'></span></td>
			<td class='rblock'><input type='text' name='schoolyear' id='schoolyear' class='input-s' value="<!--{$u.schoolyear}-->" /> <span id='dschoolyear' class='f_red'></span></td>
		  </tr>
		  <!-- 语言能力 -->
		  <tr>
			<td class='lblock'>语言能力 <span class='f_red'></span></td>
			<td class='rblock' colspan="3" id="em_language_edit">
			<!--{hook mod='var' item='language' name='language' type='checkbox' maxnum=$config.maxnum value=$u.language}-->
			 <span id="dlanguage" class="f_red"></span></td>
		  </tr>

		  <tr>
			<td colspan="4" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p>生活描述</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 排行、消费 -->
		  <tr>
			<td class='lblock'>家中排行 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='tophome' name='tophome' text='=请选择=' value=$u.tophome}--> <span id='dtophome' class='f_red'></span></td>
			<td class='lblock'>最大消费 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='consume' name='consume' text='=请选择=' value=$u.consume}--> <span id="dconsume"></span></td>
		  </tr>
		  <!-- 吸烟、喝酒 -->
		  <tr>
			<td class='lblock'>是否吸烟  <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='smoking' name='smoking' text='=请选择=' value=$u.smoking}--> <span id="dsmoking"></span></td>
			<td class='lblock'>是否喝酒 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='drinking' name='drinking' text='=请选择=' value=$u.drinking}--> <span id='ddrinking' class='f_red'></span></td>
		  </tr>
		  <!-- 信仰、锻炼 -->
		  <tr>
			<td class='lblock'>宗教信仰 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='faith' name='faith' text='=请选择=' value=$u.faith}--> <span id="dfaith"></span></td>
			<td class='lblock'>锻炼习惯 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='workout' name='workout' text='=请选择=' value=$u.workout}--> <span id='dworkout' class='f_red'></span></td>
		  </tr>
		  <!-- 习惯、孩子 -->
		  <tr>
			<td class='lblock'>作息习惯 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='rest' name='rest' text='=请选择=' value=$u.rest}--> <span id="drest"></span></td>
			<td class='lblock'>是否要孩子 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='havechildren' name='havechildren' text='=请选择=' value=$u.havechildren}--> <span id='dhavechildren' class='f_red'></span></td>
		  </tr>
		  <!-- 同住、浪漫 -->
		  <tr>
			<td class='lblock'>与对方父母同住 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='talive' name='talive' text='=请选择=' value=$u.talive}--> <span id="dtalive"></span></td>
			<td class='lblock'>喜欢制造浪漫 <span class='f_red'></span></td>
			<td class='rblock'><!--{hook mod='var' type='select' item='romantic' name='romantic' text='=请选择=' value=$u.romantic}--> <span id="dromantic"></span></td>
		  </tr>
		  <!-- 生活技能 -->
		  <tr>
			<td class='lblock'>生活技能 <span class='f_red'></span></td>
			<td class='rblock' colspan="3" id="em_lifeskill_edit">
			<!--{hook mod='var' item='lifeskill' name='lifeskill' type='checkbox' maxnum=$config.maxnum value=$u.lifeskill}-->
			<span id='dlifeskill' class='f_red'></span></td>
		  </tr>
		  <tr>
			<td colspan="4" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p>兴趣爱好</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 喜欢的运动 -->
		  <tr>
			<td class='lblock'>喜欢的运动 <span class='f_red'></span></td>
			<td class='rblock' id="em_sports_edit" colspan="3">
			<!--{hook mod='var' item='sports' name='sports' type='checkbox' maxnum=$config.maxnum value=$u.sports}-->
			 <span id='dsports' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的食物 -->
		  <tr>
			<td class='lblock'>喜欢的食物 <span class='f_red'></span></td>
			<td class='rblock' id="em_food_edit" colspan="3">
			<!--{hook mod='var' item='food' name='food' type='checkbox' maxnum=$config.maxnum value=$u.food}-->
			 <span id='dfood' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的书籍 -->
		  <tr>
			<td class='lblock'>喜欢的书籍 <span class='f_red'></span></td>
			<td class='rblock' id="em_book_edit" colspan="3">
			<!--{hook mod='var' item='book' name='book' type='checkbox' maxnum=$config.maxnum value=$u.book}-->
			 <span id='dbook' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的电影 -->
		  <tr>
			<td class='lblock'>喜欢的电影 <span class='f_red'></span></td>
			<td class='rblock' id="em_film_edit" colspan="3">
			<!--{hook mod='var' item='film' name='film' type='checkbox' maxnum=$config.maxnum value=$u.film}-->
			<span id='dfilm' class='f_red'></span></td>
		  </tr>
		  <!-- 业余爱好 -->
		  <tr>
			<td class='lblock'>业余爱好 <span class='f_red'></span></td>
			<td class='rblock' id="em_interest_edit" colspan="3">
			<!--{hook mod='var' item='interest' name='interest' type='checkbox' maxnum=$config.maxnum value=$u.interest}-->
			 <span id='dinterest' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的旅游 -->
		  <tr>
			<td class='lblock'>喜欢的旅游 <span class='f_red'></span></td>
			<td class='rblock' id="em_travel_edit"  colspan="3">
			<!--{hook mod='var' item='travel' name='travel' type='checkbox' maxnum=$config.maxnum value=$u.travel}-->
			<span id='dtravel' class='f_red'></span></td>
		  </tr>
		  <!-- 关注的节目 -->
		  <tr>
			<td class='lblock'>关注的节目 <span class='f_red'></span></td>
			<td class='rblock' id="em_attention_edit" colspan="3">
			<!--{hook mod='var' item='attention' name='attention' type='checkbox' maxnum=$config.maxnum value=$u.attention}-->
			<span id='dattention' class='f_red'></span></td>
		  </tr>
		  <!-- 娱乐休闲 -->
		  <tr>
			<td class='lblock'>娱乐休闲 <span class='f_red'></span></td>
			<td class='rblock' id="em_leisure_edit"  colspan="3">
			<!--{hook mod='var' item='leisure' name='leisure' type='checkbox' maxnum=$config.maxnum value=$u.leisure}-->
			 <span id='dleisure' class='f_red'></span></td>
		  </tr>
		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock' colspan="3">
			<input type="submit" name="btn_save" value="提交保存" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--详细资料 End-->
      <!--{/if}-->

	  <!--{if $a eq 'monolog'}-->
	  <!--内心独白 Begin-->
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=profile&a=savemonolog" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td class="lblock" width="15%">状 态</td>
			<td class="rblock" width="85%">
			<!--{if $u.molstatus=='1'}-->
			<img src="<!--{$ucpath}-->images/ok.gif" /> <font color="green">审核通过</font>
			<!--{elseif $u.molstatus == '-2'}-->
			<img src="<!--{$uctplpath}-->images/icn_time.gif" /> <font color="gray">审核中</font> 
			<!--{elseif $u.molstatus == '-1'}-->
			<img src="<!--{$uctplpath}-->images/cuo.gif" /> <font color="red">未通过审核</font> 
			<!--{else}-->
			<img src="<!--{$ucpath}-->images/no.gif"> <font color="#999999">锁定</font>
			<!--{/if}-->
			</td>
		  </tr>
		  <!-- 独白 -->
		  <tr>
			<td class='lblock'>内心独白 <span class='f_red'>*</span></td>
			<td class='rblock'>
			<textarea name='content' id='content' style='width:98%;height:200px;display:;overflow:auto;' onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"><!--{$u.monolog}--></textarea>
			<br /><span id="dcontent" class="f_red"></span>
			</td>
		  </tr>
		  <!-- 字数统计 -->
		  <tr>
			<td class="lblock"></td>
			<td class="rblock">限<!--{$config.molminlen}--> ~ <!--{$config.molmaxlen}-->个字，目前已输入<strong id="counter"></strong>个。</td>
		  </tr>
		  <tr>
			<td class="lblock"></td>
			<td class="rblock">
			<input type="button" name="btn_save" value="提交保存" onclick="return checkmonolog();" class="button-red" />
			</td>
		  </tr>
		  <!-- 温馨提示 -->
		  <tr>
			<td class="rblock" colspan="2" align="left">
			温馨提示：<br />1、内心独白字数需在<!--{$config.molminlen}--> ~ <!--{$config.molmaxlen}-->个字之内；<br />2、内心独白中请勿出现QQ、微信、电话号码以及网址、广告、色情或其他不健康的内容；<br />3、修改保存后，我们将进行审核，通过了才能显示在个人资料页面。
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--内心独白 End-->
	  <!--{/if}-->

	  <!--{if $a eq 'contact'}--> 
	  <!-- 联系资料 Begin-->
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=profile" method="post">
	  <input type='hidden' name='a' id='a' value='savecontact' />
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>联系方式</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 查看权限 -->
		  <tr style="display:;">
			<td class='lblock' width='25%'>查看权限 <span class='f_red'></span></td>
			<td class='rblock' width='75%'><input type="radio" name="privacy" id="privacy" value="1"<!--{if $u.privacy==1}--> checked<!--{/if}--> />任何人可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="4"<!--{if $u.privacy==4}--> checked<!--{/if}--> />保密&nbsp;&nbsp; <span id='dprivacy' class='f_red'></span></td>
		  </tr>
		  <!-- 手机号码 -->
		  <tr>
			<td class='lblock'><font color='red'>*</font>手机号 <span class='f_red'></span></td>
			<td class='rblock' colspan="3">
			<input type='hidden' name='mobilerz' id='mobilerz' value='<!--{$u.mobilerz}-->' />
			<input type="text" name="mobile" id="mobile" value="<!--{$u.mobile}-->" maxlength='11' class="input-150"<!--{if $u.mobilerz==1 && !empty($u.mobile)}--> readonly='only'<!--{else}-->  onblur="ajax_usermobile('mobile', 'tips_mobile');"<!--{/if}--> /> 
			
			<!--{if $u.mobilerz == 1}-->
			<font color='green'>已通过认证，不能更改。</font>
			<!--{/if}-->
			<span id='dmobile' class='f_red'></span>
			<span id="tips_mobile">(手机号码和QQ号码至少填写一项)</span>
			</td>
		  </tr>
		  <!-- QQ -->
		  <tr>
			<td class='lblock'><font color='red'>*</font>QQ号 <span class='f_red'></span></td>
			<td class='rblock' colspan="3">

			<input type="text" name="qq" id="qq" value="<!--{$u.qq}-->" class="input-150" maxlength='11'<!--{if $u.qqrz==1 && !empty($u.qq)}--> readonly='only'<!--{else}-->   onblur="ajax_userqq('qq', 'tips_qq');"<!--{/if}--> /> 
			<!--{if $u.qqrz == 1}-->
			<font color='green'>已通过认证，不能更改。</font>
			<!--{/if}-->
			<span id='dqq' class='f_red'></span>  
			<span id="tips_qq">(手机号码和QQ号码至少填写一项)</span>
			
			</td>
		  </tr>
		  <!-- 联系电话 -->
		  <tr>
			<td class='lblock'>电话 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="telephone" id="telephone" value="<!--{$u.telephone}-->" class="input-100" /> <span id='dtelephone' class='f_red'></span></td>
		  </tr>

		  <!--  MSN -->
		  <tr>
			<td class='lblock'>微信 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="msn" id="msn" value="<!--{$u.msn}-->" class="input-txt" /> <span id='dmsn' class='f_red'></span></td>
		  </tr>
		  <!-- 个人博客/微博 -->
		  <tr>
			<td class='lblock'>个人博客/微博 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="homepage" id="homepage" value="<!--{$u.homepage}-->" class="input-txt" /> <span id='dhomepage' class='f_red'></span></td>
		  </tr>
		  <!-- 联系地址 -->
		  <tr>
			<td class='lblock'>联系地址 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="address" id="address" value="<!--{$u.address}-->" class="input-txt" /> <span id='daddress' class='f_red'></span> </td>
		  </tr>
		  <!-- 邮政编码 -->
		  <tr>
			<td class='lblock'>邮政编码 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="zipcode" id="zipcode" value="<!--{$u.zipcode}-->" class="input-s" /> <span id='dzipcode' class='f_red'></span> </td>
		  </tr>
		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock' height="45">
			<input type="button" name="btn_save" value="提交保存" onclick="return checkcontact();" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>

		<script language="javascript">
		function checkcontact(){
			var mobile = $('#mobile').val();
			var qq = $('#qq').val();

			if (mobile == '' && qq == '') {
				//alert('手机号码或者QQ至少填写一项');
				$.dialog.tips("手机号码或者QQ至少填写一项", 3);
				return false;
			}
			else {
				if (mobile != '') {
					<!--{if $config.cancelcheckmobile == '1'}-->
					<!--{else}-->
					if (!isMobile(mobile)) {
						//alert('手机号码不正确！');
						$.dialog.tips("手机号码不正确！", 3);
						return false;
					}
					<!--{/if}-->
				}
				if (qq != '') {
					if (!isQQ(qq)) {
						//alert('QQ号码格式不正确，请填写5-11位数字');
						$.dialog.tips("QQ号码格式不正确，请填写5-11位数字", 3);
						return false;
					}
				}
			}
			$('#myform').submit();
			return true;
		}
		</script>
	  <!-- 联系资料 End-->
	  <!--{/if}-->


	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"></div>
  <!--//main_right End-->
  
  <div class="right_kj" id="kj_box">
    <ul>
	  <li id="jbzl"><a href="<!--{$ucfile}-->?c=profile">基本资料</a></li>
	  <li id="xxzl"><a href="<!--{$ucfile}-->?c=profile&a=more">详细资料</a></li>
	  <li id="nxdb"><a href="<!--{$ucfile}-->?c=profile&a=monolog">内心独白</a></li>
	  <li id="lxzl"><a href="<!--{$ucfile}-->?c=profile&a=contact">联系资料</a></li>
    </ul>
  </div>
  <div style="margin: 30px;"></div>
  <!--//right_kj End-->
  
</div>
<!--//user_main End-->

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
//基本资料
function checkbase() {
	var t = "";
	var v = "";

	//所在地区
	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		return false;
	}
	//所在地区
	t = "cityid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		return false;
	}

	//交友类型
	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择交友类别", t);
		return false;
	}

	//月薪
	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择月薪收入", t);
		return false;
	}
	
	$('#myform').submit();
	return true;
}

//内心独白
function checkmonolog() {
	var t = "";
	var v = "";

	//内心独白
	t = 'content';
	v = $('#'+t).val();
	if (v == '') {
		dmsg("内心独白不能为空", t);
		return false;
	}
	else {
		if (strQuantity(v)<<!--{$config.molminlen}--> || strQuantity(v)><!--{$config.molmaxlen}-->) {
			dmsg("内心独白字数必须在<!--{$config.molminlen}-->~<!--{$config.molmaxlen}-->个字之间", t);
			$('#'+t).focus();
			return false;
		}
	}

	$('#myform').submit();
	return true;
}

<!--{if $a == 'monolog' || $a == 'reg'}--> 
$(function(){
	var text = $("#content").val();
	$("#counter").html(strQuantity(text));
});
<!--{/if}-->

</script>