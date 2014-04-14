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
class transferUService extends X
{

    public function validQuantiy( )
    {
        $quantity = floatval( XRequest::getargs( "quantity" ) );
        if ( !( 0 < $quantity ) )
        {
            XHandle::halt( "转换数量必须大于0", "", 1 );
        }
        return $quantity;
    }

}

?>
