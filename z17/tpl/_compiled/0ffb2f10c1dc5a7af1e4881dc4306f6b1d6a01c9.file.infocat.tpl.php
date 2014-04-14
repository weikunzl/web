<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:25
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\infocat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2934532e8959c4f777-81967796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ffb2f10c1dc5a7af1e4881dc4306f6b1d6a01c9' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\infocat.tpl',
      1 => 1345621652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2934532e8959c4f777-81967796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'infocat' => 0,
    'volist' => 0,
    'page' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e8959d48085_08492798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8959d48085_08492798')) {function content_532e8959d48085_08492798($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>公告分类</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat">公告分类</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&a=add" class="btn-general"><span>添加分类</span></a>公告分类</h3>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择</div></th>
		<th width="20%"><div class="th-gap">分类名称</div></th>
		<th width="10%"><div class="th-gap">图标</div></th>
		<th width="10%"><div class="th-gap">CSS样式</div></th>
		<th width="10%"><div class="th-gap">排序</div></th>
		<th width="10%"><div class="th-gap">链接</div></th>
		<th width="10%"><div class="th-gap">公告</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infocat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</td>
		<td align="center"><?php if (empty($_smarty_tpl->tpl_vars['volist']->value['img'])){?><font color="#999999">无图标</font><?php }else{ ?><font color="green">有图标</font><?php }?></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['cssname'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['orders'];?>
</td>
		<td align="center"><?php if ($_smarty_tpl->tpl_vars['volist']->value['linktype']=='1'){?><font color='green'>站内</font><?php }else{ ?><font color='blue'>站外</font><?php }?></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['infocount'];?>
</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="icon-set">设置</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['catid'];?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="8" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="7"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&a=add">添加公告分类</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat" class="btn-general"><span>返回列表</span></a>添加公告分类</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>分类名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<input type="text" name="catname" id="catname" class="input-200" />  <span id='dcatname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'>
		<select name="target" id="target">
		<option value="1">本页面</option>
		<option value="2">新页面</option>
		</select>
		<span id='dtarget' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>CSS样式 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="cssname" id="cssname" class="input-100" />  <span id='dcssname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>分图标类 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="img" id="img" class="input-txt"  /> <span id="dimg"></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=article&uploadinput=img&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>简 介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" class="input-txt" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dmetadescription' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接方式 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type='radio' name='linktype' id='linktype' value='1' checked />站内，
		<input type='radio' name='linktype' id='linktype' value='2' />站外
		<span id='dlinketype' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>站外URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="linkurl" id="linkurl" class="input-txt" /> <font color='#999999'>(如果是站外连接请填写URL)</font> <span id='dlinkurl' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告管理<span>&gt;&gt;</span>编辑公告分类</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑公告分类</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=infocat&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>分类名称 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'>
		<input type="text" name="catname" id="catname" class="input-200" value="<?php echo $_smarty_tpl->tpl_vars['infocat']->value['catname'];?>
" />  <span id='dcatname' class='f_red'></span> 
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['infocat']->value['orders'];?>
" />  <span id='dorders' class='f_red'></span> （数字越小越靠前）</td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'>
		<select name="target" id="target">
		<option value="1"<?php if ($_smarty_tpl->tpl_vars['infocat']->value['target']=='1'){?> selected<?php }?>>本页面</option>
		<option value="2"<?php if ($_smarty_tpl->tpl_vars['infocat']->value['target']=='2'){?> selected<?php }?>>新页面</option>
		</select>
		<span id='dtarget' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>CSS样式 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="cssname" id="cssname" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['infocat']->value['cssname'];?>
" />  <span id='dcssname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>分图标类 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="img" id="img" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['infocat']->value['img'];?>
" /> 
			  <span id="dimg"></span>
			  </td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=article&uploadinput=img&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>简 介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['infocat']->value['intro'];?>
</textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['infocat']->value['metakeyword'];?>
" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['infocat']->value['metadescription'];?>
</textarea>  <span id='dmetadescription' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接方式 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type='radio' name='linktype' id='linktype' value='1'<?php if ($_smarty_tpl->tpl_vars['infocat']->value['linktype']=='1'){?> checked<?php }?> />站内，
		<input type='radio' name='linktype' id='linktype' value='2'<?php if ($_smarty_tpl->tpl_vars['infocat']->value['linktype']=='2'){?> checked<?php }?> />站外
		<span id='dlinketype' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>站外URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="linkurl" id="linkurl" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['infocat']->value['linkurl'];?>
" />  <font color='#999999'>(如果是站外连接请填写URL)</font> <span id='dlinkurl' class='f_red'></span></td>
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

	t = "catname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("分类名称不能为空", t);
		return false;
	}

	return true;
}
</script>
<?php }} ?>