<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function _loading_cmd_hooks( )
{
    $hookpath = BASE_ROOT."./source/hook/";
    $handle = @opendir( $hookpath );
    $hookfile[] = NULL;
    while ( $file = @readdir( $handle ) )
    {
        if ( preg_match( "/^[\\w\\.\\/]+\\.php$/", $file ) )
        {
            require_once( $hookpath.$file );
        }
    }
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
_loading_cmd_hooks( );
?>
