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
        $showmatch = 0;
        if ( $this->g['view']['viewmatch'] == 1 )
        {
            $showmatch = 1;
        }
        else
        {
            XHandle::halt( "对不起，你所在的会员组没有查看配对结果的权限！请升级。", "", 1 );
        }
        $searchsql = "";
        $model = parent::model( "match", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=match";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "match" => $data,
            "showmatch" => $showmatch,
            "page_title" => $this->getTitle( "match_run" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."match.tpl" );
    }

}

?>
