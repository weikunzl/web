<?php /* Smarty version Smarty-3.1.14, created on 2014-04-01 10:49:54
         compiled from "C:\svn\z17\tpl\user\message_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2421533a2952409910-08153048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90352e9018ca84d66cfe9af6444a1d54ccc127fa' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\message_read.tpl',
      1 => 1378694572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2421533a2952409910-08153048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'ucpath' => 0,
    'ucfile' => 0,
    'a' => 0,
    'comeurl' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533a29525c9e28_47705220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533a29525c9e28_47705220')) {function content_533a29525c9e28_47705220($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["cp_menuid"] = new Smarty_variable("message", null, 0);?>
<style type="text/css">
.box-main{padding:10px;}
.box-dialog-left{float:left;width:120px;}
.box-dialog-left .user-img{padding:5px; border:1px solid #dddddd;width:100px;height:120px;display:block}
.box-dialog-left .user-info {padding:5px;text-align:center;line-height:22px;}
.box-dialog-left p{line-height:25px;}
.box-dialog-left p img{vertical-align:center;}

.box-dialog-right {float:left;margin-left:10px;width:610px;}
.box-dialog-right .dialog-tips {margin-bottom:5px;border-bottom:1px solid #ddd;height:30px;line-height:30px;}
.box-dialog-right .dialog-tips-l {width:100px;height:20px;line-height:20px;float:left;}
.box-dialog-right .dialog-tips-r {margin-left:10px;height:20px;line-height:20px;float:left;}
.box-dialog-right. p {padding-left:10px;line-height:20px;}

.box-dialog-kdmsg {
	width:98%;margin-top:10px;
    background: url("<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/line_cont.jpg") repeat scroll 0 0 transparent;
    border: 0 none;
    min-height: 150px;
    line-height:30px;
	font-size:100%;
	color:#666666;
	overflow:auto;
}
.box-dialog-button{float:right; margin-top:20px;margin-right:20px;}
</style>
<div class="user_main">
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="main_right">
    <div class="div_">个人中心 &gt;&gt; 我的信件</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message">会员来信</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg">系统信件</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover">
	  
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='read'){?>
	  <div class="nav-tips">
	    <div class="span"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
">返回信件列表</a></div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message&type=unread">未读信件</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message&type=read">已读信件</a>&nbsp;&nbsp;&nbsp;
	  </div>

		<div class="box-main">
		  <div class="box-dialog-left fl">
			<div class="user-img">
			  <a href="<?php echo $_smarty_tpl->tpl_vars['message']->value['frominfo']['homeurl'];?>
" target="_blank"><img width="100" height="120" border="0" src="<?php echo $_smarty_tpl->tpl_vars['message']->value['frominfo']['avatarurl'];?>
" /></a>
			</div>
			<div class="user-info">
			<?php if ($_smarty_tpl->tpl_vars['message']->value['frominfo']['gender']=='1'){?>男<?php }else{ ?>女<?php }?> 
			  <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['frominfo']['marrystatus']),$_smarty_tpl);?>
 
			  <?php echo $_smarty_tpl->tpl_vars['message']->value['frominfo']['age'];?>
 岁<br />
			  <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['frominfo']['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['frominfo']['cityid']),$_smarty_tpl);?>
<br />
			  <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['message']->value['frominfo']['education']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['frominfo']['height'];?>
CM
			</div>
			<p>
			</p>
		  </div>
		  <div class="box-dialog-right fl">
		    <div class="dialog-tips" style="border:none;">
			  <span style="float:right;" id="tips_listen_<?php echo $_smarty_tpl->tpl_vars['message']->value['fromuserid'];?>
"><script>obj_listen_status('<?php echo $_smarty_tpl->tpl_vars['message']->value['fromuserid'];?>
', 'tips_listen_<?php echo $_smarty_tpl->tpl_vars['message']->value['fromuserid'];?>
');</script></span>
			  <span style="float:right;"></span>
			</div>
			<div class="dialog-tips">
			  <span style="float:right;color:#999999;">来信时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['sendtime'],"%Y-%m-%d %H:%M");?>
</span>
			  阅读“<b><?php echo $_smarty_tpl->tpl_vars['message']->value['frominfo']['username'];?>
</b>”的来信
			</div>

			<div class="box-dialog-kdmsg">
			  <?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['message']->value['content']);?>

			</div>
				
			<div class="box-dialog-button">
			  <a href='###' onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['message']->value['fromuserid'];?>
');" class="letter-button7"></a>
			</div>
			<div class="clear"></div>
			<p>
			</p>

		  </div>
		  <div class="clear"></div>
		</div>



	  <?php }?>

	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"></div>
  <!--//main_right End-->
  
  <div class="right_kj" id="kj_box">
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message">会员来信</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg">已发信件</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">收到问候</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to">已发问候</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg">系统信件</a></li>
    </ul>
  </div>
  <div style="margin: 30px;"></div>
  <!--//right_kj End-->
  
</div>
<!--//user_main End-->

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>