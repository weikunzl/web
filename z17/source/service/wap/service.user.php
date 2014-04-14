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
class userWService extends X
{

    public function validSearch( )
    {
        $args = array( );
        $params_where = "";
        $s_sex = XRequest::getint( "s_sex" );
        $s_sage = XRequest::getint( "s_sage" );
        $s_eage = XRequest::getint( "s_eage" );
        $s_dist1 = XRequest::getint( "s_dist1" );
        $s_sheight = XRequest::getint( "s_sheight" );
        $s_eheight = XRequest::getint( "s_eheight" );
        $s_ssalary = XRequest::getint( "s_ssalary" );
        $s_esalary = XRequest::getint( "s_esalary" );
        $s_sedu = XRequest::getint( "s_sedu" );
        $s_eedu = XRequest::getint( "s_eedu" );
        $s_marry = XRequest::getint( "s_marry" );
        $s_havechild = XRequest::getint( "s_havechild" );
        $s_house = XRequest::getint( "s_house" );
        $s_car = XRequest::getint( "s_car" );
        $s_avatar = XRequest::getint( "s_avatar" );
        $args = array(
            "s_sex" => $s_sex,
            "s_sage" => $s_sage,
            "s_eage" => $s_eage,
            "s_dist1" => $s_dist1,
            "s_sheight" => $s_sheight,
            "s_eheight" => $s_eheight,
            "s_ssalary" => $s_ssalary,
            "s_esalary" => $s_esalary,
            "s_sedu" => $s_sedu,
            "s_eedu" => $s_eedu,
            "s_marry" => $s_marry,
            "s_havechild" => $s_havechild,
            "s_house" => $s_house,
            "s_car" => $s_car,
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
        if ( 0 < $s_sheight && 0 < $s_eheight )
        {
            $params_where .= " AND ps.height >= ".$s_sheight." AND ps.height <= {$s_eheight}";
        }
        if ( 0 < $s_ssalary && 0 < $s_esalary )
        {
            $params_where .= " AND ps.salary >= ".$s_ssalary." AND ps.salary <= {$s_esalary}";
        }
        if ( 0 < $s_sedu && 0 < $s_eedu )
        {
            $params_where .= " AND ps.education >= ".$s_sedu." AND ps.education <= {$s_eedu}";
        }
        if ( 0 < $s_marry )
        {
            $params_where .= " AND ps.marry='".$s_marry."'";
        }
        if ( $s_havechild )
        {
            $params_where .= " AND ps.child='".$s_havechild."'";
        }
        if ( 0 < $s_house )
        {
            $params_where .= " AND ps.house='".$s_house."'";
        }
        if ( 0 < $s_car )
        {
            $params_where .= " AND ps.car='".$s_car."'";
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

    public function validUid( )
    {
        $uid = XRequest::getint( "s_uid" );
        if ( FALSE === XValid::isnumber( $uid ) || $uid < 0 )
        {
            $uid = 0;
        }
        return $uid;
    }

    public function validUserName( )
    {
        $username = XRequest::getargs( "s_username" );
        if ( FALSE === XValid::isuserargs( $username ) )
        {
            $username = "";
        }
        return $username;
    }

}

?>
