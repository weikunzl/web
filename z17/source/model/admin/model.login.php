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
class loginAModel extends X
{

    public $cms_url = "http://www.zyiq.cn/";

    public function doLogin( $username, $password )
    {
        $status = 0;
        $md5password = md5( $password );
        $query = "SELECT `adminid`, `adminname`, `password`, `flag` FROM ".DB_PREFIX."admin WHERE lower(adminname)='".strtolower( $username ).( "' AND `password`='".$md5password."'" );
        $data = parent::$obj->fetch_first( $query );
        if ( !empty( $data ) )
        {
            if ( intval( $data['flag'] ) == 0 )
            {
                $status = 1;
                return $status;
            }
            $last_time = time( );
            $array = array( 
	    		"logintimeline" => $last_time, 
	    		"logintimes" => "[[logintimes+1]]", 
			"loginip" => XRequest::getip( ) );
            parent::$obj->update( DB_PREFIX."admin", $array, "adminid=".intval( $data['adminid'] )."" );
            $status = 3;
            $sid = "";
            $sid .= $data['adminid']."\\t";
            $sid .= $data['adminname']."\\t";
            $sid .= $data['password']."\\t";
            $sid .= $last_time;
            $code = parent::import( "code", "util" );
            $sid = $code->authCode( $sid, "ENCODE", OESOFT_RANDKEY );
            unset( $code );
            parent::loadutil( "cookie" );
            XCookie::set( "app_admininfo", $sid );
            $m_count = parent::model( "count", "im" );
            $m_arr = array( "user" => 1, "maleuser" => 1, "femaleuser" => 1, "onlineuser" => 1, "diary" => 1, "weibo" => 1, "message" => 1 );
            $m_count->updateStatistics( $m_arr );
            unset( $m_count );
            unset( $m_arr );
            return $status;
        }
        $status = 2;
        return $status;
    }

    public function loginLog( )
    {
        $m_serial = parent::model( "serial", "am" );
        $m_serial->tjSerial( );
        unset( $m_serial );
    }

    public function checkLogin( )
    {
        $status = FALSE;
        parent::loadutil( "cookie" );
        $sid = XCookie::get( "app_admininfo" );
        $code = parent::import( "code", "util" );
        $sid = $code->authCode( $sid, "DECODE", OESOFT_RANDKEY );
        unset( $code );
        if ( empty( $sid ) )
        {
            $status = FALSE;
            return $status;
        }
        $adminInfo = explode( "\\t", $sid );
        $adminData = $this->_getUser( intval($adminInfo[0] ) );
        if ( empty( $adminData ) )
        {
            $status = FALSE;
            return $status;
        }
        if ( $adminData['adminname'] != $adminInfo[1] || $adminData['password'] != $adminInfo[2] )
        {
            $status = FALSE;
            return $status;
        }
        parent::$wrap_admin = array(
            "super" => intval( $adminData['super'] ),
            "adminid" => intval( $adminData['adminid'] ),
            "adminname" => $adminData['adminname'],
            "lasttime" => $adminData['logintimeline'],
            "groupname" => $adminData['groupname'],
            "auths" => $adminData['auths']
        );
        $status = TRUE;
        return $status;
    }

    public function logout( )
    {
        parent::loadutil( "cookie" );
        XCookie::del( "app_admininfo" );
        parent::$wrap_admin['super'] = NULL;
        parent::$wrap_admin['adminid'] = NULL;
        parent::$wrap_admin['adminname'] = NULL;
        parent::$wrap_admin['groupname'] = NULL;
        parent::$wrap_admin['auths'] = NULL;
        parent::$wrap_admin['lasttime'] = NULL;
    }

    private function _getUser( $uid )
    {
        $sql = "SELECT v.*, g.groupname, g.auths FROM ".DB_PREFIX."admin AS v LEFT JOIN ".DB_PREFIX."authgroup AS g ON v.groupid=g.groupid WHERE v.adminid='".intval( $uid )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function checkAuth( $auth )
    {
        if ( empty( parent::$wrap_admin['adminname'] ) )
        {
            XHandle::halt( "对不起，您没有权限执行该操作1！", "", 1 );
        }
        else if ( !( intval( parent::$wrap_admin['super'] ) == 1 ) )
        {
            if ( empty(  parent::$wrap_admin['auths'] ) )
            {
                XHandle::halt( "对不起，您没有权限执行该操作2！", "", 1 );
            }
            else if ( FALSE === XHandle::foundinchar( parent::$wrap_admin['auths'], $auth, "," ) )
            {
                XHandle::halt( "对不起，您没有权限执行该操作！<br />操作权限为：[".$auth."]", "", 1 );
            }
        }
    }

    public function copyRight( )
    {
        echo "<div align='center'><p style='font-size:10px; font-family:Arial, Helvetica, sans-serif; line-height:120%;color:#999999'>Powered by <a href='".$this->cms_url."' target=_blank>".OESOFT_SOFTNAME."</a> &copy;2012-2099 ZYQ Inc.</p></div>";
    }

}

?>
