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
class onlineWService extends X
{

    public function validOnline( )
    {
        $args = array( );
        $params_where = "";
        $s_sex = XRequest::getint( "s_sex" );
        $s_sage = XRequest::getint( "s_sage" );
        $s_eage = XRequest::getint( "s_eage" );
        $s_dist1 = XRequest::getint( "s_dist1" );
        $s_dist2 = XRequest::getint( "s_dist2" );
        $s_dist3 = XRequest::getint( "s_dist3" );
        $s_avatar = XRequest::getint( "s_avatar" );
        $args = array(
            "s_sex" => $s_sex,
            "s_sage" => $s_sage,
            "s_eage" => $s_eage,
            "s_dist1" => $s_dist1,
            "s_dist2" => $s_dist2,
            "s_dist3" => $s_dist3,
            "s_avatar" => $s_avatar
        );
        if ( 0 < $s_sex )
        {
            $params_where .= " AND ps.gender='".$s_sex."'";
        }
        if ( 0 < $s_sage && 0 < $s_eage )
        {
            $year = date( "Y", time( ) );
            $sageline = $year - $s_eage;
            $eageline = $year - $s_sage;
            $params_where .= " AND ps.ageyear >= ".$sageline." AND ps.ageyear <= {$eageline}";
        }
        if ( 0 < $s_dist1 )
        {
            $sql .= " AND p.provinceid='".$s_dist1."'";
            $params_where .= " AND ps.provinceid='".$s_dist1."'";
        }
        if ( $s_avatar == 1 )
        {
            $params_where .= " AND ps.avatar='1'";
        }
        return array(
            $params_where,
            $args
        );
    }

}

?>
