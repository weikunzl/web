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
        $this->checkAuth( "htmllabel_volist" );
        $searchsql = "";
        $model = parent::model( "htmllabel", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=htmllabel";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "htmllabel" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."htmllabel.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "htmllabel_add" );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."htmllabel.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "htmllabel_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "htmllabel", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "htmllabel" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."htmllabel.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "htmllabel_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "htmllabel", "am" );
        if ( TRUE === $model->doCheckLabel( $args['labelname'] ) )
        {
            XHandle::halt( "对不起，该标签名已存在，请填写另外一个。", "", 1 );
        }
        else
        {
            $result = $model->doAdd( $args );
            if ( TRUE === $result )
            {
                $this->log( "htmllabel_add", "", 1 );
                XHandle::halt( "添加成功", $this->cpfile."?c=htmllabel", 0 );
            }
            else
            {
                $this->log( "htmllabel_add", "", 0 );
                XHandle::halt( "添加失败", "", 1 );
            }
        }
        unset( $model );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "htmllabel_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "htmllabel", "am" );
        $result = $model->doEdit( $id, $args );
        if ( TRUE === $result )
        {
            $this->log( "htmllabel_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=htmllabel&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "htmllabel_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
        unset( $model );
    }

    public function control_del( )
    {
        $this->checkAuth( "htmllabel_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "htmllabel", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            if ( TRUE === $model->doCheckSystemLabel( $id ) )
            {
                XHandle::halt( "对不起，不能删除系统默认的标签。", "", 1 );
            }
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "htmllabel_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=htmllabel", 0 );
        }
        else
        {
            $this->log( "htmllabel_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "htmllabel_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "htmllabel", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "labelname", "description", "flag" ) );
        $content = XRequest::getargs( "content", "", FALSE );
        if ( empty( $args['labelname'] ) )
        {
            XHandle::halt( "标签名不能为空", "", 1 );
        }
        else if ( FALSE === XValid::islabel( $args['labelname'] ) )
        {
            XHandle::halt( "标签名格式不正确", "", 1 );
        }
        $args['flag'] = intval( $args['flag'] );
        $args = array_merge( $args, array( "content" => $content ) );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $description = XRequest::getargs( "description" );
        $content = XRequest::getargs( "content", "", FALSE );
        $flag = XRequest::getint( "flag" );
        return array(
            $id,
            array(
                "description" => $description,
                "content" => $content,
                "flag" => $flag
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
