<?php /* Smarty version Smarty-3.1.14, created on 2014-04-29 15:22:34
         compiled from "C:\svn\z17z17\web\z17\tpl\templets\default\9izbdq_block_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29667535db4b84fc015-40389398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4658190390544f11172a14d3fe6f1c4d885fb459' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\templets\\default\\9izbdq_block_menu.tpl',
      1 => 1398756143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29667535db4b84fc015-40389398',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535db4b86a0754_44908431',
  'variables' => 
  array (
    'urlpath' => 0,
    'config' => 0,
    'topads' => 0,
    'login' => 0,
    'a' => 0,
    'u' => 0,
    'menuid' => 0,
    'yx_sex' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535db4b86a0754_44908431')) {function content_535db4b86a0754_44908431($_smarty_tpl) {?><div id="header">
  <div class="n_top">
    <div class="nn_top">
      <div class="n_logo"> <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['logo'];?>
" height="80px" style="padding-top:10px"  alt="<?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
" /></a> </div>
      <div class="n_top_banner"> 
        <?php $_smarty_tpl->tpl_vars['topads'] = new Smarty_variable(get_ads('top_banner'), null, 0);?> 
        <?php if (!empty($_smarty_tpl->tpl_vars['topads']->value)){?> 
        <a <?php if (!empty($_smarty_tpl->tpl_vars['topads']->value['url'])&&$_smarty_tpl->tpl_vars['topads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['topads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['topads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['topads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['topads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['topads']->value['height'];?>
'  style="padding-top:25px" border='0' title="<?php echo $_smarty_tpl->tpl_vars['topads']->value['title'];?>
" /></a> 
        <?php }?> 
      </div>
      <div class="n_top_right">
        <div class="n_tops">
        </div>
        <div class="n_topp"> 
          <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?> 
			  <?php if ($_smarty_tpl->tpl_vars['login']->value['info']['integrity']=='0'){?> 
			  <?php if ($_smarty_tpl->tpl_vars['a']->value!='perfect'){?> 
			  <script>alert('对不起，请先完善交友帐号信息，才能正常使用。');window.location.href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=perfect";</script> 
			  <?php }?> 
			  <?php }?> 
		欢迎您： 
		<?php if (!empty($_smarty_tpl->tpl_vars['login']->value['info']['levelimg'])){?>
			<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['levelimg'];?>

		<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['u']->value['levelimg'];?>

		<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['login']->value['username'];?>
， <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=logout">退出登录</a> 
          <?php }else{ ?> 
          游客欢迎您 <a href="###" onclick="artbox_loginbox();">登录网站</a>&nbsp;
		  <?php $_smarty_tpl->tpl_vars['connect'] = new Smarty_variable(vo_list("mod={connect}"), null, 0);?>
		  |&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=reg">免费注册</a> 

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
">首页</a></li>
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
">搜索</a>
		  <?php }else{ ?>
		  <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user">搜索</a>
		  <?php }?>
		  </li>
          <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='online'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=online">在线</a>
          </li>
	  <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='message'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=message">消息</a>
          </li>
	  <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='profile'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=profile">资料</a>
          </li>
	  <!--
	  <li<?php if ($_smarty_tpl->tpl_vars['menuid']->value=='vip'){?> class='current'<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip">服务</a>
          </li>
	  -->
        </ul>
      </div>
     
    </div>
  </div>
</div>
<?php }} ?>