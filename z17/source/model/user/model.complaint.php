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
class complaintUModel extends X
{

    public function doAdd( $array )
    {
        $id = parent::$obj->fetch_newid( "SELECT MAX(id) FROM ".DB_PREFIX."complaints", 1 );
        $array = array_merge( array(
            "id" => $id,
            "fromuid" => parent::$wrap_user['userid'],
            "flag" => 0,
            "ip" => XRequest::getip( )
        ), $array );
        return parent::$obj->insert( DB_PREFIX."complaints", $array );
    }

}

?>
