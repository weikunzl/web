<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function get_listen( $uid )
{
    $uid = intval( $uid );
    if ( 0 < $uid )
    {
        $m_listen = X::model( "listen", "um" );
        return $m_listen->getListenStatus( $uid );
    }
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
