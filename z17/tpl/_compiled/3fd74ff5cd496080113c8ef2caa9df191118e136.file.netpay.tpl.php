<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:13
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\netpay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23195532e894d8c8135-21052712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fd74ff5cd496080113c8ef2caa9df191118e136' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\netpay.tpl',
      1 => 1356316194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23195532e894d8c8135-21052712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'netpay' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'payment' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e894d9f4d40_26285361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e894d9f4d40_26285361')) {function content_532e894d9f4d40_26285361($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
?c=netpay">支付方式</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay&a=allpayment" class="btn-general"><span>添加支付方式</span></a>支付方式</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="20%"><div class="th-gap">图标</div></th>
		<th width="15%"><div class="th-gap">支付名称</div></th>
		<th width="30%"><div class="th-gap">支付描述</div></th>
		<th width="10%"><div class="th-gap">使用状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['netpay']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['mentid'];?>
</td>
	    <td align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
"></td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['mentname'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['volist']->value['filepath'];?>
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
?c=netpay&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['mentid'];?>
" class="icon-set">设置</a>&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['mentid'];?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复。')){return true;} return false;}" class="icon-del">删除</a></td>
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

<?php if ($_smarty_tpl->tpl_vars['a']->value=="allpayment"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay">支付方式</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay" class="btn-general"><span>返回列表</span></a>支付方式</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="10%"><div class="th-gap">ID</div></th>
		<th width="20%"><div class="th-gap">图标</div></th>
		<th width="15%"><div class="th-gap">支付名称</div></th>
		<th width="45%"><div class="th-gap">支付描述</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['netpay']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['pluginid'];?>
</td>
	    <td align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
"></td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['payname'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['volist']->value['filepath'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['intro'];?>
</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay&a=add&pluginid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['pluginid'];?>
" class="icon-add">添加</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="5" align="center">暂无信息</td>
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

<?php if ($_smarty_tpl->tpl_vars['a']->value=="add"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay&a=add">添加支付方式</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay" class="btn-general"><span>返回列表</span></a>添加支付方式</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay&a=saveadd" onsubmit='return checkform();' />
	<input type="hidden" name="pluginid" value="<?php echo $_smarty_tpl->tpl_vars['payment']->value['pluginid'];?>
" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">支付名称 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="mentname" id="mentname" value="<?php echo $_smarty_tpl->tpl_vars['payment']->value['payname'];?>
" class="input-txt" /> <span id="dmentname" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>类型 <span class="f_red"></span> </td>
		<td class='hback'>线上支付</td>
	  </tr>
	  <tr>
		<td class='hback_1'>商户ID号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authid" id="authid" class="input-txt" /> <span id="dauthid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>密钥 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="privatekey" id="privatekey" class="input-txt" /> <span id="dprivatekey" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款帐号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authaccount" id="authaccount" class="input-txt" /> <span id="dauthaccount" class='f_red'></span> <br />
		填写支付宝、PAYPAL收款账号
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>手续费设置 <span class="f_red"></span> </td>
		<td class='hback'>
		  <input type="radio" name="poundagetype" id="poundagetype" value="1" checked onclick="select_type1();" /> 按百分比收费 &nbsp;&nbsp;
		  <input type="radio" name="poundagetype" id="poundagetype" value="2" onclick="select_type2();" /> 按固定额度收费
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'></td>
		<td class='hback'>
		<!-- 百分比收费 -->
		<span id="id_type1_1" style="display:;">费率：</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_1" style="display:none;">金额：</span>
		<input type="text" name="poundage" id="poundage" class="input-s" />
		<!-- 百分比收费 -->
		<span id="id_type1_2" style="display:;">%</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_2" style="display:none;">元</span>
		<!-- 百分比收费 -->
		<span id="id_type1_3" style="display:;">说明：会员将支付充值金额乘以此费率作为手续费</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_3" style="display:none;">说明：会员每笔充值金额需要支付的手续费</span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />开启&nbsp;&nbsp; <input type="radio" name="flag" id="flag" value="0" />关闭 <span id='dflag' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" /> <span id="dorders" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>支付描述 </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:100px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['payment']->value['intro'];?>
</textarea> <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：应用&插件<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span>编辑支付方式</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay" class="btn-general"><span>返回列表</span></a>编辑支付方式</h3>
	<div class="search-area3">
	  <div class="item">
	  支付宝商户ID申请地址：<a href="https://b.alipay.com/" target="_blank">https://b.alipay.com/</a> (集成即时到帐和双功能收款)<br />
	  财付通商户ID申请地址：<a href="http://mch.tenpay.com/market/ps_intro_08.shtml" target="_blank">http://mch.tenpay.com/market/ps_intro_08.shtml</a> (集成即时到帐)<br />
	  网银在线商户ID申请地址：<a href="http://www.chinabank.com.cn/" target="_blank">http://www.chinabank.com.cn/</a> (申请企业账号)<br />
	  Paypal申请地址：<a href="http://www.paypal.com/" target="_blank">http://www.paypal.com/</a> （注册高级或者企业用户）
	  </div>
	</div>


    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=netpay&a=saveedit" onsubmit='return checkform();' />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">支付名称 <span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="mentname" id="mentname" value="<?php echo $_smarty_tpl->tpl_vars['netpay']->value['mentname'];?>
" class="input-txt" /> <span id="dmentname" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>类型 <span class="f_red"></span> </td>
		<td class='hback'>线上支付</td>
	  </tr>
	  <tr>
		<td class='hback_1'>商户ID号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authid" id="authid" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['netpay']->value['authid'];?>
" /> <span id="dauthid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>密钥 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="privatekey" id="privatekey" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['netpay']->value['privatekey'];?>
" /> <span id="dprivatekey" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收款帐号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="authaccount" id="authaccount" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['netpay']->value['authaccount'];?>
" /> <span id="dauthaccount" class='f_red'></span> <br />
		填写支付宝、PAYPAL收款账号
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>手续费设置 <span class="f_red"></span> </td>
		<td class='hback'>
		  <input type="radio" name="poundagetype" id="poundagetype" value="1" onclick="select_type1();"<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='1'){?> checked<?php }?> /> 按百分比收费 &nbsp;&nbsp;
		  <input type="radio" name="poundagetype" id="poundagetype" value="2" onclick="select_type2();"<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='2'){?> checked<?php }?> /> 按固定额度收费
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'></td>
		<td class='hback'>
		<!-- 百分比收费 -->
		<span id="id_type1_1" style="display:<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='2'){?>none<?php }?>;">费率：</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_1" style="display:<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='1'){?>none<?php }?>;">金额：</span>
		<input type="text" name="poundage" id="poundage" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['netpay']->value['poundage'];?>
" />
		<!-- 百分比收费 -->
		<span id="id_type1_2" style="display:<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='2'){?>none<?php }?>;">%</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_2" style="display:<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='1'){?>none<?php }?>;">元</span>
		<!-- 百分比收费 -->
		<span id="id_type1_3" style="display:<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='2'){?>none<?php }?>;">说明：会员将支付充值金额乘以此费率作为手续费</span>
		<!-- 固定额度收费 -->
		<span id="id_type2_3" style="display:<?php if ($_smarty_tpl->tpl_vars['netpay']->value['poundagetype']=='1'){?>none<?php }?>;">说明：会员每笔充值金额需要支付的手续费</span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['netpay']->value['flag']=='1'){?> checked<?php }?> />开启&nbsp;&nbsp; <input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['netpay']->value['flag']=='0'){?> checked<?php }?> />关闭 <span id='dflag' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['netpay']->value['orders'];?>
" /> <span id="dorders" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>支付描述 </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:100px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['netpay']->value['intro'];?>
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

	t = "mentname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("支付名称不能为空", t);
		return false;
	}
   
	return true;
}

function select_type1(){
	$("#id_type1_1").show();
	$("#id_type1_2").show();
	$("#id_type1_3").show();

	$("#id_type2_1").hide();
	$("#id_type2_2").hide();
	$("#id_type2_3").hide();
}

function select_type2() {
	$("#id_type1_1").hide();
	$("#id_type1_2").hide();
	$("#id_type1_3").hide();

	$("#id_type2_1").show();
	$("#id_type2_2").show();
	$("#id_type2_3").show();
}
</script>
<?php }} ?>