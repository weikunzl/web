<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>SEO设置</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=seo">SEO设置</a></p></div>
  <div class="main-cont">
    <h3 class="title">SEO设置</h3>
	<form action="<!--{$cpfile}-->?c=seo&a=saveupdate" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="7%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">标识</div></th>
		<th width="15%"><div class="th-gap">名称</div></th>
		<th width="18%"><div class="th-gap">Meta标题</div></th>
		<th width="18%"><div class="th-gap">Meta描述</div></th>
		<th width="18%"><div class="th-gap">Meta关键字</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $seo as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<!--{$volist.id}-->" onClick="checkItem(this, 'chkAll')"></td>
		<td align="left"><!--{$volist.idmark}--></td>
		<td><input type='text' name='chname_<!--{$volist.id}-->' id='chname_<!--{$volist.id}-->' class='input-100' value="<!--{$volist.chname}-->" /></td>
		<td><input type='text' name='title_<!--{$volist.id}-->' id='title_<!--{$volist.id}-->' class='input-150' value="<!--{$volist.title}-->" /></td>
		<td><input type='text' name='description_<!--{$volist.id}-->' id='description_<!--{$volist.id}-->' class='input-150' value="<!--{$volist.description}-->" /></td>
		<td><input type='text' name='keyword_<!--{$volist.id}-->' id='keyword_<!--{$volist.id}-->' class='input-150' value="<!--{$volist.keyword}-->" /></td>
		<td align="center"><a href="<!--{$cpfile}-->?c=seo&a=edit&id=<!--{$volist.id}-->" class="icon-edit">编辑</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <!--{/foreach}-->
	  <!--{if $total>0}-->
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6"><input class="button" name="btn_del" type="submit" value="更新保存" class="button"></td>
	  </tr>
	  <!--{/if}-->
	</table>
	</form>
  </div>
</div>
<!--{/if}-->

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span>SEO设置</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<!--{$cpfile}-->?c=seo" class="btn-general"><span>返回列表</span></a>编辑SEO设置</h3>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=seo" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>标 识 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><!--{$seo.idmark}--></td>
	  </tr>
	  <tr>
		<td class='hback_1'>频道名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="chname" id="chname" class="input-200" value="<!--{$seo.chname}-->" />  <span id='dchname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta标题 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="title" id="title" class="input-200" value="<!--{$seo.title}-->" />  <span id='dtitle' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name='description' id='description' style="width:40%;height:60px;overflow:hidden;"><!--{$seo.description}--></textarea>  <span id='ddescription' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><textarea name='keyword' id='keyword' style="width:40%;height:60px;overflow:hidden;"><!--{$seo.keyword}--></textarea>  <span id='dkeyword' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>描 述<span class="f_red"></span> </td>
		<td class='hback'><!--{$seo.intro|nl2br}--></td>
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
