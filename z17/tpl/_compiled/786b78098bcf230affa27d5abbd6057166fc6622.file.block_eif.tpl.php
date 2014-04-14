<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 15:06:06
         compiled from "C:\svn\eolove\tpl\user\block_eif.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1200053312ade90f0e2-31455475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '786b78098bcf230affa27d5abbd6057166fc6622' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\user\\block_eif.tpl',
      1 => 1378360248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1200053312ade90f0e2-31455475',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlpath' => 0,
    'ucpath' => 0,
    'eif_i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53312ade962a81_60131615',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53312ade962a81_60131615')) {function content_53312ade962a81_60131615($_smarty_tpl) {?><script type="text/javascript" language="JavaScript" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/mood-eif.js" ></script>
<style>
.emface-border{
 border:1px solid #A7D2E2;
 width:436px;
 position:absolute;
 background-color:#ffffff;
 left:0px;
 top:0px;
}
.emface-bg{
 padding:5px;
 background-color:#EFF7FA;
 width:425px;
 text-align:right;
}
a.face-body, a.face-body:hover,a.face-body:visited,a.face-body:link{float:left;width:29px;height:29px;margin:0;padding:0;}

.eif-preview-pannel {
	position:absolute;left:0px;top:0px;width:85px;height:85px;border:1px solid #0000FF;
	background-color:#FFF;z-index:1002;
	display:none;
}

.eif-pannel {
	display:none;
	position:absolute;
	/*
	top:-1000px;left:-1000px;
	*/
	z-index:1000;
}
.eif-content {
	background-image:url(<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/face_gif.png);
	background-repeat:no-repeat;width:438px;height:206px;overflow:hidden
}
</style>
<div id="emface_preview_pannel" class="eif-preview-pannel"></div>
<div id="emface_pannel" class="eif-pannel">
  <div class="emface-border">
	<div class="emface-bg"><a href="###" onclick="emface_close();"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/em_close.gif" border="0"/></a></div>
	<div class="clear"></div>
	<div class="eif-content">
	  <?php $_smarty_tpl->tpl_vars['eif_i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['eif_i']->step = 1;$_smarty_tpl->tpl_vars['eif_i']->total = (int)ceil(($_smarty_tpl->tpl_vars['eif_i']->step > 0 ? 104+1 - (0) : 0-(104)+1)/abs($_smarty_tpl->tpl_vars['eif_i']->step));
if ($_smarty_tpl->tpl_vars['eif_i']->total > 0){
for ($_smarty_tpl->tpl_vars['eif_i']->value = 0, $_smarty_tpl->tpl_vars['eif_i']->iteration = 1;$_smarty_tpl->tpl_vars['eif_i']->iteration <= $_smarty_tpl->tpl_vars['eif_i']->total;$_smarty_tpl->tpl_vars['eif_i']->value += $_smarty_tpl->tpl_vars['eif_i']->step, $_smarty_tpl->tpl_vars['eif_i']->iteration++){
$_smarty_tpl->tpl_vars['eif_i']->first = $_smarty_tpl->tpl_vars['eif_i']->iteration == 1;$_smarty_tpl->tpl_vars['eif_i']->last = $_smarty_tpl->tpl_vars['eif_i']->iteration == $_smarty_tpl->tpl_vars['eif_i']->total;?>
	  <a href="###" onclick="insertFace('<?php echo $_smarty_tpl->tpl_vars['eif_i']->value;?>
');" onmouseover="show_emface_tip(this, '<?php echo $_smarty_tpl->tpl_vars['eif_i']->value;?>
')" onmouseout="close_emface_tip(this, '<?php echo $_smarty_tpl->tpl_vars['eif_i']->value;?>
')" class="face-body" ></a>
	  <?php }} ?>
	</div>
  </div>
</div><?php }} ?>