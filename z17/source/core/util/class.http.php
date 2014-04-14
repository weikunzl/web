<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class httpClass
{

    private $defaultFlen = 8192;
    private $block = TRUE;
    private $defaultPort = 80;

    public function httpGet( $url, $post, $ip = "", $timeout = 15, $cookie = "", $freadLen = 0 )
    {
        $data = $this->parseParam( $url, $post, $ip, $timeout, $cookie, $freadLen );
        list( $url, $post, $ip, $timeout, $port, $cookie, $freadLen ) = array(
            $data['url'],
            $data['post'],
            $data['ip'],
            $data['timeout'],
            $data['port'],
            $data['cookie'],
            $data['freadLen']
        );
        unset( $data );
        $httpReturn = $httpHeader = "";
        $httpHeader = $post !== "" ? $this->httpPostHeader( $url, $post, $ip, $port, $cookie ) : $this->httpGetHeader( $url, $post, $ip, $port, $cookie );
        $httpFp = @fsockopen( $ip, $port, &$errno, &$errstr, $timeout );
        @stream_set_blocking( $httpFp, $this->block );
        @stream_set_timeout( $httpFp, $timeout );
        @fwrite( $httpFp, $httpHeader );
        $status = @stream_get_meta_data( $httpFp );
        if ( !$httpFp || $status['timed_out'] )
        {
            fclose( $httpFp );
            return $httpReturn;
        }
        $freadLen = $freadLen == 0 ? $this->defaultFlen : $this->defaultFlen < $freadLen ? $this->defaultFlen : $freadLen;
        $isHttpHeader = $stopFread = FALSE;
        while ( !(feof( $httpFp ) || $stopFread) )
        {
            if ( !$isHttpHeader && ( $tempHttpReturn = @fgets( $httpFp ) ) && ( $tempHttpReturn == "\r\n" || $tempHttpReturn == "\n" ) )
            {
                $isHttpHeader = TRUE;
            }
            if ( $isHttpHeader )
            {
                $httpReturn = @fread( $httpFp, $freadLen );
                if ( $freadLen < strlen( $httpReturn ) )
                {
                    $stopFread = TRUE;
                }
            }
        }
        fclose( $httpFp );
        return $httpReturn;
    }

    private function httpPostHeader( $url, $post, $ip, $port = 80, $cookie = "" )
    {
        $httpHeader = "";
        $httpHeader .= "POST ".$url." HTTP/1.0\r\n";
        $httpHeader .= "Accept: */*\r\n";
        $httpHeader .= "Accept-Language: zh-cn\r\n";
        $httpHeader .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $httpHeader .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT']."\r\n";
        $httpHeader .= "Content-Length: ".strlen( $post )."\r\n";
        $httpHeader .= "Host: ".$ip.":".( integer )$port."\r\n";
        $httpHeader .= "Connection: Close\r\n";
        $httpHeader .= "Cache-Control: no-cache\r\n";
        $httpHeader .= "Cookie: ".$cookie."\r\n\r\n";
        $httpHeader .= $post;
        return $httpHeader;
    }

    private function httpGetHeader( $url, $post, $ip, $port = 80, $cookie = "" )
    {
        $httpHeader = "";
        $httpHeader .= "GET ".$url." HTTP/1.0\r\n";
        $httpHeader .= "Accept: */*\r\n";
        $httpHeader .= "Accept-Language: zh-cn\r\n";
        $httpHeader .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $httpHeader .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT']."\r\n";
        $httpHeader .= "Host: ".$ip.":".( integer )$port."\r\n";
        $httpHeader .= "Connection: Close\r\n";
        $httpHeader .= "Cookie: ".$cookie."\r\n\r\n";
        return $httpHeader;
    }

    private function parseParam( $url, $post, $ip, $timeout, $cookie, $freadLen )
    {
        $tempArr = array( );
        $tempArr['url'] = ( boolean )$url;
        $tempArr['post'] = $this->parseArrToUrlstr( ( array )$post );
        $tempArr['ip'] = ( boolean )$ip;
        $tempArr['timeout'] = ( integer )$timeout;
        $tempArr['port'] = $this->parsePort( $url, $ip );
        $tempArr['cookie'] = ( boolean )$cookie;
        $tempArr['freadLen'] = ( integer )$freadLen;
        $tempArr['ip'] = $tempArr['ip'] == "" ? $this->parseUrlToHost( $tempArr['url'] ) : $tempArr['ip'];
        return $tempArr;
    }

    private function parseArrToUrlstr( $arr )
    {
        if ( !is_array( $arr ) )
        {
            return "";
        }
        return http_build_query( $arr, "flags_" );
    }

    private function parseUrlToHost( $url )
    {
        $parse = @parse_url( $url );
        $reg = "/^http:\\/\\/[A-Za-z0-9]+\\.[A-Za-z0-9]+[\\/=\\?%\\-&_~`@[\\]':+!]*([^<>\\\"\\\"])*$/";
        if ( empty( $parse ) || !preg_match( $reg, trim( $url ) ) )
        {
            return "";
        }
        return str_replace( array( "http://", "https://" ), array( "", "ssl://" ), "{$parse['scheme']}://" ).$parse['host'];
    }

    private function parsePort( $url, $ip )
    {
        $temp = array( );
        if ( $ip !== "" )
        {
            if ( strpos( $ip, ":" ) === FALSE )
            {
                $tempPort = $this->defaultPort;
            }
            else
            {
                $temp = explode( ":", $ip );
                $tempPort = $temp[1];
            }
        }
        else
        {
            $temp = @parse_url( $url );
            $tempPort = $temp['port'];
        }
        if ( ( integer )$tempPort == 0 )
        {
            return $this->defaultPort;
        }
        return $tempPort;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
