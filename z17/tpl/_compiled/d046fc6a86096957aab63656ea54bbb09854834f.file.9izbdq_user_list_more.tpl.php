<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 16:14:51
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\templets\default\9izbdq_user_list_more.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7991532e97fb81d4b7-04257048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd046fc6a86096957aab63656ea54bbb09854834f' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\templets\\default\\9izbdq_user_list_more.tpl',
      1 => 1378696948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7991532e97fb81d4b7-04257048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'total' => 0,
    'appfile' => 0,
    'page' => 0,
    'urlitem' => 0,
    'user' => 0,
    'volist' => 0,
    'skinpath' => 0,
    'showpage' => 0,
    'hotdiary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e97fb9c4933_34742093',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e97fb9c4933_34742093')) {function content_532e97fb9c4933_34742093($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('user', null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce member"> 
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="search_sort">
      <div class="search_tips"> 共<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>人符合您的搜索条件 </div>
      <div id="rank" class="search_sort_sle"> <strong>显示方式：</strong> 

		<a class="btnc btn_c3" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user&a=list<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['urlitem']->value)){?>&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
<?php }?>"> <span><b>头像模式</b></span> </a>&nbsp;
		<a class="btnc3 btn_c3" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user&a=list<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php }?>&type=more<?php if (!empty($_smarty_tpl->tpl_vars['urlitem']->value)){?>&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
<?php }?>"> <span class='h'><b>独白模式</b></span> </a> 

	  </div>
    </div>
    <div class="left men">
      <div class="content">
	    
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <ul>
          <li>
            <div class="img"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo cmd_avatar(array('width'=>'112','height'=>'135','css'=>'img100','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a></div>
            <div class="r">
              <h2><div class="biaoshi"><?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
</div><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" class='title'> <?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a> <span>诚信认证：
			  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/cid<?php if ($_smarty_tpl->tpl_vars['volist']->value['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['volist']->value['idnumberrz']==0){?>身份证未认证<?php }else{ ?>已身份证认证<?php }?>" /> 
			  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/video<?php if ($_smarty_tpl->tpl_vars['volist']->value['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['volist']->value['videorz']==0){?>视频未认证<?php }else{ ?>已视频认证<?php }?>" />
			  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/email<?php if ($_smarty_tpl->tpl_vars['volist']->value['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['volist']->value['emailrz']==0){?>邮箱未认证<?php }else{ ?>已邮箱认证<?php }?>" />
			  </span>
			  </h2>
              <div class="con">
                <div class="conten"><?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>，<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁，<?php echo $_smarty_tpl->tpl_vars['volist']->value['height'];?>
CM，<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
<br>
                  <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['monolog'],110);?>
.. </div>
              </div>
            </div>
            <div style="clear:both;"></div>
            <div class="bottom">
              <div class="l1"><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank">共有<?php echo cmd_count(array('mod'=>'user','type'=>'album','value'=>$_smarty_tpl->tpl_vars['volist']->value['userid']),$_smarty_tpl);?>
张相片</a></div>
              <div class="l2"> 
			    <a href="###" onclick="artbox_hi(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">打招呼</a> 
			    <a href="###" onclick="artbox_writemsg(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">发信件</a> 
			    <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank">查看资料</a> 
			  </div>
            </div>
          </li>
        </ul>
		<?php } ?>
      </div>

	  <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)){?>
      <div class="page1">
        <div class="pagecode">
		<?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

        </div>
        <div style="clear:both;"></div>
      </div>
	  <?php }?>

    </div>
    <div class="right yue1">
      <h2>猜你喜欢</h2>
	  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."user_80x96.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <div style="clear:both;"></div>
      <h2>热门日记</h2>
      <ul class="list_blog">
	    <?php $_smarty_tpl->tpl_vars['hotdiary'] = new Smarty_variable(vo_list("mod={diary} orderby={v.hits DESC} num={15}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotdiary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
"><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['title'],20);?>
</a> </li>
		<?php } ?>
      </ul>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>