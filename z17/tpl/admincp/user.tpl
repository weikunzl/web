<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>会员管理</title>
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
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=user">会员列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=user&a=add" class="btn-general"><span>添加会员</span></a>会员列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=user" />
	  <div class="item">  
		<label>搜索</label>
		<select name="stype" id="stype">
		<option value=''></option>
		<option value='userid'<!--{if $stype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		<option value='username'<!--{if $stype=='username'}--> selected<!--{/if}-->>会员名</option>
		<option value='email'<!--{if $stype=='email'}--> selected<!--{/if}-->>邮箱</option>
		</select>
		<input type="text" id="skeyword" name="skeyword" class="input-150" value="<!--{$skeyword}-->" /> （选择此项查询，以下查询条件无效）&nbsp;&nbsp;
		<label>显示头像</label><input type="checkbox" name="showavatar" id="showavatar" value="1"<!--{if $showavatar=='1'}--> checked<!--{/if}--> />&nbsp;&nbsp;
		<br />

		<label>性别</label><select name="sgender" id="sgender">
		<option value=""></option>
		<option value="1"<!--{if $sgender=='1'}--> selected<!--{/if}-->>男</option>
		<option value="2"<!--{if $sgender=='2'}--> selected<!--{/if}-->>女</option>
		</select>&nbsp;&nbsp;
		<label>所在地区&nbsp;</label>
		<!--{area type='dist1' name='sdist1' value=$sdist1 ajax='1' cname='sdist2' cajax='0' text='=不限='}-->&nbsp;<span id='dsdist1' class='f_red'></span>&nbsp;&nbsp;
		<span id="json_sdist2">
        <!--{if $sdist1>0}-->
		<!--{area type='dist2' pvalue=$sdist1 cname='sdist2' cvalue=$sdist2 text='=不限='}-->
		<!--{/if}-->
		</span>&nbsp;&nbsp;
		<label>会员组</label><!--{hook mod='usergroup' type='select' name='sgroupid' text='不限' value=$sgroupid}-->&nbsp;&nbsp;
		形象照</label>
		<select name="savatar" id="savatar">
		<option value=""></option>
		<option value="1"<!--{if $savatar=='1'}--> selected<!--{/if}-->>有</option>
		<option value="2"<!--{if $savatar=='2'}--> selected<!--{/if}-->>无</option>
		</select>&nbsp;&nbsp;
		<label>交友类型</label><!--{hook mod='lovesort' type='select' name='lovesort' text='不限' value=$slovesort}-->&nbsp;&nbsp;
		<label>婚史</label>
		<!--{hook mod='var' item='marrystatus' name='smarry' type='select' text='=不限=' value=$smarry}-->
		<br />

		<label>注册日期</label><input type="text" name="sdate" id="sdate" value="<!--{$sdate}-->"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<!--{$edate}-->"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;&nbsp;
		<label>年龄</label>
		<!--{hook mod='age' name='sage' text='不限' value=$sage}-->~<!--{hook mod='age' name='eage' text='不限' value=$eage}-->岁
		&nbsp;&nbsp;
		<label>身高</label>
		<!--{hook mod='height' name='sheight' text='不限' value=$sheight}-->~<!--{hook mod='height' name='eheight' text='不限' value=$eheight}-->CM
		<br />
		<label>月薪</label>
		<!--{hook mod='var' item='salary' name='ssalary' type='select' text='不限' value=$ssalary}-->~<!--{hook mod='var' item='salary' name='esalary' type='select' text='不限' value=$esalary}-->元
		&nbsp;&nbsp; 
		<label>学历</label>
		<!--{hook mod='var' item='education' name='sedu' type='select' text='不限' value=$sedu}-->~<!--{hook mod='var' item='education' name='eedu' type='select' text='不限' value=$eedu}-->
		&nbsp;&nbsp;
		<br />
		<label>状态</label>
		<select name="sflag">
		<option value=''></option>
		<option value='1'<!--{if $sflag=='1'}--> selected<!--{/if}-->>正常</option>
		<option value='2'<!--{if $sflag=='2'}--> selected<!--{/if}-->>锁定</option>
		</select>&nbsp;&nbsp;
		
		<label>推荐</label>
		<select name="selite">
		<option value=''></option>
		<option value='1'<!--{if $selite=='1'}--> selected<!--{/if}-->>是</option>
		<option value='2'<!--{if $selite=='2'}--> selected<!--{/if}-->>否</option>
		</select>&nbsp;&nbsp;
		<label>猎婚</label>
		<select name="sliehun">
		<option value=''></option>
		<option value='1'<!--{if $sliehun=='1'}--> selected<!--{/if}-->>是</option>
		<option value='2'<!--{if $sliehun=='2'}--> selected<!--{/if}-->>否</option>
		</select>&nbsp;&nbsp;
		
	    <label>结果排序&nbsp;</label>
	    <select name="sorderby" id="sorderby">
	    <option value=""></option>
	    <option value="reg"<!--{if $sorderby=='reg'}--> selected<!--{/if}-->>注册时间</option>
	    <option value="login"<!--{if $sorderby=='login'}--> selected<!--{/if}-->>登录时间</option>
	    <option value="group"<!--{if $sorderby=='group'}--> selected<!--{/if}-->>会员组</option>
	    </select> 
	    &nbsp;&nbsp;
	    <select name="sorders" id="sorders">
	    <option value=""></option>
	    <option value="asc"<!--{if $sorders=='asc'}--> selected<!--{/if}-->>递增</option>
	    <option value="desc"<!--{if $sorders=='desc'}--> selected<!--{/if}-->>递减</option>
	    </select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value=" 搜 索 " />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=user&a=del&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="10%"><div class="th-gap">用户名</div></th>
		<th width="13%"><div class="th-gap">邮箱</div></th>
		<th width="15%"><div class="th-gap">会员信息</div></th>
		<th width="6%"><div class="th-gap">现金</div></th>
		<th width="6%"><div class="th-gap">积分</div></th>
		<th width="6%"><div class="th-gap">短信</div></th>
		<th width="5%"><div class="th-gap">状态</div></th>
		<th width="5%"><div class="th-gap">推荐</div></th>
		<th width="5%"><div class="th-gap">猎婚</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $user as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.userid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.userid}--></td>
		<td align="left"><!--{$volist.levelimg}--> <a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a>
		<!--{if $volist.flag=='1'}-->
		<font color="green"><b>√</b></font>
		<!--{else}-->
		<font color="red"><b>×</b></font>
		<!--{/if}-->

		<!--{if $showavatar == 1}-->
		<br />
		<!--{avatar width='60' height='71' value=$volist.avatarurl}-->
		<!--{/if}-->
		</td>
		<td align="left"><!--{$volist.email}--></td>
		<td title="注册时间：<!--{$volist.regtime|date_format:"%Y/%m/%d %M:%H:%S"}-->">
		<!--{if $volist.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.ageyear}-->岁 
		<!--{hook mod='var' type='text' item='marrystatus' value=$volist.marrystatus}-->
		<!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}-->
		</td>
		<td align="center"><!--{$volist.money}--></td>
		<td align="center"><!--{$volist.points}--></td>
		<td align="center"><!--{$volist.mbsms}--></td>

		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.userid}-->" value="flagopen" />
			<img id="flag<!--{$volist.userid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.userid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.userid}-->" value="flagclose" />
			<img id="flag<!--{$volist.userid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.userid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td align="center">
		<!--{if $volist.elite==0}-->
			<input type="hidden" id="attr_elite<!--{$volist.userid}-->" value="eliteopen" />
			<img id="elite<!--{$volist.userid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.userid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_elite<!--{$volist.userid}-->" value="eliteclose" />
			<img id="elite<!--{$volist.userid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.userid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td align="center">
		<!--{if $volist.liehun==0}-->
			<input type="hidden" id="attr_liehun<!--{$volist.userid}-->" value="liehunopen" />
			<img id="liehun<!--{$volist.userid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('liehun','<!--{$volist.userid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_liehun<!--{$volist.userid}-->" value="liehunclose" />
			<img id="liehun<!--{$volist.userid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('liehun','<!--{$volist.userid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
        </td>
		<td align="center">
		<a href="javascript:void(0);" onclick="tbox_addmoney('添加会员帐号现金(元)', '<!--{$volist.userid}-->');" class="icon-add">现金</a>
		<a href="javascript:void(0);" onclick="tbox_addpoints('添加会员积分', '<!--{$volist.userid}-->');" class="icon-add">积分</a>
		<a href="<!--{$cpfile}-->?c=user&a=edit&id=<!--{$volist.userid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-edit">管理</a>
		<a href="<!--{$cpfile}-->?c=user&a=del&id[]=<!--{$volist.userid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复。')){return true;} return false;}" class="icon-del">删除</a>
		<a href="<!--{$cpfile}-->?c=user&a=login&id=<!--{$volist.userid}-->" class="icon-set" target="_blank">登录</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="11" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="10"><input class="button" name="btn_del" type="button" value="批量删除" onClick="{if(confirm('确定要删除吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
	  </tr>
	  <!--{/if}-->
	</table>
	</form>
	<!--{if $pagecount>0}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><!--{$showpage}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->


<!--{if $a eq "penymonolog"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=user&a=penymonolog">审核内心独白</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=user&a=penymonolog" class="btn-general"><span>审核内心独白</span></a>会员管理 -- 内心独白 </h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=user&a=penymonolog" />
	  <div class="item">  
		<label>搜索</label>
		<select name='stype' id='stype'>
		<option value=''>选择类型</option>
		<option value='userid'<!--{if $stype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		</select>
		&nbsp;
		<input type="text" id="skeyword" name="skeyword" class="input-200" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;
		状态：
		<select name="sflag" id="sflag">
		<option value="0">全部</option>
		<option value="1"<!--{if $sflag == '1'}--> selected<!--{/if}-->>待审核</option>
		<option value="2"<!--{if $sflag == '2'}--> selected<!--{/if}-->>未通过</option>
		<option value="3"<!--{if $sflag == '3'}--> selected<!--{/if}-->>已通过</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value=" 搜 索 " />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=user&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
	<input type='hidden' name='a' id='a' value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="7%"><div class="th-gap">选择</div></th>
	    <th width="10%"><div class="th-gap">用户ID</div></th>
		<th width="12%"><div class="th-gap">用户名</div></th>
		<th width="6%"><div class="th-gap">状态</div></th>
		<th width="10%"><div class="th-gap">最后更新</div></th>
		<th><div class="th-gap">内心独白</div></th>
		<th width='10%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $user as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.userid}-->" onClick="checkItem(this, 'chkAll')"></td>
	    <td align="left"><!--{$volist.userid}--></td>
		<td align="left"><a href="###" onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a></td>
		<td align="center">
		<!--{if $volist.molstatus == '-2'}-->
		<font color="gray">待审核</font>
		<!--{elseif $volist.molstatus == '-1'}-->
		<font color="red">未通过</font>
		<!--{elseif $volist.molstatus == '1'}-->
		<font color="green">已通过</font>
		<!--{else}-->
		~~
		<!--{/if}-->
		</td>
		<td align="center" title="<!--{$volist.moluptime|date_format:"%H:%M:%S"}-->"><!--{$volist.moluptime|date_format:"%Y-%m-%d"}--></td>
		<td><!--{$volist.monolog}--></td>
		<td align="center"><a href='###' onclick="tbox_monolog('审核/编辑内心独白', '<!--{$volist.userid}-->');">审核/编辑</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">对不起，没有你要找的信息。</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
		批量处理：
		<input class="button" name="btn_pass" type="button" value="通过" onClick="$('#a').val('passmonolog');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_unpass" type="button" value="未通过" onClick="$('#a').val('unpassmonolog');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#a').val('delmonolog');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
	  </tr>
	  <!--{/if}-->
	</table>
	</form>
	<!--{if $pagecount>0}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><!--{$showpage}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->

<!--{if $a eq "penyavatar"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=user&a=penyavatar">审核头像</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=user&a=penyavatar" class="btn-general"><span>审核头像</span></a>
	会员管理-审核头像
	</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=user&a=penyavatar" />
	  <div class="item">  
		<label>搜索</label>
		<select name='stype' id='stype'>
		<option value=''>选择类型</option>
		<option value='userid'<!--{if $stype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="text" id="skeyword" name="skeyword" class="input-200" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;&nbsp;
		状态：
		<select name="sflag" id="sflag">
		<option value="0">全部</option>
		<option value="1"<!--{if $sflag == '1'}--> selected<!--{/if}-->>待审核</option>
		<option value="2"<!--{if $sflag == '2'}--> selected<!--{/if}-->>未通过</option>
		<option value="3"<!--{if $sflag == '3'}--> selected<!--{/if}-->>已通过</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value=" 搜 索 " />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=user&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
	<input type='hidden' name='a' id='a' value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择</div></th>
	    <th width="12%"><div class="th-gap">会员ID</div></th>
		<th width="15%"><div class="th-gap">用户名</div></th>
		<th width="15%"><div class="th-gap">头像</div></th>
		<th width='10%'><div class="th-gap">头像状态</div></th>
		<th width='15%'><div class="th-gap">最后更新</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $user as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align='center'><input name="id[]" type="checkbox" value="<!--{$volist.userid}-->" onClick="checkItem(this, 'chkAll')"></td>
	    <td align="left"><!--{$volist.userid}--></td>
		<td align="left"><a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a></td>
		<td align='center'><img src="<!--{$urlpath}--><!--{$volist.avatar}-->" width='75px' height='92px' /></td>
		<td align='center'>
		<!--{if $volist.avatarflag == '-2'}-->
		<font color="gray">待审核</font>
		<!--{elseif $volist.avatarflag == '-1'}-->
		<font color="red">未通过</font>
		<!--{elseif $volist.avatarflag == '1'}-->
		<font color="green">已通过</font>
		<!--{else}-->
		~~
		<!--{/if}-->
		</td>
		<!--{if $volist.avatartime > 0}-->
		<td align='center'><!--{$volist.avatartime|date_format:"%Y-%m-%d"}--><br /><!--{$volist.avatartime|date_format:"%H:%M:%S"}--></td>
		<!--{else}-->
		<td align='center'>~~</td>
		<!--{/if}-->
		<td align="center">
		<a href="<!--{$cpfile}-->?c=user&a=passavatar&id[]=<!--{$volist.userid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-set">通过</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=user&a=unpassavatar&id[]=<!--{$volist.userid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-edit">未通过</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=user&a=delavatar&id[]=<!--{$volist.userid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">对不起，没要审核的会员头像。</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
		批量处理：
		<input class="button" name="btn_pass" type="button" value="通过" onClick="$('#a').val('passavatar');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_unpass" type="button" value="未通过" onClick="$('#a').val('unpassavatar');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#a').val('delavatar');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
	  </tr>
	  <!--{/if}-->
	</table>
	</form>
	<!--{if $pagecount>0}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><!--{$showpage}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->


<!-- 添加会员 -->
<!--{if $a eq "add"}-->
<style type="text/css">
.nTab{width: 98%;height: auto;margin: 20px auto;border: 1px solid #dbe2e7;overflow: hidden;}
.none{display: none;}
.nTab .TabTitle li{float: left;cursor: pointer;height:28px;line-height:28px;text-align: center;width: 100px;}
.nTab .TabTitle li a{text-decoration: none;}
.nTab .TabTitle .active{background: #e5ecf0;font-size:13px;font-weight: bold;}
.nTab .TabTitle .normal{color: #336699;}
.nTab .TabContent{clear: both;overflow: hidden;background: #fff;padding: 5px;display: block;height: auto;}
</style>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=user&a=add">添加会员</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=user" class="btn-general"><span>返回列表</span></a>添加会员</h3>
	<form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&a=saveadd" onsubmit='return checkadd();' />
	<div class="nTab">
	  <div class="TabTitle">
	    <ul id="myTab">
		  <li class="active" id='li_0' onclick="nTabs(this,0);">基本信息</li>
		  <li class="normal" id='li_1' onclick="nTabs(this,1);">外貌体型</li>
		  <li class="normal" id='li_2' onclick="nTabs(this,2);">工作学习</li>
		  <li class="normal" id='li_3' onclick="nTabs(this,3);">生活描述</li>
		  <li class="normal" id='li_4' onclick="nTabs(this,4);">兴趣爱好</li>
		  <li class="normal" id='li_5' onclick="nTabs(this,5);">联系资料</li>
		</ul>
	  </div>

	  <div class="TabContent">
	    
		<!-- 基本信息 -->
		<div id="myTab_Content0" class="">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>基本信息</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>登录邮箱 <span class='f_red'>*</span></td>
				<td class='hback' width='35%'><input type="text" name="email" id="email" class="input-150" onblur="ajax_email('email','tip_email');" /> <span id="tip_email"></span> <span id='demail' class='f_red'></span></td>
				<td class='hback_1' width='15%'>用 户 名 <span class='f_red'>*</span></td>
				<td class='hback' width='35%'><input type="text" name="username" id="username" class="input-100" onblur="ajax_user('username','tip_username');" /> <span id="tip_username"></span> <span id='dusername' class='f_red'></span> <font color='#999999'>(3-16个字符,汉字,数字,字母,下横线组成)</font></td>
			  </tr>
			  <tr>
			    <td class='hback_1'>登录密码 <span class='f_red'>*</span></td>
				<td class='hback'><input type='password' name='password' id='password' class='input-150' maxlength="16" /> <span id="dpassword"></span> <font color="#999999">(4-16个字符)</font></td>
				<td class='hback_1'>确认密码 <span class='f_red'>*</span></td>
				<td class='hback'><input type='password' name='confirmpassword' id='confirmpassword' class='input-150' maxlength="16" /> <span id="dconfirmpassword"></span> <font color='#9999999'>(输入以上密码)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>性 别 <span class='f_red'>*</span></td>
				<td class='hback'>
				<select name='gender' id='gender'>
				<option value=''>=请选择=</option>
				<option value='1'>男</option>
				<option value='2'>女</option></select> 
				<span class='f_red' id='dgender'></span></td>
				<td class='hback_1'>生 日 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='year' name='ageyear' text='请选择'}-->年
				<!--{hook mod='month' name='agemonth' text='请选择'}-->月
				<!--{hook mod='day' name='ageday' text='请选择'}-->日
			    <br />
			    <span class='f_red' id='dyear'></span><span class='f_red' id='dmonth'></span><span class='f_red' id='dday'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>血 型 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='blood' name='blood' type='select' text='=请选择='}--> <span id='dblood' class='f_red'></span></td>
				<td class='hback_1'>婚姻状态 <span class='f_red'>*</span></td>
				<td class='hback'><!--{hook mod='var' item='marrystatus' name='marrystatus' type='select' text='=请选择='}--> <span id="dmarrystatus"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>有无子女 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='childrenstatus' name='childrenstatus' type='select' text='=请选择='}--> <span id='dchildrenstatus' class='f_red'></span></td>
				<td class='hback_1'>身 高 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='height' name='height' text='=请选择='}--> CM <span id='dheight' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>国 籍 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='nationality' name='nationality' type='select' text='=请选择='}--> <span id='dnationality' class='f_red'></span></td>
				<td class='hback_1'>户 籍 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hometown type='dist1' name='nationprovinceid' cname='nationcityid' text='=请选择='}-->&nbsp;<span id='dnationprovinceid' class='f_red'></span>
				<span id="json_nationcityid"></span>&nbsp;
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>所在地区 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{area type='dist1' name='provinceid' ajax='1' cname='cityid' cajax='1' dname='distid' text='=请选择='}-->&nbsp;<span id='dprovinceid' class='f_red'></span>
				<span id="json_cityid"></span>&nbsp;
				<span id="json_distid"></span>
				</td>
				<td class='hback_1'>交友类型 <span class='f_red'>*</span></td>
				<td class='hback'><!--{hook mod='lovesort' type='select' name='lovesort' text='=请选择='}--> <span id='dlovesort' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>个 性  <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='personality' name='personality' type='select' text='=请选择='}--> <span id="dpersonality"></span></td>
				<td class='hback_1'>民 族 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='national' name='national' type='select' text='=请选择='}--> <span id='dnational' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>职 业 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='jobs' name='jobs' type='select' text='=请选择='}--> <span id="djobs"></span></td>
				<td class='hback_1'>月 薪 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='var' item='salary' name='salary' type='select' text='=请选择='}--> <span id='dsalary' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>居住情况 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='housing' name='housing' type='select' text='=请选择='}--> <span id="dhousing"></span></td>
				<td class='hback_1'>购车情况 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='caring' name='caring' type='select' text='=请选择='}--> <span id="dcaring"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>曾经留学/居住 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<!--{hook mod='var' item='beforeregion' name='beforeregion' type='select' text='=请选择='}--> <span id='dbeforeregion' class='f_red'></span></td>
			  </tr>

			  <tr>
			    <td class='hback_1'>内心独白 <span class='f_red'>*</span></td>
				<td class='hback' colspan='3'>
				<textarea name='monolog' id='monolog' style="width:60%;height:80px;overflow:hidden;"></textarea>
				<br />
				<span id='dmonolog' class='f_red'></span> <font color="#999999">(20~4000个字符，1个汉字等于2个字符)</font>
				</td>
			  </tr>
			</table>
		</div>

	    
		<!-- 外貌体型 -->
		<div id="myTab_Content1" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>外貌体型</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>体 重 <span class='f_red'></span></td>
				<td class='hback' width='35%'><!--{hook mod='weight' name='weight' text='=请选择='}--> KG <span id='dweight' class='f_red'></span></td>
				<td class='hback_1' width='15%'>外貌自评 <span class='f_red'></span></td>
				<td class='hback' width='35%'><!--{hook mod='var' item='profile' name='profile' type='select' text='=请选择='}--> <span id="dprofile"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>魅力部位 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='charmparts' name='charmparts' type='select' text='=请选择='}--> <span id='dcharmparts' class='f_red'></span></td>
				<td class='hback_1'>发 型 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='hairstyle' name='hairstyle' type='select' text='=请选择='}--> <span id="dhairstyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>发 色 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='haircolor' name='haircolor' type='select' text='=请选择='}--> <span id='dhaircolor' class='f_red'></span></td>
				<td class='hback_1'>脸 型 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='facestyle' name='facestyle' type='select' text='=请选择='}--> <span id="dfacestyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>体 型 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<!--{hook mod='var' item='bodystyle' name='bodystyle' type='select' text='=请选择='}--> <span id='dbodystyle' class='f_red'></span></td>
			  </tr>
			</table>
		</div>


		<!-- 工作学习 -->
		<div id="myTab_Content2" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>工作学习</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>公司类型 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='companytype' name='companytype' type='select' text='=请选择='}--> <span id='dcompanytype' class='f_red'></span></td>
				<td class='hback_1' width='15%'>收入描述 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='income' name='income' type='select' text='=请选择='}--> <span id="dincome"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>工作状况 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='workstatus' name='workstatus' type='select' text='=请选择='}--> <span id="dworkstatus"></span></td>
				<td class='hback_1'>公司名称 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="companyname" id="companyname" class="input-txt" /> <span id='dcompanyname' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>教育程度 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='var' item='education' name='education' type='select' text='=请选择='}--> <span id="deducation"></span></td>
				<td class='hback_1'>专业类型 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='specialty' name='specialty' type='select' text='=请选择='}--> <span id='dspecialty' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>毕业学校 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="school" id="school" class="input-txt" /> <span id='dschool' class='f_red'></span></td>
				<td class='hback_1'>入学年份 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="schoolyear" id="schoolyear" class="input-s" />年 <span id="dschoolyear"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>语言能力 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_language_edit">
				<!--{hook mod='var' type='checkbox' item='language' name='language' maxnum=$config.maxnum}-->
				</td>
			  </tr>
			</table>
		</div>

		<!-- 生活描述 -->
		<div id="myTab_Content3" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>生活描述</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>家中排行 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='tophome' name='tophome' type='select' text='=请选择='}--> <span id='dtophome' class='f_red'></span></td>
				<td class='hback_1' width='15%'>最大消费 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='consume' name='consume' type='select' text='=请选择='}--> <span id="dconsume"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>是否吸烟 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='smoking' name='smoking' type='select' text='=请选择='}--> <span id="dsmoking"></span></td>
				<td class='hback_1'>是否喝酒 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='drinking' name='drinking' type='select' text='=请选择='}--> <span id='ddrinking' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>宗教信仰 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='faith' name='faith' type='select' text='=请选择='}--> <span id="dfaith"></span></td>
				<td class='hback_1'>锻炼习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='workout' name='workout' type='select' text='=请选择='}--> <span id='dworkout' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>作息习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='rest' name='rest' type='select' text='=请选择='}--> <span id="drest"></span></td>
				<td class='hback_1'>是否要孩子 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='havechildren' name='havechildren' type='select' text='=请选择='}--> <span id='dhavechildren' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>与对方父母同住 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='talive' name='talive' type='select' text='=请选择='}--> <span id="dtalive"></span></td>
				<td class='hback_1'>喜欢制造浪漫 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='romantic' name='romantic' type='select' text='=请选择='}--> <span id="dromantic"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>擅长生活技能 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_lifeskill_edit">
				<!--{hook mod='var' item='lifeskill' name='lifeskill' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dlifeskill' class='f_red'></span>
				</td>
			  </tr>
			</table>
		</div>

		<!-- 兴趣爱好 -->
		<div id="myTab_Content4" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>兴趣爱好</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>喜欢的运动  <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_sports_edit">
				<!--{hook mod='var' item='sports' name='sports' type='checkbox' maxnum=$config.maxnum}-->
                <span id='dsports' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的食物 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_food_edit">
				<!--{hook mod='var' item='food' name='food' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dfood' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的书籍 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_book_edit">
				<!--{hook mod='var' item='book' name='book' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dbook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的电影 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_film_edit">
				<!--{hook mod='var' item='film' name='film' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dfilm' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>关注的节目 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_attention_edit">
				<!--{hook mod='var' item='attention' name='attention' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dattention' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>娱乐休闲 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_leisure_edit">
				<!--{hook mod='var' item='leisure' name='leisure' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dleisure' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>业余爱好 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_interest_edit">
				<!--{hook mod='var' item='interest' name='interest' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dinterest' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的旅游去处 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_travel_edit">
				<!--{hook mod='var' item='travel' name='travel' type='checkbox' maxnum=$config.maxnum}-->
				<span id='dtravel' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

		<!-- 联系资料 -->
		<div id="myTab_Content5" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>会员资料</b> (网站保密，不会公开)</td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>真实姓名 <span class='f_red'></span></td>
				<td class='hback' colspan="3" width='85%'><input type="text" name="realname" id="realname" class="input-s" /> <span id='drealname' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>身份证号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="idnumber" id="idnumber" class="input-txt" /> <span id='didnumber' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用)  </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>通信地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="address" id="address" class="input-txt" /> <span id='daddress' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>邮政编码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="zipcode" id="zipcode" class="input-s" /> <span id='dzipcode' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>

			  <tr>
				<td class='hback_yellow' colspan="4" align="center"><b>联系方式</b> (公开，需要会员组权限才能查看)</td>
			  </tr>
			  <tr>
				<td class='hback_1'>查看权限 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="radio" name="privacy" id="privacy" value="1" checked />任何人可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="2" />好友可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="3" />VIP会员可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="4" />保密&nbsp;&nbsp; <span id='dprivacy' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>手机号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="mobile" id="mobile" class="input-100" /> <span id='dmobile' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>电话号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="telephone" id="telephone" class="input-100" /> <span id='dtelephone' class='f_red'></span></td>
			  </tr>

			  <tr>
				<td class='hback_1'>QQ号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="qq" id="qq" class="input-100" /> <span id='dqq' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>MSN <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="msn" id="msn" class="input-txt" /> <span id='dmsn' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Skype <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="skype" id="skype" class="input-100" /> <span id='dskype' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Facebook <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="facebook" id="facebook" class="input-txt" /> <span id='dfacebook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>博客地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="homepage" id="homepage" class="input-txt" /> <span id='dhomepage' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

	  </div>
	  <!-- TabContent //-->
	  <div align="center"><input type="submit" name="btn_save" id="btn_save" value=" 添加保存 " /></div>
	  </form>
	</div>

  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!-- 编辑页面 -->
<!--{if $a eq "edit"}-->
<style type="text/css">
.nTab{width: 98%;height: auto;margin: 20px auto;border: 1px solid #dbe2e7;overflow: hidden;}
.none{display: none;}
.nTab .TabTitle li{float: left;cursor: pointer;height:28px;line-height:28px;text-align: center;width: 100px;}
.nTab .TabTitle li a{text-decoration: none;}
.nTab .TabTitle .active{background: #e5ecf0;font-size:13px;font-weight: bold;}
.nTab .TabTitle .normal{color: #336699;}
.nTab .TabContent{clear: both;overflow: hidden;background: #fff;padding: 5px;display: block;height: auto;}
</style>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>管理/编辑会员</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=user&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>管理/编辑会员</h3>
	<form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&a=saveedit&<!--{$comeurl}-->" onsubmit='return checkedit();' />
	<input type="hidden" name="id" id="id" value="<!--{$id}-->" />
	<div class="nTab">
	  <div class="TabTitle">
	    <ul id="myTab">
		  <li class="active" id='li_0' onclick="nTabs(this,0);">基本信息</li>
		  <li class="normal" id='li_1' onclick="nTabs(this,1);">外貌体型</li>
		  <li class="normal" id='li_2' onclick="nTabs(this,2);">工作学习</li>
		  <li class="normal" id='li_3' onclick="nTabs(this,3);">生活描述</li>
		  <li class="normal" id='li_4' onclick="nTabs(this,4);">兴趣爱好</li>
		  <li class="normal" id='li_5' onclick="nTabs(this,5);">联系资料</li>
		  <li class="normal" id='li_6' onclick="nTabs(this,6);">会员相册</li>
		</ul>
	  </div>

	  <div class="TabContent">

		<div class="search-area7">
		  <div class="item">
			<label>会员操作 </label>

		    <input type="button" name="btn_money" id="btn_money" value="现金管理" onclick="tbox_addmoney('现金管理', '<!--{$user.userid}-->');" />&nbsp;
			<input type="button" name="btn_points" id="btn_points" value="积分管理" onclick="tbox_addpoints('积分管理', '<!--{$user.userid}-->');" />&nbsp;
			<input type="button" name="btn_editpass" id="btn_editpass" value="修改密码" onclick="tbox_editpass('修改会员密码', '<!--{$user.userid}-->')" />&nbsp;
			<input type='button' name='btn_vip' id='btn_vip' value='升级VIP' onclick="tbox_uservip('会员VIP操作', '<!--{$user.userid}-->')" />&nbsp;
			<input type='button' name='btn_rz' id='btn_rz' value='认证项目' onclick="tbox_rzmanage('会员认证管理', '<!--{$user.userid}-->')" />&nbsp;
			<input type='button' name='btn_rz' id='btn_rz' value='内心独白' onclick="tbox_monolog('审核会员内心独白', '<!--{$user.userid}-->')" />&nbsp;
			<!--{if $user.avatar != ''}-->
			<input type='button' name='btn_avatar' id='btn_avatar' value='管理头像' onclick="tbox_avatar('<!--{$user.userid}-->');" />&nbsp;
			<!--{else}-->
			<input type='button' name='btn_avatar' id='btn_avatar' value='管理头像' disabled />&nbsp;
			<!--{/if}-->
			<input type='button' name='btn_album' id='btn_album' value='上传相册' onclick="tbox_album_add('上传相册', '<!--{$user.userid}-->')" />&nbsp;&nbsp;
			<a href="<!--{$cpfile}-->?c=user&a=login&id=<!--{$user.userid}-->" target="_blank">登录</a>

		  </div>
		</div>

	    
		<!-- 基本信息 -->
		<div id="myTab_Content0" class="">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>基本信息</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>会员ID <span class='f_red'></span></td>
				<td class='hback' width='35%'><!--{$user.userid}--></td>
				<td class='hback_1' width='15%'>用 户 名 <span class='f_red'></span></td>
				<td class='hback' width='35%'><!--{$user.levelimg}--> <!--{$user.username}--><br /><!--{avatar width='70' height='86' value=$user.avatarurl}--></td>
			  </tr>
			  <tr>
				<td class='hback_1'>登录邮箱 <span class='f_red'></span></td>
				<td class='hback'><!--{$user.email}--></td>
				<td class='hback_1'>星座/生肖 <span class='f_red'></span></td>
				<td class='hback'><!--{$user.astro}--> / <!--{$user.lunar}--> </td>
			  </tr>
			  <tr>
				<td class='hback_1'>性 别 <span class='f_red'>*</span></td>
				<td class='hback'>
				<select name='gender' id='gender'>
				<option value=''>=请选择=</option>
				<option value='1'<!--{if $user.gender=='1'}--> selected<!--{/if}-->>男</option>
				<option value='2'<!--{if $user.gender=='2'}--> selected<!--{/if}-->>女</option></select> 
				<span class='f_red' id='dgender'></span></td>
				<td class='hback_1'>生 日 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='year' name='ageyear' text='=请选择=' value=$user.ageyear}-->年
				<!--{hook mod='month' name='agemonth' text='=请选择=' value=$user.agemonth}-->月
				<!--{hook mod='day' name='ageday' text='=请选择=' value=$user.ageday}-->日
			    <br />
			    <span class='f_red' id='dyear'></span><span class='f_red' id='dmonth'></span><span class='f_red' id='dday'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>血 型 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='blood' name='blood' type='select' text='=请选择=' value=$user.blood}--> <span id='dblood' class='f_red'></span></td>
				<td class='hback_1'>婚姻状态 <span class='f_red'>*</span></td>
				<td class='hback'><!--{hook mod='var' item='marrystatus' name='marrystatus' type='select' text='=请选择=' value=$user.marrystatus}--> <span id="dmarrystatus"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>有无子女 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='childrenstatus' name='childrenstatus' type='select' text='=请选择=' value=$user.childrenstatus}--> <span id='dchildrenstatus' class='f_red'></span></td>
				<td class='hback_1'>身 高 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='height' name='height' text='=请选择=' value=$user.height}--> CM <span id='dheight' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>国 籍 <span class='f_red'></span></td>
				<td class='hback'><!--{hook mod='var' item='nationality' name='nationality' type='select' text='=请选择=' value=$user.childrenstatus}--> <span id='dnationality' class='f_red'></span></td>
				<td class='hback_1'>户 籍 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hometown type='dist1' name='nationprovinceid' value=$user.nationprovinceid cname='nationcityid' text='=请选择='}-->&nbsp;<span id='dnationprovinceid' class='f_red'></span>
				<span id="json_nationcityid">
				<!--{hometown type='dist2' cname='nationcityid' cvalue=$user.nationcityid pvalue=$user.nationprovinceid text='=请选择='}-->
				</span>&nbsp;<span id='dnationcityid' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>所在地区 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{area type='dist1' name='provinceid' value=$user.provinceid ajax='1' cname='cityid' cajax='1' dname='distid' text='=请选择='}-->&nbsp;<span id='provinceid' class='f_red'></span>
				<span id="json_cityid">
				<!--{area type='dist2' pvalue=$user.provinceid cname='cityid' cvalue=$user.cityid cajax='1' dname='distid' dvalue=$user.distid text='=请选择='}-->
				</span>&nbsp; <span id='dcityid' class='f_red'></span>
				<span id="json_distid">
				<!--{area type='dist3' cvalue=$user.cityid dname='distid' dvalue=$user.distid text='=请选择='}-->
				</span>
				</td>
				<td class='hback_1'>交友类型 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='lovesort' name='lovesort' type='select' text='=请选择=' value=$user.lovesort}--> <span id='dlovesort' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>个 性  <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='personality' name='personality' type='select' text='=请选择=' value=$user.personality}--> <span id="dpersonality"></span></td>
				<td class='hback_1'>民 族 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='national' name='national' type='select' text='=请选择=' value=$user.national}--> <span id='dnational' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>职 业 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='jobs' name='jobs' type='select' text='=请选择=' value=$user.jobs}--> <span id="djobs"></span></td>
				<td class='hback_1'>月 薪 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='var' item='salary' name='salary' type='select' text='=请选择=' value=$user.salary}--> <span id='dsalary' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>居住情况 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='housing' name='housing' type='select' text='=请选择=' value=$user.housing}--> <span id="dhousing"></span></td>
				<td class='hback_1'>购车情况 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='caring' name='caring' type='select' text='=请选择=' value=$user.caring}--> <span id="dcaring"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>曾经留学/居住 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<!--{hook mod='var' item='beforeregion' name='beforeregion' type='select' text='=请选择=' value=$user.beforeregion}--> <span id='dbeforeregion' class='f_red'></span></td>
			  </tr>

			  <tr>
				<td class='hback_c2' colspan="4" align="center"><b>状态信息</b></td>
			  </tr>
			  <tr>
			    <td class='hback_1'>注册时间 </td>
				<td class='hback'><!--{$user.regtime|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
				<td class='hback_1'>注册IP </td>
				<td class='hback'><!--{$user.regip}--></td>
			  </tr>
			  <tr>
			    <td class='hback_1'>最后登录 </td>
				<td class='hback'><!--{$user.logintime|date_format:"%Y-%m-%d %H:%M:%S"}--> 登录次数：<!--{$user.logintimes}--></td>
				<td class='hback_1'>登录IP </td>
				<td class='hback'><!--{$user.loginip}--></td>
			  </tr>
			  <tr>
			    <td class='hback_1'>现金(元) </td>
				<td class='hback'><!--{$user.money}--></td>
			    <td class='hback_1'>积分 </td>
				<td class='hback'><!--{$user.points}--></td>
			  </tr>

			</table>
		</div>

	    
		<!-- 外貌体型 -->
		<div id="myTab_Content1" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>外貌体型</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>体 重 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='weight' name='weight' text='=请选择=' value=$user.weight}-->KG <span id='dweight' class='f_red'></span></td>
				<td class='hback_1' width='15%'>外貌自评 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='profile' name='profile' type='select' text='=请选择=' value=$user.profile}--> <span id="dprofile"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>魅力部位 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='charmparts' name='charmparts' type='select' text='=请选择=' value=$user.charmparts}--> <span id='dcharmparts' class='f_red'></span></td>
				<td class='hback_1'>发 型 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='hairstyle' name='hairstyle' type='select' text='=请选择=' value=$user.hairstyle}--> <span id="dhairstyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>发 色 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='haircolor' name='haircolor' type='select' text='=请选择=' value=$user.haircolor}--> <span id='dhaircolor' class='f_red'></span></td>
				<td class='hback_1'>脸 型 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='facestyle' name='facestyle' type='select' text='=请选择=' value=$user.facestyle}--> <span id="dfacestyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>体 型 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<!--{hook mod='var' item='bodystyle' name='bodystyle' type='select' text='=请选择=' value=$user.bodystyle}--> <span id='dbodystyle' class='f_red'></span></td>
			  </tr>
			</table>
		</div>


		<!-- 工作学习 -->
		<div id="myTab_Content2" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>工作学习</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>公司类型 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='companytype' name='companytype' type='select' text='=请选择=' value=$user.companytype}--> <span id='dcompanytype' class='f_red'></span></td>
				<td class='hback_1' width='15%'>收入描述 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='income' name='income' type='select' text='=请选择=' value=$user.income}--> <span id="dincome"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>工作状况 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='workstatus' name='workstatus' type='select' text='=请选择=' value=$user.workstatus}--> <span id="dworkstatus"></span></td>
				<td class='hback_1'>公司名称 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="companyname" id="companyname" class="input-txt" value="<!--{$user.companyname}-->" /> <span id='dcompanyname' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>教育程度 <span class='f_red'>*</span></td>
				<td class='hback'>
				<!--{hook mod='var' item='education' name='education' type='select' text='=请选择=' value=$user.education}--> <span id="deducation"></span></td>
				<td class='hback_1'>专业类型 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='specialty' name='specialty' type='select' text='=请选择=' value=$user.specialty}--> <span id='dspecialty' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>毕业学校 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="school" id="school" class="input-txt" value="<!--{$user.school}-->" /> <span id='dschool' class='f_red'></span></td>
				<td class='hback_1'>入学年份 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="schoolyear" id="schoolyear" class="input-s" value="<!--{$user.schoolyear}-->" />年 <span id="dschoolyear"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>语言能力 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_language_edit">
				<!--{hook mod='var' item='language' name='language' type='checkbox' maxnum=$config.maxnum value=$user.language}-->
				</td>
			  </tr>
			</table>
		</div>

		<!-- 生活描述 -->
		<div id="myTab_Content3" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>生活描述</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>家中排行 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='tophome' name='tophome' type='select' text='=请选择=' value=$user.tophome}--> <span id='dtophome' class='f_red'></span></td>
				<td class='hback_1' width='15%'>最大消费 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<!--{hook mod='var' item='consume' name='consume' type='select' text='=请选择=' value=$user.consume}--> <span id="dconsume"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>是否吸烟 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='smoking' name='smoking' type='select' text='=请选择=' value=$user.smoking}--> <span id="dsmoking"></span></td>
				<td class='hback_1'>是否喝酒 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='drinking' name='drinking' type='select' text='=请选择=' value=$user.drinking}--> <span id='ddrinking' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>宗教信仰 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='faith' name='faith' type='select' text='=请选择=' value=$user.faith}--> <span id="dfaith"></span></td>
				<td class='hback_1'>锻炼习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='workout' name='workout' type='select' text='=请选择=' value=$user.workout}--> <span id='dworkout' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>作息习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='rest' name='rest' type='select' text='=请选择=' value=$user.rest}--> <span id="drest"></span></td>
				<td class='hback_1'>是否要孩子 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='havechildren' name='havechildren' type='select' text='=请选择=' value=$user.havechildren}--> <span id='dhavechildren' class='f_red'></span></td> 
			  </tr>
			  <tr>
				<td class='hback_1'>与对方父母同住 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='talive' name='talive' type='select' text='=请选择=' value=$user.talive}--> <span id="dtalive"></span></td>
				<td class='hback_1'>喜欢制造浪漫 <span class='f_red'></span></td>
				<td class='hback'>
				<!--{hook mod='var' item='romantic' name='romantic' type='select' text='=请选择=' value=$user.romantic}--> <span id="dromantic"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>擅长生活技能 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_lifeskill_edit">
				<!--{hook mod='var' item='lifeskill' name='lifeskill' type='checkbox' maxnum=$config.maxnum value=$user.lifeskill}-->
				<span id='dlifeskill' class='f_red'></span>
				</td>
			  </tr>
			</table>
		</div>

		<!-- 兴趣爱好 -->
		<div id="myTab_Content4" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>兴趣爱好</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>喜欢的运动  <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_sports_edit">
				<!--{hook mod='var' item='sports' name='sports' type='checkbox' maxnum=$config.maxnum value=$user.sports}-->
                <span id='dsports' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的食物 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_food_edit">
				<!--{hook mod='var' item='food' name='food' type='checkbox' maxnum=$config.maxnum value=$user.food}-->
				<span id='dfood' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的书籍 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_book_edit">
				<!--{hook mod='var' item='book' name='book' type='checkbox' maxnum=$config.maxnum value=$user.book}-->
				<span id='dbook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的电影 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_film_edit">
				<!--{hook mod='var' item='film' name='film' type='checkbox' maxnum=$config.maxnum value=$user.film}-->
				<span id='dfilm' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>关注的节目 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_attention_edit">
				<!--{hook mod='var' item='attention' name='attention' type='checkbox' maxnum=$config.maxnum value=$user.attention}-->
				<span id='dattention' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>娱乐休闲 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_leisure_edit">
				<!--{hook mod='var' item='leisure' name='leisure' type='checkbox' maxnum=$config.maxnum value=$user.leisure}-->
				<span id='dleisure' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>业余爱好 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_interest_edit">
				<!--{hook mod='var' item='interest' name='interest' type='checkbox' maxnum=$config.maxnum value=$user.interest}-->
				<span id='dinterest' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的旅游去处 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_travel_edit">
				<!--{hook mod='var' item='travel' name='travel' type='checkbox' maxnum=$config.maxnum value=$user.travel}-->
				<span id='dtravel' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

		<!-- 联系资料 -->
		<div id="myTab_Content5" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>会员资料</b> (网站保密，不会公开)</td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>真实姓名 <span class='f_red'></span></td>
				<td class='hback' colspan="3" width='85%'><input type="text" name="realname" id="realname" class="input-s" value="<!--{$user.realname}-->" /> <span id='drealname' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>身份证号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="idnumber" id="idnumber" class="input-txt" value="<!--{$user.idnumber}-->" /> <span id='didnumber' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用)  </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>通信地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="address" id="address" class="input-txt" value="<!--{$user.address}-->" /> <span id='daddress' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>邮政编码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="zipcode" id="zipcode" class="input-s" value="<!--{$user.zipcode}-->" /> <span id='dzipcode' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>

			  <tr>
				<td class='hback_yellow' colspan="4" align="center"><b>联系方式</b> (公开，需要会员组权限才能查看)</td>
			  </tr>
			  <tr>
				<td class='hback_1'>查看权限 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<input type="radio" name="privacy" id="privacy" value="1"<!--{if $user.privacy=='1'}--> checked<!--{/if}--> />任何人可见&nbsp;&nbsp;
				<input type="radio" name="privacy" id="privacy" value="2"<!--{if $user.privacy=='2'}--> checked<!--{/if}--> />好友可见&nbsp;&nbsp;
				<input type="radio" name="privacy" id="privacy" value="3"<!--{if $user.privacy=='3'}--> checked<!--{/if}--> />VIP会员可见&nbsp;&nbsp;
				<input type="radio" name="privacy" id="privacy" value="4"<!--{if $user.privacy=='4'}--> checked<!--{/if}--> />保密&nbsp;&nbsp; <span id='dprivacy' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>手机号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="mobile" id="mobile" class="input-100" value="<!--{$user.mobile}-->" /> <span id='dmobile' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>电话号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="telephone" id="telephone" class="input-100" value="<!--{$user.telephone}-->" /> <span id='dtelephone' class='f_red'></span></td>
			  </tr>

			  <tr>
				<td class='hback_1'>QQ号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="qq" id="qq" class="input-100" value="<!--{$user.qq}-->" /> <span id='dqq' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>MSN <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="msn" id="msn" class="input-txt" value="<!--{$user.msn}-->" /> <span id='dmsn' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Skype <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="skype" id="skype" class="input-100" value="<!--{$user.skype}-->" /> <span id='dskype' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Facebook <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="facebook" id="facebook" class="input-txt" value="<!--{$user.facebook}-->" /> <span id='dfacebook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>博客地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="homepage" id="homepage" class="input-txt" value="<!--{$user.homepage}-->" /> <span id='dhomepage' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

		<!-- 相册列表 -->
		<div id="myTab_Content6" class="none">
		<h3 class="subtitle">会员相册</h3>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
		  <thead class="tb-tit-bg">
		  <tr>
		    <th width="15%"><div class="th-gap">ID</div></th>
			<th width="20%"><div class="th-gap">照片</div></th>
			<th width="10%"><div class="th-gap">状态</div></th>
			<th width="20%"><div class="th-gap">上传时间</div></th>
			<th><div class="th-gap">操作</div></th>
		  </tr>
		  </thead>
		  <tfoot class="tb-foot-bg"></tfoot>
		  <!--{assign var='album' value=vo_list("mod={album} where={v.userid='<!--{$user.userid}-->'} num={10000}")}-->
		  <!--{if empty($album)}-->
		  <tr>
		    <td class='hback' colspan="5" align="center">该会员还没有相册</td>
		  </tr>
		  <!--{else}-->
		  <!--{foreach $album as $volist}-->
		  <tr>
		    <td class='hback' align="center"><!--{$volist.photoid}--></td>
		    <td class='hback' align="center"><a href="<!--{$volist.uploadfiles}-->" target="_blank" title="<!--{$volist.title}-->"><img src="<!--{$volist.thumbfiles}-->" border="0" /></a></td>
			<td class='hback' align="center">
			<!--{if $volist.flag == '1'}-->
			<font color='green'>正常</font>
			<!--{else}-->
			<font color='#999999'>锁定</font>
			<!--{/if}-->
			</td>
			<td class='hback' align="center"><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
			<td class='hback' align="center"><a href="javascript:void(0);" onclick="tbox_setavatar('设置形象照', '<!--{$volist.photoid}-->');" class="icon-add">设为形象照</a></td>
		  </tr>
		  <!--{/foreach}-->
		  <!--{/if}-->
		</table>
		</div>

	  </div>
	  <!-- TabContent //-->
	  <div align="center"><input type="submit" name="btn_save" id="btn_save" value=" 编辑保存 " /></div>
	  </form>
	</div>
	<!-- tab//-->

  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!-- 修改密码 -->
<!--{if $a eq "editpass"}-->
<div class="main-wrap">
  <!--{if $fromtype != 'jdbox'}-->
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>修改会员密码</p></div>
  <!--{/if}-->
  <div class="main-cont">
    <!--{if $fromtype != 'jdbox'}-->
    <h3 class="title"><a href="<!--{$cpfile}-->?c=user&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>修改会员密码</h3>
	<!--{/if}-->
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&fromtype=<!--{$fromtype}-->" onsubmit='return checkpassword();' />
    <input type="hidden" name="a" value="savepassword" />
	<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_c3' width='25%'>会 员 ID </td>
		<td class='hback_c1' width='75%'><!--{$user.userid}--></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员名称 </td>
		<td class='hback_c1'><!--{$user.username}--></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员邮箱 </td>
		<td class='hback_c1'><!--{$user.email}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>新 密 码 <span class="f_red">*</span> </td>
		<td class='hback'><input type='password' name='password' id='password' class='input-150' /> <span id='dpassword' class='f_red'></span> <font color="#999999">(密码长度 6-16个字符)</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>确认密码 <span class="f_red">*</span> </td>
		<td class='hback'><input type='password' name='confirmpassword' id='confirmpassword' class='input-150' /> <span id='dconfirmpassword' class='f_red'></span> <font color="#999999">(密码长度 6-16个字符)</font></td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="2" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->


<!-- 修改内心独白 -->
<!--{if $a eq "monolog"}-->
<div class="main-wrap">
  
  <!--{if $fromtype!='jdbox'}-->
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>修改内心独白</p></div>
  <!--{/if}-->
  <div class="main-cont">
    <!--{if $fromtype != 'jdbox'}-->
	<h3 class="title"><a href="<!--{$cpfile}-->?c=user&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>修改内心独白</h3>
	<!--{/if}-->

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&fromtype=<!--{$fromtype}-->" onsubmit='return checkmonolog();' />
    <input type="hidden" name="a" value="savemonolog" />
	<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_c3' width='20%'>会 员 ID </td>
		<td class='hback_c1' width='80%'><!--{$user.userid}--></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员名称 </td>
		<td class='hback_c1'><!--{$user.username}--></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员邮箱 </td>
		<td class='hback_c1'><!--{$user.email}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>审核状态 <span class="f_red">*</span> </td>
		<td class='hback'>
		<select name="molstatus" id="molstatus">
		  <option value='0'<!--{if $user.molstatus == '0'}--> selected<!--{/if}-->>请选择</option>
		  <option value="-2"<!--{if $user.molstatus == '-2'}--> selected<!--{/if}-->>待审核</option>
		  <option value="-1"<!--{if $user.molstatus == '-1'}--> selected<!--{/if}-->>未通过</option>
		  <option value="1"<!--{if $user.molstatus == '1'}--> selected<!--{/if}-->>已通过</option>
		</select>
		<span id='dmolstatus' class='f_red'></span> <font color="#999999">(只有通过的内心独白，才能显示。)</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>内心独白 <span class="f_red">*</span> </td>
		<td class='hback'>
		<textarea name='monolog' id='monolog' style='width:95%;height:150px;overflow:auto;'><!--{$user.monolog}--></textarea>
		<br />
        <span id='dmonolog' class='f_red'></span> <font color="#999999">(内心独白2000个字以内)</font></td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="2" align="center"><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!-- 修改认证项目 -->
<!--{if $a eq "rzmanage"}-->
<div class="main-wrap">
  
  <!--{if $fromtype != 'jdbox'}-->
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>修改认证项目</p></div>
  <!--{/if}-->
  <div class="main-cont">
	<!--{if $fromtype != 'jdbox'}-->
	<h3 class="title"><a href="<!--{$cpfile}-->?c=user&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>修改认证项目</h3>
	<!--{/if}-->
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&fromtype=<!--{$fromtype}-->" />
    <input type="hidden" name="a" value="saverz" />
	<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_c3' width='15%'>会 员 ID </td>
		<td class='hback_c1' width='35%'><!--{$user.userid}--></td>
		<td class='hback_c3' width='15%'>会员名称 </td>
		<td class='hback_c1' width='35%'><!--{$user.username}--></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>认证星级 </td>
		<td class='hback_c1'><!--{$user.star}--></td>
		<td class='hback_c3'>证件数量 </td>
		<td class='hback_c1'></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>邮箱认证 </td>
		<td class='hback'>
		<font color="green"><!--{$user.email}--></font>
		<br />
		<input type='radio' name='emailrz' id='emailrz' value='1'<!--{if $user.emailrz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='emailrz' id='emailrz' value='0'<!--{if $user.emailrz=='0'}--> checked<!--{/if}--> />未认证
		</td>
		<td class='hback_1'>手机认证</td>
		<td class='hback'>
		<!--{if empty($user.mobile)}--> <font color="#999999">未填写</font> <!--{else}--> <font color="green"><!--{$user.mobile}--></font> <!--{/if}-->
        <br />
		<input type='radio' name='mobilerz' id='mobilerz' value='1'<!--{if $user.mobilerz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='mobilerz' id='mobilerz' value='0'<!--{if $user.mobilerz=='0'}--> checked<!--{/if}--> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>身份证认证 </td>
		<td class='hback'>
		<input type='radio' name='idnumberrz' id='idnumberrz' value='1'<!--{if $user.idnumberrz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='idnumberrz' id='idnumberrz' value='0'<!--{if $user.idnumberrz=='0'}--> checked<!--{/if}--> />未认证
		</td>
		<td class='hback_1'>视频认证 </td>
		<td class='hback'>
		<input type='radio' name='videorz' id='videorz' value='1'<!--{if $user.videorz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='videorz' id='videorz' value='0'<!--{if $user.videorz=='0'}--> checked<!--{/if}--> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>身高认证 </td>
		<td class='hback'>
		<input type='radio' name='heightrz' id='heightrz' value='1'<!--{if $user.heightrz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='heightrz' id='heightrz' value='0'<!--{if $user.heightrz=='0'}--> checked<!--{/if}--> />未认证
		</td>
		<td class='hback_1'>婚史认证 </td>
		<td class='hback'>
		<input type='radio' name='marryrz' id='marryrz' value='1'<!--{if $user.marryrz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='marryrz' id='marryrz' value='0'<!--{if $user.marryrz=='0'}--> checked<!--{/if}--> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>收入认证 </td>
		<td class='hback'>
		<input type='radio' name='incomerz' id='incomerz' value='1'<!--{if $user.incomerz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='incomerz' id='incomerz' value='0'<!--{if $user.incomerz=='0'}--> checked<!--{/if}--> />未认证
		</td>
		<td class='hback_1'>学历认证 </td>
		<td class='hback'>
		<input type='radio' name='educationrz' id='educationrz' value='1'<!--{if $user.educationrz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='educationrz' id='educationrz' value='0'<!--{if $user.educationrz=='0'}--> checked<!--{/if}--> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>房产认证 </td>
		<td class='hback'>
		<input type='radio' name='houserz' id='houserz' value='1'<!--{if $user.houserz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='houserz' id='houserz' value='0'<!--{if $user.houserz=='0'}--> checked<!--{/if}--> />未认证
		</td>
		<td class='hback_1'>购车认证 </td>
		<td class='hback'>
		<input type='radio' name='carrz' id='carrz' value='1'<!--{if $user.carrz=='1'}--> checked<!--{/if}--> />已认证，
		<input type='radio' name='carrz' id='carrz' value='0'<!--{if $user.carrz=='0'}--> checked<!--{/if}--> />未认证
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


<!-- VIP操作页面 -->
<!--{if $a eq "vip"}-->
<style type="text/css">
.nTab{width: 98%;height: auto;margin: 20px auto;border: 1px solid #dbe2e7;overflow: hidden;}
.none{display: none;}
.nTab .TabTitle li{float: left;cursor: pointer;height:28px;line-height:28px;text-align: center;width: 100px;}
.nTab .TabTitle li a{text-decoration: none;}
.nTab .TabTitle .active{background: #e5ecf0;font-size:13px;font-weight: bold;}
.nTab .TabTitle .normal{color: #336699;}
.nTab .TabContent{clear: both;overflow: hidden;background: #fff;padding: 5px;display: block;height: auto;}
</style>
<div class="main-wrap">
   
  <!--{if $fromtype != 'jdbox'}-->
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>VIP组操作</p></div>
  <!--{/if}-->
  <div class="main-cont">    
    <!--{if $fromtype != 'jdbox'}-->
	<h3 class="title"><a href="<!--{$cpfile}-->?c=user" class="btn-general"><span>返回列表</span></a>VIP组操作</h3>
	<!--{/if}-->

	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width='20%'>会员ID </td>
		<td class='hback' width='30%'><!--{$user.userid}--></td>
		<td class='hback_1' width='20%'>会员名称 </td>
		<td class='hback' width='30%'><!--{$user.username}--> </td>
	  </tr>
	  <tr>
	    <td class='hback_1'>剩余(现金) </td>
		<td class='hback'> <!--{$user.money}--></td>
		<td class='hback_1'>所在会员组 </td>
		<td class='hback'><!--{$user.levelimg}--><!--{$user.groupname}--> </td>
	  </tr>
	</table>

	<div class="nTab">
	  <div class="TabTitle">
	    <ul id="myTab">
		  <li class="active" id='li_0' onclick="nTabs(this,0);">开通VIP组</li>
		  <li class="normal" id='li_1' onclick="nTabs(this,1);">操作VIP</li>
		  <li class="normal" id='li_2' onclick="nTabs(this,2);">取消VIP</li>
		</ul>
	  </div>

	  <div class="TabContent">
	    
		<!-- 开通VIP组 -->
		<div id="myTab_Content0" class="">
		    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&fromtype=<!--{$fromtype}-->" onsubmit="return checkopen();" />
			<input type="hidden" name="a" value="vipopen" />
			<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c1' colspan="2" align="center"><b>开通VIP会员组</b> (针对普通会员和VIP会员到期重新开通的操作)</td>
			  </tr>
			  <tr>
				<td class='hback_1'>VIP会员组 <span class='f_red'></span></td>
				<td class='hback'>
				  <table cellpadding='2' cellspacing='1' width="100%">
				    <!--{foreach $group as $volist}-->
				    <tr>
					  <td class="hback_c3" width="25%"><!--{$volist.groupname}--></td>
					  <td class="hback" width="75%">
						<!--{foreach $volist.commer as $val}-->
					    <input type="radio" name="viptype" id="viptype" value="<!--{$volist.groupid}-->_<!--{$val.orders}-->" />&nbsp;有效<!--{$val.days}-->天，需要现金<!--{$val.money}-->，赠送积分<!--{$val.points}--><br />
						<!--{/foreach}-->
					  </td>
					</tr>
					<!--{/foreach}-->
				  </table>
				  <span id='dviptype' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>开通原因 <span class='f_red'>*</span></td>
				<td class='hback'><textarea name='opencontent' id='opencontent' style='width:60%;height:80px;display:;overflow:auto;'>开通{groupname}组，有效期到{enddate}。</textarea> <br /><font color="#999999">(描述下开通VIP会员组的原因)</font> <span id='dopencontent' class='f_red'></span></td>
			  </tr>
			  <tr>
			    <td class='hback_none'></td>
				<td class='hback_none'><input type="submit" name='btn_open' id='btn_open' value='确定开通' /></td>
			  </tr>
			</table>
			</form>
		</div>

	    
		<!-- 操作VIP -->
		<div id="myTab_Content1" class="none">
		    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&fromtype=<!--{$fromtype}-->" onsubmit="return checkhandle();" />
			<input type="hidden" name="a" value="viphandle" />
			<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c2' colspan="2" align="center"><b>操作VIP</b> (VIP会员延期或指定VIP天数的操作)</td>
			  </tr>
			  <tr>
				<td class='hback_1' width='20%'>VIP会员组 <span class='f_red'>*</span></td>
				<td class='hback' width='80%'>
				<select name="groupid" id="groupid">
				  <option value="">==请选择==</option>
				  <!--{foreach $group as $volist}-->
				  <option value="<!--{$volist.groupid}-->"><!--{$volist.groupname}--></option>
				  <!--{/foreach}-->
				  </select>
				<span id='dgroupid' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>VIP日期 <span class='f_red'>*</span></td>
				<td class='hback'><input type="text" name="vipenddate" id="vipenddate" class="input-100" readonly onClick="WdatePicker();" /><span id='dvipenddate' class='f_red'></span>  <font color="#999999">(请设置VIP到期日期)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>扣除现金 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="deductmoney" id="deductmoney" class="input-s" /> <span id='ddeductmoney' class='f_red'></span> <font color='#999999'>(不填写或者0表示不扣除)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>操作原因 <span class='f_red'>*</span></td>
				<td class='hback'><textarea name='rencontent' id='rencontent' style='width:60%;height:80px;display:;overflow:auto;'></textarea> <br /><font color='#999999'>描述下操作原因</font> <span id='drencontent' class='f_red'></span></td>
			  </tr>
			  <tr>
			    <td class='hback_none'></td>
				<td class='hback_none'><input type='submit' name='btn_handle' id='btn_handle' value='确定操作' /></td>
			  </tr>
			</table>
			</form>
		</div>


		<!-- 取消VIP会员组 -->
		<div id="myTab_Content2" class="none">
		    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=user&fromtype=<!--{$fromtype}-->" onsubmit="return checkcancel();" />
			<input type="hidden" name="a" value="vipcancel" />
			<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="2" align="center"><b>取消VIP会员组</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='20%'>返还现金 <span class='f_red'></span></td>
				<td class='hback' width='80%'><input type="text" name="returnmoney" id="returnmoney" class="input-s" /> <span id='dreturnmoney' class='f_red'></span> <font color="#999999">(不填写或者0表示不返还)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>取消原因 <span class='f_red'>*</span></td>
				<td class='hback'><textarea name='cancelcontent' id='cancelcontent' style='width:60%;height:80px;display:;overflow:auto;'></textarea> <br /><font color='#999999'>简单描述取消VIP原因</font> <span id='dcancelcontent' class='f_red'></span></td>
			  </tr>
			  <tr>
			    <td class='hback_none'></td>
				<td class='hback_none'><input type='submit' name='btn_cancel' id='btn_cancel' value='确定取消' /></td>
			  </tr>
			</table>
			</form>
		</div>



	  </div>
	  <!-- TabContent //-->
	</div>

  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $a eq 'view'}-->
<!-- 查看会员信息 -->
<div class="main-wrap">
  <div class="main-cont">
	<table cellpadding='2' cellspacing='2' border='0' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">会员ID</td>
		<td class='hback_yellow' width="35%">
		<!--{$user.userid}-->

		<!--{if $user.flag == 1}-->
		<font color="green"><b>√</b></font>
		<!--{else}-->
		<font color="red"><b>×</b></font>
		<!--{/if}-->
		<span id="tips_avatar" style="display:none;">
		<a href="javascript:void(0);" onclick="avatarhide();">隐藏头像</a><br />
		<!--{$user.useravatar}-->
		</span>
		<span id="tips_avataropen">&nbsp;<a href="javascript:void(0);" onclick="avatarshow();">显示头像</a></span>
		</td>
		<td class='hback_1' width="15%">登录邮箱</td>
		<td class='hback_yellow' width="35%"><!--{$user.email}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员信息</td>
		<td class='hback_yellow'>
		<!--{$user.levelimg}--><a href="<!--{$urlpath}-->index.php?c=home&uid=<!--{$user.userid}-->" target="_blank"><!--{$user.username}--></a>&nbsp;
		  <!--{if $user.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;
		  <!--{$user.age}-->岁&nbsp;<!--{area type='text' value=$user.provinceid}-->&nbsp;<!--{area type='text' value=$user.cityid}-->&nbsp;<!--{area type='text' value=$user.distid}-->
		</td>
		<td class='hback_1'>会员组</td>
		<td class='hback_yellow'><!--{$user.groupname}--> <!--{if $user.groupid>1}-->(<!--{$user.vipenddate_t}-->)<!--{/if}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>注册时间</td>
		<td class="hback_yellow"><!--{$user.regtime|date_format:"%Y-%m-%d %H:%M:%S"}-->&nbsp;&nbsp;<br /><!--{$user.regip}--></td>
		<td class='hback_1'>登录时间</td>
		<td class="hback_yellow"><!--{$user.logintime|date_format:"%Y-%m-%d %H:%M:%S"}-->&nbsp;&nbsp;<br /><!--{$user.loginip}-->&nbsp;&nbsp;(<!--{$user.logintimes}-->)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>现金</td>
		<td class="hback_yellow"><!--{$user.money}--></td>
		<td class='hback_1'>积分</td>
		<td class="hback_yellow"><!--{$user.points}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>可用短信</td>
		<td class="hback_yellow"><!--{$user.mbsms}-->条</td>
		<td class='hback_1'>生日</td>
		<td class="hback_yellow"><!--{$user.birthday}-->&nbsp;&nbsp;<!--{$user.lunar}-->&nbsp;&nbsp;<!--{$user.astro}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>婚史</td>
		<td class="hback_yellow"><!--{hook mod='var' item='marrystatus' type='text' value=$user.marrystatus}--></td>
		<td class='hback_1'>交友类型</td>
		<td class="hback_yellow"><!--{hook mod='lovesort' type='text' value=$user.lovesort}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>身高</td>
		<td class="hback_yellow"><!--{$user.height}--> CM</td>
		<td class='hback_1'>体重</td>
		<td class="hback_yellow"><!--{$user.weight}--> 公斤</td>
	  </tr>
	  <tr>
		<td class='hback_1'>月薪</td>
		<td class="hback_yellow"><!--{hook mod='var' item='salary' type='text' value=$user.salary}--></td>
		<td class='hback_1'>学历</td>
		<td class="hback_yellow"><!--{hook mod='var' item='education' type='text' value=$user.education}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>信息统计</td>
		<td class='hback_yellow' colspan='3'>
		相册(<!--{count mod='user' type='album' value=$user.userid}-->)&nbsp;&nbsp;
		关注(<!--{count mod='user' type='listen' value=$user.userid}-->)&nbsp;&nbsp;
		粉丝(<!--{count mod='user' type='fans' value=$user.userid}-->)&nbsp;&nbsp;
		礼物(<!--{count mod='user' type='gift' value=$user.userid}-->)&nbsp;&nbsp;
		日记(<!--{count mod='user' type='diary' value=$user.userid}-->)&nbsp;&nbsp;
		微播(<!--{count mod='user' type='weibo' value=$user.userid}-->)&nbsp;&nbsp;
		信件(<!--{count mod='user' type='message' value=$user.userid}-->)&nbsp;&nbsp;
		问候(<!--{count mod='user' type='hi' value=$user.userid}-->)&nbsp;&nbsp;

		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>内心独白</td>
		<td class='hback_yellow' colspan='3'><div class="monolog"><!--{$user.monolog}--></div></td>
	  </tr>

	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $a eq 'avatar'}-->
<!-- 管理头像 -->
<div class="main-wrap">
  <div class="main-cont">
	<table cellpadding='2' cellspacing='2' border='0' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">会员ID</td>
		<td class='hback' width="35%">
		<!--{$user.userid}-->
		<!--{if $user.flag == 1}-->
		<font color="green"><b>√</b></font>
		<!--{else}-->
		<font color="red"><b>×</b></font>
		<!--{/if}-->
		<span id="tips_avatar" style="display:block;">
		<br />
		<!--{if !empty($user.avatar)}-->
		<img src="<!--{$urlpath}--><!--{$user.avatar}-->" />
		<!--{/if}-->
		</span>
		</td>
		<td class='hback_1' width="15%">登录邮箱</td>
		<td class='hback' width="35%"><!--{$user.email}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员信息</td>
		<td class='hback'>
		<!--{$user.levelimg}--><a href="<!--{$urlpath}-->index.php?c=home&uid=<!--{$volist.userid}-->" target="_blank"><!--{$user.username}--></a>&nbsp;
		  <!--{if $user.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;
		  <!--{$user.age}-->岁&nbsp;<!--{area type='text' value=$user.provinceid}-->&nbsp;<!--{area type='text' value=$user.cityid}-->&nbsp;<!--{area type='text' value=$user.distid}-->
		  <br />
		  <!--{$user.birthday}-->&nbsp;&nbsp;<!--{$user.lunar}-->&nbsp;&nbsp;<!--{$user.astro}-->
		</td>
		<td class='hback_1'>头像状态 </td>
		<td class='hback'>
		<!--{if $user.avatarflag == '-2'}-->
		<font color="gray">待审核</font>
		<!--{elseif $user.avatarflag == '-1'}-->
		<font color="red">未通过</font>
		<!--{elseif $user.avatarflag == '1'}-->
		<font color="green">已通过</font>
		<!--{else}-->
		<font color="gray">未上传</font>
		<!--{/if}-->
		</td>
	  </tr>
	  <tr>
	    <td colspan='4' class='hback_none' align='center' height="35px">
		操作：
		<a href="<!--{$cpfile}-->?c=user&a=passavatar&id[]=<!--{$id}-->&fromtype=jdbox">通过</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=user&a=unpassavatar&id[]=<!--{$id}-->&fromtype=jdbox">未通过</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=user&a=delavatar&id[]=<!--{$id}-->&fromtype=jdbox">删除</a>
		</td>
	  </tr>
	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
<!--{/if}-->
</body>
</html>
<script type="text/javascript">
function nTabs(thisObj, Num) {
	if (thisObj.className == "active") return;
	var tabList = document.getElementById("myTab").getElementsByTagName("li");
	for (i = 0; i < tabList.length; i++) {
		//点击之后，其他tab变成灰色，内容隐藏，只有点击的tab和内容有属性
		if (i == Num) {
			thisObj.className = "active";
			document.getElementById("myTab_Content" + i).style.display = "block";
		} else {
			tabList[i].className = "normal";
			document.getElementById("myTab_Content" + i).style.display = "none";
		}
	}
}


//判断添加
function checkadd() {
	var t = "";
	var v = "";

	t = "email";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("邮箱不能为空", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "username";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("用户名不能为空", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "password";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("密码不能为空", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}
	else {
		if($('#confirmpassword').val() != v) {
			dmsg("确认密码不正确", 'confirmpassword');
			nTabs('li_0', 0);
			$('#confirmpassword').focus();
			return false;
		}
	}

	t = "gender";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择性别", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageyear";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日年份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "agemonth";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日月份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageday";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日日期", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "marrystatus";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择婚姻状态", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择交友类型", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择月薪", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "monolog";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请填写内心独白", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "education";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择学历", t);
		nTabs('li_2', 2);
		$('#'+t).focus();
		return false;
	}

	return true;
}


//判断编辑
function checkedit() {

	var t = "";
	var v = "";

	t = "gender";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择性别", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageyear";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日年份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "agemonth";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日月份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageday";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日日期", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "marrystatus";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择婚姻状态", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择交友类型", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择月薪", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "education";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择学历", t);
		nTabs('li_2', 2);
		$('#'+t).focus();
		return false;
	}

	return true;


}

//修改密码
function checkpassword() {
	var t = "";
	var v = "";

	t = "password";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("密码不能为空", t);
		$('#'+t).focus();
		return false;
	}
	else {
		if($('#confirmpassword').val() != v) {
			dmsg("确认密码不正确", 'confirmpassword');
			$('#confirmpassword').focus();
			return false;
		}
	}
	return true;
}

//修改内心独白
function checkmonolog() {
	var t = "";
	var v = "";

	t = "monolog";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("内心独白不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//开通VIP
function checkopen() {
	var t = "";
	var v = "";

	t = 'viptype';
	var item = $("input[name='viptype']:checked");
	var len  = item.length;
	if(len==0) {
		dmsg('请选择要开通的VIP会员组', t);
		return false;
	}

	t = "opencontent";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请填写开通VIP原因", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//操作VIP
function checkhandle() {
	var t = "";
	var v = "";

	t = "groupid";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请选择会员组", t);
		$('#'+t).focus();
		return false;
	}

	t = "vipenddate";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请设置VIP期限", t);
		$('#'+t).focus();
		return false;
	}

	t = "rencontent";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请填写操作原因", t);
		$('#'+t).focus();
		return false;
	}


	return true;
}

//取消VIP
function checkcancel() {
	var t = "";
	var v = "";

	t = "cancelcontent";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请填写取消VIP的原因", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//显示隐藏头像
function avatarhide(){
    $("#tips_avatar").hide();
	$("#tips_avataropen").show();
}
function avatarshow(){
    $("#tips_avatar").show();
	$("#tips_avataropen").hide();
}

</script>