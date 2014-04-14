<?php
if (!defined('IN_OESOFT')) {
	exit('OElove Access Denied');
}
function smarty_modifier_huanhang($string, $maxlen){
//    $stringlen = 0;
//    if (!empty($string)) {
//		preg_match_all ('#(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+)#s', $string, $array, PREG_PATTERN_ORDER);
//		foreach($array[0] as $val){
//			$stringlen += ord($val) >= 128 ? 1 : 1;
//		}
//    }
    //需要截取转换
    $strlen = strlen($string);
    $loop = $strlen/($maxlen*3);
    if ($loop > 1) {
        for ($i=0; $i<intval($loop+1); $i++) {
            if ($i == $loop) {
                $new .= substr($string, ($i*$maxlen*3), $maxlen*3);
            }
            else {
                $new .= substr($string, ($i*$maxlen*3), $maxlen*3).'<br />';
            }
            
        }
    }
    else {
        $new = $string;
    }
	return $new;
}
?>