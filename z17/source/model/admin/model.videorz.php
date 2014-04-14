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
class videorzAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."user_videorz AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, u.username, u.email, u.gender, p.ageyear, p.provinceid, p.cityid FROM ".DB_PREFIX."user_videorz AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid".$where." ORDER BY v.vdid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT v.*, u.username, u.email, u.gender, p.ageyear, p.provinceid, p.cityid, s.emailrz, s.mobilerz, s.avatarrz, s.agerz, s.heightrz, s.idnumberrz, s.videorz, s.marryrz, s.incomerz, s.educationrz, s.houserz, s.carrz, s.star FROM ".DB_PREFIX."user_videorz AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid LEFT JOIN ".DB_PREFIX."user_profile AS p ON v.userid=p.userid LEFT JOIN ".DB_PREFIX."user_status AS s ON v.userid=s.userid".( " WHERE v.vdid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doEdit( $id, $flag, $rzargs )
    {
        $result = FALSE;
        $video_sql = "SELECT `userid` FROM ".DB_PREFIX.( "user_videorz WHERE `vdid`='".$id."'" );
        $rows = parent::$obj->fetch_first( $video_sql );
        if ( !empty( $rows ) )
        {
            $userid = intval( $rows['userid'] );
            $result = parent::$obj->update( DB_PREFIX."user_videorz", array(
                "flag" => $flag
            ), "`vdid`='".$id."'" );
            if ( TRUE === $result )
            {
                parent::$obj->update( DB_PREFIX."user_status", $rzargs, "`userid`='".$rows['userid']."'" );
                parent::loadlib( "user" );
                $star = XUser::updatestar( $rows['userid'] );
                $indexs_array = array(
                    "star" => $star,
                    "rzvideo" => intval( $rzargs['videorz'] )
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
        $sql = "SELECT `vdtype`, `vdurl` FROM ".DB_PREFIX.( "user_videorz WHERE `vdid`='".$id."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) && $rows['vdtype'] == 0 && !empty( $rows['vdurl'] ) && substr( $rows['vdurl'], 0, 15 ) == "data/attachment" )
        {
            parent::loadutil( "file" );
            XFile::delfile( $rows['vdurl'] );
        }
        unset( $rows );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_videorz WHERE `vdid`='".$id."'" ) );
    }

}

?>
