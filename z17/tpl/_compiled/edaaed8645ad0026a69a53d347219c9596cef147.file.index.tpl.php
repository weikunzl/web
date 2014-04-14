<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 15:06:06
         compiled from "C:\svn\eolove\tpl\user\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1517553312ade273402-40967252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edaaed8645ad0026a69a53d347219c9596cef147' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\user\\index.tpl',
      1 => 1378362750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1517553312ade273402-40967252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'ucpath' => 0,
    'u' => 0,
    'ucfile' => 0,
    'match' => 0,
    'volist' => 0,
    'weibo' => 0,
    'gift' => 0,
    'visit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53312ade42bf45_54792449',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53312ade42bf45_54792449')) {function content_53312ade42bf45_54792449($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\eolove\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\eolove\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="user_main">
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="user_main_middle">
    <!--发表心情-->

	  <div class="mood-post-box">
	    <div class="mood-post-content">
		  <textarea class="mood-textarea" id="mood_content" name="mood_content" onkeydown="textCounter('mood_content', 'counter', 500);" onkeyup="textCounter('mood_content', 'counter', 500);" onclick="obj_del_wbcontent('mood_content');" onblur="obj_attr_wbcontent('mood_content');">记录每一天的心情...</textarea>
	      <div class="mood-box-block">
			<div class="fl" style="position:relative;">
			  <a href="###" onclick="show_more_face('display-eif', 'mood_content');"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/eif.gif" style="padding-bottom:3px;">表情</a>
			  <div id="display-eif"></div>
			</div>
			<div class="fr">
			  <div id="post_limit" class="fl" style="padding-top:5px;">还能输入<span id="counter">500</span>字</div>
			  <div class="mood-post-button" onclick="obj_public_mood('mood_content');"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/button-mood.gif"></div>
			  <div class="mood-post-cancel"><a href="###" onclick="obj_cancel_wbcontent('mood_content');">取消</a></div>
			</div>
			<div class="clear"></div>
		  </div>
	    </div>
	  </div>
      <!--//mood-post-form End-->

	<?php $_smarty_tpl->tpl_vars['match'] = new Smarty_variable(vo_list("mod={mymatch} value={".((string)$_smarty_tpl->tpl_vars['u']->value['userid'])."} num={5}"), null, 0);?>
	<div class="user-md-box" style="padding-bottom:15px;">
	  <div class="user-md-title"><span><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=match">更多速配&gt;&gt;</a></span>今日速配</div>
	  <div class="user-md-ulist">
	    <ul>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['match']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <li>
		  <img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width="75" height="90" /><br />
		  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br />
		  <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁，<?php echo cmd_area(array('type'=>"text",'value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>

		  </li>
		  <?php } ?>
		</ul>
		<div class="clear"></div>
	  </div>
	</div>
	<!--//user-md-box End-->

    <!--TAB Begin-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=weibo">随便看看</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=weibo&type=my">我的心情</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=weibo&type=listen">好友心情</a></li>
		</ul>
      </div>
	</div>
    <!--TAB End-->

	<div class="user-md-weibo">
	  <?php $_smarty_tpl->tpl_vars['weibo'] = new Smarty_variable(vo_list("mod={weibo} num={10}"), null, 0);?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weibo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <div class="user-md-trends">
	    <div class="user_trends_left"><?php echo cmd_avatar(array('width'=>'60','height'=>'69','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</div>
        <div class="user_trends_right">
		  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a>
		  <span class="trends_fs">- 
		  <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁 
		  <?php echo cmd_area(array('type'=>"text",'value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 
		  <?php echo cmd_area(array('type'=>"text",'value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>

		  </span>
		  <div class="quote-box">
            <div class="feed-box">
			  <p><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['volist']->value['content']);?>
</p>
			</div>
          </div>
		  <div class="trends_pj">
		    <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['addtime'],"%m-%d %H:%M");?>
</span>
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['userid']!=$_smarty_tpl->tpl_vars['u']->value['userid']){?>
		    <a href="###" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');">发信件</a>
		    <a href="###" onclick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');">打招呼</a>
		    <a href="###" onclick="artbox_sendgift('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');">送礼物</a>
			<?php }?>
		  </div>
		</div>
		<div class="clear"></div>
	  </div>
	  <?php } ?>
	  <div class="nav-tips" style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=weibo">查看更多心情</a></div>

	</div>
	<!--//user-md-weibo End-->

  </div>
  <!--//user_main_middle End-->

  <!--右边 Begin-->
  <div class="user_main_right">
    <div class="user_iph_k">
	  <ul>
	    <li class="gdlh"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=vip">升级VIP会员，享受更多服务</a></li>
		<li class="lwsc"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=certify">诚信认证点亮图标提高人气</a></li>
      </ul>
	  <div class="clear"></div>
    </div>
	<!--//user_iph_k End-->
	
	<?php $_smarty_tpl->tpl_vars['gift'] = new Smarty_variable(vo_list("mod={gift} where={v.touserid='".((string)$_smarty_tpl->tpl_vars['u']->value['userid'])."'} num={9}"), null, 0);?>
	<?php if (!empty($_smarty_tpl->tpl_vars['gift']->value)){?>
	<div class="user-rt-box">
	  <div class="user-rt-title"><span><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=gift">更多礼物</a></span>收到的礼物</div>
	  <div class="user-index-gift">
		<ul>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <li><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['imgurl'];?>
" width="60" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
" /></li>
		  <?php } ?>
		</ul>
	  </div>
	</div>
	<!--//user-rt-box End-->
	<?php }?>
    
	<?php $_smarty_tpl->tpl_vars['visit'] = new Smarty_variable(vo_list("mod={myvisitme} num={10} value={".((string)$_smarty_tpl->tpl_vars['u']->value['userid'])."}"), null, 0);?>
	<?php if (!empty($_smarty_tpl->tpl_vars['visit']->value)){?>
	<div class="user-rt-box">
	  <div class="user-rt-title"><span><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=visitme">更多&gt;&gt;</a></span>谁看了我</div>
	  <div class="user-index-visit">
	    <ul>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <li>
		  <p>
		    <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a><br />
			<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁 
			<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->tpl_vars['volist']->value['height']>0){?>
			<?php echo $_smarty_tpl->tpl_vars['volist']->value['height'];?>
CM
			<?php }?>
			<br />
			<font color="#999999">到访：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['viewtime'],"%m-%d %H:%M");?>
</font>
		  </p>
		  <span><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width='50' height='60' /></span>
		  </li>
		  <?php } ?>
		</ul>
		<div class="clear"></div>
	  </div>
	</div>
	<!--//user-rt-box End-->
	<?php }?>


  </div>
  <div style="clear:both;"> </div>
  <!--//user_main_right End--> 
  
</div>
<!--//user_main End--> 

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_eif.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
</body>
</html><?php }} ?>