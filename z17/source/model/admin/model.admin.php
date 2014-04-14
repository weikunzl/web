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
class adminAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.adminid) FROM ".DB_PREFIX."admin AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*,g.groupname FROM ".DB_PREFIX."admin AS v LEFT JOIN ".DB_PREFIX."authgroup AS g ON v.groupid=g.groupid".$where." ORDER BY v.adminid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."admin WHERE adminid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $array['password'] = md5( $array['password'] );
        $adminid = parent::$obj->fetch_newid( "SELECT MAX(adminid) FROM ".DB_PREFIX."admin", 1 );
        $array = array_merge( array( "adminid" => $adminid, "timeline" => time( ) ), $array );
        return parent::$obj->insert( DB_PREFIX."admin", $array );
    }

    public function doEdit( $id, $array )
    {
        if ( isset( $array['password'], $array['password'] ) )
        {
            $array['password'] = md5( $array['password'] );
        }
        return parent::$obj->update( DB_PREFIX."admin", $array, "adminid=".$id."" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX."admin WHERE adminid='".intval( $id )."'";
        return parent::$obj->query( $sql );
    }

    public function doEditPass( $password )
    {
        $md5password = ( $password );
        $array = array(
            "`password`" => $md5password
        );
        $result = parent::$obj->update( DB_PREFIX."admin", $array, "adminid='".intval( parent::$wrap_admin['adminid'] )."'" );
        if ( TRUE === $result )
        {
            $sid = "";
            $sid .= parent::$wrap_admin['adminid']."\\t";
            $sid .= parent::$wrap_admin['adminname']."\\t";
            $sid .= $md5password."\\t";
            $sid .= parent::$wrap_admin['lasttime'];
            $code = parent::import( "code", "util" );
            $sid = $code->authCode( $sid, "ENCODE", OESOFT_RANDKEY );
            unset( $code );
            parent::loadutil( "cookie" );
            XCookie::del( "app_admininfo" );
            XCookie::set( "app_admininfo", $sid );
        }
        return $result;
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."admin SET flag='1' WHERE adminid='".intval( $id )."'" );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."admin SET flag='0' WHERE adminid='".intval( $id )."'" );
        }
    }

    public function doCheckUserName( $username )
    {
        $sql = "SELECT adminid FROM ".DB_PREFIX."admin WHERE lower(adminname)='".strtolower( $username )."'";
        return parent::$obj->check_data( $sql );
    }

    public function doCheckUid( $id )
    {
        if ( $id == parent::$wrap_admin['adminid'] )
        {
            return TRUE;
        }
        return FALSE;
    }

    public function doCheckPassword( $password )
    {
        $sql = "SELECT `password` FROM ".DB_PREFIX."admin WHERE adminid='".parent::$wrap_admin['adminid']."'";
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

}

?>
