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
class weibocommentAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."weibo_comment AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username AS cmusername FROM ".DB_PREFIX."weibo_comment AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".$where." ORDER BY v.cmid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, u.username AS cmusername FROM ".DB_PREFIX."weibo_comment AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".( " WHERE v.cmid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."weibo_comment", $array, "cmid='".$id."'" );
    }

    public function doDel( $id )
    {
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "weibo_comment WHERE cmid='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "weibo_comment SET `cmflag`='1' WHERE `cmid`='".$id."'" ) );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "weibo_comment SET `cmflag`='0' WHERE `cmid`='".$id."'" ) );
        }
    }

}

?>
