<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:18:55
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\home_space.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2379532fb22f819003-18073975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2ea5e17dcc11c2a1cb5df32ce3fb17a1c27e113' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\home_space.tpl',
      1 => 1353659772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2379532fb22f819003-18073975',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waptpl' => 0,
    'home' => 0,
    'wapfile' => 0,
    'previousid' => 0,
    'cond' => 0,
    'volist' => 0,
    'i' => 0,
    'uid' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb22fac98e0_33499016',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb22fac98e0_33499016')) {function content_532fb22fac98e0_33499016($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="index_p">
  <h3 class="slide_bg_d pl_5"> <?php echo $_smarty_tpl->tpl_vars['home']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['home']->value['levelimg'];?>
 </h3>
  <?php echo cmd_avatar(array('width'=>'72','height'=>'90','value'=>$_smarty_tpl->tpl_vars['home']->value['avatarurl']),$_smarty_tpl);?>
 
  <br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&a=album&uid=<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
">浏览<?php if ($_smarty_tpl->tpl_vars['home']->value['gender']==1){?>他<?php }else{ ?>她<?php }?>更多照片(<?php echo cmd_count(array('mod'=>'user','type'=>'album','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
张)</a> 
  <br />
  
  <?php echo $_smarty_tpl->tpl_vars['home']->value['age'];?>
岁，<?php if ($_smarty_tpl->tpl_vars['home']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>，<?php echo $_smarty_tpl->tpl_vars['home']->value['height'];?>
CM，<?php echo $_smarty_tpl->tpl_vars['home']->value['astro'];?>
，
  <?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['marrystatus']),$_smarty_tpl);?>

  <br />
  地区：<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['cityid']),$_smarty_tpl);?>
<br />
  籍贯：<?php if ($_smarty_tpl->tpl_vars['home']->value['nationprovinceid']==0){?><font color="gray">未透露</font><?php }else{ ?><?php echo cmd_hometown(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['nationprovinceid']),$_smarty_tpl);?>
 <?php echo cmd_hometown(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['nationcityid']),$_smarty_tpl);?>
<?php }?><br />
  月薪：<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['salary']),$_smarty_tpl);?>
<br />
  学历：<?php if ($_smarty_tpl->tpl_vars['home']->value['education']==0){?><font class='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['education']),$_smarty_tpl);?>
<?php }?><br />
  <p> 
  {<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_do&a=hi&touid=<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
">打招呼</a>&nbsp;|&nbsp;
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_do&a=writemsg&touid=<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
">写信件</a>&nbsp;|&nbsp;
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_do&a=listen&touid=<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
">关注<?php if ($_smarty_tpl->tpl_vars['home']->value['gender']==1){?>他<?php }else{ ?>她<?php }?></a>}
  <br />
  </p>
  <?php if ($_smarty_tpl->tpl_vars['previousid']->value>0){?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['previousid']->value;?>
">下一个您感兴趣的人</a>
  <?php }?>

  <h3 class="slide_bg_d">【内心读白】</h3>
  <?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['home']->value['monolog']);?>
<br />

  
  <h3 class="slide_bg_d">【择友要求】</h3>
  性&#12288;&#12288;别： <?php if ($_smarty_tpl->tpl_vars['cond']->value['gender']==1){?>男<?php }elseif($_smarty_tpl->tpl_vars['cond']->value['gender']==2){?>女<?php }else{ ?><font color='gray'>不限</font><?php }?><br />
  照片要求：<?php if ($_smarty_tpl->tpl_vars['cond']->value['avatar']==1){?>有照片<?php }else{ ?><font color='gray'>不限</font><?php }?><br />
  年龄范围：<?php if ($_smarty_tpl->tpl_vars['cond']->value['startage']==0){?><font color='gray'>不限</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['cond']->value['startage'];?>
~<?php echo $_smarty_tpl->tpl_vars['cond']->value['endage'];?>
岁<?php }?><br />
  身高范围：<?php if ($_smarty_tpl->tpl_vars['cond']->value['startheight']==0){?><font color='gray'>不限</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['cond']->value['startheight'];?>
~<?php echo $_smarty_tpl->tpl_vars['cond']->value['endheight'];?>
CM<?php }?><br />
  交友类型：<?php if (empty($_smarty_tpl->tpl_vars['cond']->value['lovesort'])){?><font color='gray'>不限</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['cond']->value['lovesort']),$_smarty_tpl);?>
<?php }?><br />
  婚史状况：<?php if (empty($_smarty_tpl->tpl_vars['cond']->value['marry'])){?><font color='gray'>不限</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'multi','item'=>'marrystatus','value'=>$_smarty_tpl->tpl_vars['cond']->value['marry']),$_smarty_tpl);?>
<?php }?><br />
  学历要求：<?php if ($_smarty_tpl->tpl_vars['cond']->value['startedu']==0){?><font color='gray'>不限</font><?php }else{ ?><?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['startedu']),$_smarty_tpl);?>
~<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['endedu']),$_smarty_tpl);?>
<?php }?> <br />
  所在地区：
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(false, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cond']->value['bulidarea']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['volist']->value['city']>0){?>
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(true, null, 0);?>
	<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['province']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['city']),$_smarty_tpl);?>
<br />
	<?php }?>
	<?php } ?>
	<?php if (false===$_smarty_tpl->tpl_vars['i']->value){?>
	<font color='gray'>不限</font>
	<?php }?>
  <br />

  <h3 class="slide_bg_d">【性格相貌】</h3>
  个性描述：<?php if ($_smarty_tpl->tpl_vars['home']->value['personality']==0){?><font color="gray">未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'personality','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['personality']),$_smarty_tpl);?>
<?php }?><br />
  相貌自评：<?php if ($_smarty_tpl->tpl_vars['home']->value['profile']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'profile','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['profile']),$_smarty_tpl);?>
<?php }?><br />
  体&#12288;&#12288;重：<?php if ($_smarty_tpl->tpl_vars['home']->value['weight']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['home']->value['weight'];?>
 (KG)<?php }?> <br />
  体&#12288;&#12288;型：<?php if ($_smarty_tpl->tpl_vars['home']->value['bodystyle']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'bodystyle','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['bodystyle']),$_smarty_tpl);?>
<?php }?><br />
  魅力部位：<?php if ($_smarty_tpl->tpl_vars['home']->value['charmparts']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'charmparts','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['charmparts']),$_smarty_tpl);?>
<?php }?><br />
  发&#12288;&#12288;型：<?php if ($_smarty_tpl->tpl_vars['home']->value['hairstyle']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'hairstyle','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['hairstyle']),$_smarty_tpl);?>
<?php }?><br />
  发&#12288;&#12288;色：<?php if ($_smarty_tpl->tpl_vars['home']->value['haircolor']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'haircolor','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['haircolor']),$_smarty_tpl);?>
<?php }?><br />
  脸&#12288;&#12288;型：<?php if ($_smarty_tpl->tpl_vars['home']->value['facestyle']==0){?><font color='gray'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'facestyle','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['facestyle']),$_smarty_tpl);?>
<?php }?><br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=home&type=profile&uid=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
">更多<?php if ($_smarty_tpl->tpl_vars['home']->value['gender']==1){?>他<?php }else{ ?>她<?php }?>的资料</a> <br />
  上次登录：
    [
	<?php if ($_smarty_tpl->tpl_vars['login']->value['status']==0){?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=passport&a=login">登录可见</a>
	<?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['login']->value['userid']==$_smarty_tpl->tpl_vars['home']->value['userid']){?>
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home']->value['logintime'],"%Y-%m-%d");?>

		<?php }else{ ?>
			<?php if ($_smarty_tpl->tpl_vars['login']->value['group']['view']['viewlogintime']==1){?>
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home']->value['logintime'],"%Y-%m-%d");?>

			<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
?c=cp_vip">VIP会员可见</a>
			<?php }?>
		<?php }?>
	<?php }?>
    ]
  <br />

</div>
<p class="slide_bg_l pl_5"> 
  当前位置：<br />
  <a href="<?php echo $_smarty_tpl->tpl_vars['wapfile']->value;?>
">首 页</a> &gt;&gt; 
  查看[<?php echo $_smarty_tpl->tpl_vars['home']->value['username'];?>
]主页
</p>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['waptpl']->value)."block_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>