<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function get_online( $uid )
{
    $uid = ( $uid );
    if ( 0 < $uid )
    {
        $m_online = X::model( "online", "im" );
        return $m_online->getUserOnlineStatus( $uid );
    }
}

if ( !( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
