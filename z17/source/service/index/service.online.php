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
class onlineIService extends X
{

    public function validSearch( )
    {
        $args = array( );
        $countwhere = "";
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
            $countwhere .= " AND ps.gender='".$s_sex."'";
        }
        if ( 0 < $s_sage && 0 < $s_eage )
        {
            $year = date( "Y", time( ) );
            $sageline = $year - $s_eage;
            $eageline = $year - $s_sage;
            $countwhere .= " AND ps.ageyear >= ".$sageline." AND ps.ageyear <= {$eageline}";
        }
        if ( 0 < $s_dist1 )
        {
            $countwhere .= " AND ps.provinceid='".$s_dist1."'";
        }
        if ( 0 < $s_dist2 )
        {
            $countwhere .= " AND ps.cityid='".$s_dist2."'";
        }
        if ( 0 < $s_dist3 )
        {
            $countwhere .= " AND ps.distid='".$s_dist3."'";
        }
        if ( $s_avatar == 1 )
        {
            $countwhere .= " AND ps.avatar='1'";
        }
        return array(
            $countwhere,
            $args
        );
    }

    public function validType( )
    {
        $type = XRequest::getargs( "type" );
        return $type;
    }

}

?>
