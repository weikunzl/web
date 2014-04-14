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

    private $sdate = NULL;
    private $edate = NULL;
    private $skeyword = NULL;
    private $_comeurl = NULL;
    private $_urlitem = NULL;

    private function _getItems( )
    {
        $this->sdate = XRequest::getargs( "sdate" );
        $this->edate = XRequest::getargs( "edate" );
        $this->skeyword = XRequest::getargs( "skeyword" );
        $this->_urlitem = "sdate=".urlencode( $this->sdate )."&edate=".urlencode( $this->edate )."&skeyword=".urlencode( $this->skeyword )."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page;
    }

    public function control_run( )
    {
        $this->_getItems( );
        $searchsql = "";
        if ( TRUE === XValid::isdate( $this->sdate ) && TRUE === XValid::isdate( $this->edate ) )
        {
            $intsdate = strtotime( $this->sdate );
            $intedate = strtotime( $this->edate );
            $searchsql .= " AND dateline >= ".$intsdate." AND dateline <= ".$intedate."";
        }
        if ( !empty( $this->skeyword ) )
        {
            $searchsql .= " AND logcontent LIKE '%".$this->skeyword."%'";
        }
        $model = parent::model( "money", "um" );
        list( $datacount, $data ) = $model->getList( array(
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
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "moneylog" => $data,
            "page_title" => $this->getTitle( "money_run" ),
            "sdate" => $this->sdate,
            "edate" => $this->edate,
            "skeyword" => $this->skeyword,
            "urlitem" => $this->_urlitem
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."money.tpl" );
    }

}

?>
