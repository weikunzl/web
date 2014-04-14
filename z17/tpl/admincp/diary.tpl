<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>日记列表</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=diary">日记列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=diary&a=add" class="btn-general"><span>发布日记</span></a>日记列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=diary" />
	  <div class="item">
	    <label>分类&nbsp;</label><!--{$category_select}-->&nbsp;&nbsp;
		<label>标题&nbsp;</label><input type="text" id="stitle" name="stitle" class="input-100" value="<!--{$stitle}-->" />&nbsp;&nbsp;&nbsp;
		<label>会员ID&nbsp;</label><input type="text" id="suserid" name="suserid" class="input-100" value="<!--{if $suserid > 0}--><!--{$suserid}--><!--{/if}-->" />&nbsp;&nbsp;&nbsp;
		<label>状态&nbsp;</label><select name="stype" id="stype">
		<option value=''></option>
		<option value='audit'<!--{if $stype=='audit'}--> selected<!--{/if}-->>待审核</option>
		<option value='audited'<!--{if $stype=='audited'}--> selected<!--{/if}-->>已审核</option>
		</select>&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=diary&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="13%"><div class="th-gap">会员</div></th>
		<th width="8%"><div class="th-gap">分类</div></th>
		<th width="22%"><div class="th-gap">标题</div></th>
		<th width="8%"><div class="th-gap">浏览</div></th>
		<th width="6%"><div class="th-gap">评论</div></th>
		<th width="6%"><div class="th-gap">状态</div></th>
		<th width="6%"><div class="th-gap">推荐</div></th>
		<th width="12%"><div class="th-gap">发布时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $diary as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.diaryid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.diaryid}--></td>
		<td><a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.userid}-->');"><!--{$volist.username}--></a> (<!--{$volist.userid}-->)</td>
		<td align="center"><!--{$volist.catname}--></td>
		<td><a href="<!--{$urlpath}-->index.php?c=diary&a=detail&id=<!--{$volist.diaryid}-->" target="_blank"><!--{$volist.title}--></a> <!--{if $volist.thumbfiles!=''}--><font color='blue'>图文</font><!--{/if}--></td>
		<td align="center"><!--{$volist.hits}--></td>
		<td align="center"><a href="<!--{$cpfile}-->?c=diarycomment&sdid=<!--{$volist.diaryid}-->"><!--{$volist.cmcount}--></a></td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.diaryid}-->" value="flagopen" />
			<img id="flag<!--{$volist.diaryid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.diaryid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.diaryid}-->" value="flagclose" />
			<img id="flag<!--{$volist.diaryid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.diaryid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center">
		<!--{if $volist.elite==0}-->
			<input type="hidden" id="attr_elite<!--{$volist.diaryid}-->" value="eliteopen" />
			<img id="elite<!--{$volist.diaryid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.diaryid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_elite<!--{$volist.diaryid}-->" value="eliteclose" />
			<img id="elite<!--{$volist.diaryid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<!--{$volist.diaryid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center" title="<!--{$volist.timeline|date_format:"%H:%M:%S"}-->"><!--{$volist.timeline|date_format:"%Y-%m-%d"}--></td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=diary&a=edit&id=<!--{$volist.diaryid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-set">编辑</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=diary&a=del&id[]=<!--{$volist.diaryid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="10" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="9"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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

<!--{if $a eq "add"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=diary&a=add">发布日记</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=diary" class="btn-general"><span>返回列表</span></a>发布日记</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=diary" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>会员ID <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="userid" id="userid" class="input-80" /> <span id='duserid' class='f_red'></span> <span id='dusername' class='f_red'></span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_user_search('userid', 'dusername');">选择会员</a>  </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'>
		<!--{$category_select}--> <span id='dcatid' class='f_red'></span> &nbsp;&nbsp;
		
		天气：<!--{hook mod='var' type='select' item='weather' name='weather'}-->&nbsp;&nbsp;
		心情：<!--{hook mod='var' type='select' item='feel' name='feel'}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记标题 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" />  <span id='dtitle' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图文地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" /> (自动生成) <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc"></span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>浏览次数 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="hits" id="hits" class="input-s" />  <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>属性设置 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type="checkbox" name="flag" id="flag" value="1" checked />审核，<input type="checkbox" name="elite" id="elite" value="1" />推荐，<input type="checkbox" name="diaryopen" id="diaryopen" value="1" checked />公开
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记内容 <span class="f_red">*</span> </td>
		<td class='hback'><textarea name="content" id="content" style="width:70%;height:150px;overflow:auto;"></textarea>  <br /><span id='dcontent' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span>编辑日记</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=diary&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑日记</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=diary&<!--{$comeurl}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>会员ID <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="userid" id="userid" class="input-80" value="<!--{$diary.userid}-->" /> <span id='duserid' class='f_red'></span> <span id='dusername' class='f_red'><!--{$diary.username}--></span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_user_search('userid', 'dusername');">选择会员</a>  </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'>
		<!--{$category_select}--> <span id='dcatid' class='f_red'></span> &nbsp;&nbsp;
		
		天气：<!--{hook mod='var' type='select' item='weather' name='weather' value=$diary.weather}-->&nbsp;&nbsp;
		心情：<!--{hook mod='var' type='select' item='feel' name='feel' value=$diary.feel}-->
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记标题 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" value="<!--{$diary.title}-->" />  <span id='dtitle' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图文地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  value="<!--{$diary.uploadfiles}-->" /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" value="<!--{$diary.thumbfiles}-->" /> (自动生成) <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc">
				<!--{if !empty($diary.thumbfiles)}-->
				<img src="<!--{$urlpath}--><!--{$diary.thumbfiles}-->" width="60px" height="60px" border="0" />
				<!--{/if}-->
			  </span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>浏览次数 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="hits" id="hits" class="input-s" value="<!--{$diary.hits}-->" />  <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>属性设置 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type="checkbox" name="flag" id="flag" value="1"<!--{if $diary.flag=='1'}--> checked<!--{/if}--> />审核，<input type="checkbox" name="elite" id="elite" value="1"<!--{if $diary.elite=='1'}--> checked<!--{/if}--> />推荐，<input type="checkbox" name="diaryopen" id="diaryopen" value="1"<!--{if $diary.diaryopen=='1'}--> checked<!--{/if}--> />公开
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记内容 <span class="f_red">*</span> </td>
		<td class='hback'><textarea name="content" id="content" style="width:70%;height:150px;overflow:auto;"><!--{$diary.content}--></textarea>  <br /><span id='dcontent' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "userid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请填写所属会员ID", t);
		$('#'+t).focus();
		return false;
	}

	t = "catid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所属分类", t);
		$('#'+t).focus();
		return false;
	}

	t = "title";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("日记标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("日记内容不能为空", t);
		$('#'+t).focus();
		return false;
	}

	return true;
}
</script>
