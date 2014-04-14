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
class giftrecordAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."gift_record AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, g.giftname,imgurl,f.username AS fusername,t.username AS tusername FROM ".DB_PREFIX."gift_record AS v LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid LEFT JOIN ".DB_PREFIX."user AS f ON v.fromuserid=f.userid LEFT JOIN ".DB_PREFIX."user AS t ON v.touserid=t.userid".$where." ORDER BY v.recordid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*,g.giftname,imgurl,f.username AS fusername,t.username AS tusername FROM ".DB_PREFIX."gift_record AS v LEFT JOIN ".DB_PREFIX."gift AS g ON v.giftid=g.giftid LEFT JOIN ".DB_PREFIX."user AS f ON v.fromuserid=f.userid LEFT JOIN ".DB_PREFIX."user AS t ON v.touserid=t.userid".( " WHERE v.recordid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."gift_record", $array, "recordid='".$id."'" );
    }

    public function doDel( $id )
    {
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "gift_record WHERE recordid='".$id."'" ) );
    }

}

?>
