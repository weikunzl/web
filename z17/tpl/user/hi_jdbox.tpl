<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<div class="greet_main">
  <input type="hidden" id="greetid" name="greetid" value="" />
  <input type="hidden" name="touid" id="touid" value="<!--{$touid}-->" />
  <div class="greet_left_user">
    <span class="u_logo">
	  <img width="100" height="120" border="0" src="<!--{$touser.avatarurl}-->" />
	</span>
	<br />
	<strong><a href="<!--{$touser.homeurl}-->" target="_blank"><!--{$touser.username}--></a></strong><br />
	<!--{if $touser.gender==1}-->男<!--{else}-->女<!--{/if}--> 
	  <!--{hook mod='var' item='marrystatus' type='text' value=$touser.marrystatus}--> 
	  <!--{$touser.age}--> 岁<br />
	<!--{area type='text' value=$touser.provinceid}--> <!--{area type='text' value=$touser.cityid}--><br />
	<!--{hook mod='var' item='education' type='text' value=$touser.education}--> <!--{if $touser.height>0}--><!--{$touser.height}--><!--{/if}-->CM<br />
  </div>
  <div class="greet_right_phrase">
    <!--{foreach $greet as $volist}-->
    <div class="greet_item" onclick="select_greet('<!--{$volist.greetid}-->');"><!--{$volist.greeting}--></div>
	<!--{/foreach}-->
    <div class="greet_fun_list">
	<input type="button" value="打招呼" id="btn_greet" class="button-red" style="cursor:pointer;" />&nbsp;&nbsp;&nbsp;
	<input type="button" id="btn_rnd" name="btn_rnd" value="换一组" onclick="javascript:window.location.href='<!--{$ucfile}-->?c=hi&a=hi&touid=<!--{$touid}-->&halttype=jdbox';" class="button-green" style="cursor:pointer;" />
    </div>
  </div>
  <div class="clear"></div>
  <span class="show_leter">给会员打招呼</span>
  

</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	//选中
    $(".greet_item").click(function() {
        $(".greet_item_hover").removeClass("greet_item_hover").addClass("greet_item");
        $(this).removeClass("greet_item").addClass("greet_item_hover");
    });
	//提交
	$("#btn_greet").click(function(){
		var uid = <!--{$touid}-->;
		var greetid = $('#greetid').val();

		//判断UID
		if (uid == <!--{$u.userid}-->) {
			$.dialog.tips("对不起，你不能和自己打招呼！", 3);
			return false;
		}
		//招呼ID
		if (greetid == '') {
			$.dialog.tips("请选择问候语！", 3);
			return false;
		}
		//执行
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=hi&a=savehi&type=ajax",
			cache: false,
			data: {touid: uid, greetid:greetid, r:get_rndnum(8)},
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
				XMLHttpRequest.setRequestHeader("request_type","ajax");
			},
			success: function(data) {
				var json = eval(data);
				var response = json.response;
				if (response == '1') {
					$.dialog({
						lock:false,
						drag: false,
						title: '成功提示',
						content: '恭喜你，问候发送成功。', 
						icon: 'succeed',
						button: [
							{
								name: '确定',
								callback: function () {
									$.dialog.close();
								}
							}
						]
					});
				}
				else {
					$.dialog.tips("对不起，问候发送失败", 3);
				}
			},
			error: function() {

			}
		});

	});

});

//选择招呼
function select_greet(id){
	$("#greetid").val(id);
}
</script>
