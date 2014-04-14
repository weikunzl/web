<?php

require_once 'include/install.inc.php';
require_once 'include/install.function.php';
require_once 'include/common.action.php';
require_once 'header.php';
checkInstall();
$error = action_savedb();
;echo '<body>
<div class="wrap">

  <div class="side s_clear">
    <div class="side_bar">
      <h1>';echo OE_VERSION;;echo '</h1>
      <ul>
        <li class="currentitem">欢迎安装</li>
        <li class="currentitem">环境检测</li>
        <li class="currentitem">系统设置</li>
        <li class="currentitem">数据库设置</li>
        <li class="currentitem">执行安装</li>
		<li>安装完成</li>
      </ul>
      <div class="copy">OElove ';echo OE_EDITION;;echo ' <br />Powered by OEdev</div>
    </div>
  </div>

  <div class="main s_clear">
  <div class="content">
  <h1>执行安装</h1>
  <div class="inner">
  <div class="hint_info">温馨提示：网站安装过程可能会有些慢，请耐心等待...</div>
    <table width="300" cellspacing="5" cellpadding="5" class="loading" align="center">
      <tbody>
	    ';
if (!empty($error)) {
;echo '		<tr>
		  <td><b>第四步有错</b> 错误如下：</td>
		</tr>
		<tr>
		  <td>';echo $error;;echo '</td>
		</tr>
		';
}
else {
;echo '        <tr>
          <td id="tip_loading"></td>
        </tr>
		<script>
		$(function(){
			doInstall(\'tip_loading\');
		});
		</script>
		';
}
;echo '      </tbody>
    </table>
    </div>
    </div>
    <div class="btn_box">
      <button type="button" name="back" id="back" value="true" onclick="javascript:history.go(-1);"';if (empty($error)) {echo ' disabled';};echo '>上一步</button>
      <button id="next" type="button" name="next" value="true" disabled onclick="window.location.href=\'success.php\'" />完成安装</button>
    </div>
    </div>
</div>
</body>
</html>
<script>
//执行安装
function doInstall(tipid) {
	if (tipid != \'\') {
		$(\'#\'+tipid).html(\'网站安装中，请稍候...\');
	}
	$.ajax({
		type: \'POST\',
		url: \'install.php\',
		cache: false,
		data: {r: get_rndnum(8)},
		dataType: \'json\',
		beforeSend: function(XMLHttpRequest) {
			XMLHttpRequest.setRequestHeader(\'request_type\', \'ajax\');
		},
		success: function(data) {
			var json = eval(data);
			/* JSON */
			var message = json.message;
			var response = json.response;

			if (true == response) {
				if (message == \'\') {
					message = \'恭喜你，网站安装成功。\';
				}
				$(\'#\'+tipid).html("<font color=green>"+message+"</font>");
				$("#back").attr("disabled", "disabled");
				$("#next").removeAttr("disabled");

				//更新缓存
				update_cache();
			}
			else {
				if (message == \'\') {
					message = \'对不起，网站安装失败！\';
				}
				$(\'#\'+tipid).html("<font color=red>"+message+"</font>");
				$("#back").removeAttr("disabled");
				$("#next").attr("disabled", "disabled");
			}
		},
		error: function() {

		}
	});
}

/* 随机数 */
function get_rndnum(n) {
	var chars = [\'0\',\'1\',\'2\',\'3\',\'4\',\'5\',\'6\',\'7\',\'8\',\'9\',\'A\',\'B\',\'C\',\'D\',\'E\',\'F\',\'G\',\'H\',\'I\',\'J\',\'K\',\'L\',\'M\',\'N\',\'O\',\'P\',\'Q\',\'R\',\'S\',\'T\',\'U\',\'V\',\'W\',\'X\',\'Y\',\'Z\'];
	var res = "";
	for(var i = 0; i < n ; i ++) {
		var id = Math.ceil(Math.random()*35);
		res += chars[id];
	}
	return res;
}

/* 更新缓存 */
function update_cache() {
	$.ajax({
		type: \'POST\',
		url: \'updatecache.php\',
		cache: false,
		data: {r: get_rndnum(8)},
		dataType: \'json\',
		beforeSend: function(XMLHttpRequest) {
			XMLHttpRequest.setRequestHeader(\'request_type\', \'ajax\');
		},
		success: function(data) {
			var json = eval(data);
			/* JSON */
			var message = json.message;
		},
		error: function() {

		}
	});

}
</script>';?>