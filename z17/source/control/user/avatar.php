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
class control extends userbase
{

    public function control_run( )
    {
        $var_array = array(
            "page_title" => $this->getTitle( "setavatar" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."avatar.tpl" );
    }

    public function control_setavatar( )
    {
        $service = parent::service( "passport", "is" );
        $url = $service->validGetAvatar( );
        unset( $service );
        $var_array = array(
            "page_title" => $this->getTitle( "setavatar" ),
            "imgurl" => $url,
            "userid" => parent::$wrap_user['userid']
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."avatar.tpl" );
    }

    public function control_saveupload( )
    {
        $service = parent::service( "passport", "is" );
        $uploadpart = $service->validUpload( );
        unset( $service );
        $model_upload = parent::model( "upload", "am" );
        $data = $model_upload->doSaveUpload( $uploadpart, "temp", "", parent::$wrap_user['userid'] );
        if ( is_array( $data ) )
        {
            $code = parent::import( "code", "util" );
            $url = $code->authCode( $data['source'], "ENCODE", OESOFT_RANDKEY, 0 );
            unset( $code );
            XHandle::redirect( $this->ucfile."?c=avatar&a=setavatar&url=".urlencode( $url ) );
        }
        else
        {
            $model_upload->noteError( $data );
        }
        unset( $model_upload );
    }

    public function control_saveavatar( )
    {
        parent::loadfunc( "avatar", "util" );
        list( $userid, $info ) = avatar_saving( parent::$wrap_user['userid'] );
        if ( 0 < $userid && TRUE === $info['status'] )
        {
            $model = parent::model( "album", "am" );
            $model->doSetAvatar( $userid, $info['avatar'], "user" );
            unset( $model );
        }
        parent::loadutil( "file" );
        XFile::deldir( BASE_ROOT."./data/attachment/temp/".$userid );
        $s = new avatarStatusClass( );
        $s->data->urls[0] = $info['avatar'];
        $s->status = 1;
        $s->statusText = "设置成功";
        echo json_encode( $s );
    }

    public function control_del( )
    {
        $model = parent::model( "avatar", "um" );
        $result = $model->doDelAvatar( $this->u['avatar'] );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=avatar", 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
