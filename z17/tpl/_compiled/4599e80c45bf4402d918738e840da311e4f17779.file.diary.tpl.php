<?php /* Smarty version Smarty-3.1.14, created on 2014-03-23 20:54:43
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\user\diary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8540532ed993516ce8-21344262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4599e80c45bf4402d918738e840da311e4f17779' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\user\\diary.tpl',
      1 => 1390555260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8540532ed993516ce8-21344262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uctplpath' => 0,
    'a' => 0,
    'ucfile' => 0,
    'diary' => 0,
    'volist' => 0,
    'ucpath' => 0,
    'page' => 0,
    'showpage' => 0,
    'urlpath' => 0,
    'comeurl' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532ed9936821a9_29465511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ed9936821a9_29465511')) {function content_532ed9936821a9_29465511($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["cp_menuid"] = new Smarty_variable("diary", null, 0);?>
<style>
.diary_item{margin-top:10px;margin-bottom:20px; position: relative;}
.diary_item .item_left{background:#f0f0f0;border:0px dashed #ccc; border-right:0px; padding:16px; float:left;}
.diary_item .item_right{border:0px dashed #ccc; border-left:0px; padding-left:10px; float:left; line-height:24px; width:669px;}
.item_right m{color:gray; margin-right:10px;}
.diary_gn{top: -12px; right: 10px;padding: 10px;position: absolute; display:none;}
.diary_gn a{color:#3e8ac0;}
.diary_content{line-height:20px; color:gray; margin-top:3px;}

.write_diary_time{border-bottom:1px solid #e1e1e1; padding:10px 0px;}
.write_diary_time a{border:1px solid #e1e1e1; background:#e1e1e1; padding:3px 10px; float:left; line-height:20px; margin-bottom:10px;}
.my_weather{position: absolute; border:1px solid #e1e1e1; background:#FFF; padding:0px 10px; top:40px; display:none;}
.my_mood{position: absolute; border:1px solid #e1e1e1; background:#FFF; padding:0px 10px; display:none;}
.sub_w_cl li{float:left; margin-left:10px; margin-right:0px; border:1px solid #ccc; padding:3px; 0px; width:80px; line-height:20px; cursor:pointer; text-align:center;}
.sub_m_cl li{float:left; margin-left:10px; margin-right:0px; border:1px solid #ccc; padding:3px; 10px; line-height:20px; cursor:pointer;}
</style>
<script type="text/javascript">
	$(function () {
		$(".item_right").bind({
			mouseover: function () {
				$("#" + $(this).attr("id") + "_cz").show();
			},
			mouseout: function () {
				$("#" + $(this).attr("id") + "_cz").hide();
			}
		});
	});
</script>
<div class="user_main">
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 我的日记</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary">我的日记</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='add'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary&a=add">发表日记</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='edit'){?> current<?php }?>">编辑日记</li>
		</ul>
	  </div>
    </div>
	<!--TAB END-->
	
	<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?>
    <div class="div_smallnav_content_hover">
	  <?php if (empty($_smarty_tpl->tpl_vars['diary']->value)){?>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td align="center">对不起，你还没写日记。</td>
		</tr>
	  </table>
	  <?php }else{ ?>
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
      <div class="diary_item">
        <div class="item_left">
		<?php if ($_smarty_tpl->tpl_vars['volist']->value['diaryopen']=='1'){?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/unlock.png" title="公开" toc="unlock" />
		<?php }else{ ?>
		<img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/lock.png" title="仅自己查看" toc="lock" />
		<?php }?>
		</div>
        <div class="item_right" id="mydiary_<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
">
          <m>[<?php echo $_smarty_tpl->tpl_vars['volist']->value['catname'];?>
]</m>
          <strong><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</strong>&nbsp;&nbsp;&nbsp;&nbsp;<span class="cc"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['timeline'],"%Y-%m-%d %H:%M");?>
</span>&nbsp;&nbsp;&nbsp;
		  (
		  <?php if ($_smarty_tpl->tpl_vars['volist']->value['flag']=='1'){?>
		  <font color='green'>已通过</font>
		  <?php }else{ ?>
		  <font color='red'>待审核/锁定</font>
		  <?php }?>
		  )
		  
          <div class="diary_content"><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['content'],100);?>
...</div>
          <div class="diary_gn" id="mydiary_<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
_cz">浏览(<?php echo $_smarty_tpl->tpl_vars['volist']->value['hits'];?>
)&nbsp;&nbsp;&nbsp;评论(<?php echo $_smarty_tpl->tpl_vars['volist']->value['commentcount'];?>
)&nbsp;&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">编辑</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="diary_del('<?php echo $_smarty_tpl->tpl_vars['volist']->value['diaryid'];?>
');">删除</a></div>
        </div>
        <div class="clear"></div>
      </div>
	  <?php } ?>
	  <?php }?>

    </div>
	<?php if ($_smarty_tpl->tpl_vars['showpage']->value!=''){?>
	<div class="page_digg" style="margin-top:15px"><?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>
</div>
	<div class="clear"></div>
	<?php }?>
	<?php }?>
	

	<?php if ($_smarty_tpl->tpl_vars['a']->value=='add'){?>
    <div class="div_smallnav_content_hover">
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary" method="post">
	  <input type="hidden" name="a" id="a" value="saveadd" />
      <div style="background:#FEFCE7; padding:5px;margin-top:10px;margin-bottom:10px;"> 
	    日记分类：
        <?php echo cmd_hook(array('mod'=>'diarycategory','type'=>'select','name'=>'catid','text'=>'=请选择='),$_smarty_tpl);?>

        &nbsp;&nbsp;&nbsp;
		阅读权限：
        <select name="diaryopen" id="diaryopen">
          <option value="1">公开</option>
          <option value="0">仅自己看</option>
        </select>
	    &nbsp;&nbsp;&nbsp;
		天气：<?php echo cmd_hook(array('mod'=>'var','item'=>'weather','name'=>'weather','type'=>'select','text'=>''),$_smarty_tpl);?>

		&nbsp;&nbsp;&nbsp;
		心情：<?php echo cmd_hook(array('mod'=>'var','item'=>'feel','name'=>'feel','type'=>'select','text'=>''),$_smarty_tpl);?>

      </div>
      <div style="background:url(<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/81177_bg.jpg); text-align:center;">
        <input type="text" style="width:90%;font-size:24px; background-color: transparent; border:0px; margin-top:30px; text-align:center;font-family: 微软雅黑; box-shadow: 0px 0px 0px #F0F0F0;" name="title" id="title" value="请在这里输入日记标题" onclick="del_title();" onblur="attr_title();" />
        <div style="margin:20px 10px 10px 10px; padding-top:20px; border-top:1px dashed Gray;">
          <textarea rows="1" tabindex="1" style="width:100%; height:500px; font-size:13px; background-color: transparent; border:0px; margin-top:20px; font-family: 微软雅黑; line-height:25px; overflow:auto;" name="content" id="content" onclick="del_content();" onblur="attr_content();">请在这里写日记...</textarea>
        </div>
      </div>
      <div style="margin-top:10px;">
        <input type="button" name="btn_save" id="btn_save" value="发表日记" class="button-red" />&nbsp;&nbsp;
		<input type="button" name="btn_return" id="btn_return" value="返回列表" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=diary';" class="button-coff" />
      </div>
      <div class="clear"> </div>
	  </form>
    </div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['a']->value=='edit'){?>
    <div class="div_smallnav_content_hover">
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary&<?php echo $_smarty_tpl->tpl_vars['comeurl']->value;?>
" method="post">
	  <input type="hidden" name="a" id="a" value="saveedit" />
	  <input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
      <div style="background:#FEFCE7; padding:5px;margin-top:10px;margin-bottom:10px;"> 
	    日记分类：
        <?php echo cmd_hook(array('mod'=>'diarycategory','name'=>'catid','type'=>'select','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['diary']->value['catid']),$_smarty_tpl);?>

        &nbsp;&nbsp;&nbsp;
		阅读权限：
        <select name="diaryopen" id="diaryopen">
          <option value="1"<?php if ($_smarty_tpl->tpl_vars['diary']->value['diaryopen']=='1'){?> selected<?php }?>>公开</option>
          <option value="0"<?php if ($_smarty_tpl->tpl_vars['diary']->value['diaryopen']=='0'){?> selected<?php }?>>仅自己看</option>
        </select>
	    &nbsp;&nbsp;&nbsp;
		天气：<?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'weather','name'=>'weather','text'=>'','value'=>$_smarty_tpl->tpl_vars['diary']->value['weather']),$_smarty_tpl);?>

		&nbsp;&nbsp;&nbsp;
		心情：<?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'feel','name'=>'feel','text'=>'','value'=>$_smarty_tpl->tpl_vars['diary']->value['feel']),$_smarty_tpl);?>

      </div>
      <div style="background:url(<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/81177_bg.jpg); text-align:center;">
        <input type="text" style="width:90%;font-size:24px; background-color: transparent; border:0px; margin-top:30px; text-align:center;font-family: 微软雅黑; box-shadow: 0px 0px 0px #F0F0F0;" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['diary']->value['title'];?>
" onclick="del_title();" onblur="attr_title();" />
        <div style="margin:20px 10px 10px 10px; padding-top:20px; border-top:1px dashed Gray;">
          <textarea rows="1" tabindex="1" style="width:100%; height:500px; font-size:13px; background-color: transparent; border:0px; margin-top:20px; font-family: 微软雅黑; line-height:25px; overflow:auto;" name="content" id="content" onclick="del_content();" onblur="attr_content();"><?php echo $_smarty_tpl->tpl_vars['diary']->value['content'];?>
</textarea>
        </div>
      </div>
      <div style="margin-top:10px;">
        <input type="button" name="btn_save" id="btn_save" value="编辑日记" class="button-red" />&nbsp;&nbsp;
		<input type="button" name="btn_return" id="btn_return" value="返回列表" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=diary';" class="button-coff" />
      </div>
      <div class="clear"> </div>
	  </form>
    </div>
	<?php }?>

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary">我的日记</a></li>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary&a=add">发表日记</a></li>
	</ul>
  </div>
  <div style="margin:30px;"></div>
</div>
<!--//user_main End-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type="text/javascript">
$(function(){
	//添加、编辑保存
	$("#btn_save").click(function(){
		//标题
		if ($('#catid').val() == '') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请选择日记分类', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		//标题
		if ($('#title').val() == '' || $('#title').val() == '请在这里输入日记标题') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请填写日记标题', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		//内容
		if ($('#content').val() == '' || $('#content').val() == '请在这里写日记...') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请填写日记内容', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}		
		$('#myform').submit();
		return true;
	});

});


//标题
function del_title() {
	var title = $("#title").val();
	if (title == '请在这里输入日记标题') {
		$("#title").val("");
	}
}
function attr_title() {
	var title = $("#title").val();
	if (title == '') {
		$("#title").val("请在这里输入日记标题");
	}
}
//内容
function del_content() {
	var content = $("#content").val();
	if (content == '请在这里写日记...') {
		$("#content").val("");
	}
}
function attr_content() {
	var content = $("#content").val();
	if (content == '') {
		$("#content").val("请在这里写日记...");
	}
}

//删除
function diary_del(id){
	$.dialog({
		lock:true,
		title: '信息提示',
		content: '确定要删除吗？', 
		icon: 'warning',
		button: [
			{
				name: '确定',
				callback: function () {
					top.window.location = "<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=diary&a=del&id="+id;
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