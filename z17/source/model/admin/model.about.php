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
class aboutAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."single AS v LEFT JOIN ".DB_PREFIX."single_category AS c ON v.catid=c.catid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, c.catname FROM ".DB_PREFIX."single AS v LEFT JOIN ".DB_PREFIX."single_category AS c ON v.catid=c.catid".$where." ORDER BY v.abid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, c.catname FROM ".DB_PREFIX."single AS v LEFT JOIN ".DB_PREFIX."single_category AS c ON v.catid=c.catid".( " WHERE v.abid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $abid = parent::$obj->fetch_newid( "SELECT MAX(abid) FROM ".DB_PREFIX."single", 1 );
        $array = array_merge( array( "abid" => $abid ), $array );
        return parent::$obj->insert( DB_PREFIX."single", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."single", $array, "`abid`='".$id."'" );
    }

    public function doDel( $id )
    {
        $sql = "SELECT thumbfiles, uploadfiles FROM ".DB_PREFIX.( "single WHERE `abid`='".$id."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( !empty( $rows['thumbfiles'] ) && substr( $rows['thumbfiles'], 0, 15 ) == "data/attachment" )
            {
                parent::loadutil( "file" );
                XFile::delfile( $rows['thumbfiles'] );
            }
            if ( !empty( $rows['uploadfiles'] ) && substr( $rows['uploadfiles'], 0, 15 ) == "data/attachment" )
            {
                parent::loadutil( "file" );
                XFile::delfile( $rows['uploadfiles'] );
            }
        }
        unset( $rows );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "single WHERE `abid`='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "navshowopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "single SET `navshow`='1' WHERE `abid`='".$id."'" ) );
        }
        if ( $type == "navshowclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "single SET `navshow`='0' WHERE `abid`='".$id."'" ) );
        }
    }

}

?>
