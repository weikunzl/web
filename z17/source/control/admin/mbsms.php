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
    private $suserid = NULL;
    private $susername = NULL;
    private $stext = NULL;
    private $sdate = NULL;
    private $edate = NULL;
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
        $this->suserid = XRequest::getint( "suserid" );
        $this->susername = XRequest::getargs( "susername" );
        $this->stext = XRequest::getargs( "stext" );
        $this->sdate = XRequest::getargs( "sdate" );
        $this->edate = XRequest::getargs( "edate" );
        $this->fromtype = XRequest::getargs( "fromtype" );
        $this->_urlitem = "suserid=".$this->suserid."&susername=".urlencode( $this->susername )."&stext=".urlencode( $this->stext )."&sdate=".urlencode( $this->sdate )."&edate=".urlencode( $this->edate )."&fromtype=".$this->fromtype;
        $this->_comeurl = $this->_urlitem."&page=".$this->page;
    }

    public function control_run( )
    {
        $this->checkAuth( "mbsms_volist" );
        $searchsql = "";
        if ( 0 < $this->suserid )
        {
            $searchsql .= " AND v.userid='".$this->suserid."'";
        }
        if ( TRUE === XValid::isuserargs( $this->susername ) )
        {
            $searchsql .= " AND u.username LIKE '%".$this->susername."%'";
        }
        if ( TRUE === XValid::isdate( $this->sdate ) && TRUE === XValid::isdate( $this->edate ) )
        {
            $sline = strtotime( $this->sdate );
            $eline = strtotime( $this->edate );
            $searchsql .= " AND v.dateline>=".$sline." AND v.dateline<={$eline}";
        }
        if ( !empty( $this->stext ) )
        {
            $searchsql .= " AND v.logcontent LIKE '%".$this->stext."%'";
        }
        $model = parent::model( "mbsms", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=money&".$this->_urlitem;
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "mbsms" => $data,
            "urlitem" => $this->_urlitem,
            "suserid" => $this->suserid,
            "susername" => $this->susername,
            "stext" => $this->stext,
            "sdate" => $this->sdate,
            "edate" => $this->edate,
            "fromtype" => $this->fromtype
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."mbsms.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "mbsms_add" );
        $userid = XRequest::getint( "userid" );
        if ( $userid < 1 )
        {
            XHandle::halt( "对不起，会员ID丢失。", "", 1 );
        }
        else
        {
            $m = parent::model( "user", "am" );
            $user = $m->getData( $userid );
            unset( $m );
            if ( empty( $user ) )
            {
                XHandle::halt( "载入会员信息失败", "", 1 );
            }
        }
        $var_array = array(
            "userid" => $userid,
            "fromtype" => $this->fromtype,
            "user" => $user
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."mbsms.tpl" );
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "mbsms_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "mbsms", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mbsms_add", "", 1 );
            if ( $this->fromtype == "jdbox" )
            {
                XHandle::tbdialog( "操作成功", 1 );
            }
            else
            {
                XHandle::halt( "操作成功", $this->cpfile."?c=mbsms", 0 );
            }
        }
        else
        {
            $this->log( "mbsms_add", "", 0 );
            XHandle::halt( "操作失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "userid", "actiontype", "quantity", "relnum", "logcontent" ) );
        $args['userid'] = intval( $args['userid'] );
        $args['actiontype'] = intval( $args['actiontype'] );
        $args['quantity'] = intval( $args['quantity'] );
        if ( $args['userid'] < 1 )
        {
            XHandle::halt( "会员ID丢失", "", 1 );
        }
        if ( $args['actiontype'] < 1 )
        {
            XHandle::halt( "请选择现金去向", "", 1 );
        }
        if ( $args['quantity'] < 0 || $args['quantity'] == 0 )
        {
            XHandle::halt( "操作数量必须大于0", "", 1 );
        }
        if ( empty( $args['logcontent'] ) )
        {
            XHandle::halt( "操作记录不能为空", "", 1 );
        }
        if ( $args['actiontype'] == 2 )
        {
            $m = parent::model( "user", "am" );
            $user_data = $m->getUserMoney( $args['userid'] );
            unset( $m );
            if ( empty( $user_data ) )
            {
                XHandle::halt( "载入会员信息失败", "", 1 );
            }
            else if ( $user_data['mbsms'] < $args['quantity'] )
            {
                XHandle::halt( "对不起，会员可用短信不足，无法执行扣除！", "", 1 );
            }
        }
        $args['opuser'] = parent::$wrap_admin['adminname'];
        return $args;
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
