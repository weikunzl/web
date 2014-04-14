<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function curl_remote_image( $httpurl, $fixedname = "" )
{
    $remote_result = "";
    if ( function_exists( "curl_init" ) )
    {
        $oCurl = curl_init( );
        if ( stripos( $sUrl, "https://" ) !== FALSE )
        {
            curl_setopt( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt( $oCurl, CURLOPT_SSL_VERIFYHOST, FALSE );
        }
        curl_setopt( $oCurl, CURLOPT_USERAGENT, $_SERVER['USER_AGENT'] ? $_SERVER['USER_AGENT'] : "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.7) Gecko/20100625 Firefox/3.6.7" );
        curl_setopt( $oCurl, CURLOPT_URL, $httpurl );
        curl_setopt( $oCurl, CURLOPT_REFERER, $httpurl );
        curl_setopt( $oCurl, CURLOPT_AUTOREFERER, TRUE );
        curl_setopt( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $sContent = curl_exec( $oCurl );
        $aStatus = curl_getinfo( $oCurl );
        curl_close( $oCurl );
        if ( intval( $aStatus['http_code'] ) == 200 && !empty( $sContent ) )
        {
            $fixedname = empty( $fixedname ) ? time( ) : $fixedname;
            $filename = "data/attachment/temp/".$fixedname.".jpg";
            file_put_contents( BASE_ROOT."./".$filename, $sContent );
            $remote_result = $filename;
        }
    }
    return $remote_result;
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
