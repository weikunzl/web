<?php /* Smarty version Smarty-3.1.14, created on 2014-04-03 17:53:18
         compiled from "C:\svn\z17\tpl\user\vip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183625333d7d8ae8635-94694171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dd9fc80272fbca7bce2738d249ef55b1b20eb85' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\vip.tpl',
      1 => 1396518796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183625333d7d8ae8635-94694171',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5333d7d8d66d15_23368240',
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'u' => 0,
    'g' => 0,
    'lang' => 0,
    'ucfile' => 0,
    'group' => 0,
    'urlpath' => 0,
    'volist' => 0,
    'val' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333d7d8d66d15_23368240')) {function content_5333d7d8d66d15_23368240($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("vip", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">


  <div class="main_right">
    <div class="div_"> 服务 &gt;&gt; 会员升级 </div>
	<div class="nav-tips">
	您当前所在会员组：<?php echo $_smarty_tpl->tpl_vars['u']->value['levelimg'];?>
 <b><?php echo $_smarty_tpl->tpl_vars['g']->value['groupname'];?>
</b><?php if ($_smarty_tpl->tpl_vars['g']->value['groupid']>1){?>&nbsp;&nbsp;&nbsp;（有效期到 <?php echo $_smarty_tpl->tpl_vars['u']->value['vipenddate_t'];?>
）<?php }?>&nbsp;&nbsp;&nbsp;剩余可用<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
：<b><font color='green'><?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
</font>
	</b>
	</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip">会员升级</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment">在线充值</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>会员组</p><span class="shadow"></span></div>
	  <form method="post" id="vip_form" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip&a=savevip">
      <div class="vip_list">
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="vip_title">
		  <img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['maleimg'];?>
" align='absmiddle' border='0' />&nbsp;&nbsp;
		  <img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['femaleimg'];?>
" align='absmiddle' border='0' />
		  <br /><?php echo $_smarty_tpl->tpl_vars['volist']->value['groupname'];?>

		</div>
        <div style="float:left; line-height:25px;">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['groupid']==1){?>
		永久 免费
		<?php }else{ ?>
			<?php if (!empty($_smarty_tpl->tpl_vars['volist']->value['commer'])){?>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['volist']->value['commer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
			<input type="radio" name="viptype" id="viptype" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
_<?php echo $_smarty_tpl->tpl_vars['val']->value['orders'];?>
" />&nbsp;有效<?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
天，支付<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['money'];?>
<?php echo $_smarty_tpl->tpl_vars['lang']->value['money_dot'];?>
，赠送<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['points'];?>
<br />
			<?php } ?>
			<?php }?>
		<?php }?>
		</div>
        <div style="float:right;">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['groupid']>1){?>
		<input type="button" value="购买升级" onclick="return checkvip();" class="button-green" />
		<?php }?>
		</div>
        <div class="clear"></div>
        <div class="hr_dashed"></div>
		<?php } ?>

        <div class="item_title item_margin">
		  <p>会员特权</p>
		  <span class="shadow"></span>
		  <span class="rtips">（灰色项表示没有权限，绿色项表示有权限）</span>
		</div>

		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="tq_list_title"><?php echo $_smarty_tpl->tpl_vars['volist']->value['groupname'];?>
特权</div>
        <div class="tq_list"> 
		<span class="tq_item">每天登录积分(<?php echo $_smarty_tpl->tpl_vars['volist']->value['loginpoints'];?>
)</span> 
		<span class="tq_item">上传照片(<?php if ($_smarty_tpl->tpl_vars['volist']->value['photo']['photolimit']==1){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['photo']['photonum'];?>
张 <?php }else{ ?> 不限<?php }?>)</span> 
		<span class="tq_item">关注好友(<?php if ($_smarty_tpl->tpl_vars['volist']->value['friend']['friendlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['friend']['friendnum'];?>
 个 <?php }else{ ?> 不限<?php }?>)</span> 

		<span class="tq_item">每天给同性会员发信件(<?php if ($_smarty_tpl->tpl_vars['volist']->value['msg']['txsendlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['msg']['txsendnum'];?>
 封 <?php }else{ ?> 不限<?php }?>)</span> 
		<span class="tq_item">每天查看同性会员信件(<?php if ($_smarty_tpl->tpl_vars['volist']->value['msg']['txviewlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['msg']['txviewnum'];?>
 封 <?php }else{ ?> 不限<?php }?>)</span> 
		<span class="tq_item">每天给异性会员发信件(<?php if ($_smarty_tpl->tpl_vars['volist']->value['msg']['yxsendlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['msg']['yxsendnum'];?>
 封 <?php }else{ ?> 不限<?php }?>)</span> 
		<span class="tq_item">每天查看异性会员信件(<?php if ($_smarty_tpl->tpl_vars['volist']->value['msg']['yxviewlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['volist']->value['msg']['yxviewnum'];?>
 封 <?php }else{ ?> 不限<?php }?>)</span> 

		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['msg']['msgistop']==1){?> ee<?php }else{ ?> cc<?php }?>">信件置顶</span> 
		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['view']['viewcontact']=='1'){?> ee<?php }else{ ?> cc<?php }?>">查看会员联系方式</span> 
		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['view']['viewlogintime']=='1'){?> ee<?php }else{ ?> cc<?php }?>">查看会员登录情况</span> 
		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['view']['viewvisitor']=='1'){?> ee<?php }else{ ?> cc<?php }?>">查看最近访客</span> 
		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['view']['viewmatch']=='1'){?> ee<?php }else{ ?> cc<?php }?>">查看缘分速配</span> 
		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['view']['useadvsearch']=='1'){?> ee<?php }else{ ?> cc<?php }?>">使用会员高级搜索</span> 
		<span class="tq_item<?php if ($_smarty_tpl->tpl_vars['volist']->value['view']['viewonlineuser']=='1'){?> ee<?php }else{ ?> cc<?php }?>">访问会员在线页面</span> 
		</div>
        <div class="clear"></div>
		<?php } ?>

      </div>
	  <!--// vip_list End-->
	  </form>

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
	  <?php if ($_smarty_tpl->tpl_vars['config']->value['app']['card']=='1'){?>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=card">充值卡充值</a></li>
	  <?php }?>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=buysms">购买短信</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=buypostage">购买邮票</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script language="javascript">
function checkvip(){
	var t = "";
	t = 'viptype';
	var item = $("input[name='viptype']:checked");
	var len  = item.length;
	if(len==0) {
		$.dialog({
			lock:true,
			title: '错误',
			content: '请选择要升级的类别(有效期)', 
			icon: 'error',
			button: [{name: '确定'}]
		});
		return false;
	}
	<?php if ($_smarty_tpl->tpl_vars['u']->value['vip']==1){?>
		$.dialog({
			lock:true,
			title: '温馨提示',
			content: '您当前所在的会员组还没有到期，确定重新升级？', 
			icon: 'warning',
			button: [
				{
					name: '确定',
					callback: function () {
						$('#vip_form').submit();
						return true;
					}
				}, 
				{
					name: '取消'
				}
			]
		});
	<?php }else{ ?>
		$.dialog({
			lock:true,
			title: '温馨提示',
			content: '确定要升级吗？', 
			icon: 'warning',
			button: [
				{
					name: '确定',
					callback: function () {
						$('#vip_form').submit();
						return true;
					}
				}, 
				{
					name: '取消'
				}
			]
		});
	<?php }?>
}
</script>
<?php }} ?>