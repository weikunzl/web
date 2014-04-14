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
class albumUModel extends X
{

    public function getValidAlbumCount( $userid )
    {
        $sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX.( "user_photo WHERE userid='".$userid."' AND flag='1'" );
        return intval( parent::$obj->fetch_count( $sql ) );
    }

    public function getAlbumCount( $userid )
    {
        $sql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX.( "user_photo WHERE userid='".$userid."'" );
        return intval( parent::$obj->fetch_count( $sql ) );
    }

    public function getList( $items )
    {
        $items['orderby'] = empty( $items['orderby'] ) ? " ORDER BY photoid DESC" : $items['orderby'];
        $pagesize = intval( $items['pagesize'] );
        $where = " WHERE userid='".parent::$wrap_user['userid']."' ".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $pagesize;
        $countsql = "SELECT COUNT(*) FROM ".DB_PREFIX."user_photo".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."user_photo".$where.$items['orderby']." LIMIT ".$start.", ".$pagesize."";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        foreach ( $data as $key => $value )
        {
            $data[$key]['i'] = $i;
            $i += 1;
        }
        return array( $total, $data );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "user_photo WHERE photoid='".$id."' AND userid='" ).parent::$wrap_user['userid']."'";
        $data = parent::$obj->fetch_first( $sql );
        if ( !empty( $data ) )
        {
            $data['uploadfiles'] = PATH_URL.$data['uploadfiles'];
            $data['thumbfiles'] = PATH_URL.$data['thumbfiles'];
        }
        return $data;
    }

    public function doAdd( $args = array( ) )
    {
        $args['userid'] = parent::$wrap_user['userid'];
        if ( parent::$cfg['auditphoto'] == 1 )
        {
            $args['flag'] = 0;
        }
        else
        {
            $args['flag'] = 1;
        }
        $photoid = parent::$obj->fetch_newid( "SELECT MAX(photoid) FROM ".DB_PREFIX."user_photo", 1 );
        $args = array_merge( array( "photoid" => $photoid, "timeline" => time( ) ), $args );
        return parent::$obj->insert( DB_PREFIX."user_photo", $args );
    }

    public function doEdit( $id, $args )
    {
        return parent::$obj->update( DB_PREFIX."user_photo", $args, "photoid='".$id."' AND userid='".parent::$wrap_user['userid']."'" );
    }

    public function doDel( $id )
    {
        $sql = "SELECT uploadfiles, thumbfiles FROM ".DB_PREFIX.( "user_photo WHERE photoid='".$id."' AND userid='" ).parent::$wrap_user['userid']."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            parent::loadutil( "file" );
            if ( substr( $rows['uploadfiles'], 0, 15 ) == "data/attachment" )
            {
                XFile::delfile( $rows['uploadfiles'] );
            }
            if ( substr( $rows['thumbfiles'], 0, 15 ) == "data/attachment" )
            {
                XFile::delfile( $rows['thumbfiles'] );
            }
        }
        unset( $rows );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_photo WHERE photoid='".$id."' AND userid='" ).parent::$wrap_user['userid']."'" );
    }

}

?>
