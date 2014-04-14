<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 14:34:55
         compiled from "C:\svn\z17\tpl\templets\default\9izbdq_user_80x96.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137245333c68f72bd56-63448464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61bb62265cf14f3093fb14aab81c8c8bac72814a' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\templets\\default\\9izbdq_user_80x96.tpl',
      1 => 1355535878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137245333c68f72bd56-63448464',
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
  'unifunc' => 'content_5333c68f7648a9_80109752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333c68f7648a9_80109752')) {function content_5333c68f7648a9_80109752($_smarty_tpl) {?>	  <?php $_smarty_tpl->tpl_vars['mchuser'] = new Smarty_variable(vo_list("mod={matchuser} num={9}"), null, 0);?>
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