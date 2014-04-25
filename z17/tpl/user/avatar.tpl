<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="menuid" value="avatar"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div class="user_main">
  <div class="main_right">
    <div class="div_">设置形象照</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=album">我的相册</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=album&a=upload">上传相册</a></li>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=avatar">设置形象照</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
    
	<!--{if $a == 'run'}-->
	<!--div_smallnav_content_hover Begin-->
	<div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>设置形象照</p><span class="shadow"></span></div>
	  <div class="nav-tips">温馨提示：[√]表示审核通过，[X]表示审核未通过，[?]表示审核中。请上传您的单人真实照片，要求五官清晰。</div>
	    
		<form action="<!--{$ucfile}-->?c=avatar&a=saveupload&uploadpart=uploadpart" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
		  <tr>
		    <td class="lblock" align="center" width="20%">
			<!--{if !empty($u.avatar)}-->
			<div style="padding:5px;border:1px solid #DDD;width:112px;height:135px;">
			<img src="<!--{$urlpath}--><!--{$u.avatar}-->" width="112px" height="135" />
			</div>
			<!--{else}-->
			<!--{$u.useravatar}-->
			<!--{/if}-->
			当前形象照
			</td>
		    <td class="rblock" valign="top">
			  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
			    <!-- 状态 -->
			    <tr>
				  <td width="15%" class="lblock">审核状态：</td>
				  <td class="rblock">
				  <!--{if $u.avatar != ''}-->
				      <!--{if $u.avatarflag == '1'}-->
					  <img src="<!--{$uctplpath}-->images/ok.gif" /> <font color="green">审核通过</font>
					  <!--{elseif $u.avatarflag == '-2'}-->
					  <img src="<!--{$uctplpath}-->images/icn_time.gif" /> <font color="gray">头像审核中</font> 
					  <!--{elseif $u.avatarflag == '-1'}-->
					  <img src="<!--{$uctplpath}-->images/cuo.gif" /> <font color="red">未通过审核</font> 
					  <!--{/if}-->
				  <!--{else}-->
				  还没设置形象照
				  <!--{/if}-->
				  </td>
				</tr>
				<!-- 删除 -->
			    <tr>
				  <td class="lblock">删除操作：</td>
				  <td class="rblock">
				  <!--{if $u.avatar != ''}-->
				  <a class="btn_c2" href="<!--{$ucfile}-->?c=avatar&a=del" onClick="{if(confirm('确定要删除吗')){return true;} return false;}"><span>删除</span></a> 
				  <!--{/if}-->
				  &nbsp;
				  </td>
				</tr>
				<!-- 上传形象照 -->
			    <tr>
				  <td class="lblock">上传头像：<span class="f_red">*</span></td>
				  <td class="rblock"><input name="uploadpart" type="file" class="filePrew" id="uploadpart" /> <span id="duploadpart" class="f_red"></span></td>
				</tr>
				<tr>
				  <td colspan="2" height="20"></td>
				</tr>
				<!-- 上传按钮 -->
			    <tr id="id_uploadbox">
				  <td class="lblock"></td>
				  <td class="rblock">
				    <input type="button" id="btn_upload" value="开始上传" class="button-red" />&nbsp;&nbsp;&nbsp;
					<input type="button" id="btn_select" value="从相册选择形象照" class="button-green" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=album';" />
				  </td>
				</tr>
				<!-- 上传进度 -->
				<tr id="id_loadingbar" style="display:none">
				  <td class="left" class="lblock">上传头像：</td>
				  <td class="right" class="rblock"><img src="<!--{$uctplpath}-->images/uploading.gif" alt="照片上传中" width="220" height="19" border="0" />照片上传中，请稍等...</td>
				</tr>
			  </table>
			</td>
		  </tr>
		</table>
		</form>
		
		<table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
		  <tr>
		    <td>
			<br />
			<b>温馨提示：</b><br />
			点击浏览，选择您想要上传作为形象照的照片；<br />
			仅支持PNG，JPG，JPEG，GIF格式，5M以下文件；<br />
			请上传您的单人真实照片，要求五官清晰。请勿上传明星、名人或他人照片，您将对此负法律责任；<br />
			如果您的照片被会员投诉为假照片，经查实会将您列入网站黑名单，以后都将无法注册和登录。
			</td>
		  </tr>
		</table>
<script type="text/javascript">
$(function(){
	$("#btn_upload").click(function(){
		//选择图片
		if ($('#uploadpart').val() == '') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请选择要上传的头像照片', 
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
		if (false == validImageType($('#uploadpart').val())) {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '头像照片格式不正确，只能上传jpg,jpeg,png和gif格式的图片。', 
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
function avatar_del(id){
	$.dialog({
		lock:true,
		title: '提示',
		content: '确定要删除吗？', 
		icon: 'warning',
		button: [
			{
				name: '确定',
				callback: function () {
					top.window.location = _ROOT_PATH + "usercp.php??c=album&a=del&id="+id;
				}
			}, 
			{
				name: '取消'
			}
		]
	});
}
</script>
	</div>
	<!--//div_smallnav_content_hover End-->
	<!--{/if}-->

	<!--{if $a == 'setavatar'}-->
	<script type="text/javascript" src="<!--{$urlpath}-->tpl/static/js/cropper/cropper.min.js"></script>
	<script type="text/javascript" src="<!--{$urlpath}-->tpl/static/js/cropper/drag.min.js"></script>
	<script type="text/javascript" src="<!--{$urlpath}-->tpl/static/js/cropper/resize.min.js"></script>
	<link rel="stylesheet" href="<!--{$urlpath}-->tpl/static/js/cropper/default.css" />
    <div class="div_smallnav_content_hover">
	  <div class="item_title item_margin"><p>设置形象照</p><span class="shadow"></span></div>
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		<tr>
		  <td colspan="2"><div class="nav-tips">您可以将需要的部分拖到白色形象框内，以裁切出满意的形象照。 </div></td>
		</tr>
		<tr>
		  <td colspan="2">

			<table width="600px" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="300px" align="center" valign="top">
				  <div id="bgDiv">
					<div id="dragDiv">
					  <div id="rRightDown"> </div>
					  <div id="rLeftDown"> </div>
					  <div id="rRightUp"> </div>
					  <div id="rLeftUp"> </div>
					  <div id="rRight"> </div>
					  <div id="rLeft"> </div>
					  <div id="rUp"> </div>
					  <div id="rDown"></div>
					</div>
				  </div>
				  <br />
				</td>
				<td align="center" valign="top">
				  <table width="90%" border="0" cellspacing="0" cellpadding="0" class="user-table table-margin lh25" style="margin-left:10px;">
					<tr>
					  <td class="dragTable"><div id="viewDiv" style="width:<!--{$config.avatarwidth}-->px; height:<!--{$config.avatarheight}-->px;"></div></td>
					</tr>
					<tr>
					  <td><b>效果预览</b></td>
					</tr>
					<tr>
					  <td><font color="#999999">形象照大小为<!--{$config.avatarwidth}-->x<!--{$config.avatarheight}-->像素</font></td>
					</tr>
					<tr>
					  <td align="left">
						1、请上传您的单人真实照片，要求五官清晰，近期生活照片，确保审核通过；<br />
						2、请勿上传：非本人、戴墨镜、戴口罩、侧面、背影、与现年龄不符、多人合影、裸露、带有政治色彩等照片，否则将予以删除；<br />
						3、请勿上传模糊、非主流、明星、网络红人、低俗暴力等照片，否则将予以删除。
					  </td>
					</tr>
					<tr>
					  <td align="center" height="60px">
					  <input type="button" value="裁剪保存" onclick="cutImage();" style="cursor:pointer;" class="button-red" />
					  </td>
					</tr>
				  </table>
				</td>
			  </tr>
			</table>
			<script type="text/javascript">
			var ic = new ImgCropper("bgDiv", "dragDiv", "<!--{$imgurl}-->", {
				Width: 300, Height: 368, Color: "#ffffff",
				Resize: true,
				Scale: true,
				Opacity: 80,
				Right: "rRight", Left: "rLeft", Up:	"rUp", Down: "rDown",
				RightDown: "rRightDown", LeftDown: "rLeftDown", RightUp: "rRightUp", LeftUp: "rLeftUp",
				Preview: "viewDiv", viewWidth: <!--{$config.avatarwidth}-->, viewHeight: <!--{$config.avatarheight}-->
			});
			function cutImage() {
				//需要会员登录
				var p = ic.Url;
				var o = ic.GetPos();
				var x = o.Left;
				var y = o.Top;
				var w = o.Width;
				var h = o.Height;
				var pw = ic._layBase.width;
				var ph = ic._layBase.height;
				setAvatar('<!--{$imgurl}-->', x, y, w, h, pw, ph, 'cp');
			}
			</script>


		  </td>
		</tr>
	  </table>
	</div>
	<!--//div_smallnav_content_hover End-->
	<!--{/if}-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->
</div>
<div class="_margin"></div>
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
