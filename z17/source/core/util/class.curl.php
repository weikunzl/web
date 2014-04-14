<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class curlClass
{

    private $cookie_path = "/data/cookie/curldata.txt";

    private function _init( )
    {
        if ( !function_exists( "curl_init" ) )
        {
            exit( "系统需要CURL支持！" );
        }
        $this->cookie_path = "./data/cookie/".md5( OESOFT_RANDKEY )."_data.txt";
    }

    public function get( $url )
    {
        $this->_init( );
        if ( !$url )
        {
            return FALSE;
        }
        $ssl = substr( $url, 0, 8 ) == "https://" ? TRUE : FALSE;
        $curl = curl_init( );
        curl_setopt( $curl, CURLOPT_URL, $url );
        if ( $ssl )
        {
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 1 );
        }
        if ( ini_get( "safe_mode" ) || ini_get( "open_basedir" ) )
        {
            $this->curl_redir_exec( $curl );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            $content = curl_exec( $curl );
        }
        else
        {
            @curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            $content = curl_exec( $curl );
        }
        $status = curl_getinfo( $curl );
        curl_close( $curl );
        if ( intval( $status['http_code'] ) == 200 )
        {
            if ( ini_get( "safe_mode" ) || ini_get( "open_basedir" ) )
            {
                if ( strpos( $content, "charset=utf-8" ) )
                {
                    $astring = explode( "charset=utf-8", $content );
                    $content = trim( $astring[1] );
                }
                return $content;
            }
            return $content;
        }
        return "fail";
    }

    public function post( $url, $data, $proxy = NULL, $timeout = 15 )
    {
        $this->_init( );
        if ( !$url )
        {
            return FALSE;
        }
        $ssl = substr( $url, 0, 8 ) == "https://" ? TRUE : FALSE;
        $curl = curl_init( );
        if ( !is_null( $proxy ) )
        {
            curl_setopt( $curl, CURLOPT_PROXY, $proxy );
        }
        curl_setopt( $curl, CURLOPT_URL, $url );
        if ( $ssl )
        {
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 1 );
        }
        $cookie_file = $this->get_cookie_file( );
        curl_setopt( $curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );
        curl_setopt( $curl, CURLOPT_HEADER, 0 );
        curl_setopt( $curl, CURLOPT_POST, TRUE );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
        @curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
        $content = curl_exec( $curl );
        $status = curl_getinfo( $curl );
        curl_close( $curl );
        if ( intval( $status['http_code'] ) == 200 )
        {
            return $content;
        }
        return "fail";
    }

    public function put( $url, $data, $proxy = NULL, $timeout = 15 )
    {
        $this->_init( );
        if ( !$url )
        {
            return FALSE;
        }
        $ssl = substr( $url, 0, 8 ) == "https://" ? TRUE : FALSE;
        $curl = curl_init( );
        if ( !is_null( $proxy ) )
        {
            curl_setopt( $curl, CURLOPT_PROXY, $proxy );
        }
        curl_setopt( $curl, CURLOPT_URL, $url );
        if ( $ssl )
        {
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 1 );
        }
        $cookie_file = $this->get_cookie_file( );
        curl_setopt( $curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );
        curl_setopt( $curl, CURLOPT_HEADER, 0 );
        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
        curl_setopt( $curl, CURLOPT_TIMEOUT, $timeout );
        $data = is_array( $data ) ? http_build_query( $data ) : $data;
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( "Content-Length: ".strlen( $data ) ) );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
        $content = curl_exec( $curl );
        $status = curl_getinfo( $curl );
        curl_close( $curl );
        if ( intval( $status['http_code'] ) == 200 )
        {
            return $content;
        }
        return "fail";
    }

    public function del( $url, $data, $proxy = NULL, $timeout = 15 )
    {
        $this->_init( );
        if ( !$url )
        {
            return FALSE;
        }
        $ssl = substr( $url, 0, 8 ) == "https://" ? TRUE : FALSE;
        $curl = curl_init( );
        if ( !is_null( $proxy ) )
        {
            curl_setopt( $curl, CURLOPT_PROXY, $proxy );
        }
        curl_setopt( $curl, CURLOPT_URL, $url );
        if ( $ssl )
        {
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 1 );
        }
        $cookie_file = $this->get_cookie_file( );
        curl_setopt( $curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );
        curl_setopt( $curl, CURLOPT_HEADER, 0 );
        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
        curl_setopt( $curl, CURLOPT_TIMEOUT, $timeout );
        $data = is_array( $data ) ? http_build_query( $data ) : $data;
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "DEL" );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( "Content-Length: ".strlen( $data ) ) );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
        $content = curl_exec( $curl );
        $status = curl_getinfo( $curl );
        curl_close( $curl );
        if ( intval( $status['http_code'] ) == 200 )
        {
            return $content;
        }
        return "fail";
    }

    private function get_cookie_file( )
    {
        return BASE_ROOT.$this->cookie_path;
    }

    public function fileGet( $url )
    {
        $content = "";
        if ( ini_get( "allow_url_fopen" ) == "1" )
        {
            $content = @file_get_contents( $url );
            if ( empty( $content ) )
            {
                $content = $this->get( $url );
                return $content;
            }
        }
        else
        {
            $content = $this->get( $url );
        }
        return $content;
    }

    private function curl_redir_exec( $ch )
    {
        static $curl_loops = 0;
        static $curl_max_loops = 20;
        if ( $curl_max_loops <= $curl_loops++ )
        {
            $curl_loops = 0;
            return FALSE;
        }
        curl_setopt( $ch, CURLOPT_HEADER, TRUE );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
        $data = curl_exec( $ch );
        list( $header, $data ) = explode( "\n\n", $data, 2 );
        $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        if ( $http_code == 301 || $http_code == 302 )
        {
            $matches = array( );
            preg_match( "/Location:(.*?)\\n/", $header, $matches );
            $url = @parse_url( @trim( @array_pop( $matches ) ) );
            if ( !$url )
            {
                $curl_loops = 0;
                return $data;
            }
            $last_url = parse_url( curl_getinfo( $ch, CURLINFO_EFFECTIVE_URL ) );
            if ( !$url['scheme'] )
            {
                $url['scheme'] = $last_url['scheme'];
            }
            if ( !$url['host'] )
            {
                $url['host'] = $last_url['host'];
            }
            if ( !$url['path'] )
            {
                $url['path'] = $last_url['path'];
            }
            $new_url = $url['scheme']."://".$url['host'].$url['path'].( $url['query'] ? "?".$url['query'] : "" );
            curl_setopt( $ch, CURLOPT_URL, $new_url );
            return $this->curl_redir_exec( $ch );
        }
        $curl_loops = 0;
        return $data;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
