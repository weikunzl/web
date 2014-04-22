<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 17:40:09
         compiled from "C:\svn\z17z17\web\z17\tpl\user\block_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116045354e779d48248-19978293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84319e3c0c6b41061006d4153db869fd977866c2' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\user\\block_head.tpl',
      1 => 1398066164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116045354e779d48248-19978293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'page_title' => 0,
    'ucpath' => 0,
    'rootpath' => 0,
    'urlpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354e779dc0694_85001733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354e779dc0694_85001733')) {function content_5354e779dc0694_85001733($_smarty_tpl) {?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><![endif]-->
<html class="no-js" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
css/css.css" rel="stylesheet" />
<script type='text/javascript'>
var _ROOT_PATH = "<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
";
</script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/jquery.min.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/artdialog/jquery.artDialog.source.js?skin=default'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/artdialog/plugins/iframeTools.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/public.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/ajax.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/artbox.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/WdatePicker.js'></script>
<!--[if lt IE 7]>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/DD_belatedPNG-min.js'></script>
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
<body><?php }} ?>