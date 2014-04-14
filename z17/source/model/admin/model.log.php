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
class logAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."log".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."log".$where." ORDER BY logid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."log WHERE logid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $logid = parent::$obj->fetch_newid( "SELECT MAX(logid) FROM ".DB_PREFIX."log", 1 );
        $array = array_merge( array( "logid" => $logid ), $array );
        return parent::$obj->insert( DB_PREFIX."log", $array );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."log WHERE logid='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

    public function doDelAll( )
    {
        $sql = "DELETE FROM ".DB_PREFIX."log";
        return parent::$obj->query( $sql );
    }

}

?>
