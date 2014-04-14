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
class msglogUModel extends X
{

    public function getRecordList( $items )
    {
        $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY v.msgid DESC" : $items['orderby'];
        $pagesize = intval( $items['pagesize'] );
        $where = " WHERE (fromuserid='".parent::$wrap_user['userid']."' OR touserid='".parent::$wrap_user['userid']."') ".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $pagesize;
        $countsql = "SELECT COUNT(v.msgid) FROM ".DB_PREFIX."message AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.* FROM ".DB_PREFIX."message AS v".$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        foreach ( $data as $key => $value )
        {
            $data[$key]['i'] = $i;
            $i += 1;
        }
        return array( $total, $data );
    }

    public function doDel( $id, $type )
    {
        $result = FALSE;
        $sql = "SELECT v.msgid, h.firstuid FROM ".DB_PREFIX."message AS v LEFT JOIN ".DB_PREFIX."message_hash AS h ON v.hashid=h.hashid";
        $sql .= " WHERE v.msgid='".$id."'";
        if ( $type == "from" )
        {
            $sql .= " AND v.fromuserid='".parent::$wrap_user['userid']."'";
        }
        else
        {
            $sql .= " AND v.touserid='".parent::$wrap_user['userid']."'";
        }
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( $type == "from" )
            {
                if ( parent::$wrap_user['userid'] == $rows['firstuid'] )
                {
                    $update_array = array( "fromdeleted" => 1, "first_fdeleted" => 1 );
                }
                else
                {
                    $update_array = array( "fromdeleted" => 1, "sec_fdeleted" => 1 );
                }
            }
            else if ( parent::$wrap_user['userid'] == $rows['firstuid'] )
            {
                $update_array = array( "todeleted" => 1, "first_tdeleted" => 1 );
            }
            else
            {
                $update_array = array( "todeleted" => 1, "sec_tdeleted" => 1 );
            }
            $result = parent::$obj->update( DB_PREFIX."message", $update_array, "msgid='".$id."'" );
        }
        unset( $rows );
        return $result;
    }

    public function getFirstUid( $hashid )
    {
        $uid = 0;
        $sql = "SELECT firstuid FROM ".DB_PREFIX."message_hash".( " WHERE hashid='".$hashid."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $uid = intval( $rows['firstuid'] );
        }
        unset( $rows );
        return $uid;
    }

}

?>
