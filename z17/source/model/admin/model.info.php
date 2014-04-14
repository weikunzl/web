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
class infoAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."info AS v LEFT JOIN ".DB_PREFIX."info_category AS c ON v.catid=c.catid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, c.catname FROM ".DB_PREFIX."info AS v LEFT JOIN ".DB_PREFIX."info_category AS c ON v.catid=c.catid".$where." ORDER BY v.infoid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, c.catname FROM ".DB_PREFIX."info AS v LEFT JOIN ".DB_PREFIX."info_category AS c ON v.catid=c.catid".( " WHERE v.infoid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $infoid = parent::$obj->fetch_newid( "SELECT MAX(infoid) FROM ".DB_PREFIX."info", 1 );
        $array = array_merge( array( "infoid" => $infoid ), $array );
        return parent::$obj->insert( DB_PREFIX."info", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."info", $array, "`infoid`='".$id."'" );
    }

    public function doDel( $id )
    {
        $sql = "SELECT thumbfiles, uploadfiles FROM ".DB_PREFIX.( "info WHERE `infoid`='".$id."'" );
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
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "info WHERE `infoid`='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "info SET `flag`='1' WHERE `infoid`='".$id."'" ) );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "info SET `flag`='0' WHERE `infoid`='".$id."'" ) );
        }
        if ( $type == "eliteopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "info SET `elite`='1' WHERE `infoid`='".$id."'" ) );
        }
        if ( $type == "eliteclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "info SET `elite`='0' WHERE `infoid`='".$id."'" ) );
        }
    }

}

?>
