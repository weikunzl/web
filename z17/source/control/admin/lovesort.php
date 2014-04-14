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

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    public function control_run( )
    {
        $this->checkAuth( "lovesort_volist" );
        $searchsql = "";
        $model = parent::model( "lovesort", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=lang";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "lovesort" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."lovesort.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "lovesort_add" );
        TPL::display( $this->cptpl."lovesort.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "lovesort_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "lovesort", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "lovesort" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."lovesort.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "lovesort_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "lovesort", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "lovesort_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=lovesort", 0 );
        }
        else
        {
            $this->log( "lovesort_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "lovesort_edit" );
        $array = $this->_validEdit( );
        $model = parent::model( "lovesort", "am" );
        if ( !empty( $array ) )
        {
            foreach ( $array as $key => $value )
            {
                $result = $model->doEdit( intval($value['id'] ), array(
                    "sortname" => $value['sortname'],
                    "orders" => intval( $value['orders'] )
                ) );
            }
        }
        if ( TRUE === $result )
        {
            $this->log( "lovesort_edit", "", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=lovesort&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "lovesort_edit", "", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "lovesort_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "lovesort", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "lovesort_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=lovesort", 0 );
        }
        else
        {
            $this->log( "lovesort_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "sortname", "orders" ) );
        if ( empty( $args['sortname'] ) )
        {
            XHandle::halt( "类别名称不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        return $args;
    }

    private function _validEdit( )
    {
        $ids = XRequest::getarray( "id" );
        $this->_validID( $ids );
        $array = array( );
        $ii = 0;
        for ( ; $ii < count( $ids ); ++$ii )
        {
            $id = intval( $ids[$ii] );
            $sortname = XRequest::getargs( "sortname_".$id );
            $orders = XRequest::getargs( "orders_".$id );
            $array[] = array(
                "id" => $id,
                "sortname" => $sortname,
                "orders" => $orders
            );
        }
        return $array;
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
