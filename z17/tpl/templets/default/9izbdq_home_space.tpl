<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value=''}--> 
<script type='text/javascript'>
//关注状态
function obj_listen_status(uid, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:"getlisten", halttype:"ajax", uid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var flag = json.flag;
				if (tipsid != '') {
					if (flag == '1') {
						$("#"+tipsid).html("<span class='home_coffbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'cancel', '"+tipsid+"');\">取消关注</a></span>");
					}
					else {
						$("#"+tipsid).html("<span class='home_greenbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a>");
					}
				}
			},
			error: function() {

			}
		});
	} 
}

//操作好友 加关注、拉黑、取消
function obj_action_listen (uid, action, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:action, halttype:"ajax", fuid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var type = json.type;
				var flag = json.flag;
				var error = json.error;
				if (tipsid != '') {
					//加关注
					if (type == 'listen') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<span class='home_coffbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'cancel', '"+tipsid+"');\">取消关注</a></span>");
							}
						}
						else {
							alert(error);
						}
					}
					//取消关注
					if (type == 'cancel') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<span class='home_greenbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a></span>");
							}
						}
						else {
							alert(error);
						}
					}
					//拉黑名单
					if (type == 'black') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<span class='home_greenbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a></span>");
							}
						}
						else {
							alert(error);
						}
					}

				}
			},
			error: function() {

			}
		});
	}
}
</script>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce member">
    <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->
    <div class="left">
      <div class="paper-article">
        <div class="articlesec basicsec">
          <div class="pcontent">
            <div class="prwrap">
              <div class="portrait portrait-195"><!--{$home.useravatar}--></div>
              <p class="offstr" style="text-align:center;">
			  <img src="<!--{$skinpath}-->themes/images/cid<!--{if $home.idnumberrz==0}-->_h<!--{/if}-->.png" title="<!--{if $home.idnumberrz==1}-->已身份证认证<!--{else}-->身份证未认证<!--{/if}-->">
			  <img src="<!--{$skinpath}-->themes/images/video<!--{if $home.videorz==0}-->_h<!--{/if}-->.png" title="<!--{if $home.videorz==1}-->已视频认证<!--{else}-->视频未认证<!--{/if}-->">
			  <img src="<!--{$skinpath}-->themes/images/email<!--{if $home.emailrz==0}-->_h<!--{/if}-->.png" title="<!--{if $home.emailrz==1}-->已邮箱认证<!--{else}-->邮箱未认证<!--{/if}-->">
			  </p>
			  <!--{if $config.showhomecontact == '1' && $home.privacy != '4'}-->
			  <p style="text-align:center;">
			  <!--{if $login.status == '0'}-->
			  <a href="###" onclick="artbox_loginbox();">查看联系方式</a>
			  <!--{else}-->
			  <a href="###" onclick="artbox_viewcontact('<!--{$home.userid}-->');">查看联系方式</a>
			  <!--{/if}-->
			  </p>
			  <!--{/if}-->
              <div class="opwrap">
			  </div>
            </div>
            <div class="infowrap">

              <div class="biwrap">
                <ul class="infolist">
				  <li>交 友 ID：<!--{$home.userid}--></li>
                  <li>用 户 名：<!--{$home.username}--></li>
                  <li>性&#12288;&#12288;别：<span class="certiconph"><!--{if $home.gender==1}-->男<!--{else}-->女<!--{/if}--></span></li>
                  <li>婚姻状态：<!--{hook mod='var' item='marrystatus' type='text' value=$home.marrystatus}--><span class="certiconph"></span></li>
                  <li>年&#12288;&#12288;龄：<!--{$home.age}--> 岁<span class="certiconph"></span></li>
                  <li>学&#12288;&#12288;历：<!--{hook mod='var' item='education' type='text' value=$home.education}--><span class="certiconph"></span></li>
                  <li>身&#12288;&#12288;高：<!--{$home.height}-->CM</li>
				  <li>月薪收入：<!--{if $home.salary == 0}--><font class="empty">未透露</font><!--{else}--><!--{hook mod='var' item='salary' type='text' value=$home.salary}--><!--{/if}--></li>
                 
				  <li>星&#12288;&#12288;座：<!--{$home.astro}--></li>
                  <li>生&#12288;&#12288;肖：<!--{$home.lunar}--></li>
                  <li>所在地区：<!--{area type='text' value=$home.provinceid}--> <!--{area type='text' value=$home.cityid}--></li>
                  <li>籍&#12288;&#12288;贯：<!--{if $home.nationprovinceid == 0}--><font class="empty">未透露</font><!--{else}--><!--{hometown type='text' value=$home.nationprovinceid}--> <!--{hometown type='text' value=$home.nationcityid}--><!--{/if}-->
				  </li>
                  <div style="clear:both;"></div>
                </ul>
              </div>
			  <div style="clear:both;"></div>
              <div class="mbtnwrap">
                <div class="center_buttons"> 
				<!--{if $login.status == 1}-->
				<a href="###" onclick="artbox_hi('<!--{$home.userid}-->');"> <img src="<!--{$skinpath}-->themes/images/a2.gif"></a> 
				<a href="###" onclick="artbox_writemsg('<!--{$home.userid}-->');"> <img src="<!--{$skinpath}-->themes/images/a1.gif"></a> 
				<a href="###" onclick="artbox_sendgift('<!--{$home.userid}-->');"> <img src="<!--{$skinpath}-->themes/images/a4.gif"></a> 
				<!--{else}-->
				<a href="###" onclick="artbox_loginbox();"> <img src="<!--{$skinpath}-->themes/images/b2.gif"></a>
				<a href="###" onclick="artbox_loginbox();"> <img src="<!--{$skinpath}-->themes/images/b1.gif"></a>
				<a href="###" onclick="artbox_loginbox();"> <img src="<!--{$skinpath}-->themes/images/b4.gif"></a>
				<!--{/if}-->
				</div>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
        </div>
		<!--{if $home.molstatus == 1}-->
        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">内心独白</h1>
          </div>
          <div class="pcontent">
            <ul class="content" style="font-size:12px;">
			<!--{$home.monolog|nl2br}-->
            </ul>
          </div>
        </div>
		<!--{/if}-->

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">择友要求</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width='100%'>
				  <tr>
					<td width='15%'>性&#12288;&#12288;别：</td>
					<td width='35%'><!--{if $cond.gender==1}-->男<!--{else if $cond.gender==2}-->女<!--{else}--><font class='empty'>不限</font><!--{/if}--> </td>
					<td width='15%'>照片要求：</td>
					<td width='35%'><!--{if $cond.avatar==1}-->有照片<!--{else}--><font class='empty'>不限</font><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>年龄范围：</td>
					<td><!--{if $cond.startage==0}--><font class='empty'>不限</font><!--{else}--><!--{$cond.startage}-->~<!--{$cond.endage}-->岁<!--{/if}--></td>
					<td>身高范围：</td>
					<td><!--{if $cond.startheight==0}--><font class='empty'>不限</font><!--{else}--><!--{$cond.startheight}-->~<!--{$cond.endheight}-->CM<!--{/if}--></td>
				  </tr>
				  <tr>
					<td>交友类型：</td>
					<td><!--{if empty($cond.lovesort)}--><font class='empty'>不限</font><!--{else}--><!--{hook mod='lovesort' type='multi' value=$cond.lovesort}--><!--{/if}--></td>
					<td>婚史状况：</td>
					<td><!--{if empty($cond.marry)}--><font class='empty'>不限</font><!--{else}--><!--{hook mod='var' type='multi' item='marrystatus' value=$cond.marry}--><!--{/if}--></td>
				  </tr>

				  <tr>
					<td>学历要求：</td>
					<td><!--{if $cond.startedu == 0}--><font class='empty'>不限</font><!--{else}--><!--{hook mod='var' type='text' item='education' value=$cond.startedu}-->~<!--{hook mod='var' type='text' item='education' value=$cond.endedu}--><!--{/if}--></td>
					<td>诚信星级：</td>
					<td><!--{if $cond.star==0}--><font class='empty'>不限</font><!--{else}--><!--{if $cond.starup==1}-->以上<!--{elseif $cond.starup==2}-->以下<!--{/if}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>所在地区：</td>
					<td colspan='3'>
					<!--{assign var='i' value=false}-->
					<!--{foreach $cond.bulidarea as $volist}-->
					<!--{if $volist.city>0}-->
					<!--{assign var='i' value=true}-->
					<!--{area type='text' value=$volist.province}--> <!--{area type='text' value=$volist.city}--><br />
					<!--{/if}-->
					<!--{/foreach}-->
					<!--{if false === $i}-->
					<font class='empty'>不限</font>
					<!--{/if}-->
					</td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">详细资料</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>年&#12288;&#12288;龄：</td>
					<td width='35%'><!--{$home.age}--> 岁</td>
					<td width='15%'>生&#12288;&#12288;肖：</td>
					<td width='35%'><!--{$home.lunar}--></td>
				  </tr>
				  <tr>
					<td>交友类型：</td>
					<td><!--{if $home.lovesort==0}--><font class='empty'>未透露</font><!--{else}--><!--{$home.sortname}--><!--{/if}--></td>
					<td>血&#12288;&#12288;型：</td>
					<td><!--{if $home.blood==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='blood' value=$home.blood}--><!--{/if}--> </td>
				  </tr>
				  <tr>
					<td>民&#12288;&#12288;族：</td>
					<td><!--{if $home.national==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='national' value=$home.national}--><!--{/if}--></td>
					<td>有无子女：</td>
					<td><!--{if $home.childrenstatus==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='childrenstatus' value=$home.childrenstatus}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>购车情况：</td>
					<td><!--{if $home.caring==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='caring' value=$home.caring}--><!--{/if}--> </td>
					<td>住房情况：</td>
					<td><!--{if $home.housing==0}--><font class="empty">未透露</font><!--{else}--><!--{hook mod='var' item='housing' type='text' value=$home.housing}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>所在地区：</td>
					<td><!--{if $home.provinceid == 0}--><font class='empty'>未透露</font><!--{else}--><!--{area type='text' value=$home.provinceid}--> <!--{area type='text' value=$home.cityid}--><!--{/if}--></td>
					<td>户籍地区：</td>
					<td><!--{if $home.nationprovinceid == 0}--><font class='empty'>未透露</font><!--{else}--><!--{hometown type='text' value=$home.nationprovinceid}--> <!--{hometown type='text' value=$home.nationcityid}--><!--{/if}--></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">性格相貌</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>个性描述：</td>
					<td width='35%'><!--{if $home.personality==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='personality' type='text' value=$home.personality}--><!--{/if}--></td>
					<td width='15%'>相貌自评：</td>
					<td width='35%'><!--{if $home.profile==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='profile' type='text' value=$home.profile}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>体&#12288;&#12288;重：</td>
					<td><!--{if $home.weight==0}--><font class='empty'>未透露</font><!--{else}--><!--{$home.weight}--> (KG)<!--{/if}--> </td>
					<td>体&#12288;&#12288;型：</td>
					<td><!--{if $home.bodystyle==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='bodystyle' type='text' value=$home.bodystyle}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>魅力部位：</td>
					<td><!--{if $home.charmparts==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='charmparts' type='text' value=$home.charmparts}--><!--{/if}--> </td>
					<td>发&nbsp;&nbsp;&nbsp;&nbsp;型：</td>
					<td><!--{if $home.hairstyle==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='hairstyle' type='text' value=$home.hairstyle}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>发&#12288;&#12288;色：</td>
					<td><!--{if $home.haircolor==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='haircolor' type='text' value=$home.haircolor}--><!--{/if}--></td>
					<td>脸&#12288;&#12288;型：</td>
					<td><!--{if $home.facestyle==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='facestyle' type='text' value=$home.facestyle}--><!--{/if}--> </td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">工作与学习</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>公司类型：</td>
					<td width='35%'><!--{if $home.companytype==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='companytype' type='text' value=$home.companytype}--><!--{/if}--></td>
					<td width='15%'>收入描述：</td>
					<td width='35%'><!--{if $home.income==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='income' type='text' value=$home.income}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>工作状况：</td>
					<td><!--{if $home.workstatus==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='workstatus' type='text' value=$home.workstatus}--><!--{/if}--></td>
					<td>公司名称：</td>
					<td><!--{if $home.companyname==''}--><font class='empty'>未透露</font><!--{else}--><!--{$home.companyname}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>教育程度：</td>
					<td><!--{if $home.education==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='education' type='text' value=$home.education}--><!--{/if}--></td>
					<td>所学专业：</td>
					<td><!--{if $home.specialty==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='specialty' type='text' value=$home.specialty}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>职&#12288;&#12288;业：</td>
					<td colspan="3"><!--{if $home.jobs=='0'}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='jobs' type='text' value=$home.jobs}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>语言能力：</td>
					<td colspan="3"><!--{if $home.language==''}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='language' type='multi' value=$home.language}--><!--{/if}--></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">生活描述</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>家中排行：</td>
					<td width='35%'><!--{if $home.tophome==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='tophome' type='text' value=$home.tophome}--><!--{/if}--></td>
					<td width='15%'>最大消费：</td>
					<td width='35%'><!--{if $home.consume==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='consume' type='text' value=$home.consume}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>是否吸烟：</td>
					<td><!--{if $home.smoking==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='smoking' type='text' value=$home.smoking}--><!--{/if}--></td>
					<td>是否喝酒：</td>
					<td><!--{if $home.drinking==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='drinking' type='text' value=$home.drinking}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>宗教信仰：</td>
					<td><!--{if $home.faith==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='faith' type='text' value=$home.faith}--><!--{/if}--></td>
					<td>锻炼习惯：</td>
					<td><!--{if $home.workout==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='workout' type='text' value=$home.workout}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>作息习惯：</td>
					<td><!--{if $home.rest==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='rest' type='text' value=$home.rest}--><!--{/if}--></td>
					<td>是否要孩子 </td>
					<td><!--{if $home.havechildren==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='havechildren' type='text' value=$home.havechildren}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td colspan='2'>愿意与对方父母同住： <!--{if $home.talive==0}--><font class='empty'>未透露</font><!--{else}--><!--{$home.talive_t}--><!--{/if}--></td>
					<td colspan='2'>喜欢制造浪漫： <!--{if $home.romantic==0}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='romantic' type='text' value=$home.romantic}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td colspan="4">擅长生活技能： <!--{if $home.lifeskill==''}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='lifeskill' type='multi' value=$home.lifeskill}--><!--{/if}--></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">兴趣爱好</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width="20%">喜欢的运动：</td>
					<td width='80%'><!--{if $home.sports==''}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='sports' type='multi' value=$home.sports}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>喜欢的食物：</td>
					<td><!--{if empty($home.food)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='food' type='multi' value=$home.food}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>喜欢的书籍：</td>
					<td><!--{if empty($home.book)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='book' type='multi' value=$home.book}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>喜欢的电影：</td>
					<td><!--{if empty($home.film)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='film' type='multi' value=$home.film}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>业 余 爱 好：</td>
					<td><!--{if empty($home.interest)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='interest' type='multi' value=$home.interest}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>喜欢的旅游去处：</td>
					<td><!--{if empty($home.travel)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='travel' type='multi' value=$home.travel}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>关注的节目：</td>
					<td><!--{if empty($home.attention)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='attention' type='multi' value=$home.attention}--><!--{/if}--></td>
				  </tr>
				  <tr>
					<td>娱 乐 休 闲：</td>
					<td><!--{if empty($home.leisure)}--><font class='empty'>未透露</font><!--{else}--><!--{hook mod='var' item='leisure' type='multi' value=$home.leisure}--><!--{/if}--></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>
		<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->home_block_album.tpl"}-->
      </div>
    </div>

    <div class="right yue1">
      <h2>会员状态</h2>
      <ul class="center">
        <li>会员级别：<!--{$home.levelimg}--></li>
		<li>访问人气：<font id='json_hits'></font></li>
        <li>个人相册：<!--{count mod='user' type='album' value=$home.userid}--> 张</li>
        <li>心情日记：<!--{count mod='user' type='diary' value=$home.userid}--> 篇</li>
        <li>收到礼物：<!--{count mod='user' type='gift' value=$home.userid}--> 个</li>
		<li>微博动态：<!--{count mod='user' type='weibo' value=$home.userid}--> 个</li>
		<li>关&#12288;&#12288;注：<!--{count mod='user' type='listen' value=$home.userid}--> 个</li>
		<li>粉&#12288;&#12288;丝：<!--{count mod='user' type='fans' value=$home.userid}--> 个</li>
        <li>注册时间：
		<!--{if $login.status==0}-->
		<a href="###" onclick="artbox_loginbox();">登录可见</a>
		<!--{else}-->
		    <!--{if $login.userid == $home.userid}-->
			    <!--{$home.regtime|date_format:"%Y-%m-%d"}-->
			<!--{else}-->
				<!--{if $login.group.view.viewlogintime == 1}-->
				<!--{$home.regtime|date_format:"%Y-%m-%d"}-->
				<!--{else}-->
				<a href="<!--{$urlpath}-->usercp.php?c=vip">VIP可见&gt;&gt;</a>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
		</li>
        <li>最后登录：
		<!--{if $login.status==0}-->
		<a href="###" onclick="artbox_loginbox();">登录可见</a>
		<!--{else}-->
		    <!--{if $login.userid == $home.userid}-->
				<!--{$home.logintime|date_format:"%Y-%m-%d"}-->
			<!--{else}-->
				<!--{if $login.group.view.viewlogintime == 1}-->
				<!--{$home.logintime|date_format:"%Y-%m-%d"}-->
				<!--{else}-->
				<a href="<!--{$urlpath}-->usercp.php?c=vip">VIP可见&gt;&gt;</a>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
		</li>
        <div style="clear:both;"></div>
      </ul>
      <div class="listen">

	  <!--{if $login.status=='0'}-->
	  <span class="home_greenbtn"><a onclick="artbox_loginbox();" href="###">+加关注</a></span>
	  <span class="home_gradbtn"><a onclick="artbox_loginbox();" href="###">加黑名单</a></span>
	  <!--{else}-->
		<!--{if $login.userid != $home.userid}-->
		<div style="float:left;width:75px;" id="listen-status"><script>obj_listen_status('<!--{$home.userid}-->', 'listen-status');</script></div>
		<div style="float:left;width:75px;" id="black-status">
		<span class="home_gradbtn"><a href="###" onclick="obj_action_listen('<!--{$home.userid}-->', 'black', 'listen-status');">加黑名单</a></span>
		</div>
		<div style="clear:both;"></div>
		<!--{/if}-->
	  <!--{/if}-->

	  </div>
      <div class="bao"> 
	  若此会员有交友动机不纯、故意中伤、侮辱、提供虚假资料、散步广告等恶劣行为。
	  <a href="###" onclick="artbox_complaint('<!--{$home.userid}-->');">请向网站举报</a> </div>
	  
	  <!--{assign var='weibo' value=vo_list("mod={weibo} num={8} where={v.userid='<!--{$home.userid}-->'}")}-->
	  <!--{if !empty($weibo)}-->
      <h2><!--{$home.username}-->心情微播</h2>
      <div class="dongtai">
		<!--{foreach $weibo as $volist}-->
        <div class="dongti"> 
		  <font color='#999999'>更新心情 -- <!--{$volist.addtime|date_format:"%m-%d"}--></font>&nbsp;&nbsp;<a href="<!--{$urlpath}-->usercp.php?c=weibo&uid=<!--{$home.userid}-->" target="_blank">查看&gt;&gt;</a><br>
          <!--{$volist.content|filterhtml:45}-->..
		</div>
		<!--{/foreach}-->
      </div>
	  <!--{/if}-->

      <h2>你可能感兴趣的人</h2>
	  <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->user_80x96.tpl"}-->
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script type='text/javascript'>
$(function(){
	update_hits('<!--{$home.userid}-->', 'home', 'json_hits');
	<!--{if $login.status == '1' && $login.userid != $home.userid}-->
	ajax_visithome('<!--{$home.userid}-->');
	<!--{/if}-->
});
</script>