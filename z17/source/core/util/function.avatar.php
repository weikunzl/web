<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class avatarStatusClass
{

    public $data = NULL;
    public $status = NULL;
    public $statusText = NULL;

    public function __construct( )
    {
        $this->data->urls = array( );
    }

}

function avatar_saving( $userid = "" )
{
    @header( "Expires: 0" );
    @header( "Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE );
    @header( "Pragma: no-cache" );
    $type = XRequest::getargs( "type" );
    $name = XRequest::getargs( "photoId" );
    if ( empty( $userid ) )
    {
        $userid = XRequest::getint( "userid" );
    }
    $timer = time( );
    $datedir = date( "Ym", $timer )."/".date( "d", $timer );
    $pic_path = "data/attachment/avatar/".$datedir."/".$userid."/";
    X::loadutil( "file" );
    XFile::createdir( $pic_path );
    $avatar_path = $pic_path.$name."_".$type.".jpg";
    $len = file_put_contents( BASE_ROOT."./".$avatar_path, file_get_contents( "php://input" ) );
    if ( 0 < $len )
    {
        $avtar_img = imagecreatefromjpeg( BASE_ROOT."./".$avatar_path );
        if ( $type == "big" )
        {
            X::loadutil( "image" );
            XImage::makethumb( BASE_ROOT.$avatar_path, "avatar" );
            $avatar_thumb = $avatar_path.".thumb.jpg";
            if ( FALSE === file_exists( BASE_ROOT."./".$avatar_thumb ) )
            {
                $avatar_thumb = $avatar_path;
            }
            $status = TRUE;
            $avatar = $avatar_thumb;
        }
        imagejpeg( $avtar_img, BASE_ROOT."./".$avatar_path, 80 );
    }
    else
    {
        $status = FALSE;
        $avatar = "";
    }
    return array( $userid, array( "status" => $status, "avatar" => $avatar ) );
}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
