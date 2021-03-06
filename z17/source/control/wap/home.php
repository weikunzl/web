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
    private $uid = NULL;
    private $_urlitem = NULL;
    private $type = NULL;

    private function _new( )
    {
        $this->service = parent::service( "home", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    private function _getItems( )
    {
        if ( intval( parent::$cfg['visithomepage'] ) == 1 && parent::$wrap_user['userid'] == 0 )
        {
            XHandle::redirect( $this->wapfile."?c=passport&a=login" );
            exit( );
        }
        $this->_new( );
        $this->uid = $this->service->validUid( );
        $this->_unset( );
        $this->_urlitem = "uid=".$this->uid;
    }

    public function control_run( )
    {
        $this->_getItems( );
        $this->type = XRequest::getargs( "type" );
        parent::loadlib( "mod" );
        $model = parent::model( "home", "im" );
        $home = $model->getOneData( $this->uid );
        if ( empty( $home ) )
        {
            XHandle::wapHalt( "对不起，该会员主页不存在或已禁止！", $this->wapfile, 0 );
        }
        $cond = $model->getCondData( $this->uid );
        $this->getMeta( "ch_home_base" );
        $page_title = $this->metawrap['title'];
        $page_description = $this->metawrap['description'];
        $page_keyword = $this->metawrap['keyword'];
        $meta_gender = $home['gender'] == 1 ? XLang::get( "sex_male" ) : XLang::get( "sex_female" );
        $meta_age = $home['age'].XLang::get( "age" );
        $meta_province = XMod::getareaname( $home['provinceid'] );
        $meta_city = XMod::getareaname( $home['cityid'] );
        $meta_salary = XMod::getloveparamter( "salary", $home['salary'], "text", "" );
        $meta_education = XMod::getloveparamter( "education", $home['education'], "text", "" );
        $meta_marry = XMod::getloveparamter( "marrystatus", $home['marrystatus'], "text", "" );
        $page_title = str_ireplace( array( "{u.userid}", "{u.username}", "{u.gender}", "{u.age}", "{u.province}", "{u.city}", "{u.salary}", "{u.education}", "{u.marry}" ), array( $home['userid'], $home['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_title );
        $page_description = str_ireplace( array( "{u.userid}", "{u.username}", "{u.gender}", "{u.age}", "{u.province}", "{u.city}", "{u.salary}", "{u.education}", "{u.marry}" ), array( $home['userid'], $home['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_description );
        $page_keyword = str_ireplace( array( "{u.userid}", "{u.username}", "{u.gender}", "{u.age}", "{u.province}", "{u.city}", "{u.salary}", "{u.education}", "{u.marry}" ), array( $home['userid'], $home['username'], $meta_gender, $meta_age, $meta_province, $meta_city, $meta_salary, $meta_education, $meta_marry ), $page_keyword );
        $nextid = $model->getNextID( $this->uid );
        $previousid = $model->getPreviousID( $this->uid );
        unset( $model );
        $var_array = array(
            "page_title" => $page_title,
            "page_description" => $page_description,
            "page_keyword" => $page_keyword,
            "home" => $home,
            "cond" => $cond,
            "uid" => $this->uid,
            "nextid" => $nextid,
            "previousid" => $previousid
        );
        $listen_data = NULL;
        if ( 0 < parent::$wrap_user['userid'] )
        {
            $model_listen = parent::model( "listen", "um" );
            $listen_data = $model_listen->getListenInfo( $this->uid, parent::$wrap_user['userid'] );
            unset( $model_listen );
        }
        $var_array['listen'] = $listen_data;
        if ( $this->type == "profile" )
        {
            $this->_tplfile = $this->getTPLFile( "home_profile" );
        }
        else
        {
            $this->_tplfile = $this->getTPLFile( "home_space" );
        }
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_album( )
    {
        $this->_getItems( );
        $model_home = parent::model( "home", "im" );
        $home = $model_home->getOneData( $this->uid );
        if ( empty( $home ) )
        {
            XHandle::wapHalt( "对不起，该会员主页不存在或已禁止！", $this->wapfile, 0 );
        }
        unset( $model_home );
        $searchsql = " AND v.userid='".$this->uid."'";
        $model_album = parent::model( "album", "im" );
        list( $total, $album ) = $model_album->getList( array(
            "page" => $this->page,
            "pagesize" => 5,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        unset( $model_album );
        if ( !empty( $album ) )
        {
            parent::loadlib( "url" );
            $url = $this->wapfile."?c=home&a=album&uid=".$this->uid;
            $showpage = XPage::index( $total, 5, $this->page, $url, 5, 1000 );
        }
        else
        {
            $showpage = NULL;
        }
        $page_title = $home['username']."的相册";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => $showpage,
            "urlitem" => $this->_urlitem,
            "album" => $album,
            "page_title" => $page_title,
            "page_keyword" => $page_keyword,
            "page_description" => $page_description,
            "home" => $home,
            "uid" => $this->uid
        );
        $this->_tplfile = $this->getTPLFile( "home_album" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_album_detail( )
    {
        $this->_getItems( );
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::wapHalt( "ID丢失", "", 1 );
        }
        $model_home = parent::model( "home", "im" );
        $home = $model_home->getOneData( $this->uid );
        if ( empty( $home ) )
        {
            XHandle::wapHalt( "对不起，该会员主页不存在或已禁止！", $this->wapfile, 0 );
        }
        unset( $model_home );
        $model_album = parent::model( "album", "im" );
        $album = $model_album->getOneData( $id );
        if ( empty( $album ) )
        {
            XHandle::wapHalt( "对不起，该相册不存在或已删除！", "", 1 );
        }
        $page_title = $home['username']."的相册";
        $nextid = $model_album->getNextID( $id, $this->uid );
        $previousid = $model_album->getPreviousID( $id, $this->uid );
        unset( $model_album );
        $var_array = array(
            "album" => $album,
            "page_title" => $page_title,
            "home" => $home,
            "uid" => $this->uid,
            "id" => $id,
            "nextid" => $nextid,
            "previousid" => $previousid
        );
        $this->_tplfile = $this->getTPLFile( "home_album_detail" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

}

?>
