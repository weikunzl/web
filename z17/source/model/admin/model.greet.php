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
class greetAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(greetid) FROM ".DB_PREFIX."greet".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."greet".$where." ORDER BY greetid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "greet WHERE greetid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $greetid = parent::$obj->fetch_newid( "SELECT MAX(greetid) FROM ".DB_PREFIX."greet", 1 );
        $array = array_merge( array( "greetid" => $greetid ), $array );
        return parent::$obj->insert( DB_PREFIX."greet", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."greet", $array, "greetid='".$id."'" );
    }

    public function doDel( $id )
    {
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "greet WHERE greetid='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "greet SET flag='1' WHERE greetid='".$id."'" ) );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "greet SET flag='0' WHERE greetid='".$id."'" ) );
        }
        if ( $type == "maleopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "greet SET male='1' WHERE greetid='".$id."'" ) );
        }
        if ( $type == "maleclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "greet SET male='0' WHERE greetid='".$id."'" ) );
        }
        if ( $type == "femaleopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "greet SET female='1' WHERE greetid='".$id."'" ) );
        }
        if ( $type == "femaleclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "greet SET female='0' WHERE greetid='".$id."'" ) );
        }
    }

}

?>
