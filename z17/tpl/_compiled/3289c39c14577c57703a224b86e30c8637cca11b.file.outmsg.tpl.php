<?php /* Smarty version Smarty-3.1.14, created on 2014-04-03 17:37:48
         compiled from "C:\svn\z17\tpl\user\outmsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25131533a80e9d40dc1-06024434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3289c39c14577c57703a224b86e30c8637cca11b' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\outmsg.tpl',
      1 => 1396517836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25131533a80e9d40dc1-06024434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533a80ea1e3b97_40555939',
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'ucfile' => 0,
    'a' => 0,
    'total' => 0,
    'ucpath' => 0,
    'outmsg' => 0,
    'volist' => 0,
    'urlitem' => 0,
    'showpage' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533a80ea1e3b97_40555939')) {function content_533a80ea1e3b97_40555939($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("message", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">

  <div class="main_right">
    <div class="div_"> 我的消息 &gt;&gt; 已发信件</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message">会员来信</a></li>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg">系统消息</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    <div class="div_smallnav_content_hover">

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	  <div class="nav-tips">
	    <div class="span">已发信件<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
封</div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&type=unread">对方未读</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&type=read">对方已读</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='10%'>状态</td>
		  <td width='55%'>收信人信息</td>
		  <td>查看</td>
		  <td width='12%'>时间</td>
		</tr>
		<?php if (empty($_smarty_tpl->tpl_vars['outmsg']->value)){?>
		<tr>
		  <td colspan="4" align="center" class='hback'>对不起， 暂没有已发信件。</td>
		</tr>
		<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['outmsg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
' onClick="checkItem(this, 'chkAll')">
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['readflag']=='0'){?>
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" title="未读信件" alt="未读信件" />
			<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['readflag']=='1'){?>
			   <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" title="已读信件" alt="已读信件" />
			<?php }?>
		  </td>
		  <td style="text-align:left;">
		    <table border="0" cellpadding="0" cellspacing="0" align="left" class="table-inside">
			  <tr>
			    <td width="60"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width="40" height="48" class="table-inside-img" /></td>
				<td>
				  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br />
					<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁&nbsp;&nbsp;
					<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['marrystatus']),$_smarty_tpl);?>

					<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
&nbsp;
					<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
&nbsp;
					<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['education']),$_smarty_tpl);?>
&nbsp;
					<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['salary']),$_smarty_tpl);?>

				</td>
			  </tr>
			</table>
		  </td>
		  <td>
		  <a href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&a=view&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
' class="letter-button5"></a>
		  </td>
		  <td style="text-align:left;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y/%m/%d %H:%M");?>
</td>
		</tr>
		<?php } ?>
		<tr>
		  <td><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}"  class="button-red" style="cursor:pointer;" />
		  </td>
		</tr>
		<?php }?>
	  </table>
	  </form>

	  <?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
	  <div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
	  <?php }?>
	  <?php }?>
	  
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='view'){?>
	  <!--阅读已收-->
	  <div class="nav-tips">
	    <div class="span"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
">返回列表</a></div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&type=unread">对方未读</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&type=read">对方已读</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
		<tr>
		  <td class="lblock" width="15%">发信时间：</td>
		  <td class="rblock" width="85%"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['outmsg']->value['sendtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
		  <td class="lblock">收 件 人：</td>
		  <td class="rblock">
			<?php echo $_smarty_tpl->tpl_vars['outmsg']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['outmsg']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['outmsg']->value['username'];?>
</a>
			（<?php if ($_smarty_tpl->tpl_vars['outmsg']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['outmsg']->value['age'];?>
岁&nbsp;&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['outmsg']->value['marrystatus']),$_smarty_tpl);?>

			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['outmsg']->value['provinceid']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['outmsg']->value['cityid']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['outmsg']->value['education']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['outmsg']->value['salary']),$_smarty_tpl);?>
）
		  </td>
		</tr>
		<tr>
		  <td class="lblock">信件内容：</td>
		  <td class="rblock"><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['outmsg']->value['content']);?>
</td>
		</tr>
		<tr>
		  <td class="lblock"></td>
		  <td class="rblock">
		  <input type="button" name="btn_return" id="btn_return" value="返回列表" class="button-qing" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
';" />
		  </td>
		</tr>
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
?c=message">会员来信</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg">已发信件</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">收到问候</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to">已发问候</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg">系统消息</a></li>
    </ul>
  </div>
</div>
<div class="_margin"></div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>