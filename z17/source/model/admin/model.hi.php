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
class hiAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."hibox AS v LEFT JOIN ".DB_PREFIX."user AS fu ON v.fromuserid=fu.userid LEFT JOIN ".DB_PREFIX."user AS tu ON v.touserid=tu.userid".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, fu.username AS fromusername, fu.email AS fromemail, fu.gender AS fromgender, fp.ageyear AS fromageyear, fp.provinceid AS fromprovinceid, fp.cityid AS fromcityid, tu.username AS tousername, tu.email AS toemail, tu.gender AS togender, tp.ageyear AS toageyear, tp.provinceid AS toprovinceid, tp.cityid AS tocityid, gt.greeting AS message FROM ".DB_PREFIX."hibox AS v LEFT JOIN ".DB_PREFIX."user AS fu ON v.fromuserid=fu.userid LEFT JOIN ".DB_PREFIX."user_profile AS fp ON v.fromuserid=fp.userid LEFT JOIN ".DB_PREFIX."user AS tu ON v.touserid=tu.userid LEFT JOIN ".DB_PREFIX."user_profile AS tp ON v.touserid=tp.userid LEFT JOIN ".DB_PREFIX."greet AS gt ON v.greetid=gt.greetid".$where." ORDER BY v.hiid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

}

?>
