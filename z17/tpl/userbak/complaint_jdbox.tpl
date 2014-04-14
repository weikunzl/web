<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<style type="text/css">
.report_main {
	padding:20px;
}
.report_main table td {
	height:40px;line-height:22px;
}
.report_type {
	border:1px solid #ccc;
	padding:5px 10px;
	line-height:20px;
	cursor:pointer;
	color:Gray;
}
.report_type_hover {
	border:1px solid red;
	background:#f0f0f0;
	padding:5px 10px;
	line-height:20px;
	cursor:pointer;
	color:#000;
}

</style>
<script type="text/javascript">
$(function () {
	$(".report_type").click(function () {
		$(".report_type_hover").removeClass("report_type_hover").addClass("report_type");
		$(this).removeClass("report_type").addClass("report_type_hover");
	});

	//提交投诉
	$("#btn_post").click(function () {
		if ($("#cptype").val() == '') {
			$.dialog.tips("请选择举报类型", 3);
			return false;
		}
		if ($("#content").val() == '') {
			$.dialog.tips("请填写情况说明", 3);
			return false;
		}
		if ($("#telephone").val() == '') {
			$.dialog.tips("请填写联系电话", 3);
			return false;
		}
		if ($("#email").val() == '') {
			$.dialog.tips("请填写联系邮箱", 3);
			return false;
		}

		$("#myform").submit();		
	});
});

//选择类别
function select_cptype(type) {
	$("#cptype").val(type);
}
</script>
</head>
<div class="report_main">
<form name="myform" id="myform" action="<!--{$ucfile}-->?c=complaint&halttype=jdbox" method="post">
<input type="hidden" name="a" id="a" value="savecomplaint" />
<input type="hidden" name="uid" id="uid" value="<!--{$uid}-->" />
  <table width="98%">
    <tr>
	  <td>举报会员：</td>
	  <td><!--{$tauser.username}-->（ID：<!--{$tauser.userid}-->）<!--{$tauser.age}-->岁，<!--{if $tauser.gender=='1'}-->男<!--{else}-->女<!--{/if}--></td>
	</tr>
	<tr>
	  <td width="20%">举报类型：</td>
	  <td>
	  <input type="hidden" name="cptype" id="cptype" value="" />
	  <span class="report_type" onclick="select_cptype('1');">内容虚假</span> 
	  <span class="report_type" onclick="select_cptype('2');">色情服务</span> 
	  <span class="report_type" onclick="select_cptype('3');">这是骗子</span>
	  </td>
	</tr>
	<tr>
	  <td>情况说明：</td>
	  <td>
	    <textarea name="content" id="content" style="width:98%;height:100px;overflow:auto;line-height:20px;color:#666;"></textarea><br />
		<span id="dtelephone" class="f_red"></span>
	    <font color="#EE7621">
		请尽量详细反映实际情况，以便我们及时正确地处理您的举报；<br />
		留下您的电话号码，方便我们的客服与您联系。
		</font>
	  </td>
	</tr>
	<tr>
	  <td>联系电话：</td>
	  <td><input type="text" name="telephone" id="telephone" class="input-150" maxlength="100" value="<!--{$u.mobile}-->" /> <span id="dtelephone" class="f_red"></span></td>
	</tr>
	<tr>
	  <td>联系邮箱：</td>
	  <td><input type="text" name="email" id="email" class="input-150" maxlength="100" value="<!--{$u.email}-->" /> <span id="demail" class="f_red"></span></td>
	</tr>
	<tr>
	  <td></td>
	  <td><input type="button" id="btn_post" value="提交投诉" class="button-red" /></td>
	</tr>
  </table>
</form>
</div>
</body>
</html>
