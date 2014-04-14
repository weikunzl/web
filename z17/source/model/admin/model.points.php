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
class pointsAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_points AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*,u.username FROM ".DB_PREFIX."user_points AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where." ORDER BY v.actionid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*,u.username FROM ".DB_PREFIX."user_points AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".( " WHERE v.actionid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array, $op = 1 )
    {
        if ( 1 < $array['userid'] && 0 < $array['points'] )
        {
            $actionid = parent::$obj->fetch_newid( "SELECT MAX(actionid) FROM ".DB_PREFIX."user_points", 1 );
            if ( TRUE === $array['timeline'] )
            {
                $time = $array['timeline'];
            }
            else
            {
                $time = time( );
            }
            $array = array_merge( array( 
	    	"actionid" => $actionid, 
		"actiondate" => date( "Y-m-d", $time ), 
		"tyear" => date( "Y", $time ), 
		"tmonth" => date( "m", $time ), 
		"tday" => date( "d", $time ), 
		"timeline" => $time, 
		"dateline" => strtotime( date( "Y-m-d", $time ) ), 
		"optime" => $time 
	    ), $array );
            $result = parent::$obj->insert( DB_PREFIX."user_points", $array );
            if ( TRUE === $result && $op == 1 )
            {
                if ( $array['actiontype'] == 1 )
                {
                    $query = "UPDATE ".DB_PREFIX."user SET `points`=(`points`+".floatval( $array['points'] ).")";
                }
                else
                {
                    $query = "UPDATE ".DB_PREFIX."user SET `points`=(`points`-".floatval( $array['points'] ).")";
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
        $sql = "SELECT `points`, `userid`, `actiontype` FROM ".DB_PREFIX.( "user_points WHERE `actionid`='".$id."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( $rows['actiontype'] == 1 )
            {
                $query = "UPDATE ".DB_PREFIX."user SET `points`=(`points`-".floatval( $rows['points'] ).")";
            }
            else
            {
                $query = "UPDATE ".DB_PREFIX."user SET `points`=(`points`+".floatval( $rows['points'] ).")";
            }
            $query .= " WHERE `userid`='".intval( $rows['userid'] )."'";
            parent::$obj->query( $query );
            return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_points WHERE `actionid`='".$id."'" ) );
        }
        return FALSE;
    }

}

?>
