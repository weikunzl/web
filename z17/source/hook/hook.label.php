<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function cmd_label( $params )
{
    if ( !empty( $params ) )
    {
        @extract( $params );
        $name = strtolower( trim( $params['name'] ) );
        if ( TRUE === XValid::isspchar( $name ) )
        {
            $model = X::model( "label", "im" );
            return $model->getOne( $name );
        }
    }
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
TPL::regfunction( "label", "cmd_label" );
?>
