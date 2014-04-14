<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 16:10:24
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\templets\default\9izbdq_diary_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5637532e96f038e296-38134430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8009495c5e55fbb7f50c185ad67370b6e2b6792' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\templets\\default\\9izbdq_diary_index.tpl',
      1 => 1378697327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5637532e96f038e296-38134430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'ads' => 0,
    'elitediary' => 0,
    'volist' => 0,
    'newdiary' => 0,
    'picdiary' => 0,
    'skinpath' => 0,
    'diary_cat' => 0,
    'appfile' => 0,
    'diary' => 0,
    'val' => 0,
    'mchuser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e96f05ac633_57839265',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e96f05ac633_57839265')) {function content_532e96f05ac633_57839265($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('diary', null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce member">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="left blog">

      <div class="ad">
        <div class="leftad">
	    <?php $_smarty_tpl->tpl_vars['ads'] = new Smarty_variable(get_ads('diary_banner_1'), null, 0);?>
	    <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value)){?>
	    <a <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value['url'])&&$_smarty_tpl->tpl_vars['ads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['ads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['ads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['ads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
" /></a>
	    <?php }?>
	    <?php $_smarty_tpl->tpl_vars['ads'] = new Smarty_variable(get_ads('diary_banner_2'), null, 0);?>
	    <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value)){?>
	    <a <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value['url'])&&$_smarty_tpl->tpl_vars['ads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['ads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['ads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['ads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
" /></a>
	    <?php }?>
		</div>
        <div class="le2">
		  

          <div class='elite'>
		    <?php $_smarty_tpl->tpl_vars['elitediary'] = new Smarty_variable(vo_list("mod={diary} where={v.elite='1'} num={1}"), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elitediary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		    <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a> <br>
            <div class="rzjie"><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['content'],85);?>
...</div>
			<?php } ?>
          </div>

          <ul class="rzul">
		    <?php $_smarty_tpl->tpl_vars['newdiary'] = new Smarty_variable(vo_list("mod={diary} num={6}"), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newdiary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
"><span> ▪ </span><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a></li>
			<?php } ?>
            <div style="clear:both"></div>
          </ul>
          <div class="rztu">
		    <?php $_smarty_tpl->tpl_vars['picdiary'] = new Smarty_variable(vo_list("mod={diary} where={v.thumbfiles != ''} num={3}"), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['picdiary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
            <div class="stu"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['thumbfiles'];?>
" width='100px' height='75px'><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
"><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['title'],8);?>
</a></div>
			<?php } ?>
          </div>
          <span class="neww"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/new_diary.png"></span> </div>
        <div style="clear:both"></div>
      </div>

      <div class="aa">
		
		<?php $_smarty_tpl->tpl_vars["diary_cat"] = new Smarty_variable(vo_list("mod={diarycat}"), null, 0);?>
	    <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diary_cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="<?php if ($_smarty_tpl->tpl_vars['volist']->value['i']%2==0){?>a2<?php }else{ ?>a1<?php }?>">
          <h2>
            <div>⿻ <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=diary&a=list&cid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</a></div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=diary&a=list&cid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
" class="mo" target="_blank">更多&gt;&gt;</a>
		  </h2>
          <ul>
		    <?php $_smarty_tpl->tpl_vars['diary'] = new Smarty_variable(vo_list("mod={diary} where={v.catid='".((string)$_smarty_tpl->tpl_vars['volist']->value['catid'])."'} num={6}"), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['url'];?>
" target="_blank"><span> ▪ </span><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</a></li>
			<?php } ?>
            <div style="clear:both"></div>
          </ul>
        </div>
		<?php } ?>

      </div>
    </div>

    <div class="right">
      <h2>猜你喜欢</h2>
	  <?php $_smarty_tpl->tpl_vars['mchuser'] = new Smarty_variable(vo_list("mod={matchuser} num={9}"), null, 0);?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mchuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
      <div class="iemg"> <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo cmd_avatar(array('width'=>'80','height'=>'96','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a>
        <?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br>
        <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁  <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>

	  </div>
	  <?php } ?>
      <div style="clear:both;"></div>
      <h2 style="margin-top:5px;">最新日记</h2>
      <ul class="list_blog">
	    <?php $_smarty_tpl->tpl_vars['newdiary'] = new Smarty_variable(vo_list("mod={diary} num={15}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newdiary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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