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
class XImage extends X
{

    public static function makeThumb( $srcfile, $channel = "" )
    {
        parent::loadlib( "option" );
        $upload_config = XOption::get( "upload_config" );
        if ( !file_exists( $srcfile ) )
        {
            return "";
        }
        $dstfile = $srcfile.".thumb.jpg";
        if ( 0 < ( integer )$thumbwidth && 0 < ( integer )$thumbheight )
        {
            $tow = intval( $thumbwidth );
            $toh = intval( $thumbheight );
        }
        else
        {
            switch ( $channel )
            {
                case "photo" :
                    $tow = intval( $upload_config['photothumbwidth'] );
                    $toh = intval( $upload_config['photothumbheight'] );
                    break;
                case "product" :
                    $tow = intval( $upload_config['productthumbwidth'] );
                    $toh = intval( $upload_config['productthumbheight'] );
                    break;
                case "avatar" :
                    $tow = intval( $upload_config['avatarwidth'] );
                    $toh = intval( $upload_config['avatarheight'] );
                    break;
                case "album" :
                    $tow = intval( $upload_config['albumwidth'] );
                    $toh = intval( $upload_config['albumheight'] );
                    break;
                case "party" :
                    $tow = intval( $upload_config['partywidth'] );
                    $toh = intval( $upload_config['partyheight'] );
                    break;
                case "story" :
                    $tow = intval( $upload_config['storywidth'] );
                    $toh = intval( $upload_config['storyheight'] );
                    break;
                case "test" :
                    $tow = intval( $upload_config['testwidth'] );
                    $toh = intval( $upload_config['testheight'] );
                    break;
                default :
                    $tow = intval( $upload_config['thumbwidth'] );
                    $toh = intval( $upload_config['thumbheight'] );
            }
        }
        if ( $tow < 60 )
        {
            $tow = 60;
        }
        if ( $toh < 60 )
        {
            $toh = 60;
        }
        $make_max = 0;
        $maxtow = intval( $upload_config['maxthumbwidth'] );
        $maxtoh = intval( $upload_config['maxthumbheight'] );
        if ( 300 <= $maxtow && 300 <= $maxtoh )
        {
            $make_max = 1;
        }
        $im = "";
        if ( $data = getimagesize( $srcfile ) )
        {
            if ( $data[2] == 1 )
            {
                $make_max = 0;
                if ( function_exists( "imagecreatefromgif" ) )
                {
                    $im = imagecreatefromgif( $srcfile );
                }
            }
            else if ( $data[2] == 2 )
            {
                if ( function_exists( "imagecreatefromjpeg" ) )
                {
                    $im = imagecreatefromjpeg( $srcfile );
                }
            }
            else if ( $data[2] == 3 && function_exists( "imagecreatefrompng" ) )
            {
                $im = imagecreatefrompng( $srcfile );
            }
        }
        if ( !$im )
        {
            return "";
        }
        $srcw = imagesx( $im );
        $srch = imagesy( $im );
        $towh = $tow / $toh;
        $srcwh = $srcw / $srch;
        if ( $towh <= $srcwh )
        {
            $ftow = $tow;
            $ftoh = $ftow * ( $srch / $srcw );
            $fmaxtow = $maxtow;
            $fmaxtoh = $fmaxtow * ( $srch / $srcw );
        }
        else
        {
            $ftoh = $toh;
            $ftow = $ftoh * ( $srcw / $srch );
            $fmaxtoh = $maxtoh;
            $fmaxtow = $fmaxtoh * ( $srcw / $srch );
        }
        if ( $srcw <= $maxtow && $srch <= $maxtoh )
        {
            $make_max = 0;
        }
        if ( $tow < $srcw || $toh < $srch )
        {
            if ( function_exists( "imagecreatetruecolor" ) && function_exists( "imagecopyresampled" ) && ( $ni = @imagecreatetruecolor( $ftow, $ftoh ) ) )
            {
                imagecopyresampled( $ni, $im, 0, 0, 0, 0, $ftow, $ftoh, $srcw, $srch );
                if ( $make_max && ( $maxni = @imagecreatetruecolor( $fmaxtow, $fmaxtoh ) ) )
                {
                    imagecopyresampled( $maxni, $im, 0, 0, 0, 0, $fmaxtow, $fmaxtoh, $srcw, $srch );
                }
            }
            else if ( function_exists( "imagecreate" ) && function_exists( "imagecopyresized" ) && ( $ni = @imagecreate( $ftow, $ftoh ) ) )
            {
                imagecopyresized( $ni, $im, 0, 0, 0, 0, $ftow, $ftoh, $srcw, $srch );
                if ( $make_max && ( $maxni = @imagecreate( $fmaxtow, $fmaxtoh ) ) )
                {
                    imagecopyresized( $maxni, $im, 0, 0, 0, 0, $fmaxtow, $fmaxtoh, $srcw, $srch );
                }
            }
            else
            {
                return "";
            }
            if ( function_exists( "imagejpeg" ) )
            {
                imagejpeg( $ni, $dstfile );
                if ( $make_max )
                {
                    imagejpeg( $maxni, $srcfile );
                }
            }
            else if ( function_exists( "imagepng" ) )
            {
                imagepng( $ni, $dstfile );
                if ( $make_max )
                {
                    imagepng( $maxni, $srcfile );
                }
            }
            imagedestroy( $ni );
            if ( $make_max )
            {
                imagedestroy( $maxni );
            }
        }
        imagedestroy( $im );
        if ( !file_exists( $dstfile ) )
        {
            return "";
        }
        return $dstfile;
    }

    public static function makeWaterMark( $srcfile )
    {
        parent::loadlib( "option" );
        $upload_config = XOption::get( "upload_config" );
        $watermarkfile = empty( $upload_config['watermarkfile'] ) ? BASE_ROOT."./tpl/static/images/watermark.png" : BASE_ROOT."./".$upload_config['watermarkfile'];
        if ( !file_exists( $watermarkfile ) || !( $water_info = getimagesize( $watermarkfile ) ) )
        {
            return "";
        }
        $water_w = $water_info[0];
        $water_h = $water_info[1];
        $water_im = "";
        switch ( $water_info[2] )
        {
            case 1 :
                @$water_im = @imagecreatefromgif( $watermarkfile );
                break;
            case 2 :
                @$water_im = @imagecreatefromjpeg( $watermarkfile );
                break;
            case 3 :
                @$water_im = @imagecreatefrompng( $watermarkfile );
        }
        if ( empty( $water_im ) )
        {
            return "";
        }
        if ( !file_exists( $srcfile ) || !( $src_info = getimagesize( $srcfile ) ) )
        {
            return "";
        }
        $src_w = $src_info[0];
        $src_h = $src_info[1];
        $src_im = "";
        switch ( $src_info[2] )
        {
            case 1 :
                $fp = fopen( $srcfile, "rb" );
                $filecontent = fread( $fp, filesize( $srcfile ) );
                fclose( $fp );
                if ( strpos( $filecontent, "NETSCAPE2.0" ) === FALSE )
                {
                    @$src_im = @imagecreatefromgif( $srcfile ); 
                }
		break;
            case 2 :
                @$src_im = @imagecreatefromjpeg( $srcfile );
                break;
            case 3 :
                @$src_im = @imagecreatefrompng( $srcfile );
        }
        if ( empty( $src_im ) )
        {
            return "";
        }
        if ( $src_w < $water_w + 150 || $src_h < $water_h + 150 )
        {
            return "";
        }
        switch ( intval( $upload_config['watermarkpos'] ) )
        {
            case 1 :
                $posx = 0;
                $posy = 0;
                break;
            case 2 :
                $posx = $src_w - $water_w;
                $posy = 0;
                break;
            case 3 :
                $posx = 0;
                $posy = $src_h - $water_h;
                break;
            case 4 :
                $posx = $src_w - $water_w;
                $posy = $src_h - $water_h;
                break;
            default :
                $posx = mt_rand( 0, $src_w - $water_w );
                $posy = mt_rand( 0, $src_h - $water_h );
        }
        @imagealphablending( $src_im, TRUE );
        @imagecopy( $src_im, $water_im, $posx, $posy, 0, 0, $water_w, $water_h );
        switch ( $src_info[2] )
        {
            case 1 :
                @imagegif( $src_im, $srcfile );
                break;
            case 2 :
                @imagejpeg( $src_im, $srcfile );
                break;
            case 3 :
                @imagepng( $src_im, $srcfile );
                break;
            default :
                return "";
        }
        @imagedestroy( $water_im );
        @imagedestroy( $src_im );
    }

}

?>
