<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
X::loadutil( "cookie" );
$styleid = XCookie::get( "styleid" );
if ( $styleid < 1 )
{
    $styleid = 8;
}
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" \"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n";
if ( $type == 0 )
{
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=";
    echo $url;
    echo "\" />\r\n";
}
echo "<meta http-equiv=\"cache-control\" content=\"no-cache\"/>\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\r\n<meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=1.0\" />\r\n<link href=\"";
echo PATH_URL;
echo "tpl/wap/style/style";
echo $styleid;
echo ".css\"  rel=\"stylesheet\" type=\"text/css\" />\r\n<title>信息提示</title>\r\n</head>\r\n<body>\r\n<h3 class=\"slide_bg_d\"><span class=\"pl_5\">信息提示</span></h3>\r\n<div class=\"index_p\">\r\n  <p class=\"op\">\r\n  ";
if ( $type == 0 )
{
    echo "  <img src=\"";
    echo PATH_URL;
    echo "tpl/wap/images/ok.gif\"/>\r\n  ";
}
else
{
    echo "  <img src=\"";
    echo PATH_URL;
    echo "tpl/wap/images/error.gif\"/>\r\n  ";
}
echo "  ";
echo $str;
echo "  </p>\r\n  ";
if ( $type == 1 )
{
    echo " \r\n  <a href=\"javascript:history.back();\">返回上一页</a>\r\n  <br />\r\n  如果返回上一页链接无法点击,请按浏览器的后退按钮!\r\n  ";
}
else
{
    echo "  <br />1秒后页面没有自动跳转请点<a href='";
    echo $url;
    echo "'>这里</a>\r\n  ";
}
echo "</div>\r\n</body>\r\n</html>";
?>
