<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 15:06:26
         compiled from "C:\svn\eolove\tpl\templets\default\9izbdq_user_80x96.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2995653312af2cef0f9-87190284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcb49cc2baefadf7d8dbabe1033e2accb295b6ff' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\templets\\default\\9izbdq_user_80x96.tpl',
      1 => 1355535878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2995653312af2cef0f9-87190284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mchuser' => 0,
    'volist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53312af2d4eff5_82763247',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53312af2d4eff5_82763247')) {function content_53312af2d4eff5_82763247($_smarty_tpl) {?>	  <?php $_smarty_tpl->tpl_vars['mchuser'] = new Smarty_variable(vo_list("mod={matchuser} num={9}"), null, 0);?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mchuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
      <div class="img_list"> <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo cmd_avatar(array('width'=>'80','height'=>'96','css'=>'h3h','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a><br />
        <?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br>
        <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁  <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 </div>
	  <?php } ?><?php }} ?>