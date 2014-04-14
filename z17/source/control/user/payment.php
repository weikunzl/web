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
        $model = parent::model( "payment", "um" );
        $payment = $model->allList( );
        unset( $model );
        $var_array = array(
            "page_title" => $this->getTitle( "payment" ),
            "payment" => $payment
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."payment.tpl" );
    }

}

?>
