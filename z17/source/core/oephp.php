<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class X
{

    protected static $instance = array( );
    public static $wrap_admin = array( );
    public static $wrap_user = array( );
    private static $source_path = array
    (
        "db" => "source/core/db/",
        "util" => "source/core/util/",
        "lib" => "source/core/library/",
        "plus" => "source/plugin/",
        "ac" => "source/control/admin/",
        "am" => "source/model/admin/",
        "as" => "source/service/admin/",
        "aa" => "source/action/admin/",
        "uc" => "source/control/user/",
        "um" => "source/model/user/",
        "us" => "source/service/user/",
        "ua" => "source/action/user/",
        "ic" => "source/control/index/",
        "im" => "source/model/index/",
        "is" => "source/service/index/",
        "ia" => "source/action/index/",
        "wc" => "source/control/wap/",
        "wm" => "source/model/wap/",
        "ws" => "source/service/wap/",
        "wa" => "source/action/wap/",
        "plugin" => "source/plugin/"
    );
    public static $obj = NULL;
    public static $urlpath = NULL;
    public static $cfg = array( );
    public static $urlsuffix = "php";
    public static $tplpath = "tpl/templets/";
    public static $skinpath = NULL;
    public static $rabbit = NULL;

    private static function _dbConnect( )
    {
        $db_class_path = self::_getclasspath( "mysql", "db" );
        require_once( $db_class_path );
        self::$obj = new mysqlClass( );
        self::$obj->connect( DB_HOST, DB_USER, DB_PASS, DB_DATA, DB_CHARSET, DB_PCONNECT, TRUE );
    }

    public static function _runView( )
    {
        require_once( BASE_ROOT."./source/core/tpl.php" );
        TPL::__run( );
    }

    public static function runTime( )
    {
        return "<div align='center'><p style='font-size:10px; font-family:Arial, Helvetica, sans-serif; line-height:120%;color:#999999'>Processed in ".XRunTime::display( )." second(s) , ".self::$obj->querynum." queries</p></div>";
    }

    public static function loadUtil( $packs )
    {
        if ( is_array( $packs ) )
        {
            foreach ( $packs as $key => $value )
            {
                $packname = $value;
                $class_path = self::_getstaticpath( $packname, "util" );
                if ( file_exists( $class_path ) )
                {
                    require_once( $class_path );
                }
            }
        }
        else
        {
            $class_path = self::_getstaticpath( $packs, "util" );
            if ( file_exists( $class_path ) )
            {
                require_once( $class_path );
            }
        }
    }

    public static function loadLib( $packs )
    {
        if ( is_array( $packs ) )
        {
            foreach ( $packs as $key => $value )
            {
                $packname = $value;
                $class_path = self::_getstaticpath( $packname, "lib" );
                if ( file_exists( $class_path ) )
                {
                    require_once( $class_path );
                }
            }
        }
        else
        {
            $class_path = self::_getstaticpath( $packs, "lib" );
            if ( file_exists( $class_path ) )
            {
                require_once( $class_path );
            }
        }
    }

    public static function loadFunc( $packs, $type )
    {
        if ( is_array( $packs ) )
        {
            foreach ( $packs as $key => $value )
            {
                $packname = $value;
                $function_path = self::_getfuncpath( $packname, $type );
                if ( file_exists( $function_path ) )
                {
                    require_once( $function_path );
                }
            }
        }
        else
        {
            $function_path = self::_getfuncpath( $packs, $type );
            if ( file_exists( $function_path ) )
            {
                require_once( $function_path );
            }
        }
    }

    private static function _getStaticPath( $class_name, $type )
    {
        $class_path = self::$source_path[$type]."static.".$class_name.".php";
        $class_path = BASE_ROOT.$class_path;
        return $class_path;
    }

    private static function _getFuncPath( $name, $type = "util" )
    {
        $func_path = self::$source_path[$type]."function.".$name.".php";
        return BASE_ROOT.$func_path;
    }

    public static function import( $name, $type )
    {
        $class_path = self::_getclasspath( $name, $type );
        $class_name = self::_getclassname( $name );
        if ( !file_exists( $class_path ) )
        {
            echo "file class.".$name.".php is not exist!";
            exit( );
        }
        if ( !isset( $instance['class'][$class_name] ) )
        {
            require_once( $class_path );
            if ( !class_exists( $class_name ) )
            {
                echo "class".$class_name." is not exist!";
                exit( );
            }
            $my_class = new $class_name( );
            self::$instance['class'][$class_name] = $my_class;
        }
        return self::$instance['class'][$class_name];
    }

    private static function _getClassPath( $class_name, $type )
    {
        $class_path = self::$source_path[$type]."class.".$class_name.".php";
        $class_path = BASE_ROOT.$class_path;
        return $class_path;
    }

    private static function _getClassName( $class_name )
    {
        return $class_name."Class";
    }

    public static function model( $model_name, $type )
    {
        $model_path = self::_getmodelpath( $model_name, $type );
        $model_name = self::_getmodelname( $model_name, $type );
        if ( !file_exists( $model_path ) )
        {
            echo "Model file ".$model_name.".php is not exist!";
            exit( );
        }
        if ( !isset( $instance['model'][$model_name] ) )
        {
            require_once( $model_path );
            if ( !class_exists( $model_name ) )
            {
                echo "Model class ".$model_name." is not exist!";
                exit( );
            }
            $my_model = new $model_name( );
            self::$instance['model'][$model_name] = $my_model;
        }
        return self::$instance['model'][$model_name];
    }

    private static function _getModelPath( $model_name, $type )
    {
        $model_path = self::$source_path[$type]."model.".$model_name.".php";
        $model_path = BASE_ROOT.$model_path;
        return $model_path;
    }

    private static function _getModelName( $model_name, $type )
    {
        if ( $type == "im" )
        {
            return $model_name."IModel";
        }
        if ( $type == "um" )
        {
            return $model_name."UModel";
        }
        if ( $type == "am" )
        {
            return $model_name."AModel";
        }
        if ( $type == "wm" )
        {
            return $model_name."WModel";
        }
    }

    public static function service( $service_name, $type )
    {
        $service_path = self::_getservicepath( $service_name, $type );
        $service_name = self::_getservicename( $service_name, $type );
        if ( !file_exists( $service_path ) )
        {
            echo "Service file ".$service_name.".php is not exist!";
            exit( );
        }
        if ( !isset( $instance['service'][$service_name] ) )
        {
            require_once( $service_path );
            if ( !class_exists( $service_name ) )
            {
                echo "Service class ".$service_name." is not exist!";
                exit( );
            }
            $my_service = new $service_name( );
            self::$instance['service'][$service_name] = $my_service;
        }
        return self::$instance['service'][$service_name];
    }

    private static function _getServicePath( $service_name, $type )
    {
        $service_path = self::$source_path[$type]."service.".$service_name.".php";
        $service_path = BASE_ROOT.$service_path;
        return $service_path;
    }

    private static function _getServiceName( $service_name, $type )
    {
        if ( $type == "is" )
        {
            return $service_name."IService";
        }
        if ( $type == "us" )
        {
            return $service_name."UService";
        }
        if ( $type == "as" )
        {
            return $service_name."AService";
        }
        if ( $type == "ws" )
        {
            return $service_name."WService";
        }
    }

    public static function action( $action_name, $type )
    {
        $action_path = self::_getactionpath( $action_name, $type );
        $action_name = self::_getactionname( $action_name, $type );
        if ( !file_exists( $action_path ) )
        {
            echo "Action file ".$action_name.".php is not exist!";
            exit( );
        }
        if ( !isset( $instance['action'][$action_name] ) )
        {
            require_once( $action_path );
            if ( !class_exists( $action_name ) )
            {
                echo "Action class ".$action_name." is not exist!";
                exit( );
            }
            $my_action = new $action_name( );
            self::$instance['action'][$action_name] = $my_action;
        }
        return self::$instance['action'][$action_name];
    }

    private static function _getActionPath( $action_name, $type )
    {
        $action_path = self::$source_path[$type]."action.".$action_name.".php";
        $action_path = BASE_ROOT.$action_path;
        return $action_path;
    }

    private static function _getActionName( $action_name, $type )
    {
        if ( $type == "ia" )
        {
            return $action_name."IAction";
        }
        if ( $type == "ua" )
        {
            return $action_name."UAction";
        }
        if ( $type == "aa" )
        {
            return $action_name."AAction";
        }
        if ( $type == "wa" )
        {
            return $action_name."WAction";
        }
    }

    public static function importPlugin( )
    {
        self::loadlib( "option" );
        $active_plugins = XOption::get( "active_plugins" );
        if ( $active_plugins && is_array( $active_plugins ) )
        {
            foreach ( $active_plugins as $plugin )
            {
                if ( TRUE === XValid::isplugin( $plugin ) )
                {
                    include_once( BASE_ROOT.self::$source_path['plugin'].$plugin."/".$plugin.".php" );
                }
            }
        }
    }

    public static function __run( )
    {
        self::$urlpath = PATH_URL;
        self::_dbconnect( );
        self::loadutil( "rabbit" );
        XRabbit::__init( );
        self::loadlib( "init" );
        XInit::__loading( );
        self::_runview( );
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
