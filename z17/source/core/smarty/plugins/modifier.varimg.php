<?php
if (!defined('IN_OESOFT')) {
	exit('OElove Access Denied');
}
/**
 * @CopyRight  (C)2010-2012 OEdev.Net Inc.
 * @WebSite    www.phpcoo.com,www.oedev.net
 * @Author     OEdev <phpcoo@qq.com>
 * @Brief      OElove v3.X
 * @Update     2012.07.10
**/
/**
 * @param:: array $data = array('data'=>, 'width'=>)
 * @return:: img
*/
function smarty_modifier_varimg ($data) {
    if (is_array($data)) {        
		Header("Content-type: image/PNG");  
		$im = imagecreate($data['width'], 20); //制定图片背景大小
		$black = imagecolorallocate($im, 0,0,0); //设定三种颜色
		$white = imagecolorallocate($im, 255,255,255); 
		$gray = imagecolorallocate($im, 200,200,200); 
		imagefill($im, 0, 0, $gray); //采用区域填充法，设定（0,0）
		$authnum = $data['data'];
		imagestring($im, 5, 10, 3, $authnum, $black);
		// 用 col 颜色将字符串 s 画到 image 所代表的图像的 x，y 座标处（图像的左上角为 0, 0）。
		//如果 font 是 1，2，3，4 或 5，则使用内置字体
		for($i=0; $i<200; $i++) { 
     		$randcolor = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
     		imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
		}
		$a = imagepng($im); 
		imagedestroy($im);
		//return $a;
    }
}
?>