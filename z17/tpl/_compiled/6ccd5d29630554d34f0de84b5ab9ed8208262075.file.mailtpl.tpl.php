<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:37
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\mailtpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20445532e8929cb4c99-45612916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ccd5d29630554d34f0de84b5ab9ed8208262075' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\mailtpl.tpl',
      1 => 1340695916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20445532e8929cb4c99-45612916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'mailtpl' => 0,
    'volist' => 0,
    'page' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
    'fromform' => 0,
    'inputid' => 0,
    'tipsid' => 0,
    'skeyword' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e8929db1474_85950806',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8929db1474_85950806')) {function content_532e8929db1474_85950806($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>营销推广</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value!='search'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
<?php }?>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['a']->value!='search'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl">邮件模板设置</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&a=add" class="btn-general"><span>添加邮件模板</span></a>邮件模板设置</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
		<th width="10%"><div class="th-gap">ID</div></th>
		<th width="10%"><div class="th-gap">邮件类别</div></th>
		<th><div class="th-gap">邮件主题</div></th>
		<th width="15%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mailtpl']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tplid'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tplsort'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['subject'];?>
</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['tplid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="icon-edit">编辑</a>&nbsp;&nbsp;

		<?php if ($_smarty_tpl->tpl_vars['volist']->value['tplsort']=='other'){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['tplid'];?>
" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a>
		<?php }else{ ?>
		<font color="#999999">删除</font>
		<?php }?>

		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="4" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	</table>
	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>1){?>
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</td>
	  </tr>
	</table>
	<?php }?>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="add"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&a=add">添加邮件模板</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl" class="btn-general"><span>返回列表</span></a>添加邮件模板</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='18%'>邮件主题 <span class="f_red">*</span> </td>
		<td class='hback' width='82%'><input type="text" name="subject" id="subject" class="input-txt" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件内容 <span class="f_red">*</span></td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:95%;height:280px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>主题，内容可用标签 <span class="f_red"></span></td>
		<td class='hback'>
		  {sitename} 网站名称；{siteurl} 网站地址；{userid} 会员ID；{username} 会员名称<br />
		  {email} 会员邮箱；{sendtime} 发送时间<br />
		  {password} 会员密码（仅限注册欢迎邮件使用）；{key} 验证密钥（仅限取回密码邮件使用）；
		</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：营销推广<span>&gt;&gt;</span>邮件营销<span>&gt;&gt;</span>编辑邮件模板</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑邮件模板</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='18%'>邮件主题 <span class="f_red">*</span> </td>
		<td class='hback' width='82%'><input type="text" name="subject" id="subject" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['mailtpl']->value['subject'];?>
" /> <span id='dsubject' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件类别 <span class="f_red"></span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['mailtpl']->value['tplsort'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>邮件内容 <span class="f_red">*</span></td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:95%;height:280px;display:none;"><?php echo $_smarty_tpl->tpl_vars['mailtpl']->value['content'];?>
</textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>主题，内容可用标签 <span class="f_red"></span></td>
		<td class='hback'>
		  {sitename} 网站名称；{siteurl} 网站地址；{userid} 会员ID；{username} 会员名称<br />
		  {email} 会员邮箱；{sendtime} 发送时间<br />
		  {password} 会员密码（仅限注册欢迎邮件使用）；{key} 验证密钥（仅限取回密码邮件使用）；
		</td>
	  </tr>
	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none'><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<!-- 选择邮件模板 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=='search'){?>
<div class="main-wrap">
  <div class="main-cont">
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=mailtpl&a=search" />
	  <input type='hidden' name='fromform' value="<?php echo $_smarty_tpl->tpl_vars['fromform']->value;?>
" />
	  <input type='hidden' name='inputid' value="<?php echo $_smarty_tpl->tpl_vars['inputid']->value;?>
" />
	  <input type='hidden' name='tipsid' value="<?php echo $_smarty_tpl->tpl_vars['tipsid']->value;?>
" />
	  <div class="item">
		<label>邮件主题&nbsp;&nbsp;</label><input type="text" id="skeyword" name="skeyword" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="15%"><div class="th-gap">邮件类型</div></th>
		<th><div class="th-gap">邮件主题</div></th>
		<th width="15%"><div class="th-gap">选择</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mailtpl']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tplid'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tplsort'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['subject'];?>
</td>
		<td align="center"><a href="javascript:void(0);" onclick="selecttpl('<?php echo $_smarty_tpl->tpl_vars['volist']->value['tplid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['fromform']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['inputid']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['tipsid']->value;?>
')" class="icon-show">选择</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="4" align="center">对不起，没有你要找的邮件模板，请先添加。</td>
	  </tr>
	  <?php } ?>
	</table>
	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>1){?>
	<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' style="margin-top:10px;">
	  <tr>
		<td align='center'><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</td>
	  </tr>
	</table>
	<?php }?>
	</table>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value!='search'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
<?php }?>
</body>
</html>
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "subject";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("邮件主题不能为空", t);
		return false;
	}

	t = "content";
	v = editor.text();
	if(editor.isEmpty()) {
		dmsg("邮件内容不能为空", t);
		editor.focus();
		return false;
	}

	return true;
}

//选择邮件模板
function selecttpl(tplid, comeform, comeinput, tipsid){
    window.parent.$('#'+comeinput).val(tplid);
	window.parent.$('#'+tipsid).html("tplid="+tplid+"&nbsp;&nbsp;<a href=\"javascript:void(0);\" onclick=\"deltpl();\">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;");
	window.parent.$('#'+tipsid).show();
	window.parent.$('#mod_subject').hide();
	window.parent.$('#mod_content').hide();
	window.parent.tb_remove();
}
</script>
<?php }} ?>