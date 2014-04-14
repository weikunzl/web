<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:36:12
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\templets\default\9izbdq_passport_setcontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5989532ed53c4f9cb6-30822014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa0d95313238ade6a000040224edd1ecf1650c8d' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\templets\\default\\9izbdq_passport_setcontact.tpl',
      1 => 1355979740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5989532ed53c4f9cb6-30822014',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'urlpath' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed53c62f949_49268273',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed53c62f949_49268273')) {function content_532ed53c62f949_49268273($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第三步 设置联系方式</h1>
      </div>
      <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport" name="reg_form" id="reg_form" />
	    <input type='hidden' name='a' id='a' value='savecontact' />
        <div class="form_box">
          
          <div class="form_li s">
            <label><font color='red'>*</font> 手机号：</label>
			<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['mobilerz']=='1'){?>
            <input type='text' name='mobile' id='mobile' class='w1' maxlength='11' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['mobile'];?>
" readonly="only" /> (已验证，不能更改)
			<?php }else{ ?>
			<input type='text' name='mobile' id='mobile' class='w1' maxlength='11' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['mobile'];?>
" /> (手机号码或者QQ必须填写一项)
			<?php }?>
		  </div>
          <div class="form_li s">
            <label><font color='red'>*</font> QQ号码：</label>
            <input type='text' name='qq' id='qq' class='w2' maxlength='11' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['qq'];?>
" /> (手机号码或者QQ必须填写一项)
          </div>
          <div class="form_li s">
            <label>电话号码：</label>
            <input type='text' name='telephone' id='telephone' class='w1' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['telephone'];?>
" />
          </div>
          <div class="form_li s">
            <label>MSN：</label>
            <input type='text' name='msn' id='msn' class='w1' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['msn'];?>
" />
          </div>
          <div class="form_li s">
            <label>博客/微博：</label>
            <input type='text' name='homepage' id='homepage' class='w1' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['homepage'];?>
" />
          </div>
          <div class="form_li s">
            <label>联系地址：</label>
            <input type='text' name='address' id='address' class='w1' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['address'];?>
" />
          </div>
          <div class="form_li s">
            <label>邮政编码：</label>
            <input type='text' name='zipcode' id='zipcode' class='w2' value="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['zipcode'];?>
" />
          </div>
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' onclick="return checkreg();"> <button class="button_register">下一步</button> </a>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="right"> 
	  <a class="login" href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=login">已有帐号？ 点此登录&gt;&gt;</a>
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."passport_tips.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script language="javascript">
function checkreg(){
	var mobile = $('#mobile').val();
	var qq = $('#qq').val();

	if (mobile == '' && qq == '') {
		alert('手机号码或者QQ至少填写一项');
		return false;
	}
	else {
		if (mobile != '') {
			if (!isMobile(mobile)) {
				alert('手机号码不正确！');
				return false;
			}
		}
		if (qq != '') {
			if (!isQQ(qq)) {
				alert('QQ号码格式不正确，请填写5-11位数字');
				return false;
			}
		}
	}
	$('#reg_form').submit();
	return true;
}
</script><?php }} ?>