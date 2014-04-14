<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function cmd_unixtime( $params )
{
    $t = 0;
    if ( !empty( $params ) )
    {
        @extract( $params );
        $type = trim( $$params['type'] );
        if ( $type == "day" )
        {
            $t = strtotime( date( "Y-m-d", time( $$params['type'] ) ) );
            return $t;
        }
        $t = time();
    }
    return $t;
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
TPL::regfunction( "unixtime", "cmd_unixtime" );
?>
