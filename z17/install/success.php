<?php

require_once 'include/install.inc.php';
require_once 'include/install.function.php';
require_once 'include/common.action.php';
require_once 'header.php';
action_del();
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
		<li class="currentitem">安装完成</li>
      </ul>
      <div class="copy">OElove ';echo OE_EDITION;;echo ' <br />Powered by OEdev</div>
    </div>
  </div>
  <div class="main s_clear">
    <div class="content">
      <h1>安装完成</h1>
      <div class="info"></div>
      <div class="inner">
        <div class="msgsinfo">
          <p><font color="green">恭喜! 您已经成功安装，为了安全，请及时删除“<font color="red"><b>install</b></font>”目录。</font></p>
          <p>
		  <b>温馨提示：</b><br />
		  用管理员登录后台，点击“系统设置”->“基础设置”->“站点设置” <br />执行更新保存，完成网站缓存的更新。
		  </p>
        </div>
        <div class="userinfo">
          <p>管理员帐号：';echo OE_ADMINNAME;;echo '</p>
          <p>管理员密码：';echo OE_PASSWORD;;echo '</p>
        </div>
        <div class="more_info">
          <p>为了保障安全，强烈建议到OElove官方论坛下载安装程序</p>
          <ul class="links">
            <li><a href="http://bbs.phpcoo.com" style="color:#0083B9;text-decoration:underline;padding:0 2px;" target="_blank">OElove官方论坛</a></li>
            <li><a href="http://www.phpcoo.com/oelove-quotes.html" style="color:#0083B9;text-decoration:underline;padding:0 2px;" target="_blank">OElove服务购买</a></li>
            <li><a href="http://bbs.phpcoo.com/forum-62-1.html" style="color:#0083B9;text-decoration:underline;padding:0 2px;" target="_blank">OElove问题解答</a></li>
            <li><a href="http://bbs.phpcoo.com/forum-62-1.html" style="color:#0083B9;text-decoration:underline;padding:0 2px;" target="_blank">OElove反馈BUG</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="btn_box">
	  <button type="button" name="btn_upgrade" id="btn_upgrade" value="true" onclick="location.href=\'../upgrade/\'">进入版本升级</button>
      <button type="button" name="btn_index" id="btn_index" value="true" onclick="location.href=\'../index.php\'">进入网站</button>
	  <button type="button" name="btn_admin" id="btn_admin" value="true" onclick="location.href=\'../admincp.php\'">进入后台</button>
    </div>
  </div>
</div>
</body>
</html>';?>