<?php /* Smarty version Smarty-3.1.14, created on 2014-04-03 17:37:44
         compiled from "C:\svn\z17\tpl\user\sysmsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8613533d2be8d46fb0-03422383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b521cdde8565c939f6cdbbd7b162268c5d0c3734' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\sysmsg.tpl',
      1 => 1396517860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8613533d2be8d46fb0-03422383',
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
    'total' => 0,
    'ucpath' => 0,
    'sysmsg' => 0,
    'volist' => 0,
    'page' => 0,
    'type' => 0,
    'showpage' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533d2be8e78954_14932361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d2be8e78954_14932361')) {function content_533d2be8e78954_14932361($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("message", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">

  <div class="main_right">
    <div class="div_"> 我的消息 &gt;&gt; 系统消息</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message">会员来信</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg">系统消息</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    <div class="div_smallnav_content_hover">

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	  <div class="nav-tips">
	    <div class="span">共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条消息</div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg&type=unread">未读消息</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg&type=read">已读消息</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='12%'>状态</td>
		  <td width='15%'>发件人</td>
		  <td width='45%'>消息标题</td>
		  <td width='20%'>时间</td>
		  <td>操作</td>
		</tr>
		<?php if (empty($_smarty_tpl->tpl_vars['sysmsg']->value)){?>
		<tr>
		  <td colspan="5" align="center" class='hback'>对不起， 暂没有系统消息。</td>
		</tr>
		<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sysmsg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
' onClick="checkItem(this, 'chkAll')">
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['readflag']=='0'){?>
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" title="未读消息" alt="未读消息" />
			<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['readflag']=='1'){?>
			   <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" title="已读消息" alt="已读消息" />
			<?php }?>
		  </td>
		  <td style="text-align:left;">系统管理员</td>
		  <td style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['volist']->value['subject'];?>
</td>
		  <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y/%m/%d %H:%M:%S");?>
</td>
		  <td align="left"><a href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg&a=view&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'>查看</a></td>
		</tr>
		<?php } ?>
		<tr>
		  <td><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}"  class="button-qing" style="cursor:pointer;" />
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
?c=sysmsg&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
">返回列表</a></div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg&type=unread">未读消息</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg&type=read">已读消息</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td class="lblock" width="15%">消息标题：</td>
		  <td class="rblock" width="85%"><?php echo $_smarty_tpl->tpl_vars['sysmsg']->value['subject'];?>
</td>
		</tr>
		<tr>
		  <td class="lblock">时间：</td>
		  <td class="rblock"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['sysmsg']->value['sendtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
		  <td class="lblock">发 件 人：</td>
		  <td class="rblock">系统管理员</td>
		</tr>
		<tr>
		  <td class="lblock">消息内容：</td>
		  <td class="rblock"><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['sysmsg']->value['content']);?>
</td>
		</tr>
		<tr>
		  <td class="lblock"></td>
		  <td class="rblock">
		  <input type="button" name="btn_return" id="btn_return" value="返回列表" class="button-qing" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=sysmsg&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
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