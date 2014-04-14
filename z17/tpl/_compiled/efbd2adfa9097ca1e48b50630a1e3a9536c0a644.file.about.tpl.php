<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:28
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27213532e895c961576-05533938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efbd2adfa9097ca1e48b50630a1e3a9536c0a644' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\about.tpl',
      1 => 1349659004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27213532e895c961576-05533938',
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
    'stitle' => 0,
    'about' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'urlitem' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
    'catid' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e895cb8ef82_88116824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e895cb8ef82_88116824')) {function content_532e895cb8ef82_88116824($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>单页内容</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about">单页列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&a=add" class="btn-general"><span>添加单页</span></a>单页列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about" />
	  <div class="item">
	    <label>分类&nbsp;</label><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
&nbsp;&nbsp;
		<label>名称&nbsp;</label><input type="text" id="stitle" name="stitle" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="12%"><div class="th-gap">所属分类</div></th>
		<th width="15%"><div class="th-gap">单页名称</div></th>
		<th width="8%"><div class="th-gap">排序</div></th>
		<th width="10%"><div class="th-gap">打开方式</div></th>
		<th width="10%"><div class="th-gap">链接类型</div></th>
		<th width="15%"><div class="th-gap">站外URL</div></th>
		<th width="10%"><div class="th-gap">导航显示</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['about']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</td>
		<td align="left"><a href="../index.php?c=about&a=detail&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['orders'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['target']=='1'){?><font color="green">本页面</font><?php }else{ ?><font color='blue'>新页面</font><?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['linktype']=='1'){?><font color="green">站内</font><?php }else{ ?><font color='blue'>站外</font><?php }?>
		</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['linkurl'];?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['navshow']==0){?>
			<input type="hidden" id="attr_navshow<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
" value="navshowopen" />
			<img id="navshow<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('navshow','<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_navshow<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
" value="navshowclose" />
			<img id="navshow<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('navshow','<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['abid'];?>
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


<?php if ($_smarty_tpl->tpl_vars['a']->value=='add'){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页内容<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&a=add">添加单页</a></p></div>
  <div class="main-cont">
	<h3 class="title">添加单页</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>单页标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" class="input-txt" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" /> <span id='dorders' class='f_red'></span><font color='#999999'> (数字越小越靠前 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>导航显示 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='navshow' id='navshow' value='1' />是，<input type='radio' name='navshow' id='navshow' value='2' checked />否<span id='dnavshow' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页简介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页图片 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"   /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=article&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>	
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页内容</td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan="2">SEO优化设置 </td>
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
		<td class='hback_yellow' colspan="2">个性化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='linktype' id='linktype' value='1' checked />站内，<input type='radio' name='linktype' id='linktype' value='2' />站外</td>
	  </tr>
	  <tr>
		<td class='hback_1'>站外URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="linkurl" id="linkurl" class="input-txt" />  <span id='dlinkurl' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='target' id='target' value='1' checked />本页，<input type='radio' name='target' id='target' value='2' />新页</td>
	  </tr>
	  <tr>
		<td class='hback_1'>指定模板文件 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="tplname" id="tplname" class="input-150" />.tpl 
		<span id='dtplname' class='f_red'></span>  &nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_templet('选择模板文件', 'tplname');">选择模板</a> <br /> <font color='#999999'>(模板文件无扩展名，并确保模板文件夹存在，不填写使用默认模板)</font></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>单页内容<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&a=edit&catid=<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">编辑单页</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑单页</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=about" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>单页标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['about']->value['title'];?>
" class="input-txt" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>排 序 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="orders" id="orders" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['about']->value['orders'];?>
" /> <span id='dorders' class='f_red'></span><font color='#999999'> (数字越小越靠前 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>导航显示 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='navshow' id='navshow' value='1'<?php if ($_smarty_tpl->tpl_vars['about']->value['navshow']=='1'){?> checked<?php }?> />是，<input type='radio' name='navshow' id='navshow' value='2'<?php if ($_smarty_tpl->tpl_vars['about']->value['navshow']=='2'){?> checked<?php }?> />否<span id='dnavshow' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页简介 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="intro" id="intro" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['about']->value['intro'];?>
</textarea>  <span id='dintro' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页图片 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['about']->value['uploadfiles'];?>
"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=article&uploadinput=uploadfiles&multipart=sf_upload'></iframe>
			  </td>
			</tr>
		  </table>	
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>单页内容</td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"><?php echo $_smarty_tpl->tpl_vars['about']->value['content'];?>
</textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		</td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan="2">SEO优化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" value="<?php echo $_smarty_tpl->tpl_vars['about']->value['metakeyword'];?>
" class="input-txt" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['about']->value['metadescription'];?>
</textarea>  <span id='dmetadescription' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_yellow' colspan="2">个性化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>链接方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='linktype' id='linktype' value='1'<?php if ($_smarty_tpl->tpl_vars['about']->value['linktype']=='1'){?> checked<?php }?> />站内，<input type='radio' name='linktype' id='linktype' value='2'<?php if ($_smarty_tpl->tpl_vars['about']->value['linktype']=='2'){?> checked<?php }?> />站外</td>
	  </tr>
	  <tr>
		<td class='hback_1'>站外URL <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="linkurl" id="linkurl" value="<?php echo $_smarty_tpl->tpl_vars['about']->value['linkurl'];?>
" class="input-txt" />  <span id='dlinkurl' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_1'>打开方式 <span class="f_red"></span> </td>
		<td class='hback'><input type='radio' name='target' id='target' value='1'<?php if ($_smarty_tpl->tpl_vars['about']->value['target']=='1'){?> checked<?php }?> />本页，<input type='radio' name='target' id='target' value='2'<?php if ($_smarty_tpl->tpl_vars['about']->value['target']=='2'){?> checked<?php }?> />新页</td>
	  </tr>
	  <tr>
		<td class='hback_1'>指定模板文件 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="tplname" id="tplname" value="<?php echo $_smarty_tpl->tpl_vars['about']->value['tplname'];?>
" class="input-150" />.tpl 
		<span id='dtplname' class='f_red'></span>  &nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_templet('选择模板文件', 'tplname');">选择模板</a> <br /> <font color='#999999'>(模板文件无扩展名，并确保模板文件夹存在，不填写使用默认模板)</font></td>
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
	var t = '';
	var v = '';

	t = 'catid';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('请选择所属分类', t);
		return false;
	}

	t = 'title';
	v = $('#'+t).val();
	if(v == '') {
		dmsg('标题不能为空', t);
		return false;
	}
	return true;
}
</script>
<?php }} ?>