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
    private $smentid = NULL;
    private $sdate = NULL;
    private $edate = NULL;
    private $sflag = NULL;

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
        $this->smentid = XRequest::getint( "smentid" );
        $this->sdate = XRequest::getargs( "sdate" );
        $this->edate = XRequest::getargs( "edate" );
        $this->sflag = XRequest::getargs( "sflag" );
        $this->_urlitem = "suserid=".$this->suserid."&susername=".urlencode( $this->susername )."&smentid=".$this->smentid."&sflag=".$this->sflag."&sdate=".urlencode( $this->sdate )."&edate=".urlencode( $this->edate )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page;
    }

    public function control_run( )
    {
        $this->checkAuth( "paymentlog" );
        $searchsql = "";
        if ( 0 < $this->suserid )
        {
            $searchsql .= " AND v.userid='".$this->suserid."'";
        }
        if ( TRUE === XValid::isuserargs( $this->susername ) )
        {
            $searchsql .= " AND u.username LIKE '".$this->susername."%'";
        }
        if ( TRUE === XValid::isdate( $this->sdate ) && TRUE === XValid::isdate( $this->edate ) )
        {
            $sline = strtotime( $this->sdate );
            $eline = strtotime( $this->edate );
            $searchsql .= " AND v.addtime>=".$sline." AND v.addtime<={$eline}";
        }
        if ( 0 < $this->smentid )
        {
            $searchsql .= " AND v.paymentid='".$this->smentid."'";
        }
        if ( $this->sflag == "wuxiao" )
        {
            $searchsql .= " AND v.paystatus='0'";
        }
        else if ( $this->sflag == "success" )
        {
            $searchsql .= " AND v.paystatus='10'";
        }
        else if ( $this->sflag == "fail" )
        {
            $searchsql .= " AND v.paystatus='11'";
        }
        $model = parent::model( "paymentlog", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=paymentlog&".$this->_urlitem;
        parent::loadlib( "mod" );
        $netpay_select = XMod::selectnetpay( $this->smentid, "smentid" );
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "paymentlog" => $data,
            "urlitem" => $this->_urlitem,
            "suserid" => $this->suserid,
            "susername" => $this->susername,
            "smentid" => $this->smentid,
            "sdate" => $this->sdate,
            "edate" => $this->edate,
            "sflag" => $this->sflag,
            "netpay_select" => $netpay_select
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."paymentlog.tpl" );
    }

}

?>
