<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_cpmenu.tpl"}-->
<h3 class="slide_bg_d">【固定资料】</h3>
<div class="index_p">
  <div>
    昵称：<!--{$login.info.username}--><br />
    性别：<!--{if $login.info.gender=='1'}-->男<!--{else}-->女<!--{/if}--><br />
    身高：<!--{$login.info.height}-->厘米<br />
    生日：<!--{$login.info.birthday}--><br />
    星座：<!--{$login.info.astro}--><br />
    生肖：<!--{$login.info.lunar}--><br />
    学历：<!--{hook mod='var' item='education' type='text' value=$login.info.education}--><br />
    婚姻状况：<!--{hook mod='var' item='marrystatus' type='text' value=$login.info.marrystatus}--><br />
  </div>
</div>
<form action="<!--{$wapfile}-->?c=cp_info" method="post">
<input type="hidden" name="a" value="savebase" />
<h3 class="slide_bg_d">【基本资料】</h3>
<div class="index_p">
  <div>

    <table cellpadding='3' cellspacing='3' border='0'>
	  <tr>
	    <td>血 型：</td>
		<td><!--{hook mod='var' type='select' item='blood' name='blood' text='=请选择=' value=$login.info.blood}--></td>
	  </tr>
	  <tr>
	    <td>有无子女：</td>
		<td><!--{hook mod='var' type='select' item='childrenstatus' name='childrenstatus' text='=请选择=' value=$login.info.childrenstatus}--> </td>
	  </tr>
	  <tr>
	    <td>国 籍：</td>
		<td><!--{hook mod='var' type='select' item='nationality' name='nationality' text='=请选择=' value=$login.info.nationality}--> </td>
	  </tr>
	  <tr>
	    <td>交友类别：</td>
		<td><!--{hook mod='lovesort' type='select' name='lovesort' text='=请选择=' value=$login.info.lovesort}-->  </td>
	  </tr>
	  <tr>
	    <td>个 性：</td>
		<td><!--{hook mod='var' type='select' item='personality' name='personality' text='=请选择=' value=$login.info.personality}--> </td>
	  </tr>
	  <tr>
	    <td>民 族：</td>
		<td><!--{hook mod='var' type='select' item='national' name='national' text='=请选择=' value=$login.info.national}--> </td>
	  </tr>
	  <tr>
	    <td>所在行业：</td>
		<td><!--{hook mod='var' type='select' item='jobs' name='jobs' text='=请选择=' value=$login.info.jobs}--> </td>
	  </tr>
	  <tr>
	    <td>月薪收入：</td>
		<td><!--{hook mod='var' type='select' item='salary' name='salary' text='=请选择=' value=$login.info.salary}--> </td>
	  </tr>
	  <tr>
	    <td>住房情况：</td>
		<td><!--{hook mod='var' type='select' item='housing' name='housing' text='=请选择=' value=$login.info.housing}--> </td>
	  </tr>
	  <tr>
	    <td>购车情况：</td>
		<td><!--{hook mod='var' type='select' item='caring' name='caring' text='=请选择=' value=$login.info.caring}--> </td>
	  </tr>
	</table>

  </div>
</div>
<h3 class="slide_bg_d">【外貌体型】</h3>
<div class="index_p">
  <div>

    <table cellpadding='3' cellspacing='3' border='0'>
	  <tr>
	    <td>体 重：</td>
		<td><!--{hook mod='weight' name='weight' value=$login.info.weight}--> 公斤</td>
	  </tr>
	  <tr>
	    <td>外貌自评：</td>
		<td><!--{hook mod='var' type='select' item='profile' name='profile' text='=请选择=' value=$login.info.profile}--> </td>
	  </tr>
	  <tr>
	    <td>魅力部位：</td>
		<td><!--{hook mod='var' type='select' item='charmparts' name='charmparts' text='=请选择=' value=$login.info.charmparts}--> </td>
	  </tr>
	  <tr>
	    <td>发 型：</td>
		<td><!--{hook mod='var' type='select' item='hairstyle' name='hairstyle' text='=请选择=' value=$login.info.hairstyle}-->  </td>
	  </tr>
	  <tr>
	    <td>发 色：</td>
		<td><!--{hook mod='var' type='select' item='haircolor' name='haircolor' text='=请选择=' value=$login.info.haircolor}--></td>
	  </tr>
	  <tr>
	    <td>脸 型：</td>
		<td><!--{hook mod='var' type='select' item='facestyle' name='facestyle' text='=请选择=' value=$login.info.facestyle}--> </td>
	  </tr>
	  <tr>
	    <td>体 型：</td>
		<td><!--{hook mod='var' type='select' item='bodystyle' name='bodystyle' text='=请选择=' value=$login.info.bodystyle}--></td>
	  </tr>
	  <tr>
	    <td colspan="2"><input type="submit" name="btn_save" value="编辑保存" class="submit_b"></td>
	  </tr>
	</table>
  </div>
</div>
</form>


<p class="slide_bg_l pl_5">
当前位置：<br />
<a href="<!--{$wapfile}-->">首页</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info">用户资料</a> &gt;&gt; <a href="<!--{$wapfile}-->?c=cp_info&a=base">基本资料</a> 
</p>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>