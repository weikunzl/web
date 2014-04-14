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
class certifyAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(v.certifyid) AS mycount FROM ".DB_PREFIX."user_certify AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username, u.email, u.gender, p.ageyear, p.provinceid, p.cityid FROM ".DB_PREFIX."user_certify AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".$where." ORDER BY v.certifyid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, u.username, u.email, u.gender, p.ageyear, p.provinceid, p.cityid, s.emailrz, s.mobilerz, s.avatarrz, s.agerz, s.heightrz, s.idnumberrz, s.videorz, s.marryrz, s.incomerz, s.educationrz, s.houserz, s.carrz, s.star FROM ".DB_PREFIX."user_certify AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".( " WHERE v.certifyid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $certifyid = parent::$obj->fetch_newid( "SELECT MAX(certifyid) FROM ".DB_PREFIX."user_certify", 1 );
        $array = array_merge( array( "certifyid" => $certifyid, "timeline" => time( ), "deleted" => 0 ), $array );
        return parent::$obj->insert( DB_PREFIX."user_certify", $array );
    }

    public function doEdit( $id, $cerargs, $args )
    {
        $result = FALSE;
        $cert_sql = "SELECT userid FROM ".DB_PREFIX.( "user_certify WHERE certifyid='".$id."'" );
        $rows = parent::$obj->fetch_first( $cert_sql );
        if ( !empty( $rows ) )
        {
            $userid = intval( $rows['userid'] );
            $result = parent::$obj->update( DB_PREFIX."user_certify", $cerargs, "certifyid='".$id."'" );
            if ( TRUE === $result )
            {
                parent::$obj->update( DB_PREFIX."user_status", $args, "userid='".$rows['userid']."'" );
                parent::loadlib( "user" );
                $star = XUser::updatestar( $rows['userid'] );
                $indexs_array = array(
                    "star" => $star,
                    "rzidnumber" => intval( $args['idnumberrz'] )
                );
                $m_indexs = parent::model( "indexs", "am" );
                $m_indexs->updateIndexs( $rows['userid'], $indexs_array );
                unset( $m_indexs );
            }
        }
        unset( $rows );
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "SELECT thumbfiles,uploadfiles FROM ".DB_PREFIX.( "user_certify WHERE certifyid='".$id."'" );
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
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_certify WHERE certifyid='".$id."'" ) );
    }

}

?>
