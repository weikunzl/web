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
class cameraUModel extends X
{

    private function _createPhoto( $w, $h )
    {
        $len = file_get_contents( "php://input" );
        if ( empty( $len ) )
        {
            $len = $GLOBALS[HTTP_RAW_POST_DATA];
        }
        if ( empty( $len ) )
        {
            return FALSE;
        }
        if ( function_exists( "imagecreatetruecolor" ) )
        {
            $img = imagecreatetruecolor( $w, $h );
        }
        else if ( function_exists( "imagecreate" ) )
        {
            $img = imagecreate( $w, $h );
        }
        else
        {
            return FALSE;
        }
        imagefill( $img, 0, 0, 6723942 );
        $rows = 0;
        $cols = 0;
        $rows = 0;
        for ( ; $rows < $h; ++$rows )
        {
            $c_row = explode( ",", XRequest::getargs( "px".$rows ) );
            $cols = 0;
            for ( ; $cols < $w; ++$cols )
            {
                $value = $c_row[$cols];
                if ( $value != "" )
                {
                    $hex = $value;
                    while ( strlen( $hex ) < 6 )
                    {
                        $hex = "0".$hex;
                    }
                    $r = hexdec( substr( $hex, 0, 2 ) );
                    $g = hexdec( substr( $hex, 2, 2 ) );
                    $b = hexdec( substr( $hex, 4, 2 ) );
                    $test = imagecolorallocate( $img, $r, $g, $b );
                    imagesetpixel( $img, $cols, $rows, $test );
                }
            }
        }
        $timer = time( );
        $datedir = date( "Ym", $timer )."/".date( "d", $timer );
        $pic_path = "data/attachment/camera/".$datedir."/";
        parent::loadutil( "file" );
        XFile::createdir( $pic_path );
        $img_name = substr( md5( $timer.XHandle::getrndchar( 12 ) ), 8, 16 ).".jpg";
        $img_url = $pic_path.$img_name;
        if ( function_exists( "imagejpeg" ) )
        {
            imagejpeg( $img, $img_url, 80 );
            return $img_url;
        }
        if ( function_exists( "imagepng" ) )
        {
            imagepng( $img, $img_url, 80 );
            return $img_url;
        }
        return FALSE;
    }

    public function doSavePic( $w, $h )
    {
        $result = FALSE;
        $dvurl = $this->_createPhoto( $w, $h );
        if ( !( FALSE === $dvurl ) )
        {
            $vdid = parent::$obj->fetch_newid( "SELECT MAX(vdid) FROM ".DB_PREFIX."user_videorz", 1 );
            $array = array(
                "vdid" => $vdid,
                "userid" => parent::$wrap_user['userid'],
                "vdtype" => 0,
                "vdurl" => $dvurl,
                "addtime" => time( ),
                "flag" => 0
            );
            parent::$obj->insert( DB_PREFIX."user_videorz", $array );
            $result = TRUE;
        }
        return $result;
    }

    public function doSaveWebcam( )
    {
        $result = FALSE;
        $dvurl = $this->_createCam( );
        if ( !( FALSE === $dvurl ) )
        {
            $vdid = parent::$obj->fetch_newid( "SELECT MAX(vdid) FROM ".DB_PREFIX."user_videorz", 1 );
            $array = array(
                "vdid" => $vdid,
                "userid" => parent::$wrap_user['userid'],
                "vdtype" => 0,
                "vdurl" => $dvurl,
                "addtime" => time( ),
                "flag" => 0
            );
            parent::$obj->insert( DB_PREFIX."user_videorz", $array );
            $result = $dvurl;
        }
        return $result;
    }

    private function _createCam( )
    {
        $data = file_get_contents( "php://input" );
        if ( empty( $data ) )
        {
            $len = $GLOBALS[HTTP_RAW_POST_DATA];
        }
        if ( empty( $data ) )
        {
            return FALSE;
        }
        $timer = time( );
        $datedir = date( "Ym", $timer )."/".date( "d", $timer );
        $pic_path = "data/attachment/camera/".$datedir."/";
        parent::loadutil( "file" );
        XFile::createdir( $pic_path );
        $img_name = substr( md5( $timer.XHandle::getrndchar( 12 ) ), 8, 16 ).".jpg";
        $img_url = $pic_path.$img_name;
        $result = @file_put_contents( $img_url, $data );
        if ( FALSE === $result || empty( $result ) )
        {
            return FALSE;
        }
        return $img_url;
    }

}

?>
