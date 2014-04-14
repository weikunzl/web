<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 13:56:47
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\gift_jdbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31397532fc91ff17b22-98404183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24e22e5c552f0af04cfdfae71a7304ca98c39e11' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\gift_jdbox.tpl',
      1 => 1375932490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31397532fc91ff17b22-98404183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'ucpath' => 0,
    'touserinfo' => 0,
    'touser' => 0,
    'catid' => 0,
    'ucfile' => 0,
    'touid' => 0,
    'volist' => 0,
    'giftcat' => 0,
    'gift' => 0,
    'lang' => 0,
    'showpage' => 0,
    'u' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fc92016c858_33378699',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fc92016c858_33378699')) {function content_532fc92016c858_33378699($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
//选择礼物
function select_gift(id, points, giftname){
	$(".mod-gift a span").removeClass("icon-selected");
	$("#select-"+id).addClass("icon-selected");

	$("#giftid").val(id);
	$("#points").val(points);
	$("#tips-giftname").html(giftname);
	$("#tips-points").html(points);
	$("#words").val($("#msg-"+id).html());
}
</script>
<style>
.gift-ft {clear:both;margin-top:10px;}
.gift-words {width: 575px;}
.m-gift-send {
	clear:both;
	margin-top:10px;
	text-align:right;
}
.visual-none {
	color:#0981C6;
	margin-right:10px;
}
.give-topic {margin: 0px 20px;}
.menu-list{position:relative; margin-top:10px;width:100%;}
.menu-list .menu-item{
	border:1px solid #e1e1e1; margin-right:10px; float:left; 
	padding:5px 10px;background:#F5F5F5; cursor:pointer;
	height:15px; line-height:15px;
}
.menu-list .menu-current{background:#fff;}

.gift-list {margin-top:10px;margin-bottom:5px;}
.gift-list li{
	width:90px;height:120px;float:left;padding:5px 12px 5px 10px;
}
.gift-list li img{
	padding:3px;border:1px solid #dddddd;
}
.gift-list .gift-text{text-align:center;display:block;line-height:20px;margin-top:5px;}

.mod-gift .icon-selected {
	background-image:url(<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/selected_icon.png);
	position: absolute;
	cursor: pointer;
	display: block;
	height: 20px;
	line-height: 120px;
	overflow: hidden;
	width: 20px;
	margin-left: 80px;
	margin-top: -20px;
}
</style>
<div class="give-topic">
  <div class="nav-tips">
    送给用户：<?php echo $_smarty_tpl->tpl_vars['touserinfo']->value['levelimg'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['touserinfo']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['touserinfo']->value['username'];?>
</a>&nbsp;(<?php if ($_smarty_tpl->tpl_vars['touserinfo']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['touser']->value['marry_t'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['touserinfo']->value['age'];?>
岁&nbsp;&nbsp;
	<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['touserinfo']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['touserinfo']->value['cityid']),$_smarty_tpl);?>

	&nbsp;<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['touserinfo']->value['education']),$_smarty_tpl);?>
)
  </div>
  <!--TAB BEGIN-->
  <div class="menu-list">
    <ul>
	  <li class="menu-item<?php if ($_smarty_tpl->tpl_vars['catid']->value=='0'){?> menu-current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=send&touid=<?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
&catid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
&halttype=jdbox">全部礼物</a></li>
	  <?php $_smarty_tpl->tpl_vars['giftcat'] = new Smarty_variable(vo_list("mod={giftcat}"), null, 0);?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['giftcat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <li class="menu-item<?php if ($_smarty_tpl->tpl_vars['catid']->value==$_smarty_tpl->tpl_vars['volist']->value['catid']){?> menu-current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&a=send&touid=<?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
&catid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
&halttype=jdbox"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</a></li>
	  <?php } ?>
	</ul>
  </div>
  <!--TAB END-->
  
  <div class="gift-list">
    <ul>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <li class="mod-gift">
	    <a href="###" onclick="select_gift('<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['points'];?>
', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['imgurl'];?>
" width="75" height="75" />
		<span id="select-<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
"></span>
		</a>
		<span id="msg-<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['volist']->value['intro'];?>
</span>
		<div class="gift-text">
		<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
<br />
		<?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
：<?php echo $_smarty_tpl->tpl_vars['volist']->value['points'];?>

		</div>
	  </li>
	  <?php } ?>
	</ul>
	<div class="clear"></div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
  <div class="page_digg" style="margin-top:5px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
  <div class="clear"></div>
  <?php }?>

  <form action='<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift&halttype=jdbox' method='post' name='myform' id='myform' style='margin:0'>
  <input type='hidden' name='a' id='a' value='savesend' />
  <input type='hidden' name='giftid' id='giftid' value='' />
  <input type='hidden' name='touid' id='touid' value='<?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
' />
  <input type="hidden" name="points" id="points" value="0" />
  <div class="gift-ft">
	<div class="panel">
	  <label for="gift-words">赠言：</label>
	  <input type="text" class="gift-words"id="words" name="words" disabled="disabled" value="" />
	</div>
	<div class="m-gift-send">
	  <div class="form_send_box">
	    <i id="calendarGift" class="img i-calendar">
		选择的礼物：<span class="visual-none" id="tips-giftname"></span>
		积分：<span class="visual-none" id="tips-points"></span> 
		</i> 
		<input type="button" name="btn_send" id="btn_send" value="确定赠送" class="button-red" />
	  </div>
	</div>
  </div>
  </form>

</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	//提交赠送
	$("#btn_send").click(function(){
		var touid = <?php echo $_smarty_tpl->tpl_vars['touid']->value;?>
;
		if (touid == <?php echo $_smarty_tpl->tpl_vars['u']->value['userid'];?>
) {
			$.dialog.tips("对不起，不能给自己赠送礼物。", 3);
			return false;
		}

		if ($("#giftid").val() == '') {
			$.dialog.tips("请选择要赠送的礼物。", 3);
			return false;
		}

		//积分是否足够
		var points = $("#points").val();
		if (<?php echo $_smarty_tpl->tpl_vars['u']->value['points'];?>
 < points) {
			$.dialog.tips("对不起，你所选礼物积分不足。", 3);
			return false;
		}

		$('#myform').submit();
		return true;
	});

});
</script><?php }} ?>