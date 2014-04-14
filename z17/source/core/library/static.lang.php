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
class XLang extends X
{

    public static function get( $key )
    {
        $lang_model = parent::model( "lang", "am" );
        return $lang_model->getLangVal( $key );
    }

    public static function loadLang( )
    {
        $lang_model = parent::model( "lang", "am" );
        return $lang_model->loadCaCheLang( );
    }

}

?>
