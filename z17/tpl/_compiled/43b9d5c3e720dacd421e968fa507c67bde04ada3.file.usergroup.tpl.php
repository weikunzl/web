<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:02:47
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14991532e871757af88-93704116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b9d5c3e720dacd421e968fa507c67bde04ada3' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\usergroup.tpl',
      1 => 1378372079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14991532e871757af88-93704116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'a' => 0,
    'cpfile' => 0,
    'usergroup' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'val' => 0,
    'page' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e87177ce186_29703847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e87177ce186_29703847')) {function content_532e87177ce186_29703847($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>会员组设置</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup">会员组设置</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&a=add" class="btn-general"><span>添加会员组</span></a>会员组设置</h3>

	<div class="search-area5">
	  <div class="item">
	  <font color="green"><b>温馨提示：</b></font>
	  必须保留ID=1的普通会员组。
	  </div>
	</div>


	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&a=del" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">ID</div></th>
		<th width="10%"><div class="th-gap">组名</div></th>
		<th width="10%"><div class="th-gap">登录积分</div></th>
		<th width="10%"><div class="th-gap">男标识</div></th>
		<th width="10%"><div class="th-gap">女标识</div></th>
		<th width="7%"><div class="th-gap">排序</div></th>
		<th><div class="th-gap">收费设置</div></th>
		<th width="12%"><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['groupid']==1){?>
		<?php }else{ ?>
		<input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
" onClick="checkItem(this, 'chkAll')">
		<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['groupname'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['loginpoints'];?>
</td>
		<td align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['maleimg'];?>
" /></td>
		<td align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['femaleimg'];?>
" /></td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['orders'];?>
</td>
		<td align="left">
		<?php if (!empty($_smarty_tpl->tpl_vars['volist']->value['commer'])){?>
		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['volist']->value['commer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
		类别<?php echo $_smarty_tpl->tpl_vars['val']->value['orders'];?>
：<?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
天，<?php echo $_smarty_tpl->tpl_vars['val']->value['money'];?>
现金(金币)，赠送<?php echo $_smarty_tpl->tpl_vars['val']->value['points'];?>
分
		<br />
		<?php } ?>
		<?php }?>
		</td>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="icon-edit">编辑</a>&nbsp;&nbsp;
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['groupid']==1){?>
		<?php }else{ ?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复。')){return true;} return false;}" class="icon-del">删除</a>
		<?php }?>

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
		<td class="hback" colspan="7"><input class="button" name="btn_del" type="button" value="删 除" onClick="{if(confirm('确定删除选定信息吗!?')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
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
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&a=add">添加会员组</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup" class="btn-general"><span>返回列表</span></a>添加会员组</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveadd" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td colspan="4" class="hback_c1" align="center"><b>基本信息</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>组 名 称 <span class="f_red">*</span> </td>
		<td class='hback' width='35%'><input type="text" name="groupname" id="groupname" class="input-150" /> <span id='dgroupname' class='f_red'></span> </td>
		<td class='hback_1' width='15%'>组 排 序 <span class="f_red">*</span> </td>
		<td class='hback' width='35%'><input type="text" name="orders" id="orders" class="input-s" />  <span id='dorders' class='f_red'></span> <font color="#999999">（数字越小越靠前）</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>男 标 识<span class="f_red">*</span> </td>
		<td class='hback'>
		  <input type="text" name="maleimg" id="maleimg" class="input-txt"  /> <span id='dmaleimg' class='f_red'></span>
		  <br />
		  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=maleimg&multipart=sf_upload'></iframe>
		</td>
		<td class='hback_1'>女 标 识 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <input type="text" name="femaleimg" id="femaleimg" class="input-txt"  /> <span id='dfemaleimg' class='f_red'></span>
		  <br />
		  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=femaleimg&multipart=sf_upload'></iframe>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>设 置 </td>
		<td class='hback' colspan="3">
		<!--
		注册赠送积分：<input type="text" name="regpoints" id="regpoints" class="input-s" />
		注册赠送现金(金币)：<input type="text" name="regmoney" id="regmoney" class="input-s" />
		-->
		每天登录积分：<input type="text" name="loginpoints" id="loginpoints" class="input-s" />
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>组 简 介 </td>
		<td class='hback' colspan="3"><textarea name="intro" id="intro" style="width:50%;height:80px;display:;overflow:auto;"></textarea></td>
	  </tr>
	  <tr>
	    <td colspan="4" class="hback_c2" align="center"><b>收费设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收费类别 <span class="f_red"></span> </td>
		<td class='hback' colspan="3">
		  <input name='itemmaxsort' id='itemmaxsort' type='hidden' value='0' /> <span id='ditemmaxsort' class='f_red'></span>
		  <table border='0' cellpadding='0' cellspacing='0' class='table'>
		    <tr id="list-top">
			  <td class='hback_1' align="center" width='10%'>序号</td>
			  <td class='hback_1' align="center" width='10%'>排序</td>
			  <td class='hback_1' align="center" width='18%'>有效天数</td>
			  <td class='hback_1' align="center" width='18%'>需要现金(金币)</td>
			  <td class='hback_1' align="center" width='18%'>赠送积分</td>
			  <td class='hback_1' align="center" width='18%'>赠送短信</td>
			  <td class='hback_1' align="center">操作</td>
			</tr>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' align='right'><a href="javascript:void(0);" onclick="return commersetting_add($(this));">添加收费类别</a></td>
		<td class='hback_none' colspan="3"><span id="load_itemtips"></span> &nbsp;&nbsp;</td>
	  </tr>
	  <tr>
	    <td colspan="4" class="hback_c3" align="center"><b>权限设置</b></td>
	  </tr>

	  <tr>
		<td class='hback_1'>信件设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		每天给同性会员发信件数量 &nbsp;&nbsp;
		<input type='radio' name='txsendlimit' id='txsendlimit' value='0' checked />不限，
		<input type='radio' name='txsendlimit' id='txsendlimit' value='1' />限制 
		<input type="text" name="txsendnum" id="txsendnum" class="input-s" /> <font color="#999999">(限制请填写整数)</font><br />

		每天查看同性会员信件数量 &nbsp;&nbsp;
		<input type='radio' name='txviewlimit' id='txviewlimit' value='0' checked />不限，
		<input type='radio' name='txviewlimit' id='txviewlimit' value='1' />限制 
		<input type="text" name="txviewnum" id="txviewnum" class="input-s" /> <font color="#999999">(限制请填写整数)</font><br />

		每天给异性会员发信件数量 &nbsp;&nbsp;
		<input type='radio' name='yxsendlimit' id='yxsendlimit' value='0' checked />不限，
		<input type='radio' name='yxsendlimit' id='yxsendlimit' value='1' />限制 
		<input type="text" name="yxsendnum" id="yxsendnum" class="input-s" /> <font color="#999999">(限制请填写整数)</font><br />

		每天查看异性会员信件数量 &nbsp;&nbsp;
		<input type='radio' name='yxviewlimit' id='yxviewlimit' value='0' checked />不限，
		<input type='radio' name='yxviewlimit' id='yxviewlimit' value='1' />限制 
		<input type="text" name="yxviewnum" id="yxviewnum" class="input-s" /> <font color="#999999">(限制请填写整数)</font><br />
		<input type='checkbox' name='msgistop' id='msgistop' value='1' /> 允许信件置顶
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>查看/操作权限 <span class='f_red'></span></td>
		<td class='hback' colspan="3" style="line-height:25px;">
		
		<input type='checkbox' name='viewlogintime' id='viewlogintime' value='1' />查看会员登录情况，
		<input type='checkbox' name='viewvisitor' id='viewvisitor' value='1' />查看最近访客 <br />
		<input type='checkbox' name='viewmatch' id='viewmatch' value='1' />查看速配结果，
		<input type='checkbox' name='useadvsearch' id='useadvsearch' value='1' />使用会员高级搜索，
		<input type='checkbox' name='viewonlineuser' id='viewonlineuser' value='1' />访问在线会员页，
		<br />
		<input type='checkbox' name='viewcontact' id='viewcontact' value='1' />查看会员联系方式：&gt;&gt;
		
		（<input type='checkbox' name='viewemail' id='viewemail' value='1' />邮箱，
		<input type='checkbox' name='viewmobile' id='viewmobile' value='1' />手机，
		<input type='checkbox' name='viewqq' id='viewqq' value='1' />QQ，
		<input type='checkbox' name='viewweibo' id='viewweibo' value='1' />微博，
		<input type='checkbox' name='viewmsn' id='viewmsn' value='1' />微信）<font color="red">括号里的为可显示的子项</font>
		
		
		</td>
	  </tr> 
	  <tr>
		<td class='hback_1'>照片设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		上传张数 <input type="radio" name='photolimit' id='photolimit' value='0' checked />不限，
		<input type="radio" name='photolimit' id='photolimit' value='1' />限制 
		<input type="text" name="photonum" id="photonum" class="input-s" /> <font color="#999999">(限制请填写整数)</font>
		</td>
	  </tr>     
	  <tr>
		<td class='hback_1'>好友设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		添加好友数 
		<input type='radio' name='friendlimit' id='friendlimit' value='0' checked />不限，
		<input type='radio' name='friendlimit' id='friendlimit' value='1' />限制
		<input type="text" name="friendnum" id="friendnum" class="input-s" />  <font color="#999999">(限制请填写整数)</font>&nbsp;&nbsp;
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>发布设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		<input type='checkbox' name='pubdiary' id='pubdiary' value='1' checked />发布日记，
		奖励积分：<input type="text" name="diarypoints" id="diarypoints" class="input-s" />，
		<input type='checkbox' name='pubcomment' id='pubcomment' value='1' checked />发表评论
		</td>
	  </tr>

	  <tr>
	    <td colspan="4" class="hback_c1" align="center"><b>扣费设置</b> （当无法满足以上权限时，可通过扣费方式获得相应权限，不开启扣费请设置为0）</td>
	  </tr>
	  <tr>
		<td class='hback_c2'>扣费项<br />（单位：元/金币） <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		查看联系方式：<input type='text' name='contactfee' id='contactfee' class='input-s' />，
		查看信件：<input type='text' name='viewmsgfee' id='viewmsgfee' class='input-s' />，
		写信件：<input type='text' name='sendmsgfee' id='sendmsgfee' class='input-s' />
		</td>
	  </tr>

	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none' colspan="3"><input type="submit" name="btn_save" class="button" value="添加保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>编辑会员组</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" class="btn-general"><span>返回列表</span></a>编辑会员组</h3>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=usergroup&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" onsubmit='return checkform();' />
    <input type="hidden" name="a" value="saveedit" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td colspan="4" class="hback_c1" align="center"><b>基本信息</b></td>
	  </tr>
	  <tr>
		<td class='hback_1' width='15%'>组 名 称 <span class="f_red">*</span> </td>
		<td class='hback' width='35%'><input type="text" name="groupname" id="groupname" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['groupname'];?>
" /> <span id='dgroupname' class='f_red'></span> </td>
		<td class='hback_1' width='15%'>组 排 序 <span class="f_red">*</span> </td>
		<td class='hback' width='35%'><input type="text" name="orders" id="orders" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['orders'];?>
" />  <span id='dorders' class='f_red'></span> <font color="#999999">（数字越小越靠前）</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>男 标 识<span class="f_red">*</span> </td>
		<td class='hback'>
		  <input type="text" name="maleimg" id="maleimg" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['maleimg'];?>
" /> <span id='dmaleimg' class='f_red'></span>
		  <br />
		  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=maleimg&multipart=sf_upload'></iframe>
		</td>
		<td class='hback_1'>女 标 识 <span class="f_red">*</span> </td>
		<td class='hback'>
		  <input type="text" name="femaleimg" id="femaleimg" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['femaleimg'];?>
" /> <span id='dfemaleimg' class='f_red'></span>
		  <br />
		  <iframe id='iframe_t' border='0' frameborder='0' scrolling='no' style="width:260px;height:25px;padding:0px;margin:0px;" src='<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=upload&formname=myform&module=upload&uploadinput=femaleimg&multipart=sf_upload'></iframe>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>设 置 </td>
		<td class='hback' colspan="3">
		<!--
		注册赠送积分：<input type="text" name="regpoints" id="regpoints" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['regpoints'];?>
" />
		注册赠送现金(金币)：<input type="text" name="regmoney" id="regmoney" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['regmoney'];?>
" />
		-->
		每天登录积分：<input type="text" name="loginpoints" id="loginpoints" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['loginpoints'];?>
" />
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>组 简 介 </td>
		<td class='hback' colspan="3"><textarea name="intro" id="intro" style="width:50%;height:80px;display:;overflow:auto;"><?php echo $_smarty_tpl->tpl_vars['usergroup']->value['intro'];?>
</textarea></td>
	  </tr>
	  <tr>
	    <td colspan="4" class="hback_c2" align="center"><b>收费设置</b></td>
	  </tr>
	  <tr>
		<td class='hback_1'>收费类别 <span class="f_red"></span> </td>
		<td class='hback' colspan="3">
		  <input name='itemmaxsort' id='itemmaxsort' type='hidden' value='<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['commer_num'];?>
' /> <span id='ditemmaxsort' class='f_red'></span>
		  <table border='0' cellpadding='0' cellspacing='0' class='table'>
		    <tr id="list-top">
			  <td class='hback_1' align="center" width='10%'>序号</td>
			  <td class='hback_1' align="center" width='10%'>排序</td>
			  <td class='hback_1' align="center" width='18%'>有效天数</td>
			  <td class='hback_1' align="center" width='18%'>需要现金(金币)</td>
			  <td class='hback_1' align="center" width='18%'>赠送积分</td>
			  <td class='hback_1' align="center" width='18%'>赠送短信</td>
			  <td class='hback_1' align="center">操作</td>
			</tr>
			<?php if (!empty($_smarty_tpl->tpl_vars['usergroup']->value['commer'])){?>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergroup']->value['commer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
			<tr class='itemlist' onMouseOver="overColor(this)" onMouseOut="outColor(this)">
			  <td class='hback' align='center'> 类别<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
</td>
			  <td class='hback' align='center'><input type='text' name='item_orders_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' id='item_orders_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['orders'];?>
" /></td>
			  <td class='hback' align='center'><input type='text' name='item_days_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' id='item_days_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
" /> 天</td>
			  <td class='hback' align='center'><input type='text' name='item_money_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' id='item_money_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['money'];?>
" /> 元</td>
			  <td class='hback' align='center'><input type='text' name='item_points_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' id='item_points_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['points'];?>
" /> 分</td>
			  <td class='hback' align='center'><input type='text' name='item_mbsms_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' id='item_mbsms_<?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['mbsms'];?>
" /> 条</td>
			  <td class='hback' align='center'><a href='javascript:void(0);' onclick='commersetting_countnums();commersetting_del($(this), <?php echo $_smarty_tpl->tpl_vars['val']->value['i'];?>
);'>移除</a></td>
			</tr>
			<?php } ?>
			<?php }?>
		  </table>
		</td>
	  </tr>
	  <tr>
		<td class='hback_none' align='right'><a href="javascript:void(0);" onclick="return commersetting_add($(this));">添加收费类别</a></td>
		<td class='hback_none' colspan="3"><span id="load_itemtips"></span> &nbsp;&nbsp;</td>
	  </tr>
	  <tr>
	    <td colspan="4" class="hback_c3" align="center"><b>权限设置</b></td>
	  </tr>

	  <tr>
		<td class='hback_1'>信件设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		每天给同性会员发信件数量 &nbsp;&nbsp;
		<input type='radio' name='txsendlimit' id='txsendlimit' value='0'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['txsendlimit']=='0'){?>  checked<?php }?> />不限，
		<input type='radio' name='txsendlimit' id='txsendlimit' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['txsendlimit']=='1'){?>  checked<?php }?> />限制 
		<input type="text" name="txsendnum" id="txsendnum" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['msg']['txsendnum'];?>
" /> <font color="#999999">(限制请填写整数)</font><br />

		每天查看同性会员信件数量 &nbsp;&nbsp;
		<input type='radio' name='txviewlimit' id='txviewlimit' value='0'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['txviewlimit']=='0'){?>  checked<?php }?> />不限，
		<input type='radio' name='txviewlimit' id='txviewlimit' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['txviewlimit']=='1'){?>  checked<?php }?> />限制 
		<input type="text" name="txviewnum" id="txviewnum" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['msg']['txviewnum'];?>
" /> <font color="#999999">(限制请填写整数)</font><br />

		每天给异性会员发信件数量 &nbsp;&nbsp;
		<input type='radio' name='yxsendlimit' id='yxsendlimit' value='0'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['yxsendlimit']=='0'){?>  checked<?php }?> />不限，
		<input type='radio' name='yxsendlimit' id='yxsendlimit' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['yxsendlimit']=='1'){?>  checked<?php }?> />限制 
		<input type="text" name="yxsendnum" id="yxsendnum" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['msg']['yxsendnum'];?>
" /> <font color="#999999">(限制请填写整数)</font><br />

		每天查看异性会员信件数量 &nbsp;&nbsp;
		<input type='radio' name='yxviewlimit' id='yxviewlimit' value='0'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['yxviewlimit']=='0'){?>  checked<?php }?> />不限，
		<input type='radio' name='yxviewlimit' id='yxviewlimit' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['yxviewlimit']=='1'){?>  checked<?php }?> />限制 
		<input type="text" name="yxviewnum" id="yxviewnum" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['msg']['yxviewnum'];?>
" /> <font color="#999999">(限制请填写整数)</font><br />
		<input type='checkbox' name='msgistop' id='msgistop' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['msg']['msgistop']=='1'){?> checked<?php }?> /> 允许信件置顶
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>查看/操作权限 <span class='f_red'></span></td>
		<td class='hback' colspan="3" style="line-height:25px;">
		<input type='checkbox' name='viewlogintime' id='viewlogintime' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewlogintime']=='1'){?> checked<?php }?> />查看会员登录情况，
		<input type='checkbox' name='viewvisitor' id='viewvisitor' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewvisitor']=='1'){?> checked<?php }?> />查看最近访客<br /> 
		<input type='checkbox' name='viewmatch' id='viewmatch' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewmatch']=='1'){?> checked<?php }?> />查看速配结果，

		<input type='checkbox' name='useadvsearch' id='useadvsearch' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['useadvsearch']=='1'){?> checked<?php }?> />使用会员高级搜索，
		<input type='checkbox' name='viewonlineuser' id='viewonlineuser' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewonlineuser']=='1'){?> checked<?php }?> />访问在线会员页
		<br />
		<input type='checkbox' name='viewcontact' id='viewcontact' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewcontact']=='1'){?> checked<?php }?> />查看会员联系方式：&gt;&gt;
		（<input type='checkbox' name='viewemail' id='viewemail' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewemail']=='1'){?> checked<?php }?> />邮箱，
		<input type='checkbox' name='viewmobile' id='viewmobile' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewmobile']=='1'){?> checked<?php }?> />手机，
		<input type='checkbox' name='viewqq' id='viewqq' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewqq']=='1'){?> checked<?php }?> />QQ，
		<input type='checkbox' name='viewweibo' id='viewweibo' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewweibo']=='1'){?> checked<?php }?> />微博，
		<input type='checkbox' name='viewmsn' id='viewmsn' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['view']['viewmsn']=='1'){?> checked<?php }?> />微信）
		<font color="red">括号里的为可显示的子项</font>
		</td>
	  </tr> 
	  <tr>
		<td class='hback_1'>照片设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		上传张数 <input type="radio" name='photolimit' id='photolimit' value='0'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['photo']['photolimit']=='0'){?> checked<?php }?> />不限，
		<input type="radio" name='photolimit' id='photolimit' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['photo']['photolimit']=='1'){?> checked<?php }?> />限制 
		<input type="text" name="photonum" id="photonum" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['photo']['photonum'];?>
" /> <font color="#999999">(限制请填写整数)</font>
		</td>
	  </tr>     
	  <tr>
		<td class='hback_1'>好友设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		关注好友数 
		<input type='radio' name='friendlimit' id='friendlimit' value='0'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['friend']['friendlimit']=='0'){?> checked<?php }?> />不限，
		<input type='radio' name='friendlimit' id='friendlimit' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['friend']['friendlimit']=='1'){?> checked<?php }?> />限制
		<input type="text" name="friendnum" id="friendnum" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['friend']['friendnum'];?>
" />  <font color="#999999">(限制请填写整数)</font>&nbsp;&nbsp;
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>发布设定 <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		<input type='checkbox' name='pubdiary' id='pubdiary' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['publish']['pubdiary']=='1'){?> checked<?php }?> />发布日记，
		奖励积分：<input type="text" name="diarypoints" id="diarypoints" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['publish']['diarypoints'];?>
" />，
		<input type='checkbox' name='pubcomment' id='pubcomment' value='1'<?php if ($_smarty_tpl->tpl_vars['usergroup']->value['publish']['pubcomment']=='1'){?> checked<?php }?> />发表评论
		</td>
	  </tr>


	  <tr>
	    <td colspan="4" class="hback_c1" align="center"><b>扣费设置</b> （当无法满足以上权限时，可通过扣费方式获得相应权限，不开启扣费请设置为0）</td>
	  </tr>
	  <tr>
		<td class='hback_c2'>扣费项<br />（单位：元/金币） <span class='f_red'></span></td>
		<td class='hback' colspan="3">
		查看联系方式：<input type='text' name='contactfee' id='contactfee' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['fee']['contactfee'];?>
" />，
		查看信件：<input type='text' name='viewmsgfee' id='viewmsgfee' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['fee']['viewmsgfee'];?>
" />，
		写信件：<input type='text' name='sendmsgfee' id='sendmsgfee' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['usergroup']->value['fee']['sendmsgfee'];?>
" />
		</td>
	  </tr>

	  <tr>
		<td class='hback_none'></td>
		<td class='hback_none' colspan="3"><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
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

	t = "groupname";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("组名称不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "orders";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("组排序不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "maleimg";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("男会员标识不能为空", t);
		$('#'+t).focus();
		return false;
	}

	t = "femaleimg";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("女会员标识不能为空", t);
		$('#'+t).focus();
		return false;
	}

	return true;
}
</script>
<?php }} ?>