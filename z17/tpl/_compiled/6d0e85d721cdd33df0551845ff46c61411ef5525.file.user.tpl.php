<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 15:02:51
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\admincp\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15853532e871b5d2001-27492190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d0e85d721cdd33df0551845ff46c61411ef5525' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\admincp\\user.tpl',
      1 => 1390718694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15853532e871b5d2001-27492190',
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
    'stype' => 0,
    'skeyword' => 0,
    'showavatar' => 0,
    'sgender' => 0,
    'sdist1' => 0,
    'sdist2' => 0,
    'sgroupid' => 0,
    'savatar' => 0,
    'slovesort' => 0,
    'smarry' => 0,
    'sdate' => 0,
    'edate' => 0,
    'sage' => 0,
    'eage' => 0,
    'sheight' => 0,
    'eheight' => 0,
    'ssalary' => 0,
    'esalary' => 0,
    'sedu' => 0,
    'eedu' => 0,
    'sflag' => 0,
    'selite' => 0,
    'sliehun' => 0,
    'sorderby' => 0,
    'sorders' => 0,
    'page' => 0,
    'urlitem' => 0,
    'user' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'total' => 0,
    'pagecount' => 0,
    'showpage' => 0,
    'config' => 0,
    'comeurl' => 0,
    'id' => 0,
    'album' => 0,
    'group' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532e871c0d7da7_04058918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e871c0d7da7_04058918')) {function content_532e871c0d7da7_04058918($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>会员管理</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_head'), null, 0);?>
<?php }?>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_main_top'), null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['a']->value=="run"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user">会员列表</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=add" class="btn-general"><span>添加会员</span></a>会员列表</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user" />
	  <div class="item">  
		<label>搜索</label>
		<select name="stype" id="stype">
		<option value=''></option>
		<option value='userid'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='userid'){?> selected<?php }?>>会员ID</option>
		<option value='username'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='username'){?> selected<?php }?>>会员名</option>
		<option value='email'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='email'){?> selected<?php }?>>邮箱</option>
		</select>
		<input type="text" id="skeyword" name="skeyword" class="input-150" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" /> （选择此项查询，以下查询条件无效）&nbsp;&nbsp;
		<label>显示头像</label><input type="checkbox" name="showavatar" id="showavatar" value="1"<?php if ($_smarty_tpl->tpl_vars['showavatar']->value=='1'){?> checked<?php }?> />&nbsp;&nbsp;
		<br />

		<label>性别</label><select name="sgender" id="sgender">
		<option value=""></option>
		<option value="1"<?php if ($_smarty_tpl->tpl_vars['sgender']->value=='1'){?> selected<?php }?>>男</option>
		<option value="2"<?php if ($_smarty_tpl->tpl_vars['sgender']->value=='2'){?> selected<?php }?>>女</option>
		</select>&nbsp;&nbsp;
		<label>所在地区&nbsp;</label>
		<?php echo cmd_area(array('type'=>'dist1','name'=>'sdist1','value'=>$_smarty_tpl->tpl_vars['sdist1']->value,'ajax'=>'1','cname'=>'sdist2','cajax'=>'0','text'=>'=不限='),$_smarty_tpl);?>
&nbsp;<span id='dsdist1' class='f_red'></span>&nbsp;&nbsp;
		<span id="json_sdist2">
        <?php if ($_smarty_tpl->tpl_vars['sdist1']->value>0){?>
		<?php echo cmd_area(array('type'=>'dist2','pvalue'=>$_smarty_tpl->tpl_vars['sdist1']->value,'cname'=>'sdist2','cvalue'=>$_smarty_tpl->tpl_vars['sdist2']->value,'text'=>'=不限='),$_smarty_tpl);?>

		<?php }?>
		</span>&nbsp;&nbsp;
		<label>会员组</label><?php echo cmd_hook(array('mod'=>'usergroup','type'=>'select','name'=>'sgroupid','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['sgroupid']->value),$_smarty_tpl);?>
&nbsp;&nbsp;
		形象照</label>
		<select name="savatar" id="savatar">
		<option value=""></option>
		<option value="1"<?php if ($_smarty_tpl->tpl_vars['savatar']->value=='1'){?> selected<?php }?>>有</option>
		<option value="2"<?php if ($_smarty_tpl->tpl_vars['savatar']->value=='2'){?> selected<?php }?>>无</option>
		</select>&nbsp;&nbsp;
		<label>交友类型</label><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'select','name'=>'lovesort','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['slovesort']->value),$_smarty_tpl);?>
&nbsp;&nbsp;
		<label>婚史</label>
		<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','name'=>'smarry','type'=>'select','text'=>'=不限=','value'=>$_smarty_tpl->tpl_vars['smarry']->value),$_smarty_tpl);?>

		<br />

		<label>注册日期</label><input type="text" name="sdate" id="sdate" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;~~ &nbsp;&nbsp;<input type="text" name="edate" id="edate" value="<?php echo $_smarty_tpl->tpl_vars['edate']->value;?>
"  readonly onClick="WdatePicker();" class="input-100" />&nbsp;&nbsp;
		<label>年龄</label>
		<?php echo cmd_hook(array('mod'=>'age','name'=>'sage','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['sage']->value),$_smarty_tpl);?>
~<?php echo cmd_hook(array('mod'=>'age','name'=>'eage','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['eage']->value),$_smarty_tpl);?>
岁
		&nbsp;&nbsp;
		<label>身高</label>
		<?php echo cmd_hook(array('mod'=>'height','name'=>'sheight','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['sheight']->value),$_smarty_tpl);?>
~<?php echo cmd_hook(array('mod'=>'height','name'=>'eheight','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['eheight']->value),$_smarty_tpl);?>
CM
		<br />
		<label>月薪</label>
		<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','name'=>'ssalary','type'=>'select','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['ssalary']->value),$_smarty_tpl);?>
~<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','name'=>'esalary','type'=>'select','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['esalary']->value),$_smarty_tpl);?>
元
		&nbsp;&nbsp; 
		<label>学历</label>
		<?php echo cmd_hook(array('mod'=>'var','item'=>'education','name'=>'sedu','type'=>'select','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['sedu']->value),$_smarty_tpl);?>
~<?php echo cmd_hook(array('mod'=>'var','item'=>'education','name'=>'eedu','type'=>'select','text'=>'不限','value'=>$_smarty_tpl->tpl_vars['eedu']->value),$_smarty_tpl);?>

		&nbsp;&nbsp;
		<br />
		<label>状态</label>
		<select name="sflag">
		<option value=''></option>
		<option value='1'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='1'){?> selected<?php }?>>正常</option>
		<option value='2'<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='2'){?> selected<?php }?>>锁定</option>
		</select>&nbsp;&nbsp;
		
		<label>推荐</label>
		<select name="selite">
		<option value=''></option>
		<option value='1'<?php if ($_smarty_tpl->tpl_vars['selite']->value=='1'){?> selected<?php }?>>是</option>
		<option value='2'<?php if ($_smarty_tpl->tpl_vars['selite']->value=='2'){?> selected<?php }?>>否</option>
		</select>&nbsp;&nbsp;
		<label>猎婚</label>
		<select name="sliehun">
		<option value=''></option>
		<option value='1'<?php if ($_smarty_tpl->tpl_vars['sliehun']->value=='1'){?> selected<?php }?>>是</option>
		<option value='2'<?php if ($_smarty_tpl->tpl_vars['sliehun']->value=='2'){?> selected<?php }?>>否</option>
		</select>&nbsp;&nbsp;
		
	    <label>结果排序&nbsp;</label>
	    <select name="sorderby" id="sorderby">
	    <option value=""></option>
	    <option value="reg"<?php if ($_smarty_tpl->tpl_vars['sorderby']->value=='reg'){?> selected<?php }?>>注册时间</option>
	    <option value="login"<?php if ($_smarty_tpl->tpl_vars['sorderby']->value=='login'){?> selected<?php }?>>登录时间</option>
	    <option value="group"<?php if ($_smarty_tpl->tpl_vars['sorderby']->value=='group'){?> selected<?php }?>>会员组</option>
	    </select> 
	    &nbsp;&nbsp;
	    <select name="sorders" id="sorders">
	    <option value=""></option>
	    <option value="asc"<?php if ($_smarty_tpl->tpl_vars['sorders']->value=='asc'){?> selected<?php }?>>递增</option>
	    <option value="desc"<?php if ($_smarty_tpl->tpl_vars['sorders']->value=='desc'){?> selected<?php }?>>递减</option>
	    </select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value=" 搜 索 " />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=del&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="8%"><div class="th-gap">选择</div></th>
		<th width="10%"><div class="th-gap">用户名</div></th>
		<th width="13%"><div class="th-gap">邮箱</div></th>
		<th width="15%"><div class="th-gap">会员信息</div></th>
		<th width="6%"><div class="th-gap">现金</div></th>
		<th width="6%"><div class="th-gap">积分</div></th>
		<th width="6%"><div class="th-gap">短信</div></th>
		<th width="5%"><div class="th-gap">状态</div></th>
		<th width="5%"><div class="th-gap">推荐</div></th>
		<th width="5%"><div class="th-gap">猎婚</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" onClick="checkItem(this, 'chkAll')"><?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
 <a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a>
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']=='1'){?>
		<font color="green"><b>√</b></font>
		<?php }else{ ?>
		<font color="red"><b>×</b></font>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['showavatar']->value==1){?>
		<br />
		<?php echo cmd_avatar(array('width'=>'60','height'=>'71','value'=>$_smarty_tpl->tpl_vars['volist']->value['avatarurl']),$_smarty_tpl);?>

		<?php }?>
		</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['email'];?>
</td>
		<td title="注册时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['regtime'],"%Y/%m/%d %M:%H:%S");?>
">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['gender']=='1'){?>男<?php }else{ ?>女<?php }?> <?php echo cmd_hook(array('mod'=>'birthday','value'=>$_smarty_tpl->tpl_vars['volist']->value['ageyear']),$_smarty_tpl);?>
岁 
		<?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'marrystatus','value'=>$_smarty_tpl->tpl_vars['volist']->value['marrystatus']),$_smarty_tpl);?>

		<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>

		</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['money'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['points'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['mbsms'];?>
</td>

		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']==0){?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" value="flagopen" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" value="flagclose" />
			<img id="flag<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('flag','<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" style="cursor:pointer;">	
		<?php }?>
        </td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['elite']==0){?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" value="eliteopen" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" value="eliteclose" />
			<img id="elite<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('elite','<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" style="cursor:pointer;">	
		<?php }?>
        </td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['liehun']==0){?>
			<input type="hidden" id="attr_liehun<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" value="liehunopen" />
			<img id="liehun<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/no.gif" onClick="javascript:fetch_ajax('liehun','<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" style="cursor:pointer;">
		<?php }else{ ?>
			<input type="hidden" id="attr_liehun<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" value="liehunclose" />
			<img id="liehun<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/images/yes.gif" onClick="javascript:fetch_ajax('liehun','<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" style="cursor:pointer;">	
		<?php }?>
        </td>
		<td align="center">
		<a href="javascript:void(0);" onclick="tbox_addmoney('添加会员帐号现金(金币)', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" class="icon-add">现金</a>
		<a href="javascript:void(0);" onclick="tbox_addpoints('添加会员积分', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');" class="icon-add">积分</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">管理</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=del&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复。')){return true;} return false;}" class="icon-del">删除</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=login&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" class="icon-set" target="_blank">登录</a>
		</td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="11" align="center">暂无信息</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="10"><input class="button" name="btn_del" type="button" value="批量删除" onClick="{if(confirm('确定要删除吗？')){$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b> ]条记录</td>
	  </tr>
	  <?php }?>
	</table>
	</form>
	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>0){?>
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


<?php if ($_smarty_tpl->tpl_vars['a']->value=="penymonolog"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penymonolog">审核内心独白</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penymonolog" class="btn-general"><span>审核内心独白</span></a>会员管理 -- 内心独白 </h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penymonolog" />
	  <div class="item">  
		<label>搜索</label>
		<select name='stype' id='stype'>
		<option value=''>选择类型</option>
		<option value='userid'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='userid'){?> selected<?php }?>>会员ID</option>
		</select>
		&nbsp;
		<input type="text" id="skeyword" name="skeyword" class="input-200" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;
		状态：
		<select name="sflag" id="sflag">
		<option value="0">全部</option>
		<option value="1"<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='1'){?> selected<?php }?>>待审核</option>
		<option value="2"<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='2'){?> selected<?php }?>>未通过</option>
		<option value="3"<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='3'){?> selected<?php }?>>已通过</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value=" 搜 索 " />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
	<input type='hidden' name='a' id='a' value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="7%"><div class="th-gap">选择</div></th>
	    <th width="10%"><div class="th-gap">用户ID</div></th>
		<th width="12%"><div class="th-gap">用户名</div></th>
		<th width="6%"><div class="th-gap">状态</div></th>
		<th width="10%"><div class="th-gap">最后更新</div></th>
		<th><div class="th-gap">内心独白</div></th>
		<th width='10%'><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align="center"><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" onClick="checkItem(this, 'chkAll')"></td>
	    <td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
</td>
		<td align="left"><a href="###" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></td>
		<td align="center">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['molstatus']=='-2'){?>
		<font color="gray">待审核</font>
		<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['molstatus']=='-1'){?>
		<font color="red">未通过</font>
		<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['molstatus']=='1'){?>
		<font color="green">已通过</font>
		<?php }else{ ?>
		~~
		<?php }?>
		</td>
		<td align="center" title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['moluptime'],"%H:%M:%S");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['moluptime'],"%Y-%m-%d");?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['volist']->value['monolog'];?>
</td>
		<td align="center"><a href='###' onclick="tbox_monolog('审核/编辑内心独白', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');">审核/编辑</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="7" align="center">对不起，没有你要找的信息。</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
		批量处理：
		<input class="button" name="btn_pass" type="button" value="通过" onClick="$('#a').val('passmonolog');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_unpass" type="button" value="未通过" onClick="$('#a').val('unpassmonolog');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#a').val('delmonolog');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b> ]条记录</td>
	  </tr>
	  <?php }?>
	</table>
	</form>
	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>0){?>
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

<?php if ($_smarty_tpl->tpl_vars['a']->value=="penyavatar"){?>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penyavatar">审核头像</a></p></div>
  <div class="main-cont">
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penyavatar" class="btn-general"><span>审核头像</span></a>
	会员管理-审核头像
	</h3>
	<div class="search-area ">
	  <form method="post" id="search_form" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=penyavatar" />
	  <div class="item">  
		<label>搜索</label>
		<select name='stype' id='stype'>
		<option value=''>选择类型</option>
		<option value='userid'<?php if ($_smarty_tpl->tpl_vars['stype']->value=='userid'){?> selected<?php }?>>会员ID</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="text" id="skeyword" name="skeyword" class="input-200" value="<?php echo $_smarty_tpl->tpl_vars['skeyword']->value;?>
" />
		&nbsp;&nbsp;&nbsp;
		状态：
		<select name="sflag" id="sflag">
		<option value="0">全部</option>
		<option value="1"<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='1'){?> selected<?php }?>>待审核</option>
		<option value="2"<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='2'){?> selected<?php }?>>未通过</option>
		<option value="3"<?php if ($_smarty_tpl->tpl_vars['sflag']->value=='3'){?> selected<?php }?>>已通过</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class="button_s" value=" 搜 索 " />
	  </div>
	  </form>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" method="post" name="myform" id="myform" style="margin:0">
	<input type='hidden' name='a' id='a' value='' />
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
	  <thead class="tb-tit-bg">
	  <tr>
	    <th width="10%"><div class="th-gap">选择</div></th>
	    <th width="12%"><div class="th-gap">会员ID</div></th>
		<th width="15%"><div class="th-gap">用户名</div></th>
		<th width="15%"><div class="th-gap">头像</div></th>
		<th width='10%'><div class="th-gap">头像状态</div></th>
		<th width='15%'><div class="th-gap">最后更新</div></th>
		<th><div class="th-gap">操作</div></th>
	  </tr>
	  </thead>
	  <tfoot class="tb-foot-bg"></tfoot>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	    <td align='center'><input name="id[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" onClick="checkItem(this, 'chkAll')"></td>
	    <td align="left"><?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
</td>
		<td align="left"><a href="javascript:void(0);" onclick="tbox_user_view('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a></td>
		<td align='center'><img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatar'];?>
" width='75px' height='92px' /></td>
		<td align='center'>
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['avatarflag']=='-2'){?>
		<font color="gray">待审核</font>
		<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['avatarflag']=='-1'){?>
		<font color="red">未通过</font>
		<?php }elseif($_smarty_tpl->tpl_vars['volist']->value['avatarflag']=='1'){?>
		<font color="green">已通过</font>
		<?php }else{ ?>
		~~
		<?php }?>
		</td>
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['avatartime']>0){?>
		<td align='center'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['avatartime'],"%Y-%m-%d");?>
<br /><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['avatartime'],"%H:%M:%S");?>
</td>
		<?php }else{ ?>
		<td align='center'>~~</td>
		<?php }?>
		<td align="center">
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=passavatar&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-set">通过</a>&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=unpassavatar&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" class="icon-edit">未通过</a>&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=delavatar&id[]=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['urlitem']->value;?>
" onClick="{if(confirm('确定要删除吗？')){return true;} return false;}" class="icon-del">删除</a></td>
	  </tr>
	  <?php }
if (!$_smarty_tpl->tpl_vars['volist']->_loop) {
?>
      <tr>
	    <td colspan="7" align="center">对不起，没要审核的会员头像。</td>
	  </tr>
	  <?php } ?>
	  <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
	  <tr>
		<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'id[]')" value="checkbox"></td>
		<td class="hback" colspan="6">
		批量处理：
		<input class="button" name="btn_pass" type="button" value="通过" onClick="$('#a').val('passavatar');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_unpass" type="button" value="未通过" onClick="$('#a').val('unpassavatar');$('#myform').submit();" class="button">&nbsp;&nbsp;
		<input class="button" name="btn_del" type="button" value="删除" onClick="{if(confirm('确定要删除吗？一旦删除无法恢复！')){$('#a').val('delavatar');$('#myform').submit();return true;}return false;}" class="button">&nbsp;&nbsp;共[ <b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b> ]条记录</td>
	  </tr>
	  <?php }?>
	</table>
	</form>
	<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>0){?>
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


<!-- 添加会员 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="add"){?>
<style type="text/css">
.nTab{width: 98%;height: auto;margin: 20px auto;border: 1px solid #dbe2e7;overflow: hidden;}
.none{display: none;}
.nTab .TabTitle li{float: left;cursor: pointer;height:28px;line-height:28px;text-align: center;width: 100px;}
.nTab .TabTitle li a{text-decoration: none;}
.nTab .TabTitle .active{background: #e5ecf0;font-size:13px;font-weight: bold;}
.nTab .TabTitle .normal{color: #336699;}
.nTab .TabContent{clear: both;overflow: hidden;background: #fff;padding: 5px;display: block;height: auto;}
</style>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=add">添加会员</a></p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user" class="btn-general"><span>返回列表</span></a>添加会员</h3>
	<form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=saveadd" onsubmit='return checkadd();' />
	<div class="nTab">
	  <div class="TabTitle">
	    <ul id="myTab">
		  <li class="active" id='li_0' onclick="nTabs(this,0);">基本信息</li>
		  <li class="normal" id='li_1' onclick="nTabs(this,1);">外貌体型</li>
		  <li class="normal" id='li_2' onclick="nTabs(this,2);">工作学习</li>
		  <li class="normal" id='li_3' onclick="nTabs(this,3);">生活描述</li>
		  <li class="normal" id='li_4' onclick="nTabs(this,4);">兴趣爱好</li>
		  <li class="normal" id='li_5' onclick="nTabs(this,5);">联系资料</li>
		</ul>
	  </div>

	  <div class="TabContent">
	    
		<!-- 基本信息 -->
		<div id="myTab_Content0" class="">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>基本信息</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>登录邮箱 <span class='f_red'>*</span></td>
				<td class='hback' width='35%'><input type="text" name="email" id="email" class="input-150" onblur="ajax_email('email','tip_email');" /> <span id="tip_email"></span> <span id='demail' class='f_red'></span></td>
				<td class='hback_1' width='15%'>用 户 名 <span class='f_red'>*</span></td>
				<td class='hback' width='35%'><input type="text" name="username" id="username" class="input-100" onblur="ajax_user('username','tip_username');" /> <span id="tip_username"></span> <span id='dusername' class='f_red'></span> <font color='#999999'>(3-16个字符,汉字,数字,字母,下横线组成)</font></td>
			  </tr>
			  <tr>
			    <td class='hback_1'>登录密码 <span class='f_red'>*</span></td>
				<td class='hback'><input type='password' name='password' id='password' class='input-150' maxlength="16" /> <span id="dpassword"></span> <font color="#999999">(4-16个字符)</font></td>
				<td class='hback_1'>确认密码 <span class='f_red'>*</span></td>
				<td class='hback'><input type='password' name='confirmpassword' id='confirmpassword' class='input-150' maxlength="16" /> <span id="dconfirmpassword"></span> <font color='#9999999'>(输入以上密码)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>性 别 <span class='f_red'>*</span></td>
				<td class='hback'>
				<select name='gender' id='gender'>
				<option value=''>=请选择=</option>
				<option value='1'>男</option>
				<option value='2'>女</option></select> 
				<span class='f_red' id='dgender'></span></td>
				<td class='hback_1'>生 日 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'year','name'=>'ageyear','text'=>'请选择'),$_smarty_tpl);?>
年
				<?php echo cmd_hook(array('mod'=>'month','name'=>'agemonth','text'=>'请选择'),$_smarty_tpl);?>
月
				<?php echo cmd_hook(array('mod'=>'day','name'=>'ageday','text'=>'请选择'),$_smarty_tpl);?>
日
			    <br />
			    <span class='f_red' id='dyear'></span><span class='f_red' id='dmonth'></span><span class='f_red' id='dday'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>血 型 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'blood','name'=>'blood','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dblood' class='f_red'></span></td>
				<td class='hback_1'>婚姻状态 <span class='f_red'>*</span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','name'=>'marrystatus','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dmarrystatus"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>有无子女 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'childrenstatus','name'=>'childrenstatus','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dchildrenstatus' class='f_red'></span></td>
				<td class='hback_1'>身 高 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'height','name'=>'height','text'=>'=请选择='),$_smarty_tpl);?>
 CM <span id='dheight' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>国 籍 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'nationality','name'=>'nationality','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dnationality' class='f_red'></span></td>
				<td class='hback_1'>户 籍 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hometown(array('type'=>'dist1','name'=>'nationprovinceid','cname'=>'nationcityid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='dnationprovinceid' class='f_red'></span>
				<span id="json_nationcityid"></span>&nbsp;
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>所在地区 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_area(array('type'=>'dist1','name'=>'provinceid','ajax'=>'1','cname'=>'cityid','cajax'=>'1','dname'=>'distid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='dprovinceid' class='f_red'></span>
				<span id="json_cityid"></span>&nbsp;
				<span id="json_distid"></span>
				</td>
				<td class='hback_1'>交友类型 <span class='f_red'>*</span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'select','name'=>'lovesort','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dlovesort' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>个 性  <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'personality','name'=>'personality','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dpersonality"></span></td>
				<td class='hback_1'>民 族 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'national','name'=>'national','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dnational' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>职 业 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'jobs','name'=>'jobs','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="djobs"></span></td>
				<td class='hback_1'>月 薪 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','name'=>'salary','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dsalary' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>居住情况 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'housing','name'=>'housing','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dhousing"></span></td>
				<td class='hback_1'>购车情况 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'caring','name'=>'caring','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dcaring"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>曾经留学/居住 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'beforeregion','name'=>'beforeregion','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dbeforeregion' class='f_red'></span></td>
			  </tr>

			  <tr>
			    <td class='hback_1'>内心独白 <span class='f_red'>*</span></td>
				<td class='hback' colspan='3'>
				<textarea name='monolog' id='monolog' style="width:60%;height:80px;overflow:hidden;"></textarea>
				<br />
				<span id='dmonolog' class='f_red'></span> <font color="#999999">(20~4000个字符，1个汉字等于2个字符)</font>
				</td>
			  </tr>
			</table>
		</div>

	    
		<!-- 外貌体型 -->
		<div id="myTab_Content1" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>外貌体型</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>体 重 <span class='f_red'></span></td>
				<td class='hback' width='35%'><?php echo cmd_hook(array('mod'=>'weight','name'=>'weight','text'=>'=请选择='),$_smarty_tpl);?>
 KG <span id='dweight' class='f_red'></span></td>
				<td class='hback_1' width='15%'>外貌自评 <span class='f_red'></span></td>
				<td class='hback' width='35%'><?php echo cmd_hook(array('mod'=>'var','item'=>'profile','name'=>'profile','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dprofile"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>魅力部位 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'charmparts','name'=>'charmparts','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dcharmparts' class='f_red'></span></td>
				<td class='hback_1'>发 型 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'hairstyle','name'=>'hairstyle','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dhairstyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>发 色 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'haircolor','name'=>'haircolor','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dhaircolor' class='f_red'></span></td>
				<td class='hback_1'>脸 型 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'facestyle','name'=>'facestyle','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dfacestyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>体 型 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'bodystyle','name'=>'bodystyle','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dbodystyle' class='f_red'></span></td>
			  </tr>
			</table>
		</div>


		<!-- 工作学习 -->
		<div id="myTab_Content2" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>工作学习</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>公司类型 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'companytype','name'=>'companytype','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dcompanytype' class='f_red'></span></td>
				<td class='hback_1' width='15%'>收入描述 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'income','name'=>'income','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dincome"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>工作状况 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'workstatus','name'=>'workstatus','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dworkstatus"></span></td>
				<td class='hback_1'>公司名称 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="companyname" id="companyname" class="input-txt" /> <span id='dcompanyname' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>教育程度 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'education','name'=>'education','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="deducation"></span></td>
				<td class='hback_1'>专业类型 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'specialty','name'=>'specialty','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dspecialty' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>毕业学校 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="school" id="school" class="input-txt" /> <span id='dschool' class='f_red'></span></td>
				<td class='hback_1'>入学年份 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="schoolyear" id="schoolyear" class="input-s" />年 <span id="dschoolyear"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>语言能力 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_language_edit">
				<?php echo cmd_hook(array('mod'=>'var','type'=>'checkbox','item'=>'language','name'=>'language','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				</td>
			  </tr>
			</table>
		</div>

		<!-- 生活描述 -->
		<div id="myTab_Content3" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>生活描述</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>家中排行 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'tophome','name'=>'tophome','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dtophome' class='f_red'></span></td>
				<td class='hback_1' width='15%'>最大消费 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'consume','name'=>'consume','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dconsume"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>是否吸烟 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'smoking','name'=>'smoking','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dsmoking"></span></td>
				<td class='hback_1'>是否喝酒 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'drinking','name'=>'drinking','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='ddrinking' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>宗教信仰 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'faith','name'=>'faith','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dfaith"></span></td>
				<td class='hback_1'>锻炼习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'workout','name'=>'workout','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dworkout' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>作息习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'rest','name'=>'rest','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="drest"></span></td>
				<td class='hback_1'>是否要孩子 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'havechildren','name'=>'havechildren','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id='dhavechildren' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>与对方父母同住 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'talive','name'=>'talive','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dtalive"></span></td>
				<td class='hback_1'>喜欢制造浪漫 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'romantic','name'=>'romantic','type'=>'select','text'=>'=请选择='),$_smarty_tpl);?>
 <span id="dromantic"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>擅长生活技能 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_lifeskill_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'lifeskill','name'=>'lifeskill','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dlifeskill' class='f_red'></span>
				</td>
			  </tr>
			</table>
		</div>

		<!-- 兴趣爱好 -->
		<div id="myTab_Content4" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>兴趣爱好</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>喜欢的运动  <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_sports_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'sports','name'=>'sports','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

                <span id='dsports' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的食物 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_food_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'food','name'=>'food','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dfood' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的书籍 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_book_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'book','name'=>'book','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dbook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的电影 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_film_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'film','name'=>'film','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dfilm' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>关注的节目 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_attention_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'attention','name'=>'attention','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dattention' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>娱乐休闲 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_leisure_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'leisure','name'=>'leisure','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dleisure' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>业余爱好 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_interest_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'interest','name'=>'interest','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dinterest' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的旅游去处 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_travel_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'travel','name'=>'travel','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum']),$_smarty_tpl);?>

				<span id='dtravel' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

		<!-- 联系资料 -->
		<div id="myTab_Content5" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>会员资料</b> (网站保密，不会公开)</td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>真实姓名 <span class='f_red'></span></td>
				<td class='hback' colspan="3" width='85%'><input type="text" name="realname" id="realname" class="input-s" /> <span id='drealname' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>身份证号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="idnumber" id="idnumber" class="input-txt" /> <span id='didnumber' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用)  </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>通信地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="address" id="address" class="input-txt" /> <span id='daddress' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>邮政编码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="zipcode" id="zipcode" class="input-s" /> <span id='dzipcode' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>

			  <tr>
				<td class='hback_yellow' colspan="4" align="center"><b>联系方式</b> (公开，需要会员组权限才能查看)</td>
			  </tr>
			  <tr>
				<td class='hback_1'>查看权限 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="radio" name="privacy" id="privacy" value="1" checked />任何人可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="2" />好友可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="3" />VIP会员可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="4" />保密&nbsp;&nbsp; <span id='dprivacy' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>手机号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="mobile" id="mobile" class="input-100" /> <span id='dmobile' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>电话号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="telephone" id="telephone" class="input-100" /> <span id='dtelephone' class='f_red'></span></td>
			  </tr>

			  <tr>
				<td class='hback_1'>QQ号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="qq" id="qq" class="input-100" /> <span id='dqq' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>MSN <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="msn" id="msn" class="input-txt" /> <span id='dmsn' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Skype <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="skype" id="skype" class="input-100" /> <span id='dskype' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Facebook <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="facebook" id="facebook" class="input-txt" /> <span id='dfacebook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>博客地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="homepage" id="homepage" class="input-txt" /> <span id='dhomepage' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

	  </div>
	  <!-- TabContent //-->
	  <div align="center"><input type="submit" name="btn_save" id="btn_save" value=" 添加保存 " /></div>
	  </form>
	</div>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<!-- 编辑页面 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="edit"){?>
<style type="text/css">
.nTab{width: 98%;height: auto;margin: 20px auto;border: 1px solid #dbe2e7;overflow: hidden;}
.none{display: none;}
.nTab .TabTitle li{float: left;cursor: pointer;height:28px;line-height:28px;text-align: center;width: 100px;}
.nTab .TabTitle li a{text-decoration: none;}
.nTab .TabTitle .active{background: #e5ecf0;font-size:13px;font-weight: bold;}
.nTab .TabTitle .normal{color: #336699;}
.nTab .TabContent{clear: both;overflow: hidden;background: #fff;padding: 5px;display: block;height: auto;}
</style>
<div class="main-wrap">
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>管理/编辑会员</p></div>
  <div class="main-cont">
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>管理/编辑会员</h3>
	<form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=saveedit&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" onsubmit='return checkedit();' />
	<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
	<div class="nTab">
	  <div class="TabTitle">
	    <ul id="myTab">
		  <li class="active" id='li_0' onclick="nTabs(this,0);">基本信息</li>
		  <li class="normal" id='li_1' onclick="nTabs(this,1);">外貌体型</li>
		  <li class="normal" id='li_2' onclick="nTabs(this,2);">工作学习</li>
		  <li class="normal" id='li_3' onclick="nTabs(this,3);">生活描述</li>
		  <li class="normal" id='li_4' onclick="nTabs(this,4);">兴趣爱好</li>
		  <li class="normal" id='li_5' onclick="nTabs(this,5);">联系资料</li>
		  <li class="normal" id='li_6' onclick="nTabs(this,6);">会员相册</li>
		</ul>
	  </div>

	  <div class="TabContent">

		<div class="search-area7">
		  <div class="item">
			<label>会员操作 </label>

		    <input type="button" name="btn_money" id="btn_money" value="金币管理" onclick="tbox_addmoney('现金(金币)管理', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
');" />&nbsp;
			<input type="button" name="btn_points" id="btn_points" value="积分管理" onclick="tbox_addpoints('积分管理', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
');" />&nbsp;
			<input type="button" name="btn_editpass" id="btn_editpass" value="修改密码" onclick="tbox_editpass('修改会员密码', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
')" />&nbsp;
			<input type='button' name='btn_vip' id='btn_vip' value='升级VIP' onclick="tbox_uservip('会员VIP操作', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
')" />&nbsp;
			<input type='button' name='btn_rz' id='btn_rz' value='认证项目' onclick="tbox_rzmanage('会员认证管理', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
')" />&nbsp;
			<input type='button' name='btn_rz' id='btn_rz' value='内心独白' onclick="tbox_monolog('审核会员内心独白', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
')" />&nbsp;
			<?php if ($_smarty_tpl->tpl_vars['user']->value['avatar']!=''){?>
			<input type='button' name='btn_avatar' id='btn_avatar' value='管理头像' onclick="tbox_avatar('<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
');" />&nbsp;
			<?php }else{ ?>
			<input type='button' name='btn_avatar' id='btn_avatar' value='管理头像' disabled />&nbsp;
			<?php }?>
			<input type='button' name='btn_album' id='btn_album' value='上传相册' onclick="tbox_album_add('上传相册', '<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
')" />&nbsp;&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=login&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" target="_blank">登录</a>

		  </div>
		</div>

	    
		<!-- 基本信息 -->
		<div id="myTab_Content0" class="">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>基本信息</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>会员ID <span class='f_red'></span></td>
				<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
</td>
				<td class='hback_1' width='15%'>用 户 名 <span class='f_red'></span></td>
				<td class='hback' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['levelimg'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
<br /><?php echo cmd_avatar(array('width'=>'70','height'=>'86','value'=>$_smarty_tpl->tpl_vars['user']->value['avatarurl']),$_smarty_tpl);?>
</td>
			  </tr>
			  <tr>
				<td class='hback_1'>登录邮箱 <span class='f_red'></span></td>
				<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
				<td class='hback_1'>星座/生肖 <span class='f_red'></span></td>
				<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['astro'];?>
 / <?php echo $_smarty_tpl->tpl_vars['user']->value['lunar'];?>
 </td>
			  </tr>
			  <tr>
				<td class='hback_1'>性 别 <span class='f_red'>*</span></td>
				<td class='hback'>
				<select name='gender' id='gender'>
				<option value=''>=请选择=</option>
				<option value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['gender']=='1'){?> selected<?php }?>>男</option>
				<option value='2'<?php if ($_smarty_tpl->tpl_vars['user']->value['gender']=='2'){?> selected<?php }?>>女</option></select> 
				<span class='f_red' id='dgender'></span></td>
				<td class='hback_1'>生 日 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'year','name'=>'ageyear','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['ageyear']),$_smarty_tpl);?>
年
				<?php echo cmd_hook(array('mod'=>'month','name'=>'agemonth','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['agemonth']),$_smarty_tpl);?>
月
				<?php echo cmd_hook(array('mod'=>'day','name'=>'ageday','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['ageday']),$_smarty_tpl);?>
日
			    <br />
			    <span class='f_red' id='dyear'></span><span class='f_red' id='dmonth'></span><span class='f_red' id='dday'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>血 型 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'blood','name'=>'blood','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['blood']),$_smarty_tpl);?>
 <span id='dblood' class='f_red'></span></td>
				<td class='hback_1'>婚姻状态 <span class='f_red'>*</span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','name'=>'marrystatus','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['marrystatus']),$_smarty_tpl);?>
 <span id="dmarrystatus"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>有无子女 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'childrenstatus','name'=>'childrenstatus','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['childrenstatus']),$_smarty_tpl);?>
 <span id='dchildrenstatus' class='f_red'></span></td>
				<td class='hback_1'>身 高 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'height','name'=>'height','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['height']),$_smarty_tpl);?>
 CM <span id='dheight' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>国 籍 <span class='f_red'></span></td>
				<td class='hback'><?php echo cmd_hook(array('mod'=>'var','item'=>'nationality','name'=>'nationality','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['childrenstatus']),$_smarty_tpl);?>
 <span id='dnationality' class='f_red'></span></td>
				<td class='hback_1'>户 籍 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hometown(array('type'=>'dist1','name'=>'nationprovinceid','value'=>$_smarty_tpl->tpl_vars['user']->value['nationprovinceid'],'cname'=>'nationcityid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='dnationprovinceid' class='f_red'></span>
				<span id="json_nationcityid">
				<?php echo cmd_hometown(array('type'=>'dist2','cname'=>'nationcityid','cvalue'=>$_smarty_tpl->tpl_vars['user']->value['nationcityid'],'pvalue'=>$_smarty_tpl->tpl_vars['user']->value['nationprovinceid'],'text'=>'=请选择='),$_smarty_tpl);?>

				</span>&nbsp;<span id='dnationcityid' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>所在地区 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_area(array('type'=>'dist1','name'=>'provinceid','value'=>$_smarty_tpl->tpl_vars['user']->value['provinceid'],'ajax'=>'1','cname'=>'cityid','cajax'=>'1','dname'=>'distid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='provinceid' class='f_red'></span>
				<span id="json_cityid">
				<?php echo cmd_area(array('type'=>'dist2','pvalue'=>$_smarty_tpl->tpl_vars['user']->value['provinceid'],'cname'=>'cityid','cvalue'=>$_smarty_tpl->tpl_vars['user']->value['cityid'],'cajax'=>'1','dname'=>'distid','dvalue'=>$_smarty_tpl->tpl_vars['user']->value['distid'],'text'=>'=请选择='),$_smarty_tpl);?>

				</span>&nbsp; <span id='dcityid' class='f_red'></span>
				<span id="json_distid">
				<?php echo cmd_area(array('type'=>'dist3','cvalue'=>$_smarty_tpl->tpl_vars['user']->value['cityid'],'dname'=>'distid','dvalue'=>$_smarty_tpl->tpl_vars['user']->value['distid'],'text'=>'=请选择='),$_smarty_tpl);?>

				</span>
				</td>
				<td class='hback_1'>交友类型 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'lovesort','name'=>'lovesort','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['lovesort']),$_smarty_tpl);?>
 <span id='dlovesort' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>个 性  <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'personality','name'=>'personality','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['personality']),$_smarty_tpl);?>
 <span id="dpersonality"></span></td>
				<td class='hback_1'>民 族 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'national','name'=>'national','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['national']),$_smarty_tpl);?>
 <span id='dnational' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>职 业 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'jobs','name'=>'jobs','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['jobs']),$_smarty_tpl);?>
 <span id="djobs"></span></td>
				<td class='hback_1'>月 薪 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'salary','name'=>'salary','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['salary']),$_smarty_tpl);?>
 <span id='dsalary' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>居住情况 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'housing','name'=>'housing','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['housing']),$_smarty_tpl);?>
 <span id="dhousing"></span></td>
				<td class='hback_1'>购车情况 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'caring','name'=>'caring','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['caring']),$_smarty_tpl);?>
 <span id="dcaring"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>曾经留学/居住 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'beforeregion','name'=>'beforeregion','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['beforeregion']),$_smarty_tpl);?>
 <span id='dbeforeregion' class='f_red'></span></td>
			  </tr>

			  <tr>
				<td class='hback_c2' colspan="4" align="center"><b>状态信息</b></td>
			  </tr>
			  <tr>
			    <td class='hback_1'>注册时间 </td>
				<td class='hback'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['regtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
				<td class='hback_1'>注册IP </td>
				<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['regip'];?>
</td>
			  </tr>
			  <tr>
			    <td class='hback_1'>最后登录 </td>
				<td class='hback'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['logintime'],"%Y-%m-%d %H:%M:%S");?>
 登录次数：<?php echo $_smarty_tpl->tpl_vars['user']->value['logintimes'];?>
</td>
				<td class='hback_1'>登录IP </td>
				<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['loginip'];?>
</td>
			  </tr>
			  <tr>
			    <td class='hback_1'>现金(金币) </td>
				<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
</td>
			    <td class='hback_1'>积分 </td>
				<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['points'];?>
</td>
			  </tr>

			</table>
		</div>

	    
		<!-- 外貌体型 -->
		<div id="myTab_Content1" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>外貌体型</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>体 重 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'weight','name'=>'weight','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['weight']),$_smarty_tpl);?>
KG <span id='dweight' class='f_red'></span></td>
				<td class='hback_1' width='15%'>外貌自评 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'profile','name'=>'profile','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['profile']),$_smarty_tpl);?>
 <span id="dprofile"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>魅力部位 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'charmparts','name'=>'charmparts','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['charmparts']),$_smarty_tpl);?>
 <span id='dcharmparts' class='f_red'></span></td>
				<td class='hback_1'>发 型 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'hairstyle','name'=>'hairstyle','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['hairstyle']),$_smarty_tpl);?>
 <span id="dhairstyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>发 色 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'haircolor','name'=>'haircolor','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['haircolor']),$_smarty_tpl);?>
 <span id='dhaircolor' class='f_red'></span></td>
				<td class='hback_1'>脸 型 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'facestyle','name'=>'facestyle','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['facestyle']),$_smarty_tpl);?>
 <span id="dfacestyle"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>体 型 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'bodystyle','name'=>'bodystyle','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['bodystyle']),$_smarty_tpl);?>
 <span id='dbodystyle' class='f_red'></span></td>
			  </tr>
			</table>
		</div>


		<!-- 工作学习 -->
		<div id="myTab_Content2" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>工作学习</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>公司类型 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'companytype','name'=>'companytype','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['companytype']),$_smarty_tpl);?>
 <span id='dcompanytype' class='f_red'></span></td>
				<td class='hback_1' width='15%'>收入描述 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'income','name'=>'income','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['income']),$_smarty_tpl);?>
 <span id="dincome"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>工作状况 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'workstatus','name'=>'workstatus','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['workstatus']),$_smarty_tpl);?>
 <span id="dworkstatus"></span></td>
				<td class='hback_1'>公司名称 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="companyname" id="companyname" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['companyname'];?>
" /> <span id='dcompanyname' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>教育程度 <span class='f_red'>*</span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'education','name'=>'education','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['education']),$_smarty_tpl);?>
 <span id="deducation"></span></td>
				<td class='hback_1'>专业类型 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'specialty','name'=>'specialty','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['specialty']),$_smarty_tpl);?>
 <span id='dspecialty' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>毕业学校 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="school" id="school" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['school'];?>
" /> <span id='dschool' class='f_red'></span></td>
				<td class='hback_1'>入学年份 <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="schoolyear" id="schoolyear" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['schoolyear'];?>
" />年 <span id="dschoolyear"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>语言能力 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_language_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'language','name'=>'language','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['language']),$_smarty_tpl);?>

				</td>
			  </tr>
			</table>
		</div>

		<!-- 生活描述 -->
		<div id="myTab_Content3" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>生活描述</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>家中排行 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'tophome','name'=>'tophome','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['tophome']),$_smarty_tpl);?>
 <span id='dtophome' class='f_red'></span></td>
				<td class='hback_1' width='15%'>最大消费 <span class='f_red'></span></td>
				<td class='hback' width='35%'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'consume','name'=>'consume','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['consume']),$_smarty_tpl);?>
 <span id="dconsume"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>是否吸烟 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'smoking','name'=>'smoking','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['smoking']),$_smarty_tpl);?>
 <span id="dsmoking"></span></td>
				<td class='hback_1'>是否喝酒 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'drinking','name'=>'drinking','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['drinking']),$_smarty_tpl);?>
 <span id='ddrinking' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>宗教信仰 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'faith','name'=>'faith','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['faith']),$_smarty_tpl);?>
 <span id="dfaith"></span></td>
				<td class='hback_1'>锻炼习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'workout','name'=>'workout','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['workout']),$_smarty_tpl);?>
 <span id='dworkout' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>作息习惯 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'rest','name'=>'rest','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['rest']),$_smarty_tpl);?>
 <span id="drest"></span></td>
				<td class='hback_1'>是否要孩子 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'havechildren','name'=>'havechildren','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['havechildren']),$_smarty_tpl);?>
 <span id='dhavechildren' class='f_red'></span></td> 
			  </tr>
			  <tr>
				<td class='hback_1'>与对方父母同住 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'talive','name'=>'talive','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['talive']),$_smarty_tpl);?>
 <span id="dtalive"></span></td>
				<td class='hback_1'>喜欢制造浪漫 <span class='f_red'></span></td>
				<td class='hback'>
				<?php echo cmd_hook(array('mod'=>'var','item'=>'romantic','name'=>'romantic','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['user']->value['romantic']),$_smarty_tpl);?>
 <span id="dromantic"></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>擅长生活技能 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_lifeskill_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'lifeskill','name'=>'lifeskill','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['lifeskill']),$_smarty_tpl);?>

				<span id='dlifeskill' class='f_red'></span>
				</td>
			  </tr>
			</table>
		</div>

		<!-- 兴趣爱好 -->
		<div id="myTab_Content4" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>兴趣爱好</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>喜欢的运动  <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_sports_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'sports','name'=>'sports','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['sports']),$_smarty_tpl);?>

                <span id='dsports' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的食物 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_food_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'food','name'=>'food','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['food']),$_smarty_tpl);?>

				<span id='dfood' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的书籍 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_book_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'book','name'=>'book','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['book']),$_smarty_tpl);?>

				<span id='dbook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的电影 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_film_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'film','name'=>'film','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['film']),$_smarty_tpl);?>

				<span id='dfilm' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>关注的节目 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_attention_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'attention','name'=>'attention','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['attention']),$_smarty_tpl);?>

				<span id='dattention' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>娱乐休闲 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_leisure_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'leisure','name'=>'leisure','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['leisure']),$_smarty_tpl);?>

				<span id='dleisure' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>业余爱好 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_interest_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'interest','name'=>'interest','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['interest']),$_smarty_tpl);?>

				<span id='dinterest' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>喜欢的旅游去处 <span class='f_red'></span></td>
				<td class='hback' colspan="3" id="em_travel_edit">
				<?php echo cmd_hook(array('mod'=>'var','item'=>'travel','name'=>'travel','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['user']->value['travel']),$_smarty_tpl);?>

				<span id='dtravel' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

		<!-- 联系资料 -->
		<div id="myTab_Content5" class="none">
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="4" align="center"><b>会员资料</b> (网站保密，不会公开)</td>
			  </tr>
			  <tr>
				<td class='hback_1' width='15%'>真实姓名 <span class='f_red'></span></td>
				<td class='hback' colspan="3" width='85%'><input type="text" name="realname" id="realname" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['realname'];?>
" /> <span id='drealname' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>身份证号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="idnumber" id="idnumber" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['idnumber'];?>
" /> <span id='didnumber' class='f_red'></span> <font color="#999999"> (不会公开，认证身份用)  </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>通信地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="address" id="address" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['address'];?>
" /> <span id='daddress' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>邮政编码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="zipcode" id="zipcode" class="input-s" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['zipcode'];?>
" /> <span id='dzipcode' class='f_red'></span> <font color="#999999"> (不会公开，网站赠送礼品用) </font></td>
			  </tr>

			  <tr>
				<td class='hback_yellow' colspan="4" align="center"><b>联系方式</b> (公开，需要会员组权限才能查看)</td>
			  </tr>
			  <tr>
				<td class='hback_1'>查看权限 <span class='f_red'></span></td>
				<td class='hback' colspan="3">
				<input type="radio" name="privacy" id="privacy" value="1"<?php if ($_smarty_tpl->tpl_vars['user']->value['privacy']=='1'){?> checked<?php }?> />任何人可见&nbsp;&nbsp;
				<input type="radio" name="privacy" id="privacy" value="2"<?php if ($_smarty_tpl->tpl_vars['user']->value['privacy']=='2'){?> checked<?php }?> />好友可见&nbsp;&nbsp;
				<input type="radio" name="privacy" id="privacy" value="3"<?php if ($_smarty_tpl->tpl_vars['user']->value['privacy']=='3'){?> checked<?php }?> />VIP会员可见&nbsp;&nbsp;
				<input type="radio" name="privacy" id="privacy" value="4"<?php if ($_smarty_tpl->tpl_vars['user']->value['privacy']=='4'){?> checked<?php }?> />保密&nbsp;&nbsp; <span id='dprivacy' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>手机号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="mobile" id="mobile" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mobile'];?>
" /> <span id='dmobile' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>电话号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="telephone" id="telephone" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['telephone'];?>
" /> <span id='dtelephone' class='f_red'></span></td>
			  </tr>

			  <tr>
				<td class='hback_1'>QQ号码 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="qq" id="qq" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
" /> <span id='dqq' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>MSN <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="msn" id="msn" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['msn'];?>
" /> <span id='dmsn' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Skype <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="skype" id="skype" class="input-100" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['skype'];?>
" /> <span id='dskype' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>Facebook <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="facebook" id="facebook" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['facebook'];?>
" /> <span id='dfacebook' class='f_red'></span></td>
			  </tr>
			  <tr>
				<td class='hback_1'>博客地址 <span class='f_red'></span></td>
				<td class='hback' colspan="3"><input type="text" name="homepage" id="homepage" class="input-txt" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['homepage'];?>
" /> <span id='dhomepage' class='f_red'></span></td>
			  </tr>

			</table>
		</div>

		<!-- 相册列表 -->
		<div id="myTab_Content6" class="none">
		<h3 class="subtitle">会员相册</h3>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
		  <thead class="tb-tit-bg">
		  <tr>
		    <th width="15%"><div class="th-gap">ID</div></th>
			<th width="20%"><div class="th-gap">照片</div></th>
			<th width="10%"><div class="th-gap">状态</div></th>
			<th width="20%"><div class="th-gap">上传时间</div></th>
			<th><div class="th-gap">操作</div></th>
		  </tr>
		  </thead>
		  <tfoot class="tb-foot-bg"></tfoot>
		  <?php $_smarty_tpl->tpl_vars['album'] = new Smarty_variable(vo_list("mod={album} where={v.userid='".((string)$_smarty_tpl->tpl_vars['user']->value['userid'])."'} num={10000}"), null, 0);?>
		  <?php if (empty($_smarty_tpl->tpl_vars['album']->value)){?>
		  <tr>
		    <td class='hback' colspan="5" align="center">该会员还没有相册</td>
		  </tr>
		  <?php }else{ ?>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <tr>
		    <td class='hback' align="center"><?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
</td>
		    <td class='hback' align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['uploadfiles'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['thumbfiles'];?>
" border="0" /></a></td>
			<td class='hback' align="center">
			<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']=='1'){?>
			<font color='green'>正常</font>
			<?php }else{ ?>
			<font color='#999999'>锁定</font>
			<?php }?>
			</td>
			<td class='hback' align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td class='hback' align="center"><a href="javascript:void(0);" onclick="tbox_setavatar('设置形象照', '<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
');" class="icon-add">设为形象照</a></td>
		  </tr>
		  <?php } ?>
		  <?php }?>
		</table>
		</div>

	  </div>
	  <!-- TabContent //-->
	  <div align="center"><input type="submit" name="btn_save" id="btn_save" value=" 编辑保存 " /></div>
	  </form>
	</div>
	<!-- tab//-->

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<!-- 修改密码 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="editpass"){?>
<div class="main-wrap">
  <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>修改会员密码</p></div>
  <?php }?>
  <div class="main-cont">
    <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
    <h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>修改会员密码</h3>
	<?php }?>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" onsubmit='return checkpassword();' />
    <input type="hidden" name="a" value="savepassword" />
	<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_c3' width='25%'>会 员 ID </td>
		<td class='hback_c1' width='75%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员名称 </td>
		<td class='hback_c1'><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员邮箱 </td>
		<td class='hback_c1'><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>新 密 码 <span class="f_red">*</span> </td>
		<td class='hback'><input type='password' name='password' id='password' class='input-150' /> <span id='dpassword' class='f_red'></span> <font color="#999999">(密码长度 6-16个字符)</font></td>
	  </tr>
	  <tr>
		<td class='hback_1'>确认密码 <span class="f_red">*</span> </td>
		<td class='hback'><input type='password' name='confirmpassword' id='confirmpassword' class='input-150' /> <span id='dconfirmpassword' class='f_red'></span> <font color="#999999">(密码长度 6-16个字符)</font></td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="2" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<!-- 修改内心独白 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="monolog"){?>
<div class="main-wrap">
  
  <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>修改内心独白</p></div>
  <?php }?>
  <div class="main-cont">
    <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>修改内心独白</h3>
	<?php }?>

    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" onsubmit='return checkmonolog();' />
    <input type="hidden" name="a" value="savemonolog" />
	<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_c3' width='20%'>会 员 ID </td>
		<td class='hback_c1' width='80%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员名称 </td>
		<td class='hback_c1'><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>会员邮箱 </td>
		<td class='hback_c1'><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>审核状态 <span class="f_red">*</span> </td>
		<td class='hback'>
		<select name="molstatus" id="molstatus">
		  <option value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['molstatus']=='0'){?> selected<?php }?>>请选择</option>
		  <option value="-2"<?php if ($_smarty_tpl->tpl_vars['user']->value['molstatus']=='-2'){?> selected<?php }?>>待审核</option>
		  <option value="-1"<?php if ($_smarty_tpl->tpl_vars['user']->value['molstatus']=='-1'){?> selected<?php }?>>未通过</option>
		  <option value="1"<?php if ($_smarty_tpl->tpl_vars['user']->value['molstatus']=='1'){?> selected<?php }?>>已通过</option>
		</select>
		<span id='dmolstatus' class='f_red'></span> <font color="#999999">(只有通过的内心独白，才能显示。)</font>
		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>内心独白 <span class="f_red">*</span> </td>
		<td class='hback'>
		<textarea name='monolog' id='monolog' style='width:95%;height:150px;overflow:auto;'><?php echo $_smarty_tpl->tpl_vars['user']->value['monolog'];?>
</textarea>
		<br />
        <span id='dmonolog' class='f_red'></span> <font color="#999999">(内心独白2000个字以内)</font></td>
	  </tr>
	  <tr>
		<td class='hback_none' colspan="2" align="center"><input type="submit" name="btn_save" class="button" value="更新保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<!-- 修改认证项目 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="rzmanage"){?>
<div class="main-wrap">
  
  <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>修改认证项目</p></div>
  <?php }?>
  <div class="main-cont">
	<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" class="btn-general"><span>返回列表</span></a>修改认证项目</h3>
	<?php }?>
    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" />
    <input type="hidden" name="a" value="saverz" />
	<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
	<table cellpadding='1' cellspacing='1' class='tab'>
	  <tr>
	    <td class='hback_c3' width='15%'>会 员 ID </td>
		<td class='hback_c1' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
</td>
		<td class='hback_c3' width='15%'>会员名称 </td>
		<td class='hback_c1' width='35%'><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
	  </tr>
	  <tr>
	    <td class='hback_c3'>认证星级 </td>
		<td class='hback_c1'><?php echo $_smarty_tpl->tpl_vars['user']->value['star'];?>
</td>
		<td class='hback_c3'>证件数量 </td>
		<td class='hback_c1'></td>
	  </tr>
	  <tr>
	    <td class='hback_1'>邮箱认证 </td>
		<td class='hback'>
		<font color="green"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</font>
		<br />
		<input type='radio' name='emailrz' id='emailrz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['emailrz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='emailrz' id='emailrz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['emailrz']=='0'){?> checked<?php }?> />未认证
		</td>
		<td class='hback_1'>手机认证</td>
		<td class='hback'>
		<?php if (empty($_smarty_tpl->tpl_vars['user']->value['mobile'])){?> <font color="#999999">未填写</font> <?php }else{ ?> <font color="green"><?php echo $_smarty_tpl->tpl_vars['user']->value['mobile'];?>
</font> <?php }?>
        <br />
		<input type='radio' name='mobilerz' id='mobilerz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['mobilerz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='mobilerz' id='mobilerz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['mobilerz']=='0'){?> checked<?php }?> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>身份证认证 </td>
		<td class='hback'>
		<input type='radio' name='idnumberrz' id='idnumberrz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['idnumberrz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='idnumberrz' id='idnumberrz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['idnumberrz']=='0'){?> checked<?php }?> />未认证
		</td>
		<td class='hback_1'>视频认证 </td>
		<td class='hback'>
		<input type='radio' name='videorz' id='videorz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['videorz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='videorz' id='videorz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['videorz']=='0'){?> checked<?php }?> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>身高认证 </td>
		<td class='hback'>
		<input type='radio' name='heightrz' id='heightrz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['heightrz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='heightrz' id='heightrz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['heightrz']=='0'){?> checked<?php }?> />未认证
		</td>
		<td class='hback_1'>婚史认证 </td>
		<td class='hback'>
		<input type='radio' name='marryrz' id='marryrz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['marryrz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='marryrz' id='marryrz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['marryrz']=='0'){?> checked<?php }?> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>收入认证 </td>
		<td class='hback'>
		<input type='radio' name='incomerz' id='incomerz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['incomerz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='incomerz' id='incomerz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['incomerz']=='0'){?> checked<?php }?> />未认证
		</td>
		<td class='hback_1'>学历认证 </td>
		<td class='hback'>
		<input type='radio' name='educationrz' id='educationrz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['educationrz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='educationrz' id='educationrz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['educationrz']=='0'){?> checked<?php }?> />未认证
		</td>
	  </tr>
	  <tr>
	    <td class='hback_1'>房产认证 </td>
		<td class='hback'>
		<input type='radio' name='houserz' id='houserz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['houserz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='houserz' id='houserz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['houserz']=='0'){?> checked<?php }?> />未认证
		</td>
		<td class='hback_1'>购车认证 </td>
		<td class='hback'>
		<input type='radio' name='carrz' id='carrz' value='1'<?php if ($_smarty_tpl->tpl_vars['user']->value['carrz']=='1'){?> checked<?php }?> />已认证，
		<input type='radio' name='carrz' id='carrz' value='0'<?php if ($_smarty_tpl->tpl_vars['user']->value['carrz']=='0'){?> checked<?php }?> />未认证
		</td>
	  </tr>

	  <tr>
		<td class='hback_none' colspan="4" align="center"><input type="submit" name="btn_save" class="button" value="编辑保存" /></td>
	  </tr>
	</table>
	</form>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>


<!-- VIP操作页面 -->
<?php if ($_smarty_tpl->tpl_vars['a']->value=="vip"){?>
<style type="text/css">
.nTab{width: 98%;height: auto;margin: 20px auto;border: 1px solid #dbe2e7;overflow: hidden;}
.none{display: none;}
.nTab .TabTitle li{float: left;cursor: pointer;height:28px;line-height:28px;text-align: center;width: 100px;}
.nTab .TabTitle li a{text-decoration: none;}
.nTab .TabTitle .active{background: #e5ecf0;font-size:13px;font-weight: bold;}
.nTab .TabTitle .normal{color: #336699;}
.nTab .TabContent{clear: both;overflow: hidden;background: #fff;padding: 5px;display: block;height: auto;}
</style>
<div class="main-wrap">
   
  <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
  <div class="path"><p>当前位置：用户管理<span>&gt;&gt;</span>会员管理<span>&gt;&gt;</span>VIP组操作</p></div>
  <?php }?>
  <div class="main-cont">    
    <?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
	<h3 class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user" class="btn-general"><span>返回列表</span></a>VIP组操作</h3>
	<?php }?>

	<table cellpadding='2' cellspacing='2' class='tab'>
	  <tr>
		<td class='hback_1' width='20%'>会员ID </td>
		<td class='hback' width='30%'><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
</td>
		<td class='hback_1' width='20%'>会员名称 </td>
		<td class='hback' width='30%'><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
 </td>
	  </tr>
	  <tr>
	    <td class='hback_1'>剩余(现金/金币) </td>
		<td class='hback'> <?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
</td>
		<td class='hback_1'>所在会员组 </td>
		<td class='hback'><?php echo $_smarty_tpl->tpl_vars['user']->value['levelimg'];?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['groupname'];?>
 </td>
	  </tr>
	</table>

	<div class="nTab">
	  <div class="TabTitle">
	    <ul id="myTab">
		  <li class="active" id='li_0' onclick="nTabs(this,0);">开通VIP组</li>
		  <li class="normal" id='li_1' onclick="nTabs(this,1);">操作VIP</li>
		  <li class="normal" id='li_2' onclick="nTabs(this,2);">取消VIP</li>
		</ul>
	  </div>

	  <div class="TabContent">
	    
		<!-- 开通VIP组 -->
		<div id="myTab_Content0" class="">
		    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" onsubmit="return checkopen();" />
			<input type="hidden" name="a" value="vipopen" />
			<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c1' colspan="2" align="center"><b>开通VIP会员组</b> (针对普通会员和VIP会员到期重新开通的操作)</td>
			  </tr>
			  <tr>
				<td class='hback_1'>VIP会员组 <span class='f_red'></span></td>
				<td class='hback'>
				  <table cellpadding='2' cellspacing='1' width="100%">
				    <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
				    <tr>
					  <td class="hback_c3" width="25%"><?php echo $_smarty_tpl->tpl_vars['volist']->value['groupname'];?>
</td>
					  <td class="hback" width="75%">
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['volist']->value['commer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					    <input type="radio" name="viptype" id="viptype" value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
_<?php echo $_smarty_tpl->tpl_vars['val']->value['orders'];?>
" />&nbsp;有效<?php echo $_smarty_tpl->tpl_vars['val']->value['days'];?>
天，需要现金(金币)<?php echo $_smarty_tpl->tpl_vars['val']->value['money'];?>
，赠送积分<?php echo $_smarty_tpl->tpl_vars['val']->value['points'];?>
<br />
						<?php } ?>
					  </td>
					</tr>
					<?php } ?>
				  </table>
				  <span id='dviptype' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>开通原因 <span class='f_red'>*</span></td>
				<td class='hback'><textarea name='opencontent' id='opencontent' style='width:60%;height:80px;display:;overflow:auto;'>开通{groupname}组，有效期到{enddate}。</textarea> <br /><font color="#999999">(描述下开通VIP会员组的原因)</font> <span id='dopencontent' class='f_red'></span></td>
			  </tr>
			  <tr>
			    <td class='hback_none'></td>
				<td class='hback_none'><input type="submit" name='btn_open' id='btn_open' value='确定开通' /></td>
			  </tr>
			</table>
			</form>
		</div>

	    
		<!-- 操作VIP -->
		<div id="myTab_Content1" class="none">
		    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" onsubmit="return checkhandle();" />
			<input type="hidden" name="a" value="viphandle" />
			<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c2' colspan="2" align="center"><b>操作VIP</b> (VIP会员延期或指定VIP天数的操作)</td>
			  </tr>
			  <tr>
				<td class='hback_1' width='20%'>VIP会员组 <span class='f_red'>*</span></td>
				<td class='hback' width='80%'>
				<select name="groupid" id="groupid">
				  <option value="">==请选择==</option>
				  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
				  <option value="<?php echo $_smarty_tpl->tpl_vars['volist']->value['groupid'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['groupname'];?>
</option>
				  <?php } ?>
				  </select>
				<span id='dgroupid' class='f_red'></span>
				</td>
			  </tr>
			  <tr>
				<td class='hback_1'>VIP日期 <span class='f_red'>*</span></td>
				<td class='hback'><input type="text" name="vipenddate" id="vipenddate" class="input-100" readonly onClick="WdatePicker();" /><span id='dvipenddate' class='f_red'></span>  <font color="#999999">(请设置VIP到期日期)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>扣除现金(金币) <span class='f_red'></span></td>
				<td class='hback'><input type="text" name="deductmoney" id="deductmoney" class="input-s" /> <span id='ddeductmoney' class='f_red'></span> <font color='#999999'>(不填写或者0表示不扣除)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>操作原因 <span class='f_red'>*</span></td>
				<td class='hback'><textarea name='rencontent' id='rencontent' style='width:60%;height:80px;display:;overflow:auto;'></textarea> <br /><font color='#999999'>描述下操作原因</font> <span id='drencontent' class='f_red'></span></td>
			  </tr>
			  <tr>
			    <td class='hback_none'></td>
				<td class='hback_none'><input type='submit' name='btn_handle' id='btn_handle' value='确定操作' /></td>
			  </tr>
			</table>
			</form>
		</div>


		<!-- 取消VIP会员组 -->
		<div id="myTab_Content2" class="none">
		    <form name="myform" id="myform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&fromtype=<?php echo $_smarty_tpl->tpl_vars['fromtype']->value;?>
" onsubmit="return checkcancel();" />
			<input type="hidden" name="a" value="vipcancel" />
			<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" />
			<table cellpadding='2' cellspacing='2' class='tab'>
			  <tr>
				<td class='hback_c3' colspan="2" align="center"><b>取消VIP会员组</b></td>
			  </tr>
			  <tr>
				<td class='hback_1' width='20%'>返还现金(金币) <span class='f_red'></span></td>
				<td class='hback' width='80%'><input type="text" name="returnmoney" id="returnmoney" class="input-s" /> <span id='dreturnmoney' class='f_red'></span> <font color="#999999">(不填写或者0表示不返还)</font></td>
			  </tr>
			  <tr>
				<td class='hback_1'>取消原因 <span class='f_red'>*</span></td>
				<td class='hback'><textarea name='cancelcontent' id='cancelcontent' style='width:60%;height:80px;display:;overflow:auto;'></textarea> <br /><font color='#999999'>简单描述取消VIP原因</font> <span id='dcancelcontent' class='f_red'></span></td>
			  </tr>
			  <tr>
			    <td class='hback_none'></td>
				<td class='hback_none'><input type='submit' name='btn_cancel' id='btn_cancel' value='确定取消' /></td>
			  </tr>
			</table>
			</form>
		</div>



	  </div>
	  <!-- TabContent //-->
	</div>

  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=='view'){?>
<!-- 查看会员信息 -->
<div class="main-wrap">
  <div class="main-cont">
	<table cellpadding='2' cellspacing='2' border='0' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">会员ID</td>
		<td class='hback_yellow' width="35%">
		<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>


		<?php if ($_smarty_tpl->tpl_vars['user']->value['flag']==1){?>
		<font color="green"><b>√</b></font>
		<?php }else{ ?>
		<font color="red"><b>×</b></font>
		<?php }?>
		<span id="tips_avatar" style="display:none;">
		<a href="javascript:void(0);" onclick="avatarhide();">隐藏头像</a><br />
		<?php echo $_smarty_tpl->tpl_vars['user']->value['useravatar'];?>

		</span>
		<span id="tips_avataropen">&nbsp;<a href="javascript:void(0);" onclick="avatarshow();">显示头像</a></span>
		</td>
		<td class='hback_1' width="15%">登录邮箱</td>
		<td class='hback_yellow' width="35%"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员信息</td>
		<td class='hback_yellow'>
		<?php echo $_smarty_tpl->tpl_vars['user']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</a>&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['user']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;
		  <?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['provinceid']),$_smarty_tpl);?>
&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['cityid']),$_smarty_tpl);?>
&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['distid']),$_smarty_tpl);?>

		</td>
		<td class='hback_1'>会员组</td>
		<td class='hback_yellow'><?php echo $_smarty_tpl->tpl_vars['user']->value['groupname'];?>
 <?php if ($_smarty_tpl->tpl_vars['user']->value['groupid']>1){?>(<?php echo $_smarty_tpl->tpl_vars['user']->value['vipenddate_t'];?>
)<?php }?></td>
	  </tr>
	  <tr>
		<td class='hback_1'>注册时间</td>
		<td class="hback_yellow"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['regtime'],"%Y-%m-%d %H:%M:%S");?>
&nbsp;&nbsp;<br /><?php echo $_smarty_tpl->tpl_vars['user']->value['regip'];?>
</td>
		<td class='hback_1'>登录时间</td>
		<td class="hback_yellow"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['logintime'],"%Y-%m-%d %H:%M:%S");?>
&nbsp;&nbsp;<br /><?php echo $_smarty_tpl->tpl_vars['user']->value['loginip'];?>
&nbsp;&nbsp;(<?php echo $_smarty_tpl->tpl_vars['user']->value['logintimes'];?>
)</td>
	  </tr>
	  <tr>
		<td class='hback_1'>金币</td>
		<td class="hback_yellow"><?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
</td>
		<td class='hback_1'>积分</td>
		<td class="hback_yellow"><?php echo $_smarty_tpl->tpl_vars['user']->value['points'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>可用短信</td>
		<td class="hback_yellow"><?php echo $_smarty_tpl->tpl_vars['user']->value['mbsms'];?>
条</td>
		<td class='hback_1'>生日</td>
		<td class="hback_yellow"><?php echo $_smarty_tpl->tpl_vars['user']->value['birthday'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value['lunar'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value['astro'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>婚史</td>
		<td class="hback_yellow"><?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['marrystatus']),$_smarty_tpl);?>
</td>
		<td class='hback_1'>交友类型</td>
		<td class="hback_yellow"><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['lovesort']),$_smarty_tpl);?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>身高</td>
		<td class="hback_yellow"><?php echo $_smarty_tpl->tpl_vars['user']->value['height'];?>
 CM</td>
		<td class='hback_1'>体重</td>
		<td class="hback_yellow"><?php echo $_smarty_tpl->tpl_vars['user']->value['weight'];?>
 公斤</td>
	  </tr>
	  <tr>
		<td class='hback_1'>月薪</td>
		<td class="hback_yellow"><?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['salary']),$_smarty_tpl);?>
</td>
		<td class='hback_1'>学历</td>
		<td class="hback_yellow"><?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['education']),$_smarty_tpl);?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>信息统计</td>
		<td class='hback_yellow' colspan='3'>
		相册(<?php echo cmd_count(array('mod'=>'user','type'=>'album','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		关注(<?php echo cmd_count(array('mod'=>'user','type'=>'listen','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		粉丝(<?php echo cmd_count(array('mod'=>'user','type'=>'fans','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		礼物(<?php echo cmd_count(array('mod'=>'user','type'=>'gift','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		日记(<?php echo cmd_count(array('mod'=>'user','type'=>'diary','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		微播(<?php echo cmd_count(array('mod'=>'user','type'=>'weibo','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		信件(<?php echo cmd_count(array('mod'=>'user','type'=>'message','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;
		问候(<?php echo cmd_count(array('mod'=>'user','type'=>'hi','value'=>$_smarty_tpl->tpl_vars['user']->value['userid']),$_smarty_tpl);?>
)&nbsp;&nbsp;

		</td>
	  </tr>
	  <tr>
		<td class='hback_1'>内心独白</td>
		<td class='hback_yellow' colspan='3'><div class="monolog"><?php echo $_smarty_tpl->tpl_vars['user']->value['monolog'];?>
</div></td>
	  </tr>

	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['a']->value=='avatar'){?>
<!-- 管理头像 -->
<div class="main-wrap">
  <div class="main-cont">
	<table cellpadding='2' cellspacing='2' border='0' class='tab'>
	  <tr>
		<td class='hback_1' width="15%">会员ID</td>
		<td class='hback' width="35%">
		<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>

		<?php if ($_smarty_tpl->tpl_vars['user']->value['flag']==1){?>
		<font color="green"><b>√</b></font>
		<?php }else{ ?>
		<font color="red"><b>×</b></font>
		<?php }?>
		<span id="tips_avatar" style="display:block;">
		<br />
		<?php if (!empty($_smarty_tpl->tpl_vars['user']->value['avatar'])){?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" />
		<?php }?>
		</span>
		</td>
		<td class='hback_1' width="15%">登录邮箱</td>
		<td class='hback' width="35%"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
	  </tr>
	  <tr>
		<td class='hback_1'>会员信息</td>
		<td class='hback'>
		<?php echo $_smarty_tpl->tpl_vars['user']->value['levelimg'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=home&uid=<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</a>&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['user']->value['gender']==1){?>男<?php }else{ ?>女<?php }?>&nbsp;
		  <?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['provinceid']),$_smarty_tpl);?>
&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['cityid']),$_smarty_tpl);?>
&nbsp;<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['user']->value['distid']),$_smarty_tpl);?>

		  <br />
		  <?php echo $_smarty_tpl->tpl_vars['user']->value['birthday'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value['lunar'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value['astro'];?>

		</td>
		<td class='hback_1'>头像状态 </td>
		<td class='hback'>
		<?php if ($_smarty_tpl->tpl_vars['user']->value['avatarflag']=='-2'){?>
		<font color="gray">待审核</font>
		<?php }elseif($_smarty_tpl->tpl_vars['user']->value['avatarflag']=='-1'){?>
		<font color="red">未通过</font>
		<?php }elseif($_smarty_tpl->tpl_vars['user']->value['avatarflag']=='1'){?>
		<font color="green">已通过</font>
		<?php }else{ ?>
		<font color="gray">未上传</font>
		<?php }?>
		</td>
	  </tr>
	  <tr>
	    <td colspan='4' class='hback_none' align='center' height="35px">
		操作：
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=passavatar&id[]=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&fromtype=jdbox">通过</a>&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=unpassavatar&id[]=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&fromtype=jdbox">未通过</a>&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['cpfile']->value;?>
?c=user&a=delavatar&id[]=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&fromtype=jdbox">删除</a>
		</td>
	  </tr>
	</table>
  </div>
  <div style="clear:both;"></div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['fromtype']->value!='jdbox'){?>
<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('adm_footer'), null, 0);?>
<?php }?>
</body>
</html>
<script type="text/javascript">
function nTabs(thisObj, Num) {
	if (thisObj.className == "active") return;
	var tabList = document.getElementById("myTab").getElementsByTagName("li");
	for (i = 0; i < tabList.length; i++) {
		//点击之后，其他tab变成灰色，内容隐藏，只有点击的tab和内容有属性
		if (i == Num) {
			thisObj.className = "active";
			document.getElementById("myTab_Content" + i).style.display = "block";
		} else {
			tabList[i].className = "normal";
			document.getElementById("myTab_Content" + i).style.display = "none";
		}
	}
}


//判断添加
function checkadd() {
	var t = "";
	var v = "";

	t = "email";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("邮箱不能为空", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "username";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("用户名不能为空", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "password";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("密码不能为空", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}
	else {
		if($('#confirmpassword').val() != v) {
			dmsg("确认密码不正确", 'confirmpassword');
			nTabs('li_0', 0);
			$('#confirmpassword').focus();
			return false;
		}
	}

	t = "gender";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择性别", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageyear";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日年份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "agemonth";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日月份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageday";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日日期", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "marrystatus";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择婚姻状态", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择交友类型", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择月薪", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "monolog";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请填写内心独白", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "education";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择学历", t);
		nTabs('li_2', 2);
		$('#'+t).focus();
		return false;
	}

	return true;
}


//判断编辑
function checkedit() {

	var t = "";
	var v = "";

	t = "gender";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择性别", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageyear";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日年份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "agemonth";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日月份", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "ageday";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择生日日期", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "marrystatus";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择婚姻状态", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择交友类型", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择月薪", t);
		nTabs('li_0', 0);
		$('#'+t).focus();
		return false;
	}

	t = "education";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择学历", t);
		nTabs('li_2', 2);
		$('#'+t).focus();
		return false;
	}

	return true;


}

//修改密码
function checkpassword() {
	var t = "";
	var v = "";

	t = "password";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("密码不能为空", t);
		$('#'+t).focus();
		return false;
	}
	else {
		if($('#confirmpassword').val() != v) {
			dmsg("确认密码不正确", 'confirmpassword');
			$('#confirmpassword').focus();
			return false;
		}
	}
	return true;
}

//修改内心独白
function checkmonolog() {
	var t = "";
	var v = "";

	t = "monolog";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("内心独白不能为空", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//开通VIP
function checkopen() {
	var t = "";
	var v = "";

	t = 'viptype';
	var item = $("input[name='viptype']:checked");
	var len  = item.length;
	if(len==0) {
		dmsg('请选择要开通的VIP会员组', t);
		return false;
	}

	t = "opencontent";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请填写开通VIP原因", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//操作VIP
function checkhandle() {
	var t = "";
	var v = "";

	t = "groupid";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请选择会员组", t);
		$('#'+t).focus();
		return false;
	}

	t = "vipenddate";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请设置VIP期限", t);
		$('#'+t).focus();
		return false;
	}

	t = "rencontent";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请填写操作原因", t);
		$('#'+t).focus();
		return false;
	}


	return true;
}

//取消VIP
function checkcancel() {
	var t = "";
	var v = "";

	t = "cancelcontent";
	v = $("#"+t).val();
	if(v == '') {
		dmsg("请填写取消VIP的原因", t);
		$('#'+t).focus();
		return false;
	}
	return true;
}

//显示隐藏头像
function avatarhide(){
    $("#tips_avatar").hide();
	$("#tips_avataropen").show();
}
function avatarshow(){
    $("#tips_avatar").show();
	$("#tips_avataropen").hide();
}

</script><?php }} ?>