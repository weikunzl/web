<?php /* Smarty version Smarty-3.1.14, created on 2014-03-26 14:05:40
         compiled from "C:\svn\eolove\tpl\templets\default\9izbdq_user_advsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1694853326e34cf41e7-69194194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03ca935881e76aa6ed70762cd6fef3d362c4b8d5' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\templets\\default\\9izbdq_user_advsearch.tpl',
      1 => 1390719466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1694853326e34cf41e7-69194194',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'appfile' => 0,
    'hotdiary' => 0,
    'volist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53326e34e1cff3_97933609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53326e34e1cff3_97933609')) {function content_53326e34e1cff3_97933609($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\eolove\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('advsearch', null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce member">
    
    <div class="left ri">
      <div class="content">
        <div class="search_box" id="searchBox" style="display:block;">
          <h3>高级搜索</h3>
          <div>
              <div class="search_cont">

				<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user&a=list" id="search_high_level">
				<input type='hidden' id="s_searchtype" name="s_searchtype" value="adv" />
                <div class="search_cont_l">
                  <label class="t">我 要 找：</label>
                  <input type="radio" name="s_sex" id="s_sex" value='2'>
                  <label class="r" for="sex_1">女会员</label>
                  <input type="radio" name="s_sex" id="s_sex" value='1'>
                  <label class="r" for="sex_2">男会员</label>
                </div>
                <div class="search_cont_l">
                  <label id="age"  class="t">年&nbsp;&nbsp;&nbsp;&nbsp;龄：</label>
				  <?php echo cmd_hook(array('mod'=>'age','name'=>'s_sage','value'=>'20','text'=>'=不限='),$_smarty_tpl);?>

				  <span>&nbsp;~&nbsp;</span>
				  <?php echo cmd_hook(array('mod'=>'age','name'=>'s_eage','value'=>'30','text'=>'=不限='),$_smarty_tpl);?>
 岁
                </div>
                <div class="search_cont_l">
                  <label id="workCity"  class="t">所 在 地：</label>
				  <?php echo cmd_area(array('type'=>'dist1','name'=>'s_dist1','ajax'=>'1','cname'=>'s_dist2','cajax'=>'1','dname'=>'s_dist3','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;
				  <span id="json_s_dist2"></span>&nbsp;
				  <span id="json_s_dist3"></span>&nbsp;&nbsp;
                </div>
                <div class="search_cont_l">
                  <label id="height"  class="t">交友类型：</label>
				  <?php echo cmd_hook(array('mod'=>'lovesort','name'=>'s_lovesort','type'=>'select','text'=>'=不限='),$_smarty_tpl);?>

				</div>
                <div class="search_cont_l">
                  <label id="height"  class="t">身&nbsp;&nbsp;&nbsp;&nbsp;高：</label>
				  <?php echo cmd_hook(array('mod'=>'height','name'=>'s_sheight','value'=>'155','text'=>'=不限='),$_smarty_tpl);?>

				  <span>&nbsp;~&nbsp;</span>
				  <?php echo cmd_hook(array('mod'=>'height','name'=>'s_eheight','value'=>'175','text'=>'=不限='),$_smarty_tpl);?>
 CM
				</div>
                <div class="search_cont_l">
                  <label id="salary"  class="t">月&nbsp;收&nbsp;入：</label>
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'select','name'=>'s_ssalary','text'=>'=不限='),$_smarty_tpl);?>

				  <span>&nbsp;~&nbsp;</span>
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'select','name'=>'s_esalary','text'=>'=不限='),$_smarty_tpl);?>

                </div>
                <div class="search_cont_l">
                  <label id="education"  class="t">学&nbsp;&nbsp;&nbsp;&nbsp;历：</label>
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'select','name'=>'s_sedu','text'=>'=不限='),$_smarty_tpl);?>

				  <span>&nbsp;~&nbsp;</span>
				  <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'select','name'=>'s_eedu','text'=>'=不限='),$_smarty_tpl);?>

                </div>

				<div style="line-height:40px;">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="75px" align="right">婚&nbsp;&nbsp;&nbsp;&nbsp;史：</td>
					  <td style='margin-left:5px;'><?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','name'=>'s_marry','type'=>'checkbox'),$_smarty_tpl);?>
</td>
					</tr>
				  </table>
				  <div class="c"></div>
				</div>


				<div style="line-height:40px;">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="75px" align="right">有无子女：</td>
					  <td style='margin-left:5px;'><?php echo cmd_hook(array('mod'=>'var','item'=>'childrenstatus','type'=>'checkbox','name'=>'s_havechild'),$_smarty_tpl);?>
</td>
					</tr>
				  </table>
				  <div class="c"></div>
				</div>


                <div class="search_cont_l">
                  <label id="house"  class="t">住&nbsp;&nbsp;&nbsp;&nbsp;房：</label>
                  <?php echo cmd_hook(array('mod'=>'var','item'=>'housing','type'=>'select','name'=>'s_house','text'=>'=不限='),$_smarty_tpl);?>

                </div>
                <div class="search_cont_l">
                  <label  class="t">购&nbsp;&nbsp;&nbsp;&nbsp;车：</label>
                  <?php echo cmd_hook(array('mod'=>'var','item'=>'caring','type'=>'select','name'=>'s_car','text'=>'=不限='),$_smarty_tpl);?>

                </div>

                <div class="search_cont_l">
                  <label  class="t">职&nbsp;&nbsp;&nbsp;&nbsp;业：</label>
                  <?php echo cmd_hook(array('mod'=>'var','item'=>'jobs','type'=>'select','name'=>'s_jobs','text'=>'=不限='),$_smarty_tpl);?>

                </div>

                <div class="search_cont_l">
                  <label  class="t">形&nbsp;像&nbsp;照：</label>
                  <input type="checkbox" value="1" name="s_avatar" id="s_avatar">
                  <label class="padd_r" for="ph_1">有</label>
                </div>
                <div class="search_cont_l">
                  <label class="t">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <button type="submit" id="btn_search"><span>搜 索</span></button>
                </div>
				</form>

				<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user&a=list" id="search_high_level">
				<input type='hidden' id="s_searchtype" name="s_searchtype" value="adv" />
                <div class="search_cont_l">
                  <label class="t">会员ID：</label>
				  <input type="text" name="s_uid" id="s_uid" style="height:22px; padding:3px 5px;border:1px solid; border-color:#adadad #e0e0e0 #e0e0e0 #adadad;width:150px;margin-right:10px; background:#fcfcfc;vertical-align:middle;" /> (输入会员ID进行搜索)
                </div>
                <div class="search_cont_l">
                  <label  class="t">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <button type="submit" id="btn_search_uid"><span>搜 索</span></button>
                </div>
				</form>

              </div>
          </div>

        </div>
      </div>
    </div>

    <div class="right yue1">
      <h2>热门日记</h2>
      <ul class="list_blog">
	    <?php $_smarty_tpl->tpl_vars['hotdiary'] = new Smarty_variable(vo_list("mod={diary} orderby={v.hits DESC} num={10}"), null, 0);?>
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
      <h2 style="margin-top:10px;">猜你喜欢</h2>
	  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."user_80x96.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>