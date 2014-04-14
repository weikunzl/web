<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:53:47
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\block_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10232532ed95bb87e90-40561837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b944d8e64b68e299c97313873dee7f19a1ae10c' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\block_menu.tpl',
      1 => 1378793996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10232532ed95bb87e90-40561837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ucfile' => 0,
    'u' => 0,
    'ucpath' => 0,
    'count_msg' => 0,
    'count_hi' => 0,
    'cp_menuid' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed95bd60456_13932161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed95bd60456_13932161')) {function content_532ed95bd60456_13932161($_smarty_tpl) {?>  <div class="user_main_left">

    <div class="user_info_">
	  <div class="J_UserLogo"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=avatar"><img src="<?php echo $_smarty_tpl->tpl_vars['u']->value['avatarurl'];?>
" width="48" height="58" title="设置行形象照" /></a></div>
	  <div class="J_UserInfoBox">
	    <?php echo $_smarty_tpl->tpl_vars['u']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['u']->value['homeurl'];?>
" target="_blank" title="访问我的主页"><?php echo $_smarty_tpl->tpl_vars['u']->value['username'];?>
</a>&nbsp;
		  <br />
		  <a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/cid<?php if ($_smarty_tpl->tpl_vars['u']->value['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['idnumberrz']==0){?>身份证未认证<?php }else{ ?>已身份证认证<?php }?>" /></a>&nbsp;
		  <a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/email<?php if ($_smarty_tpl->tpl_vars['u']->value['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['emailrz']==0){?>邮箱未认证<?php }else{ ?>已邮箱认证<?php }?>" /></a>&nbsp;
		  <a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/video<?php if ($_smarty_tpl->tpl_vars['u']->value['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['u']->value['videorz']==0){?>视频未认证<?php }else{ ?>已视频认证<?php }?>" /></a>&nbsp;
		<br />
		<font color="green">(<?php echo $_smarty_tpl->tpl_vars['u']->value['groupname'];?>
)</font>
	  </div>
	  <div class="clear"> </div>
	</div>
	<div class="user-info-tip">
	  <p>
		<a href="<?php echo $_smarty_tpl->tpl_vars['u']->value['homeurl'];?>
" target="_blank">预览我的个人主页</a><br />
		<?php if ($_smarty_tpl->tpl_vars['u']->value['lovestatus']=='1'){?>
		<font color="green">征友进行中</font>
		<?php }else{ ?>
		<font color="gray">已关闭征友</font>
		<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account&a=setstatus">修改</a>
		<br />
		帐户金币：<?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>

	  </p>
	</div>
	<div class="user-info-tip">
	  <div class="user-info-tip-left">
		<table cellspacing="0" cellpadding="0" border="0" align="center">
		  <tr>
		    <td class="numberInbox">
			  <?php ob_start();?><?php echo cmd_count(array('mod'=>'user','type'=>'newmessage','value'=>$_smarty_tpl->tpl_vars['u']->value['userid']),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["count_msg"] = new Smarty_variable($_tmp1, null, 0);?>
			  <div class="numberR"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message"><?php if ($_smarty_tpl->tpl_vars['count_msg']->value>99){?>99+<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['count_msg']->value;?>
<?php }?></a></div>
			</td>
		  </tr>
		  <tr>
		    <td height="30">收件箱</td>
		  </tr>
		</table>
	  </div>
	  <div class="user-info-tip-right">
		<table cellspacing="0" cellpadding="0" border="0" align="center">
		  <tr>
		    <td class="numberInbox">
			  <?php ob_start();?><?php echo cmd_count(array('mod'=>'user','type'=>'newhi','value'=>$_smarty_tpl->tpl_vars['u']->value['userid']),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["count_hi"] = new Smarty_variable($_tmp2, null, 0);?>
			  <div class="numberR"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi"><?php if ($_smarty_tpl->tpl_vars['count_hi']->value>99){?>99+<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['count_hi']->value;?>
<?php }?></a></div>
			</td>
		  </tr>
		  <tr>
		    <td height="30">打招呼</td>
		  </tr>
		</table>
	  </div>
	  <div class="clear"></div>
	</div>
	
	<div class="user_menu_hr"></div>
    <div class="user_menu_item">
	  <ul>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='account'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562879.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=account">交友帐号</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='payment'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562761.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment"><b><font color="red">在线充值</font></b></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='vip'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562855.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip">会员服务</a></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
	    <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='message'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562810.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message"><b><font color="red">我的信件</font></b></a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='hi'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562717.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">我的问候</a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='sysmsg'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562812.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg">系统消息</a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='gift'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562785.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift">我的礼物</a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='listen'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562709.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=listen"><b><font color="red">我的关注</font></b></a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='fans'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562808.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=fans">我的粉丝</a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='visitme'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562779.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visitme">谁看过我</a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='visit'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562757.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visit">我看过谁</a></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='match'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562832.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=match"><b><font color="red">缘分速配</font></b></a></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='avatar'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562711.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=avatar">形象照</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='album'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562793.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album">我的相册</a><span><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album&a=upload">上传</a></span></li>
		<li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='profile'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562783.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile"><b><font color="red">编辑资料</font></b></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='certify'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562811.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify"><b><font color="red">诚信认证</font></b></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='cond'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562843.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=cond">择友条件</a></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='weibo'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562851.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=weibo"><b><font color="red">心情微播</font></b></a></span></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='diary'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562885.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary">我的日记</a><span><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary&a=add">发表</a></span></li>
      </ul>
	  <div class="clear"></div>
	</div>
    <div class="user_menu_hr"></div>

    <div class="user_menu_item">
	  <ul>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='extend'&&$_smarty_tpl->tpl_vars['a']->value=='connect'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562804.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=connect">绑定登录</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='extend'&&$_smarty_tpl->tpl_vars['a']->value=='cpa'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562848.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=cpa">推广注册</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='extend'&&$_smarty_tpl->tpl_vars['a']->value=='transfer'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562743.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=extend&a=transfer">积分转换</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='money'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562763.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=money">金币记录</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['cp_menuid']->value=='points'){?> class="current"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/green/562875.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=points">积分记录</a></li>
      </ul>
	  <div class="clear"></div>
	</div>
  </div>
  <!--//user_main_left End--><?php }} ?>