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
class ucenterAModel extends X
{

    public function getConfig( )
    {
        $file = BASE_ROOT."./source/conf/ucenter.inc.php";
        if ( file_exists( $file ) )
        {
            return require_once( $file );
        }
    }

    public function doSaveConfig( $args )
    {
        if ( $args['uc_flag'] == 1 )
        {
            $args['uc_flag'] = "true";
        }
        else
        {
            $args['uc_flag'] = "false";
        }
        $config = "<?php\r\ndefine('OE_UC_FLAG', ".$args['uc_flag'].");\r\ndefine('UC_CONNECT', '".$args['uc_connect']."');\r\ndefine('UC_DBHOST', '".$args['uc_dbhost']."');\r\ndefine('UC_DBUSER', '".$args['uc_dbuser']."');\r\ndefine('UC_DBPW', '".$args['uc_dbpw']."');\r\ndefine('UC_DBNAME', '".$args['uc_dbname']."');\r\ndefine('UC_DBCHARSET', '".$args['uc_dbcharset']."');\r\ndefine('UC_DBTABLEPRE', '".$args['uc_dbtablepre']."');\r\ndefine('UC_DBCONNECT', '0');\r\ndefine('UC_KEY', '".$args['uc_key']."');\r\ndefine('UC_API', '".$args['uc_api']."');\r\ndefine('UC_CHARSET', '".$args['uc_charset']."');\r\ndefine('UC_IP', '".$args['uc_ip']."');\r\ndefine('UC_APPID', '".$args['uc_appid']."');\r\ndefine('UC_PPP', '20');\r\n?>";
        $file = "source/conf/ucenter.inc.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $config );
    }

}

?>
