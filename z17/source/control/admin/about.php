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
        parent::__construct( );
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
        $this->checkAuth( "about_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( 0 < $this->scatid )
        {
            $searchsql .= " AND v.catid='".$this->scatid."'";
        }
        if ( !empty( $this->stitle ) )
        {
            $searchsql .= " AND lower(v.title) LIKE '%".( $this->stitle )."%'";
        }
        $model = parent::model( "about", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=about&".$this->_urlitem;
        parent::loadlib( "mod" );
        $category_select = XMod::selectaboutcategory( $this->scatid, "scatid" );
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
            "about" => $data,
            "category_select" => $category_select
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."about.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "about_add" );
        parent::loadlib( "mod" );
        $category_select = XMod::selectaboutcategory( "", "catid" );
        $var_array = array(
            "category_select" => $category_select
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."about.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "about_edit" );
        $service = parent::service( "about", "as" );
        $id = $service->validID( );
        unset( $service );
        $this->_getItems( );
        $model = parent::model( "about", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            parent::loadlib( "mod" );
            $category_select = XMod::selectaboutcategory( $data['catid'], "catid" );
            $var_array = array(
                "about" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "category_select" => $category_select
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."about.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "about_add" );
        $service = parent::service( "about", "as" );
        $args = $service->validAdd( );
        unset( $service );
        $model = parent::model( "about", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "about_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=about", 0 );
        }
        else
        {
            $this->log( "about_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "about_edit" );
        $this->_getItems( );
        $service = parent::service( "about", "as" );
        list( $id, $args ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "about", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "about_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=about&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "about_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "about_del" );
        $service = parent::service( "about", "as" );
        $array_id = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "about", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "about_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=about", 0 );
        }
        else
        {
            $this->log( "about_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "about_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "about", "am" );
        $model->doUpdate( intval($args['id']), trim($args['type']));
        unset( $model );
    }

}

?>
