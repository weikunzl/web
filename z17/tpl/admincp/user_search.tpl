<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>选择会员</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
</head>
<body>
<!--{if $a eq "search"}-->
<div class="main-wrap">
  <div class="main-cont">
	<div class="search-area ">
	  <form method="post" id="search_form" action="<!--{$cpfile}-->?c=user&a=search&backinput=<!--{$backinput}-->&backtips=<!--{$backtips}-->" />
	  <div class="item">
	    <label>性别：</label><select name='ssex' id='ssex'><option value=''>请选择</option><option value='2'<!--{if $ssex=='2'}--> selected<!--{/if}-->>女</option><option value='1'<!--{if $ssex=='1'}--> selected<!--{/if}-->>男</option></select>
		<label>用户名：</label><input type="text" id="susername" name="susername" class="input-100" value="<!--{$susername}-->" />&nbsp;&nbsp;
		<label>邮 箱：</label><input type="text" id="semail" name="semail" class="input-100" value="<!--{$semail}-->" />&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">性别</div></th>
	    <th width="18%"><div class="th-gap">会员ID</div></th>
		<th width="20%"><div class="th-gap">用户名</div></th>
		<th width="40%"><div class="th-gap">邮箱</div></th>
		<th><div class="th-gap">选择</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $user as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{if $volist.gender==1}-->男<!--{else}-->女<!--{/if}--></td>
	    <td align="center"><!--{$volist.userid}--></td>
		<td align="left"><!--{$volist.username}--></td>
		<td align="left"><!--{$volist.email}--></td>
		<td align="center"><a href="javascript:void(0);" onclick="select_user('<!--{$backinput}-->', '<!--{$backtips}-->', '<!--{$volist.userid}-->', '<!--{$volist.username}-->')">选择</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="5" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	</table>
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
</body>
</html>
<script type="text/javascript">
function select_user(inputid, tipid, userid, username){
    window.parent.$("#"+inputid).val(userid);
	if(tipid!='') {
		window.parent.$('#'+tipid).html(username);
	}
	window.parent.tb_remove();
}
</script>