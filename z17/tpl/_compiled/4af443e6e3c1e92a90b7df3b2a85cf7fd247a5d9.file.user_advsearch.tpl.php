<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:19:44
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\user_advsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19942532fb260e89938-45655332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4af443e6e3c1e92a90b7df3b2a85cf7fd247a5d9' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\user_advsearch.tpl',
      1 => 1353640843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19942532fb260e89938-45655332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'wapfile' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb261026d02_24654617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb261026d02_24654617')) {function content_532fb261026d02_24654617($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<p class="slide_bg_l pl_5">搜索设置</p>
<div class="index_p">
  <h4 class="slide_bg_d">【搜索设置】</h4>
  <form name="searchForm" action="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=user&a=list" method="post">
    <div>
	  我&nbsp;&nbsp;要&nbsp;找：
	  <select name="s_sex" id='s_sex'>
		<?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
        <option value="1"<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['gender']==2){?> selected<?php }?>>男会员</option>
        <option value="2"<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['gender']==1){?> selected<?php }?>>女会员</option>
		<?php }else{ ?>
        <option value="1">男会员</option>
        <option value="2" selected="selected">女会员</option>
		<?php }?>
      </select>
      <br />
      所在地区：
	  <?php echo cmd_area(array('type'=>'dist1','name'=>'s_dist1','text'=>'=不限='),$_smarty_tpl);?>

      <br />
      年　　龄：
      <?php echo cmd_hook(array('mod'=>'age','name'=>'s_sage','value'=>'20','text'=>'=不限='),$_smarty_tpl);?>
&nbsp;~&nbsp;<?php echo cmd_hook(array('mod'=>'age','name'=>'s_eage','value'=>'30','text'=>'=不限='),$_smarty_tpl);?>
 岁
	  <br />
      身　　高：
      <?php echo cmd_hook(array('mod'=>'height','name'=>'s_sheight','value'=>'155','text'=>'=不限='),$_smarty_tpl);?>
<span>&nbsp;~&nbsp;</span><?php echo cmd_hook(array('mod'=>'height','name'=>'s_eheight','value'=>'175','text'=>'=不限='),$_smarty_tpl);?>
 CM
	  <br />
      月&nbsp;&nbsp;收&nbsp;入：
	  <?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'select','name'=>'s_ssalary','text'=>'=不限='),$_smarty_tpl);?>
<span>&nbsp;~&nbsp;</span><?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'select','name'=>'s_esalary','text'=>'=不限='),$_smarty_tpl);?>

	  <br />
      学　　历：
      <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'select','name'=>'s_sedu','text'=>'=不限='),$_smarty_tpl);?>
<span>&nbsp;~&nbsp;</span><?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'select','name'=>'s_eedu','text'=>'=不限='),$_smarty_tpl);?>

      <br />
      婚　　史：
      <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','name'=>'s_marry','type'=>'select','text'=>'=不限='),$_smarty_tpl);?>

      <br />
      有无子女：
      <?php echo cmd_hook(array('mod'=>'var','item'=>'childrenstatus','type'=>'select','name'=>'s_havechild','text'=>'=不限='),$_smarty_tpl);?>

      <br />
      住房情况：
      <?php echo cmd_hook(array('mod'=>'var','item'=>'housing','type'=>'select','name'=>'s_house','text'=>'=不限='),$_smarty_tpl);?>

      <br />
      购车情况：
      <?php echo cmd_hook(array('mod'=>'var','item'=>'caring','type'=>'select','name'=>'s_car','text'=>'=不限='),$_smarty_tpl);?>

	  <br />
	  形&nbsp;&nbsp;像&nbsp;照：
	  <select name='s_avatar' id='s_avatar'><option value=''>不限</option><option value='1' selected>有</option></select>
    </div>
    <p class="slide_bg_l">
	<input type="submit" value="立即搜索" class="submit_b"/>
    </p>
  </form>
</div>
<p class="slide_bg_l pl_5">
当前位置:<br />
<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">首页</a> &gt;&gt; 高级搜索</p>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
</html><?php }} ?>