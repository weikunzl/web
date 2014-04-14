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
class control extends adminbase
{

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    public function control_run( )
    {
        $this->checkAuth( "ucenter" );
        $searchsql = "";
        $model = parent::model( "ucenter", "am" );
        $model->getConfig( );
        unset( $model );
        if ( defined( "OE_UC_FLAG" ) )
        {
            $var_array = array(
                "uc_flag" => OE_UC_FLAG,
                "uc_api" => UC_API,
                "uc_ip" => UC_IP,
                "uc_key" => UC_KEY,
                "uc_appid" => UC_APPID,
                "uc_charset" => UC_CHARSET,
                "uc_connect" => UC_CONNECT,
                "uc_dbhost" => UC_DBHOST,
                "uc_dbuser" => UC_DBUSER,
                "uc_dbpw" => UC_DBPW,
                "uc_dbname" => UC_DBNAME,
                "uc_dbtablepre" => UC_DBTABLEPRE,
                "uc_dbcharset" => UC_DBCHARSET
            );
        }
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."ucenter.tpl" );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "ucenter" );
        $args = $this->_validEdit( );
        $model = parent::model( "ucenter", "am" );
        $result = $model->doSaveConfig( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "ucenter", "", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=ucenter", 0 );
        }
        else
        {
            $this->log( "ucenter", "", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    private function _validEdit( )
    {
        $args = XRequest::getgpc( array( "uc_flag", "uc_api", "uc_ip", "uc_key", "uc_appid", "uc_charset", "uc_connect", "uc_dbhost", "uc_dbuser", "uc_dbpw", "uc_dbname", "uc_dbtablepre", "uc_dbcharset" ) );
        $args['uc_flag'] = intval( $args['uc_flag'] );
        $args['uc_appid'] = intval( $args['uc_appid'] );
        return $args;
    }

}

?>
