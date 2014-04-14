<?php
/**
 * [OELove] (C)2012-2099 OEdev,Inc.
 * <E-Mail：phpcoo@phpcoo.com>
 * Url http://www.phpcoo.com
 *     http://www.oemarry.com
 *     http://www.oedev.net
 * Update 2013.09.09
*/
//载入主文件
require_once 'source/core/run.php';
require_once 'source/core/util/function.iswap.php';
if (false == mobile_device_detect()) {
    XHandle::redirect(PATH_URL.'index.php');
}
//c&a参数
$c = XRequest::getGpc('c');
$a = XRequest::getGpc('a');
$c = empty($c) ? 'index' : $c;
$a = empty($a) ? 'run' : $a;
//Controller
if (!in_array($c, 
    array(
        'index', 'passport', 'about', 'user', 'home', 'online', 
        'cp', 'cp_do', 'cp_info', 'cp_message', 'cp_visit', 
        'cp_listen', 'cp_fans', 'cp_money', 'cp_points', 'cp_photo', 
    ))) {
	XHandle::error('Wap Controller ['.$c.'] is forbiden!');
}
$control_base = BASE_ROOT.'./source/control/wapbase.php';
$hook_base = BASE_ROOT.'./source/control/apphook.php';
$control_path = BASE_ROOT.'./source/control/wap/'.$c.'.php';
if (!file_exists($control_path)) {
	XHandle::error('Wap Controller file:['.$c.'] is not found!');
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
		XHandle::error('Wap Controller ['.$c.'] Action ['.$a.'] is not found!');
    }
    unset($control);
}
?>