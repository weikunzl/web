<?php /* Smarty version Smarty-3.1.14, created on 2014-03-26 16:09:38
         compiled from "C:\svn\eolove\tpl\admincp\seo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:573153328b421db9a0-58354465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed5df55092609ca3baf89a0b2e493842543f4830' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\admincp\\seo.tpl',
      1 => 1346204522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '573153328b421db9a0-58354465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'seo' => 0,
    'volist' => 0,
    'total' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53328b422caa80_37471984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53328b422caa80_37471984')) {function content_53328b422caa80_37471984($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\eolove\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>SEO设置</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=seo">SEO设置</a></p></div>
  <div class="main-cont">
    <h3 class="title">SEO设置</h3>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=seo&a=saveupdate" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="7%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">标识</div></th>
		<th width="15%"><div class="th-gap">名称</div></th>
		<th width="18%"><div class="th-gap">Meta标题</div></th>
		<th width="18%"><div class="th-gap">Meta描述</div></th>
		<th width="18%"><div class="th-gap">Meta关键字</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
" onClick="checkItem(this, 'chkAll')"></td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['idmark'];?>
</td>
		<td><input type='text' name='chname_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' id='chname_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' class='input-100' value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['chname'];?>
" /></td>
		<td><input type='text' name='title_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' id='title_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' class='input-150' value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
" /></td>
		<td><input type='text' name='description_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' id='description_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' class='input-150' value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['description'];?>
" /></td>
		<td><input type='text' name='keyword_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' id='keyword_<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
' class='input-150' value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['keyword'];?>
" /></td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=seo&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
" class="icon-edit">编辑</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="7" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6"><input class="button" name="btn_del" type="submit" value="更新保存" class="button"></td>
	  </tr>
	  <?php }?>
	</table>
	</form>
  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>基础设置<span>&gt;&gt;</span>SEO设置</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=seo" class="btn-general"><span>返回列表</span></a>编辑SEO设置</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=seo" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>标 识 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><?php echo $_smarty_tpl->tpl_vars['seo']->value['idmark'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>频道名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="chname" id="chname" class="input-200" value="<?php echo $_smarty_tpl->tpl_vars['seo']->value['chname'];?>
" />  <span id='dchname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta标题 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="title" id="title" class="input-200" value="<?php echo $_smarty_tpl->tpl_vars['seo']->value['title'];?>
" />  <span id='dtitle' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name='description' id='description' style="width:40%;height:60px;overflow:hidden;"><?php echo $_smarty_tpl->tpl_vars['seo']->value['description'];?>
</textarea>  <span id='ddescription' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><textarea name='keyword' id='keyword' style="width:40%;height:60px;overflow:hidden;"><?php echo $_smarty_tpl->tpl_vars['seo']->value['keyword'];?>
</textarea>  <span id='dkeyword' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>描 述<span class="f_red"></span> </td>
		<td class='hback'><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['seo']->value['intro']);?>
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
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<?php }} ?>