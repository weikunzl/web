<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class excelClass
{

    private $file = "data.xls";

    public function export( $headdata, $data, $filename = "" )
    {
        $encoded_filename = !empty( $filename ) ? $filename.".xls" : $this->file;
        header( "Content-Type: application/vnd.ms-excel; charset=UTF-8" );
        header( "Pragma: public" );
        header( "Expires: 0" );
        header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
        header( "Content-Type: application/force-download" );
        header( "Content-Type: application/octet-stream" );
        header( "Content-Type: application/download" );
        header( "Content-Disposition: attachment;filename=".$encoded_filename );
        header( "Content-Transfer-Encoding: binary" );
        $content = "";
        $content = $headdata.$data;
        if ( function_exists( "mb_convert_encoding" ) )
        {
            $content = mb_convert_encoding( $content, "GBK", "UTF-8" );
        }
        else if ( function_exists( "iconv" ) )
        {
            $content = iconv( "GBK", "UTF-8", $content );
        }
        echo $content;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
