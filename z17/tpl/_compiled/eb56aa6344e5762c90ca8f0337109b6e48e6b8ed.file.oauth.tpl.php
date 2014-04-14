<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:13
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\oauth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11946532e894d05a688-55634942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb56aa6344e5762c90ca8f0337109b6e48e6b8ed' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\oauth.tpl',
      1 => 1352107787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11946532e894d05a688-55634942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'oauth' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e894d111c61_03943065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e894d111c61_03943065')) {function content_532e894d111c61_03943065($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>支付方式</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=oauth">多平台登录</a></p></div>
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
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['oauth']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['authid'];?>
</td>
	    <td align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
"></td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['authname'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['intro'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==1){?>
		<font color="green">开启</font>
		<?php }else{ ?>
		<font color="#999999">关闭</font>
		<?php }?>
		</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=oauth&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['authid'];?>
" class="icon-set">设置</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	</table>
	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>1){?>
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</td>
	  </tr>
	</table>
	<?php }?>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span>编辑多平台登录</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=oauth" class="btn-general"><span>返回列表</span></a>编辑多平台登录</h3>
	<div class="search-area3">
	  <div class="item">
	  QQ登录申请地址：<a href="http://connect.qq.com/intro/login/" target="_blank">http://connect.qq.com/intro/login/</a><br />
	  新浪微博申请地址：<a href="http://open.weibo.com/connect" target="_blank">http://open.weibo.com/connect</a><br />
	  开心网申请地址：<a href="http://wiki.open.kaixin001.com/index.php?id=%E5%BC%80%E5%BF%83%E8%BF%9E%E6%8E%A5" target="_blank">http://wiki.open.kaixin001.com/index.php?id=开心连接</a>
	  </div>
	</div>



    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=oauth&a=saveedit" onsubmit='return checkform();' />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <!-- 名称 -->
	  <tr>
		<td class='hback_1' width="15%">名称 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="authname" id="authname" value="<?php echo $_smarty_tpl->tpl_vars['oauth']->value['authname'];?>
" class="input-150" /> <span id="dauthname" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>APP ID <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="appid" id="appid" value="<?php echo $_smarty_tpl->tpl_vars['oauth']->value['appid'];?>
" class="input-txt" /> <span id="dappid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>APP Key <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="appkey" id="appkey" value="<?php echo $_smarty_tpl->tpl_vars['oauth']->value['appkey'];?>
" class="input-txt" /> <span id="dappkey" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>APP Secret <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="secret" id="secret" value="<?php echo $_smarty_tpl->tpl_vars['oauth']->value['secret'];?>
" class="input-txt" /> <span id="dsecret" class='f_red'></span> (没有请留空)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>开启状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['oauth']->value['flag']=='1'){?> checked<?php }?> />开启&nbsp;&nbsp; <input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['oauth']->value['flag']=='0'){?> checked<?php }?> />关闭 <span id='dflag' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" value="<?php echo $_smarty_tpl->tpl_vars['oauth']->value['orders'];?>
" class="input-s" /> <span id='dorders' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>描述 </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:100px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['oauth']->value['intro'];?>
</textarea> <span id='dintro' class='f_red'></span></td>
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
<?php }?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
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
</script><?php }} ?>