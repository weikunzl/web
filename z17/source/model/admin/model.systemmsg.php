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
class systemmsgAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."system_content AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, COUNT(c.msgid) AS msgcount FROM ".DB_PREFIX."system_content AS v LEFT JOIN ".DB_PREFIX."system_msg AS c ON c.contentid=v.contentid".$where." GROUP BY v.contentid ORDER BY v.contentid DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        foreach ( $array as $key => $value )
        {
            $array[$key]['readcount'] = parent::$obj->fetch_count( "SELECT COUNT(msgid) FROM ".DB_PREFIX."system_msg WHERE contentid='".$value['contentid']."' AND readflag='1'" );
        }
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "system_content WHERE contentid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $contentid = parent::$obj->fetch_newid( "SELECT MAX(contentid) FROM ".DB_PREFIX."system_content", 1 );
        $array = array_merge( array( 
		"contentid" => $contentid, 
		"createline" => time( )
	), $array );
        return array(
		$contentid, 
		parent::$obj->insert( DB_PREFIX."system_content", $array )
	);
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."system_content", $array, "contentid='".$id."'" );
    }

    public function doDel( $id )
    {
        $result = parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "system_msg WHERE contentid='".$id."'" ) );
        if ( TRUE === $result )
        {
            parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "system_content WHERE contentid='".$id."'" ) );
        }
        return $result;
    }

    public function doSendMsg( $contentid, $page )
    {
        $data = $this->getData( intval($contentid) );
        if ( !empty( $data ) )
        {
            if ( $data['pagesize'] < 1 )
            {
                $data['pagesize'] = 50;
            }
            $pagesize = $data['pagesize'];
            $sqltemp = trim( $data['sqltemp'] );
            $code = parent::import( "code", "util" );
            $sqltemp = $code->authCode( $sqltemp, "DECODE", OESOFT_RANDKEY, 0 );
            unset( $code );
            $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_params AS v".$sqltemp;
            $total = parent::$obj->fetch_count( $countsql );
            $pagecount = ceil( $total / $pagesize );
            $start = ( $page - 1 ) * $pagesize;
            $sql = "SELECT v.userid FROM ".DB_PREFIX."user_params AS v".$sqltemp.( " ORDER BY v.userid ASC LIMIT ".$start.", {$pagesize}" );
            $user = parent::$obj->getall( $sql );
            foreach ( $user as $key => $value )
            {
                $msgid = parent::$obj->fetch_newid( "SELECT MAX(msgid) FROM ".DB_PREFIX."system_msg", 1 );
                $array = array( 
			"msgid" => $msgid, 
			"contentid" => $contentid, 
			"userid" => intval( $value['userid'] ), 
			"sendtime" => time( ), 
			"readflag" => 0 
		);
                parent::$obj->insert( DB_PREFIX."system_msg", $array );
            }
            return array(
                TRUE,
                $total,
                $pagecount,
                $data['refresh']
            );
        }
        return array( FALSE, "", "", "" );
    }

    public function doSendOffVipMsg( $contentid, $page )
    {
        $data = $this->getData( intval($contentid ) );
        if ( !empty( $data ) )
        {
            if ( $data['pagesize'] < 1 )
            {
                $data['pagesize'] = 50;
            }
            $pagesize = $data['pagesize'];
            $sqltemp = trim( $data['sqltemp'] );
            $code = parent::import( "code", "util" );
            $sqltemp = $code->authCode( $sqltemp, "DECODE", OESOFT_RANDKEY, 0 );
            unset( $code );
            $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_validate AS v".$sqltemp;
            $total = parent::$obj->fetch_count( $countsql );
            $pagecount = ceil( $total / $pagesize );
            $start = ( $page - 1 ) * $pagesize;
            $sql = "SELECT v.userid FROM ".DB_PREFIX."user_validate AS v".$sqltemp.( " ORDER BY v.userid ASC LIMIT ".$start.", {$pagesize}" );
            $user = parent::$obj->getall( $sql );
            foreach ( $user as $key => $value )
            {
                $msgid = parent::$obj->fetch_newid( "SELECT MAX(msgid) FROM ".DB_PREFIX."system_msg", 1 );
                $array = array( 
			"msgid" => $msgid, 
			"contentid" => $contentid, 
			"userid" => intval( $value['userid'] ), 
			"sendtime" => time( ), 
			"readflag" => 0 
		);
                parent::$obj->insert( DB_PREFIX."system_msg", $array );
            }
            return array(
                TRUE,
                $total,
                $pagecount,
                $data['refresh']
            );
        }
        return array( FALSE, "", "", "" );
    }

}

?>
