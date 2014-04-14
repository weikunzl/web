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
        $showvisit = 0;
        if ( $this->g['view']['viewvisitor'] == 1 )
        {
            $showvisit = 1;
        }
        else
        {
            XHandle::halt( "对不起，你所在的会员组没有查看访问记录的权限！请升级。", "", 1 );
        }
        $searchsql = "";
        $model = parent::model( "visitme", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql,
            "orderby" => ""
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=visitme";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "visitme" => $data,
            "showvisit" => $showvisit,
            "page_title" => $this->getTitle( "visitme_run" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."visitme.tpl" );
    }

    public function control_del( )
    {
        $service = parent::service( "visitme", "us" );
        $ids = $service->validArrayID( );
        unset( $service );
        $model = parent::model( "visitme", "um" );
        $ii = 0;
        for ( ; $ii < count( $ids ); ++$ii )
        {
            $id = intval( $ids[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->cpfile."?c=visitme", 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
