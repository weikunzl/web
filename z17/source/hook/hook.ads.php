<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function get_zone( $idmark = "" )
{
    if ( TRUE === XValid::isspchar( $idmark ) )
    {
        $model_ads = X::model( "ads", "im" );
        return $model_ads->getZone( $idmark );
    }
}

function get_ads( $idmark = "" )
{
    if ( TRUE === XValid::isspchar( $idmark ) )
    {
        $model = X::model( "ads", "im" );
        return $model->getAds( $idmark );
    }
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
