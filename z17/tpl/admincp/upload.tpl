<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$page_charset}-->" />
<title>上传图片/附件</title>
<script type='text/javascript' src='<!--{$urlpath}-->tpl/static/js/jquery-1.4.4.min.js'></script>
<style type="text/css">
body {font-size: 9pt;margin: 0px;padding: 0px;background-color:#fff;}
.bj {padding-top: 3px;padding-bottom: 3px;}
form {margin: 0px;padding: 0px;}
.file {border:1px solid #e0e0e0;font-size:9pt;width:200px;position:relative;}
.button{background:none repeat scroll 0 0 #4e6a81;
border-color:#dddddd #000000 #000000 #dddddd;
border-style:solid;
border-width:2px;
color:#FFFFFF;cursor:pointer;letter-spacing:0.1em;overflow:visible;padding:3px 15px;width:auto;cursor:pointer;text-decoration:none;}
</style>
</head>
<body>
<div id="upload_box" style="display:block">
<form action="<!--{$cpfile}-->?c=upload&a=saveupload&multipart=<!--{$multipart}-->" method="post" enctype="multipart/form-data" name="up_form" id="up_form" onSubmit="return checkupload();">
<input type="hidden" name="module" id="module" value="<!--{$module}-->" />
<input type="hidden" name="formname" id="formname" value="<!--{$formname}-->" />
<input type="hidden" name="uploadinput" id="uploadinput" value="<!--{$uploadinput}-->" />
<input type="hidden" name="thumbinput" id="thumbinput" value="<!--{$thumbinput}-->" />
<input type="hidden" name="previewid" id="previewid" value="<!--{$previewid}-->" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td><input name="<!--{$multipart}-->" id="<!--{$multipart}-->" type="file" class="file" /></td>
    <td>&nbsp;<input type="submit" name="btn_upload" id="btn_upload" value="上传"  /></td>
  </tr>
</table>
</form>
</div>
<div id="upload_loading" style="display:none" class="bj"><img src="<!--{$urlpath}-->tpl/static/images/uploading.gif" alt="文件上传中，请稍后..." width="220" height="19" border="0" /></div>
</body>
</html>
<script type="text/javascript">
function checkupload() {
	var t = "";
	var v = "";

	t = "<!--{$multipart}-->";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择要上传的图片/附件");
		return false;
	}
    
	$('#upload_box').hide();
	$('#upload_loading').show();

	return true;
}
</script>
