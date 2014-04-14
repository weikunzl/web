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
class giftAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."gift AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*,c.catname FROM ".DB_PREFIX."gift AS v LEFT JOIN ".DB_PREFIX."gift_category AS c ON v.catid=c.catid".$where." ORDER BY v.giftid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "gift WHERE giftid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $giftid = parent::$obj->fetch_newid( "SELECT MAX(giftid) FROM ".DB_PREFIX."gift", 1 );
        $array = array_merge( array( "giftid" => $giftid, "timeline" => time( ) ), $array );
        return parent::$obj->insert( DB_PREFIX."gift", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."gift", $array, "giftid='".$id."'" );
    }

    public function doDel( $id )
    {
        $rows = $this->getData( $id );
        if ( !empty( $rows ) && !empty( $rows['imgurl'] ) && substr( $rows['imgurl'], 0, 15 ) == "data/attachment" )
        {
            parent::loadutil( "file" );
            XFile::delfile( $rows['imgurl'] );
        }
        unset( $rows );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "gift WHERE giftid='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "gift SET flag='1' WHERE giftid='".$id."'" ) );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "gift SET flag='0' WHERE giftid='".$id."'" ) );
        }
        if ( $type == "eliteopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "gift SET elite='1' WHERE giftid='".$id."'" ) );
        }
        if ( $type == "eliteclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "gift SET elite='0' WHERE giftid='".$id."'" ) );
        }
    }

}

?>
