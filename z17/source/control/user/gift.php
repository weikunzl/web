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
class control extends userbase
{

    private $_comeurl = NULL;
    private $catid = NULL;

    private function _getItems( )
    {
        $this->catid = XRequest::getint( "catid" );
        $this->_comeurl = "page=".$this->page."&catid=".$this->catid."&halttype=".$this->halttype;
    }

    public function control_run( )
    {
        $this->_getItems( );
        $searchsql = "";
        $model = parent::model( "gift", "um" );
        list( $datacount, $data ) = $model->getReceiveList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=gift";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "gift" => $data,
            "comeurl" => $this->_comeurl,
            "page_title" => $this->getTitle( "gift_receive" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."gift.tpl" );
    }

    public function control_viewreceive( )
    {
        $this->_getItems( );
        $service = parent::service( "gift", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "gift", "um" );
        $data = $model->getOneReceive( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据错误或已删除！", "", 1 );
        }
        else
        {
            $var_array = array(
                "page_title" => $this->getTitle( "gift_viewreceive" ),
                "id" => $id,
                "gift" => $data,
                "comeurl" => $this->_comeurl
            );
            TPL::assign( $var_array );
            TPL::display( $this->uctpl."gift.tpl" );
        }
    }

    public function control_sendlog( )
    {
        $this->_getItems( );
        $searchsql = "";
        $model = parent::model( "gift", "um" );
        list( $datacount, $data ) = $model->getSendList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=gift&a=sendlog";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "gift" => $data,
            "comeurl" => $this->_comeurl,
            "page_title" => $this->getTitle( "gift_sendlog" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."gift.tpl" );
    }

    public function control_viewsend( )
    {
        $this->_getItems( );
        $service = parent::service( "gift", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "gift", "um" );
        $data = $model->getOneSend( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据错误或已删除！", "", 1 );
        }
        else
        {
            $var_array = array(
                "page_title" => $this->getTitle( "gift_viewsend" ),
                "id" => $id,
                "gift" => $data
            );
            TPL::assign( $var_array );
            TPL::display( $this->uctpl."gift.tpl" );
        }
    }

    public function control_send( )
    {
        $this->_getItems( );
        $service = parent::service( "gift", "us" );
        $touid = $service->validToUid( );
        unset( $service );
        $this->pagesize = 12;
        $model_user = parent::model( "user", "um" );
        $touserinfo = $model_user->getUserSimpleInfo( $touid );
        unset( $model_user );
        if ( empty( $touserinfo ) )
        {
            XHandle::halt( "对不起，读取接收人信息失败！", "", 1 );
        }
        $searchsql = "";
        if ( 0 < $this->catid )
        {
            $searchsql .= " AND v.catid='".$this->catid."'";
        }
        $model = parent::model( "gift", "um" );
        list( $datacount, $data ) = $model->getGiftList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=gift&a=send&touid=".$touid."&catid=".$this->catid."&halttype=".$this->halttype;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "gift" => $data,
            "touid" => $touid,
            "touserinfo" => $touserinfo,
            "catid" => $this->catid,
            "page_title" => $this->getTitle( "gift_send" )
        );
        unset( $model );
        TPL::assign( $var_array );
        if ( $this->halttype == "jdbox" )
        {
            TPL::display( $this->uctpl."gift_jdbox.tpl" );
        }
        else
        {
            TPL::display( $this->uctpl."gift.tpl" );
        }
    }

    public function control_savesend( )
    {
        $this->_getItems( );
        $service = parent::service( "gift", "us" );
        list( $touid, $giftid ) = $service->validSend( );
        unset( $service );
        $model = parent::model( "gift", "um" );
        if ( $touid == parent::$wrap_user['userid'] )
        {
            XHandle::halt( "对不起，不能给自己赠送礼物！", "", 1 );
        }
        if ( FALSE === $model->checkExistsToUser( $touid ) )
        {
            XHandle::halt( "对不起，接收人不存在！", "", 1 );
        }
        $gift = $model->checkExistsGitf( $giftid );
        if ( FALSE === $gift )
        {
            XHandle::halt( "对不起，礼物不存在！", "", 1 );
        }
        else if ( 0 < $gift['points'] && $this->u['points'] < $gift['points'] )
        {
            XHandle::halt( "对不起，您的积分不足，不能赠送该礼物！", "", 1 );
        }
        $result = $model->doSend( $touid, $giftid );
        unset( $model );
        if ( TRUE === $result )
        {
            if ( $this->halttype == "jdbox" )
            {
                XHandle::halt( "赠送成功，你可以继续赠送。", $this->ucfile."?c=gift&a=send&touid=".$touid."&halttype=jdbox", 0 );
            }
            else
            {
                XHandle::halt( "赠送成功", $this->ucfile."?c=gift&a=sendlog", 0 );
            }
        }
        else
        {
            XHandle::halt( "赠送失败", "", 1 );
        }
    }

}

?>
