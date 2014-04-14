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
class XCropper extends X
{

    public static function cutImage( $srcfile, $cd, $type = "avatar" )
    {
        $full_srcfile = BASE_ROOT.$srcfile;
        $dstfile = $srcfile.".thumb.jpg";
        $full_dstfile = BASE_ROOT.$dstfile;
        if ( !file_exists( $full_srcfile ) )
        {
            return "";
        }
        $pic_width_s = intval( $cd['pw'] );
        $pic_height_s = intval( $cd['ph'] );
        $x = intval( $cd['x'] );
        $y = intval( $cd['y'] );
        $w = intval( $cd['w'] );
        $h = intval( $cd['h'] );
        $im = "";
        if ( $data = getimagesize( $full_srcfile ) )
        {
            if ( $data[2] == 1 )
            {
                if ( function_exists( "imagecreatefromgif" ) )
                {
                    $im = imagecreatefromgif( $full_srcfile );
                }
            }
            else if ( $data[2] == 2 )
            {
                if ( function_exists( "imagecreatefromjpeg" ) )
                {
                    $im = imagecreatefromjpeg( $full_srcfile );
                }
            }
            else if ( $data[2] == 3 && function_exists( "imagecreatefrompng" ) )
            {
                $im = imagecreatefrompng( $full_srcfile );
            }
        }
        if ( !$im )
        {
            return "";
        }
        $width = imagesx( $im );
        $height = imagesy( $im );
        $pointX = $x * $width / $pic_width_s;
        $cutWidth = $w * $width / $pic_width_s;
        $pointY = $y * $height / $pic_height_s;
        $cutHeight = $h * $height / $pic_height_s;
        if ( function_exists( "imagecreatetruecolor" ) && function_exists( "imagecopyresampled" ) )
        {
            $ni = imagecreatetruecolor( $w, $h );
            imagecopyresampled( $ni, $im, 0, 0, $pointX, $pointY, $w, $h, $cutWidth, $cutHeight );
        }
        else if ( function_exists( "imagecreate" ) && function_exists( "imagecopyresized" ) )
        {
            $ni = imagecreate( $w, $h );
            imagecopyresized( $ni, $im, 0, 0, $pointX, $pointY, $w, $h, $cutWidth, $cutHeight );
        }
        else
        {
            return "";
        }
        if ( function_exists( "imagejpeg" ) )
        {
            imagejpeg( $ni, $full_dstfile );
        }
        else if ( function_exists( "imagepng" ) )
        {
            imagepng( $ni, $full_dstfile );
        }
        imagedestroy( $ni );
        if ( !file_exists( $full_dstfile ) )
        {
            return "";
        }
        return $dstfile;
    }

}

?>
