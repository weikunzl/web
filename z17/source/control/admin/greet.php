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
    private $stype = NULL;
    private $sgreet = NULL;

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
        $this->stype = XRequest::getgpc( "stype" );
        $this->sgreet = XRequest::getgpc( "sgreet" );
        $this->_urlitem = "stype=".$this->stype."&sgreet=".urlencode( $this->sgreet )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "greet_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( $this->stype == "male" )
        {
            $searchsql = " AND `male`='1'";
        }
        else if ( $this->stype == "female" )
        {
            $searchsql = " AND `female`='1'";
        }
        if ( !empty( $this->sgreet ) )
        {
            $searchsql .= " AND `greeting` LIKE '%".$this->sgreet."%'";
        }
        $model = parent::model( "greet", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=greet&".$this->_urlitem;
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
            "stype" => $this->stype,
            "sgreet" => $this->sgreet,
            "greet" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."greet.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "greet_add" );
        TPL::display( $this->cptpl."greet.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "greet_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $this->_getItems( );
        $model = parent::model( "greet", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "greet" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."greet.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "greet_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "greet", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "greet_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=greet", 0 );
        }
        else
        {
            $this->log( "greet_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "greet_edit" );
        $this->_getItems( );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "greet", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "greet_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=greet&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "greet_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "greet_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "greet", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "greet_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=greet", 0 );
        }
        else
        {
            $this->log( "greet_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "greet_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "greet", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "flag", "male", "female", "greeting" ) );
        if ( empty( $args['greeting'] ) )
        {
            XHandle::halt( "问候语不能为空", "", 1 );
        }
        $args['flag'] = intval( $args['flag'] );
        $args['male'] = intval( $args['male'] );
        $args['female'] = intval( $args['female'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "flag", "male", "female", "greeting" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['greeting'] ) )
        {
            XHandle::halt( "问候语不能为空", "", 1 );
        }
        $args['flag'] = intval( $args['flag'] );
        $args['male'] = intval( $args['male'] );
        $args['female'] = intval( $args['female'] );
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
