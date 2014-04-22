<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 16:20:16
         compiled from "C:\svn\z17z17\web\z17\tpl\user\album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93835354e779c19c23-73852616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efb39a2ffd39e705e39c9264c31cede0dd4d2606' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\album.tpl',
      1 => 1398154806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93835354e779c19c23-73852616',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354e779d34798_41043274',
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'a' => 0,
    'ucfile' => 0,
    'total' => 0,
    'g' => 0,
    'cannums' => 0,
    'album' => 0,
    'volist' => 0,
    'showpage' => 0,
    'halttype' => 0,
    'ucpath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354e779d34798_41043274')) {function content_5354e779d34798_41043274($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("album", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="user_main">
  <div class="main_right">
    <div class="div_">我的相册</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album">我的相册</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='upload'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album&a=upload">上传相册</a></li>
		  <li class="tab_item"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=avatar">设置形象照</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    
	<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
	<!--div_smallnav_content_hover Begin-->
	<div class="div_smallnav_content_hover">
	  <div class="nav-tips">
		您已经上传了 [<font color='green'><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</font>] 张，
		<?php if ($_smarty_tpl->tpl_vars['g']->value['photo']['photolimit']==1){?>
		还可以上传[<font color="blue"><?php echo $_smarty_tpl->tpl_vars['cannums']->value;?>
</font>]张
		<?php }else{ ?>
		还可以继续上传，不受限制。
		<?php }?>
	  </div>
	  <?php if (empty($_smarty_tpl->tpl_vars['album']->value)){?>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td align="center">对不起，你还没有任何相册！</td>
		</tr>
	  </table>
	  <?php }else{ ?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	  <div class="photo_item">
        <div class="photo_img"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['thumbfiles'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
" /></div>
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']=='1'){?>
		<font color="green">审核通过</font>
		<?php }else{ ?>
		<font color="grad">待审/锁定</font>
		<?php }?>		
        <div class="photo_conl"> 
		<a href="###" onClick="artbox_edit_album('<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
');">编辑</a> <a href="###" onclick="album_del('<?php echo $_smarty_tpl->tpl_vars['volist']->value['photoid'];?>
');">删除</a> <a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=avatar&a=setavatar&url=<?php echo urlencode($_smarty_tpl->tpl_vars['volist']->value['avatarurl']);?>
">设为形象照</a>
		</div>
		<div class="clear"></div>
      </div>
	  <?php } ?>
      <?php }?>
	<div class="clear"></div>
	</div>
    <div class="clear"></div>
    <?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
    <div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
    <?php }?>
	<!--//div_smallnav_content_hover End-->
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['a']->value=='upload'){?>
    <div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>上传相册</p><span class="shadow"></span></div>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album&a=saveupload&uploadpart=sf_upfile" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
	  <input type="hidden" name="halttype" value="<?php echo $_smarty_tpl->tpl_vars['halttype']->value;?>
" />
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td colspan="2"><div class="nav-tips">请上传您的单人真实照片，要求五官清晰。 </div></td>
		</tr>
		<tr>
		  <td class="lblock" width="20%">照片描述 </td>
		  <td class="rblock" width="80%">
		    <input type="text" name="title" id="title" class="input-txt">
			<span id="dtitle" class="f_red"></span>
		  </td>
		</tr>
		<!-- 选择照片 -->
		<tr>
		  <td class="lblock">选择照片 <span class="f_red">*</span></td>
		  <td class="rblock"><input name="sf_upfile" type="file" class="filePrew" id="sf_upfile">
			<span id="dsf_upfile" class="f_red"></span></td>
		</tr>
		<!-- 上传按钮 -->
		<tr id="id_uploadbox">
		  <td class="lblock"></td>
		  <td class="rblock"><input type="button" id="btn_upload" value="开始上传" class="button-green" /></td>
		</tr>
		<!-- 上传提示 -->
		<tr id="id_loadingbar" style="display:none;">
		  <td class="lblock"></td>
		  <td class="rblock"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/uploading.gif" width="220" height="19" border="0"> 照片上传中，请稍后...</td>
		</tr>
		<tr>
		  <td colspan="2" align="left">
		    <div style="line-height:24px;">
			 <strong>温馨提示：</strong><br>
			  点击浏览，选择您想要上传作为形象照的照片；<br>
			  仅支持PNG，JPG，JPEG，GIF格式，5M以下文件；<br>
			  请上传您的单人真实照片，要求五官清晰。请勿上传明星、名人或他人照片，您将对此负法律责任；<br>
			  如果您的照片被会员投诉为假照片，经查实会将您列入网站黑名单，以后都将无法注册和登录。 
			</div>
		  </td>
		</tr>
	  </table>
	  </form>
	</div>
	<!--//div_smallnav_content_hover End-->
	<?php }?>

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album">我的相册</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=album&a=upload">上传相册</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=avatar">设置形象照</a></li>
    </ul>
  </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type="text/javascript">
$(function(){
	$("#btn_upload").click(function(){
		//选择图片
		if ($('#sf_upfile').val() == '') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请选择要上传的照片', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		//格式错误
		if (false == validImageType($('#sf_upfile').val())) {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '图片格式不正确，只能上传jpg,jpeg,png和gif格式图片。', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		//提交执行
		$('#id_uploadbox').hide();
		$('#id_loadingbar').show();
		$('#upload_form').submit();
		return true;
	});
});

//删除
function album_del(id){
	$.dialog({
		lock:true,
		title: '提示',
		content: '确定要删除吗？', 
		icon: 'warning',
		button: [
			{
				name: '确定',
				callback: function () {
					top.window.location = _ROOT_PATH + "usercp.php?c=album&a=del&id="+id;
				}
			}, 
			{
				name: '取消'
			}
		]
	});
}
</script>
<?php }} ?>