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
class certifyUModel extends X
{

    public function getWaitList( )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."user_certify WHERE flag='0' AND userid='".parent::$wrap_user['userid']."'";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        parent::loadlib( "mod" );
        foreach ( $data as $key => $value )
        {
            $data[$key]['uploadfiles'] = PATH_URL.$value['uploadfiles'];
            $data[$key]['thumbfiles'] = PATH_URL.$value['thumbfiles'];
            $data[$key]['type'] = XMod::getcertifytype( $value['certifytype'] );
            $data[$key]['i'] = $i;
            $i += 1;
        }
        return $data;
    }

    public function doSendMobile( $mobile )
    {
        $checkcode = XHandle::getrndchar( 6, 1 );
        parent::$obj->update( DB_PREFIX."user_status", array(
            "mobilesalt" => $checkcode
        ), "userid='".parent::$wrap_user['userid']."'" );
        $model_am = parent::model( "sms", "am" );
        return $model_am->sendCheckCode( $mobile, $checkcode, array(
            "userid" => parent::$wrap_user['userid']
        ) );
    }

    public function doValidMobile( $mobile, $validkey )
    {
        $result = FALSE;
        $sql = "SELECT userid FROM ".DB_PREFIX.( "user_status WHERE mobilesalt='".$validkey."' AND userid='" ).parent::$wrap_user['userid']."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $status_array = array(
                "mobilerz" => 1,
                "mobilesalt" => XHandle::getrndchar( 6, 1 )
            );
            parent::$obj->update( DB_PREFIX."user_status", $status_array, "userid='".parent::$wrap_user['userid']."'" );
            $attr_array = array(
                "mobile" => $mobile
            );
            parent::$obj->update( DB_PREFIX."user_attr", $attr_array, "userid='".parent::$wrap_user['userid']."'" );
            parent::loadlib( "user" );
            $star = XUser::updatestar( parent::$wrap_user['userid'] );
            $result = TRUE;
            if ( TRUE === $result )
            {
                $m_indexs = parent::model( "indexs", "am" );
                $m_indexs->updateIndexs( parent::$wrap_user['userid'], array(
                    "rzmobile" => 1,
                    "star" => $star
                ) );
                unset( $m_indexs );
            }
        }
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "SELECT uploadfiles, thumbfiles FROM ".DB_PREFIX.( "user_certify WHERE certifyid='".$id."' AND userid='" ).parent::$wrap_user['userid']."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            parent::loadutil( "file" );
            if ( !empty( $rows['thumbfiles'] ) && substr( $rows['thumbfiles'], 0, 15 ) == "data/attachment" )
            {
                XFile::delfile( $rows['thumbfiles'] );
            }
            if ( !empty( $rows['uploadfiles'] ) && substr( $rows['uploadfiles'], 0, 15 ) == "data/attachment" )
            {
                XFile::delfile( $rows['uploadfiles'] );
            }
        }
        unset( $rows );
        return parent::$obj->query( "DELETE FROM ".DB_PREFIX.( "user_certify WHERE certifyid='".$id."' AND userid='" ).parent::$wrap_user['userid']."'" );
    }

    public function checkSameMobile( $mobile )
    {
        $sql = "SELECT mobile FROM ".DB_PREFIX."user_attr WHERE userid='".parent::$wrap_user['userid']."'";
        $rows = parent::$obj->fetch_first( $sql );
        if ( empty( $rows ) )
        {
            if ( $mobile == $rows['mobile'] )
            {
                return TRUE;
            }
            return FALSE;
        }
        return FALSE;
    }

    public function doSendEmail( )
    {
        $model_am = parent::model( "mail", "am" );
        $result = $model_am->sendValid( parent::$wrap_user['userid'] );
        unset( $model_am );
        return $result;
    }

    public function doAdd( $args = array( ) )
    {
        $certifyid = parent::$obj->fetch_newid( "SELECT MAX(certifyid) FROM ".DB_PREFIX."user_certify", 1 );
        $args['certifyid'] = $certifyid;
        $args['userid'] = parent::$wrap_user['userid'];
        $args['timeline'] = time( );
        return parent::$obj->insert( DB_PREFIX."user_certify", $args );
    }

}

?>
