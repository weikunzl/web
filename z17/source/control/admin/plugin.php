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

    private $plugin_id = NULL;
    private $do = NULL;

    public function __construct( )
    {
        $this->control( );
        $this->plugin_id = XRequest::getargs( "plugin_id" );
        $this->do = XRequest::getargs( "do" );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    public function control_run( )
    {
        $this->checkAuth( "plugin_volist" );
        $model = parent::model( "plugin", "am" );
        $plugins = $model->getPlugins( );
        unset( $model );
        $var_array = array(
            "plugins" => $plugins
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."plugin.tpl" );
    }

    public function control_active( )
    {
        $this->checkAuth( "plugin_active" );
        $this->_checkPlugin( );
        $model = parent::model( "plugin", "am" );
        if ( $model->activePlugin( $this->plugin_id ) )
        {
            $this->log( "plugin_active", "", 1 );
            XHandle::halt( "插件激活成功", $this->cpfile."?c=plugin", 0 );
        }
        else
        {
            $this->log( "plugin_active", "", 0 );
            Xhandle::halt( "插件激活失败", "", 1 );
        }
        unset( $model );
    }

    public function control_inactive( )
    {
        $this->checkAuth( "plugin_inactive" );
        $this->_checkPlugin( );
        $model = parent::model( "plugin", "am" );
        if ( $model->inactivePlugin( $this->plugin_id ) )
        {
            $this->log( "plugin_inactive", "", 1 );
            XHandle::halt( "插件禁用成功", $this->cpfile."?c=plugin", 0 );
        }
        else
        {
            $this->log( "plugin_inactive", "", 0 );
            XHandle::halt( "插件禁用失败", "", 1 );
        }
        unset( $model );
    }

    public function control_del( )
    {
        $this->checkAuth( "plugin_del" );
        $this->_checkPlugin( );
        $model = parent::model( "plugin", "am" );
        $model->inactivePlugin( $this->plugin_id );
        $plugin_path = BASE_ROOT."source/plugin/".$this->plugin_id;
        parent::loadutil( "file" );
        if ( TRUE === XFile::deldir( $plugin_path ) )
        {
            $this->log( "plugin_del", "", 1 );
            XHandle::halt( "插件删除成功", $this->cpfile."?c=plugin", 0 );
        }
        else
        {
            $this->log( "plugin_del", "", 0 );
            XHandle::halt( "插件删除失败", "", 1 );
        }
        unset( $model );
    }

    public function control_setting( )
    {
        $this->_validPlugin( );
        $plugin_path = BASE_ROOT."./source/plugin/".$this->plugin_id."/admin.inc.php";
        if ( file_exists( $plugin_path ) )
        {
            require_once( $plugin_path );
            if ( empty( $this->do ) )
            {
                $this->do = "setting";
            }
            $function_name = $this->plugin_id."_plugin_".$this->do;
            if ( function_exists( $function_name ) )
            {
                $var_array = array(
                    "plugin_event" => $function_name."_event",
                    "plugin_name" => $this->plugin_id
                );
                TPL::assign( $var_array );
                TPL::display( $this->cptpl."plugin.tpl" );
            }
            else
            {
                XHandle::halt( "对不起，该插件没有".$this->do."方法！", "", 1 );
            }
        }
        else
        {
            XHandle::halt( "对不起，载入插件文件失败！", "", 1 );
        }
    }

    public function control_save( )
    {
        $this->_validPlugin( );
        $plugin_path = BASE_ROOT."./source/plugin/".$this->plugin_id."/admin.inc.php";
        if ( file_exists( $plugin_path ) )
        {
            require_once( $plugin_path );
            if ( empty( $this->do ) )
            {
                $this->do = "setting";
            }
            $function_name = $this->plugin_id."_plugin_".$this->do;
            if ( function_exists( $function_name ) )
            {
                call_user_func( $function_name );
            }
            else
            {
                XHandle::halt( "对不起，该插件没有".$this->do."方法！", "", 1 );
            }
        }
        else
        {
            XHandle::halt( "对不起，载入插件文件失败！", "", 1 );
        }
    }

    private function _checkPlugin( )
    {
        if ( empty( $this->plugin_id ) )
        {
            XHandle::halt( "对不起，插件名不能为空！", "", 1 );
        }
        if ( FALSE === XValid::isplugin( $this->plugin_id ) )
        {
            XHandle::halt( "对不起，插件名错误或者不存在！", "", 1 );
        }
    }

    private function _validPlugin( )
    {
        if ( empty( $this->plugin_id ) )
        {
            XHandle::halt( "对不起，插件名不能为空！", "", 1 );
        }
        if ( FALSE === XValid::isplugin( $this->plugin_id ) )
        {
            XHandle::halt( "对不起，插件名错误或者不存在！", "", 1 );
        }
        parent::loadlib( "option" );
        $active_plugins = XOption::get( "active_plugins" );
        
        if ( !is_array( $active_plugins ) || !in_array( $this->plugin_id, $active_plugins ) )
        {
            XHandle::halt( "对不起，该插件不存在或者已禁用。", $this->cpfile."?c=plugin", 4 );
        }
    }

}

?>
