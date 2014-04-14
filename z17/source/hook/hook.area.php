<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function cmd_area( $extract )
{
    if ( !empty( $extract ) )
    {
        @extract( $extract );
        $type = empty( $extract['type'] ) ? "dist1" : trim( $extract['type'] );
        $name = empty( $extract['name'] ) ? "" : trim( $extract['name'] );
        $value = empty( $extract['value'] ) ? 0 : intval( $extract['value'] );
        $text = empty( $extract['text'] ) ? "" : $extract['text'];
        $ajax = empty( $extract['ajax'] ) ? 0 : intval( $extract['ajax'] );
        $pname = empty( $extract['pname'] ) ? "" : trim( $extract['pname'] );
        $pvalue = empty( $extract['pvalue'] ) ? 0 : intval( $extract['pvalue'] );
        $cname = empty( $extract['cname'] ) ? "" : trim( $extract['cname'] );
        $cvalue = empty( $extract['cvalue'] ) ? 0 : intval( $extract['cvalue'] );
        $cajax = empty( $extract['cajax'] ) ? 0 : intval( $extract['cajax'] );
        $dname = empty( $extract['dname'] ) ? "" : trim( $extract['dname'] );
        $dvalue = empty( $extract['dvalue'] ) ? 0 : intval( $extract['dvalue'] );
        X::loadlib( "mod" );
        if ( $type == "dist1" )
        {
            $province_array = array(
                "name" => $name,
                "value" => $value,
                "text" => $text,
                "ajax" => $ajax,
                "cname" => $cname,
                "cvalue" => $cvalue,
                "cajax" => $cajax,
                "dname" => $dname,
                "dvalue" => $dvalue
            );
            return XMod::ajaxarearootoptions( $province_array );
        }
        if ( $type == "dist2" )
        {
            $city_array = array(
                "name" => $cname,
                "value" => $cvalue,
                "text" => $text,
                "rootid" => $pvalue,
                "ajax" => $cajax,
                "dname" => $dname,
                "dvalue" => $dvalue
            );
            return XMod::ajaxareachildoptions( $city_array );
        }
        if ( $type == "dist3" )
        {
            $dist_array = array(
                "name" => $dname,
                "value" => $dvalue,
                "rootid" => $cvalue,
                "text" => $text
            );
            return XMod::ajaxareachildoptions( $dist_array );
        }
        if ( $type == "text" )
        {
            return XMod::getareaname( intval($value ) );
        }
    }
}

function cmd_hometown( $extract )
{
    if ( !empty( $extract ) )
    {
        @extract( $extract );
        $type = empty( $extract['type'] ) ? "dist1" : trim( $extract['type'] );
        $name = empty( $extract['name'] ) ? "" : trim( $extract['name'] );
        $value = empty( $extract['value'] ) ? 0 : intval( $extract['value'] );
        $text = empty( $extract['text'] ) ? "" : $extract['text'];
        $cname = empty( $extract['cname'] ) ? "" : trim( $extract['cname'] );
        $cvalue = empty( $extract['cvalue'] ) ? 0 : intval( $extract['cvalue'] );
        $pvalue = empty( $extract['pvalue'] ) ? 0 : intval( $extract['pvalue'] );
        X::loadlib( "mod" );
        if ( $type == "dist1" )
        {
            $province_array = array(
                "name" => $name,
                "value" => $value,
                "text" => $text,
                "cname" => $cname,
                "cvalue" => $cvalue
            );
            return XMod::ajaxhometownrootoptions( $province_array );
        }
        if ( $type == "dist2" )
        {
            $city_array = array(
                "name" => $cname,
                "value" => $cvalue,
                "text" => $text,
                "rootid" => $pvalue
            );
            return XMod::ajaxhometownchildoptions( $city_array );
        }
        if ( $type == "text" )
        {
            return XMod::gethometownname( intval($value) ) ;
        }
    }
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
TPL::regfunction( "area", "cmd_area" );
TPL::regfunction( "hometown", "cmd_hometown" );
?>
