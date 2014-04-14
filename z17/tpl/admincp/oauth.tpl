<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>支付方式</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->

<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=oauth">多平台登录</a></p></div>
  <div class="main-cont">
    <h3 class="title">多平台登录</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="15%"><div class="th-gap">图标</div></th>
		<th width="15%"><div class="th-gap">名称</div></th>
		<th width="30%"><div class="th-gap">描述</div></th>
		<th width="10%"><div class="th-gap">开启状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $oauth as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.authid}--></td>
	    <td align="center"><img src="<!--{$urlpath}--><!--{$volist.logo}-->"></td>
		<td><!--{$volist.authname}--></td>
		<td><!--{$volist.intro}--></td>
		<td align="center">
		<!--{if $volist.flag == 1}-->
		<font color="green">开启</font>
		<!--{else}-->
		<font color="#999999">关闭</font>
		<!--{/if}-->
		</td>
		<td align="center">
		<a href="<!--{$cpfile}-->?c=oauth&a=edit&id=<!--{$volist.authid}-->" class="icon-set">设置</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
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

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span>编辑多平台登录</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=oauth" class="btn-general"><span>返回列表</span></a>编辑多平台登录</h3>
	<div class="search-area3">
	  <div class="item">
	  QQ登录申请地址：<a href="http://connect.qq.com/intro/login/" target="_blank">http://connect.qq.com/intro/login/</a><br />
	  新浪微博申请地址：<a href="http://open.weibo.com/connect" target="_blank">http://open.weibo.com/connect</a><br />
	  开心网申请地址：<a href="http://wiki.open.kaixin001.com/index.php?id=%E5%BC%80%E5%BF%83%E8%BF%9E%E6%8E%A5" target="_blank">http://wiki.open.kaixin001.com/index.php?id=开心连接</a>
	  </div>
	</div>



    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=oauth&a=saveedit" onsubmit='return checkform();' />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <!-- 名称 -->
	  <tr>
		<td class='hback_1' width="15%">名称 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="authname" id="authname" value="<!--{$oauth.authname}-->" class="input-150" /> <span id="dauthname" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>APP ID <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="appid" id="appid" value="<!--{$oauth.appid}-->" class="input-txt" /> <span id="dappid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>APP Key <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="appkey" id="appkey" value="<!--{$oauth.appkey}-->" class="input-txt" /> <span id="dappkey" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>APP Secret <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="secret" id="secret" value="<!--{$oauth.secret}-->" class="input-txt" /> <span id="dsecret" class='f_red'></span> (没有请留空)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>开启状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<!--{if $oauth.flag=='1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp; <input type="radio" name="flag" id="flag" value="0"<!--{if $oauth.flag=='0'}--> checked<!--{/if}--> />关闭 <span id='dflag' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" value="<!--{$oauth.orders}-->" class="input-s" /> <span id='dorders' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>描述 </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:100px;overflow:auto;"><!--{$oauth.intro}--></textarea> <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
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

	t = "authname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("名称不能为空", t);
		return false;
	}
   
	return true;
}
</script>