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
class diarycommentAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."diary_comment AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, d.title AS diary_title, u.username AS cmusername FROM ".DB_PREFIX."diary_comment AS v LEFT JOIN ".DB_PREFIX."diary AS d ON v.diaryid=d.diaryid LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".$where." ORDER BY v.commentid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array( $total, $array );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, d.title AS diary_title, u.username AS cmusername FROM ".DB_PREFIX."diary_comment AS v LEFT JOIN ".DB_PREFIX."diary AS d ON v.diaryid=d.diaryid LEFT JOIN ".DB_PREFIX."user AS u ON v.cmuserid=u.userid".( " WHERE v.commentid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."diary_comment", $array, "commentid='".$id."'" );
    }

    public function doDel( $id )
    {
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "diary_comment WHERE commentid='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "diary_comment SET flag='1' WHERE commentid='".$id."'" ) );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "diary_comment SET flag='0' WHERE commentid='".$id."'" ) );
        }
    }

}

?>
