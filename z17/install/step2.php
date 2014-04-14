<?php

require_once 'include/install.inc.php';
require_once 'include/install.function.php';
require_once 'header.php';
checkInstall();
$gonext = true;;
function echo_quanxian($dir) {
if (true === isWrite($dir)) {
echo "<cite><img src='images/ok.gif' alt='成功'/></cite>";
}
else {
echo "<cite><img src='images/error.gif' alt='失败'/></cite>";
$GLOBALS['gonext'] = false;
}
}
function echo_function($fname) {
if (true === isFunction($fname)) {
echo "<cite><img src='images/ok.gif' alt='支持'/></cite>";
}
else {
echo "<cite><img src='images/error.gif' alt='不支持'/></cite>";
$GLOBALS['gonext'] = false;
}
}
;echo '<body>
<div class="wrap">
  <div class="side s_clear">
    <div class="side_bar">
      <h1>';echo OE_VERSION;;echo '</h1>
      <ul>
        <li class="currentitem">欢迎安装</li>
        <li class="currentitem">环境检测</li>
        <li>系统设置</li>
        <li>数据库设置</li>
        <li>执行安装</li>
		<li>安装完成</li>
      </ul>
      <div class="copy">OElove ';echo OE_EDITION;;echo ' <br />Powered by OEdev</div>
    </div>
  </div>
  <div class="main s_clear">
    <div class="content">
      <h1>环境检测</h1>
      <div class="info">检测到你的系统环境：</div>
      <div class="inner">
        <div class="hint_info">以下文件和目录需要写入权限 </div>
        <ul class="list">
		  <li>';echo_quanxian('data/');;echo '<a>data/目录权限</a></li>
          <li>';echo_quanxian('source/conf/');;echo '<a>source/conf/目录权限</a></li>
          <li>';echo_quanxian('source/plugin/');;echo '<a>source/plugin/目录权限</a></li>
          <li>';echo_quanxian('tpl/_compiled/');;echo '<a>tpl/_compiled/目录权限</a></li>
          <li>';echo_quanxian('tpl/_caches/');;echo '<a>tpl/_caches/目录权限</a></li>
          <li>';echo_quanxian('tpl/templets/');;echo '<a>tpl/templets/目录权限</a></li>
          <li>';echo_quanxian('install/data/');;echo '<a>install/data/目录权限</a></li>
        </ul>
		<div class="hint_info">以下参数、组件及其环境必须满足 </div>
		<ul class="list">
		  <li>';if (true === checkPhpVersion()) {;echo '<cite><img src="images/ok.gif" alt="支持"/></cite>';}else {$gonext = false;;echo '<cite><img src="images/error.gif" alt="不支持"/></cite>';};echo '<a>PHP版本5.2.x/5.3.x</a></li>
		  <li>';if (true === /*checkZend()*/true) {;echo '<cite><img src="images/ok.gif" alt="支持"/></cite>';}else {$gonext = false;;echo '<cite><img src="images/error.gif" alt="不支持"/></cite>';};echo '<a>Zend optimizer/Zend loader支持</a></li>
		  <li>';echo_function('gd_info');;echo '<a>GD库支持</a></li>
		  <li>
		  ';
if (false === isFunction('iconv') &&false === isFunction('mb_eregi')) {
$gonext = false;
echo "<cite><img src='images/error.gif' alt='不支持'/></cite>";
}
else {
echo "<cite><img src='images/ok.gif' alt='支持'/></cite>";
}
;echo '		  <a>Iconv/mbstring编码转换</a></li>
		  <li>';echo_function('simplexml_load_string');;echo '<a>XML解析支持</a></li>
		  <li>';echo_function('curl_init');;echo '<a>Curl支持</a></li>
		  <li>';echo_function('session_start');;echo '<a>Session支持</a></li>
		  <li>
		  ';
if (isset($_COOKIE)) {
echo "<cite><img src='images/ok.gif' alt='支持'/></cite>";
}
else {
$gonext = false;
echo "<cite><img src='images/error.gif' alt='不支持'/></cite>";
}
;echo '		  <a>Cookie支持</a>
		  </li>
		  <li>';echo_function('mysql_close');;echo '<a>Mysql支持</a></li>
		  <li>';echo_function('json_encode');;echo '<a>JSON支持</a></li>
		  <li>';echo_function('serialize');;echo '<a>Serialize序列化</a></li>
		  <li>';echo_function('unserialize');;echo '<a>unSerialize反序列化</a></li>
		</ul>
      </div>
    </div>
    <div class="btn_box">
      <button type="button" name="recheck" id="recheck" value="true" onclick="location.href=\'step2.php\'"';if (true === $gonext) {echo " disabled";};echo '>重新检测</button>
      <button type="button" name="next" id="next" value="true" onclick="location.href=\'step3.php\'"';if (false === $gonext) {echo " disabled";};echo '>下一步</button>
    </div>
  </div>
</div>
</body>
</html>
';?>