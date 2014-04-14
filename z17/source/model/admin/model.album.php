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
class albumAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.photoid) AS mycount FROM ".DB_PREFIX."user_photo AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username, u.email, u.gender, p.ageyear, p.provinceid, p.cityid FROM ".DB_PREFIX."user_photo AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".$where." ORDER BY v.photoid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, u.username, u.email, u.gender, p.ageyear, p.provinceid, p.cityid FROM ".DB_PREFIX."user_photo AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".( " WHERE v.photoid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $photoid = parent::$obj->fetch_newid( "SELECT MAX(photoid) FROM ".DB_PREFIX."user_photo", 1 );
        $array = array_merge( array( "photoid" => $photoid, "timeline" => time( ), "deleted" => 0 ), $array );
        return parent::$obj->insert( DB_PREFIX."user_photo", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."user_photo", $array, "photoid='".$id."'" );
    }

    public function doDel( $id )
    {
        $sql = "SELECT thumbfiles,uploadfiles FROM ".DB_PREFIX.( "user_photo WHERE photoid='".$id."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( !empty( $rows['thumbfiles'] ) && substr( $rows['thumbfiles'], 0, 15 ) == "data/attachment" )
            {
                parent::loadutil( "file" );
                XFile::delfile( $rows['thumbfiles'] );
            }
            if ( !empty( $rows['uploadfiles'] ) && substr( $rows['uploadfiles'], 0, 15 ) == "data/attachment" )
            {
                parent::loadutil( "file" );
                XFile::delfile( $rows['uploadfiles'] );
            }
        }
        unset( $rows );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_photo WHERE photoid='".$id."'" ) );
    }

    public function doSetAvatar( $userid, $avatar, $type = "admin" )
    {
        $user_sql = "SELECT `avatar` FROM ".DB_PREFIX."user WHERE `userid`='".intval( $userid )."'";
        $rows = parent::$obj->fetch_first( $user_sql );
        if ( !empty( $rows ) )
        {
            parent::loadutil( "file" );
            if ( !empty( $rows['avatar'] ) && $avatar != $rows['avatar'] && substr( $rows['avatar'], 0, 15 ) == "data/attachment" )
            {
                XFile::delfile( $rows['avatar'] );
                $big_avatar = str_replace( ".thumb.jpg", "", $rows['avatar'] );
                XFile::delfile( $big_avatar );
                $small_avatar = str_replace( "big", "small", $big_avatar );
                XFile::delfile( $small_avatar );
            }
        }
        unset( $rows );
        $indexs_avatar = 0;
        if ( $type == "user" )
        {
            if ( intval( parent::$cfg['auditavatar'] ) == 1 )
            {
                $array = array(
                    "avatar" => $avatar,
                    "avatarflag" => 0
                );
                $avatar_ok = 0;
                $indexs_avatar = 2;
            }
            else
            {
                $array = array(
                    "avatar" => $avatar,
                    "avatarflag" => 1
                );
                $avatar_ok = 1;
                $indexs_avatar = 1;
            }
        }
        else
        {
            $array = array(
                "avatar" => $avatar,
                "avatarflag" => 1
            );
            $avatar_ok = 1;
            $indexs_avatar = 1;
        }
        parent::$obj->update( DB_PREFIX."user", $array, "userid='".intval( $userid )."'" );
        $result = TRUE;
        $m_indexs = parent::model( "indexs", "am" );
        $m_indexs->updateIndexs( $userid, array(
            "avatar" => $indexs_avatar
        ) );
        unset( $m_indexs );
        return $result;
    }

}

?>
