<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<h3 class="slide_bg_d pl_5"><!--{$home.username}-->【详细资料】</h3>
<div class="index_p">
  <!--{avatar width='72' height='90' value=$home.avatarurl}--> 
  <br />
  <div>
    生　　肖：<!--{$home.lunar}--> <br />
    血　　型：<!--{if $home.blood==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='blood' value=$home.blood}--><!--{/if}--> <br />
    民　　族：<!--{if $home.national==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='national' value=$home.national}--><!--{/if}--><br />
    有无子女：<!--{if $home.childrenstatus==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='childrenstatus' value=$home.childrenstatus}--><!--{/if}--> <br />
    购车情况：<!--{if $home.caring==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' type='text' item='caring' value=$home.caring}--><!--{/if}--> <br />
    住房情况：<!--{if $home.housing==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='housing' type='text' value=$home.housing}--><!--{/if}--> <br />
  </div>
</div>

<h3 class="slide_bg_d">【工作与学习】</h3>
<div class="index_p">
  <div> 
  公司类型：<!--{if $home.companytype==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='companytype' type='text' value=$home.companytype}--><!--{/if}--><br />
  收入描述：<!--{if $home.income==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='income' type='text' value=$home.income}--><!--{/if}--><br />
  工作状况：<!--{if $home.workstatus==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='workstatus' type='text' value=$home.workstatus}--><!--{/if}--><br />
  公司名称：<!--{if $home.companyname==''}--><font color='gray'>未透露</font><!--{else}--><!--{$home.companyname}--><!--{/if}--><br />
  教育程度：<!--{if $home.education==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='education' type='text' value=$home.education}--><!--{/if}--><br />
  所学专业：<!--{if $home.specialty==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='specialty' type='text' value=$home.specialty}--><!--{/if}--><br />
  语言能力：<!--{if $home.language==''}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='language' type='multi' value=$home.language}--><!--{/if}--><br />
  </div>
</div>

<h3 class="slide_bg_d">【生活描述】</h3>
<div class="index_p">
  <div> 
  家中排行：<!--{if $home.tophome==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='tophome' type='text' value=$home.tophome}--><!--{/if}--><br />
  最大消费：<!--{if $home.consume==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='consume' type='text' value=$home.consume}--><!--{/if}--><br />
  是否吸烟：<!--{if $home.smoking==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='smoking' type='text' value=$home.smoking}--><!--{/if}--><br />
  是否喝酒：<!--{if $home.drinking==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='drinking' type='text' value=$home.drinking}--><!--{/if}--><br />
  宗教信仰：<!--{if $home.faith==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='faith' type='text' value=$home.faith}--><!--{/if}--><br />
  锻炼习惯：<!--{if $home.workout==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='workout' type='text' value=$home.workout}--><!--{/if}--><br />
  作息习惯：<!--{if $home.rest==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='rest' type='text' value=$home.rest}--><!--{/if}--><br />
  是否要孩子：<!--{if $home.havechildren==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='havechildren' type='text' value=$home.havechildren}--><!--{/if}--><br />
  愿意与对方父母同住：<!--{if $home.talive==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='talive' type='text' value=$home.talive}--><!--{/if}--><br />
  喜欢制造浪漫：<!--{if $home.romantic==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='romantic' type='text' value=$home.romantic}--><!--{/if}--><br />
  擅长生活技能：<!--{if $home.lifeskill==''}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='lifeskill' type='multi' value=$home.lifeskill}--><!--{/if}--><br />
  </div>
</div>

<h3 class="slide_bg_d">【兴趣爱好】</h3>
<div class="index_p">
  <div> 
    喜欢的运动：<!--{if $home.sports==''}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='sports' type='multi' value=$home.sports}--><!--{/if}--> <br />
    喜欢的食物：<!--{if empty($home.food)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='food' type='multi' value=$home.food}--><!--{/if}--> <br />
    喜欢的书籍：<!--{if empty($home.book)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='book' type='multi' value=$home.book}--><!--{/if}--><br />
    喜欢的电影：<!--{if empty($home.film)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='film' type='multi' value=$home.film}--><!--{/if}--> <br />
    业 余 爱 好：<!--{if empty($home.interest)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='interest' type='multi' value=$home.interest}--><!--{/if}--> <br />
    喜欢的旅游去处：<!--{if empty($home.travel)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='travel' type='multi' value=$home.travel}--><!--{/if}--> <br />
    关注的节目：<!--{if empty($home.attention)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='attention' type='multi' value=$home.attention}--><!--{/if}--> <br />
    娱 乐 休 闲：<!--{if empty($home.leisure)}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='leisure' type='multi' value=$home.leisure}--><!--{/if}--> <br />
  </div>
</div>
<h3 class="slide_bg_d">【选择操作】</h3>
<div class="index_p">
  <div> 
    <a href="<!--{$wapfile}-->?c=home&a=album&uid=<!--{$home.userid}-->">浏览<!--{if $home.gender==1}-->他<!--{else}-->她<!--{/if}-->相片(<!--{count mod='user' type='album' value=$home.userid}-->张)</a> <a href="<!--{$wapfile}-->?c=home&uid=<!--{$home.userid}-->">返回基本资料页</a>
	<br />
    <p>   
	{<a href="<!--{$wapfile}-->?c=cp_do&a=hi&touid=<!--{$home.userid}-->">打招呼</a>&nbsp;|&nbsp;
    <a href="<!--{$wapfile}-->?c=cp_do&a=writemsg&touid=<!--{$home.userid}-->">写信件</a>&nbsp;|&nbsp;
    <a href="<!--{$wapfile}-->?c=cp_do&a=listen&touid=<!--{$home.userid}-->">关注<!--{if $home.gender==1}-->他<!--{else}-->她<!--{/if}--></a>}
	<br />
    </p>
  </div>
</div>
<p class="slide_bg_l pl_5"> 
  当前位置：<br />
  <a href="<!--{$wapfile}-->">首 页</a> &gt;&gt; 
  查看[<!--{$home.username}-->]详细资料
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>