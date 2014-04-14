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
class indexWService extends X
{

    public function validForward( )
    {
        $forward = XRequest::getargs( "forward" );
        if ( empty( $forward ) )
        {
            $forward = $_SERVER['HTTP_REFERER'];
        }
        if ( strpos( $forward, "passport" ) )
        {
            $forward = parent::$urlpath."wap.php";
        }
        return $forward;
    }

    public function validStyeID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            $id = 8;
        }
        return $id;
    }

}

?>
