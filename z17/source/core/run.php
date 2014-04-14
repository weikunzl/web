<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

require_once( "oe.conf.php" );
if ( !defined( "OELOVE" ) )
{
    header( "Location:install/index.php" );
}
require_once( BASE_ROOT."./source/core/oephp.php" );
X::__run( );
$util_packs = array( "handle", "request", "valid", "filter", "page" );
foreach ( $util_packs as $key => $value )
{
    X::loadutil( $value );
}
$lib_packs = array( "hook", "lang", "url" );
foreach ( $lib_packs as $key => $value )
{
    X::loadlib( $value );
}
?>
