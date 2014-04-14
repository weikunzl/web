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

    private $mod = NULL;

    public function __construct( )
    {
        $this->control( );
        $this->mod = XRequest::getargs( "mod" );
        $this->checkLogin( );
    }

    private function control( )
    {
        parent::__construct();
    }

    public function control_run( )
    {
        TPL::display( $this->cptpl."frame.tpl" );
    }

    public function control_top( )
    {
        $var_array = array(
            "logincp" => parent::$wrap_admin
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."frm_top.tpl" );
    }

    public function control_drag( )
    {
        TPL::display( $this->cptpl."frm_drag.tpl" );
    }

    public function control_left( )
    {
        $var_array = array(
            "mod" => $this->mod
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."frm_menu.tpl" );
    }

    public function control_main( )
    {
        TPL::display( $this->cptpl."frm_main.tpl" );
    }

    public function control_footer( )
    {
        TPL::display( $this->cptpl."frm_footer.tpl" );
    }

}

?>
