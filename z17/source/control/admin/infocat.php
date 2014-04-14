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
        $this->checkAuth( "infocat_volist" );
        $searchsql = "";
        $model = parent::model( "infocat", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=infocat";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "infocat" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."infocat.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "infocat_add" );
        TPL::display( $this->cptpl."infocat.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "infocat_edit" );
        $service = parent::service( "infocat", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "infocat", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "infocat" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."infocat.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "infocat_add" );
        $service = parent::service( "infocat", "as" );
        $args = $service->validAdd( );
        unset( $service );
        $model = parent::model( "infocat", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "infocat_add", "infocat", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=infocat", 0 );
        }
        else
        {
            $this->log( "infocat_add", "infocat", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "infocat_edit" );
        $service = parent::service( "infocat", "as" );
        list( $id, $args ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "infocat", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "infocat_edit", "infocat id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=infocat&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "infocat_edit", "infocat id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "infocat_del" );
        $service = parent::service( "infocat", "as" );
        $array_id = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "infocat", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "infocat_del", "infocat id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=infocat", 0 );
        }
        else
        {
            $this->log( "infocat_del", "infocat id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
