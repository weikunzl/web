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
class weiboAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."weibo AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username FROM ".DB_PREFIX."weibo AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where." ORDER BY v.wbid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, u.username FROM ".DB_PREFIX."weibo AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".( " WHERE v.wbid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."weibo", $array, "wbid='".$id."'" );
    }

    public function doDel( $id )
    {
        parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "weibo_comment WHERE `wbid`='".$id."'" ) );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "weibo WHERE `wbid`='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "weibo SET `flag`='1' WHERE `wbid`='".$id."'" ) );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "weibo SET `flag`='0' WHERE `wbid`='".$id."'" ) );
        }
    }

}

?>
