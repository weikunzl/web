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
    private $sdid = NULL;
    private $susername = NULL;
    private $skeyword = NULL;
    private $stype = NULL;

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
        $this->sdid = XRequest::getint( "sdid" );
        $this->susername = XRequest::getgpc( "susername" );
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->stype = XRequest::getgpc( "stype" );
        $this->_urlitem = "sdid=".$this->sdid."&susername=".urlencode( $this->susername )."&skeyword=".urlencode( $this->skeyword )."&stype=".$this->stype;
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "diarycomment_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( 0 < $this->sdid )
        {
            $searchsql .= " AND v.diaryid='".$this->sdid."'";
        }
        if ( TRUE === XValid::isuserargs( $this->susername ) )
        {
            $searchsql .= " AND u.username LIKE '%".$this->susername."%'";
        }
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND v.content LIKE '%".$this->skeyword."%'";
        }
        if ( $this->stype == "audit" )
        {
            $searchsql .= " AND v.flag='0'";
        }
        if ( $this->stype == "audited" )
        {
            $searchsql .= " AND v.flag='1'";
        }
        $model = parent::model( "diarycomment", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=diarycomment&".$this->_urlitem;
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
            "sdid" => $this->sdid,
            "skeyword" => $this->skeyword,
            "susername" => $this->susername,
            "stype" => $this->stype,
            "comment" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."diarycomment.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "diarycomment_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $this->_getItems( );
        $model = parent::model( "diarycomment", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "comment" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."diarycomment.tpl" );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "diarycomment_edit" );
        $this->_getItems( );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "diarycomment", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "diarycomment_edit", "diarycomment id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=diarycomment&".$this->_comeurl."", 0 );
        }
        else
        {
            $this->log( "diarycomment_edit", "diarycomment id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "diarycomment_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "diarycomment", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "diarycomment_del", "diarycomment id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=diarycomment", 0 );
        }
        else
        {
            $this->log( "diarycomment_del", "diarycomment id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_update( )
    {
        $this->checkAuth( "diarycomment_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "diarycomment", "am" );
        $model->doUpdate( intval($args['id'] ), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "content" ) );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['content'] ) )
        {
            XHandle::halt( "评论内容不能为空", "", 1 );
        }
        return array(
            $id,
            $args
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
