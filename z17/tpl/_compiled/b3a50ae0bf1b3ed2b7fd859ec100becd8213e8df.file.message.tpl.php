<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 10:08:41
         compiled from "C:\svn\z17z17\web\z17\tpl\user\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265335355cf29cd6b38-36871295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3a50ae0bf1b3ed2b7fd859ec100becd8213e8df' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\message.tpl',
      1 => 1398066166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265335355cf29cd6b38-36871295',
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
    'g' => 0,
    'type' => 0,
    'message' => 0,
    'volist' => 0,
    'page' => 0,
    'showpage' => 0,
    'u' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5355cf29ee43a2_14664779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355cf29ee43a2_14664779')) {function content_5355cf29ee43a2_14664779($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("message", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="user_main">
  <div class="main_right">
    <div class="div_">我的消息 &gt;&gt; 我的信件</div>
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
	  
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	  <div class="nav-tips">
	    <div class="span">收到信件<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
封</div>
	    筛选排序：
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg01.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message&type=unread">未读信件</a> &nbsp;&nbsp;&nbsp;
	    <img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/tips-msg02.gif" /><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message&type=read">已读信件</a>&nbsp;&nbsp;&nbsp;
	    <br />
		每天阅读同性会员信件：<?php if ($_smarty_tpl->tpl_vars['g']->value['msg']['txviewlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['g']->value['msg']['txviewnum'];?>
 封 <?php }else{ ?> 不限<?php }?>&nbsp;&nbsp;&nbsp;
		每天阅读异性会员信件：<?php if ($_smarty_tpl->tpl_vars['g']->value['msg']['yxviewlimit']==1){?><?php echo $_smarty_tpl->tpl_vars['g']->value['msg']['yxviewnum'];?>
 封 <?php }else{ ?> 不限<?php }?><br />
		如果没有阅读权限，需要支付&nbsp;<font color="blue"><b><?php echo $_smarty_tpl->tpl_vars['g']->value['fee']['viewmsgfee'];?>
</b></font>&nbsp;个金币阅读每封信件。

	  </div>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=message&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='10%'>状态</td>
		  <td width='60%'>发信人</td>
		  <td>查看</td>
		  <td width='15%'>时间</td>
		</tr>
		<?php if (empty($_smarty_tpl->tpl_vars['message']->value)){?>
		<tr>
		  <td colspan="4" align="center" class='hback'>对不起， 暂没有信件。</td>
		</tr>
		<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
				<td<?php if ($_smarty_tpl->tpl_vars['volist']->value['readflag']=='0'){?> style="font-weight:bold;"<?php }?>>
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
		  <?php if (true===$_smarty_tpl->tpl_vars['volist']->value['needpaystatus']){?>
		  <a href='###' onclick="read_payfee('<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
');" class="letter-button4"></a>
		  <?php }else{ ?>
	        <?php if ($_smarty_tpl->tpl_vars['volist']->value['readflag']=='0'){?>
			  <a href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=readmsg&a=read&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
' class="letter-button3"></a>
			<?php }else{ ?>
			  <a href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=readmsg&a=read&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['msgid'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
' class="letter-button6"></a>
			<?php }?>
		  <?php }?>
		  </td>
		  <td style="text-align:left;<?php if ($_smarty_tpl->tpl_vars['volist']->value['readflag']=='0'){?>font-weight:bold;<?php }?>"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y/%m/%d %H:%M");?>
</td>
		</tr>
		<?php } ?>
		<tr>
		  <td style="border-bottom:0px;"><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;border-bottom:0px;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}" class="button-red" style="cursor:pointer;" />
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
</html>
<script type="text/javascript">
//支付阅读
function read_payfee(id, type, page) {
	var umoney = <?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
;
	var syspafee = <?php echo $_smarty_tpl->tpl_vars['g']->value['fee']['viewmsgfee'];?>
;
	if (syspafee <= 0) {
		syspafee = 1;
	}
	if (parseFloat(umoney) < parseFloat(syspafee)) {
		$.dialog.tips("对不起，你的金币不足，不能看这封信，请先充值。", 3);
		return false;
	}
	else {
		$.dialog({
			lock:true,
			title: '温馨提示',
			content: '确定使用'+syspafee+'个金币阅读这封信件吗？', 
			icon: 'warning',
			button: [
				{
					name: '确定',
					callback: function () {
						if (id > 0) {
							$.ajax({
								type: "POST",
								url: _ROOT_PATH + "usercp.php?c=message",
								cache: false,
								data: {a: "readpay", id: id, r:get_rndnum(8)},
								dataType: "json",
								beforeSend: function(XMLHttpRequest) {
									XMLHttpRequest.setRequestHeader("request_type", "ajax");
								},
								success: function(data) {
									var json = eval(data);
									var response = json.response;
									var msg = json.msg;
									if (response == '1') {
										//跳转到阅读页面
										window.location.href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=readmsg&a=read&id="+id+"&type="+type+"&page="+page+"";
									}
									else {
										//邮票失败
										if (msg.length>0) {
											$.dialog.tips(msg, 3);
										}
										else {
											$.dialog.tips("对不起，支付失败", 3);
										}
									}
								},
								error: function() {}
							});
						}

					}
				}, 
				{
					name: '取消'
				}
			]
		});
	}
}
</script><?php }} ?>