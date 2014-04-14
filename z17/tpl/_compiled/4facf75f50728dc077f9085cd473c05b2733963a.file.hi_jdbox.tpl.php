<?php /* Smarty version Smarty-3.1.14, created on 2014-04-01 10:47:30
         compiled from "C:\svn\z17\tpl\user\hi_jdbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22181533a28c203b659-18435076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4facf75f50728dc077f9085cd473c05b2733963a' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\hi_jdbox.tpl',
      1 => 1378435858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22181533a28c203b659-18435076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'touid' => 0,
    'touser' => 0,
    'greet' => 0,
    'volist' => 0,
    'ucfile' => 0,
    'u' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533a28c21d6cc0_50926954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533a28c21d6cc0_50926954')) {function content_533a28c21d6cc0_50926954($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="greet_main">
  <input type="hidden" id="greetid" name="greetid" value="" />
  <input type="hidden" name="touid" id="touid" value="<?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
" />
  <div class="greet_left_user">
    <span class="u_logo">
	  <img width="100" height="120" border="0" src="<?php echo $_smarty_tpl->tpl_vars['touser']->value['avatarurl'];?>
" />
	</span>
	<br />
	<strong><a href="<?php echo $_smarty_tpl->tpl_vars['touser']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['touser']->value['username'];?>
</a></strong><br />
	<?php if ($_smarty_tpl->tpl_vars['touser']->value['gender']==1){?>男<?php }else{ ?>女<?php }?> 
	  <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['marrystatus']),$_smarty_tpl);?>
 
	  <?php echo $_smarty_tpl->tpl_vars['touser']->value['age'];?>
 岁<br />
	<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['cityid']),$_smarty_tpl);?>
<br />
	<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['touser']->value['education']),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['touser']->value['height']>0){?><?php echo $_smarty_tpl->tpl_vars['touser']->value['height'];?>
<?php }?>CM<br />
  </div>
  <div class="greet_right_phrase">
    <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['greet']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
    <div class="greet_item" onclick="select_greet('<?php echo $_smarty_tpl->tpl_vars['volist']->value['greetid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['greeting'];?>
</div>
	<?php } ?>
  </div>
  <div class="clear"></div>
  <span class="show_leter">给会员打招呼</span>
  <div class="greet_fun_list">
  <input type="button" value="打招呼" id="btn_greet" class="button-red" style="cursor:pointer;" />&nbsp;&nbsp;&nbsp;
  <input type="button" id="btn_rnd" name="btn_rnd" value="换一组" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=hi&a=hi&touid=<?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
&halttype=jdbox';" class="button-green" style="cursor:pointer;" />
  </div>

</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	//选中
    $(".greet_item").click(function() {
        $(".greet_item_hover").removeClass("greet_item_hover").addClass("greet_item");
        $(this).removeClass("greet_item").addClass("greet_item_hover");
    });
	//提交
	$("#btn_greet").click(function(){
		var uid = <?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
;
		var greetid = $('#greetid').val();

		//判断UID
		if (uid == <?php echo $_smarty_tpl->tpl_vars['u']->value['userid'];?>
) {
			$.dialog.tips("对不起，你不能和自己打招呼！", 3);
			return false;
		}
		//招呼ID
		if (greetid == '') {
			$.dialog.tips("请选择问候语！", 3);
			return false;
		}
		//执行
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=hi&a=savehi&type=ajax",
			cache: false,
			data: {touid: uid, greetid:greetid, r:get_rndnum(8)},
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
				XMLHttpRequest.setRequestHeader("request_type","ajax");
			},
			success: function(data) {
				var json = eval(data);
				var response = json.response;
				if (response == '1') {
					$.dialog({
						lock:false,
						drag: false,
						title: '成功提示',
						content: '恭喜你，问候发送成功。', 
						icon: 'succeed',
						button: [
							{
								name: '确定',
								callback: function () {
									$.dialog.close();
								}
							}
						]
					});
				}
				else {
					$.dialog.tips("对不起，问候发送失败", 3);
				}
			},
			error: function() {

			}
		});

	});

});

//选择招呼
function select_greet(id){
	$("#greetid").val(id);
}
</script>
<?php }} ?>