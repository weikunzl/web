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
class infocatAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."info_category".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, COUNT(*) AS infocount FROM ".DB_PREFIX."info_category AS v LEFT JOIN ".DB_PREFIX."info AS i ON v.catid=i.catid".$where." GROUP BY v.catid ORDER BY i.orders ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "info_category WHERE `catid`='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $catid = parent::$obj->fetch_newid( "SELECT MAX(catid) FROM ".DB_PREFIX."info_category", 1 );
        $array = array_merge( array( "catid" => $catid ), $array );
        return parent::$obj->insert( DB_PREFIX."info_category", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."info_category", $array, "`catid`='".$id."'" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "info_category WHERE `catid`='".$id."'" );
        return parent::$obj->query( $sql );
    }

    public function getOptions( $inid )
    {
        $temps = "";
        $sql = "SELECT `catid`, `catname` FROM ".DB_PREFIX."info_category ORDER BY `orders` ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $temps .= "<option value='".$value['catid']."'";
            if ( intval( $inid ) == $value['catid'] )
            {
                $temps .= " selected";
            }
            $temps .= ">".$value['catname']."</option>";
        }
        return $temps;
    }

}

?>
