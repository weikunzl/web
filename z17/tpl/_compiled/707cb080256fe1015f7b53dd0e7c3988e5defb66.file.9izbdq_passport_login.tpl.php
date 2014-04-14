<?php /* Smarty version Smarty-3.1.14, created on 2014-04-03 15:42:34
         compiled from "C:\svn\z17\tpl\templets\default\9izbdq_passport_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8340533d10ea0c4d20-52605031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '707cb080256fe1015f7b53dd0e7c3988e5defb66' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\templets\\default\\9izbdq_passport_login.tpl',
      1 => 1355979688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8340533d10ea0c4d20-52605031',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'urlpath' => 0,
    'forward' => 0,
    'config' => 0,
    'connect' => 0,
    'volist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_533d10ea2b8851_68937728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d10ea2b8851_68937728')) {function content_533d10ea2b8851_68937728($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="loginbox">
        <div class="log_box">
          <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=loginpost&forward=<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
" name="login_form" id="login_form" />
            <div class="form_li  desc">登录网站</div>
            <div class="formtip">
              <p id="login_error_msg" class="color5"></p>
            </div>
            <div class="form_li pas">
              <label class="lo_la">账&#12288;号：</label>
              <input type="text" name='loginname' id='loginname' value='用户名/邮箱' class="w1" onclick="changeDefaultInputValue();" onblur="changeDefaultInputValue();" />
            </div>
            <div class="form_li pas">
              <label class="lo_la">密&#12288;码：</label>
              <input type="password" name="password" id="password" class="w1" />
            </div>
			<?php if ($_smarty_tpl->tpl_vars['config']->value['logincode']=='1'){?>
            <div class="form_li pas">
              <label class="lo_la">验证码：</label>
              <input type="text" id="checkcode" name="checkcode" autocomplete="off" class="w2" /> <img id="checkCodeImg" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refreshCode();"> 换一张</a>
            </div>
			<?php }?>
            <div class="form_li"><a class="btn_a1" href="###">
			  <button class="login_register" onclick="return checklogin();">登  录</button>
              </a><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=forget">忘记密码</a></div>
          </form>
        </div>
        <div class="cooperation">
          <p class="login_list clearfix color3"> <span class="li_d">·</span>没有账号？ <a class="no_ico" href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=reg">立即注册</a><br>
		    
            <span class="li_d" style='display:none;'>·用合作网站账号登录</span>
			
			<?php $_smarty_tpl->tpl_vars['connect'] = new Smarty_variable(vo_list("mod={connect}"), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['connect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['apiurl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
" /><?php echo $_smarty_tpl->tpl_vars['volist']->value['authname'];?>
</a>
			<?php } ?>
		  
		  </p>
        </div>
      </div>
    </div>
    <div class="right"> 
	  <a class="login" href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=reg">没有账号？点击注册&gt;&gt;</a>
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
function checklogin(){
    //帐号
    if($("#loginname").val() == "" || $("#loginname").val() == '用户名/邮箱'){
		alert('登录帐号不能为空');
		return false;
	} 

	//密码
	if($("#password").val() == "") {
		alert('登录密码不能为空');
		return false;
	} 

	<?php if ($_smarty_tpl->tpl_vars['config']->value['regcode']=='1'){?>
	if($("#checkcode").val() == "") {
		alert('验证码不能为空');
		return false;
	}
	<?php }?>

	$('#login_form').submit();
	return true;
}
//验证码
function refreshCode() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
	}
}

function changeDefaultInputValue() {
	var a = $("#loginname").val();
	if(a == "") {
		$("#loginname").val("用户名/邮箱");
	} else {
		if(a == '用户名/邮箱') {
			$("#loginname").val("");
		}
	}
	$('#loginname').attr("placeholder","用户名/邮箱");
}
</script><?php }} ?>