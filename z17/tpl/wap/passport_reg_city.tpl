<!--{include file="<!--{$waptpl}-->block_headinc.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_logo.tpl"}-->
<!--{include file="<!--{$waptpl}-->block_menu.tpl"}-->
<div class="index_p"> 欢迎注册[<!--{$config.sitename}-->]会员</div>
<h3 class="slide_bg_d">您所在的一级地区为：<!--{area type='text' value=$args.provinceid}--></h3>
<form  action="<!--{$wapfile}-->?c=passport"  method="post" style="margin:0px;">
<input type='hidden' name='a' value='regpost' />
<input type="hidden" name="username" value="<!--{$args.username}-->" />
<input type="hidden" name="password" value="<!--{$args.password}-->" />
<input type="hidden" name="email" value="<!--{$args.email}-->" />
<input type="hidden" name="gender" value="<!--{$args.gender}-->" />
<input type="hidden" name="ageyear" value="<!--{$args.ageyear}-->" />
<input type="hidden" name="agemonth" value="<!--{$args.agemonth}-->" />
<input type="hidden" name="ageday" value="<!--{$args.ageday}-->" />
<input type="hidden" name="marrystatus" value="<!--{$args.marrystatus}-->" />
<input type="hidden" name="education" value="<!--{$args.education}-->" />
<input type="hidden" name="height" value="<!--{$args.height}-->" />
<input type="hidden" name="provinceid" value="<!--{$args.provinceid}-->" />
<input type="hidden" name="lovesort" value="<!--{$args.lovesort}-->" />
<input type="hidden" name="salary" value="<!--{$args.salary}-->" />
<input type="hidden" name="weight" value="<!--{$args.weight}-->" />
<input type="hidden" name="mobile" value="<!--{$args.mobile}-->" />
<input type="hidden" name="qq" value="<!--{$args.qq}-->" />
<input type="hidden" name="idnumber" value="<!--{$args.idnumber}-->" />
<table>
  <tr>
    <td>请选择您所在的二级地区</td>
  </tr>
  <tr>
    <td>
	<!--{area type='dist2' cname='cityid' text='=请选择=' pvalue=$args.provinceid}-->
	</td>
  </tr>
</table>
<input class="submit_b"  type="submit" value="确认注册" />
</form>
<div class="slide_bg_l pl_5"><a href="<!--{$wapfile}-->?c=passport&a=reg">返回上一页重填资料</a></div>
<!--{include file="<!--{$waptpl}-->block_bottom.tpl"}-->
</body>
</html>
