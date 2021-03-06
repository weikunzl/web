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
class control extends wapbase
{

    private $service = NULL;
    private $_tplfile = NULL;
    private $album_nums = 0;
    private $album_cans = 0;

    private function _new( )
    {
        $this->service = parent::service( "cp", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    private function _checkUpload( )
    {
        $res = TRUE;
        $m_album = parent::model( "album", "um" );
        $this->album_nums = $m_album->getAlbumCount( parent::$wrap_user['userid'] );
        unset( $m_album );
        if ( intval( $this->login_groupwrap['photo']['photolimit'] ) == 1 )
        {
            if ( intval( $this->login_groupwrap['photo']['photonum'] ) <= $this->album_nums )
            {
                $res = FALSE;
                return $res;
            }
            $this->album_cans = intval( $this->login_groupwrap['photo']['photonum'] ) - $this->album_nums;
        }
        return $res;
    }

    public function control_run( )
    {
        $this->checkLogin( );
        $this->_checkUpload( );
        $searchsql = "";
        $model = parent::model( "album", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        unset( $model );
        $url = $this->wapfile."?c=cp_photo";
        if ( !empty( $data ) )
        {
            $showpage = XPage::index( $datacount, $this->pagesize, $this->page, $url, 5, 10000 );
        }
        else
        {
            $showpage = "";
        }
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => $showpage,
            "album" => $data,
            "cannums" => $this->album_cans,
            "page_title" => "我的相册-会员中心"
        );
        $this->_tplfile = $this->getTPLFile( "cp_photo" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_upload( )
    {
        $this->checkLogin( );
        if ( FALSE === $this->_checkUpload( ) )
        {
            XHandle::wapHalt( "对不起，您所在的会员组照片已达到允许上传数量。", "", 1 );
        }
        $var_array = array(
            "total" => $this->album_nums,
            "cannums" => $this->album_cans,
            "page_title" => "上传照片-会员中心"
        );
        $this->_tplfile = $this->getTPLFile( "cp_photo" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_saveupload( )
    {
        $this->checkLogin( );
        if ( FALSE === $this->_checkUpload( ) )
        {
            XHandle::wapHalt( "对不起，您所在的会员组照片已达到允许上传数量。", "", 1 );
        }
        $this->_new( );
        list( $title, $uploadpart ) = $this->service->validUpload( );
        $this->_unset( );
        $model_upload = parent::model( "upload", "am" );
        $data = $model_upload->doSaveUpload( $uploadpart, "album", "thumbfiles", parent::$wrap_user['userid'] );
        if ( is_array( $data ) )
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
                XHandle::wapHalt( "上传成功", $this->wapfile."?c=cp_photo", 0 );
            }
            else
            {
                XHandle::wapHalt( "上传失败", "", 1 );
            }
        }
        else
        {
            XHandle::wapHalt( "上传失败", "", 1 );
        }
        unset( $model_upload );
    }

    public function control_del( )
    {
        $this->checkLogin( );
        $this->_new( );
        $id = $this->service->validID( );
        $this->_unset( );
        $model = parent::model( "album", "um" );
        $result = $model->doDel( $id );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::wapHalt( "删除成功", $this->wapfile."?c=cp_photo", 0 );
        }
        else
        {
            XHandle::wapHalt( "删除失败", "", 1 );
        }
    }

}

?>
