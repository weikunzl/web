<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:26
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1399532e895ab1a348-62423088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fd006df670b212fe48929da92385cf29948a261' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\info.tpl',
      1 => 1352864021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1399532e895ab1a348-62423088',
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
    'info' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'page' => 0,
    'urlitem' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
    'timeline' => 0,
    'comeurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e895ac7b967_31293482',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e895ac7b967_31293482')) {function content_532e895ac7b967_31293482($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>公告内容</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info">公告列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&a=add" class="btn-general"><span>发布公告</span></a>公告列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info" />
	  <div class="item">
	    <label>分类&nbsp;</label><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
&nbsp;&nbsp;
		<label>标题&nbsp;</label><input type="text" id="stitle" name="stitle" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="13%"><div class="th-gap">分类</div></th>
		<th width="25%"><div class="th-gap">标题</div></th>
		<th width="10%"><div class="th-gap">浏览</div></th>
		<th width="6%"><div class="th-gap">图片</div></th>
		<th width="6%"><div class="th-gap">状态</div></th>
		<th width="6%"><div class="th-gap">推荐</div></th>
		<th width="12%"><div class="th-gap">发布时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</td>
		<td align="left"><a href="../index.php?c=info&a=detail&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['hits'];?>
</td>
		<td align="center">
		<?php if (!empty($_smarty_tpl->tpl_vars['volist']->value['thumbfiles'])){?>
		<font color="green">有</font>
		<?php }else{ ?>
		<font color="#999999">无</font>
		<?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
');" style="cursor:pointer;">	
		<?php }?>
        </td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['elite']==0){?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" value="eliteopen" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" value="eliteclose" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
');" style="cursor:pointer;">	
		<?php }?>
        </td>
		<td align="center" title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['addtime'],"%Y-%m-%d");?>
</td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">编辑</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['infoid'];?>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告内容<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&a=add">添加公告</a></p></div>
  <div class="main-cont">
	<h3 class="title">添加单页</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_c1' colspan="2">基本内容 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>公告标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" class="input-txt" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" /> <font color='#999999'>(自动生成)</font> <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc"></span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>摘要 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="summary" id="summary" style="width:50%;height:60px;overflow:auto;"></textarea>  <span id='dsummary' class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_1'>公告内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"></textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c2' colspan="2">SEO优化设置 </td>
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
		<td class='hback_c3' colspan="2">其他设置 </td>
	  </tr>
	  <tr>
	    <td class='hback_1'>浏览次数 <span class='f_red'></span></td>
		<td><input type='text' name='hits' id='hits' class='input-s' /> <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>推 荐 <span class='f_red'></span></td>
		<td><input type="radio" name="elite" id="elite" value="1" />是，<input type="radio" name="elite" id="elite" value="0" checked />否</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>状 态 <span class='f_red'></span></td>
		<td><input type="radio" name="flag" id="flag" value="1" checked />正常，<input type="radio" name="flag" id="flag" value="0" />锁定</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>发布时间 <span class='f_red'></span></td>
		<td><input type="text" name="addtime" id="addtime" class="input-150" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['timeline']->value,"%Y-%m-%d %H:%M:%S");?>
" /> <span id='daddtime' class='f_red'></span> 当前时间为：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['timeline']->value,"%Y-%m-%d %H:%M:%S");?>
 注意不要改变格式。</td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>公告内容<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">编辑公告</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑公告</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=info" onsubmit="return checkform();" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_c1' colspan="2">基本内容 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
  <span id='dcatid' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>公告标题 <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="title" id="title" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
" /> <span id='dtitle' class='f_red'></span><font color='#999999'> (标题长度不能大于255个任意字符 )</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图片地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['uploadfiles'];?>
" /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  <font color='#999999'>上传图片只支持：gif,jpeg,jpg,png格式</font>
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['thumbfiles'];?>
" /> <font color='#999999'>(自动生成)</font> <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc"></span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>摘要 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="summary" id="summary" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['info']->value['summary'];?>
</textarea>  <span id='dsummary' class='f_red'></span></td>
	  </tr>

	  <tr>
		<td class='hback_1'>公告内容 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <textarea name="content" id="content" style="width:98%;height:250px;display:none;"><?php echo $_smarty_tpl->tpl_vars['info']->value['content'];?>
</textarea>
		  <script>var editor;KindEditor.ready(function(K) {editor = K.create('#content'); });</script>
		  <span id='dcontent' class='f_red'></span>
		</td>
	  </tr>
	  <tr>
		<td class='hback_c2' colspan="2">SEO优化设置 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta关键字 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="metakeyword" id="metakeyword" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['metakeyword'];?>
" /> <span id='dmetakeyword' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>Meta描述 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="metadescription" id="metadescription" style="width:50%;height:60px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['info']->value['metadescription'];?>
</textarea>  <span id='dmetadescription' class='f_red'></span> </td>
	  </tr>
	  <tr>
		<td class='hback_c3' colspan="2">其他设置 </td>
	  </tr>
	  <tr>
	    <td class='hback_1'>浏览次数 <span class='f_red'></span></td>
		<td><input type='text' name='hits' id='hits' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['info']->value['hits'];?>
" /> <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>推 荐 <span class='f_red'></span></td>
		<td><input type="radio" name="elite" id="elite" value="1"<?php if ($_smarty_tpl->tpl_vars['info']->value['elite']=='1'){?> checked<?php }?> />是，<input type="radio" name="elite" id="elite" value="0"<?php if ($_smarty_tpl->tpl_vars['info']->value['elite']=='0'){?> checked<?php }?> />否</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>状 态 <span class='f_red'></span></td>
		<td><input type="radio" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['info']->value['flag']=='1'){?> checked<?php }?> />正常，<input type="radio" name="flag" id="flag" value="0"<?php if ($_smarty_tpl->tpl_vars['info']->value['flag']=='0'){?> checked<?php }?> />锁定</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>发布时间 <span class='f_red'></span></td>
		<td><input type="text" name="addtime" id="addtime" class="input-150" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
" /> <span id='daddtime' class='f_red'></span> <font color="#999999"> 注意不要改变格式。</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>指定模板文件 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="tplname" id="tplname" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['tplname'];?>
" />.tpl 
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
	var t = "";
	var v = "";

	t = "catid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择分类", t);
		$('#'+t).focus();
		return false;
	}

	t = "title";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "content";
	v = editor.text();
	if(editor.isEmpty()) {
		dmsg("内容不能为空", t);
		editor.focus();
		return false;
	}
	return true;
}

</script><?php }} ?>