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
    private $s_uid = 0;
    private $s_username = NULL;
    private $s_sex = 0;
    private $s_sage = 0;
    private $s_eage = 0;
    private $s_dist1 = 0;
    private $s_sheight = 0;
    private $s_eheight = 0;
    private $s_ssalary = 0;
    private $s_esalary = 0;
    private $s_sedu = 0;
    private $s_eedu = 0;
    private $s_marry = 0;
    private $s_havechild = 0;
    private $s_house = 0;
    private $s_car = 0;
    private $s_avatar = 0;
    private $_urlitem = NULL;
    private $indexs_sql = NULL;

    private function _new( )
    {
        $this->service = parent::service( "user", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    private function _getListItems( )
    {
        $this->_new( );
        $this->s_uid = $this->service->validUid( );
        $this->s_username = $this->service->validUserName( );
        list( $this->indexs_sql,$args ) = $this->service->validSearch( );
        if ( is_array( $args ) )
        {
            $this->s_sex = intval( $args['s_sex'] );
            $this->s_sage = intval( $args['s_sage'] );
            $this->s_eage = intval( $args['s_eage'] );
            $this->s_dist1 = intval( $args['s_dist1'] );
            $this->s_sheight = intval( $args['s_sheight'] );
            $this->s_eheight = intval( $args['s_eheight'] );
            $this->s_ssalary = intval( $args['s_ssalary'] );
            $this->s_esalary = intval( $args['s_esalary'] );
            $this->s_sedu = intval( $args['s_sedu'] );
            $this->s_eedu = intval( $args['s_eedu'] );
            $this->s_marry = intval( $args['s_marry'] );
            $this->s_havechild = intval( $args['s_havechild'] );
            $this->s_house = intval( $args['s_house'] );
            $this->s_car = intval( $args['s_car'] );
            $this->s_avatar = intval( $args['s_avatar'] );
        }
        if ( 0 < $this->s_sex )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_sex=".$this->s_sex : "s_sex=".$this->s_sex;
        }
        if ( 0 < $this->s_sage && 0 < $this->s_eage )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_sage=".$this->s_sage."&s_eage=".$this->s_eage : "s_sage=".$this->s_sage."&s_eage=".$this->s_eage;
        }
        if ( 0 < $this->s_dist1 )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_dist1=".$this->s_dist1 : "s_dist1=".$this->s_dist1;
        }
        if ( 0 < $this->s_sheight && 0 < $this->s_eheight )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_sheight=".$this->s_sheight."&s_eheight=".$this->s_eheight : "s_sheight=".$this->s_sheight."&s_eheight=".$this->s_eheight;
        }
        if ( 0 < $this->s_ssalary && 0 < $this->s_esalary )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_ssalary=".$this->s_ssalary."&s_esalary=".$this->s_esalary : "s_ssalary=".$this->s_ssalary."&s_esalary=".$this->s_esalary;
        }
        if ( 0 < $this->s_sedu && 0 < $this->s_eedu )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_sedu=".$this->s_sedu."&s_eedu=".$this->s_eedu : "s_sedu=".$this->s_sedu."&s_eedu=".$this->s_eedu;
        }
        if ( 0 < $this->s_marry )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_marry=".$this->s_marry : "s_marry=".$this->s_marry;
        }
        if ( 0 < $this->s_havechild )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_havechild=".$this->s_havechild : "s_havechild=".$this->s_havechild;
        }
        if ( 0 < $this->s_house )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_house=".$this->s_house : "s_house=".$this->s_house;
        }
        if ( 0 < $this->s_car )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_car=".$this->s_car : "s_car=".$this->s_car;
        }
        if ( 0 < $this->s_avatar )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_avatar=".$this->s_avatar : "s_avatar=".$this->s_avatar;
        }
        if ( 0 < $this->s_uid )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_uid=".$this->s_uid : "s_uid=".$this->s_uid;
        }
        if ( TRUE === XValid::isuserargs( $this->s_username ) )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_username=".( $this->s_username ) : "s_username=".( $this->s_username );
        }
        if ( 0 < parent::$cfg['usermaxpage'] )
        {
            $this->page = parent::$cfg['usermaxpage'] < $this->page ? intval( parent::$cfg['usermaxpage'] ) : $this->page;
        }
        $this->pagesize = intval( parent::$cfg['userpagesize'] / 2 );
        $this->_unset( );
    }

    public function control_run( )
    {
    }

    public function control_list( )
    {
        $this->_tplfile = $this->getTPLFile( "user_list" );
        $this->_getListItems( );
        $searchsql = $this->indexs_sql;
        $orderby = " ORDER BY v.userid DESC";
        $model = parent::model( "user", "im" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => "",
            "orderby" => $orderby,
            "countwhere" => $searchsql
        ) );
        $url = parent::$urlpath."wap.php?c=user&a=list";
        if ( !empty( $this->_urlitem ) )
        {
            $url .= "&".$this->_urlitem;
        }
        $showpage = XPage::index( $total, $this->pagesize, $this->page, $url, 5, intval( parent::$cfg['usermaxpage'] ) );
        if ( 0 < $this->s_dist1 )
        {
            parent::loadlib( "mod" );
            $this->getMeta( "ch_user_search_result" );
            $areaname = XMod::getareaname( $this->s_dist1 );
        }
        else
        {
            $this->getMeta( "ch_user_list" );
        }
        $page_title = $this->metawrap['title'];
        $page_keyword = $this->metawrap['keyword'];
        $page_description = $this->metawrap['description'];
        $page_title = str_ireplace( array( "{area}" ), array( $areaname ), $page_title );
        $page_description = str_ireplace( array( "{area}" ), array( $areaname ), $page_description );
        $page_keyword = str_ireplace( array( "{area}" ), array( $areaname ), $page_keyword );
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => $showpage,
            "user" => $data,
            "page_title" => $page_title,
            "page_keyword" => $page_keyword,
            "page_description" => $page_description,
            "urlitem" => $this->_urlitem,
            "s_sex" => $this->s_sex,
            "s_sage" => $this->s_sage,
            "s_eage" => $this->s_eage,
            "s_dist1" => $this->s_dist1,
            "s_sheight" => $this->s_sheight,
            "s_eheight" => $this->s_eheight,
            "s_ssalary" => $this->s_ssalary,
            "s_esalary" => $this->s_esalary,
            "s_sedu" => $this->s_sedu,
            "s_eedu" => $this->s_eedu,
            "s_marry" => $this->s_marry,
            "s_havechild" => $this->s_havechild,
            "s_house" => $this->s_house,
            "s_car" => $this->s_car,
            "s_avatar" => $this->s_avatar,
            "s_uid" => $this->s_uid,
            "s_username" => $this->s_username
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_advsearch( )
    {
        if ( parent::$wrap_user['userid'] == 0 )
        {
            XHandle::redirect( parent::$urlpath."wap.php?c=passport&a=login" );
            exit( );
        }
        if ( intval( $this->login_groupwrap['view']['useadvsearch'] ) != 1 )
        {
            XHandle::wapHalt( "对不起，您所在的会员组没有权限使用高级搜索功能，请升级VIP", "", 1 );
        }
        $this->getMeta( "ch_advsearch" );
        $var_array = array(
            "page_title" => $this->metawrap['title'],
            "page_description" => $this->metawrap['description'],
            "page_keyword" => $this->metawrap['keyword']
        );
        $this->_tplfile = $this->getTPLFile( "user_advsearch" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

}

?>
