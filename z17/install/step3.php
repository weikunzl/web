<?php

require_once 'include/install.inc.php';
require_once 'include/install.function.php';
require_once 'header.php';
checkInstall();
$selfurl = $_SERVER['PHP_SELF'];
$installroot = str_replace('install/step3.php','',$selfurl);
$installroot = str_replace('install/','',$installroot);
$siteurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$siteurl = str_replace('install/step3.php','',$siteurl);
;echo '<body>
<div class="wrap">
  <div class="side s_clear">
    <div class="side_bar">
      <h1>';echo OE_VERSION;;echo '</h1>
      <ul>
        <li class="currentitem">欢迎安装</li>
        <li class="currentitem">环境检测</li>
        <li class="currentitem">系统设置</li>
        <li>数据库设置</li>
        <li>执行安装</li>
		<li>安装完成</li>
      </ul>
      <div class="copy">OElove ';echo OE_EDITION;;echo ' <br />Powered by OEdev</div>
    </div>
  </div>
  <div class="main s_clear">
  <div class="content">
  <h1>系统设置信息</h1>
  <div class="info">请认真填写下面的系统设置信息：</div>
  <div class="inner">
  <div class="hint_info">安装路径：如果要安装在站点的虚拟目录，则填写/love/(love为虚拟目录的名字)；否则就填写“/”</div>
  <form name="form_step3" method="post" action="step4.php" id="form_step3" onsubmit="return checkform();">
    <table width="488" cellspacing="0" cellpadding="0" summary="setup" class="setup">
      <tbody>
        <tr>
          <td class="title">管理员名称：</td>
          <td><input name="adminname" id="adminname" class="txt" type="text" value="admin" /></td>
        </tr>
        <tr>
          <td class="title">管理员密码：</td>
          <td><input name="password" id="password" class="txt" type="password" /></td>
        </tr>
        <tr>
          <td class="title">管理员密码确认：</td>
          <td><input name="confirmpassword" id="confirmpassword" class="txt" type="password" /></td>
        </tr>
        <tr>
          <td class="title">安装路径：</td>
          <td><input name="installroot" id="installroot" class="txt" value="';echo $installroot;;echo '" disabled="disabled" /> (自动获取)
		  <input type=\'hidden\' name=\'path\' id=\'path\' value="';echo $installroot;;echo '" />
		  </td>
        </tr>
        <tr>
          <td class="title">网站名称：</td>
          <td><input name="sitename" id="sitename" class="txt" /> </td>
        </tr>
        <tr>
          <td class="title">网站地址：</td>
          <td><input name="siteurl" id="siteurl" class="txt" value="';echo $siteurl;;echo '" /> </td>
        </tr>
      </tbody>
    </table>
    </div>
    </div>
    <div class="btn_box">
      <button type="button" name="back" id="back" value="true" onclick="location.href=\'step2.php\'">上一步</button>
      <button id="next" type="submit" name="next" value="true" />下一步</button>
    </div>
    </div>
  </form>
</div>
</body>
</html>

<script>
function checkform() {
	if ($(\'#adminname\').val() == \'\') {
		alert(\'请填写管理员账号\');
		return false;
	}
	if ($(\'#password\').val() == \'\') {
		alert(\'密码不能为空\');
		return false;
	}
	else {
		if ($(\'#confirmpassword\').val() != $(\'#password\').val()) {
			alert(\'确认密码不正确\');
			return false;
		}
	}
	if ($(\'#key\').val() == \'\') {
		alert(\'授权码不能为空\');
		return false;
	}
	if ($(\'#sitename\').val() == \'\') {
		alert(\'网站名称不能为空\');
		return false;
	}
	if ($(\'#siteurl\').val() == \'\') {
		alert(\'网站地址不能为空\');
		return false;
	}
	return true;
}
</script>';?>