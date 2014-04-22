<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 10:17:40
         compiled from "C:\svn\z17z17\web\z17\tpl\user\gift.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165205355d0b89b4955-09211108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32ead44c92c27e803b91783398937814413cfa5e' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\gift.tpl',
      1 => 1398133023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165205355d0b89b4955-09211108',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5355d0b8c01459_90749822',
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'a' => 0,
    'ucfile' => 0,
    'gift' => 0,
    'volist' => 0,
    'page' => 0,
    'showpage' => 0,
    'ucpath' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355d0b8c01459_90749822')) {function content_5355d0b8c01459_90749822($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable("gift", null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 我的礼物</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift">收到的礼物</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='sendlog'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=sendlog">送出的礼物</a></li>
		  <?php if ($_smarty_tpl->tpl_vars['a']->value=='viewsend'){?>
		  <li class="tab_item current">查看送出的礼物</li>
		  <?php }?>
		  <?php if ($_smarty_tpl->tpl_vars['a']->value=='viewreceive'){?>
		  <li class="tab_item current">查看收到的礼物</li>
		  <?php }?>
		</ul>
	  </div>
    </div>
	<!--TAB END-->
	
	<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	<!--收到的礼物-->
    <div class="div_smallnav_content_hover" id="nav_lv_detail">
	  <?php if (empty($_smarty_tpl->tpl_vars['gift']->value)){?>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td align="center">对不起，你还没收到任何礼物。</td>
		</tr>
	  </table>
	  <?php }else{ ?>
      <ul>
	    <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=viewreceive&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['imgurl'];?>
" width="120" height="120"  /></a>
          <div><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=viewreceive&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
</a></div>
          <div class="cc"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtimeline'],"%Y-%m-%d %H:%M:%S");?>
</div>
          赠送人：<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br />
		  (<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁&nbsp;<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['marrystatus']),$_smarty_tpl);?>
&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
)
		</li>
		<?php } ?>
      </ul>
	  <div class="clear"> </div>
	  <?php }?>
    </div>
	<?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
	<div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
	<div class="clear"></div>
	<?php }?>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['a']->value=='viewreceive'){?>
	<!--查看收到的礼物-->
	<div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>查看礼物</p><span class="shadow"></span></div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td class="hback_1" style="text-align:center;" width="30%">
			  <br /><img src="<?php echo $_smarty_tpl->tpl_vars['gift']->value['imgurl'];?>
" />
			  <br /><b><?php echo $_smarty_tpl->tpl_vars['gift']->value['giftname'];?>
</b><br />
		  </td>
		  <td valign="top">
		    <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
			    <tr>
				  <td width="15%" class="lblock">赠送人：</td>
				  <td class="rblock">
				  <?php echo $_smarty_tpl->tpl_vars['gift']->value['levelimg'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['gift']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['gift']->value['username'];?>
</a><br />(<?php if ($_smarty_tpl->tpl_vars['gift']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;&nbsp;
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['marrystatus']),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['gift']->value['age'];?>
岁&nbsp;
				  <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['cityid']),$_smarty_tpl);?>
&nbsp;
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['education']),$_smarty_tpl);?>
)
				  </td>
				</tr>
			    <tr>
				  <td class="lblock">状 态：</td>
				  <td class="rblock">
				  <?php if ($_smarty_tpl->tpl_vars['gift']->value['viewstatus']=='1'){?>
				    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/ok.gif" /> <font color="green">已查看</font>  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['gift']->value['viewtimeline'],"%Y-%m-%d %H:%M:%S");?>

				  <?php }else{ ?>
				    <font color="#999999">未看</font>
				  <?php }?>
				  &nbsp;
				  </td>
				</tr>
			    <tr>
				  <td class="lblock">赠 言：</td>
				  <td class="rblock"><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['gift']->value['message']);?>
</td>
				</tr>
			    <tr>
				  <td class="lblock" height="50"></td>
				  <td class="rblock">
				  <input type="button" name="btn_jixu" id="btn_jixu" class="button-red" value="回赠礼物" onclick="artbox_sendgift('<?php echo $_smarty_tpl->tpl_vars['gift']->value['fromuserid'];?>
');" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="btn_return" id="btn_return" value="返回列表" class="button-green" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
'" /></td>
				</tr>
			</table>
		  </td>
		</tr>
	  </table>
	</div>
	<?php }?>

    
	<?php if ($_smarty_tpl->tpl_vars['a']->value=='sendlog'){?>
	<!--送出的礼物-->
    <div class="div_smallnav_content_hover" id="nav_sclw_detail">
	  <?php if (empty($_smarty_tpl->tpl_vars['gift']->value)){?>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td align="center">对不起，你还没送出任何礼物。</td>
		</tr>
	  </table>
	  <?php }else{ ?>
      <ul>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=viewsend&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['imgurl'];?>
" width="120" height="120" /></a>
          <div><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=viewsend&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
</a></div>
          <div class="cc"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtimeline'],"%Y-%m-%d %H:%M:%S");?>
</div>
		  接收人：<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br />(<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁&nbsp;<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['marrystatus']),$_smarty_tpl);?>
&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
)
	    </li>
		<?php } ?>
      </ul>
	  <?php }?>
      <div class="clear"> </div>
    </div>
	<?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
	<div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
	<div class="clear"></div>
	<?php }?>
	<?php }?>


	<?php if ($_smarty_tpl->tpl_vars['a']->value=='viewsend'){?>
	<!--查看送出的礼物-->
	<div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>查看礼物</p><span class="shadow"></span></div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
	    <tr>
		  <td class="hback_1" style="text-align:center;" width="30%">
			  <br /><img src="<?php echo $_smarty_tpl->tpl_vars['gift']->value['imgurl'];?>
" />
			  <br /><b><?php echo $_smarty_tpl->tpl_vars['gift']->value['giftname'];?>
</b><br />
		  </td>
		  <td valign="top">
		    <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
			    <tr>
				  <td width="15%" class="lblock">接收人：</td>
				  <td class="rblock">
				  <?php echo $_smarty_tpl->tpl_vars['gift']->value['levelimg'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['gift']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['gift']->value['username'];?>
</a><br />(<?php if ($_smarty_tpl->tpl_vars['gift']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;&nbsp;
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['marrystatus']),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['gift']->value['age'];?>
岁&nbsp;
				  <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['cityid']),$_smarty_tpl);?>
&nbsp;
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['gift']->value['education']),$_smarty_tpl);?>
)
				  </td>
				</tr>
			    <tr>
				  <td class="lblock">状 态：</td>
				  <td class="rblock">
				  <?php if ($_smarty_tpl->tpl_vars['gift']->value['viewstatus']=='1'){?>
				    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/ok.gif" /> <font color="green">已查看</font>  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['gift']->value['viewtimeline'],"%Y-%m-%d %H:%M:%S");?>

				  <?php }else{ ?>
				    <font color="#999999">未看</font>
				  <?php }?>
				  &nbsp;
				  </td>
				</tr>
			    <tr>
				  <td class="lblock">赠 言：</td>
				  <td class="rblock"><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['gift']->value['message']);?>
</td>
				</tr>
			    <tr>
				  <td class="lblock" height="50"></td>
				  <td class="rblock">
				  <input type="button" name="btn_send" id="btn_send" class="button-red" value="继续赠送" onclick="artbox_sendgift('<?php echo $_smarty_tpl->tpl_vars['gift']->value['touserid'];?>
');" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="btn_return" id="btn_return" value="返回列表" class="button-green" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=sendlog&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
';" /></td>
				</tr>
			</table>
		  </td>
		</tr>
	  </table>
	</div>
	<?php }?>

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift">收到的礼物</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=sendlog">送出的礼物</a></li>
	</ul>
  </div>
  <div style="margin:30px;"></div>
</div>
<!--//user_main End-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>