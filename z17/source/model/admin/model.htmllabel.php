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
class htmllabelAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE `templet`='".parent::$cfg['templet']."'".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(labelid) FROM ".DB_PREFIX."htmllabel".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."htmllabel".$where." ORDER BY labelid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."htmllabel WHERE labelid='".( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $labelid = parent::$obj->fetch_newid( "SELECT MAX(labelid) FROM ".DB_PREFIX."htmllabel", 1 );
        $array = array_merge( array( "labelid" => $labelid, "timeline" => time( ), "templet" => parent::$cfg['templet'] ), $array );
        $result = parent::$obj->insert( DB_PREFIX."htmllabel", $array );
        if ( TRUE === $result )
        {
            $this->_createCache( );
        }
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."htmllabel", $array, "labelid=".$id."" );
        if ( TRUE === $result )
        {
            $this->_createCache( );
        }
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."htmllabel WHERE labelid='".intval( $id )."'";
        $result = parent::$obj->query( $sql );
        if ( TRUE === $result )
        {
            $this->_createCache( );
        }
        return $result;
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."htmllabel SET `flag`='1' WHERE `labelid`='".intval( $id )."'" );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."htmllabel SET `flag`='0' WHERE `labelid`='".intval( $id )."'" );
        }
    }

    public function doCheckLabel( $name )
    {
        $sql = "SELECT `labelid` FROM ".DB_PREFIX."htmllabel WHERE lower(labelname)='".strtolower( $name )."' AND `templet`='".parent::$cfg['templet']."'";
        return parent::$obj->check_data( $sql );
    }

    public function doCheckSystemLabel( $id )
    {
        $sql = "SELECT `labelid` FROM ".DB_PREFIX."htmllabel WHERE `issystem`='1' AND `labelid`='".intval( $id )."'";
        return parent::$obj->check_data( $sql );
    }

    private function _createCache( )
    {
        $cache = parent::import( "cache", "lib" );
        $cache->updateCache( "htmllabel" );
        unset( $cache );
    }

}

?>
