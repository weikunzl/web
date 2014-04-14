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
class lovesortAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(sortid) FROM ".DB_PREFIX."love_sort".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."love_sort".$where." ORDER BY orders ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "love_sort WHERE sortid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $sortid = parent::$obj->fetch_newid( "SELECT MAX(sortid) FROM ".DB_PREFIX."love_sort", 1 );
        $array = array_merge( array( "sortid" => $sortid, "timeline" => time( ) ), $array );
        $result = parent::$obj->insert( DB_PREFIX."love_sort", $array );
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."love_sort", $array, "sortid='".$id."'" );
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "love_sort WHERE `sortid` = '".$id."'" );
        $result = parent::$obj->query( $sql );
        return $result;
    }

    public function getOptions( $inid )
    {
        $temps = "";
        $sql = "SELECT `sortid`, `sortname` FROM ".DB_PREFIX."love_sort ORDER BY `orders` ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $temps .= "<option value='".$value['sortid']."'";
            if ( intval( $inid ) == $value['sortid'] )
            {
                $temps .= " selected";
            }
            $temps .= ">".$value['sortname']."</option>";
        }
        return $temps;
    }

    public function getAllList( )
    {
        $sql = "SELECT `sortid`, `sortname` FROM ".DB_PREFIX."love_sort ORDER BY `orders` ASC";
        return parent::$obj->getall( $sql );
    }

    public function getSortName( $id )
    {
        $s = "";
        $sql = "SELECT `sortname` FROM ".DB_PREFIX.( "love_sort WHERE `sortid`='".$id."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $s = trim( $rows['sortname'] );
        }
        unset( $rows );
        unset( $sql );
        return $s;
    }

    public function getSortID( $name )
    {
        $id = 0;
        $sql = "SELECT `sortid` FROM ".DB_PREFIX."love_sort".( " WHERE `sortname`='".$name."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $id = intval( $rows['sortid'] );
        }
        unset( $rows );
        unset( $sql );
        return $id;
    }

}

?>
