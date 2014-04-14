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
    private $susername = NULL;
    private $semail = NULL;
    private $stitle = NULL;

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
        $this->susername = XRequest::getgpc( "susername" );
        $this->semail = XRequest::getgpc( "semail" );
        $this->stitle = XRequest::getgpc( "stitle" );
        $this->_urlitem = "susername=".urlencode( $this->susername )."&semail=".urlencode( $this->semail )."&stitle=".urlencode( $this->stitle )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "mail_log" );
        $searchsql = "";
        if ( TRUE === XValid::isuserargs( $this->susername ) )
        {
            $searchsql .= " AND u.username LIKE '".$this->susername."%'";
        }
        if ( !empty( $this->stitle ) )
        {
            $searchsql .= " AND c.subject LIKE '".$this->stitle."%'";
        }
        if ( TRUE === XValid::isemail( $this->semail ) )
        {
            $searchsql .= " AND v.email LIKE '".$this->semail."%'";
        }
        $model = parent::model( "maillog", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=maillog&".$this->_urlitem;
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
            "stitle" => $this->stitle,
            "susername" => $this->susername,
            "semail" => $this->semail,
            "maillog" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."maillog.tpl" );
    }

    public function control_del( )
    {
        $this->checkAuth( "mail_log" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "maillog", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mail_log", "del id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=maillog", 0 );
        }
        else
        {
            $this->log( "mail_log", "del id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
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
