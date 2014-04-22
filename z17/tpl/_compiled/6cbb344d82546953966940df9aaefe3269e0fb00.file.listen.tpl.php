<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 17:41:49
         compiled from "C:\svn\z17z17\web\z17\tpl\user\listen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:311965354e7dd5bb4c4-70153922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cbb344d82546953966940df9aaefe3269e0fb00' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\listen.tpl',
      1 => 1398066166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311965354e7dd5bb4c4-70153922',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'ucfile' => 0,
    'a' => 0,
    'listen' => 0,
    'volist' => 0,
    'ucpath' => 0,
    'page' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354e7dd7aa051_02561713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354e7dd7aa051_02561713')) {function content_5354e7dd7aa051_02561713($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("listen", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">

  <div class="main_right">
    <div class="div_"> 我的关注 </div>

    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=listen">我的关注</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=fans">我的粉丝</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visitme">谁看过我</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visit">我看过谁</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=black">黑名单</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	  <?php if (empty($_smarty_tpl->tpl_vars['listen']->value)){?>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td align="center">对不起，你还没关注任何人！</td>
		</tr>
	  </table>
	  <?php }else{ ?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listen']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <div class="myfollow_item" id="myfollow_<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
">
		<div class="myfollow_logo"><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><img class="user-logo" src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width="50" height="60" /></a></div>
		<ul class="myfollow_info">
		  <li><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁</li>
		  <li> 
		  <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'marrystatus','value'=>$_smarty_tpl->tpl_vars['volist']->value['marrystatus']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['volist']->value['height'];?>
CM&nbsp;&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>

		  </li>
		  <li>
		  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/cid<?php if ($_smarty_tpl->tpl_vars['volist']->value['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['volist']->value['idnumberrz']==0){?>身份证未认证<?php }else{ ?>已身份证认证<?php }?>" />
		  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/video<?php if ($_smarty_tpl->tpl_vars['volist']->value['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['volist']->value['videorz']==0){?>视频未认证<?php }else{ ?>已视频认证<?php }?>" />
		  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/email<?php if ($_smarty_tpl->tpl_vars['volist']->value['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['volist']->value['emailrz']==0){?>邮箱未认证<?php }else{ ?>已邮箱认证<?php }?>" /> 
		  </li>
		</ul>
		<div class="clear"></div>
		<div class="myfollow_db" id="myfollow_<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
_db">
		  <?php if ($_smarty_tpl->tpl_vars['volist']->value['molstatus']==1){?>
		  <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['monolog'],15);?>
..
		  <?php }else{ ?>
		  <font color='#999999'>未审核,锁定</font>
		  <?php }?>		
		</div>
		<div class="myfollow_gn" id="myfollow_<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
_gn">
		<a href="###" onclick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
');">打招呼</a> | 
		<a href="###" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
');">写信件</a> | 
		<a href="###" onclick="artbox_sendgift('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
');">送礼物</a> | 
		<a href="###" onclick="artbox_complaint('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
');">举报</a>
		</div>
		<div class="myfollow_close" cyaz="myfollow_<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
" id="myfollow_<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
_close" title="取消关注"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=listen&a=cancel&fuid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">×</a></div>
	  </div>
	  <?php } ?>
	  <div class="clear"></div>
	  <?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
	  <div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
	  <?php }?>

	  <?php }?>
	  <?php }?>
    </div>
	<!--//div_smallnav_content_hover End-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=listen">我的关注</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=fans">我的粉丝</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visitme">谁看过我</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visit">我看过谁</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=black">黑名单</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type="text/javascript">
//关注
$(function() {
	$(".myfollow_item").bind({
		mouseover: function() {
			$("#" + $(this).attr("id") + "_db").hide();
			$("#" + $(this).attr("id") + "_gn").show();
			$("#" + $(this).attr("id") + "_close").show();
		},
		mouseout: function() {
			$("#" + $(this).attr("id") + "_db").show();
			$("#" + $(this).attr("id") + "_gn").hide();
			$("#" + $(this).attr("id") + "_close").hide();
		}
	});

	/*取消关注*/
	$(".myfollow_close").click(function() {
		$("#" + $(this).attr("cyaz")).fadeOut("slow");
	});
});
</script>
<?php }} ?>