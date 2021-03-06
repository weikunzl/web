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
class XUrl extends X
{

    private static $urlfile = NULL;
    private static $urlwrap = array( );

    private static function _init( )
    {
        self::$urlfile = PATH_URL."index.php";
        self::_initurlwrap( );
    }

    public static function getHomeUrl( $id )
    {
        self::_init( );
        if ( parent::$urlsuffix == "php" )
        {
            return self::$urlfile."?c=home&uid=".$id;
        }
        return PATH_URL."home/".$id;
    }

    public static function getContentUrl( $type, $id )
    {
        self::_init( );
        if ( parent::$urlsuffix == "php" )
        {
            return self::$urlfile.( "?c=".$type."&a=detail&id={$id}" );
        }
        return PATH_URL.$type."/".$id.".html";
    }

    public static function getCategoryUrl( $type, $cid )
    {
        self::_init( );
        return self::$urlfile.( "?c=".$type."&a=list&cid=" ).$cid;
    }

    public static function getListUrl( $type, $extend = NULL )
    {
        self::_init( );
        if ( !empty( $extend ) )
        {
            return self::$urlfile.( "?c=".$type."&a=list&" ).$extend;
        }
        return self::$urlfile.( "?c=".$type."&a=list" );
    }

    public static function getCommentUrl( $type, $id )
    {
        self::_init( );
        return self::$urlfile.( "?c=".$type."&a=detail&id=" ).$id;
    }

    public static function getChUrl( $type )
    {
        return self::$urlfile.( "?c=".$type );
    }

    public static function getHomeRoute( $uid, $type )
    {
        self::_init( );
        return self::$urlfile."?c=home&uid=".$uid."&a=".$type;
    }

    private static function _initUrlWrap( )
    {
        self::$urlwrap = array(
            "index" => self::$urlfile,
            "reg" => self::$urlfile."?c=passport&a=reg",
            "reg2" => self::$urlfile."?c=passport&a=setmonolog",
            "reg3" => self::$urlfile."?c=passport&a=setcontact",
            "reg4" => self::$urlfile."?c=passport&a=uploadavatar",
            "reg5" => self::$urlfile."?c=passport&a=setcond",
            "forget" => self::$urlfile."?c=passport&a=forget",
            "getpass" => self::$urlfile."?c=passport&a=getpass",
            "changepost" => self::$urlfile."?c=passport&a=changepost",
            "login" => self::$urlfile."?c=passport&a=login"
        );
    }

    public static function getUrl( $key )
    {
        return self::$urlwrap[$key];
    }

}

?>
