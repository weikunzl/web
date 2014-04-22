<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 16:16:50
         compiled from "C:\svn\z17z17\web\z17\tpl\admincp\frm_drag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284495354d3f268dfc1-41391806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6211531922741fdc01e9e2dc91169201fd8147c3' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\admincp\\frm_drag.tpl',
      1 => 1398066161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284495354d3f268dfc1-41391806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_charset' => 0,
    'cptplpath' => 0,
    'cppath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354d3f2710277_86338999',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354d3f2710277_86338999')) {function content_5354d3f2710277_86338999($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['page_charset']->value;?>
" />
<title>drag</title>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['cptplpath']->value)."headerjs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<style type="text/css">
body {
  margin: 0;
  padding: 0;
  background: #DFDFDF url(<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
images/body_bg.gif) repeat-y ;
  cursor: E-resize;
}
</style>
<script type="text/javascript" language="javascript">
var _CP_PATH_ = "<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
";
var pic = new Image();
pic.src= _CP_PATH_ + "images/bar_open.gif";
function toggleMenu() {
    frmBody = parent.document.getElementById('frame-body');
	imgArrow = document.getElementById('img');

	if (frmBody.cols == "0, 7, *"){
		frmBody.cols="170, 7, *";
		imgArrow.src = _CP_PATH_ + "images/bar_close.gif";
	}
	else {
		frmBody.cols="0, 7, *";
		imgArrow.src = _CP_PATH_ + "images/bar_open.gif";
	}
}
var orgX = 0;
document.onmousedown = function(e) {
	var evt = Utils.fixEvent(e);
	orgX = evt.clientX;
	if (Browser.isIE) document.getElementById('tbl').setCapture();
}
document.onmouseup = function(e) {
	var evt = Utils.fixEvent(e);

	frmBody = parent.document.getElementById('frame-body');
	frmWidth = frmBody.cols.substr(0, frmBody.cols.indexOf(','));
	frmWidth = (parseInt(frmWidth) + (evt.clientX - orgX));
	frmBody.cols = frmWidth + ", 7, *";
	if (Browser.isIE) document.releaseCapture();
}
var Browser = new Object();
Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');
Browser.isIE = window.ActiveXObject ? true : false;
Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != - 1);
Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != - 1);
Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != - 1);
var Utils = new Object();
Utils.fixEvent = function(e) {
  var evt = (typeof e == "undefined") ? window.event : e;
  return evt;
}
</script>
<body onselect="return false;">
<table height="100%" cellspacing="0" cellpadding="0" style="border-left:1px solid #BFBFBF;" id="tbl">
  <tr><td><a href="javascript:toggleMenu();" onfocus="this.blur();"><img src="<?php echo $_smarty_tpl->tpl_vars['cppath']->value;?>
images/bar_close.gif" width="6" height="60" id="img" border="0" /></a></td></tr>
</table>
</body>
</html><?php }} ?>