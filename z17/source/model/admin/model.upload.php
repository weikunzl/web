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
class uploadAModel extends X
{

    public function doSaveUpload( $multipart, $module = "", $thumbinput = "", $userid = "" )
    {
        parent::loadlib( "option" );
        $upload_config = XOption::get( "upload_config" );
        $php_upload_maxsize = ini_get( "upload_max_filesize" );
        if ( $php_upload_maxsize < intval( $upload_config['uploadmaxsize'] ) )
        {
            $upload_config['uploadmaxsize'] = $php_upload_maxsize;
        }
        $upload = parent::import( "upload", "util" );
        $params = array(
            "maxSize" => $upload_config['uploadmaxsize'] * 1024000
        );
        if ( in_array( $module, array("article","product","photo",
            "avatar",
            "album",
            "gift",
            "certify",
            "story",
            "temp",
            "test"
        ) ) )
        {
            $params = array_merge( $params, array(
                "allowFileType" => array( "gif", "jpeg", "jpg", "png" )
            ) );
        }
        if ( $module == "download" || $module == "attchment" )
        {
            $params = array_merge( $params, array(
                "allowFileType" => array( "rar", "zip", "tar", "gz" )
            ) );
        }
        if ( empty( $module ) )
        {
            $params = array_merge( $params, array(
                "allowFileType" => array( "gif", "jpeg", "jpg", "png" )
            ) );
        }
        if ( in_array( $module, array( "avatar", "album", "gift", "certify", "story", "temp", "test", "party", "upload" ) ) )
        {
            $dir = $module;
        }
        else
        {
            $dir = "";
        }
        $info = $upload->upload( $multipart, $module, $dir, $params, $userid );
        unset( $upload );
        parent::loadutil( "image" );
        if ( is_array( $info ) )
        {
            if ( !empty( $thumbinput ) && in_array( strtolower( $info['ext'] ), array( "jpg", "jpeg", "png", "gif" ) ) )
            {
                $thumbfiles = $info['source'].".thumb.jpg";
                XImage::makethumb( BASE_ROOT."./".$info['source'], $module );
                if ( file_exists( BASE_ROOT."./".$thumbfiles ) )
                {
                    $info['thumbfiles'] = $thumbfiles;
                }
                else
                {
                    $info['thumbfiles'] = $info['source'];
                }
            }
            if ( in_array( strtolower( $info['ext'] ), array( "jpg", "jpeg", "png", "gif" ) ) && intval( $upload_config['watermarkflag'] ) == 1 )
            {
                XImage::makewatermark( BASE_ROOT."./".$info['source'] );
            }
        }
        return $info;
    }

    public function doSaveAvatar( $args )
    {
        @header( "Expires: 0" );
        @header( "Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE );
        @header( "Pragma: no-cache" );
        $results = array( "status" => FALSE, "avatar" => "" );
        $timer = time( );
        $datedir = date( "Ym", $timer )."/".date( "d", $timer );
        $dirpath = "data/attachment/avatar/".$datedir."/".$args['userid']."/";
        parent::loadutil( "file" );
        XFile::createdir( $dirpath );
        $avatar_name = $dirpath.$args['avatarname']."_".$args['type'].".jpg";
        $avatar_file = BASE_ROOT."./".$avatar_name;
        if ( !empty( $args['content'] ) )
        {
            $len = file_put_contents( $avatar_file, $args['content'] );
            if ( $len <= 0 )
            {
                $results = array( "status" => FALSE, "avatar" => "" );
                return $results;
            }
            $avtar_img = imagecreatefromjpeg( $avatar_file );
            if ( $args['type'] == "big" )
            {
                parent::loadutil( "image" );
                XImage::makethumb( $avatar_file, "avatar" );
                $avatar_thumb = $avatar_name.".thumb.jpg";
                if ( FALSE === file_exists( BASE_ROOT."./".$avatar_thumb ) )
                {
                    $avatar_thumb = $avatar_name;
                }
                $results = array(
                    "status" => TRUE,
                    "avatar" => $avatar_thumb
                );
            }
            imagejpeg( $avtar_img, $avatar_file, 80 );
        }
        return $results;
    }

    public function noteError( $type )
    {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=".OESOFT_CHARSET."' /><style>body{margin:0px;font-size:12px;}</style>";
        if ( $type == "-1" )
        {
            echo "上传失败";
            exit( );
        }
        if ( $type == "-2" )
        {
            echo "不是通过HTTP POST方法上传";
            exit( );
        }
        if ( $type == "-3" )
        {
            echo "图片/附件类型有错";
            exit( );
        }
        if ( $type == "-4" )
        {
            echo "文件超过允许上传的大小";
            exit( );
        }
        if ( $type == "-5" )
        {
            echo "上传文件超过服务器上传限制";
            exit( );
        }
        if ( $type == "-6" )
        {
            echo "上传文件超过表达最大上传限制";
            exit( );
        }
        if ( $type == "-7" )
        {
            echo "图片/附件只上传了一半";
            exit( );
        }
        if ( $type == "-8" )
        {
            echo "图片/附件上传的临时目录出错";
            exit( );
        }
        if ( $type == "-9" )
        {
            echo "图片/附件新的文件名命名不合法";
            exit( );
        }
        echo "上传的内容不合法";
        exit( );
    }

}

?>
