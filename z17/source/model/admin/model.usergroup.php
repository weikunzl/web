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
class usergroupAModel extends X
{

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_group".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT * FROM ".DB_PREFIX."user_group".$where." ORDER BY orders ASC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        foreach ( $array as $key => $value )
        {
            $array[$key]['commer'] = XHandle::dounserialize( $value['commersetting'] );
        }
        return array(
            $total,
            $array
        );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "user_group WHERE groupid='".$id."'" );
        $data = parent::$obj->fetch_first( $sql );
        if ( !empty( $data ) )
        {
            $extends_array = array(
                "commersetting" => $data['commersetting'],
                "msgsetting" => $data['msgsetting'],
                "viewsetting" => $data['viewsetting'],
                "photosetting" => $data['photosetting'],
                "friendsetting" => $data['friendsetting'],
                "publishsetting" => $data['publishsetting'],
                "feesetting" => $data['feesetting']
            );
            $extends_data = $this->executeSerialize( $extends_array );
            $data['commer'] = $extends_data['commer'];
            if ( empty( $extends_data['commer'] ) )
            {
                $data['commer_num'] = 0;
            }
            else
            {
                $data['commer_num'] = count( $extends_data['commer'] );
            }
            $data['msg'] = $extends_data['msg'];
            $data['view'] = $extends_data['view'];
            $data['photo'] = $extends_data['photo'];
            $data['friend'] = $extends_data['friend'];
            $data['publish'] = $extends_data['publish'];
            $data['fee'] = $extends_data['fee'];
            unset( $data['msgsetting'] );
            unset( $data['viewsetting'] );
            unset( $data['photosetting'] );
            unset( $data['friendsetting'] );
            unset( $data['publishsetting'] );
            unset( $data['feesetting'] );
            return $data;
        }
        $data['commer'] = NULL;
        $data['commer_num'] = 0;
        return $data;
    }

    public function doAdd( $array )
    {
        $groupid = parent::$obj->fetch_newid( "SELECT MAX(groupid) FROM ".DB_PREFIX."user_group", 1 );
        $array = array_merge( array( "groupid" => $groupid ), $array );
        return parent::$obj->insert( DB_PREFIX."user_group", $array );
    }

    public function doEdit( $id, $array )
    {
        return parent::$obj->update( DB_PREFIX."user_group", $array, "groupid='".$id."'" );
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "user_group WHERE groupid='".$id."'" );
        return parent::$obj->query( $sql );
    }

    public function getOptions( $inid )
    {
        $temps = "";
        $sql = "SELECT groupid,groupname FROM ".DB_PREFIX."user_group ORDER BY `orders` ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $temps .= "<option value='".$value['groupid']."'";
            if ( intval( $inid ) == $value['groupid'] )
            {
                $temps .= " selected";
            }
            $temps .= ">".$value['groupname']."</option>";
        }
        return $temps;
    }

    public function getVipGroupList( )
    {
        $sql = "SELECT groupid, groupname, commersetting FROM ".DB_PREFIX."user_group WHERE `issystem`='0' ORDER BY `orders` ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $data[$key]['commer'] = XHandle::dounserialize( $value['commersetting'] );
        }
        return $data;
    }

    public function getAllList( )
    {
        $sql = "SELECT groupid, groupname FROM ".DB_PREFIX."user_group ORDER BY `orders` ASC";
        return parent::$obj->getall( $sql );
    }

    public function executeSerialize( $args = array( ) )
    {
        $commer = $msg = $view = $photo = $friend = $publish = array( );
        $commer = XHandle::dounserialize( $args['commersetting'] );
        if ( !empty( $commer ) && is_array( $commer ) )
        {
            $i = 1;
            foreach ( $commer as $key => $value )
            {
                $commer[$key]['i'] = $i;
                $i += 1;
            }
        }
        $msg = XHandle::dounserialize( $args['msgsetting'] );
        $view = XHandle::dounserialize( $args['viewsetting'] );
        $photo = XHandle::dounserialize( $args['photosetting'] );
        $friend = XHandle::dounserialize( $args['friendsetting'] );
        $publish = XHandle::dounserialize( $args['publishsetting'] );
        $fee = XHandle::dounserialize( $args['feesetting'] );
        unset( $args );
        $array = array(
            "commer" => $commer,
            "msg" => $msg,
            "view" => $view,
            "photo" => $photo,
            "friend" => $friend,
            "publish" => $publish,
            "fee" => $fee
        );
        return $array;
    }

    public function getVolist( )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."user_group ORDER BY orders ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $exetend_array = NULL;
            $exetend_data = NULL;
            $exetend_array = array(
                "commersetting" => $value['commersetting'],
                "msgsetting" => $value['msgsetting'],
                "viewsetting" => $value['viewsetting'],
                "photosetting" => $value['photosetting'],
                "friendsetting" => $value['friendsetting'],
                "publishsetting" => $value['publishsetting'],
                "feesetting" => $value['feesetting']
            );
            $exetend_data = $this->executeSerialize( $exetend_array );
            $data[$key]['commer'] = $exetend_data['commer'];
            $data[$key]['msg'] = $exetend_data['msg'];
            $data[$key]['view'] = $exetend_data['view'];
            $data[$key]['photo'] = $exetend_data['photo'];
            $data[$key]['friend'] = $exetend_data['friend'];
            $data[$key]['publish'] = $exetend_data['publish'];
            $data[$key]['fee'] = $exetend_data['fee'];
            unset( $data[$key]['commersetting'] );
            unset( $data[$key]['msgsetting'] );
            unset( $data[$key]['viewsetting'] );
            unset( $data[$key]['photosetting'] );
            unset( $data[$key]['friendsetting'] );
            unset( $data[$key]['publishsetting'] );
            unset( $data[$key]['feesetting'] );
        }
        return $data;
    }

}

?>
