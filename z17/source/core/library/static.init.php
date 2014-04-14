<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function get_timezone( $timeline )
{
    X::loadlib( "option" );
    $data = XOption::get( "site_base" );
    if ( !empty( $data ) )
    {
        $timezone = intval( $data['timezone'] );
        return $timeline + $timezone * 3600;
    }
    return $timeline;
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
class XInit extends X
{

    public static function __loading( )
    {
        self::_assembleconfig( );
        self::_assemblecp( );
    }

    private static function _assembleConfig( )
    {
        parent::loadlib( "option" );
        $nonce_templet = XOption::get( "nonce_templet" );
        $site_base = XOption::get( "site_base" );
        $site_footer = XOption::get( "site_footer" );
        $site_seo = XOption::get( "site_seo" );
        $index_style = XOption::get( "index_style" );
        $main_style = XOPtion::get( "main_style" );
        $order_config = XOption::get( "order_config" );
        $site_safety = XOption::get( "site_safety" );
        $user_config = XOption::get( "user_config" );
        $upload_config = XOption::get( "upload_config" );
        $site_rewrite = XOption::get( "site_rewrite" );
        $imbox_config = XOption::get( "imbox_config" );
        $card_config = XOption::get( "card_config" );
        $i_cache = parent::import( "cache", "lib" );
        $count_mech = $i_cache->readDcache( "count" );
        unset( $i_cache );
        if ( !empty( $site_base['logo'] ) )
        {
            $site_base['logo'] = parent::$urlpath.$site_base['logo'];
        }
        $array = array( );
        if ( is_array( $site_base ) )
        {
            $array = array_merge( $array, $site_base );
        }
        if ( is_array( $site_seo ) )
        {
            $array = array_merge( $array, $site_seo );
        }
        if ( is_array( $index_style ) )
        {
            $array = array_merge( $array, $index_style );
        }
        if ( is_array( $main_style ) )
        {
            $array = array_merge( $array, $main_style );
        }
        if ( is_array( $order_config ) )
        {
            $array = array_merge( $array, $order_config );
        }
        if ( is_array( $site_safety ) )
        {
            $array = array_merge( $array, $site_safety );
        }
        if ( is_array( $user_config ) )
        {
            $array = array_merge( $array, $user_config );
        }
        if ( is_array( $upload_config ) )
        {
            $array = array_merge( $array, $upload_config );
        }
        if ( is_array( $site_rewrite ) )
        {
            $array = array_merge( $array, $site_rewrite );
        }
        if ( is_array( $imbox_config ) )
        {
            $array = array_merge( $array, $imbox_config );
        }
        if ( is_array( $card_config ) )
        {
            $array = array_merge( $array, $card_config );
        }
        if ( is_array( $count_mech ) )
        {
            $array = array_merge( $array, $count_mech );
        }
        $array['sitefooter'] = $site_footer;
        $array['templet'] = $nonce_templet;
        if ( !is_numeric( $array['taxrate'] ) )
        {
            $array['taxrate_persent'] = 0;
        }
        else
        {
            $array['taxrate_persent'] = $array['taxrate'] / 100;
        }
        if ( defined( "OE_LOCKUSERS" ) )
        {
            $array['lockusers'] = OE_LOCKUSERS;
        }
        if ( defined( "OE_FORBIDARGS" ) )
        {
            $array['forbidargs'] = OE_FORBIDARGS;
        }
        if ( !isset( $array['molminlen'] ) )
        {
            $array['molminlen'] = 3;
        }
        else if ( $array['molminlen'] < 3 || 1500 < $array['molminlen'] )
        {
            $array['molminlen'] = 3;
        }
        if ( !isset( $array['molmaxlen'] ) )
        {
            $array['molmaxlen'] = 1500;
        }
        else if ( $array['molmaxlen'] < 3 || 1500 < $array['molmaxlen'] )
        {
            $array['molmaxlen'] = 1500;
        }
        parent::$tplpath = "tpl/templets/".$array['templet']."/";
        parent::$skinpath = parent::$urlpath.parent::$tplpath;
        parent::$cfg = $array;
        parent::$urlsuffix = $site_rewrite['urlsuffix'];
        unset( $array );
    }

    private static function _assembleCp( )
    {
        parent::$rabbit['url'] = "http://".parent::$rabbit['sla'].".".parent::$rabbit['slb'].".".parent::$rabbit['slc']."/".parent::$rabbit['sld'];
    }

}

?>
