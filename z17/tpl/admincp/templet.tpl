<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>模板文件</title>
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
  <div class="path"><p>当前位置：界面模板<span>&gt;&gt;</span>模板文件</p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<!--{$cpfile}-->?c=setting&a=main_style" class="btn-general"><span>配置界面风格</span></a>正在使用的主题模板</h3>

    <table cellspacing="10" cellpadding="0" width="80%" border="0">
      <tr>
        <td width="27%">
		<img src="<!--{$usingskin.preview}-->" width="240" height="180"  border="1" />	  
		</td>
		<td width="73%" style="line-height:25px;">
	    <!--{$usingskin.tplname}--> <em><!--{$usingskin.version}--></em><br>
	    <!--{$usingskin.author}--><br>
	    <!--{$usingskin.forversion}--><br>
		<!--{$usingskin.lastupdate}--><br />
	    <p><!--{$usingskin.desc}--></p>
	    </td>
      </tr>
    </table>


    <h3 class="title"><a href="<!--{$cpfile}-->?c=templet" class="btn-general"><span>返回模板根目录</span></a><a href="<!--{$cpfile}-->?c=templet&dir=<!--{$dir|urlencode}-->" class="btn-general"><span>当前目录：<!--{$dir}--></span></a>正在使用的主题模板文件</h3>
	<div class="search-area ">
	  <div class="item">
	  1、编辑，删除模板文件，必须确保目录“tpl/templets/<!--{$usingskin.tpldir}-->”有写入，删除权限，否则无法使用；<br />
	  2、文件必须为“<!--{$page_charset}-->”格式，修改和删除文件时请检查文件的使用情况，以免影响网站正常运行。
	  </div>
	</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">编号</div></th>
		<th width="10%"><div class="th-gap">类型</div></th>
		<th width="30%"><div class="th-gap">文件名</div></th>
		<th width="15%"><div class="th-gap">大小</div></th>
		<th width="18%"><div class="th-gap">最后修改时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $templets as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.i}--></td>
		<td align="center"><!--{if $volist.type==1}--><font color="green"><b>目录</b></font><!--{else}--><font color="blue"><b>文件</b></font><!--{/if}--></td>
		<td align="left"><!--{$volist.filename}--></td>
		<td align="center"><!--{$volist.size}--> Bytes</td>
		<td align="center"><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%H:%S"}--></td>
		<td align="center">
		<!--{if $volist.type==1}-->
		<a href="<!--{$cpfile}-->?c=templet&dir=<!--{$volist.dir|urlencode}-->" class="icon-show">打开</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=templet&a=delfolder&id=<!--{$volist.dir|urlencode}-->" onClick="{if(confirm('确定要删除该文件夹吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		<!--{else}-->
		<a href="<!--{$cpfile}-->?c=templet&a=edit&id=<!--{$volist.filepath|urlencode}-->" class="icon-edit">修改</a>&nbsp;&nbsp;
		<a href="<!--{$cpfile}-->?c=templet&a=delfile&id=<!--{$volist.filepath|urlencode}-->" onClick="{if(confirm('确定要删除该文件吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		<!--{/if}-->
		
		</td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="6" align="center">对不起，该目录没有文件！</td>
	  </tr>
	  <!--{/foreach}-->
	</table>
  </div>
</div>
<!--{/if}-->

<!--{if $a eq "edit"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：界面模板<span>&gt;&gt;</span>模板文件<span>&gt;&gt;</span>编辑文件</p></div>
  <div class="main-cont">

    <h3 class="title"><a href="<!--{$cpfile}-->?c=setting&a=main_style" class="btn-general"><span>配置界面风格</span></a>正在使用的主题模板</h3>

    <table cellspacing="10" cellpadding="0" width="80%" border="0">
      <tr>
        <td width="27%">
		<img src="<!--{$usingskin.preview}-->" width="240" height="180"  border="1" />	  
		</td>
		<td width="73%" style="line-height:25px;">
	    <!--{$usingskin.tplname}--> <em><!--{$usingskin.version}--></em><br>
	    <!--{$usingskin.author}--><br>
	    <!--{$usingskin.forversion}--><br>
		<!--{$usingskin.lastupdate}--><br />
	    <p><!--{$usingskin.desc}--></p>
	    </td>
      </tr>
    </table>

    <h3 class="title"><a href="<!--{$cpfile}-->?c=templet" class="btn-general"><span>返回模板根目录</span></a><a href="<!--{$cpfile}-->?c=templet&dir=<!--{$dir|urlencode}-->" class="btn-general"><span>当前目录：<!--{$dir}--></span></a>编辑模板文件</h3>
	<div class="search-area ">
	  <div class="item">
	  1、编辑，删除模板文件，必须确保目录“tpl/templets/<!--{$usingskin.tpldir}-->”有写入，删除权限，否则无法使用；<br />
	  2、文件必须为“<!--{$page_charset}-->”格式，修改和删除文件时请检查文件的使用情况，以免影响网站正常运行。
	  </div>
	</div>
    <form name="myform" id="myform" method="post" action="<!--{$cpfile}-->?c=templet&a=saveedit" onsubmit='return checkform();' />
	<input type="hidden" name="id" value="<!--{$id}-->" />
	<input type="hidden" name="dir" value="<!--{$dir}-->" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class='hback_1' width="10%">文件名 </td>
		<td class='hback' width="80%"><b><font color="blue">tpl/templets/<!--{$usingskin.tpldir}--><!--{$id}--></font></b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>文件内容 <span class='f_red'>*</span></td>
		<td class='hback'><textarea name="content" id="content" style="width:98%;height:300px;display:;overflow:auto;"><!--{$content}--></textarea>  <br /><span id='dcontent' class='f_red'></span></td>
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

<!--{if $a eq "select"}-->
<div class="main-wrap">
  <div class="main-cont">
    <h3 class="title">正在使用的主题 [<!--{$usingskin.tplname}-->] 模板目录：tpl/templets/<!--{$usingskin.tpldir}--></h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">序号</div></th>
		<th width="35%"><div class="th-gap">模板文件名</div></th>
		<th width="15%"><div class="th-gap">大小</div></th>
		<th width="25%"><div class="th-gap">最后修改时间</div></th>
		<th><div class="th-gap">选择</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <!--{foreach $templets as $volist}-->
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><!--{$volist.i}--></td>
		<td align="left"><!--{$volist.filename}--></td>
		<td align="center"><!--{$volist.size}--> Bytes</td>
		<td align="center"><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%H:%S"}--></td>
		<td align="center"><a href="javascript:void(0);" onclick="selecttpl('<!--{$inputid}-->', '<!--{$volist.tplname}-->')">选择</a></td>
	  </tr>
	  <!--{foreachelse}-->
      <tr>
	    <td colspan="5" align="center">对不起，该主题下没有tpl模板，请检查。</td>
	  </tr>
	  <!--{/foreach}-->
	</table>
  </div>
</div>
<!--{/if}-->


<!--{if $fromtype != 'jdbox'}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
<!--{/if}-->
</body>
</html>
<script type="text/javascript">
//编辑验证
function checkform() {
	var t = "";
	var v = "";

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("模板文件内容不能为空", t);
		return false;
	}
	return true;
}
//选择模板文件
function selecttpl(inputid, tplname) {
	window.parent.$('#'+inputid).val(tplname);
	window.parent.tb_remove();
}
</script>
