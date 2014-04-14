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
        $this->checkAuth( "loveparamter_volist" );
        $searchsql = "";
        $model = parent::model( "loveparamter", "am" );
        list( $total, $data ) = $model->getList( );
        unset( $model );
        $var_array = array(
            "total" => $total,
            "loveparamter" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."loveparamter.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "loveparamter_add" );
        TPL::display( $this->cptpl."loveparamter.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "loveparamter_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "loveparamter", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "loveparamter" => $data,
                "id" => $id
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."loveparamter.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "loveparamter_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "loveparamter", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "loveparamter_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=loveparamter", 0 );
        }
        else
        {
            $this->log( "loveparamter_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "loveparamter_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "loveparamter", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "loveparamter_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=loveparamter", 0 );
        }
        else
        {
            $this->log( "loveparamter_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "loveparamter_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "loveparamter", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "loveparamter_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=loveparamter", 0 );
        }
        else
        {
            $this->log( "loveparamter_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "ptname", "ptvalue", "ptdec", "orders", "pttype" ) );
        if ( empty( $args['ptname'] ) )
        {
            XHandle::halt( "参数名不能为空", "", 1 );
        }
        else if ( FALSE === XValid::isspchar( $args['ptname'] ) )
        {
            XHandle::halt( "对不起，参数名格式不正确！", "", 1 );
        }
        else
        {
            $m = parent::model( "loveparamter", "am" );
            if ( TRUE === $m->doCheckName( $args['ptname'] ) )
            {
                XHandle::halt( "对不起，该参数名称已存在！", "", 1 );
            }
            unset( $m );
        }
        if ( empty( $args['ptname'] ) )
        {
            XHandle::halt( "参数名不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "ptvalue", "ptdec", "orders", "pttype" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['ptvalue'] ) )
        {
            XHandle::halt( "参数值不能为空", "", 1 );
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
