<?php /* Smarty version Smarty-3.1.14, created on 2014-04-24 17:30:19
         compiled from "C:\svn\z17z17\web\z17\tpl\user\hi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50065355d21cd65491-24418566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b1aaf472caf3820e10224f1e855ac5e9db666f' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\hi.tpl',
      1 => 1398326642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50065355d21cd65491-24418566',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5355d21d12d627_06650531',
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'ucfile' => 0,
    'a' => 0,
    'total' => 0,
    'ucpath' => 0,
    'hi' => 0,
    'volist' => 0,
    'urlitem' => 0,
    'showpage' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355d21d12d627_06650531')) {function content_5355d21d12d627_06650531($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("message", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">

  <div class="main_right">
    <div class="div_"> 我的消息 &gt;&gt; 打招呼/问候</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message">会员来信</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=outmsg">已发信件</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'||$_smarty_tpl->tpl_vars['a']->value=='read'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi">收到问候</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='to'||$_smarty_tpl->tpl_vars['a']->value=='view'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
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
	    <div class="span">共收到个<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
问候</div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&type=unread">未读问候</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&type=read">已读问候</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='12%'>状态</td>
		  <td width='15%'>发件人</td>
		  <td width='45%'>发件人信息</td>
		  <td width='20%'>发件时间</td>
		  <td>操作</td>
		</tr>
		<?php if (empty($_smarty_tpl->tpl_vars['hi']->value)){?>
		<tr>
		  <td colspan="5" align="center" class='hback'>对不起， 暂没有会员和你打招呼。</td>
		</tr>
		<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<?php echo $_smarty_tpl->tpl_vars['volist']->value['hiid'];?>
' onClick="checkItem(this, 'chkAll')">
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']=='0'){?>
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" title="未读问候" alt="未读问候" />
			<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['status']=='1'){?>
			   <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" title="已读问候" alt="已读问候" />
			<?php }?>
		  </td>
		  <td style="text-align:left;<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']=='0'){?>font-weight:bold;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></td>
		  <td style="text-align:left;<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']=='0'){?>font-weight:bold;<?php }?>">
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
		  <td style="<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']=='0'){?>font-weight:bold;<?php }?>"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y/%m/%d %H:%M:%S");?>
</td>
		  <td align="left" style="<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']=='0'){?>font-weight:bold;<?php }?>"><a href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=read&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['hiid'];?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
'>阅读</a></td>
		</tr>
		<?php } ?>
		<tr>
		  <td><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('delreceive');$('#myform').submit();return true;}return false;}"  class="button-red" style="cursor:pointer;" />
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
	  
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='read'){?>
	  <!--阅读已收-->
	  <div class="nav-tips">
	    <div class="span"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
">返回列表</a></div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&type=unread">未读问候</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&type=read">已读问候</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td class="lblock" width="15%">发件时间：</td>
		  <td class="rblock" width="85%"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['hi']->value['sendtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
		  <td class="lblock">发 件 人：</td>
		  <td class="rblock">
			<?php echo $_smarty_tpl->tpl_vars['hi']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['hi']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['hi']->value['username'];?>
</a>

			（<?php if ($_smarty_tpl->tpl_vars['hi']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['hi']->value['age'];?>
岁&nbsp;&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['marrystatus']),$_smarty_tpl);?>

			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['provinceid']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['cityid']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['education']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['salary']),$_smarty_tpl);?>
）
		  </td>
		</tr>
		<tr>
		  <td class="lblock">问 候 语：</td>
		  <td class="rblock"><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['hi']->value['message']);?>
</td>
		</tr>
		<tr>
		  <td class="lblock"></td>
		  <td class="rblock">
		  <input type="button" name="btn_hi" id="btn_hi" value="打招呼" class="button-red" onclick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['hi']->value['fromuserid'];?>
');" />&nbsp;&nbsp;&nbsp;
		  <input type="button" name="btn_write" id="btn_write" value="写信件" class="button-green" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['hi']->value['fromuserid'];?>
');" />
		  </td>
		</tr>
	  </table>
	  <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='to'){?>
	  <!--已发问候列表-->
	  <div class="nav-tips">
	    <div class="span">已发问候<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
个</div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to&type=unread">未读问候</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to&type=read">已读问候</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='12%'>状态</td>
		  <td width='15%'>收件人</td>
		  <td width='45%'>收件人信息</td>
		  <td width='20%'>收件时间</td>
		  <td>操作</td>
		</tr>
		<?php if (empty($_smarty_tpl->tpl_vars['hi']->value)){?>
		<tr>
		  <td colspan="5" align="center" class='hback'>对不起， 暂没有给任何打过招呼。</td>
		</tr>
		<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<?php echo $_smarty_tpl->tpl_vars['volist']->value['hiid'];?>
' onClick="checkItem(this, 'chkAll')">
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['status']==0){?>
			  <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" title="未读问候" alt="未读问候" />
			<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['status']==1){?>
			   <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" title="已读问候" alt="已读问候" />
			<?php }?>
		  </td>
		  <td style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></td>
		  <td style="text-align:left;">
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
		  <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y/%m/%d %H:%M:%S");?>
</td>
		  <td align="left"><a href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=view&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['hiid'];?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
'>查看</a></td>
		</tr>
		<?php } ?>
		<tr>
		  <td><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('delto');$('#myform').submit();return true;}return false;}"  class="button-coff" style="cursor:pointer;" />
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
	  <!--阅读已发-->
	  <div class="nav-tips">
	    <div class="span"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
">返回列表</a></div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to&type=unread">未读问候</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=to&type=read">已读问候</a>&nbsp;&nbsp;&nbsp;
	  </div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td class="lblock" width="15%">发件时间：</td>
		  <td class="rblock" width="85%"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['hi']->value['sendtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
		  <td class="lblock">收 件 人：</td>
		  <td class="rblock">
			<?php echo $_smarty_tpl->tpl_vars['hi']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['hi']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['hi']->value['username'];?>
</a>
			（<?php if ($_smarty_tpl->tpl_vars['hi']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['hi']->value['age'];?>
岁&nbsp;&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['marrystatus']),$_smarty_tpl);?>

			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['provinceid']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['cityid']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['education']),$_smarty_tpl);?>
&nbsp;
			<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['hi']->value['salary']),$_smarty_tpl);?>
）
		  </td>
		</tr>
		<tr>
		  <td class="lblock">问 候 语：</td>
		  <td class="rblock"><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['hi']->value['message']);?>
</td>
		</tr>
		<tr>
		  <td class="lblock"></td>
		  <td class="rblock">
		  <input type="button" name="btn_hi" id="btn_hi" value="打招呼" class="button-red" onclick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['hi']->value['touserid'];?>
');" />&nbsp;&nbsp;&nbsp;
		  <input type="button" name="btn_write" id="btn_write" value="写信件" class="button-green" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['hi']->value['touserid'];?>
');" />
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