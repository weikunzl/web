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
class paramterAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(paramid) FROM ".DB_PREFIX."finance_paramter".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."finance_paramter".$where." ORDER BY paramtype ASC,orders ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."finance_paramter WHERE paramid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $paramid = parent::$obj->fetch_newid( "SELECT MAX(paramid) FROM ".DB_PREFIX."finance_paramter", 1 );
        $array = array_merge( array( "paramid" => $paramid ), $array );
        return parent::$obj->insert( DB_PREFIX."finance_paramter", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."finance_paramter", $array, "paramid='".intval( $id )."'" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."finance_paramter WHERE paramid='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

    public function getOptions( $inid, $type = "in" )
    {
        if ( !in_array( $type, array( "in", "out", "money", "token" ) ) )
        {
            $type = "in";
        }
        $temps = "";
        $sql = "SELECT paramid,paramvalue FROM ".DB_PREFIX.( "finance_paramter WHERE paramtype='".$type."' ORDER BY orders ASC" );
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $temps .= "<option value='".$value['paramid']."'";
            if ( intval( $inid ) == $value['paramid'] )
            {
                $temps .= " selected";
            }
            $temps .= ">".$value['paramvalue']."</option>";
        }
        return $temps;
    }

}

?>
