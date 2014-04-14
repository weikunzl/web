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
        $this->checkAuth( "diarycat_volist" );
        $searchsql = "";
        $model = parent::model( "diarycat", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=diarycat";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "diarycat" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."diarycat.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "diarycat_add" );
        TPL::display( $this->cptpl."diarycat.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "diarycat_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "diarycat", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "diarycat" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."diarycat.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "diarycat_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "diarycat", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "diarycat_add", "diarycat", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=diarycat", 0 );
        }
        else
        {
            $this->log( "diarycat_add", "diarycat", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "diarycat_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "diarycat", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "diarycat_edit", "diarycat id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=diarycat&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "diarycat_edit", "diarycat id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "diarycat_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "diarycat", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "diarycat_del", "diarycat id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=diarycat", 0 );
        }
        else
        {
            $this->log( "diarycat_del", "diarycat id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "diarycat_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "diarycat", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "catname", "orders", "flag", "target", "cssname", "img", "intro", "metakeyword", "metadescription" ) );
        if ( empty( $args['catname'] ) )
        {
            XHandle::halt( "分类名称不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        $args['flag'] = intval( $args['flag'] );
        $args['target'] = intval( $args['target'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "catname", "orders", "flag", "target", "cssname", "img", "intro", "metakeyword", "metadescription" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['catname'] ) )
        {
            XHandle::halt( "分类名称不能为空", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        $args['flag'] = intval( $args['flag'] );
        $args['target'] = intval( $args['target'] );
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
