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
    private $ftype = NULL;
    private $fkeyword = NULL;
    private $ttype = NULL;
    private $tkeyword = NULL;
    private $sdate = NULL;
    private $edate = NULL;
    private $fromtype = NULL;
    private $skeyword = NULL;

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
        $this->ftype = XRequest::getgpc( "ftype" );
        $this->fkeyword = XRequest::getgpc( "fkeyword" );
        $this->ttype = XRequest::getgpc( "ttype" );
        $this->tkeyword = XRequest::getgpc( "tkeyword" );
        $this->sdate = XRequest::getgpc( "sdate" );
        $this->edate = XRequest::getgpc( "edate" );
        $this->fromtype = XRequest::getgpc( "fromtype" );
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->_urlitem = "ftype=".$this->ftype."&fkeyword=".urlencode( $this->fkeyword )."&ttype=".$this->ttype."&tkeyword=".urlencode( $this->tkeyword )."&sdate=".urlencode( $this->sdate )."&edate=".urlencode( $this->edate )."&fromtype=".$this->fromtype."&skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "message_volist" );
        $searchsql = "";
        if ( !empty( $this->fkeyword ) )
        {
            if ( $this->ftype == "userid" )
            {
                if ( TRUE === XValid::isnumber( $this->fkeyword ) )
                {
                    $searchsql .= " AND fu.userid='".$this->fkeyword."'";
                }
            }
            else if ( $this->ftype == "username" )
            {
                if ( XValid::isuserargs( $this->fkeyword ) )
                {
                    $searchsql .= " AND fu.username LIKE '%".$this->fkeyword."%'";
                }
            }
            else if ( $this->ftype == "email" && TRUE === XValid::isemail( $this->fkeyword ) )
            {
                $searchsql .= " AND fu.email LIKE '%".$this->fkeyword."%'";
            }
        }
        if ( !empty( $this->tkeyword ) )
        {
            if ( $this->ttype == "userid" )
            {
                if ( TRUE === XValid::isnumber( $this->tkeyword ) )
                {
                    $searchsql .= " AND tu.userid='".$this->tkeyword."'";
                }
            }
            else if ( $this->ttype == "username" )
            {
                if ( XValid::isuserargs( $this->tkeyword ) )
                {
                    $searchsql .= " AND tu.username LIKE '%".$this->tkeyword."%'";
                }
            }
            else if ( $this->ttype == "email" && TRUE === XValid::isemail( $this->tkeyword ) )
            {
                $searchsql .= " AND tu.email LIKE '%".$this->tkeyword."%'";
            }
        }
        if ( TRUE === XValid::isdate( $this->sdate ) && TRUE === XValid::isdate( $this->edate ) )
        {
            $sdateline = strtotime( $this->sdate );
            $edateline = strtotime( $this->edate );
            $searchsql .= " AND v.dateline>=".$sdateline." AND v.dateline<={$edateline}";
        }
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND v.content LIKE '%".$this->skeyword."%'";
        }
        $model = parent::model( "message", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=message&".$this->_urlitem;
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
            "ftype" => $this->ftype,
            "fkeyword" => $this->fkeyword,
            "ttype" => $this->ttype,
            "tkeyword" => $this->tkeyword,
            "sdate" => $this->sdate,
            "edate" => $this->edate,
            "skeyword" => $this->skeyword,
            "message" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."message.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "message_add" );
        TPL::display( $this->cptpl."message.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "message_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "message", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "message" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl,
                "fromtype" => $this->fromtype
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."message.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "message_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "message", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "message_add", "", 1 );
            if ( $this->fromtype == "jdbox" )
            {
                XHandle::tbdialog( "添加成功", 1 );
            }
            else
            {
                XHandle::halt( "添加成功", $this->cpfile."?c=message", 0 );
            }
        }
        else
        {
            $this->log( "message_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "message_edit" );
        $this->_getItems( );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "message", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "message_edit", "id=".$id."", 1 );
            if ( $this->fromtype == "jdbox" )
            {
                XHandle::tbdialog( "编辑成功", 1 );
            }
            else
            {
                XHandle::halt( "编辑成功", $this->cpfile."?c=message&".$this->_comeurl."", 0 );
            }
        }
        else
        {
            $this->log( "message_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "message_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "message", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "message_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=message", 0 );
        }
        else
        {
            $this->log( "message_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "message_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "message", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        $args = XRequest::getgpc( array( "istop", "flag", "content" ) );
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "信件内容不能为空", "", 1 );
        }
        $args['istop'] = intval( $args['istop'] );
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
