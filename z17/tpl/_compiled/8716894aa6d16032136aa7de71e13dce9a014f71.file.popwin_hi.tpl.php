<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 09:36:49
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\popwin_hi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6665532f8c3111c861-29724783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8716894aa6d16032136aa7de71e13dce9a014f71' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\popwin_hi.tpl',
      1 => 1377510603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6665532f8c3111c861-29724783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hi' => 0,
    'volist' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532f8c311c7893_84332490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532f8c311c7893_84332490')) {function content_532f8c311c7893_84332490($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><style>
.popwin-msg-content {
	padding:5px;
	margin-right:10px;
}
.popwin-msg-content p {
	padding-bottom:10px;
	text-align:left;
	line-height:25px;
}
.popwin-msg-content .popwin-buttons {
	height:30px;clear:both;
}
.popwin-button1 {
	background: none repeat scroll 0 0 #D83473;
    color: #FFFFFF;
	width:90px;
	border: 0 none;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
    height: 30px;
    text-align: center;
    vertical-align: top;
	display:inline;
	float:left;
	line-height:30px;
}
.popwin_a1{color:#ffffff;}
.popwin-button1 a:hover{color:#ffffff;}
.popwin-button2 {
	background: none repeat scroll 0 0 #EADFDF;
    color: #8E5A5C;
	width:90px;
	border: 0 none;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
    height: 30px;
    text-align: center;
    vertical-align: top;
	display:inline;
	float:right;
	line-height:30px;
}
.popwin-button2 a {color:#8E5A5C;}
.popwin-button2 a:hover{color:#8E5A5C;}
</style>
<?php if (empty($_smarty_tpl->tpl_vars['hi']->value)){?>
<div class="popwin-nothing">对不起，暂无收到新问候。</div>
<?php }else{ ?>
<div class="popwin-msg-content">
  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
  <p>
  时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtime'],"%Y/%m/%d %H:%M");?>
<br />
  “<b><font color="#B0778C"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</font></b>”向你打招呼了，<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=hi&a=read&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['hiid'];?>
" style="color:#428DB8;">查看</a><br />
  TA可能是你一直期待的人<br />成为联系TA的第一个人吧。
  </p>
  <div class="popwin-buttons">
   <a href="###" class="popwin-button1" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fromuserid'];?>
');" style="color:#ffffff;">给TA写信</a>
   <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank" class="popwin-button2" style="color:#8E5A5C;">看TA资料</a>
   <div class="clear"></div>
  </div>
  <?php } ?>
</div>
<?php }?><?php }} ?>