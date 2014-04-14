<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<!--{$page_charset}-->" />
<title><!--{$title}-->-充值成功</title>
<style>
body{font-size:13px;margin:0 auto;}
div{margin:30px auto; width:500px; border:1px solid #eee; text-align:left;padding:20px;}
p{font-size:13px;}
li{font-size:13px;line-height:25px; list-style:none;}
</style>
</head>
<body>
<div>
<!-- 标题 -->
<p><h3 style="font-size:15px;"><!--{$title}-->-充值成功</h3></p>
<!-- 明细 -->
<b>充值明细</b><br> 
<!-- 充值单号 -->
<li>&middot;充值单号：<!--{$paynum}--></li>
<!-- 会员ID -->
<li>&middot;充值会员：<!--{$userid}--></li>
<!-- 充值金额 -->
<li>&middot;充值金额：<!--{$amount}--> (<!--{$currency}-->)</li>
<!-- 交易单号 -->
<li>&middot;交易单号：<!--{$tradeno}--></li>
<!-- 充值状态 -->
<li>&middot;充值状态：<font color='<!--{$color}-->'>充值成功</font></li>
<!-- 返回链接 -->
<p><a href='<!--{$urlpath}-->usercp.php'>返回会员中心</a> | <a href='javascript:window.close();'>关闭页面</a></p>
</div>
</body>
</html>