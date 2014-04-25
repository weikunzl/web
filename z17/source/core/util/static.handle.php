<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class XHandle {
	public static function error($error) {
		echo "<meta http-equiv='Content-Type' content='text/html; charset=" . OESOFT_CHARSET . "' />
		<style>body{font-size:12px;line-height:25px;}</style>
		<body>
		" . $error . "
		</body>
		";
		die ();
	}
	public static function wapError($error) {
		echo "<style>body{font-size:12px;line-height:25px;}</style>" . "<body>" . $error . "</body>";
		die ();
	}
	public static function wapHalt($str, $url = '', $type) {
		require_once BASE_ROOT . './source/core/util/function.waphalt.php';
		die ();
	}
	public static function redirect($url, $time = 0) {
		if (! headers_sent ()) {
			if ($time === 0)
				header ( "Location: " . $url );
			header ( "refresh:" . $time . ";url=" . $url . "" );
			die ();
		} else {
			exit ( "<meta http-equiv='Refresh' content='" . $time . ";URL=" . $url . "'>" );
			die ();
		}
	}
	public static function getLength($str) {
		$len = 0;
		if (! empty ( $str )) {
			preg_match_all ( '#(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+)#s', $str, $array, PREG_PATTERN_ORDER );
			foreach ( $array [0] as $val ) {
				$len += ord ( $val ) >= 128 ? 2 : 1;
			}
		}
		return $len;
	}
	public static function getWordLength($value) {
		$len = 0;
		if (! empty ( $value )) {
			preg_match_all ( '#(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+)#s', $value, $array, PREG_PATTERN_ORDER );
			foreach ( $array [0] as $val ) {
				$len += ord ( $val ) >= 128 ? 1 : 1;
			}
		}
		return $len;
	}
	public static function getRndChar($length, $type = 0) {
		switch ($type) {
			case 1 :
				$pattern = "1234567890";
				break;
			case 2 :
				$pattern = "abcdefghijklmnopqrstuvwxyz";
				break;
			case 3 :
				$pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				break;
			case 4 :
				$pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890~!@#$%^&*()_-+=";
				break;
			case 5 :
				$pattern = "123456789";
				break;
			default :
				$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
		}
		$size = strlen ( $pattern ) - 1;
		$key = $pattern {rand ( 0, $size )};
		for($i = 1; $i < $length; $i ++) {
			$key .= $pattern {rand ( 0, $size )};
		}
		return $key;
	}
	public static function foundInChar($string, $tofound, $split = ',') {
		$flag = false;
		if (! empty ( $string ) && ! empty ( $tofound )) {
			$args = explode ( $split, $string );
			for($i = 0; $i < sizeof ( $args ); $i ++) {
				if (trim ( strtolower ( $args [$i] ) ) == trim ( strtolower ( $tofound ) )) {
					$flag = true;
					break;
				}
			}
		}
		return $flag;
	}
	public static function getStrpos($s_str, $s_needlechar) {
		if (empty ( $s_str )) {
			return;
		}
		if (empty ( $s_needlechar )) {
			return;
		}
		$s_temparray = explode ( $s_needlechar, $s_str );
		if (count ( $s_temparray ) > 0) {
			return true;
		} else {
			return false;
		}
	}
	public static function recBr($s_content) {
		$s_content = str_replace ( "\n", "<br />", $s_content );
		return $s_content;
	}
	public static function filterHtml($_obfuscate_R2_b, $_obfuscate_KT_ujQ = false) {
		if ($_obfuscate_KT_ujQ) {
			$_obfuscate_dcwitxb = array (
					"/<img[^\\<\\>]+src=['\"]?([^\\<\\>'\"\\s]*)['\"]?/is",
					"/<a[^\\<\\>]+href=['\"]?([^\\<\\>'\"\\s]*)['\"]?/is",
					"/on[a-z]+[\\s]*=[\\s]*\"[^\"]*\"/is",
					"/on[a-z]+[\\s]*=[\\s]*'[^']*'/is" 
			);
			$_obfuscate_77tGbWOiZg = array (
					"\\1<br>\\0",
					"\\1<br>\\0",
					"",
					"" 
			);
			$_obfuscate_R2_b = preg_replace ( $_obfuscate_dcwitxb, $_obfuscate_77tGbWOiZg, $_obfuscate_R2_b );
		}
		$_obfuscate_dcwitxb = array (
				"/([\r\n])[\\s]+/",
				"/\\<br[^\\>]*\\>/i",
				"/\\<[\\s]*\\/p[\\s]*\\>/i",
				"/\\<[\\s]*p[\\s]*\\>/i",
				"/\\<script[^\\>]*\\>.*\\<\\/script\\>/is",
				"/\\<[\\/\\!]*[^\\<\\>]*\\>/is",
				"/&(quot|#34);/i",
				"/&(amp|#38);/i",
				"/&(lt|#60);/i",
				"/&(gt|#62);/i",
				"/&(nbsp|#160);/i",
				"/&#(\\d+);/",
				"/&([a-z]+);/i" 
		);
		$_obfuscate_77tGbWOiZg = array (
				" ",
				"\r\n",
				"",
				"\r\n\r\n",
				"",
				"",
				"\"",
				"&",
				"<",
				">",
				" ",
				"-",
				"" 
		);
		$_obfuscate_R2_b = preg_replace ( $_obfuscate_dcwitxb, $_obfuscate_77tGbWOiZg, $_obfuscate_R2_b );
		$_obfuscate_R2_b = strip_tags ( $_obfuscate_R2_b );
		return $_obfuscate_R2_b;
	}
	public static function cutStrLen($string, $sublen, $start = 0) {
		if (OESOFT_CHARSET == 'UTF-8' or OESOFT_CHARSET == 'utf-8') {
			$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
			preg_match_all ( $pa, $string, $t_string );
			if (count ( $t_string [0] ) - $start > $sublen)
				return join ( '', array_slice ( $t_string [0], $start, $sublen ) ) . "";
			return join ( '', array_slice ( $t_string [0], $start, $sublen ) );
		} else {
			$start = $start * 2;
			$sublen = $sublen * 2;
			$strlen = strlen ( $string );
			$tmpstr = '';
			for($i = 0; $i < $strlen; $i ++) {
				if ($i >= $start && $i < ($start + $sublen)) {
					if (ord ( substr ( $string, $i, 1 ) ) > 129) {
						$tmpstr .= substr ( $string, $i, 2 );
					} else {
						$tmpstr .= substr ( $string, $i, 1 );
					}
				}
				if (ord ( substr ( $string, $i, 1 ) ) > 129)
					$i ++;
			}
			return $tmpstr;
		}
	}
	public static function utfToGbk($value) {
		if (function_exists ( 'iconv' )) {
			return iconv ( 'UTF-8', 'GBK', $value );
		} else {
			if (function_exists ( 'mb_convert_encoding' )) {
				return mb_convert_encoding ( $value, 'UTF-8', 'GBK' );
			} else {
				return $value;
			}
		}
	}
	public static function gbkToUtf($value) {
		if (function_exists ( 'iconv' )) {
			return iconv ( 'GBK', 'UTF-8', $value );
		} else {
			if (function_exists ( 'mb_convert_encoding' )) {
				return mb_convert_encoding ( $value, 'GBK', 'UTF-8' );
			} else {
				return $value;
			}
		}
	}
	public static function formatNumber($price, $pricetype = 1, $change_price = true) {
		if ($change_price) {
			switch ($pricetype) {
				case 0 :
					$price = number_format ( $price, 2, '.', '' );
					break;
				case 1 :
					$price = preg_replace ( '/(.*)(\\.)([0-9]*?)0+$/', '\1\2\3', number_format ( $price, 2, '.', '' ) );
					if (substr ( $price, - 1 ) == '.') {
						$price = substr ( $price, 0, - 1 );
					}
					break;
				case 2 :
					$price = substr ( number_format ( $price, 2, '.', '' ), 0, - 1 );
					break;
				case 3 :
					$price = intval ( $price );
					break;
				case 4 :
					$price = number_format ( $price, 1, '.', '' );
					break;
				case 5 :
					$price = round ( $price );
					break;
			}
		} else {
			$price = number_format ( $price, 2, '.', '' );
		}
		return $price;
	}
	public static function mb($_string, $_comurl, $_gotype) {
		echo ("<meta http-equiv='Content-Type' content='text/html; charset=" . OESOFT_CHARSET . "' />");
		echo "<script language=javascript>alert('" . $_string . "');";
		if ($_gotype == 1) {
			echo "window.history.go(-1);";
		} else {
			echo "window.location.href='" . $_comurl . "';";
		}
		echo "</script>";
		die ();
	}
	public static function halt($message, $forwardurl, $msgtype) {
		require_once BASE_ROOT . './source/core/util/function.halt.php';
		die ();
	}
	public static function jqDialog($msg = '', $type = 1) {
		echo ("<meta http-equiv='Content-Type' content='text/html; charset=" . OESOFT_CHARSET . "' />");
		if (! empty ( $msg )) {
			echo ("<script language=javascript>alert('$msg');</script>");
			if ($type == 1) {
				echo ("<script>parent.location.reload();</script>");
			} else {
				echo ("<script>parent.JqueryDialog.Close();</script>");
			}
		} else {
			if ($type == 1) {
				echo ("<script>parent.location.reload();</script>");
			} else {
				echo ("<script>parent.JqueryDialog.Close();</script>");
			}
		}
		die ();
	}
	public static function tbDialog($msg = '', $type = 1) {
		echo ("<meta http-equiv='Content-Type' content='text/html; charset=" . OESOFT_CHARSET . "' />");
		if (! empty ( $msg )) {
			echo ("<script language=javascript>alert('$msg');</script>");
			if ($type == 1) {
				echo ("<script>parent.location.reload();</script>");
			} else {
				echo ("<script>parent.tb_remove();</script>");
			}
		} else {
			if ($type == 1) {
				echo ("<script>parent.location.reload();</script>");
			} else {
				echo ("<script>parent.tb_remove();</script>");
			}
		}
		die ();
	}
	public static function combinSql($asname, $field, $sqlitem) {
		if (self::isChar ( $sqlitem )) {
			if (self::isNumber ( $sqlitem )) {
				if (self::isChar ( $asname )) {
					$temp = " AND " . $asname . "." . $field . "=" . intval ( $sqlitem ) . "";
				} else {
					$temp = " AND " . $field . "=" . intval ( $sqlitem ) . "";
				}
			} else {
				$splitarray = explode ( ",", $sqlitem );
				for($i = 0; $i < sizeof ( $splitarray ); $i ++) {
					if (self::isChar ( $asname )) {
						$temp .= " " . $asname . "." . $field . "=" . intval ( $splitarray [$i] ) . " OR";
					} else {
						$temp .= " " . $field . "=" . intval ( $splitarray [$i] ) . " OR";
					}
				}
				$temp = substr ( $temp, 0, (strlen ( $temp ) - 3) );
				$temp = " AND (" . $temp . " )";
			}
		} else {
			$temp = " ";
		}
		return $temp;
	}
	public static function sysSortArray($ArrayData, $KeyName1, $SortOrder1 = "SORT_ASC", $SortType1 = "SORT_REGULAR") {
		if (! is_array ( $ArrayData )) {
			return $ArrayData;
		}
		$ArgCount = func_num_args ();
		for($I = 1; $I < $ArgCount; $I ++) {
			$Arg = func_get_arg ( $I );
			if (! preg_match ( "/SORT/i", $Arg )) {
				$KeyNameList [] = $Arg;
				$SortRule [] = '$' . $Arg;
			} else {
				$SortRule [] = $Arg;
			}
		}
		foreach ( $ArrayData as $Key => $Info ) {
			foreach ( $KeyNameList as $KeyName ) {
				${$KeyName} [$Key] = $Info [$KeyName];
			}
		}
		$EvalString = 'array_multisort(' . join ( ",", $SortRule ) . ',$ArrayData);';
		eval ( $EvalString );
		return $ArrayData;
	}
	public static function fileExists($fliename) {
		if (file_exists ( $fliename )) {
			return true;
		} else {
			return false;
		}
	}
	public static function forbidChar($string) {
		$forbidchar = array (
				'select',
				'update',
				'union',
				'insert',
				'load_file',
				'outfile',
				'where',
				'char',
				'concat',
				'#' 
		);
		if (self::isChar ( $string )) {
			foreach ( $forbidchar as $key ) {
				if (strpos ( strtolower ( $string ), $key )) {
					$string = "";
				}
			}
		}
		return $string;
	}
	public static function checkOdayChar($string) {
		$checkflag = false;
		$forbidchar = array (
				'select',
				'update',
				'union',
				'insert',
				'load_file',
				'outfile',
				'char',
				'concat',
				'#' 
		);
		if (self::isChar ( $string )) {
			foreach ( $forbidchar as $key ) {
				if (strpos ( strtolower ( $string ), $key )) {
					$checkflag = true;
				}
			}
		}
		return $checkflag;
	}
	public static function checkTable($tablename) {
		if (preg_match ( "/^[0-9a-zA-Z_]+$/u", $tablename )) {
			return true;
		} else {
			return false;
		}
	}
	public static function formatSize($size) {
		if ($size < 1000) {
			$size_BKM = ( string ) $size . ' B';
		} elseif ($size < (1000 * 1000)) {
			$size_BKM = number_format ( ( double ) ($size / 1000), 1 ) . ' KB';
		} else {
			$size_BKM = number_format ( ( double ) ($size / (1000 * 1000)), 1 ) . ' MB';
		}
		return $size_BKM;
	}
	public static function getTimerTips($timeline) {
		$t = time () - $timeline;
		$f = array (
				'31536000' => TLang::get ( 'tips_timer_year' ),
				'2592000' => TLang::get ( 'tips_timer_month' ),
				'604800' => TLang::get ( 'tips_timer_week' ),
				'86400' => TLang::get ( 'tips_timer_day' ),
				'3600' => TLang::get ( 'tips_timer_houser' ),
				'60' => TLang::get ( 'tips_timer_minute' ),
				'1' => TLang::get ( 'tips_timer_second' ) 
		);
		foreach ( $f as $k => $v ) {
			if (0 != $c = floor ( $t / ( int ) $k )) {
				return $c . $v . TLang::get ( 'tips_timer_before' );
			}
		}
	}
	public static function getUnixTime($type = 'time') {
		if ($type == 'time') {
			return time ();
		} else {
			return strtotime ( date ( "Y-m-d", time () ) );
		}
	}
	public static function diffDate($timeline, $days, $difftype = 1, $returntype = 1) {
		$dateline = date ( 'Y-m-d', $timeline );
		if ($difftype == 1) {
			$diff_timeline = strtotime ( $dateline ) + (3600 * 24 * $days);
		} else {
			$diff_timeline = strtotime ( $dateline ) - (3600 * 24 * $days);
		}
		if ($returntype == 1) {
			return strtotime ( date ( 'Y-m-d', $diff_timeline ) );
		} else {
			return date ( 'Y-m-d', $diff_timeline );
		}
	}
	public static function lastDate($date) {
		$lastdays = 0;
		if (is_numeric ( $date )) {
			$lastdays = ($date - strtotime ( date ( "Y-m-d", time () ) )) / 3600 / 24;
		} else {
			$lastdays = (strtotime ( $date ) - (strtotime ( 'Y-m-d', time () ))) / 3600 / 24;
		}
		return $lastdays;
	}
	public static function dounSerialize($string) {
		if (! empty ( $string )) {
			if (strtolower ( OESOFT_CHARSET ) == 'utf-8') {
				return self::utf_unserialize ( $string );
			} else {
				return self::gbk_unserialize ( $string );
			}
		} else {
			return '';
		}
	}
	private static function utf_unserialize($serial_str) {
		$serial_str = preg_replace ( '!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $serial_str );
		$serial_str = str_replace ( "\r", "", $serial_str );
		return @unserialize ( $serial_str );
	}
	private static function gbk_unserialize($serial_str) {
		$serial_str = preg_replace ( '!s:(\d+):"(.*?)";!se', '"s:".strlen("$2").":\"$2\";"', $serial_str );
		$serial_str = str_replace ( "\r", "", $serial_str );
		return @unserialize ( $serial_str );
	}
	public static function getOsType() {
		$os = explode ( " ", php_uname () );
		$os_name = $os [0];
		if ('/' == DIRECTORY_SEPARATOR) {
			$ver = $os [2];
		} else {
			$ver = $os [1];
		}
		return $os_name . ' ' . $ver;
	}
	public static function buildTagArray($params = '') {
		$attributes = array ();
		$_value = '';
		if (! empty ( $params )) {
			if (strstr ( $params, 'mod={' )) {
				$_attr = explode ( 'mod={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['mod'] = $_value;
				}
			}
			if (strstr ( $params, 'type={' )) {
				$_attr = explode ( 'type={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['type'] = $_value;
				}
			}
			if (strstr ( $params, 'where={' )) {
				$_attr = explode ( 'where={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['where'] = $_value;
				}
			}
			if (strstr ( $params, 'orderby={' )) {
				$_attr = explode ( 'orderby={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['orderby'] = $_value;
				}
			}
			if (strstr ( $params, 'num={' )) {
				$_attr = explode ( 'num={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['num'] = $_value;
				}
			}
			if (strstr ( $params, 'childnum={' )) {
				$_attr = explode ( 'childnum={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['childnum'] = $_value;
				}
			}
			if (strstr ( $params, 'catid={' )) {
				$_attr = explode ( 'catid={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['catid'] = $_value;
				}
			}
			if (strstr ( $params, 'awith={' )) {
				$_attr = explode ( 'awith={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['awith'] = $_value;
				}
			}
			if (strstr ( $params, 'aheight={' )) {
				$_attr = explode ( 'aheight={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['aheight'] = $_value;
				}
			}
			if (strstr ( $params, 'value={' )) {
				$_attr = explode ( 'value={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['value'] = $_value;
				}
			}
			if (strstr ( $params, 'module={' )) {
				$_attr = explode ( 'module={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['module'] = $_value;
				}
			}
			if (strstr ( $params, 'treeid={' )) {
				$_attr = explode ( 'treeid={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['treeid'] = $_value;
				}
			}
			if (strstr ( $params, 'rootid={' )) {
				$_attr = explode ( 'rootid={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['rootid'] = $_value;
				}
			}
			if (strstr ( $params, 'ismenu={' )) {
				$_attr = explode ( 'ismenu={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['ismenu'] = $_value;
				}
			}
			if (strstr ( $params, 'isaccessory={' )) {
				$_attr = explode ( 'isaccessory={', $params );
				$_attr_value = $_attr [1];
				if (strstr ( $_attr_value, '}' )) {
					$_attr_right_array = explode ( '}', $_attr_value );
					$_value = $_attr_right_array [0];
					$attributes ['isaccessory'] = $_value;
				}
			}
		}
		return $attributes;
	}
	public static function artTips($mod, $content = NULL) {
		$cptpl = 'tpl/user/';
		$var_array = array (
				'mod' => $mod,
				'content' => $content 
		);
		TPL::assign ( $var_array );
		TPL::display ( $cptpl . 'artTips.tpl' );
		die ();
	}
	public static function repEmface($text) {
		$new_text = NULL;
		if (! empty ( $text )) {
			$new_text = $text;
			$em_path = PATH_URL . 'tpl/static/images/face/';
			for($i = 0; $i < 105; $i ++) {
				$new_text = str_replace ( "{emf_{$i}}", "<img src='" . $em_path . $i . ".gif' />", $new_text );
			}
		}
		return $new_text;
	}
}
?>