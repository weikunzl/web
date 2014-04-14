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
    private $_urlitem = NULL;
    private $hid = NULL;
    private $tauid = NULL;
    private $type = NULL;

    private function _getItems( )
    {
        $this->hid = XRequest::getargs( "hid" );
        $this->tauid = XRequest::getint( "tauid" );
        $this->type = XRequest::getargs( "type" );
        if ( FALSE === XValid::isnumber( $this->hid ) )
        {
            XHandle::halt( "对不起，记录ID错误！", "", 1 );
        }
        if ( $this->hid < 1 && $this->tauid <= 0 )
        {
            XHandle::halt( "对不起，ID错误！", "", 1 );
        }
        else if ( parent::$wrap_user['userid'] + $this->tauid != $this->hid )
        {
            XHandle::halt( "对不起，记录ID不符合！", "", 1 );
        }
        $this->_urlitem = "hid=".$this->hid."&tauid=".$this->tauid;
        $this->_comeurl = "page=".$this->page."&".$this->_urlitem;
    }

    public function control_run( )
    {
        $this->_getItems( );
        $model_user = parent::model( "user", "um" );
        $tauser = $model_user->getUserSimpleInfo( $this->tauid );
        if ( empty( $tauser ) )
        {
            XHandle::halt( "对不起，载入会员数据错误！", "", 1 );
        }
        unset( $model_user );
        $model = parent::model( "msglog", "um" );
        $firstuid = $model->getFirstUid( $this->hid );
        if ( $firstuid <= 0 )
        {
            XHandle::halt( "对不起，信件记录ID错误！", "", 1 );
        }
        $searchsql = "";
        $searchsql .= " AND v.hashid=".$this->hid;
        if ( $this->u['userid'] == $firstuid )
        {
            $searchsql .= " AND v.first_fdeleted='0' AND v.first_tdeleted='0'";
        }
        else
        {
            $searchsql .= " AND v.sec_fdeleted='0' AND v.sec_tdeleted='0'";
        }
        list( $datacount, $data ) = $model->getRecordList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => $orderby
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=msglog&".$this->_urlitem;
        unset( $model );
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "msglog" => $data,
            "type" => $this->type,
            "hid" => $this->hid,
            "tauid" => $this->tauid,
            "tauser" => $tauser,
            "urlitem" => $this->_urlitem,
            "page_title" => $this->getTitle( "msglog_run" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."msglog.tpl" );
    }

    public function control_del( )
    {
        $this->_getItems( );
        $service = parent::service( "msglog", "us" );
        $id = $service->validID( );
        unset( $service );
        $this->type = empty( $this->type ) ? "from" : $this->type;
        $model = parent::model( "msglog", "um" );
        $result = $model->doDel( $id, $this->type );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=msglog&".$this->_comeurl, 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    public function control_savesend( )
    {
        $this->_getItems( );
        $touid = $this->tauid;
        $id = XRequest::getint( "id" );
        $service = parent::service( "message", "us" );
        $message = $service->validContent( );
        unset( $service );
        $model_user = parent::model( "user", "um" );
        $tauser = $model_user->getUserSimpleInfo( $touid );
        unset( $model_user );
        if ( empty( $tauser ) )
        {
            XHandle::halt( "对不起，收件人不能为空。", "", 1 );
        }
        $model_userauth = parent::model( "userauth", "um" );
        list( $adddaylog, $error ) = $model_userauth->checkSendAuth( $this->u['gender'], $this->g['msg'], $tauser['gender'] );
        unset( $model_userauth );
        if ( !empty( $error ) )
        {
            XHandle::halt( $error, "", 1 );
        }
        else
        {
            $model = parent::model( "message", "um" );
            $result = $model->doSaveSendMsg( $message, $touid, $tauser['gender'], array(
                "id" => $id,
                "adddaylog" => $adddaylog
            ) );
            unset( $model );
            if ( TRUE === $result )
            {
                XHandle::halt( "信件回复成功", $this->ucfile."?c=msglog&".$this->_comeurl, 0 );
            }
            else
            {
                XHandle::halt( "信件回复失败", "", 1 );
            }
        }
    }

}

?>
