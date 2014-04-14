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
    private $susername = NULL;
    private $sflag = NULL;
    private $scontent = NULL;

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    private function _getItems( )
    {
        $service = parent::service( "weibo", "as" );
        $args = $service->validSearch( );
        $this->susername = $args['susername'];
        $this->sflag = $args['sflag'];
        $this->scontent = $args['scontent'];
        unset( $service );
        $this->_urlitem = "susername=".urlencode( $this->susername )."&sflag=".$this->sflag."&scontent=".urlencode( $this->scontent )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "weibo_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( XValid::isuserargs( $this->susername ) )
        {
            $searchsql .= " AND u.username LIKE '%".$this->susername."%'";
        }
        if ( !empty( $this->scontent ) )
        {
            $searchsql .= " AND v.content LIKE '%".$this->scontent."%'";
        }
        if ( $this->sflag == 1 )
        {
            $searchsql .= " AND v.flag='1'";
        }
        else if ( $this->sflag == 2 )
        {
            $searchsql .= " AND v.flag='0'";
        }
        $model = parent::model( "weibo", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=weibo&".$this->_urlitem;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "urlitem" => $this->_urlitem,
            "comeurl" => $this->_comeurl,
            "susername" => $this->susername,
            "sflag" => $this->sflag,
            "scontent" => $this->scontent,
            "weibo" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."weibo.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "weibo_edit" );
        $service = parent::service( "weibo", "as" );
        $id = $service->validID( );
        unset( $service );
        $this->_getItems( );
        $model = parent::model( "weibo", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "weibo" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."weibo.tpl" );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "weibo_edit" );
        $this->_getItems( );
        $service = parent::service( "weibo", "as" );
        list( $id, $args ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "weibo", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "weibo_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=weibo&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "weibo_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_pass( )
    {
        $this->checkAuth( "weibo_edit" );
        $this->_getItems( );
        $service = parent::service( "weibo", "as" );
        $array_id = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "weibo", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doEdit( $id, array( "flag" => 1 ) );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "weibo_edit", "id=".$array_id."", 1 );
            XHandle::halt( "审核通过", $this->cpfile."?c=weibo&".$this->_comeurl, 0 );
        }
        else
        {
            $this->log( "weibo_edit", "id=".$array_id."", 0 );
            XHandle::halt( "审核失败", "", 1 );
        }
    }

    public function control_lock( )
    {
        $this->checkAuth( "weibo_edit" );
        $this->_getItems( );
        $service = parent::service( "weibo", "as" );
        $array_id = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "weibo", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doEdit( $id, array( "flag" => 0 ) );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "weibo_edit", "id=".$array_id."", 1 );
            XHandle::halt( "锁定成功", $this->cpfile."?c=weibo&".$this->_comeurl, 0 );
        }
        else
        {
            $this->log( "weibo_edit", "id=".$array_id."", 0 );
            XHandle::halt( "锁定失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "weibo_del" );
        $service = parent::service( "weibo", "as" );
        $array_id = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "weibo", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "weibo_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=weibo", 0 );
        }
        else
        {
            $this->log( "weibo_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "weibo_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "weibo", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

}

?>
