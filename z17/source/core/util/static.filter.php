<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class XFilter
{

    public static function filterBadChar( $str )
    {
        if ( empty( $str ) || $str == "" )
        {
            return;
        }
        $badstring = array( "'", "\"", "\"", "=", "#", "\$", ">", "<", "\\", "/*", "%", "\x00", "%00", "*" );
        $newstring = array( "", "", "", "", "", "", "", "", "", "", "", "", "", "" );
	$str = str_replace( $badstring, $newstring, $str );
        return trim( $str );
    }

    public static function stripArray( &$_data )
    {
        if ( is_array( $_data ) )
        {
            foreach ( $_data as $_key => $_value )
            {
                $_data[$_key] = trim( self::striparray( $_value ) );
            }
            return $_data;
        }
        return stripslashes( trim( $_data ) );
    }

    public static function filterSlashes( &$value )
    {
        if ( get_magic_quotes_gpc( ) )
        {
            return FALSE;
        }
        $value = ( array )$value;
        foreach ( $value as $key => $val )
        {
            if ( is_array( $val ) )
            {
                self::filterslashes( $value[$key] );
            }
            else
            {
                $value[$key] = addslashes( $val );
            }
        }
    }

    public static function filterScript( $value )
    {
        if ( empty( $value ) )
        {
            return "";
        }
        $value = preg_replace( "/(javascript:)?on(click|load|key|mouse|error|abort|move|unload|change|dblclick|move|reset|resize|submit)/i", "&111n\\2", $value );
        $value = preg_replace( "/<script(.*?)>(.*?)<\\/script>/si", "", $value );
        $value = preg_replace( "/<iframe(.*?)>(.*?)<\\/iframe>/si", "", $value );
        $value = preg_replace( "/<object.+<\\/object>/iesU", "", $value );
        return $value;
    }

    public static function filterHtml( $value )
    {
        if ( empty( $value ) )
        {
            return "";
        }
        if ( function_exists( "htmlspecialchars" ) )
        {
            return htmlspecialchars( $value );
        }
        return str_replace( array( "&", "\"", "'", "<", ">" ), array( "&amp;", "&quot;", "&#039;", "&lt;", "&gt;" ), $value );
    }

    public static function filterSql( $value )
    {
        if ( empty( $value ) )
        {
            return "";
        }
        $sql = array( "select", "insert", "update", "delete", "\\'", "\\/\\*", "\\.\\.\\/", "\\.\\/", "union", "into", "load_file", "outfile" );
        $sql_re = array( "", "", "", "", "", "", "", "", "", "", "", "" );
        return str_ireplace( $sql, $sql_re, $value );
    }

    public static function filterStr( $value )
    {
        if ( empty( $value ) )
        {
            return "";
        }
        $value = trim( $value );
        $badstr = array( "\x00", "%00", "\r", "&", "\"", "'", "<", ">", "%3C", "%3E" );
        $newstr = array( "", "", "", "&amp;", "&quot;", "&#39;", "&lt;", "&gt;", "&lt;", "&gt;" );
        $value = str_ireplace( $badstr, $newstr, $value );
        $value = preg_replace( "/&amp;((#(\\d{3,5}|x[a-fA-F0-9]{4}));)/", "&\\1", $value );
        return $value;
    }

    public static function filterUrl( )
    {
        if ( preg_replace( "/https?:\\/\\/([^\\:\\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER'] ) !== preg_replace( "/([^\\:]+).*/", "\\1", $_SERVER['HTTP_HOST'] ) )
        {
            return FALSE;
        }
        return TRUE;
    }

    public static function filterForbidChar( $content )
    {
        $new_content = $content;
        $forbidargs = X::$cfg['forbidargs'];
        if ( !empty( $forbidargs ) )
        {
            $array = explode( ",", $forbidargs );
            $i = 0;
            for ( ; $i < sizeof( $array ); ++$i )
            {
                $new_content = str_ireplace( $array[$i], "", $content );
            }
        }
        return $new_content;
    }

    public static function checkExistsForbidChar( $content )
    {
        $flag = FALSE;
        $forbidargs = X::$cfg['forbidargs'];
        if ( !empty( $forbidargs ) )
        {
            $array = explode( ",", $forbidargs );
            $i = 0;
            for ( ; $i < sizeof( $array ); ++$i )
            {
                if (false === strpos ( strtolower ( $content ), strtolower ( $array [$i] ) )) {
				} else {
					$flag = true;
					break;
				}
                
            }
        }
        return $flag;
    }

    public static function checkExistsForbidUserName( $username )
    {
        $flag = FALSE;
        $forbidargs = X::$cfg['lockusers'];
        if ( !empty( $forbidargs ) )
        {
            $array = explode( ",", $forbidargs );
            $i = 0;
            for ( ; $i < sizeof( $array ); ++$i )
            {
                if (false === strpos ( strtolower ( $username ), strtolower ( $array [$i] ) )) {
				} else {
					$flag = true;
					break;
				}
            }
        }
        return $flag;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
