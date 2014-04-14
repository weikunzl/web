<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:35
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\diary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11375532e89636754b8-33546120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6e7c9795ea7ed6c2cda05f56bb951bb215ad1f3' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\diary.tpl',
      1 => 1390700459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11375532e89636754b8-33546120',
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
    'suserid' => 0,
    'stype' => 0,
    'diary' => 0,
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
  'unifunc' => 'content_532e8963856fd5_18569132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8963856fd5_18569132')) {function content_532e8963856fd5_18569132($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>日记列表</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary">日记列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&a=add" class="btn-general"><span>发布日记</span></a>日记列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary" />
	  <div class="item">
	    <label>分类&nbsp;</label><?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
&nbsp;&nbsp;
		<label>标题&nbsp;</label><input type="text" id="stitle" name="stitle" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['stitle']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<label>会员ID&nbsp;</label><input type="text" id="suserid" name="suserid" class="input-100" value="<?php if ($_smarty_tpl->tpl_vars['suserid']->value>0){?><?php echo $_smarty_tpl->tpl_vars['suserid']->value;?>
<?php }?>" />&nbsp;&nbsp;&nbsp;
		<label>状态&nbsp;</label><select name="stype" id="stype">
		<option value=''></option>
		<option value='audit'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='audit'){?> selected<?php }?>>待审核</option>
		<option value='audited'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='audited'){?> selected<?php }?>>已审核</option>
		</select>&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="13%"><div class="th-gap">会员</div></th>
		<th width="8%"><div class="th-gap">分类</div></th>
		<th width="22%"><div class="th-gap">标题</div></th>
		<th width="8%"><div class="th-gap">浏览</div></th>
		<th width="6%"><div class="th-gap">评论</div></th>
		<th width="6%"><div class="th-gap">状态</div></th>
		<th width="6%"><div class="th-gap">推荐</div></th>
		<th width="12%"><div class="th-gap">发布时间</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
</td>
		<td><a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a> (<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
)</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
</td>
		<td><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=diary&a=detail&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['volist']->value['thumbfiles']!=''){?><font color='blue'>图文</font><?php }?></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['hits'];?>
</td>
		<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diarycomment&sdid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['cmcount'];?>
</a></td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['elite']==0){?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" value="eliteopen" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" value="eliteclose" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
');" style="cursor:pointer;">	
		<?php }?>
		</td>
		<td align="center" title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%H:%M:%S");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d");?>
</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-set">编辑</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){return true;} return false;}" class="icon-del">删除</a>
		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="10" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="9"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&a=add">发布日记</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary" class="btn-general"><span>返回列表</span></a>发布日记</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>会员ID <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="userid" id="userid" class="input-80" /> <span id='duserid' class='f_red'></span> <span id='dusername' class='f_red'></span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_user_search('userid', 'dusername');">选择会员</a>  </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'>
		<?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
 <span id='dcatid' class='f_red'></span> &nbsp;&nbsp;
		
		天气：<?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'weather','name'=>'weather'),$_smarty_tpl);?>
&nbsp;&nbsp;
		心情：<?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'feel','name'=>'feel'),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记标题 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" />  <span id='dtitle' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图文地址 <span class="f_red"></span> </td>
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
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" /> (自动生成) <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc"></span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>浏览次数 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="hits" id="hits" class="input-s" />  <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>属性设置 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type="checkbox" name="flag" id="flag" value="1" checked />审核，<input type="checkbox" name="elite" id="elite" value="1" />推荐，<input type="checkbox" name="diaryopen" id="diaryopen" value="1" checked />公开
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记内容 <span class="f_red">*</span> </td>
		<td class='hback'><textarea name="content" id="content" style="width:70%;height:150px;overflow:auto;"></textarea>  <br /><span id='dcontent' class='f_red'></span></td>
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
  <div class="path"><p>当前位置：内容管理<span>&gt;&gt;</span>日记管理<span>&gt;&gt;</span>编辑日记</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑日记</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=diary&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>会员ID <span class="f_red">*</span> </td>
		<td class='hback' width='85%'><input type="text" name="userid" id="userid" class="input-80" value="<?php echo $_smarty_tpl->tpl_vars['diary']->value['userid'];?>
" /> <span id='duserid' class='f_red'></span> <span id='dusername' class='f_red'><?php echo $_smarty_tpl->tpl_vars['diary']->value['username'];?>
</span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="tbox_user_search('userid', 'dusername');">选择会员</a>  </td>
	  </tr>
	  <tr>
		<td class='hback_1'>所属分类 <span class="f_red">*</span> </td>
		<td class='hback'>
		<?php echo $_smarty_tpl->tpl_vars['category_select']->value;?>
 <span id='dcatid' class='f_red'></span> &nbsp;&nbsp;
		
		天气：<?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'weather','name'=>'weather','value'=>$_smarty_tpl->tpl_vars['diary']->value['weather']),$_smarty_tpl);?>
&nbsp;&nbsp;
		心情：<?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'feel','name'=>'feel','value'=>$_smarty_tpl->tpl_vars['diary']->value['feel']),$_smarty_tpl);?>

		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记标题 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="title" id="title" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['diary']->value['title'];?>
" />  <span id='dtitle' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>图文地址 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="uploadfiles" id="uploadfiles" class="input-txt"  value="<?php echo $_smarty_tpl->tpl_vars['diary']->value['uploadfiles'];?>
" /> <span id='duploadfiles' class='f_red'></span></td>
			  <td>
			  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=uploadfiles&thumbinput=thumbfiles&multipart=sf_upload&previewid=previewsrc'></iframe>
			  </td>
			</tr>
		  </table>
		  上传图片只支持：gif,jpeg,jpg,png格式
	    </td>
	  </tr>
	  <tr>
		<td class='hback_1'>缩略图 <span class="f_red"></span> </td>
		<td class='hback'>
		  <table border="0" cellspacing="0" cellpadding="0">
		    <tr>
			  <td><input type="text" name="thumbfiles" id="thumbfiles" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['diary']->value['thumbfiles'];?>
" /> (自动生成) <span id='dthumbfiles' class='f_red'></span> </td>
			  <td><span id="previewsrc">
				<?php if (!empty($_smarty_tpl->tpl_vars['diary']->value['thumbfiles'])){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['diary']->value['thumbfiles'];?>
" width="60px" height="60px" border="0" />
				<?php }?>
			  </span></td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>浏览次数 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="hits" id="hits" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['diary']->value['hits'];?>
" />  <span id='dhits' class='f_red'></span></td>
	  </tr>
	  <tr>
		<td class='hback_1'>属性设置 <span class="f_red"></span> </td>
		<td class='hback'>
		<input type="checkbox" name="flag" id="flag" value="1"<?php if ($_smarty_tpl->tpl_vars['diary']->value['flag']=='1'){?> checked<?php }?> />审核，<input type="checkbox" name="elite" id="elite" value="1"<?php if ($_smarty_tpl->tpl_vars['diary']->value['elite']=='1'){?> checked<?php }?> />推荐，<input type="checkbox" name="diaryopen" id="diaryopen" value="1"<?php if ($_smarty_tpl->tpl_vars['diary']->value['diaryopen']=='1'){?> checked<?php }?> />公开
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>日记内容 <span class="f_red">*</span> </td>
		<td class='hback'><textarea name="content" id="content" style="width:70%;height:150px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['diary']->value['content'];?>
</textarea>  <br /><span id='dcontent' class='f_red'></span></td>
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

	t = "userid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请填写所属会员ID", t);
		$('#'+t).focus();
		return false;
	}

	t = "catid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所属分类", t);
		$('#'+t).focus();
		return false;
	}

	t = "title";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("日记标题不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "content";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("日记内容不能为空", t);
		$('#'+t).focus();
		return false;
	}

	return true;
}
</script>
<?php }} ?>