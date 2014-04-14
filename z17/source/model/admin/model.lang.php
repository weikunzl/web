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
class langAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(id) FROM ".DB_PREFIX."lang".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."lang".$where." ORDER BY id ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "lang WHERE id='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $id = parent::$obj->fetch_newid( "SELECT MAX(id) FROM ".DB_PREFIX."lang", 1 );
        $array = array_merge( array(
            "id" => $id
        ), $array );
        $result = parent::$obj->insert( DB_PREFIX."lang", $array );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "lang" );
            unset( $cache );
        }
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."lang", $array, "id='".$id."'" );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "lang" );
            unset( $cache );
        }
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "lang WHERE id='".$id."'" );
        $result = parent::$obj->query( $sql );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "cache" );
            unset( $cache );
        }
        return $result;
    }

    public function doCheckLangKey( $langkey )
    {
        $sql = "SELECT `id` FROM ".DB_PREFIX.( "lang WHERE `langkey`='".$langkey."'" );
        return parent::$obj->check_data( $sql );
    }

    public function loadCaCheLang( )
    {
        $cache = parent::import( "cache", "lib" );
        $data = $cache->readCache( "lang" );
        unset( $cache );
        return $data;
    }

    public function getLangVal( $langkey )
    {
        $cache = parent::import( "cache", "lib" );
        $data = $cache->readCache( "lang" );
        unset( $cache );
        if ( !empty( $data ) )
        {
            return trim( $data[$langkey] );
        }
        return "";
    }

}

?>
