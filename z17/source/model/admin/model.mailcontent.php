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
class mailcontentAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.contentid) AS mycount FROM ".DB_PREFIX."mail_content AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, COUNT(l.logid) AS sendcount FROM ".DB_PREFIX."mail_content AS v LEFT JOIN ".DB_PREFIX."mail_log AS l ON l.contentid=v.contentid".$where." GROUP BY v.contentid ORDER BY v.contentid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        foreach ( $array as $key => $value )
        {
            $array[$key]['successcount'] = parent::$obj->fetch_count( "SELECT COUNT(logid) FROM ".DB_PREFIX."mail_log WHERE contentid='".$value['contentid']."' AND flag='1'" );
            $array[$key]['failcount'] = parent::$obj->fetch_count( "SELECT COUNT(logid) FROM ".DB_PREFIX."mail_log WHERE contentid='".$value['contentid']."' AND flag='0'" );
        }
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "mail_content WHERE contentid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doDel( $id )
    {
        $result = parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "mail_log WHERE contentid='".$id."'" ) );
        if ( TRUE === $result )
        {
            parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "mail_content WHERE contentid='".$id."'" ) );
        }
        return $result;
    }

}

?>
