<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 10:50:59
         compiled from "C:\svn\z17z17\web\z17\tpl\templets\default\9izbdq_user_80x96.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70135355d91371e112-44743576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3249507c3b73f82a9adec9012acc968c1c3ecf00' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\templets\\default\\9izbdq_user_80x96.tpl',
      1 => 1398066164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70135355d91371e112-44743576',
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
  'unifunc' => 'content_5355d91375c173_49656773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355d91375c173_49656773')) {function content_5355d91375c173_49656773($_smarty_tpl) {?>	  <?php $_smarty_tpl->tpl_vars['mchuser'] = new Smarty_variable(vo_list("mod={matchuser} num={9}"), null, 0);?>
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