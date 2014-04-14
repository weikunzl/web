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
class paymentUModel extends X
{

    public function allList( )
    {
        $sql = "SELECT v.*, p.logo, p.filepath FROM ".DB_PREFIX."payment AS v LEFT JOIN ".DB_PREFIX."payment_plugin AS p ON v.pluginid=p.pluginid WHERE v.flag='1' ORDER BY v.orders ASC";
        $data = parent::$obj->getall( $sql );
        $i = 1;
        foreach ( $data as $key => $value )
        {
            $data[$key]['logo'] = parent::$urlpath.$value['logo'];
            $data[$key]['i'] = $i;
            ++$i;
        }
        return $data;
    }

}

?>
