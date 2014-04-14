<?php /* Smarty version Smarty-3.1.14, created on 2014-04-03 17:50:17
         compiled from "C:\svn\z17\tpl\user\black.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16129533d2ed9ce0cb1-59659824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3876a30889b8753d5c70ba2f4a1b9069bafa4fea' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\black.tpl',
      1 => 1396518600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16129533d2ed9ce0cb1-59659824',
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
    'black' => 0,
    'volist' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533d2ed9e042b7_89930288',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d2ed9e042b7_89930288')) {function content_533d2ed9e042b7_89930288($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("listen", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">
 
  <div class="main_right">
    <div class="div_"> 我的关注 &gt;&gt; 黑名单</div>

    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=listen">我的关注</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=fans">我的粉丝</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visitme">谁看过我</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visit">我看过谁</a></li>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=black">黑名单</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->

    <div class="div_smallnav_content_hover">
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	  <?php if (empty($_smarty_tpl->tpl_vars['black']->value)){?>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td align="center">对不起，暂无记录！</td>
		</tr>
	  </table>
	  <?php }else{ ?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['black']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  
	  <div class="myfan_item">
	    <div class="myfan_logo">
		  <img class="user-logo" src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width="50" height="60" />
		</div>
	    <div class="myfan_info">
		  <div style="width:100%;">
		    <strong><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></strong>
			<div class="myfan-button" id="tips_<?php echo $_smarty_tpl->tpl_vars['volist']->value['friendid'];?>
"><a href="###" class="pcbtn-green" onclick="obj_action_listen('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fuserid'];?>
', 'listen', 'tips_<?php echo $_smarty_tpl->tpl_vars['volist']->value['friendid'];?>
');">+加关注</a></div>
			<span><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=black&a=del&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['friendid'];?>
">删除</a></span>
			<span><a href="###" onclick="artbox_complaint('<?php echo $_smarty_tpl->tpl_vars['volist']->value['friendid'];?>
');">举报</a></span>
		  </div>
		  <div class="myfan_x">
			<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁 <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'marrystatus','value'=>$_smarty_tpl->tpl_vars['volist']->value['marrystatus']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['volist']->value['height'];?>
CM&nbsp;&nbsp;
		    <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
&nbsp;&nbsp;
		    <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['volist']->value['education']),$_smarty_tpl);?>
&nbsp;&nbsp;<?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'salary','value'=>$_smarty_tpl->tpl_vars['volist']->value['salary']),$_smarty_tpl);?>

		  </div>
		  <div class="myfan_d">
		  <?php if ($_smarty_tpl->tpl_vars['volist']->value['molstatus']==1){?>
		  <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['monolog'],100);?>
...
		  <?php }else{ ?>
		  <font color='#999999'>暂无内心独白</font>
		  <?php }?>
		  </div>
		</div>
		<div class="clear"></div>
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
<?php }} ?>