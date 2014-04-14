<?php

require_once 'include/install.inc.php';
require_once 'include/install.function.php';
require_once 'include/common.action.php';
require_once 'header.php';
checkInstall();
$error = action_saveconf();
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
        <li>执行安装</li>
      </ul>
      <div class="copy">OElove ';echo OE_EDITION;;echo ' <br />Powered by OEdev</div>
    </div>
  </div>
  <div class="main s_clear">
  <div class="content">
  <h1>数据库设置</h1>
  <div class="info">请认真填写下面的Mysql数据库信息：</div>
  <div class="inner">
  <div class="hint_info">温馨提示：如果您需从v2版本升级到v3版本，安装v3数据库必须与V2同一数据库，并且表前缀不能与V2一样。</div>
  <form name="form_step4" method="post" action="step5.php" id="form_step4" onsubmit="return checkform();">
    <table width="488" cellspacing="0" cellpadding="0" summary="setup" class="setup">
      <tbody>
	    ';
if (!empty($error)) {
;echo '		<tr>
		  <td><b>第三步有错</b> 错误如下：</td>
		</tr>
		<tr>
		  <td>';echo $error;;echo '</td>
		</tr>
		';
}
else {
;echo '        <tr>
          <td class="title">数据库服务器地址：</td>
          <td><input name="dbserver" id="dbserver" class="txt" type="text" value="localhost:3306" /></td>
        </tr>
        <tr>
          <td class="title">数据库用户名：</td>
          <td><input name="dbuser" id="dbuser" class="txt" type="text" /></td>
        </tr>
        <tr>
          <td class="title">数据库用户密码：</td>
          <td><input name="dbpassword" id="dbpassword" class="txt" /> </td>
        </tr>
        <tr>
          <td class="title">数据库名称：</td>
          <td><input name="dbname" id="dbname" class="txt" type="text" /> (不能以数字开头)</td>
        </tr>
        <tr>
          <td class="title">数据表前缀：</td>
          <td><input name="dbpre" id="dbpre" class="txt" value="oepre_" /> (必须以_结尾)</td>
        </tr>
        <tr>
          <td class="title">体验数据：</td>
          <td><input type="radio" name="installdist" id="installdist" value="1" checked />安装，<input type="radio" name="installdist" id="installdist" value="0" />不安装</td>
        </tr>
		';
}
;echo '      </tbody>
    </table>
    </div>
    </div>
    <div class="btn_box">
      <button type="button" name="back" id="back" value="true" onclick="javascript:history.go(-1);">上一步</button>
      <button id="next" type="submit" name="next" value="true"';if (!empty($error)) {echo ' disabled';};echo ' />下一步</button>
    </div>
    </div>
  </form>
</div>
</body>
</html>
<script>
function checkform() {
	if ($(\'#dbserver\').val() == \'\') {
		alert(\'数据库服务器地址不能为空\');
		return false;
	}
	if ($(\'#dbuser\').val() == \'\') {
		alert(\'数据库用户名不能为空\');
		return false;
	}
	if ($(\'#dbpassword\').val() == \'\') {
		alert(\'数据库用户密码不能为空\');
		return false;
	}
	if ($(\'#dbname\').val() == \'\') {
		alert(\'数据库名称不能为空\');
		return false;
	}
	if ($(\'#dbpre\').val() == \'\') {
		alert(\'数据表前缀不能为空\');
		return false;
	}
	return true;
}
</script>';?>