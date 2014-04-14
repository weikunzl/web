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
class complaintAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."complaints".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, cp.username AS cpusername, f.username AS fromusername FROM ".DB_PREFIX."complaints AS v LEFT JOIN ".DB_PREFIX."user AS cp ON v.cpuid=cp.userid LEFT JOIN ".DB_PREFIX."user AS f ON v.fromuid=f.userid".$where." ORDER BY v.id DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array( $total, $array );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."complaints WHERE `id`='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

    public function doDongJie( $uid )
    {
        $arr = array( "flag" => 1, "dealtimeline" => time( ) );
        parent::$obj->update( DB_PREFIX."complaints", $arr, "cpuid='".$uid."'" );
        return parent::$obj->update( DB_PREFIX."user_status", array( "flag" => 0 ), "userid='".$uid."'" );
    }

    public function doCancel( $uid )
    {
        $arr = array( "flag" => 0, "dealtimeline" => time( ) );
        parent::$obj->update( DB_PREFIX."complaints", $arr, "cpuid='".$uid."'" );
        return parent::$obj->update( DB_PREFIX."user_status", array( "flag" => 1 ), "userid='".$uid."'" );
    }

}

?>
