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
class messageAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.msgid) AS mycount FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."user AS fu ON v.fromuserid=fu.userid LEFT JOIN ".DB_PREFIX."user AS tu ON v.touserid=tu.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, fu.username AS fromusername, fu.email AS fromemail, fu.gender AS fromgender, fp.ageyear AS fromageyear, fp.provinceid AS fromprovinceid, fp.cityid AS fromcityid, tu.username AS tousername, tu.email AS toemail, tu.gender AS togender, tp.ageyear AS toageyear, tp.provinceid AS toprovinceid, tp.cityid AS tocityid FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."user AS fu ON v.fromuserid=fu.userid LEFT JOIN ".DB_PREFIX."user_profile AS fp ON v.fromuserid=fp.userid LEFT JOIN ".DB_PREFIX."user AS tu ON v.touserid=tu.userid LEFT JOIN ".DB_PREFIX."user_profile AS tp ON v.touserid=tp.userid".$where." ORDER BY v.msgid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, fu.username AS fromusername, fu.email AS fromemail, fu.gender AS fromgender, fp.ageyear AS fromageyear, fp.provinceid AS fromprovinceid, fp.cityid AS fromcityid, tu.username AS tousername, tu.email AS toemail, tu.gender AS togender, tp.ageyear AS toageyear, tp.provinceid AS toprovinceid, tp.cityid AS tocityid FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."user AS fu ON v.fromuserid=fu.userid LEFT JOIN ".DB_PREFIX."user_profile AS fp ON v.fromuserid=fp.userid LEFT JOIN ".DB_PREFIX."user AS tu ON v.touserid=tu.userid LEFT JOIN ".DB_PREFIX."user_profile AS tp ON v.touserid=tp.userid".( " WHERE v.msgid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $msgid = parent::$obj->fetch_newid( "SELECT MAX(msgid) FROM ".DB_PREFIX."message", 1 );
        $array = array_merge( array( "msgid" => $msgid, "sendtime" => time( ) ), $array );
        return parent::$obj->insert( DB_PREFIX."message", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."message", $array, "msgid='".$id."'" );
    }

    public function doDel( $id )
    {
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "message WHERE msgid='".$id."'" ) );
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "istopopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "message SET istop='1' WHERE msgid='".$id."'" ) );
        }
        if ( $type == "istopclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX.( "message SET istop='0' WHERE msgid='".$id."'" ) );
        }
    }

}

?>
