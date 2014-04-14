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
class pluginbase extends X
{

    private $name = NULL;
    private $do = NULL;

    public function __construct( )
    {
        $this->_getItems( );
    }

    private function _getItems( )
    {
        $items = XRequest::getargs( "plugin" );
        if ( empty( $items ) || !XHandle::getstrpos( $items, ":" ) )
        {
            XHandle::halt( "对不起，插件载入失败！", PATH_URL."index.php", 4 );
        }
        else
        {
            $array = explode( ":", $items );
            $plugin_name = $array[0];
            $plugin_do = $array[1];
            if ( !preg_match( "/^[a-zA-Z\\_]+$/", $plugin_name ) || !preg_match( "/^[a-zA-Z\\_]+$/", $plugin_do ) )
            {
                XHandle::halt( "对不起，插件参数不完整，或者有误！", PATH_URL."index.php", 4 );
            }
            else if ( XValid::isplugin( $plugin_name ) )
            {
                parent::loadlib( "option" );
                $active_plugins = XOption::get( "active_plugins" );
                if ( is_array( $active_plugins ) && in_array( $plugin_name, $active_plugins ) )
                {
                    $this->name = $plugin_name;
                    $this->do = $plugin_do;
                }
                else
                {
                    XHandle::halt( "对不起，该插件被禁用或者已删除！", PATH_URL."index.php", 4 );
                }
            }
            else
            {
                XHandle::halt( "对不起，载入的插件不存在！", PATH_URL."index.php", 4 );
            }
        }
    }

    public function doPlugin( )
    {
        $plugin_path = BASE_ROOT."./source/plugin/".$this->name."/".$this->name.".php";
        require_once( $plugin_path );
        $modules = $plugins_modules;
        if ( empty( $modules ) )
        {
            XHandle::halt( "对不起，插件没有设置允许访问的Module", PATH_URL."index.php", 4 );
        }
        else if ( empty( $modules[$this->name] ) )
        {
            XHandle::halt( "对不起，插件没有设置允许访问的Module", PATH_URL."index.php", 4 );
        }
        else if ( !in_array( $this->do, $modules[$this->name] ) )
        {
            XHandle::halt( "对不起，该插件不允许访问[".$this->do."]Module！", PATH_URL."index.php", 4 );
        }
        else
        {
            $plugin_function = $this->name."_".$this->do;
            if ( function_exists( $plugin_function ) )
            {
                call_user_func( $plugin_function );
            }
            else
            {
                XHandle::halt( "对不起，该插件没有[".$this->do."]Module", PATH_URL."index.php", 4 );
            }
        }
    }

}

?>
