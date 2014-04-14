<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="album"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->
  <div class="main_right">
    <div class="div_">个人中心 &gt;&gt; 我的相册</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<!--{if $a == 'run'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=album">我的相册</a></li>
		  <li class="tab_item<!--{if $a == 'upload'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=album&a=upload">上传相册</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=avatar">设置形象照</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    
	<!--{if $a == 'run'}-->
	<!--div_smallnav_content_hover Begin-->
	<div class="div_smallnav_content_hover">
	  <div class="nav-tips">
		您已经上传了 [<font color='green'><!--{$total}--></font>] 张，
		<!--{if $g.photo.photolimit == 1}-->
		还可以上传[<font color="blue"><!--{$cannums}--></font>]张
		<!--{else}-->
		还可以继续上传，不受限制。
		<!--{/if}-->
	  </div>
	  <!--{if empty($album)}-->
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td align="center">对不起，你还没有任何相册！</td>
		</tr>
	  </table>
	  <!--{else}-->
	  <!--{foreach $album as $volist}-->
	  <div class="photo_item">
        <div class="photo_img"><img src="<!--{$volist.thumbfiles}-->" alt="<!--{$volist.title}-->" title="<!--{$volist.title}-->" /></div>
		<!--{if $volist.flag=='1'}-->
		<font color="green">审核通过</font>
		<!--{else}-->
		<font color="grad">待审/锁定</font>
		<!--{/if}-->		
        <div class="photo_conl"> 
		<a href="###" onClick="artbox_edit_album('<!--{$volist.photoid}-->');">编辑</a> <a href="###" onclick="album_del('<!--{$volist.photoid}-->');">删除</a> <a href="<!--{$ucfile}-->?c=avatar&a=setavatar&url=<!--{$volist.avatarurl|urlencode}-->">设为形象照</a>
		</div>
		<div class="clear"></div>
      </div>
	  <!--{/foreach}-->
      <!--{/if}-->
	<div class="clear"></div>
	</div>
    <div class="clear"></div>
    <!--{if $showpage!=""}-->
    <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
    <!--{/if}-->
	<!--//div_smallnav_content_hover End-->
	<!--{/if}-->

	<!--{if $a == 'upload'}-->
    <div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>上传相册</p><span class="shadow"></span></div>
	  <form action="<!--{$ucfile}-->?c=album&a=saveupload&uploadpart=sf_upfile" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
	  <input type="hidden" name="halttype" value="<!--{$halttype}-->" />
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
		  <td class="rblock"><img src="<!--{$ucpath}-->images/uploading.gif" width="220" height="19" border="0"> 照片上传中，请稍后...</td>
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
	<!--{/if}-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=album">我的相册</a></li>
      <li><a href="<!--{$ucfile}-->?c=album&a=upload">上传相册</a></li>
      <li><a href="<!--{$ucfile}-->?c=avatar">设置形象照</a></li>
    </ul>
  </div>

</div>
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
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
