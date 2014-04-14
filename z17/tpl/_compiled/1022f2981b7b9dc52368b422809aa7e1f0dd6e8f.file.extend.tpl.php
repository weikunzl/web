<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 13:58:33
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\extend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24047532fc989df15f9-00255882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1022f2981b7b9dc52368b422809aa7e1f0dd6e8f' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\extend.tpl',
      1 => 1375932712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24047532fc989df15f9-00255882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'a' => 0,
    'ucfile' => 0,
    'connect' => 0,
    'volist' => 0,
    'cufile' => 0,
    'cpainfo' => 0,
    'lang' => 0,
    'cpacounts' => 0,
    'settlecounts' => 0,
    'unsettlecounts' => 0,
    'urlpath' => 0,
    'totalmoney' => 0,
    'totalpoints' => 0,
    'cpaurl' => 0,
    'list' => 0,
    'showpage' => 0,
    'u' => 0,
    'transfer' => 0,
    'max_trans_money' => 0,
    'max_trans_points' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fc98a13f1b8_80842700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fc98a13f1b8_80842700')) {function content_532fc98a13f1b8_80842700($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["cp_menuid"] = new Smarty_variable("extend", null, 0);?>
<div class="user_main">
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 
	<?php if ($_smarty_tpl->tpl_vars['a']->value=='connect'){?>
	绑定登录
	<?php }elseif($_smarty_tpl->tpl_vars['a']->value=='cpa'){?>
	推广注册
	<?php }elseif($_smarty_tpl->tpl_vars['a']->value=='transfer'){?>
	积分转换
	<?php }?>
	</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='connect'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=connect">绑定登录</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='cpa'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=cpa">推广注册</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='transfer'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=transfer">积分转换</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='connect'){?> 
	    <div class="item_title item_margin"><p>绑定登录</p><span class="shadow"></span></div>
		<?php if (!empty($_smarty_tpl->tpl_vars['connect']->value)){?>
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['connect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <tr>
			<td class="lblock" width="25%"><?php echo $_smarty_tpl->tpl_vars['volist']->value['authname'];?>
</td>
			<td class="rblock" width="75%">
			<img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
">
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['bindcount']>0){?>
			<font color='green'>已绑定 (<?php echo $_smarty_tpl->tpl_vars['volist']->value['bindcount'];?>
)</font> &nbsp;&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['apiurl'];?>
" target="_blank" class="btn_c2"><span>绑定多个登录</span></a> &nbsp;&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['cufile']->value;?>
?c=extend&a=delconnect&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['authid'];?>
" class="btn_c3"><span>解除绑定</span></a>
			<?php }else{ ?>
			<font color="#999999">未绑定 </font> &nbsp;&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['apiurl'];?>
" target="_blank">绑定登录</a>
			<?php }?>
			</td>
		  </tr>
		  <?php } ?>
		  <tr>
			<td colspan="2"><div class="nav-tips">选择要绑定的登录方式，用您在所选平台注册的帐号，密码登录，登录成功后，可完美与本站进行登录绑定。</div></td>
		  </tr>
		</table>
	<?php }else{ ?>
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" align="center">对不起，本站没有开启多平台登录</td>
		  </tr>
		</table>
		<?php }?>
	  <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='cpa'){?> 
	    <div class="item_title item_margin"><p>推广注册</p><span class="shadow"></span></div>
		<?php if (!empty($_smarty_tpl->tpl_vars['cpainfo']->value)){?>
		<table cellpadding='5' cellspacing='5' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" align="left">
			<div class="nav-tips">
			每推广一个有效注册会员（邮箱已认证<?php if ($_smarty_tpl->tpl_vars['cpainfo']->value['avatarvalid']==1){?>和头像有效<?php }?>），即可获得<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
<?php echo $_smarty_tpl->tpl_vars['cpainfo']->value['onemoney'];?>
，<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
<?php echo $_smarty_tpl->tpl_vars['cpainfo']->value['onepoints'];?>
。
			</div>
			</td>
		  </tr>
		  <tr>
			<td class="lblock" width="10%">我的推广 </td>
			<td class="rblock" width="90%">
			累计推广注册：<?php echo $_smarty_tpl->tpl_vars['cpacounts']->value;?>
 人，
			已结算：<?php echo $_smarty_tpl->tpl_vars['settlecounts']->value;?>
 人， 
			未结算：<?php echo $_smarty_tpl->tpl_vars['unsettlecounts']->value;?>
人
			<?php if ($_smarty_tpl->tpl_vars['unsettlecounts']->value>0){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=extend&a=settlecpa" class="btn_c3"><span>点击结算</span></a>
			<?php }?>
			<br />
			结算<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
合计：<?php echo $_smarty_tpl->tpl_vars['totalmoney']->value;?>
，结算<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
合计：<?php echo $_smarty_tpl->tpl_vars['totalpoints']->value;?>

			</td>
		  </tr>
		  <tr>
			<td class="lblock">推广链接 </td>
			<td class="rblock">
			<?php if (true===$_smarty_tpl->tpl_vars['cpainfo']->value['promotion']){?>
			<input type="text" name="cpaurl" id="cpaurl" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['cpaurl']->value;?>
" />
			<input type="button" name="btn_copy" onclick="copy_url('cpaurl');" value="复制链接" class="button-red" />
			<?php }else{ ?>
			<input type="text" name="cpaurl" id="cpaurl" class="input-txt" value="推广注册已关闭" disabled />
			<?php }?>

			</td>
		  </tr>
		</table>

		<!-- list start -->
		<table class="table" style="margin-top:20px;">
		  <tr>
			<td width='18%' align='center'>注册人ID</td>
			<td width='12%' align='center'>邮箱</td>
			<td width='12%' align='center'>头像</td>
			<td width='15%' align='center'>注册时间</td>
			<td width='12%' align='center'>奖励金币</td>
			<td width='12%' align='center'>奖励积分</td>
			<td align='center'>状态</td>
		  </tr>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <tr>
			<td align='left'><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['ruserid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['ruserid'];?>
</a></td>
			<td align='center'><?php if ($_smarty_tpl->tpl_vars['volist']->value['rzemail']==1){?><font color="green">有效</font><?php }else{ ?><font color="#999999">无效</font><?php }?></td>
			<td align='center'><?php if ($_smarty_tpl->tpl_vars['volist']->value['avatar']==1){?><font color="green">有效</font><?php }else{ ?><font color="#999999">无效</font><?php }?></td>
			<td align='center'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d");?>
</td>
			<td align='center'><?php echo $_smarty_tpl->tpl_vars['volist']->value['validmoney'];?>
</td>
			<td align='center'><?php echo $_smarty_tpl->tpl_vars['volist']->value['validpoints'];?>
</td>
			<td align='center'>
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['settleflag']==1){?>
			<font color="green">已结算</font>
			<?php }else{ ?>
			<font color="#999999">未结算</font>
			<?php }?>
			</td>
		  </tr>
		  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
		  <tr>
			<td colspan="7" align="center">对不起，暂无记录。</td>
		  </tr>
		  <?php } ?>
		</table>

		<!-- 分页 -->
		<?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
		<div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
		<div class="c"></div>
		<?php }?>

		<?php }else{ ?>
		<table cellpadding='5' cellspacing='5' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" align="center">对不起，本站已关闭推广注册功能。</td>
		  </tr>
		</table>
		<?php }?>
	  <?php }?>


	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='transfer'){?> 
      <div class="nav-tips">
	  可用<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
：<?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['money_dot'];?>
，可用<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
：<?php echo $_smarty_tpl->tpl_vars['u']->value['points'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['points_dot'];?>

	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-top:5px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p><?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 积分转换金币 -->
		  <?php if (true===$_smarty_tpl->tpl_vars['transfer']->value['trade_money']){?>
		  <form name="my_moneyform" id="my_moneyform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=transfermoney" method="post" >
		  <tr>
			<td class='lblock' width="18%">转换比例 <span class="f_red"></span></td>
			<td class="rblock" width="82%">1 个<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
需要<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
 <?php echo $_smarty_tpl->tpl_vars['transfer']->value['trade_money_ratio'];?>
</td>
		  </tr>
		  <tr>
			<td class='lblock'>最多可转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
 <span class="f_red"></span></td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['max_trans_money']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['money_dot'];?>
</td>
		  </tr>
		  <tr>
			<td class='lblock'>输入转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
数量 <span class="f_red"></span></td>
			<td class="rblock">
			<input type="text" name="quantity" id="quantity_money" class="input-100" maxlength="8" /> <span id="dquantiy" class="f_red"></span> 
			&nbsp;&nbsp;&nbsp;
			<input type="button"  id="btn_money" value="执行转换" class="button-qing" />
			</td>
		  </tr>
		  <!-- 提交保存 -->
		  </form>
		  <?php }else{ ?>
		  <tr>
			<td colspan="2" align="center">对不起，网站已关闭<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
功能。</td>
		  </tr>
		  <?php }?>

		  <!-- 金币转换积分 -->
		  <tr>
			<td colspan="2" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p><?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
</p><span class="shadow"></span></div></td>
		  </tr>
		  <?php if (true===$_smarty_tpl->tpl_vars['transfer']->value['trade_points']){?>
		  <form name="my_pointsform" id="my_pointsform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=transferpoints" method="post" >
		  <tr>
			<td class='lblock'>转换比例 <span class="f_red"></span></td>
			<td class="rblock">1个<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
可转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
 <?php echo $_smarty_tpl->tpl_vars['transfer']->value['trade_points_ratio'];?>
</td>
		  </tr>
		  <tr>
			<td class='lblock'>最多可换得<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
 <span class="f_red"></span></td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['max_trans_points']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['points_dot'];?>
</td>
		  </tr>
		  <tr>
			<td class='lblock'>可用<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
数 <span class="f_red"></span></td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['money_dot'];?>
</td>
		  </tr>
		  <tr>
			<td class='lblock'>输入转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
数量 <span class="f_red"></span></td>
			<td class="rblock">
			<input type="text" name="quantity" id="quantity_points" class="input-100" maxlength="8" /> <span id="dquantiy" class="f_red"></span> 
			&nbsp;&nbsp;&nbsp;
			<input type="button" id="btn_points" value="执行转换" class="button-green" />
			</td>
		  </tr>
		  <!-- 提交保存 -->
		  </form>
		  <?php }else{ ?>
		  <tr>
			<td colspan="2" align="center">对不起，网站已关闭<?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
转换<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
功能。</td>
		  </tr>
		  <?php }?>
	  </table>

	  <?php }?>


    </div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=connect">绑定登录</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=cpa">推广注册</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=transfer">积分转换</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type='text/javascript'>
$(function(){
	//积分转换金币
	$('#btn_money').click(function(){
		var quantity_money = $('#quantity_money').val();
		if (quantity_money < 1) {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请输入转换数量', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		else {
			$.dialog({
				lock:true,
				title: '确认提示',
				content: '确定要执行转换吗？', 
				icon: 'warning',
				button: [
					{
						name: '确定',
						callback: function () {
							$('#my_moneyform').submit();
							return true;
						}
					}, 
					{
						name: '取消'
					}
				]
			});
		}
	});

	//金币转换积分
	$('#btn_points').click(function(){
		var quantity_points = $('#quantity_points').val();
		if (quantity_points < 1) {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请输入转换数量', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		else {
			$.dialog({
				lock:true,
				title: '确认提示',
				content: '确定要执行转换吗？', 
				icon: 'warning',
				button: [
					{
						name: '确定',
						callback: function () {
							$('#my_pointsform').submit();
							return true;
						}
					}, 
					{
						name: '取消'
					}
				]
			});
		}
	});

});
</script><?php }} ?>