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
class vipUModel extends X
{

    public function getCommerData( $orders, $commer )
    {
        $array = array( );
        foreach ( $commer as $key => $value )
        {
            if ( $orders == $value['orders'] )
            {
                $array = array( 
			days" => $value['days'], 
			"money" => $value['money'], 
			"points" => $value['points']
		);
                break;
            }
        }
        return $array;
    }

    public function doSaveVip( $group, $commer )
    {
        $result = parent::$wrap_user( DB_PREFIX."user", array( "groupid" => intval( $group['groupid'] ) ), "userid='".parent::$wrap_user['userid']."'" );
        if ( TRUE === $result )
        {
            $int_startdate = strtotime( date( "Y-m-d", time( ) ) );
            $int_enddate = XHandle::diffdate( time( ), $commer['days'], 1, 1 );
            $vip_array = array(
                "viplevel" => intval( $group['groupid'] ),
                "vipstartdate" => $int_startdate,
                "vipenddate" => $int_enddate
            );
            parent::$obj->update( DB_PREFIX."user_validate", $vip_array, "userid='".parent::$wrap_user['userid']."'" );
            if ( 0 < $commer['money'] )
            {
                $logcontent = XLang::get( "vip_moneylog" );
                $logcontent = str_ireplace( array( "{groupname}", "{enddate}" ), array( $group['groupname'], date( "Y-m-d", $int_enddate ) ), $logcontent );
                $money_array = array(
                    "userid" => parent::$wrap_user['userid'],
                    "actiontype" => 2,
                    "amount" => $commer['money'],
                    "logcontent" => $logcontent,
                    "opuser" => parent::$wrap_user['userid']
                );
                $model_money = parent::model( "money", "am" );
                $model_money->doAdd( $money_array );
                unset( $model_money );
                unset( $money_array );
                unset( $logcontent );
            }
            if ( 0 < $commer['points'] )
            {
                $logcontent = XLang::get( "vip_pointslog" );
                $logcontent = str_ireplace( array( "{groupname}", "{enddate}" ), array( $group['groupname'], date( "Y-m-d", $int_enddate ) ), $logcontent );
                $points_array = array(
                    "userid" => parent::$wrap_user['userid'],
                    "actiontype" => 1,
                    "points" => $commer['points'],
                    "logcontent" => $logcontent,
                    "opuser" => parent::$wrap_user['userid']
                );
                $model_points = parent::model( "points", "am" );
                $model_points->doAdd( $points_array );
                unset( $model_points );
                unset( $points_array );
                unset( $logcontent );
            }
            if ( 0 < intval( $commer['mbsms'] ) )
            {
                $sms_log = XLang::get( "mbsms_viplog" );
                $sms_num = intval( $commer['mbsms'] );
                $sms_log = str_ireplace( array( "{groupname}", "{enddate}" ), array( $group['groupname'], date( "Y-m-d", $int_enddate ) ), $sms_log );
                $sms_array = array(
                    "userid" => parent::$wrap_user['userid'],
                    "actiontype" => 1,
                    "quantity" => $sms_num,
                    "logcontent" => $sms_log,
                    "opuser" => parent::$wrap_user['username']
                );
                $model_mbsms = parent::model( "mbsms", "am" );
                $model_mbsms->doAdd( $sms_array );
                unset( $model_mbsms );
                unset( $sms_array );
                unset( $sms_log );
            }
            parent::$obj->update( DB_PREFIX."user_params", array(
                "groupid" => intval( $group['groupid'] )
            ), "userid='".parent::$wrap_user['userid']."'" );
        }
        return $result;
    }

}

?>
