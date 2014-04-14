<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:55:00
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22648532ed9a45d0c83-09738289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b5d6e8cb89be65bd61a93f2dbca1833ce266e46' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\account.tpl',
      1 => 1378367120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22648532ed9a45d0c83-09738289',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'a' => 0,
    'ucfile' => 0,
    'u' => 0,
    'ucpath' => 0,
    'g' => 0,
    'config' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed9a47e1ed4_75559892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed9a47e1ed4_75559892')) {function content_532ed9a47e1ed4_75559892($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["cp_menuid"] = new Smarty_variable("account", null, 0);?>
<div class="user_main">
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 帐号信息</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account">我的帐号</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='editpassword'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=editpassword">修改密码</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='recall'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=recall">邮件接收</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='setstatus'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=setstatus">设置状态</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

	<div class="div_smallnav_content_hover">
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> 
      <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>我的帐号</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 会员ID -->
		  <tr>
			<td width="15%" class="lblock">交友ID：</td>
			<td width="85%" class="rblock"><?php echo $_smarty_tpl->tpl_vars['u']->value['userid'];?>
</td>
		  </tr>
		  <!-- 会员名称 -->
		  <tr>
			<td class="lblock">登录账号：</td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['u']->value['username'];?>
</td>
		  </tr>
		  <!-- Email -->
		  <tr>
			<td class="lblock">登录邮箱：</td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['u']->value['email'];?>
</td>
		  </tr>
		  <!-- 交友状态 -->
		  <tr>
			<td class="lblock">交友状态：</td>
			<td class="rblock">
			<?php if ($_smarty_tpl->tpl_vars['u']->value['lovestatus']==1){?>
			<font color='green'>征友进行中</font>
			<?php }else{ ?>
			<font color='red'>已关闭征友</font>
			<?php }?>
			&nbsp;&nbsp;&nbsp;
			<input type="button" class="button-red" value="修改状态" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=setstatus';" />
			</td>
		  </tr>
		  <!-- 诚信星级 -->
		  <tr>
			<td class="lblock">诚信星级 </td>
			<td class="rblock">
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/cid<?php if ($_smarty_tpl->tpl_vars['u']->value['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['idnumberrz']==0){?>身份证未认证<?php }else{ ?>已身份证认证<?php }?>" />&nbsp;
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/video<?php if ($_smarty_tpl->tpl_vars['u']->value['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['videorz']==0){?>视频未认证<?php }else{ ?>已视频认证<?php }?>" />&nbsp;
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/email<?php if ($_smarty_tpl->tpl_vars['u']->value['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['emailrz']==0){?>邮箱未认证<?php }else{ ?>已邮箱认证<?php }?>" />&nbsp;
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/mobile<?php if ($_smarty_tpl->tpl_vars['u']->value['mobilerz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['mobilerz']==0){?>手机未认证<?php }else{ ?>已手机认证<?php }?>" />
			  &nbsp;&nbsp;&nbsp;
			  <input type="button" class="button-green" value="诚信认证" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify';" />
			</td>
		  </tr>
		  <!-- 会员组 -->
		  <tr>
			<td class="lblock">会员组： </td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['u']->value['levelimg'];?>
 <b><?php echo $_smarty_tpl->tpl_vars['g']->value['groupname'];?>
</b>&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['g']->value['groupid']>1){?>（VIP到期 <?php echo $_smarty_tpl->tpl_vars['u']->value['vipenddate_t'];?>
）<?php }else{ ?>
			&nbsp;&nbsp;&nbsp;
			
			<a class="btn_c1" href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip"><span>升级会员服务</span></a><?php }?></td>
		  </tr>
		  <!-- 剩余积分 -->
		  <tr>
			<td class="lblock">积 分：</td>
			<td class="rblock"><font color="blue"><b><?php echo $_smarty_tpl->tpl_vars['u']->value['points'];?>
</b></font> </td>
		  </tr>
		  <!-- 剩余金币 -->
		  <tr>
			<td class="lblock">金 币：</td>
			<td class="rblock"><font color="green"><b><?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
</b></font> &nbsp;&nbsp;&nbsp;
			<input type="button" value="在线充值" class="button-qing" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment';" />&nbsp;&nbsp;&nbsp;
			<?php if ($_smarty_tpl->tpl_vars['config']->value['app']['card']=='1'){?>
			<input type="button" value="充值卡充值" class="button-qing" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=card';" />
			<?php }?>
			</td>
		  </tr>
		  <!-- 注册时间 -->
		  <tr>
			<td class="lblock">注册时间 </td>
			<td class="rblock"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['u']->value['regtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		  </tr>
		  <!-- 登录次数 -->
		  <tr>
			<td class="lblock">登录次数 </td>
			<td class="rblock"><?php echo $_smarty_tpl->tpl_vars['u']->value['logintimes'];?>
 次</td>
		  </tr>
		  <!-- 登录时间 -->
		  <tr>
			<td class="lblock">登录时间 </td>
			<td class="rblock"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['u']->value['logintime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		  </tr>
      </table>
	  <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='editpassword'){?> 
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=savepassword" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>修改密码</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 旧密码 --> 
		  <tr>
			<td class='lblock' width="20%">旧 密 码 <span class="f_red">*</span></td>
			<td class='rblock'><input type="password" name="oldpassword" id="oldpassword" class="input-150" maxlength="16" /> <span id="doldpassword" class="f_red"></span></td>
		  </tr>
		  <!-- 新密码 -->
		  <tr>
			<td class='lblock'>新 密 码 <span class="f_red">*</span></td>
			<td class='rblock'><input type="password" name="newpassword" id="newpassword" class="input-150" maxlength="16" /> <span id="dnewpassword" class="f_red"></span> (6-16个字符)</td>
		  </tr>
		  <!-- 确认新密码 -->
		  <tr>
			<td class='lblock'>再次输入 <span class="f_red">*</span></td>
			<td class='rblock'><input type="password" name="confirmpassword" id="confirmpassword" class="input-150" maxlength="16" /> <span id="dconfirmpassword" class="f_red"></span></td>
		  </tr>
		  <!-- 提交保存 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'><input type="submit" name="btn_save" class="button-red" value="修 改" onclick="return checkform();" /></td>
		  </tr>
	  </table>
	  </form>
	  <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='recall'){?>
	  <form name="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=saverecall" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>邮件接收设置</p><span class="shadow"></span></div></td>
		  </tr>
		  <tr>
			<td colspan="2"><b>接收会员打招呼、写信件和送礼物邮件提醒</b><br />
			只有通过认证的邮箱才可以接收邮件。<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=certify&a=email">邮箱认证</a>
			</td>
		  </tr>
		  <tr>
			<td class='lblock' width='10%'></td>
			<td class='rblock' width='90%'>开启 <input type="radio" name="recall" id="recall" value='1'<?php if ($_smarty_tpl->tpl_vars['u']->value['recall']=='1'){?> checked<?php }?> /> <span id="drecall" class="f_red"></span></td>
		  </tr>
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'>关闭 <input type="radio" name="recall" id="recall" value='0'<?php if ($_smarty_tpl->tpl_vars['u']->value['recall']=='0'){?> checked<?php }?> /> <span id="drecall" class="f_red"></span></td>
		  </tr>
		  <!-- 提交保存 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'><input type="submit" name="btn_save" value="保 存" class="button-red" /></td>
		  </tr>
	  </table>
	  </form>
	  <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='setstatus'){?>
	  <form name="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=savestatus" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>设置交友状态</p><span class="shadow"></span></div></td>
		  </tr>
		  <tr>
			<td colspan="2"><b>如果征友状态关闭，别人再也无法看到您的资料和照片；</b><br />
			征友状态关闭之后，不需要再做任何其它操作。
			</td>
		  </tr>
		  <tr>
			<td class='lblock' width='10%'></td>
			<td class='rblock' width='90%'>征友进行中 <input type="radio" name="lovestatus" value="1"<?php if ($_smarty_tpl->tpl_vars['u']->value['lovestatus']==1){?> checked<?php }?> /> <span id="dlovestatus" class="f_red"></span></td>
		  </tr>
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'>关闭征友 <input type="radio" name="lovestatus" value="2"<?php if ($_smarty_tpl->tpl_vars['u']->value['lovestatus']==2){?> checked<?php }?> /> <span id="dlovestatus" class="f_red"></span></td>
		  </tr>
		  <!-- 提交保存 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock'><input type="submit" name="btn_save" value="保 存" class="button-red" /></td>
		  </tr>
	  </table>
	  </form>
	  <?php }?>


    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account">帐号信息</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=editpassword">修改密码</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=recall">邮件接收</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=setstatus">设置状态</a></li>
    </ul>
  </div>
  <div style="margin:30px;"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type="text/javascript">
function checkform() {
	var t = '';
	var v = '';
    
	//旧密码
	t = 'oldpassword';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('旧密码不能为空', t);
		return false;
	}
    
	//新密码
	t = 'newpassword';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('请输入新密码', t);
		return false;
	} else {
		if(v.length <6 || v.length>16) {
			dmsg('新密码长度必须为6-16个字符', t);
			return false;
		}
	
	}
    
	//确认密码
	if($('#confirmpassword').val() != $('#newpassword').val()) {
		dmsg('确认新密码不正确', 'confirmpassword');
		return false;
	}

	$("#myform").submit();

	return true;
}
</script><?php }} ?>