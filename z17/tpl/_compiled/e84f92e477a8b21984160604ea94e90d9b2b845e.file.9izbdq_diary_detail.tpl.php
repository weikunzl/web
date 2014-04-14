<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:53:23
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\templets\default\9izbdq_diary_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3817532ed943472fd2-29956915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e84f92e477a8b21984160604ea94e90d9b2b845e' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\templets\\default\\9izbdq_diary_detail.tpl',
      1 => 1378697465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3817532ed943472fd2-29956915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'appfile' => 0,
    'diary' => 0,
    'skinpath' => 0,
    'comment' => 0,
    'volist' => 0,
    'showpage' => 0,
    'id' => 0,
    'config' => 0,
    'urlpath' => 0,
    'login' => 0,
    'hotdiary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed943642dd9_29098574',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed943642dd9_29098574')) {function content_532ed943642dd9_29098574($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
if (!is_callable('smarty_modifier_nl2br')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('diary', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce member">
    
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="left ri">
      <div class="search_sort">
        <div id="rank" class="search_sle">你的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
">首页</a> &gt;&gt; <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=diary">心情日记</a> &gt;&gt; 正文 </div>
      </div>
      <div class="content">
        <h1><?php echo $_smarty_tpl->tpl_vars['diary']->value['title'];?>
</h1>
        <div class="jian">天气：<?php echo cmd_hook(array('mod'=>'var','item'=>'weather','type'=>'text','value'=>$_smarty_tpl->tpl_vars['diary']->value['weather']),$_smarty_tpl);?>
&nbsp;&nbsp;心情：<?php echo cmd_hook(array('mod'=>'var','item'=>'feel','type'=>'text','value'=>$_smarty_tpl->tpl_vars['diary']->value['feel']),$_smarty_tpl);?>
&nbsp;&nbsp;发表时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['diary']->value['timeline'],"%m-%d %H:%M");?>
  人气：<font id='json_hits'></font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#content">我要评论</a></div>
        <div class="real">

	      <div class="topj"> <a href="<?php echo $_smarty_tpl->tpl_vars['diary']->value['homeurl'];?>
" class="topimg"><?php echo $_smarty_tpl->tpl_vars['diary']->value['useravatar'];?>
</a> 发表人：<?php echo $_smarty_tpl->tpl_vars['diary']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['diary']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['diary']->value['username'];?>
</a><br>
            <span><?php echo $_smarty_tpl->tpl_vars['diary']->value['age'];?>
岁 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['diary']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['diary']->value['cityid']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['diary']->value['height'];?>
CM <?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['diary']->value['education']),$_smarty_tpl);?>
 <?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['diary']->value['salary']),$_smarty_tpl);?>
</span><br>
			<?php if ($_smarty_tpl->tpl_vars['diary']->value['molstatus']==1){?>
            <label class="db">
			<?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['diary']->value['monolog'],80);?>
 
			</label>
			<?php }?>
			<a href="###" class="sg" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['diary']->value['userid'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/f.gif"></a>
			<a href="###" class="sg" onclick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['diary']->value['userid'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/zh.gif"></a>
			<a href="###" class="sg" onclick="artbox_sendgift('<?php echo $_smarty_tpl->tpl_vars['diary']->value['userid'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/sl.gif"></a>
		  </div>
		  <?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['diary']->value['content']);?>

		  <br />
		  <?php $_smarty_tpl->tpl_vars['pluginaction'] = new Smarty_variable(XHook::doAction('content_share'), null, 0);?>
        </div>

        <div class="comments">
          <ul>
			<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
            <li> 
			  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" class="head" target='_blank'><?php echo cmd_avatar(array('width'=>'50','height'=>'61','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>
</a><span><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><b><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</b></a> 说：</span>
			  <?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['volist']->value['content']);?>

			  <div class="jilou">
			    <span>评论于：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%m-%d %H:%M");?>
</span>  <label><?php echo $_smarty_tpl->tpl_vars['volist']->value['ordersi'];?>
楼</label>
			  </div>
              <div style="clear:both"></div>
            </li>
			<?php } ?>
            <div style="clear:both"></div>
          </ul>

		  <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)){?>
			<div class="pagecode">
			<?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

			</div>
			<div style="clear:both;"></div>
		  <?php }?>

          <h2 style="margin-top:5px;">发表评论：</h2>
		  <input type='hidden' name='id' id='id' value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
		  <table width="100%" border="0" cellspacing="5" cellpadding="5" style="line-height:25px;">
		    <tr>
			  <td><textarea style="width:98.6%;height:90px;" class='comment_textarea' id="content" name="content"></textarea></td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['config']->value['commentcode']=='1'){?>
			<tr>
			  <td>验证码：
			  <input type="text" id="checkcode" name="checkcode" class="checkcode"  maxlength='6' /> <img id="checkCodeImg" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refresh_code('checkCodeImg');"> 换一张</a>
			  </td>
			</tr>
			<?php }?>
			<tr>
			  <td>
			  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
			  欢迎您：<?php echo $_smarty_tpl->tpl_vars['login']->value['username'];?>
&nbsp;&nbsp;&nbsp;
			  <a class="btn_b3 btn" name='btn_roll' id='btn_roll'><span>提交评论</span></a>
			  <?php }else{ ?>
			  只有登录会员才可以进行评论! <a href="###" onclick="artbox_loginbox();">登录</a> 或者 <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=reg">免费注册</a>
			  <?php }?>
			  </td>
			</tr>
		  </table>

          
        </div>
      </div>
    </div>
    <div class="right yue1">
      <h2>热门日记</h2>
      <ul class="list_blog">
	    <?php $_smarty_tpl->tpl_vars['hotdiary'] = new Smarty_variable(vo_list("mod={diary} orderby={v.hits DESC} num={12}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotdiary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
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
</html>
<script type='text/javascript'>
$(function(){
	$('#btn_roll').click(function(){
		var id = $('#id').val();
		var content = $('#content').val();
		var checkcode = '';

		if (id == '') {
			alert('ID错误！');
			return false;
		}
		if (content == '') {
			alert('评论内容不能为空！');
			$('#content').focus();
			return false;
		}
		<?php if ($_smarty_tpl->tpl_vars['config']->value['commentcode']=='1'){?>
		checkcode = $('#checkcode').val();
		if (checkcode == '') {
			alert('请填写验证码！');
			$('#checkcode').focus();
			return false;
		}
		<?php }?>

		roll_diarycomment(id, content, checkcode);
	});

	update_hits('<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
', 'diary', 'json_hits');
});
</script><?php }} ?>