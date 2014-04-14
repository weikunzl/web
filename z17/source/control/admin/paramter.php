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
    private $stype = NULL;

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
        $this->stype = XRequest::getargs( "stype" );
        $this->_urlitem = "stype=".$this->stype;
        $this->_comeurl = $this->_urlitem."&page=".$this->page;
    }

    public function control_run( )
    {
        $this->checkAuth( "paramter_volist" );
        $searchsql = "";
        if ( in_array( $this->stype, array( "in", "out", "money", "token" ) ) )
        {
            $searchsql .= " AND paramtype='".$this->stype."'";
        }
        $model = parent::model( "paramter", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=paramter&".$this->_urlitem;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "paramter" => $data,
            "stype" => $this->stype,
            "urlitem" => $this->_urlitem,
            "comeurl" => $this->_comeurl
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."paramter.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "paramter_add" );
        TPL::display( $this->cptpl."paramter.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "paramter_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "paramter", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "paramter" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "stype" => $this->stype
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."paramter.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "paramter_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "paramter", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "paramter_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=paramter", 0 );
        }
        else
        {
            $this->log( "paramter_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "paramter_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "paramter", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "paramter_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=paramter&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "paramter_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "paramter_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "paramter", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "paramter_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=paramter", 0 );
        }
        else
        {
            $this->log( "paramter_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "paramtype", "paramvalue", "orders" ) );
        if ( !in_array( $args['paramtype'], array( "in", "out", "money", "token" ) ) )
        {
            XHandle::halt( "请选择参数类型", "", 1 );
        }
        if ( empty( $args['paramvalue'] ) )
        {
            XHandle::halt( "参数值不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "paramtype", "paramvalue", "orders" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( !in_array( $args['paramtype'], array( "in", "out", "money", "token" ) ) )
        {
            XHandle::halt( "请选择参数类型", "", 1 );
        }
        if ( empty( $args['paramvalue'] ) )
        {
            XHandle::halt( "参数值不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        return array( $id, $args );
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
