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

    public function control_run( )
    {
        $searchsql = "";
        $model = parent::model( "visit", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=visit";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "visit" => $data,
            "page_title" => $this->getTitle( "visit_run" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."visit.tpl" );
    }

    public function control_del( )
    {
        $service = parent::service( "visit", "us" );
        $ids = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "visit", "um" );
        $ii = 0;
        for ( ; $ii < count( $ids ); ++$ii )
        {
            $id = intval( $ids[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->cpfile."?c=visit", 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
