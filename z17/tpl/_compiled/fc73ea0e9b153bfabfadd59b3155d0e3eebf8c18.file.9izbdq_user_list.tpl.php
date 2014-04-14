<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 15:15:33
         compiled from "C:\svn\z17\tpl\templets\default\9izbdq_user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54115333d0159adfb7-92227256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc73ea0e9b153bfabfadd59b3155d0e3eebf8c18' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\templets\\default\\9izbdq_user_list.tpl',
      1 => 1378695320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54115333d0159adfb7-92227256',
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
    'eliteuser' => 0,
    'diary' => 0,
    'mchuser' => 0,
    'ads' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5333d015b6f495_35540782',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333d015b6f495_35540782')) {function content_5333d015b6f495_35540782($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('user', null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="search_max w960 online_page">
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="search_sort">
      <div class="search_tips"> 共<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>人符合您的搜索条件 </div>
      <div class="search_sort_sle" id="rank"> 
	    <strong>显示方式：</strong> 		
	    <a class="btnc btn_c3" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user&a=list<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['urlitem']->value)){?>&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
<?php }?>"> <span class='h'><b>头像模式</b></span> </a>&nbsp;
		<a class="btnc3 btn_c3" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user&a=list<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php }?>&type=more<?php if (!empty($_smarty_tpl->tpl_vars['urlitem']->value)){?>&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
<?php }?>"> <span><b>独白模式</b></span> </a> 
	  </div>
    </div>
    <div class="online_list">

      <ul class="search_pic_list clearfix">
	    <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li>
          <div class="search_user_bg"> <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo cmd_avatar(array('width'=>'112','height'=>'135','css'=>'img100','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a> </div>
          <div class="search_user_inform">
            <p class="search_user_t1"><?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a> </p>
            <p class="search_user_add"><?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
</p>
            <p class="search_vt"> 
				<a class="btn_bt1 chat sayHiBtn" href="###" onclick="artbox_hi(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/d.gif"></span></a> 
				<a class="btn_bt2 mail sendEmailBtn" href="javascript:void(0);" onclick="artbox_writemsg(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/r.gif"></span></a>
			</p>
          </div>
        </li>
	    <?php } ?>
        <div style="clear:both;"></div>
      </ul>
      <div style="clear:both;"></div>

	  <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)){?>
      <div class="page1">
        <div class="pagecode">
		<?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

        </div>
        <div style="clear:both;"></div>
      </div>
	  <?php }?>

    </div>
    <div class="onright"> 

      <div class="divtitle">推荐会员</div>
      <div class="onhead">
	    <?php $_smarty_tpl->tpl_vars['eliteuser'] = new Smarty_variable(vo_list("mod={spuser} type={elite} num={9}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eliteuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="odh">
		  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo cmd_avatar(array('width'=>'70','height'=>'86','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a><br>
          <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a>
		</div>
		<?php } ?>
        <div style="clear:both;"></div>
      </div>
      <div class="divtitle" style="margin-top:5px;">最新日记</div>
      <ul class="list_so">
	    <?php $_smarty_tpl->tpl_vars['diary'] = new Smarty_variable(vo_list("mod={diary} orderby={v.hits DESC} num={15}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
"><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['title'],20);?>
</a> </li>
		<?php } ?>
      </ul>
      <div class="divtitle" style="margin-top:5px;">猜你喜欢</div>
      <div class="onhead">
	    <?php $_smarty_tpl->tpl_vars['mchuser'] = new Smarty_variable(vo_list("mod={matchuser} num={9}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mchuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="odh">
		  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo cmd_avatar(array('width'=>'70','height'=>'86','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a><br>
          <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a>
		</div>
		<?php } ?>
        <div style="clear:both;"></div>
      </div>

	  <?php $_smarty_tpl->tpl_vars['ads'] = new Smarty_variable(get_ads('channel_smbanner_2'), null, 0);?>
	  <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value)){?>
	  <div class="onrightad"><a <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value['url'])&&$_smarty_tpl->tpl_vars['ads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['ads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['ads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['ads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
" /></a></div>
	  <?php }?>
	  
	  </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>