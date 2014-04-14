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

    private $album_nums = 0;
    private $album_cans = 0;

    private function _checkUpload( )
    {
        $res = TRUE;
        $m_album = parent::model( "album", "um" );
        $this->album_nums = $m_album->getAlbumCount( parent::$wrap_user['userid'] );
        unset( $m_album );
        if ( intval( $this->g['photo']['photolimit'] ) == 1 )
        {
            if ( intval( $this->g['photo']['photonum'] ) <= $this->album_nums )
            {
                $res = FALSE;
                return $res;
            }
            $this->album_cans = intval( $this->g['photo']['photonum'] ) - $this->album_nums;
        }
        return $res;
    }

    public function control_run( )
    {
        $this->_checkUpload( );
        $searchsql = "";
        $model = parent::model( "album", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $code = parent::import( "code", "util" );
        foreach ( $data as $key => $value )
        {
            $data[$key]['avatarurl'] = $code->authCode( $value['uploadfiles'], "ENCODE", OESOFT_RANDKEY );
        }
        $url = XRequest::getphpself( );
        $url .= "?c=album";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "album" => $data,
            "page_title" => $this->getTitle( "album_run" ),
            "cannums" => $this->album_cans
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."album.tpl" );
    }

    public function control_upload( )
    {
        if ( $this->g['photo']['photolimit'] == 1 )
        {
            $model = parent::model( "album", "um" );
            $album_counts = $model->getAlbumCount( parent::$wrap_user['userid'] );
            if ( $this->g['photo']['photonum'] <= $album_counts )
            {
                XHandle::halt( "对不起，您所在的会员组照片已达到允许上传数量。", "", 1 );
            }
        }
        $var_array = array(
            "page_title" => $this->getTitle( "album_upload" )
        );
        TPL::assign( $var_array );
        if ( $this->halttype == "jdbox" )
        {
            TPL::display( $this->uctpl."album_jdbox.tpl" );
        }
        else
        {
            TPL::display( $this->uctpl."album.tpl" );
        }
    }

    public function control_edit( )
    {
        $service = parent::service( "album", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "album", "um" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，载入数据错误！", "", 1 );
        }
        else
        {
            $var_array = array(
                "title" => $this->getTitle( "album_edit" ),
                "id" => $id,
                "album" => $data
            );
            TPL::assign( $var_array );
            if ( $this->halttype == "jdbox" )
            {
                TPL::display( $this->uctpl."album_jdbox.tpl" );
            }
            else
            {
                TPL::display( $this->uctpl."album.tpl" );
            }
        }
        unset( $data );
    }

    public function control_saveupload( )
    {
        $service = parent::service( "album", "us" );
        list( $title, $uploadpart ) = $service->validUpload( );
        unset( $service );
        $model_upload = parent::model( "upload", "am" );
        $data = $model_upload->doSaveUpload( $uploadpart, "album", "thumbfiles", parent::$wrap_user['userid'] );
        if ( ( $data ) )
        {
            $args = array(
                "title" => $title,
                "thumbfiles" => $data['thumbfiles'],
                "uploadfiles" => $data['source']
            );
            $model = parent::model( "album", "um" );
            $result = $model->doAdd( $args );
            unset( $model );
            if ( TRUE === $result )
            {
                if ( $this->halttype == "jdbox" )
                {
                    XHandle::jqdialog( "上传成功", 1 );
                }
                else
                {
                    XHandle::halt( "上传成功", $this->ucfile."?c=album", 0 );
                }
            }
        }
        else
        {
            $model_upload->noteError( $data );
        }
        unset( $model_upload );
    }

    public function control_saveedit( )
    {
        $service = parent::service( "album", "us" );
        list( $id, $title ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "album", "um" );
        $result = $model->doEdit( $id, array(
            "title" => $title
        ) );
        unset( $model );
        if ( TRUE === $result )
        {
            if ( $this->halttype == "jdbox" )
            {
                XHandle::jqdialog( "修改成功", 1 );
            }
            else
            {
                XHandle::halt( "修改成功", $this->ucfile."?c=album", 0 );
            }
        }
        else
        {
            XHandle::halt( "修改失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $service = parent::service( "album", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "album", "um" );
        $result = $model->doDel( $id );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=album", 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
