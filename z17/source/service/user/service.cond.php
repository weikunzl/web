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
class condUService extends X
{

    public function validCond( )
    {
        $args = XRequest::getgpc( array( "gender", "startage", "endage", "startheight", "endheight", "startedu", "endedu", "avatar", "star", "starup" ) );
        $args['gender'] = intval( $args['gender'] );
        $args['startage'] = intval( $args['startage'] );
        $args['endage'] = intval( $args['endage'] );
        $args['startheight'] = intval( $args['startheight'] );
        $args['endheight'] = intval( $args['endheight'] );
        $args['startedu'] = intval( $args['startedu'] );
        $args['endedu'] = intval( $args['endedu'] );
        $args['avatar'] = intval( $args['avatar'] );
        $args['star'] = intval( $args['star'] );
        $args['starup'] = intval( $args['starup'] );
        $marry = XRequest::getcomargs( "marry" );
        $lovesort = XRequest::getcomargs( "lovesort" );
        $args['marry'] = $marry;
        $args['lovesort'] = $lovesort;
        list($args['setarea'],$args['areas']) = $this->validSetArea( );
	return $args;
    }

    public function validSetArea( )
    {
        $areas = "";
        $province_1 = XRequest::getint( "province_1" );
        $city_1 = XRequest::getint( "city_1" );
        $array[] = array(
            "orders" => 1,
            "province" => $province_1,
            "city" => $city_1
        );
        if ( 0 < $city_1 )
        {
            $areas .= $city_1.",";
        }
        $province_2 = XRequest::getint( "province_2" );
        $city_2 = XRequest::getint( "city_2" );
        $array[] = array(
            "orders" => 2,
            "province" => $province_2,
            "city" => $city_2
        );
        if ( 0 < $city_2 )
        {
            $areas .= $city_2.",";
        }
        $province_3 = XRequest::getint( "province_3" );
        $city_3 = XRequest::getint( "city_3" );
        $array[] = array(
            "orders" => 3,
            "province" => $province_3,
            "city" => $city_3
        );
        if ( 0 < $city_3 )
        {
            $areas .= $city_3.",";
        }
        $province_4 = XRequest::getint( "province_4" );
        $city_4 = XRequest::getint( "city_4" );
        $array[] = array(
            "orders" => 4,
            "province" => $province_4,
            "city" => $city_4
        );
        if ( 0 < $city_4 )
        {
            $areas .= $city_4.",";
        }
        $province_5 = XRequest::getint( "province_5" );
        $city_5 = XRequest::getint( "city_5" );
        $array[] = array(
            "orders" => 5,
            "province" => $province_5,
            "city" => $city_5
        );
        if ( 0 < $city_5 )
        {
            $areas .= $city_5.",";
        }
        if ( !empty( $areas ) )
        {
            $areas = substr( $areas, 0, strlen( $areas ) - 1 );
        }
        return array( serialize( $array ), $areas );
    }

}

?>
