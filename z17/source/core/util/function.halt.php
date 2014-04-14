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
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
echo OESOFT_CHARSET;
echo "\" />\r\n";
if ( ( intval($msgtype) == 0 ) || ( intval($msgtype) == 3 ) || ( intval($msgtype) == 4 ) )
{
    echo "<meta http-equiv=\"refresh\" content=\"2;url=".$forwardurl."\">";
}
echo "<title>系统提示</title>\r\n<style>\r\n.alert{background-color:#f1f1f1; width:495px;margin:50px auto; font-size:12px; line-height:24px;}\r\n.alert .alert_body{ border:1px solid #cbcbcb;background-color:#fff; width:475px; height:143px; position:relative; top:-5px; left:-5px; padding:10px;}\r\n.alert .alert_body h3{font-size:14px; font-weight:bold; margin:0;}\r\n.alert .alert_body .alertcont{margin:15px 0 0 85px; background:url(";
echo PATH_URL;
echo "tpl/static/images/m_alert.png) left center no-repeat; padding:5px 50px; line-height:18px; color:#666; min-height:30px; _height:30px;}\r\n.alert .alert_body .alertcont a{color:#000; text-decoration:none;}\r\n.alert .alert_body .alertcont span{font-size:12px; font-weight:bold; color:#000;}\r\n.alert .alert_body .btn{text-align:center; padding-top:0px;}\r\n.alert .alert_body .btn img{border:0;}\r\n.alert .alert_body .pi2{background:url(";
echo PATH_URL;
echo "tpl/static/images/m_err.png) left center no-repeat;}\r\n.alert .alert_body .pi1{background:url(";
echo PATH_URL;
echo "tpl/static/images/m_acc.png) left center no-repeat; padding-left:55px;}\r\n\r\n.message{display:block;position:absolute;top:0;left:30%;\r\nleft:50%;/*FF IE7*/\r\ntop: 50%;/*FF IE7*/\r\nmargin-left:-240px!important;/*FF IE7 该值为本身宽的一半 */\r\nmargin-top:-70px!important;/*FF IE7 该值为本身高的一半*/\r\nmargin-top:0;\r\nposition:fixed!important;/*FF IE7*/\r\nposition:absolute;/*IE6*/\r\n_top:       expression(eval(document.compatMode &&\r\n            document.compatMode=='CSS1Compat') ?\r\n            documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/\r\n            document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2);/*IE5 IE5.5*/}\r\n\t\t\t.message .alert_body{ padding:0; height:163px; width:495px; border:1px solid #dfdfdf;}\r\n.message .alert_body h3{background-color:#fbfbe7; padding:3px 15px;}\r\n</style>\r\n</head>\r\n<body>\r\n<div class=\"alert message\">\r\n  <div class=\"alert_body\">\r\n\t";
if ( $msgtype == 1 )
{
    $css = "alertcont";
}
else if ( $msgtype == 2 )
{
    $css = "alertcont pi2";
}
else if ( $msgtype == 4 )
{
    $css = "alertcont";
}
else if ( $msgtype == 5 )
{
    $css = "alertcont";
}
else if ( $msgtype == 10 )
{
    $css = "alertcont";
}
else
{
    $css = "alertcont pi1";
}
echo "    <h3>系统提示</h3>\r\n    <p class=\"";
echo $css;
echo "\">\r\n    <span>";
echo $message;
echo "</span>\r\n\t</p>\r\n\t";
switch ( $msgtype )
{
case 0 :
    echo "<p style=\"font-align:center;\" align=\"center\"><a href=\"".$forwardurl."\">2秒后 如果你的浏览器没有自动跳转，请点击此链接</a></p>";
    break;
case 3 :
    echo "<p style=\"font-align:center;\" align=\"center\"><a href=\"".$forwardurl."\">2秒后 如果你的浏览器没有自动跳转，请点击此链接</a></p>";
    break;
case 4 :
    echo "<p style=\"font-align:center;\" align=\"center\"><a href=\"".$forwardurl."\">2秒后 如果你的浏览器没有自动跳转，请点击此链接</a></p>";
    break;
case 1 :
    echo "<p class=\"btn\"><a href=\"javascript:history.go(-1);\"><img src=\"".PATH_URL."tpl/static/images/return.gif\" /> </a></p>";
    break;
case 2 :
    echo "<p class=\"btn\"><a href=\"javascript:history.go(-1);\"><img src=\"".PATH_URL."tpl/static/images/return.gif\" /> </a></p>";
    break;
case 10 :
    echo "";
}
echo "  </div>\r\n</div>\r\n</body>\r\n</html>";
?>
