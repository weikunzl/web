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
    private $id = NULL;

    private function _new( )
    {
        $this->service = parent::service( "about", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    private function _getDetailItems( )
    {
        $this->_new( );
        $this->id = $this->service->validID( );
        $this->_unset( );
    }

    public function control_run( )
    {
    }

    public function control_detail( )
    {
        $this->_getDetailItems( );
        $model = parent::model( "about", "im" );
        $data = $model->getOneData( $this->id );
        if ( empty( $data ) )
        {
            XHandle::wapHalt( "对不起，读取信息不存在或者已删除！", $this->wapfile, 4 );
        }
        $this->getMeta( "ch_about_detail" );
        $page_title = $this->metawrap['title'];
        $page_description = $this->metawrap['description'];
        $page_keyword = $this->metawrap['keyword'];
        $page_title = str_ireplace( array( "{title}", "{cat.name}" ), array( $data['title'], $data['catname'] ), $page_title );
        $page_description = str_ireplace( array( "{title}", "{cat.name}" ), array( $data['title'], $data['catname'] ), $page_description );
        $page_keyword = str_ireplace( array( "{title}", "{cat.name}" ), array( $data['title'], $data['catname'] ), $page_keyword );
        unset( $model );
        $this->_tplfile = $this->getTPLFile( "about_detail" );
        $var_array = array(
            "about" => $data,
            "page_title" => $page_title,
            "page_keyword" => $page_keyword,
            "page_description" => $page_description,
            "previous_item" => $previous_item,
            "next_item" => $next_item,
            "id" => $this->id
        );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

}

?>
