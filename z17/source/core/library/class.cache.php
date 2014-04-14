<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class cacheClass
{

    private $db = NULL;
    private static $instance = NULL;

    public function __construct( )
    {
        $this->db = X::$obj;
    }

    public function updateCache( $cacheMethodName = NULL )
    {
        if ( is_string( $cacheMethodName ) )
        {
            if ( method_exists( $this, "cache_".$cacheMethodName ) )
            {
                call_user_func( array( $this, "cache_".$cacheMethodName ) );
            }
        }
        else
        {
            if ( is_array( $cacheMethodName ) )
            {
                foreach ( $cacheMethodName as $name )
                {
                    if ( method_exists( $this, "cache_".$name ) )
                    {
                        call_user_func( array( $this, "cache_".$name ) );
                    }
                }
			}
            else
            {
                    if ( $cacheMethodName == NULL )
                    {
                        $cacheMethodNames = get_class_methods( $this );
                        foreach ( $cacheMethodNames as $method )
                        {
                            if ( preg_match( "/^cache_/", $method ) )
                            {
                                call_user_func( array( $this, $method ) );
                                break;
                            }
                        }
                    }
            }
        }
    }

    private function writeCache( $cacheData, $cacheName )
    {
        $cachefile = BASE_ROOT."./data/cache/".$cacheName;
        if ( !( $fp = @fopen( $cachefile, "wb" ) ) )
        {
            XHandle::halt( "读取缓存数据失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (data/cache) 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为everyone可写", "", 1 );
        }
        if ( !( $fw = @fwrite( $fp, $cacheData ) ) )
        {
            XHandle::halt( "写入缓存数据失败，缓存目录 (data/cache) 不可写" );
        }
		$t = $cacheName."_cache";
        $this->$t=NULL;
        @fclose( $fp );
    }

    public function readCache( $cacheName )
    {
		$t = $cacheName."_cache";
        if ( $this->$t != NULL )
        {
            return $this->$cacheName."_cache";
        }
        $cachefile = BASE_ROOT."./data/cache/".$cacheName;
        if ( ( !is_file( $cachefile ) || filesize( $cachefile ) <= 0 ) && method_exists( $this, "cache_".$cacheName ) )
        {
            call_user_func( array( $this, "cache_".$cacheName ) );
        }
        if ( $fp = fopen( $cachefile, "r" ) )
        {
            $data = fread( $fp, filesize( $cachefile ) );
            fclose( $fp );
            if ( !empty( $data ) )
            {
                $cache_data = unserialize( $data );
            }
            return $cache_data;
        }
    }

    public function checkCaChe( $cachename )
    {
        $cachefile = BASE_ROOT."./data/cache/".$cachename;
        if ( file_exists( $cachefile ) )
        {
            return TRUE;
        }
        return FALSE;
    }

    private function _unSerialize( $string )
    {
        if ( !empty( $string ) )
        {
            if ( strtolower( OESOFT_CHARSET ) == "utf-8" )
            {
                return $this->_utf_unserialize( $string );
            }
            return $this->_gbk_unserialize( $string );
        }
        return "";
    }

    private function _utf_unserialize( $serial_str )
    {
        $serial_str = preg_replace( "!s:(\\d+):\"(.*?)\";!se", "'s:'.strlen('$2').':\"$2\";'", $serial_str );
        $serial_str = str_replace( "\r", "", $serial_str );
        return unserialize( $serial_str );
    }

    private function _gbk_unserialize( $serial_str )
    {
        $serial_str = preg_replace( "!s:(\\d+):\"(.*?)\";!se", "\"s:\".strlen(\"$2\").\":\\\"$2\\\";\"", $serial_str );
        $serial_str = str_replace( "\r", "", $serial_str );
        return unserialize( $serial_str );
    }

    public function writeDcache( $cacheData, $cacheName )
    {
        $cachefile = BASE_ROOT."./data/cache/".$cacheName.".cache";
        if ( !( $fp = @fopen( $cachefile, "wb" ) ) )
        {
            XHandle::halt( "读取缓存数据失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (data/cache) 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为everyone可写", "", 1 );
        }
        if ( !( $fw = @fwrite( $fp, $cacheData ) ) )
        {
            XHandle::halt( "写入缓存数据失败，缓存目录 (data/cache) 不可写" );
        }
        @fclose( $fp );
    }

    public function readDcache( $cacheName, $serialize = 1 )
    {
        $cache_data = NULL;
        $cachefile = BASE_ROOT."./data/cache/".$cacheName.".cache";
        if ( is_file( $cachefile ) && !( filesize( $cachefile ) <= 0 ) && ( $fp = fopen( $cachefile, "r" ) ) )
        {
            $data = fread( $fp, filesize( $cachefile ) );
            fclose( $fp );
            if ( $serialize == 1 )
            {
                $cache_data = $this->_unSerialize( $data );
                return $cache_data;
            }
            $cache_data = $data;
        }
        return $cache_data;
    }

    private function cache_options( )
    {
        $options_cache = array( );
        $data = $this->db->getall( "SELECT * FROM ".DB_PREFIX."options" );
        foreach ( $data as $key => $value )
        {
            $options_cache[$value['optionname']] = $value['optionvalue'];
        }
        $cacheData = serialize( $options_cache );
        $this->writeCache( $cacheData, "options" );
        unset( $options_cache );
        unset( $data );
        unset( $cacheData );
    }

    private function cache_authgroup( )
    {
        $array = array( );
        $model = X::model( "authgroup", "am" );
        $array = $model->getAllNode( );
        $cacheData = serialize( $array );
        $this->writeCache( $cacheData, "authgroup" );
        unset( $model );
        unset( $array );
        unset( $cacheData );
    }

    private function cache_htmllabel( )
    {
        $cache_array = array( );
        $sql = "SELECT `labelname`, `content` FROM ".DB_PREFIX."htmllabel WHERE `flag`='1' AND `templet`='".X::$cfg['templet']."'";
        $data = $this->db->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $cache_array[$value['labelname']] = $value['content'];
        }
        $cacheData = serialize( $cache_array );
        $this->writeCache( $cacheData, "htmllabel" );
        unset( $data );
        unset( $cacheData );
        unset( $cache_array );
    }

    private function cache_lang( )
    {
        $cache_array = array( );
        $sql = "SELECT `langkey`, `langval` FROM ".DB_PREFIX."lang ORDER BY `id` ASC";
        $data = $this->db->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $cache_array[$value['langkey']] = $value['langval'];
        }
        $cacheData = serialize( $cache_array );
        $this->writeCache( $cacheData, "lang" );
        unset( $cache_array );
        unset( $cacheData );
        unset( $data );
    }

    private function cache_area( )
    {
        $array = array( );
        $model = X::model( "area", "am" );
        $array = $model->getAllNode( );
        $cacheData = serialize( $array );
        $this->writeCache( $cacheData, "area" );
        unset( $model );
        unset( $array );
        unset( $cacheData );
    }

    private function cache_hometown( )
    {
        $array = array( );
        $model = X::model( "hometown", "am" );
        $array = $model->getAllNode( );
        $cacheData = serialize( $array );
        $this->writeCache( $cacheData, "hometown" );
        unset( $model );
        unset( $array );
        unset( $cacheData );
    }

    private function cache_loveparamter( )
    {
        $cache_array = array( );
        $sql = "SELECT `ptname`, `ptvalue` FROM ".DB_PREFIX."love_paramter ORDER BY `orders` ASC";
        $data = $this->db->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $cache_array[$value['ptname']] = $value['ptvalue'];
        }
        $cacheData = serialize( $cache_array );
        $this->writeCache( $cacheData, "loveparamter" );
        unset( $data );
        unset( $cache_array );
        unset( $cacheData );
    }

    private function cache_seo( )
    {
        $cache_array = array( );
        $sql = "SELECT `idmark`, `chname`, `title`, `description`, `keyword`, `url` FROM ".DB_PREFIX."seo ORDER BY `id` ASC";
        $data = $this->db->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $cache_array[$value['idmark']] = array(
                "chname" => $value['chname'],
                "title" => $value['title'],
                "description" => $value['description'],
                "keyword" => $value['keyword'],
                "url" => $value['url']
            );
        }
        $cacheData = serialize( $cache_array );
        $this->writeCache( $cacheData, "seo" );
        unset( $data );
        unset( $cache_array );
        unset( $cacheData );
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
