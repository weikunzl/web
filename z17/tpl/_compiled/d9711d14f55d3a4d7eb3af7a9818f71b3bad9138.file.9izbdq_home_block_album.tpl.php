<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 14:34:55
         compiled from "C:\svn\z17\tpl\templets\default\9izbdq_home_block_album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2715333c68f688da9-80709427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9711d14f55d3a4d7eb3af7a9818f71b3bad9138' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\templets\\default\\9izbdq_home_block_album.tpl',
      1 => 1378708562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2715333c68f688da9-80709427',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login' => 0,
    'home' => 0,
    'album' => 0,
    'urlpath' => 0,
    'config' => 0,
    'volist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5333c68f6e2822_11078555',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333c68f6e2822_11078555')) {function content_5333c68f6e2822_11078555($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='1'){?>
		<?php $_smarty_tpl->tpl_vars['album'] = new Smarty_variable(vo_list("mod={album} where={v.userid='".((string)$_smarty_tpl->tpl_vars['home']->value['userid'])."'} num={1000}"), null, 0);?>
		<?php if (!empty($_smarty_tpl->tpl_vars['album']->value)){?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">[<?php echo $_smarty_tpl->tpl_vars['home']->value['username'];?>
] 的相册 ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
		</script>
		<div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">相册（<?php echo count($_smarty_tpl->tpl_vars['album']->value);?>
张）</h1>
          </div>
		  <div class="pcontent">
		    <?php if ($_smarty_tpl->tpl_vars['config']->value['avatarpermflag']=='1'&&$_smarty_tpl->tpl_vars['login']->value['info']['avatarflag']!='1'){?>
			<table border="0" cellspacing="10" cellpadding="10" width="98%">
			  <tr>
			    <td align="center">对不起，您还没上传形象照或未通过审核，无法查看其他会员相册<br /><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=avatar">马上设置形象照</a></td>
			  </tr>
			</table>
			<?php }else{ ?>

			  <div class="home-album">
			    <ul>
				  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
				  <li> <a rel="example_group" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['uploadfiles'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['thumbfiles'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
" /></a></li>
				  <?php } ?>
				</ul>
				<div style="clear:both;"></div>
			  </div>


			<?php }?>
		  </div>
		</div>
		<?php }?>

<?php }?><?php }} ?>