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
class XHook extends X
{

    public static function addAction( $system_hook, $plugin_action )
    {
        global $plugin_hooks;
        if ( !@in_array( $plugin_action, @$plugin_hooks[$system_hook] ) )
        {
            $plugin_hooks[$system_hook][] = $plugin_action;
        }
        return TRUE;
    }

    public static function doAction( $hook )
    {
        global $plugin_hooks;
        $args = array_slice( func_get_args( ), 1 );
        if ( isset( $plugin_hooks[$hook] ) )
        {
            foreach ( $plugin_hooks[$hook] as $function )
            {
                $string = call_user_func_array( $function, $args );
            }
        }
    }

}

?>
