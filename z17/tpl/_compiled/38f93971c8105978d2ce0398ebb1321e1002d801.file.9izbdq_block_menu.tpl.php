<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 11:02:01
         compiled from "C:\svn\eolove\tpl\templets\default\9izbdq_block_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187755330f1a94a8023-29605921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38f93971c8105978d2ce0398ebb1321e1002d801' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\templets\\default\\9izbdq_block_menu.tpl',
      1 => 1390785916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187755330f1a94a8023-29605921',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlpath' => 0,
    'config' => 0,
    'topads' => 0,
    'login' => 0,
    'a' => 0,
    'appfile' => 0,
    'connect' => 0,
    'volist' => 0,
    'menuid' => 0,
    'yx_sex' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5330f1a95dbd88_72417513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5330f1a95dbd88_72417513')) {function content_5330f1a95dbd88_72417513($_smarty_tpl) {?><div id="header">
  <div class="n_top">
    <div class="nn_top">
      <div class="n_logo"> <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['logo'];?>
"  alt="<?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
" /></a> </div>
      <div class="n_top_banner"> 
        <?php $_smarty_tpl->tpl_vars['topads'] = new Smarty_variable(get_ads('top_banner'), null, 0);?> 
        <?php if (!empty($_smarty_tpl->tpl_vars['topads']->value)){?> 
        <a <?php if (!empty($_smarty_tpl->tpl_vars['topads']->value['url'])&&$_smarty_tpl->tpl_vars['topads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['topads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['topads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['topads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['topads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['topads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['topads']->value['title'];?>
" /></a> 
        <?php }?> 
      </div>
      <div class="n_top_right">
        <div class="n_tops"> <span class="n_tops_1"> <a href="javascript:void(0);" class="waptips" title="在手机浏览器输入“<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
”即可访问。">手机交友</a> </span> <span class="n_tops_2"><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip">会员服务</a></span> <span class="n_tops_3"><a href="###" onclick="addfavorite('<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
');">收藏本站</a></span>
          <div class="cc"></div>
        </div>
        <div class="n_topp"> 
          <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?> 
			  <?php if ($_smarty_tpl->tpl_vars['login']->value['info']['integrity']=='0'){?> 
			  <?php if ($_smarty_tpl->tpl_vars['a']->value!='perfect'){?> 
			  <script>alert('对不起，请先完善交友帐号信息，才能正常使用。');window.location.href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=perfect";</script> 
			  <?php }?> 
			  <?php }?> 
          欢迎您： <?php echo $_smarty_tpl->tpl_vars['login']->value['info']['levelimg'];?>
<?php echo $_smarty_tpl->tpl_vars['login']->value['username'];?>
， <a href="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['homeurl'];?>
">个人主页</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=logout">退出登录</a> 
          <?php }else{ ?> 
          游客欢迎您 <a href="###" onclick="artbox_loginbox();">登录网站</a>&nbsp;
		  <?php $_smarty_tpl->tpl_vars['connect'] = new Smarty_variable(vo_list("mod={connect}"), null, 0);?>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['connect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['apiurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['authname'];?>
" target="_top"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['logo'];?>
" style="vertical-align:middle;" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['authname'];?>
" /></a>&nbsp;
		  <?php } ?>
		  |&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=reg">免费注册</a> 

          <?php }?> 
        </div>
      </div>
    </div>
  </div>
  <div class="n_nav">
    <div class="n_ul">
      <div class="n_navleft">
        <ul>
          <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='index'){?> class='current first'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
">交友首页</a></li>
		  <li <?php if ($_smarty_tpl->tpl_vars['menuid']->value=='user'){?> class='current'<?php }?>>
		  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='1'){?>
		    <?php if ($_smarty_tpl->tpl_vars['login']->value['info']['gender']=='1'){?>
			<?php $_smarty_tpl->tpl_vars['yx_sex'] = new Smarty_variable('2', null, 0);?>
			<?php }elseif($_smarty_tpl->tpl_vars['login']->value['info']['gender']=='2'){?>
			<?php $_smarty_tpl->tpl_vars['yx_sex'] = new Smarty_variable('1', null, 0);?>
			<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['yx_sex'] = new Smarty_variable('0', null, 0);?>
			<?php }?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user&s_sex=<?php echo $_smarty_tpl->tpl_vars['yx_sex']->value;?>
&s_dist1=<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['provinceid'];?>
&s_dist2=<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['cityid'];?>
">同城异性</a>
		  <?php }else{ ?>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user">同城异性</a>
		  <?php }?>
		  </li>
          <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='online'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=online">在线会员</a>
          </li>
          <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='diary'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=diary">心情日记</a>
          </li>
          <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='advsearch'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user&a=advsearch">高级搜索</a>
          </li>
        </ul>
      </div>
      <div class="n_navright">
        <ul>
		  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='1'){?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip">升级VIP</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=payment">在线充值</a>&nbsp;&nbsp;|&nbsp;</li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php">会员中心</a>&nbsp;&nbsp;|&nbsp;</li>
		  <?php }else{ ?>
          <li><a href="###" onclick="artbox_loginbox();">升级VIP</a></li>
          <li><a href="###" onclick="artbox_loginbox();">在线充值</a>&nbsp;&nbsp;|&nbsp;</li>
          <li><a href="###" onclick="artbox_loginbox();">会员中心</a>&nbsp;&nbsp;|&nbsp;</li>
		  <?php }?>
        </ul>
		<div class="cc"></div>
      </div>
	  
    </div>
  </div>
</div>
<?php }} ?>