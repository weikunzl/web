<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
class XOption extends X
{

    public static function get( $optionname )
    {
        $need_unserialize = array( "active_plugins", "site_base", "site_safety", "site_seo", "site_cache", "site_rewrite", "upload_config", "user_config", "comment_config", "guestbook_config", "wap_config", "index_style", "main_style", "order_config", "imbox_config", "card_config" );
        if ( !empty( $optionname ) )
        {
            $cache = parent::import( "cache", "lib" );
            $data = $cache->readCache( "options" );
            unset( $cache );
            if ( !empty( $data ) )
            {
                if ( in_array( $optionname, $need_unserialize ) )
                {
                    parent::loadutil( "handle" );
                    return XHandle::dounserialize( $data[$optionname] );
                }
                return $data[$optionname];
            }
            return array( );
        }
    }

    public static function updateOption( $name, $value, $isSyntax = FALSE )
    {
        parent::$obj->update( DB_PREFIX."options", array(
            "optionvalue" => $value
        ), "optionname='".$name."'" );
        $cache = parent::import( "cache", "lib" );
        $cache->updateCache( "options" );
        unset( $cache );
    }

}

?>
