<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function cmd_avatar( $extract )
{
    if ( !empty( $extract ) )
    {
        @extract( $extract );
        $value = empty( $extract['value'] ) ? "" : trim( $extract['value'] );
        $width = empty( $extract['width'] ) ? 110 : intval( $extract['width'] );
        $height = empty( $extract['height'] ) ? 135 : intval( $extract['height'] );
        $css = empty( $extract['css'] ) ? "" : trim( $extract['css'] );
        $border = empty( $extract['border'] ) ? 0 : intval( $extract['border'] );
        if ( !empty( $css ) )
        {
            return "<img src='".$value."' width='{$width}' height='{$height}' class='{$css}' />";
        }
        return "<img src='".$value."' width='{$width}' height='{$height}' border='{$border}' / />";
    }
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
TPL::regfunction( "avatar", "cmd_avatar" );
?>
