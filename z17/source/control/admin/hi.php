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
        $this->_urlitem = "ftype=".$this->ftype."&fkeyword=".urlencode( $this->fkeyword )."&ttype=".$this->ttype."&tkeyword=".urlencode( $this->tkeyword )."&sdate=".urlencode( $this->sdate )."&edate=".urlencode( $this->edate )."&fromtype=".$this->fromtype."";
        $this->_comeurl = $this->_urlitem."&page=".$this->page."";
    }

    public function control_run( )
    {
        $this->checkAuth( "hi_volist" );
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
                    $searchsql .= " AND lower(tu.username) LIKE '%".strtolower( $this->tkeyword )."%'";
                }
            }
            else if ( $this->ttype == "email" && TRUE === XValid::isemail( $this->tkeyword ) )
            {
                $searchsql .= " AND lower(tu.email) LIKE '%".strtolower( $this->tkeyword )."%'";
            }
        }
        if ( TRUE === XValid::isdate( $this->sdate ) && TRUE === XValid::isdate( $this->edate ) )
        {
            $sdateline = strtotime( $this->sdate );
            $edateline = strtotime( $this->edate );
            $searchsql .= " AND v.sendtime>=".$sdateline." AND v.sendtime<={$edateline}";
        }
        $model = parent::model( "hi", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=hi&".$this->_urlitem;
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
            "hi" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."hi.tpl" );
    }

}

?>
