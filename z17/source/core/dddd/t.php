<?php

function aaaa($aaaa,$bbbb=""){
			global $abc;
			$aaaa=base64_decode($aaaa);
			if(empty($aaaa)) return "";
			if($bbbb==""){return ~$aaaa;}
			else{
				$ddaa=strlen($aaaa);
				$bbbb=str_pad($bbbb,$ddaa,$bbbb);
				return $aaaa^$bbbb;
			}
		}

$file = 'wapbase.php';

$fp = fopen($file, 'r');
$str = fread($fp, filesize($file));
fclose($fp);
preg_match("/'\\(\\\\'([^']+)\\\\'/i", $str, $res);
if(empty($res)){
	preg_match("/]\\('(.*?)'\\)/i", $str, $res);
}

$str2 = @gzuncompress(base64_decode($res[1]));
if($str2==false){
	$str2 = aaaa(base64_decode($res[1]));
}


preg_match("/'\\(\\\\'([^']+)\\\\'/i", $str2, $res2);
if(empty($res2)){
	preg_match("/]\\('(.*?)'\\)/i", $str2, $res2);
}
$str3 = @gzuncompress(base64_decode($res2[1]));
if($str3==false){
	$str3 = aaaa(base64_decode($res2[1]));
}

preg_match("/]\\('(.*?)'\\)/i", $str3, $res3);
if(empty($res3)){
	preg_match("/'\\(\\\\'([^']+)\\\\'/i", $str3, $res3);
}
$str3 = @gzuncompress(base64_decode($res3[1]));
if($str3==false){
	$str3 = aaaa(base64_decode($res3[1]));
}

//////////////////////////
preg_match("/'\\(\\\\'([^']+)\\\\'/i", $str3, $res4);
if(empty($res4)){
	preg_match("/]\\('(.*?)'\\)/i", $str3, $res4);
}

$str4 =@gzuncompress(base64_decode($res4[1]));
if($str4==false){
	$str4 = aaaa(base64_decode($res4[1]));
}
if($str4==""){
	$str4 = base64_decode($res4[1]);
}

/////////////////
preg_match("/'\\(\\\\'([^']+)\\\\'/i", $str4, $res5);
if(empty($res5)){
	preg_match("/]\\('(.*?)'\\)/i", $str4, $res5);
}

$str5 = @gzuncompress(base64_decode($res5[1]));
if($str5==false){
	$str5 = aaaa(base64_decode($res5[1]));
}


header ( "Content-type: text/html; charset=utf-8" );
//$str5=iconv("ASCII","UTF-8//IGNORE",$str5);
file_put_contents('detmpaaa.php', $str5);
var_dump($str5);

exit;

















$code = strdecode($str);

//�����ͺ���
$vals = $funs = array();

$code = fmt_code($code);


echo $code;exit;

preg_match('/function [a-z]+\(&\\$(.*?)\)\{(.*)return "[0-9a-zA-Z]{1}";\}/iesU', $code, $res);
$fun = str_replace($res[2],'$'.$res[1].'=@gzuncompress(base64_decode($'.$res[1].'));',$res[0]);
$code = str_replace($res[0], $fun, $code);

preg_match('/\."\(@\\$(.*?)\(\\$/iesU', $code, $res);

$str = str_replace('$'.$res[1].'(', 'file_put_contents(\'detmp2.php\',', $res[0]);
$code = str_replace($res[0], $str, $code);

$code = destr($code);
file_put_contents('detmp.php', $code);
include('detmp.php');

$fp = fopen('detmp2.php', 'r');
$str = fread($fp, filesize('detmp2.php'));
fclose($fp);

unlink('detmp2.php');
unlink('detmp.php');

$decode = gzuncompress($str);
$decode = preg_replace('/^;\?>/', '', $decode);
$decode = preg_replace('/<\?php unset\((.*?)\?>$/', '', $decode);

file_put_contents($file.'.de.php' ,$decode);
print_r($decode);

////////////
function val_replace($code, $val, $deval){
    $code = str_replace('$'.$val.',', '$'.$deval.',', $code);
    $code = str_replace('$'.$val.';', '$'.$deval.';', $code);
    $code = str_replace('$'.$val.'=', '$'.$deval.'=', $code);
    $code = str_replace('$'.$val.'(', '$'.$deval.'(', $code);
    $code = str_replace('$'.$val.')', '$'.$deval.')', $code);
    $code = str_replace('$'.$val.'.', '$'.$deval.'.', $code);
    $code = str_replace('$'.$val.'/', '$'.$deval.'/', $code);
    $code = str_replace('$'.$val.'>', '$'.$deval.'>', $code);
    $code = str_replace('$'.$val.'<', '$'.$deval.'<', $code);
    $code = str_replace('$'.$val.'^', '$'.$deval.'^', $code);
    $code = str_replace('$'.$val.'||', '$'.$deval.'||', $code);
    $code = str_replace('($'.$val.' ', '($'.$deval.' ', $code);
    return $code;
}

function fmt_code($code){
    global $vals,$funs;
    preg_match_all("/\\$[0-9a-zA-Z\[\]]+(,|;)/iesU", $code, $res);
    foreach($res[0] as $v){
        $val = str_replace(array('$',',',';'), '', $v);
        $deval = destr($val, 1);
        $vals[$val] = $deval;
        $code = val_replace($code, $val, $deval);
    }

    preg_match_all("/\\$[0-9a-zA-Z\[\]]+=/iesU", $code, $res);
    foreach($res[0] as $v){
        $val = str_replace(array('$','='), '', $v);
        $deval = destr($val, 1);
        $vals[$val] = $deval;
        $code = val_replace($code, $val, $deval);
    }

    preg_match_all("/function\s[0-9a-zA-Z\[\]]+\(/iesU", $code, $res);
    foreach($res[0] as $v){
        $val = str_replace(array('function ','('), '', $v);
        $deval = destr($val, 1);
        $funs[$val] = $deval;
        $code = str_replace('function '.$val.'(', 'function '.$deval.'(', $code);
        $code = str_replace('='.$val.'(', '='.$deval.'(', $code);
        $code = str_replace('return '.$val.'(', 'return '.$deval.'(', $code);
    }
    return $code;
}

function strdecode($str){
    $len = strlen($str);
    $newstr = '';
    for($i=0; $i<$len; $i++){
        $n = ord($str[$i]);
        $newstr .= decode($n);
    }
    return $newstr;
}

function decode($dec){
    if(($dec > 126 || $dec<32) && $dec<>13 && $dec<>10){
        return '['.$dec.']';
    }else{
        return chr($dec);
    }
}

function destr($str, $val=0){
    $k = 0;
    $num = '';
    $n = strlen($str);
    $code = '';
    for($i=0; $i<$n; $i++){
        if($str[$i] == '['){
            $k = 1;
        }elseif($str[$i] == ']'){
            $num = intval($num);
            if($val==1){
                $num = 97 + fmod($num, 25);
            }
            $code .= chr($num);
            $k = 0;
            $num = null;
        }else{
            if($k == 1){
                $num .= $str[$i];
            }else{
                $code .= $str[$i];
            }
        }
    }
    return $code;
}
?>