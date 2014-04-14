<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:37:22
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\templets\default\9izbdq_passport_setcond.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27694532ed5823f9915-53271421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e655361307f534a83762529e90f2e164a95b38ee' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\templets\\default\\9izbdq_passport_setcond.tpl',
      1 => 1355979709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27694532ed5823f9915-53271421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed5824f9198_62341945',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed5824f9198_62341945')) {function content_532ed5824f9198_62341945($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第五步 设置择友条件</h1>
      </div>
      <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=savecond" name="reg_form" id="reg_form" />
        <div class="form_box">
          
          <div class="form_li s">
            <label>性 别：</label>
            <input type='radio' name='gender' id='gender' value='0' checked />不限，
			<input type='radio' name='gender' id='gender' value='1' />男会员，
			<input type='radio' name='gender' id='gender' value='2' />女会员
		  </div>
          <div class="form_li s">
            <label>年 龄：</label>
            <?php echo cmd_hook(array('mod'=>'age','name'=>'startage','text'=>'不限'),$_smarty_tpl);?>
 到 <?php echo cmd_hook(array('mod'=>'age','name'=>'endage','text'=>'不限'),$_smarty_tpl);?>
 岁
          </div>
          <div class="form_li s">
            <label>身 高：</label>
            <?php echo cmd_hook(array('mod'=>'height','name'=>'startheight','text'=>'不限'),$_smarty_tpl);?>
 到 <?php echo cmd_hook(array('mod'=>'height','name'=>'endheight','text'=>'不限'),$_smarty_tpl);?>
 CM
          </div>
          <div class="form_li s">
			<div>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
				  <td width="70px" align="right">婚 史：</td>
				  <td style='margin-left:5px;'><?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','name'=>'marry','type'=>'checkbox'),$_smarty_tpl);?>
</td>
			    </tr>
			  </table>
			  <div class="c"></div>
			</div>
          </div>
          <div class="form_li s">
			<div>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
				  <td width="70px" align="right">交友类别：</td>
				  <td style='margin-left:5px;'><?php echo cmd_hook(array('mod'=>'lovesort','name'=>'lovesort','type'=>'checkbox'),$_smarty_tpl);?>
</td>
			    </tr>
			  </table>
			  <div class="c"></div>
			</div>
          </div>
          <div class="form_li s">
            <label>学 历：</label>
            <?php echo cmd_hook(array('mod'=>'var','item'=>'education','name'=>'startedu','type'=>'select','text'=>'不限'),$_smarty_tpl);?>
 到 
			<?php echo cmd_hook(array('mod'=>'var','item'=>'education','name'=>'endedu','type'=>'select','text'=>'不限'),$_smarty_tpl);?>

          </div>
          <div class="form_li s">
		    <div class="youb">
              <label>所在地区：</label>
				<div class="yout">
				<table width='98%' border='0' align='left' cellpadding='0' cellspacing='0'>
				  <tr>
				    <td><font color='#999999'>(最多设置5个地区，必须选择二级地区才会生效。)</font></td>
				  </tr>
				  <tr>
				    <td>
				<?php echo cmd_area(array('type'=>'dist1','name'=>'province_1','value'=>'','ajax'=>'1','cname'=>'city_1','cajax'=>'0','text'=>'==不限=='),$_smarty_tpl);?>
&nbsp;&nbsp;
				<span id="json_city_1">
				<?php echo cmd_area(array('type'=>'dist2','pvalue'=>'','cname'=>'city_1','cvalue'=>'','text'=>'==不限=='),$_smarty_tpl);?>

				</span>&nbsp;&nbsp;

				<br />
				<?php echo cmd_area(array('type'=>'dist1','name'=>'province_2','value'=>'','ajax'=>'1','cname'=>'city_2','cajax'=>'0','text'=>'==不限=='),$_smarty_tpl);?>
&nbsp;&nbsp;
				<span id="json_city_2">
				<?php echo cmd_area(array('type'=>'dist2','pvalue'=>'','cname'=>'city_2','cvalue'=>'','text'=>'==不限=='),$_smarty_tpl);?>

				</span>&nbsp;&nbsp;

				<br />
				<?php echo cmd_area(array('type'=>'dist1','name'=>'province_3','value'=>'','ajax'=>'1','cname'=>'city_3','cajax'=>'0','text'=>'==不限=='),$_smarty_tpl);?>
&nbsp;&nbsp;
				<span id="json_city_3">
				<?php echo cmd_area(array('type'=>'dist2','pvalue'=>'','cname'=>'city_3','cvalue'=>'','text'=>'==不限=='),$_smarty_tpl);?>

				</span>&nbsp;&nbsp;

				<br />
				<?php echo cmd_area(array('type'=>'dist1','name'=>'province_4','value'=>'','ajax'=>'1','cname'=>'city_4','cajax'=>'0','text'=>'==不限=='),$_smarty_tpl);?>
&nbsp;&nbsp;
				<span id="json_city_4">
				<?php echo cmd_area(array('type'=>'dist2','pvalue'=>'','cname'=>'city_4','cvalue'=>'','text'=>'==不限=='),$_smarty_tpl);?>

				</span>&nbsp;&nbsp;

				<br />
				<?php echo cmd_area(array('type'=>'dist1','name'=>'province_5','value'=>'','ajax'=>'1','cname'=>'city_5','cajax'=>'0','text'=>'==不限=='),$_smarty_tpl);?>
&nbsp;&nbsp;
				<span id="json_city_5">
				<?php echo cmd_area(array('type'=>'dist2','pvalue'=>'','cname'=>'city_5','cvalue'=>'','text'=>'==不限=='),$_smarty_tpl);?>

				</span>&nbsp;&nbsp;  
				    </td>
				  </tr>
				</table>
			  </div>
			  <div class="c"></div>
			</div>

          </div>
          <div class="form_li s">
            <label>诚信星级：</label>
			<?php echo cmd_hook(array('mod'=>'star','name'=>'star','text'=>'=不限='),$_smarty_tpl);?>
&nbsp;&nbsp;星&nbsp;&nbsp;
			<select name='starup' id='starup'>
			<option value=''></option>
			<option value='1'>以上</option>
			<option value='2'>以下</option>
			</select>
          </div>
          <div class="form_li s">
            <label>形象照：</label>
            <input type='radio' name='avatar' id='avatar' value='1' />有形象照，<input type='radio' name='avatar' id='avatar' value='0' checked />不限
          </div>
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' onclick="return checkreg();"> <button class="button_register">保存设置</button> </a>
              <label>&nbsp;&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php">跳过，进入会员中心</a> </label>
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
	$('#reg_form').submit();
	return true;
}
</script><?php }} ?>