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
        $this->checkAuth( "log_volist" );
        $searchsql = "";
        $model = parent::model( "log", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=log";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "log" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."log.tpl" );
    }

    public function control_del( )
    {
        $this->checkAuth( "log_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "log", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "log_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=log", 0 );
        }
        else
        {
            $this->log( "log_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_delall( )
    {
        $this->checkAuth( "log_del" );
        $model = parent::model( "log", "am" );
        $result = $model->doDelAll( );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "log_del", "", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=log", 0 );
        }
        else
        {
            $this->log( "log_del", "", 0 );
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
