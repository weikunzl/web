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
class accountUModel extends X
{

    public function doEditPassword( $password )
    {
        $md5password = md5( $password );
        $array = array( "`password`" => $md5password );
        $result = parent::$wrap_user( DB_PREFIX."user", $array, "userid='".intval( parent::$wrap_user['userid'] )."'" );
        if ( TRUE === $result )
        {
            $cookies_array = array(
                "userid" => parent::$wrap_user['userid'],
                "username" => parent::$wrap_user['username'],
                "password" => $md5password,
                "lasttime" => time( ) 
            );
            parent::loadutil( "cookie" );
            XCookie::del( "app_userinfo" );
            $um = parent::model( "passport", "im" );
            $um->_setCookies( $cookies_array );
            unset( $um );
        }
        return $result;
    }

    public function doMatchOldPassword( $password )
    {
        $sql = "SELECT `password` FROM ".DB_PREFIX."user WHERE userid='".parent::$wrap_user['userid']."'";
        $data = parent::$obj->fetch_first( $sql );
        if ( !empty( $data['password'] ) )
        {
            if ( md5( $password ) == $data['password'] )
            {
                return TRUE;
            }
            return FALSE;
        }
        return FALSE;
    }

    public function doEditRecall( $recall )
    {
        return parent::$obj->update( DB_PREFIX."user_attr", array(
            "recall" => $recall
        ), "userid='".parent::$wrap_user['userid']."'" );
    }

    public function doEditLoveStatus( $lovestatus )
    {
        return parent::$obj->update( DB_PREFIX."user_status", array(
            "lovestatus" => $lovestatus
        ), "userid='".parent::$wrap_user['userid']."'" );
    }

}

?>
