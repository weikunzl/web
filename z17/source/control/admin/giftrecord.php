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
    private $skeyword = NULL;

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    private function _getItems( )
    {
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->_urlitem = "skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "giftrecord_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND `message` LIKE '%".$this->skeyword."%'";
        }
        $model = parent::model( "giftrecord", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=giftrecord&".$this->_urlitem;
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
            "skeyword" => $this->skeyword,
            "giftrecord" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."giftrecord.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "giftrecord_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $this->_getItems( );
        $model = parent::model( "giftrecord", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "giftrecord" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."giftrecord.tpl" );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "giftrecord_edit" );
        $this->_getItems( );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "giftrecord", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "giftrecord_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=giftrecord&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "giftrecord_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "giftrecord_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "giftrecord", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "giftrecord_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=giftrecord", 0 );
        }
        else
        {
            $this->log( "giftrecord_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "message" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        return array(
            $id,
            $args
        );
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
