<?php
/**
 * [OELove] (C)2012-2099 OEdev,Inc.
 * <E-Mail：phpcoo@phpcoo.com>
 * Url http://www.phpcoo.com
 *     http://www.oemarry.com
 *     http://www.oedev.net
 * Update 2013.06.09
*/
if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
}
//载入主文件
require_once 'source/core/run.php';
//c&a参数
$c = XRequest::getGpc('c');
$a = XRequest::getGpc('a');
$c = empty($c) ? 'login' : $c;
$a = empty($a) ? 'run' : $a;
//Controller
if(!in_array($c, 
    array(
        'login', 'frame', 'admin', 'setting', 'plugin', 'authgroup',
        'skin', 'templet', 'htmllabel', 'zone', 'shiptype',
        'myads', 'about', 'aboutcat', 'infocat', 'info',
        'upload', 'usergroup', 'ajax', 'user', 'payment',
        'return', 'money', 'points', 'paymentlog', 'account', 'paramter', 
        'log', 'mailtpl', 'lang', 'lovesort', 'area', 'hometown',
        'loveparamter', 'greet', 'netpay', 'oauth', 'promotion', 'transfer', 'ucenter',
        'giftcat', 'gift', 'giftrecord', 'diarycat', 'diary', 'diarycomment', 
        'album', 'certify', 'message', 'systemmsg', 'mailsend', 'mailcontent', 'maillog',
        'seo', 'hi', 'weibo', 'weibocomment', 'videorz', 'complaint', 
          
    ))) {
    XHandle::error('Admincp Controller ['.$c.'] is forbiden!');
}
//Plugin
if (($c=='login' && $a=='login') || ($c=='login' && $a=='logout')){
}
else {
    X::importPlugin();
}
$control_base = BASE_ROOT. './source/control/adminbase.php';
$control_path = BASE_ROOT. './source/control/admin/'.$c.'.php';
$hoook_base = BASE_ROOT.'./source/control/apphook.php';
if (!file_exists($control_path)) {
	XHandle::error('Admincp Controller file ['.$c.'] is not found!');
}
else {
	require_once($control_base);
	require_once($control_path);
    require_once($hoook_base);
	$control = new control();
	$method = 'control_'.$a;
	if (method_exists($control, $method) && $a{0} != '_') {
		$control->$method();
	} 
	else {
		XHandle::error('Admincp Controller Action ['.$a.'] is not found!');
	}
    unset($control);
}
if (extension_loaded('zlib')) {
    ob_end_flush();
}
?>