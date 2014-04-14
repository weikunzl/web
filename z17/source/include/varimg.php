<?php
/**
 * @CopyRight  (C)2010-2012 OEdev.Net Inc.
 * @WebSite    www.phpcoo.com,www.oedev.net
 * @Author     OEdev <phpcoo@qq.com>
 * @Brief      OElove v3.X
 * @Update     2012.09.10
**/
require_once '../../source/core/run.php';
create_varimg();
function create_varimg() {
    $key = XRequest::getArgs('key');
    $width = XRequest::getInt('width');
    if ($width == 0) {
        $width = 120;
    }
    $code = X::import('code', 'util');
    $key = $code->authCode($key, 'DECODE', OESOFT_RANDKEY);
    unset($code);
    if (!empty($key)) {
		Header("Content-type: image/PNG");  
		$im = imagecreate($width, 20); //制定图片背景大小
		$black = imagecolorallocate($im, 0,0,0); //设定三种颜色
		$white = imagecolorallocate($im, 255,255,255); 
		$gray = imagecolorallocate($im, 200,200,200); 
		imagefill($im, 0, 0, $white); //采用区域填充法，设定（0,0）
		imagestring($im, 4, 3, 3, $key, $black);
		imagepng($im); 
		imagedestroy($im);  
    }
}
?>  