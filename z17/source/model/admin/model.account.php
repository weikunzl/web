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
class accountAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."finance_account".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."finance_account".$where." ORDER BY orders ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."finance_account WHERE acid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $acid = parent::$obj->fetch_newid( "SELECT MAX(acid) FROM ".DB_PREFIX."finance_account", 1 );
        $array = array_merge( array( "acid" => $acid ), $array );
        return parent::$obj->insert( DB_PREFIX."finance_account", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."finance_account", $array, "acid='".intval( $id )."'" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."finance_account WHERE acid='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

    public function getOptions( $inid )
    {
        $temps = "";
        $sql = "SELECT acid,actitle,account FROM ".DB_PREFIX."finance_account ORDER BY orders ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $temps .= "<option value='".$value['acid']."'";
            if ( intval( $inid ) == $value['acid'] )
            {
                $temps .= " selected";
            }
            $temps .= ">".$value['actitle']." ".$value['account']."</option>";
        }
        return $temps;
    }

}

?>
