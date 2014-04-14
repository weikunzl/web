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
    private $stitle = NULL;
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
        $this->stitle = XRequest::getgpc( "stitle" );
        $this->skeyword = XRequest::getgpc( "skeyword" );
        $this->_urlitem = "stitle=".urlencode( $this->stitle )."&skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "systemmsg_volist" );
        $this->_getItems( );
        $searchsql = "";
        if ( !empty( $this->stitle ) )
        {
            $searchsql .= " AND `subject` LIKE '".$this->stitle."%'";
        }
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND `content` LIKE '".$this->skeyword."%'";
        }
        $model = parent::model( "systemmsg", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=systemmsg&".$this->_urlitem;
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
            "stitle" => $this->stitle,
            "skeyword" => $this->skeyword,
            "systemmsg" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."systemmsg.tpl" );
    }

    public function control_view( )
    {
        $this->checkAuth( "systemmsg_view" );
        $this->_getItems( );
        $service = parent::service( "systemmsg", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "systemmsg", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "systemmsg" => $data,
                "id" => $id,
                "page" => $this->page,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."systemmsg.tpl" );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "sytemmsg_del" );
        $array_id = XRequest::getarray( "id" );
        if ( empty( $array_id ) )
        {
            XHandle::halt( "对不起，请选择要删除的信息！", "", 1 );
        }
        $model = parent::model( "systemmsg", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "sytemmsg_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=systemmsg", 0 );
        }
        else
        {
            $this->log( "sytemmsg_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_add( )
    {
        $this->checkAuth( "systemmsg_add" );
        TPL::display( $this->cptpl."systemmsg.tpl" );
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "systemmsg_add" );
        $service = parent::service( "systemmsg", "as" );
        $args = $service->validGroup( );
        unset( $service );
        $model = parent::model( "systemmsg", "am" );
        list( $id, $result ) = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "会员筛选成功，正在载入发送页面...", $this->cpfile."?c=systemmsg&a=sendmsg&id=".$id."", 0 );
        }
        else
        {
            XHandle::halt( "会员筛选失败，请重试。", "", 1 );
        }
    }

    public function control_sendmsg( )
    {
        $this->checkAuth( "systemmsg_add" );
        $service = parent::service( "systemmsg", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "systemmsg", "am" );
        list( $result, $total, $pagecount, $refresh ) = $model->doSendMsg( $id, $this->page );
        unset( $model );
        if ( FALSE === $result )
        {
            XHandle::halt( "对不起，读取系统消息内容不存在！", "", 1 );
        }
        else if ( $total == 0 )
        {
            XHandle::halt( "对不起，没有要筛选的会员数据", $this->cpfile."?c=systemmsg", 4 );
        }
        else
        {
            $this->log( "systemmsg_add", "", 1 );
            $success = "系统消息(站内短信)发送完毕，共发送会员".$total."个";
            $msg = "<div align=center><br ><br />系统消息发送中，请耐心等待...<br />共筛选会员 <b>".$total."</b> 个，合计 <b>".$pagecount."</b> 页<br />第 <font color=green>".$this->page."</font> 页发送完毕，准备进入第 <font color=blue>".( $this->page + 1 )."</font> 页...</div>";
            if ( $this->page == $pagecount )
            {
                XHandle::halt( $success, $this->cpfile."?c=systemmsg", 0 );
            }
            else
            {
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".OESOFT_CHARSET."\" />";
                echo $msg;
                echo "<meta http-equiv=\"refresh\" content=\"".$refresh.";url=".$this->cpfile.( "?c=systemmsg&a=sendmsg&id=".$id."&page=" ).( $this->page + 1 )."\">";
            }
        }
    }

    public function control_offvip( )
    {
        $this->checkAuth( "systemmsg_add" );
        TPL::display( $this->cptpl."systemmsg.tpl" );
    }

    public function control_saveoffvip( )
    {
        $this->checkAuth( "systemmsg_add" );
        $service = parent::service( "systemmsg", "as" );
        $args = $service->validOffVip( );
        unset( $service );
        $model = parent::model( "systemmsg", "am" );
        list( $id, $result ) = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "会员筛选成功，正在载入发送页面...", $this->cpfile."?c=systemmsg&a=sendoffvip&id=".$id."", 0 );
        }
        else
        {
            XHandle::halt( "会员筛选失败，请重试。", "", 1 );
        }
    }

    public function control_sendoffvip( )
    {
        $this->checkAuth( "systemmsg_add" );
        $service = parent::service( "systemmsg", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "systemmsg", "am" );
        list( $result, $total, $pagecount, $refresh ) = $model->doSendOffVipMsg( $id, $this->page );
        unset( $model );
        if ( FALSE === $result )
        {
            XHandle::halt( "对不起，读取系统消息内容不存在！", "", 1 );
        }
        else if ( $total == 0 )
        {
            XHandle::halt( "对不起，没有要筛选的会员数据", $this->cpfile."?c=systemmsg&a=offvip", 4 );
        }
        else
        {
            $this->log( "systemmsg_add", "", 1 );
            $success = "系统消息(站内短信)发送完毕，共发送会员".$total."个";
            $msg = "<div align=center><br ><br />系统消息发送中，请耐心等待...<br />共筛选会员 <b>".$total."</b> 个，合计 <b>".$pagecount."</b> 页<br />第 <font color=green>".$this->page."</font> 页发送完毕，准备进入第 <font color=blue>".( $this->page + 1 )."</font> 页...</div>";
            if ( $this->page == $pagecount )
            {
                XHandle::halt( $success, $this->cpfile."?c=systemmsg&a=offvip", 0 );
            }
            else
            {
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".OESOFT_CHARSET."\" />";
                echo $msg;
                echo "<meta http-equiv=\"refresh\" content=\"".$refresh.";url=".$this->cpfile.( "?c=systemmsg&a=sendoffvip&id=".$id."&page=" ).( $this->page + 1 )."\">";
            }
        }
    }

}

?>
