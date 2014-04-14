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
        $this->checkAuth( "complaint" );
        $searchsql = "";
        $model = parent::model( "complaint", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=complaint";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "complaint" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."complaint.tpl" );
    }

    public function control_del( )
    {
        $this->checkAuth( "complaint_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "complaint", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "complaint_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=complaint&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "complaint_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_dongjie( )
    {
        $this->checkAuth( "complaint_edit" );
        $uid = XRequest::getint( "uid" );
        if ( $uid < 1 )
        {
            XHandle::halt( "会员ID错误！", "", 1 );
        }
        $model = parent::model( "complaint", "am" );
        $result = $model->doDongJie( $uid );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "complaint_edit", "uid=".$uid."", 1 );
            XHandle::halt( "冻结成功", $this->cpfile."?c=complaint&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "complaint_edit", "uid=".$uid."", 0 );
            XHandle::halt( "冻结失败", "", 1 );
        }
    }

    public function control_cancel( )
    {
        $this->checkAuth( "complaint_edit" );
        $uid = XRequest::getint( "uid" );
        if ( $uid < 1 )
        {
            XHandle::halt( "会员ID错误！", "", 1 );
        }
        $model = parent::model( "complaint", "am" );
        $result = $model->doCancel( $uid );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "complaint_edit", "uid=".$uid."", 1 );
            XHandle::halt( "取消冻结成功", $this->cpfile."?c=complaint&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "complaint_edit", "uid=".$uid."", 0 );
            XHandle::halt( "取消冻结失败", "", 1 );
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
