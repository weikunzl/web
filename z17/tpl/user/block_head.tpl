<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><![endif]-->
<html class="no-js" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=<!--{$page_charset}-->" />
<title><!--{$page_title}--></title>
<link href="<!--{$ucpath}-->css/css.css" rel="stylesheet" />

<!-- add default -->
<link rel="stylesheet" href="<!--{$skinpath}-->themes/css/public.css" media="screen" />
<link rel="stylesheet" href="<!--{$skinpath}-->themes/css/v3.css" media="screen" />
<link rel="stylesheet" href="<!--{$skinpath}-->themes/css/n.css" media="screen" />
<link rel="stylesheet" href="<!--{$skinpath}-->themes/css/button.css" />
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headjs.tpl"}-->
<!-- end default -->


<!--[if lt IE 7]>
<script type='text/javascript' src='<!--{$urlpath}-->tpl/static/js/DD_belatedPNG-min.js'></script>
<script>
DD_belatedPNG.fix('.user_logo, .shadow');
</script>
<![endif]-->
<script type='text/javascript'>
$(function() {
    $(window).scroll(function() {
        var explorer = window.navigator.userAgent;
        var scrollTops = 0;
        if (explorer.indexOf("Chrome") >= 0 || explorer.indexOf("Safari") >= 0) {
            var scrollTops = document.body.scrollTop;
        } else {
            scrollTops = document.documentElement.scrollTop;
        }
        if (parseInt(scrollTops) >= 70) {
            $(".right_kj").slideDown("slow");
        } else {
            $(".right_kj").slideUp("slow");
        }
    });
});

//关注状态
function obj_listen_status(uid, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:"getlisten", halttype:"ajax", uid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var flag = json.flag;
				if (tipsid != '') {
					if (flag == '1') {
						$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-coff\" onclick=\"obj_action_listen('"+uid+"', 'cancel', '"+tipsid+"');\">取消关注</a>");
					}
					else {
						$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-green\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a>");
					}
				}
			},
			error: function() {

			}
		});
	} 
}

//拉黑状态
function obj_black_status(uid, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:"getlisten", halttype:"ajax", uid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var flag = json.flag;
				if (tipsid != '') {
					if (flag == '2') {
						//已拉黑
						$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-green\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a>");
					}
					else {
						//未拉黑
						$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-coff\" onclick=\"obj_action_listen('"+uid+"', 'black', '"+tipsid+"');\">拉黑名单</a>");
					}
				}
			},
			error: function() {

			}
		});
	} 
}

//操作好友 加关注、拉黑、取消
function obj_action_listen (uid, action, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:action, halttype:"ajax", fuid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var type = json.type;
				var flag = json.flag;
				var error = json.error;
				if (tipsid != '') {
					//加关注
					if (type == 'listen') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-coff\" onclick=\"obj_action_listen('"+uid+"', 'cancel', '"+tipsid+"');\">取消关注</a>");
							}
						}
						else {
							alert(error);
						}
					}
					//取消关注
					if (type == 'cancel') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-green\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a>");
							}
						}
						else {
							alert(error);
						}
					}
					//拉黑名单
					if (type == 'black') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<a href=\"###\" class=\"pcbtn-green\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a>");
							}
						}
						else {
							alert(error);
						}
					}

				}
			},
			error: function() {

			}
		});
	}
}

//发表心情
function obj_public_mood(content_id) {
	var content = $("#"+content_id).val();
	//心情内容
	if (content == '' || content == '记录每一天的心情...') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请填写心情内容', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	if (strQuantity(content) > 500) {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '心情内容不能大于500个字', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}

	//发表心情
	$.ajax({
		type: "POST",
		url: _ROOT_PATH + "usercp.php?c=weibo",
		cache: false,
		data: {a:"saveweibo", content:content, r:get_rndnum(8)},
		dataType: "json",
		success: function(data) {
			var json = eval(data);
			var response = json.response;
			var msg = json.msg;
			if (response == '1') {
				var tips = "";
				if (msg.length > 0) {
					tips = msg;
				}
				else {
					tips = "发表成功";
				}
				$.dialog({
					lock:true,
					title: '成功提示',
					content: tips, 
					icon: 'succeed',
					button: [ 
						{
							name: '确定',
							callback: function () {
								window.top.location.reload();
							}
						}
					]
				});
			}
			else {
				var tips = "";
				if (msg.length > 0) {
					tips = msg;
				}
				else {
					tips = "发表失败";
				}
				$.dialog.tips(tips, 3);
			}
		},
		error: function() {

		}
	});

}
//心情文本框
function obj_del_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content == '记录每一天的心情...') {
		$("#"+content_id).val("");
	}
}
function obj_attr_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content == '') {
		$("#title").val("记录每一天的心情...");
	}
}
function obj_cancel_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content != '记录每一天的心情...') {
		$("#"+content_id).val("记录每一天的心情...");
	}
}
</script>
</head>
<body>