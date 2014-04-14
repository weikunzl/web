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
    private $stitle = NULL;
    private $skeyword = NULL;

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
        $this->stitle = XRequest::getgpc( "stitle" );
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->_urlitem = "stitle=".urlencode( $this->stitle )."&skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "mail_content" );
        $searchsql = "";
        if ( !empty( $this->stitle ) )
        {
            $searchsql .= " AND lower(subject) LIKE '%".$this->stitle."%'";
        }
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND lower(content) LIKE '%".$this->skeyword."%'";
        }
        $model = parent::model( "mailcontent", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=mailcontent&".$this->_urlitem;
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
            "skeyword" => $this->skeyword,
            "mailcontent" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."mailcontent.tpl" );
    }

    public function control_view( )
    {
        $this->checkAuth( "mail_content" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $this->_getItems( );
        $model = parent::model( "mailcontent", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "mailcontent" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."mailcontent.tpl" );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "mail_content" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "mailcontent", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mail_content", "del id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=mailcontent", 0 );
        }
        else
        {
            $this->log( "mail_content", "del id=".$array_id."", 0 );
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
