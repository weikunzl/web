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
    private $s_sex = 0;
    private $s_sage = 0;
    private $s_eage = 0;
    private $s_dist1 = 0;
    private $s_dist2 = 0;
    private $s_dist3 = 0;
    private $s_avatar = 0;
    private $_urlitem = NULL;
    private $indexs_sql = NULL;

    private function _new( )
    {
        $this->service = parent::service( "online", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    private function _getListItems( )
    {
        $this->_new( );
        list($this->indexs_sql,$args) = $this->service->validOnline( );
        if ( is_array( $args ) )
        {
            $this->s_sex = intval( $args['s_sex'] );
            $this->s_sage = intval( $args['s_sage'] );
            $this->s_eage = intval( $args['s_eage'] );
            $this->s_dist1 = intval( $args['s_dist1'] );
            $this->s_dist2 = intval( $args['s_dist2'] );
            $this->s_dist3 = intval( $args['s_dist3'] );
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
        if ( 0 < $this->s_dist2 )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_dist2=".$this->s_dist2 : "s_dist2=".$this->s_dist2;
        }
        if ( 0 < $this->s_dist3 )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_dist3=".$this->s_dist3 : "s_dist3=".$this->s_dist3;
        }
        if ( 0 < $this->s_avatar )
        {
            $this->_urlitem .= !empty( $this->_urlitem ) ? "&s_avatar=".$this->s_avatar : "s_avatar=".$this->s_avatar;
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
        if ( parent::$wrap_user['userid'] == 0 )
        {
            XHandle::redirect( $this->wapfile."?c=passport&a=login" );
        }
        else if ( ( $this->login_groupwrap['view']['viewonlineuser'] ) != 1 )
        {
            XHandle::wapHalt( "对不起，您所在的会员组没有权限使用访问该页面，请升级VIP", "", 1 );
        }
        $this->_getListItems( );
        $searchsql = $this->indexs_sql;
        $orderby = " ORDER BY v.userid DESC";
        $model = parent::model( "online", "im" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => "",
            "orderby" => $orderby,
            "countwhere" => $searchsql
        ) );
        $url = $this->wapfile."?c=online&a=list";
        if ( !empty( $this->_urlitem ) )
        {
            $url .= "&".$this->_urlitem;
        }
        $showpage = XPage::index( $total, $this->pagesize, $this->page, $url, 5, intval( parent::$cfg['usermaxpage'] ) );
        $this->getMeta( "ch_online_list" );
        $page_title = $this->metawrap['title'];
        $page_keyword = $this->metawrap['keyword'];
        $page_description = $this->metawrap['description'];
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => $showpage,
            "online" => $data,
            "page_title" => $page_title,
            "page_keyword" => $page_keyword,
            "page_description" => $page_description,
            "urlitem" => $this->_urlitem,
            "s_sex" => $this->s_sex,
            "s_dist1" => $this->s_dist1,
            "s_dist2" => $this->s_dist2,
            "s_dist3" => $this->s_dist3,
            "s_avatar" => $this->s_avatar
        );
        unset( $model );
        TPL::assign( $var_array );
        $this->_tplfile = $this->getTPLFile( "user_online" );
        TPL::display( $this->_tplfile );
    }

}

?>
