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
class transferAModel extends X
{

    public function getConfig( )
    {
        $file = BASE_ROOT."./source/conf/transfer.inc.php";
        if ( file_exists( $file ) )
        {
            return require_once( $file );
        }
    }

    public function doSaveConfig( $args )
    {
        if ( $args['trade_money'] == 1 )
        {
            $args['trade_money_flag'] = "true";
        }
        else
        {
            $args['trade_money_flag'] = "false";
        }
        if ( $args['trade_points'] == 1 )
        {
            $args['trade_points_flag'] = "true";
        }
        else
        {
            $args['trade_points_flag'] = "false";
        }
        $config = "<?php\r\n/**\r\n * @Brief 金币、积分转换配置文件\r\n**/\r\nreturn array (\r\n    ///积分转换金币 状态\r\n\t'trade_money'=>".$args['trade_money_flag'].",\r\n\t///积分转换金币 比例\r\n\t'trade_money_ratio'=>".$args['trade_money_ratio'].",\r\n\t///金币转换积分 状态\r\n\t'trade_points'=>".$args['trade_points_flag'].",\r\n\t///金币转换积分 比例\r\n\t'trade_points_ratio'=>".$args['trade_points_ratio'].",\r\n);\r\n?>";
        $file = "source/conf/transfer.inc.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $config );
    }

}

?>
