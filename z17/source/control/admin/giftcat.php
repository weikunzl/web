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
        $this->checkAuth( "giftcat_volist" );
        $searchsql = "";
        $model = parent::model( "giftcat", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=giftcat";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "giftcat" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."giftcat.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "giftcat_add" );
        TPL::display( $this->cptpl."giftcat.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "giftcat_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "giftcat", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "giftcat" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."giftcat.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "giftcat_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "giftcat", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "giftcat_add", "giftcat", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=giftcat", 0 );
        }
        else
        {
            $this->log( "giftcat_add", "giftcat", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "giftcat_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "giftcat", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "giftcat_edit", "giftcat id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=giftcat&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "giftcat_edit", "giftcat id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "giftcat_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "giftcat", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "giftcat_del", "giftcat id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=giftcat", 0 );
        }
        else
        {
            $this->log( "giftcat_del", "giftcat id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "catname", "orders" ) );
        if ( empty( $args['catname'] ) )
        {
            XHandle::halt( "分类名称不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "catname", "orders" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['catname'] ) )
        {
            XHandle::halt( "分类名称不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
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
