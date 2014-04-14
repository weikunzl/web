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
class control extends adminbase
{

    private $_comeurl = NULL;
    private $_urlitem = NULL;
    private $sflag = NULL;
    private $stype = NULL;
    private $skeyword = NULL;
    private $fromtype = NULL;

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
        $this->_getItems( );
    }

    private function _getItems( )
    {
        $this->sflag = XRequest::getgpc( "sflag" );
        $this->stype = XRequest::getgpc( "stype" );
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->fromtype = XRequest::getgpc( "fromtype" );
        $this->_urlitem = "sflag=".$this->sflag."&stype=".$this->stype."&skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "album_volist" );
        $searchsql = "";
        if ( $this->sflag == "pass" )
        {
            $searchsql .= " AND v.flag='1'";
        }
        if ( $this->sflag == "lock" )
        {
            $searchsql .= " AND v.flag='0'";
        }
        if ( !empty( $this->skeyword ) )
        {
            if ( $this->stype == "userid" )
            {
                if ( TRUE === XValid::isnumber( $this->skeyword ) )
                {
                    $searchsql .= " AND v.userid='".$this->skeyword."'";
                }
            }
            else if ( $this->stype == "username" )
            {
                if ( XValid::isuserargs( $this->skeyword ) )
                {
                    $searchsql .= " AND u.username LIKE '%".$this->skeyword."%'";
                }
            }
            else if ( $this->stype == "email" )
            {
                if ( TRUE === XValid::isemail( $this->skeyword ) )
                {
                    $searchsql .= " AND u.email LIKE '%".$this->skeyword."%'";
                }
            }
            else if ( $this->stype == "title" )
            {
                $searchsql .= " AND v.title LIKE '%".$this->skeyword."%'";
            }
        }
        $model = parent::model( "album", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=album&".$this->_urlitem;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "urlitem" => $this->_urlitem,
            "comeurl" => $this->_comeurl,
            "sflag" => $this->sflag,
            "stype" => $this->stype,
            "skeyword" => $this->skeyword,
            "album" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."album.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "album_add" );
        $userid = XRequest::getint( "userid" );
        if ( $userid < 1 )
        {
            XHandle::halt( "会员ID丢失", "", 1 );
        }
        $m = parent::model( "user", "am" );
        $user = $m->getData( $userid );
        unset( $m );
        $var_array = array(
            "user" => $user,
            "userid" => $userid,
            "fromtype" => $this->fromtype
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."album.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "album_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "album", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "album" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "fromtype" => $this->fromtype
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."album.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "album_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "album", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "album_add", "", 1 );
            if ( $this->fromtype == "jdbox" )
            {
                XHandle::tbdialog( "添加成功", 1 );
            }
            else
            {
                XHandle::halt( "添加成功", $this->cpfile."?c=album", 0 );
            }
        }
        else
        {
            $this->log( "album_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "album_edit" );
        $this->_getItems( );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "album", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "album_edit", "id=".$id."", 1 );
            if ( $this->fromtype == "jdbox" )
            {
                XHandle::tbdialog( "编辑成功", 1 );
            }
            else
            {
                XHandle::halt( "编辑成功", $this->cpfile."?c=album&".$this->_comeurl."", 0 );
            }
        }
        else
        {
            $this->log( "album_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "album_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "album", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "album_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=album", 0 );
        }
        else
        {
            $this->log( "album_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_suoding( )
    {
        $this->checkAuth( "album_edit" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $args = array( "flag" => 0 );
        $model = parent::model( "album", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doEdit( $id, $args );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "操作成功", $this->cpfile."?c=album&".$this->_comeurl."", 0 );
        }
        else
        {
            XHandle::halt( "操作失败", "", 1 );
        }
    }

    public function control_tongguo( )
    {
        $this->checkAuth( "album_edit" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $args = array( "flag" => 1 );
        $model = parent::model( "album", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doEdit( $id, $args );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "操作成功", $this->cpfile."?c=album&".$this->_comeurl."", 0 );
        }
        else
        {
            XHandle::halt( "操作失败", "", 1 );
        }
    }

    public function control_avatar( )
    {
        $this->checkAuth( "album_setavatar" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "album", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "album" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "fromtype" => $this->fromtype
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."album.tpl" );
        }
    }

    public function control_saveavatar( )
    {
        $this->checkAuth( "album_setavatar" );
        parent::loadfunc( "avatar", "util" );
        list( $userid, $info ) = avatar_saving();
        if ( 0 < $userid && TRUE === $info['status'] )
        {
            $model = parent::model( "album", "am" );
            $model->doSetAvatar( $userid, $info['avatar'] );
            unset( $model );
        }
        $s = new avatarStatusClass( );
        $s->data->urls[0] = $info['avatar'];
        $s->status = 1;
        $s->statusText = "设置成功";
        echo json_encode( $s );
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "userid", "title", "thumbfiles", "uploadfiles", "flag", "auditremark" ) );
        $args['userid'] = intval( $args['userid'] );
        if ( $args['userid'] < 1 )
        {
            XHandle::halt( "会员ID丢失", "", 1 );
        }
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "照片标题不能为空", "", 1 );
        }
        if ( empty( $args['uploadfiles'] ) )
        {
            XHandle::halt( "照片不能为空", "", 1 );
        }
        else if ( !file_exists( BASE_ROOT."./".$args['thumbfiles'] ) )
        {
            $args['thumbfiles'] = $args['uploadfiles'];
        }
        $args['flag'] = intval( $args['flag'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        $args = XRequest::getgpc( array( "userid", "title", "thumbfiles", "uploadfiles", "flag", "auditremark" ) );
        $args['userid'] = intval( $args['userid'] );
        if ( $args['userid'] < 1 )
        {
            XHandle::halt( "会员ID丢失", "", 1 );
        }
        if ( empty( $args['title'] ) )
        {
            XHandle::halt( "照片标题不能为空", "", 1 );
        }
        if ( empty( $args['uploadfiles'] ) )
        {
            XHandle::halt( "照片地址不能为空", "", 1 );
        }
        else if ( !file_exists( BASE_ROOT."./".$args['thumbfiles'] ) )
        {
            $args['thumbfiles'] = $args['uploadfiles'];
        }
        $args['flag'] = intval( $args['flag'] );
        return array(
            $id,
            $args
        );
    }

    private function _validAvatar( )
    {
        $type = XRequest::getargs( "type" );
        $userid = XRequest::getint( "userid" );
        $avatarname = XRequest::getargs( "photoId" );
        $binary = file_get_contents( "php://input" );
        $type = !empty( $type ) ? $type : "big";
        $avatarname = !empty( $avatarname ) ? $avatarname : "avatar";
        if ( $userid < 1 )
        {
            XHandle::halt( "会员ID丢失", "", 1 );
            exit( );
        }
        return array(
            "type" => $type,
            "userid" => $userid,
            "avatarname" => $avatarname,
            "content" => $binary
        );
    }

    private function _validID( $id )
    {
        if ( empty( $id ) )
        {
            XHandle::halt( "ID丢失，请选择要操作的ID", "", 1 );
        }
    }

}

?>
