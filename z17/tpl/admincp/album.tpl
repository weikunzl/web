<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>相册管理</title>
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
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=album">相册管理</a></p></div>
  <div class="main-cont">
    <h3 class="title"></h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=album" />
	  <div class="item">
	    <label>搜索：</label>
		<select name='stype' id='stype'>
		<option value=''></option>
		<option value='userid'<!--{if $stype=='userid'}--> selected<!--{/if}-->>会员ID</option>
		<option value='username'<!--{if $stype=='username'}--> selected<!--{/if}-->>会员名称</option>
		<option value='email'<!--{if $stype=='email'}--> selected<!--{/if}-->>邮箱</option>
		<option value='title'<!--{if $stype=='title'}--> selected<!--{/if}-->>照片标题</option>
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
	<form action="<!--{$cpfile}-->?c=album&page=<!--{$page}-->&<!--{$urlitem}-->" method="post" name="myform" id="myform" style="margin:0">
	<input type="hidden" name="a" id="a" value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="15%"><div class="th-gap">会员名称</div></th>
		<th width="15%"><div class="th-gap">会员信息</div></th>
		<th width="13%"><div class="th-gap">照片</div></th>
		<th width="10%"><div class="th-gap">状态</div></th>
		<th width="10%"><div class="th-gap">上传时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $album as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.photoid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.photoid}--></td>
		<td align="left"><!--{$volist.levelimg}--><a href="javascript:void(0);" onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a> (<!--{$volist.userid}-->)<br /><!--{$volist.email}--></td>
		<td align="left">
		<!--{if $volist.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$volist.ageyear}-->岁 <!--{area type='text' value=$volist.provinceid}--> <!--{area type='text' value=$volist.cityid}-->
		</td>
		<td align="center">
		<a href="<!--{$urlpath}--><!--{$volist.uploadfiles}-->" target="_blank" title="<!--{$volist.title}-->"><img src="<!--{$urlpath}--><!--{$volist.thumbfiles}-->" border="0" /></a>
		</td>
		<td align="center">
		<!--{if $volist.flag == '1'}-->
		<font color='green'>正常</font>
		<!--{else}-->
		<font color='#999999'>锁定</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{$volist.timeline|date_format:"%Y-%m-%d"}--><br />
		<!--{$volist.timeline|date_format:"%H:%M:%S"}--><br />
		<a href='javascript:void(0);' onclick="tbox_album_add('上传照片', '<!--{$volist.userid}-->')">上传照片</a>
		</td>
		<td align="center">
		<!--{if $volist.flag == '1'}-->
		<a href="<!--{$cpfile}-->?c=album&a=suoding&id[]=<!--{$volist.photoid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-set">锁定</a>
		&nbsp;&nbsp;
		<a href="javascript:void(0);" onclick="tbox_setavatar('设置形象照', '<!--{$volist.photoid}-->')" class="icon-add">设为形象照</a>
		<!--{else}-->
		<a href="<!--{$cpfile}-->?c=album&a=tongguo&id[]=<!--{$volist.photoid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-set">审核通过</a>
		<!--{/if}-->
		&nbsp;&nbsp;
		<a href="javascript:void(0);" onclick="tbox_album_edit('编辑照片', '<!--{$volist.photoid}-->')" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=album&a=del&id[]=<!--{$volist.photoid}-->" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
		<input class="button" name="btn_pass" type="button" value="批量审核" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('tongguo');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_lock" type="button" value="批量锁定" onClick="{if(confirm('确定执行该操作吗？')){$('#a').val('suoding');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;
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

<!-- 上传照片 -->
<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=album&fromtype=jdbox" onsubmit='return checkadd();' />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="userid" value="<!--{$user.userid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><!--{$user.userid}--> </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><!--{$user.email}--></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<!--{$user.username}-->
		<!--{if $user.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$user.ageyear}-->岁 <!--{area type='text' value=$user.provinceid}--> <!--{area type='text' value=$user.cityid}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片标题 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='text' name='title' id='title' class='input-txt' /> <span id='dtitle' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片地址 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td>
			  <input type='hidden' name='thumbfiles' id='thumbfiles'  />
			  <input type="text" name="uploadfiles" id="uploadfiles" class="input-150" readonly='only'  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=album&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <br />
		  <font color="#999999">上传图片只支持：gif,jpeg,jpg,png格式</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>审核状态 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='radio' name='flag' id='flag' value='1' checked />通过，<input type='radio' name='flag' id='flag' value='0' />锁定 <span id='dflag' class='f_red'></span> <font color="#999999">(只有通过才能显示)</font></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>锁定说明 </td>
		<td class='hback' colspan='3'>
		<textarea name='auditremark' id='auditremark' style='width:60%;height:70px;overflow:auto;'></textarea>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="4" align="center"><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>

  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->


<!-- 编辑照片 -->
<!--{if $a eq 'edit'}-->
<div class="main-wrap">
  <div class="main-cont">

    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=album&fromtype=jdbox" onsubmit='return checkadd();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name='id' value="<!--{$album.photoid}-->" />
	<input type="hidden" name='userid' value="<!--{$album.userid}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><!--{$album.userid}--> </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><!--{$album.email}--></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<!--{$album.username}-->
		<!--{if $album.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$album.ageyear}-->岁 <!--{area type='text' value=$album.provinceid}--> <!--{area type='text' value=$album.cityid}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片标题 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='text' name='title' id='title' class='input-txt' value="<!--{$album.title}-->" /> <span id='dtitle' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_c3'>照片地址 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td>
			  <input type='hidden' name='thumbfiles' id='thumbfiles' value="<!--{$album.thumbfiles}-->" />
			  <input type="text" name="uploadfiles" id="uploadfiles" class="input-150" readonly='only' value="<!--{$album.uploadfiles}-->"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=album&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <br />
		  <font color="#999999">上传图片只支持：gif,jpeg,jpg,png格式</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>审核状态 <span class="f_red">*</span> </td>
		<td class='hback' colspan='3'><input type='radio' name='flag' id='flag' value='1'<!--{if $album.flag=='1'}--> checked<!--{/if}--> />通过，<input type='radio' name='flag' id='flag' value='0'<!--{if $album.flag=='0'}--> checked<!--{/if}--> />锁定 <span id='dflag' class='f_red'></span> <font color="#999999">(只有通过才能显示)</font></td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>锁定说明 </td>
		<td class='hback' colspan='3'>
		<textarea name='auditremark' id='auditremark' style='width:60%;height:70px;overflow:auto;'><!--{$album.auditremark}--></textarea>
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


<!-- 设置形象照 -->
<!--{if $a eq 'avatar'}-->
<!--{include file="<!--{$cptplpath}-->imgcropper.tpl"}-->
<div class="main-wrap">
  <div class="main-cont">
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>会 员 ID </td>
		<td class='hback' width='35%'><!--{$album.userid}--> </td>
	    <td class='hback_1' width='15%'>登录邮箱 </td>
		<td class='hback' width='35%'><!--{$album.email}--></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员信息 </td>
		<td class='hback' colspan='3'>
		<!--{$album.username}-->
		<!--{if $album.gender=='1'}-->男<!--{else}-->女<!--{/if}--> <!--{hook mod='birthday' value=$album.ageyear}-->岁 <!--{area type='text' value=$album.provinceid}--> <!--{area type='text' value=$album.cityid}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback' colspan='4' id='avatar_editor'>
		<!--{include file="<!--{$cptplpath}-->imgcropper.avatar.tpl"}-->
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
//上传照片
function checkadd() {
	var t = "";
	var v = "";

	t = "title";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("照片标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "uploadfiles";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("照片地址不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

</script>