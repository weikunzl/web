<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:53:29
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\writemsg_jdbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9996532ed94916dfb4-47998079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6232a06739b53aa2f899b79adf39e57a3336f7f0' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\writemsg_jdbox.tpl',
      1 => 1378461768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9996532ed94916dfb4-47998079',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'ucpath' => 0,
    'touser' => 0,
    'touid' => 0,
    'paystatus' => 0,
    'u' => 0,
    'ucfile' => 0,
    'g' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed9492afd31_38152264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed9492afd31_38152264')) {function content_532ed9492afd31_38152264($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.box-main{padding:10px;}
.box-dialog-left{float:left;width:120px;}
.box-dialog-left .user-img{padding:5px; border:1px solid #dddddd;width:100px;height:120px;display:block}
.box-dialog-left .user-info {padding:5px;text-align:center;line-height:22px;}
.box-dialog-left p{line-height:25px;}
.box-dialog-left p img{vertical-align:center;}
.box-dialog-right {float:left;margin-left:10px;}

.box-dialog-right .dialog-tips {margin-bottom:5px;}
.box-dialog-right .dialog-tips-l {width:100px;height:20px;line-height:20px;float:left;}
.box-dialog-right .dialog-tips-r {margin-left:10px;height:20px;line-height:20px;float:left;}
.box-dialog-right. p {padding-left:10px;line-height:20px;}

.box-dialog-kdmsg {border: 1px solid #F7F7F7;box-shadow: 0 0 0 #666666;padding: 0 25px; width:400px;margin-top:10px;}
.box-dialog-kdmsg .writecon {
    background: url("<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/line_cont.jpg") repeat scroll 0 0 transparent;
    border: 0 none;
    height: 210px;
    line-height:30px;
    width: 100%;
	font-size:100%;
	color:#666666;
	overflow:auto;
}
.box-dialog-button{float:right; margin-top:20px;margin-right:20px;}
</style>
<div class="box-main">
  <div class="box-dialog-left fl">
    <div class="user-img">
	  <img width="100" height="120" border="0" src="<?php echo $_smarty_tpl->tpl_vars['touser']->value['avatarurl'];?>
" />
	</div>
	<div class="user-info">
	<a href="<?php echo $_smarty_tpl->tpl_vars['touser']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['touser']->value['levelimg'];?>
 <b><?php echo $_smarty_tpl->tpl_vars['touser']->value['username'];?>
</b></a><br />
	<?php if ($_smarty_tpl->tpl_vars['touser']->value['gender']=='1'){?>男<?php }else{ ?>女<?php }?> 
	  <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['marrystatus']),$_smarty_tpl);?>
 
	  <?php echo $_smarty_tpl->tpl_vars['touser']->value['age'];?>
 岁<br />
	  <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['cityid']),$_smarty_tpl);?>
<br />
	  <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['education']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['touser']->value['height'];?>
CM
	</div>
	<p>
	</p>
  </div>
  <div class="box-dialog-right fl">
	<input type="hidden" name="touid" id="touid" value="<?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
" />
	<input type="hidden" name="posttype" id="posttype" value="0" />
    <div class="dialog-tips">
	  <div class="dialog-tips-l"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/menu/edit.gif"><span id="btn_greet" style="color:#666666;cursor:pointer;">帮我找话题</span></div>
	  <div class="dialog-tips-r"><span class="cc">（信件请勿出现电话、QQ号码，否则无法发送）</span></div>
	  <div class="clear"></div>
	</div>
	<div class="box-dialog-kdmsg">
	  <textarea class="writecon" name="content" id="content" onclick="del_content();" onblur="attr_content();">请在这里写信件内容...</textarea>
	</div>

	<div class="box-dialog-button">
	  <?php if (true===$_smarty_tpl->tpl_vars['paystatus']->value){?>
	  <input type="button" value=" 付费发信 " class="button-red" name="btn_send" id="btn_send"  />
	  <?php }else{ ?>
	  <input type="button" value=" 免费发信 " class="button-green" name="btn_send" id="btn_send" />
	  <?php }?>
	</div>
	<div class="clear"></div>
	<p>
	<div class="nav-tips">
	您当前剩余金币：<font color="green"><b><?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
</b></font>个，如果不够支付，<a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=payment" target="_top">请先充值&gt;&gt;</a><br />
	<?php if (true===$_smarty_tpl->tpl_vars['paystatus']->value){?>
	您必须支付<font color="red"><b><?php echo $_smarty_tpl->tpl_vars['g']->value['fee']['sendmsgfee'];?>
</b></font>个金币才可以给TA写这封信。
	<?php }else{ ?>
	您可以免费给TA写信件，信件内容必须是健康。
	<?php }?>
	</div>
	</p>

  </div>
  <div class="clear"></div>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	//帮我找话题
	$("#btn_greet").click(function(){
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=message&a=greet&sex=<?php echo $_smarty_tpl->tpl_vars['touser']->value['gender'];?>
",
			cache: false,
			data: {r:get_rndnum(8)},
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
				XMLHttpRequest.setRequestHeader("request_type","ajax");
			},
			success: function(data) {
				var json = eval(data);
				var response = json.response;
				if (response.length > 0) {
					$("#content").val(response);
					$("#btn_greet").html("换一个话题");
				}
			},
			error: function() {}
		});
	});

	//执行发信
	$("#btn_send").click(function(){
		var fromtype = "";
		var uid = $("#touid").val();
		var content = $("#content").val();
		var payfee = <?php echo $_smarty_tpl->tpl_vars['g']->value['fee']['sendmsgfee'];?>
;
		if (payfee == "" || payfee == 0) {
			payfee = 1;
		}
		if (uid < 1) {
			$.dialog.tips("会员ID丢失，请重试！", 3);
			return false;
		}
		if (uid == <?php echo $_smarty_tpl->tpl_vars['u']->value['userid'];?>
) {
			$.dialog.tips("对不起，你不能和自己写信！", 3);
			return false;
		}	
		if (content == '' || content == '请在这里写信件内容...') {
			$.dialog.tips("请填写信件内容！", 3);
			return false;
		}
		<?php if ((true===$_smarty_tpl->tpl_vars['paystatus']->value)){?>
		if (<?php echo $_smarty_tpl->tpl_vars['u']->value['money'];?>
 < payfee) {
			$.dialog.tips("对不起，你的金币不足，不能发信！", 3);
			return false;
		}
		<?php }?>

		//执行
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=message",
			cache: false,
			data: {a: "savewrite", touid: uid, content:content, r:get_rndnum(8)},
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
				XMLHttpRequest.setRequestHeader("request_type","ajax");
			},
			success: function(data) {
				var json = eval(data);
				var response = json.response;
				var msg = json.msg;
				if (response == '1') {
					$.dialog({
						lock:false,
						drag: false,
						title: '成功提示',
						content: "信件发送成功", 
						icon: 'succeed',
						button: [
							{
								name: '确定',
								callback: function () {
									if (fromtype=='reload') {
										window.top.location.reload();
									}
									else {
										$("#content").val("");
										$.dialog.close();
									}
								}
							}
						]
					});
				}
				else {
					//发送失败
					if (msg.length>0) {
						$.dialog.tips(msg, 3);
					}
					else {
						$.dialog.tips("对不起，信件发送失败", 3);
					}
				}
			},
			error: function() {}
		});

	});

});

//内容
function del_content() {
	var content = $("#content").val();
	if (content == '请在这里写信件内容...') {
		$("#content").val("");
	}
}
function attr_content() {
	var content = $("#content").val();
	if (content == '') {
		$("#content").val("请在这里写信件内容...");
	}
}

</script><?php }} ?>