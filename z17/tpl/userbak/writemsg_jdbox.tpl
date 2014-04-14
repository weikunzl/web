<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<style type="text/css">
.box-main{padding:10px;}
.box-dialog-left{float:left;width:120px;}
.box-dialog-left .user-img{padding:5px; border:1px solid #dddddd;width:100px;height:120px;display:block}
.box-dialog-left .user-info {padding:5px;text-align:center;line-height:22px;}
.box-dialog-left p{line-height:25px;}
.box-dialog-left p img{vertical-align:center;}
.box-dialog-right {float:left;margin-left:10px;}

.box-dialog-right .dialog-tips {margin-bottom:5px;}
.box-dialog-right .dialog-tips-l {width:100px;height:20px;line-height:20px;float:left;}
.box-dialog-right .dialog-tips-r {margin-left:10px;height:20px;line-height:20px;float:left;}
.box-dialog-right. p {padding-left:10px;line-height:20px;}

.box-dialog-kdmsg {border: 1px solid #F7F7F7;box-shadow: 0 0 0 #666666;padding: 0 25px; width:400px;margin-top:10px;}
.box-dialog-kdmsg .writecon {
    background: url("<!--{$ucpath}-->images/line_cont.jpg") repeat scroll 0 0 transparent;
    border: 0 none;
    height: 210px;
    line-height:30px;
    width: 100%;
	font-size:100%;
	color:#666666;
	overflow:auto;
}
.box-dialog-button{float:right; margin-top:20px;margin-right:20px;}
</style>
<div class="box-main">
  <div class="box-dialog-left fl">
    <div class="user-img">
	  <img width="100" height="120" border="0" src="<!--{$touser.avatarurl}-->" />
	</div>
	<div class="user-info">
	<a href="<!--{$touser.homeurl}-->" target="_blank"><!--{$touser.levelimg}--> <b><!--{$touser.username}--></b></a><br />
	<!--{if $touser.gender=='1'}-->男<!--{else}-->女<!--{/if}--> 
	  <!--{hook mod='var' item='marrystatus' type='text' value=$touser.marrystatus}--> 
	  <!--{$touser.age}--> 岁<br />
	  <!--{area type='text' value=$touser.provinceid}--> <!--{area type='text' value=$touser.cityid}--><br />
	  <!--{hook mod='var' item='education' type='text' value=$touser.education}--> <!--{$touser.height}-->CM
	</div>
	<p>
	</p>
  </div>
  <div class="box-dialog-right fl">
	<input type="hidden" name="touid" id="touid" value="<!--{$touid}-->" />
	<input type="hidden" name="posttype" id="posttype" value="0" />
    <div class="dialog-tips">
	  <div class="dialog-tips-l"><img src="<!--{$ucpath}-->images/menu/edit.gif"><span id="btn_greet" style="color:#666666;cursor:pointer;">帮我找话题</span></div>
	  <div class="dialog-tips-r"><span class="cc">（信件请勿出现电话、QQ号码，否则无法发送）</span></div>
	  <div class="clear"></div>
	</div>
	<div class="box-dialog-kdmsg">
	  <textarea class="writecon" name="content" id="content" onclick="del_content();" onblur="attr_content();">请在这里写信件内容...</textarea>
	</div>

	<div class="box-dialog-button">
	  <!--{if true === $paystatus}-->
	  <input type="button" value=" 付费发信 " class="button-red" name="btn_send" id="btn_send"  />
	  <!--{else}-->
	  <input type="button" value=" 免费发信 " class="button-green" name="btn_send" id="btn_send" />
	  <!--{/if}-->
	</div>
	<div class="clear"></div>
	<p>
	<div class="nav-tips">
	您当前剩余金币：<font color="green"><b><!--{$u.money}--></b></font>个，如果不够支付，<a href="<!--{$ucfile}-->?c=payment" target="_top">请先充值&gt;&gt;</a><br />
	<!--{if true === $paystatus}-->
	您必须支付<font color="red"><b><!--{$g.fee.sendmsgfee}--></b></font>个金币才可以给TA写这封信。
	<!--{else}-->
	您可以免费给TA写信件，信件内容必须是健康。
	<!--{/if}-->
	</div>
	</p>

  </div>
  <div class="clear"></div>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	//帮我找话题
	$("#btn_greet").click(function(){
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=message&a=greet&sex=<!--{$touser.gender}-->",
			cache: false,
			data: {r:get_rndnum(8)},
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
				XMLHttpRequest.setRequestHeader("request_type","ajax");
			},
			success: function(data) {
				var json = eval(data);
				var response = json.response;
				if (response.length > 0) {
					$("#content").val(response);
					$("#btn_greet").html("换一个话题");
				}
			},
			error: function() {}
		});
	});

	//执行发信
	$("#btn_send").click(function(){
		var fromtype = "";
		var uid = $("#touid").val();
		var content = $("#content").val();
		var payfee = <!--{$g.fee.sendmsgfee}-->;
		if (payfee == "" || payfee == 0) {
			payfee = 1;
		}
		if (uid < 1) {
			$.dialog.tips("会员ID丢失，请重试！", 3);
			return false;
		}
		if (uid == <!--{$u.userid}-->) {
			$.dialog.tips("对不起，你不能和自己写信！", 3);
			return false;
		}	
		if (content == '' || content == '请在这里写信件内容...') {
			$.dialog.tips("请填写信件内容！", 3);
			return false;
		}
		<!--{if (true === $paystatus)}-->
		if (<!--{$u.money}--> < payfee) {
			$.dialog.tips("对不起，你的金币不足，不能发信！", 3);
			return false;
		}
		<!--{/if}-->

		//执行
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=message",
			cache: false,
			data: {a: "savewrite", touid: uid, content:content, r:get_rndnum(8)},
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
				XMLHttpRequest.setRequestHeader("request_type","ajax");
			},
			success: function(data) {
				var json = eval(data);
				var response = json.response;
				var msg = json.msg;
				if (response == '1') {
					$.dialog({
						lock:false,
						drag: false,
						title: '成功提示',
						content: "信件发送成功", 
						icon: 'succeed',
						button: [
							{
								name: '确定',
								callback: function () {
									if (fromtype=='reload') {
										window.top.location.reload();
									}
									else {
										$("#content").val("");
										$.dialog.close();
									}
								}
							}
						]
					});
				}
				else {
					//发送失败
					if (msg.length>0) {
						$.dialog.tips(msg, 3);
					}
					else {
						$.dialog.tips("对不起，信件发送失败", 3);
					}
				}
			},
			error: function() {}
		});

	});

});

//内容
function del_content() {
	var content = $("#content").val();
	if (content == '请在这里写信件内容...') {
		$("#content").val("");
	}
}
function attr_content() {
	var content = $("#content").val();
	if (content == '') {
		$("#content").val("请在这里写信件内容...");
	}
}

</script>