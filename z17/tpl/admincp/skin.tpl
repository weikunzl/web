<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>主题模板</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：界面模板<span>&gt;&gt;</span>主题模板</p></div>
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

	<h3 class="title">主题模板库</h3>
	
	<table cellspacing="10" cellpadding="5" width="80%" border="0">
	  <tr>      
	    
		<!--{foreach $skin as $volist}-->
		<td align="center" width="33%" style='line-height:28px;border-bottom:1px dashed #999999;'>
		  <a href="<!--{$cpfile}-->?c=skin&a=usetpl&id=<!--{$volist.tpldir}-->" onClick="{if(confirm('确定使用[<!--{$volist.tplname}-->]模板？')){return true;} return false;}">
		  <img alt="点击使用该模板" src="<!--{$volist.preview}-->" width="180" height="150" border="0" /></a><br />
		  <!--{$volist.tplname}--><span>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<!--{$cpfile}-->?c=skin&a=del&id=<!--{$volist.tpldir}-->" onClick="{if(confirm('确定要删除该模板吗？一旦删除无法恢复！')){return true;} return false;}">删除</a></span>
        </td>

		<!--{if $volist.i%3 == 0}-->
		</tr>
		<tr>
		<!--{/if}-->
		<!--{/foreach}-->
	  
	  </tr>
	</table>



  </div>
</div>
<!--{/if}-->

<!--{assign var='pluginevent' value=XHook::doAction('adm_footer')}-->
</body>
</html>
