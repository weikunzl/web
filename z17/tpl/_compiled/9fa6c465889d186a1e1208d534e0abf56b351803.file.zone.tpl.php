<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 09:53:49
         compiled from "C:\svn\z17z17\web\z17\tpl\admincp\zone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:279885355cbad884000-19470710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fa6c465889d186a1e1208d534e0abf56b351803' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\admincp\\zone.tpl',
      1 => 1398066161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279885355cbad884000-19470710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'config' => 0,
    'zone' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'page' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5355cbadc04659_39612751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355cbadc04659_39612751')) {function content_5355cbadc04659_39612751($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.stripslashes.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>设置广告版位</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone">广告版位</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&a=add" class="btn-general"><span>添加版位</span></a>广告版位</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<?php echo $_smarty_tpl->tpl_vars['config']->value['templet'];?>
</div>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">版位名称</div></th>
		<th width="20%"><div class="th-gap">版位标识</div></th>
		<th width="8%"><div class="th-gap">所属风格</div></th>
		<th width="8%"><div class="th-gap">类型</div></th>
		<th width="12%"><div class="th-gap">大小</div></th>
		<th width="8%"><div class="th-gap">广告数</div></th>
		<th width="7%"><div class="th-gap">状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zone']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
" onClick="checkItem(this, 'chkAll')"></td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['zonename'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['idmark'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['templet'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['sort'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['zonewidth'];?>
x<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneheight'];?>
(px)</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['adscount'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="icon-set">设置</a>&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['zoneid'];?>
" onClick="{if(confirm('确定要删除该信息？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="9" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除选定信息？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b> ]条记录</td>
	  </tr>
	  <?php }?>
	</table>
	</form>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&a=add">添加广告版位</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone" class="btn-general"><span>返回列表</span></a>添加广告版位</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<?php echo $_smarty_tpl->tpl_vars['config']->value['templet'];?>
</div>
	</div>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">版位名称：<span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="zonename" id="zonename" class="input-txt" /> <span class='f_red' id="dzonename"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>版位标识：<span class='f_red'>*</span></td>
		<td class='hback'><input type="text" name="idmark" id="idmark" class="input-txt" /> <span class='f_red' id="didmark"></span> （只能字母，数字，下横线，中横线组成）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>版位类型：<span class='f_red'>*</span></td>
		<td class='hback'>
		<select name="sort" id="sort">
		<option value=''>请选择</option>
		<option value='slide'>幻灯片</option>
		<option value='flash'>Flash</option>
		<option value='picture'>单张图片</option>
		</select>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位宽：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zonewidth" id="zonewidth" class="input-s" /> 像素(px) <span class='f_red' id="dzonewidth"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位高：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zoneheight" id="zoneheight" class="input-s" /> 像素(px) <span class='f_red' id="dzoneheight"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态：<span class='f_red'></span></td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked /> 正常，<input type="radio" name="flag" id="flag" value="0" /> 锁定</td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑广告版位</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑广告版位</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<?php echo $_smarty_tpl->tpl_vars['config']->value['templet'];?>
</div>
	</div>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=zone&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1'>版位标识：<span class='f_red'></span></td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['zone']->value['idmark'];?>
 （不能修改）</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="15%">版位名称：<span class='f_red'>*</span></td>
		<td class='hback' width="85%"><input type="text" name="zonename" id="zonename" class="input-txt" value="<?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['zone']->value['zonename']);?>
" /> <span class='f_red' id="dzonename"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>版位类型：<span class='f_red'>*</span></td>
		<td class='hback'>
		<select name="sort" id="sort">
		<option value=''>请选择</option>
		<option value='slide'<?php if ($_smarty_tpl->tpl_vars['zone']->value['sort']=='slide'){?> selected<?php }?>>幻灯片</option>
		<option value='flash'<?php if ($_smarty_tpl->tpl_vars['zone']->value['sort']=='flash'){?> selected<?php }?>>Flash</option>
		<option value='picture'<?php if ($_smarty_tpl->tpl_vars['zone']->value['sort']=='picture'){?> selected<?php }?>>单张图片</option>
		</select>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位宽：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zonewidth" id="zonewidth" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['zonewidth'];?>
" /> 像素(px) <span class='f_red' id="dzonewidth"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告位高：<span class='f_red'></span></td>
		<td class='hback'><input type="text" name="zoneheight" id="zoneheight" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['zoneheight'];?>
" /> 像素(px) <span class='f_red' id="dzoneheight"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>使用状态：<span class='f_red'></span></td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['zone']->value['flag']=='1'){?> checked<?php }?> /> 正常，<input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['zone']->value['flag']=='0'){?> checked<?php }?> /> 锁定</td>
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
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "zonename";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位名称不能为空", t);
		return false;
	}

	t = "idmark";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位标识不能为空", t);
		return false;
	}

	t = "sort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位类型不能为空", t);
		return false;
	}

	return true;
}

function checkedit() {
	var t = "";
	var v = "";

	t = "zonename";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位名称不能为空", t);
		return false;
	}

	t = "sort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("版位类型不能为空", t);
		return false;
	}

	return true;
}
</script>
<?php }} ?>