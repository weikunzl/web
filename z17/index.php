<?php
/**
 * [OElove] (C)2012-2099 OEdev,Inc.
 * <E-Mail：phpcoo@qq.com>
 * Url www.phpcoo.com, www.oephp.com
 * Update 2014.01.24
 */
if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
}
//载入主文件
require_once 'source/core/run.php';
require_once 'source/core/util/function.iswap.php';
if (true == mobile_device_detect()) {
    XHandle::redirect(PATH_URL.'wap.php');
}
//C&A
$c = XRequest::getGpc('c');
$a = XRequest::getGpc('a');
if (empty($c)) {
    if (true === _init_exteral_ca()) {
        $c = 'payment';
    } 
    else {
        $c = 'index';
    }
}
if (empty($a)) {
    if (true === _init_exteral_ca()) {
        $a = 'callback';
    } 
    else {
        $a = 'run';
    }
}
//Controller
if (!in_array($c, 
    array(
        'index', 'passport', 'ajax', 'about', 'user', 'diary', 
        'info', 'home', 'online', 'connect', 'payment', 
    ))) {
	XHandle::error('Index Controller ['.$c.'] is forbiden!');
}
//Plugin
if ($a == 'loginpost' || $a == 'logout') {
    
}
else {
    X::importPlugin();
}
$control_base = BASE_ROOT.'./source/control/indexbase.php';
$hook_base = BASE_ROOT.'./source/control/apphook.php';
$control_path = BASE_ROOT.'./source/control/index/'.$c.'.php';
if (!file_exists($control_path)) {
	XHandle::error('Index Controller file:['.$c.'] is not found!');
}
else {
	require_once($control_base);
    require_once($hook_base);
	require_once($control_path);
    $control = new control();
	$method = 'control_'.$a;
	if (method_exists($control, $method) && $a{0} != '_') {
		$control->$method();
	} 
	else {
		XHandle::error('Index Controller ['.$c.'] Action ['.$a.'] is not found!');
    }
    unset($control);
}
//outside c&a
function _init_exteral_ca() {
    if (isset($_GET['out_trade_no']) || isset($_POST['out_trade_no']) || isset($_GET['sp_billno']) || isset($_POST['sp_billno']) || isset($_GET['v_oid']) || isset($_POST['v_oid'])) {
        return true;
    }
    else {
        return false;
    }
}
if (extension_loaded('zlib')) {
    ob_end_flush();
}
?>