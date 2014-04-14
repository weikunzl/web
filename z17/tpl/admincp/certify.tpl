<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>证件认证</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
<!--{/if}-->
</head>
<body>
<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{/if}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=certify">证件认证</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=certify" />
	  <div class="item">
	    <label>搜索：</label>
		<select name='stype' id='stype'>
		<option value=''></option>
		<option value='userid'<!--{if $stype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		<option value='username'<!--{if $stype=='username'}--> selected<!--{/if}-->>会员名称</option>
		<option value='email'<!--{if $stype=='email'}--> selected<!--{/if}-->>邮箱</option>
		</select>
		&nbsp;
		<input type="text" id="skeyword" name="skeyword" class="input-150" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;
		<label>状态：</label>
		<select name='sflag' id='sflag'>
		<option value=''>全部</option>
		<option value='pass'<!--{if $sflag=='pass'}--> selected<!--{/if}-->>正常</option>
		<option value='lock'<!--{if $sflag=='lock'}--> selected<!--{/if}-->>锁定</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=certify&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="15%"><div class="th-gap">会员名称</div></th>
		<th width="12%"><div class="th-gap">会员信息</div></th>
		<th width="10%"><div class="th-gap">证件类型</div></th>
		<th width="13%"><div class="th-gap">证件图</div></th>
		<th width="10%"><div class="th-gap">上传时间</div></th>
		<th width="15%"><div class="th-gap">状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $certify as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.certifyid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.certifyid}--></td>
		<td align="left"><a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a> (<!--{$volist.userid}-->)<br /><!--{$volist.email}--></td>
		<td align="left">
		<!--{if $volist.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.ageyear}-->岁 <!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}-->
		</td>
		<td align='center'><!--{$volist.type}--></td>
		<td align="center">
		<a href="<!--{$urlpath}--><!--{$volist.uploadfiles}-->" target="_blank" title="<!--{$volist.type}-->"><img src="<!--{$urlpath}--><!--{$volist.uploadfiles}-->" border="0" width='112' height='135' /></a>
		</td>
		<td align='center'><!--{$volist.timeline|date_format:"%Y/%m/%d"}--><br /><!--{$volist.timeline|date_format:"%H:%M:%S"}--></td>
		<!--{if $volist.flag==0}-->
		<td align="center" title="<!--{$volist.remark}-->">
		<!--{else}-->
		<td align="center">
		<!--{/if}-->
		<!--{if $volist.flag == '1'}-->
		<font color='green'>正常</font>
		<!--{else}-->
		<font color='red'>锁定</font>
		<!--{if !empty($volist.remark)}-->
		<br />
		<font color="#999999"><!--{$volist.remark}--></font>
		<!--{/if}-->
		<!--{/if}-->
		</td>
		<td align="center">

		<!--{if $volist.flag==1}-->
		<!--{else}-->
		<a href="javascript:void(0);" onclick="tbox_certify_edit('证件认证', '<!--{$volist.certifyid}-->')" class="icon-edit">认证处理</a>
		<!--{/if}-->
		&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=certify&a=del&id[]=<!--{$volist.certifyid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="7">
		<input class="button" name="btn_del" type="button" value="批量删除" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
	  </tr>
	  <!--{/if}-->
	</table>
	</form>
	<!--{if $pagecount>1}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><!--{$showpage}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->

<!-- 编辑认证 -->
<!--{if $a eq 'edit'}-->
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=certify&fromtype=jdbox" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name='id' value="<!--{$certify.certifyid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><!--{$certify.userid}--> </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><!--{$certify.email}--></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$certify.username}--></a>
		<!--{if $certify.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$certify.ageyear}-->岁 <!--{area type='text' value=$certify.provinceid}--> <!--{area type='text' value=$certify.cityid}-->
		&nbsp;&nbsp;<!--{$certify.star}-->星
		</td>
	  </tr>
	  <tr>
		<td class='hback_c1'>证件图片 <span class="f_red"></span> </td>
		<td class='hback'>
		<a href="<!--{$urlpath}--><!--{$certify.uploadfiles}-->" target="_blank"><img src="<!--{$urlpath}-->" width='112px' height='135px' border='0' /></a>
		</td>
		<td class='hback_c1'>认证项目<br /><font color='#999999'>(绿色表示已认证)</font></td>
		<td class='hback'>
		<input type='hidden' name='emailrz' id='emailrz' value="<!--{$certify.emailrz}-->" />
		<input type='hidden' name='mobilerz' id='mobilerz' value="<!--{$certify.mobilerz}-->" />

		<input type='checkbox' id='arz' name='arz' value='1'<!--{if $certify.emailrz=='1'}--> checked<!--{/if}--> disabled /><font color="<!--{if $certify.emailrz=='1'}-->green<!--{/if}-->">邮箱认证</font>&nbsp;&nbsp;
		<input type='checkbox' id='mrz' name='mrz' value='1'<!--{if $certify.mobilerz=='1'}--> checked<!--{/if}--> disabled /><font color="<!--{if $certify.mobilerz=='1'}-->green<!--{/if}-->">手机认证</font>&nbsp;&nbsp;<br />

		<input type='checkbox' id='idnumberrz' name='idnumberrz' value='1'<!--{if $certify.idnumberrz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.idnumberrz=='1'}-->green<!--{/if}-->">身份证认证</font>&nbsp;&nbsp;
		<input type='checkbox' id='videorz' name='videorz' value='1'<!--{if $certify.videorz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.videorz=='1'}-->green<!--{/if}-->">视频认证</font>&nbsp;&nbsp;<br />
		<input type='checkbox' id='heightrz' name='heightrz' value='1'<!--{if $certify.heightrz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.heightrz=='1'}-->green<!--{/if}-->">身高认证</font>&nbsp;&nbsp;
		<input type='checkbox' id='marryrz' name='marryrz' value='1'<!--{if $certify.marryrz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.marryrz=='1'}-->green<!--{/if}-->">婚姻认证</font>&nbsp;&nbsp;<br />
		<input type='checkbox' id='incomerz' name='incomerz' value='1'<!--{if $certify.incomerz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.incomerz=='1'}-->green<!--{/if}-->">收入认证</font>&nbsp;&nbsp;
		<input type='checkbox' id='educationrz' name='educationrz' value='1'<!--{if $certify.educationrz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.educationrz=='1'}-->green<!--{/if}-->">学历认证&nbsp;&nbsp;<br />
		<input type='checkbox' id='houserz' name='houserz' value='1'<!--{if $certify.houserz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.houserz=='1'}-->green<!--{/if}-->">房产认证</font>&nbsp;&nbsp;
		<input type='checkbox' id='carrz' name='carrz' value='1'<!--{if $certify.carrz=='1'}--> checked<!--{/if}--> /><font color="<!--{if $certify.carrz=='1'}-->green<!--{/if}-->">汽车认证</font>&nbsp;&nbsp;
		</td>
	  </tr>
	  <tr>
		<td class='hback_c1'>审核状态 <span class="f_red"></span> </td>
		<td class='hback' colspan='3'><input type='radio' name='flag' id='flag' value='1'<!--{if $certify.flag=='1'}--> checked<!--{/if}--> />通过，<input type='radio' name='flag' id='flag' value='0'<!--{if $certify.flag=='0'}--> checked<!--{/if}--> />锁定 <span id='dflag' class='f_red'></span> </td>
	  </tr>
	  <tr>
	    <td class='hback_c1'>锁定说明 </td>
		<td class='hback' colspan='3'>
		<textarea name='remark' id='remark' style='width:60%;height:85px;overflow:auto;'><!--{$certify.remark}--></textarea>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="4" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->


<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
<!--{/if}-->

</body>
</html>