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
    private $scatid = NULL;
    private $stitle = NULL;

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
        $this->scatid = XRequest::getint( "scatid" );
        $this->stitle = XRequest::getgpc( "stitle" );
        $this->_urlitem = "scatid=".$this->scatid."&stitle=".urlencode( $this->stitle )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "info_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( 0 < $this->scatid )
        {
            $searchsql .= " AND v.catid='".$this->scatid."'";
        }
        if ( !empty( $this->stitle ) )
        {
            $searchsql .= " AND v.title LIKE '%".$this->stitle."%'";
        }
        $model = parent::model( "info", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=info&".$this->_urlitem;
        parent::loadlib( "mod" );
        $category_select = XMod::selectinfocategory( $this->scatid, "scatid" );
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
            "scatid" => $this->scatid,
            "stitle" => $this->stitle,
            "info" => $data,
            "category_select" => $category_select
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."info.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "info_add" );
        parent::loadlib( "mod" );
        $category_select = XMod::selectinfocategory( "", "catid" );
        $var_array = array(
            "category_select" => $category_select,
            "timeline" => time( )
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."info.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "info_edit" );
        $service = parent::service( "info", "as" );
        $id = $service->validID( );
        unset( $service );
        $this->_getItems( );
        $model = parent::model( "info", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            parent::loadlib( "mod" );
            $category_select = XMod::selectinfocategory( $data['catid'], "catid" );
            $var_array = array(
                "info" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "category_select" => $category_select
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."info.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "info_add" );
        $service = parent::service( "info", "as" );
        $args = $service->validAdd( );
        unset( $service );
        $model = parent::model( "info", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "info_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=info", 0 );
        }
        else
        {
            $this->log( "info_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "info_edit" );
        $this->_getItems( );
        $service = parent::service( "info", "as" );
        list( $id, $args ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "info", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "info_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=info&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "info_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "info_del" );
        $service = parent::service( "info", "as" );
        $array_id = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "info", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "info_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=info", 0 );
        }
        else
        {
            $this->log( "info_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "info_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "info", "am" );
        $model->doUpdate( intval($args['id']), trim($args['type']) );
        unset( $model );
    }

}

?>
