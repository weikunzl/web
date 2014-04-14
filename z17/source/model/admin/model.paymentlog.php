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
class paymentlogAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."payment_log AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."payment AS p ON v.paymentid=p.mentid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username, p.mentname FROM ".DB_PREFIX."payment_log AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."payment AS p ON v.paymentid=p.mentid".$where." ORDER BY v.paynum DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."payment_log WHERE `paynum`='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

}

?>
