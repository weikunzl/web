<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:11:11
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\points.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17160532e890f6aa5c8-55652791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfcc2091b63f085d5eb47b45c5402e8eccf35ced' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\points.tpl',
      1 => 1351051595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17160532e890f6aa5c8-55652791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'fromtype' => 0,
    'a' => 0,
    'cpfile' => 0,
    'suserid' => 0,
    'susername' => 0,
    'stext' => 0,
    'sdate' => 0,
    'edate' => 0,
    'points' => 0,
    'volist' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e890f810255_14232930',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e890f810255_14232930')) {function content_532e890f810255_14232930($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>积分记录</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['fromtype']->value=='jdbox'){?>
<?php }else{ ?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
<?php }?>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['fromtype']->value=='jdbox'){?>
<?php }else{ ?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=points">积分记录</a></p></div>
  <div class="main-cont">
    <h3 class="title">积分记录</h3>

	<div class="search-area2">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=points" />
	  <div class="item">
	  <label>会员ID&nbsp;</label><input type="text" name="suserid" id="suserid" value="<?php if ($_smarty_tpl->tpl_vars['suserid']->value>0){?><?php echo $_smarty_tpl->tpl_vars['suserid']->value;?>
<?php }?>" class="input-s" />&nbsp;
	  <label>会员名称&nbsp;</label><input type="text" name="susername" id="susername" value="<?php echo $_smarty_tpl->tpl_vars['susername']->value;?>
" class="input-s" />&nbsp;
	  <label>操作记录&nbsp;</label><input type="text" name="stext" id="stext" value="<?php echo $_smarty_tpl->tpl_vars['stext']->value;?>
" class="input-s" />&nbsp;
      <label>操作时间&nbsp;</label><input type="text" name="sdate" id="sdate" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
"  readonly onClick="WdatePicker();" class="input-s" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<?php echo $_smarty_tpl->tpl_vars['edate']->value;?>
"  readonly onClick="WdatePicker();" class="input-s" />&nbsp;
	  &nbsp;&nbsp;&nbsp;<input type="submit" class="button_s" value="搜索" />
      </div>
	  </form>
	</div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">会员ID</div></th>
		<th width="15%"><div class="th-gap">会员名称</div></th>
		<th width="17%"><div class="th-gap">操作时间</div></th>
		<th width="10%"><div class="th-gap">增加</div></th>
		<th width="10%"><div class="th-gap">减少</div></th>
		<th><div class="th-gap">操作记录</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['points']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
</td>
		<td><a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></td>
		<td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="center"><?php if ($_smarty_tpl->tpl_vars['volist']->value['actiontype']==1){?><font color='green'><?php echo $_smarty_tpl->tpl_vars['volist']->value['points'];?>
</font><?php }?></td>
		<td align="left"><?php if ($_smarty_tpl->tpl_vars['volist']->value['actiontype']==2){?><font color='red'><?php echo $_smarty_tpl->tpl_vars['volist']->value['points'];?>
</font><?php }?></td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['logcontent'];?>
</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="6" align="center">暂无信息</td>
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
  
  <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=points&a=add">添加积分记录</a></p></div>
  <?php }?>

  <div class="main-cont">
    
	<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=points" class="btn-general"><span>返回列表</span></a>添加积分记录</h3>
	<?php }?>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=points&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
		<td class='hback_c3' width='15%'>会员ID <span class="f_red"></span> </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
 </td>
		<td class='hback_c3' width='15%'>会员名称 <span class="f_red"></span> </td>
		<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_c3'>剩余积分 <span class="f_red"></span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['points'];?>
 </td>
		<td class='hback_c3'>现金余额 <span class="f_red"></span> </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
 </td>
	  </tr>
	  <tr>
		<td class='hback_c3'>现金去向 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <select name="actiontype" id="actiontype">
		  <option value=''>请选择</option>
		  <option value='1'>增加</option>
		  <option value='2'>减少</option>
		  </select>
		  <span id='dactiontype' class='f_red'></span> 
		</td>
		<td class='hback_c3'>操作积分 <span class="f_red">*</span> </td>
		<td class='hback'><input type="text" name="points" id="points" class="input-s" /><span id='dpoints' class='f_red'></span> (填写数字,最多2位小数.)
		</td>
	  </tr>
	  <tr>
		<td class='hback_c3'>关联订单号 <span class="f_red"></span> </td>
		<td class='hback'><input type="text" name="ordernum" id="ordernum" class="input-150" />  <span id='dordernum' class='f_red'></span><br /> </td>
		<td class='hback_c3'>操作记录 <span class="f_red">*</span></td>
		<td class='hback'><textarea name="logcontent" id="logcontent" style="width:95%;height:80px;display:;overflow:auto;"></textarea><br /><span id='dlogcontent' class='f_red'></span> 描述下增加/减少积分的原因</td>
	  </tr>
	  <tr>

	  </tr>
	  <tr>
		<td class='hback_none' colspan="4" align="center"><input type="submit" name="btn_save" class="button" value="确定保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['fromtype']->value=='jdbox'){?>
<?php }else{ ?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
<?php }?>
</body>
</html>
<script type="text/javascript">
function checkform() {
	var t = "";
	var v = "";

	t = "actiontype";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("积分去向不能为空", t);
		return false;
	}

	t = "points";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("操作积分不能为空", t);
		return false;
	}

	t = "logcontent";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("操作记录不能为空", t);
		return false;
	}

	return true;
}
</script>
<?php }} ?>