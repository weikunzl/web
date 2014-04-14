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
class myadsAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE v.templet='".parent::$cfg['templet']."'".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.aid) FROM ".DB_PREFIX."myads AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, z.zonename,z.idmark FROM ".DB_PREFIX."myads AS v LEFT JOIN ".DB_PREFIX."zone AS z ON v.zoneid=z.zoneid".$where." ORDER BY v.zoneid DESC,v.orders ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."myads WHERE `aid`='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $aid = parent::$obj->fetch_newid( "SELECT MAX(aid) FROM ".DB_PREFIX."myads", 1 );
        $array = array_merge( array( "aid" => $aid, "templet" => parent::$cfg['templet'] ), $array );
        return parent::$obj->insert( DB_PREFIX."myads", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."myads", $array, "`aid`=".$id."" );
    }

    public function doDel( $id )
    {
        $sql = "SELECT `normbody` FROM ".DB_PREFIX."myads WHERE `aid`='".intval( $id )."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $normbody = XHandle::dounserialize( $rows['normbody'] );
            if ( !empty( $normbody['uploadfiles'] ) && substr( $normbody['uploadfiles'], 0, 15 ) == "data/attachment" )
            {
                parent::loadutil( "file" );
                XFile::delfile( $normbody['uploadfiles'] );
            }
            return parent::$obj->query( "DELETE FROM ".DB_PREFIX."myads WHERE `aid`='".intval( $id )."'" );
        }
        return FALSE;
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."myads SET `flag`='1' WHERE `aid`='".intval( $id )."'" );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."myads SET `flag`='0' WHERE `aid`='".intval( $id )."'" );
        }
    }

    public function doCheckTagName( $name )
    {
        $sql = "SELECT `aid` FROM ".DB_PREFIX."myads WHERE lower(tagname)='".strtolower( $name )."' AND `templet`='".parent::$cfg['templet']."'";
        return parent::$obj->check_data( $sql );
    }

    public function doCheckSystemAds( $id )
    {
        $sql = "SELECT `aid` FROM ".DB_PREFIX."myads WHERE `issystem`='1' AND `aid`='".intval( $id )."'";
        return parent::$obj->check_data( $sql );
    }

}

?>
