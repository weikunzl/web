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
        $this->service = parent::service( "index", "ws" );
    }

    private function _unset( )
    {
        unset( $this->service );
    }

    public function control_run( )
    {
        $this->getMeta( "ch_index" );
        $var_array = array(
            "page_title" => $this->metawrap['title'],
            "page_description" => $this->metawrap['description'],
            "page_keyword" => $this->metawrap['keyword']
        );
        $this->_tplfile = $this->getTPLFile( "index" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_skin( )
    {
        $this->_new( );
        $forward = $this->service->validForward( );
        $this->_unset( );
        $var_array = array(
            "page_title" => "选择风格",
            "page_description" => "",
            "page_keyword" => "",
            "forward" => urlencode( $forward )
        );
        $this->_tplfile = $this->getTPLFile( "skin" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

    public function control_saveskin( )
    {
        $this->_new( );
        $forward = $this->service->validForward( );
        $id = $this->service->validStyeID( );
        $this->_unset( );
        parent::loadutil( "cookie" );
        XCookie::del( "styleid" );
        XCookie::set( "styleid", $id, time( ) + 31104000 );
        if ( !empty( $forward ) )
        {
            XHandle::wapHalt( "设置成功", $forward, 0 );
        }
        else
        {
            XHandle::wapHalt( "设置成功", parent::$urlpath."wap.php", 0 );
        }
    }

    public function control_client( )
    {
        $var_array = array( "page_title" => "手机客户端", "page_description" => "", "page_keyword" => "" );
        $this->_tplfile = $this->getTPLFile( "client" );
        TPL::assign( $var_array );
        TPL::display( $this->_tplfile );
    }

}

?>
