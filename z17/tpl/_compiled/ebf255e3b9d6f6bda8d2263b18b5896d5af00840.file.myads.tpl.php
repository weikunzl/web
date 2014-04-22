<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 17:06:06
         compiled from "C:\svn\z17z17\web\z17\tpl\admincp\myads.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144835354df7e36aa30-20168907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf255e3b9d6f6bda8d2263b18b5896d5af00840' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\admincp\\myads.tpl',
      1 => 1398066161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144835354df7e36aa30-20168907',
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
    'zone_select' => 0,
    'sname' => 0,
    'myads' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'page' => 0,
    'urlitem' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'comeurl' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354df7e524a70_04951046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354df7e524a70_04951046')) {function content_5354df7e524a70_04951046($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>广告管理</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads">广告管理</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads&a=add" class="btn-general"><span>添加广告</span></a>广告管理</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads" />
	  <div class="item">
	    当前使用风格：<?php echo $_smarty_tpl->tpl_vars['config']->value['templet'];?>
&nbsp;&nbsp;&nbsp;
	    <label>广告版位：</label><?php echo $_smarty_tpl->tpl_vars['zone_select']->value;?>
&nbsp;&nbsp;
		<label>广告名称：</label><input type="text" id="sname" name="sname" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['sname']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜 索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="15%"><div class="th-gap">所在版位</div></th>
		<th width="13%"><div class="th-gap">广告名称</div></th>
		<th width="13%"><div class="th-gap">广告标识</div></th>
		<th width="15%"><div class="th-gap">类型/大小</div></th>
		<th width="8%"><div class="th-gap">所属风格</div></th>
		<th width="7%"><div class="th-gap">排序</div></th>
		<th width="7%"><div class="th-gap">状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
" onClick="checkItem(this, 'chkAll')"></td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['zonename'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['adname'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tagname'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['normbody']['type'];?>
 (<?php echo $_smarty_tpl->tpl_vars['volist']->value['normbody']['width'];?>
*<?php echo $_smarty_tpl->tpl_vars['volist']->value['normbody']['height'];?>
px)</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['templet'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['orders'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
');" style="cursor:pointer;">	
		<?php }?>
        </td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['aid'];?>
" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
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
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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
?c=myads&a=add">添加广告</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads" class="btn-general"><span>返回列表</span></a>添加广告</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<?php echo $_smarty_tpl->tpl_vars['config']->value['templet'];?>
</div>
	</div>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads" onsubmit='return checkform();' />
	<input type='hidden' name='a' id='a' value='saveadd' />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">所在广告版位 <span class='f_red'></span></td>
		<td class='hback' width="85%"><?php echo $_smarty_tpl->tpl_vars['zone_select']->value;?>
 <span id="dzoneid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="adname" id="adname" class="input-txt" /> <span id='dadname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告标识 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="tagname" id="tagname" class="input-txt" /> <span id='dtagname' class='f_red'></span> （只能有字母、数字，下横线，中横线组成）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告链接地址 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="url" id="url" class="input-txt" /> <span id='durl' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接打开方式 <span class="f_red"></span> </td>
		<td class='hback'><select name="target" id="target"><option value="1">本页面</option><option value="2">新页面</option></select> <span id='dtarget' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" /> <span id='dorders' class='f_red'></span> （同一个版位有效，数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />正常，<input type="radio" name="flag" id="flag" value="0" />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan='2' align='center'><b>广告内容</b> <span class="f_red"></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告类型 </td>
		<td class='hback'><input type="radio" name="type" id="type" value='picture' checked />图片，<input type="radio" name="type" id="type" value='flash' />Flash</td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片/Flash地址 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告宽  <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="width" id="width" class="input-s" value="" />像素  <span id='dwidth' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告高 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="height" id="height" class="input-s" value="" />像素  <span id='dheight' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>标题描述 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" value="" />  <span id='dtitle' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：系统设置<span>&gt;&gt;</span>其他设置<span>&gt;&gt;</span>编辑广告</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑广告图片</h3>
	<div class="search-area ">
	  <div class="item">当前使用风格：<?php echo $_smarty_tpl->tpl_vars['config']->value['templet'];?>
</div>
	</div>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=myads&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" onsubmit='return checkedit();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1'>广告标识 <span class="f_red">*</span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['myads']->value['tagname'];?>
 （不能更改）</td>
	  </tr>
	  <tr>
		<td class='hback_1' width="15%">所在广告版位 <span class='f_red'></span></td>
		<td class='hback' width="85%"><?php echo $_smarty_tpl->tpl_vars['zone_select']->value;?>
 <span id="dzoneid" class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="adname" id="adname" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['adname'];?>
" /> <span id='dadname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告链接地址 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="url" id="url" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['url'];?>
" /> <span id='durl' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接打开方式 <span class="f_red"></span> </td>
		<td class='hback'><select name="target" id="target"><option value="1"<?php if ($_smarty_tpl->tpl_vars['myads']->value['target']=='1'){?> selected<?php }?>>本页面</option><option value="2"<?php if ($_smarty_tpl->tpl_vars['myads']->value['target']=='2'){?> selected<?php }?>>新页面</option></select> <span id='dtarget' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告排序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['orders'];?>
" /> <span id='dorders' class='f_red'></span> （同一个版位有效，数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告状态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['myads']->value['flag']==1){?> checked<?php }?> />正常，<input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['myads']->value['flag']==0){?> checked<?php }?> />锁定</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan='2' align='center'><b>广告内容</b> <span class="f_red"></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告类型 </td>
		<td class='hback'><input type="radio" name="type" id="type" value='picture'<?php if ($_smarty_tpl->tpl_vars['myads']->value['normbody']['type']=='picture'){?> checked<?php }?> />图片，<input type="radio" name="type" id="type" value='flash'<?php if ($_smarty_tpl->tpl_vars['myads']->value['normbody']['type']=='flash'){?> checked<?php }?> />Flash</td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片/Flash地址 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['normbody']['uploadfiles'];?>
" /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告宽  <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="width" id="width" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['normbody']['width'];?>
" />像素  <span id='dwidth' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>广告高 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="height" id="height" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['normbody']['height'];?>
" />像素  <span id='dheight' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>标题描述 <span class="f_red"></span></td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['myads']->value['normbody']['title'];?>
" />  <span id='dtitle' class='f_red'></span></td>
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

	t = "adname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("广告名称不能为空", t);
		return false;
	}
	t = "tagname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("广告标识不能为空", t);
		return false;
	}

	t = "uploadfiles";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("图片/Flash地址不能为空", t);
		return false;
	}
	return true;
}

function checkedit() {
	var t = "";
	var v = "";

	t = "adname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("广告名称不能为空", t);
		return false;
	}

	t = "uploadfiles";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("图片/Flash地址不能为空", t);
		return false;
	}
	return true;
}
</script><?php }} ?>