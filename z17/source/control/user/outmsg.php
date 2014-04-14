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

    private $type = NULL;
    private $_comeurl = NULL;
    private $_urlitem = NULL;

    private function _getItems( )
    {
        $this->type = XRequest::getargs( "type" );
        $this->_urlitem = "type=".$this->type;
        $this->_comeurl = "page=".$this->page."&".$this->_urlitem;
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
        $model = parent::model( "outmsg", "um" );
        list( $datacount, $data ) = $model->getOutList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => $orderby
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=outmsg&type=".$this->type;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "outmsg" => $data,
            "type" => $this->type,
            "urlitem" => $this->_urlitem,
            "page_title" => $this->getTitle( "outmsg_run" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."outmsg.tpl" );
    }

    public function control_view( )
    {
        $this->_getItems( );
        $service = parent::service( "outmsg", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "outmsg", "um" );
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
                "outmsg" => $data,
                "comeurl" => $this->_comeurl,
                "page_title" => $this->getTitle( "outmsg_view" )
            );
            TPL::assign( $var_array );
            TPL::display( $this->uctpl."outmsg.tpl" );
        }
    }

    public function control_del( )
    {
        $this->_getItems( );
        $result = FALSE;
        $service = parent::service( "outmsg", "us" );
        $ids = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "outmsg", "um" );
        $ii = 0;
        for ( ; $ii < count( $ids ); ++$ii )
        {
            $id = intval( $ids[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=outmsg&".$this->_comeurl, 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
