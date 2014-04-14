<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:12:17
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\complaint.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32273532e8951ec5181-36697068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1feb720873a88c39e42ca218f5dbdcc42d7480a' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\complaint.tpl',
      1 => 1352446823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32273532e8951ec5181-36697068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'complaint' => 0,
    'volist' => 0,
    'page' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e89520d1093_71642602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e89520d1093_71642602')) {function content_532e89520d1093_71642602($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>系统日志</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：插件&应用<span>&gt;&gt;</span>扩展应用<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=complaint">举报管理</a></p></div>
  <div class="main-cont">
    <h3 class="title">举报管理</h3>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=complaint&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">ID</div></th>
		<th width="12%"><div class="th-gap">被举报的会员</div></th>
		<th width="10%"><div class="th-gap">举报类型</div></th>
		<th width="25%"><div class="th-gap">举报人信息</div></th>
		<th width="25%"><div class="th-gap">情况说明</div></th>
		<th width="10%"><div class="th-gap">处理状态</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['complaint']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
" onClick="checkItem(this, 'chkAll')"> <?php echo $_smarty_tpl->tpl_vars['volist']->value['id'];?>
</td>
		<td><a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['cpuid'];?>
')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['cpusername'];?>
</a></td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['cptype']==1){?>
		内容虚假
		<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['cptype']==2){?>
		色情服务
		<?php }else{ ?>
		这是骗子
		<?php }?>
        </td>
		<td>
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['fromuid']>0){?>
		<a href='javascript:void(0);' onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['fromuid'];?>
')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['fromusername'];?>
</a>
		<?php }?>
		电话:<?php echo $_smarty_tpl->tpl_vars['volist']->value['telephone'];?>
<br /> Email:<?php echo $_smarty_tpl->tpl_vars['volist']->value['email'];?>

        </td>
		<td><?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['volist']->value['content']);?>
</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==1){?>
		  <font color="red">已冻结</font>
		<?php }else{ ?>
		  <font color="#999999">未冻结</font>
		<?php }?>
		</td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==1){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=complaint&a=cancel&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['cpuid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">解除冻结</a>
		<?php }else{ ?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=complaint&a=dongjie&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['cpuid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">冻结账号</a>
		<?php }?>
		</td>
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
		<td align="left"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox">全选</td>
		<td class="hback" colspan="6"><input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定删除选定信息吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
</body>
</html>
<?php }} ?>