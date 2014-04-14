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
class moneyAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_money AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*,u.username FROM ".DB_PREFIX."user_money AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where." ORDER BY v.actionid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*,u.username FROM ".DB_PREFIX."user_money AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid WHERE v.actionid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array, $op = 1 )
    {
        if ( 1 < $array['userid'] && 0 < $array['amount'] )
        {
            $actionid = parent::$obj->fetch_newid( "SELECT MAX(actionid) FROM ".DB_PREFIX."user_money", 1 );
            $time = time( );
            $array = array_merge( array( "actionid" => $actionid, "actiondate" => date( "Y-m-d", $time ), "tyear" => date( "Y", $time ), "tmonth" => date( "m", $time ), "tday" => date( "d", $time ), "timeline" => $time, "dateline" => strtotime( date( "Y-m-d", $time ) ), "optime" => $time ), $array );
            $result = parent::$obj->insert( DB_PREFIX."user_money", $array );
            if ( TRUE === $result && $op == 1 )
            {
                if ( $array['actiontype'] == 1 )
                {
                    $query = "UPDATE ".DB_PREFIX."user SET `money`=(`money`+".floatval( $array['amount'] ).")";
                }
                else
                {
                    $query = "UPDATE ".DB_PREFIX."user SET `money`=(`money`-".floatval( $array['amount'] ).")";
                }
                $query .= " WHERE `userid`='".intval( $array['userid'] )."'";
                parent::$obj->query( $query );
            }
            return $result;
        }
        return FALSE;
    }

    public function doDel( $id )
    {
        $sql = "SELECT `amount`, `userid`, `actiontype` FROM ".DB_PREFIX.( "user_money WHERE `actionid`='".$id."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( $rows['actiontype'] == 1 )
            {
                $query = "UPDATE ".DB_PREFIX."user SET `money`=(`money`-".floatval( $rows['money'] ).")";
            }
            else
            {
                $query = "UPDATE ".DB_PREFIX."user SET `money`=(`money`+".floatval( $rows['money'] ).")";
            }
            $query .= " WHERE `userid`='".intval( $rows['userid'] )."'";
            parent::$obj->query( $query );
            return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_money WHERE `actionid`='".$id."'" ) );
        }
        return FALSE;
    }

}

?>
