<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<!--{$page_charset}-->">
<title>menu</title>
<link rel="stylesheet" href="<!--{$cppath}-->css/menu.css" type="text/css" /> 
<script type="text/javascript" src="<!--{$urlpath}-->tpl/static/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<!--{$cppath}-->js/menu.js"></script>
</head>
<body style="overflow-x:hidden;">
<div id="accordion2">
  
  <!--{if $mod eq 'setting'}-->
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>基础设置</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<!--{$cpfile}-->?c=frame&a=main" target='main'>系统信息</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=setting" target='main'>站点设置</a>
	</li>
	<li>
	  <a href="<!--{$cpfile}-->?c=setting&a=footer" target='main'>底部信息</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=setting&a=safety" target='main'>安全设置</a>
    </li>
	<li>
	  <a href="<!--{$cpfile}-->?c=setting&a=upload" target='main'>图片设置</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=setting&a=user" target='main'>会员设置</a>
	</li>
	<li>
	  <a href="<!--{$cpfile}-->?c=seo" target='main'>SEO设置</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=setting&a=imbox" target='main'>消息框设置</a>
	</li>
  </ul>

  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>管理员帐号</h3></div>
  <ul class="switchable-panel" id='label_2' style="display:;">
    <li>
	  <a href="<!--{$cpfile}-->?c=admin" target='main'>帐号列表</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=admin&a=add" target='main'>添加管理员</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=authgroup" target='main'>管理组</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=authgroup&a=add" target='main'>添加管理组</a>
	</li>
	<li>
	  <a href="<!--{$cpfile}-->?c=admin&a=editpassword">修改密码</a>
    </li>
  </ul>

  <div class="switchable-trigger last-trigger" onclick="menu('label_3');"><i id='label_3_css' class="moo-icon-2"></i><h3>其他设置</h3></div>
  <ul class="switchable-panel last-pannel" id='label_3' style="display:;">
	<li>
	  <a href="<!--{$cpfile}-->?c=lovesort" target='main'>交友类型</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=loveparamter" target='main'>交友参数</a>
    </li>
	<li>
	  <a href="<!--{$cpfile}-->?c=greet" target='main'>问候语设置</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=lang" target='main'>语言包</a>
    </li>
	<li>
	  <a href="<!--{$cpfile}-->?c=area" target='main'>地区设置</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=hometown" target='main'>户籍设置</a>
    </li>
    <li>
	  <a href="<!--{$cpfile}-->?c=htmllabel" target='main'>自定义HTML标签</a>
	</li>
	<li>
	  <a href="<!--{$cpfile}-->?c=zone" target='main'>广告版位</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=myads" target='main'>广告管理</a>
    </li>
  </ul>
  <!--{/if}-->

  <!--{if $mod eq 'user'}-->
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>会员管理</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<!--{$cpfile}-->?c=setting&a=user" target='main'>会员设置</a> 
	  <a href="<!--{$cpfile}-->?c=usergroup" target='main'>会员组设置</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=user" target='main'>会员列表</a> 
	  <a href="<!--{$cpfile}-->?c=user&a=add" target='main'>添加会员</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=user&a=penyavatar&sflag=1" target='main'>审核头像</a> 
	  <a href="<!--{$cpfile}-->?c=user&a=penymonolog&sflag=1" target='main'>审核独白</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=album" target='main'>相册管理</a> 
	  <a href="<!--{$cpfile}-->?c=videorz" target='main'>视频认证</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=certify" target='main'>诚信认证管理</a> 
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=money" target='main'>现金记录</a> 
	  <a href="<!--{$cpfile}-->?c=points" target='main'>积分记录</a> 
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=paymentlog" target='main'>在线充值记录</a> 
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>信件&消息</h3></div>
  <ul class="switchable-panel" id='label_2'>
    <li>
	  <a href="<!--{$cpfile}-->?c=hi" target='main'>会员问候</a>&nbsp;&nbsp;
	  <a href="<!--{$cpfile}-->?c=message" target='main'>会员信件</a> 
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=systemmsg" target='main'>系统消息(站内信)</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=systemmsg&a=add" target='main'>按筛选条件群发消息</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=systemmsg&a=offvip" target='main'>群发VIP到期会员消息</a>
	</li>
  </ul>
  <!--{/if}-->

  <!--{if $mod eq 'content'}-->
  <div class="switchable-trigger" onclick="menu('label_21');"><i id='label_21_css' class="moo-icon-2"></i><h3>公告管理</h3></div>
  <ul class="switchable-panel" id='label_21'>
    <li>
	  <a href="<!--{$cpfile}-->?c=infocat" target='main'>公告分类</a> 
	  <a href="<!--{$cpfile}-->?c=info" target='main'>公告内容</a> 
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_22');"><i id='label_22_css' class="moo-icon-2"></i><h3>单页管理</h3></div>
  <ul class="switchable-panel" id='label_22'>
    <li>
	  <a href="<!--{$cpfile}-->?c=aboutcat" target='main'>单页分类</a> 
	  <a href="<!--{$cpfile}-->?c=about" target='main'>单页内容</a> 
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>礼物管理</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<!--{$cpfile}-->?c=giftcat" target='main'>分类</a> 
	  <a href="<!--{$cpfile}-->?c=gift" target='main'>礼物</a> 
	  <a href="<!--{$cpfile}-->?c=giftrecord" target='main'>赠送记录</a>
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>日记管理</h3></div>
  <ul class="switchable-panel" id='label_2'>
    <li>
	  <a href="<!--{$cpfile}-->?c=diarycat" target='main'>日记分类</a>  
	  <a href="<!--{$cpfile}-->?c=diarycat&a=add" target='main'>添加分类</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=diary" target='main'>日记列表</a>  
	  <a href="<!--{$cpfile}-->?c=diary&stype=audit" target='main'>审核</a>
	  <a href="<!--{$cpfile}-->?c=diarycomment" target='main'>评论</a>
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_8');"><i id='label_8_css' class="moo-icon-2"></i><h3>微播管理</h3></div>
  <ul class="switchable-panel" id='label_8' style="display:;">
    <li>
	  <a href="<!--{$cpfile}-->?c=weibo" target='main'>微播列表</a>  
	  <a href="<!--{$cpfile}-->?c=weibocomment" target='main'>评论列表</a>
	</li>
  </ul>
  <!--{/if}-->

  <!--{if $mod eq 'seo'}-->
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>站点优化</h3></div>
  <ul class="switchable-panel" id='label_1'>
	<li>
	  <a href="<!--{$cpfile}-->?c=setting&a=rewrite" target='main'>站点伪静态设置</a>
    </li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_3');"><i id='label_3_css' class="moo-icon-2"></i><h3>邮件营销</h3></div>
  <ul class="switchable-panel" id='label_3' style="display:;">
    <li>
	  <a href="<!--{$cpfile}-->?c=setting&a=mail" target='main'>邮箱设置</a>&nbsp;
	  <a href="<!--{$cpfile}-->?c=mailtpl" target='main'>邮件模板</a>
    </li>
    <li>
	  <a href="<!--{$cpfile}-->?c=mailsend&a=group" target='main'>按筛选条件群发</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=mailsend&a=single" target='main'>指定邮箱发送</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=mailsend&a=offvip" target='main'>群发VIP到期会员</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=mailcontent" target='main'>邮件发送内容</a>
	</li>
    <li>
	  <a href="<!--{$cpfile}-->?c=maillog" target='main'>邮件发送记录</a>
	</li>
  </ul>
  <!--{/if}-->

  <!--{if $mod eq 'skin'}-->
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>主题模板</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<!--{$cpfile}-->?c=skin" target='main'>设置模板</a>
	</li>
	<li>
	  <a href="<!--{$cpfile}-->?c=setting&a=index_style" target='main'>首页配置</a>
    </li>
	<li>
	  <a href="<!--{$cpfile}-->?c=setting&a=main_style" target='main'>界面配置</a>
	</li>
  </ul>

  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>模板管理</h3></div>
  <ul class="switchable-panel" id='label_2' style="display:;">
    <li><a href="<!--{$cpfile}-->?c=templet">模板文件</a></li>
  </ul>
  <!--{/if}-->

  <!--{if $mod eq 'app'}-->
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>扩展应用</h3></div>
  <ul class="switchable-panel" id='label_1'>
	<li>
	  <a href="<!--{$cpfile}-->?c=log" target='main'>系统日志</a>&nbsp;
	  <a href='<!--{$cpfile}-->?c=transfer' target='main'>积分转换</a>
    </li>
	<li>
	  <a href='<!--{$cpfile}-->?c=promotion' target='main'>注册推广</a>&nbsp;
	  <a href='<!--{$cpfile}-->?c=promotion&a=list' target='main'>推广列表</a>
	</li>
	<li>
      <a href='<!--{$cpfile}-->?c=oauth' target='main'>多平台登录</a>
	</li>
	<li>
	  <a href='<!--{$cpfile}-->?c=netpay' target='main'>在线支付方式</a>
	</li>
	<li>
	  <a href='<!--{$cpfile}-->?c=ucenter' target='main'>UCenter整合</a> 
	</li>
	<li>
	  <a href='<!--{$cpfile}-->?c=complaint' target='main'>举报管理</a>
	</li>
  </ul>

  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>插件中心</h3></div>
  <ul class="switchable-panel" id='label_2' style="display:;">
    <li><a href="<!--{$cpfile}-->?c=plugin" target='main'>插件列表</a></li>
	<!--{assign var='plugin_data' value=XHook::doAction('adm_sidebar_ext')}-->
  </ul>
  <!--{/if}-->

</div>
</body>
</html>
<script language="javascript">
function menu(id) {
	if ($("#"+id).css("display") == "none") {
		$("#"+id).css("display","block");
		$("#"+id+'_css').removeClass('moo-icon-1');
		$("#"+id+'_css').addClass('moo-icon-2');
	} else {
		$("#"+id).css("display","none");
		$("#"+id+'_css').removeClass('moo-icon-2');
		$("#"+id+'_css').addClass('moo-icon-1');
	}
}
</script>
