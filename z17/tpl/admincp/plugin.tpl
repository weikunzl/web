<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>插件管理</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
</head>
<body>
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：插件中心<span>&gt;&gt;</span>插件管理</p></div>
  <div class="main-cont">
    <h3 class="title">插件管理</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="18%"><div class="th-gap">插件名</div></th>
		<th width="8%"><div class="th-gap">状态</div></th>
		<th width="12%"><div class="th-gap">适用于OEcms</div></th>
		<th width="11%"><div class="th-gap">最后更新</div></th>
		<th width="12%"><div class="th-gap">作者</div></th>
		<th><div class="th-gap">插件描述</div></th>
		<th width="10%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $plugins as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="left"><!--{$volist.name}--></td>
		<td align="center">
		<!--{if $volist.active==1}-->
		<a href="<!--{$cpfile}-->?c=plugin&a=inactive&plugin_id=<!--{$volist.pluginname}-->" title="点击禁用插件"><font color="green">已激活</font></a>
		<!--{else}-->
		<a href="<!--{$cpfile}-->?c=plugin&a=active&plugin_id=<!--{$volist.pluginname}-->" title="点击激活插件"><font color="#999999">未激活</font></a>
		<!--{/if}-->
		</td>
		<td align="left"><!--{$volist.forversion}--></td>
		<td align="left"><!--{$volist.lastupdate}--></td>
		<td align="left">
		<!--{if $volist.authorurl!=''}-->
		<a href="<!--{$volist.authorurl}-->" target="_blank"><!--{$volist.author}--></a>
		<!--{else}-->
		<!--{$volist.author}-->
		<!--{/if}-->
		</td>
		<td><!--{$volist.description}--></td>
		<td align="center"><a href="<!--{$cpfile}-->?c=plugin&a=del&plugin_id=<!--{$volist.pluginname}-->" onClick="{if(confirm('确定要删除该插件吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">对不起，您还没有安装任何插件。</td>
	  </tr>
	  <!--{/foreach}-->
	</table>
	<!--{if $total>1}-->
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='left'>总记录：<!--{$total}--></td>
	  </tr>
	</table>
	<!--{/if}-->
  </div>
</div>
<!--{/if}-->

<!--{if $a eq "setting"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：插件中心<span>&gt;&gt;</span>插件管理<span>&gt;&gt;</span><!--{$plugin_name}--></p></div>
  <div class="main-cont">
	<!--{assign var='pluginmanage' value=XHook::doAction(<!--{$plugin_event}-->)}-->
  </div>
</div>
<!--{/if}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>
