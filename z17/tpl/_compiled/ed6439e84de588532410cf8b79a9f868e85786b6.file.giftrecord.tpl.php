<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:32
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\giftrecord.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23632532e896025bb82-17144614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed6439e84de588532410cf8b79a9f868e85786b6' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\giftrecord.tpl',
      1 => 1352863991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23632532e896025bb82-17144614',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'skeyword' => 0,
    'giftrecord' => 0,
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
  'unifunc' => 'content_532e8960452036_10975707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e8960452036_10975707')) {function content_532e8960452036_10975707($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>赠送记录</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord">赠送记录</a></p></div>
  <div class="main-cont">
    <h3 class="title">赠送记录</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord" />
	  <div class="item">
		<label>赠言&nbsp;&nbsp;</label><input type="text" id="skeyword" name="skeyword" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value="搜索" />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="12%"><div class="th-gap">赠送人</div></th>
		<th width="15%"><div class="th-gap">接收人</div></th>
		<th width="15%"><div class="th-gap">礼物</div></th>
		<th width="10%"><div class="th-gap">赠送时间</div></th>
		<th width="7%"><div class="th-gap">查看</div></th>
		<th><div class="th-gap">赠言</div></th>
		<th width='13%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['giftrecord']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
</td>
		<td><a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fromuserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['fusername'];?>
</a></td>
		<td><a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['touserid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['tusername'];?>
</a></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['giftname'];?>
<img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['imgurl'];?>
" /></td>
		<td align="center" title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtimeline'],"%H:%M:%S");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['sendtimeline'],"%Y/%m/%d");?>
</td>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['viewstatus']=='1'){?>
		<font color="green">已查看</font>
		<?php }else{ ?>
		<font color="#999999">未查看</font>
		<?php }?>
		</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['message'];?>
</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">修改</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['recordid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
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

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：交友管理<span>&gt;&gt;</span>礼物管理<span>&gt;&gt;</span>编辑赠送记录</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑赠送记录</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=giftrecord&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_1' width='15%'>赠送人 <span class="f_red"></span> </td>
		<td class='hback' width='85%'><?php echo $_smarty_tpl->tpl_vars['giftrecord']->value['fusername'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>接收人 <span class="f_red"></span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['giftrecord']->value['tusername'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_1'>礼物信息 <span class="f_red"></span> </td>
		<td class='hback'>
		<?php echo $_smarty_tpl->tpl_vars['giftrecord']->value['giftname'];?>
<br />
		<img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['giftrecord']->value['imgurl'];?>
" />
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠送时间 <span class="f_red"></span> </td>
		<td class='hback'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['giftrecord']->value['sendtimeline'],"%Y-%m-%d %H:%M:%S");?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>查看状态<span class="f_red"></span> </td>
		<td class='hback'>
		<?php if ($_smarty_tpl->tpl_vars['giftrecord']->value['viewstatus']=='1'){?>
		<font color="green">已查看</font>
		<?php }else{ ?>
		<font color="#999999">未查看</font>
		<?php }?>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>赠 言 <span class="f_red"></span> </td>
		<td class='hback'><textarea name="message" id="message" style="width:60%;height:80px;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['giftrecord']->value['message'];?>
</textarea>  <span id='dmessage' class='f_red'></span></td>
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
</html><?php }} ?>