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
class zoneAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE v.templet='".parent::$cfg['templet']."'".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.zoneid) FROM ".DB_PREFIX."zone AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, COUNT(a.aid) AS adscount FROM ".DB_PREFIX."zone AS v LEFT JOIN ".DB_PREFIX."myads AS a ON v.zoneid=a.zoneid".$where." GROUP BY v.zoneid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."zone WHERE `zoneid`='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $zoneid = parent::$obj->fetch_newid( "SELECT MAX(zoneid) FROM ".DB_PREFIX."zone", 1 );
        $array = array_merge( array( "zoneid" => $zoneid, "templet" => parent::$cfg['templet'] ), $array );
        return parent::$obj->insert( DB_PREFIX."zone", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."zone", $array, "`zoneid`=".$id."" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."zone WHERE `zoneid`='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."zone SET `flag`='1' WHERE `zoneid`='".intval( $id )."'" );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."zone SET `flag`='0' WHERE `zoneid`='".intval( $id )."'" );
        }
    }

    public function doCheckIdMark( $name )
    {
        $sql = "SELECT `zoneid` FROM ".DB_PREFIX."zone WHERE lower(idmark)='".strtolower( $name )."' AND `templet`='".parent::$cfg['templet']."'";
        return parent::$obj->check_data( $sql );
    }

    public function doCheckSystem( $id )
    {
        $sql = "SELECT `zoneid` FROM ".DB_PREFIX."zone WHERE `issystem`='1' AND `zoneid`='".intval( $id )."'";
        return parent::$obj->check_data( $sql );
    }

    public function getZoneOption( $invalue )
    {
        $sql = "SELECT `zoneid`, `zonename`, `zonewidth`, `zoneheight` FROM ".DB_PREFIX."zone WHERE `flag`='1' AND `templet`='".parent::$cfg['templet']."' ORDER BY `zoneid` DESC";
        $data = parent::$obj->getall( $sql );
        $temp = "";
        foreach ( $data as $key => $value )
        {
            $temp .= "<option value='".$value['zoneid']."'";
            if ( $invalue == $value['zoneid'] )
            {
                $temp .= " selected";
            }
            $temp .= ">".$value['zonename']." ".$value['zonewidth']."*".$value['zoneheight']."</option>";
        }
        unset( $data );
        return $temp;
    }

}

?>
