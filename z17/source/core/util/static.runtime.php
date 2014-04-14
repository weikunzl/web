<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class XRunTime
{

    private static $_starttime = 0;
    private static $_stoptime = 0;
    private static $_spendtime = 0;

    public static function getmicrotime( )
    {
        list( $usec, $sec ) = explode( " ", microtime( ) );
        return ( double )$usec + ( double )$sec;
    }

    public static function start( )
    {
        self::$_starttime = self::getmicrotime( );
    }

    public static function display( )
    {
        self::$_stoptime = self::getmicrotime( );
        self::$_spendtime = self::$_stoptime - self::$_starttime;
        return round( self::$_spendtime, 6 );
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
