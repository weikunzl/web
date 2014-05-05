<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>管理员</title>
<!--{include file="<!--{$cptplpath}-->headerjs.tpl"}-->
<!--{assign var='pluginevent' value=XHook::doAction('adm_head')}-->
</head>
<body>
<!--{assign var='pluginevent' value=XHook::doAction('adm_main_top')}-->
<!--{if $a eq "run"}-->
<div class="main-wrap">
  <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
  <input type="hidden" name="a" value="savebase" />
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting">站点设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">站点信息设置</h3>
	<div class="set-area">
	  <div class="form web-info-form">
		<div class="form-row">
		  <label class="form-field">网站名称</label>
		  <div class="form-cont"><input name="sitename" id="sitename" class="input-txt" type="text" value="<!--{$sitename}-->" /><span id="dsitename"></span></div>
		</div>
		<div class="form-row">
		  <label class="form-field">网站地址</label>
		  <div class="form-cont"><input name="siteurl" id="siteurl" class="input-txt" type="text" value="<!--{$siteurl}-->" /><span id="dsiteurl"></span><p class="form-tips">（以“http://”开头，“/”结束）</p></div>
		</div>
		<div class="form-row">
		  <label class="form-field">备案号码</label>
		  <div class="form-cont"><input name="icpcode" id="icpcode" class="input-txt" type="text" value="<!--{$icpcode}-->" /><span id="dicpcode"></span><p class="form-tips">（网站备案信息将显示在页面底部）</p></div>
		</div>
		<div class="form-row">
		  <label for="declare" class="form-field">流量统计代码</label>
		  <div class="form-cont"><textarea name="tjcode" id="tjcode" class="input-area area-s4 code-area" style="width:500px;height:60px;"><!--{$tjcode}--></textarea></div>
		</div>

		<div class="form-row">
		  <label for="declare" class="form-field">会员中心头部 </label>
		  <div class="form-cont">
		  <input type="radio" name="usercpskin" id="usercpskin" value="0"<!--{if $config.usercpskin=='0'}--> checked<!--{/if}--> /> 默认头部，
		  <input type="radio" name="usercpskin" id="usercpskin" value="1"<!--{if $config.usercpskin=='1'}--> checked<!--{/if}--> /> 使用前台模板风格头部
		  <p class="form-tips">温馨提示：选择使用前台风格头部，必须保证tpl/usercp/目录下有当前风格的头部文件，否则无法使用。</p>
		  </div>
		</div>

	  </div>
	</div>
    
	<h3 class="title">网站LOGO设置</h3>
	<div class="set-area">
	  <div class="form web-info-form">
	    <div class="form-row">
		  <label class="form-field">LOGO图片</label>
		  <div class="form-cont">

		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="logo" id="logo" value="<!--{$logo}-->" class="input-txt" /> <span id='dlogo' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<!--{$cpfile}-->?c=upload&formname=myform&module=upload&uploadinput=logo&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
			
		  </div>
		</div>
		<div class="form-row">
		  <label class="form-field">LOGO大小</label>
		  <div class="form-cont">宽：<input name="logowidth" id="logowidth" type="text" size="5" value="<!--{$logowidth}-->" />px；高：<input name="logoheight" id="logoheight" type="text" size="5" value="<!--{$logoheight}-->" />px</div>
		</div>
        
		<div class="form-row">
		  <label class="form-field">LOGO预览</label>
		  <div class="form-cont">
		  <span id="previewsrc">
		  <!--{if $logo != ''}-->
		  <img src='<!--{$urlpath}--><!--{$logo}-->' />
		  <!--{/if}-->
		  </span>
		  </div>
		</div>

		<div class="btn-area"><input type="submit" name="btn_save" class="button" value="更新保存" /></div>
	  </div>
	</div>
  </div>
  </form>
</div>
<!--{/if}-->

<!--{if $a eq "footer"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=footer">网站底部信息</a></p></div>
  <div class="main-cont">
	<h3 class="title">网站底部信息</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="savefooter" />
	<table cellpadding='2' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>底部信息：</td>
		<td class='hback' width='85%'>
		  <textarea name="content" id="content" style="overflow:auto;width:98%;height:300px;display:none;"><!--{$content}--></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		</td>
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

<!--{if $a eq "upload"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=upload">上传图片设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">上传图片设置，本功能需要PHP环境支持GD库才生效
缩略图按原图比例缩小，宽高不会超过本设定，但都不能小于60px</h3>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="saveupload" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
	    <td class='hback_1'>PHP环境信息：</td>
		<td><font color="green">PHP环境允许最大上传：<!--{$php_upload_maxsize}-->；GD库：<!--{$gd_version}--></font></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>设置最大上传：</td>
		<td><input type='text' name='uploadmaxsize' id='uploadmaxsize' value='<!--{$uploadmaxsize}-->' class='input-s' />M (大小不能超过PHP环境允许的最大值)</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="20%">图片最大尺寸： </td>
		<td class='hback' width="80%">宽：<input type="text" name="maxthumbwidth" id="maxthumbwidth" class='input-s' value="<!--{$maxthumbwidth}-->" /> 像素（px）  高：<input type="text" name="maxthumbheight" id="maxthumbheight" class='input-s' value="<!--{$maxthumbheight}-->" /> 像素（px）<br />
	如果用户上传一些尺寸很大的数码图片，则程序会按照本设置进行缩小该图片并显示，<br />比如可以设置为 宽：1024px，高：768px，但都不能小于300px。设置为0，则不做任何处理。</td>
	  </tr>

	  <tr>
		<td class='hback_1'>文章缩略图大小： </td>
		<td class='hback'>宽：<input type="text" name="thumbwidth" id="thumbwidth" class='input-s' value="<!--{$thumbwidth}-->" /> 像素（px） ， 高：<input type="text" name="thumbheight" id="thumbheight" class='input-s' value="<!--{$thumbheight}-->" /> 像素（px）</td>
	  </tr>

	  <tr>
		<td class='hback_1'>会员头像大小： </td>
		<td class='hback'>宽：<input type="text" name="avatarwidth" id="avatarwidth" class='input-s' value="<!--{$avatarwidth}-->" /> 像素（px） ， 高：<input type="text" name="avatarheight" id="avatarheight" class='input-s' value="<!--{$avatarheight}-->" /> 像素（px）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员相册缩略图： </td>
		<td class='hback'>宽：<input type="text" name="albumwidth" id="albumwidth" class='input-s' value="<!--{$albumwidth}-->" /> 像素（px） ， 高：<input type="text" name="albumheight" id="albumheight" class='input-s' value="<!--{$albumheight}-->" /> 像素（px）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>活动图片缩略图： </td>
		<td class='hback'>宽：<input type="text" name="partywidth" id="partywidth" class='input-s' value="<!--{$partywidth}-->" /> 像素（px） ， 高：<input type="text" name="partyheight" id="partyheight" class='input-s' value="<!--{$partyheight}-->" /> 像素（px）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>成功故事缩略图： </td>
		<td class='hback'>宽：<input type="text" name="storywidth" id="storywidth" class='input-s' value="<!--{$storywidth}-->" /> 像素（px） ， 高：<input type="text" name="storyheight" id="storyheight" class='input-s' value="<!--{$storyheight}-->" /> 像素（px）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>心理测试缩略图： </td>
		<td class='hback'>宽：<input type="text" name="testwidth" id="testwidth" class='input-s' value="<!--{$testwidth}-->" /> 像素（px） ， 高：<input type="text" name="testheight" id="testheight" class='input-s' value="<!--{$testheight}-->" /> 像素（px）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记缩略图： </td>
		<td class='hback'>宽：<input type="text" name="diarywidth" id="diarywidth" class='input-s' value="<!--{$diarywidth}-->" /> 像素（px） ， 高：<input type="text" name="diaryheight" id="diaryheight" class='input-s' value="<!--{$diaryheight}-->" /> 像素（px）</td>
	  </tr>

	</table>
	<h3 class="title">图片水印设置（需要GD库支持）</h3>
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class="hback_1" width="20%">是否启用： </td>
		<td class="hback" width="80%"><input type="radio" name="watermarkflag" value="1"<!--{if $watermarkflag==1}--> checked<!--{/if}--> />是，<input type="radio" name="watermarkflag" value="0"<!--{if $watermarkflag==0}--> checked<!--{/if}--> />否</td>
	  </tr>
	  <tr>
		<td class="hback_1">水印图片地址： </td>
		<td class="hback"><input type="text" name="watermarkfile" id="watermarkfile" size="45" value="<!--{$watermarkfile}-->" /> <br />默认为tpl/static/images/watermark.png，只支持JPG/GIF/PNG格式，推荐用透明的png图片 <br /><font color="red">注意图片地址相对于网站根目录</font></td>
	  </tr>
	  <tr>
		<td class="hback_1">水印位置： </td>
		<td class="hback"><input type="radio" name="watermarkpos" value="1"<!--{if $watermarkpos==1}--> checked<!--{/if}--> />顶端居左 <input type="radio" name="watermarkpos" value="2"<!--{if $watermarkpos==2}--> checked<!--{/if}--> />顶端居右 <input type="radio" name="watermarkpos" value="3"<!--{if $watermarkpos==3}--> checked<!--{/if}--> />底端居左 <input type="radio" name="watermarkpos" value="4"<!--{if $watermarkpos==4}--> checked<!--{/if}--> />底端居右  <input type="radio" name="watermarkpos" value="0"<!--{if $watermarkpos==0}--> checked<!--{/if}--> />随机</td>
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

<!--{if $a eq "seo"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>SEO设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=seo">首页SEO设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">首页SEO设置</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="saveseo" />
	<table cellpadding='2' cellspacing='1' class='tab'>
	  <tr>
		<td class="hback_none" width="15%">首页标题： </td>
		<td class="hback" width="85%">&nbsp;&nbsp;&nbsp;<input type="text" name="sitetitle" id="sitetitle" size="45" value="<!--{$sitetitle}-->" /></td>
	  </tr>
	  <tr>
		<td class='hback_none'>首页Meta描述：</td>
		<td class='hback_none'><textarea name="metadescription" id="metadescription" style="width:50%;height:80px;display:;overflow:auto;"><!--{$metadescription}--></textarea></td>
	  </tr>
	  <tr>
		<td class='hback_none'>首页Meta关键字：</td>
		<td class='hback_none'><textarea name="metakeyword" id="metakeyword" style="width:50%;height:80px;display:;overflow:auto;"><!--{$metakeyword}--></textarea><br />多个请用英文,逗号隔开。</td>
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

<!--{if $a eq "rewrite"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>SEO设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=rewrite">站点伪静态设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">站点伪静态设置（开启Rewrite功能会将URL静态化，提高搜索引擎的抓取）</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="saverewrite" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class="hback_c1" width="20%">页面访问方式 </td>
		<td class="hback_c1" width="80%"><input type="radio" name="urlsuffix" id="urlsuffix" value="php"<!--{if $urlsuffix=='php'}--> checked<!--{/if}--> />PHP动态页&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="urlsuffix" id="urlsuffix" value="rewrite"<!--{if $urlsuffix=='rewrite'}--> checked<!--{/if}--> />HTML伪静态 <br /><font color="red"></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	<h3 class="title">Apache服务器配置Rewrite规则：</h3>
	<table cellpadding='5' cellspacing='5' class='tab'>

	  <td style="color:#666666;line-height:20px;">
	  1、确保Apache安装了Rewite模块，并将Apache配置文件中的AllowOverride设置为All；<br />2、找到站点根目录下的.htaccess文件，将“RewriteEngine off”前面的#号去掉，并改为“RewriteEngine on”；<br />3、在本设置中开启该功能；<br />4、如果需要在本设置中关闭该功能，请将.htaccess文件中相关代码用#号注释掉；<br />
      (温馨提示：选择THML伪静态时，空间必须支持伪静态功能。)</font><br />
		Apache下的伪静态正则表达式请看网站doc目录下的.htaccess<br />IIS下的伪静态正则表达式请看网站doc目录下httpd.ini。<br />
	  </td>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{/if}-->

<!--{if $a eq "mail"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=mail">邮箱设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">邮箱设置</h3>
	<div class="search-area ">
	  <div class="item">
	  <font color="green"><b>温馨提示：</b></font>
	  发送方式设置为SMTP方式时,发信邮箱必须支持smtp并且开启smtp服务才能发送成功。
	  <br />
	  测试邮件发送：（请先设置好以下相关信息保存后再测试）&nbsp;&nbsp;&nbsp;
	  <a href="javascript:void(0);" onclick="testMail('test_result');">点击测试邮件</a>&nbsp;&nbsp;&nbsp; <span id='test_result'></span>
	  </div>
	</div>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="savemail" />
	<table cellpadding='2' cellspacing='1' class='tab'>
	  <tr>
		<td class="hback_1" width="15%">邮件发送 </td>
		<td class="hback" width="85%">
		  <input type="radio" name="flag" id="flag" value="1"<!--{if true === $mailinfo.flag}--> checked<!--{/if}--> />开启&nbsp;&nbsp;
		  <input type="radio" name="flag" id="flag" value="0"<!--{if false === $mailinfo.flag}--> checked<!--{/if}--> />关闭
		</td>
	  </tr>

	  <tr>
		<td class="hback_1">SMTP服务器 </td>
		<td class="hback"><input type="text" name="smtp" id="smtp" value="<!--{$mailinfo.smtp}-->" class="input-txt" /> (如：smtp.163.com)</td>
	  </tr>
	  <tr>
		<td class="hback_1">SMTP端口 </td>
		<td class="hback"><input type="text" name="port" id="port" value="<!--{$mailinfo.port}-->" class="input-s" />  (如：25)</td>
	  </tr>
	  <tr>
		<td class="hback_1">发信人名称 </td>
		<td class="hback"><input type="text" name="sender" id="sender" value="<!--{$mailinfo.sender}-->" class="input-txt" /></td>
	  </tr>
	  <tr>
		<td class="hback_1">发信邮箱 </td>
		<td class="hback"><input type="text" name="email" id="email" value="<!--{$mailinfo.email}-->" class="input-txt" /> (如：test@163.com)</td>
	  </tr>
	  <tr>
		<td class="hback_1">邮箱密码 </td>
		<td class="hback"><input type="password" name="password" id="password" value="<!--{$mailinfo.password}-->" class="input-txt" /> (如：123456)</td>
	  </tr>
	  <tr>
		<td class="hback_1">发送方式 </td>
		<td class="hback">
		<input type="radio" name="type" id="type" value="0"<!--{if $mailinfo.type==0}--> checked<!--{/if}--> />Mail方式（Linux,Unix服务器下有效），
		<input type="radio" name="type" id="type" value="1"<!--{if $mailinfo.type==1}--> checked<!--{/if}--> />SMTP方式（Windows服务器有效）
		<br />
		<font color="#999999">当前使用的服务器为：<!--{$os}--></font>
		</td>
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

<!--{if $a eq "sms"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>手机短信营销<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=sms">短信设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">短信设置</h3>
	<div class="search-area5">
	  <div class="item">
	  <font color="green"><b>温馨提示：</b></font>
	  如果您还没有发送手机短信接口的账号和密码，<a href="http://www.phpcoo.com/contact" target="_blank">点击此处进行申请</a>。&nbsp;&nbsp;
	  </div>
	</div>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
	<input type='hidden' name='a' id='a' value="savesmsconfig" />
	<table cellpadding='2' cellspacing='1' class='tab'>
	  <tr>
	    <td class="hback_c1" colspan="3" align='center'><b>短信设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>收费类别：<span class="f_red"></span> </td>
		<td class='hback_none' width='70%'>
		  <input name='itemmaxsort' id='itemmaxsort' type='hidden' value='<!--{$smsfeenums}-->' /> <span id='ditemmaxsort' class='f_red'></span>
		  <table border='0' cellpadding='0' cellspacing='0' class='table'>
		    <tr id="list-top">
			  <td class='hback_1' align="center" width='20%'>序号</td>
			  <td class='hback_1' align="center" width='20%'>排序</td>
			  <td class='hback_1' align="center" width='20%'>短信条数</td>
			  <td class='hback_1' align="center" width='20%'>需要现金(元)</td>
			  <td class='hback_1' align="center">操作</td>
			</tr>
			<!--{if !empty($smsfee)}-->
			<!--{foreach $smsfee as $val}-->
			<tr class='itemlist' onMouseOver="overColor(this)" onMouseOut="outColor(this)">
			  <td class='hback' align='center'> 类别<!--{$val.i}--></td>
			  <td class='hback' align='center'><input type='text' name='item_orders_<!--{$val.i}-->' id='item_orders_<!--{$val.i}-->' class='input-s' value="<!--{$val.orders}-->" /></td>
			  <td class='hback' align='center'><input type='text' name='item_nums_<!--{$val.i}-->' id='item_nums_<!--{$val.i}-->' class='input-s' value="<!--{$val.nums}-->" /> 条</td>
			  <td class='hback' align='center'><input type='text' name='item_money_<!--{$val.i}-->' id='item_money_<!--{$val.i}-->' class='input-s' value="<!--{$val.money}-->" /> 元</td>
			  <td class='hback' align='center'><a href='javascript:void(0);' onclick='smsfee_countnums();smsfee_del($(this), <!--{$val.i}-->);'>移除</a></td>
			</tr>
			<!--{/foreach}-->
			<!--{/if}-->
		  </table>
		</td>
		<td class='hback_none' width='15%'></td>
	  </tr>
	  <tr>
		<td class='hback_none' align='right'><a href="javascript:void(0);" onclick="return smsfee_add($(this));">添加收费类别</a></td>
		<td class='hback_none' colspan="2"><span id="load_itemtips"></span> &nbsp;&nbsp;</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none' colspan='2'><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
	  </tr>
	</form>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="savesms" />
	<table cellpadding='2' cellspacing='1' class='tab'>
	  <tr>
	    <td class="hback_c3" colspan="2" align='center'><b>接口设置</b></td>
	  </tr>
	  <tr>
		<td class="hback_1" width="15%">手机短信 </td>
		<td class="hback" width="85%">
		  <input type="radio" name="flag" id="flag" value="1"<!--{if $smsinfo.flag==true}--> checked<!--{/if}--> />开启&nbsp;&nbsp;
		  <input type="radio" name="flag" id="flag" value="0"<!--{if $smsinfo.flag==false}--> checked<!--{/if}--> />关闭
		</td>
	  </tr>
	  <tr>
		<td class="hback_1">SMS帐号： <span class='f_red'></span></td>
		<td class="hback"><input type="text" name="account" id="account" value="<!--{$smsinfo.account}-->" class="input-150" /> <span class='f_red' id="daccount"></span> <font color="#999999">(需要申请)</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="blue">可用短信：</font><span id='balance'></span> &nbsp;&nbsp;<a href="javascript:void(0);" onclick="getSmsBalance('balance');">点击查询</a></td>
	  </tr>
	  
	  <tr>
		<td class="hback_1">SMS密码： <span class='f_red'></span></td>
		<td class="hback"><input type="password" name="password" id="password" value="<!--{$smsinfo.password}-->" class="input-150" /> <span class='f_red' id="dpassword"></span> <font color="#999999">(需要申请)</font></td>
	  </tr>
	  <tr>
		<td class="hback_1">SMS密钥： <span class='f_red'></span></td>
		<td class="hback"><input type="text" name="key" id="key" value="<!--{$smsinfo.key}-->" class="input-150" /> <span class='f_red' id="dkey"></span> <font color="#999999">(可为空)</font></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>短信发送人：</td>
		<td class='hback'><input type='text' name='sender' id='sender' value="<!--{$smsinfo.sender}-->" class='input-150' /> <span class='f_red' id="dsender"></span> <font color="#999999">(每条短信后面会出现发信人，注意一条短信最多70个字符。)</font></td>
	  </tr>
	  <tr>
		<td class="hback_1">测试手机号码： <span class='f_red'></span></td>
		<td class="hback">
		<input type="text" name="testmobile" id="testmobile" value="<!--{$smsinfo.testmobile}-->" class="input-100" /> <span class='f_red' id="dtestmobile"></span> <font color="#999999">(测试短信接口，接收信息用的手机号码。)</font>
		
		&nbsp;&nbsp;<span id='test_result'></span>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="testSms('test_result');">点击测试</a>
		</td>
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

<!--{if $a eq "safety"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=safety">安全设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">安全设置</h3>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="savesafety" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>后台登录验证码：</td>
		<td class="hback" width='85%'><input type="radio" name="admincode" value="1"<!--{if $admincode=='1'}--> checked<!--{/if}--> />开启，<input type='radio' name='admincode' value='0'<!--{if $admincode=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员评论验证码：</td>
		<td class="hback"><input type="radio" name="commentcode" value="1"<!--{if $commentcode=='1'}--> checked<!--{/if}--> />开启，<input type='radio' name='commentcode' value='0'<!--{if $commentcode=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员注册验证码：</td>
		<td class="hback"><input type="radio" name="regcode" value="1"<!--{if $regcode=='1'}--> checked<!--{/if}--> />开启，<input type='radio' name='regcode' value='0'<!--{if $regcode=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员登录验证码：</td>
		<td class="hback"><input type="radio" name="logincode" value="1"<!--{if $logincode=='1'}--> checked<!--{/if}--> />开启，<input type='radio' name='logincode' value='0'<!--{if $logincode=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>取回密码验证码：</td>
		<td class="hback"><input type="radio" name="forgetcode" value="1"<!--{if $forgetcode=='1'}--> checked<!--{/if}--> />开启，<input type='radio' name='forgetcode' value='0'<!--{if $forgetcode=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
	    <td class="hback_1">过滤字符：</td>
		<td class="hback"><textarea name="forbidargs" id="forbidargs" style="width:60%;height:100px;overflow:auto;"><!--{$config.forbidargs}--></textarea><br /><font color="#999999">多个字符请用英文,号隔开。<br />可手动修改文件：source/conf/forbidargs.php</font></td>
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

<!--{if $a eq "index_style"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：界面模板<span>&gt;&gt;</span>主题模板<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=index_style">首页配置</a></p></div>
  <div class="main-cont">
	<h3 class="title">首页配置</h3>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="save_index_style" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>最新文章：</td>
		<td class="hback" width='85%'><input type="text" name="infonum" id="infonum" class="input-s" value="<!--{$infonum}-->" />条，标题长度：<input type="text" name="infolen" id="infolen" class="input-s" value="<!--{$infolen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新会员：</td>
		<td class="hback"><input type="text" name="usernum" id="usernum" class="input-s" value="<!--{$usernum}-->" />条，标题长度：<input type="text" name="userlen" id="userlen" class="input-s" value="<!--{$userlen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新日记：</td>
		<td class="hback"><input type="text" name="diarynum" id="diarynum" class="input-s" value="<!--{$diarynum}-->" />条，标题长度：<input type="text" name="diarylen" id="diarylen" class="input-s" value="<!--{$diarylen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新约会：</td>
		<td class="hback"><input type="text" name="datingnum" id="datingnum" class="input-s" value="<!--{$datingnum}-->" />条，标题长度：<input type="text" name="datinglen" id="datinglen" class="input-s" value="<!--{$datinglen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新活动：</td>
		<td class="hback"><input type="text" name="partynum" id="partynum" class="input-s" value="<!--{$partynum}-->" />条，标题长度：<input type="text" name="partylen" id="partylen" class="input-s" value="<!--{$partylen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新故事：</td>
		<td class="hback"><input type="text" name="storynum" id="storynum" class="input-s" value="<!--{$storynum}-->" />条，标题长度：<input type="text" name="storylen" id="storylen" class="input-s" value="<!--{$storylen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新测试：</td>
		<td class="hback"><input type="text" name="ceshinum" id="ceshinum" class="input-s" value="<!--{$ceshinum}-->" />条，标题长度：<input type="text" name="ceshilen" id="ceshilen" class="input-s" value="<!--{$ceshilen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新微播：</td>
		<td class="hback"><input type="text" name="weibonum" id="weibonum" class="input-s" value="<!--{$weibonum}-->" />条，标题长度：<input type="text" name="weibolen" id="weibolen" class="input-s" value="<!--{$weibolen}-->" />个字符</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>最新单页：</td>
		<td class="hback"><input type="text" name="aboutnum" id="aboutnum" class="input-s" value="<!--{$aboutnum}-->" />条，标题长度：<input type="text" name="aboutlen" id="aboutlen" class="input-s" value="<!--{$aboutlen}-->" />个字符</td>
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

<!--{if $a eq "main_style"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：界面模板<span>&gt;&gt;</span>主题模板<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=index_style">界面配置</a></p></div>
  <div class="main-cont">
	<h3 class="title">界面配置</h3>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="save_main_style" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>文章分页：</td>
		<td class="hback" width='85%'>每页显示 <input type="text" name="infopagesize" id="infopagesize" class="input-s" value="<!--{$infopagesize}-->" />条，最多显示<input type="text" name="infomaxpage" id="infomaxpage" class="input-s" value="<!--{$infomaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>会员分页：</td>
		<td class="hback">每页显示 <input type="text" name="userpagesize" id="userpagesize" class="input-s" value="<!--{$userpagesize}-->" />条，最多显示<input type="text" name="usermaxpage" id="usermaxpage" class="input-s" value="<!--{$usermaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>日记分页：</td>
		<td class="hback">每页显示 <input type="text" name="diarypagesize" id="diarypagesize" class="input-s" value="<!--{$diarypagesize}-->" />条，最多显示<input type="text" name="diarymaxpage" id="diarymaxpage" class="input-s" value="<!--{$diarymaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>求助分页：</td>
		<td class="hback">每页显示 <input type="text" name="askpagesize" id="askpagesize" class="input-s" value="<!--{$askpagesize}-->" />条，最多显示<input type="text" name="askmaxpage" id="askmaxpage" class="input-s" value="<!--{$askmaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>约会分页：</td>
		<td class="hback">每页显示 <input type="text" name="datingpagesize" id="datingpagesize" class="input-s" value="<!--{$datingpagesize}-->" />条，最多显示<input type="text" name="datingmaxpage" id="datingmaxpage" class="input-s" value="<!--{$datingmaxpage}-->" />页</td>
	  </tr>

	  <tr>
	    <td class='hback_1'>活动分页：</td>
		<td class="hback">每页显示 <input type="text" name="partypagesize" id="partypagesize" class="input-s" value="<!--{$partypagesize}-->" />条，最多显示<input type="text" name="partymaxpage" id="partymaxpage" class="input-s" value="<!--{$partymaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>故事分页：</td>
		<td class="hback">每页显示 <input type="text" name="storypagesize" id="storypagesize" class="input-s" value="<!--{$storypagesize}-->" />条，最多显示<input type="text" name="storymaxpage" id="storymaxpage" class="input-s" value="<!--{$storymaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>微播分页：</td>
		<td class="hback">每页显示 <input type="text" name="weibopagesize" id="weibopagesize" class="input-s" value="<!--{$weibopagesize}-->" />条，最多显示<input type="text" name="weibomaxpage" id="weibomaxpage" class="input-s" value="<!--{$weibomaxpage}-->" />页</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>测试分页：</td>
		<td class="hback">每页显示 <input type="text" name="ceshipagesize" id="ceshipagesize" class="input-s" value="<!--{$ceshipagesize}-->" />条，最多显示<input type="text" name="ceshimaxpage" id="ceshimaxpage" class="input-s" value="<!--{$ceshimaxpage}-->" />页</td>
	  </tr>

	  <tr>
	    <td class='hback_1'>评论分页：</td>
		<td class="hback">每页显示 <input type="text" name="commentpagesize" id="commentpagesize" class="input-s" value="<!--{$commentpagesize}-->" />条</td>
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

<!--{if $a eq "order"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=order">订单设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">订单设置</h3>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="saveorder" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>是否支持非会员购物：</td>
		<td class="hback" width='85%'><input type="radio" name="buynon" id="buynon" value="1"<!--{if $buynon=='1'}--> checked<!--{/if}--> />开启，<input type='radio' name='buynon' id="buynon" value='0'<!--{if $buynon=='0'}--> checked<!--{/if}--> />关闭 （启用后无需注册会员就可以直接下订单购买商品）</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>商品/订单币种：</td>
		<td class="hback"><input type="text" name="currency" id="currency" class="input-s" value="<!--{$currency}-->" /> （请填写国际币种，USD,CNY,EUR,HKD等，不填写默认为CNY）</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>币种符号：</td>
		<td class="hback"><input type="text" name="symbol" id="symbol" class="input-s" value="<!--{$symbol}-->" /></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>订单税率：</td>
		<td class="hback"><input type="text" name="taxrate" id="taxrate" class="input-s" value="<!--{$taxrate}-->" />%  （大于0表示顾客将承担设定的利率订单发票税金）</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>订单列表显示数：</td>
		<td class="hback"><input type="text" name="orderpagesize" id="orderpagesize" class="input-s" value="<!--{$orderpagesize}-->" /> （会员订单列表查看显示数量，请填写大于0的整数）</td>
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


<!--{if $a eq "user"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=user">会员设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">会员设置</h3>
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="saveuser" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
		<td class="hback_none" width="20%">开启会员功能 </td>
		<td class="hback_none" width="80%"><input type="radio" name="usercpflag" id="usercpflag" value="1"<!--{if $usercpflag=='1'}--> checked<!--{/if}--> />开启会员功能&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="usercpflag" id="usercpflag" value="0"<!--{if $usercpflag=='0'}--> checked<!--{/if}--> />关闭会员功能 <br /><font color="#999999">（如关闭，则网站不再允许使用相关会员所有功能）</td>
	  </tr>
	  <tr>
		<td class="hback_none">会员注册状态 </td>
		<td class="hback_none"><input type="radio" name="userreg" id="userreg" value="1"<!--{if $userreg=='1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="userreg" id="userreg" value="0"<!--{if $userreg=='0'}--> checked<!--{/if}--> />关闭 <br /><font color="#999999">（如关闭，则网站不再允许新会员注册）</td>
	  </tr>
	  <tr>
		<td class="hback_none">默认会员组 </td>
		<td class="hback_none">
		<!--{$usergroup_select}--> ，
		注册赠送积分：<input type='text' name='regpoints' id='regpoints' class='input-s' value="<!--{$regpoints}-->" />，
		注册赠送人民币：<input type='text' name='regmoney' id='regmoney' class='input-s' value="<!--{$regmoney}-->" />元
		<br /><font color="#999999">（新会员注册，默认所属会员组）
		</td>
	  </tr>
	  <tr>
		<td class="hback_none">禁止注册用户名 </td>
		<td class="hback_none">
		<textarea name="lockusers" id="lockusers" style="width:50%;height:70px;overflow:auto;"><!--{$config.lockusers}--></textarea>
		<br /><font color="#999999">（多个用户名请用 “,” 隔开，不区分大小写）<br />可手动修改文件：source/conf/lockusers.php</font></td>
	  </tr>
	  <tr>
		<td class="hback_none">注册选项 </td>
		<td class="hback_none">
		  <table cellpadding='3' cellspacing='3' border="0" width="80%">

		    <tr>
			  <td colspan="3">禁止用户名出现连续数字：<input type="checkbox" name="regusernumber" id="regusernumber" value="1"<!--{if $regusernumber=='1'}--> checked<!--{/if}--> />开启，设定至少连续出现个数：<input type='text' class="input-s" name="usernumberlen" id="usernumberlen" value="<!--{$usernumberlen}-->" />个 <br /><font color="#999999">(温馨提示：启用限制，当用户名出现设定的连续个数时，系统将禁止注册)</font></td>
			</tr>

		    <tr>
			  <td>交友类型：<input type="checkbox" name="reglovesort" id="reglovesort" value="1"<!--{if $reglovesort=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestlovesort" id="requestlovesort" value="1"<!--{if $requestlovesort=='1'}--> checked<!--{/if}--> />必填</td>
			  <td>月薪收入：<input type="checkbox" name="regsalary" id="regsalary" value="1"<!--{if $regsalary=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestsalary" id="requestsalary" value="1"<!--{if $requestsalary=='1'}--> checked<!--{/if}--> />必填</td>
			  <td>体重：<input type="checkbox" name="regweight" id="regweight" value="1"<!--{if $regweight=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestweight" id="requestweight" value="1"<!--{if $requestweight=='1'}--> checked<!--{/if}--> />必填</td>
			</tr>
		    <tr>
			  <td>手机号码：<input type="checkbox" name="regmobile" id="regmobile" value="1"<!--{if $regmobile=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestmobile" id="requestmobile" value="1"<!--{if $requestmobile=='1'}--> checked<!--{/if}--> />必填</td>
			  <td>QQ号码：<input type="checkbox" name="regqq" id="regqq" value="1"<!--{if $regqq=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestqq" id="requestqq" value="1"<!--{if $requestqq=='1'}--> checked<!--{/if}--> />必填</td>
			  <td>身份证：<input type="checkbox" name="regidnumber" id="regidnumber" value="1"<!--{if $regidnumber=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestidnumber" id="requestidnumber" value="1"<!--{if $requestidnumber=='1'}--> checked<!--{/if}--> />必填</td>
			</tr>
		    <tr style="display:none;">
			  <td colspan="3">手机验证码：<input type="checkbox" name="regmbcode" id="regmbcode" value="1"<!--{if $regmbcode=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestmbcode" id="requestmbcode" value="1"<!--{if $requestmbcode=='1'}--> checked<!--{/if}--> />必填 <font color="#999999">(温馨提示：只有选择了手机号码必填才生效，需<a href="<!--{$cpfile}-->?c=setting&a=sms">开启手机短信功能</a>)</font></td>
			</tr>
		    <tr>
			  <td colspan="3">微博/博客：<input type="checkbox" name="regweibo" id="regweibo" value="1"<!--{if $regweibo=='1'}--> checked<!--{/if}--> />显示，<input type="checkbox" name="requestweibo" id="requestweibo" value="1"<!--{if $requestweibo=='1'}--> checked<!--{/if}--> />必填 </td>
			</tr>

		    <tr>
			  <td colspan="3">内心独白字数：<input type='text' class="input-s" name="molminlen" id="molminlen" value="<!--{$molminlen}-->" />~&nbsp;&nbsp;&nbsp;<input type='text' class="input-s" name="molmaxlen" id="molmaxlen" value="<!--{$molmaxlen}-->" />个字 <font color="#999999">(温馨提示：最少3个，最多1500个字)</font></td>
			</tr>
		  </table>
		</td>
	  </tr>

	  <tr>
		<td class="hback_none">会员审核类型 </td>
		<td class="hback_none"><input type="radio" name="useraudit" id="useraudit" value="1"<!--{if $useraudit=='1'}--> checked<!--{/if}--> />审核&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="useraudit" id="useraudit" value="0"<!--{if $useraudit=='0'}--> checked<!--{/if}--> />不审核 <br /><font color="#999999">（如启用审核，则会员注册需要审核后才能登录）</td>
	  </tr>
	  <tr>
		<td class='hback_none'>会员起始ID</td>
		<td class='hback_none'><input type="text" name="regstartid" id="regstartid" value="<!--{$regstartid}-->" class="input-s" /> <span id='dregstartid' class='f_red'></span><br /><font color='#999999'>本系统会员ID最大为：4294967295，最小为：1</font></td>
	  </tr>
	  <tr>
		<td class='hback_none'>年龄设置</td>
		<td class='hback_none'>从&nbsp;<input type="text" name="startage" id="startage" value="<!--{$startage}-->" class="input-s" />&nbsp;&nbsp;至&nbsp;<input type="text" name="endage" id="endage" value="<!--{$endage}-->" class="input-s" /> 岁</td>
	  </tr>
	  <tr>
		<td class='hback_none'>身高设置</td>
		<td class='hback_none'>从&nbsp;<input type="text" name="startheight" id="startheight" value="<!--{$startheight}-->" class="input-s" />&nbsp;&nbsp;至&nbsp;<input type="text" name="endheight" id="endheight" value="<!--{$endheight}-->" class="input-s" /> CM</td>
	  </tr>
	  <tr>
		<td class='hback_none'>体重设置</td>
		<td class='hback_none'>从&nbsp;<input type="text" name="startweight" id="startweight" value="<!--{$startweight}-->" class="input-s" />&nbsp;&nbsp;至&nbsp;<input type="text" name="endweight" id="endweight" value="<!--{$endweight}-->" class="input-s" /> 公斤</td>
	  </tr>
	  <tr>
		<td class='hback_none'>会员资料多选</td>
		<td class='hback_none'>最多选&nbsp;<input type="text" name="maxnum" id="maxnum" value="<!--{$maxnum}-->" class="input-s" />&nbsp;项</td>
	  </tr>
	  <tr>
		<td class='hback_none'>在线会员保留时间</td>
		<td class='hback_none'><input type="text" name="onlinehold" id="onlinehold" value="<!--{$onlinehold}-->" class="input-s" /> 分钟 <span id='donlinehold' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'>在线会员更新时间</td>
		<td class='hback_none'><input type="text" name="updatehold" id="updatehold" value="<!--{$updatehold}-->" class="input-s" /> 分钟 <span id='dupdatehold' class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_none'>今日速配数量</td>
		<td class='hback_none'><input type="text" name="matchnum" id="matchnum" value="<!--{$matchnum}-->" class="input-s" /> <span id='dmatchnum' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'>显示会员主页联系方式</td>
		<td class='hback_none'>
		<input type="radio" name="showhomecontact" id="showhomecontact" value="1"<!--{if $showhomecontact=='1'}--> checked<!--{/if}--> />开启，<input type="radio" name="showhomecontact" id="showhomecontact" value="0"<!--{if $showhomecontact=='0'}--> checked<!--{/if}--> />关闭
        </td>
	  </tr>
	  <tr>
		<td class='hback_none'>访问会员主页</td>
		<td class='hback_none'>
		<input type="radio" name="visithomepage" id="visithomepage" value="0"<!--{if $visithomepage=='0'}--> checked<!--{/if}--> />所有人可见(含游客)，<input type="radio" name="visithomepage" id="visithomepage" value="1"<!--{if $visithomepage=='1'}--> checked<!--{/if}--> />登录会员可见
        </td>
	  </tr>
	  <tr>
		<td class='hback_none'>访问会员列表</td>
		<td class='hback_none'>
		<input type="radio" name="visituserlist" id="visituserlist" value="0"<!--{if $visituserlist=='0'}--> checked<!--{/if}--> />所有人可见(含游客)，<input type="radio" name="visituserlist" id="visituserlist" value="1"<!--{if $visituserlist=='1'}--> checked<!--{/if}--> />登录会员可见
        </td>
	  </tr>
	  
	</table>

	<h3 class="title">数字过滤设置</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
	    <td class='hback_none' width='20%'>数字过滤设置 </td>
		<td class='hback_none'>
		<input type="checkbox" name="filternumber" id="filternumber" value="1"<!--{if $filternumber=='1'}--> checked<!--{/if}--> />开启，当大于<input type='text' class="input-s" name="filterlennumber" id="filterlennumber" value="<!--{$filterlennumber}-->" />个数字生效 <br /><font color="#999999">(温馨提示：启用数字过滤，对内心独白、信件、短信有效)</font>
		</td>
	  </tr>
	</table>

	<h3 class="title">认证设置</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
	    <td class='hback_none' width='25%'>未上传头像会员功能限制 </td>
		<td class='hback_none'>
		<input type="radio" name="avatarpermflag" id="avatarpermflag" value="1"<!--{if $avatarpermflag=='1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="avatarpermflag" id="avatarpermflag" value="0"<!--{if $avatarpermflag=='0'}--> checked<!--{/if}--> />关闭
		<br />
		<font color="#999999">(开启之后，头像未通过认证的会员，无法查看其他会员相册、无法给会员发送信件等。)</font>
		</td>
	  </tr>
	  <tr>
	    <td class='hback_none'>未认证邮箱会员功能限制 </td>
		<td class='hback_none'>
		<input type="radio" name="rzpermflag" id="rzpermflag" value="1"<!--{if $rzpermflag=='1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="rzpermflag" id="rzpermflag" value="0"<!--{if $rzpermflag=='0'}--> checked<!--{/if}--> />关闭
		<br />
		<font color="#999999">(开启之后，邮箱未认证的会员，无法写日记、发布求助、发布约会、报名活动、发信件、阅读信件等。)</font>
		</td>
	  </tr>
	</table>

	<h3 class="title">审核设置</h3>
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
	    <td class="hback" width="10%">头像审核</td>
	    <td class="hback">
		  <input type="radio" name="auditavatar" id="auditavatar" value="1"<!--{if $auditavatar == '1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="auditavatar" id="auditavatar" value="0"<!--{if $auditavatar == '0'}--> checked<!--{/if}--> />关闭
		</td>
	    <td class="hback" width="10%">相册审核</td>
	    <td class="hback">
		  <input type="radio" name="auditphoto" id="auditphoto" value="1"<!--{if $auditphoto == '1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="auditphoto" id="auditphoto" value="0"<!--{if $auditphoto == '0'}--> checked<!--{/if}--> />关闭
		</td>
	    <td class="hback" width="10%">独白审核</td>
	    <td class="hback">
		  <input type="radio" name="auditmonolog" id="auditmonolog" value="1"<!--{if $auditmonolog == '1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="auditmonolog" id="auditmonolog" value="0"<!--{if $auditmonolog == '0'}--> checked<!--{/if}--> />关闭
		</td>
	  </tr>
	  <tr>
	    <td class="hback">日记审核</td>
	    <td class="hback">
		  <input type="radio" name="auditdiary" id="auditdiary" value="1"<!--{if $auditdiary == '1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="auditdiary" id="auditdiary" value="0"<!--{if $auditdiary == '0'}--> checked<!--{/if}--> />关闭
		</td>
	    <td class="hback">评论审核</td>
	    <td class="hback">
		  <input type="radio" name="auditcomment" id="auditcomment" value="1"<!--{if $auditcomment == '1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="auditcomment" id="auditcomment" value="0"<!--{if $auditcomment == '0'}--> checked<!--{/if}--> />关闭
		</td>
	    <td class="hback">微播审核</td>
	    <td class="hback">
		  <input type="radio" name="auditweibo" id="auditweibo" value="1"<!--{if $auditweibo == '1'}--> checked<!--{/if}--> />开启&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="auditweibo" id="auditweibo" value="0"<!--{if $auditweibo == '0'}--> checked<!--{/if}--> />关闭
		</td>
	  </tr>
	</table>

	<table cellpadding='3' cellspacing='3' class='tab'>
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


<!--{if $a eq 'imbox'}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=imbox">消息框设置</a></p></div>
  <div class="main-cont">
    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="saveimbox" />
	<h3 class="title" style="display:;">访客消息提醒框设置(页面右下角弹出)</h3>
	<table cellpadding='1' cellspacing='2' class='tab' style="display:;">
	  <tr>
	    <td class='hback_1'>消息框：</td>
		<td class='hback'><input type="radio" name='imbox_userstatus' id='imbox_userstatus' value="1"<!--{if $imbox_userstatus=='1'}--> checked<!--{/if}--> />开启，<input type="radio" name='imbox_userstatus' id='imbox_userstatus' value="0"<!--{if $imbox_userstatus=='0'}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1' width='20%'>消息框载入等待时长： </td>
		<td class='hback' width='80%'><input type="text" name='imbox_loadtimer' id="imbox_loadtimer" class='input-s' value="<!--{$imbox_loadtimer}-->" /> 秒</td>
	  </tr>
	  <tr style="display:none;">
		<td class='hback_1'>消息框停留时长： </td>
		<td class='hback'><input type="text" name='imbox_holdtimer' id="imbox_holdtimer" class='input-s' value="<!--{$imbox_holdtimer}-->" /> 秒</td>
	  </tr>
	  <tr style="display:none;">
		<td class='hback_1'>新注册提醒： </td>
		<td class='hback'><input type="text" name='imbox_reglasttime' id="imbox_reglasttime" class='input-s' value="<!--{$imbox_reglasttime}-->" />分钟前注册的会员</td>
	  </tr>
	  <tr>
		<td class='hback_1'>新访问提醒： </td>
		<td class='hback'><input type="text" name='imbox_visitlasttime' id="imbox_visitlasttime" class='input-s' value="<!--{$imbox_visitlasttime}-->" />分钟前访问主页的会员</td>
	  </tr>
	  <tr>
		<td class='hback_1'>循环提醒： </td>
		<td class='hback'><input type="radio" name='imbox_loopstatus' id='imbox_loopstatus' value="1"<!--{if $imbox_loopstatus==1}--> checked<!--{/if}--> />开启，<input type="radio" name='imbox_loopstatus' id='imbox_loopstatus' value="0"<!--{if $imbox_loopstatus==0}--> checked<!--{/if}--> />关闭 &nbsp;&nbsp;&nbsp;&nbsp;循环间隔时长：<input type="text" name='imbox_looptimer' id="imbox_looptimer" class='input-s' value="<!--{$imbox_looptimer}-->" /> 秒<br />
		<font color='red'>温馨提示：开启循环功能，会耗费服务器页面资源，请根据实际情况设定。</font>
		</td>
	  </tr>
	</table>
	<h3 class="title">登录提醒框设置（当会员没有登录时，弹出登录框提示）</h3>
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class="hback_1" width="20%">登录框提醒： </td>
		<td class="hback" width="80%"><input type="radio" name='logintips_status' id='logintips_status' value="1"<!--{if $logintips_status==1}--> checked<!--{/if}--> />开启，<input type="radio" name='logintips_status' id='logintips_status' value="0"<!--{if $logintips_status==0}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
		<td class="hback_1">登录框载入等待时长： </td>
		<td class="hback"><input type="text" name='logintips_loadtimer' id="logintips_loadtimer" class='input-s' value="<!--{$logintips_loadtimer}-->" /> 秒</td>
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


<!--{if $a eq "card"}-->
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>充值卡管理<span>&gt;&gt;</span><a href="<!--{$cpfile}-->?c=setting&a=card">充值卡设置</a></p></div>
  <div class="main-cont">
	<h3 class="title">充值卡设置</h3>

    <form name="myform" method="post" action="<!--{$cpfile}-->?c=setting" />
    <input type="hidden" name="a" value="savecard" />
	<table cellpadding='3' cellspacing='3' class='tab'>
	  <tr>
	    <td class='hback_1' width='15%'>充值卡功能：</td>
		<td class="hback" width='85%'><input type='radio' name='cardflag' id='cardflag' value='1'<!--{if $cardflag == 1}--> checked<!--{/if}--> />开启，<input type='radio' name='cardflag' id='cardflag' value='0'<!--{if $cardflag == 0}--> checked<!--{/if}--> />关闭</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>充值方式：</td>
		<td class="hback"><input type='radio' name='cardtype' id='cardtype' value='1'<!--{if $cardtype == 1}--> checked<!--{/if}--> />充值卡号，<input type='radio' name='cardtype' id='cardtype' value='2'<!--{if $cardtype == 2}--> checked<!--{/if}--> />充值卡号+密码</td>
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