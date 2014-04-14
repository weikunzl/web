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
        $this->checkAuth( "zone_volist" );
        $searchsql = "";
        $model = parent::model( "zone", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=zone";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "zone" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."zone.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "zone_add" );
        TPL::display( $this->cptpl."zone.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "zone_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "zone", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "zone" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."zone.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "zone_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "zone", "am" );
        if ( TRUE === $model->doCheckIdMark( $args['idmark'] ) )
        {
            XHandle::halt( "对不起，该版位标识已存在，请填写另外一个。", "", 1 );
        }
        else
        {
            $result = $model->doAdd( $args );
            if ( TRUE === $result )
            {
                $this->log( "zone_add", "", 1 );
                XHandle::halt( "添加成功", $this->cpfile."?c=zone", 0 );
            }
            else
            {
                $this->log( "zone_add", "", 0 );
                XHandle::halt( "添加失败", "", 1 );
            }
        }
        unset( $model );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "zone_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "zone", "am" );
        $result = $model->doEdit( $id, $args );
        if ( TRUE === $result )
        {
            $this->log( "zone_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=zone&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "zone_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
        unset( $model );
    }

    public function control_del( )
    {
        $this->checkAuth( "zone_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "zone", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            if ( TRUE === $model->doCheckSystem( $id ) )
            {
                XHandle::halt( "对不起，不能删除系统默认的版位。", "", 1 );
            }
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "zone_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=zone", 0 );
        }
        else
        {
            $this->log( "zone_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "zone_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "zone", "am" );
        $model->doUpdate(intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validAdd( )
    {
        $zonename = XRequest::getargs( "zonename" );
        $args = XRequest::getgpc( array( "zonename", "idmark", "sort", "zonewidth", "zoneheight", "flag" ) );
        if ( empty( $args['zonename'] ) )
        {
            XHandle::halt( "版位名称不能为空", "", 1 );
        }
        if ( empty( $args['idmark'] ) )
        {
            XHandle::halt( "版位标识不能为空", "", 1 );
        }
        else if ( FALSE === XValid::isspchar( $args['idmark'] ) )
        {
            XHandle::halt( "版位标识格式不正确", "", 1 );
        }
        if ( empty( $args['sort'] ) )
        {
            XHandle::halt( "请选择版位类型", "", 1 );
        }
        $args['zonewidth'] = intval( $args['zonewidth'] );
        $args['zoneheight'] = intval( $args['zoneheight'] );
        $args['flag'] = intval( $args['flag'] );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "zonename", "sort", "zonewidth", "zoneheight", "flag" ) );
        if ( empty( $args['zonename'] ) )
        {
            XHandle::halt( "版位名称不能为空", "", 1 );
        }
        if ( empty( $args['sort'] ) )
        {
            XHandle::halt( "请选择版位类型", "", 1 );
        }
        $args['zonewidth'] = intval( $args['zonewidth'] );
        $args['zoneheight'] = intval( $args['zoneheight'] );
        $args['flag'] = intval( $args['flag'] );
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
