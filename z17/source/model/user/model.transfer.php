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
class transferUModel extends X
{

    public $transfer_config = array( );
    public $transfer_file = "./source/conf/transfer.inc.php";

    public function __construct( )
    {
        $this->_loadConfig( );
    }

    private function _loadConfig( )
    {
        $file = BASE_ROOT.$this->transfer_file;
        if ( file_exists( $file ) )
        {
            $this->transfer_config = require_once( $file );
        }
    }

    public function transMoneyStatus( )
    {
        $status = FALSE;
        if ( !empty( $this->transfer_config ) && TRUE === $this->transfer_config['trade_money'] )
        {
            $status = TRUE;
        }
        return $status;
    }

    public function transPointsStatus( )
    {
        $status = FALSE;
        if ( !empty( $this->transfer_config ) && TRUE === $this->transfer_config['trade_points'] )
        {
            $status = TRUE;
        }
        return $status;
    }

    public function doTransMoney( $points, $money )
    {
        if ( 0 < $points && 0 < $money )
        {
            $points_array = array(
                "userid" => parent::$wrap_user['userid'],
                "actiontype" => 2,
                "points" => $points,
                "logcontent" => "".XLang::get( "points" )."转换".XLang::get( "money" )."",
                "opuser" => "",
                "ordernum" => ""
            );
            $am_points = parent::model( "points", "am" );
            $result = $am_points->doAdd( $points_array );
            unset( $am_points );
            $money_array = array(
                "userid" => parent::$wrap_user['userid'],
                "actiontype" => 1,
                "amount" => $money,
                "logcontent" => "".XLang::get( "points" )."转换".XLang::get( "money" )."",
                "opuser" => "",
                "ordernum" => ""
            );
            $am_money = parent::model( "money", "am" );
            $result = $am_money->doAdd( $money_array );
            unset( $am_money );
            return $result;
        }
        return FALSE;
    }

    public function doTransPoints( $money, $points )
    {
        if ( 0 < $money && 0 < $points )
        {
            $money_array = array(
                "userid" => parent::$wrap_user['userid'],
                "actiontype" => 2,
                "amount" => $money,
                "logcontent" => "".XLang::get( "money" )."转换".XLang::get( "points" )."",
                "opuser" => "",
                "ordernum" => ""
            );
            $am_money = parent::model( "money", "am" );
            $result = $am_money->doAdd( $money_array );
            unset( $am_money );
            $points_array = array(
                "userid" => parent::$wrap_user['userid'],
                "actiontype" => 1,
                "points" => $points,
                "logcontent" => "".XLang::get( "money" )."转换".XLang::get( "points" )."",
                "opuser" => "",
                "ordernum" => ""
            );
            $am_points = parent::model( "points", "am" );
            $result = $am_points->doAdd( $points_array );
            unset( $am_points );
            return $result;
        }
        return FALSE;
    }

}

?>
