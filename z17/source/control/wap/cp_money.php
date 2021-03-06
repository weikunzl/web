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
class control extends wapbase
{

    private $service = NULL;
    private $_tplfile = NULL;

    private function _new( )
    {
        $this->service = parent::service( "money", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    public function control_run( )
    {
        $this->checkLogin( );
        $searchsql = "";
        $model = parent::model( "money", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        unset( $model );
        $url = $this->wapfile."?c=cp_money";
        if ( !empty( $data ) )
        {
            $showpage = XPage::index( $datacount, $this->pagesize, $this->page, $url, 5, 10000 );
        }
        else
        {
            $showpage = "";
        }
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => $showpage,
            "money" => $data,
            "page_title" => "金额记录"
        );
        $this->_tplfile = $this->getTPLFile( "cp_money" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

}

?>
