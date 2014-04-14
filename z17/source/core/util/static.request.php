<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class XRequest
{

    public static function getPost( $name = "" )
    {
        if ( empty( $name ) )
        {
            return $_POST;
        }
        if ( isset( $_POST[$name] ) )
        {
            return $_POST[$name];
        }
        return "";
    }

    public static function getGet( $name = "" )
    {
        if ( empty( $name ) )
        {
            return $_GET;
        }
        if ( isset( $_GET[$name] ) )
        {
            return $_GET[$name];
        }
        return "";
    }

    public static function getCookie( $name = "" )
    {
        if ( $name == "" )
        {
            return $_COOKIE;
        }
        if ( isset( $_COOKIE[$name] ) )
        {
            return $_COOKIE[$name];
        }
        return "";
    }

    public static function getSession( $name = "" )
    {
        if ( $name == "" )
        {
            return $_SESSION;
        }
        if ( isset( $_SESSION[$name] ) )
        {
            return $_SESSION[$name];
        }
        return "";
    }

    public static function fetchEnv( $name = "" )
    {
        if ( $name == "" )
        {
            return $_ENV;
        }
        if ( isset( $_ENV[$name] ) )
        {
            return $_ENV[$name];
        }
        return "";
    }

    public static function getService( $name = "" )
    {
        if ( $name == "" )
        {
            return $_SERVER;
        }
        if ( isset( $_SERVER[$name] ) )
        {
            return $_SERVER[$name];
        }
        return "";
    }

    public static function getPhpSelf( )
    {
        return strip_tags( self::getservice( "PHP_SELF" ) );
    }

    public static function getServiceName( )
    {
        return self::getservice( "SERVER_NAME" );
    }

    public static function getRequestTime( )
    {
        return self::getservice( "REQUEST_TIME" );
    }

    public static function getUserAgent( )
    {
        return self::getservice( "HTTP_USER_AGENT" );
    }

    public static function getUri( )
    {
        return self::getservice( "REQUEST_URI" );
    }

    public static function isPost( )
    {
        if ( strtolower( self::getservice( "REQUEST_METHOD" ) ) == "post" )
        {
            return TRUE;
        }
        return FALSE;
    }

    public static function isGet( )
    {
        if ( strtolower( self::getservice( "REQUEST_METHOD" ) ) == "get" )
        {
            return TRUE;
        }
        return FALSE;
    }

    public static function isAjax( )
    {
        if ( self::getservice( "HTTP_X_REQUESTED_WITH" ) && ( self::getservice( "HTTP_X_REQUESTED_WITH" ) ) == "xmlhttprequest" )
        {
            return TRUE;
        }
        if ( self::getservice( "HTTP_REQUEST_TYPE" ) && ( self::getservice( "HTTP_REQUEST_TYPE" ) ) == "ajax" )
        {
            return TRUE;
        }
        if ( self::getpost( "oe_ajax" ) || self::getget( "oe_ajax" ) )
        {
            return TRUE;
        }
        return FALSE;
    }

    public static function getip( )
    {
        static $realip = NULL;
        if ( isset( $_SERVER ) )
        {
            if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
            {
                $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) )
                {
                    $realip = $_SERVER['HTTP_CLIENT_IP'];
                }
                else
                {
                    $realip = $_SERVER['REMOTE_ADDR'];
                }
            }
        }
        else if ( getenv( "HTTP_X_FORWARDED_FOR" ) )
        {
            $realip = getenv( "HTTP_X_FORWARDED_FOR" );
        }
        else if ( getenv( "HTTP_CLIENT_IP" ) )
        {
            $realip = getenv( "HTTP_CLIENT_IP" );
        }
        else
        {
            $realip = getenv( "REMOTE_ADDR" );
        }
        $one = "([0-9]|[0-9]{2}|1\\d\\d|2[0-4]\\d|25[0-5])";
        if ( !@preg_match( "/".$one."\\.".$one."\\.".$one."\\.".$one."$/", $realip ) )
        {
            $realip = "0.0.0.0";
        }
        return $realip;
    }

    protected static function uri( )
    {
        $uri = self::geturi( );
        $file = dirname( $_SERVER['SCRIPT_NAME'] );
        $request = str_replace( $file, "", $uri );
        $request = explode( "/", trim( $request, "/" ) );
        if ( isset( $request[0] ) )
        {
            $_GET['c'] = $request[0];
            unset( $request[0] );
        }
        if ( isset( $request[1] ) )
        {
            $_GET['a'] = $request[1];
            unset( $request[1] );
        }
        if ( 1 < count( $request ) )
        {
            $mark = 0;
            $val = $key = array( );
            foreach ( $request as $value )
            {
                ++$mark;
                if ( $mark % 2 == 0 )
                {
                    $val[] = $value;
                }
                else
                {
                    $key[] = $value;
                }
            }
            if ( count( $key ) !== count( $val ) )
            {
                $val[] = NULL;
            }
            $get = array_combine( $key, $val );
            foreach ( $get as $key => $value )
            {
                $_GET[$key] = $value;
            }
        }
        return TRUE;
    }

    public static function getGpc( $value, $isfliter = TRUE )
    {
        if ( !is_array( $value ) )
        {
            if ( isset( $_GET[$value] ) )
            {
                $temp = trim( $_GET[$value] );
            }
            if ( isset( $_POST[$value] ) )
            {
                $temp = trim( $_POST[$value] );
            }
            $temp = $isfliter === TRUE ? XFilter::filterstr( $temp ) : $temp;
            return trim( $temp );
        }
        $temp = array( );
        foreach ( $value as $val )
        {
            if ( isset( $_GET[$val] ) )
            {
                $temp[$val] = trim( $_GET[$val] );
            }
            if ( isset( $_POST[$val] ) )
            {
                $temp[$val] = trim( $_POST[$val] );
            }
            $temp[$val] = $isfliter === TRUE ? XFilter::filterstr( $temp[$val] ) : $temp[$val];
        }
        return $temp;
    }

    public static function getArgs( $value, $default = NULL, $isfliter = TRUE )
    {
        if ( !empty( $value ) )
        {
            if ( isset( $_GET[$value] ) )
            {
                $temp = trim( $_GET[$value] );
            }
            if ( isset( $_POST[$value] ) )
            {
                $temp = trim( $_POST[$value] );
            }
            if ( $isfliter )
            {
                $temp = XFilter::filterstr( $temp );
            }
            else
            {
                $temp = XFilter::striparray( $temp );
            }
            if ( empty( $temp ) && !empty( $default ) )
            {
                $temp = $default;
            }
            return trim( $temp );
        }
        return "";
    }

    public static function getInt( $value, $default = NULL )
    {
        if ( !empty( $value ) )
        {
            if ( isset( $_GET[$value] ) )
            {
                $temp = $_GET[$value];
            }
            if ( isset( $_POST[$value] ) )
            {
                $temp = $_POST[$value];
            }
            $temp = XFilter::filterstr( $temp );
            if ( empty( $temp ) || FALSE === XValid::isnumber( $temp ) )
            {
                if ( TRUE === XValid::isnumber( $default ) )
                {
                    $temp = $default;
                }
                else
                {
                    $temp = 0;
                }
            }
            return intval( $temp );
        }
        return 0;
    }

    public static function getArray( $value )
    {
        if ( !empty( $value ) )
        {
            if ( isset( $_GET[$value] ) )
            {
                $temp = $_GET[$value];
            }
            if ( isset( $_POST[$value] ) )
            {
                $temp = $_POST[$value];
            }
            return $temp;
        }
        return "";
    }

    public static function recArgs( $value )
    {
        if ( !empty( $value ) )
        {
            if ( isset( $_GET[$value] ) )
            {
                $temp = $_GET[$value];
            }
            if ( isset( $_POST[$value] ) )
            {
                $temp = $_POST[$value];
            }
            return XFilter::filterbadchar( $temp );
        }
        return "";
    }

    public static function getComArgs( $itemname )
    {
        $args = "";
        $array = self::getarray( $itemname );
        if ( !empty( $array ) )
        {
            $ii = 0;
            for ( ; $ii < count( $array ); ++$ii )
            {
                $val = XFilter::filterbadchar( $array[$ii] );
                if ( !empty( $val ) )
                {
                    if ( $ii == 0 )
                    {
                        $args = $val;
                    }
                    else if ( $args == "" )
                    {
                        $args = $val;
                    }
                    else
                    {
                        $args = $args.",".$val;
                    }
                }
            }
        }
        return $args;
    }

    public static function getComInts( $name )
    {
        $args = "";
        $array = self::getarray( $name );
        if ( !empty( $array ) )
        {
            $ii = 0;
            for ( ; $ii < count( $array ); ++$ii )
            {
                $val = intval( XFilter::filterbadchar( $array[$ii] ) );
                if ( !empty( $val ) )
                {
                    if ( $ii == 0 )
                    {
                        $args = $val;
                    }
                    else if ( $args == "" )
                    {
                        $args = $val;
                    }
                    else
                    {
                        $args = $args.",".$val;
                    }
                }
            }
        }
        return $args;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
