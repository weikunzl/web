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
    private $sname = NULL;

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
        $this->sname = XRequest::getgpc( "sname" );
        $this->_urlitem = "scatid=".$this->scatid."&sname=".urlencode( $this->sname )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "gift_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( 0 < $this->scatid )
        {
            $searchsql .= " AND v.catid='".$this->scatid."'";
        }
        if ( !empty( $this->sname ) )
        {
            $searchsql .= " AND v.giftname LIKE '%".$this->sname."%'";
        }
        $model = parent::model( "gift", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=gift&".$this->_urlitem;
        parent::loadlib( "mod" );
        $category_select = XMod::selectgiftcategory( $this->scatid, "scatid" );
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
            "sname" => $this->sname,
            "gift" => $data,
            "category_select" => $category_select
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."gift.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "gift_add" );
        parent::loadlib( "mod" );
        $category_select = XMod::selectgiftcategory( "", "catid" );
        $var_array = array(
            "category_select" => $category_select
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."gift.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "gift_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $this->_getItems( );
        $model = parent::model( "gift", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            parent::loadlib( "mod" );
            $category_select = XMod::selectgiftcategory( $data['catid'], "catid" );
            $var_array = array(
                "gift" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "category_select" => $category_select
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."gift.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "gift_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "gift", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "gift_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=gift", 0 );
        }
        else
        {
            $this->log( "gift_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "gift_edit" );
        $this->_getItems( );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "gift", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "gift_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=gift&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "gift_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "gift_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "gift", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "gift_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=gift", 0 );
        }
        else
        {
            $this->log( "gift_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "gift_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "gift", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "catid", "giftname", "imgurl", "flag", "elite", "points", "intro" ) );
        $args['catid'] = intval( $args['catid'] );
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择所属分类", "", 1 );
        }
        if ( empty( $args['giftname'] ) )
        {
            XHandle::halt( "礼物名称不能为空", "", 1 );
        }
        if ( empty( $args['imgurl'] ) )
        {
            XHandle::halt( "礼物图片不能为空", "", 1 );
        }
        $args['flag'] = intval( $args['flag'] );
        $args['elite'] = intval( $args['elite'] );
        $args['points'] = floatval( $args['points'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "catid", "giftname", "imgurl", "flag", "elite", "points", "intro" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        $args['catid'] = intval( $args['catid'] );
        if ( $args['catid'] < 1 )
        {
            XHandle::halt( "请选择所属分类", "", 1 );
        }
        if ( empty( $args['giftname'] ) )
        {
            XHandle::halt( "礼物名称不能为空", "", 1 );
        }
        if ( empty( $args['imgurl'] ) )
        {
            XHandle::halt( "礼物图片不能为空", "", 1 );
        }
        $args['flag'] = intval( $args['flag'] );
        $args['elite'] = intval( $args['elite'] );
        $args['points'] = floatval( $args['points'] );
        return array( $id, $args );
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
