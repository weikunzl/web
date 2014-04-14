<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="index_p">
  <h3 class="slide_bg_d pl_5"> <!--{$home.username}--> <!--{$home.levelimg}--> </h3>
  <!--{avatar width='72' height='90' value=$home.avatarurl}--> 
  <br />
  <a href="<!--{$wapfile}-->?c=home&a=album&uid=<!--{$home.userid}-->">浏览<!--{if $home.gender==1}-->他<!--{else}-->她<!--{/if}-->更多照片(<!--{count mod='user' type='album' value=$home.userid}-->张)</a> 
  <br />
  
  <!--{$home.age}-->岁，<!--{if $home.gender == 1}-->男<!--{else}-->女<!--{/if}-->，<!--{$home.height}-->CM，<!--{$home.astro}-->，
  <!--{hook mod='var' item='marrystatus' type='text' value=$home.marrystatus}-->
  <br />
  地区：<!--{area type='text' value=$home.provinceid}--> <!--{area type='text' value=$home.cityid}--><br />
  籍贯：<!--{if $home.nationprovinceid == 0}--><font color="gray">未透露</font><!--{else}--><!--{hometown type='text' value=$home.nationprovinceid}--> <!--{hometown type='text' value=$home.nationcityid}--><!--{/if}--><br />
  月薪：<!--{hook mod='var' item='salary' type='text' value=$home.salary}--><br />
  学历：<!--{if $home.education==0}--><font class='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='education' type='text' value=$home.education}--><!--{/if}--><br />
  <p> 
  {<a href="<!--{$wapfile}-->?c=cp_do&a=hi&touid=<!--{$home.userid}-->">打招呼</a>&nbsp;|&nbsp;
  <a href="<!--{$wapfile}-->?c=cp_do&a=writemsg&touid=<!--{$home.userid}-->">写信件</a>&nbsp;|&nbsp;
  <a href="<!--{$wapfile}-->?c=cp_do&a=listen&touid=<!--{$home.userid}-->">关注<!--{if $home.gender==1}-->他<!--{else}-->她<!--{/if}--></a>}
  <br />
  </p>
  <!--{if $previousid>0}-->
  <a href="<!--{$wapfile}-->?c=home&uid=<!--{$previousid}-->">下一个您感兴趣的人</a>
  <!--{/if}-->

  <h3 class="slide_bg_d">【内心读白】</h3>
  <!--{$home.monolog|nl2br}--><br />

  
  <h3 class="slide_bg_d">【择友要求】</h3>
  性&#12288;&#12288;别： <!--{if $cond.gender==1}-->男<!--{else if $cond.gender==2}-->女<!--{else}--><font color='gray'>不限</font><!--{/if}--><br />
  照片要求：<!--{if $cond.avatar==1}-->有照片<!--{else}--><font color='gray'>不限</font><!--{/if}--><br />
  年龄范围：<!--{if $cond.startage==0}--><font color='gray'>不限</font><!--{else}--><!--{$cond.startage}-->~<!--{$cond.endage}-->岁<!--{/if}--><br />
  身高范围：<!--{if $cond.startheight==0}--><font color='gray'>不限</font><!--{else}--><!--{$cond.startheight}-->~<!--{$cond.endheight}-->CM<!--{/if}--><br />
  交友类型：<!--{if empty($cond.lovesort)}--><font color='gray'>不限</font><!--{else}--><!--{hook mod='lovesort' type='multi' value=$cond.lovesort}--><!--{/if}--><br />
  婚史状况：<!--{if empty($cond.marry)}--><font color='gray'>不限</font><!--{else}--><!--{hook mod='var' type='multi' item='marrystatus' value=$cond.marry}--><!--{/if}--><br />
  学历要求：<!--{if $cond.startedu == 0}--><font color='gray'>不限</font><!--{else}--><!--{area type='text' value=$home.startedu}-->~<!--{area type='text' value=$home.endedu}--><!--{/if}--> <br />
  所在地区：
	<!--{assign var='i' value=false}-->
	<!--{foreach $cond.bulidarea as $volist}-->
	<!--{if $volist.city>0}-->
	<!--{assign var='i' value=true}-->
	<!--{area type='text' value=$volist.province}--> <!--{area type='text' value=$volist.city}--><br />
	<!--{/if}-->
	<!--{/foreach}-->
	<!--{if false === $i}-->
	<font color='gray'>不限</font>
	<!--{/if}-->
  <br />

  <h3 class="slide_bg_d">【性格相貌】</h3>
  个性描述：<!--{if $home.personality==0}--><font color="gray">未透露</font><!--{else}--><!--{hook mod='var' item='personality' type='text' value=$home.personality}--><!--{/if}--><br />
  相貌自评：<!--{if $home.profile==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='profile' type='text' value=$home.profile}--><!--{/if}--><br />
  体&#12288;&#12288;重：<!--{if $home.weight==0}--><font color='gray'>未透露</font><!--{else}--><!--{$home.weight}--> (KG)<!--{/if}--> <br />
  体&#12288;&#12288;型：<!--{if $home.bodystyle==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='bodystyle' type='text' value=$home.bodystyle}--><!--{/if}--><br />
  魅力部位：<!--{if $home.charmparts==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='charmparts' type='text' value=$home.charmparts}--><!--{/if}--><br />
  发&#12288;&#12288;型：<!--{if $home.hairstyle==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='hairstyle' type='text' value=$home.hairstyle}--><!--{/if}--><br />
  发&#12288;&#12288;色：<!--{if $home.haircolor==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='haircolor' type='text' value=$home.haircolor}--><!--{/if}--><br />
  脸&#12288;&#12288;型：<!--{if $home.facestyle==0}--><font color='gray'>未透露</font><!--{else}--><!--{hook mod='var' item='facestyle' type='text' value=$home.facestyle}--><!--{/if}--><br />
  <a href="<!--{$wapfile}-->?c=home&type=profile&uid=<!--{$uid}-->">更多<!--{if $home.gender==1}-->他<!--{else}-->她<!--{/if}-->的资料</a> <br />
  上次登录：
    [
	<!--{if $login.status==0}-->
	<a href="<!--{$wapfile}-->?c=passport&a=login">登录可见</a>
	<!--{else}-->
		<!--{if $login.userid == $home.userid}-->
			<!--{$home.logintime|date_format:"%Y-%m-%d"}-->
		<!--{else}-->
			<!--{if $login.group.view.viewlogintime == 1}-->
			<!--{$home.logintime|date_format:"%Y-%m-%d"}-->
			<!--{else}-->
			<a href="<!--{$wapfile}-->?c=cp_vip">VIP会员可见</a>
			<!--{/if}-->
		<!--{/if}-->
	<!--{/if}-->
    ]
  <br />

</div>
<p class="slide_bg_l pl_5"> 
  当前位置：<br />
  <a href="<!--{$wapfile}-->">首 页</a> &gt;&gt; 
  查看[<!--{$home.username}-->]主页
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>