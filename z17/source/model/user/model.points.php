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
class pointsUModel extends X
{

    public function getList( $items )
    {
        $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY actionid DESC" : $items['orderby'];
        $pagesize = intval( $items['pagesize'] );
        $where = " WHERE userid='".parent::$wrap_user['userid']."' ".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $pagesize;
        $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."user_points".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."user_points".$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        foreach ( $data as $key => $value )
        {
            $data[$key]['rempoints'] = $this->_getRemainPoints( $value['timeline'] );
            $data[$key]['i'] = $i;
            $i += 1;
        }
        return array( $total, $data );
    }

    private function _getRemainPoints( $timeline )
    {
        $remain_sum = 0;
        $add_sum = 0;
        $redure_sum = 0;
        $sql = "SELECT SUM(points) AS my_sum, actiontype FROM ".DB_PREFIX."user_points".( " WHERE timeline<=".$timeline." AND userid='" ).parent::$wrap_user['userid']."' GROUP BY actiontype";
        $data = parent::$obj->getall( $sql );
        if ( !empty( $data ) )
        {
            foreach ( $data as $key => $value )
            {
                if ( $value['actiontype'] == 1 )
                {
                    $add_sum = $value['my_sum'];
                }
                else if ( $value['actiontype'] == 2 )
                {
                    $redure_sum = $value['my_sum'];
                }
            }
            $remain_sum = $add_sum - $redure_sum;
        }
        unset( $data );
        return $remain_sum;
    }

}

?>
