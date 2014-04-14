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

    private function _new( )
    {
        $this->service = parent::service( "visit", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    public function control_run( )
    {
        $this->checkLogin( );
        $searchsql = "";
        $model = parent::model( "visit", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        unset( $model );
        $url = $this->wapfile."?c=cp_visit";
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
            "visit" => $data,
            "page_title" => "我看过谁"
        );
        $this->_tplfile = $this->getTPLFile( "cp_visit" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_visitme( )
    {
        $this->checkLogin( );
        if ( intval( $this->login_groupwrap['view']['viewvisitor'] ) == 0 )
        {
            XHandle::wapHalt( "对不起，您所在的会员组没有权限查看", "", 1 );
        }
        $searchsql = "";
        $model = parent::model( "visitme", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        unset( $model );
        if ( !empty( $data ) )
        {
            $url = $this->wapfile."?c=cp_visit&a=visitme";
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
            "visitme" => $data,
            "page_title" => "谁看过我"
        );
        $this->_tplfile = $this->getTPLFile( "cp_visitme" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

}

?>
