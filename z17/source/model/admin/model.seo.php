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
class seoAModel extends X
{

    public function getAllList( )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."seo ORDER BY `orders` ASC";
        $data = parent::$obj->getall( $sql );
        return $data;
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "seo WHERE `id`='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $id = parent::$obj->fetch_newid( "SELECT MAX(id) FROM ".DB_PREFIX."seo", 1 );
        $array = array_merge( array( "id" => $id, "issystem" => 1 ), $array );
        $result = parent::$obj->insert( DB_PREFIX."seo", $array );
        if ( TRUE === $result )
        {
            $this->createCache( );
        }
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."seo", $array, "`id`=".$id."" );
        if ( TRUE === $result )
        {
            $this->createCache( );
        }
        return $result;
    }

    public function doUpdate( $id, $args )
    {
        return parent::$obj->update( DB_PREFIX."seo", $args, "`id`=".$id."" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "seo WHERE `id`='".$id."'" );
        $result = parent::$obj->query( $sql );
        if ( TRUE === $result )
        {
            $this->createCache( );
        }
        return $result;
    }

    public function createCache( )
    {
        $cache = parent::import( "cache", "lib" );
        $cache->updateCache( "seo" );
        unset( $cache );
    }

}

?>
