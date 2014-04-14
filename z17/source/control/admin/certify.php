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
    private $sflag = NULL;
    private $stype = NULL;
    private $skeyword = NULL;
    private $fromtype = NULL;

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
        $this->_getItems( );
    }

    private function _getItems( )
    {
        $this->sflag = XRequest::getgpc( "sflag" );
        $this->stype = XRequest::getgpc( "stype" );
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->fromtype = XRequest::getgpc( "fromtype" );
        $this->_urlitem = "sflag=".$this->sflag."&stype=".$this->stype."&skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "certify_volist" );
        $searchsql = "";
        if ( $this->sflag == "pass" )
        {
            $searchsql .= " AND v.flag='1'";
        }
        if ( $this->sflag == "lock" )
        {
            $searchsql .= " AND v.flag='0'";
        }
        if ( !empty( $this->skeyword ) )
        {
            if ( $this->stype == "userid" )
            {
                if ( TRUE === XValid::isnumber( $this->skeyword ) )
                {
                    $searchsql .= " AND v.userid='".$this->skeyword."'";
                }
            }
            else if ( $this->stype == "username" )
            {
                if ( XValid::isuserargs( $this->skeyword ) )
                {
                    $searchsql .= " AND u.username LIKE '%".$this->skeyword."%'";
                }
            }
            else if ( $this->stype == "email" && TRUE === XValid::isemail( $this->skeyword ) )
            {
                $searchsql .= " AND u.email LIKE '%".$this->skeyword."%'";
            }
        }
        $model = parent::model( "certify", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=certify&".$this->_urlitem;
        parent::loadlib( "mod" );
        foreach ( $data as $key => $value )
        {
            $data[$key]['type'] = XMod::getcertifytype( $value['certifytype'] );
        }
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
            "sflag" => $this->sflag,
            "stype" => $this->stype,
            "skeyword" => $this->skeyword,
            "certify" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."certify.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "certify_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "certify", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            parent::loadlib( "mod" );
            $data['type'] = XMod::getcertifytype( $data['certifytype'] );
            $var_array = array(
                "certify" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "fromtype" => $this->fromtype
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."certify.tpl" );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "certify_edit" );
        $this->_getItems( );
        list( $id, $cerargs, $args ) = $this->_validEdit( );
        $model = parent::model( "certify", "am" );
        $result = $model->doEdit( $id, $cerargs, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "certify_edit", "id=".$id."", 1 );
            if ( $this->fromtype == "jdbox" )
            {
                XHandle::tbdialog( "编辑成功", 1 );
            }
            else
            {
                XHandle::halt( "编辑成功", $this->cpfile."?c=certify&".$this->_comeurl."", 0 );
            }
        }
        else
        {
            $this->log( "certify_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "certify_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "certify", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "certify_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=certify", 0 );
        }
        else
        {
            $this->log( "certify_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        $cerargs = XRequest::getgpc( array( "flag", "remark" ) );
        $args = XRequest::getgpc( array( "idnumberrz", "videorz", "heightrz", "marryrz", "incomerz", "educationrz", "houserz", "carrz" ) );
        $args['idnumberrz'] = intval( $args['idnumberrz'] );
        $args['videorz'] = intval( $args['videorz'] );
        $args['heightrz'] = intval( $args['heightrz'] );
        $args['marryrz'] = intval( $args['marryrz'] );
        $args['incomerz'] = intval( $args['incomerz'] );
        $args['educationrz'] = intval( $args['educationrz'] );
        $args['houserz'] = intval( $args['houserz'] );
        $args['carrz'] = intval( $args['carrz'] );
        $cerargs['flag'] = intval( $cerargs['flag'] );
        return array( $id, $cerargs, $args );
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
