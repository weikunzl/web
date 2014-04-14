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
class oauthAModel extends X
{

    public function getList( )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."oauth ORDER BY `orders` ASC";
        $data = parent::$obj->getall( $sql );
        if ( !empty( $data ) )
        {
            $total = ( $data );
        }
        else
        {
            $total = 0;
        }
        return array(
            $total,
            $data
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "oauth WHERE `authid`='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $authid = parent::$obj->fetch_newid( "SELECT MAX(authid) FROM ".DB_PREFIX."oauth", 1 );
        $array = array_merge( array( "authid" => $authid ), $array );
        $result = parent::$obj->insert( DB_PREFIX."oauth", $array );
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."oauth", $array, "`authid`='".$id."'" );
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "oauth WHERE `authid`='".$id."'" );
        $result = parent::$obj->query( $sql );
        return $result;
    }

}

?>
