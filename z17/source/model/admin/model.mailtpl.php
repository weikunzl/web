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
class mailtplAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(tplid) FROM ".DB_PREFIX."mail_tpl".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."mail_tpl".$where." ORDER BY tplid ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."mail_tpl WHERE tplid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $tplid = parent::$obj->fetch_newid( "SELECT MAX(tplid) FROM ".DB_PREFIX."mail_tpl", 1 );
        $array = array_merge( array( "tplid" => $tplid ), $array );
        return parent::$obj->insert( DB_PREFIX."mail_tpl", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."mail_tpl", $array, "tplid='".intval( $id )."'" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."mail_tpl WHERE tplid='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

}

?>
