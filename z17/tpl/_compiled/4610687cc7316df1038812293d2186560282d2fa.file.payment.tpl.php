<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 10:32:46
         compiled from "C:\svn\z17z17\web\z17\tpl\user\payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275475355d4cea19030-50032759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4610687cc7316df1038812293d2186560282d2fa' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\payment.tpl',
      1 => 1398066166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275475355d4cea19030-50032759',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'lang' => 0,
    'u' => 0,
    'ucfile' => 0,
    'a' => 0,
    'urlpath' => 0,
    'payment' => 0,
    'volist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5355d4ceb20ee1_85298819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355d4ceb20ee1_85298819')) {function content_5355d4ceb20ee1_85298819($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("vip", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 在线充值 </div>
	<div class="nav-tips">
	您当前剩余可用<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
：<b><font color='green'><?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
</font></b>&nbsp;&nbsp;&nbsp;温馨提示：1金币=1元。</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip">会员升级</a></li>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment">在线充值</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	  <div class="item_title item_margin"><p>在线充值</p><span class="shadow"></span></div>
	  <form name="pay_form" id="pay_form" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=payment" method="post" target="_blank">
	  <input type='hidden' name='userid' id='userid' value="<?php echo $_smarty_tpl->tpl_vars['u']->value['userid'];?>
" />
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td class='lblock' width='25%'>请选择网上支付方式 <span class="f_red">*</span></td>
		  <td class="rblock">
		  <?php if (!empty($_smarty_tpl->tpl_vars['payment']->value)){?>
		  <select name='id' id='id' onchange="tab(this.options[this.options.selectedIndex].value);">
		  <?php }else{ ?>
		  <select name='id' id='id'>
		  <?php }?>
		  <option value=''>请选择</option>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <option value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['mentid'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['mentname'];?>
</option>
		  <?php } ?>
		  </select>

		  <span id="did" class="f_red"></span>
		  </td>
		</tr>
		<tr>
		  <td class='lblock'>充值金额 <span class="f_red">*</span></td>
		  <td class="rblock"><input type="text" name="quantity" id="quantity" class="input-100" maxlength="8" />元 (在线支付金额必须大于0元)
		  
		  <span id="dquantity" class="f_red"></span>
		  </td>
		</tr>
		<tr>
		  <td class="lblock" colspan='2'>温馨提示：（支付后如果浏览器没有自动返回，请手动点击“返回商城取货”来完成最后支付步骤）</td>
		</tr>
		<tr>
		  <td class='lblock'></td>
		  <td class='rblock'>
		  <input type="button" name="btn_save" value="确认充值" onclick="return checkform();" class="button-red" />	  
		  </td>
		</tr>
	  </table>
	  </form>

	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <table cellpadding='5' cellspacing='5' border='0' class='user-table table-margin lh35' name="tabtags" id='detail_<?php echo $_smarty_tpl->tpl_vars['volist']->value['mentid'];?>
' style="display:none;">
		<tr>
		  <td class='hback_c1' colspan="2" align="center"><b><?php echo $_smarty_tpl->tpl_vars['volist']->value['mentname'];?>
</b> </td>
		</tr>
		<tr>
		  <td colspan='2'>
		  <img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
" /><br />
		  <?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['volist']->value['intro']);?>

		  </td>
		</tr>
	  </table>
	  <?php } ?>
	  <?php }?>
    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip">会员升级</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment">在线充值</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script language="javascript">
//显示隐藏
function tab(tabid) {
	var taglength = $("table[name='tabtags']").length;;
	for (i=0; i<taglength; i++){
		$("table[name='tabtags']").eq(i).hide();
	}
	if (tabid > 0) {
		$('#detail_'+tabid).show();
	}
}
//提交保存
function checkform() {
	var t = '';
	var v = '';

	t = 'id';
	v = $('#'+t).val();
	if(v == '') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请选择支付方式', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
    
	t = 'quantity';
	v = $('#'+t).val();
	if(v == '') {
		/*
		dmsg('请填写充值金额', t);
		$('#'+t).focus();
		*/
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请填写充值金额', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
    
	$("#pay_form").submit();
	return true;
}
</script><?php }} ?>