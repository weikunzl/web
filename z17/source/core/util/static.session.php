<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class XSession
{

    public static function set( $key, $value = "" )
    {
        if (!isset($_SESSION))
        {
            self::start();
        }
        if ( is_array( $key ) )
        {
            $_SESSION[$key] = trim( $value );
            return TRUE;
        }
        foreach ( $key as $k => $v )
        {
            $_SESSION[$k] = $v;
        }
        return TRUE;
    }

    public static function get( $key )
    {
	if (!isset($_SESSION))
        {
        	self::start();
    	}
    	if ( isset( $_SESSION[$key] ) )
    	{
        	return trim( XFilter::filterbadchar( $_SESSION[$key] ) );
    	}
    }

    public static function del( $key )
    {
        if (!isset($_SESSION))
        {
            self::start( );
        }
        if ( is_array( $key ) )
        {
            foreach ( $key as $k )
            {
                if ( isset( $_SESSION[$k] ) )
                {
                    unset( $_SESSION[$k] );
                }
            }
            return TRUE;
        }
        if ( isset( $_SESSION[$key] ) )
        {
            unset( $_SESSION[$key] );
        }
        return TRUE;
    }

    public static function clear( )
    {
        if (!isset($_SESSION))
        {
            self::start();
        }
        session_destroy( );
        $_SESSION = array( );
    }

    private static function start( )
    {
        session_start( );
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
