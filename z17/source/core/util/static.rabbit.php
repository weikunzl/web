<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
class XRabbit extends X
{

    public static function __init( )
    {
        if ( empty( $rabbit['sla'] ) )
        {
            parent::$rabbit['sla'] = "www";
        }
        if ( empty( $rabbit['slb'] ) )
        {
            parent::$rabbit['slb'] = "zyiq";
        }
        if ( empty( $rabbit['slc'] ) )
        {
            parent::$rabbit['slc'] = "cn";
        }
        if ( empty( $rabbit['sld'] ) )
        {
            parent::$rabbit['sld'] = "version";
        }
    }

}

?>
