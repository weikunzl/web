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

    private $_comeurl = NULL;
    private $_urlitem = NULL;
    private $type = NULL;

    private function _getItems( )
    {
        $this->type = XRequest::getargs( "type" );
        $this->_comeurl = "page=".$this->page."&type=".$this->type;
    }

    public function control_run( )
    {
        $this->_getItems( );
        if ( $this->type == "unread" )
        {
            $orderby = " ORDER BY v.readflag ASC";
        }
        else if ( $this->type == "read" )
        {
            $orderby = " ORDER BY v.readflag DESC, v.msgid DESC";
        }
        else
        {
            $orderby = " ORDER BY v.msgid DESC";
        }
        $searchsql = "";
        $model = parent::model( "sysmsg", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => $orderby
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=sysmsg&type=".$this->type;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "sysmsg" => $data,
            "type" => $this->type,
            "page_title" => $this->getTitle( "sysmsg_run" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."sysmsg.tpl" );
    }

    public function control_view( )
    {
        $this->_getItems( );
        $service = parent::service( "sysmsg", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "sysmsg", "um" );
        $data = $model->getOneData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，数据不存在或已删除！", "", 1 );
        }
        else
        {
            $var_array = array(
                "id" => $id,
                "sysmsg" => $data,
                "comeurl" => $this->_comeurl,
                "page_title" => $this->getTitle( "sysmsg_view" )
            );
            TPL::assign( $var_array );
            TPL::display( $this->uctpl."sysmsg.tpl" );
        }
    }

    public function control_del( )
    {
        $this->_getItems( );
        $result = FALSE;
        $service = parent::service( "sysmsg", "us" );
        $ids = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "sysmsg", "um" );
        $ii = 0;
        for ( ; $ii < count( $ids ); ++$ii )
        {
            $id = intval( $ids[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=sysmsg&".$this->_comeurl, 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
