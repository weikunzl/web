<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:30
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\gift.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26882532e895e11c066-22015126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19b27bfce916da796c53f365d5093c6c3f246850' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\gift.tpl',
      1 => 1350273228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26882532e895e11c066-22015126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'category_select' => 0,
    'sname' => 0,
    'gift' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'urlitem' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'comeurl' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e895e293b99_89951295',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e895e293b99_89951295')) {function content_532e895e293b99_89951295($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>礼物信息</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift">礼物信息</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&a=add" class="btn-general"><span>添加礼物</span></a>礼物信息</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift" />
	  <div class="item">
	    <label>所属分类&nbsp;&nbsp;</label><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
&nbsp;&nbsp;
		<label>礼物名称&nbsp;&nbsp;</label><input type="text" id="sname" name="sname" size="20" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['sname']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="12%"><div class="th-gap">所属分类</div></th>
		<th width="15%"><div class="th-gap">礼物名称</div></th>
		<th width="15%"><div class="th-gap">礼物图片</div></th>
		<th width="10%"><div class="th-gap">所需积分</div></th>
		<th width="7%"><div class="th-gap">状态</div></th>
		<th width="7%"><div class="th-gap">推荐</div></th>
		<th width="11%"><div class="th-gap">添加日期</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
</td>
		<td align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['imgurl'];?>
" /></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['points'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['elite']==0){?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" value="eliteopen" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" value="eliteclose" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center" title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%H:%M:%S");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d");?>
</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-set">设置</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['giftid'];?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
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
		<td class="hback" colspan="8"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&a=add">添加礼物</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift" class="btn-general"><span>返回列表</span></a>添加礼物</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
 <span id='dcatid' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="giftname" id="giftname" class="input-200" />  <span id='dgiftname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物图片 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="imgurl" id="imgurl" class="input-txt"  /> <span id="dimgurl"></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=gift&uploadinput=imgurl&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片预览 <span class="f_red"></span> </td>
		<td class='hback'><span id="previewsrc"></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>状 态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1" checked />开启，<input type="radio" name="flag" id="flag" value="0" />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>推 荐 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="elite" id="elite" value="1" />开启，<input type="radio" name="elite" id="elite" value="0" checked />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>所需积分 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="points" id="points" class="input-100" /> <font color="#999999">(不填写表示免费)</font>  <span id='dpoints' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠 言 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dintro' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span>编辑礼物</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑礼物</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=gift&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
 <span id='dcatid' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物名称 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="giftname" id="giftname" class="input-200" value="<?php echo $_smarty_tpl->tpl_vars['gift']->value['giftname'];?>
" />  <span id='dgiftname' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物图片 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="imgurl" id="imgurl" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['gift']->value['imgurl'];?>
" /> <span id="dimgurl"></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=gift&uploadinput=imgurl&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片预览 <span class="f_red"></span> </td>
		<td class='hback'><span id="previewsrc">
		<?php if (!empty($_smarty_tpl->tpl_vars['gift']->value['imgurl'])){?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['gift']->value['imgurl'];?>
" width="60px" height="60px" border="0" />
		<?php }?>
		</span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>状 态 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['gift']->value['flag']=='1'){?> checked<?php }?> />开启，<input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['gift']->value['flag']=='0'){?> checked<?php }?> />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>推 荐 <span class="f_red"></span> </td>
		<td class='hback'><input type="radio" name="elite" id="elite" value="1"<?php if ($_smarty_tpl->tpl_vars['gift']->value['elite']=='1'){?> checked<?php }?> />开启，<input type="radio" name="elite" id="elite" value="0"<?php if ($_smarty_tpl->tpl_vars['gift']->value['elite']=='0'){?> checked<?php }?> />关闭</td>
	  </tr>
	  <tr>
		<td class='hback_1'>所需积分 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="points" id="points" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['gift']->value['points'];?>
" /> <font color="#999999">(不填写表示免费)</font>  <span id='dpoints' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠 言 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['gift']->value['intro'];?>
</textarea>  <span id='dintro' class='f_red'></span></td>
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

	t = "catid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所属分类", t);
		return false;
	}

	t = "giftname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("礼物名称不能为空", t);
		return false;
	}

	t = "imgurl";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("礼物图片不能为空", t);
		return false;
	}

	return true;
}
</script>
<?php }} ?>