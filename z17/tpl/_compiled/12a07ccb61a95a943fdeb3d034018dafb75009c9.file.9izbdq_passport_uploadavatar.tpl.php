<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:36:24
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\templets\default\9izbdq_passport_uploadavatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20364532ed548a03de6-44069136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12a07ccb61a95a943fdeb3d034018dafb75009c9' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\templets\\default\\9izbdq_passport_uploadavatar.tpl',
      1 => 1355979762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20364532ed548a03de6-44069136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'appfile' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed548aa1133_64755905',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed548aa1133_64755905')) {function content_532ed548aa1133_64755905($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第四步 设置形象照</h1>
      </div>
      <form action="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=saveupload&uploadpart=uploadpart" method="post" enctype="multipart/form-data" name="up_form" id="up_form">
        <div class="form_box">
          
          <div class="form_li s">
            <label>形象照：</label>
            <input name="uploadpart" id="uploadpart" type="file" class='w1' />&nbsp;&nbsp;&nbsp;
			
		  </div>
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' style="cursor:pointer;" onclick="return checkupload();"> <button class="button_register">开始上传</button> </a>
              <label>&nbsp;&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=setcond">跳过这步，以后再设置</a> </label>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="right"> 
	  <a class="login" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=login">已有帐号？ 点此登录&gt;&gt;</a>
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."passport_tips.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type="text/javascript">
function checkupload() {
	var t = "";
	var v = "";

	t = "uploadpart";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择要上传的图片");
		return false;
	}
	
	$('#up_form').submit();
	return true;
}
</script><?php }} ?>