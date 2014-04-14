<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>日记评论</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=diarycomment">日记评论</a></p></div>
  <div class="main-cont">
    <h3 class="title">日记评论</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=diarycomment" />
	  <div class="item">
	    <label>评论人&nbsp;&nbsp;</label><input type="text" id="susername" name="susername" class="input-100" value="<!--{$susername}-->" />&nbsp;&nbsp;
		<label>评论&nbsp;&nbsp;</label><input type="text" id="skeyword" name="skeyword" class="input-150" value="<!--{$skeyword}-->" />
		&nbsp;&nbsp;
		<label>状态&nbsp;</label><select name="stype" id="stype">
		<option value=''></option>
		<option value='audit'<!--{if $stype=='audit'}--> selected<!--{/if}-->>待审核</option>
		<option value='audited'<!--{if $stype=='audited'}--> selected<!--{/if}-->>已审核</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<!--{$cpfile}-->?c=diarycomment&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="18%"><div class="th-gap">日记标题</div></th>
		<th width="11%"><div class="th-gap">评论人</div></th>
		<th><div class="th-gap">评论内容</div></th>
		<th width="6%"><div class="th-gap">审核</div></th>
		<th width='13%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $comment as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.commentid}-->" onClick="checkItem(this, 'chkAll')"><!--{$volist.commentid}--></td>
		<td><a href="<!--{$urlpath}-->index.php?c=diary&a=detail&id=<!--{$volist.diaryid}-->" target="_blank"><!--{$volist.diary_title}--></a></td>
		<td title="<!--{$volist.timeline|date_format:"%H:%M:%S"}-->"><a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.cmuserid}-->');"><!--{$volist.cmusername}--></a><br/ ><!--{$volist.timeline|date_format:"%Y/%m/%d"}--></td>
		<td align="left"><!--{$volist.content}--></td>
		<td align="center">
		<!--{if $volist.flag==0}-->
			<input type="hidden" id="attr_flag<!--{$volist.commentid}-->" value="flagopen" />
			<img id="flag<!--{$volist.commentid}-->" src="<!--{$urlpath}-->tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.commentid}-->');" style="cursor:pointer;">
		<!--{else}-->
			<input type="hidden" id="attr_flag<!--{$volist.commentid}-->" value="flagclose" />
			<img id="flag<!--{$volist.commentid}-->" src="<!--{$urlpath}-->tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<!--{$volist.commentid}-->');" style="cursor:pointer;">	
		<!--{/if}-->
		</td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=diarycomment&a=edit&id=<!--{$volist.commentid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" class="icon-edit">修改</a>&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=diarycomment&a=del&id[]=<!--{$volist.commentid}-->&page=<!--{$page}-->&<!--{$urlitem}-->" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="5"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><!--{$total}--></b> ]条记录</td>
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

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span>编辑日记评论</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=diarycomment&<!--{$comeurl}-->" class="btn-general"><span>返回列表</span></a>编辑日记评论</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=diarycomment&<!--{$comeurl}-->" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>日记标题 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><!--{$comment.diary_title}--> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论人 <span class="f_red"></span> </td>
		<td class='hback'><a href='javascript:void(0);' onclick="tbox_user_view('<!--{$volist.cmuserid}-->');"><!--{$comment.cmusername}--></a> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论时间 <span class="f_red"></span> </td>
		<td class='hback'><!--{$comment.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论人IP<span class="f_red"></span> </td>
		<td class='hback'><!--{$comment.ip}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>审核状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $comment.flag=='1'}--> checked<!--{/if}--> />通过，<input type="radio" name="flag" id="flag" value="0"<!--{if $comment.flag=='0'}--> checked<!--{/if}--> />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_1'>评论内容 <span class="f_red">*</span> </td>
		<td class='hback'><textarea name="content" id="content" style="width:60%;height:80px;overflow:auto;"><!--{$comment.content}--></textarea> <br /> <span id='dcontent' class='f_red'></span></td>
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

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("评论内容不能为空", t);
		$('#'+t).focus();
		return false;
	}

	return true;
}
</script>
