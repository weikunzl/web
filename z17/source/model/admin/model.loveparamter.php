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
class loveparamterAModel extends X
{

    public function getList( )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."love_paramter ORDER BY orders ASC";
        $data = parent::$obj->getall( $sql );
        if ( !empty( $data ) )
        {
            $total = count( $data );
        }
        else
        {
            $total = 0;
        }
        return array(
            $total,
            $data
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "love_paramter WHERE ptid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $ptid = parent::$obj->fetch_newid( "SELECT MAX(ptid) FROM ".DB_PREFIX."love_paramter", 1 );
        $array = array_merge( array(
            "ptid" => $ptid,
            "flag" => 1,
            "issystem" => 1
        ), $array );
        $result = parent::$obj->insert( DB_PREFIX."love_paramter", $array );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "loveparamter" );
            unset( $cache );
        }
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."love_paramter", $array, "ptid='".$id."'" );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "loveparamter" );
            unset( $cache );
        }
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "love_paramter WHERE ptid='".$id."'" );
        $result = parent::$obj->query( $sql );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "loveparamter" );
            unset( $cache );
        }
        return $result;
    }

    public function doCheckName( $ptname )
    {
        $sql = "SELECT `ptid` FROM ".DB_PREFIX.( "love_paramter WHERE `ptname`='".$ptname."'" );
        return parent::$obj->check_data( $sql );
    }

    public function loadCacheParamter( )
    {
        $cache = parent::import( "cache", "lib" );
        $data = $cache->readCache( "loveparamter" );
        unset( $cache );
        return $data;
    }

    public function getParamterVal( $ptname )
    {
        $data = $this->loadCacheParamter( );
        if ( !empty( $data ) )
        {
            return trim( $data[$ptname] );
        }
        return "";
    }

}

?>
