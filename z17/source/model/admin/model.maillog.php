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
class maillogAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.logid) AS mycount FROM ".DB_PREFIX."mail_log AS v LEFT JOIN ".DB_PREFIX."mail_content AS c ON v.contentid=c.contentid LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, c.subject, u.username FROM ".DB_PREFIX."mail_log AS v LEFT JOIN ".DB_PREFIX."mail_content AS c ON v.contentid=c.contentid LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where." ORDER BY v.logid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "mail_log WHERE logid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doDel( $id )
    {
        $result = parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "mail_log WHERE logid='".$id."'" ) );
        return $result;
    }

}

?>
