<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:02:45
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\frm_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30569532e8715ba27f3-06310630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0659a33494a2a2f2814fbf07ec240de0acdbaa27' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\frm_menu.tpl',
      1 => 1390704018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30569532e8715ba27f3-06310630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cppath' => 0,
    'urlpath' => 0,
    'mod' => 0,
    'cpfile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e8715f0fc12_43455103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8715f0fc12_43455103')) {function content_532e8715f0fc12_43455103($_smarty_tpl) {?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
">
<title>menu</title>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
css/menu.css" type="text/css" /> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
js/menu.js"></script>
</head>
<body style="overflow-x:hidden;">
<div id="accordion2">
  
  <?php if ($_smarty_tpl->tpl_vars['mod']->value=='setting'){?>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>基础设置</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=frame&a=main" target='main'>系统信息</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting" target='main'>站点设置</a>
	</li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=footer" target='main'>底部信息</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=safety" target='main'>安全设置</a>
    </li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=upload" target='main'>图片设置</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=user" target='main'>会员设置</a>
	</li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=seo" target='main'>SEO设置</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=imbox" target='main'>消息框设置</a>
	</li>
  </ul>

  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>管理员帐号</h3></div>
  <ul class="switchable-panel" id='label_2' style="display:;">
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=admin" target='main'>帐号列表</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=admin&a=add" target='main'>添加管理员</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=authgroup" target='main'>管理组</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=authgroup&a=add" target='main'>添加管理组</a>
	</li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=admin&a=editpassword">修改密码</a>
    </li>
  </ul>

  <div class="switchable-trigger last-trigger" onclick="menu('label_3');"><i id='label_3_css' class="moo-icon-2"></i><h3>其他设置</h3></div>
  <ul class="switchable-panel last-pannel" id='label_3' style="display:;">
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=lovesort" target='main'>交友类型</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=loveparamter" target='main'>交友参数</a>
    </li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=greet" target='main'>问候语设置</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=lang" target='main'>语言包</a>
    </li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=area" target='main'>地区设置</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=hometown" target='main'>户籍设置</a>
    </li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=htmllabel" target='main'>自定义HTML标签</a>
	</li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone" target='main'>广告版位</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads" target='main'>广告管理</a>
    </li>
  </ul>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['mod']->value=='user'){?>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>会员管理</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=user" target='main'>会员设置</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup" target='main'>会员组设置</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user" target='main'>会员列表</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=add" target='main'>添加会员</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penyavatar&sflag=1" target='main'>审核头像</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penymonolog&sflag=1" target='main'>审核独白</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=album" target='main'>相册管理</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=videorz" target='main'>视频认证</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=certify" target='main'>诚信认证管理</a> 
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=money" target='main'>现金记录</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=points" target='main'>积分记录</a> 
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=paymentlog" target='main'>在线充值记录</a> 
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>信件&消息</h3></div>
  <ul class="switchable-panel" id='label_2'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=hi" target='main'>会员问候</a>&nbsp;&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=message" target='main'>会员信件</a> 
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg" target='main'>系统消息(站内信)</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&a=add" target='main'>按筛选条件群发消息</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=systemmsg&a=offvip" target='main'>群发VIP到期会员消息</a>
	</li>
  </ul>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['mod']->value=='content'){?>
  <div class="switchable-trigger" onclick="menu('label_21');"><i id='label_21_css' class="moo-icon-2"></i><h3>公告管理</h3></div>
  <ul class="switchable-panel" id='label_21'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat" target='main'>公告分类</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info" target='main'>公告内容</a> 
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_22');"><i id='label_22_css' class="moo-icon-2"></i><h3>单页管理</h3></div>
  <ul class="switchable-panel" id='label_22'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=aboutcat" target='main'>单页分类</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about" target='main'>单页内容</a> 
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>礼物管理</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftcat" target='main'>分类</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift" target='main'>礼物</a> 
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord" target='main'>赠送记录</a>
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>日记管理</h3></div>
  <ul class="switchable-panel" id='label_2'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycat" target='main'>日记分类</a>  
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycat&a=add" target='main'>添加分类</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary" target='main'>日记列表</a>  
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&stype=audit" target='main'>审核</a>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment" target='main'>评论</a>
	</li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_8');"><i id='label_8_css' class="moo-icon-2"></i><h3>微播管理</h3></div>
  <ul class="switchable-panel" id='label_8' style="display:;">
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=weibo" target='main'>微播列表</a>  
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=weibocomment" target='main'>评论列表</a>
	</li>
  </ul>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['mod']->value=='seo'){?>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>站点优化</h3></div>
  <ul class="switchable-panel" id='label_1'>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=rewrite" target='main'>站点伪静态设置</a>
    </li>
  </ul>
  <div class="switchable-trigger" onclick="menu('label_3');"><i id='label_3_css' class="moo-icon-2"></i><h3>邮件营销</h3></div>
  <ul class="switchable-panel" id='label_3' style="display:;">
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=mail" target='main'>邮箱设置</a>&nbsp;
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl" target='main'>邮件模板</a>
    </li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend&a=group" target='main'>按筛选条件群发</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend&a=single" target='main'>指定邮箱发送</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailsend&a=offvip" target='main'>群发VIP到期会员</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailcontent" target='main'>邮件发送内容</a>
	</li>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=maillog" target='main'>邮件发送记录</a>
	</li>
  </ul>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['mod']->value=='skin'){?>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>主题模板</h3></div>
  <ul class="switchable-panel" id='label_1'>
    <li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=skin" target='main'>设置模板</a>
	</li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=index_style" target='main'>首页配置</a>
    </li>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=setting&a=main_style" target='main'>界面配置</a>
	</li>
  </ul>

  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>模板管理</h3></div>
  <ul class="switchable-panel" id='label_2' style="display:;">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=templet">模板文件</a></li>
  </ul>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['mod']->value=='app'){?>
  <div class="switchable-trigger" onclick="menu('label_1');"><i id='label_1_css' class="moo-icon-2"></i><h3>扩展应用</h3></div>
  <ul class="switchable-panel" id='label_1'>
	<li>
	  <a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=log" target='main'>系统日志</a>&nbsp;
	  <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=transfer' target='main'>积分转换</a>
    </li>
	<li>
	  <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=promotion' target='main'>注册推广</a>&nbsp;
	  <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=promotion&a=list' target='main'>推广列表</a>
	</li>
	<li>
      <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=oauth' target='main'>多平台登录</a>
	</li>
	<li>
	  <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay' target='main'>在线支付方式</a>
	</li>
	<li>
	  <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=ucenter' target='main'>UCenter整合</a> 
	</li>
	<li>
	  <a href='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=complaint' target='main'>举报管理</a>
	</li>
  </ul>

  <div class="switchable-trigger" onclick="menu('label_2');"><i id='label_2_css' class="moo-icon-2"></i><h3>插件中心</h3></div>
  <ul class="switchable-panel" id='label_2' style="display:;">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=plugin" target='main'>插件列表</a></li>
	<?php $_smarty_tpl->tpl_vars['plugin_data'] = new Smarty_variable(XHook::doAction('adm_sidebar_ext'), null, 0);?>
  </ul>
  <?php }?>

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
<?php }} ?>