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

    public function control_run( )
    {
        $this->checkAuth( "mailtpl_volist" );
        $searchsql = "";
        $model = parent::model( "mailtpl", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=mailtpl";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "mailtpl" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."mailtpl.tpl" );
    }

    public function control_search( )
    {
        $this->pagesize = 10;
        $this->skeyword = XRequest::getargs( "skeyword" );
        $fromform = XRequest::getargs( "fromform" );
        $inputid = XRequest::getargs( "inputid" );
        $tipsid = XRequest::getargs( "tipsid" );
        $searchsql = " AND tplsort='other'";
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND `subject` LIKE '%".$this->skeyword."%'";
        }
        $model = parent::model( "mailtpl", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=mailtpl&a=search&skeyword=".urlencode( $this->skeyword );
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "skeyword" => $this->skeyword,
            "fromform" => $fromform,
            "inputid" => $inputid,
            "tipsid" => $tipsid,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "mailtpl" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."mailtpl.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "mailtpl_add" );
        TPL::display( $this->cptpl."mailtpl.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "mailtpl_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "mailtpl", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "mailtpl" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."mailtpl.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "mailtpl_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "mailtpl", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mailtpl_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=mailtpl", 0 );
        }
        else
        {
            $this->log( "mailtpl_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "mailtpl_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "mailtpl", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mailtpl_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=mailtpl&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "mailtpl_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "mailtpl_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "mailtpl", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mailtpl_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=mailtpl", 0 );
        }
        else
        {
            $this->log( "mailtpl_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $subject = XRequest::getargs( "subject" );
        $content = XRequest::getargs( "content", "", FALSE );
        if ( empty( $subject ) )
        {
            XHandle::halt( "邮件主题不能为空", "", 1 );
        }
        if ( empty( $content ) )
        {
            XHandle::halt( "邮件内容不能为空", "", 1 );
        }
        return array(
            "subject" => $subject,
            "content" => $content,
            "tplsort" => "other"
        );
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $subject = XRequest::getargs( "subject" );
        $content = XRequest::getargs( "content", "", FALSE );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $content ) )
        {
            XHandle::halt( "邮件内容不能为空", "", 1 );
        }
        return array(
            $id,
            array(
                "subject" => $subject,
                "content" => $content
            )
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
