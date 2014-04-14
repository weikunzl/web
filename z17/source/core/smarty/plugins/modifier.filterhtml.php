<?php
if (!defined('IN_OESOFT')) {
	exit('OElove Access Denied');
}
/**
 * @CopyRight  (C)2006-2011 OE Development team Inc.
 * @WebSite    www.phpcoo.com£¬www.oecms.cn
 * @Author     Chency <phpzac@foxmail.com>
 * @Brief      OEcms v3.0
 * @Update     2011.09.01
**/
function smarty_modifier_filterhtml($_obfuscate_R2_b,$sublen,$code="UTF-8"){
	if (!empty($_obfuscate_R2_b)){
		$_obfuscate_R2_b = stripslashes($_obfuscate_R2_b);
	}
	$_obfuscate_KT_ujQ = false;
	if($_obfuscate_KT_ujQ){
		$_obfuscate_dcwitxb = array( "/<img[^\\<\\>]+src=['\"]?([^\\<\\>'\"\\s]*)['\"]?/is", "/<a[^\\<\\>]+href=['\"]?([^\\<\\>'\"\\s]*)['\"]?/is", "/on[a-z]+[\\s]*=[\\s]*\"[^\"]*\"/is", "/on[a-z]+[\\s]*=[\\s]*'[^']*'/is" );
		$_obfuscate_77tGbWOiZg   = array( "\\1<br>\\0", "\\1<br>\\0", "", "" );
		$_obfuscate_R2_b = preg_replace( $_obfuscate_dcwitxb, $_obfuscate_77tGbWOiZg  , $_obfuscate_R2_b );
	}
	$_obfuscate_dcwitxb = array( "/([\r\n])[\\s]+/", "/\\<br[^\\>]*\\>/i", "/\\<[\\s]*\\/p[\\s]*\\>/i", "/\\<[\\s]*p[\\s]*\\>/i", "/\\<script[^\\>]*\\>.*\\<\\/script\\>/is", "/\\<[\\/\\!]*[^\\<\\>]*\\>/is", "/&(quot|#34);/i", "/&(amp|#38);/i", "/&(lt|#60);/i", "/&(gt|#62);/i", "/&(nbsp|#160);/i", "/&#(\\d+);/", "/&([a-z]+);/i" );
	$_obfuscate_77tGbWOiZg   = array( " ", "\r\n", "", "\r\n\r\n", "", "", "\"", "&", "<", ">", " ", "-", "" );
	$_obfuscate_R2_b = preg_replace( $_obfuscate_dcwitxb, $_obfuscate_77tGbWOiZg  , $_obfuscate_R2_b );
	$_obfuscate_R2_b = strip_tags( $_obfuscate_R2_b );

	$string = $_obfuscate_R2_b;
	$start = 0;
	if($code == 'UTF-8' OR $code == 'utf-8'){
		$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/"; 
		preg_match_all($pa, $string, $t_string); 
		if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)).""; return join('', array_slice($t_string[0], $start, $sublen));
	}else{ 
		$start = $start*2; 
		$sublen = $sublen*2; 
		$strlen = strlen($string); 
		$tmpstr = ''; 
		for($i=0; $i< $strlen; $i++){ 
			if($i>=$start && $i< ($start+$sublen)){
				if(ord(substr($string, $i, 1))>129){
					$tmpstr.= substr($string, $i, 2);
				}else{
					$tmpstr.= substr($string, $i, 1);
				} 
			}
			if(ord(substr($string, $i, 1))>129) $i++;
		}
		return $tmpstr;
	}

}
?>